<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:55
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/row_variables.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2142960025c338f27b80c09-57180692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b70a9700723b1a9b42c71e66f4232cf56c298ac3' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/row_variables.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2142960025c338f27b80c09-57180692',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'variables' => 0,
    'name' => 0,
    'var_name' => 0,
    'variable' => 0,
    'feature' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f27b95821_96467307',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f27b95821_96467307')) {function content_5c338f27b95821_96467307($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['variables']->value)) {?>
<div class="row">
    <div class="col-lg-12">
        <?php if (is_array($_smarty_tpl->tpl_vars['variables']->value)&&count($_smarty_tpl->tpl_vars['variables']->value)) {?>
            <?php  $_smarty_tpl->tpl_vars['variable'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['variable']->_loop = false;
 $_smarty_tpl->tpl_vars['var_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['variables']->value['static']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['variable']->key => $_smarty_tpl->tpl_vars['variable']->value) {
$_smarty_tpl->tpl_vars['variable']->_loop = true;
 $_smarty_tpl->tpl_vars['var_name']->value = $_smarty_tpl->tpl_vars['variable']->key;
?>
                <button type="button" class="btn btn-default" onclick="$('[name=<?php echo trim($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['name']->value,'quotes','UTF-8'));?>
]').insertAtCaret('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['var_name']->value,'quotes','UTF-8');?>
');">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['variable']->value,'quotes','UTF-8');?>

                </button>
            <?php } ?>
        <?php }?>
        <?php if (is_array($_smarty_tpl->tpl_vars['variables']->value['features'])&&count($_smarty_tpl->tpl_vars['variables']->value['features'])) {?>
            <span data-feature-btn class="btn btn-default">
                <div class="column_feature">
                    <select onclick="var btn = $(this).closest('[data-feature-btn]'); btn.find('[class^=column_feature_value_]').hide(); btn.find('.column_feature_value_'+$(this).val()).show();" name="variable_feature">
                        <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['variables']->value['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
                            <?php if (!is_array($_smarty_tpl->tpl_vars['feature']->value['values'])||!count($_smarty_tpl->tpl_vars['feature']->value['values'])) {?><?php continue 1?><?php }?>
                            <option value="<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['feature']->value['name'],'quotes','UTF-8');?>
</option>
                        <?php } ?>
                    </select>
                </div>
                <?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['variables']->value['features']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
                    <?php if (is_array($_smarty_tpl->tpl_vars['feature']->value['values'])&&count($_smarty_tpl->tpl_vars['feature']->value['values'])) {?>
                        <div <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['feature']['first']) {?>style="display: none;"<?php }?> class="column_feature_value_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
">
                            <select name="variable_feature_value">
                                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['feature']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
                                    <option value="<?php echo intval($_smarty_tpl->tpl_vars['value']->value['id_feature_value']);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['value'],'quotes','UTF-8');?>
</option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php }?>
                <?php } ?>
                <div>
                    <button onclick="var btn = $(this).closest('[data-feature-btn]'); $('[name=<?php echo trim($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['name']->value,'quotes','UTF-8'));?>
]').insertAtCaret('{feature_'+btn.find('[name=variable_feature]').val()+'_'+btn.find('[name=variable_feature_value]').val()+'}');" class="btn btn-success" type="button">
                        <?php echo smartyTranslate(array('s'=>'add feature','mod'=>'masseditproduct'),$_smarty_tpl);?>

                    </button>
                </div>
            </span>
        <?php }?>
    </div>
</div>
<?php }?><?php }} ?>
