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
{extends file=$layout}

{block name='content'}
  <section id="main">

    {block name='product_list_header'}
      <h1 class="page_heading mb-3">{$listing.label}</h1>
    {/block}

    <section id="products">
      {if $listing.products|count}

        {block name='product_list_active_filters'}
          {$listing.rendered_active_filters nofilter}
        {/block}

        {block name='above_product_list'}
          {if isset($listing.rendered_facets) && $sttheme.filter_position}
          <div id="horizontal_filters_wrap">
            <div id="horizontal_filters" class="horizontal_filters{if $sttheme.filter_position==2 || $sttheme.filter_position==3}_dropdown{/if} collapse show" aria-expanded="true">
                {$listing.rendered_facets nofilter}
            </div>
          </div>
          {/if}
        {/block}

        <div id="">
          {block name='product_list_top'}
            {include file='catalog/_partials/products-top.tpl' listing=$listing}
          {/block}
        </div>


        <div id="">
          {block name='product_list'}
            {include file='catalog/_partials/products.tpl' listing=$listing}
          {/block}
        </div>

        <div id="js-product-list-bottom">
          {block name='product_list_bottom'}
            {include file='catalog/_partials/products-bottom.tpl' listing=$listing}
          {/block}
        </div>

      {else}

        <article class="alert alert-warning" role="alert" data-alert="warning">
        {l s='There are no products on the category.' d='Shop.Theme.Transformer'}
        </article>

      {/if}
    </section>

    {block name='product_list_footer'}
    
    {/block}

  </section>
{/block}
