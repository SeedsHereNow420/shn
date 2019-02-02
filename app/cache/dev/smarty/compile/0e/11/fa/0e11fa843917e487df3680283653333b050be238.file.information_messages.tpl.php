<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:40:24
         compiled from "/var/www/html/SHN/nimda420/themes/new-theme/template/components/layout/information_messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15846086365c322f783c3c56-96370951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e11fa843917e487df3680283653333b050be238' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/new-theme/template/components/layout/information_messages.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15846086365c322f783c3c56-96370951',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'informations' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322f783c71d1_91770853',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322f783c71d1_91770853')) {function content_5c322f783c71d1_91770853($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['informations']->value)&&count($_smarty_tpl->tpl_vars['informations']->value)&&$_smarty_tpl->tpl_vars['informations']->value) {?>
  <div class="bootstrap">
    <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <ul id="infos_block" class="list-unstyled">
        <?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['informations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
?>
          <li><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</li>
        <?php } ?>
      </ul>
    </div>
  </div>
<?php }?>
<?php }} ?>
