{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{extends file='catalog/listing/product-list.tpl'}

{block name='product_list_header'}
      {if $sttheme.display_category_title}<h1 class="page_heading mb-3 {if $sttheme.display_category_title==2} text-2 {elseif $sttheme.display_category_title==3} text-3 {else} text-1 {/if}">{$category.name}</h1>{/if}

      {hook h='displayCategoryHeader'}

      {if $sttheme.display_category_image && $category.image.bySize.category_default.url}
      <div class="category-cover mb-3">
        <img src="{$category.image.bySize.category_default.url}" {if $sttheme.retina && isset($category.image.bySize.category_default_2x.url)} srcset="{$category.image.bySize.category_default_2x.url} 2x" {/if} alt="{$category.image.legend}">
      </div>
      {/if}
      {if $sttheme.display_cate_desc_full==1 && $category.description}
        <div id="category-description" class="style_content mb-3">{$category.description nofilter}</div>
      {/if}
      {if $sttheme.display_subcate && $subcategories}
        <div id="subcategories">
            <h3 class="page_heading mb-3 hidden">{l s='Subcategories' d='Shop.Theme.Transformer'}</h3>
            <ul class="inline_list {if $sttheme.display_subcate==1 || $sttheme.display_subcate==3} subcate_grid_view row {else} subcate_list_view {/if}">
            {foreach $subcategories as $subcategory}
                <li class="clearfix {if $sttheme.display_subcate==1 || $sttheme.display_subcate==3} {if $sttheme.categories_per_fw} col-fw-{(12/$sttheme.categories_per_fw)|replace:'.':'-'}{/if} {if $sttheme.categories_per_xxl} col-xxl-{(12/$sttheme.categories_per_xxl)|replace:'.':'-'}{/if} {if $sttheme.categories_per_xl} col-xl-{(12/$sttheme.categories_per_xl)|replace:'.':'-'}{/if} col-lg-{(12/$sttheme.categories_per_lg)|replace:'.':'-'} col-md-{(12/$sttheme.categories_per_md)|replace:'.':'-'} col-sm-{(12/$sttheme.categories_per_sm)|replace:'.':'-'} col-{(12/$sttheme.categories_per_xs)|replace:'.':'-'} {if $sttheme.categories_per_fw && $smarty.foreach.subcategories.iteration%$sttheme.categories_per_fw == 1} first-item-of-screen-line{/if}{if $sttheme.categories_per_xxl &&  $smarty.foreach.subcategories.iteration%$sttheme.categories_per_xxl == 1} first-item-of-large-line{/if}{if $sttheme.categories_per_xl && $smarty.foreach.subcategories.iteration%$sttheme.categories_per_xl == 1} first-item-of-desktop-line{/if}{if $smarty.foreach.subcategories.iteration%$sttheme.categories_per_lg == 1} first-item-of-line{/if}{if $smarty.foreach.subcategories.iteration%$sttheme.categories_per_md == 1} first-item-of-tablet-line{/if}{if $smarty.foreach.subcategories.iteration%$sttheme.categories_per_sm == 1} first-item-of-mobile-line{/if}{if $smarty.foreach.subcategories.iteration%$sttheme.categories_per_xs == 1} first-item-of-portrait-line{/if} {/if}">
                    <a href="{$subcategory.url}" title="{$subcategory.name}" class="img">
                        <img src="{$subcategory.image.bySize.category_default.url}" {if $sttheme.retina && isset($subcategory.image.bySize.category_default_2x.url)} srcset="{$subcategory.image.bySize.category_default_2x.url} 2x" {/if} alt="{$subcategory.name}" width="{$subcategory.image.bySize.category_default.width}" height="{$subcategory.image.bySize.category_default.height}" />
                    </a>
                    <h3 class="s_title_block {if $sttheme.display_subcate==3} nohidden {/if}"><a class="subcategory-name" href="{$subcategory.url}" title="{$subcategory.name}">{$subcategory.name}</a></h3>
                    {if $subcategory.description}
                        <div class="subcat_desc">{$subcategory.description}</div>
                    {/if}
                </li>
            {/foreach}
            </ul>
        </div>
      {/if}
{/block}
{block name='product_list_footer'}
  {if $sttheme.display_cate_desc_full==2 && $category.description}
    <div id="category-description" class="style_content mb-3">{$category.description nofilter}</div>
  {/if}
  {hook h='displayCategoryFooter'}
{/block}