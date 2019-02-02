<?php /* Smarty version Smarty-3.1.19, created on 2019-01-03 13:12:57
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12673068195c2e7ad9b26856-20846152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b445d67b1b39f20ae3f875107eb2d78ed79aff3' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-details.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12673068195c2e7ad9b26856-20846152',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sttheme' => 0,
    'st_active_pro_tab' => 0,
    'product' => 0,
    'feature' => 0,
    'key' => 0,
    'reference' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2e7ad9b35ff6_31248262',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2e7ad9b35ff6_31248262')) {function content_5c2e7ad9b35ff6_31248262($_smarty_tpl) {?><div role="tabpanel" class="tab-pane <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['remove_product_details_tab']&&$_smarty_tpl->tpl_vars['st_active_pro_tab']->value=='product-details') {?> active <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_tabs_style']==1) {?> st_open <?php }?> <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['remove_product_details_tab']) {?> product-tab-hide <?php }?>"
     id="product-details"
     data-product="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['product']->value['embedded_attributes']), ENT_QUOTES, 'UTF-8');?>
"
  >
    <div class="mobile_tab_title">
        <a href="javascript:;" class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></a>
        <div class="mobile_tab_name"><?php echo smartyTranslate(array('s'=>'Product Details','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</div>
    </div>
    <div class="tab-pane-body">

    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['reference_to_display'])) {?>
      <div class="product-reference">
        <label class="label"><?php echo smartyTranslate(array('s'=>'Reference','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
 </label>
        <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference_to_display'], ENT_QUOTES, 'UTF-8');?>
</span>
      </div>
    <?php }?>

    
      <div class="product-out-of-stock">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'actionProductOutOfStock','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

      </div>
    
    
    
      <?php if ($_smarty_tpl->tpl_vars['product']->value['features']) {?>
        <section class="product-features">
          <h3 class="page_heading"><?php echo smartyTranslate(array('s'=>'Data sheet','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</h3>
            <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
            <dl class="data-sheet flex_container">
              <dt class="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['name'], ENT_QUOTES, 'UTF-8');?>
</dt>
              <dd class="value flex_child"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['value'], ENT_QUOTES, 'UTF-8');?>
</dd>
            </dl>
            <?php } ?>
        </section>
      <?php }?>
    

    
    
      <?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_references'])) {?>
        <section class="product-features">
          <h3 class="page_heading"><?php echo smartyTranslate(array('s'=>'Specific References','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</h3>
            
              <?php  $_smarty_tpl->tpl_vars['reference'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['reference']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['specific_references']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['reference']->key => $_smarty_tpl->tpl_vars['reference']->value) {
$_smarty_tpl->tpl_vars['reference']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['reference']->key;
?>
              <dl class="data-sheet flex_container">
                <dt class="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8');?>
</dt>
                <dd class="value flex_child"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['reference']->value, ENT_QUOTES, 'UTF-8');?>
</dd>
              </dl>
              <?php } ?>
            
        </section>
      <?php }?>
    

    </div>
</div>
<?php }} ?>
