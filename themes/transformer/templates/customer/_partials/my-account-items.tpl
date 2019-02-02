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
	      <div class="list-group-item">
	      <a class=" landing-link" href="{$urls.pages.my_account}" title="{l s='Dashboard' d='Shop.Theme.Transformer'}">
	          <i class="fto-cog mar_r4 fs_lg"></i>{l s='Dashboard' d='Shop.Theme.Transformer'}
	      </a>
	      </div>

	      <div class="list-group-item">
	      <a class=" identity-link" href="{$urls.pages.identity}" title="{l s='Information' d='Shop.Theme.Customeraccount'}">
	          <i class="fto-vcard-1 mar_r4 fs_lg"></i>{l s='Information' d='Shop.Theme.Customeraccount'}
	      </a>
	      </div>

	      {if $customer.addresses|count}
	        <div class="list-group-item">
	        <a class=" addresses-link" href="{$urls.pages.addresses}" title="{l s='Addresses' d='Shop.Theme.Customeraccount'}">
	            <i class="fto-location-2 mar_r4 fs_lg"></i>{l s='Addresses' d='Shop.Theme.Customeraccount'}
	        </a>
	        </div>
	      {else}
	        <div class="list-group-item">
	        <a class=" address-link" href="{$urls.pages.address}" title="{l s='Add first address' d='Shop.Theme.Customeraccount'}">
	            <i class="fto-location-2 mar_r4 fs_lg"></i>{l s='Add first address' d='Shop.Theme.Customeraccount'}
	        </a>
	        </div>
	      {/if}

	      {if !$configuration.is_catalog}
	        <div class="list-group-item">
	        <a class=" history-link" href="{$urls.pages.history}" title="{l s='Order history and details' d='Shop.Theme.Customeraccount'}">
	            <i class="fto-calendar-1 mar_r4 fs_lg"></i>{l s='Order history and details' d='Shop.Theme.Customeraccount'}
	        </a>
	        </div>
	      {/if}

	      {if !$configuration.is_catalog}
	        <div class="list-group-item">
	        <a class=" order-slips-link" href="{$urls.pages.order_slip}" title="{l s='Credit slips' d='Shop.Theme.Customeraccount'}">
	            <i class="fto-dot-circled mar_r4 fs_lg"></i>{l s='Credit slips' d='Shop.Theme.Customeraccount'}
	        </a>
	        </div>
	      {/if}

	      {if $configuration.voucher_enabled && !$configuration.is_catalog}
	        <div class="list-group-item">
	        <a class=" discounts-link" href="{$urls.pages.discount}" title="{l s='Vouchers' d='Shop.Theme.Customeraccount'}">
	            <i class="fto-tag-2 mar_r4 fs_lg"></i>{l s='Vouchers' d='Shop.Theme.Customeraccount'}
	        </a>
	        </div>
	      {/if}

	      {if $configuration.return_enabled && !$configuration.is_catalog}
	        <div class="list-group-item">
	        <a class=" returns-link" href="{$urls.pages.order_follow}" title="{l s='Merchandise returns' d='Shop.Theme.Customeraccount'}">
	            <i class="fto-paper-plane mar_r4 fs_lg"></i>{l s='Merchandise returns' d='Shop.Theme.Customeraccount'}
	        </a>
	        </div>
	      {/if}

	      {block name='display_customer_account'}
	        {hook h='displayCustomeraccount'}
	      {/block}