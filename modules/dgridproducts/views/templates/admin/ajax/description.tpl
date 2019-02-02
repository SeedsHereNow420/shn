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
	$(document).ready(function(){
		tinySetup({
			editor_selector :"autoload_rte"
		});
	});
</script>
<div class="form_more content_form p_{$ps_version|replace:'.':''|escape:'quotes':'UTF-8'}">
	<h2 class="text-center">{$name_description}</h2>
	<input type="hidden" name="id_product" value="{$id_product|intval}"/>
	<div class="row">
		<div class="col-lg-1"><span class="pull-right">{include file="./checkbox.tpl" field="description_short" type="tinymce" multilang="true"}</span></div>
		<div class="col-lg-9">
			{if $short}
				{assign var="input_value" value=$product->description_short}
			{else}
                {assign var="input_value" value=$product->description}
			{/if}
            {include
            file="./fields/{$smarty.const._PS_VERSION_|floatval}/textarea_lang.tpl"
            languages=$languages
            input_name=$input_name
            class="autoload_rte"
            max=$PS_PRODUCT_SHORT_DESC_LIMIT}
		</div>
	</div>

	<div class="panel-footer">
		<button class="button btn btn-default close_form_popup" href="#"><i class="process-icon-cancel"></i>{l s='Cancel' mod='dgridproducts'}</button>

		<button class="saveDescription btn btn-default pull-right">
			<i class="process-icon-save"></i>
			{l s='Save' mod='dgridproducts'}
		</button>
	</div>
</div>
<script>
    var languages = new Array();
    {foreach $languages as $k => $language}
    languages[{$k|escape:'quotes':'UTF-8'}] = {
        id_lang: {$language.id_lang|escape:'quotes':'UTF-8'},
        iso_code: '{$language.iso_code|escape:'quotes':'UTF-8'}',
        name: '{$language.name|escape:'quotes':'UTF-8'}',
        is_default: '{$language.is_default|escape:'quotes':'UTF-8'}'
    };
    {/foreach}
	{if $ps_version >= 1.6}
		hideOtherLanguage({$defaultFormLanguage|intval});
	{else}
		changeFormLanguage(id_language, iso);
	{/if}
</script>