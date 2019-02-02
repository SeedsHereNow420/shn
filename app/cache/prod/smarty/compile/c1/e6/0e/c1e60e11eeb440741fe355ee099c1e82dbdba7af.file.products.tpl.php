<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:29
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11957726245c32fdbdb74d98-10525758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1e60e11eeb440741fe355ee099c1e82dbdba7af' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/products.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '3c8645aaddd053dd2333d471317529754b0127d6' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/pagination-infinite.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'ca6253cec57b0c9ce45d5571b9217b31ab4f4cc2' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/pagination.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11957726245c32fdbdb74d98-10525758',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listing' => 0,
    'sttheme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fdbdb98a21_89500785',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fdbdb98a21_89500785')) {function content_5c32fdbdb98a21_89500785($_smarty_tpl) {?>
<div id="js-product-list">
  <?php echo $_smarty_tpl->getSubTemplate ('catalog/_partials/miniatures/list-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['listing']->value['products']), 0);?>


  
    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['infinite_scroll']) {?>
        <?php /*  Call merged included template "_partials/pagination-infinite.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/pagination-infinite.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('pagination'=>$_smarty_tpl->tpl_vars['listing']->value['pagination']), 0, '11957726245c32fdbdb74d98-10525758');
content_5c32fdbdb7b2d3_46555407($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/pagination-infinite.tpl" */?>
    <?php } else { ?>
        <?php /*  Call merged included template "_partials/pagination.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('pagination'=>$_smarty_tpl->tpl_vars['listing']->value['pagination']), 0, '11957726245c32fdbdb74d98-10525758');
content_5c32fdbdb85003_42848478($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/pagination.tpl" */?>
    <?php }?>
  
  
</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:29
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/pagination-infinite.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdbdb7b2d3_46555407')) {function content_5c32fdbdb7b2d3_46555407($_smarty_tpl) {?>

<?php  $_smarty_tpl->tpl_vars["page"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["page"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pagination']->value['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["page"]->key => $_smarty_tpl->tpl_vars["page"]->value) {
$_smarty_tpl->tpl_vars["page"]->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='next'&&$_smarty_tpl->tpl_vars['page']->value['clickable']) {?>
<div class="text-center infinite-box mar_b6 m-t-1">
  <a class="infinite-more-link btn btn-default btn-large <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['infinite_scroll']==1) {?> hidden <?php }?>" data-start="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pagination']->value['items_shown_from'], ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['url'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow <?php echo htmlspecialchars(time(), ENT_QUOTES, 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Load More Products','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a>
</div>
<?php }?>
<?php } ?>
<div class="product_count_infinite fs_md text-center mb-3">
<?php echo smartyTranslate(array('s'=>'Showing %from%-%to% of %total% item(s)','d'=>'Shop.Theme.Catalog','sprintf'=>array('%from%'=>"<span>".((string)$_smarty_tpl->tpl_vars['pagination']->value['items_shown_from'])."</span>",'%to%'=>$_smarty_tpl->tpl_vars['pagination']->value['items_shown_to'],'%total%'=>$_smarty_tpl->tpl_vars['pagination']->value['total_items'])),$_smarty_tpl);?>

</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:29
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/pagination.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdbdb85003_42848478')) {function content_5c32fdbdb85003_42848478($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['is_product_page'] = new Smarty_variable(true, null, 0);?>
<?php $_smarty_tpl->tpl_vars['pagi_class'] = new Smarty_variable('js-search-link', null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['is_blog_fengye']->value)) {?>
  <?php if ((int)$_smarty_tpl->tpl_vars['is_blog_fengye']->value==2) {?>
    <?php $_smarty_tpl->tpl_vars['pagi_class'] = new Smarty_variable('pc-search-link', null, 0);?>
  <?php } else { ?>
    <?php $_smarty_tpl->tpl_vars['is_product_page'] = new Smarty_variable(false, null, 0);?>
  <?php }?>
<?php }?>
<nav class="bottom_pagination flex_box flex_space_between mb-3">
  <div class="product_count">
    
    <?php echo smartyTranslate(array('s'=>'Showing %from%-%to% of %total% item(s)','d'=>'Shop.Theme.Catalog','sprintf'=>array('%from%'=>$_smarty_tpl->tpl_vars['pagination']->value['items_shown_from'],'%to%'=>$_smarty_tpl->tpl_vars['pagination']->value['items_shown_to'],'%total%'=>$_smarty_tpl->tpl_vars['pagination']->value['total_items'])),$_smarty_tpl);?>

    
  </div>
  <nav aria-label="Page navigation">
    
    <ul class="pagination">
      <?php  $_smarty_tpl->tpl_vars["page"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["page"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pagination']->value['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["page"]->key => $_smarty_tpl->tpl_vars["page"]->value) {
$_smarty_tpl->tpl_vars["page"]->_loop = true;
?>
        <li class="page-item <?php if ($_smarty_tpl->tpl_vars['page']->value['current']) {?> active <?php }?> <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames(array('disabled'=>!$_smarty_tpl->tpl_vars['page']->value['clickable'])), ENT_QUOTES, 'UTF-8');?>
">
          <?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='spacer') {?>
            <span class="spacer">&hellip;</span>
          <?php } else { ?>
            <a
              rel="<?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous') {?>prev<?php } elseif ($_smarty_tpl->tpl_vars['page']->value['type']==='next') {?>next<?php } else { ?>nofollow<?php }?>"
              href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['url'], ENT_QUOTES, 'UTF-8');?>
"
              class="page-link <?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous') {?>previous <?php } elseif ($_smarty_tpl->tpl_vars['page']->value['type']==='next') {?>next <?php }?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames(array('disabled'=>!$_smarty_tpl->tpl_vars['page']->value['clickable'],$_smarty_tpl->tpl_vars['pagi_class']->value=>$_smarty_tpl->tpl_vars['is_product_page']->value)), ENT_QUOTES, 'UTF-8');?>
"
              <?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous') {?> aria-label="Previous" <?php } elseif ($_smarty_tpl->tpl_vars['page']->value['type']==='next') {?> aria-label="Next" <?php }?>
            >
              <?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous') {?>
                <i class="fto-left-open-3"></i><span class="sr-only"><?php echo smartyTranslate(array('s'=>'Previous','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span>
              <?php } elseif ($_smarty_tpl->tpl_vars['page']->value['type']==='next') {?>
                <i class="fto-right-open-3"></i><span class="sr-only"><?php echo smartyTranslate(array('s'=>'Next','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span>
              <?php } else { ?>
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>

              <?php }?>
            </a>
          <?php }?>
        </li>
      <?php } ?>
    </ul>
    
  </nav>
</nav>
<?php }} ?>
