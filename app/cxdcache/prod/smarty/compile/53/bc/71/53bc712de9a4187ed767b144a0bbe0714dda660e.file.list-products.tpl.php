<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:48:31
         compiled from "/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9398768675c31a4bfbefcd4-68333975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53bc712de9a4187ed767b144a0bbe0714dda660e' => 
    array (
      0 => '/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-products.tpl',
      1 => 1519199329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9398768675c31a4bfbefcd4-68333975',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'details' => 0,
    'detail' => 0,
    'create_tooltip' => 0,
    'id_currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a4bfc1aff2_55447476',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a4bfc1aff2_55447476')) {function content_5c31a4bfc1aff2_55447476($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['detail'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['detail']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['details']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['detail']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['detail']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['detail']->key => $_smarty_tpl->tpl_vars['detail']->value) {
$_smarty_tpl->tpl_vars['detail']->_loop = true;
 $_smarty_tpl->tpl_vars['detail']->iteration++;
 $_smarty_tpl->tpl_vars['detail']->last = $_smarty_tpl->tpl_vars['detail']->iteration === $_smarty_tpl->tpl_vars['detail']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['oppprod']['last'] = $_smarty_tpl->tpl_vars['detail']->last;
?>
    <div class="opp-product-container">
        <?php if ($_smarty_tpl->tpl_vars['detail']->value['link']!='') {?>
            <div class="opp-product-name-container<?php if ($_smarty_tpl->tpl_vars['create_tooltip']->value) {?> opp-tooltip-img" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['detail']->value['link'],'htmlall','UTF-8');?>
"<?php } else { ?>"<?php }?>>
                <i class="opp-tooltip-icon icon icon-picture-o"></i>&nbsp;<span class="opp-product-name"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['detail']->value['product_name'],'htmlall','UTF-8');?>
</span>
                <br>
            </div>
        <?php } else { ?>
            <div class="opp-product-name-container">
                <span class="opp-product-name"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['detail']->value['product_name'],'htmlall','UTF-8');?>
</span>
                <br>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['detail']->value['product_reference']!='') {?>
            <span class="opp-product-reference"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['detail']->value['product_reference'],'htmlall','UTF-8');?>
</span>
            <br>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['detail']->value['product_ean13']!='') {?>
            <i class="opp-ean13-icon icon icon-barcode">&nbsp;&colon;</i>&nbsp;<span class="opp-product-ean13"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['detail']->value['product_ean13'],'htmlall','UTF-8');?>
</span>
            <br>
        <?php }?>
        <span class="opp-product-price-label"><?php echo smartyTranslate(array('s'=>'Price','mod'=>'ordersplusplus'),$_smarty_tpl);?>
&colon;&nbsp;</span>
        <span class="opp-unit-price"><?php echo Tools::displayPrice($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['detail']->value['unit_price_tax_incl'],'htmlall','UTF-8'),$_smarty_tpl->tpl_vars['id_currency']->value);?>
</span>
        <span class="opp-multiply-sign">x</span>
        <span class="opp-product-quantity"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['detail']->value['product_quantity'],'htmlall','UTF-8');?>
</span>
        <span class="opp-equals-sign">&equals;</span>
        <span class="opp-total-price"><?php echo Tools::displayPrice($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['detail']->value['total_price_tax_incl'],'htmlall','UTF-8'),$_smarty_tpl->tpl_vars['id_currency']->value);?>
</span>
        <?php if (isset($_smarty_tpl->tpl_vars['detail']->value['highlight'])) {?>
            <p class="opp-prod-qty-highlight">
                <i class="icon icon-exclamation-circle"></i>
                <span><?php echo smartyTranslate(array('s'=>'Quantity ordered','mod'=>'ordersplusplus'),$_smarty_tpl);?>
</span>&nbsp;&colon;
                <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['detail']->value['product_quantity'],'htmlall','UTF-8');?>
</span>
            </p>
        <?php }?>
    </div>
    <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['oppprod']['last']) {?>
        <hr class="opp-product-separator">
    <?php }?>
<?php } ?>
<?php }} ?>
