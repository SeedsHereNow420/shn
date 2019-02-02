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
<div class="row mb-3">
    <div class="col-md-8">
        <div class="flex_container flex_start">
            <div class="mr-2">
              <img src="{$product.cover.bySize.small_default.url}" {if $sttheme.google_rich_snippets} itemprop="image" {/if} width="{$product.cover.bySize.small_default.width}" height="{$product.cover.bySize.small_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" class="general_border" />
            </div>
            <div class="flex_child">
              <div>
                <h1 {if $sttheme.google_rich_snippets} itemprop="name" {/if} class="s_title_block nohidden"><a href="{$product.url}" title="{$product.name}" {if $sttheme.google_rich_snippets} itemprop="url" {/if}>{$product.name}</a></h1>
                {if $product.attributes}
                <div class="mb-1">
                {foreach $product.attributes as $attribute}
                    {$attribute.group}: {$attribute.name}{if !$attribute@last} - {/if}
                {/foreach}
                </div>
                {/if}

                {if $product.show_price}
                  <div class="mb-1" {if $sttheme.google_rich_snippets} itemprop="offers" itemscope itemtype="https://schema.org/Offer" {/if}>
                    {if $sttheme.google_rich_snippets}<meta itemprop="priceCurrency" content="{$sttheme.currency_iso_code}">{/if}
                    <span {if $sttheme.google_rich_snippets} itemprop="price" {/if} class="price" content="{$product.price_amount}">{$product.price}</span>
                    {if $product.has_discount}
                      <span class="regular-price">{$product.regular_price}</span>
                      {if !$sttheme.hide_discount}
                      {if $product.discount_type === 'percentage'}
                        <span class="discount discount-percentage">{$product.discount_percentage}</span>
                      {else}
                        <span class="discount discount-amount">-{$product.discount_to_display}</span>
                      {/if}
                      {/if}
                    {/if}
                  </div>
                {/if}
              </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-2 flex_box flex_left">
            <span class="mr-2">{l s='Overall rating' d='Shop.Theme.Transformer'}</span>
            {include file='module:stproductcomments/views/templates/hook/rating_box.tpl' g_rich_snippets=$pcomments.g_rich_snippets is_aggregate=1 classname="mr-2"}
            <div class="fs_lg mr-2 pr-2 general_right_border">{$averageTotal}</div>
            <a href="{url entity='module' name='stproductcomments' controller='list' params=['id_product' => $product.id_product]}" title="{l s='View all reviews' d='Shop.Theme.Transformer'}" class="mr-2">{$nbComments} {if $nbComments==1}{l s='Review' d='Shop.Theme.Transformer'}{else}{l s='Reviews' d='Shop.Theme.Transformer'}{/if}</a>
        </div>

        {include file='module:stproductcomments/views/templates/hook/averages.tpl'}
    </div>
    </div>