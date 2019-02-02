{*
* 2007-2014 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div id="viewed_top" class="top_bar_item dropdown_wrap">
	<div class="dropdown_tri dropdown_tri_in header_item" aria-haspopup="true" aria-expanded="false">
        <i class="fto-history mar_r4"></i><span id="viewed_top_lable">{l s='Recently Viewed' d='Shop.Theme.Transformer'}</span>
        <i class="fto-angle-down arrow_down arrow"></i>
        <i class="fto-angle-up arrow_up arrow"></i>
    </div>
	<div class="dropdown_list" aria-labelledby="viewed_top_lable">
        <div class="dropdown_box dropdown_box_viewed">
			{if isset($products) && count($products)}
				{foreach $products as $product}
		            {include file="catalog/_partials/miniatures/product-slider-item-compact.tpl"}
		        {/foreach}
			{else}
				<div class="viewed_products_no_products">
					{l s='No products' d='Shop.Theme.Transformer'}
				</div>
			{/if}
        </div>
	</div>
</div>