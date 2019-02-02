<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 10:16:47
         compiled from "/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-new_customer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11397956275c34e90fa9ae98-01940099%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '11397956275c34e90fa9ae98-01940099',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'new' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34e90fa9e817_96145879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34e90fa9e817_96145879')) {function content_5c34e90fa9e817_96145879($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['new']->value=='1') {?>
    <div class="opp-new-cust-container">
        <i class="icon icon-asterisk"></i>
    </div>
<?php }?>
<?php }} ?>
