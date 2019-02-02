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
{block name='head_charset'}
  <meta charset="utf-8">
{/block}
{block name='head_ie_compatibility'}
  <meta http-equiv="x-ua-compatible" content="ie=edge">
{/block}

{block name='head_seo'}
  <title>{block name='head_seo_title'}{$page.meta.title}{/block}</title>
{hook h="displayAfterTitle"}
  <meta name="description" content="{block name='head_seo_description'}{$page.meta.description}{/block}">
  <meta name="keywords" content="{block name='head_seo_keywords'}{$page.meta.keywords}{/block}">
  {if $page.meta.robots !== 'index'}
    <meta name="robots" content="{$page.meta.robots}">
  {/if}
  {if $page.canonical}
    <link rel="canonical" href="{$page.canonical}">
  {/if}
{/block}

<!--st begin -->
{block name='head_viewport'}
{if isset($sttheme.responsive) && $sttheme.responsive && (!$sttheme.enabled_version_swithing || $sttheme.version_switching==0)}
    <meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
{/if}
{/block}
<!--st end -->
{block name='head_icons'}
  <link rel="icon" type="image/vnd.microsoft.icon" href="{$shop.favicon}?{$shop.favicon_update_time}">
  <link rel="shortcut icon" type="image/x-icon" href="{$shop.favicon}?{$shop.favicon_update_time}">
  <!--st begin -->
  {if isset($sttheme.icon_iphone_57) && $sttheme.icon_iphone_57}
  <link rel="apple-touch-icon" sizes="57x57" href="{$sttheme.icon_iphone_57}" />
  {/if}
  {if isset($sttheme.icon_iphone_72) && $sttheme.icon_iphone_72}
  <link rel="apple-touch-icon" sizes="72x72" href="{$sttheme.icon_iphone_72}" />
  {/if}
  {if isset($sttheme.icon_iphone_114) && $sttheme.icon_iphone_114}
  <link rel="apple-touch-icon" sizes="114x114" href="{$sttheme.icon_iphone_114}" />
  {/if}
  {if isset($sttheme.icon_iphone_144) && $sttheme.icon_iphone_144}
  <link rel="apple-touch-icon" sizes="144x144" href="{$sttheme.icon_iphone_144}" />
  {/if}
{/block}
<!--st end -->
{block name='stylesheets'}
  {include file="_partials/stylesheets.tpl" stylesheets=$stylesheets}
{/block}

{block name='javascript_head'}
  {include file="_partials/javascript.tpl" javascript=$javascript.head vars=$js_custom_vars}
{/block}
<!--st end -->
{block name='hook_header'}
  {$HOOK_HEADER nofilter}
{/block}
{if isset($sttheme.head_code) && $sttheme.head_code}{$sttheme.head_code nofilter}{/if}
{block name='hook_extra'}{/block}