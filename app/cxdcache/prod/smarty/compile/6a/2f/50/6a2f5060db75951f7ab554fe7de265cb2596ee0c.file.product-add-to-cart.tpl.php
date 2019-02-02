<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:06:30
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-add-to-cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9974179605c31a8f607eb75-36394578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a2f5060db75951f7ab554fe7de265cb2596ee0c' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-add-to-cart.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9974179605c31a8f607eb75-36394578',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'configuration' => 0,
    'product' => 0,
    'sttheme' => 0,
    'extra' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a8f6182361_09755526',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a8f6182361_09755526')) {function content_5c31a8f6182361_09755526($_smarty_tpl) {?>


<div class="product-add-to-cart  mb-3">
  <?php if (!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>

    
        <?php if ($_smarty_tpl->tpl_vars['product']->value['show_availability']&&$_smarty_tpl->tpl_vars['product']->value['availability_message']) {?>
        <div id="product-availability" class="<?php if ($_smarty_tpl->tpl_vars['product']->value['availability']=='available') {?> product-available <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['availability']=='last_remaining_items') {?> product-last-items <?php } else { ?> product-unavailable <?php }?> mar_b6 fs_md">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['availability_message'], ENT_QUOTES, 'UTF-8');?>

            
              <?php if ($_smarty_tpl->tpl_vars['product']->value['show_quantities']) {?>
                  <span class="product-quantities" data-stock="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
" data-allow-oosp="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['allow_oosp'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity_label'], ENT_QUOTES, 'UTF-8');?>
</span>
              <?php }?>
            
        </div>
        <?php }?>
    

    
        <?php if ($_smarty_tpl->tpl_vars['product']->value['minimal_quantity']>1) {?>
      <div class="product-minimal-quantity mar_b6">
          <?php echo smartyTranslate(array('s'=>'The minimum purchase order quantity for the product is %quantity%.','d'=>'Shop.Theme.Checkout','sprintf'=>array('%quantity%'=>$_smarty_tpl->tpl_vars['product']->value['minimal_quantity'])),$_smarty_tpl);?>

      </div>
        <?php }?>
    
    
    
      <?php if ($_smarty_tpl->tpl_vars['product']->value['availability_date']) {?>
        <div class="product-availability-date mar_b6">
          <span><?php echo smartyTranslate(array('s'=>'Availability date:','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
 </span> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['availability_date'], ENT_QUOTES, 'UTF-8');?>

        </div>
      <?php }?>
    

    <div class="pro_cart_block flex_container flex_column_sm">
    
      <div class="product-quantity flex_child">
        <div class="qty qty_wrap qty_wrap_big mar_b6 <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_buy_button']) {?> qty_full_width <?php }?>">
          <input
            type="text"
            name="qty"
            id="quantity_wanted"
            value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity_wanted'], ENT_QUOTES, 'UTF-8');?>
"
            class="input-group"
            min="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['minimal_quantity'], ENT_QUOTES, 'UTF-8');?>
"
            aria-label="<?php echo smartyTranslate(array('s'=>'Quantity','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"
          >
        </div>
        <div class="add mar_b6 <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_buy_button']) {?> add_full_width <?php }?>">
          <button class="btn btn-default btn-large add-to-cart btn-full-width btn-spin" data-button-action="add-to-cart" type="submit" <?php if (!$_smarty_tpl->tpl_vars['product']->value['add_to_cart_url']) {?> disabled <?php }?>>
            <i class="fto-glyph icon_btn"></i><span><?php echo smartyTranslate(array('s'=>'Add to cart','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span>
          </button>
        </div>
      </div>
    

      <div class="pro_cart_right">
        <div class="flex_box">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductCartRight'),$_smarty_tpl);?>

        <?php  $_smarty_tpl->tpl_vars['extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['extraContent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['extra']->key => $_smarty_tpl->tpl_vars['extra']->value) {
$_smarty_tpl->tpl_vars['extra']->_loop = true;
?>
          <?php if ($_smarty_tpl->tpl_vars['extra']->value['moduleName']=='stvideo') {?>
              <?php echo $_smarty_tpl->getSubTemplate ("module:stvideo/views/templates/hook/stvideo_link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stvideos'=>$_smarty_tpl->tpl_vars['extra']->value['content'],'video_position'=>array(12)), 0);?>

          <?php }?>
        <?php } ?>
        </div>
      </div>
    </div>
  <?php }?>
</div>

<?php }} ?>
