<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 12:14:43
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/customer-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15839101115c3656338ebc94-44152722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa5892fb555bb19819e5ddbc3314e121cdf0bdd1' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/customer-form.tpl',
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
  'nocache_hash' => '15839101115c3656338ebc94-44152722',
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
  'unifunc' => 'content_5c3656339284f4_89100982',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3656339284f4_89100982')) {function content_5c3656339284f4_89100982($_smarty_tpl) {?>

  
    <?php /*  Call merged included template "_partials/form-errors.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/form-errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('errors'=>$_smarty_tpl->tpl_vars['errors']->value['']), 0, '15839101115c3656338ebc94-44152722');
content_5c36563390ca65_21117361($_smarty_tpl);
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
        
  <?php if ($_smarty_tpl->tpl_vars['field']->value['name']==='password'&&$_smarty_tpl->tpl_vars['guest_allowed']->value) {?>
      </div>
      <?php $_smarty_tpl->tpl_vars['row_counter'] = new Smarty_variable(0, null, 0);?>
      <p>
        <span class="font-weight-bold"><?php echo smartyTranslate(array('s'=>'Create an account','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</span> <span><?php echo smartyTranslate(array('s'=>'(optional)','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</span>
        <br>
        <span><?php echo smartyTranslate(array('s'=>'And save time on your next order!','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</span>
      </p>
      <div class="row com_grid_view">
      
        <?php if ($_smarty_tpl->tpl_vars['field']->value['type']!='hidden') {?><div class="col-lg-6 <?php if ($_smarty_tpl->tpl_vars['row_counter']->value%2==0) {?> first-item-of-large-line  first-item-of-desktop-line first-item-of-line <?php }?>"><?php $_smarty_tpl->tpl_vars['row_counter'] = new Smarty_variable($_smarty_tpl->tpl_vars['row_counter']->value+1, null, 0);?><?php }?>
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_field'][0][0]->smartyFormField(array('field'=>$_smarty_tpl->tpl_vars['field']->value,'file'=>'_partials/form-fields-1.tpl'),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['field']->value['type']!='hidden') {?></div><?php }?>
        
  <?php } else { ?>
    
        <?php if ($_smarty_tpl->tpl_vars['field']->value['type']!='hidden') {?><div class="col-lg-6 <?php if ($_smarty_tpl->tpl_vars['row_counter']->value%2==0) {?> first-item-of-large-line  first-item-of-desktop-line first-item-of-line <?php }?>"><?php $_smarty_tpl->tpl_vars['row_counter'] = new Smarty_variable($_smarty_tpl->tpl_vars['row_counter']->value+1, null, 0);?><?php }?>
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_field'][0][0]->smartyFormField(array('field'=>$_smarty_tpl->tpl_vars['field']->value,'file'=>'_partials/form-fields-1.tpl'),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['field']->value['type']!='hidden') {?></div><?php }?>
        
  <?php }?>

      <?php } ?>
      </div>
      <?php echo $_smarty_tpl->tpl_vars['hook_create_account_form']->value;?>

    
    </div>
  </div>
  
    <footer class="form-footer">
      <input type="hidden" name="submitCreate" value="1">
      
    <button
      class="continue btn btn-default btn-spin"
      name="continue"
      data-link-action="register-new-customer"
      type="submit"
      value="1"
    >
        <?php echo smartyTranslate(array('s'=>'Continue','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

    </button>

    </footer>
  
</form>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 12:14:43
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/form-errors.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c36563390ca65_21117361')) {function content_5c36563390ca65_21117361($_smarty_tpl) {?>
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
