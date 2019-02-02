<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:23:06
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/modules/modal_translation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12159621305c319ecac29558-40060629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61c2a0465adbc0c902fa0e1832bcf88a5026200d' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/modules/modal_translation.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12159621305c319ecac29558-40060629',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_languages' => 0,
    'language' => 0,
    'translateLinks' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319ecac2d883_03387098',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319ecac2d883_03387098')) {function content_5c319ecac2d883_03387098($_smarty_tpl) {?>
<div class="modal-body">
	<div class="input-group">
		<button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
			<i class="icon-flag"></i>
			<?php echo smartyTranslate(array('s'=>'Manage translations'),$_smarty_tpl);?>

			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu">
			<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['module_languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
				<li>
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['translateLinks']->value[$_smarty_tpl->tpl_vars['language']->value['iso_code']],'html','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['language']->value['name'],'html','UTF-8');?>
</a>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php }} ?>
