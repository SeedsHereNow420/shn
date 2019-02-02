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
{foreach $sub_column['elements'] as $element}
{assign var="pre_template" value="_"|explode:$element['st_el_text_banner']}
<div id="steasy_element_{$element.id_st_easy_content_element}" class="sttext_banner {if $element.st_el_content_width} width_{$element.st_el_content_width} {/if}">
<div class="sttext_banner_{$element['st_el_text_banner']} {if $pre_template[1]==2} flex_container flex_column_md {/if}">
    <div class="sttext_banner_text text-{$element.st_el_text_align} {if isset($element.st_el_mobile_text_align)} text-md-{$element.st_el_mobile_text_align} {/if} flex_child {if $pre_template[1]==2} m-r-1 {/if}">
    {$element.st_el_text nofilter}
    </div>
    <div class="sttext_banner_btn {if $pre_template[1]==2} text-3 {elseif $pre_template[1]==1} text-2 {else} text-1 {/if} {if !isset($element.st_el_mobile_text_align) || !$element.st_el_mobile_text_align} text-md-{$element.st_el_text_align} {else} text-md-{$element.st_el_mobile_text_align} {/if} flex_child_md">
        {if $element.st_first_btn}<a href="{$element.st_first_btn_link}" title="{$element.st_first_btn}" rel="nofollow" class="btn {if $element.st_first_btn_class==1} btn-white {elseif $element.st_first_btn_class==2} btn-link {else} btn-default {/if} sttext_banner_first_btn {if $element.st_second_btn} m-r-1 {/if}">{$element.st_first_btn}</a>{/if}
        {if $element.st_second_btn}<a href="{$element.st_second_btn_link}" title="{$element.st_second_btn}" rel="nofollow" class="btn {if $element.st_second_btn_class==1} btn-white {elseif $element.st_second_btn_class==2} btn-link {else} btn-default {/if} sttext_banner_second_btn">{$element.st_second_btn}</a>{/if}
    </div>
</div>  
</div>
{/foreach}   