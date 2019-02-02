/*
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2015 PrestaShop SA
* @license http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*/

/**
* Change product quantity
*
* @return void
*/
function stWishlistUpdateProduct(id_st_wishlist, id_product, id_product_attribute, quantity)
{
    if (typeof stmywishlist_url == 'undefined')
		return (false);
	$.ajax({
		type: 'GET',
		url: stmywishlist_url,
		headers: { "cache-control": "no-cache" },
		async: true,
		cache: false,
		dataType: "json",
		data: {
			id_product:id_product,
			id_product_attribute:id_product_attribute,
			quantity: quantity,
			id_st_wishlist:id_st_wishlist,
			ajax: 1,
			action: 'updateProduct'
		},
		success: function (resp)
		{
            if(resp.success==1)
    	       $('.wishlist_update_quantity.active').removeClass('active').find('.hidden').removeClass('hidden');
            else if(!resp.success)
            {
                $('.wishlist_update_quantity.active').removeClass('active');
                stWishlistPopup(resp.message);
            }
            else if(resp.success==2)
                stWishlistGoLogin();

		},
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
             $('.wishlist_update_quantity.active').removeClass('active');
        }
	});
}

/**
* Change product quantity
*
* @return void
*/
function stWishlistAddProduct(id_st_wishlist, id_product, id_product_attribute, quantity)
{
    if (typeof stmywishlist_url == 'undefined')
		return (false);

    $.ajax({
        type: 'GET',
        url: stmywishlist_url,
        headers: { "cache-control": "no-cache" },
        async: true,
        cache: false,
        dataType: "json",
        data: {
            id_product:id_product,
            id_product_attribute:id_product_attribute,
            quantity: quantity,
            id_st_wishlist:id_st_wishlist,
            ajax: 1,
            action: 'addProduct'
        },
        success: function (resp)
        {
            $('.add_to_wishlit.active').removeClass('active');//the same code also in resetSlidebar to make sure active get removed
            
            $('#select_wishlist a[data-id-wishlist="'+id_st_wishlist+'"]').removeClass('active').addClass(typeof(resp.success)!=='undefined' && resp.success==1 ? 'st_done' : '').find('span').html(resp.current_total);
            //$('.wishlist_link .amount_circle').html(resp.total);
            if(!resp.success)
                stWishlistPopup(resp.message);
            else if(resp.success==2)
                stWishlistGoLogin();
        },
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
            $('#select_wishlist a[data-id-wishlist="'+id_st_wishlist+'"]').removeClass('active');
        }
    });

}

function stWishlistProductRemove(id_st_wishlist, id_product, id_product_attribute)
{
	if (typeof stmywishlist_url == 'undefined')
		return (false);

	$.ajax({
		type: 'GET',
		url: stmywishlist_url,
		headers: { "cache-control": "no-cache" },
		async: true,
		cache: false,
		dataType: "json",
		data: {
			id_product:id_product,
			id_product_attribute:id_product_attribute,
			id_st_wishlist:id_st_wishlist,
			ajax: 1,
			action: 'deleteProduct'
		},
		success: function (resp)
		{
            $('.wishlist_remove_product.active').removeClass('active');
			if (resp.success==1) {
                $('.wishlist_product_item[data-id_wishlist='+id_st_wishlist+'][data-id_product='+id_product+'][data-id_product_attribute='+id_product_attribute+']').empty();
			}
			else if(!resp.success)
			{
				stWishlistPopup(resp.message);
			}
            else if(resp.success==2)
                stWishlistGoLogin();
		},
        error: function(XMLHttpRequest, textStatus, errorThrown)
        {
        }
	});
}

