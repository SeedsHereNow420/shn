<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 10:23:20
         compiled from "/var/www/html/SHN/modules/quantitylimit/views/templates/admin/product_tab/quantity_limit_products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20745797945c34ea98bc3403-55902512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '962265d888c8aab2e42e72b2d506509a8ca41bd1' => 
    array (
      0 => '/var/www/html/SHN/modules/quantitylimit/views/templates/admin/product_tab/quantity_limit_products.tpl',
      1 => 1513817419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20745797945c34ea98bc3403-55902512',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ajax_url' => 0,
    'id_product' => 0,
    'simpleProduct' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34ea98bd5133_80783612',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34ea98bd5133_80783612')) {function content_5c34ea98bd5133_80783612($_smarty_tpl) {?>
<script type="text/javascript">
//<![CDATA[
var min_limit_error = "<?php echo smartyTranslate(array('s'=>'Minimum quantity must be smaller than maximum quantity','mod'=>'quantitylimit','js'=>1),$_smarty_tpl);?>
";
var max_limit_error = "<?php echo smartyTranslate(array('s'=>'Maximum quantity must be greater than minimum quantity','mod'=>'quantitylimit','js'=>1),$_smarty_tpl);?>
";
var input_error = "<?php echo smartyTranslate(array('s'=>'Invalid input','mod'=>'quantitylimit','js'=>1),$_smarty_tpl);?>
";
var ajax_url = "<?php echo $_smarty_tpl->tpl_vars['ajax_url']->value;?>
";
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
<?php if (isset($_GET['limit_error'])) {?>
	<div class="alert alert-danger clearfix">
		<?php echo smartyTranslate(array('s'=>'Please set quantity limit first.','mod'=>'quantitylimit'),$_smarty_tpl);?>

		<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" onclick="$(this).parent().remove();"><i class="icon-remove"></i> <?php echo smartyTranslate(array('s'=>'Close','mod'=>'quantitylimit'),$_smarty_tpl);?>
</button>
	</div>
<?php }?>
<div class="panel col-md-12">
	<h3><?php echo smartyTranslate(array('s'=>'Quantity Limit','mod'=>'quantitylimit'),$_smarty_tpl);?>
</h3>
	<input type="hidden" name="id_product" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_product']->value,'htmlall','UTF-8');?>
">
	<?php if (isset($_smarty_tpl->tpl_vars['simpleProduct']->value)&&$_smarty_tpl->tpl_vars['simpleProduct']->value>0) {?>
		<div class="table-responsive">
			<?php echo $_smarty_tpl->getSubTemplate ('./product_attributes.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		</div>
	<?php } else { ?>
		<?php echo $_smarty_tpl->getSubTemplate ('./simple_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
</div>
<?php }} ?>
