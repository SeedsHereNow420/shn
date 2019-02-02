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
{block name='product_miniature_item'}
{*shouldEnableAddToCartButton Also in catalog\_partials\miniatures\product-simple.tpl*}
{assign var="has_add_to_cart" value=0}
{if $sttheme.display_add_to_cart!=3 && !$sttheme.is_catalog && $product.add_to_cart_url && ($product.quantity>0 || $product.allow_oosp)}{$has_add_to_cart=1}{/if}{*hao xiang quantity_wanted is not set in homepage and category page, so using add_to_cart_url only is not correct, have to use quantity and allow_oosp*}

{assign var='list_display_sd' value=0}
{if isset($display_sd) && $display_sd}{$list_display_sd=$display_sd}{elseif !isset($display_sd) && $sttheme.show_short_desc_on_grid}{$list_display_sd=$sttheme.show_short_desc_on_grid}{/if}

{if isset($for_w) && $for_w == 'category'}
  {if $sttheme.cate_pro_image_type_name}
    {assign var="pro_image_type" value=$sttheme.cate_pro_image_type_name}
  {/if}
{elseif isset($image_type) && $image_type}
  {assign var="pro_image_type" value=$image_type}
{/if}
{if !isset($pro_image_type) || !$pro_image_type}
  {assign var="pro_image_type" value='home_default'}
{/if}
{if $sttheme.retina}{$pro_image_type_retina=$pro_image_type|cat:"_2x"}{/if}

