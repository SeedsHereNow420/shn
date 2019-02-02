<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 11:29:58
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/cart_rules/conditions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6790871105c33a8b6570984-71919546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb7fe73aa7931e9a6aab80bb90dd555f030f94a1' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/cart_rules/conditions.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6790871105c33a8b6570984-71919546',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currentObject' => 0,
    'currentTab' => 0,
    'customerFilter' => 0,
    'defaultDateFrom' => 0,
    'defaultDateTo' => 0,
    'currencies' => 0,
    'currency' => 0,
    'defaultCurrency' => 0,
    'countries' => 0,
    'country' => 0,
    'carriers' => 0,
    'carrier' => 0,
    'groups' => 0,
    'group' => 0,
    'cart_rules' => 0,
    'product_rule_groups' => 0,
    'product_rule_group' => 0,
    'shops' => 0,
    'shop' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c33a8b8a063c3_76009153',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c33a8b8a063c3_76009153')) {function content_5c33a8b8a063c3_76009153($_smarty_tpl) {?>
<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
			title="<?php echo smartyTranslate(array('s'=>'Optional: The cart rule will be available to everyone if you leave this field blank.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Limit to a single customer','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-9">
		<div class="input-group col-lg-12">
			<span class="input-group-addon"><i class="icon-user"></i></span>
			<input type="hidden" id="id_customer" name="id_customer" value="<?php echo intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'id_customer'));?>
" />
			<input type="text" id="customerFilter" class="input-xlarge" name="customerFilter" value="<?php if ($_smarty_tpl->tpl_vars['customerFilter']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['customerFilter']->value,'html','UTF-8');?>
<?php } elseif (isset($_POST['customerFilter'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_POST['customerFilter']);?>
<?php }?>" />
			<span class="input-group-addon"><i class="icon-search"></i></span>
		</div>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
			title="<?php echo smartyTranslate(array('s'=>'The default period is one month.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Valid','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-9">
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon"><?php echo smartyTranslate(array('s'=>'From','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
					<input type="text" class="datepicker input-medium" name="date_from"
					value="<?php if ($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'date_from')) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'date_from'));?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['defaultDateFrom']->value;?>
<?php }?>" />
					<span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon"><?php echo smartyTranslate(array('s'=>'To','d'=>'Admin.Global'),$_smarty_tpl);?>
</span>
					<input type="text" class="datepicker input-medium" name="date_to"
					value="<?php if ($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'date_to')) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'date_to'));?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['defaultDateTo']->value;?>
<?php }?>" />
					<span class="input-group-addon"><i class="icon-calendar-empty"></i></span>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
			title="<?php echo smartyTranslate(array('s'=>'You can choose a minimum amount for the cart either with or without the taxes and shipping.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Minimum amount','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-9">
		<div class="row">
			<div class="col-lg-3">
				<input type="text" name="minimum_amount" value="<?php echo floatval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'minimum_amount'));?>
