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
*  @author    SeoSA <885588@bk.ru>
*  @copyright 2012-2017 SeoSA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if isset($display_multishop_checkboxes) && $display_multishop_checkboxes}
	<label style="float: none">
		<input type="checkbox" style="vertical-align: text-bottom" onclick="$('#product-tab-content-{$product_tab|escape:'quotes':'UTF-8'} input[name^=\'multishop_check[\']').attr('checked', this.checked); ProductMultishop.checkAll{$product_tab|escape:'quotes':'UTF-8'}()" />
		{l s='Check/uncheck all. (If you are editing this page for several shops, some fields like "name" or "price" are may be disabled. You will need check these fields in order to edit them)' mod='dgridproducts'}
	</label>
{/if}