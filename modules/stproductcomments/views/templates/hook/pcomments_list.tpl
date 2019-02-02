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
<div id="js_pcomments_list" {if isset($pcomment_link)} data-url="{$pcomment_link}" {/if}>
    {if isset($pcomments)}
    <div  class="st_product_comment_list base_list_line large_list">
        {if count($pcomments.comments) }
          {foreach $pcomments.comments as $comment}
          	{include file='module:stproductcomments/views/templates/hook/comment-tree-branch.tpl' node=$comment}
          {/foreach}
        {else}
            <div class="alert alert-warning" role="alert" data-alert="warning">
              {l s='No comments' d='Shop.Theme.Transformer'}
            </div>
        {/if}
    </div>
      {if count($pcomments.pagination.pages)>3}
        {assign var='is_blog_fengye' value=true}
        {if $pcomments.id_product}{$is_blog_fengye=2}{/if}
        {include file='_partials/pagination.tpl' pagination=$pcomments.pagination is_blog_fengye=$is_blog_fengye}
      {/if}
    {/if}
</div>