<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 11:48:39
         compiled from "/var/www/html/SHN/modules/dgridproducts/views/templates/admin/product_grid/helpers/list/list_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3702213205c34fe9701fea3-36550346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08e6aafe04da56817d0f4f00faf23f61537fd683' => 
    array (
      0 => '/var/www/html/SHN/modules/dgridproducts/views/templates/admin/product_grid/helpers/list/list_content.tpl',
      1 => 1512598745,
      2 => 'file',
    ),
    '2553e15a08be3b1417123fc668d00d6eca094c70' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/list/list_content.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3702213205c34fe9701fea3-36550346',
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
  'unifunc' => 'content_5c34fe97167966_48170375',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34fe97167966_48170375')) {function content_5c34fe97167966_48170375($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.counter.php';
if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
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
<?php $_tmp1=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['checked_boxes']->value)&&is_array($_smarty_tpl->tpl_vars['checked_boxes']->value)&&in_array($_tmp1,$_smarty_tpl->tpl_vars['checked_boxes']->value)) {?> checked="checked"<?php }?> class="noborder" />
					<?php }?>
				<?php } else { ?>
					<input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['list_id']->value;?>
Box[]" value="<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value];?>
"<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value];?>
<?php $_tmp2=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['checked_boxes']->value)&&is_array($_smarty_tpl->tpl_vars['checked_boxes']->value)&&in_array($_tmp2,$_smarty_tpl->tpl_vars['checked_boxes']->value)) {?> checked="checked"<?php }?> class="noborder" />
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
						id="td_<?php if (!empty($_smarty_tpl->tpl_vars['position_group_identifier']->value)) {?><?php echo $_smarty_tpl->tpl_vars['position_group_identifier']->value;?>
<?php } else { ?>0<?php }?>_<?php echo $_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value];?>
<?php if (Smarty::$_smarty_vars['capture']['tr_count']>1) {?>_<?php echo intval((Smarty::$_smarty_vars['capture']['tr_count']-1));?>
<?php }?>"
					<?php }?>
					class="<?php if (!$_smarty_tpl->tpl_vars['no_link']->value) {?>pointer<?php }?><?php if (isset($_smarty_tpl->tpl_vars['params']->value['position'])&&$_smarty_tpl->tpl_vars['order_by']->value=='position'&&$_smarty_tpl->tpl_vars['order_way']->value!='DESC') {?> dragHandle<?php }?><?php if (isset($_smarty_tpl->tpl_vars['params']->value['class'])) {?> <?php echo $_smarty_tpl->tpl_vars['params']->value['class'];?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['params']->value['align'])) {?> <?php echo $_smarty_tpl->tpl_vars['params']->value['align'];?>
<?php }?>"
					<?php if ((!isset($_smarty_tpl->tpl_vars['params']->value['position'])&&!$_smarty_tpl->tpl_vars['no_link']->value&&!isset($_smarty_tpl->tpl_vars['params']->value['remove_onclick']))) {?>
						onclick="document.location = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['current_index']->value,'html','UTF-8');?>
&amp;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['identifier']->value,'html','UTF-8');?>
=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['identifier']->value],'html','UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['view']->value) {?>&amp;view<?php } else { ?>&amp;update<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['table']->value,'html','UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['page']->value>1) {?>&amp;page=<?php echo intval($_smarty_tpl->tpl_vars['page']->value);?>
<?php }?>&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['token']->value,'html','UTF-8');?>
'">
					<?php } else { ?>
					>
				<?php }?>
			
			
    <?php if ((isset($_smarty_tpl->tpl_vars['params']->value['table'])&&$_smarty_tpl->tpl_vars['params']->value['table']=='stock_available'&&$_smarty_tpl->tpl_vars['tr']->value['depends_on_stock']==1&&Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))) {?>
        <a data-id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['id'],'quotes','UTF-8');?>
