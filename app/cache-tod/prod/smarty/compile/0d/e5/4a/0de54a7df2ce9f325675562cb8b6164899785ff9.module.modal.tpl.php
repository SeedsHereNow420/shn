<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 03:10:04
         compiled from "module:ps_shoppingcart/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17929203515c31e20c8602e0-17238668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0de54a7df2ce9f325675562cb8b6164899785ff9' => 
    array (
      0 => 'module:ps_shoppingcart/modal.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '17929203515c31e20c8602e0-17238668',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'property' => 0,
    'property_value' => 0,
    'cart' => 0,
    'cart_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31e20c870f37_96005525',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31e20c870f37_96005525')) {function content_5c31e20c870f37_96005525($_smarty_tpl) {?><div id="blockcart-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title h6 text-sm-center" id="myModalLabel"><i class="material-icons">&#xE876;</i><?php echo smartyTranslate(array('s'=>'Product successfully added to your shopping cart','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-5 divide-right">
            <div class="row">
              <div class="col-md-6">
                <img class="product-image" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['medium']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
" itemprop="image">
              </div>
              <div class="col-md-6">
                <h6 class="h6 product-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</h6>
                <p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</p>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl);?>

                <?php  $_smarty_tpl->tpl_vars["property_value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["property_value"]->_loop = false;
 $_smarty_tpl->tpl_vars["property"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["property_value"]->key => $_smarty_tpl->tpl_vars["property_value"]->value) {
$_smarty_tpl->tpl_vars["property_value"]->_loop = true;
 $_smarty_tpl->tpl_vars["property"]->value = $_smarty_tpl->tpl_vars["property_value"]->key;
?>
                  <span><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['property']->value, ENT_QUOTES, 'UTF-8');?>
</strong>: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['property_value']->value, ENT_QUOTES, 'UTF-8');?>
</span><br>
                <?php } ?>
                <p><strong><?php echo smartyTranslate(array('s'=>'Quantity:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</strong>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cart_quantity'], ENT_QUOTES, 'UTF-8');?>
</p>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="cart-content">
              <?php if ($_smarty_tpl->tpl_vars['cart']->value['products_count']>1) {?>
                <p class="cart-products-count"><?php echo smartyTranslate(array('s'=>'There are %products_count% items in your cart.','sprintf'=>array('%products_count%'=>$_smarty_tpl->tpl_vars['cart']->value['products_count']),'d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</p>
              <?php } else { ?>
                <p class="cart-products-count"><?php echo smartyTranslate(array('s'=>'There is %product_count% item in your cart.','sprintf'=>array('%product_count%'=>$_smarty_tpl->tpl_vars['cart']->value['products_count']),'d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</p>
              <?php }?>
              <p><strong><?php echo smartyTranslate(array('s'=>'Total products:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</strong>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['products']['value'], ENT_QUOTES, 'UTF-8');?>
</p>
              <p><strong><?php echo smartyTranslate(array('s'=>'Total shipping:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</strong>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['shipping']['value'], ENT_QUOTES, 'UTF-8');?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayCheckoutSubtotalDetails','subtotal'=>$_smarty_tpl->tpl_vars['cart']->value['subtotals']['shipping']),$_smarty_tpl);?>
</p>
              <?php if ($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']) {?>
              	<p><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['label'], ENT_QUOTES, 'UTF-8');?>
</strong>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['value'], ENT_QUOTES, 'UTF-8');?>
</p>
              <?php }?>
              <p><strong><?php echo smartyTranslate(array('s'=>'Total:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</strong>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['labels']['tax_short'], ENT_QUOTES, 'UTF-8');?>
</p>
              <div class="cart-content-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo smartyTranslate(array('s'=>'Continue shopping','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</button>
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart_url']->value, ENT_QUOTES, 'UTF-8');?>
" class="btn btn-primary"><i class="material-icons">&#xE876;</i><?php echo smartyTranslate(array('s'=>'Proceed to checkout','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }} ?>
