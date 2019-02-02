<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:48:28
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/helpers/tree/tree_node_folder_checkbox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10783515585c31a4bc859252-67946451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa96b8f657aca8f54b90f2115a221e6aff76a6dd' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/tree/tree_node_folder_checkbox.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10783515585c31a4bc859252-67946451',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'node' => 0,
    'root_category' => 0,
    'input_name' => 0,
    'children' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a4bc889875_38887304',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a4bc889875_38887304')) {function content_5c31a4bc889875_38887304($_smarty_tpl) {?>
<li class="tree-folder">
	<span class="tree-folder-name<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled'])&&$_smarty_tpl->tpl_vars['node']->value['disabled']==true) {?> tree-folder-name-disable<?php }?>">
		<?php if (isset($_smarty_tpl->tpl_vars['node']->value['id_category'])&&$_smarty_tpl->tpl_vars['node']->value['id_category']!=$_smarty_tpl->tpl_vars['root_category']->value) {?>
		<input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['input_name']->value;?>
[]" value="<?php echo $_smarty_tpl->tpl_vars['node']->value['id_category'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled'])&&$_smarty_tpl->tpl_vars['node']->value['disabled']==true) {?> disabled="disabled"<?php }?> />
		<?php }?>
		<i class="icon-folder-close"></i>
		<label class="tree-toggler"><?php if (isset($_smarty_tpl->tpl_vars['node']->value['name'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['node']->value['name'],'html','UTF-8');?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['node']->value['selected_childs'])&&(int)$_smarty_tpl->tpl_vars['node']->value['selected_childs']>0) {?> <?php echo smartyTranslate(array('s'=>'(%s selected)','sprintf'=>array($_smarty_tpl->tpl_vars['node']->value['selected_childs'])),$_smarty_tpl);?>
<?php }?></label>
	</span>
	<ul class="tree">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['children']->value,'UTF-8');?>

	</ul>
</li>
<?php }} ?>