{*use for_w to check if this file is loaded by product sliders, only products in sliders do not have for_w.*}
<article class="{if !isset($for_w)} swiper-slide {/if} ajax_block_product js-product-miniature" data-id-product="{$product.id_product}" data-id-product-attribute="{$product.id_product_attribute}" data-minimal-quantity="{$product.minimal_quantity}" {if $sttheme.google_rich_snippets} {if isset($from_product_page) && $from_product_page} itemprop="{$from_product_page}" {/if} itemscope itemtype="http://schema.org/Product" {/if}>
  <div class="pro_outer_box clearfix {$pro_image_type}">
    <div class="pro_first_box {if $sttheme.flyout_buttons==1}hover_fly_static{/if}{if $sttheme.flyout_buttons_on_mobile==1} moblie_flyout_buttons_show{/if}">
      {block name='product_thumbnail'}
        {if !isset($for_w) && !$sttheme.pro_tm_slider && isset($lazy_load) && $lazy_load}<i class="swiper-lazy-preloader fto-spin5 animate-spin"></i>{/if}
        {if (((!isset($for_w) || (isset($for_w) && $for_w != 'category')) && $sttheme.pro_tm_slider) || (isset($for_w) && $for_w == 'category' && $sttheme.pro_tm_slider_cate)) && isset($product.stthemeeditor.images)}
            {include file='catalog/_partials/miniatures/tm-slider.tpl' tm_thumbs=0}
        {else}
          {assign var='is_lazy' value=(!isset($for_w) && isset($lazy_load) && $lazy_load) || (isset($for_w) && $for_w == 'category' && $sttheme.cate_pro_lazy)}
          
          <a href="{$product.url}" title="{$product.name}" class="product_img_link {if $is_lazy} is_lazy {/if} {if $sttheme.pro_img_hover_scale} pro_img_hover_scale {/if}">
            <img 
            {if $is_lazy}data-src{else}src{/if}="{$product.cover.bySize.{$pro_image_type}.url}"
            {if $sttheme.retina && isset($product.cover.bySize.{$pro_image_type_retina}.url)}
              {if $is_lazy}data-srcset{else}srcset{/if}="{$product.cover.bySize.{$pro_image_type_retina}.url} 2x"
            {/if}
            width="{$product.cover.bySize.{$pro_image_type}.width}" height="{$product.cover.bySize.{$pro_image_type}.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" class="front-image {if !isset($for_w) && isset($lazy_load) && $lazy_load} swiper-lazy {/if} {if isset($for_w) && $for_w == 'category' && $sttheme.cate_pro_lazy} cate_pro_lazy {/if}" {if $sttheme.google_rich_snippets} itemprop="image" {/if} />
            {if isset($product.sthoverimage.hover)}
              {*to do lazy load this*}
              <img 
                {if $is_lazy}data-src{else}src{/if}="{$product.sthoverimage.bySize.{$pro_image_type}.url}"
                {if $sttheme.retina && isset($product.sthoverimage.bySize.{$pro_image_type_retina}.url)}
                  {if $is_lazy}data-srcset{else}srcset{/if}="{$product.sthoverimage.bySize.{$pro_image_type_retina}.url} 2x"
                {/if}
                
               alt="{if !empty($product.sthoverimage.legend)}{$product.sthoverimage.legend}{else}{$product.name}{/if}" width="{$product.sthoverimage.bySize.{$pro_image_type}.width}" height="{$product.sthoverimage.bySize.{$pro_image_type}.height}"  class="back-image {if !isset($for_w) && isset($lazy_load) && $lazy_load} swiper-lazy {/if} {if isset($for_w) && $for_w == 'category' && $sttheme.cate_pro_lazy} cate_pro_lazy {/if}" />
            {/if}
            {if $is_lazy}<img src="{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-{$pro_image_type}.jpg" class="holder" width="{$product.cover.bySize.{$pro_image_type}.width}" height="{$product.cover.bySize.{$pro_image_type}.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" />{/if}
          </a>
        {/if}
        {block name='product_flags'}
            {if !isset($product.ststickers)}{$product.ststickers=false}{/if}
            {include file='catalog/_partials/miniatures/sticker.tpl' stickers=$product.ststickers sticker_position=array(0,1,2,3,4,5,6,7,8,9,12) sticker_sold_out=($product.quantity<=0 && !$product.allow_oosp)}
        {/block}
        {if isset($wishlist_position) && $wishlist_position && $wishlist_position!=10}
            {include file='module:stwishlist/views/templates/hook/icon.tpl'}
        {/if}
        {if isset($loved_position) && $loved_position && $loved_position!=10}
            {include file='module:stlovedproduct/views/templates/hook/icon.tpl' id_source=$product.id_product}
        {/if}
      {/block}
      {if $sttheme.flyout_buttons==0 || $sttheme.flyout_buttons==1}
        {include file='catalog/_partials/miniatures/hover_fly.tpl'}
      {/if}
      {if isset($countdown_v_alignment) && $countdown_v_alignment!=2}{include file='catalog/_partials/miniatures/countdown.tpl'}{/if}
    </div>
    <div class="pro_second_box pro_block_align_{$sttheme.pro_block_align}">
        {if (((!isset($for_w) || (isset($for_w) && $for_w != 'category')) && $sttheme.pro_tm_slider==2) || (isset($for_w) && $for_w == 'category' && $sttheme.pro_tm_slider_cate==2)) && isset($product.stthemeeditor.images)}
            {include file='catalog/_partials/miniatures/tm-slider.tpl' tm_thumbs=1}
        {/if}
      {block name='product_flags_under'}
        {if !isset($product.ststickers)}{$product.ststickers=false}{/if}
        {include file='catalog/_partials/miniatures/sticker.tpl' stickers=$product.ststickers sticker_position=array(10) sticker_sold_out=($product.quantity<=0 && !$product.allow_oosp)}
      {/block}

      {if $sttheme.pro_display_category_name}<a href="{url entity='category' id=$product.id_category_default params=['alias' => $product.category]}" title="{$product.category_name}" class="mar_b6">{$product.category_name}</a>{/if}
      {if isset($product.stproductcomments) && $product.stproductcomments && $product.stproductcomments.pro_posi}
        {include file='catalog/_partials/miniatures/rating-box.tpl'}
      {/if}
      {block name='product_name'}
      {if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name==1}
          {assign var="length_of_product_name" value=70}
      {/if}
      <h1 {if $sttheme.google_rich_snippets} itemprop="name" {/if} class="s_title_block {if isset($sttheme.length_of_product_name)}{if $sttheme.length_of_product_name==3} two_rows {elseif $sttheme.length_of_product_name==1 || $sttheme.length_of_product_name==2} nohidden {/if}{/if}"><a href="{$product.url}" title="{$product.name}" {if $sttheme.google_rich_snippets} itemprop="url" {/if}>{if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name==1}{$product.name|truncate:$length_of_product_name:'...'}{else}{$product.name}{/if}</a></h1>
      {/block}

      {if $sttheme.pro_list_display_brand_name && $product.id_manufacturer && isset($product.manufacturer_name)}
        <div class="pro_list_manufacturer pad_b6">{$product.manufacturer_name|truncate:60:'...'}</div>
      {/if}

      <div class="{if $sttheme.pro_block_align} flex_box flex_space_between {/if}">
      {block name='product_price_and_shipping'}
        {if (!isset($st_display_price) || $st_display_price) && $product.show_price}
          <div class="product-price-and-shipping pad_b6" {if $sttheme.google_rich_snippets} itemprop="offers" itemscope itemtype="https://schema.org/Offer" {/if}>
            {if $sttheme.google_rich_snippets}<meta itemprop="priceCurrency" content="{$sttheme.currency_iso_code}">{/if}

            {hook h='displayProductPriceBlock' product=$product type="before_price"}

            <span {if $sttheme.google_rich_snippets} itemprop="price" content="{$product.price_amount}" {/if} class="price">{$product.price}</span>

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
      {block name='product_variants'}
        {if $sttheme.display_color_list && $product.main_variants}
          {include file='catalog/_partials/variant-links.tpl' variants=$product.main_variants}
        {/if}
      {/block}
      </div>
      {if isset($product.stproductcomments) && $product.stproductcomments && !$product.stproductcomments.pro_posi}
        {include file='catalog/_partials/miniatures/rating-box.tpl'}
      {/if}
      {if isset($countdown_v_alignment) && $countdown_v_alignment==2}{include file='catalog/_partials/miniatures/countdown.tpl'}{/if}
      {block name='product_reviews'}
        {hook h='displayProductListReviews' product=$product}
      {/block}
      <div class="product-desc pad_b6 {if $list_display_sd} display_sd {/if} " {if $sttheme.google_rich_snippets} itemprop="description" {/if}>{if $list_display_sd==2}{$product.description_short nofilter}{else}{$product.description_short|strip_tags:false|truncate:220:'...'}{/if}</div>
      
      {if $sttheme.display_add_to_cart!=3 }
      <div class="act_box_cart {if $sttheme.display_add_to_cart==2 || $sttheme.display_add_to_cart==5} display_normal {elseif $sttheme.display_add_to_cart==1 || $sttheme.display_add_to_cart==4 || (!$sttheme.display_add_to_cart && ($sttheme.pro_quantity_input==1 || $sttheme.pro_quantity_input==3))} display_when_hover {/if}{if $sttheme.mobile_add_to_cart} add_show_on_mobile {else} add_hide_on_mobile {/if} pad_b6">
        {if $has_add_to_cart && ($sttheme.pro_quantity_input==1 || $sttheme.pro_quantity_input==3)}
        <div class="s_quantity_wanted qty_wrap">
            <input
                class="pro_quantity"
                type="text"
                value="{if $product.minimal_quantity}{$product.minimal_quantity}{else}1{/if}"
                name="pro_quantity"
                data-minimal-quantity="{$product.minimal_quantity}"
              />
        </div>
        {/if}
        {assign var="add_to_cart_class" value="btn btn-default"}
        {if $sttheme.display_add_to_cart==4 || $sttheme.display_add_to_cart==5}{assign var="add_to_cart_class" value="btn btn-link"}{/if}
        {if $has_add_to_cart}
          {include file='catalog/_partials/miniatures/btn-add-to-cart.tpl' classname=$add_to_cart_class}
        {else}
          {include file='catalog/_partials/miniatures/btn-view-more.tpl' classname=$add_to_cart_class}
        {/if}
      </div>
      {/if}

      <div class="act_box_inner pad_b6 mar_t4 flex_box">
        {if $sttheme.flyout_quickview}{include file='catalog/_partials/miniatures/btn-quick-view.tpl' classname="btn_inline"}{/if}
        {if !$sttheme.use_view_more_instead && !$sttheme.display_add_to_cart && $has_add_to_cart}{include file='catalog/_partials/miniatures/btn-view-more.tpl' classname="btn_inline"}{/if}
        {if isset($wishlist_position) && !$wishlist_position}
          {include file='module:stwishlist/views/templates/hook/fly.tpl' classname="btn_inline"}
        {/if}
        {if isset($loved_position) && !$loved_position}
          {include file='module:stlovedproduct/views/templates/hook/fly.tpl' id_source=$product.id_product classname="btn_inline"}
        {/if}
        {if $sttheme.flyout_share}{include file='module:stsocial/views/templates/hook/stsocial-drop.tpl' pro_share_drop=true social_label=0 classname="btn_inline link_color"}{/if}
      </div>

      {block name='product_flags_bottom'}
        {if !isset($product.ststickers)}{$product.ststickers=false}{/if}
        {include file='catalog/_partials/miniatures/sticker.tpl' stickers=$product.ststickers sticker_position=array(11) sticker_sold_out=($product.quantity<=0 && !$product.allow_oosp)}
      {/block}
    </div>
    {if $sttheme.flyout_buttons==2}
      <div class="bottom_hover_fly">
      {include file='catalog/_partials/miniatures/hover_fly.tpl'}
      </div>
    {/if}
  </div>
</article>
{/block}