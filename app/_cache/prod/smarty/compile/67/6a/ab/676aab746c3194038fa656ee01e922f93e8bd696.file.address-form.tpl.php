<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:52:56
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/address-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17298910585c2fe3c8268323-93933582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '676aab746c3194038fa656ee01e922f93e8bd696' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/_partials/address-form.tpl',
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
  'nocache_hash' => '17298910585c2fe3c8268323-93933582',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
    'id_address' => 0,
    'formFields' => 0,
    'field' => 0,
    'row_counter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2fe3c827b316_64344599',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fe3c827b316_64344599')) {function content_5c2fe3c827b316_64344599($_smarty_tpl) {?>

<div class="js-address-form">
  <?php /*  Call merged included template "_partials/form-errors.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/form-errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('errors'=>$_smarty_tpl->tpl_vars['errors']->value['']), 0, '17298910585c2fe3c8268323-93933582');
content_5c2fe3c826c477_64258713($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/form-errors.tpl" */?>

  
  <form
    method="POST"
    action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'address','params'=>array('id_address'=>$_smarty_tpl->tpl_vars['id_address']->value)),$_smarty_tpl);?>
"
    data-id-address="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_address']->value, ENT_QUOTES, 'UTF-8');?>
"
    data-refresh-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'address','params'=>array('ajax'=>1,'action'=>'addressForm')),$_smarty_tpl);?>
"
  >
  
  
    
      <section class="form-fields">
        
        <div class="row com_grid_view">
          <?php $_smarty_tpl->tpl_vars["row_counter"] = new Smarty_variable(0, null, 0);?>
          <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formFields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?>
            
              <?php if ($_smarty_tpl->tpl_vars['field']->value['type']!='hidden') {?><div class="col-lg-6 <?php if ($_smarty_tpl->tpl_vars['row_counter']->value%2==0) {?> first-item-of-large-line  first-item-of-desktop-line first-item-of-line <?php }?>"><?php $_smarty_tpl->tpl_vars['row_counter'] = new Smarty_variable($_smarty_tpl->tpl_vars['row_counter']->value+1, null, 0);?><?php }?>
              <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_field'][0][0]->smartyFormField(array('field'=>$_smarty_tpl->tpl_vars['field']->value,'file'=>'_partials/form-fields-1.tpl'),$_smarty_tpl);?>

              <?php if ($_smarty_tpl->tpl_vars['field']->value['type']!='hidden') {?></div><?php }?>
            
          <?php } ?>
        </div>
        
      </section>
    

    
    <footer class="form-footer">
      <input type="hidden" name="submitAddress" value="1">
      
        <button class="btn btn-default" type="submit" class="form-control-submit">
          <?php echo smartyTranslate(array('s'=>'Save','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

        </button>
      
    </footer>
    
  </form>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:52:56
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/form-errors.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fe3c826c477_64258713')) {function content_5c2fe3c826c477_64258713($_smarty_tpl) {?>
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
