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
*  @version  Release: $Revision$
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{strip}
<span class="heading-counter">
{if $nb_products == 0}
{l s='No results were found for your search' d='Shop.Theme.Transformer'}&nbsp;"{$search_tag|escape:'html':'UTF-8'}"
{else}
	{if $nb_products == 1}
		{l s='%d result has been found.' d='Shop.Theme.Transformer' sprintf=$nb_products}
	{else}
		{l s='%d results have been found.' d='Shop.Theme.Transformer' sprintf=$nb_products}
	{/if}
{/if}
</span>
{/strip}