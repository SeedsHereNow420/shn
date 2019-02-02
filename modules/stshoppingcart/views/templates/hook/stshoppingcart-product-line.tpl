<div class="flex_container flex_start">
    <img class="small_cart_product_image" src="{$product.cover.bySize.cart_default.url}" width="{$product.cover.bySize.cart_default.width}" height="{$product.cover.bySize.cart_default.height}" alt="{$product.cover.legend}" title="{$product.cover.legend}" itemprop="image">
    <div class="small_cart_info flex_child">
        <div class="flex_container flex_start mar_b4">
            <span class="product-quantity mar_r4">{$product.quantity}x</span>
            <a href="{$product.url}" rel="nofollow" title="{$product.name}" class="product-name mar_r4 flex_child">{$product.name|truncate:30:'...'}</a>
            <div class="price mar_r4">{$product.price}</div>
            <a  class="ajax_remove_button"
                rel="nofollow"
                href="{$product.remove_from_cart_url}"
                data-link-action="remove-from-cart"
                title="{l s="Remove" d="Shop.Theme.Actions"}"
            >
                <i class="fto-cancel"></i>
            </a>
        </div>
        <div class="flex_container flex_start">
        {assign var='pro_quantity_input' value=Configuration::get('STSN_PRO_QUANTITY_INPUT')}
        {if $pro_quantity_input==2 || $pro_quantity_input==3}
        <div class="qty_wrap mar_t4">
            <input
                class="cart_quantity cart_quantity_{$product.id_product}"
                type="text"
                value="{$product.quantity}"
                name="cart_quantity"
              data-down-url="{$product.down_quantity_url}"
              data-up-url="{$product.up_quantity_url}"
              data-update-url="{$product.update_quantity_url}"
              data-product-id="{$product.id_product}"
                data-minimal-quantity="{$product.minimal_quantity}"
              />
        </div>
        {/if}
        {if count($product.attributes)}
        <div class="flex_child">
        {foreach from=$product.attributes item="property_value" key="property"}
          <div class="small_cart_attr_attr">
              <span class="small_cart_attr_k">{$property}:</span><span>{$property_value}</span>
          </div>
        {/foreach}
        </div>
        {/if}
        </div>
    </div>
</div>
{if $product.customizations|count}
    <div class="customizations">
        <ul class="base_list_line">
            {foreach from=$product.customizations item="customization"}
                <li class="line_item">
                    <span class="product-quantity">{$customization.quantity}</span>
                    <a href="{$customization.remove_from_cart_url}" class="remove-from-cart" rel="nofollow">{l s='Remove' d="Shop.Theme.Actions"}</a>
                    <ul>
                        {foreach from=$customization.fields item="field"}
                            <li>
                                <span class="mar_r6 font-weight-bold">{$field.label}</span>
                                {if $field.type == 'text'}
                                    <span>{$field.text nofilter}</span>
                                {elseif $field.type == 'image'}
                                    <img src="{$field.image.small.url}" alt="{$field.label}" />
                                {/if}
                            </li>
                        {/foreach}
                    </ul>
                </li>
            {/foreach}
        </ul>
    </div>
{/if}
