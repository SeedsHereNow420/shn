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

{foreach $sub_column['elements'] as $element}

{assign var='pro_per_fw' value=((isset($element.st_per_fw) && $element.st_per_fw) ? $element.st_per_fw : 4)}
{assign var='pro_per_xxl' value=((isset($element.st_per_xxl) && $element.st_per_xxl) ? $element.st_per_xxl : 4)}
{assign var='pro_per_xl' value=((isset($element.st_per_xl) && $element.st_per_xl) ? $element.st_per_xl : 3)}
{assign var='pro_per_lg' value=((isset($element.st_per_lg) && $element.st_per_lg) ? $element.st_per_lg : 3)}
{assign var='pro_per_md' value=((isset($element.st_per_md) && $element.st_per_md) ? $element.st_per_md : 2)}
{assign var='pro_per_sm' value=((isset($element.st_per_sm) && $element.st_per_sm) ? $element.st_per_sm : 2)}
{assign var='pro_per_xs' value=((isset($element.st_per_xs) && $element.st_per_xs) ? $element.st_per_xs : 1)}

{if !isset($element.st_s_speed) || !$element.st_s_speed}{$element.st_s_speed=7000}{/if}
{if !isset($element.st_a_speed) || !$element.st_a_speed}{$element.st_a_speed=400}{/if}
{if !isset($element.st_grid)}{$element.st_grid=0}{/if}
{if !isset($element.st_slideshow)}{$element.st_slideshow=0}{/if}
{if !isset($element.st_pause)}{$element.st_pause=0}{/if}
{if !isset($element.st_rewind_nav)}{$element.st_rewind_nav=0}{/if}
{if !isset($element.st_direction_nav)}{$element.st_direction_nav=0}{/if}
{if !isset($element.st_control_nav)}{$element.st_control_nav=0}{/if}
{if !isset($element.st_move)}{$element.st_move=0}{/if}
{if !isset($element.st_spacing_between)}{$element.st_spacing_between=0}{/if}
{if !isset($element.st_lazy)}{$element.st_lazy=1}{/if}
{if !isset($element.st_hide_direction_nav_on_mob)}{$element.st_hide_direction_nav_on_mob=1}{/if}
{if !isset($element.st_hide_control_nav_on_mob)}{$element.st_hide_control_nav_on_mob=0}{/if}
{if !isset($element.st_display_sd)}{$element.st_display_sd=0}{/if}
{if !isset($element.st_image_type) || !$element.st_image_type}{$element.st_image_type='home_default'}{/if}

<div id="easy_products_container_{$element.id_st_easy_content_element}" class="easy_products_container block products_container" >
{if isset($is_full_width) && $is_full_width && !$pro_per_fw}{assign var="bu_full_width" value=true}{else}{assign var="bu_full_width" value=false}{/if}
{if $bu_full_width}<div class="wide_container">{/if}
{if isset($is_full_width) && $is_full_width}<div class="container{if !$bu_full_width}-fluid{/if}">{/if}
<section class="products_section">
    {if isset($element.products) && $element.products && count($element.products)}
        <div class="products_slider {if $element.st_grid==1} display_as_grid {elseif $element.st_grid==2} display_as_simple {/if}">
        {if isset($element.st_title) && $element.st_title}
        <div class="title_block flex_container title_align_{(int)$element.st_title_align} title_style_{(int)$sttheme.heading_style}">
            <div class="flex_child title_flex_left"></div>
            <div class="title_block_inner">{$element.st_title}</div>
            <div class="flex_child title_flex_right"></div>
            {if $element.st_direction_nav && (!$element.st_grid && $element.st_direction_nav==1) && (isset($element.products) && $element.products)}
                <div class="swiper-button-tr {if $element.st_hide_direction_nav_on_mob} hidden-md-down {/if}"><div class="swiper-button swiper-button-outer swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div><div class="swiper-button swiper-button-outer swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div></div>        
            {/if}
        </div>
        {elseif $element.st_direction_nav==1}
            {$element.st_direction_nav=5}
        {/if}
        {if !$element.st_grid}
            <div class="block_content">
                {include file="catalog/slider/product-slider.tpl" products=$element.products
                lazy_load=$element.st_lazy
                direction_nav=$element.st_direction_nav
                control_nav=$element.st_control_nav
                image_type=$element.st_image_type
                hide_direction_nav_on_mob=$element.st_hide_direction_nav_on_mob
                hide_control_nav_on_mob=$element.st_hide_control_nav_on_mob
                display_sd=$element.st_display_sd
                }
            </div>
            {include file="catalog/slider/script.tpl" block_name="#easy_products_container_{$element.id_st_easy_content_element}"
            slider_s_speed=$element.st_s_speed
            slider_slideshow=$element.st_slideshow
            slider_a_speed=$element.st_a_speed
            slider_pause_on_hover=$element.st_pause
            rewind_nav=$element.st_rewind_nav
            lazy_load=$element.st_lazy
            direction_nav=$element.st_direction_nav
            control_nav=$element.st_control_nav
            slider_move=$element.st_move
            spacing_between=$element.st_spacing_between
            pro_per_fw=$pro_per_fw
            pro_per_xxl=$pro_per_xxl
            pro_per_xl=$pro_per_xl
            pro_per_lg=$pro_per_lg
            pro_per_md=$pro_per_md
            pro_per_sm=$pro_per_sm
            pro_per_xs=$pro_per_xs
            }
        {elseif $element.st_grid==2}
            {include file="catalog/listing/product-list-simple.tpl" products=$element.products for_f='pro_easy' id='steasycontent_pro_grid'
            pro_per_fw=$pro_per_fw 
            pro_per_xxl=$pro_per_xxl 
            pro_per_xl=$pro_per_xl 
            pro_per_lg=$pro_per_lg 
            pro_per_md=$pro_per_md 
            pro_per_sm=$pro_per_sm
            pro_per_xs=$pro_per_xs
            }
        {else}
            {include file="catalog/_partials/miniatures/list-item.tpl" products=$element.products class='steasycontent_pro_grid' for_f='pro_easy' id='steasycontent_pro_grid' 
            pro_per_fw=$pro_per_fw 
            pro_per_xxl=$pro_per_xxl 
            pro_per_xl=$pro_per_xl 
            pro_per_lg=$pro_per_lg 
            pro_per_md=$pro_per_md 
            pro_per_sm=$pro_per_sm
            pro_per_xs=$pro_per_xs
            image_type=$element.st_image_type
            display_sd=$element.st_display_sd
            }
        {/if}
    {else}
        <p class="warning">{l s='No products' d='Shop.Theme.Transformer'}</p>
    {/if}
</section>
{if isset($is_full_width) && $is_full_width}</div>{/if}
{if $bu_full_width}</div>{/if}
</div>
{/foreach}