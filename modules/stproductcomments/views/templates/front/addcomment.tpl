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
{extends file='customer/page.tpl'}
{block name="page_content"}
<section id="st_product_comment_reply_block" class="block">
    <div class="flex_container flex_start mb-3">
        <div class="mr-2">
          <img src="{$order.product.cover.bySize.small_default.url}" width="{$order.product.cover.bySize.small_default.width}" height="{$order.product.cover.bySize.small_default.height}" alt="{$order.product.product_name}" class="general_border" />
        </div>
        <div class="flex_child">
          <div>
            <p class="font-weight-bold">{$order.product.product_name}</p>
            <div class="mb-1">{l s='Quantity' d='Shop.Theme.Transformer'}: {$order.product.quantity}</div>
            <div class="mb-1">{l s='Order reference' d='Shop.Theme.Transformer'}: <a href="{$link->getPageLink('order-detail', null, null, ['id_order'=>$order.id])}">{$order.reference}</a></div>
            <div>{l s='Date' d='Shop.Theme.Transformer'}: {dateFormat date=$order.date_add full=0}</div>
          </div>
        </div>
    </div>
    {if $comment|is_array && $comment|count}
    <div>
        {l s='You have commented on the product.' d='Shop.Theme.Transformer'}
        <a href="{$link->getModuleLink('stproductcomments','mycomments',['secure_key'=>$secure_key, 'view_comment'=>1, 'id_order'=>$id_order,'id_product'=>$id_product])}">{l s='view my comment' d='Shop.Theme.Transformer'}</a>
    </div>
    {else}
	  <div class="st_product_comment_reply">
        {if $customer.is_logged && !$customer.is_guest}
        <form name="st_product_comment_form" method="post" action="{$link->getModuleLink('stproductcomments','mycomments',['secure_key'=>$secure_key])}">
            {if $criterions|@count > 0}
				<ul class="criterions_list li_fl clearfix">
        {foreach from=$criterions item='criterion'}
          <li class="flex_container flex_left mr-5">
            <span class="criterion_name mr-2">{$criterion.name}:</span>
            <div class="star_content clearfix">
							<input class="star" type="radio" name="criterion[{$criterion.id_st_product_comment_criterion|round}]" value="1" />
							<input class="star" type="radio" name="criterion[{$criterion.id_st_product_comment_criterion|round}]" value="2" />
							<input class="star" type="radio" name="criterion[{$criterion.id_st_product_comment_criterion|round}]" value="3" />
							<input class="star" type="radio" name="criterion[{$criterion.id_st_product_comment_criterion|round}]" value="4" />
							<input class="star" type="radio" name="criterion[{$criterion.id_st_product_comment_criterion|round}]" value="5" checked="checked" />
						</div>
					</li>
				{/foreach}
				</ul>
			{/if}
            <div class="form-group row mb-3">
              <label class="col-md-2 form-control-label required">
                {l s='Describe it:' d='Shop.Theme.Transformer'}
              </label>
              <div class="col-md-8 tag-wrap">
                <input type="text" name="tags" placeholder="{l s='Use a comma to seperate words.' d='Shop.Theme.Transformer'}" class="tm-input form-control"/>
                <div>{l s='Describe this product using simple and short words.' d='Shop.Theme.Transformer'}</div>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-md-2 form-control-label">
                {l s='Review(required):' d='Shop.Theme.Transformer'}
              </label>
              <div class="col-md-8">
                <textarea id="comment_content" name="content" rows="6" class="form-control" autocomplete="off"></textarea>
              </div>
            </div>


            <div class="form-group row">
              <div class="col-md-2">{l s='Upload images:' d='Shop.Theme.Transformer'}</div>
              <div class="col-md-8">
                {if isset($upload_image) && $upload_image}
                <div class="st-dropzone" id="st_product_comment_uploader">
                  <div class="dz-message needsclick">
                    {l s='Drop images here or click to upload.' d='Shop.Theme.Transformer'}
                  </div>
                </div>
                <input name="image" type="hidden" value="" />
                {/if}
                <input name="id_product" type="hidden" value="{$id_product}" />
                <input name="id_order_detail" type="hidden" value="{$order.product.id_order_detail}" />
                <input name="id_order" type="hidden" value="{$id_order}" />
                <input name="id_parent" type="hidden" value="0" />
                <input name="SaveComment" type="hidden" value="1" />
                <div>
                    <input type="submit" name="st_product_comment_submit" id="st_product_comment_submit" value="{l s='Post comment' d='Shop.Theme.Transformer'}" class="btn btn-default mar_r4" />
                    <a href="javascript:;" id="cancel_comment_reply_link" class="go hidden">{l s='Cancel reply' d='Shop.Theme.Transformer'}</a>
                </div>
              </div>
            </div>
        </form>
        {/if}
    </div>
    {/if}
</section>
{/block}

{block name='my_account_links'}
  <div class="clearfix my_account_page_footer mt-3 mb-3">
    <a href="{url entity='module' name='stproductcomments' controller='mycomments'}" title="{l s='Back to my comments' d='Shop.Theme.Transformer'}" rel="nofollow"><i class="fto-left fto_mar_lr2"></i>{l s='Back to my comments' d='Shop.Theme.Transformer'}</a>
  </div>
{/block}