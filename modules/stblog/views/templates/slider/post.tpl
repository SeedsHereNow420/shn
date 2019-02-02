{*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if !isset($blog_image_type) || !$blog_image_type}
    {if isset($for_w) && $for_w=='category' && ($category_layouts==1 || ($category_layouts==3 && $pro_per_lg==1))}
        {assign var='blog_image_type' value='large'}
    {else}
        {assign var='blog_image_type' value='medium'}
    {/if}
{/if}

{assign var='is_lazy' value=!isset($for_w) && isset($lazy_load) && $lazy_load}
<div class="block_blog {if isset($classname)} {$classname} {/if}">
    <div class="pro_outer_box {if (isset($for_w) && $for_w=='category' && $category_layouts==2) || (isset($display_as_grid) && ($display_as_grid==2 || $display_as_grid==4))} blog_lr clearfix {/if}">
    {if $blog.cover}
    <div class="pro_first_box">
        {include file='module:stblog/views/templates/slider/post-cover.tpl' show_video=1}
        {if isset($loved_position) && $loved_position}
            {include file='module:stlovedproduct/views/templates/hook/icon.tpl' id_source=$blog.id_st_blog love_blog=true}
        {/if}
    </div>
    {/if}
    <div class="pro_second_box pro_block_align_{$stblog.blog_block_align}">
        {if isset($stblog.length_of_name) && $stblog.length_of_name==1}
            {assign var="length_of_name" value=70}
        {/if}
        <h1 class="s_title_block {if isset($stblog.length_of_name)}{if $stblog.length_of_name==3} two_rows {elseif $stblog.length_of_name==1 || $stblog.length_of_name==2} nohidden {/if}{/if}"><a href="{$blog.link}" title="{$blog.name}" >{if isset($stblog.length_of_name) && $stblog.length_of_name==1}{$blog.name|truncate:$length_of_name:'...'}{else}{$blog.name}{/if}</a></h1>

        {if $stblog.display_date || $stblog.display_comment_count || $stblog.display_viewcount || $stblog.display_author}
        <div class="blog_info">
            {if $stblog.display_author && $blog.author}<span class="posted_by mar_r4">{l s='by' d='Shop.Theme.Transformer'}</span><span class="link_color">{$blog.author}</span>{/if}
            {if $stblog.display_comment_count && isset($blog.comment_number) && $blog.comment_number}<a href="{$blog.link}#comments" title="{$blog.comment_number} {if $blog.comment_number>1}{l s='Comments' d='Shop.Theme.Transformer'}{else}{l s='Comment' d='Shop.Theme.Transformer'}{/if}"><i class="fto-chat-1 mar_r4"></i>{$blog.comment_number}</a>{/if}
            {if $stblog.display_viewcount}<span><i class="fto-eye-2 mar_r4"></i>{$blog.counter}</span>{/if}
            {if $stblog.display_date}
            {strip}
            <span class="date-add"><i class="fto-clock mar_r4"></i>
            {if $stblog.display_date==2}
                {if !count($blog.timeago)}
                    {l s='Just now' d='Shop.Theme.Transformer'}
                {else}
                    {if key($blog.timeago)=='y'}
                        {$blog.timeago['y']} {if $blog.timeago['y']>1}{l s='Year'  d='Shop.Theme.Transformer'}{else}{l s='Years'  d='Shop.Theme.Transformer'}{/if}
                    {elseif key($blog.timeago)=='m'}
                        {$blog.timeago['m']} {if $blog.timeago['m']>1}{l s='Month'  d='Shop.Theme.Transformer'}{else}{l s='Months'  d='Shop.Theme.Transformer'}{/if}
                    {elseif key($blog.timeago)=='w'}
                        {$blog.timeago['w']} {if $blog.timeago['w']>1}{l s='Week'  d='Shop.Theme.Transformer'}{else}{l s='Weeks'  d='Shop.Theme.Transformer'}{/if}
                    {elseif key($blog.timeago)=='d'}
                        {$blog.timeago['d']} {if $blog.timeago['d']>1}{l s='Day'  d='Shop.Theme.Transformer'}{else}{l s='Days'  d='Shop.Theme.Transformer'}{/if}
                    {elseif key($blog.timeago)=='h'}
                        {$blog.timeago['h']} {if $blog.timeago['h']>1}{l s='Hour'  d='Shop.Theme.Transformer'}{else}{l s='Hours'  d='Shop.Theme.Transformer'}{/if}
                    {elseif key($blog.timeago)=='i'}
                        {$blog.timeago['i']} {if $blog.timeago['i']>1}{l s='Minute'  d='Shop.Theme.Transformer'}{else}{l s='Minutes'  d='Shop.Theme.Transformer'}{/if}
                    {/if}
                    &nbsp;{l s='ago'  d='Shop.Theme.Transformer'}
                {/if}
            {else}{dateFormat date=$blog.date_add full=0}{/if}</span>
            {/strip}
            {/if}
            {if isset($loved_position) && !$loved_position}
              {include file='module:stlovedproduct/views/templates/hook/fly.tpl' id_source=$blog.id_st_blog classname="btn_inline" love_blog=true}
            {/if}
        </div>
        {/if}
        
        {if $display_sd && $blog.content_short}
        <div class="blok_blog_short_content fs_md pad_b6">
            {if $display_sd==2}{$blog.content_short nofilter}
            {elseif $display_sd==3}{$blog.content_short|strip_tags:false|truncate:120:'...' nofilter}
            {elseif $display_sd==1}{$blog.content_short|strip_tags:false|truncate:220:'...' nofilter}
            {elseif $display_sd==4}{$blog.content|strip_tags:false|truncate:120:'...' nofilter}
            {elseif $display_sd==5}{$blog.content|strip_tags:false|truncate:220:'...' nofilter}
            {elseif $display_sd==6}{$blog.content|strip_tags:false|truncate:600:'...' nofilter}
            {elseif $display_sd==7}{$blog.content|strip_tags:false|truncate:1200:'...' nofilter}
            {/if}
        </div>
        {if $stblog.display_read_more}<a href="{$blog.link}" title="{l s='Read more' d='Shop.Theme.Transformer'}" class="{if $stblog.display_read_more==2}go{else}btn btn-default{/if}">{l s='Read more' d='Shop.Theme.Transformer'}</a>{/if}
        {/if}
        
    </div>
    </div>
</div>