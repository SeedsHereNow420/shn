<div class="blockcart dropdown_wrap top_bar_item shopping_cart_style_{$block_cart_style} clearfix" data-refresh-url="{$refresh_url}">{strip}
  <a href="{$cart_url}" title="{l s='View my shopping cart' d='Shop.Theme.Transformer'}" rel="nofollow" class="st_shopping_cart dropdown_tri header_item {if $click_on_header_cart} rightbar_tri {/if}" data-name="side_products_cart" data-direction="open_bar_{if $click_on_header_cart==2}left{else}right{/if}">
    <div class="flex_container">
      <div class="ajax_cart_bag cart_icon_item">
        <i class="fto-glyph icon_btn"></i>
        {if $block_cart_style==0 && $block_cart_info&1}<span class="icon_text">{l s='Cart' d='Shop.Theme.Transformer'}</span>{/if}
        {if $block_cart_info&4}<span class="ajax_cart_quantity amount_circle {if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>{/if}
      </div>
      {if $block_cart_style!=0 && $block_cart_info&1}
      <span class="cart_text cart_icon_item">{l s='Shopping cart' d='Shop.Theme.Transformer'}</span>
      {/if}
      {if $block_cart_info&2}
      <span class="ajax_cart_quantity cart_icon_item">{$cart.products_count}</span>
      <span class="ajax_cart_product_txt cart_icon_item">{l s='item(s)' d='Shop.Theme.Transformer'}</span>
      {/if}
      {if ($block_cart_info&1 || $block_cart_info&2 ) && $block_cart_info&8}
      <span class="ajax_cart_split cart_icon_item">{l s='-' d='Shop.Theme.Transformer'}</span>
      {/if}
      {if $block_cart_info&8}
      <span class="ajax_cart_total cart_icon_item">{$cart.totals.total.value}</span>
      {/if}
    </div>
  </a>{strip}
  {if $hover_display_cp}
  <div class="dropdown_list cart_body {if $hover_display_cp==1 && !$cart.products_count} no_show_empty {/if}">
    <div class="dropdown_box">
      {include file='module:stshoppingcart/views/templates/hook/stshoppingcart-list.tpl'}
    </div>
  </div>
  {/if}
</div>
