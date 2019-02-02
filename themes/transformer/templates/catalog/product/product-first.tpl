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
    {if $sttheme.google_rich_snippets}<meta itemprop="url" content="{$product.url}">{/if}

    <div class="row product_page_container product_page_layout_{(int)$sttheme.product_page_layout}">
      <div class="product_left_column col-lg-{$sttheme.pro_image_column_md} mb-2">
        {block name='page_content_container'}
          <section class="product_left_content mb-2">
            {block name='page_content'}

              {block name='product_cover_thumbnails'}
                {if $product.images && count($product.images)}
                  {include file='catalog/_partials/product-cover-thumbnails.tpl'}
                {/if}
              {/block}

            {/block}
          </section>
          {hook h='displayAfterProductThumbs'}{*moved from the bottom of product-cover-thumbnails.tpl*}
          {hook h='displayProductLeftColumn'}
          {foreach $product.extraContent as $extra}
            {if $extra.moduleName=='stvideo'}
                {include file="module:stvideo/views/templates/hook/stvideo_link.tpl" stvideos=$extra.content video_position=array(13)}
            {/if}
          {/foreach}
        {/block}
        </div>
        <div class="product_middle_column col-lg-{$sttheme.pro_primary_column_md} mb-3">
          {block name='page_header_container'}
            {block name='page_header'}
                <div class="product_name_wrap flex_container flex_start">
                    <div class="flex_child">
                    <h1 {if $sttheme.google_rich_snippets} itemprop="name" {/if} class="product_name">{block name='page_title'}{$product.name}{/block}</h1>
                    
                    {if ($sttheme.show_brand_logo == 4 || $sttheme.show_brand_logo == 5) && isset($product_manufacturer->id)}
                      {include file='catalog/_partials/miniatures/product-brand.tpl'}
                    {/if}
                    </div>

                    <section class="pro_name_right">
                    <div class="flex_box">
                    {foreach $product.extraContent as $extra}
                      {if $extra.moduleName == 'stproductlinknav' && ($extra.content.prev || $extra.content.next)}
                      {foreach $extra.content as $nav => $nav_product}
                          {if $nav_product}
                              <div class="product_link_nav with_preview"> 
                                  <a href="{$nav_product.url}" title="{$nav_product.name}"><i class="fto-{if $nav=='prev'}left{/if}{if $nav=='next'}right{/if}-open-3"></i>
                                      <div class="product_link_nav_preview">
                                          <img src="{$nav_product.cover}" alt="{$nav_product.name}" width="{$nav_product.small_default.width}" height="{$nav_product.small_default.height}"/>
                                      </div>
                                  </a>
                              </div>
                          {/if}
                      {/foreach}
                      {/if}
                      {if $extra.moduleName=='stvideo'}
                          {include file="module:stvideo/views/templates/hook/stvideo_link.tpl" stvideos=$extra.content video_position=array(10)}
                      {/if}
                    {/foreach}

                    {hook h='displayProductNameRight'}
                    </div>
                    </section>
                </div>
            {/block}
          {/block}
          {block name='product_flags_under'}
            {foreach $product.extraContent as $extra}
            {if $extra.moduleName=='ststickers'}
                {include file='catalog/_partials/miniatures/sticker.tpl' stickers=$extra.content sticker_position=array(10,11) sticker_sold_out=(!$product.add_to_cart_url)}
            {/if}
            {/foreach}
            {hook h='displayUnderProductName'}
          {/block}

          <div class="product-information">
            {block name='product_description_short'}
              <div id="product-description-short-{$product.id}" class="product-description-short mb-3 " {if $sttheme.google_rich_snippets} itemprop="description" {/if}>{$product.description_short nofilter}</div>
            {/block}

            <div class="steasy_divider between_short_and_price"><div class="steasy_divider_item"></div></div>

            <div class="mar_b1 pro_price_block flex_container flex_start">
              {block name='product_prices'}
                {include file='catalog/_partials/product-prices.tpl'}
              {/block}

              <div class="pro_price_right ">
                <div class="flex_box">
                {hook h='displayProductPriceRight'}
                {foreach $product.extraContent as $extra}
                  {if $extra.moduleName=='stvideo'}
                      {include file="module:stvideo/views/templates/hook/stvideo_link.tpl" stvideos=$extra.content video_position=array(11)}
                  {/if}
                {/foreach}
                </div>
              </div>
            </div>

            {if $product.is_customizable && count($product.customizations.fields)}
              {block name='product_customization'}
                {include file="catalog/_partials/product-customization.tpl" customizations=$product.customizations}
              {/block}
            {/if}

            {if !$sttheme.product_buy}{include file='catalog/_partials/product-buy.tpl'}{/if}
            
            {*moved from the product-detials.tpl*}
            {block name='product_condition'}
              {if $sttheme.display_pro_condition && $product.condition}
                <div class="product-condition  pro_extra_info flex_container">
                  <span class="pro_extra_info_label">{l s='Condition' d='Shop.Theme.Catalog'} </span>
                  <div class="pro_extra_info_content flex_child">
                      {$product.condition.label}
                  </div>
                </div>
              {/if}
            {/block}

            {block name='product_reference'}
            {if $sttheme.display_pro_reference && isset($product.reference_to_display)}
              <div class="product-reference pro_extra_info flex_container">
                <span class="pro_extra_info_label">{l s='Reference' d='Shop.Theme.Transformer'}: </span>
                <div class="pro_extra_info_content flex_child" {if $sttheme.google_rich_snippets} itemprop="sku" {/if}>{$product.reference_to_display}</div>
              </div>
            {/if}
            {if ($sttheme.show_brand_logo == 2 || $sttheme.show_brand_logo == 3) && isset($product_manufacturer->id)}
              {include file='catalog/_partials/miniatures/product-brand.tpl'}
            {/if}
            {/block}

            {block name='product_info_tags'}
              {if $sttheme.display_pro_tags==2}
                {foreach $product.extraContent as $extra}
                {if $extra.moduleName=='stthemeeditor' && isset($extra.content.tags)}
                <div class="product-info-tags pro_extra_info flex_container">
                  <span class="pro_extra_info_label">{l s='Tags' d='Shop.Theme.Transformer'}: </span>
                  <div class="pro_extra_info_content flex_child">
                    {foreach $extra.content.tags as $tag}
                          <a href="{url entity='search' params=['tag' => $tag|urlencode]}" title="{l s='More about' d='Shop.Theme.Transformer'} {$tag}" target="_top">{$tag}</a>{if !$tag@last}, {/if}
                      {/foreach}
                  </div>
                </div>
                {/if}
                {/foreach}
              {/if}
            {/block}
            {*moved from the product-detials.tpl end*}

            {*remove displayReassurance from here, use custom content module if needed.*}
            {hook h='displayProductCenterColumn'}
            {foreach $product.extraContent as $extra}
              {if $extra.moduleName=='stvideo'}
                  {include file="module:stvideo/views/templates/hook/stvideo_link.tpl" stvideos=$extra.content video_position=array(14)}
              {/if}
            {/foreach}
            
            {if $sttheme.product_tabs}<div class="right_more_info_block pro_more_info m-t-1 {if $sttheme.product_tabs_style==1 || $sttheme.product_tabs_style==4} accordion_more_info {/if}">{include file='catalog/_partials/product-tabs.tpl'}</div>{/if}
            
        </div>
      </div>

      {if $sttheme.pro_secondary_column_md}
      <div class="product_right_column col-lg-{if (12-$sttheme.pro_image_column_md-$sttheme.pro_primary_column_md) >= $sttheme.pro_secondary_column_md}{$sttheme.pro_secondary_column_md}{else}{12-$sttheme.pro_image_column_md-$sttheme.pro_primary_column_md}{/if}  mb-3">
        {if $sttheme.product_buy}{include file='catalog/_partials/product-buy.tpl'}{/if}

        {if $sttheme.show_brand_logo == 1 && isset($product_manufacturer->id)}
          {include file='catalog/_partials/miniatures/product-brand.tpl'}
        {/if}
        {hook h='displayProductRightColumn'}
        {foreach $product.extraContent as $extra}
          {if $extra.moduleName=='stvideo'}
              {include file="module:stvideo/views/templates/hook/stvideo_link.tpl" stvideos=$extra.content video_position=array(15)}
          {/if}
        {/foreach}
      </div>
      {/if}

    </div>