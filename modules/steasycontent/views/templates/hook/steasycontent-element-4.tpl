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
{assign var="st_el_tab" value='1_1'}
{if isset($sub_column['st_el_tab']) && $sub_column['st_el_tab']}{$st_el_tab=$sub_column['st_el_tab']}{/if}
{assign var="pre_template" value="_"|explode:$st_el_tab}
<div class="sttab_block sttab_{$pre_template[0]} sttab_{$st_el_tab} {if $pre_template[0]==3} flex_container flex_start {/if} mobile_tab">   

	<ul class="nav nav-tabs {if $pre_template[0]==1} flex_container {elseif (($pre_template[0]==1 || $pre_template[0]==2) && ($pre_template[1]==3 || $pre_template[1]==4))}  flex_box flex_center  {/if}" role="tablist">
	{foreach $sub_column['elements'] as $element}
		  <li class="nav-item {if $pre_template[0]==1} flex_child {/if} {if $element.st_el_hide_on_mobile == 1} hidden-md-down {elseif $element.st_el_hide_on_mobile == 2} hidden-lg-up {/if}">
		    <a class="nav-link {if !$element@index} active{/if}" data-toggle="tab" href="#sttab_item_{$element.id_st_easy_content_element}" title="{$element.st_el_header}" rel="nofollow" role="tab" aria-controls="sttab_item_{$element.id_st_easy_content_element}">{if $element.st_el_icon}<i class="{$element.st_el_icon}"></i>{/if}{$element.st_el_header}</a>
		  </li>
	{/foreach}
	</ul>

	<div class="tab-content {if $pre_template[0]==3} flex_child {/if}">
	{foreach $sub_column['elements'] as $element}
		<div class="tab-pane {if !$element@index} active st_open {/if} {if $element.st_el_hide_on_mobile == 1} hidden-md-down {elseif $element.st_el_hide_on_mobile == 2} hidden-lg-up {/if}" id="sttab_item_{$element.id_st_easy_content_element}" role="tabpanel">
			 <div class="mobile_tab_title">
	        	<a href="javascript:;" class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></a>
	            <div class="mobile_tab_name">{if $element.st_el_icon}<i class="{$element.st_el_icon}"></i>{/if}{$element.st_el_header}</div>
	        </div>
			<div class="tab-pane-body">
				{$element.st_el_text nofilter}
			</div>
		</div>
	{/foreach}
	</div>

</div>