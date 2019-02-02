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
{assign var='pro_per_fw' value=((isset($sub_column.st_per_fw) && $sub_column.st_per_fw) ? $sub_column.st_per_fw : 4)}
{assign var='pro_per_xxl' value=((isset($sub_column.st_per_xxl) && $sub_column.st_per_xxl) ? $sub_column.st_per_xxl : 4)}
{assign var='pro_per_xl' value=((isset($sub_column.st_per_xl) && $sub_column.st_per_xl) ? $sub_column.st_per_xl : 3)}
{assign var='pro_per_lg' value=((isset($sub_column.st_per_lg) && $sub_column.st_per_lg) ? $sub_column.st_per_lg : 3)}
{assign var='pro_per_md' value=((isset($sub_column.st_per_md) && $sub_column.st_per_md) ? $sub_column.st_per_md : 2)}
{assign var='pro_per_sm' value=((isset($sub_column.st_per_sm) && $sub_column.st_per_sm) ? $sub_column.st_per_sm : 2)}
{assign var='pro_per_xs' value=((isset($sub_column.st_per_xs) && $sub_column.st_per_xs) ? $sub_column.st_per_xs : 1)}


{if !isset($sub_column.st_slider_s_speed) || !$sub_column.st_slider_s_speed}{$sub_column.st_slider_s_speed=7000}{/if}
{if !isset($sub_column.st_slider_a_speed) || !$sub_column.st_slider_a_speed}{$sub_column.st_slider_a_speed=400}{/if}
{if !isset($sub_column.st_slider_slideshow)}{$sub_column.st_slider_slideshow=0}{/if}
{if !isset($sub_column.st_pause)}{$sub_column.st_pause=0}{/if}
{if !isset($sub_column.st_rewind_nav)}{$sub_column.st_rewind_nav=0}{/if}
{if !isset($sub_column.st_direction_nav)}{$sub_column.st_direction_nav=0}{/if}
{if !isset($sub_column.st_control_nav)}{$sub_column.st_control_nav=0}{/if}
{if !isset($sub_column.st_move)}{$sub_column.st_move=0}{/if}
{if !isset($sub_column.st_spacing_between)}{$sub_column.st_spacing_between=0}{/if}
{if !isset($sub_column.st_auto_height)}{$sub_column.st_auto_height=false}{/if}

<section id="textboxes_{$sub_column.id_st_easy_content_column}" class="textboxes_container static_bullets" >
    {if isset($sub_column.st_grid) && $sub_column.st_grid}
        <div class="row textboxes_grid">
        {foreach $sub_column['elements'] as $element}
            <div id="steasy_element_{$element.id_st_easy_content_element}" class="col-fw-{(12/$pro_per_fw)|replace:'.':'-'} col-xxl-{(12/$pro_per_xxl)|replace:'.':'-'} col-xl-{(12/$pro_per_xl)|replace:'.':'-'} col-lg-{(12/$pro_per_lg)|replace:'.':'-'} col-md-{(12/$pro_per_md)|replace:'.':'-'} col-sm-{(12/$pro_per_sm)|replace:'.':'-'} col-{(12/$pro_per_xs)|replace:'.':'-'}  {if $element@iteration%$pro_per_xxl == 1} first-item-of-large-line{/if}{if $element@iteration%$pro_per_xl == 1} first-item-of-desktop-line{/if}{if $element@iteration%$pro_per_lg == 1} first-item-of-line{/if}{if $element@iteration%$pro_per_md == 1} first-item-of-tablet-line{/if}{if $element@iteration%$pro_per_sm == 1} first-item-of-mobile-line{/if}{if $element@iteration%$pro_per_xs == 1} first-item-of-portrait-line{/if}">
                <div class="steasy_element_item text-{$element.st_el_text_align} {if $element.st_el_content_width} width_{$element.st_el_content_width} {/if} textboxes_{$element.st_el_textboxes}">
                {assign var="pre_template" value="_"|explode:$element.st_el_textboxes}
                {include file="module:steasycontent/views/templates/hook/textboxes/{$pre_template[0]}.tpl"}
                </div>
            </div>
        {/foreach}  
        </div>
    {else}
        <div class="block_content">
            <div class="swiper-container products_sldier_swiper {if isset($sub_column.st_direction_nav)}{if $sub_column.st_direction_nav>1} swiper-button-lr {if $sub_column.st_direction_nav==6 || $sub_column.st_direction_nav==7} swiper-navigation-circle {elseif $sub_column.st_direction_nav==4 || $sub_column.st_direction_nav==5} swiper-navigation-rectangle  {elseif $sub_column.st_direction_nav==8 || $sub_column.st_direction_nav==9} swiper-navigation-arrow {elseif $sub_column.st_direction_nav==2 || $sub_column.st_direction_nav==3} swiper-navigation-full {/if} {if $sub_column.st_direction_nav==2 || $sub_column.st_direction_nav==4 || $sub_column.st_direction_nav==6|| $sub_column.st_direction_nav==8} swiper-navigation_visible {/if}{/if}{/if}" {if $sttheme.is_rtl} dir="rtl" {/if}>
                <div class="swiper-wrapper">
                    {foreach $sub_column['elements'] as $element}
                    <div id="steasy_element_{$element.id_st_easy_content_element}" class="swiper-slide">
                        <div class="steasy_element_item text-{$element.st_el_text_align} {if $element.st_el_content_width} width_{$element.st_el_content_width} {/if} textboxes_{$element.st_el_textboxes}">
                        {assign var="pre_template" value="_"|explode:$element.st_el_textboxes}
                        {include file="module:steasycontent/views/templates/hook/textboxes/{$pre_template[0]}.tpl"}
                        </div>
                    </div>
                    {/foreach}
                </div>
                {if isset($sub_column.st_direction_nav) && $sub_column.st_direction_nav>1}
                    <div class="swiper-button swiper-button-outer swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
                    <div class="swiper-button swiper-button-outer swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
                {/if}
                {if isset($sub_column.st_control_nav) && $sub_column.st_control_nav}
                <div class="swiper-pagination {if isset($sub_column.st_control_nav)}{if $sub_column.st_control_nav==2} swiper-pagination-st-custom {elseif $sub_column.st_control_nav==4} swiper-pagination-st-round {/if}{/if}"></div>
                {/if}
            </div>
        </div>
        {include file="catalog/slider/script.tpl" block_name="#textboxes_{$sub_column.id_st_easy_content_column}" 
        is_product_slider=0
        slider_s_speed=$sub_column.st_slider_s_speed
        slider_slideshow=$sub_column.st_slider_slideshow
        slider_a_speed=$sub_column.st_slider_a_speed
        slider_pause_on_hover=$sub_column.st_pause
        rewind_nav=$sub_column.st_rewind_nav
        lazy_load=false
        direction_nav=$sub_column.st_direction_nav
        control_nav=$sub_column.st_control_nav
        slider_move=$sub_column.st_move
        spacing_between=$sub_column.st_spacing_between
        autoHeight=$sub_column.st_auto_height
        pro_per_fw=$pro_per_fw
        pro_per_xxl=$pro_per_xxl
        pro_per_xl=$pro_per_xl
        pro_per_lg=$pro_per_lg
        pro_per_md=$pro_per_md
        pro_per_sm=$pro_per_sm
        pro_per_xs=$pro_per_xs
        }
    {/if} 
</section>