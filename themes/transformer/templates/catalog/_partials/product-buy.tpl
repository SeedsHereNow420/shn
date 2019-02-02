            <div class="product-actions">
              {block name='product_buy'}
                <form action="{$urls.pages.cart}" method="post" id="add-to-cart-or-refresh">
                  <input type="hidden" name="token" value="{$static_token}">
                  <input type="hidden" name="id_product" value="{$product.id}" id="product_page_product_id">
                  <input type="hidden" name="id_customization" value="{$product.id_customization}" id="product_customization_id">

                  
                  
                  {block name='product_variants'}
                    {include file='catalog/_partials/product-variants.tpl'}
                  {/block}

                  {block name='product_pack'}
                    {if $packItems}
                      <section class="product-pack mb-3">
                        <div class="page_heading">{l s='This pack contains' d='Shop.Theme.Catalog'}</div>
                        <div class="base_list_line">
                        {foreach from=$packItems item="product_pack"}
                          {block name='product_miniature'}
                            {include file='catalog/_partials/miniatures/pack-product.tpl' product=$product_pack}
                          {/block}
                        {/foreach}
                        </div>
                    </section>
                    {/if}
                  {/block}

                  {block name='product_discounts'}
                    {include file='catalog/_partials/product-discounts.tpl'}
                  {/block}

                    {block name='product_add_to_cart'}
                      {include file='catalog/_partials/product-add-to-cart.tpl'}
                    {/block}

                  <div class="steasy_divider between_detials_and_buttons"><div class="steasy_divider_item"></div></div>

                  {block name='product_additional_info'}
                    {include file='catalog/_partials/product-additional-info.tpl'}
                  {/block}


                  {block name='product_refresh'}
                    <input class="product-refresh ps-hidden-by-js btn btn-default hidden" name="refresh" type="submit" value="{l s='Refresh' d='Shop.Theme.Actions'}">
                  {/block}
                </form>

              {/block}

            </div>