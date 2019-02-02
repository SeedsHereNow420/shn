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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="af-basic-layout">
	<div class="content_sortPagiBar clearfix">
		<div class="top-pagination-content clearfix">
			{include file="{$tpl_dir}product-compare.tpl"}
			<div id="{$af_ids['pagination']|escape:'html':'UTF-8'}"></div>
		</div>
	</div>
	<div class="af_pl_wrapper">
		<ul class="product_list grid row {$product_list_class|escape:'html':'UTF-8'}"></ul>
	</div>
	<div class="content_sortPagiBar">
		<div class="bottom-pagination-content clearfix">
			{include file="{$tpl_dir}product-compare.tpl" paginationId='bottom'}
			<div id="{$af_ids['pagination_bottom']|escape:'html':'UTF-8'}"></div>
		</div>
	</div>
</div>
