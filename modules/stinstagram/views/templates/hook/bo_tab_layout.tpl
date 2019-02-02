{*
* 2007-2016 PrestaShop
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
*  @author    ST-themes
*  @copyright 2007-2016 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*  
*  
*}
<div class="tabbable row stinstagram">
<div class="st_sidebar col-xs-12 col-lg-2"><ul class="nav nav-tabs">
{foreach $ins_tabs as $tab}
	<li class="nav-item"><a href="javascript:;" title="{$tab['name']|escape:'htmlall':'UTF-8'}" data-fieldset="{$tab['id']|escape:'htmlall':'UTF-8'}">{$tab['name']|escape:'htmlall':'UTF-8'}</a></li>
{/foreach}
</ul></div>
<div id="stinstagram" class="col-xs-12 col-lg-10 tab-content">
{$ins_tab_content}{* HTML in this variable, no escape necessary *}
</div>
</div>