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

<div class="col-lg-4">
    <input type="hidden" name="inputProducts" id="inputProducts" value="{$product_search_ids|escape:'htmlall':'UTF-8'}" />
    <input type="hidden" name="nameProducts" id="nameProducts" value="{$product_search_names|escape:'htmlall':'UTF-8'}" />
    <div id="ajax_choose_product">
        <p>
            <input type="text" value="" id="product_autocomplete_input" />
            {l s='Begin typing the first letters of the product name, then select the product from the drop-down list' mod='ordersplusplus'}
        </p>
    </div>
    <div id="divProductsFilter"></div>
</div>
