{*
* 2007-2016 PrestaShop
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
* @author    SeoSA <885588@bk.ru>
* @copyright 2012-2017 SeoSA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}

<tr class="product_{$product.id_product|intval}">
	<td style="width: 100px; text-align: center;">
		{$product.id_product|intval}
		<input name="id_product" type="hidden" value="{$product.id_product|intval}"/>
		<input name="product" class="product_checkbox" type="checkbox"/>
		<div class="wrapp_checkbox"><i class="icon-check"></i></div>
	</td>
	<td>{$product.image|escape:'quotes':'UTF-8'}</td>
	<td data-name>{$product.name|escape:'quotes':'UTF-8'}</td>
	<td data-reference>{$product.reference|escape:'quotes':'UTF-8'}</td>
	<td data-category>{$product.category|escape:'quotes':'UTF-8'}</td>
	<td data-price>{displayPrice price=$product.price currency=$currency}</td>
	<td data-price_final>{displayPrice price=$product.price_final currency=$currency}</td>
	<td data-manufacturer>{$product.manufacturer|escape:'quotes':'UTF-8'}</td>
	<td data-supplier>{$product.supplier|escape:'quotes':'UTF-8'}</td>
	<td data-quantity>{$product.quantity|intval}</td>
	<td data-stock_management><img src="../img/admin/{if $product.advanced_stock_management}enabled.gif{else}disabled.gif{/if}"></td>
	<td data-active><img src="../img/admin/{if $product.active}enabled.gif{else}disabled.gif{/if}"></td>
	<td data-combinations="{$product.id_product|intval}"></td>
</tr>