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
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($no_follow) AND $no_follow}
	{assign var='no_follow_text' value='rel="nofollow"'}
{else}
	{assign var='no_follow_text' value=''}
{/if}

{if isset($p) AND $p}
	<!-- Pagination -->
	<div class="bottom-blog-pagination">
	<div class="pagination">
	{if $start!=$stop}
		<ul class="pagination clearfix li_fl">
		{if $p != 1}
			{assign var='p_previous' value=$p-1}
			<li class="pagination_previous"><a {$no_follow_text} href="{$link->goPage($requestPage, $p_previous)}" title="{l s='Previous' d='Shop.Theme.Transformer'}">&lt;</a></li>
		{else}
			<li class="pagination_previous disabled"><span>&lt;</span></li>
		{/if}
		{if $start==3}
			<li><a {$no_follow_text}  href="{$link->goPage($requestPage, 1)}">1</a></li>
			<li><a {$no_follow_text}  href="{$link->goPage($requestPage, 2)}">2</a></li>
		{/if}
		{if $start==2}
			<li><a {$no_follow_text}  href="{$link->goPage($requestPage, 1)}">1</a></li>
		{/if}
		{if $start>3}
			<li><a {$no_follow_text}  href="{$link->goPage($requestPage, 1)}">1</a></li>
			<li class="truncate">...</li>
		{/if}
		{section name=pagination start=$start loop=$stop+1 step=1}
			{if $p == $smarty.section.pagination.index}
				<li class="current"><span>{$p|escape:'htmlall':'UTF-8'}</span></li>
			{else}
				<li><a {$no_follow_text} href="{$link->goPage($requestPage, $smarty.section.pagination.index)}">{$smarty.section.pagination.index|escape:'htmlall':'UTF-8'}</a></li>
			{/if}
		{/section}
		{if $pages_nb>$stop+2}
			<li class="truncate"><span>...</span></li>
			<li><a href="{$link->goPage($requestPage, $pages_nb)}">{$pages_nb|intval}</a></li>
		{/if}
		{if $pages_nb==$stop+1}
			<li><a href="{$link->goPage($requestPage, $pages_nb)}">{$pages_nb|intval}</a></li>
		{/if}
		{if $pages_nb==$stop+2}
			<li><a href="{$link->goPage($requestPage, $pages_nb-1)}">{$pages_nb-1|intval}</a></li>
			<li><a href="{$link->goPage($requestPage, $pages_nb)}">{$pages_nb|intval}</a></li>
		{/if}
		{if $pages_nb > 1 AND $p != $pages_nb}
			{assign var='p_next' value=$p+1}
			<li class="pagination_next"><a {$no_follow_text} href="{$link->goPage($requestPage, $p_next)}" title="{l s='Next' d='Shop.Theme.Transformer'}">&gt;</a></li>
		{else}
			<li class="pagination_next disabled"><span>&gt;</span></li>
		{/if}
		</ul>
	{/if}
	</div>
	</div>
	<!-- /Pagination -->
{/if}
