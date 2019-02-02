<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 03:15:53
         compiled from "module:stsearchbar/views/templates/hook/stsearchbar-block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5531985215c31e369504614-75023429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f8d70bbb3afa862dd31f13e84e74207e71ac6f6' => 
    array (
      0 => 'module:stsearchbar/views/templates/hook/stsearchbar-block.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '5531985215c31e369504614-75023429',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'quick_search_simple' => 0,
    'search_controller_url' => 0,
    'search_string' => 0,
    'quick_search_as_results' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31e36950acb3_67159880',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31e36950acb3_67159880')) {function content_5c31e36950acb3_67159880($_smarty_tpl) {?><div class="search_widget_block search_widget_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['quick_search_simple']->value, ENT_QUOTES, 'UTF-8');?>
">
<div class="search_widget" data-search-controller-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search_controller_url']->value, ENT_QUOTES, 'UTF-8');?>
">
	<form method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search_controller_url']->value, ENT_QUOTES, 'UTF-8');?>
" class="search_widget_form">
		<input type="hidden" name="controller" value="search">
		<div class="search_widget_form_inner input-group round_item js-parent-focus input-group-with-border">
	      <input type="text" class="form-control search_widget_text js-child-focus" name="s" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['search_string']->value, ENT_QUOTES, 'UTF-8');?>
" placeholder="<?php echo smartyTranslate(array('s'=>'Search our catalog','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
	      <span class="input-group-btn">
	        <button class="btn btn-search btn-spin search_widget_btn link_color icon_btn" type="submit"><i class="fto-search-1"></i><span class="icon_text"><?php echo smartyTranslate(array('s'=>'Search','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span></button>
	      </span>
	    </div>

	</form>
	<div class="search_results <?php if ($_smarty_tpl->tpl_vars['quick_search_as_results']->value&1) {?> search_show_img <?php }?><?php if ($_smarty_tpl->tpl_vars['quick_search_as_results']->value&2) {?> search_show_name <?php }?><?php if ($_smarty_tpl->tpl_vars['quick_search_as_results']->value&4) {?> search_show_price <?php }?>"></div>
	<a href="javascript:;" title="<?php echo smartyTranslate(array('s'=>'More products.','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow" class="display_none search_more_products go"><?php echo smartyTranslate(array('s'=>'Click for more products.','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a>
	<div class="display_none search_no_products"><?php echo smartyTranslate(array('s'=>'No produts were found.','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</div>
</div>
</div>
<?php }} ?>
