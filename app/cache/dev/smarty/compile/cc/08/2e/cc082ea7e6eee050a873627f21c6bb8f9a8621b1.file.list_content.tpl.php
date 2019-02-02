<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 14:28:27
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/carriers/helpers/list/list_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5749293605c37c70b870b42-36956685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc082ea7e6eee050a873627f21c6bb8f9a8621b1' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/carriers/helpers/list/list_content.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '2553e15a08be3b1417123fc668d00d6eca094c70' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/list/list_content.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5749293605c37c70b870b42-36956685',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'position_identifier' => 0,
    'position_group_identifier' => 0,
    'identifier' => 0,
    'tr' => 0,
    'color_on_bg' => 0,
    'bulk_actions' => 0,
    'has_bulk_actions' => 0,
    'list_skip_actions' => 0,
    'list_id' => 0,
    'checked_boxes' => 0,
    'fields_display' => 0,
    'params' => 0,
    'no_link' => 0,
    'order_by' => 0,
    'order_way' => 0,
    'current_index' => 0,
    'view' => 0,
    'table' => 0,
    'page' => 0,
    'token' => 0,
    'key' => 0,
    'filters_has_value' => 0,
    'multishop_active' => 0,
    'shop_link_type' => 0,
    'has_actions' => 0,
    'actions' => 0,
    'action' => 0,
    'compiled_actions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c37c70b918cf4_07147815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c37c70b918cf4_07147815')) {function content_5c37c70b918cf4_07147815($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.counter.php';
?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tr_count', null, null); ob_start(); ?><?php echo smarty_function_counter(array('name'=>'tr_count'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<tbody>
<?php if (count($_smarty_tpl->tpl_vars['list']->value)) {?>
<?php  $_smarty_tpl->tpl_vars['tr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tr']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tr']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['tr']->key => $_smarty_tpl->tpl_vars['tr']->value) {
$_smarty_tpl->tpl_vars['tr']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['tr']->key;
 $_smarty_tpl->tpl_vars['tr']->iteration++;
?>
	<tr<?php if ($_smarty_tpl->tpl_vars['position_identifier']->value) {?> id="tr_<?php echo $_smarty_tpl->tpl_vars['position_group_identifier']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value];?>
_<?php if (isset($_smarty_tpl->tpl_vars['tr']->value['position']['position'])) {?><?php echo $_smarty_tpl->tpl_vars['tr']->value['position']['position'];?>
<?php } else { ?>0<?php }?>"<?php }?> class="<?php if (isset($_smarty_tpl->tpl_vars['tr']->value['class'])) {?><?php echo $_smarty_tpl->tpl_vars['tr']->value['class'];?>
<?php }?> <?php if ((1 & $_smarty_tpl->tpl_vars['tr']->iteration / 1)) {?>odd<?php }?>"<?php if (isset($_smarty_tpl->tpl_vars['tr']->value['color'])&&$_smarty_tpl->tpl_vars['color_on_bg']->value) {?> style="background-color: <?php echo $_smarty_tpl->tpl_vars['tr']->value['color'];?>
"<?php }?> >
		<?php if ($_smarty_tpl->tpl_vars['bulk_actions']->value&&$_smarty_tpl->tpl_vars['has_bulk_actions']->value) {?>
			<td class="row-selector text-center">
				<?php if (isset($_smarty_tpl->tpl_vars['list_skip_actions']->value['delete'])) {?>
					<?php if (!in_array($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value],$_smarty_tpl->tpl_vars['list_skip_actions']->value['delete'])) {?>
						<input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['list_id']->value;?>
Box[]" value="<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value];?>
"<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value];?>
<?php $_tmp2=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['checked_boxes']->value)&&is_array($_smarty_tpl->tpl_vars['checked_boxes']->value)&&in_array($_tmp2,$_smarty_tpl->tpl_vars['checked_boxes']->value)) {?> checked="checked"<?php }?> class="noborder" />
					<?php }?>
				<?php } else { ?>
					<input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['list_id']->value;?>
Box[]" value="<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value];?>
"<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value];?>
<?php $_tmp3=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['checked_boxes']->value)&&is_array($_smarty_tpl->tpl_vars['checked_boxes']->value)&&in_array($_tmp3,$_smarty_tpl->tpl_vars['checked_boxes']->value)) {?> checked="checked"<?php }?> class="noborder" />
				<?php }?>
			</td>
		<?php }?>
		<?php  $_smarty_tpl->tpl_vars['params'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['params']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields_display']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['params']->key => $_smarty_tpl->tpl_vars['params']->value) {
$_smarty_tpl->tpl_vars['params']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['params']->key;
?>
			
				<td
					<?php if (isset($_smarty_tpl->tpl_vars['params']->value['position'])) {?>
						id="td_<?php if (!empty($_smarty_tpl->tpl_vars['id_category']->value)) {?><?php echo $_smarty_tpl->tpl_vars['id_category']->value;?>
<?php } else { ?>0<?php }?>_<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value];?>
"
					<?php }?>
					class="<?php if (!$_smarty_tpl->tpl_vars['no_link']->value) {?>pointer<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['params']->value['position'])&&$_smarty_tpl->tpl_vars['order_by']->value=='position'&&$_smarty_tpl->tpl_vars['order_way']->value!='DESC') {?> dragHandle<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['params']->value['align'])) {?> <?php echo $_smarty_tpl->tpl_vars['params']->value['align'];?>
