<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:10:06
         compiled from "module:stsidebar/views/templates/hook/rightbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21031008065c31a9ce363e35-56472676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3452b3e5a5b3245aa8d86170be572a719ed52382' => 
    array (
      0 => 'module:stsidebar/views/templates/hook/rightbar.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '21031008065c31a9ce363e35-56472676',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sidebar_items_left' => 0,
    'sidebar_item' => 0,
    'sidebar_items_right' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a9ce369255_63990561',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a9ce369255_63990561')) {function content_5c31a9ce369255_63990561($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['sidebar_items_left']->value)) {?>
<div id="leftbar" class="">
<?php  $_smarty_tpl->tpl_vars['sidebar_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sidebar_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sidebar_items_left']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sidebar_item']->key => $_smarty_tpl->tpl_vars['sidebar_item']->value) {
$_smarty_tpl->tpl_vars['sidebar_item']->_loop = true;
?>
    <?php echo $_smarty_tpl->getSubTemplate ('module:stsidebar/views/templates/hook/rightbar-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('sidebar_item'=>$_smarty_tpl->tpl_vars['sidebar_item']->value), 0);?>

<?php } ?>
</div>
<?php }?>
<?php if (count($_smarty_tpl->tpl_vars['sidebar_items_right']->value)) {?>
<div id="rightbar" class="">
<?php  $_smarty_tpl->tpl_vars['sidebar_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sidebar_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sidebar_items_right']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sidebar_item']->key => $_smarty_tpl->tpl_vars['sidebar_item']->value) {
$_smarty_tpl->tpl_vars['sidebar_item']->_loop = true;
?>
    <?php echo $_smarty_tpl->getSubTemplate ('module:stsidebar/views/templates/hook/rightbar-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('sidebar_item'=>$_smarty_tpl->tpl_vars['sidebar_item']->value), 0);?>

<?php } ?>
</div>
<?php }?><?php }} ?>
