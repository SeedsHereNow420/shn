<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:29:52
         compiled from "modules/stmegamenu/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:882541175c31a060d9d217-28592870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '882541175c31a060d9d217-28592870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'megamenu_custom_css' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a060d9f0e8_72730964',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a060d9f0e8_72730964')) {function content_5c31a060d9f0e8_72730964($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['megamenu_custom_css']->value)&&$_smarty_tpl->tpl_vars['megamenu_custom_css']->value) {?>
<style type="text/css">
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['megamenu_custom_css']->value, ENT_QUOTES, 'UTF-8');?>

</style>
<?php }?>
<?php }} ?>
