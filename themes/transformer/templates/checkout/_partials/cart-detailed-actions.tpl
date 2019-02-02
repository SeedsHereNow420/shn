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
{block name='cart_detailed_actions'}
<div class="checkout cart-detailed-actions card-block">
  {if $cart.minimalPurchaseRequired}
    <div class="alert alert-warning" role="alert">
      {$cart.minimalPurchaseRequired}
    </div>
    <button type="button" class="btn btn-default disabled btn-full-width" disabled>{l s='Proceed to checkout' d='Shop.Theme.Actions'}</button>
  {elseif empty($cart.products) }
    <div class="text-center">
      <button type="button" class="btn btn-default disabled" disabled>{l s='Proceed to checkout' d='Shop.Theme.Actions'}</button>
    </div>
  {else}
    <a href="{$urls.pages.order}" class="btn btn-default btn-full-width">{l s='Proceed to checkout' d='Shop.Theme.Actions'}</a>
    {hook h='displayExpressCheckout'}
  {/if}
</div>
{/block}