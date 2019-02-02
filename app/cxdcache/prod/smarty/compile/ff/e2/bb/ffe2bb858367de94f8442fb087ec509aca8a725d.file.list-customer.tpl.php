<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:48:31
         compiled from "/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-customer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8348623885c31a4bfbd5423-66446218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffe2bb858367de94f8442fb087ec509aca8a725d' => 
    array (
      0 => '/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-customer.tpl',
      1 => 1519199329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8348623885c31a4bfbd5423-66446218',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'company' => 0,
    'customer' => 0,
    'compaddress' => 0,
    'firstname' => 0,
    'lastname' => 0,
    'address1' => 0,
    'address2' => 0,
    'postcode' => 0,
    'city' => 0,
    'phone' => 0,
    'dni' => 0,
    'vat_number' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a4bfbeb9b1_86312979',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a4bfbeb9b1_86312979')) {function content_5c31a4bfbeb9b1_86312979($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['company']->value)&&$_smarty_tpl->tpl_vars['company']->value!='') {?>
    <span class="opp-company"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['company']->value,'htmlall','UTF-8');?>
</span><br>
<?php }?>
<span class="opp-customer-name"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['customer']->value,'htmlall','UTF-8');?>
</span><br>
<br>
<span class="opp-addr-label"><?php echo smartyTranslate(array('s'=>'Shipping address','mod'=>'ordersplusplus'),$_smarty_tpl);?>
&colon;</span><br>
<?php if (isset($_smarty_tpl->tpl_vars['compaddress']->value)&&$_smarty_tpl->tpl_vars['compaddress']->value!='') {?>
    <span class="opp-addr-company"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['compaddress']->value,'htmlall','UTF-8');?>
</span><br>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['firstname']->value)) {?>
    <span class="opp-firstlastname"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['firstname']->value,'htmlall','UTF-8');?>
&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['lastname']->value,'htmlall','UTF-8');?>
</span><br>
    <span class="opp-addr1"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['address1']->value,'htmlall','UTF-8');?>
</span><br>
    <?php if ($_smarty_tpl->tpl_vars['address2']->value!='') {?>
        <span class="opp-addr2"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['address2']->value,'htmlall','UTF-8');?>
</span><br>
    <?php }?>
    <span class="opp-postcode-city"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['postcode']->value,'htmlall','UTF-8');?>
&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['city']->value,'htmlall','UTF-8');?>
</span><br>
    <?php if ($_smarty_tpl->tpl_vars['phone']->value!='') {?>
        <i class="opp-phone-icon icon icon-phone">&nbsp;&colon;</i>&nbsp;<span class="opp-phone"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['phone']->value,'htmlall','UTF-8');?>
</span><br>
    <?php }?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['dni']->value)&&$_smarty_tpl->tpl_vars['dni']->value!='') {?>
    <span class="opp-dni-label"><?php echo smartyTranslate(array('s'=>'Dni','mod'=>'ordersplusplus'),$_smarty_tpl);?>
&colon;</span>&nbsp;<span class="opp-dni"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['dni']->value,'htmlall','UTF-8');?>
</span><br>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['vat_number']->value)&&$_smarty_tpl->tpl_vars['vat_number']->value!='') {?>
    <span class="opp-vat-number-label"><?php echo smartyTranslate(array('s'=>'Vat nr.','mod'=>'ordersplusplus'),$_smarty_tpl);?>
&nbsp;&colon;</span>&nbsp;<span class="opp-vat-number"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['vat_number']->value,'htmlall','UTF-8');?>
</span>
<?php }?>
<?php }} ?>
