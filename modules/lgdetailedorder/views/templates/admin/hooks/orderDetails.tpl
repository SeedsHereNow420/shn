{*
*  Please read the terms of the CLUF license attached to this module(cf "licences" folder)
*
* @author    Línea Gráfica E.C.E. S.L.
* @copyright Lineagrafica.es - Línea Gráfica E.C.E. S.L. all rights reserved.
* @license   https://www.lineagrafica.es/licenses/license_en.pdf https://www.lineagrafica.es/licenses/license_es.pdf https://www.lineagrafica.es/licenses/license_fr.pdf
*}
<table class="table" style="width:100%;">
    <tr>
        <td><b>{l s='Order' mod='lgdetailedorder'}:</b> {$datos.id_order|intval}</td>
        <td>
            <i class="icon-credit-card"></i>
            <b>{l s='Payment' mod='lgdetailedorder'}:</b>
            {$datos.payment|escape:'htmlall':'UTF-8'}
            <span id="iconsPrintClose">
                <img src="../modules/lgdetailedorder/views/img/close-icon.png" onclick="closeInfo();" style="cursor:pointer;float:right;">
                <img src="../modules/lgdetailedorder/views/img/print.png" onclick="print();" style="cursor:pointer;float:right;margin-right:5px;">
            </span>
        </td>
    </tr>
    <tr>
        <td><b>{l s='Reference' mod='lgdetailedorder'}:</b> {$datos.reference|escape:'htmlall':'UTF-8'}</td>
        <td><i class="icon-time"></i> <b>{l s='Status' mod='lgdetailedorder'}:</b> {$datos.order_state|escape:'htmlall':'UTF-8'}</td>
    </tr>
    <tr>
        <td><i class="icon-calendar"></i> <b>{l s='Date' mod='lgdetailedorder'}:</b> {$datos.date_add|escape:'htmlall':'UTF-8'}</td>
        {if $datos.id_employee > 0}
        <td><i class="icon-user"></i> <b>{l s='Prepared by' mod='lgdetailedorder'}:</b> {$datos.name1_employee|escape:'htmlall':'UTF-8'} {$datos.name2_employee|escape:'htmlall':'UTF-8'}.<br></td>
        {/if}
    </tr>
</table>

<table class="table" style="width:100%;">
    <tr>
        <th>{l s='Image' mod='lgdetailedorder'}</th>
        <th>{l s='Product' mod='lgdetailedorder'}</th>
        <th>{l s='Quantity' mod='lgdetailedorder'}</th>
        <th>{l s='Unit price' mod='lgdetailedorder'}</th>
        <th>{l s='Total price' mod='lgdetailedorder'}</th>
    </tr>
    {foreach $datos.products as $product}
    <tr>
        <td>{if $product.thumbnail}<img src="{$product.thumbnail|escape:'htmlall':'UTF-8'}?time={$datos.random|intval}" alt="" class="imgm img-thumbnail">{/if}</td>
        <td>{$product.product_name|escape:'htmlall':'UTF-8'} ({$product.product_reference|escape:'htmlall':'UTF-8'} {$product.product_supplier_reference|escape:'htmlall':'UTF-8'})</td>
        <td>{$product.product_quantity|escape:'htmlall':'UTF-8'}</td>
        <td>{$product.unit_price_tax_incl_cur|escape:'htmlall':'UTF-8'}</td>
        <td>{$product.total_price_tax_incl_cur|escape:'htmlall':'UTF-8'}</td>
    </tr>
    {foreach $datos.custom as $customization}
    {if $product.product_id == $customization.id_product}
    <tr>
        <td></td>
        <td colspan="4" style="padding-left:25px;font-style: italic;">{$customization.value|escape:'htmlall':'UTF-8'}</td>
    </tr>
    {/if}
    {/foreach}
    {/foreach}
    {if $datos.discount != false}
    <tr>
        <td colspan="3"></td>
        <td><b>{l s='Discount' mod='lgdetailedorder'}</b></td>
        <td>{$datos.discount_cur|escape:'htmlall':'UTF-8'}</td>
    </tr>
    {/if}
    {if $datos.gift != false}
    <tr>
        <td colspan="3"></td>
        <td><b>{l s='Gift-wrapping' mod='lgdetailedorder'}</b></td>
        <td>{$datos.gift_cost_cur|escape:'htmlall':'UTF-8'}</td>
    </tr>
    {/if}
    {if $datos.shipping == 0}
        <tr>
            <td colspan="3"></td>
            <td><b>{l s='Shipping' mod='lgdetailedorder'}</b></td>
            <td>{l s='Free' mod='lgdetailedorder'}</td>
        </tr>
    {else}
        <tr>
            <td colspan="3"></td>
            <td><b>{l s='Shipping' mod='lgdetailedorder'}</b></td>
            <td>{$datos.shipping_cur|escape:'htmlall':'UTF-8'}</td>
        </tr>
    {/if}
    <tr>
        <td colspan="3"></td>
        <td><b>{l s='Total' mod='lgdetailedorder'}</b></td>
        <td>{$datos.total_cur|escape:'htmlall':'UTF-8'}</td>
    </tr>
