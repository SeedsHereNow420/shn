<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 20:06:23
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/products-top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20661495395c317ebf27e838-97163507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '888c79e44b9c4518f2a8485d9f74d7cafab0aaf6' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/products-top.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '8344a39da65c00eddf475c92a413d30da4e99e32' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/sort-orders.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20661495395c317ebf27e838-97163507',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listing' => 0,
    'filter_position' => 0,
    'sttheme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c317ebf28e0e4_91314941',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c317ebf28e0e4_91314941')) {function content_5c317ebf28e0e4_91314941($_smarty_tpl) {?>
<div id="js-product-list-top" class="products-selection flex_container general_top_border general_bottom_border">
    <?php $_smarty_tpl->tpl_vars['filter_position'] = new Smarty_variable(Configuration::get('STSN_FILTER_POSITION'), null, 0);?>
    <?php if (!empty($_smarty_tpl->tpl_vars['listing']->value['rendered_facets'])&&!$_smarty_tpl->tpl_vars['filter_position']->value) {?>
      <div class="hidden-lg-up filter-button mar_r6">
      <a href="javascript:;" id="search_filter_toggler" data-name="left_column" data-direction="open_column" class="rightbar_tri btn btn-default" title="<?php echo smartyTranslate(array('s'=>'Filter','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Filter','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a><!--to do how to know filters are in left column or right column-->
      </div>
    <?php }?>
  
      
        <?php /*  Call merged included template "catalog/_partials/sort-orders.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/sort-orders.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('sort_orders'=>$_smarty_tpl->tpl_vars['listing']->value['sort_orders']), 0, '20661495395c317ebf27e838-97163507');
content_5c317ebf283123_12251666($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/sort-orders.tpl" */?>
      
  <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_view_swither']) {?>
  <div class="list_grid_switcher">
    <div class="grid <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['list_grid']) {?> selected <?php }?>" title="<?php echo smartyTranslate(array('s'=>'Grid view','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><i class="fto-th-large-1"></i></div>
    <div class="list <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['list_grid']) {?> selected <?php }?>" title="<?php echo smartyTranslate(array('s'=>'List view','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><i class="fto-th-list-1"></i></div>
  </div>
  <?php }?>
  <div class="flex_child">
  </div>
  <?php echo $_smarty_tpl->getSubTemplate ('_partials/pagination-sample.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('pagination'=>$_smarty_tpl->tpl_vars['listing']->value['pagination']), 0);?>

</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 20:06:23
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/sort-orders.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c317ebf283123_12251666')) {function content_5c317ebf283123_12251666($_smarty_tpl) {?>
  <div class="products-sort-order dropdown_wrap mar_r1">
    <a href="javascript:" class="dropdown_tri dropdown_tri_in" rel="nofollow" aria-haspopup="true" aria-expanded="false">
      <?php if (isset($_smarty_tpl->tpl_vars['listing']->value['sort_selected'])&&$_smarty_tpl->tpl_vars['listing']->value['sort_selected']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['listing']->value['sort_selected'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Select','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
<?php }?>
      <i class="fto-angle-down arrow_down arrow"></i>
      <i class="fto-angle-up arrow_up arrow"></i>
    </a>
    <div class="dropdown_list">
      <ul class="dropdown_list_ul dropdown_box">
      <?php  $_smarty_tpl->tpl_vars['sort_order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sort_order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listing']->value['sort_orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sort_order']->key => $_smarty_tpl->tpl_vars['sort_order']->value) {
$_smarty_tpl->tpl_vars['sort_order']->_loop = true;
?>
        <li>
        <a
          rel="nofollow"
          title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sort_order']->value['label'], ENT_QUOTES, 'UTF-8');?>
"
          href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sort_order']->value['url'], ENT_QUOTES, 'UTF-8');?>
"
          class="dropdown_list_item <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames(array('current'=>$_smarty_tpl->tpl_vars['sort_order']->value['current'],'js-search-link'=>true)), ENT_QUOTES, 'UTF-8');?>
 btn-spin js-btn-active"
        >
          <i class="fto-angle-right mar_r4"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sort_order']->value['label'], ENT_QUOTES, 'UTF-8');?>

        </a>
        </li>
      <?php } ?>
      </ul>
    </div>
  </div>
<?php }} ?>
