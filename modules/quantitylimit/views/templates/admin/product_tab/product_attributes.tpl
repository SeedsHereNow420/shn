{*
* NOTICE OF LICENSE
*
* This source file is subject to a commercial license from BSofts.
* Use, copy, modification or distribution of this source file without written
* license agreement from the BSofts is strictly forbidden.
*
* @author    BSofts Inc.
* @copyright Copyright 2017 © BSofts Inc.
* @license   Single domain commerical license
* @package   quantitylimit
*}
<table class="table table-striped table-no-bordered">
	<thead>
		<tr>
			<th>{l s='Attribute - value pair' mod='quantitylimit'}</th>
			<th>{l s='Active' mod='quantitylimit'}</th>
			<th>{l s='Min Qty' mod='quantitylimit'}</th>
			<th>{l s='Max Qty' mod='quantitylimit'}</th>
			<th>{l s='Date To' mod='quantitylimit'}</th>
			<th>{l s='For Group' mod='quantitylimit'}</th>
			{if $multishop}<th>{l s='Shop' mod='quantitylimit'}</th>{/if}
		</tr>
	</thead>
	<tbody>
		{foreach from=$attributes item=attribute}
		<tr>
			<td {if $ps_version < 1.7}class="col-lg-2"{/if}>{$attribute.attribute_designation}</td>
			<td {if $ps_version < 1.7}class="col-lg-1"{/if}>
			{if isset($attribute.status) && $attribute.status == 1}
				<input type="hidden" class="quantity_limit form-control" name="status_{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}" value="1" data-ipa="{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}"/>
				<a href="{$link->getAdminLink('AdminProduct')}&update_limited_qty&id_product={$id_product|escape:'htmlall':'UTF-8'}&ipa={$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}">
				{if $ps_version >= 1.7}
					<i class="material-icons action-enabled ">check</i>
				{else}
					<img src="../img/admin/enabled.gif">
				{/if}
				</a>
			{else}
				<input type="hidden" class="quantity_limit form-control" name="status_{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}" value="0" data-ipa="{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}"/>
				<a href="{$link->getAdminLink('AdminProduct')}&update_limited_qty&id_product={$id_product|escape:'htmlall':'UTF-8'}&ipa={$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}">
				{if $ps_version >= 1.7}
					<i class="material-icons action-disabled">clear</i>
				{else}
					<img src="../img/admin/disabled.gif">
				{/if}
				</a>
			{/if}
			</td>
			<td {if $ps_version < 1.7}class="col-lg-1"{/if}>
				<input type="text" class="quantity_limit form-control" name="min_qty_{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}" onkeyup="this.value = (this.value<0)?Math.abs(this.value):this.value;" data-ipa="{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}" value="{if isset($attribute.min_qty) AND $attribute.min_qty}{$attribute.min_qty|escape:'htmlall':'UTF-8'}{/if}">
			</td>
			<td {if $ps_version < 1.7}class="col-lg-1"{/if}>
				<input type="text" class="quantity_limit form-control" name="max_qty_{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}" onkeyup="this.value = (this.value<0)?Math.abs(this.value):this.value;" data-ipa="{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}" value="{if isset($attribute.max_qty) AND $attribute.max_qty}{$attribute.max_qty|escape:'htmlall':'UTF-8'}{/if}">
			</td>
			<td {if $ps_version < 1.7}class="col-lg-2"{/if}>
				<input class="quantity_limit form-control datepicker" type="text" name="date_to_{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}" data-ipa="{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}" value="{if isset($attribute.date_to) AND $attribute.date_to}{$attribute.date_to|escape:'htmlall':'UTF-8'}{/if}">
			</td>
			<td {if $ps_version < 1.7}class="col-lg-2"{/if}>
				<select class="quantity_limit form-control" name="id_group_{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}" data-ipa="{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}">
					<option value="0">{l s='All groups' mod='quantitylimit'}</option>
					{foreach from=$groups item=group}
					<option value="{$group.id_group|escape:'htmlall':'UTF-8'}" {if isset($product_limit.id_group) AND $product_limit.id_group AND $product_limit.id_group == $group.id_group}selected="selected"{/if}>{$group.name|escape:'htmlall':'UTF-8'}</option>
					{/foreach}
				</select>
			</td>
			{if !$multishop}
				<input type="hidden" class="quantity_limit form-control" name="id_shop_{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}" value="0" />
			{else}
			<td {if $ps_version < 1.7}class="col-lg-2"{/if}>
				<select class="quantity_limit form-control" name="id_shop_{$attribute.id_product_attribute|escape:'htmlall':'UTF-8'}">
					{if !$admin_one_shop}<option value="0">{l s='All shops' mod='quantitylimit'}</option>{/if}
					{foreach from=$shops item=shop}
					<option value="{$shop.id_shop|escape:'htmlall':'UTF-8'}" {if isset($product_limit) && isset($product_limit.id_shop) AND $product_limit.id_shop == $shop.id_shop}selected="selected"{/if}>{$shop.name|escape:'htmlall':'UTF-8'}</option>
					{/foreach}
				</select>
			</td>
			{/if}
		</tr>
		{/foreach}
	</tbody>
</table>
