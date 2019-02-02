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
*  @author    SeoSA <885588@bk.ru>
*  @copyright 2012-2017 SeoSA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($display_multishop_checkboxes) && $display_multishop_checkboxes}
	<div class="panel clearfix">
		<label class="control-label col-lg-3">
			<i class="icon-sitemap"></i> {l s='Multistore' mod='dgridproducts'}
		</label>
		<div class="col-lg-9">
			<div class="row">
				<div class="col-lg-4">
					<span class="switch prestashop-switch">
						<input type="radio" name="multishop_{$product_tab|escape:'quotes':'UTF-8'}" id="multishop_{$product_tab|escape:'quotes':'UTF-8'}_on" value="1" onclick="$('#product-tab-content-{$product_tab|escape:'quotes':'UTF-8'} input[name^=\'multishop_check[\']').attr('checked', true); ProductMultishop.checkAll{$product_tab|escape:'quotes':'UTF-8'}()">
						<label for="multishop_{$product_tab|escape:'quotes':'UTF-8'}_on">
							{l s='Yes' mod='dgridproducts'}
						</label>
						<input type="radio" name="multishop_{$product_tab|escape:'quotes':'UTF-8'}" id="multishop_{$product_tab|escape:'quotes':'UTF-8'}_off" value="0" checked="checked" onclick="$('#product-tab-content-{$product_tab|escape:'quotes':'UTF-8'} input[name^=\'multishop_check[\']').attr('checked', false); ProductMultishop.checkAll{$product_tab|escape:'quotes':'UTF-8'}()">
						<label for="multishop_{$product_tab|escape:'quotes':'UTF-8'}_off">
							{l s='No' mod='dgridproducts'}
						</label>
						<a class="slide-button btn"></a>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<p class="help-block">
						<strong>{l s='Check / Uncheck all' mod='dgridproducts'}</strong> {l s='(If you are editing this page for several shops, some fields may be disabled. If you need to edit them, you will need to check the box for each field)' mod='dgridproducts'}
					</p>
				</div>
			</div>
		</div>
	</div>
{/if}
