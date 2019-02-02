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
{extends file='customer/page.tpl'}
{block name="page_content"}
{foreach $errors AS $error}
<div class="alert alert-warning">
{$error}
</div>
{/foreach}
<div id="stblogcomment">
	<h3 class="page_heading">{l s='Blog comments' d='Shop.Theme.Transformer'}</h3>
	<form method="post" action="{$link->getModuleLink('stblogcomments','mycomments',array(),true)}" id="form_stblogcomments" enctype="multipart/form-data">
		<div class="clearfix mar_b1">
            <div id="avatar_left" class="fl">
                <img src="{$avatar}" class="img-polaroid" alt="{l s='Avatar' d='Shop.Theme.Transformer'}"" />
            </div>
			<div id="avatar_right">
                <div class="form-group">
                  <label class="form-control-label">{l s='Upload a new avatar(JPEG 80x80px)' d='Shop.Theme.Transformer'}:</label>
                  <div class="">
                    <input type="file" id="avatar" name="avatar" class="filestyle" />
                  </div>
                </div>
				<input type="hidden" name="token" value="{$token}" />
                <input type="submit" name="submitAvatar" id="submitAvatar" value="{l s='Upload' d='Shop.Theme.Transformer'}" class="btn btn-default" />
                {if $avatar && !preg_match('/stblogcomments|_default_/', $avatar)}<a href="{$link->getModuleLink('stblogcomments','mycomments',['act'=>'delavatar'])}" class="btn btn-default" title="{l s='Use default' d='Shop.Theme.Transformer'}">{l s='Use default' d='Shop.Theme.Transformer'}</a>{/if}
			</div>
		</div>
	</form>
    {if $comments}
	<h3 class="page_heading">{l s='My Comments' d='Shop.Theme.Transformer'}</h3>
    <ul id="mycomments_list" class="base_list_line medium_list">    
        {foreach $comments as $comment}
        <li class="line_item">
            <p>
                <span class="mar_r6">{dateFormat date=$comment.date_add full=0}</span>
                <span>{l s='On' d='Shop.Theme.Transformer'}&nbsp;<a href="{$link->getModuleLink('stblog', 'article',['id_st_blog'=>$comment['id_st_blog'],'rewrite'=>$comment['link_rewrite']])|escape:'html'}#comments" title="{$comment.name}">{$comment.name|truncate:70:'...'}</a></span>
            </p>
            <div>
                {$comment.content}
            </div>
        </li>
        {/foreach}
    </ul>
    {/if}
</div>
{/block}