<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 08:10:28
         compiled from "/var/www/html/SHN/modules/orderstatuschange/views/templates/hook/changestatus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:711230915c2f8574506235-57391387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f891d206152fe9021a64d3ead728a45a2b9f0ae3' => 
    array (
      0 => '/var/www/html/SHN/modules/orderstatuschange/views/templates/hook/changestatus.tpl',
      1 => 1538629453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '711230915c2f8574506235-57391387',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'idCurrentState' => 0,
    'pay_module' => 0,
    'obj_order_state' => 0,
    'id_order' => 0,
    'statuses' => 0,
    'status' => 0,
    'amount_paid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2f85745a29c3_89968296',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2f85745a29c3_89968296')) {function content_5c2f85745a29c3_89968296($_smarty_tpl) {?><style type="text/css">
	
</style>
<div class="form-group status-ord-acts">
	<?php if ($_smarty_tpl->tpl_vars['idCurrentState']->value==2&&$_smarty_tpl->tpl_vars['pay_module']->value=='prismpay') {?>
	<div class="col-md-8 col-sm-12 sml-fnt" >
	<?php }?> 
	<select style="background-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['obj_order_state']->value->color,'htmlall','UTF-8');?>
; color: #FFFFFF; border-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['obj_order_state']->value->color,'htmlall','UTF-8');?>
;" ps_current_state ="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['idCurrentState']->value,'htmlall','UTF-8');?>
" ps_id_order="<?php if (isset($_smarty_tpl->tpl_vars['id_order']->value)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_order']->value,'htmlall','UTF-8');?>
<?php }?>" class="form-control changeorderstatus">
		<?php if (isset($_smarty_tpl->tpl_vars['statuses']->value)) {?>
			<?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['statuses']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value) {
$_smarty_tpl->tpl_vars['status']->_loop = true;
?>
				<option style="background-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['status']->value['color'],'htmlall','UTF-8');?>
; color: #FFFFFF;" <?php if ($_smarty_tpl->tpl_vars['idCurrentState']->value==$_smarty_tpl->tpl_vars['status']->value['id_order_state']) {?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['status']->value['id_order_state'],'htmlall','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['status']->value['name'],'htmlall','UTF-8');?>
</option>
			<?php } ?>
		<?php }?>
	</select>
	<?php if ($_smarty_tpl->tpl_vars['idCurrentState']->value==2&&$_smarty_tpl->tpl_vars['pay_module']->value=='prismpay') {?>
	</div>
	<div class="col-md-4 col-sm-12 smlr-fnt" >
	<input data-current-state ="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['idCurrentState']->value,'htmlall','UTF-8');?>
"  data-amnt-order='<?php echo $_smarty_tpl->tpl_vars['amount_paid']->value;?>
' data-id-order="<?php if (isset($_smarty_tpl->tpl_vars['id_order']->value)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_order']->value,'htmlall','UTF-8');?>
<?php }?>" value='Refund' class="btn btn-warning btn-hlf refund-btn">
	</div>
	<?php }?> 
</div>

<div id='refnd-bdrop' class="refnd-bdrop" >
<div class='refd-cntr' ><a href='javascript:void(0)' class='rfnd-cls' >X</a>
<div class='hd-refd' >Select applicable one</div>
<div class='refd-ctn'  >
<input class='btn btn-primary act-rfnd' name='fl-refnd'  type='button' value='Full Refund' />
<div >OR</div>
<div class='form-group'>
<label class='control-label pull-left'>$</label><input class='form-control amnt-rfnd' max=''  min='1' type='number'  name='rfnd-amnt' id='rfnd-amnt'   />
<input type='hidden'  name='rfnd-order-id' id='rfnd-order-id'   />
<div class='r-n-b'>Max is $<span id='rfn-b-v'></span></div>
</div>
<input class='btn btn-primary act-rfnd' name='pr-refnd'  type='button' value='Partial Refund'  />
</div>
</div>
</div>



<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'success')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'success'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Order has been updated successfully.','js'=>1,'mod'=>'orderstatuschange'),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'success'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'invalid')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'invalid'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'The new order status is invalid.','js'=>1,'mod'=>'orderstatuschange'),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'invalid'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'error')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'error'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'An error occurred while changing order status, or we were unable to send an email to the customer.','js'=>1,'mod'=>'orderstatuschange'),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'error'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'already')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'already'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'The order has already been assigned this status.','js'=>1,'mod'=>'orderstatuschange'),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'already'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'noPermission')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'noPermission'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'You do not have permission to edit this.','js'=>1,'mod'=>'orderstatuschange'),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'noPermission'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
