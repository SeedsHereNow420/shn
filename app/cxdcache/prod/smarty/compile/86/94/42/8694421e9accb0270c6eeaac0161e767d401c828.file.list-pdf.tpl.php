<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:48:31
         compiled from "/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-pdf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9824289935c31a4bfc1fee0-44034478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8694421e9accb0270c6eeaac0161e767d401c828' => 
    array (
      0 => '/var/www/html/SHN/modules/ordersplusplus/views/templates/admin/list-pdf.tpl',
      1 => 1519199329,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9824289935c31a4bfc1fee0-44034478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'invoice' => 0,
    'link' => 0,
    'id_order' => 0,
    'delivery' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a4bfc28d22_50922027',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a4bfc28d22_50922027')) {function content_5c31a4bfc28d22_50922027($_smarty_tpl) {?>
<span class="btn-group-action">
    <span class="btn-group">
        <?php if ($_smarty_tpl->tpl_vars['invoice']->value) {?>
            <a class="btn btn-default" target="_blank" onclick="oppDownloadPDF('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'htmlall','UTF-8');?>
', 'generateInvoicePDF', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_order']->value,'htmlall','UTF-8');?>
')">
                <i class="icon icon-file-text"></i>
            </a>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['delivery']->value) {?>
            <a class="btn btn-default" target="_blank" onclick="oppDownloadPDF('<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'),'htmlall','UTF-8');?>
', 'generateDeliverySlipPDF', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_order']->value,'htmlall','UTF-8');?>
')">
                <i class="icon icon-truck"></i>
            </a>
        <?php }?>
    </span>
</span>
<?php }} ?>
