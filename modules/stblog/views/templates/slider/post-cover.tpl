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
        {if isset($blog.cover) && $blog.cover}
        {if $blog.type==1}
            {if $is_lazy}<i class="swiper-lazy-preloader fto-spin5 animate-spin"></i>{/if}
            <div class="blog_image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><a href="{$blog.link}" rel="bookmark" title="{$blog.name}"><img {if $is_lazy}data-src{else}src{/if}="{$blog.cover.links.{$blog_image_type}.image}" alt="{$blog.name}" width="{$blog.cover.links.{$blog_image_type}.width}" height="{$blog.cover.links.{$blog_image_type}.height}" class="{if $is_lazy} swiper-lazy {/if} front-image" /></a>
              <meta itemprop="url" content="{$blog.cover.links.{$blog_image_type}.image}">
              <meta itemprop="width" content="{$blog.cover.links.{$blog_image_type}.width}">
              <meta itemprop="height" content="{$blog.cover.links.{$blog_image_type}.height}">
            </div>
        {/if}
        {/if}
        
        {if $blog.type==2}
        {if isset($blog.galleries) && count($blog.galleries)}
            <div class="swiper-container tm_gallery swiper-button-lr swiper-navigation-circle swiper-small-button" data-lazyload="{$is_lazy}" {if $sttheme.is_rtl} dir="rtl" {/if} itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                <div class="swiper-wrapper">
                    {foreach $blog.galleries as $index => $image}
                      <div class="swiper-slide">
                        {if $is_lazy}<i class="swiper-lazy-preloader fto-spin5 animate-spin"></i>{/if}
                            <a href="{$blog.link}" class="tm_gallery_item_box" title="{$blog.name}">
                                <img
                                  class="tm_gallery_item {if $is_lazy} swiper-lazy {/if}"
                                  {if $is_lazy}data-src{else}src{/if}="{$image.links.{$blog_image_type}.image}"
                                  alt="{$blog.name}"
                                  title="{$blog.name}"
                                  width="{$image.links.{$blog_image_type}.width}" 
                                  height="{$image.links.{$blog_image_type}.height}"
                                />
                                {if $image@first}
                                <meta itemprop="url" content="{$image.links.{$blog_image_type}.image}">
                                <meta itemprop="width" content="{$image.links.{$blog_image_type}.width}">
                                <meta itemprop="height" content="{$image.links.{$blog_image_type}.height}">
                                {/if}
                            </a>
                      </div>
                    {/foreach}
                </div>
                <div class="swiper-button swiper-button-next"><i class="fto-left-open slider_arrow_left"></i><i class="fto-right-open slider_arrow_right"></i></div>
                <div class="swiper-button swiper-button-prev"><i class="fto-left-open slider_arrow_left"></i><i class="fto-right-open slider_arrow_right"></i></div>
            </div>
        {elseif isset($blog.cover) && $blog.cover}
            {if $is_lazy}<i class="swiper-lazy-preloader fto-spin5 animate-spin"></i>{/if}
            <div class="blog_image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><a href="{$blog.link}" rel="bookmark" title="{$blog.name}"><img {if $is_lazy}data-src{else}src{/if}="{$blog.cover.links.{$blog_image_type}.image}" alt="{$blog.name}" width="{$blog.cover.links.{$blog_image_type}.width}" height="{$blog.cover.links.{$blog_image_type}.height}" class="{if $is_lazy} swiper-lazy {/if} front-image" /></a>
              <meta itemprop="url" content="{$blog.cover.links.{$blog_image_type}.image}">
              <meta itemprop="width" content="{$blog.cover.links.{$blog_image_type}.width}">
              <meta itemprop="height" content="{$blog.cover.links.{$blog_image_type}.height}">
            </div>
        {/if}
        {/if}
        
        {if $blog.type==3}
            {if isset($show_video) && $show_video && $blog.video}
              <div class="blog_video"><div class="video_wraper">{$blog.video nofilter}</div></div>
            {elseif isset($blog.cover) && $blog.cover}
              {if $is_lazy}<i class="swiper-lazy-preloader fto-spin5 animate-spin"></i>{/if}
              <div class="blog_image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><a href="{$blog.link}" rel="bookmark" title="{$blog.name}"><img {if $is_lazy}data-src{else}src{/if}="{$blog.cover.links.{$blog_image_type}.image}" alt="{$blog.name}" width="{$blog.cover.links.{$blog_image_type}.width}" height="{$blog.cover.links.{$blog_image_type}.height}" class="{if $is_lazy} swiper-lazy {/if} front-image" /></a>
                <meta itemprop="url" content="{$blog.cover.links.{$blog_image_type}.image}">
                <meta itemprop="width" content="{$blog.cover.links.{$blog_image_type}.width}">
                <meta itemprop="height" content="{$blog.cover.links.{$blog_image_type}.height}">
              </div>
              <span class="blog_type_icon icon_wrap"><i class="fto-video fs_lg"></i></span>
            {/if}
        {/if}