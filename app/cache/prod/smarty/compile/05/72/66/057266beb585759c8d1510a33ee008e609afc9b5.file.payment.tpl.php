<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 15:16:08
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5842659215c32fdc9267f54-28574601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '057266beb585759c8d1510a33ee008e609afc9b5' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/payment.tpl',
      1 => 1547161879,
      2 => 'file',
    ),
    'c1dd22c22d3b86ef11ef70d5ea8456804fe446b4' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/checkout-step.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '70cad4eb939ed8a1027603948a0324ed54be39be' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/order-confirmation-table.tpl',
      1 => 1513579246,
      2 => 'file',
    ),
    '6dd88759d7860689f1048fd54c9795e0c0f42ea1' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/order-final-summary-table.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '5657ffc4248e79a498116c6208f8965eca4698ad' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/order-final-summary.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5842659215c32fdc9267f54-28574601',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fdc92bdd87_24553160',
  'variables' => 
  array (
    'identifier' => 0,
    'step_is_current' => 0,
    'step_is_reachable' => 0,
    'step_is_complete' => 0,
    'position' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fdc92bdd87_24553160')) {function content_5c32fdc92bdd87_24553160($_smarty_tpl) {?>

<section  id    = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8');?>
"
          class = "<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames(array('checkout-step'=>true,'-current'=>$_smarty_tpl->tpl_vars['step_is_current']->value,'-reachable'=>$_smarty_tpl->tpl_vars['step_is_reachable']->value,'-complete'=>$_smarty_tpl->tpl_vars['step_is_complete']->value,'js-current-step'=>$_smarty_tpl->tpl_vars['step_is_current']->value)), ENT_QUOTES, 'UTF-8');?>
"
>
  <div class="step-title flex_container">
    <div class="heading_color fs_lg font-weight-bold">
      <i class="fto-ok-1 fs_md done"></i>
      <span class="step-number"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['position']->value, ENT_QUOTES, 'UTF-8');?>
