<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:20
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/checkout-process.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13048318415c32fdb41533c5-09838672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd03ed58ffc654bf90145f3c19d9e8b82426ca54' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/checkout-process.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13048318415c32fdb41533c5-09838672',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'steps' => 0,
    'step' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fdb4156ef0_52706222',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fdb4156ef0_52706222')) {function content_5c32fdb4156ef0_52706222($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars["step"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["step"]->_loop = false;
 $_smarty_tpl->tpl_vars["index"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['steps']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["step"]->key => $_smarty_tpl->tpl_vars["step"]->value) {
$_smarty_tpl->tpl_vars["step"]->_loop = true;
 $_smarty_tpl->tpl_vars["index"]->value = $_smarty_tpl->tpl_vars["step"]->key;
?>
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0][0]->smartyRender(array('identifier'=>$_smarty_tpl->tpl_vars['step']->value['identifier'],'position'=>($_smarty_tpl->tpl_vars['index']->value+1),'ui'=>$_smarty_tpl->tpl_vars['step']->value['ui']),$_smarty_tpl);?>

<?php } ?>
<?php }} ?>
