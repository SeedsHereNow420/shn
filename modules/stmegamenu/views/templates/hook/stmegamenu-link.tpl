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
{if is_array($menus) && count($menus)}
	{assign var='granditem' value=0}
	{if isset($menu.granditem) && $menu.granditem}{$granditem=1}{/if}
	<li class="{if isset($ismobilemenu)}mo_sub_li mo_{/if}ml_level_{$m_level} granditem_{$granditem} p_granditem_{if isset($p_granditem)}{$p_granditem}{else}1{/if}">
	{if $menus.item_t==5}
		<div id="st_menu_block_{$menus.id_st_mega_menu nofilter}">
			{$menus.html nofilter}
		</div>
	{else}
		{assign var='has_children' value=(isset($menu.children) && is_array($menu.children) && count($menu.children))}
		<div class="menu_a_wrap">
		<a id="st_ma_{$menus.id_st_mega_menu}" href="{$menus.m_link}"{if !$menu_title} title="{$menus.m_title}"{/if}{if $menus.nofollow} rel="nofollow"{/if}{if $menus.new_window} target="_blank"{/if} class="{if isset($ismobilemenu)}mo_sub_a mo_{/if}ma_level_{$m_level} ma_item {if $has_children} has_children {/if}"><i class="{if $menus.icon_class}{$menus.icon_class}{else}fto-angle-right{/if} list_arrow"></i>{$menus.m_name}{if $has_children && !isset($ismobilemenu) && (!isset($granditem) || !$granditem)}<span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span>{/if}{if $menus.cate_label}<span class="cate_label">{$menus.cate_label}</span>{/if}</a>
		{if $has_children && isset($ismobilemenu)}<span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span>{/if}
		</div>
		{if $has_children}
			<ul class="{if isset($ismobilemenu)}mo_sub_ul mo_{/if}mu_level_{$m_level+1} p_granditem_{$granditem}">
			{foreach $menus.children as $menu}
				{if isset($ismobilemenu) && $menu.hide_on_mobile == 1}{continue}{/if}
				{include file="./stmegamenu-link.tpl" menus=$menu m_level=($m_level+1) p_granditem=$granditem}
			{/foreach}
			</ul>
		{/if}
	{/if}
	</li>
{/if}