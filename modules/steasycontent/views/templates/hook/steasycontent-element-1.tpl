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
<div class="row">
{assign var='element_width_total' value=0} 
{foreach $sub_column['elements'] as $element}
    {if ($element_width_total+$element['st_el_width'])>12}
    	</div><div class="row">
    	{assign var='element_width_total' value=0}
    {/if}
    {assign var='element_width_total' value=$element_width_total+$element['st_el_width']}
    {math assign="element_width" equation='x*y/y' x=$element['st_el_width'] y=10} 
    <div id="steasy_element_{$element.id_st_easy_content_element}" class="col-lg-{$element_width|replace:'.':'-'} steasy_element_1 {if $element.st_el_hide_on_mobile == 1} hidden-md-down {elseif $element.st_el_hide_on_mobile == 2} hidden-lg-up {/if}">
    	<div class="steasy_element_item text-{$element.st_el_text_align} {if $element.st_el_content_width} width_{$element.st_el_content_width} {/if}">
		{assign var="pre_template" value="_"|explode:$element.st_el_icon_with_text}
    	{include file="module:steasycontent/views/templates/hook/icon_with_text/{$pre_template[0]}.tpl"}
    	</div>
    </div>
{/foreach}   
</div>  