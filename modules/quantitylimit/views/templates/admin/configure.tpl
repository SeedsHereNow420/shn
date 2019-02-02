{*
* NOTICE OF LICENSE.
*
* This source file is subject to a commercial license from BSofts.
* Use, copy, modification or distribution of this source file without written
* license agreement from the BSofts is strictly forbidden.
*
*  @author    BSoft Inc
*  @copyright 20017 BSoft Inc.
*  @license   Commerical License
*}
<div class="panel">
    <div class="form-group col-lg-4 pull-right">
        <div class="col-lg-4 item">
            <a href="https://addons.prestashop.com/en/contact-us?id_product=26735" target="_blank"  title="{l s='Support' mod='quantitylimit'}">
                <img id="support" src="{$smarty.const.__PS_BASE_URI__}modules/quantitylimit/views/img/support.png" title="{l s='Support' mod='quantitylimit'}" alt="{l s='Support' mod='quantitylimit'}">
                <label class="caption" for="support">{l s='Support' mod='quantitylimit'}</label>
            </a>
        </div>
        <div class="col-lg-4 item">
            <a href="https://addons.prestashop.com/en/ratings.php" target="_blank" title="{l s='Rate Us' mod='quantitylimit'}">
                <img id="rate" src="{$smarty.const.__PS_BASE_URI__}modules/quantitylimit/views/img/fav.png" title="{l s='Rate Us' mod='quantitylimit'}" alt="{l s='Rate Us' mod='quantitylimit'}">
                <label class="caption" for="rate">{l s='Rate Us' mod='quantitylimit'}</label>
            </a>
        </div>
        <div class="col-lg-4 item">
            <a href="https://addons.prestashop.com/en/2_community-developer?contributor=521928" target="_blank" title="{l s='Find Our Other Modules' mod='quantitylimit'}">
                <img id="more-products" src="{$smarty.const.__PS_BASE_URI__}modules/quantitylimit/views/img/products.png" title="{l s='Find Our Other Modules' mod='quantitylimit'}" alt="{l s='Find Our Other Modules' mod='quantitylimit'}">
                <label class="caption" for="more-products">{l s='Find Our Other Modules' mod='quantitylimit'}</label>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
{literal}
<style type="text/css">
    div.item {
    /* To correctly align image, regardless of content height: */
    vertical-align: top;
    display: inline-block;
    /* To horizontally center images and caption */
    text-align: center;
    /* The width of the container also implies margin around the images. */
    width: 120px;
    }
    div.item img {
        width: 80px;
    }
    .caption {
        /* Make the caption a block so it occupies its own line. */
        display: block;
        cursor: pointer;
    }
</style>
{/literal}
