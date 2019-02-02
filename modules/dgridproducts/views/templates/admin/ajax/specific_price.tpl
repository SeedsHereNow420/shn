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

<script type="text/javascript">
	var Customer = new Object();
	var product_url = '{$link->getAdminLink('AdminProducts', true)|addslashes|escape:'quotes':'UTF-8'}';
	var ecotax_tax_excl = parseFloat({$product->ecotax|floatval});
	var priceDisplayPrecision = {$smarty.const._PS_PRICE_DISPLAY_PRECISION_|intval};
	var delete_price_rule = "{l s='You want delete specific price?' mod='dgridproducts'}";

	var combination_prices = {$combination_prices|json_encode|escape:'quotes':'UTF-8'};
	var product_price = {$product_price|floatval};

	$(document).ready(function () {
		Customer = {
			"hiddenField": jQuery('#id_customer'),
			"field": jQuery('#customer'),
			"container": jQuery('#customers'),
			"loader": jQuery('#customerLoader'),
			"init": function() {
				jQuery(Customer.field).typeWatch({
					"captureLength": 1,
					"highlight": true,
					"wait": 50,
					"callback": Customer.search
				}).focus(Customer.placeholderIn).blur(Customer.placeholderOut);
			},
			"placeholderIn": function() {
				if (this.value == '{l s='All customers' mod='dgridproducts'}') {
					this.value = '';
				}
			},
			"placeholderOut": function() {
				if (this.value == '') {
					this.value = '{l s='All customers' mod='dgridproducts'}';
				}
			},
			"search": function()
			{
				Customer.showLoader();
				jQuery.ajax({
					"type": "POST",
					"url": "{$link->getAdminLink('AdminCustomers')|addslashes|escape:'quotes':'UTF-8'}",
					"async": true,
					"dataType": "json",
					"data": {
						"ajax": "1",
						"token": "{getAdminToken tab='AdminCustomers'}",
						"tab": "AdminCustomers",
						"action": "searchCustomers",
						"customer_search": Customer.field.val()
					},
					"success": Customer.success
				});
			},
			"success": function(result)
			{
				if(result.found) {
					var html = '<ul class="list-unstyled">';
					jQuery.each(result.customers, function() {
						html += '<li><a class="fancybox" href="{$link->getAdminLink('AdminCustomers')|escape:'quotes':'UTF-8'}&id_customer='+this.id_customer+'&viewcustomer&liteDisplaying=1">'+this.firstname+' '+this.lastname+'</a>'+(this.birthday ? ' - '+this.birthday:'');
						html += ' - '+this.email;
						html += '<a onclick="Customer.select('+this.id_customer+', \''+this.firstname+' '+this.lastname+'\'); return false;" href="#" class="btn btn-default">{l s='Choose' mod='dgridproducts'}</a></li>';
					});
					html += '</ul>';
				}
				else
					html = '<div class="alert alert-warning warning">{l s='No customers found' mod='dgridproducts'}</div>';
				Customer.hideLoader();
				Customer.container.html(html);
				jQuery('.fancybox', Customer.container).fancybox();
			},
			"select": function(id_customer, fullname)
			{
				Customer.hiddenField.val(id_customer);
				Customer.field.val(fullname);
				Customer.container.empty();
				return false;
			},
			"showLoader": function() {
				Customer.loader.fadeIn();
			},
			"hideLoader": function() {
				Customer.loader.fadeOut();
			}
		};
		Customer.init();
	});
</script>
{capture assign=priceDisplayPrecisionFormat}{'%.'|cat:$smarty.const._PS_PRICE_DISPLAY_PRECISION_|cat:'f'|escape:'quotes':'UTF-8'}{/capture}
<script>
	var currencies = new Array();
	currencies[0] = new Array();
	currencies[0]["sign"] = "{$defaultCurrency->sign|escape:'quotes':'UTF-8'}";
	currencies[0]["format"] = "{$defaultCurrency->format|escape:'quotes':'UTF-8'}";
	{foreach from=$currencies item=c}
		currencies[{$c['id_currency']|escape:'quotes':'UTF-8'}] = new Array();
		currencies[{$c['id_currency']|escape:'quotes':'UTF-8'}]["sign"] = "{$c['sign']|escape:'quotes':'UTF-8'}";
		currencies[{$c['id_currency']|escape:'quotes':'UTF-8'}]["format"] = "{$c['format']|escape:'quotes':'UTF-8'}";
	{/foreach}
