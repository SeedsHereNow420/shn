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
<section id="order-summary-content" class="page-content page-order-confirmation">
  <h6 class="fs_md heading_color">{l s='Please check your order before payment' d='Shop.Theme.Checkout'}</h6>
   

  <div class="mar_b10">
    <span class="fs_md heading_color mar_r6">
      {l s='Addresses' d='Shop.Theme.Checkout'}
    </span>
    <a href="javascript:;" class="step-edit text_color step-to-addresses js-edit-addresses" title="{l s='Edit' d='Shop.Theme.Actions'}"><i class="fto-edit fs_md mar_r4 edit"></i></a>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="pad_10 general_border mb-3">
        <div class="heading_color">{l s='Your Delivery Address' d='Shop.Theme.Checkout'}</div>
        {$customer.addresses[$cart.id_address_delivery]['formatted'] nofilter}
      </div>
    </div>
    <div class="col-md-6">
      <div class="pad_10 general_border mb-3">
        <div class="heading_color">{l s='Your Invoice Address' d='Shop.Theme.Checkout'}</div>
        {$customer.addresses[$cart.id_address_invoice]['formatted'] nofilter}
      </div>
    </div>
  </div>

  <div class="mar_b10">
    <span class="fs_md heading_color mar_r6">
      {l s='Shipping Method' d='Shop.Theme.Checkout'}
    </span>
    <a href="javascript:;" class="step-edit text_color step-to-delivery js-edit-delivery" title="{l s='Edit' d='Shop.Theme.Actions'}"><i class="fto-edit fs_md mar_r4 edit"></i></a>
  </div>
  <div class="row summary-selected-carrier order-summary-block">
    <div class="col-md-2">
      <div class="logo-container">
        {if $selected_delivery_option.logo}
          <img src="{$selected_delivery_option.logo}" alt="{$selected_delivery_option.name}" />
        {else}
          &nbsp;
        {/if}
      </div>
    </div>
    <div class="col-md-4">
      <span class="carrier-name">{$selected_delivery_option.name}</span>
    </div>
    <div class="col-md-4">
      <span class="carrier-delay">{$selected_delivery_option.delay}</span>
    </div>
    <div class="col-md-2">
      <span class="carrier-price">{$selected_delivery_option.price}</span>
    </div>
  </div>

    {block name='order_confirmation_table'}
      {include file='checkout/_partials/order-final-summary-table.tpl'
         products=$cart.products
         products_count=$cart.products_count
         subtotals=$cart.subtotals
         totals=$cart.totals
         labels=$cart.labels
         add_product_link=true
       }
    {/block}

</section>
