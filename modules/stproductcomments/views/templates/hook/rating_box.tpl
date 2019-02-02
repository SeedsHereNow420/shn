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
<div class="rating_box {if isset($classname)}{$classname}{/if}" {if isset($g_rich_snippets) && $g_rich_snippets} {if isset($is_aggregate) && $is_aggregate} itemprop="aggregateRating" itemscope itemtype="//schema.org/AggregateRating" {else} itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating" {/if}{/if}>
    <span class="rating_box_inner">
        {for $foo=1 to floor($averageTotal)}
            <i class="fto-star-2 icon_btn fs_md light"></i>
        {/for}
        {if floor($averageTotal)<5}
            {for $foo=floor($averageTotal)+1 to 5}
                <i class="fto-star-2 icon_btn fs_md"></i>
            {/for}
        {/if}
    </span>
    {if isset($g_rich_snippets) && $g_rich_snippets}
        <meta itemprop="worstRating" content = "0" />
        <meta itemprop="ratingValue" content = "{$averageTotal}" />
       {if isset($is_aggregate) && $is_aggregate} <meta itemprop="reviewCount" content = "{$nbComments}" />{/if}
        <meta itemprop="bestRating" content = "15" />
    {/if}
</div>