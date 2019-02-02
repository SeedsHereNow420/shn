<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:10
         compiled from "/var/www/html/SHN/modules/stmegamenu/views/templates/hook/stmegamenu-ul.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10264510285c32fdaa853f27-86055889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d42ad40545b85ad62f04872d7093f351677108b' => 
    array (
      0 => '/var/www/html/SHN/modules/stmegamenu/views/templates/hook/stmegamenu-ul.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10264510285c32fdaa853f27-86055889',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stvertical' => 0,
    'is_mega_menu_main' => 0,
    'responsive_max' => 0,
    'mm' => 0,
    'menu_title' => 0,
    'stmenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fdaa978428_31797214',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fdaa978428_31797214')) {function content_5c32fdaa978428_31797214($_smarty_tpl) {?><ul class="st_mega_menu clearfix mu_level_0">
	<?php if (isset($_smarty_tpl->tpl_vars['stvertical']->value)&&count($_smarty_tpl->tpl_vars['stvertical']->value)&&isset($_smarty_tpl->tpl_vars['is_mega_menu_main']->value)&&$_smarty_tpl->tpl_vars['is_mega_menu_main']->value) {?>
		<?php $_smarty_tpl->tpl_vars['responsive_max'] = new Smarty_variable(Configuration::get('STSN_RESPONSIVE_MAX'), null, 0);?>
		<li id="st_menu_0" class="ml_level_0 <?php if (Configuration::get('STSN_MENU_VER_OPEN')) {?>menu_ver_open_<?php if ($_smarty_tpl->tpl_vars['responsive_max']->value==1) {?>lg<?php } elseif ($_smarty_tpl->tpl_vars['responsive_max']->value==2) {?>xl<?php } elseif ($_smarty_tpl->tpl_vars['responsive_max']->value==3) {?>xxl<?php } else { ?>md<?php }?><?php }?>">
			<a id="st_ma_0" href="javascript:;" class="ma_level_0" title="<?php echo smartyTranslate(array('s'=>'Categories','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow"><i class="fto-menu"></i><?php echo smartyTranslate(array('s'=>'Categories','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a>
			<ul class="stmenu_sub stmenu_vertical col-md-3 <?php if (Configuration::get('STSN_MENU_VER_SUB_STYLE')) {?> stmenu_vertical_box <?php }?>">
				<?php  $_smarty_tpl->tpl_vars['mm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stvertical']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mm']->key => $_smarty_tpl->tpl_vars['mm']->value) {
$_smarty_tpl->tpl_vars['mm']->_loop = true;
?>
					<li id="st_menu_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" class="mv_level_1"><a id="st_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php if ($_smarty_tpl->tpl_vars['mm']->value['m_link']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_link'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>" class="mv_item<?php if (isset($_smarty_tpl->tpl_vars['mm']->value['column'])&&count($_smarty_tpl->tpl_vars['mm']->value['column'])) {?> is_parent<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_title'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['new_window']) {?> target="_blank"<?php }?>><?php if ($_smarty_tpl->tpl_vars['mm']->value['icon_class']) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_name'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['mm']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a>
						<?php if (isset($_smarty_tpl->tpl_vars['mm']->value['column'])&&count($_smarty_tpl->tpl_vars['mm']->value['column'])) {?>
							<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-sub.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('is_mega_menu_vertical'=>1), 0);?>

						<?php }?>
					</li>
				<?php } ?>
			</ul>
		</li>
	<?php }?>
	<?php  $_smarty_tpl->tpl_vars['mm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stmenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mm']->key => $_smarty_tpl->tpl_vars['mm']->value) {
$_smarty_tpl->tpl_vars['mm']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['mm']->value['hide_on_mobile']==2) {?><?php continue 1?><?php }?>
		<li id="st_menu_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" class="ml_level_0 m_alignment_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['alignment'], ENT_QUOTES, 'UTF-8');?>
">
			<a id="st_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php if ($_smarty_tpl->tpl_vars['mm']->value['m_link']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_link'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>" class="ma_level_0<?php if (isset($_smarty_tpl->tpl_vars['mm']->value['column'])&&count($_smarty_tpl->tpl_vars['mm']->value['column'])) {?> is_parent<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['m_icon']) {?> ma_icon<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_title'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['new_window']) {?> target="_blank"<?php }?>><?php if ($_smarty_tpl->tpl_vars['mm']->value['m_icon']) {?><?php echo $_smarty_tpl->tpl_vars['mm']->value['m_icon'];?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['mm']->value['icon_class']) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_name'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a>
			<?php if (isset($_smarty_tpl->tpl_vars['mm']->value['column'])&&count($_smarty_tpl->tpl_vars['mm']->value['column'])) {?>
				<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-sub.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

			<?php }?>
		</li>
	<?php } ?>
</ul><?php }} ?>
