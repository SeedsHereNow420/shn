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
{block name='address_selector_blocks'}
<div class="row com_grid_view">
{foreach $addresses as $address}
  <article
    class="address-item{if $address.id == $selected} selected{/if} col-md-6 {if $address@index%2==0} first-item-of-large-line  first-item-of-desktop-line first-item-of-line {/if}"
    id="{$name|classname}-address-{$address.id}"
  >
    <div class="card card_trans mb-3">
      <div class="card-block">
        <label class="radio-block">
          <span class="custom-radio">
            <input
              type="radio"
              name="{$name}"
              value="{$address.id}"
              {if $address.id == $selected}checked{/if}
            >
            <span></span>
          </span>
          <span class="address-alias">{$address.alias}</span>
          <div class="address">{$address.formatted nofilter}</div>
        </label>
      </div>
      <footer class="address-footer card-footer">
        {if $interactive}
          <a
            class="edit-address text_color inline_block mar_r6"
            data-link-action="edit-address"
            href="{url entity='order' params=['id_address' => $address.id, 'editAddress' => $type, 'token' => $token]}"
            title="{l s='Edit' d='Shop.Theme.Actions'}"
          >
            <i class="fto-edit fs_md mar_r4"></i>{l s='Edit' d='Shop.Theme.Actions'}
          </a>
          <a
            class="delete-address text_color inline_block"
            data-link-action="delete-address"
            href="{url entity='order' params=['id_address' => $address.id, 'deleteAddress' => true, 'token' => $token]}"
            title="{l s='Delete' d='Shop.Theme.Actions'}"
          >
            <i class="fto-cancel fs_md mar_r4"></i>{l s='Delete' d='Shop.Theme.Actions'}
          </a>
        {/if}
      </footer>
    </div>
  </article>
{/foreach}
</div>
{if $interactive}
  <p>
    <button class="ps-hidden-by-js form-control-submit center-block" type="submit">{l s='Save' d='Shop.Theme.Actions'}</button>
  </p>
{/if}
{/block}