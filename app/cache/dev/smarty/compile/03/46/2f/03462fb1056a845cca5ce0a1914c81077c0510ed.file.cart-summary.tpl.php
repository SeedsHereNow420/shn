<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 14:28:59
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10050322635c37c72b7aacd7-31172932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03462fb1056a845cca5ce0a1914c81077c0510ed' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'b7ee33a9bbe3dd0bb03f60617e5ecd2861a578e7' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-product-line.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '7854cfa85eaad2cbe759861e7d8fa11f4916203f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-voucher.tpl',
      1 => 1513579246,
      2 => 'file',
    ),
    'dae223970456124496c0c0472e1056f6a2feeef9' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-totals.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10050322635c37c72b7aacd7-31172932',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'urls' => 0,
    'cart' => 0,
    'product' => 0,
    'subtotal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c37c72b7f44f7_56493326',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c37c72b7f44f7_56493326')) {function content_5c37c72b7f44f7_56493326($_smarty_tpl) {?>
<section id="js-checkout-summary" class="js-cart" data-refresh-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
?ajax=1&action=refresh">
  <div class="card-block checkout-summary-block">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayCheckoutSummaryTop'),$_smarty_tpl);?>

    
      <div class="cart-summary-products">

        <div class="mar_b6">
        <a href="#" class="font-weight-bold" data-toggle="collapse" data-target="#cart-summary-product-list">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['summary_string'], ENT_QUOTES, 'UTF-8');?>

            <i class="fto-down-open mar_l4"></i>
        </a>
        </div>

        
          <div class="collapse" id="cart-summary-product-list">
            <ul class="summary-product-list base_list_line dotted_line">
              <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                <li class="summary-product-item flex_container line_item"><?php /*  Call merged included template "checkout/_partials/cart-summary-product-line.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-summary-product-line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, '10050322635c37c72b7aacd7-31172932');
content_5c37c72b7ccdd3_42432183($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-summary-product-line.tpl" */?></li>
              <?php } ?>
            </ul>
          </div>
        
      </div>
    

    
      <?php  $_smarty_tpl->tpl_vars["subtotal"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subtotal"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['subtotals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subtotal"]->key => $_smarty_tpl->tpl_vars["subtotal"]->value) {
$_smarty_tpl->tpl_vars["subtotal"]->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['subtotal']->value&&$_smarty_tpl->tpl_vars['subtotal']->value['type']!=='tax') {?>
          <div class="cart-summary-line clearfix cart-summary-subtotals" id="cart-subtotal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['type'], ENT_QUOTES, 'UTF-8');?>
">
            <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span>
            <span class="value price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['value'], ENT_QUOTES, 'UTF-8');?>
</span>
          </div>
        <?php }?>
      <?php } ?>
    

  </div>

  
    <?php /*  Call merged included template "checkout/_partials/cart-voucher.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-voucher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '10050322635c37c72b7aacd7-31172932');
content_5c37c72b7daf57_07977677($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-voucher.tpl" */?>
  

  <hr>

  
    <?php /*  Call merged included template "checkout/_partials/cart-summary-totals.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-summary-totals.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('cart'=>$_smarty_tpl->tpl_vars['cart']->value), 0, '10050322635c37c72b7aacd7-31172932');
content_5c37c72b7eea04_66470859($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-summary-totals.tpl" */?>
  

</section>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 14:28:59
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-product-line.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c37c72b7ccdd3_42432183')) {function content_5c37c72b7ccdd3_42432183($_smarty_tpl) {?>

  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" class="mar_r6">
    <img class="general_border" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['small']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
  </a>
  <div class="product-quantity mar_r4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
x</div>
  <div class="product-name flex_child mar_r4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</div>
  <div class="summary-product-price">
    <span class="product-price price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl);?>

  </div>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 14:28:59
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-voucher.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c37c72b7daf57_07977677')) {function content_5c37c72b7daf57_07977677($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['cart']->value['vouchers']['allowed']) {?>
  
  <div class="cart-voucher">
  <hr>
    <div class="card-block">
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayCartRuleCartVoucher",'discounts'=>$_smarty_tpl->tpl_vars['cart']->value['vouchers']),$_smarty_tpl);?>

                                <?php if ($_smarty_tpl->tpl_vars['cart']->value['vouchers']['added']) {?>
        <ul class="promo-name mar_b10">
          <?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['voucher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['vouchers']['added']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value) {
$_smarty_tpl->tpl_vars['voucher']->_loop = true;
?>
            
            <li class="cart-summary-line">
              <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
              <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['delete_url'], ENT_QUOTES, 'UTF-8');?>
" data-link-action="remove-voucher" title="<?php echo smartyTranslate(array('s'=>'Remove','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-cancel mar_l4"></i></a>
              <div class="value">
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['reduction_formatted'], ENT_QUOTES, 'UTF-8');?>

              </div>
            </li>
            
          <?php } ?>
        </ul>
      <?php }?>
      <div class="mar_b10">
        <a class="collapse-button promo-code-button go" data-toggle="collapse" href="#promo-code" aria-expanded="false" aria-controls="promo-code">
          <?php echo smartyTranslate(array('s'=>'Have a promo code?','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

        </a>
      </div>
      <div class="promo-code collapse<?php if (count($_smarty_tpl->tpl_vars['cart']->value['discounts'])>0) {?> in<?php }?>" id="promo-code">
        
        <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
" data-link-action="add-voucher" method="post">
          <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
">
          <input type="hidden" name="addDiscount" value="1">
          <div class="input-group mar_b10">
            <input class="promo-input form-control" type="text" name="discount_name" placeholder="<?php echo smartyTranslate(array('s'=>'Promo code','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default"><span><?php echo smartyTranslate(array('s'=>'Add','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span></button>
            </span>
          </div>
        </form>
        
        
        <div class="alert alert-danger js-error" role="alert">
          <span class="js-error-text"></span>
        </div>
        
      </div>
      <?php if (count($_smarty_tpl->tpl_vars['cart']->value['discounts'])>0) {?>
        <p class="block-promo promo-highlighted mar_b10">
          <?php echo smartyTranslate(array('s'=>'Take advantage of our exclusive offers:','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

        </p>
        <ul class="js-discount promo-discounts m-b-0">
        <?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['discounts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
          <li class="cart-summary-line clearfix">
            <span class="label"><span class="code"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['discount']->value['code'], ENT_QUOTES, 'UTF-8');?>
</span> - <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['discount']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
          </li>
        <?php } ?>
        </ul>
      <?php }?>
    </div>
  </div>
  
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 14:28:59
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-totals.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c37c72b7eea04_66470859')) {function content_5c37c72b7eea04_66470859($_smarty_tpl) {?>
<div class="cart-summary-totals card-block">

  
    <div class="cart-summary-line clearfix cart-total">
      <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['labels']['tax_short'], ENT_QUOTES, 'UTF-8');?>
</span>
      <span class="value price fs_lg font-weight-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
  

  
    <div class="cart-summary-line clearfix">
      <span class="label sub"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['label'], ENT_QUOTES, 'UTF-8');?>
</span>
      <span class="value sub price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
  

</div>
<?php }} ?>
