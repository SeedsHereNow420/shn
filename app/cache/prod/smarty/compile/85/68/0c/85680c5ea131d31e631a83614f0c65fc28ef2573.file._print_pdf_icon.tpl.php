<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 09:54:54
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/slip/_print_pdf_icon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13491677055c36356e22d9b4-87160764%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85680c5ea131d31e631a83614f0c65fc28ef2573' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/slip/_print_pdf_icon.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13491677055c36356e22d9b4-87160764',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'order_slip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c36356e24c0b3_93205154',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c36356e24c0b3_93205154')) {function content_5c36356e24c0b3_93205154($_smarty_tpl) {?>



<a class="btn btn-default _blank" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'html','UTF-8');?>
&amp;submitAction=generateOrderSlipPDF&amp;id_order_slip=<?php echo intval($_smarty_tpl->tpl_vars['order_slip']->value->id);?>
">
	<i class="icon-file-text"></i>
	<?php echo smartyTranslate(array('s'=>'Download credit slip','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

</a>

<?php }} ?>
