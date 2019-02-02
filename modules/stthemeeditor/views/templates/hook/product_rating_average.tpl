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
<div class="rating_box" itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
	<span class="rating_box_inner">
		{for $foo=1 to round($ratingAverage)}
		    <i class="icon-star-2 icon-small light"></i>
		{/for}
		{if round($ratingAverage)<5}
		    {for $foo=round($ratingAverage)+1 to 5}
		        <i class="icon-star-2 icon-small"></i>
		    {/for}
		{/if}
	</span>
	<meta itemprop="worstRating" content = "0" />
	<meta itemprop="ratingValue" content = "{if isset($ratings.avg)}{$ratings.avg|round:1|escape:'html':'UTF-8'}{else}{$ratingAverage|round:1|escape:'html':'UTF-8'}{/if}" />
	<meta itemprop="bestRating" content = "5" />
	{if isset($commentNbr) && $commentNbr}<span class="comment_nbr">{$commentNbr} {if $commentNbr>1}{l s='Reviews' d='Shop.Theme.Transformer'}{else}{l s='Review' d='Shop.Theme.Transformer'}{/if}</span>{/if}
</div>