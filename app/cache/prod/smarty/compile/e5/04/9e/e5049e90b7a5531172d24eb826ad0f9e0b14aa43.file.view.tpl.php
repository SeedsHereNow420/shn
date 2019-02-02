<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:34:17
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/helpers/view/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21057722725c338d9959bd54-88672673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e5049e90b7a5531172d24eb826ad0f9e0b14aa43' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '7cac1082554124db66226276f88c32a350f4f98e' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '03dc19e96253a630e0412a34070340b02a268a65' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_documents.tpl',
      1 => 1515322500,
      2 => 'file',
    ),
    'e3c17c17cdb3a493bd01fe221f588141a404e872' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_shipping.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '045f9e4c7f1e60c3124c5268325f5f46f3211d6c' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_customized_data.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '9bd88eefdda2fe05b911afdc568b4a5abdf76688' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_product_line.tpl',
      1 => 1513708271,
      2 => 'file',
    ),
    'd7a448875a37bf3d8ce4d3c2859ff791a564ebb5' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_new_product.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '148bb2a8927b0d5a967f452db3a1de951f43965f' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_discount_form.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21057722725c338d9959bd54-88672673',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name_controller' => 0,
    'hookName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338d9a4e9ee8_50615383',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338d9a4e9ee8_50615383')) {function content_5c338d9a4e9ee8_50615383($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_regex_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.regex_replace.php';
?>

<div class="leadin"></div>


  <script type="text/javascript">
  var admin_order_tab_link = "<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'));?>
";
  var id_order = <?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
;
  var id_lang = <?php echo $_smarty_tpl->tpl_vars['current_id_lang']->value;?>
;
  var id_currency = <?php echo $_smarty_tpl->tpl_vars['order']->value->id_currency;?>
;
  var id_customer = <?php echo intval($_smarty_tpl->tpl_vars['order']->value->id_customer);?>
;
  <?php $_smarty_tpl->tpl_vars['PS_TAX_ADDRESS_TYPE'] = new Smarty_variable(Configuration::get('PS_TAX_ADDRESS_TYPE'), null, 0);?>
  var id_address = <?php echo $_smarty_tpl->tpl_vars['order']->value->{$_smarty_tpl->tpl_vars['PS_TAX_ADDRESS_TYPE']->value};?>
;
  var currency_sign = "<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
";
  var currency_format = "<?php echo $_smarty_tpl->tpl_vars['currency']->value->format;?>
";
  var currency_blank = "<?php echo $_smarty_tpl->tpl_vars['currency']->value->blank;?>
";
  var priceDisplayPrecision = <?php echo intval(@constant('_PS_PRICE_DISPLAY_PRECISION_'));?>
;
  var use_taxes = <?php if ($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_INC')) {?>true<?php } else { ?>false<?php }?>;
  var stock_management = <?php echo intval($_smarty_tpl->tpl_vars['stock_management']->value);?>
;
  var txt_add_product_stock_issue = "<?php echo smartyTranslate(array('s'=>'Are you sure you want to add this quantity?','d'=>'Admin.Orderscustomers.Notification','js'=>1),$_smarty_tpl);?>
";
  var txt_add_product_new_invoice = "<?php echo smartyTranslate(array('s'=>'Are you sure you want to create a new invoice?','d'=>'Admin.Orderscustomers.Notification','js'=>1),$_smarty_tpl);?>
";
  var txt_add_product_no_product = "<?php echo smartyTranslate(array('s'=>'Error: No product has been selected','d'=>'Admin.Orderscustomers.Notification','js'=>1),$_smarty_tpl);?>
";
  var txt_add_product_no_product_quantity = "<?php echo smartyTranslate(array('s'=>'Error: Quantity of products must be set','d'=>'Admin.Orderscustomers.Notification','js'=>1),$_smarty_tpl);?>
";
  var txt_add_product_no_product_price = "<?php echo smartyTranslate(array('s'=>'Error: Product price must be set','d'=>'Admin.Orderscustomers.Notification','js'=>1),$_smarty_tpl);?>
";
  var txt_confirm = "<?php echo smartyTranslate(array('s'=>'Are you sure?','d'=>'Admin.Notifications.Warning','js'=>1),$_smarty_tpl);?>
";
  var statesShipped = new Array();
  var has_voucher = <?php if (count($_smarty_tpl->tpl_vars['discounts']->value)) {?>1<?php } else { ?>0<?php }?>;
  <?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
    <?php if ((isset($_smarty_tpl->tpl_vars['currentState']->value->shipped)&&!$_smarty_tpl->tpl_vars['currentState']->value->shipped&&$_smarty_tpl->tpl_vars['state']->value['shipped'])) {?>
      statesShipped.push(<?php echo $_smarty_tpl->tpl_vars['state']->value['id_order_state'];?>
);
    <?php }?>
  <?php } ?>
  var order_discount_price = <?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
                  <?php echo $_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl;?>

                <?php } else { ?>
                  <?php echo $_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl;?>

                <?php }?>;

  var errorRefund = "<?php echo smartyTranslate(array('s'=>'Error. You cannot refund a negative amount.','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>
";
  </script>

  <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayInvoice",'id_order'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["hook_invoice"] = new Smarty_variable($_tmp1, null, 0);?>
  <?php if (($_smarty_tpl->tpl_vars['hook_invoice']->value)) {?>
  <div><?php echo $_smarty_tpl->tpl_vars['hook_invoice']->value;?>
</div>
  <?php }?>

  <div class="panel kpi-container">
    <div class="row">
      <div class="col-xs-6 col-sm-3 box-stats color3" >
        <div class="kpi-content">
          <i class="icon-calendar-empty"></i>
          <span class="title"><?php echo smartyTranslate(array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
          <span class="value"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['order']->value->date_add,'full'=>false),$_smarty_tpl);?>
