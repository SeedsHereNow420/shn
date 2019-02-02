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

{foreach from=$languages item=language}
	{if $languages|count > 1}
		<div class="translatable-field row lang-{$language.id_lang|escape:'quotes':'UTF-8'}">
			<div class="col-lg-9">
	{/if}
	{if isset($maxchar) && $maxchar}
				<div class="input-group">
					<span id="{if isset($input_id)}{$input_id|escape:'quotes':'UTF-8'}_{$language.id_lang|escape:'quotes':'UTF-8'}{else}{$input_name|escape:'quotes':'UTF-8'}_{$language.id_lang|escape:'quotes':'UTF-8'}{/if}_counter" class="input-group-addon">
						<span class="text-count-down">{$maxchar|intval}</span>
					</span>
	{/if}
					<textarea id="{$input_name|escape:'quotes':'UTF-8'}_{$language.id_lang|escape:'quotes':'UTF-8'}" name="{$input_name|escape:'quotes':'UTF-8'}_{$language.id_lang|escape:'quotes':'UTF-8'}" class="{if isset($class)}{$class|escape:'quotes':'UTF-8'}{else}textarea-autosize{/if}"{if isset($maxlength) && $maxlength} maxlength="{$maxlength|intval}"{/if}{if isset($maxchar) && $maxchar} data-maxchar="{$maxchar|intval}"{/if}>{if isset($input_value[$language.id_lang])}{$input_value[$language.id_lang]|htmlentitiesUTF8}{/if}</textarea>
					<span class="counter" data-max="{if isset($max)}{$max|intval}{/if}{if isset($maxlength)}{$maxlength|intval}{/if}{if !isset($max) && !isset($maxlength)}none{/if}"></span>
			{if isset($maxchar) && $maxchar}
				</div>
			{/if}
	{if $languages|count > 1}
			</div>
			<div class="col-lg-2">
				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					{$language.iso_code|escape:'quotes':'UTF-8'}
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					{foreach from=$languages item=language}
					<li><a href="javascript:tabs_manager.allow_hide_other_languages = false;hideOtherLanguage({$language.id_lang|escape:'quotes':'UTF-8'});">{$language.name|escape:'quotes':'UTF-8'}</a></li>
					{/foreach}
				</ul>
			</div>
		</div>
	{/if}
{/foreach}
<script type="text/javascript">
	{if isset($maxchar) && $maxchar}
		$(document).ready(function(){
		{foreach from=$languages item=language}
			countDown($("#{$input_name|escape:'quotes':'UTF-8'}_{$language.id_lang|escape:'quotes':'UTF-8'}"), $("#{$input_name|escape:'quotes':'UTF-8'}_{$language.id_lang|escape:'quotes':'UTF-8'}_counter"));
		{/foreach}
		});
	{/if}
	$(".textarea-autosize").autosize();
</script>

