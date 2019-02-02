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

<div class="row">
    <div class="disable_option_radio">
        <label for="disabled_feature_{$feature.id_feature|intval}">
            <input id="disabled_feature_{$feature.id_feature|intval}" checked type="radio" name="disabled[feature][{$feature.id_feature|intval}]" class="disable_option" value="1">
            <span>{l s='Disable' mod='masseditproduct'}</span>
        </label>
        <label for="disabled_feature_{$feature.id_feature|intval}">
            <input id="disabled_feature_{$feature.id_feature|intval}" type="radio" name="disabled[feature][{$feature.id_feature|intval}]" data-feature="{$feature.id_feature|intval}" class="disable_option" value="0">
            <span>{l s='Enable' mod='masseditproduct'}</span>
        </label>
    </div>
    <label class="control-label col-lg-4 col-md-4 col-sm-4 col-xs-4">{$feature.name|escape:'quotes':'UTF-8'}</label>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        {if is_array($feature.values) && count($feature.values)}
            <select onchange="$('[class^=custom_{$feature.id_feature|intval}]').val('');" id="feature_{$feature.id_feature|intval}_value" name="feature_{$feature.id_feature|intval}_value">
                <option value="0">-</option>
                {foreach from=$feature.values item=value}
                    <option value="{$value.id_feature_value|intval}">{$value.value|escape:'quotes':'UTF-8'}</option>
                {/foreach}
            </select>
        {else}
            <span>-</span>
            <input type="hidden" name="feature_{$feature.id_feature|intval}_value" value="0">
        {/if}
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 {if $smarty.const._PS_VERSION_ < 1.6}translatable{/if}">
        {foreach from=$languages key=k item=language}
            {if $languages|count > 1}
                <div class="row translatable-field lang-{$language.id_lang|intval} lang_{$language.id_lang|intval}" {if $smarty.const._PS_VERSION_ < 1.6 && !$language.is_default}style="display: none;"{/if}>
                <div class="col-lg-9">
            {/if}
            <textarea
                    class="custom_{$feature.id_feature|intval}_{$language.id_lang|intval} textarea-autosize"
                    name="custom_{$feature.id_feature|intval}_{$language.id_lang|intval}"
                    cols="40"
                    rows="1"
                    onkeyup="if (isArrowKey(event)) return ;$('#feature_{$feature.id_feature|intval}_value').val(0);" ></textarea>

            {if $languages|count > 1}
                </div>
                {if !($smarty.const._PS_VERSION_ < 1.6)}
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            {$language.iso_code|escape:'quotes':'UTF-8'}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            {foreach from=$languages item=language}
                                <li>
                                    <a href="javascript:hideOtherLanguage({$language.id_lang|intval});">{$language.iso_code|escape:'quotes':'UTF-8'}</a>
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                {/if}
                </div>
            {/if}
        {/foreach}
    </div>
</div>