{*
* 2007-2015 PrestaShop
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
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{extends file='customer/page.tpl'}
{block name="page_content"}
	{if $id_customer|intval neq 0}
        {if !$id_st_wishlist}
    <h3 class="page_heading">{l s='My wishlists' d='Shop.Theme.Transformer'}</h3>
		<form method="post" class="m-b-1 form_wishlist">
            <div class="form-group form-group-small ">
                <label>{l s='Create a wishlist' d='Shop.Theme.Transformer'}</label>
                <div class="input-group">
                  <input
                          class="form-control"
                          name="name"
                          type="text"
                          value="" />
                  <span class="input-group-btn">
                    <button
                      class="btn_send btn btn-default js-submit-active"
                      type="submit"
                      name="submitWishlist" 
                      id="submitWishlist"
                    >
                      <i class="fto-plus-2"></i>{l s='Create' d='Shop.Theme.Transformer'}
                    </button>
                  </span>
                </div>
            </div>
		</form>

        {if isset($wishlists) && count($wishlists)}
        <ul class="wishlist_list li_fl clearfix block">
        {foreach $wishlists AS $wishlist}
            <li class="wishlist_item">
                <div class="wishlist_cover general_border mar_b1">
                  <a href="{$link->getModuleLink('stwishlist', 'mywishlist', ['id_st_wishlist'=>$wishlist['id_st_wishlist']], true)}" title="{$wishlist['name']}">
                  {if isset($wishlist['cover']) && $wishlist['cover']}
                  <img src="{$wishlist['cover']['url']}" width="{$wishlist['cover']['width']}" height="{$wishlist['cover']['height']}" alt="{$wishlist['name']}" />
                  {else}
                  <img src="{$sttheme.img_prod_url}{$sttheme.lang_iso_code}-default-home_default.jpg" width="{$sttheme.home_default.width}" height="{$sttheme.home_default.height}" alt="{$wishlist['name']}" />
                  {/if}
                  </a>
                </div>
                <div class="wishlist_title_box flex_container">
                    <div class="wishlist_title mar_r6"><a href="{$link->getModuleLink('stwishlist', 'mywishlist', ['id_st_wishlist'=>$wishlist['id_st_wishlist']], true)}" title="{$wishlist['name']}">{$wishlist['name']}</a></div>
                    <div class="flex_child">({count($wishlist['products'])})</div>
                    <a href="{$link->getModuleLink('stwishlist', 'mywishlist', ['delete'=>true,'id_st_wishlist'=>$wishlist['id_st_wishlist']], true)}" title="{l s='Delete wishlist' d='Shop.Theme.Transformer'}"><i class="fto-cancel"></i></a>{*use url function*}
                </div>
            </li>
        {/foreach}
        </ul>
        {/if}
        {else}
        {if isset($wishlists) && count($wishlists)}
		{foreach $wishlists AS $wishlist}
        <h3 class="page_heading">{$wishlist['name']}</h3>
        <div class="flex_container m-b-1">
            <input type="text" name="wishlist_{$wishlist['id_st_wishlist']}" class="form-control flex_child" size="60" value="{$link->getModuleLink('stwishlist', 'view', ['token'=>$wishlist['token']], true)}" />
            <a href="javascript:;" class="btn btn-default copy_wishlist_link" title="{l s='Copy link' d='Shop.Theme.Transformer'}">{l s='Copy link' d='Shop.Theme.Transformer'}</a>
        </div>
        <div class="form-group form-group-small ">
            <label>{l s='Share with a friend' d='Shop.Theme.Transformer'}</label>
            <div class="input-group">
              <input class="form-control" type="text" name="email" id="email_{$wishlist['id_st_wishlist']}" value="" size="40" placeholder="{l s='Email address' d='Shop.Theme.Transformer'}" />
              <span class="input-group-btn">
                <button
                  class="btn_send btn btn-default btn-spin wishlist_share_email"
                  type="button"
                  data-id-wishlist="{$wishlist['id_st_wishlist']}"
                >
                    <i class="fto-mail-alt mar_r4"></i>
                    {l s='Send' d='Shop.Theme.Transformer'}
                </button>
              </span>
            </div>
        </div>
        <ul class="com_grid_view row">
            {foreach $wishlist['products'] as $product}
            <li class="wishlist_product_item p-b-1 col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 {if !($product@index%2)} first-item-of-large-line  first-item-of-desktop-line first-item-of-line first-item-of-tablet-line {/if}" data-id_wishlist="{$product['wl_id_st_wishlist']}" data-id_product="{$product['wl_id_product']}" data-id_product_attribute="{if isset($product['wl_id_product_attribute']) && $product['wl_id_product_attribute']}{$product['wl_id_product_attribute']}{/if}">
            <div class="pro_simple_box clearfix">
                <div class="itemlist_left">
                    <a class="product_image" href="{$product.url}" title="{$product.name}"><img src="{$product.cover.bySize.home_default.url}" {if $sttheme.retina && isset($product.cover.bySize.home_default_2x.url)} srcset="{$product.cover.bySize.home_default_2x.url} 2x" {/if} width="{$product.cover.bySize.home_default.width}" height="{$product.cover.bySize.home_default.height}" alt="{if !empty($product.cover.legend)}{$product.cover.legend}{else}{$product.name}{/if}" /></a>
                </div>
                <div class="itemlist_right">
                    <h3 class="s_title_block"><a href="{$product.url}" title="{$product.name}">{$product.name}</a></h3>
                    {foreach $product['wl_attribute'] AS $attr}
                    <div class="small_cart_attr">
                          <span class="small_cart_attr_k">{$attr['group']}</span>:<span>{$attr['name']}</span>
                      </div>
                    {/foreach}
                    <div class="mar_t1 mar_b1">
                        <div class="s_quantity_wanted qty_wrap">
                            <input
                                class="pro_quantity"
                                type="text"
                                value="{$product['wl_quantity']}"
                                name="quantity"
                              />
                        </div>
                        <a href="javascript:;" class="btn btn-default btn-spin wishlist_update_quantity" title="{l s='Save' d='Shop.Theme.Transformer'}"><i class="fto-ok-1 hidden mar_r4"></i>{l s='Save' d='Shop.Theme.Transformer'}</a>   
                    </div>
                    <a href="javascript:;" title="{l s='Delete' d='Shop.Theme.Transformer'}" class="btn-spin wishlist_remove_product" rel="nofollow"><i class="fto-cancel mar_r4"></i>{l s='Delete' d='Shop.Theme.Transformer'}</a>
                </div>
            </div>
            </li>
            {/foreach}
        </ul>
        {/foreach}
            <p><a class="btn btn-default" href="{$link->getModuleLink('stwishlist', 'mywishlist', array(), true)}" title="{l s='Back to wishlists' d='Shop.Theme.Transformer'}">{l s='Back to wishlists' d='Shop.Theme.Transformer'}</a></p>
        {/if}
      {/if}
	{/if}
{/block}