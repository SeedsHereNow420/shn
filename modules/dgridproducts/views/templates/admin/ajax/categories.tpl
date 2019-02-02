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

<div class="title_product">{l s='Edit product' mod='dgridproducts'}: {$product->name|escape:'quotes':'UTF-8'}
</div>
<div class="form-group">
	{include file="./tree.tpl" categories=$categories id_category=Configuration::get('PS_ROOT_CATEGORY') selected_categories=$product_category root=true view_header=true multiple=true}
	<script>
		$(function () {
			var tree_cat = null;
			tree_cat = new TreeCustom('.tree_categories', '.tree_categories_header');
			tree_cat.afterChange = function () {
				var categories = this.getListSelectedCategories();
				var default_category = {$product->id_category_default|intval};
				var selected_category = '';
				var options = '';
				for (var i in categories)
				{
					var selected_category = '';
					if(categories[i].id == default_category)
						selected_category = ' selected="selected"';
					options += '<option value="' + categories[i].id + '"' + selected_category + '>' + categories[i].name + '</option>';
				}
				$('.box_categories_form [name=id_category_default]').html(options);
			};
			tree_cat.init();
		});
	</script>
</div>
<div class="form-group">
	<label class="control-label col-lg-4" for="id_category_default">
                                <span class="label-tooltip label-category" data-toggle="tooltip" title="{l s='The default category is the main category for your product, and is displayed by default.' mod='dgridproducts'}">
                                    {l s='Default category' mod='dgridproducts'}
                                </span>
	</label>
	<div class="col-lg-5">
		<select id="id_category_default_{$product->id|intval}" name="id_category_default">
			{foreach from=$selected_categories item=cat}
				<option value="{$cat.id_category|intval}" {if $product->id_category_default == $cat.id_category}selected="selected"{/if} >{$cat.name|escape:'quotes':'UTF-8'}</option>
			{/foreach}
		</select>
	</div>
</div>
<div class="form-group save_form">
	<button type="button" data-id_product="{$product->id|intval}" class="btn btn-default save_btn pull-right">
		<i class="process-icon-save"></i>
		{l s='Save' mod='dgridproducts'}
	</button>
	<button class="cancel_change_category btn btn-default">
		<i class="process-icon-cancel"></i>
		{l s='Cancel' mod='dgridproducts'}
	</button>
</div>