" class="button btn btn-default viewAdvancedStockManagement" href="#" title="<?php echo smartyTranslate(array('s'=>'Advanced stock management','mod'=>'dgridproducts'),$_smarty_tpl);?>
">
            <i class="icon-archive"></i>(<?php echo intval($_smarty_tpl->tpl_vars['tr']->value['sav_quantity']);?>
)
        </a>
    <?php } else { ?>
        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['help'])) {?>
            <div class="help_message"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['help'],'quotes','UTF-8');?>
</div>
        <?php }?>
        <div
                class="<?php if (isset($_smarty_tpl->tpl_vars['params']->value['image'])) {?>edit_image <?php }?><?php if (isset($_smarty_tpl->tpl_vars['params']->value['need_edit'])&&$_smarty_tpl->tpl_vars['params']->value['need_edit']) {?> edit_field <?php if ($_smarty_tpl->tpl_vars['params']->value['validate']=='category') {?>edit_category<?php }?> <?php if ($_smarty_tpl->tpl_vars['ps_v']->value<1.6) {?>v15<?php }?>
                <?php }?>"
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['need_edit'])&&$_smarty_tpl->tpl_vars['params']->value['need_edit']&&$_smarty_tpl->tpl_vars['params']->value['validate']=='category') {?>
                    data-id="<?php echo intval($_smarty_tpl->tpl_vars['tr']->value['id']);?>
"
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['image'])) {?>
                    data-id="<?php echo intval($_smarty_tpl->tpl_vars['tr']->value['id']);?>
"
                <?php }?>
                >
            <?php $_smarty_tpl->tpl_vars["none_close_td"] = new Smarty_variable(true, null, 0);?>
            <?php if (!in_array($_smarty_tpl->tpl_vars['params']->value['type'],array('combinations','features','meta_tags','additional_setting_product','specific_price','short_description','description'))) {?>
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['image'])&&empty($_smarty_tpl->tpl_vars['tr']->value['image'])) {?>
                    <i class="icon-picture"></i>
                <?php }?>
                
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['prefix'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['prefix'],'quotes','UTF-8');?>
<?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_success'])&&$_smarty_tpl->tpl_vars['params']->value['badge_success']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_success'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_success']==$_smarty_tpl->tpl_vars['params']->value['badge_success']) {?><span class="badge badge-success"><?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_warning'])&&$_smarty_tpl->tpl_vars['params']->value['badge_warning']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_warning'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_warning']==$_smarty_tpl->tpl_vars['params']->value['badge_warning']) {?><span class="badge badge-warning"><?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_danger'])&&$_smarty_tpl->tpl_vars['params']->value['badge_danger']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_danger'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_danger']==$_smarty_tpl->tpl_vars['params']->value['badge_danger']) {?><span class="badge badge-danger"><?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['color'])&&isset($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['params']->value['color']])) {?>
                    <span class="label color_field" style="background-color:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['params']->value['color']],'quotes','UTF-8');?>
;color:<?php if (Tools::getBrightness($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['params']->value['color']])<128) {?>white<?php } else { ?>#383838<?php }?>">
                <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
                        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['active'])) {?>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'quotes','UTF-8');?>

                        <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['activeVisu'])) {?>
                            <?php if ($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]) {?>
                                <i class="icon-check-ok"></i> <?php echo smartyTranslate(array('s'=>'Enabled','mod'=>'dgridproducts'),$_smarty_tpl);?>

                                <?php } else { ?>
                                    <i class="icon-remove"></i> <?php echo smartyTranslate(array('s'=>'Disabled','mod'=>'dgridproducts'),$_smarty_tpl);?>

                            <?php }?>

                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['position'])) {?>
                                <?php if ($_smarty_tpl->tpl_vars['order_by']->value=='position'&&$_smarty_tpl->tpl_vars['order_way']->value!='DESC') {?>
                            <div class="dragGroup">
                                <div class="positions">
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['position'],'quotes','UTF-8');?>

                                </div>
                            </div>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['position']+1),'quotes','UTF-8');?>

                        <?php }?>
                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['image'])) {?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'quotes','UTF-8');?>

                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['icon'])) {?>
                                <?php if (is_array($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
                            <?php if (isset($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['class'])) {?>
                                <i class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['class'],'quotes','UTF-8');?>
"></i>
                                    <?php } else { ?>
                                        <img src="../img/admin/<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['src'],'quotes','UTF-8');?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['alt'],'quotes','UTF-8');?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['alt'],'quotes','UTF-8');?>
" />
                            <?php }?>
                                <?php } else { ?>
                                    <i class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'quotes','UTF-8');?>
"></i>
                        <?php }?>
                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='price') {?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]),$_smarty_tpl);?>

                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['float'])) {?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'quotes','UTF-8');?>

                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='date') {?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'full'=>0),$_smarty_tpl);?>

                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='datetime') {?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'full'=>1),$_smarty_tpl);?>

                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='decimal') {?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(sprintf("%.2f",$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]),'quotes','UTF-8');?>

                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='percent') {?>
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'quotes','UTF-8');?>
 <?php echo smartyTranslate(array('s'=>'%','mod'=>'dgridproducts'),$_smarty_tpl);?>

                            
                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['type'])&&$_smarty_tpl->tpl_vars['params']->value['type']=='editable'&&isset($_smarty_tpl->tpl_vars['tr']->value['id'])) {?>
                                <input type="text" name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['key']->value,'quotes','UTF-8');?>
