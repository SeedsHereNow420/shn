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
	var ajax_url = "{Context::getContext()->link->getAdminLink('AdminProductGrid')|escape:'quotes':'UTF-8'}";
</script>
<div class="bootstrap custom_bootstrap">
	<div class="stage_combinations" style="display: none;"></div>
	<div class="form_combinations" style="display: none;">
		<div class="form_create_combination form_cc" style="display: none;">
			<form id="form_create_combination">
				<input type="hidden" name="id_product" value="0"/>
				<input type="hidden" name="product_price" value="0"/>
				<input type="hidden" name="product_rate" value="0"/>
				<div class="row">
					<label class="control-label col-md-3">{l s='Attribute' mod='dgridproducts'}</label>
					<div class="col-md-3">
						<select name="attribute_group">
							{if is_array($attribute_groups) && count($attribute_groups)}
								{foreach from=$attribute_groups item=attribute_group}
									<option value="{$attribute_group.id_attribute_group|intval}">{$attribute_group.name|escape:'quotes':'UTF-8'}</option>
								{/foreach}
							{/if}
						</select>
					</div>
				</div>
				{if is_array($attribute_groups) && count($attribute_groups)}
					{foreach from=$attribute_groups item=attribute_group}
						<div class="row" data-group="{$attribute_group.id_attribute_group|intval}">
							<label class="control-label col-md-3">{l s='Value' mod='dgridproducts'}</label>
							<div class="col-md-4">
								<select name="attribute">
									{if isset($attribute_group.attributes) && count($attribute_group.attributes)}
										{foreach from=$attribute_group.attributes item=attribute}
											<option value="{$attribute.id_attribute|intval}">{$attribute.name|escape:'quotes':'UTF-8'}</option>
										{/foreach}
									{/if}
								</select>
							</div>
							<div class="col-md-2">
								<button type="button" class="btn btn-default btn-block add_attr"><i class="icon-plus-sign-alt"></i>{l s='Add' mod='dgridproducts'}</button>
							</div>
						</div>
					{/foreach}
				{/if}
				<div class="row">
					<div class="col-md-4 col-md-offset-3">
						<select id="product_att_list" name="attribute_combination_list[]" multiple="multiple"></select>
					</div>
					<div class="col-md-2">
						<button type="button" class="btn btn-default btn-block delete_attr"><i class="icon-minus-sign-alt"></i>{l s='Delete' mod='dgridproducts'}</button>
					</div>
				</div>
				<hr>
				<div class="row">
					<label class="control-label col-md-3">{l s='Reference' mod='dgridproducts'}</label>
					<div class="col-md-3">
						<input type="text" id="attribute_reference" name="attribute_reference" value="">
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3">{l s='EAN-13 or JAN barcode' mod='dgridproducts'}</label>
					<div class="col-md-2">
						<input maxlength="13" type="text" id="attribute_ean13" name="attribute_ean13" value="">
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3">{l s='UPC barcode' mod='dgridproducts'}</label>
					<div class="col-md-2">
						<input maxlength="12" type="text" id="attribute_upc" name="attribute_upc" value="">
					</div>
				</div>
				<hr>
				<div class="row">
					<label class="control-label col-md-3">{l s='Wholesale price' mod='dgridproducts'}</label>
					<div class="col-md-2">
						<input type="text" name="attribute_wholesale_price" id="attribute_wholesale_price" value="0" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3">{l s='Impact on price' mod='dgridproducts'}</label>
					<div class="col-md-2">
						<select id="attribute_price_impact" name="attribute_price_impact">
							<option value="0">{l s='None' mod='dgridproducts'}</option>
							<option value="1">{l s='Increase' mod='dgridproducts'}</option>
							<option value="-1">{l s='Reduce' mod='dgridproducts'}</option>
						</select>
					</div>
					<div class="col-md-2">
						<div class="col-md-2">
                            <label class="control-label">
							    {l s='on' mod='dgridproducts'}
                            </label>
						</div>
						<div class="col-md-10">
							<input type="text" name="attribute_price" id="attribute_price" value="0.00" onkeyup="$(this).val(this.value.replace(/,/g, '.')); if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
						</div>
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3">{l s='Final price' mod='dgridproducts'}:</label>
					<div class="col-md-4">
						<div class="pa_final_price">{displayPrice price=0}</div>
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3">{l s='Impact on weight' mod='dgridproducts'}</label>
					<div class="col-md-2">
						<select id="attribute_weight_impact" name="attribute_weight_impact">
							<option value="0">{l s='None' mod='dgridproducts'}</option>
							<option value="1">{l s='Increase' mod='dgridproducts'}</option>
							<option value="-1">{l s='Discount' mod='dgridproducts'}</option>
						</select>
					</div>
					<div class="col-md-2">
						<div class="col-md-2">
							<label class="control-label">
								{l s='on' mod='dgridproducts'}
							</label>
						</div>
						<div class="col-md-10">
							<input type="text" name="attribute_weight" id="attribute_weight" value="0.00" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
						</div>
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3">{l s='Impact on unit price' mod='dgridproducts'}</label>
					<div class="col-md-2">
						<select id="attribute_unit_impact" name="attribute_unit_impact">
							<option value="0">{l s='None' mod='dgridproducts'}</option>
							<option value="1">{l s='Increase' mod='dgridproducts'}</option>
							<option value="-1">{l s='Reduction' mod='dgridproducts'}</option>
						</select>
					</div>
					<div class="col-md-2">
						<div class="col-md-2">
							<label class="control-label">
								{l s='on' mod='dgridproducts'}
							</label>
						</div>
						<div class="col-md-10">
							<input type="text" name="attribute_unity" id="attribute_unity" value="0.00" onkeyup="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');">
						</div>
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3">{l s='Minimal quantity' mod='dgridproducts'}</label>
					<div class="col-md-2">
						<input maxlength="6" name="attribute_minimal_quantity" id="attribute_minimal_quantity" type="text" value="1">
					</div>
				</div>
				<div class="row">
					<label class="control-label col-md-3">{l s='Available(date)' mod='dgridproducts'}</label>
					<div class="col-md-2">
						<input class="datepicker" id="available_date_attribute" name="available_date_attribute" value="0000-00-00" type="text">
					</div>
				</div>
				<hr>
				<label class="control-label col-md-3">{l s='Images' mod='dgridproducts'}</label>
				<div class="row product_images"></div>
				<div class="row">
					<div class="col-md-12">
                        <button class="btn btn-danger cancelCreateCombination" type="reset"><i class="icon-remove"></i>{l s='Cancel' mod='dgridproducts'}</button>
                        <button class="btn btn-success createCombination" type="button"><i class="icon-save"></i>{l s='Save' mod='dgridproducts'}</button>
					</div>
				</div>
			</form>
		</div>
		<div class="add_combinations col-lg-12" style="text-align: right; margin-bottom: 10px;">
			<a class="button btn btn-success add_combination" href="#">
				<i class="icon-plus"></i>
				{l s='Add combination' mod='dgridproducts'}
			</a>
		</div>
		<div class="ajax_form_edit_attributes form_cc"></div>
		<div class="content_form"></div>
		<div class="add_combinations" style="text-align: right; margin-bottom: 10px;">
			<button class="button btn btn-default close_form_combinations" href="#"><i class="process-icon-cancel"></i>{l s='Close' mod='dgridproducts'}</button>
		</div>
	</div>

	<div class="stage_images" style="display: none;"></div>
	<div class="form_images" style="display: none;">
		<div style="text-align: right; margin-bottom: 10px;">
			<a class="button btn btn-success add_image" href="#">
				<input class="add_image_input" multiple name="add_image_input" type="file"/>
				<i class="icon-plus"></i>
				{l s='Add image' mod='dgridproducts'}
			</a>
			<a class="button btn btn-default close_form_images" href="#">{l s='Close' mod='dgridproducts'}</a>
		</div>
		<div class="content_form">

		</div>
	</div>

	<div class="stage_features" style="display: none;"></div>
	<div class="form_features" style="display: none;">
		<div class="content_form">

		</div>
	</div>

	<div class="stage_seo" style="display: none;"></div>
	<div class="form_seo" style="display: none;">
		<div class="content_form"></div>
	</div>


	<div class="box_categories" style="display: none">
		<div class="box_categories_stage"></div>
		<div class="box_categories_form content_form">
		</div>
	</div>

	<div class="stage_popup_form" style="display: none"></div>
	<div class="form_popup" style="display: none"></div>
</div>
<script>
	var not_available_type = "{l s='This is type file not available. Use file type JPG' mod='dgridproducts' js=true}";
	var exists_attr  = "{l s='Can add one attribute from one group!' mod='dgridproducts' js=true}";
	var combination_create_success  = "{l s='Combination created successfully!' mod='dgridproducts' js=true}";
	$('.form_create_combination .datepicker').datepicker({
		dateFormat: 'yy-mm-dd'
	});
</script>