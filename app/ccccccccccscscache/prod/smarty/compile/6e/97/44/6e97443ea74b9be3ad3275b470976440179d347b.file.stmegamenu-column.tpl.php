<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:29:51
         compiled from "modules/stmegamenu/views/templates/hook/stmegamenu-column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11375289015c31a05f5f6306-37779160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e97443ea74b9be3ad3275b470976440179d347b' => 
    array (
      0 => 'modules/stmegamenu/views/templates/hook/stmegamenu-column.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11375289015c31a05f5f6306-37779160',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stmenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a05f5fa600_66075783',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a05f5fa600_66075783')) {function content_5c31a05f5fa600_66075783($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['stmenu']->value)&&is_array($_smarty_tpl->tpl_vars['stmenu']->value)&&count($_smarty_tpl->tpl_vars['stmenu']->value)) {?>
<!-- Menu -->
<div id="st_mega_menu_column" class="block column_block">
	<h3 class="title_block">
		<span class="title_block_inner">
			<?php echo smartyTranslate(array('s'=>'Categories','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

		</span>
	</h3>
	<div id="st_mega_menu_column_block" class="block_content">
    	<div id="st_mega_menu_column_desktop">
    		<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-ul.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('is_mega_menu_main'=>0), 0);?>

    	</div>
    	<div id="st_mega_menu_column_mobile">
	    	<?php echo $_smarty_tpl->getSubTemplate ("./stmobilemenu-ul.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('is_mega_menu_column'=>1), 0);?>

    	</div>
	</div>
</div>
<!--/ Menu -->
<?php }?><?php }} ?>
