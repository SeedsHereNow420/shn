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
  <div class="products-sort-order dropdown_wrap mar_r1">
    <a href="javascript:" class="dropdown_tri dropdown_tri_in" rel="nofollow" aria-haspopup="true" aria-expanded="false">
      {if isset($listing.sort_selected) && $listing.sort_selected}{$listing.sort_selected}{else}{l s='Select' d='Shop.Theme.Actions'}{/if}
      <i class="fto-angle-down arrow_down arrow"></i>
      <i class="fto-angle-up arrow_up arrow"></i>
    </a>
    <div class="dropdown_list">
      <ul class="dropdown_list_ul dropdown_box">
      {foreach from=$listing.sort_orders item=sort_order}
        <li>
        <a
          rel="nofollow"
          title="{$sort_order.label}"
          href="{$sort_order.url}"
          class="dropdown_list_item {['current' => $sort_order.current, 'js-search-link' => true]|classnames} btn-spin js-btn-active"
        >
          <i class="fto-angle-right mar_r4"></i>{$sort_order.label}
        </a>
        </li>
      {/foreach}
      </ul>
    </div>
  </div>
