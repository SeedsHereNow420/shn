<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:13:07
         compiled from "module:stqrcode/views/templates/hook/stqrcode-nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20465544465c31aa83b175f7-95122284%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74daafa7ba134ea5bd1335faab298a0b1efbc5c0' => 
    array (
      0 => 'module:stqrcode/views/templates/hook/stqrcode-nav.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '20465544465c31aa83b175f7-95122284',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'qr_label' => 0,
    'qr_image_link' => 0,
    'qr_load' => 0,
    'qr_size' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31aa83b1dec0_68760507',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31aa83b1dec0_68760507')) {function content_5c31aa83b1dec0_68760507($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/stqrcode/views/templates/hook/stqrcode-nav.tpl -->
<div class="top_bar_item dropdown_wrap qrcode_drop pro_right_item">
	<div class="dropdown_tri dropdown_tri_in header_item">
        <?php if ($_smarty_tpl->tpl_vars['qr_label']->value==0||$_smarty_tpl->tpl_vars['qr_label']->value==2) {?><i class="fto-qrcode<?php if ($_smarty_tpl->tpl_vars['qr_label']->value==0) {?> mar_r4 <?php }?>"></i><?php }?><?php if ($_smarty_tpl->tpl_vars['qr_label']->value==0||$_smarty_tpl->tpl_vars['qr_label']->value==1) {?><?php echo smartyTranslate(array('s'=>'QR code','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<i class="fto-angle-down arrow_down arrow"></i><i class="fto-angle-up arrow_up arrow"></i><?php }?>
    </div>
	<div class="dropdown_list">
		<div class="dropdown_box text-center">
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['qr_image_link']->value, ENT_QUOTES, 'UTF-8');?>
" class="qrcode_link " target="_blank" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Scan the QR code to open this page on your phone.','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
				<?php if ($_smarty_tpl->tpl_vars['qr_load']->value) {?>
				<i class="fto-spin5 animate-spin"></i>
				<?php } else { ?>
				<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['qr_image_link']->value, ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['qr_size']->value, ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['qr_size']->value, ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo smartyTranslate(array('s'=>'Scan the QR code to open this page on your phone.','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" />
				<?php }?>
			</a>
		</div>
	</div>
</div><!-- end /var/www/html/SHN/modules/stqrcode/views/templates/hook/stqrcode-nav.tpl --><?php }} ?>
