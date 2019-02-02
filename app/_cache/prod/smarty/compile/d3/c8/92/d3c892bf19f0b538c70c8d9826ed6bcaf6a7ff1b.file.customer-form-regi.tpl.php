<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 13:38:00
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/customer-form-regi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17267430755c2fd238521693-78868876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3c892bf19f0b538c70c8d9826ed6bcaf6a7ff1b' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/_partials/customer-form-regi.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '8f0d2aa81137167494594ba8bd1352f5cfe0c294' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/_partials/customer-form.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'f358d1a68981d2fed8bdf32361292c2fcd13d1ac' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/form-errors.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17267430755c2fd238521693-78868876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
    'action' => 0,
    'formFields' => 0,
    'field' => 0,
    'row_counter' => 0,
    'hook_create_account_form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2fd2385568a6_65423755',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fd2385568a6_65423755')) {function content_5c2fd2385568a6_65423755($_smarty_tpl) {?>

  
    <?php /*  Call merged included template "_partials/form-errors.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/form-errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('errors'=>$_smarty_tpl->tpl_vars['errors']->value['']), 0, '17267430755c2fd238521693-78868876');
content_5c2fd238526e33_37427206($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/form-errors.tpl" */?>
  

<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8');?>
" id="customer-form" class="js-customer-form" method="post">
  <div class="form_content">
    <div class="form_content_inner">
    
      <div class="row com_grid_view">
      <?php $_smarty_tpl->tpl_vars["row_counter"] = new Smarty_variable(0, null, 0);?>
      <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formFields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?>
        
        <?php if ($_smarty_tpl->tpl_vars['field']->value['type']!='hidden') {?><div class="col-lg-12"><?php $_smarty_tpl->tpl_vars['row_counter'] = new Smarty_variable($_smarty_tpl->tpl_vars['row_counter']->value+1, null, 0);?><?php }?>
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_field'][0][0]->smartyFormField(array('field'=>$_smarty_tpl->tpl_vars['field']->value,'file'=>'_partials/form-fields-1.tpl'),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['field']->value['type']!='hidden') {?></div><?php }?>
        
      <?php } ?>
      </div>
      <?php echo $_smarty_tpl->tpl_vars['hook_create_account_form']->value;?>

    
    </div>
  </div>
  
    <footer class="form-footer">
      <input type="hidden" name="submitCreate" value="1">
      
        <button class="btn btn-primary btn-large js-submit-active btn-spin btn-full-width" data-link-action="save-customer" type="submit">
          <i class="fto-user icon_btn"></i><?php echo smartyTranslate(array('s'=>'Save','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

        </button>
      
    </footer>
  
</form>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 13:38:00
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/form-errors.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fd238526e33_37427206')) {function content_5c2fd238526e33_37427206($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['errors']->value)) {?>
  <div class="help-block  alert alert-danger">
    
    <ul class="m-b-0">
      <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
        <li class="alert alert-danger"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8');?>
</li>
      <?php } ?>
    </ul>
    
  </div>
<?php }?>
<?php }} ?>
