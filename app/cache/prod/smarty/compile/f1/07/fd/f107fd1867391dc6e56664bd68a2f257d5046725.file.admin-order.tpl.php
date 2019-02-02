<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:34:18
         compiled from "/var/www/html/SHN/modules/prestashippingeasy/views/templates/admin/admin-order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10743807915c338d9a632350-90228717%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f107fd1867391dc6e56664bd68a2f257d5046725' => 
    array (
      0 => '/var/www/html/SHN/modules/prestashippingeasy/views/templates/admin/admin-order.tpl',
      1 => 1515295075,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10743807915c338d9a632350-90228717',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ship_order' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338d9a6381c1_01592205',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338d9a6381c1_01592205')) {function content_5c338d9a6381c1_01592205($_smarty_tpl) {?><br />
<fieldset>
	<legend><?php echo smartyTranslate(array('s'=>'Shipping Easy Module','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</legend>
	<form method="post" action="" name="sendnow">
	<input type="hidden" name="ship_order" value="<?php echo intval($_smarty_tpl->tpl_vars['ship_order']->value);?>
">
	<input type="submit" name="process_send" value ="<?php echo smartyTranslate(array('s'=>'Send to ShippingEasy','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
" class="button" />
	</form>
</fieldset>
<br />
<?php }} ?>
