<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:18:07
         compiled from "module:stsidebar/views/templates/hook/stsidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18073791575c31abafd3f382-88344254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5b0572dbf09cbea15f05c9a207c164e666d1a4f' => 
    array (
      0 => 'module:stsidebar/views/templates/hook/stsidebar.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '18073791575c31abafd3f382-88344254',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sidebar_items' => 0,
    'sidebar_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31abafd46243_31020193',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31abafd46243_31020193')) {function content_5c31abafd46243_31020193($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['sidebar_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sidebar_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sidebar_items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sidebar_item']->key => $_smarty_tpl->tpl_vars['sidebar_item']->value) {
$_smarty_tpl->tpl_vars['sidebar_item']->_loop = true;
?>
<?php if (!$_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']) {?>
<div class="st-menu custom_sidebar" id="side_custom_sidebar_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['id_st_sidebar'], ENT_QUOTES, 'UTF-8');?>
">
	<div class="st-menu-header">
		<h3 class="st-menu-title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
</h3>
    	<a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
	</div>
	<div class="custom_sidebar_box pad_10">
		<?php echo $_smarty_tpl->tpl_vars['sidebar_item']->value['content'];?>

	</div>
</div>
<?php } elseif ($_smarty_tpl->tpl_vars['sidebar_item']->value['native_modules']==7) {?>
    <div class="st-menu" id="side_mobile_nav">
        <div class="st-menu-header">
            <h3 class="st-menu-title"><?php if ($_smarty_tpl->tpl_vars['sidebar_item']->value['title']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sidebar_item']->value['title'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Settings','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></h3>
            <a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
        </div>
      <div class="mobile_nav_box">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayMobileNav"),$_smarty_tpl);?>

      </div>
    </div>
<?php }?>
<?php } ?>

<?php }} ?>
