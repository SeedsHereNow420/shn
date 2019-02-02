<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:23:07
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/modules/configuration_bar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4287150115c319ecb206e72-39252564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd010b8399bab4661ca385749452691e21daf2f83' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/modules/configuration_bar.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4287150115c319ecb206e72-39252564',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_name' => 0,
    'display_multishop_checkbox' => 0,
    'module' => 0,
    'current_url' => 0,
    'shop_context' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319ecb260d62_64823745',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319ecb260d62_64823745')) {function content_5c319ecb260d62_64823745($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.regex_replace.php';
?>

<?php $_smarty_tpl->tpl_vars['module_name'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['module_name']->value,'html','UTF-8'), null, 0);?>
<?php $_smarty_tpl->_capture_stack[0][] = array('default', null, null); ob_start(); ?><?php echo (('/&module_name=').($_smarty_tpl->tpl_vars['module_name']->value)).('/');?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if (isset($_smarty_tpl->tpl_vars['display_multishop_checkbox']->value)&&$_smarty_tpl->tpl_vars['display_multishop_checkbox']->value) {?>
<div class="bootstrap panel">
	<h3><i class="icon-cogs"></i> <?php echo smartyTranslate(array('s'=>'Configuration','d'=>'Admin.Global'),$_smarty_tpl);?>
</h3>
	<input type="checkbox" name="activateModule" value="1"<?php if ($_smarty_tpl->tpl_vars['module']->value->isEnabledForShopContext()) {?> checked="checked"<?php }?>
		onclick="location.href = '<?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['current_url']->value,Smarty::$_smarty_vars['capture']['default'],'');?>
&amp;module_name=<?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
&amp;enable=' + (($(this).attr('checked')) ? 1 : 0);" />
	<?php echo smartyTranslate(array('s'=>'Activate module for this shop context: %s.','sprintf'=>array($_smarty_tpl->tpl_vars['shop_context']->value),'d'=>'Admin.Modules.Notification'),$_smarty_tpl);?>

</div>
<?php }?>
<?php }} ?>
