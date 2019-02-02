{**
*  Copyright (C) Prestalia - All Rights Reserved
*
*  Unauthorized copying of this file, via any medium is strictly prohibited
*  Proprietary and confidential
*
*  @author    Prestalia <prestalia.it>
*  @copyright 2015-2016 Prestalia
*  @license   Closed source, proprietary software
*}

{if $opp_dni != ''}
    {l s='DNI:' mod='ordersplusplus'} <strong>{$opp_dni|escape:'htmlall':'UTF-8'}</strong><br />
{/if}
{if $opp_dni != '' && $opp_vat_number != ''}
    <br />
{/if}
{if $opp_vat_number != ''}
    {l s='VAT Number:' mod='ordersplusplus'} <strong>{$opp_vat_number|escape:'htmlall':'UTF-8'}</strong><br />
{/if}
