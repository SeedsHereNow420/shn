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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}
<!-- Block languages module -->
<ul id="languages-block_mobile_menu" class="mo_mu_level_0 mobile_menu_ul">
	<li class="mo_ml_level_0 mo_ml_column">
		<div class="menu_a_wrap">
		<a href="javascript:;" rel="alternate" hreflang="{$language.iso_code}" class="mo_ma_level_0 ma_span">{if $display_flags!=1}<img src="{$urls.img_lang_url}{$current_language.id_lang}.jpg" alt="{$current_language.iso_code}" width="16" height="11" class="mar_r4" />{/if}{if $display_flags!=2}{$current_language.name_simple}{/if}</a>
		{if count($languages) > 1}<span class="opener dlm"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span>{/if}
		</div>
		{if count($languages) > 1}
		<ul class="mo_mu_level_1 mo_sub_ul">
		{foreach from=$languages key=k item=language}
    		{if $language.id_lang != $current_language.id_lang}
			<li class="mo_ml_level_1 mo_sub_li">
				<a href="{$link->getLanguageLink($language.id_lang)}" title="{$language.name_simple}" rel="alternate" hreflang="{$language.iso_code}" class="mo_ma_level_1 mo_sub_a">
				    {if $display_flags!=1}<img src="{$urls.img_lang_url}{$language.id_lang}.jpg" alt="{$language.iso_code}" width="16" height="11" class="mar_r4" />{/if}{if $display_flags!=2}{$language.name_simple}{/if}
				</a>
			</li>
			{/if}
		{/foreach}
		</ul>
		{/if}
	</li>
</ul>
<!-- /Block languages module -->