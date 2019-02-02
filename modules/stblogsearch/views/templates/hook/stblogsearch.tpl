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
<div id="stb_search_block_left" class="block column_block">
	<div class="title_block flex_container title_align_0 title_style_{(int)$stblog.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner">{l s='Blog search' d='Shop.Theme.Transformer'}</div>
        <div class="flex_child title_flex_right"></div>
    </div>
    <div class="block_content">
		<form method="get" action="{url entity='module' name='stblogsearch' controller='default'}" id="stb_searchbox">
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<div class="input-group round_item js-parent-focus input-group-with-border">
		      <input type="text" class="form-control search_query js-child-focus" id="stb_search_query_block" name="stb_search_query" value="{$search_query}" placeholder="{l s='Search' d='Shop.Theme.Transformer'}">
		      <span class="input-group-btn">
		        <button class="btn btn-less-padding btn-spin link_color icon_btn search_widget_btn" id="stb_search_button"  type="submit"><i class="fto-search-1"></i></button>
		      </span>
		    </div>
		</form>
	</div>
</div>