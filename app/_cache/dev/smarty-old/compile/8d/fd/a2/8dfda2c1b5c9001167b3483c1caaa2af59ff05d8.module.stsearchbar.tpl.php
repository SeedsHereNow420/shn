<?php /* Smarty version Smarty-3.1.19, created on 2019-01-03 13:12:37
         compiled from "module:stsearchbar/views/templates/hook/stsearchbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7481109895c2e7ac52712e3-96204837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8dfda2c1b5c9001167b3483c1caaa2af59ff05d8' => 
    array (
      0 => 'module:stsearchbar/views/templates/hook/stsearchbar.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '7481109895c2e7ac52712e3-96204837',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'quick_search_simple' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2e7ac5275190_66663168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2e7ac5275190_66663168')) {function content_5c2e7ac5275190_66663168($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/stsearchbar/views/templates/hook/stsearchbar.tpl -->

<?php if ($_smarty_tpl->tpl_vars['quick_search_simple']->value==1||$_smarty_tpl->tpl_vars['quick_search_simple']->value==2) {?>
<div class="search_widget_simple top_bar_item dropdown_wrap">
	<div class="dropdown_tri header_item link_color" aria-haspopup="true" aria-expanded="false">
		<i class="fto-search-1 fs_lg header_v_align_m"></i>
        <?php if ($_smarty_tpl->tpl_vars['quick_search_simple']->value==2) {?><span class="header_v_align_m"><?php echo smartyTranslate(array('s'=>'Search','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span><?php }?>
	</div>
	<div class="dropdown_list" aria-labelledby="">
		<?php echo $_smarty_tpl->getSubTemplate ('module:stsearchbar/views/templates/hook/stsearchbar-block.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
</div>
<?php } else { ?>
<?php echo $_smarty_tpl->getSubTemplate ('module:stsearchbar/views/templates/hook/stsearchbar-block.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<!-- end /var/www/html/SHN/modules/stsearchbar/views/templates/hook/stsearchbar.tpl --><?php }} ?>
