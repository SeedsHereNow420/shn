<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 11:48:38
         compiled from "/var/www/html/SHN/modules/dgridproducts/views/templates/admin/ajax/tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14256817665c34fe96b45494-33033593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e1cf08a46c633ca99870657305eede7ef448f9c' => 
    array (
      0 => '/var/www/html/SHN/modules/dgridproducts/views/templates/admin/ajax/tree.tpl',
      1 => 1512598745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14256817665c34fe96b45494-33033593',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'view_header' => 0,
    'root' => 0,
    'categories' => 0,
    'class_tree' => 0,
    'id_category' => 0,
    'selected_categories' => 0,
    'category' => 0,
    'multiple' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34fe96b69629_10945943',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34fe96b69629_10945943')) {function content_5c34fe96b69629_10945943($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['view_header']->value)&&$_smarty_tpl->tpl_vars['view_header']->value&&isset($_smarty_tpl->tpl_vars['root']->value)&&$_smarty_tpl->tpl_vars['root']->value) {?>
	<div class="tree_categories_header">
		<a class="collapse_all btn btn-default button" href="#" style="display: none;">
			<i class="icon-collapse-alt"></i>
			<?php echo smartyTranslate(array('s'=>'Collapse all','mod'=>'dgridproducts'),$_smarty_tpl);?>

		</a>
		<a class="expand_all btn btn-default button" href="#">
			<i class="icon-expand-alt"></i>
			<?php echo smartyTranslate(array('s'=>'Expand all','mod'=>'dgridproducts'),$_smarty_tpl);?>

		</a>
		<a class="check_all_associated_categories btn btn-default button" href="#">
			<i class="icon-check-sign"></i>
			<?php echo smartyTranslate(array('s'=>'Check all','mod'=>'dgridproducts'),$_smarty_tpl);?>

		</a>
		<a class="uncheck_all_associated_categories btn btn-default button" href="#">
			<i class="icon-check-empty"></i>
			<?php echo smartyTranslate(array('s'=>'Uncheck all','mod'=>'dgridproducts'),$_smarty_tpl);?>

		</a>
        <span class="twitter-typeahead" style="position: relative; display: inline-block;">
			<input class="tt-hint" type="text" autocomplete="off" spellcheck="off" disabled="" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; background: none 0% 0% / auto repeat scroll padding-box border-box rgb(245, 248, 249);">
			<input type="text" id="associated-categories-tree-categories-search" class="search-field tt-query" placeholder="search..." autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;">
			<span style="position: absolute; left: -9999px; visibility: hidden; white-space: nowrap; font-family: &quot;Open Sans&quot;, Helvetica, Arial, sans-serif, FontAwesome; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;">
			</span>
			<span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;">
			</span>
		</span>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			var categories_for_search = [];
			$('.tree_categories input').each(function(e) {
				categories_for_search[e] = { id : $(this).val(), name : $(this).data('name') };
			});
			$("#associated-categories-tree-categories-search").typeahead({
				name: '',
				valueKey: 'name',
				local: categories_for_search
			});
			$("#associated-categories-tree-categories-search").keypress(function( event ) {
				if ( event.which == 13 ) {
					event.stopPropagation();
				}
			});
		});
		function checkedCaterogy(obj) {
			var selector_category = '.tree_categories input[value='+obj.datum.id+']';
			$(selector_category).attr('checked', 'checked');
			$(selector_category).parent().addClass("tree_selected");
			$(selector_category).parents('ul[class ^= "tree_"]').each(function() {
				$(this).removeClass('tree_close').addClass('tree_open');
				$(this).find('.icon-folder-close').removeClass('icon-folder-close').addClass('icon-folder-open');
			});
		}
	</script>
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
                <li class="tree_item">
                    <span class="tree_label <?php if (isset($_smarty_tpl->tpl_vars['selected_categories']->value)&&in_array($_smarty_tpl->tpl_vars['category']->value['infos']['id_category'],$_smarty_tpl->tpl_vars['selected_categories']->value)) {?>tree_selected<?php }?>">
                        <input data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['category']->value['infos']['name'],'quotes','UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['selected_categories']->value)&&in_array($_smarty_tpl->tpl_vars['category']->value['infos']['id_category'],$_smarty_tpl->tpl_vars['selected_categories']->value)) {?>checked<?php }?> class="tree_input" type="<?php if (isset($_smarty_tpl->tpl_vars['multiple']->value)&&$_smarty_tpl->tpl_vars['multiple']->value) {?>checkbox<?php } else { ?>radio<?php }?>" name="categoryBox[]" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['category']->value['infos']['id_category'],'quotes','UTF-8');?>
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
<?php }?><?php }} ?>
