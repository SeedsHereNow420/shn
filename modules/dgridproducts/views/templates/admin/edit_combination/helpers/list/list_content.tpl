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

{extends file="helpers/list/list_content.tpl"}

{block name="td_content"}
    {if (isset($params.table) && ($params.table == 'product_attribute,stock_available' || $params.table == 'stock_available') && $tr['depends_on_stock'] == 1 && Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))}
        <a data-id="{$tr.id_product|escape:'quotes':'UTF-8'}" data-id-pa="{$tr.id_product_attribute|escape:'quotes':'UTF-8'}" class="button btn btn-default viewAdvancedStockManagement" href="#" title="{l s='Advanced stock management' mod='dgridproducts'}">
            <i class="icon-archive"></i>({$tr.quantity|intval})
        </a>
    {else}
        {if isset($params.help)}
            <div class="help_message">{$params.help|escape:'quotes':'UTF-8'}</div>
        {/if}
        <div
                class="{if isset($params.image_c)}edit_image {/if}{if isset($params.need_edit) && $params.need_edit}edit_field{if $params.validate == 'category'} edit_category{/if}{if $ps_v < 1.6} v15{/if}{/if}"
                {if isset($params.image_c)}
                    data-id="{$tr.id_product|intval}"
                    data-pa="{$tr.id_product_attribute|intval}"
                {/if}
                >

                {if $params.type == 'edit_attributes'}<a data-id="{$tr['id_product_attribute']|intval}" class="edit_attributes" href="#">{/if}

                {if $params.type == 'bool'}<a href="#" {if isset($params.shop) && $params.shop && $shop_active}data-shop="true"{/if} data-field-id="{$tr.id_product_attribute|intval}"
                                              data-field-table="{$params.table|escape:'quotes':'UTF-8'}"
                                              data-field-name="{$params.field|escape:'quotes':'UTF-8'}"
                                              data-criterion="id_product_attribute"
                                              data-value="{if $tr.default_on.src == 'enabled.gif'}1{else}0{/if}"
                                              class="save_bool">{/if}
                {assign var="none_close_td" value=true}
                {if isset($params.image_c) && empty($tr.image)}
                    <i class="icon-picture"></i>
                {elseif isset($params.image_c)}
                    {$tr.image|escape:'quotes':'UTF-8'}
                {else}
                    {*td_content*}
                    {if isset($params.prefix)}{$params.prefix|escape:'quotes':'UTF-8'}{/if}
                    {if isset($params.badge_success) && $params.badge_success && isset($tr.badge_success) && $tr.badge_success == $params.badge_success}<span class="badge badge-success">{/if}
                    {if isset($params.badge_warning) && $params.badge_warning && isset($tr.badge_warning) && $tr.badge_warning == $params.badge_warning}<span class="badge badge-warning">{/if}
                    {if isset($params.badge_danger) && $params.badge_danger && isset($tr.badge_danger) && $tr.badge_danger == $params.badge_danger}<span class="badge badge-danger">{/if}
                    {if isset($params.color) && isset($tr[$params.color])}
                        <span class="label color_field" style="background-color:{$tr[$params.color]|escape:'quotes':'UTF-8'};color:{if Tools::getBrightness($tr[$params.color]) < 128}white{else}#383838{/if}">
                    {/if}
                        {if isset($tr.$key)}
                            {if isset($params.active)}
                                {$tr.$key|escape:'quotes':'UTF-8'}
                            {elseif isset($params.activeVisu)}
                                {if $tr.$key}
                                    <i class="icon-check-ok"></i> {l s='Enabled' mod='dgridproducts'}
                                    {else}
                                        <i class="icon-remove"></i> {l s='Disabled' mod='dgridproducts'}
                                {/if}

                                {elseif isset($params.position)}
                                    {if $order_by == 'position' && $order_way != 'DESC'}
                                <div class="dragGroup">
                                    <div class="positions">
                                        {$tr.$key.position|escape:'quotes':'UTF-8'}
                                    </div>
                                </div>
                            {else}
                                {($tr.$key.position + 1)|escape:'quotes':'UTF-8'}
                            {/if}
                                {elseif isset($params.image)}
                                    {$tr.$key|escape:'quotes':'UTF-8'}
                                {elseif isset($params.icon)}
                                    {if is_array($tr[$key])}
                                {if isset($tr[$key]['class'])}
                                    <i class="{$tr[$key]['class']|escape:'quotes':'UTF-8'}"></i>
                                        {else}
                                            <img src="../img/admin/{$tr[$key]['src']|escape:'quotes':'UTF-8'}" alt="{$tr[$key]['alt']|escape:'quotes':'UTF-8'}" title="{$tr[$key]['alt']|escape:'quotes':'UTF-8'}" />
                                {/if}
                                    {else}
                                        <i class="{$tr[$key]|escape:'quotes':'UTF-8'}"></i>
                            {/if}
                                {elseif isset($params.type) && $params.type == 'price'}
                                    {displayPrice price=$tr.$key}
                                {elseif isset($params.float)}
                                    {$tr.$key|escape:'quotes':'UTF-8'}
                                {elseif isset($params.type) && $params.type == 'date'}
                                    {dateFormat date=$tr.$key full=0}
                                {elseif isset($params.type) && $params.type == 'datetime'}
                                    {dateFormat date=$tr.$key full=1}
                                {elseif isset($params.type) && $params.type == 'decimal'}
                                    {$tr.$key|string_format:"%.2f"|escape:'quotes':'UTF-8'}
                                {elseif isset($params.type) && $params.type == 'percent'}
                                    {$tr.$key|escape:'quotes':'UTF-8'} {l s='%' mod='dgridproducts'}
                                {* If type is 'editable', an input is created *}
                                {elseif isset($params.type) && $params.type == 'editable' && isset($tr.id)}
                                    <input type="text" name="{$key|escape:'quotes':'UTF-8'}_{$tr.id|escape:'quotes':'UTF-8'}" value="{$tr.$key|escape:'html':'UTF-8'}" class="{$key|escape:'quotes':'UTF-8'}" />
                                {elseif isset($params.callback)}
                                    {if isset($params.maxlength) && Tools::strlen($tr.$key) > $params.maxlength}
                                <span title="{$tr.$key|escape:'quotes':'UTF-8'}">{$tr.$key|truncate:$params.maxlength:'...'|escape:'quotes':'UTF-8'}</span>
                            {else}
                                {$tr.$key|escape:'quotes':'UTF-8'}
                            {/if}
                                {elseif $key == 'color'}
                                    {if !is_array($tr.$key)}
                                <div style="background-color: {$tr.$key|escape:'quotes':'UTF-8'};" class="attributes-color-container"></div>
                                    {else} {*TEXTURE*}
                                    <img src="{$tr.$key.texture|escape:'quotes':'UTF-8'}" alt="{$tr.name|escape:'quotes':'UTF-8'}" class="attributes-color-container" />
                            {/if}
                                {elseif isset($params.maxlength) && Tools::strlen($tr.$key) > $params.maxlength}
                                    <span title="{$tr.$key|escape:'html':'UTF-8'}">{$tr.$key|truncate:$params.maxlength:'...'|escape:'html':'UTF-8'}</span>
                            {else}
                                {$tr.$key|escape:'html':'UTF-8'}
                            {/if}
                        {elseif $key == 'additional_setting_combination'}
                            <a data-id="{$tr.id_product_attribute|escape:'quotes':'UTF-8'}" class="button btn btn-default viewMoreSettingCombination" href="#">{l s='More' mod='dgridproducts'}</a>
                        {else}
                            {block name="default_field"}--{/block}
                        {/if}
                        {if isset($params.suffix)}{$params.suffix|escape:'quotes':'UTF-8'}{/if}
                    {if isset($params.color) && isset($tr.color)}
                        </span>
                    {/if}
                    {if isset($params.badge_danger) && $params.badge_danger && isset($tr.badge_danger) && $tr.badge_danger == $params.badge_danger}</span>{/if}
                    {if isset($params.badge_warning) && $params.badge_warning && isset($tr.badge_warning) && $tr.badge_warning == $params.badge_warning}</span>{/if}
                    {if isset($params.badge_success) && $params.badge_success && isset($tr.badge_success) && $tr.badge_success == $params.badge_success}</span>{/if}
                    {*td_content*}
                {/if}
                {if $params.type == 'bool'}</a>{/if}

                {if $params.type == 'edit_attributes'}</a>{/if}
        </div>
        {if isset($params.need_edit) && $params.need_edit}
            {if !$params.lang}
                {if $params.validate != 'category'}
                    <div class="form_edit_field{if $ps_v < 1.6} v15{/if}">
                        <textarea
                                data-event-save="1"
                                {if isset($params.shop) && $params.shop && $shop_active}data-shop="true"{/if}
                                data-criterion="id_product_attribute"
                                data-field-id="{$tr.id_product_attribute|intval}"
                                data-validate="{$params.validate|escape:'quotes':'UTF-8'}"
                                data-field-table="{$params.table|escape:'quotes':'UTF-8'}"
                                data-field-name="{$params.field|escape:'quotes':'UTF-8'}"
                                data-field-lang="{$params.lang|escape:'quotes':'UTF-8'}"
                                {if isset($rate) && in_array($params.field, ['price', 'price_final', 'desired'])}data-rate="{$rate|escape:'quotes':'UTF-8'}"{/if}
                                class="type_{if isset($params.validate) && $params.validate}{$params.validate|escape:'quotes':'UTF-8'}{else}{$params.type|escape:'quotes':'UTF-8'}{/if}">{if isset($tr["`$key`_no_format"])}{$tr["`$key`_no_format"]|escape:'quotes':'UTF-8'}{else}{if isset($tr.$key) && $tr.$key}{if $params.validate == price}{$tr.$key|replace:' ':''|replace:',':'.'|floatval}{else}{$tr.$key|escape:'quotes':'UTF-8'}{/if}{/if}{/if}</textarea>

                    </div>
                {else}
                    <div class="box_categories" style="display: none">
                        <div class="box_categories_stage"></div>
                        <div class="box_categories_form">
                            <div class="title_product">{l s='Edit product' mod='dgridproducts'}: {$tr.name|escape:'quotes':'UTF-8'}
                                <a class="cancel_change_category btn btn-default">{l s='Cancel' mod='dgridproducts'}</a>
                            </div>
                            <div class="form-group">
                                {$tr.view_category_box|escape:'mail':'UTF-8'}
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4" for="id_category_default">
                                    <span class="label-tooltip" data-toggle="tooltip" title="{l s='The default category is the main category for your product, and is displayed by default.' mod='dgridproducts'}">
                                        {l s='Default category' mod='dgridproducts'}
                                    </span>
                                </label>
                                <div class="col-lg-5">
                                    <select id="id_category_default_{$tr.id_product|intval}" name="id_category_default">
                                        {foreach from=$tr.selected_categories item=cat}
                                            <option value="{$cat.id_category|escape:'quotes':'UTF-8'}" {if $tr.id_category_default == $cat.id_category}selected="selected"{/if} >{$cat.name|escape:'quotes':'UTF-8'}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group save_form">
                                <button type="button" data-id_product="{$tr.id_product|intval}" class="btn btn-default save_btn pull-right">
                                    <i class="process-icon-save"></i>
                                    {l s='Save' mod='dgridproducts'}
                                </button>
                            </div>
                        </div>
                    </div>
                {/if}
            {else}
                <div class="form_edit_field{if $ps_v < 1.6} v15{/if}">
                {foreach from=$tr["`$key`_lang"] key=kItem item=item}
                    <div class="lang_{$kItem|escape:'quotes':'UTF-8'}" {if $kItem != $default_lang->id}style="display: none;" {/if}>
                        <textarea
                                data-event-save="1"
                                {if isset($params.shop) && $params.shop && $shop_active}data-shop="true"{/if}
                                data-criterion="id_product_attribute"
                                data-field-id="{$tr.id|intval}"
                                data-validate="{$params.validate|escape:'quotes':'UTF-8'}"
                                data-field-table="{$params.table|escape:'quotes':'UTF-8'}"
                                data-field-name="{$params.field|escape:'quotes':'UTF-8'}"
                                data-field-lang="{$params.lang|escape:'quotes':'UTF-8'}"
                                data-field-id-lang="{$kItem|escape:'quotes':'UTF-8'}"
                                class="type_{if isset($params.validate) && $params.validate}{$params.validate|escape:'quotes':'UTF-8'}{else}{$params.type|escape:'quotes':'UTF-8'}{/if}">{$item|escape:'quotes':'UTF-8'}</textarea>
                    </div>
                {/foreach}
                    <div class="btn_lang">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                            {$default_lang->iso_code|escape:'quotes':'UTF-8'}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            {foreach from=$languages item=lang}
                                <li>
                                    <a data-lang-iso="{$lang.iso_code|escape:'quotes':'UTF-8'}" onclick="changeLang(this, {$lang.id_lang|intval}); return false;">{$lang.name|escape:'quotes':'UTF-8'}</a>
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                </div>
            {/if}
        {/if}
    {/if}
    {if $ps_v < 1.6}</td>{/if}
{/block}
