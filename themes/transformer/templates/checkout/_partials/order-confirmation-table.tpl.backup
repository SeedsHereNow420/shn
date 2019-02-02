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

<div class="order-confirmation-wrap">
  {block name='order-items-table-head'}
    <h6 class="page_heading">{l s='Order items' d='Shop.Theme.Checkout'}</h6>
  {/block}
  <div class="order-confirmation-table order-summary-block">
    {block name='order_confirmation_table'}
      <div class="base_list_line medium_list dotted_line">
      {foreach from=$products item=product}
        <div class="order-line row line_item">
          <div class="col-sm-2 col-3">
            <img src="{$product.cover.bySize.cart_default.url}" width="{$product.cover.bySize.cart_default.width}" height="{$product.cover.bySize.cart_default.height}" alt="{$product.name}" />
          </div>
          <div class="col-sm-4 col-9 details">
            {if $add_product_link}<a href="{$product.url}" target="_blank" title="{$product.name}">{/if}
              <span>{$product.name}</span>
            {if $add_product_link}</a>{/if}
            {if $product.customizations|count}
              {foreach from=$product.customizations item="customization"}
                <div class="customizations">
                  <a href="#" data-toggle="modal" data-target="#product-customizations-modal-{$customization.id_customization}" data-backdrop=false>{l s='Product customization' d='Shop.Theme.Catalog'}</a>
                </div>
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
                                <img src="{$field.image.small.url}" alt="{$field.label}">
                              {/if}
                            </div>
                          </div>
                        {/foreach}
                      </div>
                    </div>
                  </div>
                </div>
              {/foreach}
            {/if}
            {hook h='displayProductPriceBlock' product=$product type="unit_price"}
          </div>
          <div class="col-sm-6 col-12 qty">
            <div class="row">
              <div class="col-5 text-sm-right text-1">{$product.price}</div>
              <div class="col-2">{$product.quantity}</div>
              <div class="col-5 text-right bold">{$product.total}</div>
            </div>
          </div>
        </div>
      {/foreach}
      </div>
    <hr />
    <div class="cart-summary-wrap">
      {hook h="displayCartRuleOrderConfirmation" order=$order.details}
                                {foreach $subtotals as $subtotal}
        {if $subtotal.type !== 'tax'}
          <div class="cart-summary-line clearfix">
            <span class="label">{$subtotal.label}</span>
            <span class="value price">{$subtotal.value}</span>
          </div>
        {/if}
      {/foreach}
      {if $subtotals.tax.label !== null}
          <div class="cart-summary-line clearfix">
            <span class="label">{$subtotal.label}</span>
            <span class="value price">{$subtotal.value}</span>
          </div>
      {/if}

      <div class="cart-summary-line clearfix cart-total">
        <span class="label">{$totals.total.label} {$labels.tax_short}</span>
        <span class="value price fs_lg font-weight-bold">{$totals.total.value}</span>
      </div>
    </div>
    {/block}
  </div>
</div>
