<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:05:20
         compiled from "/var/www/html/SHN/modules/cppcg//views/templates/admin/product_tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1704391515c31a8b04a1384-43115637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7d4bea353cb483e56658436f71e5ea8cd1a9abc' => 
    array (
      0 => '/var/www/html/SHN/modules/cppcg//views/templates/admin/product_tab.tpl',
      1 => 1514056900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1704391515c31a8b04a1384-43115637',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'groups' => 0,
    'group' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a8b04bc2f6_18439855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a8b04bc2f6_18439855')) {function content_5c31a8b04bc2f6_18439855($_smarty_tpl) {?>

<div class="product-tab p-b-1">
	<h2><?php echo smartyTranslate(array('s'=>'Set product price for specific customer group.','mod'=>'cppcg'),$_smarty_tpl);?>
</h2>
	<div class="alert alert-info">
	<i class="material-icons">help</i>
		<p><?php echo smartyTranslate(array('s'=>'On this tab you can set specific product price for specific customer group.','mod'=>'cppcg'),$_smarty_tpl);?>
</p>
		<p><?php echo smartyTranslate(array('s'=>'If fields are left empty, then default product price (Pricing) will be used as primary for respective customer groups.','mod'=>'cppcg'),$_smarty_tpl);?>
</p>
	</div>	
	
</div>
<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
	<div id="price-customer-group_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['group']->value['id_group'],'htmlall','UTF-8');?>
" class="col-md-12 p-b-1">
	<h2><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['group']->value['name'],'htmlall','UTF-8');?>
</h2>
		<div class="form-group">
			<label class="control-label col-lg-2" for="price_tax_exluded_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['group']->value['id_group'],'htmlall','UTF-8');?>
">
				<?php echo smartyTranslate(array('s'=>'Product price','mod'=>'cppcg'),$_smarty_tpl);?>

			</label>
			<div class="col-lg-2">
				<div class="input-group money-type">
					<span class="input-group-addon"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currency']->value->prefix,'htmlall','UTF-8');?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['currency']->value->sign,'htmlall','UTF-8');?>
</span>						
					<input size="11" maxlength="27" class="form-control" id="price_tax_exluded_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['group']->value['id_group'],'htmlall','UTF-8');?>
" name="price_tax_exluded[<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['group']->value['id_group'],'htmlall','UTF-8');?>
]" type="text" value="<?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['toolsConvertPrice'][0][0]->toolsConvertPrice(array('price'=>$_smarty_tpl->tpl_vars['group']->value['price']),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php echo sprintf('%.6f',$_tmp2);?>
" />
				</div>
			</div>
		</div>

	</div>	
<?php } ?><?php }} ?>