</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-3 box-stats color4" >
        <div class="kpi-content">
          <i class="icon-money"></i>
          <span class="title"><?php echo smartyTranslate(array('s'=>'Total','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
          <span class="value"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
</span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-3 box-stats color2" >
        <div class="kpi-content">
          <i class="icon-comments"></i>
          <span class="title"><?php echo smartyTranslate(array('s'=>'Messages','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
          <span class="value"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomerThreads'),'html','UTF-8');?>
&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
"><?php echo sizeof($_smarty_tpl->tpl_vars['customer_thread_message']->value);?>
</a></span>
        </div>
      </div>
      <div class="col-xs-6 col-sm-3 box-stats color1" >
        <a href="#start_products">
          <div class="kpi-content">
            <i class="icon-book"></i>
            <span class="title"><?php echo smartyTranslate(array('s'=>'Products','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
            <span class="value"><?php echo sizeof($_smarty_tpl->tpl_vars['products']->value);?>
</span>
          </div>
        </a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-7">
      <div class="panel">
        <div class="panel-heading">
          <i class="icon-credit-card"></i>
          <?php echo smartyTranslate(array('s'=>'Order','d'=>'Admin.Global'),$_smarty_tpl);?>

          <span class="badge"><?php echo $_smarty_tpl->tpl_vars['order']->value->reference;?>
</span>
          <span class="badge"><?php echo smartyTranslate(array('s'=>"#",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</span>
          <div class="panel-heading-action">
            <div class="btn-group">
              <a class="btn btn-default<?php if (!$_smarty_tpl->tpl_vars['previousOrder']->value) {?> disabled<?php }?>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;vieworder&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['previousOrder']->value);?>
">
                <i class="icon-backward"></i>
              </a>
              <a class="btn btn-default<?php if (!$_smarty_tpl->tpl_vars['nextOrder']->value) {?> disabled<?php }?>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;vieworder&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['nextOrder']->value);?>
">
                <i class="icon-forward"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- Orders Actions -->
        <div class="well hidden-print">
          <a class="btn btn-default" href="javascript:window.print()">
            <i class="icon-print"></i>
            <?php echo smartyTranslate(array('s'=>'Print order','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

          </a>
          &nbsp;
          <?php if (Configuration::get('PS_INVOICE')&&count($_smarty_tpl->tpl_vars['invoices_collection']->value)&&$_smarty_tpl->tpl_vars['order']->value->invoice_number) {?>
            <a data-selenium-id="view_invoice" class="btn btn-default _blank" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'html','UTF-8');?>
&amp;submitAction=generateInvoicePDF&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
">
              <i class="icon-file"></i>
              <?php echo smartyTranslate(array('s'=>'View invoice','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

            </a>
          <?php } else { ?>
            <span class="span label label-inactive">
              <i class="icon-remove"></i>
              <?php echo smartyTranslate(array('s'=>'No invoice','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

            </span>
          <?php }?>
          &nbsp;
          <?php if ($_smarty_tpl->tpl_vars['order']->value->delivery_number) {?>
            <a class="btn btn-default _blank"  href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'html','UTF-8');?>
&amp;submitAction=generateDeliverySlipPDF&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
">
              <i class="icon-truck"></i>
              <?php echo smartyTranslate(array('s'=>'View delivery slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

            </a>
          <?php } else { ?>
            <span class="span label label-inactive">
              <i class="icon-remove"></i>
              <?php echo smartyTranslate(array('s'=>'No delivery slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

            </span>
          <?php }?>
          &nbsp;
          <?php if (Configuration::get('PS_ORDER_RETURN')) {?>
            <a id="desc-order-standard_refund" class="btn btn-default" href="#refundForm">
              <i class="icon-exchange"></i>
              <?php if ($_smarty_tpl->tpl_vars['order']->value->hasBeenShipped()) {?>
                <?php echo smartyTranslate(array('s'=>'Return products','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

              <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid()) {?>
                <?php echo smartyTranslate(array('s'=>'Standard refund','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

              <?php } else { ?>
                <?php echo smartyTranslate(array('s'=>'Cancel products','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

              <?php }?>
            </a>
            &nbsp;
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['order']->value->hasInvoice()) {?>
            <a id="desc-order-partial_refund" class="btn btn-default" href="#refundForm">
              <i class="icon-exchange"></i>
              <?php echo smartyTranslate(array('s'=>'Partial refund','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

            </a>
          <?php }?>
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBackOfficeOrderActions','id_order'=>intval($_smarty_tpl->tpl_vars['order']->value->id)),$_smarty_tpl);?>

        </div>
        <!-- Tab nav -->
        <ul class="nav nav-tabs" id="tabOrder">
          <?php echo $_smarty_tpl->tpl_vars['HOOK_TAB_ORDER']->value;?>

          <li class="active">
            <a href="#status">
              <i class="icon-time"></i>
              <?php echo smartyTranslate(array('s'=>'Status','d'=>'Admin.Global'),$_smarty_tpl);?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['history']->value);?>
</span>
            </a>
          </li>
          <li>
            <a href="#documents">
              <i class="icon-file-text"></i>
              <?php echo smartyTranslate(array('s'=>'Documents','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['order']->value->getDocuments());?>
</span>
            </a>
          </li>
        </ul>
        <!-- Tab content -->
        <div class="tab-content panel">
          <?php echo $_smarty_tpl->tpl_vars['HOOK_CONTENT_ORDER']->value;?>

          <!-- Tab status -->
          <div class="tab-pane active" id="status">
            <h4 class="visible-print"><?php echo smartyTranslate(array('s'=>'Status','d'=>'Admin.Global'),$_smarty_tpl);?>
 <span class="badge">(<?php echo count($_smarty_tpl->tpl_vars['history']->value);?>
)</span></h4>
            <!-- History of status -->
            <div class="table-responsive">
              <table class="table history-status row-margin-bottom">
                <tbody>
                  <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['history']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['row']->key;
?>
                    <?php if (($_smarty_tpl->tpl_vars['key']->value==0)) {?>
                      <tr>
                        <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
"><img src="../img/os/<?php echo intval($_smarty_tpl->tpl_vars['row']->value['id_order_state']);?>
.gif" width="16" height="16" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['ostate_name']);?>
" /></td>
                        <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['row']->value['text-color'];?>
"><?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['ostate_name']);?>
</td>
                        <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['row']->value['text-color'];?>
"><?php if ($_smarty_tpl->tpl_vars['row']->value['employee_lastname']) {?><?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['employee_firstname']);?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['employee_lastname']);?>
<?php }?></td>
                        <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['row']->value['text-color'];?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['row']->value['date_add'],'full'=>true),$_smarty_tpl);?>
</td>
                        <td style="background-color:<?php echo $_smarty_tpl->tpl_vars['row']->value['color'];?>
;color:<?php echo $_smarty_tpl->tpl_vars['row']->value['text-color'];?>
" class="text-right">
                          <?php if (intval($_smarty_tpl->tpl_vars['row']->value['send_email'])) {?>
                            <a class="btn btn-default" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;vieworder&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
&amp;sendStateEmail=<?php echo intval($_smarty_tpl->tpl_vars['row']->value['id_order_state']);?>
&amp;id_order_history=<?php echo intval($_smarty_tpl->tpl_vars['row']->value['id_order_history']);?>
" title="<?php echo smartyTranslate(array('s'=>'Resend this email to the customer','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl);?>
">
                              <i class="icon-mail-reply"></i>
                              <?php echo smartyTranslate(array('s'=>'Resend email','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                            </a>
                          <?php }?>
                        </td>
                      </tr>
                    <?php } else { ?>
                      <tr>
                        <td><img src="../img/os/<?php echo intval($_smarty_tpl->tpl_vars['row']->value['id_order_state']);?>
.gif" width="16" height="16" /></td>
                        <td><?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['ostate_name']);?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['row']->value['employee_lastname']) {?><?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['employee_firstname']);?>
 <?php echo stripslashes($_smarty_tpl->tpl_vars['row']->value['employee_lastname']);?>
<?php } else { ?>&nbsp;<?php }?></td>
                        <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['row']->value['date_add'],'full'=>true),$_smarty_tpl);?>
</td>
                        <td class="text-right">
                          <?php if (intval($_smarty_tpl->tpl_vars['row']->value['send_email'])) {?>
                            <a class="btn btn-default" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;vieworder&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
&amp;sendStateEmail=<?php echo intval($_smarty_tpl->tpl_vars['row']->value['id_order_state']);?>
&amp;id_order_history=<?php echo intval($_smarty_tpl->tpl_vars['row']->value['id_order_history']);?>
" title="<?php echo smartyTranslate(array('s'=>'Resend this email to the customer','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl);?>
">
                              <i class="icon-mail-reply"></i>
                              <?php echo smartyTranslate(array('s'=>'Resend email','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                            </a>
                          <?php }?>
                        </td>
                      </tr>
                    <?php }?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- Change status form -->
            <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8');?>
&amp;vieworder&amp;token=<?php echo $_GET['token'];?>
" method="post" class="form-horizontal well hidden-print">
              <div class="row">
                <div class="col-lg-9">
                  <select id="id_order_state" class="chosen form-control" name="id_order_state">
                  <?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
                    <option value="<?php echo intval($_smarty_tpl->tpl_vars['state']->value['id_order_state']);?>
"<?php if (isset($_smarty_tpl->tpl_vars['currentState']->value)&&$_smarty_tpl->tpl_vars['state']->value['id_order_state']==$_smarty_tpl->tpl_vars['currentState']->value->id) {?> selected="selected" disabled="disabled"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['state']->value['name']);?>
</option>
                  <?php } ?>
                  </select>
                  <input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" />
                </div>
                <div class="col-lg-3">
                  <button type="submit" name="submitState" class="btn btn-primary">
                    <?php echo smartyTranslate(array('s'=>'Update status','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                  </button>
                </div>
              </div>
            </form>
          </div>
          <!-- Tab documents -->
          <div class="tab-pane" id="documents">
            <h4 class="visible-print"><?php echo smartyTranslate(array('s'=>'Documents','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <span class="badge">(<?php echo count($_smarty_tpl->tpl_vars['order']->value->getDocuments());?>
)</span></h4>
            
            <?php /*  Call merged included template "controllers/orders/_documents.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('controllers/orders/_documents.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '21057722725c338d9959bd54-88672673');
content_5c338d99601674_43476255($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "controllers/orders/_documents.tpl" */?>
          </div>
        </div>
        <script>
          $('#tabOrder a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
          })
        </script>
        <hr />
        <!-- Tab nav -->
        <ul class="nav nav-tabs" id="myTab">
          <?php echo $_smarty_tpl->tpl_vars['HOOK_TAB_SHIP']->value;?>

          <li class="active">
            <a href="#shipping">
              <i class="icon-truck "></i>
              <?php echo smartyTranslate(array('s'=>'Shipping','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['order']->value->getShipping());?>
</span>
            </a>
          </li>
          <li>
            <a href="#returns">
              <i class="icon-undo"></i>
              <?php echo smartyTranslate(array('s'=>'Merchandise Returns','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['order']->value->getReturn());?>
</span>
            </a>
          </li>
        </ul>
        <!-- Tab content -->
        <div class="tab-content panel">
        <?php echo $_smarty_tpl->tpl_vars['HOOK_CONTENT_SHIP']->value;?>

          <!-- Tab shipping -->
          <div class="tab-pane active" id="shipping">
            <h4 class="visible-print"><?php echo smartyTranslate(array('s'=>'Shipping','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
 <span class="badge">(<?php echo count($_smarty_tpl->tpl_vars['order']->value->getShipping());?>
)</span></h4>
            <!-- Shipping block -->
            <?php if (!$_smarty_tpl->tpl_vars['order']->value->isVirtual()) {?>
            <div class="form-horizontal">
              <?php if ($_smarty_tpl->tpl_vars['order']->value->gift_message) {?>
              <div class="form-group">
                <label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Message','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
                <div class="col-lg-9">
                  <p class="form-control-static"><?php echo nl2br($_smarty_tpl->tpl_vars['order']->value->gift_message);?>
</p>
                </div>
              </div>
              <?php }?>
              <?php /*  Call merged included template "controllers/orders/_shipping.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('controllers/orders/_shipping.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '21057722725c338d9959bd54-88672673');
content_5c338d996854c7_47039033($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "controllers/orders/_shipping.tpl" */?>
              <?php if ($_smarty_tpl->tpl_vars['carrierModuleCall']->value) {?>
                <?php echo $_smarty_tpl->tpl_vars['carrierModuleCall']->value;?>

              <?php }?>
              <hr />
              <?php if ($_smarty_tpl->tpl_vars['order']->value->recyclable) {?>
                <span class="label label-success"><i class="icon-check"></i> <?php echo smartyTranslate(array('s'=>'Recycled packaging','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
              <?php } else { ?>
                <span class="label label-inactive"><i class="icon-remove"></i> <?php echo smartyTranslate(array('s'=>'Recycled packaging','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
              <?php }?>

              <?php if ($_smarty_tpl->tpl_vars['order']->value->gift) {?>
                <span class="label label-success"><i class="icon-check"></i> <?php echo smartyTranslate(array('s'=>'Gift wrapping','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
              <?php } else { ?>
                <span class="label label-inactive"><i class="icon-remove"></i> <?php echo smartyTranslate(array('s'=>'Gift wrapping','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
              <?php }?>
            </div>
            <?php }?>
          </div>
          <!-- Tab returns -->
          <div class="tab-pane" id="returns">
            <h4 class="visible-print"><?php echo smartyTranslate(array('s'=>'Merchandise Returns','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <span class="badge">(<?php echo count($_smarty_tpl->tpl_vars['order']->value->getReturn());?>
)</span></h4>
            <?php if (!$_smarty_tpl->tpl_vars['order']->value->isVirtual()) {?>
            <!-- Return block -->
              <?php if (count($_smarty_tpl->tpl_vars['order']->value->getReturn())>0) {?>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
                      <th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Type','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
                      <th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</span></th>
                      <th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Tracking number','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value->getReturn(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
                    <tr>
                      <td><?php echo $_smarty_tpl->tpl_vars['line']->value['date_add'];?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['line']->value['type'];?>
</td>
                      <td><?php echo $_smarty_tpl->tpl_vars['line']->value['state_name'];?>
</td>
                      <td class="actions">
                        <span class="shipping_number_show"><?php if (isset($_smarty_tpl->tpl_vars['line']->value['url'])&&isset($_smarty_tpl->tpl_vars['line']->value['tracking_number'])) {?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(smarty_modifier_replace($_smarty_tpl->tpl_vars['line']->value['url'],'@',$_smarty_tpl->tpl_vars['line']->value['tracking_number']),'html','UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['line']->value['tracking_number'];?>
</a><?php } elseif (isset($_smarty_tpl->tpl_vars['line']->value['tracking_number'])) {?><?php echo $_smarty_tpl->tpl_vars['line']->value['tracking_number'];?>
<?php }?></span>
                        <?php if ($_smarty_tpl->tpl_vars['line']->value['can_edit']) {?>
                        <form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;vieworder&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
&amp;id_order_invoice=<?php if ($_smarty_tpl->tpl_vars['line']->value['id_order_invoice']) {?><?php echo intval($_smarty_tpl->tpl_vars['line']->value['id_order_invoice']);?>
<?php } else { ?>0<?php }?>&amp;id_carrier=<?php if ($_smarty_tpl->tpl_vars['line']->value['id_carrier']) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['line']->value['id_carrier'],'html','UTF-8');?>
<?php } else { ?>0<?php }?>">
                          <span class="shipping_number_edit" style="display:none;">
                            <button type="button" name="tracking_number">
                              <?php echo htmlentities($_smarty_tpl->tpl_vars['line']->value['tracking_number']);?>

                            </button>
                            <button type="submit" class="btn btn-default" name="submitShippingNumber">
                              <?php echo smartyTranslate(array('s'=>'Update','d'=>'Admin.Actions'),$_smarty_tpl);?>

                            </button>
                          </span>
                          <button href="#" class="edit_shipping_number_link">
                            <i class="icon-pencil"></i>
                            <?php echo smartyTranslate(array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl);?>

                          </button>
                          <button href="#" class="cancel_shipping_number_link" style="display: none;">
                            <i class="icon-remove"></i>
                            <?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>

                          </button>
                        </form>
                        <?php }?>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <?php } else { ?>
              <div class="list-empty hidden-print">
                <div class="list-empty-msg">
                  <i class="icon-warning-sign list-empty-icon"></i>
                  <?php echo smartyTranslate(array('s'=>'No merchandise returned yet','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

                </div>
              </div>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['carrierModuleCall']->value) {?>
                <?php echo $_smarty_tpl->tpl_vars['carrierModuleCall']->value;?>

              <?php }?>
            <?php }?>
          </div>
        </div>
        <script>
          $('#myTab a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
          })
        </script>
      </div>
      <!-- Payments block -->
      <div id="formAddPaymentPanel" class="panel">
        <div class="panel-heading">
          <i class="icon-money"></i>
          <?php echo smartyTranslate(array('s'=>"Payment",'d'=>'Admin.Global'),$_smarty_tpl);?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['order']->value->getOrderPayments());?>
</span>
        </div>
        <?php if (count($_smarty_tpl->tpl_vars['order']->value->getOrderPayments())>0) {?>
          <p class="alert alert-danger"<?php if (round($_smarty_tpl->tpl_vars['orders_total_paid_tax_incl']->value,2)==round($_smarty_tpl->tpl_vars['total_paid']->value,2)||(isset($_smarty_tpl->tpl_vars['currentState']->value)&&$_smarty_tpl->tpl_vars['currentState']->value->id==6)) {?> style="display: none;"<?php }?>>
            <?php echo smartyTranslate(array('s'=>'Warning','d'=>'Admin.Global'),$_smarty_tpl);?>

            <strong><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_paid']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
</strong>
            <?php echo smartyTranslate(array('s'=>'paid instead of','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

            <strong class="total_paid"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['orders_total_paid_tax_incl']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
</strong>
            <?php  $_smarty_tpl->tpl_vars['brother_order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brother_order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value->getBrother(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['brother_order']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['brother_order']->key => $_smarty_tpl->tpl_vars['brother_order']->value) {
$_smarty_tpl->tpl_vars['brother_order']->_loop = true;
 $_smarty_tpl->tpl_vars['brother_order']->index++;
 $_smarty_tpl->tpl_vars['brother_order']->first = $_smarty_tpl->tpl_vars['brother_order']->index === 0;
?>
              <?php if ($_smarty_tpl->tpl_vars['brother_order']->first) {?>
                <?php if (count($_smarty_tpl->tpl_vars['order']->value->getBrother())==1) {?>
                  <br /><?php echo smartyTranslate(array('s'=>'This warning also concerns order ','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

                <?php } else { ?>
                  <br /><?php echo smartyTranslate(array('s'=>'This warning also concerns the next orders:','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

                <?php }?>
              <?php }?>
              <a href="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;vieworder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['brother_order']->value->id;?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
">
                #<?php echo sprintf('%06d',$_smarty_tpl->tpl_vars['brother_order']->value->id);?>

              </a>
            <?php } ?>
          </p>
        <?php }?>
        <form id="formAddPayment"  method="post" action="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;vieworder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
                  <th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Payment method','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span></th>
                  <th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Transaction ID','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span></th>
                  <th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
                  <th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Invoice','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php  $_smarty_tpl->tpl_vars['payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value->getOrderPaymentCollection(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->key => $_smarty_tpl->tpl_vars['payment']->value) {
$_smarty_tpl->tpl_vars['payment']->_loop = true;
?>
                <tr>
                  <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['payment']->value->date_add,'full'=>true),$_smarty_tpl);?>
</td>
                  <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['payment']->value->payment_method,'html','UTF-8');?>
</td>
                  <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['payment']->value->transaction_id,'html','UTF-8');?>
</td>
                  <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['payment']->value->amount,'currency'=>$_smarty_tpl->tpl_vars['payment']->value->id_currency),$_smarty_tpl);?>
</td>
                  <td>
                  <?php if (!isset($_smarty_tpl->tpl_vars['invoice'])) $_smarty_tpl->tpl_vars['invoice'] = new Smarty_Variable(null);if ($_smarty_tpl->tpl_vars['invoice']->value = $_smarty_tpl->tpl_vars['payment']->value->getOrderInvoice($_smarty_tpl->tpl_vars['order']->value->id)) {?>
                    <?php echo $_smarty_tpl->tpl_vars['invoice']->value->getInvoiceNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>

                  <?php } else { ?>
                  <?php }?>
                  </td>
                  <td class="actions">
                    <button class="btn btn-default open_payment_information">
                      <i class="icon-search"></i>
                      <?php echo smartyTranslate(array('s'=>'Details','d'=>'Admin.Global'),$_smarty_tpl);?>

                    </button>
                  </td>
                </tr>
                <tr class="payment_information" style="display: none;">
                  <td colspan="5">
                    <p>
                      <b><?php echo smartyTranslate(array('s'=>'Card Number','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</b>&nbsp;
                      <?php if ($_smarty_tpl->tpl_vars['payment']->value->card_number) {?>
                        <?php echo $_smarty_tpl->tpl_vars['payment']->value->card_number;?>

                      <?php } else { ?>
                        <i><?php echo smartyTranslate(array('s'=>'Not defined','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</i>
                      <?php }?>
                    </p>
                    <p>
                      <b><?php echo smartyTranslate(array('s'=>'Card Brand','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</b>&nbsp;
                      <?php if ($_smarty_tpl->tpl_vars['payment']->value->card_brand) {?>
                        <?php echo $_smarty_tpl->tpl_vars['payment']->value->card_brand;?>

                      <?php } else { ?>
                        <i><?php echo smartyTranslate(array('s'=>'Not defined','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</i>
                      <?php }?>
                    </p>
                    <p>
                      <b><?php echo smartyTranslate(array('s'=>'Card Expiration','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</b>&nbsp;
                      <?php if ($_smarty_tpl->tpl_vars['payment']->value->card_expiration) {?>
                        <?php echo $_smarty_tpl->tpl_vars['payment']->value->card_expiration;?>

                      <?php } else { ?>
                        <i><?php echo smartyTranslate(array('s'=>'Not defined','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</i>
                      <?php }?>
                    </p>
                    <p>
                      <b><?php echo smartyTranslate(array('s'=>'Card Holder','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</b>&nbsp;
                      <?php if ($_smarty_tpl->tpl_vars['payment']->value->card_holder) {?>
                        <?php echo $_smarty_tpl->tpl_vars['payment']->value->card_holder;?>

                      <?php } else { ?>
                        <i><?php echo smartyTranslate(array('s'=>'Not defined','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</i>
                      <?php }?>
                    </p>
                  </td>
                </tr>
                <?php }
if (!$_smarty_tpl->tpl_vars['payment']->_loop) {
?>
                <tr>
                  <td class="list-empty hidden-print" colspan="6">
                    <div class="list-empty-msg">
                      <i class="icon-warning-sign list-empty-icon"></i>
                      <?php echo smartyTranslate(array('s'=>'No payment methods are available','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

                    </div>
                  </td>
                </tr>
                <?php } ?>
                <tr class="current-edit hidden-print">
                  <td>
                    <div class="input-group fixed-width-xl">
                      <input type="text" name="payment_date" class="datepicker" value="<?php echo date('Y-m-d');?>
" />
                      <div class="input-group-addon">
                        <i class="icon-calendar-o"></i>
                      </div>
                    </div>
                  </td>
                  <td>
                    <input name="payment_method" list="payment_method" class="payment_method">
                    <datalist id="payment_method">
                    <?php  $_smarty_tpl->tpl_vars['payment_method'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment_method']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['payment_method']->key => $_smarty_tpl->tpl_vars['payment_method']->value) {
$_smarty_tpl->tpl_vars['payment_method']->_loop = true;
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['payment_method']->value;?>
">
                    <?php } ?>
                    </datalist>
                  </td>
                  <td>
                    <input type="text" name="payment_transaction_id" value="" class="form-control fixed-width-sm"/>
                  </td>
                  <td>
                    <input type="text" name="payment_amount" value="" class="form-control fixed-width-sm pull-left" />
                    <select name="payment_currency" class="payment_currency form-control fixed-width-xs pull-left">
                      <?php  $_smarty_tpl->tpl_vars['current_currency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['current_currency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['current_currency']->key => $_smarty_tpl->tpl_vars['current_currency']->value) {
$_smarty_tpl->tpl_vars['current_currency']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['current_currency']->value['id_currency'];?>
"<?php if ($_smarty_tpl->tpl_vars['current_currency']->value['id_currency']==$_smarty_tpl->tpl_vars['currency']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['current_currency']->value['sign'];?>
</option>
                      <?php } ?>
                    </select>
                  </td>
                  <td>
                    <?php if (count($_smarty_tpl->tpl_vars['invoices_collection']->value)>0) {?>
                      <select name="payment_invoice" id="payment_invoice">
                      <?php  $_smarty_tpl->tpl_vars['invoice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['invoice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['invoices_collection']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['invoice']->key => $_smarty_tpl->tpl_vars['invoice']->value) {
$_smarty_tpl->tpl_vars['invoice']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['invoice']->value->id;?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['invoice']->value->getInvoiceNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>
</option>
                      <?php } ?>
                      </select>
                    <?php }?>
                  </td>
                  <td class="actions">
                    <button class="btn btn-primary" type="submit" name="submitAddPayment">
                      <?php echo smartyTranslate(array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl);?>

                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </form>
        <?php if ((!$_smarty_tpl->tpl_vars['order']->value->valid&&sizeof($_smarty_tpl->tpl_vars['currencies']->value)>1)) {?>
          <form class="form-horizontal well" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currentIndex']->value,'html','UTF-8');?>
&amp;vieworder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
">
            <div class="row">
              <label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Change currency','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</label>
              <div class="col-lg-6">
                <select name="new_currency">
                <?php  $_smarty_tpl->tpl_vars['currency_change'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['currency_change']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['currency_change']->key => $_smarty_tpl->tpl_vars['currency_change']->value) {
$_smarty_tpl->tpl_vars['currency_change']->_loop = true;
?>
                  <?php if ($_smarty_tpl->tpl_vars['currency_change']->value['id_currency']!=$_smarty_tpl->tpl_vars['order']->value->id_currency) {?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['currency_change']->value['id_currency'];?>
"><?php echo $_smarty_tpl->tpl_vars['currency_change']->value['name'];?>
 - <?php echo $_smarty_tpl->tpl_vars['currency_change']->value['sign'];?>
</option>
                  <?php }?>
                <?php } ?>
                </select>
                <p class="help-block"><?php echo smartyTranslate(array('s'=>'Do not forget to update your exchange rate before making this change.','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl);?>
</p>
              </div>
              <div class="col-lg-3">
                <button type="submit" class="btn btn-default" name="submitChangeCurrency"><i class="icon-refresh"></i> <?php echo smartyTranslate(array('s'=>'Change','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</button>
              </div>
            </div>
          </form>
        <?php }?>
      </div>
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayAdminOrderLeft",'id_order'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl);?>

    </div>
    <div class="col-lg-5">
      <!-- Customer informations -->
      <div class="panel">
        <?php if ($_smarty_tpl->tpl_vars['customer']->value->id) {?>
          <div class="panel-heading">
            <i class="icon-user"></i>
            <?php echo smartyTranslate(array('s'=>'Customer','d'=>'Admin.Global'),$_smarty_tpl);?>

            <span class="badge">
              <a href="?tab=AdminCustomers&amp;id_customer=<?php echo $_smarty_tpl->tpl_vars['customer']->value->id;?>
&amp;viewcustomer&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminCustomers'),$_smarty_tpl);?>
">
                <?php if (Configuration::get('PS_B2B_ENABLE')) {?><?php echo $_smarty_tpl->tpl_vars['customer']->value->company;?>
 - <?php }?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['gender']->value->name,'html','UTF-8');?>

                <?php echo $_smarty_tpl->tpl_vars['customer']->value->firstname;?>

                <?php echo $_smarty_tpl->tpl_vars['customer']->value->lastname;?>

              </a>
            </span>
            <span class="badge">
              <?php echo smartyTranslate(array('s'=>'#','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['customer']->value->id;?>

            </span>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <?php if (($_smarty_tpl->tpl_vars['customer']->value->isGuest())) {?>
                <?php echo smartyTranslate(array('s'=>'This order has been placed by a guest.','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                <?php if ((!Customer::customerExists($_smarty_tpl->tpl_vars['customer']->value->email))) {?>
                  <form method="post" action="index.php?tab=AdminCustomers&amp;id_customer=<?php echo $_smarty_tpl->tpl_vars['customer']->value->id;?>
&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminCustomers'),$_smarty_tpl);?>
">
                    <input type="hidden" name="id_lang" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id_lang;?>
" />
                    <input class="btn btn-default" type="submit" name="submitGuestToCustomer" value="<?php echo smartyTranslate(array('s'=>'Transform a guest into a customer'),$_smarty_tpl);?>
" />
                    <p class="help-block"><?php echo smartyTranslate(array('s'=>'This feature will generate a random password and send an email to the customer.','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl);?>
</p>
                  </form>
                <?php } else { ?>
                  <div class="alert alert-warning">
                    <?php echo smartyTranslate(array('s'=>'A registered customer account has already claimed this email address','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

                  </div>
                <?php }?>
              <?php } else { ?>
                <dl class="well list-detail">
                  <dt><?php echo smartyTranslate(array('s'=>'Email','d'=>'Admin.Global'),$_smarty_tpl);?>
</dt>
                    <dd><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['customer']->value->email;?>
"><i class="icon-envelope-o"></i> <?php echo $_smarty_tpl->tpl_vars['customer']->value->email;?>
</a></dd>
                  <dt><?php echo smartyTranslate(array('s'=>'Account registered','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</dt>
                    <dd class="text-muted"><i class="icon-calendar-o"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['customer']->value->date_add,'full'=>true),$_smarty_tpl);?>
</dd>
                  <dt><?php echo smartyTranslate(array('s'=>'Valid orders placed','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</dt>
                    <dd><span class="badge"><?php echo intval($_smarty_tpl->tpl_vars['customerStats']->value['nb_orders']);?>
</span></dd>
                  <dt><?php echo smartyTranslate(array('s'=>'Total spent since registration','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</dt>
                    <dd><span class="badge badge-success"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>Tools::ps_round(Tools::convertPrice($_smarty_tpl->tpl_vars['customerStats']->value['total_orders'],$_smarty_tpl->tpl_vars['currency']->value),2),'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
</span></dd>
                  <?php if (Configuration::get('PS_B2B_ENABLE')) {?>
                    <dt><?php echo smartyTranslate(array('s'=>'SIRET','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</dt>
                      <dd><?php echo $_smarty_tpl->tpl_vars['customer']->value->siret;?>
</dd>
                    <dt><?php echo smartyTranslate(array('s'=>'APE','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</dt>
                      <dd><?php echo $_smarty_tpl->tpl_vars['customer']->value->ape;?>
</dd>
                  <?php }?>
                </dl>
              <?php }?>
            </div>

            <div class="col-xs-6">
              <div class="form-group hidden-print">
                <a href="?tab=AdminCustomers&amp;id_customer=<?php echo $_smarty_tpl->tpl_vars['customer']->value->id;?>
&amp;viewcustomer&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminCustomers'),$_smarty_tpl);?>
" class="btn btn-default btn-block"><?php echo smartyTranslate(array('s'=>'View full details...','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</a>
              </div>
              <div class="panel panel-sm">
                <div class="panel-heading">
                  <i class="icon-eye-slash"></i>
                  <?php echo smartyTranslate(array('s'=>'Private note','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                </div>
                <form id="customer_note" class="form-horizontal" action="ajax.php" method="post" onsubmit="saveCustomerNote(<?php echo $_smarty_tpl->tpl_vars['customer']->value->id;?>
);return false;" >
                  <div class="form-group">
                    <div class="col-lg-12">
                      <textarea name="note" id="noteContent" class="textarea-autosize" onkeyup="$(this).val().length > 0 ? $('#submitCustomerNote').removeAttr('disabled') : $('#submitCustomerNote').attr('disabled', 'disabled')"><?php echo $_smarty_tpl->tpl_vars['customer']->value->note;?>
</textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <button type="submit" id="submitCustomerNote" class="btn btn-default pull-right" disabled="disabled">
                        <i class="icon-save"></i>
                        <?php echo smartyTranslate(array('s'=>'Save','d'=>'Admin.Actions'),$_smarty_tpl);?>

                      </button>
                    </div>
                  </div>
                  <span id="note_feedback"></span>
                </form>
              </div>
            </div>
          </div>
        <?php }?>
        <!-- Tab nav -->
        <div class="row">
          <ul class="nav nav-tabs" id="tabAddresses">
            <li class="active">
              <a href="#addressShipping">
                <i class="icon-truck"></i>
                <?php echo smartyTranslate(array('s'=>'Shipping address','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

              </a>
            </li>
            <li>
              <a href="#addressInvoice">
                <i class="icon-file-text"></i>
                <?php echo smartyTranslate(array('s'=>'Invoice address','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

              </a>
            </li>
          </ul>
          <!-- Tab content -->
          <div class="tab-content panel">
            <!-- Tab status -->
            <div class="tab-pane  in active" id="addressShipping">
              <!-- Addresses -->
              <h4 class="visible-print"><?php echo smartyTranslate(array('s'=>'Shipping address','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h4>
              <?php if (!$_smarty_tpl->tpl_vars['order']->value->isVirtual()) {?>
              <!-- Shipping address -->
                <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
                  <form class="form-horizontal hidden-print" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;vieworder&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
">
                    <div class="form-group">
                      <div class="col-lg-9">
                        <select name="id_address">
                          <?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customer_addresses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value) {
$_smarty_tpl->tpl_vars['address']->_loop = true;
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['address']->value['id_address'];?>
"
                            <?php if ($_smarty_tpl->tpl_vars['address']->value['id_address']==$_smarty_tpl->tpl_vars['order']->value->id_address_delivery) {?>
                              selected="selected"
                            <?php }?>>
                            <?php echo $_smarty_tpl->tpl_vars['address']->value['alias'];?>
 -
                            <?php echo $_smarty_tpl->tpl_vars['address']->value['address1'];?>

                            <?php echo $_smarty_tpl->tpl_vars['address']->value['postcode'];?>

                            <?php echo $_smarty_tpl->tpl_vars['address']->value['city'];?>

                            <?php if (!empty($_smarty_tpl->tpl_vars['address']->value['state'])) {?>
                              <?php echo $_smarty_tpl->tpl_vars['address']->value['state'];?>

                            <?php }?>,
                            <?php echo $_smarty_tpl->tpl_vars['address']->value['country'];?>

                          </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-lg-3">
                        <button class="btn btn-default" type="submit" name="submitAddressShipping"><i class="icon-refresh"></i> <?php echo smartyTranslate(array('s'=>'Change','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</button>
                      </div>
                    </div>
                  </form>
                <?php }?>
                <div class="well">
                  <div class="row">
                    <div class="col-sm-6">
                      <a class="btn btn-default pull-right" href="?tab=AdminAddresses&amp;id_address=<?php echo $_smarty_tpl->tpl_vars['addresses']->value['delivery']->id;?>
&amp;addaddress&amp;realedit=1&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
&amp;address_type=1&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminAddresses'),$_smarty_tpl);?>
&amp;back=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
">
                        <i class="icon-pencil"></i>
                        <?php echo smartyTranslate(array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl);?>

                      </a>
                      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayAddressDetail'][0][0]->generateAddressSmarty(array('address'=>$_smarty_tpl->tpl_vars['addresses']->value['delivery'],'newLine'=>'<br />'),$_smarty_tpl);?>

                      <?php if ($_smarty_tpl->tpl_vars['addresses']->value['delivery']->other) {?>
                        <hr /><?php echo $_smarty_tpl->tpl_vars['addresses']->value['delivery']->other;?>
<br />
                      <?php }?>
                    </div>
                    <div class="col-sm-6 hidden-print">
                      <div id="map-delivery-canvas" style="height: 190px"></div>
                    </div>
                  </div>
                </div>
              <?php }?>
            </div>
            <div class="tab-pane " id="addressInvoice">
              <!-- Invoice address -->
              <h4 class="visible-print"><?php echo smartyTranslate(array('s'=>'Invoice address','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h4>
              <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
                <form class="form-horizontal hidden-print" method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;vieworder&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
">
                  <div class="form-group">
                    <div class="col-lg-9">
                      <select name="id_address">
                        <?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customer_addresses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value) {
$_smarty_tpl->tpl_vars['address']->_loop = true;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['address']->value['id_address'];?>
"
                          <?php if ($_smarty_tpl->tpl_vars['address']->value['id_address']==$_smarty_tpl->tpl_vars['order']->value->id_address_invoice) {?>
                          selected="selected"
                          <?php }?>>
                          <?php echo $_smarty_tpl->tpl_vars['address']->value['alias'];?>
 -
                          <?php echo $_smarty_tpl->tpl_vars['address']->value['address1'];?>

                          <?php echo $_smarty_tpl->tpl_vars['address']->value['postcode'];?>

                          <?php echo $_smarty_tpl->tpl_vars['address']->value['city'];?>

                          <?php if (!empty($_smarty_tpl->tpl_vars['address']->value['state'])) {?>
                            <?php echo $_smarty_tpl->tpl_vars['address']->value['state'];?>

                          <?php }?>,
                          <?php echo $_smarty_tpl->tpl_vars['address']->value['country'];?>

                        </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-lg-3">
                      <button class="btn btn-default" type="submit" name="submitAddressInvoice"><i class="icon-refresh"></i> <?php echo smartyTranslate(array('s'=>'Change','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</button>
                    </div>
                  </div>
                </form>
              <?php }?>
              <div class="well">
                <div class="row">
                  <div class="col-sm-6">
                    <a class="btn btn-default pull-right" href="?tab=AdminAddresses&amp;id_address=<?php echo $_smarty_tpl->tpl_vars['addresses']->value['invoice']->id;?>
&amp;addaddress&amp;realedit=1&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
&amp;address_type=2&amp;back=<?php echo urlencode($_SERVER['REQUEST_URI']);?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminAddresses'),$_smarty_tpl);?>
">
                      <i class="icon-pencil"></i>
                      <?php echo smartyTranslate(array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl);?>

                    </a>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayAddressDetail'][0][0]->generateAddressSmarty(array('address'=>$_smarty_tpl->tpl_vars['addresses']->value['invoice'],'newLine'=>'<br />'),$_smarty_tpl);?>

                    <?php if ($_smarty_tpl->tpl_vars['addresses']->value['invoice']->other) {?>
                      <hr /><?php echo $_smarty_tpl->tpl_vars['addresses']->value['invoice']->other;?>
<br />
                    <?php }?>
                  </div>
                  <div class="col-sm-6 hidden-print">
                    <div id="map-invoice-canvas" style="height: 190px"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          $('#tabAddresses a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
          })
        </script>
      </div>
      <div class="panel">
        <div class="panel-heading">
          <i class="icon-envelope"></i> <?php echo smartyTranslate(array('s'=>'Messages','d'=>'Admin.Global'),$_smarty_tpl);?>
 <span class="badge"><?php echo sizeof($_smarty_tpl->tpl_vars['customer_thread_message']->value);?>
</span>
        </div>
        <?php if ((sizeof($_smarty_tpl->tpl_vars['messages']->value))) {?>
          <div class="panel panel-highlighted">
            <div class="message-item">
              <?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
                <div class="message-avatar">
                  <div class="avatar-md">
                    <i class="icon-user icon-2x"></i>
                  </div>
                </div>
                <div class="message-body">

                  <span class="message-date">&nbsp;<i class="icon-calendar"></i>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['message']->value['date_add']),$_smarty_tpl);?>
 -
                  </span>
                  <h4 class="message-item-heading">
                    <?php if (($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['elastname'],'html','UTF-8'))) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['efirstname'],'html','UTF-8');?>

                      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['elastname'],'html','UTF-8');?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['cfirstname'],'html','UTF-8');?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['clastname'],'html','UTF-8');?>

                    <?php }?>
                    <?php if (($_smarty_tpl->tpl_vars['message']->value['private']==1)) {?>
                      <span class="badge badge-info"><?php echo smartyTranslate(array('s'=>'Private','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
                    <?php }?>
                  </h4>
                  <p class="message-item-text">
                    <?php echo nl2br($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['message'],'html','UTF-8'));?>

                  </p>
                </div>
                
              <?php } ?>
            </div>
          </div>
        <?php }?>
        <div id="messages" class="well hidden-print">
          <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_SERVER['REQUEST_URI'],'html','UTF-8');?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
" method="post" onsubmit="if (getE('visibility').checked == true) return confirm('<?php echo smartyTranslate(array('s'=>'Do you want to send this message to the customer?','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>
');">
            <div id="message" class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Choose a standard message','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</label>
                <div class="col-lg-9">
                  <select class="chosen form-control" name="order_message" id="order_message" onchange="orderOverwriteMessage(this, '<?php echo smartyTranslate(array('s'=>'Do you want to overwrite your existing message?','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>
')">
                    <option value="0" selected="selected">-</option>
                    <?php  $_smarty_tpl->tpl_vars['orderMessage'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['orderMessage']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orderMessages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['orderMessage']->key => $_smarty_tpl->tpl_vars['orderMessage']->value) {
$_smarty_tpl->tpl_vars['orderMessage']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['orderMessage']->value['message'],'html','UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['orderMessage']->value['name'];?>
</option>
                    <?php } ?>
                  </select>
                  <p class="help-block">
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrderMessage'),'html','UTF-8');?>
">
                      <?php echo smartyTranslate(array('s'=>'Configure predefined messages','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                      <i class="icon-external-link"></i>
                    </a>
                  </p>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Display to customer?','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</label>
                <div class="col-lg-9">
                  <span class="switch prestashop-switch fixed-width-lg">
                    <input type="radio" name="visibility" id="visibility_on" value="0" />
                    <label for="visibility_on">
                      <?php echo smartyTranslate(array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl);?>

                    </label>
                    <input type="radio" name="visibility" id="visibility_off" value="1" checked="checked" />
                    <label for="visibility_off">
                      <?php echo smartyTranslate(array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl);?>

                    </label>
                    <a class="slide-button btn"></a>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Message','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
                <div class="col-lg-9">
                  <textarea id="txt_msg" class="textarea-autosize" name="message"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(Tools::getValue('message'),'html','UTF-8');?>
</textarea>
                  <p id="nbchars"></p>
                </div>
              </div>


              <input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" />
              <input type="hidden" name="id_customer" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id_customer;?>
" />
              <button type="submit" id="submitMessage" class="btn btn-primary pull-right" name="submitMessage">
                <?php echo smartyTranslate(array('s'=>'Send message','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

              </button>
              <a class="btn btn-default" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomerThreads'),'html','UTF-8');?>
&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
">
                <?php echo smartyTranslate(array('s'=>'Show all messages','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                <i class="icon-external-link"></i>
              </a>
            </div>
          </form>
        </div>
      </div>
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayAdminOrderRight",'id_order'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl);?>

    </div>
  </div>
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayAdminOrder",'id_order'=>$_smarty_tpl->tpl_vars['order']->value->id),$_smarty_tpl);?>

  <div class="row" id="start_products">
    <div class="col-lg-12">
      <form class="container-command-top-spacing" action="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;vieworder&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
" method="post" onsubmit="return orderDeleteProduct('<?php echo smartyTranslate(array('s'=>'This product cannot be returned.','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>
', '<?php echo smartyTranslate(array('s'=>'Quantity to cancel is greater than quantity available.','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>
');">
        <input type="hidden" name="id_order" value="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
" />
        <div style="display: none">
          <input type="hidden" value="<?php echo implode($_smarty_tpl->tpl_vars['order']->value->getWarehouseList());?>
" id="warehouse_list" />
        </div>

        <div class="panel">
          <div class="panel-heading">
            <i class="icon-shopping-cart"></i>
            <?php echo smartyTranslate(array('s'=>'Products','d'=>'Admin.Global'),$_smarty_tpl);?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['products']->value);?>
</span>
          </div>
          <div id="refundForm">
          <!--
            <a href="#" class="standard_refund"><img src="../img/admin/add.gif" alt="<?php echo smartyTranslate(array('s'=>'Process a standard refund'),$_smarty_tpl);?>
" /> <?php echo smartyTranslate(array('s'=>'Process a standard refund'),$_smarty_tpl);?>
</a>
            <a href="#" class="partial_refund"><img src="../img/admin/add.gif" alt="<?php echo smartyTranslate(array('s'=>'Process a partial refund'),$_smarty_tpl);?>
" /> <?php echo smartyTranslate(array('s'=>'Process a partial refund'),$_smarty_tpl);?>
</a>
          -->
          </div>

          <?php $_smarty_tpl->_capture_stack[0][] = array("TaxMethod", null, null); ob_start(); ?>
            <?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
              <?php echo smartyTranslate(array('s'=>'Tax excluded','d'=>'Admin.Global'),$_smarty_tpl);?>

            <?php } else { ?>
              <?php echo smartyTranslate(array('s'=>'Tax included','d'=>'Admin.Global'),$_smarty_tpl);?>

            <?php }?>
          <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
          <?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
            <input type="hidden" name="TaxMethod" value="0">
          <?php } else { ?>
            <input type="hidden" name="TaxMethod" value="1">
          <?php }?>
          <div class="table-responsive">
            <table class="table" id="orderProducts">
              <thead>
                <tr>
                  <th></th>
                  <th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Product','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
                  <th>
                    <span class="title_box "><?php echo smartyTranslate(array('s'=>'Price per unit','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</span>
                    <small class="text-muted"><?php echo Smarty::$_smarty_vars['capture']['TaxMethod'];?>
</small>
                  </th>
                  <th class="text-center"><span class="title_box "><?php echo smartyTranslate(array('s'=>'Qty','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span></th>
                  <?php if ($_smarty_tpl->tpl_vars['display_warehouse']->value) {?><th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Warehouse'),$_smarty_tpl);?>
</span></th><?php }?>
                  <?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?><th class="text-center"><span class="title_box "><?php echo smartyTranslate(array('s'=>'Refunded'),$_smarty_tpl);?>
</span></th><?php }?>
                  <?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||$_smarty_tpl->tpl_vars['order']->value->hasProductReturned())) {?>
                    <th class="text-center"><span class="title_box "><?php echo smartyTranslate(array('s'=>'Returned','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span></th>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['stock_management']->value) {?><th class="text-center"><span class="title_box "><?php echo smartyTranslate(array('s'=>'Available quantity','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span></th><?php }?>
                  <th>
                    <span class="title_box "><?php echo smartyTranslate(array('s'=>'Total','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
                    <small class="text-muted"><?php echo Smarty::$_smarty_vars['capture']['TaxMethod'];?>
</small>
                  </th>
                  <th style="display: none;" class="add_product_fields"></th>
                  <th style="display: none;" class="edit_product_fields"></th>
                  <th style="display: none;" class="standard_refund_fields">
                    <i class="icon-minus-sign"></i>
                    <?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||$_smarty_tpl->tpl_vars['order']->value->hasBeenShipped())) {?>
                      <?php echo smartyTranslate(array('s'=>'Return','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                    <?php } elseif (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?>
                      <?php echo smartyTranslate(array('s'=>'Refund','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                    <?php } else { ?>
                      <?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>

                    <?php }?>
                  </th>
                  <th style="display:none" class="partial_refund_fields">
                    <span class="title_box "><?php echo smartyTranslate(array('s'=>'Partial refund','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
                  </th>
                  <?php if (!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()) {?>
                  <th></th>
                  <?php }?>
                </tr>
              </thead>
              <tbody>
              <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['product']->key;
?>
                
                <?php /*  Call merged included template "controllers/orders/_customized_data.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('controllers/orders/_customized_data.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '21057722725c338d9959bd54-88672673');
content_5c338d999419c6_59218495($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "controllers/orders/_customized_data.tpl" */?>
                
                <?php /*  Call merged included template "controllers/orders/_product_line.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('controllers/orders/_product_line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '21057722725c338d9959bd54-88672673');
content_5c338d99d037b5_70345301($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "controllers/orders/_product_line.tpl" */?>
              <?php } ?>
              <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
                <?php /*  Call merged included template "controllers/orders/_new_product.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('controllers/orders/_new_product.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '21057722725c338d9959bd54-88672673');
content_5c338d9a22f7e3_36183708($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "controllers/orders/_new_product.tpl" */?>
              <?php }?>
              </tbody>
            </table>
          </div>

          <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
          <div class="row-margin-bottom row-margin-top order_action">
          <?php if (!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()) {?>
            <button type="button" id="add_product" class="btn btn-default">
              <i class="icon-plus-sign"></i>
              <?php echo smartyTranslate(array('s'=>'Add a product','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

            </button>
          <?php }?>
            <button id="add_voucher" class="btn btn-default" type="button" >
              <i class="icon-ticket"></i>
              <?php echo smartyTranslate(array('s'=>'Add a new discount','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

            </button>
          </div>
          <?php }?>
          <div class="clear">&nbsp;</div>
          <div class="row">
            <div class="col-xs-6">
              <div class="alert alert-warning">
                
                <?php echo smartyTranslate(array('s'=>'For this customer group, prices are displayed as: [1]%tax_method%[/1]','sprintf'=>array('%tax_method%'=>Smarty::$_smarty_vars['capture']['TaxMethod'],'[1]'=>'<strong>','[/1]'=>'</strong>'),'d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

                <?php if (!Configuration::get('PS_ORDER_RETURN')) {?>
                  <br/><strong><?php echo smartyTranslate(array('s'=>'Merchandise returns are disabled','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>
</strong>
                <?php }?>
              </div>
            </div>
            <div class="col-xs-6">
              <div class="panel panel-vouchers" style="<?php if (!sizeof($_smarty_tpl->tpl_vars['discounts']->value)) {?>display:none;<?php }?>">
                <?php if ((sizeof($_smarty_tpl->tpl_vars['discounts']->value)||$_smarty_tpl->tpl_vars['can_edit']->value)) {?>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>
                          <span class="title_box ">
                            <?php echo smartyTranslate(array('s'=>'Discount name','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                          </span>
                        </th>
                        <th>
                          <span class="title_box ">
                            <?php echo smartyTranslate(array('s'=>'Value','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                          </span>
                        </th>
                        <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
                        <th></th>
                        <?php }?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
                      <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['discount']->value['name'];?>
</td>
                        <td>
                        <?php if ($_smarty_tpl->tpl_vars['discount']->value['value']!=0.00) {?>
                          -
                        <?php }?>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

                        </td>
                        <?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
                        <td>
                          <a href="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;submitDeleteVoucher&amp;id_order_cart_rule=<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_order_cart_rule'];?>
&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
">
                            <i class="icon-minus-sign"></i>
                            <?php echo smartyTranslate(array('s'=>'Delete voucher','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                          </a>
                        </td>
                        <?php }?>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="current-edit" id="voucher_form" style="display:none;">
                  <?php /*  Call merged included template "controllers/orders/_discount_form.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('controllers/orders/_discount_form.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '21057722725c338d9959bd54-88672673');
content_5c338d9a2fe825_20737701($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "controllers/orders/_discount_form.tpl" */?>
                </div>
                <?php }?>
              </div>
              <div class="panel panel-total">
                <div class="table-responsive">
                  <table class="table">
                    
                    <?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
                      <?php $_smarty_tpl->tpl_vars['order_product_price'] = new Smarty_variable(($_smarty_tpl->tpl_vars['order']->value->total_products), null, 0);?>
                      <?php $_smarty_tpl->tpl_vars['order_discount_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl, null, 0);?>
                      <?php $_smarty_tpl->tpl_vars['order_wrapping_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_wrapping_tax_excl, null, 0);?>
                      <?php $_smarty_tpl->tpl_vars['order_shipping_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_excl, null, 0);?>
                      <?php $_smarty_tpl->tpl_vars['shipping_refundable'] = new Smarty_variable($_smarty_tpl->tpl_vars['shipping_refundable_tax_excl']->value, null, 0);?>
                    <?php } else { ?>
                      <?php $_smarty_tpl->tpl_vars['order_product_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_products_wt, null, 0);?>
                      <?php $_smarty_tpl->tpl_vars['order_discount_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl, null, 0);?>
                      <?php $_smarty_tpl->tpl_vars['order_wrapping_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_wrapping_tax_incl, null, 0);?>
                      <?php $_smarty_tpl->tpl_vars['order_shipping_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_incl, null, 0);?>
                      <?php $_smarty_tpl->tpl_vars['shipping_refundable'] = new Smarty_variable($_smarty_tpl->tpl_vars['shipping_refundable_tax_incl']->value, null, 0);?>
                    <?php }?>
                    <tr id="total_products">
                      <td class="text-right"><?php echo smartyTranslate(array('s'=>'Products:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</td>
                      <td class="amount text-right nowrap">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['order_product_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

                      </td>
                      <td class="partial_refund_fields current-edit" style="display:none;"></td>
                    </tr>
                    <tr id="total_discounts" <?php if ($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl==0) {?>style="display: none;"<?php }?>>
                      <td class="text-right"><?php echo smartyTranslate(array('s'=>'Discounts','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</td>
                      <td class="amount text-right nowrap">
                        -<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['order_discount_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

                      </td>
                      <td class="partial_refund_fields current-edit" style="display:none;"></td>
                    </tr>
                    <tr id="total_wrapping" <?php if ($_smarty_tpl->tpl_vars['order']->value->total_wrapping_tax_incl==0) {?>style="display: none;"<?php }?>>
                      <td class="text-right"><?php echo smartyTranslate(array('s'=>'Wrapping','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</td>
                      <td class="amount text-right nowrap">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['order_wrapping_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

                      </td>
                      <td class="partial_refund_fields current-edit" style="display:none;"></td>
                    </tr>
                    <tr id="total_shipping">
                      <td class="text-right"><?php echo smartyTranslate(array('s'=>'Shipping','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</td>
                      <td class="amount text-right nowrap" >
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['order_shipping_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

                      </td>
                      <td class="partial_refund_fields current-edit" style="display:none;">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

                          </div>
                          <input type="text" name="partialRefundShippingCost" value="0" />
                        </div>
                        <p class="help-block"><i class="icon-warning-sign"></i> <?php echo smartyTranslate(array('s'=>'(Max %s %s)','sprintf'=>array(Tools::displayPrice(Tools::ps_round($_smarty_tpl->tpl_vars['shipping_refundable']->value,2),$_smarty_tpl->tpl_vars['currency']->value->id),Smarty::$_smarty_vars['capture']['TaxMethod']),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                        </p>
                      </td>
                    </tr>
                    <?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
                    <tr id="total_taxes">
                      <td class="text-right"><?php echo smartyTranslate(array('s'=>'Taxes','d'=>'Admin.Global'),$_smarty_tpl);?>
</td>
                      <td class="amount text-right nowrap" ><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>($_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl-$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_excl),'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
</td>
                      <td class="partial_refund_fields current-edit" style="display:none;"></td>
                    </tr>
                    <?php }?>
                    <?php $_smarty_tpl->tpl_vars['order_total_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl, null, 0);?>
                    <tr id="total_order">
                      <td class="text-right"><strong><?php echo smartyTranslate(array('s'=>'Total','d'=>'Admin.Global'),$_smarty_tpl);?>
</strong></td>
                      <td class="amount text-right nowrap">
                        <strong><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['order_total_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
</strong>
                      </td>
                      <td class="partial_refund_fields current-edit" style="display:none;"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div style="display: none;" class="standard_refund_fields form-horizontal panel">
            <div class="form-group">
              <?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()&&Configuration::get('PS_ORDER_RETURN'))) {?>
              <p class="checkbox">
                <label for="reinjectQuantities">
                  <input type="checkbox" id="reinjectQuantities" name="reinjectQuantities" />
                  <?php echo smartyTranslate(array('s'=>'Re-stock products','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                </label>
              </p>
              <?php }?>
              <?php if (((!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()&&$_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())||($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()&&Configuration::get('PS_ORDER_RETURN')))) {?>
              <p class="checkbox">
                <label for="generateCreditSlip">
                  <input type="checkbox" id="generateCreditSlip" name="generateCreditSlip" onclick="toggleShippingCost()" />
                  <?php echo smartyTranslate(array('s'=>'Generate a credit slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                </label>
              </p>
              <p class="checkbox">
                <label for="generateDiscount">
                  <input type="checkbox" id="generateDiscount" name="generateDiscount" onclick="toggleShippingCost()" />
                  <?php echo smartyTranslate(array('s'=>'Generate a voucher','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                </label>
              </p>
              <p class="checkbox" id="spanShippingBack" style="display:none;">
                <label for="shippingBack">
                  <input type="checkbox" id="shippingBack" name="shippingBack" />
                  <?php echo smartyTranslate(array('s'=>'Repay shipping costs','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                </label>
              </p>
              <?php if ($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl>0||$_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl>0) {?>
              <br/><p><?php echo smartyTranslate(array('s'=>'This order has been partially paid by voucher. Choose the amount you want to refund:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</p>
              <p class="radio">
                <label id="lab_refund_total_1" for="refund_total_1">
                  <input type="radio" value="0" name="refund_total_voucher_off" id="refund_total_1" checked="checked" />
                  <?php echo smartyTranslate(array('s'=>'Include amount of initial voucher: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                </label>
              </p>
              <p class="radio">
                <label id="lab_refund_total_2" for="refund_total_2">
                  <input type="radio" value="1" name="refund_total_voucher_off" id="refund_total_2"/>
                  <?php echo smartyTranslate(array('s'=>'Exclude amount of initial voucher: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                </label>
              </p>
              <div class="nowrap radio-inline">
                <label id="lab_refund_total_3" class="pull-left" for="refund_total_3">
                  <?php echo smartyTranslate(array('s'=>'Amount of your choice: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                  <input type="radio" value="2" name="refund_total_voucher_off" id="refund_total_3"/>
                </label>
                <div class="input-group col-lg-1 pull-left">
                  <div class="input-group-addon">
                    <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

                  </div>
                  <input type="text" class="input fixed-width-md" name="refund_total_voucher_choose" value="0"/>
                </div>
              </div>
              <?php }?>
            <?php }?>
            </div>
            <?php if ((!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()&&Configuration::get('PS_ORDER_RETURN')))) {?>
            <div class="row">
              <input type="submit" name="cancelProduct" value="<?php if ($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()) {?><?php echo smartyTranslate(array('s'=>'Return products'),$_smarty_tpl);?>
<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid()) {?><?php echo smartyTranslate(array('s'=>'Refund products'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Cancel products'),$_smarty_tpl);?>
<?php }?>" class="btn btn-default" />
            </div>
            <?php }?>
          </div>
          <div style="display:none;" class="partial_refund_fields">
            <p class="checkbox">
              <label for="reinjectQuantitiesRefund">
                <input type="checkbox" id="reinjectQuantitiesRefund" name="reinjectQuantities" />
                <?php echo smartyTranslate(array('s'=>'Re-stock products','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

              </label>
            </p>
            <p class="checkbox">
              <label for="generateDiscountRefund">
                <input type="checkbox" id="generateDiscountRefund" name="generateDiscountRefund" onclick="toggleShippingCost()" />
                <?php echo smartyTranslate(array('s'=>'Generate a voucher','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

              </label>
            </p>
            <?php if ($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl>0||$_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl>0) {?>
            <p><?php echo smartyTranslate(array('s'=>'This order has been partially paid by voucher. Choose the amount you want to refund: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</p>
            <p class="radio">
              <label id="lab_refund_1" for="refund_1">
                <input type="radio" value="0" name="refund_voucher_off" id="refund_1" checked="checked" />
                <?php echo smartyTranslate(array('s'=>'Product(s) price: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

              </label>
            </p>
            <p class="radio">
              <label id="lab_refund_2" for="refund_2">
                <input type="radio" value="1" name="refund_voucher_off" id="refund_2"/>
                <?php echo smartyTranslate(array('s'=>'Product(s) price, excluding amount of initial voucher: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

              </label>
            </p>
            <div class="nowrap radio-inline">
                <label id="lab_refund_3" class="pull-left" for="refund_3">
                  <?php echo smartyTranslate(array('s'=>'Amount of your choice: ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                  <input type="radio" value="2" name="refund_voucher_off" id="refund_3"/>
                </label>
                <div class="input-group col-lg-1 pull-left">
                  <div class="input-group-addon">
                    <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

                  </div>
                  <input type="text" class="input fixed-width-md" name="refund_voucher_choose" value="0"/>
                </div>
              </div>
            <?php }?>
            <br/>
            <button type="submit" name="partialRefund" class="btn btn-default">
              <i class="icon-check"></i> <?php echo smartyTranslate(array('s'=>'Partial refund','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <!-- Sources block -->
      <?php if ((sizeof($_smarty_tpl->tpl_vars['sources']->value))) {?>
      <div class="panel">
        <div class="panel-heading">
          <i class="icon-globe"></i>
          <?php echo smartyTranslate(array('s'=>'Sources','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <span class="badge"><?php echo count($_smarty_tpl->tpl_vars['sources']->value);?>
</span>
        </div>
        <ul <?php if (sizeof($_smarty_tpl->tpl_vars['sources']->value)>3) {?>style="height: 200px; overflow-y: scroll;"<?php }?>>
        <?php  $_smarty_tpl->tpl_vars['source'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['source']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sources']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['source']->key => $_smarty_tpl->tpl_vars['source']->value) {
$_smarty_tpl->tpl_vars['source']->_loop = true;
?>
          <li>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['source']->value['date_add'],'full'=>true),$_smarty_tpl);?>
<br />
            <b><?php echo smartyTranslate(array('s'=>'From','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</b><?php if ($_smarty_tpl->tpl_vars['source']->value['http_referer']!='') {?><a href="<?php echo $_smarty_tpl->tpl_vars['source']->value['http_referer'];?>
"><?php echo smarty_modifier_regex_replace(parse_url($_smarty_tpl->tpl_vars['source']->value['http_referer'],@constant('PHP_URL_HOST')),'/^www./','');?>
</a><?php } else { ?>-<?php }?><br />
            <b><?php echo smartyTranslate(array('s'=>'To','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</b> <a href="http://<?php echo $_smarty_tpl->tpl_vars['source']->value['request_uri'];?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['source']->value['request_uri'],100,'...');?>
</a><br />
            <?php if ($_smarty_tpl->tpl_vars['source']->value['keywords']) {?><b><?php echo smartyTranslate(array('s'=>'Keywords'),$_smarty_tpl);?>
</b> <?php echo $_smarty_tpl->tpl_vars['source']->value['keywords'];?>
<br /><?php }?><br />
          </li>
        <?php } ?>
        </ul>
      </div>
      <?php }?>

      <!-- linked orders block -->
      <?php if (count($_smarty_tpl->tpl_vars['order']->value->getBrother())>0) {?>
      <div class="panel">
        <div class="panel-heading">
          <i class="icon-cart"></i>
          <?php echo smartyTranslate(array('s'=>'Linked orders','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>
                  <?php echo smartyTranslate(array('s'=>'Order no. ','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                </th>
                <th>
                  <?php echo smartyTranslate(array('s'=>'Status','d'=>'Admin.Global'),$_smarty_tpl);?>

                </th>
                <th>
                  <?php echo smartyTranslate(array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl);?>

                </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php  $_smarty_tpl->tpl_vars['brother_order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brother_order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value->getBrother(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['brother_order']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['brother_order']->key => $_smarty_tpl->tpl_vars['brother_order']->value) {
$_smarty_tpl->tpl_vars['brother_order']->_loop = true;
 $_smarty_tpl->tpl_vars['brother_order']->index++;
 $_smarty_tpl->tpl_vars['brother_order']->first = $_smarty_tpl->tpl_vars['brother_order']->index === 0;
?>
              <tr>
                <td>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;vieworder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['brother_order']->value->id;?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
">#<?php echo $_smarty_tpl->tpl_vars['brother_order']->value->id;?>
</a>
                </td>
                <td>
                  <?php echo $_smarty_tpl->tpl_vars['brother_order']->value->getCurrentOrderState()->name[$_smarty_tpl->tpl_vars['current_id_lang']->value];?>

                </td>
                <td>
                  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['brother_order']->value->total_paid_tax_incl,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

                </td>
                <td>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;vieworder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['brother_order']->value->id;?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
">
                    <i class="icon-eye-open"></i>
                    <?php echo smartyTranslate(array('s'=>'View order','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

                  </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
      <?php }?>
    </div>
  </div>

  <script type="text/javascript">
    var geocoder = new google.maps.Geocoder();
    var delivery_map, invoice_map;

    $(document).ready(function()
    {
      $(".textarea-autosize").autosize();

      geocoder.geocode({
        address: '<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['delivery']->address1,'\'');?>
,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['delivery']->postcode,'\'');?>
,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['delivery']->city,'\'');?>
<?php if (isset($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name)&&$_smarty_tpl->tpl_vars['addresses']->value['delivery']->id_state) {?>,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name,'\'');?>
<?php }?>,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['delivery']->country,'\'');?>
'
        }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK)
        {
          delivery_map = new google.maps.Map(document.getElementById('map-delivery-canvas'), {
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: results[0].geometry.location
          });
          var delivery_marker = new google.maps.Marker({
            map: delivery_map,
            position: results[0].geometry.location,
            url: 'http://maps.google.com?q=<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['delivery']->address1);?>
,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['delivery']->postcode);?>
,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['delivery']->city);?>
<?php if (isset($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name)&&$_smarty_tpl->tpl_vars['addresses']->value['delivery']->id_state) {?>,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name);?>
<?php }?>,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['delivery']->country);?>
'
          });
          google.maps.event.addListener(delivery_marker, 'click', function() {
            window.open(delivery_marker.url);
          });
        }
      });

      geocoder.geocode({
        address: '<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['invoice']->address1,'\'');?>
,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['invoice']->postcode,'\'');?>
,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['invoice']->city,'\'');?>
<?php if (isset($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name)&&$_smarty_tpl->tpl_vars['addresses']->value['invoice']->id_state) {?>,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name,'\'');?>
<?php }?>,<?php echo addcslashes($_smarty_tpl->tpl_vars['addresses']->value['invoice']->country,'\'');?>
'
        }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK)
        {
          invoice_map = new google.maps.Map(document.getElementById('map-invoice-canvas'), {
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: results[0].geometry.location
          });
          invoice_marker = new google.maps.Marker({
            map: invoice_map,
            position: results[0].geometry.location,
            url: 'http://maps.google.com?q=<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['invoice']->address1);?>
,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['invoice']->postcode);?>
,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['invoice']->city);?>
<?php if (isset($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name)&&$_smarty_tpl->tpl_vars['addresses']->value['invoice']->id_state) {?>,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['deliveryState']->name);?>
<?php }?>,<?php echo urlencode($_smarty_tpl->tpl_vars['addresses']->value['invoice']->country);?>
'
          });
          google.maps.event.addListener(invoice_marker, 'click', function() {
            window.open(invoice_marker.url);
          });
        }
      });

      $('.datepicker').datetimepicker({
        prevText: '',
        nextText: '',
        dateFormat: 'yy-mm-dd',
        // Define a custom regional settings in order to use PrestaShop translation tools
        currentText: '<?php echo smartyTranslate(array('s'=>'Now','js'=>1),$_smarty_tpl);?>
',
        closeText: '<?php echo smartyTranslate(array('s'=>'Done','js'=>1),$_smarty_tpl);?>
',
        ampm: false,
        amNames: ['AM', 'A'],
        pmNames: ['PM', 'P'],
        timeFormat: 'hh:mm:ss tt',
        timeSuffix: '',
        timeOnlyTitle: '<?php echo smartyTranslate(array('s'=>'Choose Time','js'=>1),$_smarty_tpl);?>
',
        timeText: '<?php echo smartyTranslate(array('s'=>'Time','js'=>1),$_smarty_tpl);?>
',
        hourText: '<?php echo smartyTranslate(array('s'=>'Hour','js'=>1),$_smarty_tpl);?>
',
        minuteText: '<?php echo smartyTranslate(array('s'=>'Minute','js'=>1),$_smarty_tpl);?>
'
      });
    });

    // Fix wrong maps center when map is hidden
    $('#tabAddresses').click(function(){
      if (delivery_map) {
        x = delivery_map.getZoom();
        c = delivery_map.getCenter();
        google.maps.event.trigger(delivery_map, 'resize');
        delivery_map.setZoom(x);
        delivery_map.setCenter(c);
      }

      if (invoice_map) {
        x = invoice_map.getZoom();
        c = invoice_map.getCenter();
        google.maps.event.trigger(invoice_map, 'resize');
        invoice_map.setZoom(x);
        invoice_map.setCenter(c);
      }
    });
  </script>



<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminView'),$_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo ucfirst($_smarty_tpl->tpl_vars['name_controller']->value);?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php } elseif (isset($_GET['controller'])) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo htmlentities(ucfirst($_GET['controller']));?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:34:17
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_documents.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c338d99601674_43476255')) {function content_5c338d99601674_43476255($_smarty_tpl) {?>
<div class="table-responsive">
	<table class="table" id="documents_table">
		<thead>
			<tr>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Document','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Number','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
				</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['document'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['document']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value->getDocuments(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['document']->key => $_smarty_tpl->tpl_vars['document']->value) {
$_smarty_tpl->tpl_vars['document']->_loop = true;
?>

				<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
					<?php if (isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
					<tr id="delivery_<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
					<?php } else { ?>
					<tr id="invoice_<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
					<?php }?>
				<?php } elseif (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderSlip') {?>
					<tr id="orderslip_<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
				<?php }?>

						<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['document']->value->date_add),$_smarty_tpl);?>
</td>
						<td>
							<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
								<?php if (isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
									<?php echo smartyTranslate(array('s'=>'Delivery slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

								<?php } else { ?>
									<?php echo smartyTranslate(array('s'=>'Invoice','d'=>'Admin.Global'),$_smarty_tpl);?>

								<?php }?>
							<?php } elseif (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderSlip') {?>
								<?php echo smartyTranslate(array('s'=>'Credit Slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

							<?php }?>
						</td>
						<td>
							<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
								<?php if (isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
									<a class="_blank" title="<?php echo smartyTranslate(array('s'=>'See the document'),$_smarty_tpl);?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'html','UTF-8');?>
&amp;submitAction=generateDeliverySlipPDF&amp;id_order_invoice=<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
								<?php } else { ?>
									<a class="_blank" title="<?php echo smartyTranslate(array('s'=>'See the document'),$_smarty_tpl);?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'html','UTF-8');?>
&amp;submitAction=generateInvoicePDF&amp;id_order_invoice=<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
							   <?php }?>
							<?php } elseif (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderSlip') {?>
								<a class="_blank" title="<?php echo smartyTranslate(array('s'=>'See the document'),$_smarty_tpl);?>
" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'html','UTF-8');?>
&amp;submitAction=generateOrderSlipPDF&amp;id_order_slip=<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
">
							<?php }?>
							<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
								<?php if (isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
									<?php echo $_smarty_tpl->tpl_vars['document']->value->getDeliveryNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>

								<?php } else { ?>
									<?php echo $_smarty_tpl->tpl_vars['document']->value->getInvoiceNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>

								<?php }?>
							<?php } elseif (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderSlip') {?>
								<?php echo $_smarty_tpl->tpl_vars['document']->value->getCreditSlipsNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>

							<?php }?>
							</a>
						</td>
						<td>
						<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
							<?php if (isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
								--
							<?php } else { ?>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['document']->value->total_paid_tax_incl,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
&nbsp;
								<?php if ($_smarty_tpl->tpl_vars['document']->value->getTotalPaid()) {?>
									<span>
									<?php if ($_smarty_tpl->tpl_vars['document']->value->getRestPaid()>0) {?>
										(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['document']->value->getRestPaid(),'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'not paid','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
)
									<?php } elseif ($_smarty_tpl->tpl_vars['document']->value->getRestPaid()<0) {?>
										(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>-$_smarty_tpl->tpl_vars['document']->value->getRestPaid(),'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'overpaid','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
)
									<?php }?>
									</span>
								<?php }?>
							<?php }?>
						<?php } elseif (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderSlip') {?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['document']->value->total_products_tax_incl+$_smarty_tpl->tpl_vars['document']->value->total_shipping_tax_incl,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

						<?php }?>
						</td>
						<td class="text-right document_action">
						<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
							<?php if (!isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>

								<?php if ($_smarty_tpl->tpl_vars['document']->value->getRestPaid()) {?>
									<a href="#formAddPaymentPanel" class="js-set-payment btn btn-default anchor" data-amount="<?php echo $_smarty_tpl->tpl_vars['document']->value->getRestPaid();?>
" data-id-invoice="<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
" title="<?php echo smartyTranslate(array('s'=>'Set payment form'),$_smarty_tpl);?>
">
										<i class="icon-money"></i>
										<?php echo smartyTranslate(array('s'=>'Enter payment','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

									</a>
								<?php }?>

								<a href="#" class="btn btn-default" onclick="$('#invoiceNote<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
').show(); return false;" title="<?php if ($_smarty_tpl->tpl_vars['document']->value->note=='') {?><?php echo smartyTranslate(array('s'=>'Add note'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Edit note'),$_smarty_tpl);?>
<?php }?>">
									<?php if ($_smarty_tpl->tpl_vars['document']->value->note=='') {?>
										<i class="icon-plus-sign-alt"></i>
										<?php echo smartyTranslate(array('s'=>'Add note','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

									<?php } else { ?>
										<i class="icon-pencil"></i>
										<?php echo smartyTranslate(array('s'=>'Edit note','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

									<?php }?>
								</a>

							<?php }?>
						<?php }?>
						</td>
					</tr>
				<?php if (get_class($_smarty_tpl->tpl_vars['document']->value)=='OrderInvoice') {?>
					<?php if (!isset($_smarty_tpl->tpl_vars['document']->value->is_delivery)) {?>
					<tr id="invoiceNote<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
" style="display:none">
						<td colspan="5">
							<form action="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;viewOrder&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
<?php if (isset($_GET['token'])) {?>&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
<?php }?>" method="post">
								<p>
									<label for="editNote<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
" class="t"><?php echo smartyTranslate(array('s'=>'Note','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
									<input type="hidden" name="id_order_invoice" value="<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
" />
									<textarea name="note" id="editNote<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
" class="edit-note textarea-autosize"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['document']->value->note,'html','UTF-8');?>
</textarea>
								</p>
								<p>
									<button type="submit" name="submitEditNote" class="btn btn-default">
										<i class="icon-save"></i>
										<?php echo smartyTranslate(array('s'=>'Save','d'=>'Admin.Actions'),$_smarty_tpl);?>

									</button>
									<a class="btn btn-default" href="#" id="cancelNote" onclick="$('#invoiceNote<?php echo $_smarty_tpl->tpl_vars['document']->value->id;?>
').hide();return false;">
										<i class="icon-remove"></i>
										<?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>

									</a>
								</p>
							</form>
						</td>
					</tr>
					<?php }?>
				<?php }?>
			<?php }
if (!$_smarty_tpl->tpl_vars['document']->_loop) {
?>
				<tr>
					<td colspan="5" class="list-empty">
						<div class="list-empty-msg">
							<i class="icon-warning-sign list-empty-icon"></i>
							<?php echo smartyTranslate(array('s'=>'There is no available document','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

						</div>
						<?php if (isset($_smarty_tpl->tpl_vars['invoice_management_active']->value)&&$_smarty_tpl->tpl_vars['invoice_management_active']->value) {?>
							<a class="btn btn-default" href="<?php echo $_smarty_tpl->tpl_vars['current_index']->value;?>
&amp;viewOrder&amp;submitGenerateInvoice&amp;id_order=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
<?php if (isset($_GET['token'])) {?>&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['token'],'html','UTF-8');?>
<?php }?>">
								<i class="icon-repeat"></i>
								<?php echo smartyTranslate(array('s'=>'Generate invoice','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

							</a>
						<?php }?>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:34:17
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_shipping.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c338d996854c7_47039033')) {function content_5c338d996854c7_47039033($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>
<div class="table-responsive">
	<table class="table" id="shipping_table">
		<thead>
			<tr>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Date','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box ">&nbsp;</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Weight','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Shipping cost','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</span>
				</th>
				<th>
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Tracking number','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</span>
				</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value->getShipping(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['line']->value['date_add'],'full'=>true),$_smarty_tpl);?>
</td>
				<td>&nbsp;</td>
				<td><?php echo $_smarty_tpl->tpl_vars['line']->value['carrier_name'];?>
</td>
				<td class="weight"><?php echo sprintf("%.3f",$_smarty_tpl->tpl_vars['line']->value['weight']);?>
 <?php echo Configuration::get('PS_WEIGHT_UNIT');?>
</td>
				<td class="price_carrier_<?php echo intval($_smarty_tpl->tpl_vars['line']->value['id_carrier']);?>
" class="center">
					<span>
					<?php if ($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_INC')) {?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['line']->value['shipping_cost_tax_incl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

					<?php } else { ?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['line']->value['shipping_cost_tax_excl'],'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

					<?php }?>
					</span>
				</td>
				<td>
					<span class="shipping_number_show"><?php if ($_smarty_tpl->tpl_vars['line']->value['url']&&$_smarty_tpl->tpl_vars['line']->value['tracking_number']) {?><a class="_blank" href="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['line']->value['url'],'@',$_smarty_tpl->tpl_vars['line']->value['tracking_number']);?>
"><?php echo $_smarty_tpl->tpl_vars['line']->value['tracking_number'];?>
</a><?php } else { ?><?php echo $_smarty_tpl->tpl_vars['line']->value['tracking_number'];?>
<?php }?></span>
				</td>
				<td>
					<?php if ($_smarty_tpl->tpl_vars['line']->value['can_edit']) {?>
						<a href="#" class="edit_shipping_link btn btn-default"
						data-id-order-carrier="<?php echo intval($_smarty_tpl->tpl_vars['line']->value['id_order_carrier']);?>
"
						data-id-carrier="<?php echo intval($_smarty_tpl->tpl_vars['line']->value['id_carrier']);?>
"
						data-tracking-number="<?php echo htmlentities($_smarty_tpl->tpl_vars['line']->value['tracking_number']);?>
"
						>
 							<i class="icon-pencil"></i>
 							<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl);?>

 						</a>
					<?php }?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<!-- shipping update modal -->
	<div class="modal fade" id="modal-shipping">
		<div class="modal-dialog">
			<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
&amp;vieworder&amp;id_order=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
">
				<input type="hidden" name="submitShippingNumber" id="submitShippingNumber" value="1" />
				<input type="hidden" name="id_order_carrier" id="id_order_carrier" />
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Admin.Actions'),$_smarty_tpl);?>
"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><?php echo smartyTranslate(array('s'=>'Edit shipping details','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<?php if (!$_smarty_tpl->tpl_vars['recalculate_shipping_cost']->value) {?>
							<div class="alert alert-info">
							<?php echo smartyTranslate(array('s'=>'Please note that carrier change will not recalculate your shipping costs, if you want to change this please visit Shop Parameters > Order Settings','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

							</div>
							<?php }?>
							<div class="form-group">
								<div class="col-lg-5"><?php echo smartyTranslate(array('s'=>'Tracking number','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</div>
								<div class="col-lg-7"><input type="text" name="shipping_tracking_number" id="shipping_tracking_number" /></div>
							</div>
							<div class="form-group">
								<div class="col-lg-5"><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</div>
								<div class="col-lg-7">
									<select name="shipping_carrier" id="shipping_carrier">
										<?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carrier_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
?>
											<option value="<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['carrier']->value['name'],'html','UTF-8');?>
 <?php if (isset($_smarty_tpl->tpl_vars['carrier']->value['delay'])) {?>(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['carrier']->value['delay'],'html','UTF-8');?>
)<?php }?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>
</button>
						<button type="submit" class="btn btn-primary"><?php echo smartyTranslate(array('s'=>'Update','d'=>'Admin.Actions'),$_smarty_tpl);?>
</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- END shipping update modal -->
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:34:17
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_customized_data.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c338d999419c6_59218495')) {function content_5c338d999419c6_59218495($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['product']->value['customizedDatas']) {?>

<?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
	<?php $_smarty_tpl->tpl_vars['product_price'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl']+$_smarty_tpl->tpl_vars['product']->value['ecotax']), null, 0);?>
<?php } else { ?>
	<?php $_smarty_tpl->tpl_vars['product_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl'], null, 0);?>
<?php }?>
	<tr class="customized customized-<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
 product-line-row">
		<td>
			<input type="hidden" class="edit_product_id_order_detail" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
" />
			<?php if (isset($_smarty_tpl->tpl_vars['product']->value['image'])&&intval($_smarty_tpl->tpl_vars['product']->value['image']->id)) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['image_tag'];?>
<?php } else { ?>--<?php }?>
		</td>
		<td>
			<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminProducts',true,array('id_product'=>intval($_smarty_tpl->tpl_vars['product']->value['product_id']),'updateproduct'=>'1')),'html','UTF-8');?>
">
			<span class="productName"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
 - <?php echo smartyTranslate(array('s'=>'Customized','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span><br />
			<?php if (($_smarty_tpl->tpl_vars['product']->value['product_reference'])) {?><?php echo smartyTranslate(array('s'=>'Reference number:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['product_reference'];?>
<br /><?php }?>
			<?php if (($_smarty_tpl->tpl_vars['product']->value['product_supplier_reference'])) {?><?php echo smartyTranslate(array('s'=>'Supplier reference:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['product_supplier_reference'];?>
<?php }?>
			</a>
		</td>
		<td>
			<span class="product_price_show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product_price']->value,'currency'=>intval($_smarty_tpl->tpl_vars['currency']->value->id)),$_smarty_tpl);?>
</span>
			<?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
			<div class="product_price_edit" style="display:none;">
				<input type="hidden" name="product_id_order_detail" class="edit_product_id_order_detail" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
" />
				<div class="form-group">
					<div class="fixed-width-xl">
						<div class="input-group">
							<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax excl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
							<input type="text" name="product_price_tax_excl" class="edit_product_price_tax_excl edit_product_price" value="<?php echo Tools::ps_round($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl'],2);?>
" size="5" />
							<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax excl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
						</div>
					</div>
					<br/>
					<div class="fixed-width-xl">
						<div class="input-group">
							<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax incl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
							<input type="text" name="product_price_tax_incl" class="edit_product_price_tax_incl edit_product_price" value="<?php echo Tools::ps_round($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl'],2);?>
" size="5" />
							<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax incl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
		</td>
		<td class="productQuantity text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'];?>
</td>
		<?php if ($_smarty_tpl->tpl_vars['display_warehouse']->value) {?><td>&nbsp;</td><?php }?>
		<?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?><td class="productQuantity text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['customizationQuantityRefunded'];?>
</td><?php }?>
		<?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||$_smarty_tpl->tpl_vars['order']->value->hasProductReturned())) {?><td class="productQuantity text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['customizationQuantityReturned'];?>
</td><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['stock_management']->value) {?><td class="text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['current_stock'];?>
</td><?php }?>
		<td class="total_product">
		<?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>Tools::ps_round($_smarty_tpl->tpl_vars['product']->value['product_price']*$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'],2),'currency'=>intval($_smarty_tpl->tpl_vars['currency']->value->id)),$_smarty_tpl);?>

		<?php } else { ?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>Tools::ps_round($_smarty_tpl->tpl_vars['product']->value['product_price_wt']*$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'],2),'currency'=>intval($_smarty_tpl->tpl_vars['currency']->value->id)),$_smarty_tpl);?>

		<?php }?>
		</td>
		<td class="cancelQuantity standard_refund_fields current-edit" style="display:none" colspan="2">
			&nbsp;
		</td>
		<td class="edit_product_fields" colspan="2" style="display:none">&nbsp;</td>
		<td class="partial_refund_fields current-edit" style="text-align:left;display:none;"></td>
		<?php if (($_smarty_tpl->tpl_vars['can_edit']->value&&!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered())) {?>
			<td class="product_action text-right">
				
				<div class="btn-group">
					<button type="button" class="btn btn-default edit_product_change_link">
						<i class="icon-pencil"></i>
						<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl);?>

					</button>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="#" class="delete_product_line">
								<i class="icon-trash"></i>
								<?php echo smartyTranslate(array('s'=>'Delete','d'=>'Admin.Actions'),$_smarty_tpl);?>

							</a>
						</li>
					</ul>
				</div>
				
				<button type="button" class="btn btn-default submitProductChange" style="display: none;">
					<i class="icon-ok"></i>
					<?php echo smartyTranslate(array('s'=>'Update','d'=>'Admin.Actions'),$_smarty_tpl);?>

				</button>
				<button type="button" class="btn btn-default cancel_product_change_link" style="display: none;">
					<i class="icon-remove"></i>
					<?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>

				</button>
			</td>
		<?php }?>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['customizationPerAddress'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customizationPerAddress']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizedDatas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customizationPerAddress']->key => $_smarty_tpl->tpl_vars['customizationPerAddress']->value) {
$_smarty_tpl->tpl_vars['customizationPerAddress']->_loop = true;
?>
		<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_smarty_tpl->tpl_vars['customizationId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customizationPerAddress']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
 $_smarty_tpl->tpl_vars['customizationId']->value = $_smarty_tpl->tpl_vars['customization']->key;
?>
			<tr class="customized customized-<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
">
				<td colspan="2">
				<input type="hidden" class="edit_product_id_order_detail" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
" />
					<div class="form-horizontal">
						<?php  $_smarty_tpl->tpl_vars['datas'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datas']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['datas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datas']->key => $_smarty_tpl->tpl_vars['datas']->value) {
$_smarty_tpl->tpl_vars['datas']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['datas']->key;
?>
							<?php if (($_smarty_tpl->tpl_vars['type']->value==Product::CUSTOMIZE_FILE)) {?>
								<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['data']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['data']->iteration++;
?>
									<div class="form-group">
										<span class="col-lg-4 control-label"><strong><?php if ($_smarty_tpl->tpl_vars['data']->value['name']) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Picture #','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['data']->iteration;?>
<?php }?></strong></span>
										<div class="col-lg-8">
											<a href="displayImage.php?img=<?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
&amp;name=<?php echo intval($_smarty_tpl->tpl_vars['order']->value->id);?>
-file<?php echo $_smarty_tpl->tpl_vars['data']->iteration;?>
" class="_blank">
												<img class="img-thumbnail" src="<?php echo @constant('_THEME_PROD_PIC_DIR_');?>
<?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
_small" alt=""/>
											</a>
										</div>
									</div>
								<?php } ?>
							<?php } elseif (($_smarty_tpl->tpl_vars['type']->value==Product::CUSTOMIZE_TEXTFIELD)) {?>
								<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['data']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value) {
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['data']->iteration++;
?>
									<div class="form-group">
										<span class="col-lg-4 control-label"><strong><?php if ($_smarty_tpl->tpl_vars['data']->value['name']) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Text #%s','sprintf'=>array($_smarty_tpl->tpl_vars['data']->iteration),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
<?php }?></strong></span>
										<div class="col-lg-8">
											<p class="form-control-static"><?php echo $_smarty_tpl->tpl_vars['data']->value['value'];?>
</p>
										</div>
									</div>
								<?php } ?>
							<?php }?>
						<?php } ?>
					</div>
				</td>
				<td>-</td>
				<td class="productQuantity text-center">
					<span class="product_quantity_show<?php if ((int)$_smarty_tpl->tpl_vars['customization']->value['quantity']>1) {?> red bold<?php }?>"><?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>
</span>
					<?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
					<span class="product_quantity_edit" style="display:none;">
						<input type="text" name="product_quantity[<?php echo intval($_smarty_tpl->tpl_vars['customizationId']->value);?>
]" class="edit_product_quantity" value="<?php echo htmlentities($_smarty_tpl->tpl_vars['customization']->value['quantity']);?>
" size="2" />
					</span>
					<?php }?>
				</td>
				<?php if ($_smarty_tpl->tpl_vars['display_warehouse']->value) {?><td>&nbsp;</td><?php }?>
				<?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?>
				<td class="text-center">
					<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['amount_refund'])) {?>
					<?php echo smartyTranslate(array('s'=>'%quantity_refunded% (%amount_refunded% refund)','sprintf'=>array('%quantity_refunded%'=>$_smarty_tpl->tpl_vars['customization']->value['quantity_refunded'],'%amount_refunded%'=>$_smarty_tpl->tpl_vars['product']->value['amount_refund']),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

					<?php }?>
					<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['quantity_refundable'];?>
" class="partialRefundProductQuantity" />
					<input type="hidden" value="<?php echo (Tools::ps_round($_smarty_tpl->tpl_vars['product_price']->value,2)*($_smarty_tpl->tpl_vars['product']->value['product_quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']));?>
" class="partialRefundProductAmount" />
				</td>
				<?php }?>
				<?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered())) {?><td class="text-center"><?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity_returned'];?>
</td><?php }?>
				<td class="text-center">-</td>
				<td class="total_product">
					<?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>Tools::ps_round($_smarty_tpl->tpl_vars['product']->value['product_price']*$_smarty_tpl->tpl_vars['customization']->value['quantity'],2),'currency'=>intval($_smarty_tpl->tpl_vars['currency']->value->id)),$_smarty_tpl);?>

					<?php } else { ?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>Tools::ps_round($_smarty_tpl->tpl_vars['product']->value['product_price_wt']*$_smarty_tpl->tpl_vars['customization']->value['quantity'],2),'currency'=>intval($_smarty_tpl->tpl_vars['currency']->value->id)),$_smarty_tpl);?>

					<?php }?>
				</td>
				<td class="cancelCheck standard_refund_fields current-edit" style="display:none">
					<input type="hidden" name="totalQtyReturn" id="totalQtyReturn" value="<?php echo intval($_smarty_tpl->tpl_vars['customization']->value['quantity_returned']);?>
" />
					<input type="hidden" name="totalQty" id="totalQty" value="<?php echo intval($_smarty_tpl->tpl_vars['customization']->value['quantity']);?>
" />
					<input type="hidden" name="productName" id="productName" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
" />
					<?php if (((!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||Configuration::get('PS_ORDER_RETURN'))&&(int)($_smarty_tpl->tpl_vars['customization']->value['quantity_returned'])<(int)($_smarty_tpl->tpl_vars['customization']->value['quantity']))) {?>
						<input type="checkbox" name="id_customization[<?php echo intval($_smarty_tpl->tpl_vars['customizationId']->value);?>
]" id="id_customization[<?php echo intval($_smarty_tpl->tpl_vars['customizationId']->value);?>
]" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
" onchange="setCancelQuantity(this, <?php echo intval($_smarty_tpl->tpl_vars['customizationId']->value);?>
, <?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']-$_smarty_tpl->tpl_vars['product']->value['product_quantity_reinjected'];?>
)" <?php if (($_smarty_tpl->tpl_vars['product']->value['product_quantity_return']+$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded']>=$_smarty_tpl->tpl_vars['product']->value['product_quantity'])) {?>disabled="disabled" <?php }?>/>
					<?php } else { ?>
					--
				<?php }?>
				</td>
				<td class="cancelQuantity standard_refund_fields current-edit" style="display:none">
				<?php if (($_smarty_tpl->tpl_vars['customization']->value['quantity_returned']+$_smarty_tpl->tpl_vars['customization']->value['quantity_refunded']>=$_smarty_tpl->tpl_vars['customization']->value['quantity'])) {?>
					<input type="hidden" name="cancelCustomizationQuantity[<?php echo intval($_smarty_tpl->tpl_vars['customizationId']->value);?>
]" value="0" />
				<?php } elseif ((!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||Configuration::get('PS_ORDER_RETURN'))) {?>
					<input type="text" id="cancelQuantity_<?php echo intval($_smarty_tpl->tpl_vars['customizationId']->value);?>
" name="cancelCustomizationQuantity[<?php echo intval($_smarty_tpl->tpl_vars['customizationId']->value);?>
]" size="2" onclick="selectCheckbox(this);" value="" />0/<?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity']-$_smarty_tpl->tpl_vars['customization']->value['quantity_refunded'];?>

				<?php }?>
				</td>
				<td class="partial_refund_fields current-edit" colspan="2" style="display:none; width: 250px;">
					<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity_refundable']>0) {?>
					<?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
						<?php $_smarty_tpl->tpl_vars['amount_refundable'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['amount_refundable'], null, 0);?>
					<?php } else { ?>
						<?php $_smarty_tpl->tpl_vars['amount_refundable'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['amount_refundable_tax_incl'], null, 0);?>
					<?php }?>
					<div class="form-group">
						<div class="<?php if ($_smarty_tpl->tpl_vars['product']->value['amount_refundable']>0) {?>col-lg-4<?php } else { ?>col-lg-12<?php }?>">
							<label class="control-label">
								<?php echo smartyTranslate(array('s'=>'Quantity:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

							</label>
							<div class="input-group">
								<input onchange="checkPartialRefundProductQuantity(this)" type="text" name="partialRefundProductQuantity[<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
]" value="<?php if (($_smarty_tpl->tpl_vars['customization']->value['quantity']-$_smarty_tpl->tpl_vars['customization']->value['quantity_refunded'])>0) {?>1<?php } else { ?>0<?php }?>" />
								<div class="input-group-addon">/ <?php echo $_smarty_tpl->tpl_vars['product']->value['quantity_refundable'];?>
</div>
							</div>
						</div>
						<div class="<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity_refundable']>0) {?>col-lg-8<?php } else { ?>col-lg-12<?php }?>">
							<label class="control-label">
								<span class="title_box "><?php echo smartyTranslate(array('s'=>'Amount:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
								<small class="text-muted">(<?php echo Smarty::$_smarty_vars['capture']['TaxMethod'];?>
)</small>
							</label>
							<div class="input-group">
								<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</div><?php }?>
								<input onchange="checkPartialRefundProductAmount(this)" type="text" name="partialRefundProduct[<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_order_detail']);?>
]" />
								<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</div><?php }?>
							</div>
							<p class="help-block"><i class="icon-warning-sign"></i> <?php echo smartyTranslate(array('s'=>'(Max %amount_refundable% %tax_method%)','sprintf'=>array('%amount_refundable%'=>Tools::displayPrice(Tools::ps_round($_smarty_tpl->tpl_vars['amount_refundable']->value,2),$_smarty_tpl->tpl_vars['currency']->value->id),'%tax_method%'=>Smarty::$_smarty_vars['capture']['TaxMethod']),'d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl);?>
</p>
						</div>
					</div>
					<?php }?>
				</td>
				<?php if (($_smarty_tpl->tpl_vars['can_edit']->value&&!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered())) {?>
					<td class="edit_product_fields" colspan="2" style="display:none"></td>
					<td class="product_action" style="text-align:right"></td>
				<?php }?>
			</tr>
		<?php } ?>
	<?php } ?>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:34:17
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_product_line.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c338d99d037b5_70345301')) {function content_5c338d99d037b5_70345301($_smarty_tpl) {?>


<?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
	<?php $_smarty_tpl->tpl_vars['product_price'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl']+$_smarty_tpl->tpl_vars['product']->value['ecotax']), null, 0);?>
<?php } else { ?>
	<?php $_smarty_tpl->tpl_vars['product_price'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl'], null, 0);?>
<?php }?>

<?php if (($_smarty_tpl->tpl_vars['product']->value['product_quantity']>$_smarty_tpl->tpl_vars['product']->value['customized_product_quantity'])) {?>
<tr class="product-line-row">
	<td><?php if (isset($_smarty_tpl->tpl_vars['product']->value['image'])&&$_smarty_tpl->tpl_vars['product']->value['image']->id) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['image_tag'];?>
<?php }?></td>
	<td>
		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminProducts',true,array('id_product'=>intval($_smarty_tpl->tpl_vars['product']->value['product_id']),'updateproduct'=>'1')),'html','UTF-8');?>
">
			<span class="productName"><?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
</span><br />
			<?php if ($_smarty_tpl->tpl_vars['product']->value['product_reference']) {?><?php echo smartyTranslate(array('s'=>'Reference number:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['product_reference'];?>
<br /><?php }?>
			<?php if ($_smarty_tpl->tpl_vars['product']->value['product_supplier_reference']) {?><?php echo smartyTranslate(array('s'=>'Supplier reference:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['product']->value['product_supplier_reference'];?>
<?php }?>
		</a>
        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['pack_items'])&&count($_smarty_tpl->tpl_vars['product']->value['pack_items'])>0) {?><br>
            <button name="package" class="btn btn-default" type="button" onclick="TogglePackage('<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
'); return false;" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
"><?php echo smartyTranslate(array('s'=>'Package content','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</button>
        <?php }?>
		<div class="row-editing-warning" style="display:none;">
			<div class="alert alert-warning">
				<strong><?php echo smartyTranslate(array('s'=>'Editing this product line will remove the reduction and base price.','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>
</strong>
			</div>
		</div>
	</td>
	<td>
		<span class="product_price_show"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product_price']->value,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
</span>
		<?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
		<div class="product_price_edit" style="display:none;">
			<input type="hidden" name="product_id_order_detail" class="edit_product_id_order_detail" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
" />
			<div class="form-group">
				<div class="fixed-width-xl">
					<div class="input-group">
						<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax excl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
						<input type="text" name="product_price_tax_excl" class="edit_product_price_tax_excl edit_product_price" value="<?php echo Tools::ps_round($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl'],2);?>
"/>
						<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax excl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
					</div>
				</div>
				<br/>
				<div class="fixed-width-xl">
					<div class="input-group">
						<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax incl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
						<input type="text" name="product_price_tax_incl" class="edit_product_price_tax_incl edit_product_price" value="<?php echo Tools::ps_round($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl'],2);?>
"/>
						<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax incl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
	</td>
	<td class="productQuantity text-center">
		<span class="product_quantity_show<?php if ((int)$_smarty_tpl->tpl_vars['product']->value['product_quantity']-(int)$_smarty_tpl->tpl_vars['product']->value['customized_product_quantity']>1) {?> badge<?php }?>"><?php echo (int)$_smarty_tpl->tpl_vars['product']->value['product_quantity']-(int)$_smarty_tpl->tpl_vars['product']->value['customized_product_quantity'];?>
</span>
		<?php if ($_smarty_tpl->tpl_vars['can_edit']->value) {?>
		<span class="product_quantity_edit" style="display:none;">
			<input type="text" name="product_quantity" class="edit_product_quantity" value="<?php echo htmlentities($_smarty_tpl->tpl_vars['product']->value['product_quantity']);?>
"/>
		</span>
		<?php }?>
	</td>
	<?php if ($_smarty_tpl->tpl_vars['display_warehouse']->value) {?>
		<td>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['warehouse_name'],'html','UTF-8');?>

			<?php if ($_smarty_tpl->tpl_vars['product']->value['warehouse_location']) {?>
				<br><?php echo smartyTranslate(array('s'=>'Location','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
: <strong><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['warehouse_location'],'html','UTF-8');?>
</strong>
			<?php }?>
		</td>
	<?php }?>
	<?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?>
		<td class="productQuantity text-center">
			<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['amount_refund'])) {?>
				<?php echo smartyTranslate(array('s'=>'%quantity_refunded% (%amount_refunded% refund)','sprintf'=>array('%quantity_refunded%'=>$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded'],'%amount_refunded%'=>$_smarty_tpl->tpl_vars['product']->value['amount_refund']),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

			<?php }?>
			<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['quantity_refundable'];?>
" class="partialRefundProductQuantity" />
			<input type="hidden" value="<?php echo (Tools::ps_round($_smarty_tpl->tpl_vars['product_price']->value,2)*($_smarty_tpl->tpl_vars['product']->value['product_quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']));?>
" class="partialRefundProductAmount" />
			<?php if (count($_smarty_tpl->tpl_vars['product']->value['refund_history'])) {?>
				<span class="tooltip">
					<span class="tooltip_label tooltip_button">+</span>
					<span class="tooltip_content">
					<span class="title"><?php echo smartyTranslate(array('s'=>'Refund history','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
					<?php  $_smarty_tpl->tpl_vars['refund'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['refund']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['refund_history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['refund']->key => $_smarty_tpl->tpl_vars['refund']->value) {
$_smarty_tpl->tpl_vars['refund']->_loop = true;
?>
						<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['refund']->value['date_add']),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['refund']->value['amount_tax_incl']),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smartyTranslate(array('s'=>'%refund_date% - %refund_amount%','sprintf'=>array('%refund_date%'=>$_tmp2,'%refund_amount%'=>$_tmp3),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
<br />
					<?php } ?>
					</span>
				</span>
			<?php }?>
		</td>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||$_smarty_tpl->tpl_vars['order']->value->hasProductReturned()) {?>
		<td class="productQuantity text-center">
			<?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity_return'];?>

			<?php if (count($_smarty_tpl->tpl_vars['product']->value['return_history'])) {?>
				<span class="tooltip">
					<span class="tooltip_label tooltip_button">+</span>
					<span class="tooltip_content">
					<span class="title"><?php echo smartyTranslate(array('s'=>'Return history','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span>
					<?php  $_smarty_tpl->tpl_vars['return'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['return']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['return_history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['return']->key => $_smarty_tpl->tpl_vars['return']->value) {
$_smarty_tpl->tpl_vars['return']->_loop = true;
?>
						<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['return']->value['date_add']),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php echo smartyTranslate(array('s'=>'%return_date% - %return_quantity% - %return_state%','sprintf'=>array('%return_date%'=>$_tmp4,'%return_quantity%'=>$_smarty_tpl->tpl_vars['return']->value['product_quantity'],'3return_state%'=>$_smarty_tpl->tpl_vars['return']->value['state']),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
<br />
					<?php } ?>
					</span>
				</span>
			<?php }?>
		</td>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['stock_management']->value) {?><td class="productQuantity product_stock text-center"><?php echo $_smarty_tpl->tpl_vars['product']->value['current_stock'];?>
</td><?php }?>
	<td class="total_product">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>(Tools::ps_round($_smarty_tpl->tpl_vars['product_price']->value,2)*($_smarty_tpl->tpl_vars['product']->value['product_quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'])),'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>

	</td>
	<td colspan="2" style="display: none;" class="add_product_fields">&nbsp;</td>
	<td class="cancelCheck standard_refund_fields current-edit" style="display:none">
		<input type="hidden" name="totalQtyReturn" id="totalQtyReturn" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity_return'];?>
" />
		<input type="hidden" name="totalQty" id="totalQty" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity'];?>
" />
		<input type="hidden" name="productName" id="productName" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['product_name'];?>
" />
	<?php if (((!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||Configuration::get('PS_ORDER_RETURN'))&&(int)($_smarty_tpl->tpl_vars['product']->value['product_quantity_return'])<(int)($_smarty_tpl->tpl_vars['product']->value['product_quantity']))) {?>
		<input type="checkbox" name="id_order_detail[<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
]" id="id_order_detail[<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
" onchange="setCancelQuantity(this, <?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
, <?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']-$_smarty_tpl->tpl_vars['product']->value['product_quantity_return']-$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded'];?>
)" <?php if (($_smarty_tpl->tpl_vars['product']->value['product_quantity_return']+$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded']>=$_smarty_tpl->tpl_vars['product']->value['product_quantity'])) {?>disabled="disabled" <?php }?>/>
	<?php } else { ?>
		--
	<?php }?>
	</td>
	<td class="cancelQuantity standard_refund_fields current-edit" style="display:none">
	<?php if (($_smarty_tpl->tpl_vars['product']->value['product_quantity_return']+$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded']>=$_smarty_tpl->tpl_vars['product']->value['product_quantity'])) {?>
		<input type="hidden" name="cancelQuantity[<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
]" value="0" />
	<?php } elseif ((!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered()||Configuration::get('PS_ORDER_RETURN'))) {?>
		<input type="text" id="cancelQuantity_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
" name="cancelQuantity[<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
]" onchange="checkTotalRefundProductQuantity(this)" value="" />
	<?php }?>

	<?php if ($_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']) {?>
		<?php $_smarty_tpl->tpl_vars['productQuantity'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value['product_quantity']-$_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal']), null, 0);?>
	<?php } else { ?>
		<?php $_smarty_tpl->tpl_vars['productQuantity'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['product_quantity'], null, 0);?>
	<?php }?>

	<?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered())) {?>
		<?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded'];?>
/<?php echo $_smarty_tpl->tpl_vars['productQuantity']->value-$_smarty_tpl->tpl_vars['product']->value['product_quantity_refunded'];?>

	<?php } elseif (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?>
		<?php echo $_smarty_tpl->tpl_vars['product']->value['product_quantity_return'];?>
/<?php echo $_smarty_tpl->tpl_vars['productQuantity']->value;?>

	<?php } else { ?>
		0/<?php echo $_smarty_tpl->tpl_vars['productQuantity']->value;?>

	<?php }?>
	</td>
	<td class="partial_refund_fields current-edit" colspan="2" style="display:none; width: 250px;">
		<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity_refundable']>0) {?>
		<?php if (($_smarty_tpl->tpl_vars['order']->value->getTaxCalculationMethod()==@constant('PS_TAX_EXC'))) {?>
			<?php $_smarty_tpl->tpl_vars['amount_refundable'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['amount_refundable'], null, 0);?>
		<?php } else { ?>
			<?php $_smarty_tpl->tpl_vars['amount_refundable'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['amount_refundable_tax_incl'], null, 0);?>
		<?php }?>
		<div class="form-group">
			<div class="<?php if ($_smarty_tpl->tpl_vars['product']->value['amount_refundable']>0) {?>col-lg-4<?php } else { ?>col-lg-12<?php }?>">
				<label class="control-label">
					<?php echo smartyTranslate(array('s'=>'Quantity:'),$_smarty_tpl);?>

				</label>
				<div class="input-group">
					<input onchange="checkPartialRefundProductQuantity(this)" type="text" name="partialRefundProductQuantity[<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
<?php $_tmp5=ob_get_clean();?><?php echo $_tmp5;?>
]" value="0" />
					<div class="input-group-addon">/ <?php echo $_smarty_tpl->tpl_vars['product']->value['quantity_refundable'];?>
</div>
				</div>
			</div>
			<div class="<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity_refundable']>0) {?>col-lg-8<?php } else { ?>col-lg-12<?php }?>">
				<label class="control-label">
					<span class="title_box "><?php echo smartyTranslate(array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
					<small class="text-muted">(<?php echo Smarty::$_smarty_vars['capture']['TaxMethod'];?>
)</small>
				</label>
				<div class="input-group">
					<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</div><?php }?>
					<input onchange="checkPartialRefundProductAmount(this)" type="text" name="partialRefundProduct[<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
]" />
					<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</div><?php }?>
				</div>
        <p class="help-block"><i class="icon-warning-sign"></i> <?php echo smartyTranslate(array('s'=>'(Max %amount_refundable% %tax_method%)','sprintf'=>array('%amount_refundable%'=>Tools::displayPrice(Tools::ps_round($_smarty_tpl->tpl_vars['amount_refundable']->value,2),$_smarty_tpl->tpl_vars['currency']->value->id),'%tax_method%'=>Smarty::$_smarty_vars['capture']['TaxMethod']),'d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl);?>
</p>
			</div>
		</div>
		<?php }?>
	</td>
	<?php if (($_smarty_tpl->tpl_vars['can_edit']->value&&!$_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered())) {?>
	<td class="product_invoice" style="display: none;">
		<?php if (sizeof($_smarty_tpl->tpl_vars['invoices_collection']->value)) {?>
		<select name="product_invoice" class="edit_product_invoice">
			<?php  $_smarty_tpl->tpl_vars['invoice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['invoice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['invoices_collection']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['invoice']->key => $_smarty_tpl->tpl_vars['invoice']->value) {
$_smarty_tpl->tpl_vars['invoice']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['invoice']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['invoice']->value->id==$_smarty_tpl->tpl_vars['product']->value['id_order_invoice']) {?>selected="selected"<?php }?>>
				#<?php echo Configuration::get('PS_INVOICE_PREFIX',$_smarty_tpl->tpl_vars['current_id_lang']->value,null,$_smarty_tpl->tpl_vars['order']->value->id_shop);?>
<?php echo sprintf('%06d',$_smarty_tpl->tpl_vars['invoice']->value->number);?>

			</option>
			<?php } ?>
		</select>
		<?php } else { ?>
		&nbsp;
		<?php }?>
	</td>
	<td class="product_action text-right">
		
		<div class="btn-group">
			<button type="button" class="btn btn-default edit_product_change_link">
				<i class="icon-pencil"></i>
				<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl);?>

			</button>
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li>
					<a href="#" class="delete_product_line">
						<i class="icon-trash"></i>
						<?php echo smartyTranslate(array('s'=>'Delete','d'=>'Admin.Actions'),$_smarty_tpl);?>

					</a>
				</li>
			</ul>
		</div>
		
		<button type="button" class="btn btn-default submitProductChange" style="display: none;">
			<i class="icon-ok"></i>
			<?php echo smartyTranslate(array('s'=>'Update','d'=>'Admin.Actions'),$_smarty_tpl);?>

		</button>
		<button type="button" class="btn btn-default cancel_product_change_link" style="display: none;">
			<i class="icon-remove"></i>
			<?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>

		</button>
	</td>
	<?php }?>
</tr>
   <?php if (isset($_smarty_tpl->tpl_vars['product']->value['pack_items'])&&count($_smarty_tpl->tpl_vars['product']->value['pack_items'])>0) {?>
    <tr>
        <td colspan="8" style="width:100%">
            <table style="width: 100%; display:none;" class="table" id="pack_items_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_order_detail'];?>
">
            <thead>
                <th style="width:15%;">&nbsp;</th>
                <th style="width:15%;">&nbsp;</th>
                <th style="width:50%;"><span class="title_box "><?php echo smartyTranslate(array('s'=>'Product','d'=>'Admin.Global'),$_smarty_tpl);?>
</span></th>
                <th style="width:10%;"><span class="title_box "><?php echo smartyTranslate(array('s'=>'Qty','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</th>
                <?php if ($_smarty_tpl->tpl_vars['stock_management']->value) {?><th><span class="title_box "><?php echo smartyTranslate(array('s'=>'Available quantity','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</span></th><?php }?>
                <th>&nbsp;</th>
            </thead>
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['pack_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pack_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['pack_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pack_item']->key => $_smarty_tpl->tpl_vars['pack_item']->value) {
$_smarty_tpl->tpl_vars['pack_item']->_loop = true;
?>
                <?php if (!empty($_smarty_tpl->tpl_vars['pack_item']->value['active'])) {?>
                    <tr class="product-line-row" <?php if (isset($_smarty_tpl->tpl_vars['pack_item']->value['image'])&&$_smarty_tpl->tpl_vars['pack_item']->value['image']->id&&isset($_smarty_tpl->tpl_vars['pack_item']->value['image_size'])) {?> height="<?php echo $_smarty_tpl->tpl_vars['pack_item']->value['image_size'][1]+7;?>
"<?php }?>>
                        <td><?php echo smartyTranslate(array('s'=>'Package item','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</td>
                        <td><?php if (isset($_smarty_tpl->tpl_vars['pack_item']->value['image'])&&$_smarty_tpl->tpl_vars['pack_item']->value['image']->id) {?><?php echo $_smarty_tpl->tpl_vars['pack_item']->value['image_tag'];?>
<?php }?></td>
                        <td>
                            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminProducts',true,array('id_product'=>$_smarty_tpl->tpl_vars['pack_item']->value['id_product'],'updateproduct'=>'1')),'html','UTF-8');?>
">
                                <span class="productName"><?php echo $_smarty_tpl->tpl_vars['pack_item']->value['name'];?>
</span><br />
                                <?php if ($_smarty_tpl->tpl_vars['pack_item']->value['reference']) {?><?php echo smartyTranslate(array('s'=>'Ref:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['pack_item']->value['reference'];?>
<br /><?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['pack_item']->value['supplier_reference']) {?><?php echo smartyTranslate(array('s'=>'Ref Supplier:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['pack_item']->value['supplier_reference'];?>
<?php }?>
                            </a>
                        </td>
                        <td class="productQuantity">
                            <span class="product_quantity_show<?php if ((int)$_smarty_tpl->tpl_vars['pack_item']->value['pack_quantity']>1) {?> red bold<?php }?>"><?php echo $_smarty_tpl->tpl_vars['pack_item']->value['pack_quantity'];?>
</span>
                        </td>
                        <?php if ($_smarty_tpl->tpl_vars['stock_management']->value) {?><td class="productQuantity product_stock"><?php echo $_smarty_tpl->tpl_vars['pack_item']->value['current_stock'];?>
</td><?php }?>
                        <td>&nbsp;</td>
                    </tr>
                <?php }?>
            <?php } ?>
            </tbody>
            </table>
        </td>
    </tr>
    <?php }?>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:34:18
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_new_product.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c338d9a22f7e3_36183708')) {function content_5c338d9a22f7e3_36183708($_smarty_tpl) {?>
<tr id="new_product" style="display:none">
	<td style="display:none;" colspan="2">
		<input type="hidden" id="add_product_product_id" name="add_product[product_id]" value="0" />

		<div class="form-group">
			<label><?php echo smartyTranslate(array('s'=>'Product','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
			<div class="input-group">
				<input type="text" id="add_product_product_name" value=""/>
				<div class="input-group-addon">
					<i class="icon-search"></i>
				</div>
			</div>
		</div>

		<div id="add_product_product_attribute_area" class="form-group" style="display: none;">
			<label><?php echo smartyTranslate(array('s'=>'Combinations','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
			<select name="add_product[product_attribute_id]" id="add_product_product_attribute_id"></select>
		</div>

		<div id="add_product_product_warehouse_area" class="form-group" style="display: none;">
			<label><?php echo smartyTranslate(array('s'=>'Warehouse'),$_smarty_tpl);?>
</label>
			<select  id="add_product_warehouse" name="add_product_warehouse"></select>
		</div>
	</td>

	<td style="display:none;">
		<div class="row">
			<div class="input-group fixed-width-xl">
				<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax excl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
				<input type="text" name="add_product[product_price_tax_excl]" id="add_product_product_price_tax_excl" value="" disabled="disabled" />
				<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax excl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="input-group fixed-width-xl">
				<?php if ($_smarty_tpl->tpl_vars['currency']->value->format%2) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax incl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
				<input type="text" name="add_product[product_price_tax_incl]" id="add_product_product_price_tax_incl" value="" disabled="disabled" />
				<?php if (!($_smarty_tpl->tpl_vars['currency']->value->format%2)) {?><div class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
 <?php echo smartyTranslate(array('s'=>'tax incl.','d'=>'Admin.Global'),$_smarty_tpl);?>
</div><?php }?>
			</div>
		</div>
	</td>

	<td style="display:none;" class="productQuantity">
		<input type="number" class="form-control fixed-width-sm" name="add_product[product_quantity]" id="add_product_product_quantity" value="1" disabled="disabled" />
	</td>
	<?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenPaid())) {?><td style="display:none;" class="productQuantity"></td><?php }?>
	<?php if ($_smarty_tpl->tpl_vars['display_warehouse']->value) {?><td></td><?php }?>
	<?php if (($_smarty_tpl->tpl_vars['order']->value->hasBeenDelivered())) {?><td style="display:none;" class="productQuantity"></td><?php }?>
	<td style="display:none;" class="productQuantity" id="add_product_product_stock">0</td>
	<td style="display:none;" id="add_product_product_total"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>0,'currency'=>$_smarty_tpl->tpl_vars['currency']->value->id),$_smarty_tpl);?>
</td>
	<td style="display:none;" colspan="2">
		<?php if (sizeof($_smarty_tpl->tpl_vars['invoices_collection']->value)) {?>
		<select class="form-control" name="add_product[invoice]" id="add_product_product_invoice" disabled="disabled">
			<optgroup class="existing" label="<?php echo smartyTranslate(array('s'=>'Existing'),$_smarty_tpl);?>
">
				<?php  $_smarty_tpl->tpl_vars['invoice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['invoice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['invoices_collection']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['invoice']->key => $_smarty_tpl->tpl_vars['invoice']->value) {
$_smarty_tpl->tpl_vars['invoice']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['invoice']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['invoice']->value->getInvoiceNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value);?>
</option>
				<?php } ?>
			</optgroup>
			<optgroup label="<?php echo smartyTranslate(array('s'=>'New'),$_smarty_tpl);?>
">
				<option value="0"><?php echo smartyTranslate(array('s'=>'Create a new invoice','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</option>
			</optgroup>
		</select>
		<?php }?>
	</td>
	<td style="display:none;">
		<button type="button" class="btn btn-default" id="cancelAddProduct">
			<i class="icon-remove text-danger"></i>
			<?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>

		</button>
		<button type="button" class="btn btn-default" id="submitAddProduct" disabled="disabled">
			<i class="icon-ok text-success"></i>
			<?php echo smartyTranslate(array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl);?>

		</button>
	</td>
</tr>

<tr id="new_invoice" style="display:none">
	<td colspan="10">
		<h4><?php echo smartyTranslate(array('s'=>'New invoice information','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h4>
		<div class="form-horizontal">
			<div class="form-group">
				<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</label>
				<div class="col-lg-9">
					<p class="form-control-static"><strong><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</strong></p>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Shipping Costs','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</label>
				<div class="col-lg-9">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="add_invoice[free_shipping]" value="1" />
							<?php echo smartyTranslate(array('s'=>'Free shipping','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>

						</label>
						<p class="help-block"><?php echo smartyTranslate(array('s'=>'If you don\'t select "Free shipping," the normal shipping costs will be applied.','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl);?>
</p>
					</div>
				</div>
			</div>
		</div>
	</td>
</tr>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:34:18
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_discount_form.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c338d9a2fe825_20737701')) {function content_5c338d9a2fe825_20737701($_smarty_tpl) {?>

<div class="form-horizontal well">
	<div class="form-group">
		<label class="control-label col-lg-3">
			<?php echo smartyTranslate(array('s'=>'Name','d'=>'Admin.Global'),$_smarty_tpl);?>

		</label>
		<div class="col-lg-9">
			<input class="form-control" type="text" name="discount_name" value="" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-lg-3">
			<?php echo smartyTranslate(array('s'=>'Type','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

		</label>
		<div class="col-lg-9">
			<select class="form-control" name="discount_type" id="discount_type">
				<option value="1"><?php echo smartyTranslate(array('s'=>'Percent','d'=>'Admin.Global'),$_smarty_tpl);?>
</option>
				<option value="2"><?php echo smartyTranslate(array('s'=>'Amount','d'=>'Admin.Global'),$_smarty_tpl);?>
</option>
				<option value="3"><?php echo smartyTranslate(array('s'=>'Free shipping','d'=>'Admin.Shipping.Feature'),$_smarty_tpl);?>
</option>
			</select>
		</div>
	</div>

	<div id="discount_value_field" class="form-group">
		<label class="control-label col-lg-3">
			<?php echo smartyTranslate(array('s'=>'Value','d'=>'Admin.Global'),$_smarty_tpl);?>

		</label>
		<div class="col-lg-9">
			<div class="input-group">
				<div class="input-group-addon">
					<span id="discount_currency_sign" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</span>
					<span id="discount_percent_symbol">%</span>
				</div>
				<input class="form-control" type="text" name="discount_value"/>
			</div>
			<p class="text-muted" id="discount_value_help" style="display: none;">
				<?php echo smartyTranslate(array('s'=>'This value must include taxes.','d'=>'Admin.Orderscustomers.Notification'),$_smarty_tpl);?>

			</p>
		</div>
	</div>

	<?php if ($_smarty_tpl->tpl_vars['order']->value->hasInvoice()) {?>
	<div class="form-group">
		<label class="control-label col-lg-3">
			<?php echo smartyTranslate(array('s'=>'Invoice','d'=>'Admin.Global'),$_smarty_tpl);?>

		</label>
		<div class="col-lg-9">
			<select name="discount_invoice">
				<?php  $_smarty_tpl->tpl_vars['invoice'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['invoice']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['invoices_collection']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['invoice']->key => $_smarty_tpl->tpl_vars['invoice']->value) {
$_smarty_tpl->tpl_vars['invoice']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['invoice']->value->id;?>
" selected="selected">
					<?php echo $_smarty_tpl->tpl_vars['invoice']->value->getInvoiceNumberFormatted($_smarty_tpl->tpl_vars['current_id_lang']->value);?>
 - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['invoice']->value->total_paid_tax_incl,'currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency),$_smarty_tpl);?>

				</option>
				<?php } ?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-9 col-lg-offset-3">
			<p class="checkbox">
				<label class="control-label" for="discount_all_invoices">
					<input type="checkbox" name="discount_all_invoices" id="discount_all_invoices" value="1" />
					<?php echo smartyTranslate(array('s'=>'Apply on all invoices','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

				</label>
			</p>
			<p class="help-block">
				<?php echo smartyTranslate(array('s'=>'If you chooses to create this discount for all invoices, only one discount will be created per order invoice.','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl);?>

			</p>
		</div>
	</div>
	<?php }?>

	<div class="row">
		<div class="col-lg-9 col-lg-offset-3">
			<button class="btn btn-default" type="button" id="cancel_add_voucher">
				<i class="icon-remove text-danger"></i>
				<?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>

			</button>
			<button class="btn btn-default" type="submit" name="submitNewVoucher">
				<i class="icon-ok text-success"></i>
				<?php echo smartyTranslate(array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl);?>

			</button>
		</div>
	</div>
</div>
<?php }} ?>
