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

<h3>{l s='Suppliers' mod='dgridproducts'}</h3>
<div class="row">
	<div class="col-lg-1"></div>
	<div class="col-lg-2">
		<label class="control-label label-right">{l s='Suppliers of the current product' mod='dgridproducts'}</label>
	</div>
	<div class="col-lg-9">
		<table class="table">
			<thead>
			<td>{l s='Selected' mod='dgridproducts'}</td>
			<td>{l s='Name supplier' mod='dgridproducts'}</td>
			<td>{l s='On default' mod='dgridproducts'}</td>
			</thead>
			<tbody>
            {foreach from=$suppliers item=supplier}
				<tr>
					<td align="left">
						<input {if in_array($supplier.id_supplier, $ids_product_suppliers)}checked{/if} type="checkbox" name="check_supplier_{$supplier.id_supplier|intval}" value="{$supplier.id_supplier|intval}" class="supplierCheckBox">
					</td>
					<td>
                        {$supplier.name|escape:'quotes':'UTF-8'}
					</td>
					<td>
						<input {if !in_array($supplier.id_supplier, $ids_product_suppliers)}disabled{/if} {if $supplier.id_supplier == $product->id_supplier}checked{/if} type="radio" name="default_supplier" value="{$supplier.id_supplier|intval}">
					</td>
				</tr>
            {/foreach}
			</tbody>
		</table>
	</div>
</div>
<br>
<div class="col-lg-3"></div>
<div class="alert alert-info col-lg-9">
    {if $associated_suppliers|@count == 0}
        {l s='You must specify the suppliers associated with this product. You must also select the default product supplier before setting references.' mod='dgridproducts'}
    {else}
        {l s='You can specify product reference(s) for each associated supplier.' mod='dgridproducts'}
    {/if}
    {l s='Click "Save and Stay" after changing selected suppliers to display the associated product references.' mod='dgridproducts'}
</div>
<div class="row">
	<div class="col-lg-3">
		<label class="control-label label-right">{l s='Supplier reference(s)' mod='dgridproducts'}</label>
	</div>
	<div class="col-lg-9">
		<div class="panel-group" id="accordion-supplier">
            {foreach from=$associated_suppliers item=supplier name=data}
				<div class="panel">
					<div class="panel-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-supplier"
						   href="#supplier-{$supplier->id}">{if isset($supplier->name)}{$supplier->name}{/if}</a>
					</div>
					<div id="supplier-{$supplier->id}">
						<div class="panel-body">
							<table class="table">
								<thead>
								<tr>
									<th><span class="title_box">{l s='Product name'  mod='dgridproducts'}</span></th>
									<th><span class="title_box">{l s='Supplier reference'  mod='dgridproducts'}</span>
									</th>
									<th>
										<span class="title_box">{l s='Unit price tax excluded'  mod='dgridproducts'}</span>
									</th>
									<th><span class="title_box">{l s='Unit price currency'  mod='dgridproducts'}</span>
									</th>
								</tr>
								</thead>
								<tbody>
                                {foreach $attributes AS $index => $attribute}
                                    {assign var=reference value=''}
                                    {assign var=price_te value=''}
                                    {assign var=id_currency value=$id_default_currency}
                                    {foreach from=$associated_suppliers_collection item=asc}
                                        {if $asc->id_product == $attribute['id_product'] && $asc->id_product_attribute == $attribute['id_product_attribute'] && $asc->id_supplier == $supplier->id_supplier}
                                            {assign var=reference value=$asc->product_supplier_reference}
                                            {assign var=price_te value=Tools::ps_round($asc->product_supplier_price_te, 2)}
                                            {if $asc->id_currency}
                                                {assign var=id_currency value=$asc->id_currency}
                                            {/if}
                                        {/if}
                                    {/foreach}
									<tr {if $index is odd}class="alt_row"{/if}>
										<td>{$product_designation[$attribute['id_product_attribute']]}</td>
										<td>
											<input type="text" value="{$reference|escape:'html':'UTF-8'}"
												   name="supplier_reference_{$attribute['id_product']}_{$attribute['id_product_attribute']}_{$supplier->id_supplier}"/>
										</td>
										<td>
											<input type="text" value="{$price_te|htmlentities}"
												   name="product_price_{$attribute['id_product']}_{$attribute['id_product_attribute']}_{$supplier->id_supplier}"/>
										</td>
										<td>
											<select name="product_price_currency_{$attribute['id_product']}_{$attribute['id_product_attribute']}_{$supplier->id_supplier}">
                                                {foreach $currencies AS $currency}
													<option value="{$currency['id_currency']}"
                                                            {if $currency['id_currency'] == $id_currency}selected="selected"{/if}
													>{$currency['name']}</option>
                                                {/foreach}
											</select>
										</td>
									</tr>
                                {/foreach}
								</tbody>
							</table>
						</div>
					</div>
				</div>
            {/foreach}
		</div>
	</div>
</div>