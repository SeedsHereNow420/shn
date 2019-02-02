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
	var product_name = new Array();
	var PS_ALLOW_ACCENTED_CHARS_URL = {Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL')|intval}
	{foreach from=$product->name key=key item=name}
		product_name[{$key|escape:'quotes':'UTF-8'}] = "{$name|escape:'html':'UTF-8'}";
	{/foreach}
	var allowEmployeeFormLang = 0;
	var languages = new Array();
	{foreach from=$languages item=language}
	languages.push({
		id_lang: {$language.id_lang|intval},
		name: "{$language.name|escape:'quotes':'UTF-8'}",
		iso_code: "{$language.iso_code|escape:'quotes':'UTF-8'}"
	});
	{/foreach}
</script>
<div id="product-seo" class="panel product-tab {if $ps_version < 1.6}v15{/if}">
	<input type="hidden" name="id_product" value="{$product->id|intval}" />
	<h3>{l s='SEO' mod='dgridproducts'}</h3>
	{include file="./fields/{$smarty.const._PS_VERSION_|floatval}/check_fields.tpl" product_tab="Seo"}
	<div class="form-group">
		{if $ps_version >= 1.6}
		<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="meta_title" type="default" multilang="true"}</span></div>
		{/if}
		<label class="control-label col-lg-2" for="meta_title_{$id_lang|intval}">
			<span class="label-tooltip" data-toggle="tooltip"
				title="{l s='Public title for the product\'s page, and for search engines. Leave blank to use the product name.' mod='dgridproducts'} {l s='The number of remaining characters is displayed to the left of the field.' mod='dgridproducts'}">
				{l s='Meta title' mod='dgridproducts'}
			</span>
		</label>
		<div class="col-lg-8">
			{include file="./fields/{$smarty.const._PS_VERSION_|floatval}/input_text_lang.tpl"
				languages=$languages
				input_name='meta_title'
				input_value=$product->meta_title
				maxchar=70
			}
		</div>
	</div>
	<div class="form-group">
		{if $ps_version >= 1.6}
		<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="meta_description" type="default" multilang="true"}</span></div>
		{/if}
		<label class="control-label col-lg-2" for="meta_description_{$id_lang|intval}">
			<span class="label-tooltip" data-toggle="tooltip"
				title="{l s='This description will appear in search engines. You need a single sentence, shorter than 160 characters (including spaces).' mod='dgridproducts'}">
				{l s='Meta description' mod='dgridproducts'}
			</span>
		</label>
		<div class="col-lg-8">
			{include file="./fields/{$smarty.const._PS_VERSION_|floatval}/input_text_lang.tpl"
				languages=$languages
				input_name='meta_description'
				input_value=$product->meta_description
				maxchar=160
			}
		</div>
	</div>
	{* Removed for simplicity *}
	<div class="form-group hide">
		{if $ps_version >= 1.6}
		<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="meta_keywords" type="default" multilang="true"}</span></div>
		{/if}
		<label class="control-label col-lg-2" for="meta_keywords_{$id_lang|intval}">
			<span class="label-tooltip" data-toggle="tooltip"
				title="{l s='Keywords for search engines, separated by commas.' mod='dgridproducts'}">
				{l s='Meta keywords' mod='dgridproducts'}
			</span>
		</label>
		<div class="col-lg-8">
			{include file="./fields/{$smarty.const._PS_VERSION_|floatval}/input_text_lang.tpl" languages=$languages
				input_value=$product->meta_keywords
				input_name='meta_keywords'}
		</div>
	</div>
	<div class="form-group">
		{if $ps_version >= 1.6}
		<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="link_rewrite" type="seo_friendly_url" multilang="true"}</span></div>
		{/if}
		<label class="control-label col-lg-2" for="link_rewrite_{$id_lang|intval}">
			<span class="label-tooltip" data-toggle="tooltip"
				title="{l s='This is the human-readable URL, as generated from the product\'s name. You can change it if you want.' mod='dgridproducts'}">
				{l s='Friendly URL:' mod='dgridproducts'}
			</span>

		</label>
		<div class="col-lg-6">
				{include file="./fields/{$smarty.const._PS_VERSION_|floatval}/input_text_lang.tpl"
					languages=$languages
					input_value=$product->link_rewrite
					input_name='link_rewrite'}
		</div>
		<div class="col-lg-2">
			<button type="button" class="btn btn-default" id="generate-friendly-url" onmousedown="updateFriendlyURLByName();"><i class="icon-random"></i> {l s='Generate' mod='dgridproducts'}</button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-9 col-lg-offset-3">
			<div class="alert alert-warning translatable-field">
				<i class="icon-link"></i> {l s='The product link will look like this:' mod='dgridproducts'}<br/>
				<strong>{$curent_shop_url|escape:'html':'UTF-8'}lang/{if isset($product->id)}{$product->id|intval}{else}id_product{/if}-<span id="friendly-url_{$language.id_lang|intval}">{$product->link_rewrite[$default_language]|escape:'html':'UTF-8'}</span>.html</strong>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<button href="#" class="btn btn-default close_form_seo"><i class="process-icon-cancel"></i> {l s='Cancel' mod='dgridproducts'}</button>
		<button type="submit" name="submitAddproduct" class="btn btn-default pull-right saveSeo"><i class="process-icon-save"></i> {l s='Save' mod='dgridproducts'}</button>
	</div>
</div>
<script type="text/javascript">
	{if $ps_version >= 1.6}
	hideOtherLanguage({$default_form_language|intval});
	{else}
	changeFormLanguage({$default_form_language|intval}, '{$iso|escape:'quotes':'UTF-8'}');
	{/if}
</script>
<script>
	function updateFriendlyURLByName()
	{
		$('#link_rewrite_' + id_language).val(str2url(product_name[id_language], 'UTF-8'));
		$('#friendly-url_' + id_language).html(product_name[id_language]);
	}
</script>

<script>
	$(function () {
		displayFlags(languages, id_default_lang, allowEmployeeFormLang);
	});
</script>