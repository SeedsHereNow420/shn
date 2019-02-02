<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:58
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/feature_values.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4965716795c338f2a0b53e5-01755062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '973697121a27fa64e45350141aedd139eca93956' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/feature_values.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4965716795c338f2a0b53e5-01755062',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'values' => 0,
    'value' => 0,
    'id_feature' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f2a0e1710_43805464',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f2a0e1710_43805464')) {function content_5c338f2a0e1710_43805464($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['values']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['values']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-3">
                    <input type="checkbox" name="features[]" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['id_feature_value'],'quotes','UTF-8');?>
">
                </div>
                <label class="control-label col-lg-9"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['value'],'quotes','UTF-8');?>
</label>
            </div>
        </div>
    <?php } ?>
    <div class="clearfix"></div>
    <div class="row" style="padding:5px;margin-top:5px;background-color:#f1f1f1;">
        <div class="col-lg-3">
            <input type="checkbox" name="no_feature_value[]" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_feature']->value,'quotes','UTF-8');?>
">
            <?php echo smartyTranslate(array('s'=>'No value','mod'=>'masseditproduct'),$_smarty_tpl);?>

        </div>
    </div>
<?php }?><?php }} ?>
