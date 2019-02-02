<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 16:00:58
         compiled from "modules/bestkit_custompayment/views/templates/hook/order_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9089874915c2ff3ba6be423-75845083%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f54075f2786d98f05430566896c3caa782c8f16' => 
    array (
      0 => 'modules/bestkit_custompayment/views/templates/hook/order_details.tpl',
      1 => 1519199423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9089874915c2ff3ba6be423-75845083',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'custom_payment_fee' => 0,
    'total' => 0,
    'order_confirmation_text' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2ff3ba6ec7c2_75586647',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2ff3ba6ec7c2_75586647')) {function content_5c2ff3ba6ec7c2_75586647($_smarty_tpl) {?><div class="bestkit_custompayment_wrapper">
	<h3><?php echo smartyTranslate(array('s'=>'Order has fee','sprintf'=>$_smarty_tpl->tpl_vars['custom_payment_fee']->value,'mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
</h3>

	<div><?php echo smartyTranslate(array('s'=>'- The total amount of your order comes to:','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
<span id="amount" class="price"> <?php echo htmlspecialchars(Tools::displayPrice($_smarty_tpl->tpl_vars['total']->value), ENT_QUOTES, 'UTF-8');?>
</span> <?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
</div>
		
	<div><?php echo smartyTranslate(array('s'=>'- The fee/discount of your order comes to:','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
<span id="amount" class="price"> <?php echo htmlspecialchars(Tools::displayPrice($_smarty_tpl->tpl_vars['custom_payment_fee']->value), ENT_QUOTES, 'UTF-8');?>
</span></div>
		
	<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_confirmation_text']->value, ENT_QUOTES, 'UTF-8');?>
 
		
	<div><?php echo smartyTranslate(array('s'=>'For any questions or for further information, please contact our','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
 <a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true),'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'customer service department.','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
</a></div>
</div>



<table>
	<tr class="item bestkit_custompayment_row">
		<td colspan="1">
			<strong><?php echo smartyTranslate(array('s'=>'Order fee','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
</strong>
		</td>
		<td colspan="4">
			<span class="custom_payment_fee price"><?php echo htmlspecialchars(Tools::displayPrice($_smarty_tpl->tpl_vars['custom_payment_fee']->value), ENT_QUOTES, 'UTF-8');?>
</span>
		</td>
	</tr>
</table>

<script>
	$('.bestkit_custompayment_row').insertBefore($('.totalprice.item'))
</script>
<?php }} ?>
