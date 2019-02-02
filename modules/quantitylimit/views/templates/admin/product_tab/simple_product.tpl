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
<div class="form-group margin-form">
	<label class="form-group control-label col-lg-3">{l s='Status' mod='quantitylimit'}</label>
	<div class="col-lg-6">
		<span class="switch prestashop-switch fixed-width-lg">
			<input type="radio" class="quantity_limit" data-ipa="0" name="status" id="status_on" value="1" {if isset($product_limit) && $product_limit.status == 1}checked="checked"{/if}/>
			<label class="t" for="status_on">
				{if $version < 1.6}
					<img src="../img/admin/enabled.gif" alt="{l s='Enabled' mod='quantitylimit'}" title="{l s='Enabled' mod='quantitylimit'}" />
				{else}
					{l s='Yes' mod='quantitylimit'}
				{/if}
			</label>
			<input type="radio" class="quantity_limit" data-ipa="0" name="status" id="status_off" value="0" {if (isset($product_limit) && $product_limit.status == 0) OR empty($product_limit)}checked="checked"{/if}/>
			<label class="t" for="status_off">
				{if $version < 1.6}
					<img src="../img/admin/disabled.gif" alt="{l s='Disabled' mod='quantitylimit'}" title="{l s='Disabled' mod='quantitylimit'}" />
				{else}
					{l s='No' mod='quantitylimit'}
				{/if}
			</label>
			<a class="slide-button btn"></a>
		</span>
	</div>
	<div class="clearfix"></div>
</div>

<div class="form-group margin-form">
	<label class="col-lg-3 control-label">{l s='Min Qty' mod='quantitylimit'}</label>
	<div class="col-lg-2">
		<input type="text" class="quantity_limit form-control" data-ipa="0" name="min_qty" value="{if isset($product_limit) && isset($product_limit.min_qty)}{$product_limit.min_qty}{/if}" onkeyup="this.value = (this.value<0)?Math.abs(this.value):this.value;">
	</div>
	<div class="clearfix"></div>
</div>
<div class="form-group margin-form">
	<label class="col-lg-3 control-label">{l s='Max Qty' mod='quantitylimit'}</label>
	<div class="col-lg-2">
		<input type="text" class="quantity_limit form-control" data-ipa="0" name="max_qty" value="{if isset($product_limit) && isset($product_limit.max_qty)}{$product_limit.max_qty}{/if}" onkeyup="this.value = (this.value<0)?Math.abs(this.value):this.value;">
	</div>
	<div class="clearfix"></div>
</div>
<div class="form-group margin-form">
	<label class="col-lg-3 control-label">{l s='Date To' mod='quantitylimit'}</label>
	<div class="col-lg-3">
		<input class="datepicker quantity_limit form-control" type="text" name="date_to" data-ipa="0" value="{if isset($product_limit) && isset($product_limit.date_to)}{$product_limit.date_to}{/if}">
	</div>
	<div class="clearfix"></div>
</div>
<div class="form-group margin-form">
	<label class="col-lg-3 control-label">{l s='Group' mod='quantitylimit'}</label>
	<div class="col-lg-3">
		<select class="quantity_limit form-control" data-ipa="0" name="id_group">
			<option value="0" {if isset($product_limit.id_group) AND $product_limit.id_group == 0}selected="selected"{/if}>{l s='All groups' mod='quantitylimit'}</option>
			{foreach from=$groups item=group}
			<option value="{$group.id_group|escape:'htmlall':'UTF-8'}" {if isset($product_limit.id_group) AND $product_limit.id_group AND $product_limit.id_group == $group.id_group}selected="selected"{/if}>{$group.name|escape:'htmlall':'UTF-8'}</option>
			{/foreach}
		</select>
	</div>
	<div class="clearfix"></div>
</div>
{if !$multishop}
	<input type="hidden" name="id_shop" value="0" />
{else}
	<div class="form-group margin-form">
		<label class="col-lg-3 control-label">{l s='Shop' mod='quantitylimit'}</label>
		<div class="col-lg-3">
			<select class="quantity_limit form-control" data-ipa="0" name="id_shop">
				{if !$admin_one_shop}<option value="0">{l s='All shops' mod='quantitylimit'}</option>{/if}
				{foreach from=$shops item=shop}
					<option value="{$shop.id_shop|escape:'htmlall':'UTF-8'}" {if isset($product_limit) && isset($product_limit.id_shop) AND $product_limit.id_shop == $shop.id_shop}selected="selected"{/if}>{$shop.name|escape:'htmlall':'UTF-8'}</option>
				{/foreach}
			</select>
		</div>
		<div class="clearfix"></div>
	</div>
{/if}
