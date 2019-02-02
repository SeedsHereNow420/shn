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
{if isset($stmenu) && is_array($stmenu) && count($stmenu)}
<!-- Menu -->
<div id="st_mega_menu_column" class="block column_block">
	<h3 class="title_block">
		<span class="title_block_inner">
			{l s='Categories' d='Shop.Theme.Transformer'}
		</span>
	</h3>
	<div id="st_mega_menu_column_block" class="block_content">
    	<div id="st_mega_menu_column_desktop">
    		{include file="./stmegamenu-ul.tpl" is_mega_menu_main=0}
    	</div>
    	<div id="st_mega_menu_column_mobile">
	    	{include file="./stmobilemenu-ul.tpl" is_mega_menu_column=1}
    	</div>
	</div>
</div>
<!--/ Menu -->
{/if}