</script>
<div class="content_forms">
<div class="content_form p_{$ps_version|replace:'.':''|escape:'quotes':'UTF-8'}">
	{$table|no_escape}
	<div>
		<button id="show_specific_price" type="button" class="btn btn-default">
			<span>{l s='Create specific price' mod='dgridproducts'}</span>
		</button>
		<button style="display: none;" id="hide_specific_price" type="button" class="btn btn-danger">
			<span>{l s='Cancel create specific price' mod='dgridproducts'}</span>
		</button>
	</div>
	<form id="form_specific_price" style="display: none;">
		<input type="hidden" value="{$product->id|intval}" name="id_product"/>
		<div class="form_row">
			<label for="{if !$multi_shop}spm_currency_0{else}sp_id_shop{/if}">{l s='For' mod='dgridproducts'}</label>
			<div>
				{if !$multi_shop}
					<input type="hidden" name="sp_id_shop" value="0" />
				{else}
					<div class="col_quarter">
						<select name="sp_id_shop" id="sp_id_shop">
							{if !$admin_one_shop}<option value="0">{l s='All shops' mod='dgridproducts'}</option>{/if}
							{foreach from=$shops item=shop}
								<option value="{$shop.id_shop|escape:'quotes':'UTF-8'}">{$shop.name|htmlentitiesUTF8|escape:'quotes':'UTF-8'}</option>
							{/foreach}
						</select>
					</div>
				{/if}
				<div class="col_quarter">
					<select name="sp_id_currency" id="spm_currency_0" onchange="changeCurrencySpecificPrice(0);">
						<option value="0">{l s='All currencies' mod='dgridproducts'}</option>
						{foreach from=$currencies item=curr}
							<option value="{$curr.id_currency|escape:'quotes':'UTF-8'}">{$curr.name|htmlentitiesUTF8|escape:'quotes':'UTF-8'}</option>
						{/foreach}
					</select>
				</div>
				<div class="col_quarter">
					<select name="sp_id_country" id="sp_id_country">
						<option value="0">{l s='All countries' mod='dgridproducts'}</option>
						{foreach from=$countries item=country}
							<option value="{$country.id_country|escape:'quotes':'UTF-8'}">{$country.name|htmlentitiesUTF8|escape:'quotes':'UTF-8'}</option>
						{/foreach}
					</select>
				</div>
				<div class="col_quarter">
					<select name="sp_id_group" id="sp_id_group">
						<option value="0">{l s='All groups' mod='dgridproducts'}</option>
						{foreach from=$groups item=group}
							<option value="{$group.id_group|escape:'quotes':'UTF-8'}">{$group.name|escape:'quotes':'UTF-8'}</option>
						{/foreach}
					</select>
				</div>
			</div>
		</div>
		<div class="form_row">
			<label for="customer">{l s='Customer' mod='dgridproducts'}</label>
			<div class="col_half">
				<input type="hidden" name="sp_id_customer" id="id_customer" value="0" />
				<div class="input-group">
					<input type="text" name="customer" value="{l s='All customers' mod='dgridproducts'}" id="customer" autocomplete="off" />
					<span class="input-group-addon"><i id="customerLoader" class="icon-refresh icon-spin" style="display: none;"></i> <i class="icon-search"></i></span>
				</div>
			</div>
		</div>
		<div style="padding: 15px;" class="form_row">
				<div id="customers"></div>
		</div>
		{if $combinations|@count != 0}
			<div class="form_row">
				<label for="sp_id_product_attribute">{l s='Combination:' mod='dgridproducts'}</label>
				<div class="col_half">
					<select id="sp_id_product_attribute" name="sp_id_product_attribute">
						<option value="0">{l s='Apply to all combinations' mod='dgridproducts'}</option>
						{foreach from=$combinations item='combination'}
							<option value="{$combination.id_product_attribute|escape:'quotes':'UTF-8'}">{$combination.attributes|escape:'quotes':'UTF-8'}</option>
						{/foreach}
					</select>
				</div>
			</div>
		{/if}
		<div class="form_row">
			<label for="sp_from">{l s='Available' mod='dgridproducts'}</label>
			<div>
				<div class="col_half">
					<div class="input-group">
						<span class="input-group-addon">{l s='from' mod='dgridproducts'}</span>
						<input type="text" name="sp_from" class="datepicker" value="" style="text-align: center" id="sp_from" />
						<span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
					</div>
				</div>
				<div class="col_half">
					<div class="input-group">
						<span class="input-group-addon">{l s='to' mod='dgridproducts'}</span>
						<input type="text" name="sp_to" class="datepicker" value="" style="text-align: center" id="sp_to" />
						<span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
					</div>
				</div>
			</div>
		</div>
		<div class="form_row" style="padding: 0 15px;">
			<label style="padding: 0" for="sp_from_quantity">{l s='Starting at' mod='dgridproducts'}</label>
			<div class="input-group">
				<span class="input-group-addon">{l s='unit' mod='dgridproducts'}</span>
				<input type="text" name="sp_from_quantity" id="sp_from_quantity" value="1" />
			</div>
		</div>
		<div class="form_row">
			<label for="sp_price">{l s='Product price' mod='dgridproducts'}
				{if $country_display_tax_label}
					{l s='(tax excl.)' mod='dgridproducts'}
				{/if}
			</label>
			<div>
				<div class="col_half input-group">
					<span class="input-group-addon">{$currency->prefix|escape:'quotes':'UTF-8'}{$currency->suffix|escape:'quotes':'UTF-8'}</span>
					<input type="text" disabled="disabled" name="sp_price" id="sp_price" value="{$product->price|string_format:$priceDisplayPrecisionFormat|escape:'quotes':'UTF-8'}" />
				</div>
				<div class="col_half">
					<div class="checkbox">
						<label for="leave_bprice">{l s='Leave base price:' mod='dgridproducts'}</label>
						<input type="checkbox" id="leave_bprice" name="leave_bprice"  value="1" checked="checked"  />
					</div>
				</div>
			</div>
		</div>
		<div class="form_row">
			<label>{l s='Final price' mod='dgridproducts'}:</label>
			<div class="sp_final_price">{displayPrice price=$product_price}</div>
		</div>
		<div class="form_row">
			<label for="sp_reduction">{l s='Apply a discount of' mod='dgridproducts'}</label>
			<div class="clearfix">
				<div class="col_half">
					<input type="text" name="sp_reduction" id="sp_reduction" value="0.00"/>
				</div>
				<div class="col_half">
					<select name="sp_reduction_type" id="sp_reduction_type">
						<option selected="selected">-</option>
						<option value="amount">{l s='Currency Units' mod='dgridproducts'}</option>
						<option value="percentage">{l s='Percent' mod='dgridproducts'}</option>
					</select>
				</div>
			</div>
			<div class="help_block">{l s='The discount is applied after the tax' mod='dgridproducts'}</div>
		</div>
		<div class="form_row">
			<button class="button btn btn-default close_form_popup" href="#"><i class="process-icon-cancel"></i>{l s='Close' mod='dgridproducts'}</button>
			<button class="btn btn-default button pull-right" id="addSpecificPrice">
				<i class="process-icon-save"></i>
				<span>{l s='Add specific price' mod='dgridproducts'}</span>
			</button>
		</div>
	</form>
