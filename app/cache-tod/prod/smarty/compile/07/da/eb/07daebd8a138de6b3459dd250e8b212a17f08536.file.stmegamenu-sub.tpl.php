<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 03:15:53
         compiled from "/var/www/html/SHN/modules/stmegamenu/views/templates/hook/stmegamenu-sub.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20798391005c31e36984de33-15441635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07daebd8a138de6b3459dd250e8b212a17f08536' => 
    array (
      0 => '/var/www/html/SHN/modules/stmegamenu/views/templates/hook/stmegamenu-sub.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20798391005c31e36984de33-15441635',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mm' => 0,
    'is_mega_menu_vertical' => 0,
    'column' => 0,
    't_width_tpl' => 0,
    'block' => 0,
    'menu_title' => 0,
    'product' => 0,
    'menu' => 0,
    'granditem' => 0,
    'brand' => 0,
    'link' => 0,
    'manufacturerSize' => 0,
    'has_children' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31e3698e2735_59448917',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31e3698e2735_59448917')) {function content_5c31e3698e2735_59448917($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?><?php if ($_smarty_tpl->tpl_vars['mm']->value['is_mega']) {?>
	<div class="<?php if (!isset($_smarty_tpl->tpl_vars['is_mega_menu_vertical']->value)) {?>stmenu_sub<?php } else { ?>stmenu_vs<?php }?> style_wide col-md-<?php echo htmlspecialchars(smarty_modifier_replace(($_smarty_tpl->tpl_vars['mm']->value['width']*10/10),'.','-'), ENT_QUOTES, 'UTF-8');?>
">
		<div class="row m_column_row">
		<?php $_smarty_tpl->tpl_vars['t_width_tpl'] = new Smarty_variable(0, null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mm']->value['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['column']->value['hide_on_mobile']==2) {?><?php continue 1?><?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['column']->value['children'])&&count($_smarty_tpl->tpl_vars['column']->value['children'])) {?>
			<?php $_smarty_tpl->tpl_vars["t_width_tpl"] = new Smarty_variable($_smarty_tpl->tpl_vars['t_width_tpl']->value+$_smarty_tpl->tpl_vars['column']->value['width'], null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['t_width_tpl']->value>$_smarty_tpl->tpl_vars['mm']->value['t_width']) {?>
				<?php $_smarty_tpl->tpl_vars["t_width_tpl"] = new Smarty_variable($_smarty_tpl->tpl_vars['column']->value['width'], null, 0);?>
				</div><div class="row m_column_row">
			<?php }?>
			<div id="st_menu_column_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['column']->value['id_st_mega_column'], ENT_QUOTES, 'UTF-8');?>
" class="col-md-<?php echo htmlspecialchars(smarty_modifier_replace(($_smarty_tpl->tpl_vars['column']->value['width']*10/10),'.','-'), ENT_QUOTES, 'UTF-8');?>
">
				<?php  $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['column']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['block']->key => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['block']->value['hide_on_mobile']==2) {?><?php continue 1?><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['block']->value['item_t']==1) {?>
						<?php if ($_smarty_tpl->tpl_vars['block']->value['subtype']==2&&isset($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
							<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
">
								<?php if ($_smarty_tpl->tpl_vars['block']->value['show_cate_img']) {?>
				                    <?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-cate-img.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('menu_cate'=>$_smarty_tpl->tpl_vars['block']->value['children'],'nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window']), 0);?>

								<?php }?>
								<ul class="mu_level_1">
									<li class="ml_level_1">
										<a id="st_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?> class="ma_level_1 ma_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a>
										<?php if (isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?>
											<ul class="mu_level_2">
											<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
											<li class="ml_level_2"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?>  class="ma_level_2 ma_item"><i class="fto-angle-right list_arrow"></i><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],30,'...'), ENT_QUOTES, 'UTF-8');?>
</a></li>
											<?php } ?>
											</ul>	
										<?php }?>
									</li>
								</ul>	
							</div>
						<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['subtype']==0&&isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?>
							<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
