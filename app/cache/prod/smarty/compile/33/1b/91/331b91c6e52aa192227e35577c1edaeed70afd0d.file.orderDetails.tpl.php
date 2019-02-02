<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:26:26
         compiled from "/var/www/html/SHN/modules/lgdetailedorder/views/templates/admin/hooks/orderDetails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8764656515c338bc2e1a1b7-63136775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '331b91c6e52aa192227e35577c1edaeed70afd0d' => 
    array (
      0 => '/var/www/html/SHN/modules/lgdetailedorder/views/templates/admin/hooks/orderDetails.tpl',
      1 => 1513278313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8764656515c338bc2e1a1b7-63136775',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datos' => 0,
    'product' => 0,
    'customization' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338bc2e796c3_40192514',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338bc2e796c3_40192514')) {function content_5c338bc2e796c3_40192514($_smarty_tpl) {?>
<table class="table" style="width:100%;">
    <tr>
        <td><b><?php echo smartyTranslate(array('s'=>'Order','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b> <?php echo intval($_smarty_tpl->tpl_vars['datos']->value['id_order']);?>
</td>
        <td>
            <i class="icon-credit-card"></i>
            <b><?php echo smartyTranslate(array('s'=>'Payment','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['payment'],'htmlall','UTF-8');?>

            <span id="iconsPrintClose">
                <img src="../modules/lgdetailedorder/views/img/close-icon.png" onclick="closeInfo();" style="cursor:pointer;float:right;">
                <img src="../modules/lgdetailedorder/views/img/print.png" onclick="print();" style="cursor:pointer;float:right;margin-right:5px;">
            </span>
        </td>
    </tr>
    <tr>
        <td><b><?php echo smartyTranslate(array('s'=>'Reference','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['reference'],'htmlall','UTF-8');?>
</td>
        <td><i class="icon-time"></i> <b><?php echo smartyTranslate(array('s'=>'Status','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['order_state'],'htmlall','UTF-8');?>
</td>
    </tr>
    <tr>
        <td><i class="icon-calendar"></i> <b><?php echo smartyTranslate(array('s'=>'Date','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['date_add'],'htmlall','UTF-8');?>
</td>
        <?php if ($_smarty_tpl->tpl_vars['datos']->value['id_employee']>0) {?>
        <td><i class="icon-user"></i> <b><?php echo smartyTranslate(array('s'=>'Prepared by','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['name1_employee'],'htmlall','UTF-8');?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['name2_employee'],'htmlall','UTF-8');?>
.<br></td>
        <?php }?>
    </tr>
</table>

<table class="table" style="width:100%;">
    <tr>
        <th><?php echo smartyTranslate(array('s'=>'Image','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Product','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Unit price','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Total price','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datos']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
    <tr>
        <td><?php if ($_smarty_tpl->tpl_vars['product']->value['thumbnail']) {?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['thumbnail'],'htmlall','UTF-8');?>
?time=<?php echo intval($_smarty_tpl->tpl_vars['datos']->value['random']);?>
" alt="" class="imgm img-thumbnail"><?php }?></td>
        <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['product_name'],'htmlall','UTF-8');?>
 (<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['product_reference'],'htmlall','UTF-8');?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['product_supplier_reference'],'htmlall','UTF-8');?>
)</td>
        <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['product_quantity'],'htmlall','UTF-8');?>
</td>
        <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl_cur'],'htmlall','UTF-8');?>
</td>
        <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['total_price_tax_incl_cur'],'htmlall','UTF-8');?>
</td>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datos']->value['custom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['product']->value['product_id']==$_smarty_tpl->tpl_vars['customization']->value['id_product']) {?>
    <tr>
        <td></td>
        <td colspan="4" style="padding-left:25px;font-style: italic;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['customization']->value['value'],'htmlall','UTF-8');?>
</td>
    </tr>
    <?php }?>
    <?php } ?>
    <?php } ?>
    <?php if ($_smarty_tpl->tpl_vars['datos']->value['discount']!=false) {?>
    <tr>
        <td colspan="3"></td>
        <td><b><?php echo smartyTranslate(array('s'=>'Discount','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</b></td>
        <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['discount_cur'],'htmlall','UTF-8');?>
</td>
    </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['datos']->value['gift']!=false) {?>
    <tr>
        <td colspan="3"></td>
        <td><b><?php echo smartyTranslate(array('s'=>'Gift-wrapping','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</b></td>
        <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['gift_cost_cur'],'htmlall','UTF-8');?>
</td>
    </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping']==0) {?>
        <tr>
            <td colspan="3"></td>
            <td><b><?php echo smartyTranslate(array('s'=>'Shipping','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</b></td>
            <td><?php echo smartyTranslate(array('s'=>'Free','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</td>
        </tr>
    <?php } else { ?>
        <tr>
            <td colspan="3"></td>
            <td><b><?php echo smartyTranslate(array('s'=>'Shipping','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</b></td>
            <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_cur'],'htmlall','UTF-8');?>
</td>
        </tr>
    <?php }?>
    <tr>
        <td colspan="3"></td>
        <td><b><?php echo smartyTranslate(array('s'=>'Total','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</b></td>
        <td><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['total_cur'],'htmlall','UTF-8');?>
</td>
    </tr>
</table>
<?php if ($_smarty_tpl->tpl_vars['datos']->value['gift']!=false) {?>
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-gift"></i>
            <b><?php echo smartyTranslate(array('s'=>'Gift-wrapping selected','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</b>
        </td>
    </tr>
</table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['datos']->value['recyclable']!=false) {?>
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-recycle"></i>
            <b><?php echo smartyTranslate(array('s'=>'Recycled packaging selected','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</b>
        </td>
    </tr>
</table>
<?php }?>
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-truck"></i>
            <b><?php echo smartyTranslate(array('s'=>'Carrier','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['carrier']['name'],'htmlall','UTF-8');?>
 (<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['carrier']['delay'],'htmlall','UTF-8');?>
)
        </td>
    </tr>
</table>
<?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_number']!=false) {?>
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-globe"></i>
            <b><?php echo smartyTranslate(array('s'=>'Tracking number','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_number'],'htmlall','UTF-8');?>

        </td>
    </tr>
</table>
<?php }?>
<table class="table" style="width:100%;">
    <tr>
        <th><i class="icon-map-marker"></i> <?php echo smartyTranslate(array('s'=>'Shipping address','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</th>
        <th><i class="icon-file-text"></i> <?php echo smartyTranslate(array('s'=>'Billing address','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</th>
    </tr>
    <tr>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['company']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['company'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['firstname']&&$_smarty_tpl->tpl_vars['datos']->value['shipping_address']['lastname']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['firstname'],'htmlall','UTF-8');?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['lastname'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['address1']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['address1'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['address2']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['address2'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['postcode']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['postcode'],'htmlall','UTF-8');?>

            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['city']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['city'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_state']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_state'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_country']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_country'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['phone']!=false) {?>
                <i class="icon-phone"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['phone'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['phone_mobile']!=false) {?>
                <i class="icon-mobile-phone"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['phone_mobile'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['dni']!=false) {?>
                <i class="icon-info"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['dni'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['vat_number']!=false) {?>
                <i class="icon-info"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['shipping_address']['vat_number'],'htmlall','UTF-8');?>
<br>
            <?php }?>
        </td>
        <td>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_address']['company']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['company'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_address']['firstname']&&$_smarty_tpl->tpl_vars['datos']->value['billing_address']['lastname']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['firstname'],'htmlall','UTF-8');?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['lastname'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_address']['address1']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['address1'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_address']['address2']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['address2'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_address']['postcode']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['postcode'],'htmlall','UTF-8');?>

            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_address']['city']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['city'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_state']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_state'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_country']!=false) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_country'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_address']['phone']!=false) {?>
                <i class="icon-phone"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['phone'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_address']['phone_mobile']!=false) {?>
                <i class="icon-mobile-phone"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['phone_mobile'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_address']['dni']!=false) {?>
                <i class="icon-info"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['dni'],'htmlall','UTF-8');?>
<br>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['datos']->value['billing_address']['vat_number']!=false) {?>
                <i class="icon-info"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['billing_address']['vat_number'],'htmlall','UTF-8');?>
<br>
            <?php }?>
        </td>
    </tr>
</table>
<?php if ($_smarty_tpl->tpl_vars['datos']->value['customer_message']!=false) {?>
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-pencil"></i>
            <b><?php echo smartyTranslate(array('s'=>'Customer message','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['customer_message'],'htmlall','UTF-8');?>

        </td>
    </tr>
</table>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['datos']->value['gift_message']!=false) {?>
<table class="table" style="width:100%;">
    <tr>
        <td>
            <i class="icon-gift"></i>
            <b><?php echo smartyTranslate(array('s'=>'Gift message','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['gift_message'],'htmlall','UTF-8');?>

        </td>
    </tr>
</table>
<?php }?>
<table class="table" style="width:100%;">
    <tr>
        <th colspan="3"><i class="icon-user"></i> <?php echo smartyTranslate(array('s'=>'Customer information','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
</th>
    </tr>
    <tr>
        <td><b><?php echo smartyTranslate(array('s'=>'First name','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['customer']['firstname'],'htmlall','UTF-8');?>
</td>
        <td><b><?php echo smartyTranslate(array('s'=>'Last name','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['customer']['lastname'],'htmlall','UTF-8');?>
</td>
        <td>
            <i class="icon-envelope-o"></i>
            <b><?php echo smartyTranslate(array('s'=>'Email','mod'=>'lgdetailedorder'),$_smarty_tpl);?>
:</b>
            <a href="mailto:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['customer']['email'],'htmlall','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['datos']->value['customer']['email'],'htmlall','UTF-8');?>
</a>
        </td>
    </tr>
</table>
<?php }} ?>
