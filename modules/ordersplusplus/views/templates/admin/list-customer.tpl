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
{if isset($company) && $company != ''}
    <span class="opp-company">{$company|escape:'htmlall':'UTF-8'}</span><br>
{/if}
<span class="opp-customer-name">{$customer|escape:'htmlall':'UTF-8'}</span><br>
<br>
<span class="opp-addr-label">{l s='Shipping address' mod='ordersplusplus'}&colon;</span><br>
{if isset($compaddress) && $compaddress != ''}
    <span class="opp-addr-company">{$compaddress|escape:'htmlall':'UTF-8'}</span><br>
{/if}
{if isset($firstname)}
    <span class="opp-firstlastname">{$firstname|escape:'htmlall':'UTF-8'}&nbsp;{$lastname|escape:'htmlall':'UTF-8'}</span><br>
    <span class="opp-addr1">{$address1|escape:'htmlall':'UTF-8'}</span><br>
    {if $address2 != ''}
        <span class="opp-addr2">{$address2|escape:'htmlall':'UTF-8'}</span><br>
    {/if}
    <span class="opp-postcode-city">{$postcode|escape:'htmlall':'UTF-8'}&nbsp;{$city|escape:'htmlall':'UTF-8'}</span><br>
    {if $phone != ''}
        <i class="opp-phone-icon icon icon-phone">&nbsp;&colon;</i>&nbsp;<span class="opp-phone">{$phone|escape:'htmlall':'UTF-8'}</span><br>
    {/if}
{/if}
{if isset($dni) && $dni != ''}
    <span class="opp-dni-label">{l s='Dni' mod='ordersplusplus'}&colon;</span>&nbsp;<span class="opp-dni">{$dni|escape:'htmlall':'UTF-8'}</span><br>
{/if}
{if isset($vat_number) && $vat_number != ''}
    <span class="opp-vat-number-label">{l s='Vat nr.' mod='ordersplusplus'}&nbsp;&colon;</span>&nbsp;<span class="opp-vat-number">{$vat_number|escape:'htmlall':'UTF-8'}</span>
{/if}
