<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 16:25:09
         compiled from "/var/www/html/SHN/pdf/invoice.payment-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8602049265c2ff9652d9be5-22655549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65ab05e958b780a0a784312ab0a68543dd9a4cb0' => 
    array (
      0 => '/var/www/html/SHN/pdf/invoice.payment-tab.tpl',
      1 => 1546552163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8602049265c2ff9652d9be5-22655549',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_invoice' => 0,
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2ff9652df4e3_09006923',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2ff9652df4e3_09006923')) {function content_5c2ff9652df4e3_09006923($_smarty_tpl) {?>
<table id="payment-tab" width="100%">
	<tr>
		<td class="payment center small grey bold" width="44%"><?php echo smartyTranslate(array('s'=>'Payment Method','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</td>
		<td class="payment left white" width="56%">
			<table width="100%" border="0">
				<?php  $_smarty_tpl->tpl_vars['payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_invoice']->value->getOrderPaymentCollection(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->key => $_smarty_tpl->tpl_vars['payment']->value) {
$_smarty_tpl->tpl_vars['payment']->_loop = true;
?>
					<tr>
						<td class="right small"><?php echo $_smarty_tpl->tpl_vars['payment']->value->payment_method;?>
</td>
						<td class="right small"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['payment']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['payment']->value->amount),$_smarty_tpl);?>
</td>
					</tr>
				<?php } ?>
			</table>
		</td>
	</tr>
</table>
<?php }} ?>
