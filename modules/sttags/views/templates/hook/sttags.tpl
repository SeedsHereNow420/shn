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
<section class="block tags_block {if is_column} column_block {/if}">
	{if $blocktags_title!=3}
	<div class="title_block flex_container title_align_{if $is_column}0{else}{(int)$blocktags_title}{/if} title_style_{(int)$sttheme.heading_style}">
		<div class="flex_child title_flex_left"></div>
		<div class="title_block_inner">{l s='Popular tags' d='Shop.Theme.Transformer'}</div>
		<div class="flex_child title_flex_right"></div>
	</div>
	{/if}
	<div class="block_content {if $blocktags_align==1} text-center {elseif $blocktags_align==2} text-right {/if}">
		{include file="module:sttags/views/templates/hook/sttags-items.tpl"}
	</div>
</section>
