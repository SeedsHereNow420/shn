<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 11:18:41
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/logs/employee_field.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8559011345c34f7918ff817-45106005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22c0449aecc692bc70e05d02222570fd6ec9a9ac' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/logs/employee_field.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8559011345c34f7918ff817-45106005',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'employee_image' => 0,
    'employee_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34f791903a60_06492854',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34f791903a60_06492854')) {function content_5c34f791903a60_06492854($_smarty_tpl) {?>
<span class="employee_avatar_small">
	<img class="imgm img-thumbnail" alt="" src="<?php echo $_smarty_tpl->tpl_vars['employee_image']->value;?>
" width="32" height="32" />
</span>
<?php echo $_smarty_tpl->tpl_vars['employee_name']->value;?>

<?php }} ?>
