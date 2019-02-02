<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 16:25:09
         compiled from "/var/www/html/SHN/pdf/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2433671265c2ff9651e1c17-66416732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67ef7b61585fd1d6e7f268c3f779aff972946c5a' => 
    array (
      0 => '/var/www/html/SHN/pdf/header.tpl',
      1 => 1546552160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2433671265c2ff9651e1c17-66416732',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logo_path' => 0,
    'width_logo' => 0,
    'height_logo' => 0,
    'header' => 0,
    'date' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2ff9651e9684_70456802',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2ff9651e9684_70456802')) {function content_5c2ff9651e9684_70456802($_smarty_tpl) {?>


<table style="width: 100%">
<tr>
	<td style="width: 50%">
		<?php if ($_smarty_tpl->tpl_vars['logo_path']->value) {?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['logo_path']->value;?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['width_logo']->value;?>
px; height:<?php echo $_smarty_tpl->tpl_vars['height_logo']->value;?>
px;" />
		<?php }?>
	</td>
	<td style="width: 50%; text-align: right;">
		<table style="width: 100%">
			<tr>
				<td style="font-weight: bold; font-size: 14pt; color: #444; width: 100%;"><?php if (isset($_smarty_tpl->tpl_vars['header']->value)) {?><?php echo mb_strtoupper($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['header']->value,'html','UTF-8'), 'UTF-8');?>
<?php }?></td>
			</tr>
			<tr>
				<td style="font-size: 14pt; color: #9E9F9E"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['date']->value,'html','UTF-8');?>
</td>
			</tr>
			<tr>
				<td style="font-size: 14pt; color: #9E9F9E"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['title']->value,'html','UTF-8');?>
</td>
			</tr>
		</table>
	</td>
</tr>
</table>

<?php }} ?>
