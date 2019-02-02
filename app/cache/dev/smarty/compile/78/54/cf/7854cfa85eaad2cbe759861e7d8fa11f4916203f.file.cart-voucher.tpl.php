<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:36:38
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-voucher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12321703705c322e96c23259-00959078%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7854cfa85eaad2cbe759861e7d8fa11f4916203f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-voucher.tpl',
      1 => 1513579246,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12321703705c322e96c23259-00959078',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'voucher' => 0,
    'urls' => 0,
    'static_token' => 0,
    'discount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322e96c32e01_24304412',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322e96c32e01_24304412')) {function content_5c322e96c32e01_24304412($_smarty_tpl) {?>
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
