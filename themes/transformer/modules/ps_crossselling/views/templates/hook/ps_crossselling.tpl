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

{if isset($products) && $products}
<div id="crossselling_products_container" class="crossselling_products_container block products_container">
<section class="products_section" >
    <div class="title_block flex_container title_align_{(int)$sttheme.cs_title} title_style_{(int)$sttheme.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner">{l s='Customers who bought this product also bought:' d='Modules.Crossselling.Shop'}</div>
        <div class="flex_child title_flex_right"></div>
        {if $sttheme.cs_direction_nav==1 && isset($products) && $products}
            <div class="swiper-button-tr{if $sttheme.cs_hide_direction_nav_on_mob} hidden-md-down {/if}"><div class="swiper-button swiper-button-outer swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div><div class="swiper-button swiper-button-outer swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div></div>        
        {/if}
    </div>

    <div class="block_content">
        {include file="catalog/slider/product-slider.tpl" 
        lazy_load=$sttheme.cs_lazy
        direction_nav=$sttheme.cs_direction_nav
        control_nav=$sttheme.cs_control_nav
        from_product_page='isRelatedTo'
        hide_direction_nav_on_mob=$sttheme.cs_hide_direction_nav_on_mob
        hide_control_nav_on_mob=$sttheme.cs_hide_control_nav_on_mob
        image_type=$sttheme.cs_image_type
        }
    </div>
    {include file="catalog/slider/script.tpl" block_name="#crossselling_products_container" 
    slider_s_speed=$sttheme.cs_s_speed 
    slider_slideshow=$sttheme.cs_slideshow
    slider_a_speed=$sttheme.cs_a_speed
    slider_pause_on_hover=$sttheme.cs_pause_on_hover
    rewind_nav=$sttheme.cs_loop
    lazy_load=$sttheme.cs_lazy
    direction_nav=$sttheme.cs_direction_nav
    control_nav=$sttheme.cs_control_nav
    slider_move=$sttheme.cs_move
    spacing_between=$sttheme.cs_spacing_between
    pro_per_fw=$sttheme.cs_per_fw
    pro_per_xxl=$sttheme.cs_per_xxl
    pro_per_xl=$sttheme.cs_per_xl
    pro_per_lg=$sttheme.cs_per_lg
    pro_per_md=$sttheme.cs_per_md
    pro_per_sm=$sttheme.cs_per_sm
    pro_per_xs=$sttheme.cs_per_xs
    }
</section>
</div>
{/if}