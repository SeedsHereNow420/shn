<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:28:47
         compiled from "/var/www/html/SHN/pdf/invoice.shipping-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15727453955c32ffafb96821-84761034%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a271dd0c88d2116bc4b6385fbdd47870354970f' => 
    array (
      0 => '/var/www/html/SHN/pdf/invoice.shipping-tab.tpl',
      1 => 1546552164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15727453955c32ffafb96821-84761034',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'carrier' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32ffafc6f2c8_89513201',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32ffafc6f2c8_89513201')) {function content_5c32ffafc6f2c8_89513201($_smarty_tpl) {?>
<table id="shipping-tab" width="100%">
	<tr>
		<td class="shipping center small grey bold" width="44%"><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</td>
		<td class="shipping center small white" width="56%"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
	</tr>
</table>
<?php }} ?>
