{*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{extends file='customer/page.tpl'}
{block name="page_content"}
{foreach $errors AS $error}
<div class="alert">
{$error}
</div>
{/foreach}
	{if $id_customer|intval neq 0}
        {if isset($products) && count($products)}
        <h3 class="page_heading">{l s='My loved products' d='Shop.Theme.Transformer'}</h3>
        <ul class="com_grid_view row">
            {foreach $products as $product}
            <li class="loved_product_item p-b-1 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 {if !($product@index%2)} first-item-of-large-line  first-item-of-desktop-line first-item-of-line first-item-of-tablet-line {/if}" data-id_source="{$product['id_product']}" data-type="1">
            <div class="pro_simple_box clearfix">
                <div class="itemlist_left">
                    <a class="product_image" href="{$product.url}" title="{$product.name}"><img src="{$product.cover.bySize.home_default.url}" {if $sttheme.retina && isset($product.cover.bySize.home_default_2x.url)} srcset="{$product.cover.bySize.home_default_2x.url} 2x" {/if} width="{$product.cover.bySize.home_default.width}" height="{$product.cover.bySize.home_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" /></a>
                </div>
                <div class="itemlist_right">
                    <h3 class="s_title_block"><a href="{$product.url}" title="{$product.name}">{$product.name}</a></h3>
                    {block name='product_price_and_shipping'}
                      {if $product.show_price}
                        <div class="product-price-and-shipping" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                          <meta itemprop="priceCurrency" content="{$currency.iso_code}">
                          
                          {hook h='displayProductPriceBlock' product=$product type="before_price"}

                          <span itemprop="price" class="price">{$product.price}</span>
                          
                          {if $product.has_discount}
                            {hook h='displayProductPriceBlock' product=$product type="old_price"}

                            <span class="regular-price">{$product.regular_price}</span>
                            {if $product.discount_type === 'percentage'}
                              <span class="discount-percentage">{$product.discount_percentage}</span>
                            {/if}
                          {/if}

                          {hook h='displayProductPriceBlock' product=$product type='unit_price'}

                          {hook h='displayProductPriceBlock' product=$product type='weight'}
                        </div>
                      {/if}
                    {/block}
                    <a href="javascript:;" title="{l s='Delete' d='Shop.Theme.Transformer'}" class="btn-spin loved_remove_product" rel="nofollow"><i class="fto-cancel mar_r4"></i>{l s='Delete' d='Shop.Theme.Transformer'}</a>   
                </div>
            </div>
            </li>
            {/foreach}
        </ul>
        {/if}
        {if isset($blogs) && count($blogs)}
        <h3 class="page_heading">{l s='My loved articles' d='Shop.Theme.Transformer'}</h3>
        <ul class="com_grid_view row">
            {foreach $blogs as $blog}
            <li class="loved_product_item p-b-1 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 {if !($blog@index%2)} first-item-of-large-line  first-item-of-desktop-line first-item-of-line first-item-of-tablet-line {/if}" data-id_source="{$blog['id_st_blog']}" data-type="2">
            <div class="pro_simple_box clearfix">
                <div class="itemlist_left">
                    <a class="product_image" href="{$blog.link}" title="{$blog.name}"><img src="{$blog.cover.links.small.image}" width="{$blog.cover.links.small.width}" height="{$blog.cover.links.small.height}" alt="{$blog.name}" /></a>
                </div>
                <div class="itemlist_right">
                    <h3 class="s_title_block"><a href="{$blog.link}" title="{$blog.name}">{$blog.name}</a></h3>
                    <a href="javascript:;" title="{l s='Delete' d='Shop.Theme.Transformer'}" class="btn-spin loved_remove_product" rel="nofollow"><i class="fto-cancel mar_r4"></i>{l s='Delete' d='Shop.Theme.Transformer'}</a>   
                </div>
            </div>
            </li>
            {/foreach}
        </ul>
        {/if}
        {if !isset($blogs) && !isset($products)}
        {l s='You haven\'t loved yet.' d='Shop.Theme.Transformer'}
        {/if}
	{/if}
{/block}