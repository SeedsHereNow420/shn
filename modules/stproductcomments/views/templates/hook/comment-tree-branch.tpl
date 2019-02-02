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

<div id="pcomment-{$node.id_st_product_comment}" class="line_item">
    <div class="flex_container flex_column_md flex_start px-2 pcomment-for-reply" {if $pcomments.g_rich_snippets} itemprop="review" itemscope itemtype="https://schema.org/Review"{/if}>
        <div class="pcomment_left">
            <div class="pcomment_author font-weight-bold pcomment_left_item" {if $pcomments.g_rich_snippets} itemprop="author"{/if}>{$node.customer_name}</div>
            {include file='module:stproductcomments/views/templates/hook/rating_box.tpl' averageTotal=$node.grade classname="pcomment_left_item mar_b6" g_rich_snippets=$pcomments.g_rich_snippets}
        </div>
        <div class="pcomment_right flex_child">
            <div class="pcomment_body mb-2" {if $pcomments.g_rich_snippets} itemprop="reviewBody"{/if}>{$node.content|nl2br nofilter}</div>

            {if $node.tags}
            <div class="tags_block mb-2">
                {foreach $node.tags as $tag}
                <span class="tag_item">{$tag.name nofilter}</span>
                {/foreach}
            </div>
            {/if}
            
            {if isset($node.images) && count($node.images)}
            <div class="pcomment_image mb-2">
            {foreach $node.images AS $image}
            <a href="{$image}" class="{if isset($pc_image_size)}pcomments_images_large{else}pcomments_images_small{/if} mr-2 mb-1 st_popup_image inline_block" title="{l s='Click to zoom out' d='Shop.Theme.Transformer'}" rel="nofollow" data-group="pcomments_{$node.id_st_product_comment}"><img src="{$image}" class="general_border" alt="{l s='Click to zoom out' d='Shop.Theme.Transformer'}" /></a>
            {/foreach}
            </div>
            {/if}


            <div class="flex_box">
                <div class="pcomment_rbl flex_child mb-1">
                    {if !isset($pcomments.in_detail)}
                    {if isset($pcomments.id_product) && $pcomments.id_product && $node.product_attr_name}
                        <span class="pcomment_attr_name mr-2">
                            {$node.product_attr_name}
                        </span>
                    {else}
                        <a class="pcomment_product_name mr-2" href="{$node.product_link}" title="{$node.product_name_full}">{$node.product_name_full}</a>
                    {/if}
                    {/if}
                    {if $pcomments.g_rich_snippets}
                    <meta itemprop="datePublished" content="{dateFormat date=$node.date_add full=0}" />
                    {/if}
                    <span class="date-add">
                        {include file='module:stproductcomments/views/templates/hook/timeago.tpl' timeago=$node.timeago date_add=$node.date_add}
                    </span>
                </div>
                <div class="pcomment_rbr mb-1">
                    {if !isset($node.customer_report) || !$node.customer_report}
                    <a href="javascript:;" class="report_btn btn-spin js-btn-active mr-2 text_color" data-id-st-product-comment="{$node.id_st_product_comment}" title="{l s='Report abuse' d='Shop.Theme.Transformer'}" rel="nofollow">{l s='Report abuse' d='Shop.Theme.Transformer'}</a>
                    {/if}
                    {if $pcomments.helpful!=2}
                        <span class="mr-1">{l s='Helpful?' d='Shop.Theme.Transformer'}</span>
                        {if isset($node.customer_advice) && $node.customer_advice}
                        <span class="mr-2">
                        {else}
                        <a href="javascript:;" class="usefulness_btn btn-spin js-btn-active mr-2" data-is-usefull="1" data-id-st-product-comment="{$node.id_st_product_comment}" title="{l s='Yes' d='Shop.Theme.Transformer'}" rel="nofollow">
                        {/if}
                        <i class="fto-thumbs-up fs_md mr-1"></i><span>{$node.total_useful}</span>
                        {if isset($node.customer_advice) && $node.customer_advice}</span>{else}</a>{/if}

                        {if $pcomments.helpful!=1}
                            {if isset($node.customer_advice) && $node.customer_advice}
                            <span class="mr-2">
                            {else}
                            <a href="javascript:;" class="usefulness_btn btn-spin js-btn-active mr-2" data-is-usefull="0" data-id-st-product-comment="{$node.id_st_product_comment}" title="{l s='No' d='Shop.Theme.Transformer'}" rel="nofollow">
                            {/if}
                            <i class="fto-thumbs-down fs_md mr-1"></i><span>{$node.total_advice-$node.total_useful}</span>
                            {if isset($node.customer_advice) && $node.customer_advice}</span>{else}</a>{/if}
                        {/if}
                    {/if}
                    <a href="{url entity='module' name='stproductcomments' controller='detail' params=['id_st_product_comment' => $node.id_st_product_comment]}" class="flex_float_right {if isset($pcomments.in_detail)} btn_product_comment_reply {/if}" title="{l s='Comments' d='Shop.Theme.Transformer'}" rel="nofollow" data-id="{$node.id_st_product_comment}"><i class="fto-commenting-o fs_md mr-1"></i>{$node.total_reply}</a>
                </div>
            </div>
        </div>
    </div>
    {if isset($node.child) && $node.child|@count}
        <div class="pcomment_child">
        {foreach $node.child as $comment}
            {include file='module:stproductcomments/views/templates/hook/comment-tree-branch.tpl' node=$comment}
        {/foreach}
        </div>
    {/if}
</div>
