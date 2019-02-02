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
<div class="swiper-container products_sldier_swiper {if $direction_nav>1} swiper-button-lr {if $direction_nav==6 || $direction_nav==7} swiper-navigation-circle {elseif $direction_nav==4 || $direction_nav==5} swiper-navigation-rectangle {elseif $direction_nav==8 || $direction_nav==9} swiper-navigation-arrow {elseif $direction_nav==2 || $direction_nav==3} swiper-navigation-full {/if} {if $direction_nav==2 || $direction_nav==4 || $direction_nav==6|| $direction_nav==8} swiper-navigation_visible {/if}{/if} swiper_loading" {if $sttheme.is_rtl} dir="rtl" {/if}>
	<div class="swiper-wrapper">
	{block name='slider_content'}
	{if isset($column_slider) && $column_slider && !$display_pro_col}
		{foreach $products as $product}
			{if $product@first || $product@index is div by $slider_items}
		    <article class="swiper-slide base_list_line medium_list">
		    {/if}
			{include file="catalog/_partials/miniatures/product-slider-item-compact.tpl"}
    		{if $product@last || $product@iteration is div by $slider_items}
			</article>
			{/if}
		{/foreach}
	{else}
		{foreach $products as $product}
		{include file="catalog/_partials/miniatures/product.tpl"}
		{/foreach}
	{/if}
	{/block}
	</div>
	{if $direction_nav>1 && (!isset($column_slider) || !$column_slider)}
	    <div class="swiper-button swiper-button-outer swiper-button-next{if $hide_direction_nav_on_mob} hidden-md-down {/if}"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <div class="swiper-button swiper-button-outer swiper-button-prev{if $hide_direction_nav_on_mob} hidden-md-down {/if}" ><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
    {/if}
</div>
{if $control_nav}
<div class="swiper-pagination {if $control_nav==2} swiper-pagination-st-custom {elseif $control_nav==4} swiper-pagination-st-round {/if}{if $hide_control_nav_on_mob} hidden-md-down {/if}"></div>
{/if}