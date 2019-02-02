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

{if isset($blogs)}
	<ul id="blog_list_medium" class="blog_list clearfix">
	{foreach $blogs as $blog}
		<li class="block_blog {if $blog@first}first_item{elseif $blog@last}last_item{/if} clearfix">
            <div class="row">
                <div class="col-12 col-sm-4 col-md-4">
                    {include file="module:stblog/views/templates/front/blogs-list-img.tpl"}
                </div>
                <div class="col-12 col-sm-8 col-md-8">
                    {include file="module:stblog/views/templates/front/blogs-list-info.tpl"}
                </div>
            </div>
		</li>
	{/foreach}
	</ul>
{/if}