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

<!-- Block stlinkgroups top module -->
{foreach $link_groups as $link_group}
{if !$link_group.hide_on_mobile}
<ul id="multilink_mobile_{$link_group.id_st_multi_link_group}" class="mo_mu_level_0 mobile_menu_ul">
    <li class="mo_ml_level_0 mo_ml_column">
        {assign var='has_children' value=(is_array($link_group['links']) && count($link_group['links']))}
        <div class="menu_a_wrap">
        <a href="{if $link_group.url}{$link_group.url}{else}javascript:;{/if}" title="{$link_group.name|strip_tags:false}" rel="nofollow" class="mo_ma_level_0 {if !$link_group.url}ma_span{/if}"{if isset($link_group.new_window) && $link_group.new_window} target="_blank" {/if}>
            {if $link_group.icon_class}<i class="{$link_group.icon_class}"></i>{/if}{$link_group.name nofilter}
        </a>
        {if $has_children}<span class="opener dlm"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span>{/if}
        </div>
        {if $has_children}
        <ul class="mo_mu_level_1 mo_sub_ul">
        {foreach $link_group['links'] as $link}
            <li class="mo_ml_level_1 mo_sub_li">
                {include file="module:stmultilink/views/templates/hook/stmultilink-item.tpl" link_extra_classes="mo_ma_level_1 mo_sub_a"}
            </li>
        {/foreach}
        </ul>
        {/if}
    </li>
</ul>
{/if}
{/foreach}
<!-- /Block stlinkgroups top module -->