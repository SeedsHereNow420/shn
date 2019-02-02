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
<span class="opp-reference">{$reference|escape:'htmlall':'UTF-8'}</span>
{if isset($marketplace_ref) && $marketplace_ref != ''}
    <br>
    <span class="opp-marketplace-ref-label">{l s='Marketplace ref.' mod='ordersplusplus'}&nbsp;&colon;</span><br>
    <span class="opp-marketplace-ref">{$marketplace_ref|escape:'htmlall':'UTF-8'}</span>
{/if}
