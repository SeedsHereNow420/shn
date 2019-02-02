<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 13:14:07
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/logs/employee_field.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14883651225c2fcc9f6f3927-88916436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '14883651225c2fcc9f6f3927-88916436',
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
  'unifunc' => 'content_5c2fcc9f6f6d88_54101243',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fcc9f6f6d88_54101243')) {function content_5c2fcc9f6f6d88_54101243($_smarty_tpl) {?>
<span class="employee_avatar_small">
	<img class="imgm img-thumbnail" alt="" src="<?php echo $_smarty_tpl->tpl_vars['employee_image']->value;?>
" width="32" height="32" />
</span>
<?php echo $_smarty_tpl->tpl_vars['employee_name']->value;?>

<?php }} ?>
