<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:16:48
         compiled from "modules/stmegamenu/views/templates/hook/stmobilemenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10776214215c31ab607818e4-53251621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6ef6fe9f6b7c1799382e432db42030fe0542f85' => 
    array (
      0 => 'modules/stmegamenu/views/templates/hook/stmobilemenu.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10776214215c31ab607818e4-53251621',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31ab60783381_54242252',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31ab60783381_54242252')) {function content_5c31ab60783381_54242252($_smarty_tpl) {?>
<div class="st-menu" id="side_stmobilemenu">
  <div class="st-menu-header">
	<h3 class="st-menu-title"><?php echo smartyTranslate(array('s'=>'Menu','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</h3>
	  <a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
  </div>
  <div id="st_mobile_menu" class="stmobilemenu_box">
	<?php echo $_smarty_tpl->getSubTemplate ("./stmobilemenu-ul.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  </div>
</div><?php }} ?>