" />
			</div>
			<div class="col-lg-2">
				<select name="minimum_amount_currency">
				<?php  $_smarty_tpl->tpl_vars['currency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['currency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->key => $_smarty_tpl->tpl_vars['currency']->value) {
$_smarty_tpl->tpl_vars['currency']->_loop = true;
?>
					<option value="<?php echo intval($_smarty_tpl->tpl_vars['currency']->value['id_currency']);?>
"
					<?php if ($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'minimum_amount_currency')==$_smarty_tpl->tpl_vars['currency']->value['id_currency']||(!$_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'minimum_amount_currency')&&$_smarty_tpl->tpl_vars['currency']->value['id_currency']==$_smarty_tpl->tpl_vars['defaultCurrency']->value)) {?>
						selected="selected"
					<?php }?>
					>
						<?php echo $_smarty_tpl->tpl_vars['currency']->value['iso_code'];?>

					</option>
				<?php } ?>
				</select>
			</div>
			<div class="col-lg-3">
				<select name="minimum_amount_tax">
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'minimum_amount_tax')==0) {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Tax excluded','d'=>'Admin.Global'),$_smarty_tpl);?>
</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'minimum_amount_tax')==1) {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Tax included','d'=>'Admin.Global'),$_smarty_tpl);?>
</option>
				</select>
			</div>
			<div class="col-lg-4">
				<select name="minimum_amount_shipping">
					<option value="0" <?php if ($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'minimum_amount_shipping')==0) {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Shipping excluded','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</option>
					<option value="1" <?php if ($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'minimum_amount_shipping')==1) {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Shipping included','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</option>
				</select>
			</div>
		</div>
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
			title="<?php echo smartyTranslate(array('s'=>'The cart rule will be applied to the first "X" customers only.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Total available','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-9">
		<input class="form-control" type="text" name="quantity" value="<?php echo intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'quantity'));?>
" />
	</div>
</div>

<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip"
			title="<?php echo smartyTranslate(array('s'=>'A customer will only be able to use the cart rule "X" time(s).','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Total available for each user','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-9">
		<input class="form-control" type="text" name="quantity_per_user" value="<?php echo intval($_smarty_tpl->tpl_vars['currentTab']->value->getFieldValue($_smarty_tpl->tpl_vars['currentObject']->value,'quantity_per_user'));?>
" />
	</div>
</div>



<div class="form-group">
	<label class="control-label col-lg-3">
		<?php echo smartyTranslate(array('s'=>'Restrictions','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

	</label>
	<div class="col-lg-9">
		<?php if (count($_smarty_tpl->tpl_vars['countries']->value['unselected'])+count($_smarty_tpl->tpl_vars['countries']->value['selected'])>1) {?>
			<p class="checkbox">
				<label>
					<input type="checkbox" id="country_restriction" name="country_restriction" value="1" <?php if (count($_smarty_tpl->tpl_vars['countries']->value['unselected'])) {?>checked="checked"<?php }?> />
					<?php echo smartyTranslate(array('s'=>'Country selection','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

				</label>
			</p>
			<span class="help-block"><?php echo smartyTranslate(array('s'=>'This restriction applies to the country of delivery.','d'=>'Admin.Catalog.Help'),$_smarty_tpl);?>
</span>
			<div id="country_restriction_div">
				<br />
				<table class="table">
					<tr>
						<td>
							<p><?php echo smartyTranslate(array('s'=>'Unselected countries','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</p>
							<select id="country_select_1" multiple>
								<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value['unselected']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
">&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['country']->value['name']);?>
</option>
								<?php } ?>
							</select>
							<a id="country_select_add" class="btn  btn-default btn-block clearfix"><?php echo smartyTranslate(array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl);?>
 <i class="icon-arrow-right"></i></a>
						</td>
						<td>
							<p><?php echo smartyTranslate(array('s'=>'Selected countries','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</p>
							<select name="country_select[]" id="country_select_2" class="input-large" multiple>
								<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value['selected']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
">&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['country']->value['name']);?>
</option>
								<?php } ?>
							</select>
							<a id="country_select_remove" class="btn btn-default btn-block clearfix"><i class="icon-arrow-left"></i> <?php echo smartyTranslate(array('s'=>'Remove','d'=>'Admin.Actions'),$_smarty_tpl);?>
 </a>
						</td>
					</tr>
				</table>
			</div>
		<?php }?>

		<?php if (count($_smarty_tpl->tpl_vars['carriers']->value['unselected'])+count($_smarty_tpl->tpl_vars['carriers']->value['selected'])>1) {?>
			<p class="checkbox">
				<label>
					<input type="checkbox" id="carrier_restriction" name="carrier_restriction" value="1" <?php if (count($_smarty_tpl->tpl_vars['carriers']->value['unselected'])) {?>checked="checked"<?php }?> />
					<?php echo smartyTranslate(array('s'=>'Carrier selection','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

				</label>
			</p>
			<div id="carrier_restriction_div">
				<br />
				<table class="table">
					<tr>
						<td>
							<p><?php echo smartyTranslate(array('s'=>'Unselected carriers','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</p>
							<select id="carrier_select_1" class="input-large" multiple>
								<?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carriers']->value['unselected']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_reference']);?>
">&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['carrier']->value['name']);?>
</option>
								<?php } ?>
							</select>
							<a id="carrier_select_add" class="btn btn-default btn-block clearfix" ><?php echo smartyTranslate(array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl);?>
 <i class="icon-arrow-right"></i></a>
						</td>
						<td>
							<p><?php echo smartyTranslate(array('s'=>'Selected carriers','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</p>
							<select name="carrier_select[]" id="carrier_select_2" class="input-large" multiple>
								<?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carriers']->value['selected']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_reference']);?>
">&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['carrier']->value['name']);?>
</option>
								<?php } ?>
							</select>
							<a id="carrier_select_remove" class="btn btn-default btn-block clearfix"><i class="icon-arrow-left"></i> <?php echo smartyTranslate(array('s'=>'Remove','d'=>'Admin.Actions'),$_smarty_tpl);?>
 </a>
						</td>
					</tr>
				</table>
			</div>
		<?php }?>

		<?php if (count($_smarty_tpl->tpl_vars['groups']->value['unselected'])+count($_smarty_tpl->tpl_vars['groups']->value['selected'])>1) {?>
			<p class="checkbox">
				<label>
					<input type="checkbox" id="group_restriction" name="group_restriction" value="1" <?php if (count($_smarty_tpl->tpl_vars['groups']->value['unselected'])) {?>checked="checked"<?php }?> />
					<?php echo smartyTranslate(array('s'=>'Customer group selection','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

				</label>
			</p>
			<div id="group_restriction_div">
				<br />
				<table class="table">
					<tr>
						<td>
							<p><?php echo smartyTranslate(array('s'=>'Unselected groups','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</p>
							<select id="group_select_1" class="input-large" multiple>
								<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value['unselected']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['group']->value['id_group']);?>
">&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['group']->value['name']);?>
</option>
								<?php } ?>
							</select>
							<a id="group_select_add" class="btn btn-default btn-block clearfix" ><?php echo smartyTranslate(array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl);?>
 <i class="icon-arrow-right"></i></a>
						</td>
						<td>
							<p><?php echo smartyTranslate(array('s'=>'Selected groups','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</p>
							<select name="group_select[]" class="input-large" id="group_select_2" multiple>
								<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value['selected']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['group']->value['id_group']);?>
">&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['group']->value['name']);?>
</option>
								<?php } ?>
							</select>
							<a id="group_select_remove" class="btn btn-default btn-block clearfix" ><i class="icon-arrow-left"></i> <?php echo smartyTranslate(array('s'=>'Remove','d'=>'Admin.Actions'),$_smarty_tpl);?>
</a>
						</td>
					</tr>
				</table>
			</div>
		<?php }?>

		<?php if (count($_smarty_tpl->tpl_vars['cart_rules']->value['unselected'])+count($_smarty_tpl->tpl_vars['cart_rules']->value['selected'])>0) {?>
			<p class="checkbox">
				<label>
					<input type="checkbox" id="cart_rule_restriction" name="cart_rule_restriction" value="1" <?php if (count($_smarty_tpl->tpl_vars['cart_rules']->value['unselected'])) {?>checked="checked"<?php }?> />
					<?php echo smartyTranslate(array('s'=>'Compatibility with other cart rules','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

				</label>
			</p>
			<div id="cart_rule_restriction_div">
				<br />
				<table  class="table">
					<tr>
						<td>
							<p><?php echo smartyTranslate(array('s'=>'Uncombinable cart rules','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</p>
							<input id="cart_rule_select_1_filter" autocomplete="off" class="form-control uncombinable_search_filter" type="text" name="uncombinable_filter" placeholder="<?php echo smartyTranslate(array('s'=>'Search','d'=>'Admin.Actions'),$_smarty_tpl);?>
" value="">
							<select id="cart_rule_select_1" class="jscroll" multiple="">
							</select>
							<a class="jscroll-next btn btn-default btn-block clearfix" href=""><?php echo smartyTranslate(array('s'=>'Next','d'=>'Admin.Global'),$_smarty_tpl);?>
</a>
							<a id="cart_rule_select_add" class="btn btn-default btn-block clearfix"><?php echo smartyTranslate(array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl);?>
 <i class="icon-arrow-right"></i></a>
						</td>
						<td>
							<p><?php echo smartyTranslate(array('s'=>'Combinable cart rules','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</p>
							<input id="cart_rule_select_2_filter" autocomplete="off" class="form-control combinable_search_filter" type="text" name="combinable_filter" placeholder="<?php echo smartyTranslate(array('s'=>'Search','d'=>'Admin.Actions'),$_smarty_tpl);?>
" value="">
							<select name="cart_rule_select[]" class="jscroll" id="cart_rule_select_2" multiple>
							</select>
							<a class="jscroll-next btn btn-default btn-block clearfix" href=""><?php echo smartyTranslate(array('s'=>'Next','d'=>'Admin.Global'),$_smarty_tpl);?>
</a>
							<a id="cart_rule_select_remove" class="btn btn-default btn-block clearfix" ><i class="icon-arrow-left"></i> <?php echo smartyTranslate(array('s'=>'Remove','d'=>'Admin.Actions'),$_smarty_tpl);?>
</a>
						</td>
					</tr>
				</table>
			</div>
		<?php }?>

			<p class="checkbox">
				<label>
					<input type="checkbox" id="product_restriction" name="product_restriction" value="1" <?php if (count($_smarty_tpl->tpl_vars['product_rule_groups']->value)) {?>checked="checked"<?php }?> />
					<?php echo smartyTranslate(array('s'=>'Product selection','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

				</label>
			</p>
			<div id="product_restriction_div">
				<br />
				<table id="product_rule_group_table" class="table">
					<?php  $_smarty_tpl->tpl_vars['product_rule_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product_rule_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_rule_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product_rule_group']->key => $_smarty_tpl->tpl_vars['product_rule_group']->value) {
$_smarty_tpl->tpl_vars['product_rule_group']->_loop = true;
?>
						<?php echo $_smarty_tpl->tpl_vars['product_rule_group']->value;?>

					<?php } ?>
				</table>
				<a href="javascript:addProductRuleGroup();" class="btn btn-default ">
					<i class="icon-plus-sign"></i> <?php echo smartyTranslate(array('s'=>'Product selection','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

				</a>
			</div>

		<?php if (count($_smarty_tpl->tpl_vars['shops']->value['unselected'])+count($_smarty_tpl->tpl_vars['shops']->value['selected'])>1) {?>
			<p class="checkbox">
				<label>
					<input type="checkbox" id="shop_restriction" name="shop_restriction" value="1" <?php if (count($_smarty_tpl->tpl_vars['shops']->value['unselected'])) {?>checked="checked"<?php }?> />
					<?php echo smartyTranslate(array('s'=>'Shop selection','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>

				</label>
			</p>
			<div id="shop_restriction_div">
				<br/>
				<table class="table">
					<tr>
						<td>
							<p><?php echo smartyTranslate(array('s'=>'Unselected shops','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</p>
							<select id="shop_select_1" multiple>
								<?php  $_smarty_tpl->tpl_vars['shop'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shop']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shops']->value['unselected']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shop']->key => $_smarty_tpl->tpl_vars['shop']->value) {
$_smarty_tpl->tpl_vars['shop']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['shop']->value['id_shop']);?>
">&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['shop']->value['name']);?>
</option>
								<?php } ?>
							</select>
							<a id="shop_select_add" class="btn btn-default btn-block clearfix" ><?php echo smartyTranslate(array('s'=>'Add','d'=>'Admin.Actions'),$_smarty_tpl);?>
 <i class="icon-arrow-right"></i></a>
						</td>
						<td>
							<p><?php echo smartyTranslate(array('s'=>'Selected shops','d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</p>
							<select name="shop_select[]" id="shop_select_2" multiple>
								<?php  $_smarty_tpl->tpl_vars['shop'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shop']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shops']->value['selected']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shop']->key => $_smarty_tpl->tpl_vars['shop']->value) {
$_smarty_tpl->tpl_vars['shop']->_loop = true;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['shop']->value['id_shop']);?>
">&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['shop']->value['name']);?>
</option>
								<?php } ?>
							</select>
							<a id="shop_select_remove" class="btn btn-default btn-block clearfix" ><i class="icon-arrow-left"></i> <?php echo smartyTranslate(array('s'=>'Remove','d'=>'Admin.Actions'),$_smarty_tpl);?>
</a>
						</td>
					</tr>
				</table>
			</div>
		<?php }?>
	</div>
</div>
<?php }} ?>
