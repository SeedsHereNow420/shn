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

<script>
	var iso = '{$iso|addslashes|escape:'quotes':'UTF-8'}';
	var pathCSS = '{$smarty.const._THEME_CSS_DIR_|addslashes|escape:'quotes':'UTF-8'}';
	var ad = '{$ad|addslashes|escape:'quotes':'UTF-8'}';
	var id_product = {$product->id|intval}
	$(document).ready(function(){
		tinySetup({
			editor_selector :"autoload_rte"
		});
	});
	var tax_rate = {$tax_rate|floatval};
</script>
<div class="form_more content_form p_{$ps_version|replace:'.':''|escape:'quotes':'UTF-8'}">
	<h2 class="text-center">{l s='Additional settings product' mod='dgridproducts'}</h2>
	<h3>{l s='Information' mod='dgridproducts'}</h3>
	<input type="hidden" name="id_product" value="{$id_product|intval}"/>
	<div class="row">
		<div class="col-lg-1">
					<span class="pull-right">
						{if isset($display_multishop_checkboxes) && $display_multishop_checkboxes}
							{include file="./checkbox.tpl" only_checkbox="true" field="available_for_order" type="default"}
							{include file="./checkbox.tpl" only_checkbox="true" field="show_price" type="show_price"}
							{include file="./checkbox.tpl" only_checkbox="true" field="online_only" type="default"}
						{/if}
					</span>
		</div>
		<label class="control-label col-lg-2" for="available_for_order">
			{l s='Options' mod='dgridproducts'}
		</label>
		<div class="col-lg-9">
			<div class="checkbox">
				<label for="available_for_order">
					<input type="checkbox" name="available_for_order" id="available_for_order" value="1" {if $product->available_for_order}checked="checked"{/if} >
					{l s='Available for order' mod='dgridproducts'}</label>
			</div>
			<div class="checkbox">
				<label for="show_price">
					<input type="checkbox" name="show_price" id="show_price" value="1" {if $product->show_price}checked="checked"{/if} {if $product->available_for_order}disabled="disabled"{/if} >
					{l s='Show price' mod='dgridproducts'}</label>
			</div>
			<div class="checkbox">
				<label for="online_only">
					<input type="checkbox" name="online_only" id="online_only" value="1" {if $product->online_only}checked="checked"{/if} >
					{l s='Online only (not sold in your retail store)' mod='dgridproducts'}</label>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="condition" type="default"}</span></div>
		<label class="control-label col-lg-2" for="condition">
            {l s='Condition' mod='dgridproducts'}
		</label>
		<div class="col-lg-3">
			<select name="condition" id="condition">
				<option value="new" {if $product->condition == 'new'}selected="selected"{/if} >{l s='New' mod='dgridproducts'}</option>
				<option value="used" {if $product->condition == 'used'}selected="selected"{/if} >{l s='Used' mod='dgridproducts'}</option>
				<option value="refurbished" {if $product->condition == 'refurbished'}selected="selected"{/if}>{l s='Refurbished' mod='dgridproducts'}</option>
			</select>
		</div>
	</div>
    <br>
	<div class="row">
		<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="description_short" type="tinymce" multilang="true"}</span></div>
		<label class="control-label col-lg-2" for="description_short_{$id_lang|escape:'quotes':'UTF-8'}">
			<span class="label-tooltip" data-toggle="tooltip" title="{l s='Appears in the product list(s), and at the top of the product page.' mod='dgridproducts'}">
				{l s='Short description' mod='dgridproducts'}
			</span>
		</label>
		<div class="col-lg-9">
            {include
            file="./fields/{$smarty.const._PS_VERSION_|floatval}/textarea_lang.tpl"
            languages=$languages
            input_name='description_short'
            class="autoload_rte"
            input_value=$product->description_short
            max=$PS_PRODUCT_SHORT_DESC_LIMIT}
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="description" type="tinymce" multilang="true"}</span></div>
		<label class="control-label col-lg-2" for="description_{$id_lang|escape:'quotes':'UTF-8'}">
					<span class="label-tooltip" data-toggle="tooltip"
						  title="{l s='Appears in the body of the product page.' mod='dgridproducts'}">
						{l s='Description' mod='dgridproducts'}
					</span>
		</label>
		<div class="col-lg-9">
            {include
            file="./fields/{$smarty.const._PS_VERSION_|floatval}/textarea_lang.tpl"
            languages=$languages input_name='description'
            class="autoload_rte"
            input_value=$product->description}
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-1"></div>
		<label class="control-label col-lg-2" for="tags_{$id_lang|escape:'quotes':'UTF-8'}">
			<span class="label-tooltip" data-toggle="tooltip"
				  title="{l s='Each tag has to be followed by a comma. The following characters are forbidden: %s' mod='dgridproducts' sprintf='!&lt;;&gt;;?=+#&quot;&deg;{}_$%'}">
				{l s='Tags:' mod='dgridproducts'}
			</span>
		</label>
		<div class="col-lg-9">
			<div class="row {if $ps_version == 1.5}translatable{/if}">
                {foreach from=$languages item=language}
                {literal}
					<script type="text/javascript">
                        $().ready(function () {
                            window.input_id = '{/literal}tags_{literal}';
                            $('#'+window.input_id{/literal}+'{$language.id_lang|escape:'quotes':'UTF-8'}'{literal}).tagify({delimiters: [13,44], addTagPrompt: '{/literal}{l s='Add tag' js=1}{literal}'});
                        });
					</script>
                {/literal}
					<div class="translatable-field lang-{$language.id_lang|escape:'quotes':'UTF-8'} {if $ps_version == 1.5}lang_{$language.id_lang|escape:'quotes':'UTF-8'}{/if}">
						<div class="col-lg-9">
							<input type="text" id="tags_{$language.id_lang|escape:'quotes':'UTF-8'}" class="tagify updateCurrentText" name="tags_{$language.id_lang|escape:'quotes':'UTF-8'}" value="{$product->getTags($language.id_lang, true)|htmlentitiesUTF8|escape:'quotes':'UTF-8'}" />
						</div>
                        {if $ps_version >= 1.6}
							<div class="col-lg-2">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    {$language.iso_code|escape:'quotes':'UTF-8'}
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
                                    {foreach from=$languages item=language}
										<li>
											<a href="javascript:hideOtherLanguage({$language.id_lang|escape:'quotes':'UTF-8'});">{$language.name|escape:'quotes':'UTF-8'}</a>
										</li>
                                    {/foreach}
								</ul>
							</div>
                        {/if}
					</div>
                {/foreach}
			</div>
		</div>
	</div>
	<hr>
	<h3>{l s='Prices' mod='dgridproducts'}</h3>
	<div class="row">
		<div class="col-lg-1"></div>
		<label class="control-label col-lg-2">{l s='Pre-tax wholesale price' mod='dgridproducts'}</label>
		<div class="col-lg-4">
			<div class="input-group">
				<span class="input-group-addon"> {$currency->sign|escape:'quotes':'UTF-8'}</span>
				<input id="wholesale_price" name="wholesale_price" type="text" value="{$product->wholesale_price|floatval}" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-1"></div>
		<label class="control-label col-lg-2">{l s='Tax rule:' mod='dgridproducts'}</label>
		<div class="col-lg-6">
			<select name="id_tax_rules_group" {if $tax_exclude_taxe_option}disabled="disabled"{/if} >
				<option value="0">{l s='No Tax' mod='dgridproducts'}</option>
                {foreach from=$tax_rules_groups item=tax_rules_group}
					<option value="{$tax_rules_group.id_tax_rules_group|escape:'htmlall':'UTF-8'}" {if $product->getIdTaxRulesGroup() == $tax_rules_group.id_tax_rules_group}selected="selected"{/if} >
                        {$tax_rules_group['name']|htmlentitiesUTF8|escape:'quotes':'UTF-8'}
					</option>
                {/foreach}
			</select>
		</div>
		<div class="col-lg-3">
			<a class="btn btn-link confirm_leave" href="{$link->getAdminLink('AdminTaxRulesGroup')|escape:'html':'UTF-8'}&addtax_rules_group&id_product={$product->id|intval}"{if $tax_exclude_taxe_option} disabled="disabled"{/if}>
				<i class="icon-plus-sign"></i> {l s='Create new tax' mod='dgridproducts'} <i class="icon-external-link-sign"></i>
			</a>
		</div>
	</div>
	<br>
	<div class="row">
		<label class="control-label col-lg-3">{if $ps_tax}{l s='Unit price (tax excl.)' mod='dgridproducts'}{else}{l s='Unit price' mod='dgridproducts'}{/if}</label>
		<div class="col-lg-4">
			<div class="input-group">
				<span class="input-group-addon"> {$currency->sign|escape:'quotes':'UTF-8'}</span>
				<input id="unit_price" name="unit_price" type="text" value="{$unit_price_with_tax|floatval}" maxlength="27" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.'); updateUnitPriceWithTax(this);">
				<span class="input-group-addon">{l s='for' mod='dgridproducts'}</span>
				<input id="unity" name="unity" type="text" value="{$product->unity|escape:'quotes':'UTF-8'}" maxlength="10" onkeyup="if (isArrowKey(event)) return ;updateUnitySecond(this);" onchange="updateUnitySecond(this);">
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-3"><span class="pull-right">{include file="./checkbox.tpl" field="condition" type="default"}</span></div>
		<div class="col-lg-9">
			<div class="checkbox">
				<label class="control-label" for="on_sale">
					<input type="checkbox" name="on_sale" id="on_sale" {if $product->on_sale}checked{/if} value="1">
                    {l s='Display the "on sale" icon on the product page, and in the text found within the product listing.' mod='dgridproducts'}
				</label>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-4 col-lg-offset-3">
			<div class="alert alert-warning">
				<span>{l s='or' mod='dgridproducts'}
					<span id="unit_price_with_tax">{$unit_price_with_tax|string_format:'%.6f'}</span> {$currency->sign|escape:'quotes':'UTF-8'}
					{l s='for' mod='dgridproducts'} <span id="unity_second">{$product->unity|escape:'quotes':'UTF-8'}</span> {if $ps_tax}{l s='(incl tax)' mod='dgridproducts'}{/if}</span>
			</div>
		</div>
	</div>
	<hr/>

	<h3>{l s='Associations' mod='dgridproducts'}</h3>
	<div class="row">
		<div class="col-lg-1"></div>
		<label class="control-label col-lg-2" for="product_autocomplete_input">
			<span class="label-tooltip" data-toggle="tooltip"
				  title="{l s='You can indicate existing products as accessories for this product.' mod='dgridproducts'}{l s='Start by typing the first letters of the product\'s name, then select the product from the drop-down list.' mod='dgridproducts'}{l s='Do not forget to save the product afterwards!' mod='dgridproducts'}">
			{l s='Accessories' mod='dgridproducts'}
			</span>
		</label>
		<div class="col-lg-5">
			<input type="hidden" name="inputAccessories" id="inputAccessories" value="{foreach from=$accessories item=accessory}{$accessory.id_product|escape:'quotes':'UTF-8'}-{/foreach}" />
			<input type="hidden" name="nameAccessories" id="nameAccessories" value="{foreach from=$accessories item=accessory}{$accessory.name|escape:'html':'UTF-8'}¤{/foreach}" />
			<div id="ajax_choose_product">
				<div class="input-group">
					<input type="text" id="product_autocomplete_input" name="product_autocomplete_input" />
					<span class="input-group-addon"><i class="icon-search"></i></span>
				</div>
			</div>

			<div id="divAccessories">
				{foreach from=$accessories item=accessory}
					<div class="form-control-static">
						<button type="button" class="btn btn-default delAccessory" name="{$accessory.id_product|intval}">
							<i class="icon-remove text-danger"></i>
						</button>
						{$accessory.name|escape:'html':'UTF-8'}{if !empty($accessory.reference)}{$accessory.reference|escape:'quotes':'UTF-8'}{/if}
					</div>
				{/foreach}
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-1"></div>
		<label class="control-label col-lg-2" for="id_manufacturer">{l s='Manufacturer' mod='dgridproducts'}</label>
		<div class="col-lg-5">
			<select name="id_manufacturer" id="id_manufacturer">
				<option value="0">- {l s='Choose (optional)' mod='dgridproducts'} -</option>
				{if $product->id_manufacturer}
					<option value="{$product->id_manufacturer|intval}" selected="selected">{$product->manufacturer_name|escape:'quotes':'UTF-8'}</option>
				{/if}
				<option disabled="disabled">-</option>
			</select>
		</div>
		<div class="col-lg-4">
			<a class="btn btn-link bt-icon confirm_leave" style="margin-bottom:0" href="{$link->getAdminLink('AdminManufacturers')|escape:'html':'UTF-8'}&amp;addmanufacturer">
				<i class="icon-plus-sign"></i> {l s='Create new manufacturer' mod='dgridproducts'} <i class="icon-external-link-sign"></i>
			</a>
		</div>
	</div>
	<hr>
	{if !$has_attribute}
	<div class="row">
		<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="condition" type="default"}</span></div>
		<label class="control-label col-lg-2" for="minimal_quantity">
			{l s='Minimum quantity' mod='dgridproducts'}
		</label>
		<div class="col-lg-3">
			<input type="text" id="minimal_quantity" maxlength="6" value="{$product->minimal_quantity|default:1|escape:'quotes':'UTF-8'}" name="minimal_quantity"/>
		</div>
	</div>
	<br>
	{/if}

	<div id="product-shipping" class="panel product-tab clearfix">
		<input type="hidden" name="submitted_tabs[]" value="Shipping">
		<h3>{l s='Shipping' mod='dgridproducts'}</h3>


		<div class="form-group">
			<label class="control-label col-lg-3" for="width">{l s='Package width' mod='dgridproducts'}</label>
			<div class="input-group col-lg-2">
				<span class="input-group-addon">{$short_distance|escape:'quotes':'UTF-8'}</span>
				<input maxlength="14" id="width" name="width" type="text" value="{$product->width|floatval}" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-lg-3" for="height">{l s='Package height' mod='dgridproducts'}</label>
			<div class="input-group col-lg-2">
				<span class="input-group-addon">{$short_distance|escape:'quotes':'UTF-8'}</span>
				<input maxlength="14" id="height" name="height" type="text" value="{$product->height|floatval}" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-lg-3" for="depth">{l s='Package depth' mod='dgridproducts'}</label>
			<div class="input-group col-lg-2">
				<span class="input-group-addon">{$short_distance|escape:'quotes':'UTF-8'}</span>
				<input maxlength="14" id="depth" name="depth" type="text" value="{$product->depth|floatval}" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-lg-3" for="weight">{l s='Package weight' mod='dgridproducts'}</label>
			<div class="input-group col-lg-2">
				<span class="input-group-addon">{$weight|escape:'quotes':'UTF-8'}</span>
				<input maxlength="14" id="weight" name="weight" type="text" value="{$product->weight|floatval}" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3" for="additional_shipping_cost">
			<span class="label-tooltip" data-toggle="tooltip"
				  title="{l s='If a carrier has a tax, it will be added to the shipping fees.' mod='dgridproducts'}">
				{l s='Additional shipping fees (for a single item)' mod='dgridproducts'}
			</span>

			</label>
			<div class="input-group col-lg-2">
				<span class="input-group-addon">{$currency->prefix|escape:'htmlall':'UTF-8'}{$currency->suffix|escape:'htmlall':'UTF-8'} {if $country_display_tax_label}({l s='tax excl.' mod='dgridproducts'}){/if}</span>
				<input type="text" id="additional_shipping_cost" name="additional_shipping_cost" onchange="this.value = this.value.replace(/,/g, '.');" value="{$product->additional_shipping_cost|escape:'htmlall':'UTF-8'}" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-lg-3" for="availableCarriers">
                {l s='Carriers' mod='dgridproducts'}
			</label>
			<div class="col-lg-9">
				<div class="drag_option">
					<select class="available_options" multiple="multiple">
                        {if is_array($carriers) && count($carriers)}
                            {foreach from=$carriers item=carrier}
                                {if in_array($carrier.id_reference, $selected_carriers)}{continue}{/if}
								<option value="{$carrier.id_reference|intval}">{$carrier.name|escape:'quotes':'UTF-8'}</option>
                            {/foreach}
                        {/if}
					</select>
					<div class="drag_option_control">
						<button class="select_options" type="button"></button>
						<button class="unselect_options" type="button"></button>
					</div>
					<select class="selected_options" name="carriers[]" multiple="multiple">
                        {if is_array($carriers) && count($carriers)}
                            {foreach from=$carriers item=carrier}
                                {if !in_array($carrier.id_reference, $selected_carriers)}{continue}{/if}
								<option value="{$carrier.id_reference|intval}">{$carrier.name|escape:'quotes':'UTF-8'}</option>
                            {/foreach}
                        {/if}
					</select>
				</div>
				<script>
                    $('.drag_option').dragOption();
				</script>
			</div>
		</div>
	</div>
    {if $ps_stock_management}
		<h3>{l s='Availability settings' mod='dgridproducts'}</h3>
		<div class="row">
			<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="available_now" type="default" multilang="true"}</span></div>
			<label class="control-label col-lg-2 label-special" for="available_now_{$default_language|escape:'quotes':'UTF-8'}">
					<span class="label-tooltip" data-toggle="tooltip" title="{l s='Forbidden characters:' mod='dgridproducts'} &#60;&#62;;&#61;#&#123;&#125;">
						{l s='Displayed text when in-stock' mod='dgridproducts'}
					</span>
			</label>
			<div class="col-lg-9">
                {include file="./fields/{$smarty.const._PS_VERSION_|floatval}/input_text_lang.tpl"
                languages=$languages
                input_value=$product->available_now
                input_name='available_now'}
			</div>
		</div>
		<div class="row">
			<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="available_later" type="default" multilang="true"}</span></div>
			<label class="control-label col-lg-2 label-special" for="available_later_{$default_language|escape:'quotes':'UTF-8'}">
					<span class="label-tooltip" data-toggle="tooltip"
						  title="{l s='If empty, the message "in stock" will be displayed.' mod='dgridproducts'} {l s='Forbidden characters:' mod='dgridproducts'} &#60;&#62;;&#61;#&#123;&#125;">
						{l s='Displayed text when backordering is allowed' mod='dgridproducts'}
					</span>
			</label>
			<div class="col-lg-9">
                {include file="./fields/{$smarty.const._PS_VERSION_|floatval}/input_text_lang.tpl"
                languages=$languages
                input_value=$product->available_later
                input_name='available_later'}
			</div>
		</div>
        {if !$countAttributes}
			<div class="row">
				<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="available_date" type="default"}</span></div>
				<label class="control-label col-lg-2" for="available_date">
                    {l s='Available date:' mod='dgridproducts'}
				</label>
				<div class="col-lg-9">
					<div class="input-group fixed-width-md">
						<input id="available_date" name="available_date" value="{$product->available_date|escape:'quotes':'UTF-8'}" class="datepicker" type="text" />
						<div class="input-group-addon">
							<i class="icon-calendar-empty"></i>
						</div>

					</div>
					<p class="help-block">{l s='The next date of availability for this product when it is out of stock.' mod='dgridproducts'}</p>
				</div>
			</div>
        {/if}
    {/if}
	<hr>
    {if Configuration::get('PS_CUSTOMIZATION_FEATURE_ACTIVE')}
		<h3>{l s='Customization' mod='dgridproducts'}</h3>
		<div class="form-group clearfix">
			<div class="col-lg-1"></div>
			<label class="control-label col-lg-2">{l s='File fields' mod='dgridproducts'}</label>
			<div class="col-lg-1">
				<input type="text" name="uploadable_files" value="{$product->uploadable_files|intval}">
			</div>
		</div>
		<div class="form-group clearfix">
			<div class="col-lg-1"></div>
			<label class="control-label col-lg-2">{l s='Text fields' mod='dgridproducts'}</label>
			<div class="col-lg-1">
				<input type="text" name="text_fields" value="{$product->text_fields|intval}">
			</div>
		</div>
		<br>
        {if is_array($file_fields) && count($file_fields)}
            {foreach from=$file_fields key=key item=file_field}
				<div class="form-group clearfix">
					<div class="col-lg-1">
						<input type="hidden" name="file_fields_arr[]" value="{$key|intval}">
						<input type="hidden" name="file_field_id_{$key|intval}" value="{$file_field->id|intval}">
						<input type="hidden" name="file_field_type_{$key|intval}" value="{$file_field->type|intval}">
					</div>
					<label class="control-label col-lg-2">
                        {l s='Label file field' mod='dgridproducts'}
					</label>
					<div class="col-lg-5">
                        {include file="./fields/{$smarty.const._PS_VERSION_|floatval}/input_text_lang.tpl"
                        languages=$languages
                        input_value=$file_field->name
                        input_name="file_field_name_{$key|intval}"}
					</div>
					<div class="col-lg-4">
                        {l s='Required?' mod='dgridproducts'}
						<input type="checkbox" name="file_field_required_{$key|intval}" {if $file_field->required}checked{/if} value="1">
					</div>
				</div>
            {/foreach}
        {/if}
        {if is_array($text_fields) && count($text_fields)}
            {foreach from=$text_fields key=key item=text_field}
				<div class="form-group clearfix">
					<div class="col-lg-1">
						<input type="hidden" name="text_fields_arr[]" value="{$key|intval}">
						<input type="hidden" name="text_field_id_{$key|intval}" value="{$text_field->id|intval}">
						<input type="hidden" name="text_field_type_{$key|intval}" value="{$text_field->type|intval}">
					</div>
					<label class="control-label col-lg-2">
                        {l s='Label text field' mod='dgridproducts'}
					</label>
					<div class="col-lg-5">
                        {include file="./fields/{$smarty.const._PS_VERSION_|floatval}/input_text_lang.tpl"
                        languages=$languages
                        input_value=$text_field->name
                        input_name="text_field_name_{$key|intval}"}
					</div>
					<div class="col-lg-4">
                        {l s='Required?' mod='dgridproducts'}
						<input type="checkbox" name="text_field_required_{$key|intval}" {if $text_field->required}checked{/if} value="1">
					</div>
				</div>
            {/foreach}
        {/if}
    {/if}
	<hr>
    {include file="./suppliers.tpl"}
	<div class="panel-footer">
		<button class="button btn btn-default close_form_popup" href="#"><i class="process-icon-cancel"></i>{l s='Cancel' mod='dgridproducts'}</button>

		<button class="saveAdditionalSettingProduct btn btn-default pull-right">
			<i class="process-icon-save"></i>
			{l s='Save' mod='dgridproducts'}
		</button>
	</div>
