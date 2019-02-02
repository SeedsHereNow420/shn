      <div class="shoppingcart-list">
      {if $cart.products_count}
          <ul class="small_cart_product_list base_list_line medium_list">
            {foreach from=$cart.products item=product}
              <li class="line_item">{include file='module:stshoppingcart/views/templates/hook/stshoppingcart-product-line.tpl' product=$product}</li>
            {/foreach}
            {if $cart.vouchers.added}
                {foreach from=$cart.vouchers.added item=voucher}
                  <li class="line_item">
                    <div class="flex_container flex_start">
                      <span class="mar_r4">{$voucher.name}</span>
                      <span class="mar_r4">{$voucher.reduction_formatted}</span>
                      <a href="{$voucher.delete_url}" data-link-action="remove-voucher" class="flex_child" title="{l s='Remove' d='Shop.Theme.Actions'}"><i class="fto-cancel mar_l4"></i></a>
                    </div>
                  </li>
                {/foreach}
            {/if}
          </ul>
          <div class="small_cart_sumary base_list_line">
            {foreach from=$cart.subtotals item="subtotal"}
              {if $subtotal.value && $subtotal.type !== 'tax'}
                <div class="line_item flex_container flex_space_between">
                  <span class="cart-summary-k">
                    {if 'products' == $subtotal.type}
                      {$cart.summary_string}
                    {else}
                      {$subtotal.label}
                    {/if}
                  </span>
                  <div class="cart-summary-v price">
                    {$subtotal.value}
                    {if $subtotal.type === 'shipping'}
                        <div class="shipping_sub_total_details">{hook h='displayCheckoutSubtotalDetails' subtotal=$subtotal}</div>
                    {/if}
                  </div>
                  
                </div>
              {/if}
            {/foreach}
            <div class="line_item last_one flex_container flex_space_between">
              <span class="cart-summary-k">{$cart.totals.total.label} {$cart.labels.tax_short}</span><span class="cart-summary-v price font-weight-bold">{$cart.totals.total.value}</span>
            </div>
            <div class="line_item flex_container flex_space_between">
              <span class="cart-summary-k">{$cart.subtotals.tax.label}</span><span class="cart-summary-v price">{$cart.subtotals.tax.value}</span>
            </div>
          </div>
          <a href="{$cart_url}" rel="nofollow" class="small_cart_btn btn btn-default btn_full_width" title="{l s='Checkout' d='Shop.Theme.Actions'}">{l s='Checkout' d='Shop.Theme.Actions'}</a>
      {else}
        <div class="cart_empty">{l s='Your shopping cart is empty.' d='Shop.Theme.Transformer'}</div>
      {/if}
      </div>