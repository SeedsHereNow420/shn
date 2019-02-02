<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 12:16:55
         compiled from "/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-bookmark.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5331098085c3656b7096266-20747234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0304c98d84c2a12aa7a652434160dd0214dbd9f4' => 
    array (
      0 => '/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-bookmark.tpl',
      1 => 1519199329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5331098085c3656b7096266-20747234',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id_order' => 0,
    'bookmark' => 0,
    'bookmark_value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3656b709df17_37775562',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3656b709df17_37775562')) {function content_5c3656b709df17_37775562($_smarty_tpl) {?>
<a class="opp-bookmark-container btn btn-default" onclick="updateBookmark(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_order']->value,'htmlall','UTF-8');?>
, '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['bookmark']->value,'htmlall','UTF-8');?>
', '<?php echo smartyTranslate(array('s'=>'Bookmark updated','mod'=>'ordersplusplus'),$_smarty_tpl);?>
', '<?php echo smartyTranslate(array('s'=>'Error','mod'=>'ordersplusplus'),$_smarty_tpl);?>
')">
    <i id="book<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['bookmark']->value,'htmlall','UTF-8');?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_order']->value,'htmlall','UTF-8');?>
enabled" class="opp-bookmark-enabled icon icon-check<?php if ($_smarty_tpl->tpl_vars['bookmark_value']->value==0) {?> hiddenBook<?php }?>"></i>
    <i id="book<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['bookmark']->value,'htmlall','UTF-8');?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_order']->value,'htmlall','UTF-8');?>
disabled" class="opp-bookmark-disabled icon icon-times<?php if ($_smarty_tpl->tpl_vars['bookmark_value']->value==1) {?> hiddenBook<?php }?>"></i>
</a>
<?php }} ?>