">
							<div class="row">
							<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['menu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['menu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['menu']->iteration++;
 $_smarty_tpl->tpl_vars['menu']->last = $_smarty_tpl->tpl_vars['menu']->iteration === $_smarty_tpl->tpl_vars['menu']->total;
?>
								<div class="col-md-<?php echo htmlspecialchars(smarty_modifier_replace(((12/$_smarty_tpl->tpl_vars['block']->value['items_md'])*10/10),'.','-'), ENT_QUOTES, 'UTF-8');?>
">
									<?php if ($_smarty_tpl->tpl_vars['block']->value['show_cate_img']) {?>
					                    <?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-cate-img.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('menu_cate'=>$_smarty_tpl->tpl_vars['menu']->value,'nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window']), 0);?>

									<?php }?>
									<ul class="mu_level_1">
										<li class="ml_level_1">
											<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?>  class="ma_level_1 ma_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
											<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['children'])&&is_array($_smarty_tpl->tpl_vars['menu']->value['children'])&&count($_smarty_tpl->tpl_vars['menu']->value['children'])) {?>
												<?php $_smarty_tpl->tpl_vars['granditem'] = new Smarty_variable(0, null, 0);?>
												<?php if (isset($_smarty_tpl->tpl_vars['block']->value['granditem'])&&$_smarty_tpl->tpl_vars['block']->value['granditem']) {?><?php $_smarty_tpl->tpl_vars['granditem'] = new Smarty_variable(1, null, 0);?><?php }?>
												<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window'],'menus'=>$_smarty_tpl->tpl_vars['menu']->value['children'],'granditem'=>$_smarty_tpl->tpl_vars['granditem']->value,'m_level'=>2), 0);?>

											<?php }?>
										</li>
									</ul>	
								</div>
								<?php if ($_smarty_tpl->tpl_vars['menu']->iteration%$_smarty_tpl->tpl_vars['block']->value['items_md']==0&&!$_smarty_tpl->tpl_vars['menu']->last) {?>
								</div><div class="row">
								<?php }?>
							<?php } ?>
							</div>
							</div>
						<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['subtype']==1||$_smarty_tpl->tpl_vars['block']->value['subtype']==3) {?>
							<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
">
								<?php if ($_smarty_tpl->tpl_vars['block']->value['show_cate_img']) {?>
				                    <?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-cate-img.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('menu_cate'=>$_smarty_tpl->tpl_vars['block']->value['children'],'nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window']), 0);?>

								<?php }?>
								<ul class="mu_level_1">
									<li class="ml_level_1">
										<a id="st_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?>  class="ma_level_1 ma_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a>
										<?php if ($_smarty_tpl->tpl_vars['block']->value['subtype']==1&&isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?>
											<?php $_smarty_tpl->tpl_vars['granditem'] = new Smarty_variable(0, null, 0);?>
											<?php if (isset($_smarty_tpl->tpl_vars['block']->value['granditem'])&&$_smarty_tpl->tpl_vars['block']->value['granditem']) {?><?php $_smarty_tpl->tpl_vars['granditem'] = new Smarty_variable(1, null, 0);?><?php }?>
											<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window'],'menus'=>$_smarty_tpl->tpl_vars['block']->value['children']['children'],'granditem'=>$_smarty_tpl->tpl_vars['granditem']->value,'m_level'=>2), 0);?>

										<?php }?>
									</li>
								</ul>	
							</div>
						<?php }?>
					<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==2&&isset($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
						<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
">
						<div class="products_sldier_swiper row">
						<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
							<div class="col-md-<?php echo htmlspecialchars(smarty_modifier_replace(((12/$_smarty_tpl->tpl_vars['block']->value['items_md'])*10/10),'.','-'), ENT_QUOTES, 'UTF-8');?>
">
								<?php echo $_smarty_tpl->getSubTemplate ("catalog/_partials/miniatures/product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

							</div>
						<?php } ?>
						</div>
						</div>
					<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==3&&isset($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
						<?php if (isset($_smarty_tpl->tpl_vars['block']->value['subtype'])&&$_smarty_tpl->tpl_vars['block']->value['subtype']) {?>
							<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
">
							<div class="row">
							<?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['brand']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['brand']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
 $_smarty_tpl->tpl_vars['brand']->iteration++;
 $_smarty_tpl->tpl_vars['brand']->last = $_smarty_tpl->tpl_vars['brand']->iteration === $_smarty_tpl->tpl_vars['brand']->total;
?>
								<div class="col-md-<?php echo htmlspecialchars(smarty_modifier_replace(((12/$_smarty_tpl->tpl_vars['block']->value['items_md'])*10/10),'.','-'), ENT_QUOTES, 'UTF-8');?>
">
									<ul class="mu_level_1">
										<li class="ml_level_1">
											<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['brand']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['brand']->value['link_rewrite']), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?>  class="advanced_ma_level_1 advanced_ma_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
										</li>
									</ul>	
								</div>
								<?php if ($_smarty_tpl->tpl_vars['brand']->iteration%$_smarty_tpl->tpl_vars['block']->value['items_md']==0&&!$_smarty_tpl->tpl_vars['brand']->last) {?>
								</div><div class="row">
								<?php }?>
							<?php } ?>
							</div>
							</div>
						<?php } else { ?>
							<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" class="row">
							<?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['brand']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['brand']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
 $_smarty_tpl->tpl_vars['brand']->iteration++;
 $_smarty_tpl->tpl_vars['brand']->last = $_smarty_tpl->tpl_vars['brand']->iteration === $_smarty_tpl->tpl_vars['brand']->total;
?>
								<div class="col-md-<?php echo htmlspecialchars(smarty_modifier_replace(((12/$_smarty_tpl->tpl_vars['block']->value['items_md'])*10/10),'.','-'), ENT_QUOTES, 'UTF-8');?>
">
									<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?>  class="st_menu_brand">
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
						<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
">
							<ul class="mu_level_1">
								<li class="ml_level_1">
									<a id="st_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php if ($_smarty_tpl->tpl_vars['block']->value['m_link']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_link'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_title'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?>  class="ma_level_1 ma_item <?php if (!$_smarty_tpl->tpl_vars['block']->value['m_link']) {?> ma_span<?php }?>"><?php if ($_smarty_tpl->tpl_vars['block']->value['icon_class']) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_name'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a>
									<?php if (isset($_smarty_tpl->tpl_vars['block']->value['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
										<ul class="mu_level_2">
										<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['menu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['menu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['menu']->iteration++;
 $_smarty_tpl->tpl_vars['menu']->last = $_smarty_tpl->tpl_vars['menu']->iteration === $_smarty_tpl->tpl_vars['menu']->total;
?>
											<?php if ($_smarty_tpl->tpl_vars['menu']->value['hide_on_mobile']==2) {?><?php continue 1?><?php }?>
											<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window'],'menus'=>$_smarty_tpl->tpl_vars['menu']->value,'m_level'=>2), 0);?>

										<?php } ?>
										</ul>
									<?php }?>
								</li>
							</ul>	
						</div>
					<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==5&&$_smarty_tpl->tpl_vars['block']->value['html']) {?>
						<div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" class="style_content">
							<?php echo $_smarty_tpl->tpl_vars['block']->value['html'];?>

						</div>
					<?php }?>
				<?php } ?>
			</div>
			<?php }?>
		<?php } ?>
		</div>
	</div>
	<?php } else { ?>
		<ul id="st_menu_multi_level_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" class="<?php if (!isset($_smarty_tpl->tpl_vars['is_mega_menu_vertical']->value)) {?>stmenu_sub<?php } else { ?>stmenu_vs<?php }?> stmenu_multi_level">
		<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mm']->value['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['column']->value['hide_on_mobile']==2) {?><?php continue 1?><?php }?><?php if (isset($_smarty_tpl->tpl_vars['column']->value['children'])&&count($_smarty_tpl->tpl_vars['column']->value['children'])) {?><?php  $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['column']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['block']->key => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['block']->value['hide_on_mobile']==2) {?><?php continue 1?><?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['item_t']==1) {?><?php if ($_smarty_tpl->tpl_vars['block']->value['subtype']==2&&isset($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])) {?><?php if (isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?><li class="ml_level_1"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?>  class="ma_level_1 ma_item"><i class="fto-angle-right list_arrow"></i><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],30,'...'), ENT_QUOTES, 'UTF-8');?>
