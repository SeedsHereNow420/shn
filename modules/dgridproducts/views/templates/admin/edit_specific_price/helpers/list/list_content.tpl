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
    {if isset($params.help)}
        <div class="help_message">{$params.help|escape:'quotes':'UTF-8'}</div>
    {/if}
    <div
            class="{if isset($params.need_edit) && $params.need_edit}edit_field{if $ps_v < 1.6} v15{/if}{/if}">
            {if $params.type == 'bool'}<a href="#" {if isset($params.shop) && $params.shop && $shop_active}data-shop="true"{/if} data-field-id="{$tr.id_specific_price|intval}"
                                          data-field-table="{$params.table|escape:'quotes':'UTF-8'}"
                                          data-field-name="{$params.field|escape:'quotes':'UTF-8'}"
                                          data-criterion="id_specific_price"
                                          data-value="{if $tr.$key.src == 'enabled.gif'}1{else}0{/if}"
                                          class="save_bool_specific_price">{/if}
            {assign var="none_close_td" value=true}
            {if isset($params.image_c) && empty($tr.image)}
                <i class="icon-picture"></i>
            {elseif isset($params.image_c)}
                {$tr.image|escape:'quotes':'UTF-8'}
            {else}
                {*td_content*}
                {if isset($params.prefix)}{$params.prefix|escape:'quotes':'UTF-8'}{/if}
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
                {*td_content*}
            {/if}
            {if $params.type == 'bool'}</a>{/if}
    </div>
    {if isset($params.need_edit) && $params.need_edit}
        <div class="form_edit_field{if $ps_v < 1.6} v15{/if}">
            {if $params.type == 'datepicker'}
                <input
                        type="text"
                        data-event-save="1"
                        {if isset($params.shop) && $params.shop && $shop_active}data-shop="true"{/if}
                        data-criterion="id_specific_price"
                        data-field-id="{$tr.id_specific_price|intval}"
                        data-field-table="{$params.table|escape:'quotes':'UTF-8'}"
                        data-field-name="{$params.field|escape:'quotes':'UTF-8'}"
                        data-field-lang="{$params.lang|escape:'quotes':'UTF-8'}"
                        {if isset($rate) && in_array($params.field, ['price', 'price_final'])}data-rate="{$rate|escape:'quotes':'UTF-8'}"{/if}
                        class="type_{if isset($params.validate) && $params.validate}{$params.validate|escape:'quotes':'UTF-8'}{else}{$params.type|escape:'quotes':'UTF-8'}{/if}" value="{if isset($tr["`$key`_no_format"])}{$tr["`$key`_no_format"]|escape:'quotes':'UTF-8'}{else}{if isset($tr.$key) && $tr.$key}{if isset($params.validate) && $params.validate == price}{$tr.$key|replace:' ':''|replace:',':'.'|floatval}{else}{$tr.$key|escape:'quotes':'UTF-8'}{/if}{/if}{/if}">
            {else}
                <textarea
                    {if isset($params.validate)}{if $params.validate == 'select' || ($params.validate == 'specific_price' && $tr.$key == -1)}readonly{/if}{/if}
                    data-event-save="1"
                    {if isset($params.shop) && $params.shop && $shop_active}data-shop="true"{/if}
                    data-criterion="id_specific_price"
                    data-field-id="{$tr.id_specific_price|intval}"
                    data-field-table="{$params.table|escape:'quotes':'UTF-8'}"
                    data-field-name="{$params.field|escape:'quotes':'UTF-8'}"
                    data-field-lang="{$params.lang|escape:'quotes':'UTF-8'}"
                    {if isset($rate) && in_array($params.field, ['price', 'price_final'])}data-rate="{$rate|escape:'quotes':'UTF-8'}"{/if}
                    class="type_{if isset($params.validate) && $params.validate}{$params.validate|escape:'quotes':'UTF-8'}{else}{$params.type|escape:'quotes':'UTF-8'}{/if}">{if isset($params.validate) && $params.validate == 'select'}{$tr[$params.query.editable_value]|escape:'quotes':'UTF-8'}{else}{if isset($tr["`$key`_no_format"])}{$tr["`$key`_no_format"]|escape:'quotes':'UTF-8'}{else}{if isset($tr.$key) && $tr.$key}{if isset($params.validate) && $params.validate == price}{$tr.$key|replace:' ':''|replace:',':'.'|floatval}{else}{$tr.$key|escape:'quotes':'UTF-8'}{/if}{/if}{/if}{/if}</textarea>

                    {if isset($params.validate) && $params.validate == 'specific_price'}
                        <input {if $tr.$key == -1}checked{/if} type="checkbox" class="edit_field_specific_price">
                    {/if}

                    {if isset($params.validate) && $params.validate == 'select'}
                        <select class="edit_field_select" name="{$key|escape:'quotes':'UTF-8'}">
                            {foreach from=$params.query.options item=option}
                                <option {if $tr.$key == $option[$params.query.id]}selected{/if} value="{$option[$params.query.id]|escape:'quotes':'UTF-8'}">{$option[$params.query.name]|escape:'quotes':'UTF-8'}</option>
                            {/foreach}
                            {if isset($params.query.ajax_select2) && $params.query.ajax_select2 && $tr[$params.query.editable_value] != 0}
                                <option selected value="{$tr[$params.query.editable_value]|escape:'quotes':'UTF-8'}">{$tr.$key|escape:'quotes':'UTF-8'}</option>
                            {/if}
                        </select>
                        {if isset($params.query.ajax_select2) && $params.query.ajax_select2}
                            <script>
                                $('.edit_field_select[name="{$key|escape:'quotes':'UTF-8'}"]').select2({
                                    ajax: {
                                        url: document.location.href.replace(document.location.hash, ''),
                                        dataType: 'json',
                                        delay: 250,
                                        data: function (params) {
                                            return {
                                                query: params.term, // search term
                                                page: params.page,
                                                ajax: true,
                                                action: '{$params.query.ajax_select2|escape:'quotes':'UTF-8'}'
                                            };
                                        },
                                        processResults: function (data, params) {
                                            params.page = params.page || 1;

                                            return {
                                                results: data.items,
                                                pagination: {
                                                }
                                            };
                                        },
                                        cache: true
                                    },
                                });
                            </script>
                        {/if}
                    {/if}
            {/if}
        </div>
    {/if}
    {if $ps_v < 1.6}</td>{/if}
{/block}
