<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 10:31:54
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11897642825c2fa69a8c3c47-74449344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d04d50d8dfeec166333f1d8d990773cfbd01a7b' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11897642825c2fa69a8c3c47-74449344',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2fa69a8cc9e7_82586800',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fa69a8cc9e7_82586800')) {function content_5c2fa69a8cc9e7_82586800($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['href']->value,'html','UTF-8');?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>

</a>
<?php }} ?>
