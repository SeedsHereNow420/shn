<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:55
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/customization_field.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4908344395c338f27bd2977-31866183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df60e3eb83638cea3b12fc09a70f92458cfb77e9' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/customization_field.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4908344395c338f27bd2977-31866183',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'counter' => 0,
    'languages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f27bddeb8_07427705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f27bddeb8_07427705')) {function content_5c338f27bddeb8_07427705($_smarty_tpl) {?>

<div data-customization-field="<?php echo intval($_smarty_tpl->tpl_vars['type']->value);?>
" class="form-group">
    <?php if ($_smarty_tpl->tpl_vars['type']->value==0) {?>
        <label class="control-label col-lg-2"><?php echo smartyTranslate(array('s'=>'Set label file field','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?>
        <label class="control-label col-lg-2"><?php echo smartyTranslate(array('s'=>'Set label text field','mod'=>'masseditproduct'),$_smarty_tpl);?>
</label>
    <?php }?>
    <div class="col-lg-7">
        <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['not_filtered'][0][0]->notFiltered($_smarty_tpl->tpl_vars['type']->value);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['not_filtered'][0][0]->notFiltered($_smarty_tpl->tpl_vars['counter']->value);?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("./input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('input_name'=>"label_".$_tmp1."_".$_tmp2."_name",'languages'=>$_smarty_tpl->tpl_vars['languages']->value), 0);?>

    </div>
    <div class="col-lg-2">
        <input type="checkbox" value="1" name="label_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['not_filtered'][0][0]->notFiltered($_smarty_tpl->tpl_vars['type']->value);?>
_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['not_filtered'][0][0]->notFiltered($_smarty_tpl->tpl_vars['counter']->value);?>
_required"> <?php echo smartyTranslate(array('s'=>'Required','mod'=>'masseditproduct'),$_smarty_tpl);?>

    </div>
</div><?php }} ?>
