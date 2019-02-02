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

{if $quick_search_simple==1 || $quick_search_simple==2}
<div class="search_widget_simple top_bar_item dropdown_wrap">
	<div class="dropdown_tri header_item link_color" aria-haspopup="true" aria-expanded="false">
		<i class="fto-search-1 fs_lg header_v_align_m"></i>
        {if $quick_search_simple==2}<span class="header_v_align_m">{l s='Search' d='Shop.Theme.Transformer'}</span>{/if}
	</div>
	<div class="dropdown_list" aria-labelledby="">
		{include 'module:stsearchbar/views/templates/hook/stsearchbar-block.tpl'}
	</div>
</div>
{else}
{include 'module:stsearchbar/views/templates/hook/stsearchbar-block.tpl'}
{/if}
