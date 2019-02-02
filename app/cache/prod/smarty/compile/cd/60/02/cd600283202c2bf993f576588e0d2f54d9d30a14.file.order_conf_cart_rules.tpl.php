<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 05:34:44
         compiled from "/var/www/html/SHN/themes/transformer/mails/en/order_conf_cart_rules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16930166095c335574aa9ae3-99562297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd600283202c2bf993f576588e0d2f54d9d30a14' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/mails/en/order_conf_cart_rules.tpl',
      1 => 1515533592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16930166095c335574aa9ae3-99562297',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'cart_rule' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c335574aae1c4_78814682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c335574aae1c4_78814682')) {function content_5c335574aae1c4_78814682($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['cart_rule'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cart_rule']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cart_rule']->key => $_smarty_tpl->tpl_vars['cart_rule']->value) {
$_smarty_tpl->tpl_vars['cart_rule']->_loop = true;
?>
	<tr class="conf_body">
		<td bgcolor="#f8f8f8" colspan="4" style="border:1px solid #D6D4D4;color:#333;padding:7px 0">
			<table class="table" style="width:100%;border-collapse:collapse">
				<tr>
					<td width="10" style="color:#333;padding:0"></td>
					<td align="right" style="color:#333;padding:0">
						<font size="2" face="Open-sans, sans-serif" color="#555454">
							<strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart_rule']->value['voucher_name'], ENT_QUOTES, 'UTF-8');?>
</strong>
						</font>
					</td>
					<td width="10" style="color:#333;padding:0"></td>
				</tr>
			</table>
		</td>
		<td bgcolor="#f8f8f8" colspan="4" style="border:1px solid #D6D4D4;color:#333;padding:7px 0">
			<table class="table" style="width:100%;border-collapse:collapse">
				<tr>
					<td width="10" style="color:#333;padding:0"></td>
					<td align="right" style="color:#333;padding:0">
						<font size="2" face="Open-sans, sans-serif" color="#555454">
							<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart_rule']->value['voucher_reduction'], ENT_QUOTES, 'UTF-8');?>

						</font>
					</td>
					<td width="10" style="color:#333;padding:0"></td>
				</tr>
			</table>
		</td>
	</tr>
<?php } ?>
<?php }} ?>
