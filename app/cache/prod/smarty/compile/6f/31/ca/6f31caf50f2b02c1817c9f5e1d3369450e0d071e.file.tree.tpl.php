<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:55
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2821452595c338f27b1d197-41600171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f31caf50f2b02c1817c9f5e1d3369450e0d071e' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/tree.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2821452595c338f27b1d197-41600171',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'view_header' => 0,
    'root' => 0,
    'search_view' => 0,
    'categories' => 0,
    'class_tree' => 0,
    'id_category' => 0,
    'category' => 0,
    'selected_categories' => 0,
    'multiple' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f27b3d1c5_41655271',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f27b3d1c5_41655271')) {function content_5c338f27b3d1c5_41655271($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['view_header']->value)&&$_smarty_tpl->tpl_vars['view_header']->value&&isset($_smarty_tpl->tpl_vars['root']->value)&&$_smarty_tpl->tpl_vars['root']->value) {?>
	<div class="tree_categories_header">
		<a class="collapse_all btn btn-default button" href="#" style="display: none;">
			<i class="icon-collapse-alt"></i>
			<?php echo smartyTranslate(array('s'=>'Collapse all','mod'=>'masseditproduct'),$_smarty_tpl);?>

		</a>
		<a class="expand_all btn btn-default button" href="#">
			<i class="icon-expand-alt"></i>
			<?php echo smartyTranslate(array('s'=>'Expand all','mod'=>'masseditproduct'),$_smarty_tpl);?>

		</a>
		<a class="check_all_associated_categories btn btn-default button" href="#">
			<i class="icon-check-sign"></i>
			<?php echo smartyTranslate(array('s'=>'Check all','mod'=>'masseditproduct'),$_smarty_tpl);?>

		</a>
		<a class="uncheck_all_associated_categories btn btn-default button" href="#">
			<i class="icon-check-empty"></i>
			<?php echo smartyTranslate(array('s'=>'Uncheck all','mod'=>'masseditproduct'),$_smarty_tpl);?>

		</a>
			<span class="wrapp_search_category">
				<input type="text" class="search_category">
			</span>
	</div>
	<?php if (isset($_smarty_tpl->tpl_vars['search_view']->value)) {?>
		<div class="wrap_snap_category pull-right">
			<input type="checkbox" id="search_only_default_category" /> <?php echo smartyTranslate(array('s'=>'Only default','mod'=>'masseditproduct'),$_smarty_tpl);?>

		</div>
	<?php } else { ?>
		<div class="wrap_snap_category pull-right">
			<input type="checkbox" id="bind_child" /> <?php echo smartyTranslate(array('s'=>'Snap the child categories','mod'=>'masseditproduct'),$_smarty_tpl);?>

		</div>
	<?php }?>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['categories']->value)) {?>
	<ul <?php if (isset($_smarty_tpl->tpl_vars['root']->value)&&$_smarty_tpl->tpl_vars['root']->value) {?>class="<?php if (isset($_smarty_tpl->tpl_vars['class_tree']->value)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['class_tree']->value,'quotes','UTF-8');?>
<?php } else { ?>tree_categories<?php }?> tree_root"<?php }?>>
        <?php if (isset($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['id_category']->value])) {?>
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['id_category']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                <li class="tree_item <?php if (!$_smarty_tpl->tpl_vars['category']->value['infos']['active']) {?>tree_no_active<?php }?>">
                    <span class="tree_label <?php if (isset($_smarty_tpl->tpl_vars['selected_categories']->value)&&in_array($_smarty_tpl->tpl_vars['category']->value['infos']['id_category'],$_smarty_tpl->tpl_vars['selected_categories']->value)) {?>tree_selected<?php }?>">
                        <input data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['category']->value['infos']['name'],'quotes','UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['selected_categories']->value)&&in_array($_smarty_tpl->tpl_vars['category']->value['infos']['id_category'],$_smarty_tpl->tpl_vars['selected_categories']->value)) {?>checked<?php }?> class="tree_input" type="<?php if (isset($_smarty_tpl->tpl_vars['multiple']->value)&&$_smarty_tpl->tpl_vars['multiple']->value) {?>checkbox<?php } else { ?>radio<?php }?>" name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['name']->value,'quotes','UTF-8');?>
[]" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['category']->value['infos']['id_category'],'quotes','UTF-8');?>
" />
                        <label class="tree_toogle">
                            <?php if (isset($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['category']->value['infos']['id_category']])&&count($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['category']->value['infos']['id_category']])) {?>
                                <i class="icon-folder-close"></i>
                            <?php } else { ?>
                                <i class="tree-dot"></i>
                            <?php }?>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['category']->value['infos']['name'],'quotes','UTF-8');?>

                            <?php if (isset($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['category']->value['infos']['id_category']])&&count($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['category']->value['infos']['id_category']])) {?>
                                <span class="tree_counter"></span>
                            <?php }?>
                        </label>
                    </span>
                    <?php if (isset($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['category']->value['infos']['id_category']])&&count($_smarty_tpl->tpl_vars['categories']->value[$_smarty_tpl->tpl_vars['category']->value['infos']['id_category']])) {?>
                        <?php echo $_smarty_tpl->getSubTemplate ("./tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'id_category'=>$_smarty_tpl->tpl_vars['category']->value['infos']['id_category'],'selected_categories'=>$_smarty_tpl->tpl_vars['selected_categories']->value,'root'=>false), 0);?>

                    <?php }?>
                </li>
            <?php } ?>
        <?php }?>
	</ul>
<?php } elseif ($_smarty_tpl->tpl_vars['root']->value) {?>
	<?php echo smartyTranslate(array('s'=>'Not categories','mod'=>'masseditproduct'),$_smarty_tpl);?>

<?php }?><?php }} ?>
