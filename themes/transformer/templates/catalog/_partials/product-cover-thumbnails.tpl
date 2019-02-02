{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{assign var="image_count" value=count($product.images)}
{if $sttheme.product_gallerys==2}{$image_count=count($sttheme.pro_images)}{/if}
{if $sttheme.product_thumbnails==6 && $image_count<2}{$sttheme.product_thumbnails=5}{elseif $sttheme.product_thumbnails==6 && $image_count>1}{$sttheme.product_thumbnails=0}{/if}
{if $sttheme.is_mobile_device}
    {if $sttheme.product_thumbnails_mobile==5 && $image_count<2}{$sttheme.product_thumbnails_mobile=3}{elseif $sttheme.product_thumbnails_mobile==5 && $image_count>1}{$sttheme.product_thumbnails_mobile=4}{/if}
    {if $sttheme.product_thumbnails_mobile==1}
      {$sttheme.product_thumbnails=3}
    {elseif $sttheme.product_thumbnails_mobile==2}
      {$sttheme.product_thumbnails=4}
    {elseif $sttheme.product_thumbnails_mobile==3}
      {$sttheme.product_thumbnails=5}
    {elseif $sttheme.product_thumbnails_mobile==4}
      {$sttheme.product_thumbnails=0}
    {/if}
{/if}
<div class="images-container pro_number_{$image_count}">
<div class="images-container-{$sttheme.product_thumbnails} {if $sttheme.product_thumbnails==1 || $sttheme.product_thumbnails==2} row {/if}">
{if !$sttheme.gallery_thumbnails_width_v}{$sttheme.gallery_thumbnails_width_v=3}{/if}
{assign var="gallery_top_width_v" value=12-$sttheme.gallery_thumbnails_width_v}
{assign var="gallery_thumbnails_width_v_mobile" value=floor($sttheme.gallery_thumbnails_width_v)+1}
{assign var="gallery_top_width_v_mobile" value=12-$gallery_thumbnails_width_v_mobile}
<div class="pro_gallery_top_container {if $sttheme.product_thumbnails==1 || $sttheme.product_thumbnails==2} col-{$gallery_top_width_v_mobile|replace:'.':'-'} col-md-{$gallery_top_width_v|replace:'.':'-'} {/if}{if $sttheme.product_thumbnails==1} push-{$gallery_thumbnails_width_v_mobile|replace:'.':'-'} push-md-{$sttheme.gallery_thumbnails_width_v|replace:'.':'-'} {/if} mb-3">
  <div class="pro_gallery_top_inner posi_rel">
  {block name='product_flags'}
    {foreach $product.extraContent as $extra}
        {if $extra.moduleName=='ststickers'}
            {include file='catalog/_partials/miniatures/sticker.tpl' stickers=$extra.content sticker_position=array(0,1,2,3,4,5,6,7,8,9) sticker_sold_out=(!$product.add_to_cart_url)}
        {elseif $extra.moduleName=='stvideo'}
            <div class="st_popup_video_wrap">
            {include file="module:stvideo/views/templates/hook/stvideo.tpl" stvideos=$extra.content.videos video_position=array(1,2,3,4,5,6,7,8,9,12)}
            </div>
        {/if}
    {/foreach}
  {/block}

  
  {block name='product_cover'}
    {if $sttheme.enable_thickbox}
      <div class="pro_popup_trigger_box">
      {if $sttheme.product_gallerys==2}
        {assign var='pro_popup_trigger' value=$sttheme.pro_images}
      {else}
        {assign var='pro_popup_trigger' value=$product.images}
      {/if}
      {foreach $pro_popup_trigger as $index => $image}
        {*The same code in the product.js, using js to add images fast, but not standard*}
        <a href="{$image.bySize.superlarge_default.url}" class="pro_popup_trigger st_popup_image st_pro_popup_image replace-2x layer_icon_wrap" data-group="pro_gallery_popup_trigger" title="{$image.legend}"><i class="fto-resize-full"></i></a>
      {/foreach}
      </div>
    {/if}
    <div class="swiper-container pro_gallery_top swiper-button-lr {if $sttheme.thumbs_direction_nav==3} swiper-navigation-rectangle {elseif $sttheme.thumbs_direction_nav==2} swiper-navigation-arrow {else} swiper-navigation-circle {/if}" {if $language.is_rtl} dir="rtl" {/if}>
        <div class="swiper-wrapper">
            {assign var='pro_gallery_initial' value=0}
              {assign var="curr_combination_thumbs" value=[]}
              {foreach $product.images as $index => $image}
                {if $image.id_image == $product.cover.id_image}{assign var='pro_gallery_initial' value=$index}{/if}
                {$curr_combination_thumbs[]=$image.id_image}
                {include file='catalog/_partials/product-cover-item.tpl'}
              {/foreach}
              {if $sttheme.product_gallerys==2}
                {foreach $sttheme.pro_images as $index => $image}
                  {if !in_array($image.id_image, $curr_combination_thumbs)}
                    {include file='catalog/_partials/product-cover-item.tpl'}
                  {/if}
                {/foreach}
              {/if}
        </div>
        <div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        {if $sttheme.product_thumbnails==4}<div class="swiper-pagination"></div>{/if}
    </div>
    <script type="text/javascript">
    //<![CDATA[
        {literal}
        if(typeof(swiper_options) ==='undefined')
        var swiper_options = [];
        {/literal}
        {literal}
        swiper_options.push({
            {/literal}
            id_st: '.pro_gallery_top',
            spaceBetween: {(int)$sttheme.gallery_spacing},
            nextButton: '.pro_gallery_top .swiper-button-next',
            prevButton: '.pro_gallery_top .swiper-button-prev',
            {if $sttheme.product_thumbnails==4}
            pagination: '.pro_gallery_top .swiper-pagination',
            {/if}
            loop: false,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            {if $sttheme.responsive_max==3 && $sttheme.pro_thumnbs_per_fw}
                {assign var='slidesPerView' value=$sttheme.pro_thumnbs_per_fw}
            {else}
                {if $sttheme.responsive_max==2}
                    {assign var='slidesPerView' value=$sttheme.pro_thumnbs_per_xxl}
                {elseif $sttheme.responsive_max>=1}
                    {assign var='slidesPerView' value=$sttheme.pro_thumnbs_per_xl}
                {else}
                    {assign var='slidesPerView' value=$sttheme.pro_thumnbs_per_lg}
                {/if}
            {/if}
            slidesPerView: {if $slidesPerView<$image_count}{$slidesPerView}{else}{$image_count}{/if},
            {if $sttheme.responsive}
            {literal}
            breakpoints: {
                {/literal}
                {if $sttheme.responsive_max==3 && $sttheme.pro_thumnbs_per_fw}{literal}1600: {slidesPerView: {/literal}{if $sttheme.pro_thumnbs_per_xxl<$image_count}{$sttheme.pro_thumnbs_per_xxl}{else}{$image_count}{/if}{literal} },{/literal}{/if}
                {if $sttheme.responsive_max>=2}{literal}1440: {slidesPerView: {/literal}{if $sttheme.pro_thumnbs_per_xl<$image_count}{$sttheme.pro_thumnbs_per_xl}{else}{$image_count}{/if}{literal} },{/literal}{/if}
                {if $sttheme.responsive_max>=1}{literal}1200: {slidesPerView: {/literal}{if $sttheme.pro_thumnbs_per_lg<$image_count}{$sttheme.pro_thumnbs_per_lg}{else}{$image_count}{/if}{literal} },{/literal}{/if}
                992: {literal}{slidesPerView: {/literal}{if $sttheme.pro_thumnbs_per_md<$image_count}{$sttheme.pro_thumnbs_per_md}{else}{$image_count}{/if}{literal} },{/literal}
                768: {literal}{slidesPerView: {/literal}{if $sttheme.pro_thumnbs_per_sm<$image_count}{$sttheme.pro_thumnbs_per_sm}{else}{$image_count}{/if}{literal} },{/literal}
                480: {literal}{slidesPerView: {/literal}{if $sttheme.pro_thumnbs_per_xs<$image_count}{$sttheme.pro_thumnbs_per_xs}{else}{$image_count}{/if}{literal} }
            },
            {/literal}
            {/if}
            onSlideChangeEnd: function(swiper){
              prestashop.easyzoom.init(swiper.wrapper.find('.swiper-slide-visible .easyzoom'));
              
              if($('.pro_gallery_thumbs').length && typeof($('.pro_gallery_thumbs')[0].swiper)!=='undefined')
              {
                $('.pro_gallery_thumbs')[0].swiper.slideTo(swiper.activeIndex);
                $($('.pro_gallery_thumbs')[0].swiper.slides).removeClass('clicked_thumb').eq(swiper.activeIndex).addClass('clicked_thumb');
              }
            },
            onInit : function (swiper) {
                  prestashop.easyzoom.init(swiper.wrapper.find('.swiper-slide-visible .easyzoom'));
                  $('.pro_popup_trigger_box a').removeClass('st_active').eq(swiper.activeIndex).addClass('st_active');

                  if($(swiper.slides).length==$(swiper.slides).filter('.swiper-slide-visible').length)
                  {
                      $(swiper.params.nextButton).hide();
                      $(swiper.params.prevButton).hide();
                  }
                  else
                  {
                      $(swiper.params.nextButton).show();
                      $(swiper.params.prevButton).show();
                  }
              },
            onSlideChangeStart : function (swiper) {
                  $('.pro_popup_trigger_box a').removeClass('st_active').eq(swiper.activeIndex).addClass('st_active');
              },
            roundLengths: true,
            lazyLoading: true,
            lazyLoadingInPrevNext: true,
            lazyLoadingInPrevNextAmount: 2,
            initialSlide: {$pro_gallery_initial}
        {literal}
        });
        {/literal} 
    //]]>
    </script>
  {/block}
  </div>
</div>
{if $sttheme.product_thumbnails!=4 && $sttheme.product_thumbnails!=5}
<div class="pro_gallery_thumbs_container {if $sttheme.product_thumbnails==1 || $sttheme.product_thumbnails==2} col-{$gallery_thumbnails_width_v_mobile|replace:'.':'-'} col-md-{$sttheme.gallery_thumbnails_width_v|replace:'.':'-'} pro_gallery_thumbs_vertical {elseif $sttheme.product_thumbnails==3} pro_gallery_thumbs_grid {else} pro_gallery_thumbs_horizontal {/if}{if $sttheme.product_thumbnails==1} pull-{$gallery_top_width_v_mobile|replace:'.':'-'}  pull-md-{$gallery_top_width_v|replace:'.':'-'} {/if}">
  {block name='product_images'}
    <div class="swiper-container pro_gallery_thumbs swiper-button-lr {if $sttheme.thumbs_direction_nav==3} swiper-navigation-rectangle {elseif $sttheme.thumbs_direction_nav==2} swiper-navigation-arrow {else} swiper-navigation-circle {/if} {if $sttheme.product_thumbnails==0} swiper-small-button {/if} {if $sttheme.product_gallerys} hightlight_curr_thumbs {/if}" {if $language.is_rtl} dir="rtl" {/if}>
        <div class="swiper-wrapper">
            {assign var="curr_combination_thumbs" value=[]}
            {foreach $product.images as $index => $image}
              {$curr_combination_thumbs[]=$image.id_image}
              {include file='catalog/_partials/product-thumbnails-item.tpl' curr_combination_thumb=true disable_lazyloading=$pro_gallery_initial}
            {/foreach}
            {if $sttheme.product_gallerys==2}
              {foreach $sttheme.pro_images as $index => $image}
                {if !in_array($image.id_image, $curr_combination_thumbs)}
                  {include file='catalog/_partials/product-thumbnails-item.tpl' disable_lazyloading=$pro_gallery_initial}
                {/if}
              {/foreach}
            {/if}
        </div>
        {if $sttheme.product_thumbnails==1 || $sttheme.product_thumbnails==2}
        <div class="swiper-button swiper-button-top"><i class="fto-up-open slider_arrow_top"></i><i class="fto-down-open slider_arrow_bottom"></i></div>
        <div class="swiper-button swiper-button-bottom"><i class="fto-up-open slider_arrow_top"></i><i class="fto-down-open slider_arrow_bottom"></i></div>
        {elseif $sttheme.product_thumbnails==0}
        <div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        {/if}
    </div>
    <script type="text/javascript">
    //<![CDATA[
    sttheme.product_thumbnails = {$sttheme.product_thumbnails};
    {if $sttheme.product_thumbnails!=3}
        {literal}
        if(typeof(swiper_options) ==='undefined')
        var swiper_options = [];
        {/literal}
        {literal}
        swiper_options.push({
            {/literal}
            id_st: '.pro_gallery_thumbs',
            spaceBetween: 10,
            slidesPerView: 'auto',
            {if $sttheme.product_thumbnails==1 || $sttheme.product_thumbnails==2}
            direction: 'vertical',
            nextButton: '.pro_gallery_thumbs .swiper-button-top',
            prevButton: '.pro_gallery_thumbs .swiper-button-bottom',
            {else}
            nextButton: '.pro_gallery_thumbs .swiper-button-next',
            prevButton: '.pro_gallery_thumbs .swiper-button-prev',
            {/if}            
            loop: false,
            slideToClickedSlide: true,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            onSlideChangeEnd: function(swiper){
              if(typeof($('.pro_gallery_top')[0].swiper)!=='undefined')
                $('.pro_gallery_top')[0].swiper.slideTo(swiper.activeIndex);
            },
            onInit : function (swiper) {
                if($(swiper.slides).length==$(swiper.slides).filter('.swiper-slide-visible').length)
                {
                    $(swiper.params.nextButton).hide();
                    $(swiper.params.prevButton).hide();
                }
                else
                {
                    $(swiper.params.nextButton).show();
                    $(swiper.params.prevButton).show();
                }
            },
            onClick: function(swiper){
              if(typeof($('.pro_gallery_top')[0].swiper)!=='undefined')
                $('.pro_gallery_top')[0].swiper.slideTo(swiper.clickedIndex);
              $(swiper.slides).removeClass('clicked_thumb').eq(swiper.clickedIndex).addClass('clicked_thumb');
            },
            roundLengths: true,
            lazyLoading: {if $pro_gallery_initial}false{else}true{/if},
            lazyLoadingInPrevNext: true,
            lazyLoadingInPrevNextAmount: 2,
            initialSlide: {$pro_gallery_initial}
        {literal}
        });
        {/literal} 
    {/if}
    //]]>
    </script>
  {/block}
</div>
{/if}
</div>
{if $sttheme.product_gallerys==1 && count($curr_combination_thumbs)<count($sttheme.pro_images)}
  <a href="javascript:;" class="btn btn-link pro_gallery_show_all">{l s='Show all images' d='Shop.Theme.Transformer'}</a>
{/if}
</div>
{*displayAfterProductThumbs can not be here, repeat after changing attributes, I moved it to product.tpl*}