<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 14:29:08
         compiled from "modules/hioutofstocknotification/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:662361435c37c7342ccfd4-23850822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0da3fccd100e9c64f9b2c507d10313bedff0a26' => 
    array (
      0 => 'modules/hioutofstocknotification/views/templates/hook/header.tpl',
      1 => 1519199271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '662361435c37c7342ccfd4-23850822',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oosn_front_controller_url' => 0,
    'psv' => 0,
    'oosn_secure_key' => 0,
    'oosn_position' => 0,
    'quantity' => 0,
    'id_product' => 0,
    'id_combination' => 0,
    'oosn_stock_managment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c37c7342ec2e2_57067035',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c37c7342ec2e2_57067035')) {function content_5c37c7342ec2e2_57067035($_smarty_tpl) {?>

<script type="text/javascript">
	
		var oosn_front_controller_url = '<?php echo $_smarty_tpl->tpl_vars['oosn_front_controller_url']->value;?>
';
		var psv = <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['psv']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;
		var oosn_secure_key = '<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['oosn_secure_key']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
';
		var oosn_position = '<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['oosn_position']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
';
		var quantity = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['quantity']->value), ENT_QUOTES, 'UTF-8');?>
;
		var id_product = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_product']->value), ENT_QUOTES, 'UTF-8');?>
;
		var id_combination = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['id_combination']->value), ENT_QUOTES, 'UTF-8');?>
;
		var oosn_stock_managment = <?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['oosn_stock_managment']->value), ENT_QUOTES, 'UTF-8');?>
;
	
</script><?php }} ?>
