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
{foreach $sidebar_items as $sidebar_item}
{if !$sidebar_item.native_modules}
<div class="st-menu custom_sidebar" id="side_custom_sidebar_{$sidebar_item.id_st_sidebar}">
	<div class="st-menu-header">
		<h3 class="st-menu-title">{$sidebar_item.title}</h3>
    	<a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
	</div>
	<div class="custom_sidebar_box pad_10">
		{$sidebar_item.content nofilter}
	</div>
</div>
{elseif $sidebar_item.native_modules==7}
    <div class="st-menu" id="side_mobile_nav">
        <div class="st-menu-header">
            <h3 class="st-menu-title">{if $sidebar_item.title}{$sidebar_item.title}{else}{l s='Settings' d='Shop.Theme.Transformer'}{/if}</h3>
            <a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
        </div>
      <div class="mobile_nav_box">
        {hook h="displayMobileNav"}
      </div>
    </div>
{/if}
{/foreach}

