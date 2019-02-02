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
<div class="stsocial_block {if isset($sub_column.st_icon_align)} text-{$sub_column.st_icon_align} {/if} {if isset($sub_column.st_icon_mobile_align) && $sub_column.st_icon_mobile_align} text-md-{$sub_column.st_icon_mobile_align} {/if}">  
<ul class="clearfix stsocial_{if isset($sub_column.st_el_social)}{$sub_column.st_el_social}{else}1_1{/if} stsocial_list">  
{foreach $sub_column['elements'] as $element}
	<li class="{if $element.st_el_hide_on_mobile == 1} hidden-md-down {elseif $element.st_el_hide_on_mobile == 2} hidden-lg-up {/if}">
		<a href="{if $element.st_el_url}{$element.st_el_url}{else}#{/if}" id="stsocial_item_{$element.id_st_easy_content_element}" rel="nofollow" title="{$element.st_el_header}" {if isset($sub_column.st_new_window) && $sub_column.st_new_window} target="_blank" {/if} class="flex_box">
			<div class="social_wrap"><i class="{$element.st_el_icon}"></i></div>
			<div class="social_header flex_child">{$element.st_el_header}</div>
		</a>
	</li>
{/foreach}
</ul>
</div>