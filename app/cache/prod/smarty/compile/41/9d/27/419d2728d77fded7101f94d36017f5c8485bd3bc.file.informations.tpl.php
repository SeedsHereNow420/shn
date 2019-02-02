<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 11:29:56
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/cart_rules/informations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7795438115c33a8b4db6911-39327935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '419d2728d77fded7101f94d36017f5c8485bd3bc' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/cart_rules/informations.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7795438115c33a8b4db6911-39327935',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'language' => 0,
    'id_lang_default' => 0,
    'currentObject' => 0,
    'currentTab' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c33a8b5ccbbe3_83177552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c33a8b5ccbbe3_83177552')) {function content_5c33a8b5ccbbe3_83177552($_smarty_tpl) {?>
<div class="form-group">
	<label class="control-label col-lg-3 required">
		<span class="label-tooltip" data-toggle="tooltip"
		title="<?php echo smartyTranslate(array('s'=>'This will be displayed in the cart summary, as well as on the invoice.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Name','d'=>'Admin.Global'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-8">
		<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
		<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
		<div class="row">
			<div class="translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']!=$_smarty_tpl->tpl_vars['id_lang_default']->value) {?>style="display:none"<?php }?>>
				<div class="col-lg-9">
		<?php }?>
					<input id="name_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" type="text"  name="name_<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'name',intval($_smarty_tpl->tpl_vars['language']->value['id_lang'])),'html','UTF-8');?>
">
		<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
				</div>
				<div class="col-lg-2">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>

						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
						<li><a href="javascript:hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
);" tabindex="-1"><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<?php }?>
		<?php } ?>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
		title="<?php echo smartyTranslate(array('s'=>'For your eyes only. This will never be displayed to the customer.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Description','d'=>'Admin.Global'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-8">
		<textarea name="description" rows="2" class="textarea-autosize"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'description'));?>
</textarea>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
		title="<?php echo smartyTranslate(array('s'=>'This is the code users should enter to apply the voucher to a cart. Either create your own code or generate one by clicking on "Generate".','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Code','d'=>'Admin.Global'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-9">
		<div class="input-group col-lg-4">
			<input type="text" id="code" name="code" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'code'));?>
" />
			<span class="input-group-btn">
				<a href="javascript:gencode(8);" class="btn btn-default"><i class="icon-random"></i> <?php echo smartyTranslate(array('s'=>'Generate','d'=>'Admin.Actions'),$_smarty_tpl);?>
</a>
			</span>
		</div>
	<span class="help-block"><?php echo smartyTranslate(array('s'=>'Caution! If you leave this field blank, the rule will automatically be applied to benefiting customers.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
</span>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
		title="<?php echo smartyTranslate(array('s'=>'If the voucher is not yet in the cart, it will be displayed in the cart summary.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Highlight','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-9">
		<span class="switch prestashop-switch fixed-width-lg">
			<input type="radio" name="highlight" id="highlight_on" value="1" <?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'highlight'))) {?>checked="checked"<?php }?>/>
			<label for="highlight_on"><?php echo smartyTranslate(array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
			<input type="radio" name="highlight" id="highlight_off" value="0"  <?php if (!intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'highlight'))) {?>checked="checked"<?php }?> />
			<label for="highlight_off"><?php echo smartyTranslate(array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
			<a class="slide-button btn"></a>
		</span>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
		title="<?php echo smartyTranslate(array('s'=>'Only applicable if the voucher value is greater than the cart total.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>

		<?php echo smartyTranslate(array('s'=>'If you do not allow partial use, the voucher value will be lowered to the total order amount. If you allow partial use, however, a new voucher will be created with the remainder.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Partial use','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-9">
		<span class="switch prestashop-switch fixed-width-lg">
			<input type="radio" name="partial_use" id="partial_use_on" value="1" <?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'partial_use'))) {?>checked="checked"<?php }?> />
			<label class="t" for="partial_use_on"><?php echo smartyTranslate(array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
			<input type="radio" name="partial_use" id="partial_use_off" value="0"  <?php if (!intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'partial_use'))) {?>checked="checked"<?php }?> />
			<label class="t" for="partial_use_off"><?php echo smartyTranslate(array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
			<a class="slide-button btn"></a>
		</span>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
		title="<?php echo smartyTranslate(array('s'=>'Cart rules are applied by priority. A cart rule with a priority of "1" will be processed before a cart rule with a priority of "2".','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Priority','d'=>'Admin.Global'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-1">
		<input type="text" class="input-mini" name="priority" value="<?php echo intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'priority'));?>
" />
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Status','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
	<div class="col-lg-9">
		<span class="switch prestashop-switch fixed-width-lg">
			<input type="radio" name="active" id="active_on" value="1" <?php if (intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'active'))) {?>checked="checked"<?php }?> />
			<label class="t" for="active_on"><?php echo smartyTranslate(array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
			<input type="radio" name="active" id="active_off" value="0"  <?php if (!intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'active'))) {?>checked="checked"<?php }?> />
			<label class="t" for="active_off"><?php echo smartyTranslate(array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
			<a class="slide-button btn"></a>
		</span>
	</div>
</div>
<script type="text/javascript">
	$(".textarea-autosize").autosize();
</script>
<?php }} ?>
