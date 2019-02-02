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

{block name='breadcrumb'}{/block}

{block name="full_width_top"}
  {hook h='displayStBlogFullWidthTop'}
{/block}

{block name='page_content_container'}
<section id="content" class="page-blog-default">
{$HOOK_ST_BLOG_HOME_TOP nofilter}
{$HOOK_ST_BLOG_HOME nofilter}
{if $blog_show_all && $blogs}
{include file="module:stblog/views/templates/slider/list-item.tpl" display_sd=$stblog.display_sd}
{include file='_partials/pagination.tpl' pagination=$pagination is_blog_fengye=true}
{/if}
</section>
{/block}

{block name="full_width_bottom"}
  {hook h='displayStBlogFullWidthBottom'}
{/block}