</div>
</div>
<script>
	{if isset($display_multishop_checkboxes) && $display_multishop_checkboxes}
	var display_multishop_checkboxes = true;
	{else}
	var display_multishop_checkboxes = false;
	{/if}
</script>
<script src="{$js_mod_dir|escape:'quotes':'UTF-8'}product_multishop.js"></script>
<script src="{$js_mod_dir|escape:'quotes':'UTF-8'}ajax/specific_price.js"></script>
<script>
	$(function () {
		$(document).ready(function(){
			$('#id_product_attribute').change(function() {
				$('#sp_current_ht_price').html(product_prices[$('#id_product_attribute option:selected').val()]);
			});
			$('#leave_bprice').click(function() {
				if (this.checked)
					$('#sp_price').attr('disabled', 'disabled');
				else
					$('#sp_price').removeAttr('disabled');
			});
			$('.datepicker, .type_datepicker').datetimepicker({
				prevText: '',
				nextText: '',
				dateFormat: 'yy-mm-dd',
				// Define a custom regional settings in order to use PrestaShop translation tools
				currentText: '{l s='Now' mod='dgridproducts' js=true}',
				closeText: '{l s='Done' mod='dgridproducts' js=true}',
				ampm: false,
				amNames: ['AM', 'A'],
				pmNames: ['PM', 'P'],
				timeFormat: 'hh:mm:ss tt',
				timeSuffix: '',
				timeOnlyTitle: '{l s='Choose Time' mod='dgridproducts' js=true}',
				timeText: '{l s='Time' mod='dgridproducts' js=true}',
				hourText: '{l s='Hour' mod='dgridproducts' js=true}',
				minuteText: '{l s='Minute' mod='dgridproducts' js=true}'
			});
		});

		var sp = new SpecificPrice();
		sp.onReady();


	});
</script>