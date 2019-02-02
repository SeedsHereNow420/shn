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

{if count($comments)}
<ul>
{foreach $comments AS $comment}
{if $comment.content}
<li id="comment-{$comment.id_st_product_comment}" class="line_item"{if $g_rich_snippets} itemprop="review" itemscope itemtype="https://schema.org/Review"{/if}>
	<div class="comment_node general_bottom_border clearfix">
        <div class="comment_node_left">
            <span{if $g_rich_snippets} itemprop="author"{/if}>{$comment.customer_name}</span>			
            {if isset($comment.product)}
            <a href="{$comment.product.link}"><img src="{$comment.product.images.0.bySize.home_default.url}" width="{$comment.product.images.0.bySize.home_default.width}" height="{$comment.product.images.0.bySize.home_default.height}" alt="{$comment.product.name}" /></a>
            {/if}
        </div>
        <div class="comment_node_right">
            <p class="comment_node_info">
                <div class="star_content clearfix"{if $g_rich_snippets} itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating"{/if}>
    			{section name="i" start=0 loop=5 step=1}
    				{if $comment.grade le $smarty.section.i.index}
    					<div class="star"></div>
    				{else}
    					<div class="star star_on"></div>
    				{/if}
    			{/section}
                {if $g_rich_snippets}
                <meta itemprop="worstRating" content = "0" />
				<meta itemprop="ratingValue" content = "{$comment.grade}" />
				<meta itemprop="bestRating" content = "15" />
                {/if}
    			</div>
                {if $g_rich_snippets}
                <meta itemprop="datePublished" content="{dateFormat date=$comment.date_add full=0}" />
                {/if}
                <span class="date-add mar_r6">{dateFormat date=$comment.date_add full=0}</span>
            </p>
            <p{if $g_rich_snippets} itemprop="reviewBody"{/if}>{$comment.content|nl2br nofilter}</p>
            {if $comment.image}<a href="javascript:;" class="st-product-comment-image"><img src="{$image_path}{$comment.image}" width="100" /></a>{/if}
        </div>
    </div>
</li>
{/if}
{/foreach}
</ul>
{else}
<div class="alert alert-warning" role="alert" data-alert="warning">{l s='No comments' d='Shop.Theme.Transformer'}</div>
{/if}