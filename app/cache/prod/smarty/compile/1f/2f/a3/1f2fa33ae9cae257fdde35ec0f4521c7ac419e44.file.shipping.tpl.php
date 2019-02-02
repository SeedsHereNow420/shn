<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:37
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/shipping.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4353262215c32fdc574a946-82392712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f2fa33ae9cae257fdde35ec0f4521c7ac419e44' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/shipping.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'c1dd22c22d3b86ef11ef70d5ea8456804fe446b4' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/checkout-step.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4353262215c32fdc574a946-82392712',
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
  'unifunc' => 'content_5c32fdc57683c3_87828598',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fdc57683c3_87828598')) {function content_5c32fdc57683c3_87828598($_smarty_tpl) {?>

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
    
  <div id="hook-display-before-carrier">
    <?php echo $_smarty_tpl->tpl_vars['hookDisplayBeforeCarrier']->value;?>

  </div>

  <div class="delivery-options-list">
    <?php if (count($_smarty_tpl->tpl_vars['delivery_options']->value)) {?>
      <form
        id="js-delivery"
        data-url-update="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'order','params'=>array('ajax'=>1,'action'=>'selectDeliveryOption')),$_smarty_tpl);?>
"
        method="post"
      >
        <div class="form-fields">
          
            <div class="delivery-options">
              <?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_smarty_tpl->tpl_vars['carrier_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['delivery_options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
 $_smarty_tpl->tpl_vars['carrier_id']->value = $_smarty_tpl->tpl_vars['carrier']->key;
?>
                  <div class="delivery-option flex_container flex_start">
                    <span class="custom-radio m-r-1">
                      <input type="radio" name="delivery_option[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_address']->value, ENT_QUOTES, 'UTF-8');?>
]" id="delivery_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['delivery_option']->value==$_smarty_tpl->tpl_vars['carrier_id']->value) {?> checked<?php }?>>
                      <span></span>
                    </span>
                    <label for="delivery_option_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="flex_child delivery-option-2">
                      <div class="row">
                        <div class="col-md-5">
                            <?php if ($_smarty_tpl->tpl_vars['carrier']->value['logo']) {?>
                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
                            <?php }?>
                            <span class="carrier-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
                        </div>
                        <div class="col-md-4">
                          <span class="carrier-delay"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['delay'], ENT_QUOTES, 'UTF-8');?>
</span>
                        </div>
                        <div class="col-md-3">
                          <span class="carrier-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
                        </div>
                      </div>
                    </label>
                  </div>
                  <div class="row carrier-extra-content"<?php if ($_smarty_tpl->tpl_vars['delivery_option']->value!=$_smarty_tpl->tpl_vars['carrier_id']->value) {?> style="display:none;"<?php }?>>
                    <?php echo $_smarty_tpl->tpl_vars['carrier']->value['extraContent'];?>

                  </div>
                  <div class="clearfix"></div>
              <?php } ?>
            </div>
          
          <div class="order-options">
            <?php if (version_compare($_smarty_tpl->tpl_vars['sttheme']->value['ps_version'],'1.7.1.2','>')) {?>
            <div id="delivery">
              <label for="delivery_message"><?php echo smartyTranslate(array('s'=>'If you would like to add a comment about your order, please write it in the field below.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</label>
              <textarea rows="2" cols="120" id="delivery_message" name="delivery_message"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['delivery_message']->value, ENT_QUOTES, 'UTF-8');?>
</textarea>
            </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['recyclablePackAllowed']->value) {?>
              <span class="custom-input-box">
                <input type="checkbox" id="input_recyclable" name="recyclable" class="custom-input" value="1" <?php if ($_smarty_tpl->tpl_vars['recyclable']->value) {?> checked <?php }?>>
                <span for="input_recyclable" class="custom-input-item custom-input-checkbox"><i class="fto-ok-1 checkbox-checked"></i></span>
                <label><?php echo smartyTranslate(array('s'=>'I would like to receive my order in recycled packaging.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</label>
              </span>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['gift']->value['allowed']) {?>
              <span class="custom-input-box">
                <input class="js-gift-checkbox" id="input_gift" name="gift" type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['gift']->value['isGift']) {?>checked="checked"<?php }?>>
                <span for="input_gift" class="custom-input-item custom-input-checkbox"><i class="fto-ok-1 checkbox-checked"></i></span>
                <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gift']->value['label'], ENT_QUOTES, 'UTF-8');?>
</label >
              </span>

              <div id="gift" class="collapse<?php if ($_smarty_tpl->tpl_vars['gift']->value['isGift']) {?> in<?php }?>">
                <label for="gift_message"><?php echo smartyTranslate(array('s'=>'If you\'d like, you can add a note to the gift:','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</label>
                <textarea rows="2" cols="120" id="gift_message" name="gift_message"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gift']->value['message'], ENT_QUOTES, 'UTF-8');?>
</textarea>
              </div>

            <?php }?>
          </div>
        </div>
        <button type="submit" class="continue btn btn-default" name="confirmDeliveryOption" value="1">
          <?php echo smartyTranslate(array('s'=>'Continue','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

        </button>
      </form>
    <?php } else { ?>
      <p class="alert alert-danger"><?php echo smartyTranslate(array('s'=>'Unfortunately, there are no carriers available for your delivery address.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</p>
    <?php }?>
  </div>

  <div id="hook-display-after-carrier">
    <?php echo $_smarty_tpl->tpl_vars['hookDisplayAfterCarrier']->value;?>

  </div>

  <div id="extra_carrier"></div>

  </div>
</section>
<?php }} ?>
