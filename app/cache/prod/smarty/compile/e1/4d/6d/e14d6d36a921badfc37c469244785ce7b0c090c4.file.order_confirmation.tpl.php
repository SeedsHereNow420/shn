<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 05:34:46
         compiled from "modules/bestkit_custompayment/views/templates/hook/order_confirmation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15215765825c33557694b195-14237392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e14d6d36a921badfc37c469244785ce7b0c090c4' => 
    array (
      0 => 'modules/bestkit_custompayment/views/templates/hook/order_confirmation.tpl',
      1 => 1519199423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15215765825c33557694b195-14237392',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
    'custom_payment_fee' => 0,
    'order_confirmation_text' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c335576956c32_48561135',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c335576956c32_48561135')) {function content_5c335576956c32_48561135($_smarty_tpl) {?>


<p><?php echo smartyTranslate(array('s'=>'Your order is complete.','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>

	<br /><br />
	
	<p><?php echo smartyTranslate(array('s'=>'- The total amount of your order comes to:','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
<span id="amount" class="price"> <?php echo htmlspecialchars(Tools::displayPrice($_smarty_tpl->tpl_vars['total']->value), ENT_QUOTES, 'UTF-8');?>
</span> <?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
</p>
	
	<p><?php echo smartyTranslate(array('s'=>'- The fee/discount of your order comes to:','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
<span id="amount" class="price"> <?php echo htmlspecialchars(Tools::displayPrice($_smarty_tpl->tpl_vars['custom_payment_fee']->value), ENT_QUOTES, 'UTF-8');?>
</span></p>
	
	<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_confirmation_text']->value, ENT_QUOTES, 'UTF-8');?>
 
	
	<br /><?php echo smartyTranslate(array('s'=>'For any questions or for further information, please contact our','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
 <a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true),'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'customer service department.','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
</a>
</p><?php }} ?>
