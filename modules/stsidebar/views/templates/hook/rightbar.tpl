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
{if count($sidebar_items_left)}
<div id="leftbar" class="">
{foreach $sidebar_items_left as $sidebar_item}
    {include 'module:stsidebar/views/templates/hook/rightbar-item.tpl' sidebar_item=$sidebar_item}
{/foreach}
</div>
{/if}
{if count($sidebar_items_right)}
<div id="rightbar" class="">
{foreach $sidebar_items_right as $sidebar_item}
    {include 'module:stsidebar/views/templates/hook/rightbar-item.tpl' sidebar_item=$sidebar_item}
{/foreach}
</div>
{/if}