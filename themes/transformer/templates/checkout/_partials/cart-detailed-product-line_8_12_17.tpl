{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div class="product-line-grid container-fluid">
  <div class="row">
  <!--  product left content: image-->
  <div class="product-line-grid-left col-md-2 col-3">
    <span class="product-image media-middle">
      <a href="{$product.url}"><img src="{$product.cover.bySize.cart_default.url}" width="{$product.cover.bySize.cart_default.width}" height="{$product.cover.bySize.cart_default.height}" alt="{$product.name|escape:'quotes'}" /></a>
    </span>
  </div>

  <!--  product left body: description -->
  <div class="product-line-grid-body col-md-5 col-7">
    <div class="product-line-info">
      <a class="label" href="{$product.url}" data-id_customization="{$product.id_customization|intval}" title="{$product.name}">{$product.name}</a>{*can not remove this label class*}
    </div>

    <div class="product-line-info product-price {if $product.has_discount}has-discount{/if} mar_b6">
      {if $product.has_discount}
        <div class="product-discount">
          <span class="regular-price">{$product.regular_price}</span>
          {if $product.discount_type === 'percentage'}
            <span class="discount discount-percentage">
                -{$product.discount_percentage_absolute}
              </span>
          {else}
            <span class="discount discount-amount">
                -{$product.discount_to_display}
              </span>
          {/if}
        </div>
      {/if}
      <div class="current-price">
        <span class="price">{$product.price}</span>
        {if $product.unit_price_full}
          <div class="unit-price-cart">{$product.unit_price_full}</div>
        {/if}
      </div>
    </div>


    {foreach from=$product.attributes key="attribute" item="value"}
      <div class="product-line-info">
        <span class="label">{$attribute}:</span>
        <span class="value">{$value}</span>
      </div>
    {/foreach}

    {if $product.customizations|count}
      <br/>
      {block name='cart_detailed_product_line_customization'}
      {foreach from=$product.customizations item="customization"}
        <a href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization}" data-backdrop=false>{l s='Product customization' d='Shop.Theme.Catalog'}</a>
        <div class="modal fade customization-modal" id="product-customizations-modal-{$customization.id_customization}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <button type="button" class="st_modal_close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme'}">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="modal-body base_list_line general_border">
                <h6 class="fs_md mb-3">{l s='Product customization' d='Shop.Theme.Catalog'}</h6>
                {foreach from=$customization.fields item="field"}
                  <div class="product-customization-line line_item row">
                    <div class="col-sm-3 col-4 label">
                      {$field.label}
                    </div>
                    <div class="col-sm-9 col-8 value">
                      {if $field.type == 'text'}
                        {if (int)$field.id_module}
                          {$field.text nofilter}
                        {else}
                          {$field.text}
                        {/if}
                      {elseif $field.type == 'image'}
                        <img src="{$field.image.small.url}" alt="{$field.label}" />
                      {/if}
                    </div>
                  </div>
                {/foreach}
              </div>
            </div>
          </div>
        </div>
      {/foreach}
      {/block}
    {/if}
  </div>

  <!--  product left body: description -->
  <div class="product-line-grid-right product-line-actions col-md-5 col-12">
    <div class="row">
      <div class="col-3 hidden-md-up"></div>
      <div class="col-md-10 col-7">
        <div class="row">
          <div class="col-md-6 col-6 qty">
            {if isset($product.is_gift) && $product.is_gift}
              <span class="gift-quantity">{$product.quantity}</span>
            {else}
              <div class="qty_wrap">
                <input
                  class="js-cart-line-product-quantity cart_quantity cart_quantity_{$product.id_product}"
                  data-down-url="{$product.down_quantity_url}"
                  data-up-url="{$product.up_quantity_url}"
                  data-update-url="{$product.update_quantity_url}"
                  data-product-id="{$product.id_product}"
                  type="text"
                  value="{$product.quantity}"
                  name="product-quantity-spin"
                  min="{$product.minimal_quantity}"
                />
              </div>
            {/if}
          </div>
          <div class="col-md-6 col-2">
            <span class="product-price price">
              <strong>{*can not remove this strong tag*}
                {if isset($product.is_gift) && $product.is_gift}
                  <span class="gift">{l s='Gift' d='Shop.Theme.Checkout'}</span>
                {else}
                  {$product.total}
                {/if}
              </strong>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-2 text-right">
        <div class="cart-line-product-actions ">
          <a
              class                       = "remove-from-cart"
              rel                         = "nofollow"
              href                        = "{$product.remove_from_cart_url}"
              data-link-action            = "delete-from-cart"
              data-id-product             = "{$product.id_product|escape:'javascript'}"
              data-id-product-attribute   = "{$product.id_product_attribute|escape:'javascript'}"
              data-id-customization   	  = "{$product.id_customization|escape:'javascript'}"
          >
            {if !isset($product.is_gift) || !$product.is_gift}
              <i class="fto-cancel"></i>
            {/if}
          </a>
          {block name='hook_cart_extra_product_actions'}
            {hook h='displayCartExtraProductActions' product=$product}
          {/block}
        </div>
      </div>
    </div>
  </div>

</div>
</div>
