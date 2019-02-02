{*
*  Copyright (C) Prestalia - All Rights Reserved
*
*  Unauthorized copying of this file, via any medium is strictly prohibited
*  Proprietary and confidential
*
*  @author    Prestalia <prestalia.it>
*  @copyright 2015-2016 Prestalia
*  @license   Closed source, proprietary software
*}
{foreach from=$details item=detail name=oppprod}
    <div class="opp-product-container">
        {if $detail['link'] != ''}
            <div class="opp-product-name-container{if $create_tooltip} opp-tooltip-img" title="{$detail['link']|escape:'htmlall':'UTF-8'}"{else}"{/if}>
                <i class="opp-tooltip-icon icon icon-picture-o"></i>&nbsp;<span class="opp-product-name">{$detail['product_name']|escape:'htmlall':'UTF-8'}</span>
                <br>
            </div>
        {else}
            <div class="opp-product-name-container">
                <span class="opp-product-name">{$detail['product_name']|escape:'htmlall':'UTF-8'}</span>
                <br>
            </div>
        {/if}
        {if $detail['product_reference'] != ''}
            <span class="opp-product-reference">{$detail['product_reference']|escape:'htmlall':'UTF-8'}</span>
            <br>
        {/if}
        {if $detail['product_ean13'] != ''}
            <i class="opp-ean13-icon icon icon-barcode">&nbsp;&colon;</i>&nbsp;<span class="opp-product-ean13">{$detail['product_ean13']|escape:'htmlall':'UTF-8'}</span>
            <br>
        {/if}
        <span class="opp-product-price-label">{l s='Price' mod='ordersplusplus'}&colon;&nbsp;</span>
        <span class="opp-unit-price">{Tools::displayPrice($detail['unit_price_tax_incl']|escape:'htmlall':'UTF-8', $id_currency)}</span>
        <span class="opp-multiply-sign">x</span>
        <span class="opp-product-quantity">{$detail['product_quantity']|escape:'htmlall':'UTF-8'}</span>
        <span class="opp-equals-sign">&equals;</span>
        <span class="opp-total-price">{Tools::displayPrice($detail['total_price_tax_incl']|escape:'htmlall':'UTF-8', $id_currency)}</span>
        {if isset($detail['highlight'])}
            <p class="opp-prod-qty-highlight">
                <i class="icon icon-exclamation-circle"></i>
                <span>{l s='Quantity ordered' mod='ordersplusplus'}</span>&nbsp;&colon;
                <span>{$detail['product_quantity']|escape:'htmlall':'UTF-8'}</span>
            </p>
        {/if}
    </div>
    {if !$smarty.foreach.oppprod.last}
        <hr class="opp-product-separator">
    {/if}
{/foreach}
