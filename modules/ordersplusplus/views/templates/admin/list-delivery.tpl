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
<span class="opp-country">{$country_name|escape:'htmlall':'UTF-8'}</span>
{if $carrier_name != ''}
    <br>
    <br>
    <i class="opp-carrier-icon icon icon-truck">&nbsp;&colon;</i>&nbsp;<span class="opp-carrier">{$carrier_name|escape:'htmlall':'UTF-8'}</span>
    <br>
    <span class="opp-weight-label">{l s='Weight' mod='ordersplusplus'}&colon;</span>&nbsp;<span class="opp-weight">{$weight|escape:'htmlall':'UTF-8'}</span>
    <br>
    <span class="opp-price-label">{l s='Price' mod='ordersplusplus'}&colon;</span>&nbsp;<span class="opp-carr-price">{$ship_price|escape:'htmlall':'UTF-8'}</span>
{/if}
