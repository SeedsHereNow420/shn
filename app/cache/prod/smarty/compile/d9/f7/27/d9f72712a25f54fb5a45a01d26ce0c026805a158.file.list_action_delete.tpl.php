<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 11:48:38
         compiled from "/var/www/html/SHN/modules/dgridproducts/views/templates/admin/product_grid/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16634824165c34fe96ef3298-74224019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9f72712a25f54fb5a45a01d26ce0c026805a158' => 
    array (
      0 => '/var/www/html/SHN/modules/dgridproducts/views/templates/admin/product_grid/helpers/list/list_action_delete.tpl',
      1 => 1512598745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16634824165c34fe96ef3298-74224019',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34fe96efece4_57373616',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34fe96efece4_57373616')) {function content_5c34fe96efece4_57373616($_smarty_tpl) {?>

<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['href']->value,'quotes','UTF-8');?>
"<?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)) {?> onclick="if (confirm('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['confirm']->value,'quotes','UTF-8');?>
')){return true;}else{event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>
" class="btn btn-default delete">
	<i class="icon-trash"></i>
</a><?php }} ?>
