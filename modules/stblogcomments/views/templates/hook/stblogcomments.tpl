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
{if $nbComments}
<section id="comments" class="block section">
    <div class="title_block flex_container title_align_0 title_style_{(int)$stblog.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner">{$nbComments}&nbsp;{if $nbComments<=1}{l s='Comment' d='Shop.Theme.Transformer'}{else}{l s='Comments' d='Shop.Theme.Transformer'}{/if}</div>
        <div class="flex_child title_flex_right"></div>
    </div>
	<ul class="st_blog_comment_list base_list_line medium_list line_free">
		{foreach $comments as $comment}
			{include file='./comment-tree-branch.tpl' node=$comment reply_ready=($too_early == false AND ($logged OR $allow_guests)) }
        {/foreach}
    </ul>
</section>
{/if}	
<section id="st_blog_comment_reply_block" class="block section">
    <div class="title_block flex_container title_align_0 title_style_{(int)$stblog.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <div id="stblog_leave_a_comment" class="title_block_inner">{l s='Leave a Comment' d='Shop.Theme.Transformer'}</div>
        <div id="stblog_leave_a_reply" class="title_block_inner">{l s='Leave a Reply' d='Shop.Theme.Transformer'}</div>
        <div class="flex_child title_flex_right"></div>
    </div>
	<div class="st_blog_comment_reply">
        {if ($too_early == false AND ($logged OR $allow_guests))}
        <form name="st_blog_comment_form" action="{$link->getModuleLink('stblogcomments','default',['action'=>'add_comment','secure_key'=>$secure_key])}">
            {if $allow_guests == true && $logged == 0}
            <div id="comment_input" class="row">
                <p class="col-4"><input name="customer_name" type="text" class="form-control" placeholder="{l s='Name (required)' d='Shop.Theme.Transformer'}" value="" /></p>
                <p class="col-4"><input name="customer_email" type="text" class="form-control" placeholder="{l s='Email' d='Shop.Theme.Transformer'}" value="" /></p>
            </div>
            {/if}
            <div id="comment_textarea" class="row">
                <div class="col-8">
                <textarea id="comment_content" name="content" rows="30" cols="6" class="form-control" autocomplete="off"></textarea>
                </div>
            </div>
            <input name="id_st_blog" type="hidden" value="{$id_st_blog_comment_form}" />
            <input id="blog_comment_parent_id" name="id_parent" type="hidden" value="0" />
            <div>
                <input type="submit" name="st_blog_comment_submit" id="st_blog_comment_submit" value="{l s='Post comment' d='Shop.Theme.Transformer'}" class="btn btn-default mar_r4" />
                <a href="javascript:;" id="cancel_comment_reply_link" class="go hidden">{l s='Cancel reply' d='Shop.Theme.Transformer'}</a>
            </div>
        </form>
        {elseif ($too_early == false AND !$logged AND !$allow_guests) }
        {l
            s='Please [1]login[/1] to post a comment.'
            d='Shop.Theme.Transformer'
            sprintf=[
              '[1]' => '<a href="'|cat:$link->getPageLink('my-account', true)|cat:'" rel="nofollow" title="" class="go">',
              '[/1]' => '</a>'
            ]
          }
        {elseif $too_early == true}
        {l s='You should wait %delay% seconds before posting a new comment.' sprintf=['%delay%' => $delay] d='Shop.Theme.Transformer'}
        {/if}
    </div>
</section>