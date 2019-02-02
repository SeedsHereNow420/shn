<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:55
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/row_variables_description.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13008314095c338f27ba3b69-33050262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a69d89d01e6b829d0a9e8c57906bbf9f423811b' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/row_variables_description.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13008314095c338f27ba3b69-33050262',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'variables' => 0,
    'name' => 0,
    'var_name' => 0,
    'variable' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f27babc02_82709802',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f27babc02_82709802')) {function content_5c338f27babc02_82709802($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['variables']->value)) {?>
<div class="row">
    <div class="col-lg-12">
        <?php if (is_array($_smarty_tpl->tpl_vars['variables']->value)&&count($_smarty_tpl->tpl_vars['variables']->value)) {?>
            <?php  $_smarty_tpl->tpl_vars['variable'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['variable']->_loop = false;
 $_smarty_tpl->tpl_vars['var_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['variables']->value['static']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['variable']->key => $_smarty_tpl->tpl_vars['variable']->value) {
$_smarty_tpl->tpl_vars['variable']->_loop = true;
 $_smarty_tpl->tpl_vars['var_name']->value = $_smarty_tpl->tpl_vars['variable']->key;
?>
                <button type="button" class="btn btn-default" onclick="$('[name=<?php echo trim($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['name']->value,'quotes','UTF-8'));?>
]').insertAtCaretRedactor('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['var_name']->value,'quotes','UTF-8');?>
');">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['variable']->value,'quotes','UTF-8');?>

                </button>
            <?php } ?>
        <?php }?>
    </div>
</div>
<?php }?><?php }} ?>
