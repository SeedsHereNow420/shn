<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 20:06:11
         compiled from "modules/stshoppingcart/views/templates/hook/stshoppingcart-side.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1601232325c317eb34c5ca3-95659448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0890398f0c2c69200ba815ced21e3983bb6f9782' => 
    array (
      0 => 'modules/stshoppingcart/views/templates/hook/stshoppingcart-side.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1601232325c317eb34c5ca3-95659448',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c317eb34c9b55_47360776',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c317eb34c9b55_47360776')) {function content_5c317eb34c9b55_47360776($_smarty_tpl) {?>
<nav class="st-menu" id="side_products_cart">
	<div class="st-menu-header">
		<h3 class="st-menu-title"><?php echo smartyTranslate(array('s'=>'Shopping cart','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</h3>
    	<a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
	</div>
	<div id="side_cart_block" class="pad_10">
		<?php echo $_smarty_tpl->getSubTemplate ('module:stshoppingcart/views/templates/hook/stshoppingcart-list.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
</nav>
<?php }} ?>
