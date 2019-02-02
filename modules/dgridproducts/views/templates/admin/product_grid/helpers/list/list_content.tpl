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
    {if (isset($params.table) && $params.table == 'stock_available' && $tr['depends_on_stock'] == 1 && Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))}
        <a data-id="{$tr.id|escape:'quotes':'UTF-8'}" class="button btn btn-default viewAdvancedStockManagement" href="#" title="{l s='Advanced stock management' mod='dgridproducts'}">
            <i class="icon-archive"></i>({$tr.sav_quantity|intval})
        </a>
    {else}
        {if isset($params.help)}
            <div class="help_message">{$params.help|escape:'quotes':'UTF-8'}</div>
        {/if}
        <div
                class="{if isset($params.image)}edit_image {/if}{if isset($params.need_edit) && $params.need_edit} edit_field {if $params.validate == 'category'}edit_category{/if} {if $ps_v < 1.6}v15{/if}
                {/if}"
                {if isset($params.need_edit) && $params.need_edit && $params.validate == 'category'}
                    data-id="{$tr.id|intval}"
                {/if}
                {if isset($params.image)}
                    data-id="{$tr.id|intval}"
                {/if}
                >
            {assign var="none_close_td" value=true}
            {if !in_array($params.type, [
                        'combinations',
                        'features',
                        'meta_tags',
                        'additional_setting_product',
                        'specific_price',
                        'short_description',
                        'description'
                    ]
                )
            }
                {if isset($params.image) && empty($tr.image)}
                    <i class="icon-picture"></i>
                {/if}
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
        </div>
        {if isset($params.need_edit) && $params.need_edit && ($params.table != 'stock_available' || $tr['depends_on_stock'] != 1 || !Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))}
            {if !$params.lang}
                    <div class="form_edit_field{if $ps_v < 1.6} v15{/if}">
                        <textarea
                                {if isset($params.maxlength)}maxlength="{$params.maxlength|intval}"{/if}
                                data-event-save="1"
                                {if isset($params.shop) && $params.shop && $shop_active}data-shop="true"{/if}
                                data-criterion="id_product"
                                data-validate="{$params.validate|escape:'quotes':'UTF-8'}"
                                data-field-id="{$tr.id|intval}"
                                data-field-table="{$params.table|escape:'quotes':'UTF-8'}"
                                data-field-name="{$params.field|escape:'quotes':'UTF-8'}"
                                data-field-lang="{$params.lang|escape:'quotes':'UTF-8'}"
                                {if isset($tr['rate']) && in_array($params.field, ['price', 'price_final'])}data-rate="{$tr['rate']|escape:'quotes':'UTF-8'}"{/if}
                                class="type_{if isset($params.validate) && $params.validate}{$params.validate|escape:'quotes':'UTF-8'}{else}{$params.type|escape:'quotes':'UTF-8'}{/if}">{if isset($tr["`$key`_no_format"])}{$tr["`$key`_no_format"]|escape:'quotes':'UTF-8'}{else}{if isset($tr.$key) && $tr.$key}{if $params.validate == price}{$tr.$key|replace:' ':''|replace:',':'.'|floatval}{else}{$tr.$key|escape:'quotes':'UTF-8'}{/if}{/if}{/if}</textarea>

                    </div>
            {else}
                <div class="form_edit_field{if $ps_v < 1.6} v15{/if}">
                {foreach from=$tr["`$key`_lang"] key=kItem item=item}
                    <div class="lang_{$kItem|escape:'quotes':'UTF-8'}" {if $kItem != $default_lang->id}style="display: none;" {/if}>
                        <textarea
                                {if isset($params.maxlength)}maxlength="{$params.maxlength|intval}"{/if}
                                data-event-save="1"
                                {if isset($params.shop) && $params.shop && $shop_active}data-shop="true"{/if}
                                data-criterion="id_product"
                                data-field-id="{$tr.id|intval}"
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
        {else}
            {if $params.type == 'combinations'}
                <a data-id="{$tr.id|escape:'quotes':'UTF-8'}" class="button btn btn-default viewCombinations" title="{l s='Combinations' mod='dgridproducts'}" href="#"><i class="icon-list"></i></a>
            {/if}
            {if $params.type == 'features'}
                <a data-id="{$tr.id|escape:'quotes':'UTF-8'}" class="button btn btn-default viewFeatures" href="#">{l s='Fe-s' mod='dgridproducts'}</a>
            {/if}
            {if $params.type == 'meta_tags'}
                <a data-id="{$tr.id|escape:'quotes':'UTF-8'}" class="button btn btn-default viewMetaTags" href="#">{l s='Meta' mod='dgridproducts'}</a>
            {/if}
            {if $params.type == 'additional_setting_product'}
                <a data-id="{$tr.id|escape:'quotes':'UTF-8'}" class="button btn btn-default viewAdditionalSettingProduct" href="#">{l s='More' mod='dgridproducts'}</a>
            {/if}
            {if $params.type == 'specific_price'}
                <a data-id="{$tr.id|escape:'quotes':'UTF-8'}" class="button btn btn-default viewSpecificPrices {if $tr.has_specific_price}has_specific_price{/if} {if $tr.has_group_specific_price}has_group_specific_price{/if}" href="#" title="{l s='Specific prices' mod='dgridproducts'}">%{if $tr.has_specific_price || $tr.has_group_specific_price}{$tr.count_specific_price|intval}{/if}</a>
            {/if}
            {if $params.type == 'short_description'}
                <div class="cell_description">
                {$tr['description_short']|strip_tags|truncate: $lenght_short_desc:''}...
                </div>
                <a data-id="{$tr.id|escape:'quotes':'UTF-8'}" data-short="1" class="button btn btn-default viewDescription" href="#" title="{l s='Short description' mod='dgridproducts'}">Aa</a>
            {/if}
            {if $params.type == 'description'}
                <div class="cell_description">
                    {$tr['description']|strip_tags|truncate: $lenght_desc:''}...
                </div>
                <a data-id="{$tr.id|escape:'quotes':'UTF-8'}" data-short="0" class="button btn btn-default viewDescription" href="#" title="{l s='Description' mod='dgridproducts'}">Aa</a>
            {/if}
        {/if}
    {/if}
    {if $ps_v < 1.6}</td>{/if}
{/block}
