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

<li {if isset($last) && $last == 'true'}class="last"{/if}>
	<a href="{$link->getModuleLink('stblog','category',['blog_id_category'=>$node.id_st_blog_category,'rewrite'=>$node.link_rewrite])|escape:'html'}" {if isset($currentCategoryId) && $node.id_st_blog_category == $currentCategoryId}class="selected"{/if} title="{$node.name}">{$node.name|truncate:30:'...'}</a>
	{if $node.child|@count > 0}
		<ul>
        {foreach $node.child as $category}
			{if $category@last}
				{include file='./category-tree-branch.tpl' node=$category last='true'}
			{else}
				{include file='./category-tree-branch.tpl' node=$category}
			{/if}
		{/foreach}
		</ul>
	{/if}
</li>