</table>
{if $datos.gift != false}
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-gift"></i>
            <b>{l s='Gift-wrapping selected' mod='lgdetailedorder'}</b>
        </td>
    </tr>
</table>
{/if}
{if $datos.recyclable != false}
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-recycle"></i>
            <b>{l s='Recycled packaging selected' mod='lgdetailedorder'}</b>
        </td>
    </tr>
</table>
{/if}
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-truck"></i>
            <b>{l s='Carrier' mod='lgdetailedorder'}:</b>
            {$datos.carrier.name|escape:'htmlall':'UTF-8'} ({$datos.carrier.delay|escape:'htmlall':'UTF-8'})
        </td>
    </tr>
</table>
{if $datos.shipping_number != false}
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-globe"></i>
            <b>{l s='Tracking number' mod='lgdetailedorder'}:</b>
            {$datos.shipping_number|escape:'htmlall':'UTF-8'}
        </td>
    </tr>
</table>
{/if}
<table class="table" style="width:100%;">
    <tr>
        <th><i class="icon-map-marker"></i> {l s='Shipping address' mod='lgdetailedorder'}</th>
        <th><i class="icon-file-text"></i> {l s='Billing address' mod='lgdetailedorder'}</th>
    </tr>
    <tr>
        <td>
            {if $datos.shipping_address.company != false}
                {$datos.shipping_address.company|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.shipping_address.firstname && $datos.shipping_address.lastname != false}
                {$datos.shipping_address.firstname|escape:'htmlall':'UTF-8'} {$datos.shipping_address.lastname|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.shipping_address.address1 != false}
                {$datos.shipping_address.address1|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.shipping_address.address2 != false}
                {$datos.shipping_address.address2|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.shipping_address.postcode != false}
                {$datos.shipping_address.postcode|escape:'htmlall':'UTF-8'}
            {/if}
            {if $datos.shipping_address.city != false}
                {$datos.shipping_address.city|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.shipping_state != false}
                {$datos.shipping_state|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.shipping_country != false}
                {$datos.shipping_country|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.shipping_address.phone != false}
                <i class="icon-phone"></i> {$datos.shipping_address.phone|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.shipping_address.phone_mobile != false}
                <i class="icon-mobile-phone"></i> {$datos.shipping_address.phone_mobile|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.shipping_address.dni != false }
                <i class="icon-info"></i> {$datos.shipping_address.dni|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.shipping_address.vat_number != false}
                <i class="icon-info"></i> {$datos.shipping_address.vat_number|escape:'htmlall':'UTF-8'}<br>
            {/if}
        </td>
        <td>
            {if $datos.billing_address.company != false}
                {$datos.billing_address.company|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.billing_address.firstname && $datos.billing_address.lastname != false}
                {$datos.billing_address.firstname|escape:'htmlall':'UTF-8'} {$datos.billing_address.lastname|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.billing_address.address1 != false}
                {$datos.billing_address.address1|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.billing_address.address2 != false}
                {$datos.billing_address.address2|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.billing_address.postcode != false}
                {$datos.billing_address.postcode|escape:'htmlall':'UTF-8'}
            {/if}
            {if $datos.billing_address.city != false}
                {$datos.billing_address.city|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.billing_state != false}
                {$datos.billing_state|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.billing_country != false}
                {$datos.billing_country|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.billing_address.phone != false}
                <i class="icon-phone"></i> {$datos.billing_address.phone|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.billing_address.phone_mobile != false}
                <i class="icon-mobile-phone"></i> {$datos.billing_address.phone_mobile|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.billing_address.dni != false}
                <i class="icon-info"></i> {$datos.billing_address.dni|escape:'htmlall':'UTF-8'}<br>
            {/if}
            {if $datos.billing_address.vat_number != false}
                <i class="icon-info"></i> {$datos.billing_address.vat_number|escape:'htmlall':'UTF-8'}<br>
            {/if}
        </td>
    </tr>
</table>
{if $datos.customer_message != false}
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-pencil"></i>
            <b>{l s='Customer message' mod='lgdetailedorder'}:</b> {$datos.customer_message|escape:'htmlall':'UTF-8'}
        </td>
    </tr>
</table>
{/if}
{if $datos.gift_message != false}
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-gift"></i>
            <b>{l s='Gift message' mod='lgdetailedorder'}:</b>
            {$datos.gift_message|escape:'htmlall':'UTF-8'}
        </td>
    </tr>
</table>
{/if}
<table class="table" style="width:100%;">
    <tr>
        <th colspan="3"><i class="icon-user"></i> {l s='Customer information' mod='lgdetailedorder'}</th>
    </tr>
    <tr>
        <td><b>{l s='First name' mod='lgdetailedorder'}:</b> {$datos.customer.firstname|escape:'htmlall':'UTF-8'}</td>
        <td><b>{l s='Last name' mod='lgdetailedorder'}:</b> {$datos.customer.lastname|escape:'htmlall':'UTF-8'}</td>
        <td>
            <i class="icon-envelope-o"></i>
            <b>{l s='Email' mod='lgdetailedorder'}:</b>
            <a href="mailto:{$datos.customer.email|escape:'htmlall':'UTF-8'}">{$datos.customer.email|escape:'htmlall':'UTF-8'}</a>
        </td>
    </tr>
</table>
