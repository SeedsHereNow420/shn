<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 11:48:38
         compiled from "/var/www/html/SHN/modules/dgridproducts/views/templates/admin/product_grid/helpers/list/list_action_duplicate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9100723245c34fe96f026d7-18048990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecf8d795a1fbccb8e7be04b031cb7a7a29083c46' => 
    array (
      0 => '/var/www/html/SHN/modules/dgridproducts/views/templates/admin/product_grid/helpers/list/list_action_duplicate.tpl',
      1 => 1512598745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9100723245c34fe96f026d7-18048990',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'confirm' => 0,
    'location_ok' => 0,
    'location_ko' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34fe96f0b481_86816891',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34fe96f0b481_86816891')) {function content_5c34fe96f0b481_86816891($_smarty_tpl) {?>

<a href="#" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>
" onclick="<?php if ($_smarty_tpl->tpl_vars['confirm']->value) {?>confirm_link('', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['confirm']->value,'html','UTF-8');?>
', '<?php echo smartyTranslate(array('s'=>'Yes','mod'=>'dgridproducts'),$_smarty_tpl);?>
', '<?php echo smartyTranslate(array('s'=>'No','mod'=>'dgridproducts'),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['location_ok']->value,'html','UTF-8');?>
', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['location_ko']->value,'html','UTF-8');?>
')<?php } else { ?>document.location = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['location_ko']->value,'html','UTF-8');?>
'<?php }?>">
	<i class="icon-copy"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value,'html','UTF-8');?>

</a>
<?php }} ?>
