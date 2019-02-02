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
    <div id="multilink_{$link_group.id_st_multi_link_group}" class="stlinkgroups_top dropdown_wrap {if $link_group@first}first-item{/if} top_bar_item">{strip}
        {if $link_group.url}
            <a href="{$link_group.url}" title="{$link_group.name|strip_tags:false}" {if isset($link_group.nofollow) && $link_group.nofollow} rel="nofollow" {/if} {if isset($link_group.new_window) && $link_group.new_window} target="_blank" {/if}
        {else}
            <div 
        {/if} class="dropdown_tri {if is_array($link_group['links']) && count($link_group['links'])} dropdown_tri_in {/if} header_item" aria-haspopup="true" aria-expanded="false">
            {if $link_group.icon_class}<i class="{$link_group.icon_class} st_custom_link_icon {if is_array($link_group['links']) && count($link_group['links'])} mar_r4 {/if}"></i>{/if}<span id="multilink_lable_{$link_group.id_st_multi_link_group}">{$link_group.name nofilter}</span>
            <i class="fto-angle-down arrow_down arrow"></i>
            <i class="fto-angle-up arrow_up arrow"></i>
        {if $link_group.url}
            </a>
        {else}
            </div>
        {/if}
        {/strip}
        {if is_array($link_group['links']) && count($link_group['links'])}
        <div class="dropdown_list" aria-labelledby="multilink_lable_{$link_group.id_st_multi_link_group}">
            <ul class="dropdown_list_ul dropdown_box custom_links_list {if isset($link_group.link_align) && $link_group.link_align} text-center {/if}">
    		{foreach $link_group['links'] as $link}
    			<li>
            		<a href="{$link.url}" class="dropdown_list_item" title="{$link.title}" {if isset($link.nofollow) && $link.nofollow} rel="nofollow" {/if} {if $link.new_window} target="_blank" {/if}>
                        {if $link.icon_class}<i class="{$link.icon_class} mar_r4"></i>{/if}{$link.label}
            		</a>
    			</li>
    		{/foreach}
    		</ul>
        </div>
        {/if}
    </div>
{/foreach}
<!-- /Block stlinkgroups top module -->