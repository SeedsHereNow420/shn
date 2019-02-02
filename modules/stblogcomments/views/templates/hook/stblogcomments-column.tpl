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
<section id="st_blog_latest_comments" class="block column_block">
    <div class="title_block flex_container title_align_0 title_style_{(int)$stblog.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner">{l s='Latest Comments' d='Shop.Theme.Transformer'}</div>
        <div class="flex_child title_flex_right"></div>
    </div>
    <div class="block_content">
        {if $latest_comments && count($latest_comments)}
		<ul class="pro_column_list base_list_line medium_list">
            {foreach $latest_comments as $comment}
            <li class="clearfix line_item pro_column_box">
                <div class="pro_column_left">
                <a href="{$link->getModuleLink('stblog', 'article',['id_st_blog'=>$comment['id_st_blog'],'rewrite'=>$comment['link_rewrite']])}" title="{$comment.customer_name}">
                    <img src="{$comment.avatar}" alt="{$comment.customer_name}" />
    			</a>
                </div>
    			<div class="pro_column_right">
    				<h4 class="s_title_block nohidden">{$comment.customer_name}</h4>           			      
                    {l s='on' d='Shop.Theme.Transformer'} <a href="{$link->getModuleLink('stblog', 'article',['id_st_blog'=>$comment['id_st_blog'],'rewrite'=>$comment['link_rewrite']])}" title="{$comment.name}">{$comment.name|truncate:50:'...'}</a>
                </div>
            </li>
            {/foreach}
        </ul>
        {else}
            {l s='No comments' d='Shop.Theme.Transformer'}
        {/if}
	</div>
</section>