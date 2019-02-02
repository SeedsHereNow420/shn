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
{if is_array($blogs) && $blogs|count}
{capture name="column_slider"}{if isset($column_slider) && $column_slider}_column{/if}{/capture}
<section id="st_blog_related_article{$smarty.capture.column_slider}" class="block {if isset($column_slider) && $column_slider} column_block {/if} {if $hide_mob} hidden-xs {/if}">
    <h3 class="title_block {if (!isset($column_slider) || !$column_slider) && $title_position} title_block_center {/if}"><span>{l s='Related articles ' d='Shop.Theme.Transformer'}</span></h3>
    <div id="related_article_slider{$smarty.capture.column_slider}" class="products_slider block_content">
    {if isset($column_slider) && $column_slider}
        <div class="slides owl-navigation-tr">
            {foreach $blogs as $blog}
            {if $blog@first || $blog@index is div by $slider_items}
            <div class="slides_list">
            {/if}
                <div class="pro_column_box clearfix">
                    <a href="{$link->getModuleLink('stblog', 'article',['id_st_blog'=>$blog['id_st_blog'],'rewrite'=>$blog['link_rewrite']])|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}" class="pro_column_left">
                        <img src="{$blog.cover.links.thumb}" alt="{$blog.name|escape:'htmlall':'UTF-8'}" width="{$imageSize[1]['thumb'][0]}" height="{$imageSize[1]['thumb'][1]}" />
                    </a>
                    <div class="pro_column_right">
                        <p class="s_title_block nohidden"><a href="{$link->getModuleLink('stblog', 'article',['id_st_blog'=>$blog['id_st_blog'],'rewrite'=>$blog['link_rewrite']])|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}">{$blog.name|truncate:50:'...'|escape:html:'UTF-8'}</a></p><span class="date-add">{dateFormat date=$blog.date_add full=0}</span>
                    </div>
                </div>
            {if $blog@last || $blog@iteration is div by $slider_items}
            </div>
            {/if}
            {/foreach}
        </div>
    {else}
        <div class="slides {if $direction_nav>1} owl-navigation-lr {if $direction_nav==4} owl-navigation-circle {else} owl-navigation-rectangle {/if} {elseif $direction_nav==1} owl-navigation-tr{/if}">
        {foreach $blogs as $blog}
            <div class="block_blog {if $blog@first}first_item{elseif $blog@last}last_item{/if} ">
                <div class="blog_image">
                    <a href="{$blog.link|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}">
                    <img {if $lazy_load} data-src="{$blog.cover.links.medium}" {else} src="{$blog.cover.links.medium}" {/if} alt="{$blog.name|escape:'htmlall':'UTF-8'}" width="{$imageSize[1]['medium'][0]}" height="{$imageSize[1]['medium'][1]}" class="hover_effect {if $lazy_load} lazyOwl {/if}" />
                    {if $blog.type==2}
                        <span class="icon_wrap"><i class="icon-camera-2 icon-1x"></i></span>
                    {elseif $blog.type==3}
                        <span class="icon_wrap"><i class="icon-video icon-1x"></i></span>
                    {/if}
                    </a>
                </div>
                <p class="s_title_block"><a href="{$blog.link|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}">{$blog.name|escape:'htmlall':'UTF-8'|truncate:70:'...'}</a></p>
                {if $blog.content_short}<p class="blok_blog_short_content">{$blog.content_short|strip_tags:'UTF-8'|truncate:120:'...'}</p>{/if}
                <div class="blog_read_more">
                    <a href="{$blog.link|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}" class="btn btn-default">{l s='Read more' d='Shop.Theme.Transformer'}</a>
                </div>
            </div>
        {/foreach}
        </div>
    {/if}
    </div>

    <script type="text/javascript">
    //<![CDATA[
    {literal}
    jQuery(function($) { 
        var owl = $("#related_article_slider{/literal}{$smarty.capture.column_slider}{literal} .slides");
        owl.owlCarousel({
            {/literal}
            autoPlay: {if $slider_slideshow}{$slider_s_speed|default:5000}{else}false{/if},
            slideSpeed: {$slider_a_speed|default:400},
            stopOnHover: {if $slider_pause_on_hover}true{else}false{/if},
            lazyLoad: {if $lazy_load}true{else}false{/if},
            scrollPerPage: {if $slider_move}true{else}false{/if},
            rewindNav: {if $rewind_nav}true{else}false{/if},
            afterInit: productsSliderAfterInit,
            {if isset($column_slider) && $column_slider}
            singleItem : true,
            navigation: true,
            pagination: false,
            {else}
            navigation: {if $direction_nav}true{else}false{/if},
            pagination: {if $control_nav}true{else}false{/if},
            {literal}
            itemsCustom : [
                {/literal}
                {if $sttheme.responsive && !$sttheme.version_switching}
                {if $sttheme.responsive_max==2}{literal}[1420, {/literal}{$pro_per_xl}{literal}],{/literal}{/if}
                {if $sttheme.responsive_max>=1}{literal}[1180, {/literal}{$pro_per_lg}{literal}],{/literal}{/if}
                {literal}
                [972, {/literal}{$pro_per_md}{literal}],
                [748, {/literal}{$pro_per_sm}{literal}],
                [460, {/literal}{$pro_per_xs}{literal}],
                [0, {/literal}{$pro_per_xxs}{literal}]
                {/literal}{else}{literal}
                [0, {/literal}{if $sttheme.responsive_max==2}{$pro_per_xl}{elseif $sttheme.responsive_max==1}{$pro_per_lg}{else}{$pro_per_md}{/if}{literal}]
                {/literal}
                {/if}
                {literal} 
            ]
            {/literal}
            {/if}
            {literal} 
        });
    });
    {/literal} 
    //]]>
    </script>
</section>
{/if}