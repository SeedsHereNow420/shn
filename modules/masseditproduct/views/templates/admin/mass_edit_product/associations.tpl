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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div id="product-associations" class="panel product-tab">
	<div id="no_default_category" class="alert alert-info">
		{l s='Please select a default category.' mod='masseditproduct'}
	</div>
	<div class="form-group">
		<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="category_box" type="category_box"}</span></div>
		<label class="control-label col-lg-2" for="category_block">
			{l s='Associated categories' mod='masseditproduct'}
		</label>
		<div class="col-lg-9">
			<div id="category_block">
				{$category_tree|not_filtered}
			</div>
			<a class="btn btn-link bt-icon confirm_leave" href="{$link->getAdminLink('AdminCategories')|escape:'html':'UTF-8'}&amp;addcategory">
				<i class="icon-plus-sign"></i> {l s='Create new category' mod='masseditproduct'} <i class="icon-external-link-sign"></i>
			</a>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-2" for="id_category_default">
			<span class="label-tooltip" data-toggle="tooltip" title="{l s='The default category is the main category for your product, and is displayed by default.' mod='masseditproduct'}">
				{l s='Default category' mod='masseditproduct'}
			</span>
		</label>
		<div class="col-lg-5">
			<select id="id_category_default" name="id_category_default">
				{foreach from=$selected_cat item=cat}
					<option value="{$cat.id_category|intval}" {if $id_category_default == $cat.id_category}selected="selected"{/if} >{$cat.name|not_filtered}</option>
				{/foreach}
			</select>
		</div>
	</div>
</div>
