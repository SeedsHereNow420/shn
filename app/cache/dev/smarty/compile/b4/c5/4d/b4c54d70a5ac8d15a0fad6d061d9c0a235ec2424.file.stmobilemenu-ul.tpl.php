<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:42:35
         compiled from "/var/www/html/SHN/modules/stmegamenu/views/templates/hook/stmobilemenu-ul.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7427899415c322ffb23c650-64996821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4c54d70a5ac8d15a0fad6d061d9c0a235ec2424' => 
    array (
      0 => '/var/www/html/SHN/modules/stmegamenu/views/templates/hook/stmobilemenu-ul.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7427899415c322ffb23c650-64996821',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_mega_menu_column' => 0,
    'stmenu' => 0,
    'mm' => 0,
    'menu_title' => 0,
    'has_children' => 0,
    'column' => 0,
    'block' => 0,
    'product' => 0,
    'menu' => 0,
    'brand' => 0,
    'manufacturerSize' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322ffb40c955_08017490',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322ffb40c955_08017490')) {function content_5c322ffb40c955_08017490($_smarty_tpl) {?>
<!-- MODULE st megamenu -->
<?php if (!isset($_smarty_tpl->tpl_vars['is_mega_menu_column']->value)) {?>
	<?php $_smarty_tpl->tpl_vars['is_mega_menu_column'] = new Smarty_variable(0, null, 0);?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['stmenu']->value)) {?>
<ul id="st_mobile_menu_ul" class="mo_mu_level_0">
	<?php  $_smarty_tpl->tpl_vars['mm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stmenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mm']->key => $_smarty_tpl->tpl_vars['mm']->value) {
$_smarty_tpl->tpl_vars['mm']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['mm']->value['hide_on_mobile']==1&&!$_smarty_tpl->tpl_vars['is_mega_menu_column']->value) {?><?php continue 1?><?php }?>
		<li class="mo_ml_level_0 mo_ml_column">
			<?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['mm']->value['column'])&&count($_smarty_tpl->tpl_vars['mm']->value['column'])), null, 0);?>
			<div class="menu_a_wrap">
			<a id="st_mo_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php if ($_smarty_tpl->tpl_vars['mm']->value['m_link']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_link'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>" class="mo_ma_level_0"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_title'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['new_window']) {?> target="_blank"<?php }?>><?php if ($_smarty_tpl->tpl_vars['mm']->value['m_icon']) {?><?php echo $_smarty_tpl->tpl_vars['mm']->value['m_icon'];?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['mm']->value['icon_class']) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_name'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a>
			<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span><?php }?>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mm']->value['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['column']->value['hide_on_mobile']==1&&!$_smarty_tpl->tpl_vars['is_mega_menu_column']->value) {?><?php continue 1?><?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['column']->value['children'])&&count($_smarty_tpl->tpl_vars['column']->value['children'])) {?>
						<?php  $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['column']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['block']->key => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->_loop = true;
?>
							<?php if ($_smarty_tpl->tpl_vars['block']->value['hide_on_mobile']==1&&!$_smarty_tpl->tpl_vars['is_mega_menu_column']->value) {?><?php continue 1?><?php }?>
							<?php if ($_smarty_tpl->tpl_vars['block']->value['item_t']==1) {?>
								<?php if ($_smarty_tpl->tpl_vars['block']->value['subtype']==2&&isset($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
									<ul class="mo_mu_level_1 mo_sub_ul">
										<li class="mo_ml_level_1 mo_sub_li">
											<?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])), null, 0);?>
											<div class="menu_a_wrap">
											<a id="st_mo_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?> class="mo_ma_level_1 mo_sub_a"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a>
												<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
												<span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span>
												<?php }?>
											</div>
											<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
												<ul class="mo_mu_level_2 mo_sub_ul">
												<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
												<li class="mo_ml_level_2 mo_sub_li"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?> class="mo_ma_level_2 mo_sub_a"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],45,'...'), ENT_QUOTES, 'UTF-8');?>
