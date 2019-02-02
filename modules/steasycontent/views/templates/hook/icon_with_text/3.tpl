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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div class="easy_icon_with_text_{if isset($element.st_el_icon_with_text)}{$element.st_el_icon_with_text}{/if} flex_container flex_start">
	<em class="{$element.st_el_icon} fs_2x easy_icon color_444"><span class="unvisible">&nbsp;</span></em>
	<div class="flex_child">
		{if isset($element.st_el_header) && $element.st_el_header}
            {if $element.st_el_url}
                <a href="{$element.st_el_url}" class="fs_lg easy_header color_444" rel="nofollow" title="{$element.st_el_header}">{$element.st_el_header}</a>                
            {else}
                <div class="fs_lg easy_header color_444">{$element.st_el_header}</div>
            {/if}
        {/if}
		{if isset($element.st_el_sub_header) && $element.st_el_sub_header}<div class="easy_sub_header pad_b6">{$element.st_el_sub_header}</div>{/if}
		{if isset($element.st_el_text) && $element.st_el_text}<div class="color_999 easy_text pad_b1">{$element.st_el_text}</div>{/if}
		{if isset($element.st_el_url) && $element.st_el_url && $element.st_el_button}<a href="{$element.st_el_url}" title="{if $element.st_el_button}{$element.st_el_button}{$element.st_el_button}{else}{l s='Read more' d='Shop.Theme.Transformer'}{/if}" class="easy_link" rel="nofollow">{if $element.st_el_button}{$element.st_el_button}{else}{l s='Read more' d='Shop.Theme.Transformer'}{/if}</a>{/if}
	</div>
</div>