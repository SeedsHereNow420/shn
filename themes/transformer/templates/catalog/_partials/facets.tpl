{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
 {assign var='filter_position' value=Configuration::get('STSN_FILTER_POSITION')}
  <div id="search_filters">
      {foreach from=$facets item="facet"}
      {if $facet.displayed}
        <section class="facet clearfix">
          {assign var=_expand_id value=10|mt_rand:100000}
          {assign var=_collapse value=true}
          {foreach from=$facet.filters item="filter"}
            {if $filter.active}{assign var=_collapse value=false}{/if}
          {/foreach}
          {if $filter_position==2 || $filter_position==3}
            <div class="dropdown_wrap facet_dropdown_item">
              <div class="dropdown_tri dropdown_tri_in flex_container flex_space_between link_color" aria-haspopup="true" aria-expanded="false">
                  <span>{$facet.label}</span>
                  <i class="fto-angle-down arrow_down arrow"></i>
                  <i class="fto-angle-up arrow_up arrow"></i>
              </div>
              <div class="dropdown_list" aria-labelledby="{$facet.label}">
                  <div class="facet-title-mobile toggle_btn {if $_collapse} collapsed {/if}" data-target="#facet_{$_expand_id}" data-toggle="collapse" aria-expanded="{if $_collapse}false{else}true{/if}">
                    <div class="flex_container flex_space_between">
                      <span class="facet-title-mobile-inner">{$facet.label}</span>
                      <i class="fto-angle-down arrow_down arrow"></i>
                      <i class="fto-angle-up arrow_up arrow"></i>
                    </div>
                  </div>
                 {if $facet.widgetType !== 'dropdown'}
                    {block name='dropdown_facet_item_other'}
                    <ul id="facet_{$_expand_id}" class="facet_filter_box collapse{if !$_collapse} in{/if}">
                      {include file='catalog/_partials/facets-input.tpl'}
                    </ul>
                    {/block}
                  {else}
                    {block name='dropdown_facet_item_dropdown'}
                    <div id="facet_{$_expand_id}" class="facet_filter_box collapse{if !$_collapse} in{/if}">
                      {include file='catalog/_partials/facets-select.tpl'}
                    </div>
                    {/block}
                  {/if}
              </div>
            </div>
          {else}  
            <div class="facet-title hidden-md-down">{$facet.label}</div>
            <div class="facet-title-mobile toggle_btn hidden-lg-up {if $_collapse} collapsed {/if}" data-target="#facet_{$_expand_id}" data-toggle="collapse" aria-expanded="{if $_collapse}false{else}true{/if}">
              <div class="flex_container flex_space_between">
                <span class="facet-title-mobile-inner">{$facet.label}</span>
                <i class="fto-angle-down arrow_down arrow"></i>
                <i class="fto-angle-up arrow_up arrow"></i>
              </div>
            </div>
            {if $facet.widgetType !== 'dropdown'}
              {block name='facet_item_other'}
              <ul id="facet_{$_expand_id}" class="facet_filter_box collapse{if !$_collapse} in{/if}">
                {include file='catalog/_partials/facets-input.tpl'}
              </ul>
              {/block}
            {else}
              {block name='facet_item_dropdown'}
              <div id="facet_{$_expand_id}" class="facet_filter_box collapse{if !$_collapse} in{/if}">
                {include file='catalog/_partials/facets-select.tpl'}
              </div>
              {/block}
            {/if}
          {/if}
        </section>
      {/if}
    {/foreach}
  </div>
