<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:37:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/addresses.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4180764375c322eb5cd4c78-55604354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef1b214946d00aa0669829b64f37d988f3b80c4c' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/addresses.tpl',
      1 => 1513579246,
      2 => 'file',
    ),
    'c1dd22c22d3b86ef11ef70d5ea8456804fe446b4' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/checkout-step.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'fac4e515a45f5ccb3976e29ee97444239af56935' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/address-selector-block.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4180764375c322eb5cd4c78-55604354',
  'function' => 
  array (
  ),
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
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322eb5d03fb1_61803075',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322eb5d03fb1_61803075')) {function content_5c322eb5d03fb1_61803075($_smarty_tpl) {?>

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
    
  <div class="js-address-form">
    <form
      method="POST"
      action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['order'], ENT_QUOTES, 'UTF-8');?>
"
      data-refresh-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'order','params'=>array('ajax'=>1,'action'=>'addressForm')),$_smarty_tpl);?>
"
    >

      <?php if (!$_smarty_tpl->tpl_vars['use_same_address']->value) {?>
        <h2 class="h4"><?php echo smartyTranslate(array('s'=>'Shipping Address','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</h2>
      <?php }?>

      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayCartRuleAddress"),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['use_same_address']->value&&!$_smarty_tpl->tpl_vars['cart']->value['is_virtual']) {?>
        <p>
          <?php echo smartyTranslate(array('s'=>'The selected address will be used both as your personal address (for invoice) and as your delivery address.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

        </p>
      <?php } elseif ($_smarty_tpl->tpl_vars['use_same_address']->value&&$_smarty_tpl->tpl_vars['cart']->value['is_virtual']) {?>
        <p>
          <?php echo smartyTranslate(array('s'=>'The selected address will be used as your personal address (for invoice).','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

        </p>
      <?php }?>

      <?php if ($_smarty_tpl->tpl_vars['show_delivery_address_form']->value) {?>
        <div id="delivery-address">
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0][0]->smartyRender(array('file'=>'checkout/_partials/address-form.tpl','ui'=>$_smarty_tpl->tpl_vars['address_form']->value,'use_same_address'=>$_smarty_tpl->tpl_vars['use_same_address']->value,'type'=>"delivery",'form_has_continue_button'=>$_smarty_tpl->tpl_vars['form_has_continue_button']->value),$_smarty_tpl);?>

        </div>
      <?php } elseif (count($_smarty_tpl->tpl_vars['customer']->value['addresses'])>0) {?>
        <div id="delivery-addresses" class="address-selector js-address-selector">
          <?php /*  Call merged included template "checkout/_partials/address-selector-block.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/address-selector-block.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('addresses'=>$_smarty_tpl->tpl_vars['customer']->value['addresses'],'name'=>"id_address_delivery",'selected'=>$_smarty_tpl->tpl_vars['id_address_delivery']->value,'type'=>"delivery",'interactive'=>!$_smarty_tpl->tpl_vars['show_delivery_address_form']->value&&!$_smarty_tpl->tpl_vars['show_invoice_address_form']->value), 0, '4180764375c322eb5cd4c78-55604354');
content_5c322eb5ce8a79_79356688($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/address-selector-block.tpl" */?>
        </div>

        <p class="add-address">
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['new_address_delivery_url']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Add new address','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-plus-2 fs_md mar_r4"></i><?php echo smartyTranslate(array('s'=>'Add new address','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
        </p>

        <?php if ($_smarty_tpl->tpl_vars['use_same_address']->value&&!$_smarty_tpl->tpl_vars['cart']->value['is_virtual']) {?>
          <p>
            <a data-link-action="different-invoice-address" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['use_different_address_url']->value, ENT_QUOTES, 'UTF-8');?>
">
              <?php echo smartyTranslate(array('s'=>'Billing address differs from shipping address','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

            </a>
          </p>
        <?php }?>

      <?php }?>

      <?php if (!$_smarty_tpl->tpl_vars['use_same_address']->value) {?>

        <h2 class="h4"><?php echo smartyTranslate(array('s'=>'Your Invoice Address','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</h2>

        <?php if ($_smarty_tpl->tpl_vars['show_invoice_address_form']->value) {?>
          <div id="invoice-address">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0][0]->smartyRender(array('file'=>'checkout/_partials/address-form.tpl','ui'=>$_smarty_tpl->tpl_vars['address_form']->value,'use_same_address'=>$_smarty_tpl->tpl_vars['use_same_address']->value,'type'=>"invoice",'form_has_continue_button'=>$_smarty_tpl->tpl_vars['form_has_continue_button']->value),$_smarty_tpl);?>

          </div>
        <?php } else { ?>
          <div id="invoice-addresses" class="address-selector js-address-selector">
            <?php /*  Call merged included template "checkout/_partials/address-selector-block.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/address-selector-block.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('addresses'=>$_smarty_tpl->tpl_vars['customer']->value['addresses'],'name'=>"id_address_invoice",'selected'=>$_smarty_tpl->tpl_vars['id_address_invoice']->value,'type'=>"invoice",'interactive'=>!$_smarty_tpl->tpl_vars['show_delivery_address_form']->value&&!$_smarty_tpl->tpl_vars['show_invoice_address_form']->value), 0, '4180764375c322eb5cd4c78-55604354');
content_5c322eb5ce8a79_79356688($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/address-selector-block.tpl" */?>
          </div>

          <p class="add-address">
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['new_address_invoice_url']->value, ENT_QUOTES, 'UTF-8');?>
" class="btn btn-default" title="<?php echo smartyTranslate(array('s'=>'Add new address','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-plus-2 fs_md mar_r4"></i><?php echo smartyTranslate(array('s'=>'Add new address','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
          </p>
        <?php }?>

      <?php }?>

      <?php if (!$_smarty_tpl->tpl_vars['form_has_continue_button']->value) {?>
        <div class="">
          <button type="submit" class="btn btn-default continue" name="confirm-addresses" value="1">
              <?php echo smartyTranslate(array('s'=>'Continue','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

          </button>
        </div>
      <?php }?>

    </form>
  </div>

  </div>
</section>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:37:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/address-selector-block.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322eb5ce8a79_79356688')) {function content_5c322eb5ce8a79_79356688($_smarty_tpl) {?>

<div class="row com_grid_view">
<?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['addresses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['address']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value) {
$_smarty_tpl->tpl_vars['address']->_loop = true;
 $_smarty_tpl->tpl_vars['address']->index++;
?>
  <article
    class="address-item<?php if ($_smarty_tpl->tpl_vars['address']->value['id']==$_smarty_tpl->tpl_vars['selected']->value) {?> selected<?php }?> col-md-6 <?php if ($_smarty_tpl->tpl_vars['address']->index%2==0) {?> first-item-of-large-line  first-item-of-desktop-line first-item-of-line <?php }?>"
    id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classname'][0][0]->smartyClassname($_smarty_tpl->tpl_vars['name']->value), ENT_QUOTES, 'UTF-8');?>
-address-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['id'], ENT_QUOTES, 'UTF-8');?>
"
  >
    <div class="card card_trans mb-3">
      <div class="card-block">
        <label class="radio-block">
          <span class="custom-radio">
            <input
              type="radio"
              name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8');?>
"
              value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['id'], ENT_QUOTES, 'UTF-8');?>
"
              <?php if ($_smarty_tpl->tpl_vars['address']->value['id']==$_smarty_tpl->tpl_vars['selected']->value) {?>checked<?php }?>
            >
            <span></span>
          </span>
          <span class="address-alias"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['alias'], ENT_QUOTES, 'UTF-8');?>
</span>
          <div class="address"><?php echo $_smarty_tpl->tpl_vars['address']->value['formatted'];?>
</div>
        </label>
      </div>
      <footer class="address-footer card-footer">
        <?php if ($_smarty_tpl->tpl_vars['interactive']->value) {?>
          <a
            class="edit-address text_color inline_block mar_r6"
            data-link-action="edit-address"
            href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'order','params'=>array('id_address'=>$_smarty_tpl->tpl_vars['address']->value['id'],'editAddress'=>$_smarty_tpl->tpl_vars['type']->value,'token'=>$_smarty_tpl->tpl_vars['token']->value)),$_smarty_tpl);?>
"
            title="<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"
          >
            <i class="fto-edit fs_md mar_r4"></i><?php echo smartyTranslate(array('s'=>'Edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

          </a>
          <a
            class="delete-address text_color inline_block"
            data-link-action="delete-address"
            href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'order','params'=>array('id_address'=>$_smarty_tpl->tpl_vars['address']->value['id'],'deleteAddress'=>true,'token'=>$_smarty_tpl->tpl_vars['token']->value)),$_smarty_tpl);?>
"
            title="<?php echo smartyTranslate(array('s'=>'Delete','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"
          >
            <i class="fto-cancel fs_md mar_r4"></i><?php echo smartyTranslate(array('s'=>'Delete','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

          </a>
        <?php }?>
      </footer>
    </div>
  </article>
<?php } ?>
</div>
<?php if ($_smarty_tpl->tpl_vars['interactive']->value) {?>
  <p>
    <button class="ps-hidden-by-js form-control-submit center-block" type="submit"><?php echo smartyTranslate(array('s'=>'Save','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</button>
  </p>
<?php }?>
<?php }} ?>
