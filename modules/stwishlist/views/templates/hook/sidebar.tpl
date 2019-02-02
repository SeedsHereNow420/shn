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
<nav class="st-menu" id="side_wishlist">
    <div class="st-menu-header">
        <h3 class="st-menu-title">{l s='Wishlist' d='Shop.Theme.Transformer'}</h3>
        <a href="javascript:;" class="close_right_side" title="{l s='Close' d='Shop.Theme.Transformer'}"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
    </div>
    <div id="side_wishlist_block" class="pad_10">
        <h3 class="page_heading">{l s='Save to wishlist' d='Shop.Theme.Transformer'}</h3>
        <ul id="select_wishlist" class="base_list_line">
        {if isset($wishlists) && count($wishlists)}
        {foreach $wishlists as $wishlist}
            {include file='module:stwishlist/views/templates/hook/item.tpl' id_st_wishlist=$wishlist.id_st_wishlist wishlist_name=$wishlist.name wishlist_total=$wishlist.total}
        {/foreach}
        {/if}
        </ul>
        <div class="form-group form-group-small m-t-1">
            <div class="input-group">
              <input
                      class="form-control"
                      name="name"
                      type="text"
                      placeholder="{l s='Create a wishlist' d='Shop.Theme.Transformer'}"
                      value="" />
              <span class="input-group-btn">
                <button
                  class="btn_send btn btn-default btn-spin"
                  type="submit"
                  id="side_wishlist_submit"
                >
                   <i class="fto-plus-2"></i>{l s='Create' d='Shop.Theme.Transformer'}
                </button>
              </span>
            </div>
        </div>
    </div>
</nav>