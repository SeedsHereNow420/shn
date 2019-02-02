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
<div id="js-product-list-top" class="products-selection flex_container general_top_border general_bottom_border">
    {assign var='filter_position' value=Configuration::get('STSN_FILTER_POSITION')}
    {if !empty($listing.rendered_facets) && !$filter_position}
      <div class="hidden-lg-up filter-button mar_r6">
      <a href="javascript:;" id="search_filter_toggler" data-name="left_column" data-direction="open_column" class="rightbar_tri btn btn-default" title="{l s='Filter' d='Shop.Theme.Actions'}">{l s='Filter' d='Shop.Theme.Actions'}</a><!--to do how to know filters are in left column or right column-->
      </div>
    {/if}
  
      {block name='sort_by'}
        {include file='catalog/_partials/sort-orders.tpl' sort_orders=$listing.sort_orders}
      {/block}
  {if $sttheme.product_view_swither}
  <div class="list_grid_switcher">
    <div class="grid {if !$sttheme.list_grid} selected {/if}" title="{l s='Grid view' d='Shop.Theme.Transformer'}"><i class="fto-th-large-1"></i></div>
    <div class="list {if $sttheme.list_grid} selected {/if}" title="{l s='List view' d='Shop.Theme.Transformer'}"><i class="fto-th-list-1"></i></div>
  </div>
  {/if}
  <div class="flex_child">
  </div>
  {include file='_partials/pagination-sample.tpl' pagination=$listing.pagination}
</div>
