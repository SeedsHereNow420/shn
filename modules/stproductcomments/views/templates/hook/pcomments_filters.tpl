{*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div id="js_pcomments_filter">
{if isset($pcomments)}
<div class="flex_container flex_left general_top_border general_bottom_border p-2 mb-2 general_bg">
  <a href="{$pcomments.clear_all_link}" class="{if $pcomments.id_product} pc-search-link {/if} mr-3 {if !$pcomments.does_filter_by_star && !$pcomments.does_filter_by_pic} theme_color {/if}" rel="nofollow" title="{l s='All reviews' d='Shop.Theme.Transformer'}">{l s='All reviews' d='Shop.Theme.Transformer'}<span class="pcomment_stat">({$pcomments.stat.total})</span></a>
  <div class="dropdown_wrap mr-3">{strip}
        <div class="dropdown_tri dropdown_tri_in" aria-haspopup="true" aria-expanded="false">
          {assign var='current_star_lable' value=''}
          {foreach $pcomments.filter_star as $filter}
          {if $filter.current}{$current_star_lable=$filter}{/if}
          {/foreach}
          <span class="{if $pcomments.does_filter_by_star} theme_color {/if}">{if $current_star_lable}{$current_star_lable.label}<span class="pcomment_stat">({$current_star_lable.val})</span>{else}{l s='All stars' d='Shop.Theme.Transformer'}<span class="pcomment_stat">({$pcomments.stat.total})</span>{/if}</span>
          <i class="fto-angle-down arrow_down arrow"></i>
          <i class="fto-angle-up arrow_up arrow"></i>
        </div>
        {/strip}
        <div class="dropdown_list" aria-labelledby="">
            <ul class="dropdown_list_ul dropdown_box">
              {foreach $pcomments.filter_star as $filter}
              {if !$filter.current}
              <li><a href="{$filter.url}" class="{if $pcomments.id_product} pc-search-link {/if} dropdown_list_item" title="{$filter.label}" rel="nofollow">{$filter.label}<span class="pcomment_stat">({$pcomments.stat.{$filter.val}})</span></a></li>
              {/if}
              {/foreach}
            </ul>
        </div>
  </div>
  <a href="{$pcomments.filter_pic}" class="{if $pcomments.id_product} pc-search-link {/if} mr-3 {if $pcomments.does_filter_by_pic} theme_color {/if}" rel="nofollow" title="{l s='With pictures' d='Shop.Theme.Transformer'}" >{l s='With pictures' d='Shop.Theme.Transformer'}<span class="pcomment_stat">({$pcomments.stat.image_total})</span></a>

  <div class="dropdown_wrap flex_float_right">{strip}
        <div class="dropdown_tri dropdown_tri_in" aria-haspopup="true" aria-expanded="false">
          {assign var='current_sort_order' value=''}
          {foreach $pcomments.filter_order as $filter}
          {if $filter.current}{$current_sort_order=$filter.label}{/if}
          {/foreach}
          <span>{if $current_sort_order}{$current_sort_order}{else}{l s='Sort order' d='Shop.Theme.Transformer'}{/if}</span>
          <i class="fto-angle-down arrow_down arrow"></i>
          <i class="fto-angle-up arrow_up arrow"></i>
        </div>
        {/strip}
        <div class="dropdown_list" aria-labelledby="">
            <ul class="dropdown_list_ul dropdown_box">
              {foreach $pcomments.filter_order as $filter}
              {if !$filter.current}
              <li><a href="{$filter.url}" class="{if $pcomments.id_product} pc-search-link {/if} dropdown_list_item" title="{$filter.label}" rel="nofollow">{$filter.label}</a></li>
              {/if}
              {/foreach}
            </ul>
        </div>
  </div>
</div>
{/if}
</div>