function stWishlistSendEmail(id_st_wishlist)
{
    if (typeof stmywishlist_url == 'undefined')
		return false;
    var email = $('#email_'+id_st_wishlist).val();
    if (!email) {
        return false;
    }
	$.ajax({
		type: 'GET',
		url: stmywishlist_url,
		headers: { "cache-control": "no-cache" },
		async: true,
		cache: false,
		dataType: "json",
		data: {
			email: email,
			id_st_wishlist:id_st_wishlist,
			ajax: 1,
			action: 'sendEmail'
		},
		success: function (resp)
		{
            if (resp.success==1) {
                $('.wishlist_share_email.active').removeClass('active').addClass('st_done');
            }
            else
            {
                $('.wishlist_share_email').removeClass('active');
                stWishlistPopup(resp.message);
            }
    	     
		}
	});
}
function stWishlistPopup(msg)
{
    $.magnificPopup.open({
      removalDelay: 500,
      callbacks: {
        beforeOpen: function() {
           this.st.mainClass = 'mfp-zoom-in';
        }
      },
      items: {
          src: '<div class="inline_popup_content small_popup mfp-with-anim text-center">'+msg+'</div>',
          type: 'inline'
      }
    });
}
function stWishlistGoLogin()
{
    $.magnificPopup.open({
      removalDelay: 500,
      callbacks: {
        beforeOpen: function() {
           this.st.mainClass = 'mfp-zoom-in';
        }
      },
      items: {
          src: '#wishlist_go_login',
          type: 'inline'
      }
    });
}
$(document).ready(function () {
    $('body').on('click', '.copy_wishlist_link', function (event) {
        event.preventDefault();
        $(this).siblings('.form-control').select();
        document.execCommand("copy");
        return false;
    });
    $('body').on('click', '.wishlist_update_quantity', function (event) {
        event.preventDefault();
        let that = $(this).closest('.wishlist_product_item');
        let quantity = that.find('.pro_quantity').val();
        if(!$.isNumeric(quantity))
            return false;
        let dataset = that.data();
        if(dataset.id_product && dataset.id_wishlist){
            $(this).addClass('active');
            stWishlistUpdateProduct(dataset.id_wishlist,dataset.id_product,dataset.id_product_attribute, quantity);
        }
    });
    $('body').on('click', '.wishlist_remove_product', function (event) {
        event.preventDefault();
        let dataset = $(this).closest('.wishlist_product_item').data();
        if(dataset.id_product && dataset.id_wishlist){
            $(this).addClass('active');
            stWishlistProductRemove(dataset.id_wishlist,dataset.id_product,dataset.id_product_attribute);
        }
    });
    $('body').on('click', '.wishlist_share_email', function (event) {
        event.preventDefault();
        let that = $(this).addClass('active');
        let id_wishlist = that.data('id-wishlist');
        if(id_wishlist)
            stWishlistSendEmail(id_wishlist);
    });
    $('body').on('click', '.add_to_wishlit', function (event) {
        if(typeof(prestashop)==='undefined' || !prestashop.customer.is_logged)
        {
            stWishlistGoLogin();
            return false;
        }

        $('.add_to_wishlit').removeClass('active');
        $(this).addClass('active');
        $('#select_wishlist a.saved').removeClass('saved');//
        //
        $('#select_wishlist a').removeClass('st_done');
        $('.st-container').addClass('open_bar_right');
        $('#side_wishlist').addClass('sidebar_opened');
    });

    $('body').on('click', '#select_wishlist a', function (event) {
        event.preventDefault();
        if($('#select_wishlist a.active').length)
            return false;
        let wishlist_btn = $('.add_to_wishlit.active');
        let id_product = wishlist_btn.data('id-product');
        let id_product_attribute = wishlist_btn.data('id-product-attribute');
        let id_wishlist = $(this).addClass('active').data('id-wishlist');
        stWishlistAddProduct(id_wishlist,id_product,id_product_attribute);
        return false;
    });

    $('#side_wishlist_submit').click(function(event){
        event.preventDefault();
        var name = $(this).closest('.form-group').find('.form-control').val();
        if(!name) {
            return false;
        }            
        $(this).addClass('active');
        $.ajax({
            type: 'GET',
            url: stmywishlist_url,
            headers: { "cache-control": "no-cache" },
            async: true,
            cache: false,
            dataType: "json",
            data: {
                name: name,
                ajax: 1,
                action: 'createWishlist'
            },
            success: function (resp)
            {
                $('#side_wishlist_submit').removeClass('active');
                if(resp.success==2)
                    stWishlistGoLogin()
                else if(resp.success==1) {
                    $('#select_wishlist').append(resp.data);
                }
                /*do not use pop when sidebar is opened
                else
                    stWishlistPopup(resp.message);*/
            },
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                $('#side_wishlist_submit').removeClass('active');
            }
        });

        return false;
    });

    prestashop.on('updatedProduct', function (event) {
        $('.wishlist_product').data('id-product-attribute', event.id_product_attribute);
    });
});