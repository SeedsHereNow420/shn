{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{if isset($products) AND $products}
    {if !isset($pro_per_fw)}{$pro_per_fw=$sttheme["{$for_w}_per_fw"]}{/if}
    {if !isset($pro_per_xxl)}{$pro_per_xxl=$sttheme["{$for_w}_per_xxl"]}{/if}
    {if !isset($pro_per_xl)}{$pro_per_xl=$sttheme["{$for_w}_per_xl"]}{/if}
    {if !isset($pro_per_lg)}{$pro_per_lg=$sttheme["{$for_w}_per_lg"]}{/if}
    {if !isset($pro_per_md)}{$pro_per_md=$sttheme["{$for_w}_per_md"]}{/if}
    {if !isset($pro_per_sm)}{$pro_per_sm=$sttheme["{$for_w}_per_sm"]}{/if}
    {if !isset($pro_per_xs)}{$pro_per_xs=$sttheme["{$for_w}_per_xs"]}{/if}

    <ul class="pro_itemlist row">
    {foreach $products as $product}
        <li class="ajax_block_product {if $pro_per_fw}col-fw-{(12/$pro_per_fw)|replace:'.':'-'}{/if}  {if $pro_per_xxl}col-xxl-{(12/$pro_per_xxl)|replace:'.':'-'}{/if}  {if $pro_per_xl}col-xl-{(12/$pro_per_xl)|replace:'.':'-'}{/if} col-lg-{(12/$pro_per_lg)|replace:'.':'-'} col-md-{(12/$pro_per_md)|replace:'.':'-'} col-sm-{(12/$pro_per_sm)|replace:'.':'-'} col-{(12/$pro_per_xs)|replace:'.':'-'}  {if $pro_per_fw && $product@iteration%$pro_per_fw == 1} first-item-of-screen-line{/if} {if $pro_per_xxl && $product@iteration%$pro_per_xxl == 1} first-item-of-large-line{/if} {if $pro_per_xl && $product@iteration%$pro_per_xl == 1} first-item-of-desktop-line{/if}{if $product@iteration%$pro_per_lg == 1} first-item-of-line{/if}{if $product@iteration%$pro_per_md == 1} first-item-of-tablet-line{/if}{if $product@iteration%$pro_per_sm == 1} first-item-of-mobile-line{/if}{if $product@iteration%$pro_per_xs == 1} first-item-of-portrait-line{/if}">
          {include file="catalog/_partials/miniatures/product-simple.tpl"}
        </li>
    {/foreach}
    </ul>
{else}
    <p class="warning">{l s='No products' d='Shop.Theme.Transformer'}</p>
{/if}