_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['id'],'quotes','UTF-8');?>
" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'html','UTF-8');?>
" class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['key']->value,'quotes','UTF-8');?>
" />
                            <?php } elseif (isset($_smarty_tpl->tpl_vars['params']->value['callback'])) {?>
                                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['maxlength'])&&Tools::strlen($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value])>$_smarty_tpl->tpl_vars['params']->value['maxlength']) {?>
                            <span title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'quotes','UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],$_smarty_tpl->tpl_vars['params']->value['maxlength'],'...'),'quotes','UTF-8');?>
</span>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'quotes','UTF-8');?>

                        <?php }?>
                            <?php } elseif ($_smarty_tpl->tpl_vars['key']->value=='color') {?>
                                <?php if (!is_array($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
                            <div style="background-color: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'quotes','UTF-8');?>
;" class="attributes-color-container"></div>
                                <?php } else { ?> 
                                <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]['texture'],'quotes','UTF-8');?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['name'],'quotes','UTF-8');?>
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
                    <?php if (isset($_smarty_tpl->tpl_vars['params']->value['suffix'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['suffix'],'quotes','UTF-8');?>
<?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['color'])&&isset($_smarty_tpl->tpl_vars['tr']->value['color'])) {?>
                    </span>
                <?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_danger'])&&$_smarty_tpl->tpl_vars['params']->value['badge_danger']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_danger'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_danger']==$_smarty_tpl->tpl_vars['params']->value['badge_danger']) {?></span><?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_warning'])&&$_smarty_tpl->tpl_vars['params']->value['badge_warning']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_warning'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_warning']==$_smarty_tpl->tpl_vars['params']->value['badge_warning']) {?></span><?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['badge_success'])&&$_smarty_tpl->tpl_vars['params']->value['badge_success']&&isset($_smarty_tpl->tpl_vars['tr']->value['badge_success'])&&$_smarty_tpl->tpl_vars['tr']->value['badge_success']==$_smarty_tpl->tpl_vars['params']->value['badge_success']) {?></span><?php }?>
                
            <?php }?>
        </div>
        <?php if (isset($_smarty_tpl->tpl_vars['params']->value['need_edit'])&&$_smarty_tpl->tpl_vars['params']->value['need_edit']&&($_smarty_tpl->tpl_vars['params']->value['table']!='stock_available'||$_smarty_tpl->tpl_vars['tr']->value['depends_on_stock']!=1||!Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))) {?>
            <?php if (!$_smarty_tpl->tpl_vars['params']->value['lang']) {?>
                    <div class="form_edit_field<?php if ($_smarty_tpl->tpl_vars['ps_v']->value<1.6) {?> v15<?php }?>">
                        <textarea
                                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['maxlength'])) {?>maxlength="<?php echo intval($_smarty_tpl->tpl_vars['params']->value['maxlength']);?>
"<?php }?>
                                data-event-save="1"
                                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['shop'])&&$_smarty_tpl->tpl_vars['params']->value['shop']&&$_smarty_tpl->tpl_vars['shop_active']->value) {?>data-shop="true"<?php }?>
                                data-criterion="id_product"
                                data-validate="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['validate'],'quotes','UTF-8');?>
