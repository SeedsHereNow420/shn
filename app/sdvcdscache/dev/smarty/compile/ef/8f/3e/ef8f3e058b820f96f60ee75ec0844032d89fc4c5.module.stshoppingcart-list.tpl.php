<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:16:48
         compiled from "module:stshoppingcart/views/templates/hook/stshoppingcart-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19305035345c31ab60065f47-90786427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef8f3e058b820f96f60ee75ec0844032d89fc4c5' => 
    array (
      0 => 'module:stshoppingcart/views/templates/hook/stshoppingcart-list.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '19305035345c31ab60065f47-90786427',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'product' => 0,
    'voucher' => 0,
    'subtotal' => 0,
    'cart_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31ab600761f4_40373965',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31ab600761f4_40373965')) {function content_5c31ab600761f4_40373965($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/stshoppingcart/views/templates/hook/stshoppingcart-list.tpl -->      <div class="shoppingcart-list">
      <?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count']) {?>
          <ul class="small_cart_product_list base_list_line medium_list">
            <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
              <li class="line_item"><?php echo $_smarty_tpl->getSubTemplate ('module:stshoppingcart/views/templates/hook/stshoppingcart-product-line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0);?>
</li>
            <?php } ?>
            <?php if ($_smarty_tpl->tpl_vars['cart']->value['vouchers']['added']) {?>
                <?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['voucher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['vouchers']['added']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value) {
$_smarty_tpl->tpl_vars['voucher']->_loop = true;
?>
                  <li class="line_item">
                    <div class="flex_container flex_start">
                      <span class="mar_r4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
                      <span class="mar_r4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['reduction_formatted'], ENT_QUOTES, 'UTF-8');?>
</span>
                      <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['delete_url'], ENT_QUOTES, 'UTF-8');?>
" data-link-action="remove-voucher" class="flex_child" title="<?php echo smartyTranslate(array('s'=>'Remove','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-cancel mar_l4"></i></a>
                    </div>
                  </li>
                <?php } ?>
            <?php }?>
          </ul>
          <div class="small_cart_sumary base_list_line">
            <?php  $_smarty_tpl->tpl_vars["subtotal"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subtotal"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['subtotals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subtotal"]->key => $_smarty_tpl->tpl_vars["subtotal"]->value) {
$_smarty_tpl->tpl_vars["subtotal"]->_loop = true;
?>
              <?php if ($_smarty_tpl->tpl_vars['subtotal']->value['value']&&$_smarty_tpl->tpl_vars['subtotal']->value['type']!=='tax') {?>
                <div class="line_item flex_container flex_space_between">
                  <span class="cart-summary-k">
                    <?php if ('products'==$_smarty_tpl->tpl_vars['subtotal']->value['type']) {?>
                      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['summary_string'], ENT_QUOTES, 'UTF-8');?>

                    <?php } else { ?>
                      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['label'], ENT_QUOTES, 'UTF-8');?>

                    <?php }?>
                  </span>
                  <div class="cart-summary-v price">
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['value'], ENT_QUOTES, 'UTF-8');?>

                    <?php if ($_smarty_tpl->tpl_vars['subtotal']->value['type']==='shipping') {?>
                        <div class="shipping_sub_total_details"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayCheckoutSubtotalDetails','subtotal'=>$_smarty_tpl->tpl_vars['subtotal']->value),$_smarty_tpl);?>
</div>
                    <?php }?>
                  </div>
                  
                </div>
              <?php }?>
            <?php } ?>
            <div class="line_item last_one flex_container flex_space_between">
              <span class="cart-summary-k"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['labels']['tax_short'], ENT_QUOTES, 'UTF-8');?>
</span><span class="cart-summary-v price font-weight-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
            </div>
            <div class="line_item flex_container flex_space_between">
              <span class="cart-summary-k"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['label'], ENT_QUOTES, 'UTF-8');?>
</span><span class="cart-summary-v price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
            </div>
          </div>
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart_url']->value, ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" class="small_cart_btn btn btn-default btn_full_width" title="<?php echo smartyTranslate(array('s'=>'Checkout','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Checkout','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
      <?php } else { ?>
        <div class="cart_empty"><?php echo smartyTranslate(array('s'=>'Your shopping cart is empty.','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</div>
      <?php }?>
      </div><!-- end /var/www/html/SHN/modules/stshoppingcart/views/templates/hook/stshoppingcart-list.tpl --><?php }} ?>
