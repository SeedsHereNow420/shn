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
*  @author    ST-themes
*  @copyright 2007-2016 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*  
*  
*}

{if isset($stins) && $stins|@count > 0}
    {foreach $stins as $in}
<div id="instagram_block_container_{$in.id_st_instagram}" class="instagram_block_footer {if $in.hide_on_mobile == 1} hidden-md-down {elseif $in.hide_on_mobile == 2} hidden-lg-up {/if} {if $footer_slider && !$is_stacked_footer} col-lg-{if $in.wide_on_footer}{$in.wide_on_footer}{else}3{/if} {/if} block {if $column_slider} column_block {else} footer_block {/if}">
    {if $in.title!=3}
      <div class="title_block {if !$footer_slider} flex_container{/if}">
            <div class="title_block_inner">{if $in.block_title}{$in.block_title}{else}{l s='Follow us on Instagram' d='Admin.Theme.Transformer'}{/if}</div>
            {if $column_slider}<div class="flex_child"></div>{/if}
            {if !$in.grid && $column_slider && $in.direction_nav==1}
                <div class="swiper-button-tr"><div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div><div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div></div>        
            {/if}
            {if $footer_slider}<div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div>{/if}
        </div>
    {/if}

    <div id="instagram_block_{$in.id_st_instagram}" class="{if !$in.title}keep_open{/if} ins_connecting ins_apply_bg instagram_block_footer_box {if $footer_slider}footer_{/if}block_content">
        {if $in.show_profile}
            <div class="instagram_profile {if $in.show_avatar} ins_show_avatar {/if}{if $in.show_avatar==2} ins_round_avatar {/if} m-b-1"></div>
        {/if}
        <div class="ins_ajax_error_box alert alert-warning">{l s='Can not connect to Instagram or you do not have permissions to get media from Instagram.' d='Shop.Theme.Transformer'}</div>
        {if $in.grid}
            <ul class="instagram_con instagram_list"></ul>
        {else}
            <div class="instagram_con swiper-container {if $in.direction_nav>1} swiper-button-lr {if $in.direction_nav==6 || $in.direction_nav==7} swiper-navigation-circle {elseif $in.direction_nav==4 || $in.direction_nav==5} swiper-navigation-rectangle  {elseif $in.direction_nav==8 || $in.direction_nav==9} swiper-navigation-arrow {elseif $in.direction_nav==2 || $in.direction_nav==3} swiper-navigation-full {/if} {if $in.direction_nav==2 || $in.direction_nav==4 || $in.direction_nav==6|| $in.direction_nav==8} swiper-navigation_visible {/if}{/if}" {if $sttheme.is_rtl} dir="rtl" {/if}>
                <div class="swiper-wrapper">
                </div>
                {if ($footer_slider && $in.direction_nav) || $in.direction_nav>1}
                    <div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
                    <div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
                {/if}
                {if $in.control_nav}
                    <div class="swiper-pagination {if $in.control_nav==2} swiper-pagination-st-custom {/if}"></div>
                {/if}
            </div>
        {/if}
        <div class="alert alert-warning hidden-xs-up ins_no_data">{l s='No images' d='Shop.Theme.Transformer'}</div>
        {if $in.load_more && $in.grid}<div class="ins_extra_box"><a href="javascript:;" title="{l s='Load more' d='Shop.Theme.Transformer'}" class="ins_load_more ins_btn" rel="nofollow">{l s='Load more' d='Shop.Theme.Transformer'}</a></div>{/if}
    </div>
    <script type="text/javascript">
    //<![CDATA[
    {literal}
    if(typeof(instagram_block_array) ==='undefined')
        var instagram_block_array = {'profile':[],'feed':[]};
        {/literal}
        {if $in.show_profile}
        {literal}
            instagram_block_array.profile.push({ 
                {/literal}
                id_st_ins: '{$in.id_st_instagram}',
                accessToken: '{$ins_access_token}',
                ins_user_name: '{$in.user_name}',
                ins_user_id: '{$in.user_id}',
                show:             'profile',
                show_counts:       {$in.show_counts},
                ins_follow:       {$in.follow},
                ins_show_bio:       {$in.show_bio},
                ins_show_website:       {$in.show_website},
                picture_size:     '64'
                {literal}
            });
        {/literal}
        {/if}
        {literal}
        instagram_block_array.feed.push({ 
            {/literal}
            isfooter: 1,
            id_st_ins: '{$in.id_st_instagram}',
            accessToken: '{$ins_access_token}',
            ins_user_name: '{$in.user_name}',
            ins_user_id: '{$in.user_id}',
            ins_hash_tag: '{$in.hash_tag}',
            count: {if $in.count}{$in.count}{else}8{/if},
            grid: {if $in.grid}1{else}0{/if},
            likes: {if $in.show_likes}{$in.show_likes}{else}0{/if},       
            comments: {if $in.show_comments}{$in.show_comments}{else}0{/if},    
            username: {if $in.show_username}{$in.show_username}{else}0{/if},   
            timestamp: {if $in.show_timestamp}{$in.show_timestamp}{else}0{/if},   
            caption: {$in.show_caption},   
            ins_lenght_of_caption: {$in.lenght_of_caption},   
            image_size: {$in.image_size},
            effects: {$in.hover_effect},
            click_action: {$in.click_action},
            show_media_type: {$in.show_media_type},
            time_format: {$in.time_format},
            ins_load_more: {if $in.load_more}1{else}0{/if},
            ins_show_avatar: {$in.show_avatar},
            ins_self_liked: {if $in.self_liked}1{else}0{/if},
            force_square: {if $in.force_square}1{else}0{/if},
            {literal}
            swiper: {
            {/literal}
                slidesPerView : 1,
                autoHeight : true,
                {if $in.slideshow}autoplay : {$in.slider_s_speed|default:5000},{/if}
                {if $in.direction_nav}
                    nextButton: '#instagram_block_container_{$in.id_st_instagram} .swiper-button-next',
                    prevButton: '#instagram_block_container_{$in.id_st_instagram} .swiper-button-prev',
                {/if}
                {if $in.control_nav}
                    pagination: '.swiper-pagination',
                    paginationType: {if $in.control_nav==2}'bullets'{elseif $in.control_nav==3}'progress'{else}'bullets'{/if}, //A bug of swiper, this should be 'custom' when nav==2
                        {if $in.control_nav==2}
                        {literal}
                        paginationBulletRender: function (swiper, index, className) {
                            return '<span class="' + className + '">' + (index + 1) + '</span>';
                        },
                        {/literal}
                        {/if}
                {/if}
                loop: {if $in.rewind_nav}true{else}false{/if},
                speed: {$in.slider_a_speed|default:400},
                autoplayDisableOnInteraction: {if $in.pause_on_hover}true{else}false{/if}
            {literal}
            }
        });
    {/literal} 
    //]]>
    </script>
</div>
    {/foreach}
{/if}
