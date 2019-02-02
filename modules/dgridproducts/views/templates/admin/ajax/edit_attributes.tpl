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
*  @author    SeoSA <885588@bk.ru>
*  @copyright 2012-2017 SeoSA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="panel form_edit_attributes">
    <h3>{l s='Edit attributes' mod='dgridproducts'}</h3>
    <input type="hidden" name="id_product_attribute" value="{$combination->id|intval}">
    <div class="row">
        <label class="col-lg-3 control-label">{l s='Attribute' mod='dgridproducts'}</label>
        <div class="col-md-3">
            <select name="attribute_group">
                {if is_array($attribute_groups) && count($attribute_groups)}
                    {foreach from=$attribute_groups item=attribute_group}
                        <option value="{$attribute_group.id_attribute_group|intval}">{$attribute_group.name|escape:'quotes':'UTF-8'}</option>
                    {/foreach}
                {/if}
            </select>
        </div>
    </div>
    <br>
    {if is_array($attribute_groups) && count($attribute_groups)}
        {foreach from=$attribute_groups item=attribute_group}
            <div class="row" data-group="{$attribute_group.id_attribute_group|intval}">
                <label class="control-label col-lg-3">{l s='Value' mod='dgridproducts'}</label>
                <div class="col-md-4">
                    <select name="attribute">
                        {if isset($attribute_group.attributes) && count($attribute_group.attributes)}
                            {foreach from=$attribute_group.attributes item=attribute}
                                <option value="{$attribute.id_attribute|intval}">{$attribute.name|escape:'quotes':'UTF-8'}</option>
                            {/foreach}
                        {/if}
                    </select>
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-default btn-block add_attr"><i class="icon-plus-sign-alt"></i>{l s='Add' mod='dgridproducts'}</button>
                </div>
            </div>
        {/foreach}
    {/if}
    <div class="row row_selected_attr">
        <div class="col-md-4 col-md-offset-3">
            <select id="product_att_list" name="attribute_combination_list[]" multiple="multiple">
                {if is_array($selected_attributes) && count($selected_attributes)}
                    {foreach from=$selected_attributes item=selected_attribute}
                        <option value="{$selected_attribute.id_attribute|intval}" groupid="{$selected_attribute.id_attribute_group|intval}">{$selected_attribute.group|escape:'quotes':'UTF-8'} : {$selected_attribute.name|escape:'quotes':'UTF-8'}</option>
                    {/foreach}    
                {/if}    
            </select>
        </div>
        <div class="col-lg-2">
            <button type="button" class="btn btn-default btn-block delete_attr"><i class="icon-minus-sign-alt"></i>{l s='Delete' mod='dgridproducts'}</button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-danger cancelEditAttributes" type="button"><i class="icon-remove"></i>{l s='Cancel' mod='dgridproducts'}</button>
            <button class="btn btn-success saveAttributes" type="button"><i class="icon-save"></i>{l s='Save' mod='dgridproducts'}</button>
        </div>
    </div>
</div>
<script>
    $('[name="attribute_group"]').trigger('change');
</script>