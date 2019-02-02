<?php /* Smarty version Smarty-3.1.19, created on 2019-01-03 11:38:10
         compiled from "modules/stmegamenu/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19105827525c2e64a24e3090-16393846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cca63504f4d0e6391f0e2c268f08011d73f0cd3' => 
    array (
      0 => 'modules/stmegamenu/views/templates/hook/header.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19105827525c2e64a24e3090-16393846',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'megamenu_custom_css' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2e64a24e65a4_23868759',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2e64a24e65a4_23868759')) {function content_5c2e64a24e65a4_23868759($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['megamenu_custom_css']->value)&&$_smarty_tpl->tpl_vars['megamenu_custom_css']->value) {?>
<style type="text/css">
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['megamenu_custom_css']->value, ENT_QUOTES, 'UTF-8');?>

</style>
<?php }?>
<?php }} ?>
