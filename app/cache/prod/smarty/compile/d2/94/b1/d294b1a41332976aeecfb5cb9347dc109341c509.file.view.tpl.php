<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 14:37:07
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/payment/helpers/view/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3301777115c37c9130600d5-41804707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd294b1a41332976aeecfb5cb9347dc109341c509' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/payment/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '7cac1082554124db66226276f88c32a350f4f98e' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3301777115c37c9130600d5-41804707',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name_controller' => 0,
    'hookName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c37c91308fcc0_58483410',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c37c91308fcc0_58483410')) {function content_5c37c91308fcc0_58483410($_smarty_tpl) {?>

<div class="leadin"></div>


	<?php if (!$_smarty_tpl->tpl_vars['shop_context']->value) {?>
		<div class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'You have more than one shop and must select one to configure payment.','d'=>'Admin.Payment.Notification'),$_smarty_tpl);?>
</div>
	<?php } else { ?>
		<?php if (isset($_smarty_tpl->tpl_vars['modules_list']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['modules_list']->value;?>

		<?php }?>
	<?php }?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminView'),$_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo ucfirst($_smarty_tpl->tpl_vars['name_controller']->value);?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php } elseif (isset($_GET['controller'])) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo htmlentities(ucfirst($_GET['controller']));?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php }?>
<?php }} ?>
