<div id="blockcart-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="{l s='Popup shopping cart' d='Shop.Theme.Transformer'}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <a href="javascript:;" class="close st_modal_close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme.Transformer'}">
        <span aria-hidden="true">&times;</span>
      </a>
      <div class="modal-body modal_cart general_border">

        <div class="m-b-1">
            <div class="row">
                <div class="col-md-3">
                    <img class="bordered" src="{$product.cover.medium.url}" alt="{$product.cover.legend}" title="{$product.cover.legend}" />
                </div>
                <div class="col-md-9">
                    <div class="product_name_wrap"><h1 class="product_name">{$product.name}</h1></div>
                    <ul class="list_detail_item">
                        {foreach from=$product.attributes item="property_value" key="property"}
                            <li><span>{$property}:</span>{$property_value}</li>
                        {/foreach}
                        <li><span>{l s='Quantity' d='Shop.Theme.Transformer'}:</span>{$product.cart_quantity}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="alert alert-success" role="alert">
            {l s='Product successfully added to your shopping cart' d='Shop.Theme.Transformer'}   
        </div>

        <div class="modal_cart_details">
            {if $cart.products_count > 1}
                <p class="cart-products-count">{l s='There are %products_count% items in your cart.' sprintf=['%products_count%' => $cart.products_count] d='Shop.Theme.Checkout'}</p>
              {else}
                <p class="cart-products-count">{l s='There is %product_count% item in your cart.' sprintf=['%product_count%' =>$cart.products_count] d='Shop.Theme.Checkout'}</p>
              {/if}
              <ul class="list_detail_item">
                  <li><span>{l s='Total products:' d='Shop.Theme.Checkout'}</span>{$cart.subtotals.products.value}</li>
                  <li><span>{l s='Total shipping:' d='Shop.Theme.Checkout'}</span>{$cart.subtotals.shipping.value} {hook h='displayCheckoutSubtotalDetails' subtotal=$cart.subtotals.shipping}</li>
                  {if $cart.subtotals.tax}
                    <li><span>{$cart.subtotals.tax.label}:</span>{$cart.subtotals.tax.value}</li>
                  {/if}
                  <li><span>{l s='Total:' d='Shop.Theme.Checkout'}</span>{$cart.totals.total.value} {$cart.labels.tax_short}</li>
              </ul>
        </div>

            <div class="cart-content-btn row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-default btn-full-width " data-dismiss="modal">{l s='Continue shopping' d='Shop.Theme.Transformer'}</button>
                </div>
                <div class="col-md-6">
                    <a href="{$cart_url}" class="btn btn-default btn-full-width" rel="nofollow" title="{l s='Proceed to checkout' d='Shop.Theme.Transformer'}">{l s='Proceed to checkout' d='Shop.Theme.Transformer'}</a>
                </div>
            </div>

        {if $cart_cross_selling}
            <section class="modal_products_container products_slider" >
              <div class="title_block flex_container title_align_0 title_style_{(int)$heading_style}">
                  <div class="flex_child title_flex_left"></div>
                  <div class="title_block_inner">{l s='Products you may like' d='Shop.Theme.Transformer'}</div>
                  <div class="flex_child title_flex_right"></div>
                  <div class="swiper-button-tr"><div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div><div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div></div>
              </div>
              <div class="block_content">
                   <div class="swiper-container" {if $is_rtl} dir="rtl" {/if}>
                        <div class="swiper-wrapper">
                            {foreach $cart_cross_selling as $product}
                                <article class="swiper-slide">
                                    <a href="{$product.url}" title="{$product.name}" class="text-center">
                                        <img src="{$product.cover.bySize.small_default.url}" width="{$product.cover.bySize.small_default.width}" height="{$product.cover.bySize.small_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" class="mar_b4" />
                                        {if $product.show_price}<div class="price">{$product.price}</div>{/if} 
                                    </a>
                                </article>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </section>
        {/if}
      </div>
    </div>
  </div>
</div>
