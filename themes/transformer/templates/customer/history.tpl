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
{extends file='customer/page.tpl'}

{block name='page_title'}
  {l s='Order history' d='Shop.Theme.Customeraccount'}
{/block}

{block name='page_content'}
  <p>{l s='Here are the orders you\'ve placed since your account was created.' d='Shop.Theme.Customeraccount'}</p>

  {if $orders}
    <table class="table  table-bordered table-labeled hidden-sm-down">
      <thead>
        <tr>
          <th>{l s='Order reference' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Date' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Total price' d='Shop.Theme.Checkout'}</th>
          <th class="hidden-md-down">{l s='Payment' d='Shop.Theme.Checkout'}</th>
          <th class="hidden-md-down">{l s='Status' d='Shop.Theme.Checkout'}</th>
          <th>{l s='Invoice' d='Shop.Theme.Checkout'}</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$orders item=order}
          <tr>
            <th scope="row">{$order.details.reference}</th>
            <td>{$order.details.order_date}</td>
            <td class="text-right">{$order.totals.total.value}</td>
            <td class="hidden-md-down">{$order.details.payment}</td>
            <td>
              <span
                class="badge badge-default {$order.history.current.contrast}"
                style="background-color:{$order.history.current.color}"
              >
                {$order.history.current.ostate_name}
              </span>
            </td>
            <td class="text-center hidden-md-down">
              {if $order.details.invoice_url}
                <a href="{$order.details.invoice_url}"><i class="fto-file-pdf fs_lg"></i></a>
              {else}
                -
              {/if}
            </td>
            <td class="text-center order-actions">
              <a href="{$order.details.details_url}" data-link-action="view-order-details" title="{l s='Details' d='Shop.Theme.Customeraccount'}" class="mar_r4">
                {l s='Details' d='Shop.Theme.Customeraccount'}
              </a>
              {if $order.details.reorder_url}
                <a href="{$order.details.reorder_url}" title="{l s='Reorder' d='Shop.Theme.Actions'}">{l s='Reorder' d='Shop.Theme.Actions'}</a>
              {/if}
            </td>
          </tr>
        {/foreach}
      </tbody>
    </table>

    <div class="orders hidden-md-up base_list_line medium_list">
      {foreach from=$orders item=order}
        <div class="order line_item flex_box">
            <div class="flex_child">
              <a href="{$order.details.details_url}" title="{$order.details.reference}" class="font-weight-bold">{$order.details.reference}</a>
              <div class="date">{$order.details.order_date}</div>
              <div class="total">{$order.totals.total.value}</div>
              <div>{$order.details.payment}</div>
            </div>
            <div class="text-right">
              <div class="status">
                <span
                  class="badge badge-default {$order.history.current.contrast}"
                  style="background-color:{$order.history.current.color}"
                >
                  {$order.history.current.ostate_name}
                </span>
              </div>
                  <a href="{$order.details.details_url}" data-link-action="view-order-details" title="{l s='Details' d='Shop.Theme.Customeraccount'}">
                    {l s='Details' d='Shop.Theme.Customeraccount'}
                  </a>
                {if $order.details.reorder_url}
                    <a href="{$order.details.reorder_url}" title="{l s='Reorder' d='Shop.Theme.Actions'}" class="mar_l6">
                      {l s='Reorder' d='Shop.Theme.Actions'}
                    </a>
                {/if}
            </div>
        </div>
      {/foreach}
    </div>

  {/if}
{/block}
