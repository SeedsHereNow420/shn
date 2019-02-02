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
{function name="categories" nodes=[] depth=0}
  {strip}
    {if $nodes|count}
      <ul class="category-sub-menu">
        {foreach from=$nodes item=node}
          <li data-depth="{$depth}">
            <div class="acc_header flex_container">
              <a class="flex_child" href="{url entity='module' name='stblog' controller='category' params=['id_st_blog_category'=>$node.id_st_blog_category,'rewrite'=>$node.link_rewrite]}" title="{$node.name}">{$node.name}</a>
              {if $node.child && count($node.child)}
                <span class="acc_icon collapsed" data-toggle="collapse" data-target="#blog_category_node_{$node.id_st_blog_category}">
                  <i class="fto-plus-2 acc_open fs_xl"></i>
                  <i class="fto-minus acc_close fs_xl"></i>
                </span>
              {/if}
            </div>
            {if $node.child && count($node.child)}
              <div class="collapse" id="blog_category_node_{$node.id_st_blog_category}">
                {categories nodes=$node.child depth=$depth+1}
              </div>
            {/if}
          </li>
        {/foreach}
      </ul>
    {/if}
  {/strip}
{/function}

{if count($categories)}
<div class="st_blog_block_categories block column_block">
  <div class="title_block flex_container title_align_0 title_style_{(int)$stblog.heading_style}">
    <div class="flex_child title_flex_left"></div>
    <div class="title_block_inner">{l s='Blog categories' d='Shop.Theme.Transformer'}</div>
    <div class="flex_child title_flex_right"></div>
  </div>
  <div class="block_content">
    <div class="acc_box category-top-menu">
      {categories nodes=$categories}
    </div>
  </div>
</div>
{/if}