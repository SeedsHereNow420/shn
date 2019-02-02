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
{if isset($easy_content) && $easy_content|@count > 0}
    {foreach $easy_content as $ec}
        {capture name="parallax_param"}{if ($ec.bg_img || $ec.bg_pattern) && $ec.speed!=1 && !$ec.mpfour} data-stellar-background-ratio="{$ec.speed}"{if $ec.bg_img_v_offset} data-stellar-vertical-offset="{(int)$ec.bg_img_v_offset}" {/if}{/if}{/capture}
        {capture name="video_background"}{if $ec.mpfour} data-vide-bg="mp4: {$ec.mpfour}{if $ec.webm}, webm: {$ec.webm}{/if}{if $ec.ogg}, ogv: {$ec.ogg}{/if}{if $ec.video_poster}, poster: {$ec.video_poster}{/if}" data-vide-options="loop: {if $ec.loop}true{else}false{/if}, muted: {if $ec.muted}true{else}false{/if}, position: 50% {(int)$ec.video_v_offset}%" {/if}{/capture}
        {if $ec.is_full_width}<div id="easycontent_container_{$ec.id_st_easy_content}" class="easycontent_container full_container {if ($ec.bg_img || $ec.bg_pattern) && $ec.speed!=1 && !$ec.mpfour} st_parallax_block {/if} {if $ec.mpfour} video_bg_block {/if}{if $ec.hide_on_mobile == 1} hidden-md-down {elseif $ec.hide_on_mobile == 3} hidden-sm-down {elseif $ec.hide_on_mobile == 2} hidden-lg-up {/if} block" {$smarty.capture.parallax_param nofilter} {$smarty.capture.video_background nofilter} >{if !$ec.full_screen}<div class="container">{/if}<div class="row"><div class="col-12">{/if}
            <aside id="easycontent_{$ec.id_st_easy_content}" class="easycontent_{$ec.id_st_easy_content} {if $ec.hide_on_mobile == 1} hidden-md-down {elseif $ec.hide_on_mobile == 3} hidden-sm-down {elseif $ec.hide_on_mobile == 2} hidden-lg-up {/if} {if !$ec.is_full_width} block {if ($ec.bg_img || $ec.bg_pattern) && $ec.speed!=1 && !$ec.mpfour} st_parallax_block {/if}{if $ec.mpfour} video_bg_block {/if}{/if} easycontent {if isset($is_column) && $is_column} column_block {/if} {if $ec.is_header_item} header_item flex_child {/if} {if $ec.type==2 && $ec.module_align>2} easy_stretch_child {if $ec.module_align>10 && $ec.module_align<23} col-lg-{$ec.module_align-10} st_parallax_left {/if} {if $ec.module_align>30 && $ec.module_align<43} col-lg-{$ec.module_align-30} st_parallax_right {/if} {/if}" {if !$ec.is_full_width}{$smarty.capture.parallax_param nofilter} {$smarty.capture.video_background nofilter}{/if}>
                {if $ec.title && $ec.title_align!=3 && (!isset($is_product_tab) || !$is_product_tab)}
                <div class="title_block flex_container title_align_{if $is_column}0{else}{(int)$ec.title_align}{/if} title_style_{if $ec.is_blog}{(int)$stblog.heading_style}{else}{(int)$sttheme.heading_style}{/if}">
                    <div class="flex_child title_flex_left"></div>
                    {if $ec.url}<a href="{$ec.url}" title="{$ec.title}" class="title_block_inner">{else}<div class="title_block_inner">{/if}
                    {$ec.title}
                    {if $ec.url}</a>{else}</div>{/if}
                    <div class="flex_child title_flex_right"></div>
                </div>
                {/if}
            	<div class="style_content {if $ec.width} width_{$ec.width} {/if} block_content {if $ec.id_cms} cms_content {/if}">
                    {if $ec.text}<div class="easy_brother_block text-{$ec.text_align} text-md-{$ec.mobile_text_align}">{$ec.text nofilter}</div>{/if}
                    {if isset($ec.columns) && count($ec.columns)}{include file="module:steasycontent/views/templates/hook/steasycontent-columns.tpl" columns=$ec.columns}{/if}
            	</div>
            </aside>
        {if isset($ec.is_full_width) && $ec.is_full_width}</div>{if !$ec.full_screen}</div>{/if}</div></div>{/if}
    {/foreach}
{/if}