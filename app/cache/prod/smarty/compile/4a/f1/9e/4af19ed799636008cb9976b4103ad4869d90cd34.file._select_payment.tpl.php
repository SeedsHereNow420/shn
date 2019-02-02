<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 12:47:46
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_select_payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10188000995c33baf2142ab3-95616518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4af19ed799636008cb9976b4103ad4869d90cd34' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/orders/_select_payment.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10188000995c33baf2142ab3-95616518',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PS_CATALOG_MODE' => 0,
    'payment_modules' => 0,
    'module' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c33baf22bfd26_53983139',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c33baf22bfd26_53983139')) {function content_5c33baf22bfd26_53983139($_smarty_tpl) {?>
<select name="payment_module_name" id="payment_module_name">
  <?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
    <?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
?>
      <option value="<?php echo $_smarty_tpl->tpl_vars['module']->value->name;?>
" <?php if (isset($_POST['payment_module_name'])&&$_smarty_tpl->tpl_vars['module']->value->name==$_POST['payment_module_name']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['module']->value->displayName;?>
</option>
    <?php } ?>
  <?php } else { ?>
      <option value="<?php echo smartyTranslate(array('s'=>'Back office order','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Back office order','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</option>
  <?php }?>
</select>
<?php }} ?>
