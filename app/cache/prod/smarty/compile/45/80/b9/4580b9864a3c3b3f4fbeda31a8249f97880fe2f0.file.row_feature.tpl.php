<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:55
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/row_feature.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15670883505c338f27b5f649-06016537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4580b9864a3c3b3f4fbeda31a8249f97880fe2f0' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/row_feature.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15670883505c338f27b5f649-06016537',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'feature' => 0,
    'value' => 0,
    'languages' => 0,
    'language' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f27b7ad65_21581047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f27b7ad65_21581047')) {function content_5c338f27b7ad65_21581047($_smarty_tpl) {?>

<div class="row">
    <div class="disable_option_radio">
        <label for="disabled_feature_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
">
            <input id="disabled_feature_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
" checked type="radio" name="disabled[feature][<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
]" class="disable_option" value="1">
            <span><?php echo smartyTranslate(array('s'=>'Disable','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
        </label>
        <label for="disabled_feature_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
">
            <input id="disabled_feature_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
" type="radio" name="disabled[feature][<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
]" data-feature="<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
" class="disable_option" value="0">
            <span><?php echo smartyTranslate(array('s'=>'Enable','mod'=>'masseditproduct'),$_smarty_tpl);?>
</span>
        </label>
    </div>
    <label class="control-label col-lg-4 col-md-4 col-sm-4 col-xs-4"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['feature']->value['name'],'quotes','UTF-8');?>
</label>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <?php if (is_array($_smarty_tpl->tpl_vars['feature']->value['values'])&&count($_smarty_tpl->tpl_vars['feature']->value['values'])) {?>
            <select onchange="$('[class^=custom_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
]').val('');" id="feature_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
_value" name="feature_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
_value">
                <option value="0">-</option>
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
        <?php } else { ?>
            <span>-</span>
            <input type="hidden" name="feature_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
_value" value="0">
        <?php }?>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 <?php if (@constant('_PS_VERSION_')<1.6) {?>translatable<?php }?>">
        <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
            <?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
                <div class="row translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
 lang_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" <?php if (@constant('_PS_VERSION_')<1.6&&!$_smarty_tpl->tpl_vars['language']->value['is_default']) {?>style="display: none;"<?php }?>>
                <div class="col-lg-9">
            <?php }?>
            <textarea
                    class="custom_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
 textarea-autosize"
                    name="custom_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
"
                    cols="40"
                    rows="1"
                    onkeyup="if (isArrowKey(event)) return ;$('#feature_<?php echo intval($_smarty_tpl->tpl_vars['feature']->value['id_feature']);?>
_value').val(0);" ></textarea>

            <?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
                </div>
                <?php if (!(@constant('_PS_VERSION_')<1.6)) {?>
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['language']->value['iso_code'],'quotes','UTF-8');?>

                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
                                <li>
                                    <a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
);"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['language']->value['iso_code'],'quotes','UTF-8');?>
</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php }?>
                </div>
            <?php }?>
        <?php } ?>
    </div>
</div><?php }} ?>
