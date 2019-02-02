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

{if $stins_for_css && $stins_for_css|@count}
<style type="text/css">
{if $stins_for_css && $stins_for_css|@count}
	{foreach $stins_for_css as $in}{assign var='group_css' value=''}
	{assign var='prefix' value="#instagram_block_container_`$in['id_st_instagram']`"}
	{strip}
		{if $in['caption_color']} {$prefix} .ins_image_info, {$prefix} .ins_imagetype,{$prefix} .ins_view_larger{literal}{color:{/literal}{$in['caption_color']};} {/if} 
		{if $in['bg_hover_color']} {$prefix} .ins_image_info:hover{literal}{background:{/literal}{$in['bg_hover_color']};} {$prefix} .ins_image_info{literal}{background:{/literal}rgba({$in['bg_hover_color_arr'][0]},{$in['bg_hover_color_arr'][1]},{$in['bg_hover_color_arr'][2]},{$in['bg_opacity_nohover']});} {$prefix} .ins_image_info:hover{literal}{background:{/literal}rgba({$in['bg_hover_color_arr'][0]},{$in['bg_hover_color_arr'][1]},{$in['bg_hover_color_arr'][2]},{$in['bg_opacity']});} {/if} 
		{if $in['media_info_color']} {$prefix} .ins_image_info_block, {$prefix} .ins_image_info_block a, {$prefix} .ins_image_info_block a:hover, {$prefix} .ins_image_info_block .ins_image_info_username{literal}{color:{/literal}{$in['media_info_color']};} {/if} 
		{if $in['media_info_a_color']} {$prefix} .ins_image_info_block a, {$prefix} .ins_image_info_block a:hover, {$prefix} .ins_image_info_block .ins_image_info_username{literal}{color:{/literal}{$in['media_info_a_color']};} {/if} 
		{if $in['media_info_a_color_hover']} {$prefix} .ins_image_info_block a:hover{literal}{color:{/literal}{$in['media_info_a_color_hover']};} {/if} 
		{if $in['media_info_bg']} {$prefix} .ins_image_info_block{literal}{background:{/literal}{$in['media_info_bg']};} {/if} 
		{if $in['follow_color']} {$prefix} .ins_follow_btn, #footer {$prefix} .ins_follow_btn, {$prefix} .ins_profile_img_right a.ins_follow_btn{literal}{color:{/literal}{$in['follow_color']};} {/if} 
		{if $in['follow_bg']} {$prefix} .ins_follow_btn, {$prefix} .ins_profile_img_right a.ins_follow_btn:hover{literal}{background:{/literal}{$in['follow_bg']};} {/if} 
		{if $in['popup_text_color']} .ins_fancy_box.ins_fancy_box_{$in['id_st_instagram']}, .ins_fancy_box.ins_fancy_box_{$in['id_st_instagram']} a,.ins_fancy_box.ins_fancy_box_{$in['id_st_instagram']} a:hover{literal}{color:{/literal}{$in['popup_text_color']};} {/if} 
		{if $in['popup_a_color']} .ins_fancy_box.ins_fancy_box_{$in['id_st_instagram']} a,.ins_fancy_box.ins_fancy_box_{$in['id_st_instagram']} a:hover{literal}{color:{/literal}{$in['popup_a_color']};} {/if} 
		{if $in['popup_a_color_hover']} .ins_fancy_box.ins_fancy_box_{$in['id_st_instagram']} a:hover{literal}{color:{/literal}{$in['popup_a_color_hover']};} {/if} 
		{if $in['cc_text_color']} {$prefix} .ins_custom_content, {$prefix} .ins_custom_content a, {$prefix} .ins_custom_content a:hover{literal}{color:{/literal}{$in['cc_text_color']};} {/if} 
		{if $in['cc_a_color']} {$prefix} .ins_custom_content a, {$prefix} .ins_custom_content a:hover{literal}{color:{/literal}{$in['cc_a_color']};} {/if} 
		{if $in['cc_a_color_hover']} {$prefix} .ins_custom_content a:hover{literal}{color:{/literal}{$in['cc_a_color_hover']};} {/if} 
		{if $in['cc_bg']} {$prefix} .ins_custom_content{literal}{background:{/literal}{$in['cc_bg']};} {/if} 
		{if $in['profile_text']} {$prefix} .ins_profile_img_right, {$prefix} .ins_profile_img_right a, {$prefix} .ins_profile_img_right a:hover{literal}{color:{/literal}{$in['profile_text']};} {/if} 
		{if $in['profile_a_color']} {$prefix} .ins_profile_img_right a, {$prefix} .ins_profile_img_right a:hover{literal}{color:{/literal}{$in['profile_a_color']};} {/if} 
		{if $in['profile_a_color_hover']} {$prefix} .ins_profile_img_right a:hover{literal}{color:{/literal}{$in['profile_a_color_hover']};} {/if} 
		{if $in['profile_bg']} {$prefix} .instagram_profile{literal}{background:{/literal}{$in['profile_bg']};} {/if} 
		{if $in['account_stats_color']} {$prefix} .ins_pro_c, {$prefix} .ins_pro_c_v{literal}{color:{/literal}{$in['account_stats_color']};} {/if} 
		{if $in['account_stats_bg']} {$prefix} .ins_profile_counts{literal}{background:{/literal}{$in['account_stats_bg']};} {/if} 
		{if $in['load_more_color']} {$prefix} .ins_load_more, #footer {$prefix} .ins_load_more{literal}{color:{/literal}{$in['load_more_color']};} {/if} 
		{if $in['load_more_bg']} {$prefix} .ins_load_more{literal}{background:{/literal}{$in['load_more_bg']};} {/if} 
		{if $in['load_more_bg_hover']} {$prefix} .ins_load_more:hover,{$prefix} .ins_load_more.ins_loading{literal}{background:{/literal}{$in['load_more_bg_hover']};} {/if}
		{$prefix} .instagram_list li, #footer {$prefix} .instagram_list li{literal}{padding:{/literal}{(int)$in['padding']}px;} 
		{if $in['font_size']} {$prefix} .ins_image_wrap{literal}{font-size:{/literal}{$in['font_size']}px;} {/if} 
		{if $in['image_border']} {$prefix} .ins_image_link{literal}{border:{/literal} {$in['image_border']}px solid {$in['image_border_color']};} {/if} 
		{if $in['image_border_radius']} {$prefix} .ins_image_link, {$prefix} .ins_image_info{literal}{border-radius:{/literal} {$in['image_border_radius']}px;} {/if} 
		{if $in['picture_size_col']} {$prefix} .instagram_list img{literal}{width:{/literal}{$in['picture_size_col']}px;} {/if} 
		{if $in['bg_color']} {$prefix}.ins_apply_bg, {$prefix} .ins_apply_bg {literal}{background-color:{/literal}{$in['bg_color']};} {/if} 
		{if $in['bg_img']} {$prefix}.ins_apply_bg, {$prefix} .ins_apply_bg {literal}{background-image:{/literal}url({$in['bg_img']});} {elseif $in['bg_pattern']} {$prefix}.ins_apply_bg, {$prefix} .ins_apply_bg {literal}{background-image:{/literal}url({$in['bg_pattern']});} {/if} 
		{if $in['top_padding']} {$prefix}{literal}{padding-top:{/literal}{$in['top_padding']}px;} {/if} 
		{if $in['bottom_padding']} {$prefix}{literal}{padding-bottom:{/literal}{$in['bottom_padding']}px;} {/if} 
		{if $in['top_margin']!==null && $in['top_margin']!==''} {$prefix}{literal}{margin-top:{/literal}{$in['top_margin']}px;} {/if} 
		{if $in['bottom_margin']!==null && $in['bottom_margin']!==''} {$prefix}{literal}{margin-bottom:{/literal}{$in['bottom_margin']}px;} {/if} 
		{if $in['title_font_size']} {$prefix} .title_block_inner{literal}{font-size:{/literal}{$in['title_font_size']}px;line-height:150%;} {/if} 
		{if $in['title_color']} {$prefix} .title_block_inner{literal}{color:{/literal}{$in['title_color']};} {/if} 
		{if $in['title_bg']} {$prefix} .title_block{literal}{background:{/literal}{$in['title_bg']};} {/if}
		{$prefix} .title_block, {$prefix} .title_block_inner{literal}{border-bottom-width:{/literal} {(int)$in['title_border_height']}px;} 
		{if $in['title_border_color']} {$prefix} .title_block{literal}{border-bottom-color:{/literal} {$in['title_border_color']}px;} {/if} 
		{if $in['title_border_color_h']} {$prefix} .title_block_inner{literal}{border-bottom-color:{/literal} {$in['title_border_color_h']}px;} {/if} 
		{if $in['direction_color']} {$prefix} .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div, {$prefix} .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div{literal}{color:{/literal}{$in['direction_color']};} {/if} 
		{if $in['direction_color_hover']} {$prefix} .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div:hover, {$prefix} .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div:hover{literal}{color:{/literal}{$in['direction_color_hover']};} {/if} 
		{if $in['direction_color_disabled']} {$prefix} .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled, {$prefix} .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover, {$prefix} .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div.disabled, {$prefix} .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div.disabled:hover{literal}{color:{/literal}{$in['direction_color_disabled']};} {/if} 
		{if $in['direction_bg']} {$prefix} .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div, {$prefix} .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div, {$prefix} .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div{literal}{background-color:{/literal}{$in['direction_bg']};} {/if} 
		{if $in['direction_hover_bg']} {$prefix} .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div:hover, {$prefix} .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div:hover, instagram_block_center_container .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div:hover{literal}{background-color:{/literal}{$in['direction_hover_bg']};} {/if} 
		{if $in['direction_disabled_bg']} {$prefix} .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled,{$prefix} .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover, {$prefix} .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div.disabled, {$prefix} .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div.disabled,{$prefix} .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div.disabled:hover, {$prefix} .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div.disabled:hover{literal}{background-color:{/literal}{$in['direction_disabled_bg']};} {else} {$prefix} .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled,{$prefix} .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover{literal}{background-color:{/literal}transplanted;} {/if} 
		{if $in['pag_nav_bg']} {$prefix} .owl-theme .owl-controls .owl-page span{literal}{background-color:{/literal}{$in['pag_nav_bg']};} {/if} 
		{if $in['pag_nav_bg_hover']} {$prefix} .owl-theme .owl-controls .owl-page.active span, {$prefix} .owl-theme .owl-controls .owl-page:hover span{literal}{background-color:{/literal}{$in['pag_nav_bg_hover']};} {/if}
		{if $in['shadow_effect']} {assign var='apply_to' value="#instagram_block_container_`$in['id_st_instagram']` .ins_image_link"}
		{$prefix} {literal}.swiper-container{margin: -{/literal}{$in['shadow_blur']}{literal}px; padding: {/literal}{$in['shadow_blur']}{literal}px;}{/literal}
		{if $in['show_caption']==3 || $in['show_likes']==3 || $in['show_comments']==3 || $in['show_username']==3 || $in['show_timestamp']==3} {assign var='apply_to' value="#instagram_block_container_`$in['id_st_instagram']` .ins_image_wrap_inner "} {/if} {assign var='pro_shadow_css' value="`$in['h_shadow']`px `$in['v_shadow']`px `$in['shadow_blur']`px rgba(`$in['shadow_color_arr'][0]`,`$in['shadow_color_arr'][1]`,`$in['shadow_color_arr'][2]`,`$in['shadow_opacity']`)"} {$apply_to} 
		{if $in['shadow_effect']==2}:hover{/if}{literal}{-webkit-box-shadow:{/literal} {$pro_shadow_css }; {literal}-moz-box-shadow:{/literal} {$pro_shadow_css }; {literal}box-shadow:{/literal} {$pro_shadow_css };} {/if}
	{/strip}
	{/foreach}
{/if}
</style>
{/if}
<script type="text/javascript">
//<![CDATA[
var ins_follow = "{l s='Follow' d='Shop.Theme.Transformer'}";
var ins_posts = "{l s='Posts' d='Shop.Theme.Transformer'}";
var ins_followers = "{l s='Followers' d='Shop.Theme.Transformer'}";
var ins_following = "{l s='Following' d='Shop.Theme.Transformer'}";
var stinstagram_view_in_ins = "{l s='View in Instagram' d='Shop.Theme.Transformer'}";
var stinstagram_view_larger = "{l s='Click to view larger' d='Shop.Theme.Transformer'}";
var st_timeago_suffixAgo= "{l s='ago' d='Shop.Theme.Transformer'}";
var st_timeago_suffixFromNow= "{l s='from now' d='Shop.Theme.Transformer'}";
var st_timeago_inPast= "{l s='any moment now' d='Shop.Theme.Transformer'}";
var st_timeago_seconds= "{l s='less than a minute' d='Shop.Theme.Transformer'}";
var st_timeago_minute= "{l s='about a minute' d='Shop.Theme.Transformer'}";
var st_timeago_minutes= "#d {l s='minutes' d='Shop.Theme.Transformer'}";
var st_timeago_hour= "{l s='about an hour' d='Shop.Theme.Transformer'}";
var st_timeago_hours= "{l s='about #d hours' d='Shop.Theme.Transformer'}";
var st_timeago_day= "{l s='a day' d='Shop.Theme.Transformer'}";
var st_timeago_days= "#d {l s='days' d='Shop.Theme.Transformer'}";
var st_timeago_month= "{l s='about a month' d='Shop.Theme.Transformer'}";
var st_timeago_months= "#d {l s='months' d='Shop.Theme.Transformer'}";
var st_timeago_year= "{l s='about a year' d='Shop.Theme.Transformer'}";
var st_timeago_years= "#d {l s='years' d='Shop.Theme.Transformer'}";
var st_timeago_years= "#d {l s='years' d='Shop.Theme.Transformer'}";
var ins_previous= "{l s='Previous' d='Shop.Theme.Transformer'}";
var ins_next= "{l s='Next' d='Shop.Theme.Transformer'}";
{literal}
var instagram_block_array={'profile':[],'feed':[]};
{/literal}
//]]>
</script>