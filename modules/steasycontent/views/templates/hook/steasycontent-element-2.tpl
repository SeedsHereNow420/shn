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
	{assign var="pre_template" value="_"|explode:$element['st_el_text_block']}
    <div id="steasy_element_{$element.id_st_easy_content_element}" class="col-lg-{$element_width|replace:'.':'-'} sttext_block sttext_{$pre_template[0]} sttext_{$element.st_el_text_block} {if $element.st_el_hide_on_mobile == 1} hidden-md-down {elseif $element.st_el_hide_on_mobile == 2} hidden-lg-up {/if}">
		<div class="steasy_element_item text-{$element.st_el_text_align} {if isset($element.st_el_mobile_text_align)} text-md-{$element.st_el_mobile_text_align} {/if} {if $element.st_el_content_width} width_{$element.st_el_content_width} {/if} clearfix {if $pre_template[0]==2} row {/if}">  
	        {assign var='column_width_total' value=12}  
			{if $element.st_image_block_width && (isset($element.st_image) && $element.st_image)}
	        	{assign var='column_width_total' value=$column_width_total-$element.st_image_block_width}  
				<div class="sttext_item_image {if $element.st_image_hover} hover_effect_{$element.st_image_hover} {/if} {if $pre_template[0]==2} col-lg-{$element.st_image_block_width|replace:'.':'-'} {if $pre_template[1]==2 || $pre_template[1]==4} push-lg-{$column_width_total|replace:'.':'-'} {/if} {/if} {if $pre_template[0]==3}{if $pre_template[1]==1} fl {else} fr  {/if}{/if}">
					{if isset($element.st_image_big) && $element.st_image_big}<a href="{$easy_image_path|cat:$element.st_image_big}" class="sttext_item_image_inner view_large_box st_popup_image" data-group="sttext_{$sub_column.id_st_easy_content_column}" rel="nofollow" title="{$element.st_el_header}"><i class="fto-arrows-alt "></i>{else}<div class="sttext_item_image_inner">{/if}
						<img src="{if $element.st_image|strpos:'/modules/' !== false}{$element.st_image}{else}{$easy_image_path|cat:$element.st_image}{/if}" alt="{$element.st_el_header}" width="{$element.st_image_width}" height="{$element.st_image_height}" class="hover_effect_target" />
					{if isset($element.st_image_big) && $element.st_image_big}</a>{else}</div>{/if}
				</div>
			{/if}
			{if $column_width_total}
				{if $pre_template[0]==2}<div class="sttext_item_text col-lg-{$column_width_total|replace:'.':'-'} {if $pre_template[1]==2 || $pre_template[1]==4} pull-lg-{$element.st_image_block_width|replace:'.':'-'} {/if}">{/if}
					{if $element.st_title_position!=3 && $element.st_el_header}
                        <div class="title_block flex_container title_align_{(int)$element.st_title_position} title_style_{(int)$sttheme.heading_style} sttext_item_header">
                            <div class="flex_child title_flex_left"></div>
                            <div class="title_block_inner">{$element.st_el_header}</div>
                            <div class="flex_child title_flex_right"></div>
                        </div>
                    {/if}
                    <div class="sttext_item_content {if isset($element.st_el_text_style) && $element.st_el_text_style}{$element.st_el_text_style}{/if}">
					{$element.st_el_text nofilter}
                    </div>
				{if $pre_template[0]==2}</div>{/if}
			{/if}
		</div>
    </div>
{/foreach}   
</div>  
