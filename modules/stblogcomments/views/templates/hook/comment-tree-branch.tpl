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

<li id="comment-{$node.id_st_blog_comment}" class="line_item">
	<div class="comment_node general_bottom_border clearfix">
        <div class="comment_node_left">
            <img src="{$comment.avatar}" alt="{$node.customer_name}" />
        </div>
        <div class="comment_node_right">
            <p class="comment_node_info">
                <span class="comment-author link_color mar_r6">{$node.customer_name}</span>
                <span class="date-add mar_r6">{dateFormat date=$node.date_add full=0}</span>
                {if $reply_ready}<a href="javascript:;" class="comment_reply_link" data-id-st-blog-comment="{$node.id_st_blog_comment}">{l s='Reply' d='Shop.Theme.Transformer'}</a>{/if}
            </p>
            {$node.content|nl2br}
        </div>
    </div>
	{if $node.child|@count}
		<ul class="comment_child">
        {foreach $node.child as $comment}
			{include file='./comment-tree-branch.tpl' node=$comment reply_ready=$reply_ready}
		{/foreach}
		</ul>
	{/if}
</li>
