<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:48:31
         compiled from "/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-new_customer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20407927955c31a4bfbae2f4-23017948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e50e1a5dd8880116829ea1b511b2f734200dccc' => 
    array (
      0 => '/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-new_customer.tpl',
      1 => 1519199329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20407927955c31a4bfbae2f4-23017948',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'new' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a4bfbd3e88_60814601',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a4bfbd3e88_60814601')) {function content_5c31a4bfbd3e88_60814601($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['new']->value=='1') {?>
    <div class="opp-new-cust-container">
        <i class="icon icon-asterisk"></i>
    </div>
<?php }?>
<?php }} ?>