"
                                data-field-id="<?php echo intval($_smarty_tpl->tpl_vars['tr']->value['id']);?>
"
                                data-field-table="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['table'],'quotes','UTF-8');?>
"
                                data-field-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['field'],'quotes','UTF-8');?>
"
                                data-field-lang="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['lang'],'quotes','UTF-8');?>
"
                                <?php if (isset($_smarty_tpl->tpl_vars['tr']->value['rate'])&&in_array($_smarty_tpl->tpl_vars['params']->value['field'],array('price','price_final'))) {?>data-rate="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['rate'],'quotes','UTF-8');?>
"<?php }?>
                                class="type_<?php if (isset($_smarty_tpl->tpl_vars['params']->value['validate'])&&$_smarty_tpl->tpl_vars['params']->value['validate']) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['validate'],'quotes','UTF-8');?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['type'],'quotes','UTF-8');?>
<?php }?>"><?php if (isset($_smarty_tpl->tpl_vars['tr']->value[((string)$_smarty_tpl->tpl_vars['key']->value)."_no_format"])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[((string)$_smarty_tpl->tpl_vars['key']->value)."_no_format"],'quotes','UTF-8');?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value])&&$_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value]) {?><?php if ($_smarty_tpl->tpl_vars['params']->value['validate']=='price') {?><?php echo floatval(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],' ',''),',','.'));?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value[$_smarty_tpl->tpl_vars['key']->value],'quotes','UTF-8');?>
<?php }?><?php }?><?php }?></textarea>

                    </div>
            <?php } else { ?>
                <div class="form_edit_field<?php if ($_smarty_tpl->tpl_vars['ps_v']->value<1.6) {?> v15<?php }?>">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['kItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tr']->value[((string)$_smarty_tpl->tpl_vars['key']->value)."_lang"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['kItem']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                    <div class="lang_<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['kItem']->value,'quotes','UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['kItem']->value!=$_smarty_tpl->tpl_vars['default_lang']->value->id) {?>style="display: none;" <?php }?>>
                        <textarea
                                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['maxlength'])) {?>maxlength="<?php echo intval($_smarty_tpl->tpl_vars['params']->value['maxlength']);?>
"<?php }?>
                                data-event-save="1"
                                <?php if (isset($_smarty_tpl->tpl_vars['params']->value['shop'])&&$_smarty_tpl->tpl_vars['params']->value['shop']&&$_smarty_tpl->tpl_vars['shop_active']->value) {?>data-shop="true"<?php }?>
                                data-criterion="id_product"
                                data-field-id="<?php echo intval($_smarty_tpl->tpl_vars['tr']->value['id']);?>
"
                                data-field-table="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['table'],'quotes','UTF-8');?>
"
                                data-field-name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['field'],'quotes','UTF-8');?>
"
                                data-field-lang="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['lang'],'quotes','UTF-8');?>
"
                                data-field-id-lang="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['kItem']->value,'quotes','UTF-8');?>
