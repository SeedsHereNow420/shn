<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:26
         compiled from "/var/www/html/SHN/nimda420/themes/new-theme/template/components/layout/error_messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15974375955c31a96a746f88-28160786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3da5925b669e7e174fc4792fa4aa2aafe1d9eed2' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/new-theme/template/components/layout/error_messages.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15974375955c31a96a746f88-28160786',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
    'disableDefaultErrorOutPut' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a96a77faf0_11298506',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a96a77faf0_11298506')) {function content_5c31a96a77faf0_11298506($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['errors']->value)&&current($_smarty_tpl->tpl_vars['errors']->value)!=''&&(!isset($_smarty_tpl->tpl_vars['disableDefaultErrorOutPut']->value)||$_smarty_tpl->tpl_vars['disableDefaultErrorOutPut']->value==false)) {?>
  <div class="bootstrap">
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php if (count($_smarty_tpl->tpl_vars['errors']->value)==1) {?>
        <?php echo reset($_smarty_tpl->tpl_vars['errors']->value);?>

      <?php } else { ?>
        <?php echo smartyTranslate(array('s'=>'%d errors','sprintf'=>array(count($_smarty_tpl->tpl_vars['errors']->value))),$_smarty_tpl);?>

        <br/>
        <ol>
          <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</li>
          <?php } ?>
        </ol>
      <?php }?>
    </div>
  </div>
<?php }?>
<?php }} ?>
