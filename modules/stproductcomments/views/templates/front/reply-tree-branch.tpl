{*
* 2007-2012 PrestaShop
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
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 17677 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<div id="pcomment-{$reply.id_st_product_comment}" class="line_item">
    <div class="mb-2"><span class="font-weight-bold">{if $reply.is_admin}<i class="fto-user mr-1"></i>{/if}{if $reply.customer_name}{$reply.customer_name}{else}{l s='Someone' d='Shop.Theme.Transformer'}-{$reply.id_st_product_comment}{/if}: </span><span class="pc_reply_body">{$reply.content|nl2br nofilter}</span></div>
    <div class="flex_box flex_space_between mb-2 pcomment-for-reply pb-2 general_bottom_border">
            {include file='module:stproductcomments/views/templates/hook/timeago.tpl' timeago=$reply.timeago date_add=$reply.date_add}
        </span>
        <a href="javascript:;" class="btn_product_comment_reply" data-id="{$reply.id_st_product_comment}" title="{l s='Reply' d='Shop.Theme.Transformer'}">{l s='Reply' d='Shop.Theme.Transformer'}</a>
    </div>
    {if isset($reply.child) && $reply.child|@count}
        <div class="pc_reply_child">
        {foreach $reply.child as $comment}
            {include file='module:stproductcomments/views/templates/front/reply-tree-branch.tpl' reply=$comment}
        {/foreach}
        </div>
    {/if}
</div>