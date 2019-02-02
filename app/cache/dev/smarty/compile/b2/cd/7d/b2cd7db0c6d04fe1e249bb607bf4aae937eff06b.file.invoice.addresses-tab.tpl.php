<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:23:43
         compiled from "/var/www/html/SHN/pdf/invoice.addresses-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9806932295c322b8f2904b7-86903104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2cd7db0c6d04fe1e249bb607bf4aae937eff06b' => 
    array (
      0 => '/var/www/html/SHN/pdf/invoice.addresses-tab.tpl',
      1 => 1546552162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9806932295c322b8f2904b7-86903104',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'delivery_address' => 0,
    'invoice_address' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322b8f293793_03773625',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322b8f293793_03773625')) {function content_5c322b8f293793_03773625($_smarty_tpl) {?>
<table id="addresses-tab" cellspacing="0" cellpadding="0">
	<tr>
		<td width="50%"><?php if ($_smarty_tpl->tpl_vars['delivery_address']->value) {?><span class="bold"><?php echo smartyTranslate(array('s'=>'Delivery Address','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</span><br/><br/>
				<?php echo $_smarty_tpl->tpl_vars['delivery_address']->value;?>

			<?php }?>
		</td>
		<td width="50%"><span class="bold"><?php echo smartyTranslate(array('s'=>'Billing Address','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</span><br/><br/>
				<?php echo $_smarty_tpl->tpl_vars['invoice_address']->value;?>

		</td>
	</tr>
</table>
<?php }} ?>
