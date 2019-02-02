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

{extends file=$layout}

{block name='head_seo' prepend}
  <link rel="canonical" href="{$product.canonical_url}">
{/block}

{block name='head_viewport' append}
  {if isset($fb_app_id) && $fb_app_id}
  <meta property="fb:app_id" content="{$fb_app_id}" />
  {/if}
  <meta property="og:type" content="product">
  <meta property="og:url" content="{$urls.current_url}">
  <meta property="og:title" content="{$page.meta.title}">
  <meta property="og:site_name" content="{$shop.name}">
  <meta property="og:description" content="{$page.meta.description}">
  <meta property="og:image" content="{$product.cover.large.url}">
  <meta property="og:image:width" content="{$product.cover.large.width}">
  <meta property="og:image:height" content="{$product.cover.large.height}">
  <meta property="og:image:alt" content="{$product.name}">
  <meta property="product:pretax_price:amount" content="{$product.price_tax_exc}">
  <meta property="product:pretax_price:currency" content="{$currency.iso_code}">
  <meta property="product:price:amount" content="{$product.price_amount}">
  <meta property="product:price:currency" content="{$currency.iso_code}">
  {if isset($product.weight) && ($product.weight != 0)}
  <meta property="product:weight:value" content="{$product.weight}">
  <meta property="product:weight:units" content="{$product.weight_unit}">
  {/if}
{/block}


  {block name='full_width_top' append}
    {if $layout=='layouts/layout-full-width.tpl'}
    <section id="main"{if $sttheme.google_rich_snippets} itemscope itemtype="https://schema.org/Product" {/if}>
      <div class="product_first_section">
      <div class="{if !$sttheme.pro_page_first_full_screen} container {else} container-fluid {/if}">
         {include file='catalog/product/product-first.tpl'}
      </div>
      </div>
      <div class="product_second_section">
      <div class="container">
        {include file='catalog/product/product-second.tpl'}
      </div>
      </div>
      <div class="product_third_section">
      <div class="container">
        {include file='catalog/product/product-third.tpl'}
      </div>
      </div>
    </section>
    {/if}
  {/block}

  {block name='content_wrapper'}
    {if $layout!='layouts/layout-full-width.tpl'}
      {$smarty.block.parent}
    {/if}
  {/block}
  {block name='content'}
    {if $layout!='layouts/layout-full-width.tpl'}
    <section id="main"{if $sttheme.google_rich_snippets} itemscope itemtype="https://schema.org/Product" {/if}>
      {include file='catalog/product/product-first.tpl'}
      {include file='catalog/product/product-second.tpl'}
      {include file='catalog/product/product-third.tpl'}
    </section>
    {/if}
  {/block}