"
                                class="type_<?php if (isset($_smarty_tpl->tpl_vars['params']->value['validate'])&&$_smarty_tpl->tpl_vars['params']->value['validate']) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['validate'],'quotes','UTF-8');?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['params']->value['type'],'quotes','UTF-8');?>
<?php }?>"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['item']->value,'quotes','UTF-8');?>
</textarea>
                    </div>
                <?php } ?>
                    <div class="btn_lang">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['default_lang']->value->iso_code,'quotes','UTF-8');?>

                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>
                                <li>
                                    <a data-lang-iso="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['lang']->value['iso_code'],'quotes','UTF-8');?>
" onclick="changeLang(this, <?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
); return false;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['lang']->value['name'],'quotes','UTF-8');?>
</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            <?php }?>
        <?php } else { ?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['type']=='combinations') {?>
                <a data-id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['id'],'quotes','UTF-8');?>
" class="button btn btn-default viewCombinations" title="<?php echo smartyTranslate(array('s'=>'Combinations','mod'=>'dgridproducts'),$_smarty_tpl);?>
" href="#"><i class="icon-list"></i></a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['type']=='features') {?>
                <a data-id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['id'],'quotes','UTF-8');?>
" class="button btn btn-default viewFeatures" href="#"><?php echo smartyTranslate(array('s'=>'Fe-s','mod'=>'dgridproducts'),$_smarty_tpl);?>
</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['type']=='meta_tags') {?>
                <a data-id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['id'],'quotes','UTF-8');?>
" class="button btn btn-default viewMetaTags" href="#"><?php echo smartyTranslate(array('s'=>'Meta','mod'=>'dgridproducts'),$_smarty_tpl);?>
</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['type']=='additional_setting_product') {?>
                <a data-id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['id'],'quotes','UTF-8');?>
" class="button btn btn-default viewAdditionalSettingProduct" href="#"><?php echo smartyTranslate(array('s'=>'More','mod'=>'dgridproducts'),$_smarty_tpl);?>
</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['type']=='specific_price') {?>
                <a data-id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['id'],'quotes','UTF-8');?>
" class="button btn btn-default viewSpecificPrices <?php if ($_smarty_tpl->tpl_vars['tr']->value['has_specific_price']) {?>has_specific_price<?php }?> <?php if ($_smarty_tpl->tpl_vars['tr']->value['has_group_specific_price']) {?>has_group_specific_price<?php }?>" href="#" title="<?php echo smartyTranslate(array('s'=>'Specific prices','mod'=>'dgridproducts'),$_smarty_tpl);?>
">%<?php if ($_smarty_tpl->tpl_vars['tr']->value['has_specific_price']||$_smarty_tpl->tpl_vars['tr']->value['has_group_specific_price']) {?><?php echo intval($_smarty_tpl->tpl_vars['tr']->value['count_specific_price']);?>
<?php }?></a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['type']=='short_description') {?>
                <div class="cell_description">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['tr']->value['description_short']),$_smarty_tpl->tpl_vars['lenght_short_desc']->value,'');?>
...
                </div>
                <a data-id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['id'],'quotes','UTF-8');?>
" data-short="1" class="button btn btn-default viewDescription" href="#" title="<?php echo smartyTranslate(array('s'=>'Short description','mod'=>'dgridproducts'),$_smarty_tpl);?>
">Aa</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['params']->value['type']=='description') {?>
                <div class="cell_description">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['tr']->value['description']),$_smarty_tpl->tpl_vars['lenght_desc']->value,'');?>
...
                </div>
                <a data-id="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tr']->value['id'],'quotes','UTF-8');?>
" data-short="0" class="button btn btn-default viewDescription" href="#" title="<?php echo smartyTranslate(array('s'=>'Description','mod'=>'dgridproducts'),$_smarty_tpl);?>
">Aa</a>
            <?php }?>
        <?php }?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['ps_v']->value<1.6) {?></td><?php }?>

			
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
