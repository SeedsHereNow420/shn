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
{extends file=$layout}

{block name='content'}
  <section id="main" {if $sttheme.google_rich_snippets} itemscope itemtype="http://schema.org/Product" {/if}>
    {if isset($id_st_product_comment) && $id_st_product_comment}

    {include file='module:stproductcomments/views/templates/front/product_info.tpl'}

        <div class="general_top_border pt-3">
            {if $moderate && !$pcomments.comment.validate}
            <div class="alert alert-warning" role="alert" data-alert="warning">{l s='Your comment is awaiting moderation before being published.' d='Shop.Theme.Transformer'}</div>
            {else}
            <div  class="st_product_comment_list base_list_line large_list">
                {include file='module:stproductcomments/views/templates/hook/comment-tree-branch.tpl' node=$pcomments.comment pc_image_size=1}
            </div>
            
            <div id="product_comment_reply_box" class="mb-3 p-2 general_bg">
            <form name="st_product_comment_reply_form">
                <div class="form-group row">
                  <div class="col-md-4">
                      <input type="text" name="customer_name" placeholder="{l s='Enter your name' d='Shop.Theme.Transformer'}" class="form-control" value="{$customerName}" />
                  </div>
                </div>

                <div class="form-group">
                    <textarea name="content" class="form-control content_reply_{$id_st_product_comment}" rows="3"></textarea>
                </div>
                <input type="hidden" name="id_parent" id="product_comment_parent_id" value="{$id_st_product_comment}" />
                {if isset($g_recaptcha) && $g_recaptcha}
                <div class="g-recaptcha" data-sitekey="{$g_recaptcha_key}"></div>
                {/if}
                <div class="clearfix">
                    <input type="submit" name="st_product_comment_reply_submit" class="st_product_comment_reply_submit btn btn-default js-submit-active fr" value="{l s='Submit' d='Shop.Theme.Transformer'}" />
                </div>
            </form>
            </div>
            
                <ul  class="reply_wrap base_list_line line_free">
                {foreach $replies as $reply}
                {include file='module:stproductcomments/views/templates/front/reply-tree-branch.tpl'}
                {/foreach}
                </ul>
                {if count($pagination.pages)>3}
                    {include file='_partials/pagination.tpl' pagination=$pagination is_blog_fengye=1}
                {/if}
            {/if}
        </div>
    {/if}
  </section>
{/block}