<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:26
         compiled from "/var/www/html/SHN/nimda420/themes/new-theme/template/components/layout/confirmation_messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11423489125c31a96a845263-54648549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab3f83aa5b9e168f30d96801c732c215891d6a86' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/new-theme/template/components/layout/confirmation_messages.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11423489125c31a96a845263-54648549',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'confirmations' => 0,
    'conf' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a96a8487d9_95465024',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a96a8487d9_95465024')) {function content_5c31a96a8487d9_95465024($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['confirmations']->value)&&count($_smarty_tpl->tpl_vars['confirmations']->value)&&$_smarty_tpl->tpl_vars['confirmations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-success" style="display:block;">
      <?php  $_smarty_tpl->tpl_vars['conf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['conf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['confirmations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['conf']->key => $_smarty_tpl->tpl_vars['conf']->value) {
$_smarty_tpl->tpl_vars['conf']->_loop = true;
?>
        <?php echo $_smarty_tpl->tpl_vars['conf']->value;?>

      <?php } ?>
    </div>
  </div>
<?php }?>
<?php }} ?>
