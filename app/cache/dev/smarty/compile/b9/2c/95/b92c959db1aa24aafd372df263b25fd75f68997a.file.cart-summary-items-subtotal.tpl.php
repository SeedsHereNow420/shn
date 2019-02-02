<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:36:38
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-items-subtotal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6481620745c322e96c11c09-44110916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b92c959db1aa24aafd372df263b25fd75f68997a' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-items-subtotal.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6481620745c322e96c11c09-44110916',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322e96c140c3_40827068',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322e96c140c3_40827068')) {function content_5c322e96c140c3_40827068($_smarty_tpl) {?>

  <div class="card-block cart-summary-line clearfix cart-summary-items-subtotal clearfix" id="items-subtotal">
    <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['summary_string'], ENT_QUOTES, 'UTF-8');?>
</span>
    <span class="value price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['products']['amount'], ENT_QUOTES, 'UTF-8');?>
</span>
  </div>
<?php }} ?>
