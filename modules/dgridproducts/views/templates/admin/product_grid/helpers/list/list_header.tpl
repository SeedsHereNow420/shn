{*
* 2007-2016 PrestaShop
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
* @author    SeoSA <885588@bk.ru>
* @copyright 2012-2017 SeoSA
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
* International Registered Trademark & Property of PrestaShop SA
*}

{extends file="helpers/list/list_header.tpl"}

{block name="override_header"}
    <script>
		if (typeof tabs_manager == 'undefined')
			var tabs_manager = {};
        {assign var='priceDisplayPrecision' value=$smarty.const._PS_PRICE_DISPLAY_PRECISION_|intval}
        var currencySign = "{$currencySign|escape:'quotes':'UTF-8'}";
        var currencyRate = "{$currencyRate|escape:'quotes':'UTF-8'}";
        var currencyFormat = "{$currencyFormat|escape:'quotes':'UTF-8'}";
        var currencyBlank = "{$currencyBlank|escape:'quotes':'UTF-8'}";
        var priceDisplayPrecision = "{$priceDisplayPrecision|escape:'quotes':'UTF-8'}";
        var id_default_lang = {$default_lang->id|intval};
        var ad = '{$ad|addslashes|escape:'quotes':'UTF-8'}';
    </script>
    <script>
        l_grid = {};
        l_grid['ean13'] = "{l s='Ean13 wrong' mod='dgridproducts'}";
        l_grid['upc'] = "{l s='Upc wrong' mod='dgridproducts'}";
        l_grid['type_error'] = "{l s='Write wrong' mod='dgridproducts'}";
    </script>
{/block}

