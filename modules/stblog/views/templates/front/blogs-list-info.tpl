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
                    <h3 class="s_title_block{if $stblog.length_of_article_name} nohidden{/if}"><a href="{$blog.link}" title="{$blog.name}">{if $stblog.length_of_article_name == 1}{$blog.name}{else}{$blog.name|truncate:70:'...'}{/if}</a></h3>
                    {if $blog.content_short}<p class="blok_blog_short_content">{$blog.content_short|strip_tags:'UTF-8'}<a href="{$blog.link}" title="{l s='Read more' d='Shop.Theme.Transformer'}" class="go">{l s='Read more' d='Shop.Theme.Transformer'}</a></p>{/if}
                    <div class="blog_info">
                        <span class="date-add">{dateFormat date=$blog.date_add full=0}</span>
                        <span class="blog-categories">
                            {foreach $blog.categories as $category}
                                <a href="{$link->getModuleLink('stblog','category',['blog_id_category'=>$category.id_st_blog_category,'rewrite'=>$category.link_rewrite])}">{$category.name|truncate:30:'...'}</a>{if !$category@last},{/if}
                            {/foreach}
                        </span>
                        {hook h='displayAnywhere' function="getCommentNumber" id_st_blog=$blog.id_st_blog link_rewrite=$blog.link_rewrite mod='stblogcomments' caller='stblogcomments'}
                        {if $display_viewcount}<span><i class="icon-eye-2 icon-mar-lr2"></i>{$blog.counter}</span>{/if}
                    </div>