<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:41
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-detailed-actions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:883647335c32fdc98404e5-40024870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8eb94384198e23b9e704a9ebea7ddc7f700b5339' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-detailed-actions.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '883647335c32fdc98404e5-40024870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fdc9845743_94755653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fdc9845743_94755653')) {function content_5c32fdc9845743_94755653($_smarty_tpl) {?>

<div class="checkout cart-detailed-actions card-block">
  <?php if ($_smarty_tpl->tpl_vars['cart']->value['minimalPurchaseRequired']) {?>
    <div class="alert alert-warning" role="alert">
      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['minimalPurchaseRequired'], ENT_QUOTES, 'UTF-8');?>

    </div>
    <button type="button" class="btn btn-default disabled btn-full-width" disabled><?php echo smartyTranslate(array('s'=>'Proceed to checkout','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</button>
  <?php } elseif (empty($_smarty_tpl->tpl_vars['cart']->value['products'])) {?>
    <div class="text-center">
      <button type="button" class="btn btn-default disabled" disabled><?php echo smartyTranslate(array('s'=>'Proceed to checkout','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</button>
    </div>
  <?php } else { ?>
    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['order'], ENT_QUOTES, 'UTF-8');?>
" class="btn btn-default btn-full-width"><?php echo smartyTranslate(array('s'=>'Proceed to checkout','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayExpressCheckout'),$_smarty_tpl);?>

  <?php }?>
</div>
<?php }} ?>
