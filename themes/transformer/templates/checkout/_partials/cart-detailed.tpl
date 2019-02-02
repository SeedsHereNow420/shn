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
{block name='cart_detailed_product'}
<div class="cart-overview js-cart" data-refresh-url="{url entity='cart' params=['ajax' => true, 'action' => 'refresh']}">
  {if $cart.products}
  <ul class="cart-items base_list_line mb-3 m-t-1">
    {foreach $cart.products as $product}
      <li class="cart-item line_item">
        {block name='cart_detailed_product_line'}
          {include file='checkout/_partials/cart-detailed-product-line.tpl' product=$product}
        {/block}
      </li>
      {if $product.customizations|count >1}<hr>{/if}
    {/foreach}
  </ul>
  {else}
    <div class="no-items pad_10">{l s='There are no more items in your cart' d='Shop.Theme.Checkout'}</div>
  {/if}
</div>
{/block}