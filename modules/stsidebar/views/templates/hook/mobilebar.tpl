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
{if count($mobilebar)}
{foreach $mobilebar as $sidebar_item}
{if $sidebar_item.native_modules==1}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" href="javascript:;" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='View my shopping cart' d='Shop.Theme.Transformer'}{/if}" class="cart_mobile_bar_tri mobile_bar_tri mobile_bar_item shopping_cart_style_2" data-name="side_products_cart" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}">
		<div class="ajax_cart_bag">
			<span class="ajax_cart_quantity amount_circle {if $cart.products_count > 9} dozens {/if}">{$cart.products_count}</span>
			<span class="ajax_cart_bg_handle"></span>
			<i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-glyph{/if} icon_btn fs_xl"></i>
		</div>
		<span class="mobile_bar_tri_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Cart' d='Shop.Theme.Transformer'}{/if}</span>
	</a>
{elseif $sidebar_item.native_modules==2}
	
{elseif $sidebar_item.native_modules==3}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" class="viewed_mobile_bar_tri mobile_bar_item mobile_bar_tri" data-name="side_viewed" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" href="javascript:;" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Recently Viewed' d='Shop.Theme.Transformer'}{/if}">
	    <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-history{/if} fs_xl"></i>
	    <span class="mobile_bar_tri_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Viewed' d='Shop.Theme.Transformer'}{/if}({$products_viewed_nbr})</span>
	</a>
{elseif $sidebar_item.native_modules==4}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" class="qrcode_mobile_bar_tri mobile_bar_item mobile_bar_tri" data-name="side_qrcode" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" href="javascript:;" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='QR code' d='Shop.Theme.Transformer'}{/if}">
	    <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-qrcode{/if} fs_xl"></i>
	    <span class="mobile_bar_tri_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='QR code' d='Shop.Theme.Transformer'}{/if}</span>
	</a>
{elseif $sidebar_item.native_modules==5}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" class="to_top_mobile_bar_tri mobile_bar_item"  href="#top_bar" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Top' d='Shop.Theme.Transformer'}{/if}">
	    <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-up-open-2{/if} fs_xl"></i>
	    <span class="mobile_bar_tri_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Top' d='Shop.Theme.Transformer'}{/if}</span>
	</a>
{elseif $sidebar_item.native_modules==6}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" class="menu_mobile_bar_tri mobile_bar_item mobile_bar_tri {if $sttheme.menu_icon_with_text==1} with_text{/if}" data-name="side_stmobilemenu" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" href="javascript:;" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}">
	    <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-menu{/if} fs_xl"></i>
	    <span class="mobile_bar_tri_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Menu' d='Shop.Theme.Transformer'}{/if}</span>
	</a>
{elseif $sidebar_item.native_modules==7}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" class="customer_mobile_bar_tri mobile_bar_item mobile_bar_tri" data-name="side_mobile_nav" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" href="javascript:;" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Settings' d='Shop.Theme.Transformer'}{/if}">
	    <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-ellipsis{/if} fs_xl"></i>
	    <span class="mobile_bar_tri_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Settings' d='Shop.Theme.Transformer'}{/if}</span>
	</a>
{elseif $sidebar_item.native_modules==8}
	{if !isset($quick_search_mobile) || !$quick_search_mobile}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" href="javascript:;" data-name="side_search" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" class="search_mobile_bar_tri mobile_bar_tri mobile_bar_item" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Search' d='Shop.Theme.Transformer'}{/if}">
	    <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-search-1{/if} fs_xl"></i>
	    <span class="mobile_bar_tri_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Search' d='Shop.Theme.Transformer'}{/if}</span>
	</a>
	{else}
		{include 'module:stsearchbar/views/templates/hook/stsearchbar-block.tpl'}
	{/if}
{elseif $sidebar_item.native_modules==9}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" href="javascript:;" data-name="side_share" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" class="share_mobile_bar_tri mobile_bar_tri mobile_bar_item" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Share' d='Shop.Theme.Transformer'}{/if}">
	    <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-share-1{/if} fs_xl"></i>
	    <span class="mobile_bar_tri_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Share' d='Shop.Theme.Transformer'}{/if}</span>
	</a>
{elseif $sidebar_item.native_modules==10}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" href="javascript:;" data-name="side_loved" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" class="loved_mobile_bar_tri mobile_bar_tri mobile_bar_item" rel="nofollow" title="{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Loved' d='Shop.Theme.Transformer'}{/if}">
	    <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-heart-4{/if} fs_xl"></i>
	    <span class="mobile_bar_tri_text">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Loved' d='Shop.Theme.Transformer'}{/if}</span>
	</a>
{elseif $sidebar_item.native_modules==11 || $sidebar_item.native_modules==12}
{else}
	<a id="rightbar_{$sidebar_item.id_st_sidebar}" href="javascript:;" data-name="side_custom_sidebar_{$sidebar_item.id_st_sidebar}" data-direction="open_bar_{if $sidebar_item.direction==2}left{else}right{/if}" class="custom_mobile_bar_tri mobile_bar_tri mobile_bar_item" rel="nofollow" title="{$sidebar_item.title}">
	    <i class="{if $sidebar_item.icon_class}{$sidebar_item.icon_class}{else}fto-info-circled{/if} fs_xl"></i>
	    <span class="mobile_bar_tri_text">{$sidebar_item.title}</span>
	</a>
{/if}
{/foreach}
{/if}
