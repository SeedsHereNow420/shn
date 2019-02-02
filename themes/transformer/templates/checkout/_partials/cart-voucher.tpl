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
{if $cart.vouchers.allowed}
  {block name='cart_voucher'}
  <div class="cart-voucher">
  <hr>
    <div class="card-block">
      {hook h="displayCartRuleCartVoucher" discounts=$cart.vouchers}
                                {if $cart.vouchers.added}
        <ul class="promo-name mar_b10">
          {foreach from=$cart.vouchers.added item=voucher}
            {block name='cart_voucher_list'}
            <li class="cart-summary-line">
              <span class="label">{$voucher.name}</span>
              <a href="{$voucher.delete_url}" data-link-action="remove-voucher" title="{l s='Remove' d='Shop.Theme.Actions'}"><i class="fto-cancel mar_l4"></i></a>
              <div class="value">
                {$voucher.reduction_formatted}
              </div>
            </li>
            {/block}
          {/foreach}
        </ul>
      {/if}
      <div class="mar_b10">
        <a class="collapse-button promo-code-button go" data-toggle="collapse" href="#promo-code" aria-expanded="false" aria-controls="promo-code">
          {l s='Have a promo code?' d='Shop.Theme.Checkout'}
        </a>
      </div>
      <div class="promo-code collapse{if $cart.discounts|count > 0} in{/if}" id="promo-code">
        {block name='cart_voucher_form'}
        <form action="{$urls.pages.cart}" data-link-action="add-voucher" method="post">
          <input type="hidden" name="token" value="{$static_token}">
          <input type="hidden" name="addDiscount" value="1">
          <div class="input-group mar_b10">
            <input class="promo-input form-control" type="text" name="discount_name" placeholder="{l s='Promo code' d='Shop.Theme.Checkout'}">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default"><span>{l s='Add' d='Shop.Theme.Actions'}</span></button>
            </span>
          </div>
        </form>
        {/block}
        {block name='cart_voucher_notifications'}
        <div class="alert alert-danger js-error" role="alert">
          <span class="js-error-text"></span>
        </div>
        {/block}
      </div>
      {if $cart.discounts|count > 0}
        <p class="block-promo promo-highlighted mar_b10">
          {l s='Take advantage of our exclusive offers:' d='Shop.Theme.Actions'}
        </p>
        <ul class="js-discount promo-discounts m-b-0">
        {foreach from=$cart.discounts item=discount}
          <li class="cart-summary-line clearfix">
            <span class="label"><span class="code">{$discount.code}</span> - {$discount.name}</span>
          </li>
        {/foreach}
        </ul>
      {/if}
    </div>
  </div>
  {/block}
{/if}
