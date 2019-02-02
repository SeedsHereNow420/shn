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
<a href="javascript:;" rel="nofollow" title="{l s='Cart' d='Shop.Theme.Transformer'}" class="cart_mobile_bar_tri mobile_bar_tri mobile_bar_item shopping_cart_style_2" data-name="side_products_cart" data-direction="open_bar_right">
	<div class="ajax_cart_bag">
		<span class="ajax_cart_quantity amount_circle {if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>
		<i class="icon-glyph icon_btn"></i>
	</div>
	<span class="mobile_bar_tri_text">{l s='Cart' d='Shop.Theme.Transformer'}</span>
</a>