</span>
      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>

    </div>
    <a href="javascript:;" class="step-edit text_color" title="<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-edit fs_md mar_r4 edit"></i><?php echo smartyTranslate(array('s'=>'Edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
  </div>

  <div class="content">
    

  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayPaymentTop'),$_smarty_tpl);?>


  <?php if (isset($_smarty_tpl->tpl_vars['is_free']->value)&&$_smarty_tpl->tpl_vars['is_free']->value) {?>
    <p><?php echo smartyTranslate(array('s'=>'No payment needed for this order','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</p>
  <?php }?>
  <div class="payment-options <?php if (isset($_smarty_tpl->tpl_vars['is_free']->value)&&$_smarty_tpl->tpl_vars['is_free']->value) {?>hidden-xs-up<?php }?>">
    <?php  $_smarty_tpl->tpl_vars["module_options"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["module_options"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["module_options"]->key => $_smarty_tpl->tpl_vars["module_options"]->value) {
$_smarty_tpl->tpl_vars["module_options"]->_loop = true;
?>
      <?php  $_smarty_tpl->tpl_vars["option"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["option"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["option"]->key => $_smarty_tpl->tpl_vars["option"]->value) {
$_smarty_tpl->tpl_vars["option"]->_loop = true;
?>
        <div>
          <div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
-container" class="payment-option clearfix">
            
            <span class="custom-radio float-xs-left">
              <input
                class="ps-shown-by-js <?php if ($_smarty_tpl->tpl_vars['option']->value['binary']) {?> binary <?php }?>"
                id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
"
                data-module-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['module_name'], ENT_QUOTES, 'UTF-8');?>
"
                name="payment-option"
                type="radio"
                required
                <?php if ($_smarty_tpl->tpl_vars['selected_payment_option']->value==$_smarty_tpl->tpl_vars['option']->value['id']||(isset($_smarty_tpl->tpl_vars['is_free']->value)&&$_smarty_tpl->tpl_vars['is_free']->value)) {?> checked <?php }?>
              >
              <span></span>
            </span>
            
            <form method="GET" class="ps-hidden-by-js">
              <?php if ($_smarty_tpl->tpl_vars['option']->value['id']===$_smarty_tpl->tpl_vars['selected_payment_option']->value) {?>
                <?php echo smartyTranslate(array('s'=>'Selected','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

              <?php } else { ?>
                <button class="ps-hidden-by-js" type="submit" name="select_payment_option" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
                  <?php echo smartyTranslate(array('s'=>'Choose','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

                </button>
              <?php }?>
            </form>

            <label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
              <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['call_to_action_text'], ENT_QUOTES, 'UTF-8');?>
</span>
              <?php if ($_smarty_tpl->tpl_vars['option']->value['logo']) {?>
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['call_to_action_text'], ENT_QUOTES, 'UTF-8');?>
" />
              <?php }?>
            </label>

          </div>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['option']->value['additionalInformation']) {?>
          <div
            id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
-additional-information"
            class="js-additional-information definition-list additional-information<?php if ($_smarty_tpl->tpl_vars['option']->value['id']!=$_smarty_tpl->tpl_vars['selected_payment_option']->value) {?> ps-hidden <?php }?>"
          >
            <?php echo $_smarty_tpl->tpl_vars['option']->value['additionalInformation'];?>

          </div>
        <?php }?>

        <div
          id="pay-with-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
-form"
          class="js-payment-option-form <?php if ($_smarty_tpl->tpl_vars['option']->value['id']!=$_smarty_tpl->tpl_vars['selected_payment_option']->value) {?> ps-hidden <?php }?>"
        >
          <?php if ($_smarty_tpl->tpl_vars['option']->value['form']) {?>
            <?php echo $_smarty_tpl->tpl_vars['option']->value['form'];?>

          <?php } else { ?>
            <form id="payment-form" method="POST" action="<?php echo $_smarty_tpl->tpl_vars['option']->value['action'];?>
">
              <?php  $_smarty_tpl->tpl_vars['input'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['input']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['option']->value['inputs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['input']->key => $_smarty_tpl->tpl_vars['input']->value) {
$_smarty_tpl->tpl_vars['input']->_loop = true;
?>
                <input type="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input']->value['type'], ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input']->value['name'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input']->value['value'], ENT_QUOTES, 'UTF-8');?>
">
              <?php } ?>
              <button style="display:none" id="pay-with-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8');?>
" type="submit"></button>
            </form>
          <?php }?>
        </div>
      <?php } ?>
    <?php }
if (!$_smarty_tpl->tpl_vars["module_options"]->_loop) {
?>
      <div class="alert alert-danger"><?php echo smartyTranslate(array('s'=>'Unfortunately, there are no payment method available.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</div>
    <?php } ?>
  </div>

  <?php if (count($_smarty_tpl->tpl_vars['conditions_to_approve']->value)) {?>
    <p class="ps-hidden-by-js">
      
      <?php echo smartyTranslate(array('s'=>'By confirming the order, you certify that you have read and agree with all of the conditions below:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

    </p>

    <form id="conditions-to-approve" method="GET">
      <ul>
        <?php  $_smarty_tpl->tpl_vars["condition"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["condition"]->_loop = false;
 $_smarty_tpl->tpl_vars["condition_name"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['conditions_to_approve']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["condition"]->key => $_smarty_tpl->tpl_vars["condition"]->value) {
$_smarty_tpl->tpl_vars["condition"]->_loop = true;
 $_smarty_tpl->tpl_vars["condition_name"]->value = $_smarty_tpl->tpl_vars["condition"]->key;
?>
          <li >
              <span class="custom-input-box">
                <input  id    = "conditions_to_approve[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8');?>
]"
                        name  = "conditions_to_approve[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8');?>
]"
                        required
                        type  = "checkbox"
                        value = "1"
                        class = "ps-shown-by-js custom-input"
                >
                <span class="custom-input-item custom-input-checkbox"><i class="fto-ok-1 checkbox-checked"></i></span>
              </span>
              <label class="js-terms" for="conditions_to_approve[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8');?>
]">
                <?php echo $_smarty_tpl->tpl_vars['condition']->value;?>

              </label>
          </li>
        <?php } ?>
      </ul>
    </form>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['show_final_summary']->value) {?>
    <?php /*  Call merged included template "checkout/_partials/order-final-summary.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/order-final-summary.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '5842659215c32fdc9267f54-28574601');
content_5c37d238c22505_67698855($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/order-final-summary.tpl" */?>
  <?php }?>

  <div id="payment-confirmation">
    <div class="ps-shown-by-js">
      <button type="submit" <?php if (!$_smarty_tpl->tpl_vars['selected_payment_option']->value) {?> disabled <?php }?> class="btn btn-default">
        <?php echo smartyTranslate(array('s'=>'Order with an obligation to pay','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

      </button>
      <?php if ($_smarty_tpl->tpl_vars['show_final_summary']->value) {?>
        <article class="alert alert-danger mt-4 js-alert-payment-conditions" role="alert" data-alert="danger">
          <?php echo smartyTranslate(array('s'=>'Please make sure you\'ve chosen a [1]payment method[/1] and accepted the [2]terms and conditions[/2].','sprintf'=>array('[1]'=>'<a href="#checkout-payment-step">','[/1]'=>'</a>','[2]'=>'<a href="#conditions-to-approve">','[/2]'=>'</a>'),'d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

        </article>
      <?php }?>
    </div>
    <div class="ps-hidden-by-js">
      <?php if ($_smarty_tpl->tpl_vars['selected_payment_option']->value&&$_smarty_tpl->tpl_vars['all_conditions_approved']->value) {?>
        <label for="pay-with-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_payment_option']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Order with an obligation to pay','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</label>
      <?php }?>
    </div>
  </div>

  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayPaymentByBinaries'),$_smarty_tpl);?>


  <div class="modal fade" id="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="st_modal_close" data-dismiss="modal" aria-label="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="js-modal-content general_border p-2"></div>
      </div>
    </div>
  </div>

  </div>
</section>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 15:16:08
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/order-final-summary.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c37d238c22505_67698855')) {function content_5c37d238c22505_67698855($_smarty_tpl) {?>
<section id="order-summary-content" class="page-content page-order-confirmation">
  <h6 class="fs_md heading_color"><?php echo smartyTranslate(array('s'=>'Please check your order before payment','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</h6>
   

  <div class="mar_b10">
    <span class="fs_md heading_color mar_r6">
      <?php echo smartyTranslate(array('s'=>'Addresses','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

    </span>
    <a href="javascript:;" class="step-edit text_color step-to-addresses js-edit-addresses" title="<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-edit fs_md mar_r4 edit"></i></a>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="pad_10 general_border mb-3">
        <div class="heading_color"><?php echo smartyTranslate(array('s'=>'Your Delivery Address','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</div>
        <?php echo $_smarty_tpl->tpl_vars['customer']->value['addresses'][$_smarty_tpl->tpl_vars['cart']->value['id_address_delivery']]['formatted'];?>

      </div>
    </div>
    <div class="col-md-6">
      <div class="pad_10 general_border mb-3">
        <div class="heading_color"><?php echo smartyTranslate(array('s'=>'Your Invoice Address','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</div>
        <?php echo $_smarty_tpl->tpl_vars['customer']->value['addresses'][$_smarty_tpl->tpl_vars['cart']->value['id_address_invoice']]['formatted'];?>

      </div>
    </div>
  </div>

  <div class="mar_b10">
    <span class="fs_md heading_color mar_r6">
      <?php echo smartyTranslate(array('s'=>'Shipping Method','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

    </span>
    <a href="javascript:;" class="step-edit text_color step-to-delivery js-edit-delivery" title="<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-edit fs_md mar_r4 edit"></i></a>
  </div>
  <div class="row summary-selected-carrier order-summary-block">
    <div class="col-md-2">
      <div class="logo-container">
        <?php if ($_smarty_tpl->tpl_vars['selected_delivery_option']->value['logo']) {?>
          <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_delivery_option']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_delivery_option']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
        <?php } else { ?>
          &nbsp;
        <?php }?>
      </div>
    </div>
    <div class="col-md-4">
      <span class="carrier-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_delivery_option']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
    <div class="col-md-4">
      <span class="carrier-delay"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_delivery_option']->value['delay'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
    <div class="col-md-2">
      <span class="carrier-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_delivery_option']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
  </div>

    
      <?php /*  Call merged included template "checkout/_partials/order-final-summary-table.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/order-final-summary-table.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['cart']->value['products'],'products_count'=>$_smarty_tpl->tpl_vars['cart']->value['products_count'],'subtotals'=>$_smarty_tpl->tpl_vars['cart']->value['subtotals'],'totals'=>$_smarty_tpl->tpl_vars['cart']->value['totals'],'labels'=>$_smarty_tpl->tpl_vars['cart']->value['labels'],'add_product_link'=>true), 0, '5842659215c32fdc9267f54-28574601');
content_5c37d238c2e7f9_83275530($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/order-final-summary-table.tpl" */?>
    

</section>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 15:16:08
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/order-final-summary-table.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c37d238c2e7f9_83275530')) {function content_5c37d238c2e7f9_83275530($_smarty_tpl) {?>

<div class="order-confirmation-wrap">
  
<div class="mar_b10">
    <span class="fs_md heading_color mar_r6">
    <?php if ($_smarty_tpl->tpl_vars['products_count']->value==1) {?>
       <?php echo smartyTranslate(array('s'=>'%product_count% item in your cart','sprintf'=>array('%product_count%'=>$_smarty_tpl->tpl_vars['products_count']->value),'d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

    <?php } else { ?>
       <?php echo smartyTranslate(array('s'=>'%products_count% items in your cart','sprintf'=>array('%products_count%'=>$_smarty_tpl->tpl_vars['products_count']->value),'d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

    <?php }?>
    </span>
  	<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'cart','params'=>array('action'=>'show')),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
" class="text_color"><span class="step-edit"><i class="fto-edit fs_md mar_r4 edit"></i></span></a>
</div>

  <div class="order-confirmation-table order-summary-block">
    
      <div class="base_list_line medium_list dotted_line">
      <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <div class="order-line row line_item">
          <div class="col-sm-2 col-3">
            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['cart_default']['url'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['cart_default']['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['cart_default']['height'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
          </div>
          <div class="col-sm-4 col-9 details">
            <?php if ($_smarty_tpl->tpl_vars['add_product_link']->value) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" target="_blank" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php }?>
              <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
            <?php if ($_smarty_tpl->tpl_vars['add_product_link']->value) {?></a><?php }?>
            <?php if (count($_smarty_tpl->tpl_vars['product']->value['customizations'])) {?>
              <?php  $_smarty_tpl->tpl_vars["customization"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["customization"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["customization"]->key => $_smarty_tpl->tpl_vars["customization"]->value) {
$_smarty_tpl->tpl_vars["customization"]->_loop = true;
?>
                <div class="customizations">
                  <a href="#" data-toggle="modal" data-target="#product-customizations-modal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
" data-backdrop=false><?php echo smartyTranslate(array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</a>
                </div>
                <div class="modal fade customization-modal" id="product-customizations-modal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <button type="button" class="st_modal_close" data-dismiss="modal" aria-label="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Shop.Theme'),$_smarty_tpl);?>
">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <div class="modal-body base_list_line general_border">
                        <h6 class="fs_md mb-3"><?php echo smartyTranslate(array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</h6>
                        <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?>
                          <div class="product-customization-line line_item row">
                            <div class="col-sm-3 col-4 label">
                              <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');?>

                            </div>
                            <div class="col-sm-9 col-8 value">
                              <?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='text') {?>
                                <?php if ((int)$_smarty_tpl->tpl_vars['field']->value['id_module']) {?>
                                  <?php echo $_smarty_tpl->tpl_vars['field']->value['text'];?>

                                <?php } else { ?>
                                  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['text'], ENT_QUOTES, 'UTF-8');?>

                                <?php }?>
                              <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='image') {?>
                                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['image']['small']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');?>
">
                              <?php }?>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            <?php }?>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl);?>

          </div>
          <div class="col-sm-6 col-12 qty">
            <div class="row">
              <div class="col-5 text-sm-right text-1"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</div>
              <div class="col-2"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
</div>
              <div class="col-5 text-right bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['total'], ENT_QUOTES, 'UTF-8');?>
</div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    <hr />
    <div class="cart-summary-wrap">
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayCartRuleOrderConfirmation",'order'=>$_smarty_tpl->tpl_vars['order']->value['details']),$_smarty_tpl);?>

                                <?php  $_smarty_tpl->tpl_vars['subtotal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subtotal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subtotals']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subtotal']->key => $_smarty_tpl->tpl_vars['subtotal']->value) {
$_smarty_tpl->tpl_vars['subtotal']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['subtotal']->value['type']!=='tax') {?>
          <div class="cart-summary-line clearfix">
            <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span>
            <span class="value price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['value'], ENT_QUOTES, 'UTF-8');?>
</span>
          </div>
        <?php }?>
      <?php } ?>
      <?php if ($_smarty_tpl->tpl_vars['subtotals']->value['tax']['label']!==null) {?>
          <div class="cart-summary-line clearfix">
            <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span>
            <span class="value price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['value'], ENT_QUOTES, 'UTF-8');?>
</span>
          </div>
      <?php }?>

      <div class="cart-summary-line clearfix cart-total">
        <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['total']['label'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['labels']->value['tax_short'], ENT_QUOTES, 'UTF-8');?>
</span>
        <span class="value price fs_lg font-weight-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['totals']->value['total']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
      </div>
    </div>
    
  </div>
</div>
<?php }} ?>
