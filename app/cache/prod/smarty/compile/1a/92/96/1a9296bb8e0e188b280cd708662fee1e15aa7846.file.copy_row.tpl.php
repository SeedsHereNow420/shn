<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:55
         compiled from "/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/copy_row.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17247566045c338f27b98ce3-44830173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a9296bb8e0e188b280cd708662fee1e15aa7846' => 
    array (
      0 => '/var/www/html/SHN/modules/masseditproduct/views/templates/admin/mass_edit_product/helpers/form/copy_row.tpl',
      1 => 1519199317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17247566045c338f27b98ce3-44830173',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'l' => 0,
    'default_form_language' => 0,
    'field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f27ba1eb4_59034146',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f27ba1eb4_59034146')) {function content_5c338f27ba1eb4_59034146($_smarty_tpl) {?>

<div class="row _row_copy">
    <div class="col-lg-4 delete_old_discount">
        <?php echo smartyTranslate(array('s'=>'Copy from product:','mod'=>'masseditproduct'),$_smarty_tpl);?>

    </div>
    <div class="col-lg-5 search_input">
        <input class="form-control _search" type="text">
        <span class="selected_product"></span>
        <input type="hidden" class="_id_product">
        <div class="small_text">
            <?php echo smartyTranslate(array('s'=>'Begin write name or id product','mod'=>'masseditproduct'),$_smarty_tpl);?>

        </div>
    </div>
    <div class="col-lg-1">
        <select class="form-control _lang">
            <?php if (is_array($_smarty_tpl->tpl_vars['languages']->value)&&count($_smarty_tpl->tpl_vars['languages']->value)) {?>
                <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['l']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
?>
                    <option <?php if ($_smarty_tpl->tpl_vars['l']->value['id_lang']==$_smarty_tpl->tpl_vars['default_form_language']->value) {?>selected<?php }?> value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['l']->value['id_lang'],'quotes','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['l']->value['iso_code'],'quotes','UTF-8');?>
</option>
                <?php } ?>
            <?php }?>
        </select>
    </div>
    <div class="col-lg-2">
        <button type="button" class="btn btn-default _submit" data-field="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['field']->value,'quotes','UTF-8');?>
">
            <?php echo smartyTranslate(array('s'=>'Copy','mod'=>'masseditproduct'),$_smarty_tpl);?>

        </button>
    </div>
</div><?php }} ?>
