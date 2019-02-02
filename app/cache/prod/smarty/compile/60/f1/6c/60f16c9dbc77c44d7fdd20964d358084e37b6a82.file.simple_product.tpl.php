<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 10:23:20
         compiled from "/var/www/html/SHN/modules/quantitylimit/views/templates/admin/product_tab/simple_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16125245565c34ea98bd7622-09760573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60f16c9dbc77c44d7fdd20964d358084e37b6a82' => 
    array (
      0 => '/var/www/html/SHN/modules/quantitylimit/views/templates/admin/product_tab/simple_product.tpl',
      1 => 1513817419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16125245565c34ea98bd7622-09760573',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_limit' => 0,
    'version' => 0,
    'groups' => 0,
    'group' => 0,
    'multishop' => 0,
    'admin_one_shop' => 0,
    'shops' => 0,
    'shop' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34ea98dd5574_56725111',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34ea98dd5574_56725111')) {function content_5c34ea98dd5574_56725111($_smarty_tpl) {?>
<div class="form-group margin-form">
	<label class="form-group control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Status','mod'=>'quantitylimit'),$_smarty_tpl);?>
</label>
	<div class="col-lg-6">
		<span class="switch prestashop-switch fixed-width-lg">
			<input type="radio" class="quantity_limit" data-ipa="0" name="status" id="status_on" value="1" <?php if (isset($_smarty_tpl->tpl_vars['product_limit']->value)&&$_smarty_tpl->tpl_vars['product_limit']->value['status']==1) {?>checked="checked"<?php }?>/>
			<label class="t" for="status_on">
				<?php if ($_smarty_tpl->tpl_vars['version']->value<1.6) {?>
					<img src="../img/admin/enabled.gif" alt="<?php echo smartyTranslate(array('s'=>'Enabled','mod'=>'quantitylimit'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Enabled','mod'=>'quantitylimit'),$_smarty_tpl);?>
" />
				<?php } else { ?>
					<?php echo smartyTranslate(array('s'=>'Yes','mod'=>'quantitylimit'),$_smarty_tpl);?>

				<?php }?>
			</label>
			<input type="radio" class="quantity_limit" data-ipa="0" name="status" id="status_off" value="0" <?php if ((isset($_smarty_tpl->tpl_vars['product_limit']->value)&&$_smarty_tpl->tpl_vars['product_limit']->value['status']==0)||empty($_smarty_tpl->tpl_vars['product_limit']->value)) {?>checked="checked"<?php }?>/>
			<label class="t" for="status_off">
				<?php if ($_smarty_tpl->tpl_vars['version']->value<1.6) {?>
					<img src="../img/admin/disabled.gif" alt="<?php echo smartyTranslate(array('s'=>'Disabled','mod'=>'quantitylimit'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Disabled','mod'=>'quantitylimit'),$_smarty_tpl);?>
" />
				<?php } else { ?>
					<?php echo smartyTranslate(array('s'=>'No','mod'=>'quantitylimit'),$_smarty_tpl);?>

				<?php }?>
			</label>
			<a class="slide-button btn"></a>
		</span>
	</div>
	<div class="clearfix"></div>
</div>

<div class="form-group margin-form">
	<label class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Min Qty','mod'=>'quantitylimit'),$_smarty_tpl);?>
</label>
	<div class="col-lg-2">
		<input type="text" class="quantity_limit form-control" data-ipa="0" name="min_qty" value="<?php if (isset($_smarty_tpl->tpl_vars['product_limit']->value)&&isset($_smarty_tpl->tpl_vars['product_limit']->value['min_qty'])) {?><?php echo $_smarty_tpl->tpl_vars['product_limit']->value['min_qty'];?>
<?php }?>" onkeyup="this.value = (this.value<0)?Math.abs(this.value):this.value;">
	</div>
	<div class="clearfix"></div>
</div>
<div class="form-group margin-form">
	<label class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Max Qty','mod'=>'quantitylimit'),$_smarty_tpl);?>
</label>
	<div class="col-lg-2">
		<input type="text" class="quantity_limit form-control" data-ipa="0" name="max_qty" value="<?php if (isset($_smarty_tpl->tpl_vars['product_limit']->value)&&isset($_smarty_tpl->tpl_vars['product_limit']->value['max_qty'])) {?><?php echo $_smarty_tpl->tpl_vars['product_limit']->value['max_qty'];?>
<?php }?>" onkeyup="this.value = (this.value<0)?Math.abs(this.value):this.value;">
	</div>
	<div class="clearfix"></div>
</div>
<div class="form-group margin-form">
	<label class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Date To','mod'=>'quantitylimit'),$_smarty_tpl);?>
</label>
	<div class="col-lg-3">
		<input class="datepicker quantity_limit form-control" type="text" name="date_to" data-ipa="0" value="<?php if (isset($_smarty_tpl->tpl_vars['product_limit']->value)&&isset($_smarty_tpl->tpl_vars['product_limit']->value['date_to'])) {?><?php echo $_smarty_tpl->tpl_vars['product_limit']->value['date_to'];?>
<?php }?>">
	</div>
	<div class="clearfix"></div>
</div>
<div class="form-group margin-form">
	<label class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Group','mod'=>'quantitylimit'),$_smarty_tpl);?>
</label>
	<div class="col-lg-3">
		<select class="quantity_limit form-control" data-ipa="0" name="id_group">
			<option value="0" <?php if (isset($_smarty_tpl->tpl_vars['product_limit']->value['id_group'])&&$_smarty_tpl->tpl_vars['product_limit']->value['id_group']==0) {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'All groups','mod'=>'quantitylimit'),$_smarty_tpl);?>
</option>
			<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['group']->value['id_group'],'htmlall','UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['product_limit']->value['id_group'])&&$_smarty_tpl->tpl_vars['product_limit']->value['id_group']&&$_smarty_tpl->tpl_vars['product_limit']->value['id_group']==$_smarty_tpl->tpl_vars['group']->value['id_group']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['group']->value['name'],'htmlall','UTF-8');?>
</option>
			<?php } ?>
		</select>
	</div>
	<div class="clearfix"></div>
</div>
<?php if (!$_smarty_tpl->tpl_vars['multishop']->value) {?>
	<input type="hidden" name="id_shop" value="0" />
<?php } else { ?>
	<div class="form-group margin-form">
		<label class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Shop','mod'=>'quantitylimit'),$_smarty_tpl);?>
</label>
		<div class="col-lg-3">
			<select class="quantity_limit form-control" data-ipa="0" name="id_shop">
				<?php if (!$_smarty_tpl->tpl_vars['admin_one_shop']->value) {?><option value="0"><?php echo smartyTranslate(array('s'=>'All shops','mod'=>'quantitylimit'),$_smarty_tpl);?>
</option><?php }?>
				<?php  $_smarty_tpl->tpl_vars['shop'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shop']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shops']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shop']->key => $_smarty_tpl->tpl_vars['shop']->value) {
$_smarty_tpl->tpl_vars['shop']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['shop']->value['id_shop'],'htmlall','UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['product_limit']->value)&&isset($_smarty_tpl->tpl_vars['product_limit']->value['id_shop'])&&$_smarty_tpl->tpl_vars['product_limit']->value['id_shop']==$_smarty_tpl->tpl_vars['shop']->value['id_shop']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['shop']->value['name'],'htmlall','UTF-8');?>
</option>
				<?php } ?>
			</select>
		</div>
		<div class="clearfix"></div>
	</div>
<?php }?>
<?php }} ?>
