<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:09
         compiled from "/var/www/html/SHN/modules/fsadvancedurl//views/templates/admin/css_js.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12539548905c32fda97bc147-80126542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ff70a65d107ff9df738d9d0e80ad14f99f09104' => 
    array (
      0 => '/var/www/html/SHN/modules/fsadvancedurl//views/templates/admin/css_js.tpl',
      1 => 1519199365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12539548905c32fda97bc147-80126542',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fsau_admin_css_js' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fda97c0584_84538391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fda97c0584_84538391')) {function content_5c32fda97c0584_84538391($_smarty_tpl) {?>

<script type="text/javascript">
    var FSAU = FSAU || { };
    FSAU.menu_button_text = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['fsau_admin_css_js']->value['menu_button_text'],'html','UTF-8');?>
';
    FSAU.menu_button_url = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['fsau_admin_css_js']->value['menu_button_url'],'html','UTF-8');?>
';
    FSAU.params_hash = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['fsau_admin_css_js']->value['params_hash'],'html','UTF-8');?>
';
</script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['fsau_admin_css_js']->value['module_path'],'html','UTF-8');?>
views/js/admin.js"></script><?php }} ?>
