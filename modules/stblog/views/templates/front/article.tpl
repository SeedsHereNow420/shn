{*
* 2007-2012 PrestaShop
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
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 17677 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{extends file='page.tpl'}

{block name='body_class' append} is_blog {/block}

{block name="full_width_top"}
  {hook h='displayStBlogArticleTop'}
{/block}

{block name='page_content_container'}
<section id="content" class="page-blog-article">

{if isset($blog)}
	{if $blog.id}
        <div id="blog_primary_block" itemscope itemtype="http://schema.org/NewsArticle">
            <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
            <h1 class="page_heading blog_heading" itemprop="headline">{$blog.name}</h1>

            <div class="blog_info m-b-1">
                {if $stblog.display_date}
                {strip}
                <span class="posted_on">{l s='Posted on' d='Shop.Theme.Transformer'}</span>
                <span class="date-add">{if $stblog.display_date==2}
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
                <meta itemprop="datePublished" content="{dateFormat date=$blog.date_add full=0}"/>
                {/strip}
                {/if}
                {if isset($blog.author) && $blog.author}
                    <span class="posted_by">{l s='by' d='Shop.Theme.Transformer'}</span>
                    <span class="posted_author link_color" itemprop="author" itemscope itemtype="https://schema.org/Person">{$blog.author}<meta itemprop="name" content="{$blog.author}"></span>
                {/if}
                {if $stblog.display_viewcount}<span><i class="fto-eye-2 mar_r"></i>{$blog.counter}</span>{/if}
                {hook h='displayStBlogArticleInfo'}
            </div>
            <div class="hidden" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                  <meta itemprop="url" content="{$shop.logo}">
                  {if isset($sttheme.st_logo_image_width) && $sttheme.st_logo_image_width}<meta itemprop="width" content="{$sttheme.st_logo_image_width}">{/if}
                  {if isset($sttheme.st_logo_image_height) && $sttheme.st_logo_image_height}<meta itemprop="height" content="{$sttheme.st_logo_image_height}">{/if}
                </div>
                <meta itemprop="name" content="{$shop.name}">
            </div>
            {if !isset($blog.author) || !$blog.author}
                <div class="hidden" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <meta itemprop="name" content="{$shop.name}">
                </div>
            {/if}

            {if (isset($blog.cover) && $blog.cover) || ($blog.type==3 && $blog.video)}
            <div class="m-b-1">
                {include file='module:stblog/views/templates/slider/post-cover.tpl' blog_image_type='large' is_lazy=0 show_video=1}  
            </div>
            {/if}

            {if $stblog.display_short_content}
                <div class="m-b-1 blog_short_content" itemprop="description">{$blog.content_short}</div>
            {/if}
            
            <div class="blog_content style_content m-b-1">
                {$blog.content nofilter}
            </div>
            
            
            {if $blog_tags && $blog_tags|count}
                <div id="blog_tags" class="general_bottom_border">
                    {l s='Tag' d='Shop.Theme.Transformer'}:
                    {foreach $blog_tags as $tag}
                        <a href="{url entity='module' name='stblogsearch' controller='default' params=['stb_search_query'=>$tag]}" title="{l s='More about' d='Shop.Theme.Transformer'} {$tag}">{$tag}</a>{if !$tag@last},{/if}
                    {/foreach}
                </div>
            {/if}
        </div>
        {hook h='displayStBlogArticleFooter'}
        
        {hook h='displayStBlogArticleSecondary'}
	{/if}
{/if}

</section>
{/block}