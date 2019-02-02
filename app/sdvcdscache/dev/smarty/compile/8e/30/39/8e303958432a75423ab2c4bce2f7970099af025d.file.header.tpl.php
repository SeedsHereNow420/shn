<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:16:47
         compiled from "modules/stsocial/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3267545205c31ab5fba2137-33548770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e303958432a75423ab2c4bce2f7970099af025d' => 
    array (
      0 => 'modules/stsocial/views/templates/hook/header.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3267545205c31ab5fba2137-33548770',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'fb_app_id' => 0,
    'shop' => 0,
    'url' => 0,
    'urls' => 0,
    'image_link' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'blog_image_link' => 0,
    'logo_image_link' => 0,
    'custom_css' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31ab5fbb8572_30166826',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31ab5fbb8572_30166826')) {function content_5c31ab5fbb8572_30166826($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['page']->value['page_name']!='product') {?>
    <?php if (isset($_smarty_tpl->tpl_vars['fb_app_id']->value)&&$_smarty_tpl->tpl_vars['fb_app_id']->value) {?>
    <meta property="fb:app_id" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fb_app_id']->value, ENT_QUOTES, 'UTF-8');?>
" />
    <?php }?>
    <meta property="og:site_name" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
    <meta property="og:url" content="<?php if (isset($_smarty_tpl->tpl_vars['url']->value)&&$_smarty_tpl->tpl_vars['url']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
<?php }?>" />
    <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name']=='category') {?>
    <meta property="og:type" content="product" />
    <meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
" />
    <meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['description'], ENT_QUOTES, 'UTF-8');?>
" />
    <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_link']->value, ENT_QUOTES, 'UTF-8');?>
" />
    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value['page_name']=='manufacturer'&&isset($_GET['id_manufacturer'])&&$_GET['id_manufacturer']) {?>
    <meta property="og:type" content="product" />
    <meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
" />
    <meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['description'], ENT_QUOTES, 'UTF-8');?>
" />
    <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['img_manu_url'], ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['id_manufacturer'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
-big_default.jpg" />
    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value['page_name']=='supplier'&&isset($_GET['id_supplier'])&&$_GET['id_supplier']) {?>
    <meta property="og:type" content="product" />
    <meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
" />
    <meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['description'], ENT_QUOTES, 'UTF-8');?>
" />
    <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['img_sup_url'], ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_GET['id_supplier'], ENT_QUOTES, 'UTF-8');?>
-big_default.jpg" />
    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value['page_name']=='module-stblog-article') {?>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8');?>
" />
    <meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8');?>
" />
    <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog_image_link']->value, ENT_QUOTES, 'UTF-8');?>
" />
    <?php } else { ?>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
" />
    <meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['description'], ENT_QUOTES, 'UTF-8');?>
" />
    <?php if (isset($_smarty_tpl->tpl_vars['logo_image_link']->value)&&$_smarty_tpl->tpl_vars['logo_image_link']->value) {?>
    <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_image_link']->value, ENT_QUOTES, 'UTF-8');?>
" />
    <?php } elseif (isset($_smarty_tpl->tpl_vars['shop']->value['logo'])&&$_smarty_tpl->tpl_vars['shop']->value['logo']) {?>
    <meta property="og:image" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" />
    <?php }?>
    <?php }?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['custom_css']->value)&&$_smarty_tpl->tpl_vars['custom_css']->value) {?>
<style type="text/css"><?php echo $_smarty_tpl->tpl_vars['custom_css']->value;?>
</style>
<?php }?><?php }} ?>