{block name=leadin}
    <div class="tab-content">
    <div class="panel mode_search tab-pane active" id="grid_prod_search">
        <div class="row">
            <div class="col-lg-6 tree_custom">
                <div class="row">
                    <label class="control-label col-lg-12">
                        {l s='Select category by search' mod='dgridproducts'}
                    </label>
                    {include file="./tree.tpl"
                    categories=$categories
                    id_category=Configuration::get('PS_ROOT_CATEGORY')
                    root=true
                    view_header=true
                    multiple=true
                    selected_categories=$selected_categories
                    name='categories'
                    }
                </div>
            </div>
            <div class="col-lg-6 search-products">
                <div class="row">
                    <label class="control-label col-lg-3 search-prod">
                        {l s='Search product' mod='dgridproducts'}
                    </label>
                    <div class="row search_product_name">
                        <div class="col-lg-9">
                            {include file="./btn_radio.tpl" input=$input_product_name_type_search}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group form-group-lg">
                            <div class="row">
                                <div class="col-xs-9">
                                    <input name="search_query" class="form-control" type="text" value="{$search_query|escape:'quotes':'UTF-8'}"/>
                                </div>
                                <div class="col-xs-3">
                                    <select class="form-control" name="type_search">
                                        <option value="0" {if $type_search == 0}selected{/if}>{l s='Name' mod='dgridproducts'}</option>
                                        <option value="1" {if $type_search == 1}selected{/if}>{l s='Id product' mod='dgridproducts'}</option>
                                        <option value="2" {if $type_search == 2}selected{/if}>{l s='Reference' mod='dgridproducts'}</option>
                                        <option value="3" {if $type_search == 3}selected{/if}>{l s='EAN-13' mod='dgridproducts'}</option>
                                        <option value="4" {if $type_search == 4}selected{/if}>{l s='UPC' mod='dgridproducts'}</option>
                                        <option value="5" {if $type_search == 5}selected{/if}>{l s='Description' mod='dgridproducts'}</option>
                                        <option value="6" {if $type_search == 6}selected{/if}>{l s='Description short' mod='dgridproducts'}</option>
                                     </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-lg-12 label-margin">
                        {l s='Search by manufacturer' mod='dgridproducts'}
                    </label>
                    <div class="col-lg-12">
                        <select id="manufacturer" class="" style="width: 100%;" multiple name="manufacturer[]">
                            <option value="0">-</option>
                            {foreach from=$manufacturers item=manufacturer}
                                <option value="{$manufacturer.id_manufacturer|intval}" {if in_array($manufacturer.id_manufacturer, $search_manufacturers)}selected{/if}>{$manufacturer.name|escape:'quotes':'UTF-8'}</option>
                            {/foreach}
                        </select>
                        <script>
                            $('[name="manufacturer[]"]').select2();
                        </script>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-lg-12">
                        {l s='Search by supplier' mod='dgridproducts'}
                    </label>
                    <div class="col-lg-12">
                        <select id="supplier" class="form-control" style="width: 100%;" multiple name="supplier[]">
                            <option value="0">-</option>
                            {foreach from=$suppliers item=supplier}
                                <option value="{$supplier.id_supplier|intval}" {if in_array($supplier.id_supplier, $search_suppliers)}selected{/if}>{$supplier.name|escape:'quotes':'UTF-8'}</option>
                            {/foreach}
                        </select>
                        <script>
                            $('[name="supplier[]"]').select2();
                        </script>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label class="control-label col-lg-12">
                            {l s='Only active products' mod='dgridproducts'}
                        </label>
                        <div class="col-lg-12">
                            {if $smarty.const._PS_VERSION_ < 1.6}
                                <label class="t"><img src="../img/admin/enabled.gif"></label>
                                <input name="active" value="1" type="radio"/>
                                <label class="t"><img src="../img/admin/disabled.gif"></label>
                                <input checked name="active" value="0" type="radio"/>
                            {else}
                                <div class="input-group col-lg-6 col-xs-4">
								<span class="switch prestashop-switch">
									{foreach [1,0] as $value}
                                        <input
                                                type="radio"
                                                name="active"
                                                {if $value == 1}
                                                    id="active_on"
                                                {else}
                                                    id="active_off"
                                                {/if}
                                                value="{$value|escape:'quotes':'UTF-8'}"
                                                {if $active == $value}checked="checked"{/if}
                                        />
                                        <label
                                                {if $value == 1}
                                                    for="active_on"
                                                {else}
                                                    for="active_off"
                                                {/if}
                                        >
											{if $value == 1}
                                                {l s='Yes' mod='dgridproducts'}
                                            {else}
                                                {l s='No' mod='dgridproducts'}
                                            {/if}
										</label>
                                    {/foreach}
                                    <a class="slide-button btn"></a>
								</span>
                                </div>
                            {/if}
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label class="control-label col-lg-12">
                            {l s='Only disabled products' mod='dgridproducts'}
                        </label>
                        <div class="col-lg-12">
                            {if $smarty.const._PS_VERSION_ < 1.6}
                                <label class="t"><img src="../img/admin/enabled.gif"></label>
                                <input name="disable" value="1" type="radio"/>
                                <label class="t"><img src="../img/admin/disabled.gif"></label>
                                <input checked name="disable" value="0" type="radio"/>
                            {else}
                                <div class="input-group col-lg-6 col-xs-4">
								<span class="switch prestashop-switch">
									{foreach [1,0] as $value}
                                        <input
                                                type="radio"
                                                name="disable"
                                                {if $value == 1}
                                                    id="disable_on"
                                                {else}
                                                    id="disable_off"
                                                {/if}
                                                value="{$value|escape:'quotes':'UTF-8'}"
                                                {if $disable == $value}checked="checked"{/if}
                                        />
                                        <label
                                                {if $value == 1}
                                                    for="disable_on"
                                                {else}
                                                    for="disable_off"
                                                {/if}
                                        >
											{if $value == 1}
                                                {l s='Yes' mod='dgridproducts'}
                                            {else}
                                                {l s='No' mod='dgridproducts'}
                                            {/if}
										</label>
                                    {/foreach}
                                    <a class="slide-button btn"></a>
								</span>
                                </div>
                            {/if}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label class="control-label col-xs-12">
                            {l s='Search by quantity?' mod='dgridproducts'}
                        </label>

                        <div class="search-quantity col-lg-5">
                            <label class="control-label">
                                {l s='From' mod='dgridproducts'}
                            </label>
                            <input type="text" name="qty_from" {if $qty_from}value="{$qty_from|intval}"{/if}>
                        </div>

                        <div class="search-quantity col-lg-5">
                            <label class="control-label">
                                {l s='To' mod='dgridproducts'}
                            </label>
                            <input type="text" name="qty_to" {if $qty_to}value="{$qty_to|intval}"{/if}>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="control-label col-xs-12">
                            {l s='Search by price?' mod='dgridproducts'}
                        </label>

                        <div class="search-quantity col-lg-5">
                            <label class="control-label">
                                {l s='From' mod='dgridproducts'}
                            </label>
                            <input type="text" name="price_from" {if $price_from}value="{$price_from|intval}"{/if}>
                        </div>

                        <div class="search-quantity col-lg-5">
                            <label class="control-label">
                                {l s='To' mod='dgridproducts'}
                            </label>
                            <input type="text" name="price_to" {if $price_to}value="{$price_to|intval}"{/if}>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-12">
                        {l s='How many to show products?' mod='dgridproducts'}
                    </label>
                    <div class="col-xs-3">
                        <select class="form-control" name="how_many_show">
                            <option selected value="20" {if $how_many_show == 20}selected{/if}>20</option>
                            <option value="50" {if $how_many_show == 50}selected{/if}>50</option>
                            <option value="100" {if $how_many_show == 100}selected{/if}>100</option>
                            <option value="300" {if $how_many_show == 300}selected{/if}>300</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 control_btn">
                <button id="beginSearch" class="btn btn-default">
                    {l s='Search product' mod='dgridproducts'}
                </button>
                <button id="resetSearch" class="btn btn-default">
                    {l s='Reset filter' mod='dgridproducts'}
                </button>
            </div>
        </div>
        <button class="hidden_filter">
            <i class="icon-chevron-down"></i>
        </button>
    </div>
    </div>
{/block}