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
{if isset($notification_array) && $notification_array|@count > 0}
    {foreach $notification_array as $ec}
    		<div id="st_notification_{$ec.id_st_notification}" class="st_notification_wrap {if $ec.hide_on_mobile == 1} hidden-md-down {elseif $ec.hide_on_mobile == 2} hidden-lg-up {/if} noti_location_{$ec.location} {if !$ec.width} noti_full {else} noti_width {/if}  notification_tempalte_{$ec.template} {if $ec.location==9} st_notification_static {/if}" data-id_st="{(int)$ec.id_st_notification}" data-delay="{(int)$ec.delay}" data-show_box="{(int)$ec.show_box}" tabindex="-1" role="dialog" aria-labelledby="{l s='Notification' d='Shop.Theme.Transformer'}" aria-hidden="false">
	        	<div class="flex_container">
	        	<div class="style_content flex_child">
		        	<div class="notification_inner {if !$ec.template} flex_container flex_column_sm {/if}">
		            {if $ec.template==1}
		            	<div class="flex_container">
		            		<div class="notification_content flex_child m-r-1">
			            	{$ec.content nofilter}
			            	</div>
			            	<div class="notification_buttons">
			            	{include file="module:stnotification/views/templates/hook/stnotification-buttons.tpl"}
			            	</div>
		            	</div>
		            {elseif $ec.template==2}
		            	{if $ec.content}<div class="notification_content text-center">{$ec.content nofilter}</div>{/if}
		            	{if $ec.accept_button || ($ec.more_info && ($ec.more_info_link || $ec.more_info_link_custom))}<div class="notification_buttons text-center">
		            		{include file="module:stnotification/views/templates/hook/stnotification-buttons.tpl"}
		            	</div>{/if}
		            {else}
		            	{if $ec.content}<div class="flex_child notification_content">{$ec.content nofilter}</div>{/if}
		            	{if $ec.accept_button || ($ec.more_info && ($ec.more_info_link || $ec.more_info_link_custom))}<div class="notification_buttons">
		            		{include file="module:stnotification/views/templates/hook/stnotification-buttons.tpl"}
		            	</div>{/if}
		            {/if}
	            	</div>
            	</div>
            	{if $ec.x_button}<a href="javascript:;" class="st_notification_close {if $ec.template==2} st_modal_close st_modal_close_inner {else} st_notification_close_inline {/if}" data-dismiss="st_notification_wrap" aria-label="{l s='Close' d='Shop.Theme.Transformer'}">&times;</a>{/if}
            	</div>
	        </div>
    {/foreach}
{/if}