<?php }?>"
					<?php if ((!isset($_smarty_tpl->tpl_vars['params']->value['position'])&&!$_smarty_tpl->tpl_vars['no_link']->value&&!isset($_smarty_tpl->tpl_vars['params']->value['remove_onclick']))) {?>
						onclick="document.location = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCarrierWizard',true),'html','UTF-8');?>
&amp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8');?>
=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8');?>
'">
					<?php } else { ?>
						>
					<?php }?>
			
			
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['prefix'])) {?><?php echo $_smarty_tpl->tpl_vars['params']->value['prefix'];?>
<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_success'])&&$_smarty_tpl->tpl_vars['params']->value['badge_success']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_success'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_success']==$_smarty_tpl->tpl_vars['params']->value['badge_success']) {?><span class="badge badge-success"><?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_warning'])&&$_smarty_tpl->tpl_vars['params']->value['badge_warning']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_warning'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_warning']==$_smarty_tpl->tpl_vars['params']->value['badge_warning']) {?><span class="badge badge-warning"><?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_danger'])&&$_smarty_tpl->tpl_vars['params']->value['badge_danger']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_danger'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_danger']==$_smarty_tpl->tpl_vars['params']->value['badge_danger']) {?><span class="badge badge-danger"><?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['color'])&&isset($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['params']->value['color']])) {?>
					<span class="label color_field" style="background-color:<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['params']->value['color']];?>
;color:<?php if (Tools::getBrightness($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['params']->value['color']])<128) {?>white<?php } else { ?>#383838<?php }?>">
				<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
					<?php if (isset($_smarty_tpl->tpl_vars['params']->value['active'])) {?>
						<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value];?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['callback'])) {?>
						<?php if (isset($_smarty_tpl->tpl_vars['params']->value['maxlength'])&&Tools::strlen($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value])>$_smarty_tpl->tpl_vars['params']->value['maxlength']) {?>
							<span title="<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value];?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],$_smarty_tpl->tpl_vars['params']->value['maxlength'],'...');?>
</span>
						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value];?>

						<?php }?>
					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['activeVisu'])) {?>
						<?php if ($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
							<i class="icon-check-ok"></i> <?php echo smartyTranslate(array('s'=>'Enabled','d'=>'Admin.Global'),$_smarty_tpl);?>

						<?php } else { ?>
							<i class="icon-remove"></i> <?php echo smartyTranslate(array('s'=>'Disabled','d'=>'Admin.Global'),$_smarty_tpl);?>

						<?php }?>
					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['position'])) {?>
						<?php if (!$_smarty_tpl->tpl_vars['filters_has_value']->value&&$_smarty_tpl->tpl_vars['order_by']->value=='position'&&$_smarty_tpl->tpl_vars['order_way']->value!='DESC') {?>
							<div class="dragGroup">
								<div class="positions">
									<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['position']+1;?>

								</div>
							</div>
						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['position']+1;?>

						<?php }?>
					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['image'])) {?>
						<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value];?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['icon'])) {?>
						<?php if (is_array($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
							<?php if (isset($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['class'])) {?>
								<i class="<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['class'];?>
"></i>
							<?php } else { ?>
								<img src="../img/admin/<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['src'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['alt'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['alt'];?>
" />
							<?php }?>
						<?php }?>
					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='price') {?>
						<?php if (isset($_smarty_tpl->tpl_vars['tr']->value['id_currency'])) {?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'currency'=>$_smarty_tpl->tpl_vars['tr']->value['id_currency']),$_smarty_tpl);?>

						<?php } else { ?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]),$_smarty_tpl);?>

						<?php }?>
					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['float'])) {?>
						<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value];?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='date') {?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'full'=>0),$_smarty_tpl);?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='datetime') {?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'full'=>1),$_smarty_tpl);?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='decimal') {?>
						<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]);?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='percent') {?>
						<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value];?>
 <?php echo smartyTranslate(array('s'=>'%'),$_smarty_tpl);?>

					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='bool') {?>
            <?php if ($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]==1) {?>
              <?php echo smartyTranslate(array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl);?>

            <?php } elseif ($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]==0&&$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]!='') {?>
              <?php echo smartyTranslate(array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl);?>

            <?php }?>
					
					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='editable'&&isset($_smarty_tpl->tpl_vars['tr']->value['id'])) {?>
						<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['tr']->value['id'];?>
" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'html','UTF-8');?>
" class="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" />
					<?php } elseif ($_smarty_tpl->tpl_vars['key']->value=='color') {?>
						<?php if (!is_array($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
						<div style="background-color: <?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value];?>
;" class="attributes-color-container"></div>
						<?php } else { ?> 
						<img src="<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['texture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['tr']->value['name'];?>
" class="attributes-color-container" />
						<?php }?>
					<?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['maxlength'])&&Tools::strlen($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value])>$_smarty_tpl->tpl_vars['params']->value['maxlength']) {?>
						<span title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'html','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],$_smarty_tpl->tpl_vars['params']->value['maxlength'],'...'),'html','UTF-8');?>
</span>
					<?php } else { ?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'html','UTF-8');?>

					<?php }?>
				<?php } else { ?>
					--
				<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['suffix'])) {?><?php echo $_smarty_tpl->tpl_vars['params']->value['suffix'];?>
<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['color'])&&isset($_smarty_tpl->tpl_vars['tr']->value['color'])) {?>
					</span>
				<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_danger'])&&$_smarty_tpl->tpl_vars['params']->value['badge_danger']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_danger'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_danger']==$_smarty_tpl->tpl_vars['params']->value['badge_danger']) {?></span><?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_warning'])&&$_smarty_tpl->tpl_vars['params']->value['badge_warning']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_warning'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_warning']==$_smarty_tpl->tpl_vars['params']->value['badge_warning']) {?></span><?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_success'])&&$_smarty_tpl->tpl_vars['params']->value['badge_success']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_success'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_success']==$_smarty_tpl->tpl_vars['params']->value['badge_success']) {?></span><?php }?>
			
			
				</td>
			
		<?php } ?>

	<?php if ($_smarty_tpl->tpl_vars['multishop_active']->value&&$_smarty_tpl->tpl_vars['shop_link_type']->value) {?>
		<td title="<?php echo $_smarty_tpl->tpl_vars['tr']->value['shop_name'];?>
">
			<?php if (isset($_smarty_tpl->tpl_vars['tr']->value['shop_short_name'])) {?>
				<?php echo $_smarty_tpl->tpl_vars['tr']->value['shop_short_name'];?>

			<?php } else { ?>
				<?php echo $_smarty_tpl->tpl_vars['tr']->value['shop_name'];?>

			<?php }?>
		</td>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['has_actions']->value) {?>
		<td class="text-right">
			<?php $_smarty_tpl->tpl_vars['compiled_actions'] = new Smarty_variable(array(), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['action']->key;
?>
				<?php if (isset($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['action']->value])) {?>
					<?php if ($_smarty_tpl->tpl_vars['key']->value==0) {?>
						<?php $_smarty_tpl->tpl_vars['action'] = new Smarty_variable($_smarty_tpl->tpl_vars['action']->value, null, 0);?>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['action']->value=='delete'&&count($_smarty_tpl->tpl_vars['actions']->value)>2) {?>
						<?php $_smarty_tpl->createLocalArrayVariable('compiled_actions', null, 0);
$_smarty_tpl->tpl_vars['compiled_actions']->value[] = 'divider';?>
					<?php }?>
					<?php $_smarty_tpl->createLocalArrayVariable('compiled_actions', null, 0);
$_smarty_tpl->tpl_vars['compiled_actions']->value[] = $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['action']->value];?>
				<?php }?>
			<?php } ?>
			<?php if (count($_smarty_tpl->tpl_vars['compiled_actions']->value)>0) {?>
				<?php if (count($_smarty_tpl->tpl_vars['compiled_actions']->value)>1) {?><div class="btn-group-action"><?php }?>
				<div class="btn-group pull-right">
					<?php echo $_smarty_tpl->tpl_vars['compiled_actions']->value[0];?>

					<?php if (count($_smarty_tpl->tpl_vars['compiled_actions']->value)>1) {?>
					<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<i class="icon-caret-down"></i>&nbsp;
					</button>
						<ul class="dropdown-menu">
						<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['compiled_actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['action']->key;
?>
							<?php if ($_smarty_tpl->tpl_vars['key']->value!=0) {?>
							<li<?php if ($_smarty_tpl->tpl_vars['action']->value=='divider'&&count($_smarty_tpl->tpl_vars['compiled_actions']->value)>3) {?> class="divider"<?php }?>>
								<?php if ($_smarty_tpl->tpl_vars['action']->value!='divider') {?><?php echo $_smarty_tpl->tpl_vars['action']->value;?>
<?php }?>
							</li>
							<?php }?>
						<?php } ?>
						</ul>
					<?php }?>
				</div>
				<?php if (count($_smarty_tpl->tpl_vars['compiled_actions']->value)>1) {?></div><?php }?>
			<?php }?>
		</td>
	<?php }?>
	</tr>
<?php } ?>
<?php } else { ?>
	<tr>
		<td class="list-empty" colspan="<?php echo count($_smarty_tpl->tpl_vars['fields_display']->value)+1;?>
">
			<div class="list-empty-msg">
				<i class="icon-warning-sign list-empty-icon"></i>
				<?php echo smartyTranslate(array('s'=>'No records found'),$_smarty_tpl);?>

			</div>
		</td>
	</tr>
<?php }?>
</tbody>
<?php }} ?>
