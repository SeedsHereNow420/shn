<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 14:28:27
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/modules/tab_module_line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10518761345c37c70b7777d2-71166383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29dc9478ce2c7822cca8ef2ea40c500f86cbd42d' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/modules/tab_module_line.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10518761345c37c70b7777d2-71166383',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module' => 0,
    'option' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c37c70b7a57c5_35289623',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c37c70b7a57c5_35289623')) {function content_5c37c70b7a57c5_35289623($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>
<tr>
	<td class="fixed-width-sm center">
		<img class="img-thumbnail" alt="<?php echo $_smarty_tpl->tpl_vars['module']->value->name;?>
" src="<?php if (isset($_smarty_tpl->tpl_vars['module']->value->image)) {?><?php echo $_smarty_tpl->tpl_vars['module']->value->image;?>
<?php } else { ?><?php echo @constant('_MODULE_DIR_');?>
<?php echo $_smarty_tpl->tpl_vars['module']->value->name;?>
/<?php echo $_smarty_tpl->tpl_vars['module']->value->logo;?>
<?php }?>" />
	</td>
	<td>
		<div id="anchor<?php echo ucfirst($_smarty_tpl->tpl_vars['module']->value->name);?>
" title="<?php echo $_smarty_tpl->tpl_vars['module']->value->displayName;?>
">
			<div class="module_name">
				<span style="display:none"><?php echo $_smarty_tpl->tpl_vars['module']->value->name;?>
</span>
				<?php echo $_smarty_tpl->tpl_vars['module']->value->displayName;?>

				<small class="text-muted">v<?php echo $_smarty_tpl->tpl_vars['module']->value->version;?>
 - by <?php echo $_smarty_tpl->tpl_vars['module']->value->author;?>
</small>
				<?php if (isset($_smarty_tpl->tpl_vars['module']->value->type)&&$_smarty_tpl->tpl_vars['module']->value->type=='addonsBought') {?>
					- <span class="module-badge-bought help-tooltip text-warning" data-title="<?php echo smartyTranslate(array('s'=>"You bought this module on PrestaShop Addons. Thank You."),$_smarty_tpl);?>
"><i class="icon-pushpin"></i> <small><?php echo smartyTranslate(array('s'=>"Bought"),$_smarty_tpl);?>
</small></span>
				<?php } elseif (isset($_smarty_tpl->tpl_vars['module']->value->type)&&$_smarty_tpl->tpl_vars['module']->value->type=='addonsMustHave') {?>
					- <span class="module-badge-popular help-tooltip text-primary" data-title="<?php echo smartyTranslate(array('s'=>"This module is available on PrestaShop Addons"),$_smarty_tpl);?>
"><i class="icon-group"></i> <small><?php echo smartyTranslate(array('s'=>"Popular"),$_smarty_tpl);?>
</small></span>
				<?php } elseif (isset($_smarty_tpl->tpl_vars['module']->value->type)&&$_smarty_tpl->tpl_vars['module']->value->type=='addonsPartner') {?>
					- <span class="module-badge-partner help-tooltip text-warning" data-title="<?php echo smartyTranslate(array('s'=>"This module is available for free thanks to our partner."),$_smarty_tpl);?>
"><i class="icon-pushpin"></i> <small><?php echo smartyTranslate(array('s'=>"Official"),$_smarty_tpl);?>
</small></span>
				<?php } elseif (isset($_smarty_tpl->tpl_vars['module']->value->id)&&$_smarty_tpl->tpl_vars['module']->value->id>0) {?>
					<?php if (isset($_smarty_tpl->tpl_vars['module']->value->version_addons)&&$_smarty_tpl->tpl_vars['module']->value->version_addons) {?>
						<span class="label label-warning"><?php echo smartyTranslate(array('s'=>'Need update'),$_smarty_tpl);?>
</span>
					<?php }?>
				<?php }?>
			</div>
			<p class="module_description">
				<?php if (isset($_smarty_tpl->tpl_vars['module']->value->description)&&$_smarty_tpl->tpl_vars['module']->value->description!='') {?>
					<?php echo $_smarty_tpl->tpl_vars['module']->value->description;?>

				<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['module']->value->show_quick_view)&&$_smarty_tpl->tpl_vars['module']->value->show_quick_view) {?>
					<br><a href="#" class="controller-quick-view" data-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['module']->value->name,'html','UTF-8');?>
"><i class="icon-search"></i> <?php echo smartyTranslate(array('s'=>'Read more'),$_smarty_tpl);?>
</a>
				<?php }?>
			</p>
			<?php if (isset($_smarty_tpl->tpl_vars['module']->value->message)&&(empty($_smarty_tpl->tpl_vars['module']->value->name)!==false)&&(!isset($_smarty_tpl->tpl_vars['module']->value->type)||($_smarty_tpl->tpl_vars['module']->value->type!='addonsMustHave'||$_smarty_tpl->tpl_vars['module']->value->type!=='addonsNative'))) {?><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $_smarty_tpl->tpl_vars['module']->value->message;?>
</div><?php }?>
		</div>
	</td>
	<?php if (isset($_smarty_tpl->tpl_vars['module']->value->type)&&$_smarty_tpl->tpl_vars['module']->value->type=='addonsMustHave') {?>
		<td>&nbsp;</td>
		<td style="text-align: right;">
			<p>
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(smarty_modifier_replace($_smarty_tpl->tpl_vars['module']->value->addons_buy_url,' ','+'),'html','UTF-8');?>
" onclick="return !window.open(this.href, '_blank');" class="button updated _blank">
					<span class="btn btn-default">
						<i class="icon-shopping-cart"></i><?php if (isset($_smarty_tpl->tpl_vars['module']->value->price)) {?><?php if (floatval($_smarty_tpl->tpl_vars['module']->value->price)==0) {?><?php echo smartyTranslate(array('s'=>'Free'),$_smarty_tpl);?>
<?php } elseif (isset($_smarty_tpl->tpl_vars['module']->value->id_currency)) {?> &nbsp;&nbsp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['module']->value->price,'currency'=>$_smarty_tpl->tpl_vars['module']->value->id_currency),$_smarty_tpl);?>
<?php }?><?php }?>
					</span>
				</a>
			</p>
		</td>
	<?php } elseif (!isset($_smarty_tpl->tpl_vars['module']->value->not_on_disk)) {?>
		<td>&nbsp;</td>
		<td class="actions">
			<div class="btn-group-action">
				<?php if (count($_smarty_tpl->tpl_vars['module']->value->optionsHtml)>0) {?>
				<div class="btn-group">
					<?php $_smarty_tpl->tpl_vars['option'] = new Smarty_variable($_smarty_tpl->tpl_vars['module']->value->optionsHtml[0], null, 0);?>
					<?php echo $_smarty_tpl->tpl_vars['option']->value;?>

					<?php if (count($_smarty_tpl->tpl_vars['module']->value->optionsHtml)>1) {?>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" >
						<span class="caret">&nbsp;</span>
					</button>
					<ul class="dropdown-menu pull-right">

					<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['module']->value->optionsHtml; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['option']->key;
?>
						<?php if ($_smarty_tpl->tpl_vars['key']->value!=0) {?>
							<?php if (strpos($_smarty_tpl->tpl_vars['option']->value,'title="divider"')!==false) {?>
								<li class="divider"></li>
							<?php } else { ?>
								<li><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</li>
							<?php }?>
						<?php }?>
					<?php } ?>
					</ul>
					<?php }?>
				</div>
				<?php }?>
			</div>
		</td>
	<?php } else { ?>
		<td>&nbsp;</td>
		<td style="text-align: right;">
			<p>
				<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['module']->value->options['install_url'],'html','UTF-8');?>
" class="btn btn-success">
					<i class="icon-plus-sign-alt"></i>
					<?php echo smartyTranslate(array('s'=>'Install'),$_smarty_tpl);?>

				</a>
			</p>
		</td>
	<?php }?>
</tr>
<?php }} ?>
