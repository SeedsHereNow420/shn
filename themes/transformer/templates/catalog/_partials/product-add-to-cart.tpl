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


<div class="product-add-to-cart  mb-3">
  {if !$configuration.is_catalog}

    {block name='product_availability'}
        {if $product.show_availability && $product.availability_message}
        <div id="product-availability" class="{if $product.availability == 'available'} product-available {elseif $product.availability == 'last_remaining_items'} product-last-items {else} product-unavailable {/if} mar_b6 fs_md">
            {$product.availability_message}
            {block name='product_quantities'}
              {if $product.show_quantities}
                  <span class="product-quantities" data-stock="{$product.quantity}" data-allow-oosp="{$product.allow_oosp}">{$product.quantity} {$product.quantity_label}</span>
              {/if}
            {/block}
        </div>
        {/if}
    {/block}

    {block name='product_minimal_quantity'}
        {if $product.minimal_quantity > 1}
      <div class="product-minimal-quantity mar_b6">
          {l
          s='The minimum purchase order quantity for the product is %quantity%.'
          d='Shop.Theme.Checkout'
          sprintf=['%quantity%' => $product.minimal_quantity]
          }
      </div>
        {/if}
    {/block}
    
    {block name='product_availability_date'}
      {if $product.availability_date}
        <div class="product-availability-date mar_b6">
          <span>{l s='Availability date:' d='Shop.Theme.Catalog'} </span> {$product.availability_date}
        </div>
      {/if}
    {/block}

    <div class="pro_cart_block flex_container flex_column_sm">
    {block name='product_quantity'}
      <div class="product-quantity flex_child">
        <div class="qty qty_wrap qty_wrap_big mar_b6 {if $sttheme.product_buy_button} qty_full_width {/if}">
          <input
            type="text"
            name="qty"
            id="quantity_wanted"
            value="{$product.quantity_wanted}"
            class="input-group"
            min="{$product.minimal_quantity}"
            aria-label="{l s='Quantity' d='Shop.Theme.Actions'}"
          >
        </div>
        <div class="add mar_b6 {if $sttheme.product_buy_button} add_full_width {/if}">
          <button class="btn btn-default btn-large add-to-cart btn-full-width btn-spin" data-button-action="add-to-cart" type="submit" {if !$product.add_to_cart_url} disabled {/if}>
            <i class="fto-glyph icon_btn"></i><span>{l s='Add to cart' d='Shop.Theme.Actions'}</span>
          </button>
		  
		  
        </div>
      </div>
    {/block}

      <div class="pro_cart_right">
        <div class="flex_box">
        {hook h='displayProductCartRight'}
        {foreach $product.extraContent as $extra}
          {if $extra.moduleName=='stvideo'}
              {include file="module:stvideo/views/templates/hook/stvideo_link.tpl" stvideos=$extra.content video_position=array(12)}
          {/if}
        {/foreach}
        </div>
      </div>
    </div>
  {/if}
</div>

