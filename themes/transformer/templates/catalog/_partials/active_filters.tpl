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
{*this file is loaded before the theme editor module*}
{assign var='filter_position' value=Configuration::get('STSN_FILTER_POSITION')}
<div id="js-active-search-filters" class="active_filters_box flex_container flex_start {if !$filter_position && !$activeFilters|count} hidden-xs-up {/if}">
    {block name='active_filters_title'}<span class="active_filter_title font-weight-bold">{l s='Filter By' d='Shop.Theme.Actions'}</span>{/block}
    <div class="flex_child">
      <div class="active_filters">
		{if $activeFilters|count}
	      {foreach from=$activeFilters item="filter"}
          {block name='active_filters_item'}
	        <a class="js-search-link active_filter_item" href="{$filter.nextEncodedFacetsURL}" title="{$filter.label}">{l s='%1$s: ' d='Shop.Theme.Catalog' sprintf=[$filter.facetLabel]} {$filter.label}<i class="fto-cancel-2"></i></a>
          {/block}
	      {/foreach}
	      	<a href="javascript:;" data-search-url="{$clear_all_link}" class="js-search-filters-clear-all active_filter_item" title="{l s='Clear all' d='Shop.Theme.Actions'}">
		        {l s='Clear all' d='Shop.Theme.Actions'}
		        <i class="fto-cancel-2"></i>
	      	</a>
		{/if}
		</div>
    </div>
    {if $filter_position==1}
    <a class="toggle_btn active_filter_item" data-toggle="collapse" href="#horizontal_filters" aria-expanded="true" aria-controls="horizontal_filters" title="{l s='Toggle filters' d='Shop.Theme.Transformer'}">
      {l s='Toggle filters' d='Shop.Theme.Transformer'}
      <i class="fto-angle-down"></i>
    </a>
    {/if}
  </div>
