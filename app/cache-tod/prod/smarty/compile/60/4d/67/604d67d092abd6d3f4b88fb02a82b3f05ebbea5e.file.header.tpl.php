<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 03:02:57
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/login/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17113583125c31e061b86328-68933640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '604d67d092abd6d3f4b88fb02a82b3f05ebbea5e' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/login/header.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17113583125c31e061b86328-68933640',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'iso' => 0,
    'img_dir' => 0,
    'shop_name' => 0,
    'meta_title' => 0,
    'navigationPipe' => 0,
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'js_files' => 0,
    'js_uri' => 0,
    'js_def' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31e061b913e8_47605189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31e061b913e8_47605189')) {function content_5c31e061b913e8_47605189($_smarty_tpl) {?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 lt-ie6"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9"> <![endif]-->
<html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
">
	<head>
		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
favicon.ico" />
		<link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
app_icon.png" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="robots" content="NOFOLLOW, NOINDEX">
		<title>
			<?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['meta_title']->value!='') {?><?php if (isset($_smarty_tpl->tpl_vars['navigationPipe']->value)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['navigationPipe']->value,'html','UTF-8');?>
<?php } else { ?>&gt;<?php }?> <?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
<?php }?> (PrestaShop&trade;)
		</title>
		<?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
			<link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
" />
		<?php } ?>
		<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value) {
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
			<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
"></script>
		<?php } ?>
		<script type="text/javascript" src="../js/admin/login.js?v=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(@constant('_PS_VERSION_'),'html','UTF-8');?>
"></script>

		<?php if ((isset($_smarty_tpl->tpl_vars['js_def']->value)&&count($_smarty_tpl->tpl_vars['js_def']->value)||isset($_smarty_tpl->tpl_vars['js_files']->value)&&count($_smarty_tpl->tpl_vars['js_files']->value))) {?>
			<?php echo $_smarty_tpl->getSubTemplate ((@constant('_PS_ALL_THEMES_DIR_')).("javascript.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php }?>
	</head>
	<body class="ps_back-office bootstrap">
		<div id="login">
			<div id="content">
<?php }} ?>
