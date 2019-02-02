<div class="hover_fly hover_fly_{(int)$sttheme.flyout_buttons_style} flex_container {if $sttheme.flyout_buttons_on_mobile==1} mobile_hover_fly_show {elseif $sttheme.flyout_buttons_on_mobile==2} mobile_hover_fly_cart {else} mobile_hover_fly_hide {/if}">
          {if !$sttheme.display_add_to_cart && $sttheme.pro_quantity_input!=1 && $sttheme.pro_quantity_input!=3}
            {if $has_add_to_cart}
              {include file='catalog/_partials/miniatures/btn-add-to-cart.tpl'}
            {else}
              {include file='catalog/_partials/miniatures/btn-view-more.tpl'}{*is_select_options=true to do find a way to tell products can not have add to cart button just because of they have attributes *}
            {/if}
          {/if}
          {if $sttheme.flyout_quickview && (!isset($from_product_page) || !$from_product_page)}{include file='catalog/_partials/miniatures/btn-quick-view.tpl'}{/if}
          {if !$sttheme.use_view_more_instead && !$sttheme.display_add_to_cart && $has_add_to_cart}{include file='catalog/_partials/miniatures/btn-view-more.tpl'}{/if}
          {if isset($wishlist_position) && !$wishlist_position}
            {include file='module:stwishlist/views/templates/hook/fly.tpl'}
          {/if}
          {if isset($loved_position) && !$loved_position}
            {include file='module:stlovedproduct/views/templates/hook/fly.tpl' id_source=$product.id_product}
          {/if}
          {include file='module:stsocial/views/templates/hook/stsocial-hover-fly.tpl'}
      </div>