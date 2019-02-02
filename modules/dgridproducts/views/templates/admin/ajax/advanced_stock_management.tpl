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

<div style="text-align: right">
    <button type="button" class="close_form_popup btn btn-danger">
        <i class="icon-remove"></i>
    </button>
</div>
<h2>
    {l s='Advanced stock management' mod='dgridproducts'}
</h2>
{if is_array($warehouses) && count($warehouses)}
    <table class="table advanced_stock_management_table">
        <thead>
            <th>

            </th>
            <th>
                {l s='Warehouse' mod='dgridproducts'}
            </th>
            <th>
                {l s='Quantity' mod='dgridproducts'}
            </th>
            <th>
                {l s='Action' mod='dgridproducts'}
            </th>
            <th>

            </th>
        </thead>
        <tbody>
            {foreach from=$warehouses item=warehouse}
                    <tr>
                        <td>
                            <input value="1" class="trigger_stage" {if in_array($warehouse.id_warehouse, $locations)}checked{/if} type="checkbox" name="locations[{$warehouse.id_warehouse|intval}][location]">
                            <span class="disable_stage"></span>
                        </td>
                        <td>
                            {$warehouse.name|escape:'quotes':'UTF-8'}
                        </td>
                        <td align="center">
                            {if array_key_exists($warehouse.id_warehouse, $quantity_locations)}
                                {$quantity_locations[$warehouse.id_warehouse]|intval}
                            {else}
                                0
                            {/if}
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-lg-8">
                                    <select name="locations[{$warehouse.id_warehouse|intval}][action]">
                                        <option value="1">{l s='Increase' mod='dgridproducts'}</option>
                                        <option value="-1">{l s='Decrease' mod='dgridproducts'}</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <input name="locations[{$warehouse.id_warehouse|intval}][quantity]" type="text">
                                </div>
                            </div>
                        </td>
                        <td>
                            <input type="hidden" value="{$id_product|intval}" name="locations[{$warehouse.id_warehouse|intval}][id_product]">
                            <input type="hidden" value="{$id_product_attribute|intval}" name="locations[{$warehouse.id_warehouse|intval}][id_product_attribute]">
                            <input type="hidden" value="{$warehouse.id_warehouse|intval}" name="locations[{$warehouse.id_warehouse|intval}][id_warehouse]">
                            <button type="button" data-id-product="{$id_product|intval}" data-id-product-attribute="{$id_product_attribute|intval}" class="btn btn-default applyQuantityAdvancedStock">
                                {l s='Apply changes' mod='dgridproducts'}
                            </button>
                        </td>
                    </tr>
            {/foreach}
        </tbody>
    </table>
{/if}