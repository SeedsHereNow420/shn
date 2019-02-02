<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 11:48:38
         compiled from "/var/www/html/SHN/modules/dgridproducts/views/templates/admin/documentation_links.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10539333365c34fe96b8bd54-91034419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c7dafb01d7b09dcf7107bd10b5e8bb8570f0ef8' => 
    array (
      0 => '/var/www/html/SHN/modules/dgridproducts/views/templates/admin/documentation_links.tpl',
      1 => 1512598745,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10539333365c34fe96b8bd54-91034419',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_on_tab_module' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34fe96b92e46_04188209',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34fe96b92e46_04188209')) {function content_5c34fe96b92e46_04188209($_smarty_tpl) {?>

<div class="custom_bootstrap">
<ul class="tabs">
    <li class="active">
        <a class="grid_prod_search" href="#grid_prod_search" data-toggle="tab"><?php echo smartyTranslate(array('s'=>'Search Products','mod'=>'dgridproducts'),$_smarty_tpl);?>
</a>
    </li>
    <li>
        <a class="grid_prod_doc" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link_on_tab_module']->value,'quotes','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Setting grid','mod'=>'dgridproducts'),$_smarty_tpl);?>
</a>
    </li>
    <li>
        <a class="grid_prod_doc" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link_on_tab_module']->value,'quotes','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Documentation','mod'=>'dgridproducts'),$_smarty_tpl);?>
</a>
    </li>
    <li>
        <a id="seosa_manager_btn" href="#"><?php echo smartyTranslate(array('s'=>'Our modules','mod'=>'dgridproducts'),$_smarty_tpl);?>
</a>
    </li>
</ul>

<script src='https://seosaps.com/ru/module/seosamanager/manager?ajax=1&action=script&iso_code=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(Context::getContext()->language->iso_code,'quotes','UTF-8');?>
'></script>

<?php }} ?>
