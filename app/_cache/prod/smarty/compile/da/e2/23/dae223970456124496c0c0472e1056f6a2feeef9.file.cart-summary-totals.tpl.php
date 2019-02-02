<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 13:51:11
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-totals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20721068385c2fd54f11c6d8-56409581%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dae223970456124496c0c0472e1056f6a2feeef9' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-totals.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20721068385c2fd54f11c6d8-56409581',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2fd54f123c89_55554396',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fd54f123c89_55554396')) {function content_5c2fd54f123c89_55554396($_smarty_tpl) {?>
<div class="cart-summary-totals card-block">

  
    <div class="cart-summary-line clearfix cart-total">
      <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['labels']['tax_short'], ENT_QUOTES, 'UTF-8');?>
</span>
      <span class="value price fs_lg font-weight-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
  

  
    <div class="cart-summary-line clearfix">
      <span class="label sub"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['label'], ENT_QUOTES, 'UTF-8');?>
</span>
      <span class="value sub price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
  

</div>
<?php }} ?>
