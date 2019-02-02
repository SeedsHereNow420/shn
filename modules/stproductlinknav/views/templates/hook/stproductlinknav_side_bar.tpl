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
{if $nav_products['prev'] || $nav_products['next']}
	{foreach $nav_products as $nav => $product}
		{if $product}
			<div class="product_link_nav rightbar_wrap">
			    <a class="rightbar_tri icon_wrap with_text" href="{$product.url}" title="{if $nav=='prev'}{l s='Previous product' d='Shop.Theme.Transformer'}{/if}{if $nav=='next'}{l s='Next product' d='Shop.Theme.Transformer'}{/if}"><i class="fto-{if $nav=='prev'}left{/if}{if $nav=='next'}right{/if} icon-0x"></i><span class="icon_text">{if $nav=='prev'}{l s='Prev' d='Shop.Theme.Transformer'}{/if}{if $nav=='next'}{l s='Next' d='Shop.Theme.Transformer'}{/if}</span></a>
			</div>
		{/if}
	{/foreach}
{/if}