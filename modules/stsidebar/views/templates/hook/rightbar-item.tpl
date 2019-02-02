{*
* 2007-2017 PrestaShop
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}
{if $sidebar_item.native_modules==1}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_cart rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a href="javascript:;" data-name="side_products_cart" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" class="rightbar_tri icon_wrap with_text" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='View my shopping cart' d='Shop.Theme.Transformer'}{/if}">
	        <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-glyph{/if} icon_btn"></i>
	        <span class="icon_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Cart' d='Shop.Theme.Transformer'}{/if}</span>
	        <span class="ajax_cart_quantity amount_circle {if $cart.products_count == 0} simple_hidden {/if}{if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>
	    </a>
	</div>
{elseif $sidebar_item.native_modules==2}
	<section id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_compare rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a class="rightbar_tri icon_wrap with_text" data-name="side_products_compared" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" href="{$link->getPageLink('products-comparison')|escape:'html'}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Compare Products' d='Shop.Theme.Transformer'}{/if}">
	        <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-adjust{/if} icon_btn"></i>
	        <span class="icon_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Compare' d='Shop.Theme.Transformer'}{/if}</span>
	        <span class="compare_quantity amount_circle {if !count($compared_products)} simple_hidden {/if}{if count($compared_products) > 9} dozens {/if}">{count($compared_products)}</span>
	    </a>
	</section>
{elseif $sidebar_item.native_modules==3}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_viewed rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_viewed" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Recently Viewed' d='Shop.Theme.Transformer'}{/if}">
	        <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-history{/if}"></i>
	        <span class="icon_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Viewed' d='Shop.Theme.Transformer'}{/if}</span>
	        <span class="products_viewed_nbr amount_circle {if $products_viewed_nbr > 9} dozens {/if}">{$products_viewed_nbr}</span>
	    </a>
	</div>
{elseif $sidebar_item.native_modules==4}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_qrcode rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_qrcode" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='QR code' d='Shop.Theme.Transformer'}{/if}">
	        <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-qrcode{/if}"></i>
	        <span class="icon_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='QR code' d='Shop.Theme.Transformer'}{/if}</span>
	    </a>
	</div>
{elseif $sidebar_item.native_modules==5}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="to_top_wrap rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a href="#top_bar" class="to_top_btn icon_wrap with_text" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Back to top' d='Shop.Theme.Transformer'}{/if}"><i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-up-open-2{/if}"></i><span class="icon_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Top' d='Shop.Theme.Transformer'}{/if}</span></a>
	</div>
{elseif $sidebar_item.native_modules==6}
	<div  id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_menu rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
		<a class="rightbar_tri icon_wrap with_text" data-name="side_stmobilemenu" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" href="javascript:;" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}">
		    <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-menu{/if}"></i>
		    <span class="icon_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}</span>
		</a>
	</div>
{elseif $sidebar_item.native_modules==7}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_nav rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_mobile_nav" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Settings' d='Shop.Theme.Transformer'}{/if}">
	        <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-ellipsis{/if}"></i>
	        <span class="icon_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Settings' d='Shop.Theme.Transformer'}{/if}</span>
	    </a>
	</div>
{elseif $sidebar_item.native_modules==8}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_search rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_search" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Search' d='Shop.Theme.Transformer'}{/if}">
	        <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-search-1{/if} icon_btn"></i>
	        <span class="icon_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Search' d='Shop.Theme.Transformer'}{/if}</span>
	    </a>
	</div>
{elseif $sidebar_item.native_modules==9}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_share rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_share" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Share' d='Shop.Theme.Transformer'}{/if}">
	        <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-share-1{/if}"></i>
	        <span class="icon_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Share' d='Shop.Theme.Transformer'}{/if}</span>
	    </a>
	</div>
{elseif $sidebar_item.native_modules==10}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_viewed rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_loved" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Loved products' d='Shop.Theme.Transformer'}{/if}">
	        <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-heart-4{/if} icon_btn"></i>
	        <span class="icon_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Loved' d='Shop.Theme.Transformer'}{/if}</span>
	        {*<span class="products_loved_nbr amount_circle {if $products_viewed_nbr > 9} dozens {/if}">{$products_loved_nbr}</span>*}
	    </a>
	</div>
{elseif $sidebar_item.native_modules==11 || $sidebar_item.native_modules==12}
{else}
	<div id="rightbar_{$sidebar_item.id_st_sidebar}" class="rightbar_custom rightbar_wrap rightbar_visi_{$sidebar_item.hide_on_mobile}">
	    <a href="javascript:;" class="rightbar_tri icon_wrap with_text" data-name="side_custom_sidebar_{$sidebar_item.id_st_sidebar}" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" title="{$sidebar_item.title}">
	        <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-info-circled{/if}"></i>
	        <span class="icon_text">{$sidebar_item.title}</span>
	    </a>
	</div>
{/if}
