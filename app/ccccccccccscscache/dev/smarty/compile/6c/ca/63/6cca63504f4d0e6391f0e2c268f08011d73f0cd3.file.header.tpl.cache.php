<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 20:35:18
         compiled from "modules/stmegamenu/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17024794625c318586ae10e4-56687795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '17024794625c318586ae10e4-56687795',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'megamenu_custom_css' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c318586ae3356_94428268',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c318586ae3356_94428268')) {function content_5c318586ae3356_94428268($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['megamenu_custom_css']->value)&&$_smarty_tpl->tpl_vars['megamenu_custom_css']->value) {?>
<style type="text/css">
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['megamenu_custom_css']->value, ENT_QUOTES, 'UTF-8');?>

</style>
<?php }?>
<?php }} ?>