</a></li>
												<?php } ?>
												</ul>	
											<?php }?>
										</li>
									</ul>	
								<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['subtype']==0&&isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?>
									<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
										<ul class="mo_mu_level_1 mo_sub_ul">
											<li class="mo_ml_level_1 mo_sub_li">
												<?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['menu']->value['children'])&&is_array($_smarty_tpl->tpl_vars['menu']->value['children'])&&count($_smarty_tpl->tpl_vars['menu']->value['children'])), null, 0);?>
												<div class="menu_a_wrap">
												<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?> class="mo_ma_level_1 mo_sub_a"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
												<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span><?php }?>
												</div>
												<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
													<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window'],'menus'=>$_smarty_tpl->tpl_vars['menu']->value['children'],'m_level'=>2,'ismobilemenu'=>true), 0);?>

												<?php }?>
											</li>
										</ul>	
									<?php } ?>
								<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['subtype']==1||$_smarty_tpl->tpl_vars['block']->value['subtype']==3) {?>
									<ul class="mo_mu_level_1 mo_sub_ul">
										<li class="mo_ml_level_1 mo_sub_li">
											<?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])), null, 0);?>
											<div class="menu_a_wrap">
											<a  id="st_mo_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?> class="mo_ma_level_1 mo_sub_a"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a>
											<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span><?php }?>
											</div>
    										<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
												<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window'],'menus'=>$_smarty_tpl->tpl_vars['block']->value['children']['children'],'m_level'=>2,'ismobilemenu'=>true), 0);?>

											<?php }?>
										</li>
									</ul>	
								<?php }?>
							<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==2&&isset($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
								<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" class="stmobilemenu_column">
								<div class="products_sldier_swiper">
								<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
								<div class="m-b-1">
									<?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

								</div>
								<?php } ?>
								</div>
								</div>
							<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==3&&isset($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
								<?php if (isset($_smarty_tpl->tpl_vars['block']->value['subtype'])&&$_smarty_tpl->tpl_vars['block']->value['subtype']) {?>
									<?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
    									<ul class="mo_mu_level_1 mo_sub_ul">
											<li class="mo_ml_level_1 mo_sub_li">
												<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?> class="mo_ma_level_1 mo_sub_a"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
											</li>
										</ul>	
									<?php } ?>
								<?php } else { ?>
									<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" class="stmobilemenu_column">
										<?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
	    									<div class="mo_brand_div">
												<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?> class="st_menu_brand">
								                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['image'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['manufacturerSize']->value['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['manufacturerSize']->value['height'], ENT_QUOTES, 'UTF-8');?>
" />
								                </a>
											</div>
										<?php } ?>
									</div>
								<?php }?>
							<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==4) {?>
								<ul class="mo_mu_level_1 mo_sub_ul">
									<li class="mo_ml_level_1 mo_sub_li">
										<?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['block']->value['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])), null, 0);?>
										<div class="menu_a_wrap">
										<a  id="st_mo_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php if ($_smarty_tpl->tpl_vars['block']->value['m_link']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_link'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_title'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?> class="mo_ma_level_1 mo_sub_a <?php if (!$_smarty_tpl->tpl_vars['block']->value['m_link']) {?> ma_span<?php }?>"><?php if ($_smarty_tpl->tpl_vars['block']->value['icon_class']) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_name'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a>
										<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
											<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
												<?php if ($_smarty_tpl->tpl_vars['menu']->value['hide_on_mobile']==1&&!$_smarty_tpl->tpl_vars['is_mega_menu_column']->value) {?><?php continue 1?><?php }?>
												<span class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span>
												<?php break 1?>
											<?php } ?>
										<?php }?>
										</div>
										<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
											<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
												<?php if ($_smarty_tpl->tpl_vars['menu']->value['hide_on_mobile']==1&&!$_smarty_tpl->tpl_vars['is_mega_menu_column']->value) {?><?php continue 1?><?php }?>
												<ul class="mo_mu_level_2 mo_sub_ul">
												<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window'],'menus'=>$_smarty_tpl->tpl_vars['menu']->value,'m_level'=>2,'ismobilemenu'=>true), 0);?>

												</ul>
											<?php } ?>
										<?php }?>
									</li>
								</ul>	
							<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==5&&$_smarty_tpl->tpl_vars['block']->value['html']) {?>
								<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" class="stmobilemenu_column style_content">
									<?php echo $_smarty_tpl->tpl_vars['block']->value['html'];?>

								</div>
							<?php }?>
						<?php } ?>
					<?php }?>
				<?php } ?>
			<?php }?>
		</li>
	<?php } ?>
</ul>
<?php }?>
<!-- /MODULE st megamenu --><?php }} ?>
