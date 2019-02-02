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

{if isset($variables)}
<div class="row">
    <div class="col-lg-12">
        {if is_array($variables) && count($variables)}
            {foreach from=$variables.static key=var_name item=variable}
                <button type="button" class="btn btn-default" onclick="$('[name={$name|escape:'quotes':'UTF-8'|trim}]').insertAtCaret('{$var_name|escape:'quotes':'UTF-8'}');">
                    {$variable|escape:'quotes':'UTF-8'}
                </button>
            {/foreach}
        {/if}
        {if is_array($variables.features) && count($variables.features)}
            <span data-feature-btn class="btn btn-default">
                <div class="column_feature">
                    <select onclick="var btn = $(this).closest('[data-feature-btn]'); btn.find('[class^=column_feature_value_]').hide(); btn.find('.column_feature_value_'+$(this).val()).show();" name="variable_feature">
                        {foreach from=$variables.features item=feature}
                            {if !is_array($feature.values) || !count($feature.values)}{continue}{/if}
                            <option value="{$feature.id_feature|intval}">{$feature.name|escape:'quotes':'UTF-8'}</option>
                        {/foreach}
                    </select>
                </div>
                {foreach from=$variables.features item=feature}
                    {if is_array($feature.values) && count($feature.values)}
                        <div {if !$smarty.foreach.feature.first}style="display: none;"{/if} class="column_feature_value_{$feature.id_feature|intval}">
                            <select name="variable_feature_value">
                                {foreach from=$feature.values item=value}
                                    <option value="{$value.id_feature_value|intval}">{$value.value|escape:'quotes':'UTF-8'}</option>
                                {/foreach}
                            </select>
                        </div>
                    {/if}
                {/foreach}
                <div>
                    <button onclick="var btn = $(this).closest('[data-feature-btn]'); $('[name={$name|escape:'quotes':'UTF-8'|trim}]').insertAtCaret({literal}'{feature_'+btn.find('[name=variable_feature]').val()+'_'+btn.find('[name=variable_feature_value]').val()+'}'{/literal});" class="btn btn-success" type="button">
                        {l s='add feature' mod='masseditproduct'}
                    </button>
                </div>
            </span>
        {/if}
    </div>
</div>
{/if}