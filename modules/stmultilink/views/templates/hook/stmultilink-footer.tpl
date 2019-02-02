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

{foreach $link_groups as $link_group}
<section id="multilink_{$link_group.id_st_multi_link_group}" class="stlinkgroups_links_footer {if !$link_group.is_stacked_footer}col-lg-{if $link_group.span}{$link_group.span}{else}3{/if}{/if} footer_block block {if $link_group.hide_on_mobile} hidden-md-down {/if}">
    {if $link_group.name}
    <div class="title_block {if $link_group.link_align} text-center {/if}">
        {if $link_group.url}<a href="{$link_group.url}" class="title_block_inner" title="{$link_group.name|strip_tags:false}" {if isset($link_group.nofollow) && $link_group.nofollow} rel="nofollow" {/if} {if isset($link_group.new_window) && $link_group.new_window} target="_blank" {/if}>{else}<div class="title_block_inner">{/if}
        {if $link_group.icon_class}<i class="{$link_group.icon_class} st_custom_link_icon icon-mar-r4"></i>{/if}{$link_group.name nofilter}
        {if $link_group.url}</a>{else}</div>{/if}
        <div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div>
    </div>
    {/if}
    <ul class="footer_block_content bullet custom_links_list {if $link_group.link_align} text-center {/if}">
    {if $link_group['links']}
    {foreach $link_group['links'] as $link}
    	<li>
    		{include file="module:stmultilink/views/templates/hook/stmultilink-item.tpl"}
    	</li>
    {/foreach}
    {/if}
    </ul>
</section>
{/foreach}