</a></li><?php } ?><?php }?><?php } elseif ($_smarty_tpl->tpl_vars['block']->value['subtype']==0&&isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?><?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['menu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['menu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['menu']->iteration++;
 $_smarty_tpl->tpl_vars['menu']->last = $_smarty_tpl->tpl_vars['menu']->iteration === $_smarty_tpl->tpl_vars['menu']->total;
?><li class="ml_level_1"><?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['menu']->value['children'])&&is_array($_smarty_tpl->tpl_vars['menu']->value['children'])&&count($_smarty_tpl->tpl_vars['menu']->value['children'])), null, 0);?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?>  class="ma_level_1 ma_item <?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?> has_children <?php }?>"><i class="fto-angle-right list_arrow"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span><?php }?></a><?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window'],'menus'=>$_smarty_tpl->tpl_vars['menu']->value['children'],'m_level'=>2), 0);?>
<?php }?></li><?php } ?><?php } elseif ($_smarty_tpl->tpl_vars['block']->value['subtype']==1||$_smarty_tpl->tpl_vars['block']->value['subtype']==3) {?><li class="ml_level_1"><?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])), null, 0);?><a id="st_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['link'], ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?>  class="ma_level_1 ma_item <?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?> has_children <?php }?>"><i class="fto-angle-right list_arrow"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span><?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a><?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window'],'menus'=>$_smarty_tpl->tpl_vars['block']->value['children']['children'],'m_level'=>2), 0);?>
<?php }?></li><?php }?><?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==4) {?><li class="ml_level_1"><?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['block']->value['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])), null, 0);?><a id="st_ma_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" href="<?php if ($_smarty_tpl->tpl_vars['block']->value['m_link']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_link'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_title'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['new_window']) {?> target="_blank"<?php }?>  class="ma_level_1 ma_item <?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?> has_children <?php }?><?php if (!$_smarty_tpl->tpl_vars['block']->value['m_link']) {?> ma_span<?php }?>"><i class="<?php if ($_smarty_tpl->tpl_vars['block']->value['icon_class']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>fto-angle-right<?php }?> list_arrow"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_name'], ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span><?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['cate_label'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></a><?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><ul class="mu_level_2"><?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['menu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['menu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['menu']->iteration++;
 $_smarty_tpl->tpl_vars['menu']->last = $_smarty_tpl->tpl_vars['menu']->iteration === $_smarty_tpl->tpl_vars['menu']->total;
?><?php if ($_smarty_tpl->tpl_vars['menu']->value['hide_on_mobile']==2) {?><?php continue 1?><?php }?><?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'new_window'=>$_smarty_tpl->tpl_vars['block']->value['new_window'],'menus'=>$_smarty_tpl->tpl_vars['menu']->value,'m_level'=>2), 0);?>
<?php } ?></ul><?php }?></li><?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==5&&$_smarty_tpl->tpl_vars['block']->value['html']) {?><li class="ml_level_1"><div id="st_menu_block_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'], ENT_QUOTES, 'UTF-8');?>
" class="style_content"><?php echo $_smarty_tpl->tpl_vars['block']->value['html'];?>
</div></li><?php } else { ?><?php }?><?php } ?><?php }?><?php } ?>
		</ul>
	<?php }?><?php }} ?>
