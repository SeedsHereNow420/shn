{*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{*similar files homepage.tpl stblogfeaturedarticles/views/templates/hook/home.tpl stproductcategoriesslider.tpl stproductcategoriesslider_tab.tpl stfeaturedcategories.tpl ps_crossselling.tpl  ps_categroyproduct.tpl steasycontent-element-6.tpl pcomments_slider.tpl*}
{if isset($homeverybottom) && $homeverybottom && !$pro_per_fw}{assign var="bu_full_width" value=true}{else}{assign var="bu_full_width" value=false}{/if}
{if !isset($image_type) || !$image_type}{$image_type='home_default'}{/if}

{if $aw_display || (isset($featured_categories) && $featured_categories)}
<div id="featured_categories_container_{$hook_hash}" class="featured_categories_container {if $hide_mob == 1} hidden-md-down {elseif $hide_mob == 2} hidden-lg-up {/if} block {if $has_background_img && $speed} st_parallax_block {/if} products_container {if $video_mpfour} video_bg_block {/if}" 
{if $has_background_img && $speed} data-stellar-background-ratio="{$speed}" data-stellar-vertical-offset="{(int)$bg_img_v_offset}" {/if}
{if $video_mpfour} data-vide-bg="mp4: {$video_mpfour}{if $video_webm}, webm: {$video_webm}{/if}{if $video_ogg}, ogv: {$video_ogg}{/if}{if $video_poster}, poster: {$video_poster}{/if}" data-vide-options="loop: {if $video_loop}true{else}false{/if}, muted: {if $video_muted}true{else}false{/if}, position: 50% {(int)$video_v_offset}%" {/if}>
{if $bu_full_width}<div class="wide_container">{/if}
{if isset($homeverybottom) && $homeverybottom}<div class="{if $bu_full_width}container{else}container-fluid{/if}">{/if}
<section class="products_section">

    <div class="row flex_lg_container flex_stretch ">
        {if isset($custom_content) && $custom_content && $custom_content.10.width}
            {$custom_content.10.content nofilter}
        {/if}
        <div class="col-lg-{if isset($custom_content) && $custom_content}{12-$custom_content.10.width-$custom_content.30.width}{else}12{/if} products_slider {if $display_as_grid} display_as_grid {/if}"> <!-- to do what if the sum of left and right contents larger than 12 -->

    {if $title_position!=3}
    <div class="title_block flex_container title_align_{(int)$title_position} title_style_{(int)$sttheme.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner">{l s='Featured categories' d='Shop.Theme.Transformer'}</div>
        <div class="flex_child title_flex_right"></div>
        {if !$display_as_grid && $direction_nav==1 && isset($featured_categories) && $featured_categories}
            <div class="swiper-button-tr {if $hide_direction_nav_on_mob} hidden-md-down {/if}"><div class="swiper-button swiper-button-outer swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div><div class="swiper-button swiper-button-outer swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div></div>        
        {/if}
    </div>
    {elseif $direction_nav==1}
        {$direction_nav=5}
    {/if}

    {if isset($custom_content) && $custom_content}{$custom_content.1.content nofilter}{/if}

    {if isset($featured_categories) && is_array($featured_categories) && count($featured_categories)}
        {if !$display_as_grid}
        <div class="block_content">
            <div class="swiper-container products_sldier_swiper {if $direction_nav>1} swiper-button-lr {if $direction_nav==6 || $direction_nav==7} swiper-navigation-circle {elseif $direction_nav==4 || $direction_nav==5} swiper-navigation-rectangle  {elseif $direction_nav==8 || $direction_nav==9} swiper-navigation-arrow {elseif $direction_nav==2 || $direction_nav==3} swiper-navigation-full {/if} {if $direction_nav==2 || $direction_nav==4 || $direction_nav==6|| $direction_nav==8} swiper-navigation_visible {/if}{/if}" {if $sttheme.is_rtl} dir="rtl" {/if}>
                <div class="swiper-wrapper">
                {assign var='is_lazy' value=(isset($lazy_load) && $lazy_load)}
                {foreach $featured_categories as $category}                
                <div class="featured_categories_item swiper-slide">
                    <div class="pro_outer_box {$image_type}">
                    {if $is_lazy}<i class="swiper-lazy-preloader fto-spin5 animate-spin"></i>{/if}
                    <a href="{$category.url}" title="{$category.name}" class="fc_cat_image product_img_link {if $is_lazy} is_lazy {/if}">
                        <img 
                        {if $is_lazy}data-src{else}src{/if}="{$category.image.bySize.{$image_type}.url}"
                        {if $sttheme.retina && isset($category.image.bySize.{$image_type|cat:'_2x'}.url)}
                          {if $is_lazy}data-srcset{else}srcset{/if}="{$category.image.bySize.{$image_type|cat:'_2x'}.url} 2x"
                        {/if}
                         alt="{$category.name}" width="{$category.image.bySize.{$image_type}.width}" height="{$category.image.bySize.{$image_type}.height}" class="{if $is_lazy} swiper-lazy {/if} front-image" />
                        {if $is_lazy}<img src="{$urls.img_cat_url}{$language.iso_code}-default-{$image_type}.jpg" class="holder" width="{$category.image.bySize.{$image_type}.width}" height="{$category.image.bySize.{$image_type}.height}" alt="{$category.name}" />{/if}
                    </a>
                    <div class="pro_second_box"><h3 class="s_title_block"><a href="{$category.url}" title="{$category.name}">{$category.name|truncate:35:'...'}</a></h3></div>
                    </div>
                </div>
                {/foreach}
                </div>
                {if $direction_nav>1}
                    <div class="swiper-button swiper-button-outer swiper-button-next{if $hide_direction_nav_on_mob} hidden-md-down {/if}"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
                    <div class="swiper-button swiper-button-outer swiper-button-prev{if $hide_direction_nav_on_mob} hidden-md-down {/if}"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
                {/if}
                {if $control_nav}
                <div class="swiper-pagination {if $control_nav==2} swiper-pagination-st-custom {elseif $control_nav==4} swiper-pagination-st-round {/if}{if $hide_control_nav_on_mob} hidden-md-down {/if}"></div>
                {/if}
            </div>
        </div>
        {include file="catalog/slider/script.tpl" block_name="#featured_categories_container_{$hook_hash}" is_product_slider=0}
        {else}
            <ul class="featured_categories_list row">
            {foreach $featured_categories as $index => $category}
                {assign var="curr_index" value=$index}
                {assign var="curr_iteration" value=$index+1}
                <li class="{if $pro_per_fw}col-fw-{(12/$pro_per_fw)|replace:'.':'-'}{/if}  {if $pro_per_xxl}col-xxl-{(12/$pro_per_xxl)|replace:'.':'-'}{/if}  {if $pro_per_xl}col-xl-{(12/$pro_per_xl)|replace:'.':'-'}{/if} col-lg-{(12/$pro_per_lg)|replace:'.':'-'} col-md-{(12/$pro_per_md)|replace:'.':'-'} col-sm-{(12/$pro_per_sm)|replace:'.':'-'} col-{(12/$pro_per_xs)|replace:'.':'-'}  {if $pro_per_fw && $category@iteration%$pro_per_fw == 1} first-item-of-screen-line{/if} {if $pro_per_xxl && $category@iteration%$pro_per_xxl == 1} first-item-of-large-line{/if} {if $pro_per_xl && $category@iteration%$pro_per_xl == 1} first-item-of-desktop-line{/if}{if $category@iteration%$pro_per_lg == 1} first-item-of-line{/if}{if $category@iteration%$pro_per_md == 1} first-item-of-tablet-line{/if}{if $category@iteration%$pro_per_sm == 1} first-item-of-mobile-line{/if}{if $category@iteration%$pro_per_xs == 1} first-item-of-portrait-line{/if}">
                    <div class="pro_outer_box">
                    <a href="{$category.url}" title="{$category.name}" class="fc_cat_image">
                        <img src="{$category.image.bySize.{$image_type}.url}" 
                        {if $sttheme.retina && isset($category.image.bySize.{$image_type|cat:'_2x'}.url)}
                          srcset="{$category.image.bySize.{$image_type|cat:'_2x'}.url} 2x"
                        {/if}
                        alt="{$category.name}" width="{$category.image.bySize.{$image_type}.width}" height="{$category.image.bySize.{$image_type}.height}" />
                    </a>
                    <div class="pro_second_box"><h3 class="s_title_block"><a href="{$category.url}" title="{$category.name}">{$category.name|truncate:35:'...'}</a></h3></div>
                    </div>
                </li>
            {/foreach}
            </ul>
        {/if}
    {else}
        <p class="warning">{l s='No featured categories' d='Shop.Theme.Transformer'}</p>
    {/if}

            {if isset($custom_content) && $custom_content}{$custom_content.2.content nofilter}{/if}
        </div>
        {if isset($custom_content) && $custom_content && $custom_content.30.width}
            {$custom_content.30.content nofilter}
        {/if}
    </div>
</section>
{if isset($homeverybottom) && $homeverybottom}</div>{/if}
{if $bu_full_width}</div>{/if}
</div>
{/if}