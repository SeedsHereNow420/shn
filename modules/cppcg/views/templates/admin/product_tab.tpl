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
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2007-2017 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
*}

<div class="product-tab p-b-1">
	<h2>{l s='Set product price for specific customer group.' mod='cppcg'}</h2>
	<div class="alert alert-info">
	<i class="material-icons">help</i>
		<p>{l s='On this tab you can set specific product price for specific customer group.' mod='cppcg'}</p>
		<p>{l s='If fields are left empty, then default product price (Pricing) will be used as primary for respective customer groups.' mod='cppcg'}</p>
	</div>	
	
</div>
{foreach from=$groups item='group'}
	<div id="price-customer-group_{$group.id_group|escape:'htmlall':'UTF-8'}" class="col-md-12 p-b-1">
	<h2>{$group.name|escape:'htmlall':'UTF-8'}</h2>
		<div class="form-group">
			<label class="control-label col-lg-2" for="price_tax_exluded_{$group.id_group|escape:'htmlall':'UTF-8'}">
				{l s='Product price' mod='cppcg'}
			</label>
			<div class="col-lg-2">
				<div class="input-group money-type">
					<span class="input-group-addon">{$currency->prefix|escape:'htmlall':'UTF-8'}{$currency->sign|escape:'htmlall':'UTF-8'}</span>						
					<input size="11" maxlength="27" class="form-control" id="price_tax_exluded_{$group.id_group|escape:'htmlall':'UTF-8'}" name="price_tax_exluded[{$group.id_group|escape:'htmlall':'UTF-8'}]" type="text" value="{{toolsConvertPrice price=$group.price}|string_format:'%.6f'}" />
				</div>
			</div>
		</div>

	</div>	
{/foreach}