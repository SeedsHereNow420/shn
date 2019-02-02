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
<div class="pro_column_box clearfix line_item" {if isset($from_product_page) && $from_product_page} itemprop="{$from_product_page}" {/if} itemscope itemtype="https://schema.org/Product">
  <a href="{$product.url}" title="{$product.name}" class="pro_column_left" itemprop="url">
    <img src="{$product.cover.bySize.cart_default.url}" {if $sttheme.retina && isset($product.cover.bySize.cart_default_2x.url)} srcset="{$product.cover.bySize.cart_default_2x.url} 2x" {/if} width="{$product.cover.bySize.cart_default.width}" height="{$product.cover.bySize.cart_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" itemprop="image" />
  </a>
  <div class="pro_column_right">
    <h3 itemprop="name" class="s_title_block nohidden"><a href="{$product.url}" title="{$product.name}" itemprop="url">{$product.name|truncate:50:'...'}</a></h3>

    {block name='product_price_and_shipping'}
      {if $product.show_price}
        <div class="product-price-and-shipping" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
          <meta itemprop="priceCurrency" content="{$currency.iso_code}">
          
          {hook h='displayProductPriceBlock' product=$product type="before_price"}

          <span itemprop="price" class="price" content="{$product.price_amount}">{$product.price}</span>
          
          {if $product.has_discount}
            {hook h='displayProductPriceBlock' product=$product type="old_price"}

            <span class="regular-price">{$product.regular_price}</span>
            {if !$sttheme.hide_discount}
            {if $product.discount_type === 'percentage'}
              <span class="discount discount-percentage">{$product.discount_percentage}</span>
            {else}
              <span class="discount discount-amount">-{$product.discount_to_display}</span>
            {/if}
            {/if}
          {/if}

          {hook h='displayProductPriceBlock' product=$product type='unit_price'}

          {hook h='displayProductPriceBlock' product=$product type='weight'}
        </div>
      {/if}
    {/block}
  </div>
</div>
