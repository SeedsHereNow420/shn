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
*  @author    SeoSA <885588@bk.ru>
*  @copyright 2012-2017 SeoSA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 lt-ie6 " lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8 ie7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]> <html lang="fr" class="no-js ie9" lang="en"> <![endif]-->
<html lang="{$iso|no_escape}">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=0.75, maximum-scale=0.75, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="icon" type="image/x-icon" href="{$img_dir|no_escape}favicon.ico" />
    <link rel="apple-touch-icon" href="{$img_dir|no_escape}app_icon.png" />

    <meta name="robots" content="NOFOLLOW, NOINDEX">
    <title>{if $meta_title != ''}{$meta_title|no_escape} • {/if}{$shop_name|no_escape}</title>
    {if !isset($display_header_javascript) || $display_header_javascript}
        <script type="text/javascript">
            var help_class_name = '{$controller_name|@addcslashes:'\''|no_escape}';
            var iso_user = '{$iso_user|@addcslashes:'\''|no_escape}';
            var full_language_code = '{$full_language_code|@addcslashes:'\''|no_escape}';
            var country_iso_code = '{$country_iso_code|@addcslashes:'\''|no_escape}';
            var _PS_VERSION_ = '{$smarty.const._PS_VERSION_|@addcslashes:'\''|no_escape}';
            var roundMode = {$round_mode|intval};
            {if isset($shop_context)}
            {if $shop_context == Shop::CONTEXT_ALL}
            var youEditFieldFor = '{l s='This field will be modified for all your shops.' mod='dgridproducts' js=1}';
            {elseif $shop_context == Shop::CONTEXT_GROUP}
            var youEditFieldFor = '{l s='This field will be modified for all shops in this shop group:' mod='dgridproducts' js=1} <b>{$shop_name|@addcslashes:'\''|no_escape}</b>';
            {else}
            var youEditFieldFor = '{l s='This field will be modified for this shop:' mod='dgridproducts' js=1} <b>{$shop_name|@addcslashes:'\''|no_escape}</b>';
            {/if}
            {else}
            var youEditFieldFor = '';
            {/if}
            var autorefresh_notifications = '{$autorefresh_notifications|@addcslashes:'\''|no_escape}';
            var new_order_msg = '{l s='A new order has been placed on your shop.' mod='dgridproducts' js=1}';
            var order_number_msg = '{l s='Order number:' mod='dgridproducts' js=1} ';
            var total_msg = '{l s='Total:' mod='dgridproducts' js=1} ';
            var from_msg = '{l s='From:' mod='dgridproducts' js=1} ';
            var see_order_msg = '{l s='View this order' mod='dgridproducts' js=1}';
            var new_customer_msg = '{l s='A new customer registered on your shop.' mod='dgridproducts' js=1}';
            var customer_name_msg = '{l s='Customer name:' mod='dgridproducts' js=1} ';
            var new_msg = '{l s='A new message was posted on your shop.' mod='dgridproducts' js=1}';
            var see_msg = '{l s='Read this message' mod='dgridproducts' js=1}';
            var token = '{$token|addslashes|no_escape}';
            var token_admin_orders = '{getAdminToken tab='AdminOrders'}';
            var token_admin_customers = '{getAdminToken tab='AdminCustomers'}';
            var token_admin_customer_threads = '{getAdminToken tab='AdminCustomerThreads'}';
            var currentIndex = '{$currentIndex|@addcslashes:'\''|no_escape}';
            var employee_token = '{getAdminToken tab='AdminEmployees'}';
            var choose_language_translate = '{l s='Choose language' mod='dgridproducts' js=1}';
            var default_language = '{$default_language|intval}';
            var admin_modules_link = '{$link->getAdminLink("AdminModules")|addslashes|no_escape}';
            var tab_modules_list = '{if isset($tab_modules_list) && $tab_modules_list}{$tab_modules_list|addslashes|no_escape}{/if}';
            var update_success_msg = '{l s='Update successful' mod='dgridproducts' js=1}';
            var errorLogin = '{l s='PrestaShop was unable to log in to Addons. Please check your credentials and your Internet connection.' mod='dgridproducts' js=1}';
            var search_product_msg = '{l s='Search for a product' mod='dgridproducts' js=1}';
        </script>
    {/if}
    {if isset($css_files)}
        {foreach from=$css_files key=css_uri item=media}
            <link href="{$css_uri|escape:'html':'UTF-8'}" rel="stylesheet" type="text/css"/>
        {/foreach}
    {/if}
    {if (isset($js_def) && count($js_def) || isset($js_files) && count($js_files))}
        {include file=$smarty.const._PS_ALL_THEMES_DIR_|cat:"javascript.tpl"}
    {/if}

    {if isset($displayBackOfficeHeader)}
        {$displayBackOfficeHeader|no_escape}
    {/if}
    {if isset($brightness)}
        <!--
		// @todo: multishop color
		<style type="text/css">
			div#header_infos, div#header_infos a#header_shopname, div#header_infos a#header_logout, div#header_infos a#header_foaccess {ldelim}color:{$brightness|no_escape}{rdelim}
		</style>
	-->
    {/if}
</head>
<body>
<div class="bootstrap">
    <div id="content" style="padding-top: 0px" class="bootstrap">
        {$page|no_escape}
    </div>
</div>
<style>
    .panel-footer
    {
        display: none;
    }
</style>
</body>
</html>
