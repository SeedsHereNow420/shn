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
<section class="block tags_block {if !$is_stacked_footer} col-lg-{$blocktags_wide_on_footer} {/if}">
	{if $blocktags_title!=3}
	<div class="title_block {if $blocktags_title==1} text-center {elseif $blocktags_title==2} text-right {/if}">
		<div class="title_block_inner">{l s='Popular tags' d='Shop.Theme.Transformer'}</div>
        <div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div>
	</div>
	{/if}
	<div class="footer_block_content {if $blocktags_align==1} text-center {elseif $blocktags_align==2} text-right {/if} {if $blocktags_title==3} keep_open{/if}">
		{include file="module:sttags/views/templates/hook/sttags-items.tpl"}
	</div>
</section>
