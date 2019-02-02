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
<!-- MODULE st easy content -->
<div id="stacc_{$sub_column.id_st_easy_content_column}" class="stacc_block stacc_{if isset($sub_column.st_el_accordion)}{$sub_column.st_el_accordion}{else}1_1{/if}" role="tablist" aria-multiselectable="true">
  {foreach $sub_column['elements'] as $element}
  {assign var="is_collapsed" value=0}
  {if (isset($sub_column.st_state) && ($sub_column.st_state==2 || (!$sub_column.st_state && $element@index)))}
    {$is_collapsed=1}
  {/if}
  <div class="acc_box {if $element.st_el_hide_on_mobile == 1} hidden-md-down {elseif $element.st_el_hide_on_mobile == 2} hidden-lg-up {/if}">
    <div class="acc_header" role="tab" id="acc_heading_{$element.id_st_easy_content_element}">
        <a data-toggle="collapse" data-parent="#stacc_{$sub_column.id_st_easy_content_column}" href="#collapse_{$element.id_st_easy_content_element}" aria-expanded="true" aria-controls="collapse_{$element.id_st_easy_content_element}" class="flex_container {if $is_collapsed} collapsed {/if}">
          {if isset($sub_column.st_icon_open) && $sub_column.st_icon_open}
          <div class="acc_icon">
          	<i class="{$sub_column.st_icon_open} acc_open"></i>
          	<i class="{if $sub_column.st_icon_close}{$sub_column.st_icon_close}{else}{$sub_column.st_icon_open}{/if} acc_close"></i>
          </div>
          {/if}
          <div class="acc_inner flex_child">{$element.st_el_header}</div>
        </a>
    </div>

    <div id="collapse_{$element.id_st_easy_content_element}" class="collapse {if !$is_collapsed} show {/if}" role="tabpanel" aria-labelledby="acc_heading_{$element.id_st_easy_content_element}">
       <div class="acc_content">{$element.st_el_text nofilter}</div>
    </div>
  </div>
  {/foreach}
</div>
<!-- MODULE st easy content -->