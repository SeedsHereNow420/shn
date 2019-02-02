<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:55
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/btn_radio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12129646035c338f27b43384-90081617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6eebe37cf1f6f4bfe0d7480363ac235e2b5fe0f6' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/btn_radio.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12129646035c338f27b43384-90081617',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'input' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f27b4eb30_15371025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f27b4eb30_15371025')) {function content_5c338f27b4eb30_15371025($_smarty_tpl) {?>

<div class="btn-group btn-group-radio">
	<?php if (isset($_smarty_tpl->tpl_vars['input']->value)&&is_array($_smarty_tpl->tpl_vars['input']->value)&&count($_smarty_tpl->tpl_vars['input']->value)) {?>
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
			<label for="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['input']->value['name'],'quotes','UTF-8');?>
_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['id'],'quotes','UTF-8');?>
">
				<input type="radio" <?php if ($_smarty_tpl->tpl_vars['input']->value['default_id']==$_smarty_tpl->tpl_vars['value']->value['id']) {?>checked<?php }?> name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['input']->value['name'],'quotes','UTF-8');?>
" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['id'],'quotes','UTF-8');?>
" id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['input']->value['name'],'quotes','UTF-8');?>
_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['id'],'quotes','UTF-8');?>
"/>
				<span class="btn btn-default"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['text'],'quotes','UTF-8');?>
</span>
			</label>
		<?php } ?>
	<?php }?>
</div><?php }} ?>
