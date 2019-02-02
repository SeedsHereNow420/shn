<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 12:16:55
         compiled from "/var/www/html/SHN/modules/prestashippingeasy/views/templates/admin/admin-order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7583901005c3656b70a4f75-52003513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '7583901005c3656b70a4f75-52003513',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ship_order' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3656b70a71c2_32156348',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3656b70a71c2_32156348')) {function content_5c3656b70a71c2_32156348($_smarty_tpl) {?><br />
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
