<?php /* Smarty version Smarty-3.1.19, created on 2019-01-03 11:38:10
         compiled from "modules/stmegamenu/views/templates/hook/stmegamenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7915752185c2e64a2c02f78-27136932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbc75d3cb36aba9c61b979355a3fdfeb79105753' => 
    array (
      0 => 'modules/stmegamenu/views/templates/hook/stmegamenu.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7915752185c2e64a2c02f78-27136932',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stmenu' => 0,
    'header_bottom' => 0,
    'sttheme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2e64a2c094f2_20521314',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2e64a2c094f2_20521314')) {function content_5c2e64a2c094f2_20521314($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['stmenu']->value)&&is_array($_smarty_tpl->tpl_vars['stmenu']->value)&&count($_smarty_tpl->tpl_vars['stmenu']->value)) {?>
<?php if ($_smarty_tpl->tpl_vars['header_bottom']->value) {?>
<div id="st_mega_menu_container" class="animated fast">
	<div id="st_mega_menu_header_container">
<?php }?>
	<nav id="st_mega_menu_wrap" role="navigation" class="<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['megamenu_position']==3) {?> flex_child flex_full <?php }?>">
		<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-ul.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('is_mega_menu_main'=>1), 0);?>

	</nav>
<?php if ($_smarty_tpl->tpl_vars['header_bottom']->value) {?>
	</div>
</div>
<?php }?>
<?php }?><?php }} ?>
