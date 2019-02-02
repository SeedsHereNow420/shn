/* global $, prestashop */

/**
 * This module exposes an extension point in the form of the `showModal` function.
 *
 * If you want to override the way the modal window is displayed, simply define:
 *
 * prestashop.blockcart = prestashop.blockcart || {};
 * prestashop.blockcart.showModal = function myOwnShowModal (modalHTML) {
 *   // your own code
 *   // please not that it is your responsibility to handle closing the modal too
 * };
 *
 * Attention: your "override" JS needs to be included **before** this file.
 * The safest way to do so is to place your "override" inside the theme's main JS file.
 *
 */

$(document).ready(function () {

  let promises = [];
  let abortPreviousRequests = function() {
    var promise;
    while (promises.length > 0) {
      promise = promises.pop();
      promise.abort();
    }
  };


  /*prestashop.blockcart = prestashop.blockcart || {};

  var showModal = prestashop.blockcart.showModal || function (modal, updateornot) {
    //no need to replace the same code here /_dev/js/block-cart.js
  };*/

    $('body').on('click', '.ajax_add_to_cart_button', function (event) {
        event.preventDefault();
        if(!$(this).data('id-product') || $(this).prop('disabled') == 'disabled')
          return false;
        var caller_element = this;
        var query = 'id_product=' + $(this).data('id-product') + '&add=1&action=update&token='+prestashop.static_token+'&rand=' + new Date().getTime();
        var actionURL = prestashop.urls.pages.cart;
        //
        $(this).prop('disabled', 'disabled').addClass('active');

        if($(this).data('id-product-attribute'))
          query += '&ipa='+$(this).data('id-product-attribute');
        //
        var qty = $(this).data('minimal-quantity') ? $(this).data('minimal-quantity') : 1;
        var quantity_wanted =  $(this).closest('.ajax_block_product').find('input[name=pro_quantity]').val();
        if (!quantity_wanted)
            quantity_wanted = 1;
        query += '&qty='+(quantity_wanted>qty ? quantity_wanted : qty);
        //
        
        $.post(actionURL, query, null, 'json').then(function(resp)  {
          prestashop.emit('stUpdateCart', {
            reason: {
              idProduct: resp.id_product,
              idProductAttribute: resp.id_product_attribute,
              linkAction: 'add-to-cart',
              updateornot: false,
              caller_element: caller_element
            }
          });
        }).fail(function(resp) {
          $(caller_element).removeProp('disabled').removeClass('active');
          prestashop.emit('handleError', {eventType: 'addProductToCart', resp: resp});
        });
        return false;
    });
    //Add a active to the add to cart button on the product page. Looking for a better way
    //to unable to stop the button being clicking for several times.
    $('body').on(
      'click',
      '[data-button-action="add-to-cart"]',
      function(event) {
        event.preventDefault();
        let _target = $(event.target);
        if(!_target.hasClass('btn'))
          _target = _target.closest('.btn');
        _target.prop('disabled', 'disabled').addClass('active');
      }
    );
    
    prestashop.on(
      'stUpdateCart',
      st_update_cart
    );
    //this is for the product page, a updateCart listener in the core/cart.js should not be triggered if not in the shopping cart page.
    prestashop.on(
      'updateCart',
      st_update_cart
    );
    $('body').on(
      'click',
      '.ajax_remove_button',
      function(event){
        event.preventDefault();
        let cartAction =  {
          url: $(this).attr('href'),
          type: 'deleteFromCart' //
        };
        let requestData = {
          ajax: '1',
          action: 'update'
        };

        abortPreviousRequests();
        $.ajax({
          url: cartAction.url,
          method: 'POST',
          data: requestData,
          dataType: 'json',
          beforeSend: function (jqXHR) {
            promises.push(jqXHR);
          }
        }).then(function (resp) {
          // Refresh cart preview
          prestashop.emit('stUpdateCart', {
            reason: {
              idProduct: resp.id_product,
              idProductAttribute: resp.id_product_attribute,
              linkAction: 'delete-from-cart',
              updateornot: false
            }
          });

          if ($('body.product-id-'+resp.id_product).length)//if the removed product is the current page 
            prestashop.emit('updateProduct', {
              reason: {}
            });

          if(typeof(prestashop.page.page_name)!=='undefined' && prestashop.page.page_name=='cart')//zai shopping cart page
            prestashop.emit('updateCart', {
                reason: {
                  idProduct: resp.id_product,
                  idProductAttribute: resp.id_product_attribute
                }
            });
          
        }).fail(function(resp) {
          prestashop.emit('handleError', {
            eventType: 'updateProductInCart',
            resp: resp,
            cartAction: cartAction.type
          });
        });
      });
    /*$('.cart_quantity').on('touchspin.on.startdownspin', handleCartAction);
    $('.cart_quantity').on('touchspin.on.startupspin', handleCartAction);
    $body.on(
        'focusout',
        '.cart_quantity',
        (event) => {
          updateProductQuantityInCart(event);
        }
      );
      $body.on(
        'keyup',
        '.cart_quantity',
        (event) => {
          if (event.keyCode == 13) {
            updateProductQuantityInCart(event);
          }
        }
      );
*/
});
/*
  var st_create_spin = function()
  {
    $.each($('.cart_quantity'), function (index, spinner) {
       $(spinner).TouchSpin({
        verticalbuttons: !sttheme.is_mobile_device,
        verticalupclass: 'fto-plus-2',
        verticaldownclass: 'fto-minus',
        buttondown_class: 'btn btn-touchspin js-touchspin js-increase-product-quantity',
        buttonup_class: 'btn btn-touchspin js-touchspin js-decrease-product-quantity',
        min: parseInt($(spinner).data('minimal-quantity'), 10),
        max: 1000000
      });
    });
  };
*/
  var st_update_cart = function(event){
      var refreshURL = $('.blockcart').data('refresh-url');
      var requestData = {};
      var updateornot = true;
      var caller_element = null;

      if (event && event.reason) {
        //Do nothing if this is a shopping cart page even, like update remove cart items on the shopping cart page.
        //Why? drop down and side cart blocks on the shopping cart page still need to be updated.
        /*if(typeof(event.reason.cart_module_ignore)!=='undefined')
          return false;*/
        requestData = {
          id_product_attribute: event.reason.idProductAttribute,
          id_product: event.reason.idProduct,
          action: event.reason.linkAction
        };
        if(typeof(event.reason.updateornot)!=='undefined')
          updateornot = event.reason.updateornot;
        if(typeof(event.reason.caller_element)!=='undefined')
          caller_element = event.reason.caller_element;
      }

      $.post(refreshURL, requestData).then(function (resp) {
        $('.shoppingcart-list').replaceWith(resp.preview);
        //used to recreate touch spin
        prestashop.emit('stUpdatedCart');

        if(resp.products_count)
        {
            if(resp.products_count>9)
                $('.ajax_cart_quantity').addClass('dozens');
            else
                $('.ajax_cart_quantity').removeClass('dozens');
            $('.ajax_cart_quantity').text(resp.products_count);
            $('.cart_body').removeClass('no_show_empty');
        }
        else
        {
            $('.ajax_cart_quantity').removeClass('dozens').text(0);
            hover_display_cp==1 && $('.cart_body').addClass('no_show_empty');
        }

        if(resp.total_value)
        {
            $('.ajax_cart_total').text(resp.total_value);
        }

        if(typeof(requestData.action)!=='undefined' && requestData.action=='add-to-cart')//adding or removing
        {
            if (addtocart_animation && resp.flying_image) {
              let flyed = showFlyimgImage(addtocart_animation, resp.flying_image, caller_element);
              if(flyed && updateornot)
                prestashop.emit('updateProduct', {reason:{}});

              if(!flyed && resp.modal && typeof(prestashop.blockcart)!=='undefined'){
                prestashop.blockcart.showModal(resp.modal, updateornot);
              }
            }else if(resp.modal && typeof(prestashop.blockcart)!=='undefined'){
              prestashop.blockcart.showModal(resp.modal, updateornot);
            }
            //to do let users know when adding failed
            //
            if(caller_element)
              $(caller_element).removeProp('disabled').removeClass('active');
        }
        //
        if($('button[data-button-action="add-to-cart"]').hasClass('active'))//looking for better way to remove the active calssname on the produt page
          $('button[data-button-action="add-to-cart"]').prop('disabled', false).removeClass('active');
      }).fail(function (resp) {
        prestashop.emit('handleError', {eventType: 'updateShoppingCart', resp: resp});
      });
  };
  var showFlyimgImage = function(addtocart_animation, flying_image, caller_element){
    var element = cartBlock = null;
    if(!caller_element)
    {
      let pro_gallery_top_dom = $('.pro_gallery_top', '.quickview'); //find a better to do tell if is in quick view
      if(!pro_gallery_top_dom.length)
        pro_gallery_top_dom = $('.pro_gallery_top');

      if(pro_gallery_top_dom.length && typeof(pro_gallery_top_dom[0].swiper)!=='undefined')
        element = $(pro_gallery_top_dom[0].swiper.slides).eq(pro_gallery_top_dom[0].swiper.activeIndex).find('.pro_gallery_item');
    }else{
      element = $(caller_element).closest('.ajax_block_product').find('.front-image');
      if(!element.length)
        element = $(caller_element).closest('.ajax_block_product').find('.tm_gallery_top .swiper-slide-active .tm_gallery_item');
    }
    if(!element || !element.length)
      return false;
    var pictureOffsetOriginal = element.hasClass('front-image') ? element.parent().offset() : element.offset();//hover image feature scroll front image up so its offset is not correct
    if(!pictureOffsetOriginal)
      return false;
    pictureOffsetOriginal.right = $(window).innerWidth() - pictureOffsetOriginal.left - element.width();
    let flying_image_width = element.width();
    let flying_image_height = element.height();


    if(addtocart_animation==3)
    {
      cartBlock = $('.rightbar_cart:visible');
      if(!cartBlock.length)
        cartBlock = $('.cart_mobile_bar_tri:visible')
    }
    
    if(addtocart_animation!=3 || !cartBlock || !cartBlock.length){
      cartBlock = $('.st_shopping_cart:visible');
      if(!cartBlock.length)
        cartBlock = $('.cart_mobile_bar_tri:visible')
      if(!cartBlock.length)
        cartBlock = $('.rightbar_cart:visible')
    }
    if(!cartBlock || !cartBlock.length)
      return false;
    var cartBlockOffset = cartBlock.offset();
    if(!cartBlockOffset)
      return false;
    cartBlockOffset.right = $(window).innerWidth() - cartBlockOffset.left - Math.floor(cartBlock.width()/2);


    $('.flying_image').remove();
    //using clone one is better, new one would take time to load
    //$(flying_image)
    element.clone().addClass('flying_image').on('load', function () {
      $(this).show().animate({
        width: '50px',
        height: '50px',
        opacity: 0.5,
        top: cartBlockOffset.top,
        right: cartBlockOffset.right-25
      }, ( (pictureOffsetOriginal.top-cartBlockOffset.top)<1000 ? 1000 : pictureOffsetOriginal.top-cartBlockOffset.top) )
      .fadeOut(100, function() {
        $(this).remove();
      });
      if(addtocart_animation == 2)
      {
        $('body,html').animate({
          scrollTop: cartBlockOffset.top
        }, ( (pictureOffsetOriginal.top-cartBlockOffset.top)<1000 ? 1000 : pictureOffsetOriginal.top-cartBlockOffset.top));
      }
    }).css({
        top: pictureOffsetOriginal.top,
        right: pictureOffsetOriginal.right,
        width: flying_image_width,
        height: flying_image_height,
        display: 'none'
      }).appendTo($('.st-container'));
    return true;
  };