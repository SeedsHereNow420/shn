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
<div id="blog_tags_block" class="block tags_block column_block">
    <div class="title_block flex_container title_align_0 title_style_{(int)$stblog.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner">{l s='Tags' d='Shop.Theme.Transformer'}</div>
        <div class="flex_child title_flex_right"></div>
    </div>
	<div class="block_content tags_wrap">
    {if $tags}
        {foreach $tags as $tag}
    		<a href="{url entity='module' name='stblogsearch' controller='default' params=['stb_search_query' => $tag.name]}" title="{l s='More about' d='Shop.Theme.Transformer'} {$tag.name}" class="{$tag.class} {if $tag@last}last_item{elseif $tag@first}first_item{else}item{/if}">{$tag.name}</a>
    	{/foreach}
    {else}
    	{l s='No tags' d='Shop.Theme.Transformer'}
    {/if}
	</div>
</div>