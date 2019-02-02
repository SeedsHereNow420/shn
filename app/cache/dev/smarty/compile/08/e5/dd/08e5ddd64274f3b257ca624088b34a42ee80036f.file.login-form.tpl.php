<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:41:16
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/login-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18003049175c322fac606f93-44773995%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08e5ddd64274f3b257ca624088b34a42ee80036f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/_partials/login-form.tpl',
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
  'nocache_hash' => '18003049175c322fac606f93-44773995',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'errors' => 0,
    'formFields' => 0,
    'field' => 0,
    'urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322fac613854_19180803',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322fac613854_19180803')) {function content_5c322fac613854_19180803($_smarty_tpl) {?>


<form id="login-form" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8');?>
" method="post">

  <div class="form_content">
    <div class="form_content_inner">
      <?php /*  Call merged included template "_partials/form-errors.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/form-errors.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('errors'=>$_smarty_tpl->tpl_vars['errors']->value['']), 0, '18003049175c322fac606f93-44773995');
content_5c322fac609313_57636438($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/form-errors.tpl" */?>

      
        <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formFields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?>
          
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_field'][0][0]->smartyFormField(array('field'=>$_smarty_tpl->tpl_vars['field']->value,'file'=>'_partials/form-fields-1.tpl'),$_smarty_tpl);?>

          
        <?php } ?>
      
      <div class="p-b-1">
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['password'], ENT_QUOTES, 'UTF-8');?>
" class="forgot-password" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Forgot your password?','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
">
            <?php echo smartyTranslate(array('s'=>'Forgot your password?','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

          </a>
      </div>
    </div>
  </div>
  
  <footer class="form-footer">
    <input type="hidden" name="submitLogin" value="1">
    
    <button class="btn btn-primary btn-large js-submit-active btn-spin btn-full-width" data-link-action="sign-in" type="submit" id="SubmitLogin">
      <i class="fto-lock"></i>
      <?php echo smartyTranslate(array('s'=>'Sign in','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

    </button>
    
  </footer>
  

</form>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:41:16
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/form-errors.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322fac609313_57636438')) {function content_5c322fac609313_57636438($_smarty_tpl) {?>
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
