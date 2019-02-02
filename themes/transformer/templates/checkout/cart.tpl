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
{extends file=$layout}

{block name='content'}

  <section id="main">
    <div class="row">

      <!-- Left Block: cart product informations & shpping -->
      <div class="cart-grid-body col-12 col-lg-8 mb-3">

        <!-- cart products detailed -->
        <div class="card card_trans mb-3">
          <div class="card-header">
            {l s='Shopping Cart' d='Shop.Theme.Checkout'}
          </div>
          {block name='cart_overview'}
            {include file='checkout/_partials/cart-detailed.tpl' cart=$cart}
          {/block}
        </div>

        {block name='continue_shopping'}
          <a href="{$urls.pages.index}" class="btn btn-default" title="{l s='Continue shopping' d='Shop.Theme.Actions'}">
            <i class="fto-left-open"></i>{l s='Continue shopping' d='Shop.Theme.Actions'}
          </a>
        {/block}

        <!-- shipping informations -->
        {block name='hook_shopping_cart_footer'}
          {hook h='displayShoppingCartFooter'}
        {/block}
      </div>

      <!-- Right Block: cart subtotal & cart total -->
      <div class="cart-grid-right col-12 col-lg-4  mb-3">

        {block name='cart_summary'}
          <div class="card card_trans cart-summary">

            {block name='hook_shopping_cart'}
              {hook h='displayShoppingCart'}
            {/block}

            {block name='cart_totals'}
              {include file='checkout/_partials/cart-detailed-totals.tpl' cart=$cart}
            {/block}

            {block name='cart_actions'}
              {include file='checkout/_partials/cart-detailed-actions.tpl' cart=$cart}
            {/block}

          </div>
        {/block}

        {block name='hook_reassurance'}
          {hook h='displayReassurance'}
        {/block}

      </div>

    </div>
  </section>
{/block}
