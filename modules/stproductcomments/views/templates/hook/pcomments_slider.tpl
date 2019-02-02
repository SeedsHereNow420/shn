{*
* 2007-2016 PrestaShop
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
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{*similar files homepage.tpl stblogfeaturedarticles/views/templates/hook/home.tpl stproductcategoriesslider.tpl stproductcategoriesslider_tab.tpl stfeaturedcategories.tpl ps_crossselling.tpl  ps_categroyproduct.tpl steasycontent-element-6.tpl pcomments_slider.tpl*}
{if isset($homeverybottom) && $homeverybottom && !$pro_per_fw}{assign var="bu_full_width" value=true}{else}{assign var="bu_full_width" value=false}{/if}
{assign var="column_fix" value=""}
{if isset($column_slider) && $column_slider}{$column_fix="_column"}{/if}

{if $aw_display || (isset($pcomments) && $pcomments)}
<div id="stproductcomments_container_{$hook_hash}" class="stproductcomments_container {if $hide_mob} hidden-xs {/if} block {if !$column_fix && $has_background_img && $speed} st_parallax_block {/if} products_container{$column_fix} {if $column_slider && !isset($is_quarter)} column_block {/if} {if !$column_fix && $video_mpfour} video_bg_block {/if}" 
{if !$column_fix && $has_background_img && $speed} data-stellar-background-ratio="{$speed}" {if $bg_img_v_offset} data-stellar-vertical-offset="{(int)$bg_img_v_offset}"{/if} {/if}
{if !$column_fix && $video_mpfour} data-vide-bg="mp4: {$video_mpfour}{if $video_webm}, webm: {$video_webm}{/if}{if $video_ogg}, ogv: {$video_ogg}{/if}{if $video_poster}, poster: {$video_poster}{/if}" data-vide-options="loop: {if $video_loop}true{else}false{/if}, muted: {if $video_muted}true{else}false{/if}, position: 50% {(int)$video_v_offset}%" {/if}>

{if $bu_full_width}<div class="wide_container">{/if}
{if isset($homeverybottom) && $homeverybottom}<div class="{if $bu_full_width}container{else}container-fluid{/if}">{/if}
<section class="products_section">
    {if $title_position!=3 || $column_slider}
    <div class="title_block flex_container title_align_{(int)$title_position} title_style_{(int)$sttheme.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <a href="{url entity='module' name='stproductcomments' controller='list'}" title="{l s='Testimonial' d='Shop.Theme.Transformer'}" class="title_block_inner">{l s='Testimonial' d='Shop.Theme.Transformer'}</a>
        <div class="flex_child title_flex_right"></div>
        {if $direction_nav==1 && isset($pcomments) && $pcomments}
            <div class="swiper-button-tr {if $hide_direction_nav_on_mob} hidden-md-down {/if}"><div class="swiper-button swiper-button-outer swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div><div class="swiper-button swiper-button-outer swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div></div>        
        {/if}
    </div>
    {elseif $direction_nav==1}
        {$direction_nav=5}
    {/if}

    {if isset($pcomments) && is_array($pcomments) && count($pcomments)}
        <div class="block_content {if !$column_slider && $content_width} width_{$content_width} {/if} static_bullets">
            {if ($column_fix && $display_pro_col) || (!$column_fix && !$display_as_grid)}
            <div class="swiper-container products_sldier_swiper {if $direction_nav>1} swiper-button-lr {if $direction_nav==6 || $direction_nav==7} swiper-navigation-circle {elseif $direction_nav==4 || $direction_nav==5} swiper-navigation-rectangle  {elseif $direction_nav==8 || $direction_nav==9} swiper-navigation-arrow {elseif $direction_nav==2 || $direction_nav==3} swiper-navigation-full {/if} {if $direction_nav==2 || $direction_nav==4 || $direction_nav==6|| $direction_nav==8} swiper-navigation_visible {/if}{/if}" {if $sttheme.is_rtl} dir="rtl" {/if}>
                <div class="swiper-wrapper">
                    {foreach $pcomments as $node}
                    <div class="swiper-slide text-2">
                        {include file='module:stproductcomments/views/templates/hook/pcomments_item.tpl'}
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
            {include file="catalog/slider/script.tpl" block_name="#stproductcomments_container_{$hook_hash}" is_product_slider=0}
            {else}
                <div class="base_list_line large_list {if !$column_fix} text-2 {/if}">
                {foreach $pcomments as $node}
                    {include file='module:stproductcomments/views/templates/hook/pcomments_item.tpl' list_item=1}
                {/foreach}  
                </div> 
            {/if}
        </div>
    {else}
        <p class="warning">{l s='No comments' d='Shop.Theme.Transformer'}</p>
    {/if}
</section>
{if isset($homeverybottom) && $homeverybottom}</div>{/if}
{if $bu_full_width}</div>{/if}
</div>
{/if}