</div>
<script>
	var module_dir = '{$smarty.const._MODULE_DIR_|escape:'quotes':'UTF-8'}';
	var id_language = {$defaultFormLanguage|intval};
	var languages = new Array();
	var vat_number = {if $vat_number}1{else}0{/if};
	// Multilang field setup must happen before document is ready so that calls to displayFlags() to avoid
	// precedence conflicts with other document.ready() blocks
	{foreach $languages as $k => $language}
	languages[{$k|escape:'quotes':'UTF-8'}] = {
		id_lang: {$language.id_lang|escape:'quotes':'UTF-8'},
		iso_code: '{$language.iso_code|escape:'quotes':'UTF-8'}',
		name: '{$language.name|escape:'quotes':'UTF-8'}',
		is_default: '{$language.is_default|escape:'quotes':'UTF-8'}'
	};
	{/foreach}
	// we need allowEmployeeFormLang var in ajax request
	allowEmployeeFormLang = {$allowEmployeeFormLang|intval};
	displayFlags(languages, id_language, allowEmployeeFormLang);
	{if $ps_version >= 1.6}
		hideOtherLanguage(id_language);
	{else}
		changeFormLanguage(id_language, iso);
	{/if}
	$('[name=available_for_order]').change(function () {
		if ($(this).is(':checked'))
			$('[name=show_price]').attr({
				disabled: 'disabled',
				checked: 'checked'
			});
		else
			$('[name=show_price]').removeAttr('disabled');
	});

	function initAccessoriesAutocomplete()
	{
		$('#product_autocomplete_input')
				.autocomplete('ajax_products_list.php', {
					source: '',
					minChars: 1,
					autoFill: true,
					max:20,
					matchContains: true,
					mustMatch:true,
					scroll:false,
					cacheLength:0,
					formatItem: function(item) {
						return item[1]+' - '+item[0];
					}
				}).result(addAccessory);

		$('#product_autocomplete_input').setOptions({
			extraParams: {
				excludeIds : getAccessoriesIds()
			}
		});
	}
	{if $ps_version < 1.6}
		function getAccessoriesIds()
		{
			if ($('#inputAccessories').val() === undefined)
				return '';
			return $('#inputAccessories').val().replace(/\-/g,',');
		}
	{else}
		function getAccessoriesIds()
		{
			if ($('#inputAccessories').val() === undefined)
				return id_product;
			return id_product + ',' + $('#inputAccessories').val().replace(/\-/g,',');
		}
	{/if}

	function addAccessory(event, data, formatted)
	{
		if (data == null)
			return false;
		var productId = data[1];
		var productName = data[0];

		var $divAccessories = $('#divAccessories');
		var $inputAccessories = $('#inputAccessories');
		var $nameAccessories = $('#nameAccessories');

		/* delete product from select + add product line to the div, input_name, input_ids elements */
		$divAccessories.html($divAccessories.html() + '<div class="form-control-static"><button type="button" class="delAccessory btn btn-default" name="' + productId + '"><i class="icon-remove text-danger"></i></button>&nbsp;'+ productName +'</div>');
		$nameAccessories.val($nameAccessories.val() + productName + '¤');
		$inputAccessories.val($inputAccessories.val() + productId + '-');
		$('#product_autocomplete_input').val('');
		$('#product_autocomplete_input').setOptions({
			extraParams: {literal}{excludeIds : getAccessoriesIds()}{/literal}
		});
	};

	function delAccessory(id)
	{
		var div = getE('divAccessories');
		var input = getE('inputAccessories');
		var name = getE('nameAccessories');

		// Cut hidden fields in array
		var inputCut = input.value.split('-');
		var nameCut = name.value.split('¤');

		if (inputCut.length != nameCut.length)
			return jAlert('Bad size');

		// Reset all hidden fields
		input.value = '';
		name.value = '';
		div.innerHTML = '';
		for (i in inputCut)
		{
			// If empty, error, next
			if (!inputCut[i] || !nameCut[i])
				continue ;

			// Add to hidden fields no selected products OR add to select field selected product
			if (inputCut[i] != id)
			{
				input.value += inputCut[i] + '-';
				name.value += nameCut[i] + '¤';
				div.innerHTML += '<div class="form-control-static"><button type="button" class="delAccessory btn btn-default" name="' + inputCut[i] +'"><i class="icon-remove text-danger"></i></button>&nbsp;' + nameCut[i] + '</div>';
			}
			else
				$('#selectAccessories').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
		}

		$('#product_autocomplete_input').setOptions({
			extraParams: {literal}{excludeIds : getAccessoriesIds()}{/literal}
		});
	};

	function getManufacturers(){
		$.ajax({
			url: 'ajax-tab.php',
			cache: false,
			dataType: 'json',
			data: {
				ajaxProductManufacturers:"1",
				ajax : '1',
				token : "{Tools::getAdminTokenLite('AdminProducts')|escape:'quotes':'UTF-8'}",
				controller : 'AdminProducts',
				action : 'productManufacturers'
			},
			success: function(j) {
				var options = '';
				if (j) {
					for (var i = 0; i < j.length; i++) {
						options += '<option ' + ({$product->id_manufacturer|intval} == j[i].optionValue ? ' selected="selected" ' : '') + ' value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
					}
				}
				$('select#id_manufacturer').chosen({literal}{width: '250px'}{/literal}).append(options).trigger("chosen:updated").trigger("liszt:updated");
			},
			error: function(XMLHttpRequest, textStatus, errorThrown)
			{
				$("select#id_manufacturer").replaceWith("<p id=\"id_manufacturer\">[TECHNICAL ERROR] ajaxProductManufacturers: "+textStatus+"</p>");
			}
		});
	};

	initAccessoriesAutocomplete();
	getManufacturers();
	$('#divAccessories').delegate('.delAccessory', 'click', function(){
		delAccessory($(this).attr('name'));
	});
	$('#available_date').datepicker({
		prevText: '',
		nextText: '',
		dateFormat: 'yy-mm-dd'
	});
</script>