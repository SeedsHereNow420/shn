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
<!-- MODULE st megamenu -->
{if !isset($is_mega_menu_column)}
	{assign var='is_mega_menu_column' value=0}
{/if}
{if isset($stmenu)}
<ul id="st_mobile_menu_ul" class="mo_mu_level_0">
	{foreach $stmenu as $mm}
		{if $mm.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
		<li class="mo_ml_level_0 mo_ml_column">
			{assign var='has_children' value=(isset($mm.column) && count($mm.column))}
			<div class="menu_a_wrap">
			<a id="st_mo_ma_{$mm.id_st_mega_menu}" href="{if $mm.m_link}{$mm.m_link}{else}javascript:;{/if}" class="mo_ma_level_0"{if !$menu_title} title="{$mm.m_title}"{/if}{if $mm.nofollow} rel="nofollow"{/if}{if $mm.new_window} target="_blank"{/if}>{if $mm.m_icon}{$mm.m_icon nofilter}{else}{if $mm.icon_class}<i class="{$mm.icon_class}"></i>{/if}{$mm.m_name}{/if}{if $mm.cate_label}<span class="cate_label">{$mm.cate_label}</span>{/if}</a>
			{if $has_children}<span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span>{/if}
			</div>
			{if $has_children}
				{foreach $mm.column as $column}
					{if $column.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
					{if isset($column.children) && count($column.children)}
						{foreach $column.children as $block}
							{if $block.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
							{if $block.item_t==1}
								{if $block.subtype==2  && isset($block.children)}
									<ul class="mo_mu_level_1 mo_sub_ul">
										<li class="mo_ml_level_1 mo_sub_li">
											{assign var='has_children' value=(isset($block.children.children) && is_array($block.children.children) && count($block.children.children))}
											<div class="menu_a_wrap">
											<a id="st_mo_ma_{$block.id_st_mega_menu}" href="{$block.children.link}"{if !$menu_title} title="{$block.children.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a">{$block.children.name}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
												{if $has_children}
												<span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span>
												{/if}
											</div>
											{if $has_children}
												<ul class="mo_mu_level_2 mo_sub_ul">
												{foreach $block.children.children as $product}
												<li class="mo_ml_level_2 mo_sub_li"><a href="{$product.link}"{if !$menu_title} title="{$product.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_2 mo_sub_a">{$product.name|truncate:45:'...'}</a></li>
												{/foreach}
												</ul>	
											{/if}
										</li>
									</ul>	
								{elseif $block.subtype==0  && isset($block.children.children) && count($block.children.children)}
									{foreach $block.children.children as $menu}
										<ul class="mo_mu_level_1 mo_sub_ul">
											<li class="mo_ml_level_1 mo_sub_li">
												{assign var='has_children' value=(isset($menu.children) && is_array($menu.children) && count($menu.children))}
												<div class="menu_a_wrap">
												<a href="{$menu.link}"{if !$menu_title} title="{$menu.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a">{$menu.name}</a>
												{if $has_children}<span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span>{/if}
												</div>
												{if $has_children}
													{include file="./stmegamenu-category.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$menu.children m_level=2 ismobilemenu=true}
												{/if}
											</li>
										</ul>	
									{/foreach}
								{elseif $block.subtype==1 || $block.subtype==3}
									<ul class="mo_mu_level_1 mo_sub_ul">
										<li class="mo_ml_level_1 mo_sub_li">
											{assign var='has_children' value=(isset($block.children.children) && count($block.children.children))}
											<div class="menu_a_wrap">
											<a  id="st_mo_ma_{$block.id_st_mega_menu}" href="{$block.children.link}"{if !$menu_title} title="{$block.children.name}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a">{$block.children.name}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
											{if $has_children}<span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span>{/if}
											</div>
    										{if $has_children}
												{include file="./stmegamenu-category.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$block.children.children m_level=2 ismobilemenu=true}
											{/if}
										</li>
									</ul>	
								{/if}
							{elseif $block.item_t==2 && isset($block.children) && count($block.children)}
								<div id="st_menu_block_{$block.id_st_mega_menu}" class="stmobilemenu_column">
								<div class="products_sldier_swiper">
								{foreach $block.children as $product}
								<div class="m-b-1">
									{include file="catalog/_partials/miniatures/product.tpl"}
								</div>
								{/foreach}
								</div>
								</div>
							{elseif $block.item_t==3 && isset($block.children) && count($block.children)}
								{if isset($block.subtype) && $block.subtype}
									{foreach $block.children as $brand}
    									<ul class="mo_mu_level_1 mo_sub_ul">
											<li class="mo_ml_level_1 mo_sub_li">
												<a href="{$brand.url}" title="{$brand.name}"{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a">{$brand.name}</a>
											</li>
										</ul>	
									{/foreach}
								{else}
									<div id="st_menu_block_{$block.id_st_mega_menu}" class="stmobilemenu_column">
										{foreach $block.children as $brand}
	    									<div class="mo_brand_div">
												<a href="{$brand.url}" title="{$brand.name}"{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="st_menu_brand">
								                    <img src="{$brand.image}" alt="{$brand.name}" width="{$manufacturerSize.width}" height="{$manufacturerSize.height}" />
								                </a>
											</div>
										{/foreach}
									</div>
								{/if}
							{elseif $block.item_t==4}
								<ul class="mo_mu_level_1 mo_sub_ul">
									<li class="mo_ml_level_1 mo_sub_li">
										{assign var='has_children' value=(isset($block.children) && is_array($block.children) && count($block.children))}
										<div class="menu_a_wrap">
										<a  id="st_mo_ma_{$block.id_st_mega_menu}" href="{if $block.m_link}{$block.m_link}{else}javascript:;{/if}"{if !$menu_title} title="{$block.m_title}"{/if}{if $block.nofollow} rel="nofollow"{/if}{if $block.new_window} target="_blank"{/if} class="mo_ma_level_1 mo_sub_a {if !$block.m_link} ma_span{/if}">{if $block.icon_class}<i class="{$block.icon_class}"></i>{/if}{$block.m_name}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
										{if $has_children}
											{foreach $block.children as $menu}
												{if $menu.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
												<span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span>
												{break}
											{/foreach}
										{/if}
										</div>
										{if $has_children}
											{foreach $block.children as $menu}
												{if $menu.hide_on_mobile == 1 && !$is_mega_menu_column}{continue}{/if}
												<ul class="mo_mu_level_2 mo_sub_ul">
												{include file="./stmegamenu-link.tpl" nofollow=$block.nofollow new_window=$block.new_window menus=$menu m_level=2 ismobilemenu=true}
												</ul>
											{/foreach}
										{/if}
									</li>
								</ul>	
							{elseif $block.item_t==5 && $block.html}
								<div id="st_menu_block_{$block.id_st_mega_menu}" class="stmobilemenu_column style_content">
									{$block.html nofilter}
								</div>
							{/if}
						{/foreach}
					{/if}
				{/foreach}
			{/if}
		</li>
	{/foreach}
</ul>
{/if}
<!-- /MODULE st megamenu -->