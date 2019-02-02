<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:28:28
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6665219895c31a00c66bca6-21333182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ab6ecbc026c38e9e9979dfedcaa037833b0b19e' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/content.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6665219895c31a00c66bca6-21333182',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a00c66d896_58894484',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a00c66d896_58894484')) {function content_5c31a00c66d896_58894484($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }} ?>
