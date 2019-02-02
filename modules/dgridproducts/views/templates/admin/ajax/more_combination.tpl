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
    <h3>{l s='Edit more combination' mod='dgridproducts'}</h3>
{*    <form id="product_form" class="form-horizontal col-lg-10 col-md-9" action="{$form_action|escape:'html':'UTF-8'}" method="post" enctype="multipart/form-data" name="product" novalidate>*}
        <input type="hidden" name="id_product_attribute" value="{$id_product_attribute|escape:'htmlall':'UTF-8'}" />

    <div id="tr_unit_impact" class="form-group shift_tr_unit_impact">
        <div class="col-lg-1"><span class="pull-right">{include file="controllers/products/multishop/checkbox.tpl" field="attribute_unit_impact" type="attribute_unit_impact"}</span></div>
        <label class="control-label col-lg-2" for="attribute_unit_impact">
            {l s='Impact on unit price' mod='dgridproducts'}
        </label>
        <div class="col-lg-3">
            <select name="attribute_unit_impact" id="attribute_unit_impact">
                <option value="0"{if $attribute_unit_impact.selected==0} selected{/if}>{l s='None' mod='dgridproducts'}</option>
                <option value="1"{if $attribute_unit_impact.selected==1} selected{/if}>{l s='Increase' mod='dgridproducts'}</option>
                <option value="-1"{if $attribute_unit_impact.selected==-1} selected{/if}>{l s='Reduction' mod='dgridproducts'}</option>
            </select>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <label class="control-label col-lg-1" for="attribute_unity" style="width: 30px;">
                    {l s='of' mod='dgridproducts'}
                </label>
                <div class="input-group col-lg-5">
                    <div class="input-group-addon">
                        {if $currency->format % 2 != 0}{$currency->sign|escape:'htmlall':'UTF-8'}{/if}
                        {if $currency->format % 2 == 0}{$currency->sign|escape:'htmlall':'UTF-8'}{/if}
                    </div>
                    <input type="text" name="attribute_unity" id="attribute_unity" value="{abs($combination->unit_price_impact)|floatval}" onKeyUp="if (isArrowKey(event)) return ;this.value = this.value.replace(/,/g, '.');" />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group form-group-custom">
        <div class="col-lg-1"><span class="pull-right">{include file="controllers/products/multishop/checkbox.tpl" field="attribute_minimal_quantity" type="default"}</span></div>
        <label class="control-label col-lg-2" for="attribute_minimal_quantity">
				<span class="label-tooltip" data-toggle="tooltip" title="{l s='The minimum quantity to buy this product (set to 1 to disable this feature).' mod='dgridproducts'}">
					{l s='Minimum quantity' mod='dgridproducts'}
				</span>
        </label>
        <div class="col-lg-9">
            <div class="input-group col-lg-2">
                <div class="input-group-addon">&times;</div>
                <input maxlength="6" name="attribute_minimal_quantity" id="attribute_minimal_quantity" type="text" value="{$combination->minimal_quantity|escape:'htmlall':'UTF-8'}" />
            </div>
        </div>
    </div>
        <input type="hidden" name="id_product_attribute" id="id_product_attribute" value="0" />
        <input type="hidden" name="key_tab" id="key_tab" value="Informations" />
   {* </form>*}
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-danger cancelEditAttributes" type="button"><i class="icon-remove"></i>{l s='Cancel' mod='dgridproducts'}</button>
            <button class="btn btn-success saveMoreCombination" type="button"><i class="icon-save"></i>{l s='Save' mod='dgridproducts'}</button>
        </div>
    </div>
</div>
<script>
    $('[name="attribute_group"]').trigger('change');
</script>