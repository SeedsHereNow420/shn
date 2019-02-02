<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 13:14:51
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/request_sql/list_action_export.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15370188105c2fcccb81bfb1-88626366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '789937ea1b437558f22d36adb16021d022c6269e' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/request_sql/list_action_export.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15370188105c2fcccb81bfb1-88626366',
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
  'unifunc' => 'content_5c2fcccb8213f5_27370683',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fcccb8213f5_27370683')) {function content_5c2fcccb8213f5_27370683($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['href']->value,'html','UTF-8');?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" class="btn btn-default">
	<i class="icon-cloud-upload"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a>
<?php }} ?>
