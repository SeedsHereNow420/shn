{*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}
<!-- /MODULE Rightbar cart -->
<div id="rightbar_cart" class="rightbar_wrap">
    <a id="rightbar-shopping_cart" href="{$cart_url}" class="rightbar_tri icon_wrap" title="{l s='View my shopping cart' d='Shop.Theme.Transformer'}">
        <i class="icon-glyph icon_btn icon-0x"></i>
        <span class="icon_text">{l s='Cart' d='Shop.Theme.Transformer'}</span>
        <span class="ajax_cart_quantity amount_circle {if $cart.products_count == 0} simple_hidden {/if}{if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>
    </a>
</div>
<!-- /MODULE Rightbar cart -->