<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:24:30
         compiled from "/var/www/html/SHN/nimda420/themes/new-theme/template/components/layout/warning_messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8498631625c319f1e7b30f2-45018274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4732908444f9877e66a2565f01fc9b1a1cc19d85' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/new-theme/template/components/layout/warning_messages.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8498631625c319f1e7b30f2-45018274',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'warnings' => 0,
    'warning' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319f1e7d8153_81532587',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319f1e7d8153_81532587')) {function content_5c319f1e7d8153_81532587($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['warnings']->value)) {?>
  <div class="bootstrap">
    <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php if (count($_smarty_tpl->tpl_vars['warnings']->value)>1) {?>
        <h4><?php echo smartyTranslate(array('s'=>'There are %d warnings:','sprintf'=>array(count($_smarty_tpl->tpl_vars['warnings']->value))),$_smarty_tpl);?>
</h4>
      <?php }?>
      <ul class="list-unstyled">
        <?php  $_smarty_tpl->tpl_vars['warning'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['warning']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['warnings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['warning']->key => $_smarty_tpl->tpl_vars['warning']->value) {
$_smarty_tpl->tpl_vars['warning']->_loop = true;
?>
          <li><?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
</li>
        <?php } ?>
      </ul>
    </div>
  </div>
<?php }?>
<?php }} ?>
