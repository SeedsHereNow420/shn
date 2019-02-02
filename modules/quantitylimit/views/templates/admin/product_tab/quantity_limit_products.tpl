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
<script type="text/javascript">
//<![CDATA[
var min_limit_error = "{l s='Minimum quantity must be smaller than maximum quantity' mod='quantitylimit' js=1}";
var max_limit_error = "{l s='Maximum quantity must be greater than minimum quantity' mod='quantitylimit' js=1}";
var input_error = "{l s='Invalid input' mod='quantitylimit' js=1}";
var ajax_url = "{$ajax_url}";
$(document).on('change, focusout', '.quantity_limit', function(e) {
	var data = {
		id_product: parseInt($('input[name=id_product]').val()),
		id_attribute_product: 0,
		field: '',
		value: '',
		action: 'updateQuantityLimit'
	}
	data.id_attribute_product = parseInt($(this).data('ipa'));
	data.field = (parseInt($(this).data('ipa')))? $(this).attr('name').replace('_' + $(this).data('ipa'), '') : $(this).attr('name');
	data.value = $(this).val();
	if (typeof data.id_attribute_product !== 'undefined') {
		if (typeof data.field !== 'undefined' && data.field) {
			if (data.field == 'min_qty') {
				var max_qty = (data.id_attribute_product)? $('input[name=max_qty_' + data.id_attribute_product + ']').val() : $('input[name=max_qty]').val();
				if(data.value && isNaN(data.value)) {
					showErrorMessage(input_error);
					return false;
				}
				else if (parseInt(max_qty) && parseInt(max_qty) <= parseInt(data.value)) {
					showErrorMessage(min_limit_error);
					return false;
				}
			} else if (data.field == 'max_qty') {
				var min_qty = (data.id_attribute_product)? $('input[name=min_qty_' + data.id_attribute_product + ']').val() : $('input[name=min_qty]').val();
				if(data.value && isNaN(data.value)) {
					showErrorMessage(input_error);
					return false;
				}
				else if (parseInt(min_qty) && parseInt(min_qty) >= parseInt(data.value)) {
					showErrorMessage(max_limit_error);
					return false;
				}
			} else if (data.field == 'date_to' && data.value) {
				var date = Date.parse(data.value);
				if(isNaN(date)) {
					showErrorMessage(input_error);
					return false;
				}
			}
		}
	}
	$.ajax({
		type: "POST",
		url: ajax_url,
		data: data,
		dataType: 'json',
		async : true,
		beforeSend: function(xhr, settings)
		{
			$(this).attr('disabled', 'disabled');
		},
		complete: function(xhr, status)
		{
			$(this).removeAttr('disabled');
		},
		success: function(jsonData)
		{
			if (jsonData.hasError) {
				showErrorMessage(jsonData.error);
				return;
			}
			else if(jsonData.success) {
				showSuccessMessage(jsonData.msg);
			}
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			if (textStatus != 'error' || errorThrown != '')
				showErrorMessage(textStatus + ': ' + errorThrown);
		}
	});
})
//]]>
</script>
{if isset($smarty.get.limit_error)}
	<div class="alert alert-danger clearfix">
		{l s='Please set quantity limit first.' mod='quantitylimit'}
		<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" onclick="$(this).parent().remove();"><i class="icon-remove"></i> {l s='Close' mod='quantitylimit'}</button>
	</div>
{/if}
<div class="panel col-md-12">
	<h3>{l s='Quantity Limit' mod='quantitylimit'}</h3>
	<input type="hidden" name="id_product" value="{$id_product|escape:'htmlall':'UTF-8'}">
	{if isset($simpleProduct) && $simpleProduct > 0}
		<div class="table-responsive">
			{include file='./product_attributes.tpl'}
		</div>
	{else}
		{include file='./simple_product.tpl'}
	{/if}
</div>
