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
<div id="quickview-modal-{$product.id}-{$product.id_product_attribute}" class="modal fade quickview" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
       <button type="button" class="st_modal_close" data-dismiss="modal" aria-label="{l s='Close' d='Shop.Theme'}">
         <span aria-hidden="true">&times;</span>
       </button>
     <div class="modal-body general_border">
      <div class="row product_page_container">
        {assign var=quickview_image_column value=$sttheme.pro_image_column_md}
        {if $sttheme.pro_secondary_column_md}
          {$quickview_image_column=(int)($sttheme.pro_secondary_column_md/2)+$quickview_image_column}
        {/if}
        <div class="col-lg-{$sttheme.pro_image_column_md} mb-3">
          {block name='product_cover_thumbnails'}
            {include file='catalog/_partials/product-cover-thumbnails.tpl'}
          {/block}
        </div>
        <div class="col-lg-{12-$sttheme.pro_image_column_md}">
          <div class="product_name_wrap"><h1 class="product_name">{$product.name}</h1></div>
          {block name='product_prices'}
            {include file='catalog/_partials/product-prices.tpl'}
          {/block}
          {block name='product_description_short'}
            <div id="product-description-short">{$product.description_short nofilter}</div>
          {/block}
          {block name='product_buy'}
            <div class="product-actions">
              <form action="{$urls.pages.cart}" method="post" id="add-to-cart-or-refresh">
                <input type="hidden" name="token" value="{$static_token}">
                <input type="hidden" name="id_product" value="{$product.id}" id="product_page_product_id">
                <input type="hidden" name="id_customization" value="{$product.id_customization}" id="product_customization_id">
                {block name='product_variants'}
                  {include file='catalog/_partials/product-variants.tpl'}
                {/block}

                {block name='product_add_to_cart'}
                  {include file='catalog/_partials/product-add-to-cart.tpl'}
                {/block}
                
                {block name='product_refresh'}
                  <input class="product-refresh hidden" data-url-update="false" name="refresh" type="submit" value="{l s='Refresh' d='Shop.Theme.Actions'}" hidden>
                {/block}
            </form>
          </div>
        {/block}
        {hook h='displayProductAdditionalInfo' product=$product}
        </div>
      </div>
     </div>
   </div>
 </div>
</div>
