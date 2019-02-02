<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:04:14
         compiled from "modules/amazzingfilter/views/templates/hook/amazzingfilter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19467234215c319a5e0a6f15-32500616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33b60419db9a1b93edad2b77efdeb329d2eaf0ab' => 
    array (
      0 => 'modules/amazzingfilter/views/templates/hook/amazzingfilter.tpl',
      1 => 1513425263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19467234215c319a5e0a6f15-32500616',
  'function' => 
  array (
    'renderBoxes' => 
    array (
      'parameter' => 
      array (
        'type' => 'checkbox',
        'values' => 
        array (
        ),
        'foldered' => false,
        'root' => 1,
      ),
      'compiled' => '',
    ),
    'renderOptions' => 
    array (
      'parameter' => 
      array (
        'values' => 
        array (
        ),
        'nesting_prefix' => '',
      ),
      'compiled' => '',
    ),
    'renderAvailableOptions' => 
    array (
      'parameter' => 
      array (
        'values' => 
        array (
        ),
        'nesting_prefix' => '',
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'values' => 0,
    'root' => 0,
    'value' => 0,
    't' => 0,
    'v' => 0,
    'filter' => 0,
    'k' => 0,
    'id' => 0,
    'count_data' => 0,
    'check_for_children' => 0,
    'applied_customer_filters' => 0,
    'children' => 0,
    'count' => 0,
    'is_customer_filter' => 0,
    'type' => 0,
    'af_classes' => 0,
    'hidden_inputs' => 0,
    'foldered' => 0,
    'nesting_prefix' => 0,
    'is_compact' => 0,
    'hook_name' => 0,
    'horizontal_layout' => 0,
    'filters' => 0,
    'current_controller' => 0,
    'name' => 0,
    'customer_filter_id' => 0,
    'customer_filter_name' => 0,
    'selector_id' => 0,
    'numeric_slider_values' => 0,
    'available_options' => 0,
    'no_layout' => 0,
    'view_products_btn' => 0,
    'my_filters_link' => 0,
    'total_products' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319a5e145bf8_41352852',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319a5e145bf8_41352852')) {function content_5c319a5e145bf8_41352852($_smarty_tpl) {?>


<?php if (!function_exists('smarty_template_function_renderBoxes')) {
    function smarty_template_function_renderBoxes($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['renderBoxes']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
	<?php if (count($_smarty_tpl->tpl_vars['values']->value)) {?>
	<ul class="<?php if (!$_smarty_tpl->tpl_vars['root']->value) {?>child-categories<?php }?>">
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['values']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars['v'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value['id'], null, 0);?>
		<?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable((($_smarty_tpl->tpl_vars['t']->value).('-')).($_smarty_tpl->tpl_vars['v']->value), null, 0);?>
		<?php if (!empty($_smarty_tpl->tpl_vars['filter']->value['special'])) {?><?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value, null, 0);?><?php }?>
		<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(0, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['children'] = new Smarty_variable(array(), null, 0);?>
		<?php if (!empty($_smarty_tpl->tpl_vars['count_data']->value[$_smarty_tpl->tpl_vars['id']->value])) {?><?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_data']->value[$_smarty_tpl->tpl_vars['id']->value], null, 0);?><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['check_for_children']->value&&!empty($_smarty_tpl->tpl_vars['filter']->value['values'][$_smarty_tpl->tpl_vars['v']->value])) {?><?php $_smarty_tpl->tpl_vars['children'] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['values'][$_smarty_tpl->tpl_vars['v']->value], null, 0);?><?php }?>
		<?php $_smarty_tpl->tpl_vars['is_customer_filter'] = new Smarty_variable(!empty($_smarty_tpl->tpl_vars['applied_customer_filters']->value[$_smarty_tpl->tpl_vars['k']->value][$_smarty_tpl->tpl_vars['v']->value]), null, 0);?>
		<li class="item-<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['value']->value['class'])) {?> <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['class'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['value']->value['selected'])) {?> active<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['children']->value)) {?> af-parent-category<?php }?><?php if (!$_smarty_tpl->tpl_vars['count']->value) {?> no-matches<?php }?><?php if ($_smarty_tpl->tpl_vars['is_customer_filter']->value) {?> has-customer-filter<?php }?>">
			<label for="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"<?php if (isset($_smarty_tpl->tpl_vars['value']->value['class'])&&$_smarty_tpl->tpl_vars['value']->value['class']=='color_attribute') {?> title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['value']->value['style'])) {?> style="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['style'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" <?php }?><?php if ($_smarty_tpl->tpl_vars['is_customer_filter']->value) {?>class="customer-filter-label" data-id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
				<?php if (!$_smarty_tpl->tpl_vars['is_customer_filter']->value) {?>
					<input type="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['type']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="af <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['type']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['submit_name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['v']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" data-url="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['link'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"<?php if (!empty($_smarty_tpl->tpl_vars['value']->value['selected'])) {?> checked<?php }?>>
				<?php } else { ?>
					<a href="#" class="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['af_classes']->value['icon-lock'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"></a><input type="hidden" id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="af <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['type']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 customer-filter" name="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['submit_name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['v']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" data-name="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['submit_name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" data-url="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['link'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
				<?php }?>
				<span class="name"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span>
				<?php if ($_smarty_tpl->tpl_vars['hidden_inputs']->value['count_data']) {?><span class="count"><?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['count']->value), ENT_QUOTES, 'UTF-8');?>
</span><?php }?>
				<?php if (!empty($_smarty_tpl->tpl_vars['children']->value)&&$_smarty_tpl->tpl_vars['foldered']->value) {?><a href="#" class="af-toggle-child"><span class="hidden-on-open">+</span><span class="visible-on-open">-</span></a><?php }?>
			</label>
			<?php if (!empty($_smarty_tpl->tpl_vars['children']->value)) {?>
				<?php smarty_template_function_renderBoxes($_smarty_tpl,array('type'=>$_smarty_tpl->tpl_vars['type']->value,'values'=>$_smarty_tpl->tpl_vars['children']->value,'foldered'=>$_smarty_tpl->tpl_vars['foldered']->value,'root'=>0));?>

			<?php }?>

		</li>
	<?php } ?>
	</ul>
	<?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if (!function_exists('smarty_template_function_renderOptions')) {
    function smarty_template_function_renderOptions($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['renderOptions']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['values']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars['v'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value['id'], null, 0);?>
		<?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable((($_smarty_tpl->tpl_vars['t']->value).('-')).($_smarty_tpl->tpl_vars['v']->value), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable(0, null, 0);?>
		<?php if (!empty($_smarty_tpl->tpl_vars['count_data']->value[$_smarty_tpl->tpl_vars['id']->value])) {?><?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_data']->value[$_smarty_tpl->tpl_vars['id']->value], null, 0);?><?php }?>
		<?php $_smarty_tpl->tpl_vars['is_customer_filter'] = new Smarty_variable(!empty($_smarty_tpl->tpl_vars['applied_customer_filters']->value[$_smarty_tpl->tpl_vars['k']->value][$_smarty_tpl->tpl_vars['v']->value]), null, 0);?>
		<?php if ($_smarty_tpl->tpl_vars['count']->value||!empty($_smarty_tpl->tpl_vars['value']->value['selected'])||$_smarty_tpl->tpl_vars['is_customer_filter']->value||!$_smarty_tpl->tpl_vars['hidden_inputs']->value['hide_zero_matches']) {?>
			<option id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['v']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" data-url="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['link'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"  data-text="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="<?php if ($_smarty_tpl->tpl_vars['is_customer_filter']->value) {?>customer-filter <?php }?><?php if (!$_smarty_tpl->tpl_vars['count']->value) {?>no-matches<?php }?>"<?php if (!empty($_smarty_tpl->tpl_vars['value']->value['selected'])) {?> selected<?php }?><?php if (!$_smarty_tpl->tpl_vars['count']->value&&$_smarty_tpl->tpl_vars['hidden_inputs']->value['dim_zero_matches']) {?> disabled<?php }?>>
				<?php if ($_smarty_tpl->tpl_vars['nesting_prefix']->value) {?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['nesting_prefix']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php }?>
				<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>

				<?php if ($_smarty_tpl->tpl_vars['hidden_inputs']->value['count_data']&&$_smarty_tpl->tpl_vars['count']->value) {?>(<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['count']->value), ENT_QUOTES, 'UTF-8');?>
)<?php }?>
			</option>
			<?php if ($_smarty_tpl->tpl_vars['check_for_children']->value&&!empty($_smarty_tpl->tpl_vars['filter']->value['values'][$_smarty_tpl->tpl_vars['v']->value])) {?>
				<?php smarty_template_function_renderOptions($_smarty_tpl,array('values'=>$_smarty_tpl->tpl_vars['filter']->value['values'][$_smarty_tpl->tpl_vars['v']->value],'nesting_prefix'=>($_smarty_tpl->tpl_vars['nesting_prefix']->value).('-')));?>

			<?php }?>
		<?php }?>
	<?php } ?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if (!function_exists('smarty_template_function_renderAvailableOptions')) {
    function smarty_template_function_renderAvailableOptions($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['renderAvailableOptions']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['values']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
		<?php $_smarty_tpl->tpl_vars['v'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value['id'], null, 0);?>
		<?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable((($_smarty_tpl->tpl_vars['t']->value).('-')).($_smarty_tpl->tpl_vars['v']->value), null, 0);?>
		<span class="<?php if (!empty($_smarty_tpl->tpl_vars['applied_customer_filters']->value[$_smarty_tpl->tpl_vars['k']->value][$_smarty_tpl->tpl_vars['v']->value])) {?>customer-filter<?php }?>" data-value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['v']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" data-url="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['link'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" data-text="<?php if ($_smarty_tpl->tpl_vars['nesting_prefix']->value) {?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['nesting_prefix']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 <?php }?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value['name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" data-id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"></span>
		<?php if ($_smarty_tpl->tpl_vars['check_for_children']->value&&!empty($_smarty_tpl->tpl_vars['filter']->value['values'][$_smarty_tpl->tpl_vars['v']->value])) {?>
			<?php smarty_template_function_renderAvailableOptions($_smarty_tpl,array('values'=>$_smarty_tpl->tpl_vars['filter']->value['values'][$_smarty_tpl->tpl_vars['v']->value],'nesting_prefix'=>($_smarty_tpl->tpl_vars['nesting_prefix']->value).('-')));?>

		<?php }?>
	<?php } ?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php $_smarty_tpl->tpl_vars['horizontal_layout'] = new Smarty_variable(!$_smarty_tpl->tpl_vars['is_compact']->value&&$_smarty_tpl->tpl_vars['hook_name']->value=='displayTopColumn', null, 0);?>
<div id="amazzing_filter" class="af block <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['hook_name']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['horizontal_layout']->value) {?> horizontal-layout<?php }?><?php if (!$_smarty_tpl->tpl_vars['hidden_inputs']->value['count_data']) {?> hide-counters<?php }?><?php if ($_smarty_tpl->tpl_vars['hidden_inputs']->value['hide_zero_matches']) {?> hide-zero-matches<?php }?><?php if ($_smarty_tpl->tpl_vars['hidden_inputs']->value['dim_zero_matches']) {?> dim-zero-matches<?php }?><?php if ($_smarty_tpl->tpl_vars['is_compact']->value) {?> compact<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['filters']->value) {?> style="display:none"<?php }?>>
	<?php if ($_smarty_tpl->tpl_vars['hook_name']->value!='displayHome'&&!$_smarty_tpl->tpl_vars['is_compact']->value) {?>
		<h2 class="title_block">
			<?php if ($_smarty_tpl->tpl_vars['current_controller']->value=='index') {?><?php echo smartyTranslate(array('s'=>'Instant filter','mod'=>'amazzingfilter'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Filter by','mod'=>'amazzingfilter'),$_smarty_tpl);?>
<?php }?>
		</h2>
	<?php }?>
	<div class="<?php if ($_smarty_tpl->tpl_vars['is_compact']->value) {?>compact_<?php }?>block_content">
		<?php if ($_smarty_tpl->tpl_vars['hook_name']->value!='displayHome') {?>
		<div class="selectedFilters">
			<div class="clearAll hidden">
				<?php echo smartyTranslate(array('s'=>'Clear filters','mod'=>'amazzingfilter'),$_smarty_tpl);?>

				<a href="#" class="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['af_classes']->value['icon-eraser'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 all" title="<?php echo smartyTranslate(array('s'=>'Clear all','mod'=>'amazzingfilter'),$_smarty_tpl);?>
"></a>
			</div>
		</div>
		<?php }?>
		<form action="#" id="af_form">
			<span class="hidden_inputs">
				<!-- additional template settings -->
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['hidden_inputs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
					<input type="hidden" id="af_<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['name']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['name']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['value']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
				<?php } ?>
			</span>
			<?php  $_smarty_tpl->tpl_vars['filter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['filter']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['filters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['filter']->key => $_smarty_tpl->tpl_vars['filter']->value) {
$_smarty_tpl->tpl_vars['filter']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['filter']->key;
?>
			<?php if (!empty($_smarty_tpl->tpl_vars['filter']->value['values'])) {?>
			<?php $_smarty_tpl->tpl_vars['t'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['k']->value,1,'',true), null, 0);?>
			<?php $_smarty_tpl->tpl_vars['check_for_children'] = new Smarty_variable(!empty($_smarty_tpl->tpl_vars['filter']->value['id_parent'])&&!empty($_smarty_tpl->tpl_vars['filter']->value['values'][$_smarty_tpl->tpl_vars['filter']->value['id_parent']]), null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['is_compact']->value&&isset($_smarty_tpl->tpl_vars['filter']->value['foldered'])) {?><?php $_smarty_tpl->createLocalArrayVariable('filter', null, 0);
$_smarty_tpl->tpl_vars['filter']->value['foldered'] = 1;?><?php }?>
			<div class="af_filter <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 clearfix<?php if ($_smarty_tpl->tpl_vars['t']->value=='p'||$_smarty_tpl->tpl_vars['t']->value=='w') {?> range-filter<?php }?><?php if ($_smarty_tpl->tpl_vars['filter']->value['type']==4) {?> has-slider<?php } else { ?> type-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['filter']->value['type']), ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['filter']->value['is_color_group'])) {?> color-group<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['filter']->value['special'])) {?> special<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['filter']->value['foldered'])) {?> foldered<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['filter']->value['class'])) {?> <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['class'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['filter']->value['minimized'])) {?> closed<?php }?>" data-trigger="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" data-url="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['link'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
				<div class="af_subtitle_heading<?php if (!empty($_smarty_tpl->tpl_vars['filter']->value['special'])) {?> hidden<?php }?>">
					<h5 class="af_subtitle"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h5>
				</div>
				<div class="af_filter_content">
				<?php if ($_smarty_tpl->tpl_vars['filter']->value['type']==1||$_smarty_tpl->tpl_vars['filter']->value['type']==2) {?>
					<?php $_smarty_tpl->tpl_vars['values'] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['values'], null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['check_for_children']->value) {?><?php $_smarty_tpl->tpl_vars['values'] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['values'][$_smarty_tpl->tpl_vars['filter']->value['id_parent']], null, 0);?><?php }?>
					<?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable('checkbox', null, 0);?><?php if ($_smarty_tpl->tpl_vars['filter']->value['type']==2) {?><?php $_smarty_tpl->tpl_vars['type'] = new Smarty_variable('radio', null, 0);?><?php }?>
					<?php smarty_template_function_renderBoxes($_smarty_tpl,array('type'=>$_smarty_tpl->tpl_vars['type']->value,'values'=>$_smarty_tpl->tpl_vars['values']->value,'foldered'=>!empty($_smarty_tpl->tpl_vars['filter']->value['foldered'])));?>

				<?php } elseif ($_smarty_tpl->tpl_vars['filter']->value['type']==3) {?>
					<?php $_smarty_tpl->tpl_vars['values'] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['values'], null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['check_for_children']->value) {?><?php $_smarty_tpl->tpl_vars['values'] = new Smarty_variable($_smarty_tpl->tpl_vars['filter']->value['values'][$_smarty_tpl->tpl_vars['filter']->value['id_parent']], null, 0);?><?php }?>
					<?php $_smarty_tpl->tpl_vars['selector_id'] = new Smarty_variable(('selector-').($_smarty_tpl->tpl_vars['k']->value), null, 0);?>
					<?php if (!empty($_smarty_tpl->tpl_vars['applied_customer_filters']->value[$_smarty_tpl->tpl_vars['k']->value])) {?>
						<?php $_smarty_tpl->tpl_vars['customer_filter_id'] = new Smarty_variable(current(array_keys($_smarty_tpl->tpl_vars['applied_customer_filters']->value[$_smarty_tpl->tpl_vars['k']->value])), null, 0);?>
						<?php $_smarty_tpl->tpl_vars['customer_filter_name'] = new Smarty_variable(current($_smarty_tpl->tpl_vars['applied_customer_filters']->value[$_smarty_tpl->tpl_vars['k']->value]), null, 0);?>
						<label class="customer-filter-label for-select" data-id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['t']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['customer_filter_id']->value), ENT_QUOTES, 'UTF-8');?>
">
							<a href="#" class="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['af_classes']->value['icon-lock'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"></a>
							<span class="name"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['customer_filter_name']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span>
						</label>
						<div class="selector-with-customer-filter hidden">
					<?php }?>
					<select id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['selector_id']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="af-select form-control" name="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['submit_name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
						<option value="0" class="first"><?php echo smartyTranslate(array('s'=>'No filters','mod'=>'amazzingfilter'),$_smarty_tpl);?>
</option>
						<?php smarty_template_function_renderOptions($_smarty_tpl,array('values'=>$_smarty_tpl->tpl_vars['values']->value));?>

					</select>
					<div class="dynamic-select-options hidden">
						<?php smarty_template_function_renderAvailableOptions($_smarty_tpl,array('values'=>$_smarty_tpl->tpl_vars['values']->value));?>

					</div>
					<?php if (!empty($_smarty_tpl->tpl_vars['applied_customer_filters']->value[$_smarty_tpl->tpl_vars['k']->value])) {?></div><?php }?>
				<?php } elseif ($_smarty_tpl->tpl_vars['filter']->value['type']==4) {?>
					<div class="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
_slider af_slider slider" data-url="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['link'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" data-type="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
						<div class="slider-bar">
							<div id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
_slider"></div>
						</div>
						<div class="slider-values">
							<span class="from_display slider_value">
								<span class="prefix"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['prefix'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span>
								<span class="value"><?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['filter']->value['values']['from']), ENT_QUOTES, 'UTF-8');?>
</span>
								<span class="suffix"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['suffix'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span>
								<input type="text" id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
_from" class="input-text" name="sliders[<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
][from]" value="<?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['filter']->value['values']['from']), ENT_QUOTES, 'UTF-8');?>
" >
								<input type="hidden" id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
_min" name="sliders[<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
][min]" value="<?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['filter']->value['values']['min']), ENT_QUOTES, 'UTF-8');?>
" >
							</span>
							<span class="to_display slider_value">
								<span class="prefix"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['prefix'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span>
								<span class="value"><?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['filter']->value['values']['to']), ENT_QUOTES, 'UTF-8');?>
</span>
								<span class="suffix"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['filter']->value['suffix'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</span>
								<input type="text" id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
_to" class="input-text" name="sliders[<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
][to]" value="<?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['filter']->value['values']['to']), ENT_QUOTES, 'UTF-8');?>
">
								<input type="hidden" id="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
_max"name="sliders[<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
][max]" value="<?php echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['filter']->value['values']['max']), ENT_QUOTES, 'UTF-8');?>
">
							</span>
						</div>
					</div>
					<?php if (!empty($_smarty_tpl->tpl_vars['numeric_slider_values']->value[$_smarty_tpl->tpl_vars['k']->value])) {?>
						<input type="hidden" name="numeric_slider_values[<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(implode($_smarty_tpl->tpl_vars['numeric_slider_values']->value[$_smarty_tpl->tpl_vars['k']->value],','),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
					<?php }?>
				<?php }?>
				<?php if (!empty($_smarty_tpl->tpl_vars['available_options']->value[$_smarty_tpl->tpl_vars['k']->value])) {?>
					<input type="hidden" name="available_options[<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['k']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(implode($_smarty_tpl->tpl_vars['available_options']->value[$_smarty_tpl->tpl_vars['k']->value],','),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
				<?php }?>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['filter']->value['type']==1&&empty($_smarty_tpl->tpl_vars['filter']->value['is_color_group'])) {?>
					<a href="#" class="toggle-cut-off">
						<span class="more"><?php echo smartyTranslate(array('s'=>'more...','mod'=>'amazzingfilter'),$_smarty_tpl);?>
</span>
						<span class="less"><?php echo smartyTranslate(array('s'=>'less','mod'=>'amazzingfilter'),$_smarty_tpl);?>
</span>
					</a>
				<?php }?>
			</div>
			<?php }?>
			<?php } ?>
			<?php if ($_smarty_tpl->tpl_vars['hook_name']->value=='displayHome') {?>
				<div class="btn-holder"><a href="#" class="submitFilter btn btn-default full-width"><?php echo smartyTranslate(array('s'=>'OK','mod'=>'amazzingfilter'),$_smarty_tpl);?>
</a></div>
			<?php }?>
			<?php $_smarty_tpl->tpl_vars['no_layout'] = new Smarty_variable($_smarty_tpl->tpl_vars['current_controller']->value=='index', null, 0);?>
			<?php $_smarty_tpl->tpl_vars['view_products_btn'] = new Smarty_variable($_smarty_tpl->tpl_vars['no_layout']->value||$_smarty_tpl->tpl_vars['hidden_inputs']->value['reload_action']==2||$_smarty_tpl->tpl_vars['is_compact']->value, null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['view_products_btn']->value||!empty($_smarty_tpl->tpl_vars['my_filters_link']->value)) {?>
				<div class="btn-holder">
					<?php if ($_smarty_tpl->tpl_vars['view_products_btn']->value) {?>
						<a href="#" class="btn btn-default full-width viewFilteredProducts<?php if ($_smarty_tpl->tpl_vars['no_layout']->value) {?> no-layout<?php }?>">
							<?php echo smartyTranslate(array('s'=>'View products','mod'=>'amazzingfilter'),$_smarty_tpl);?>

							<span class="af-total-count"><?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['total_products']->value), ENT_QUOTES, 'UTF-8');?>
</span>
						</a>
					<?php }?>
					<?php if (!empty($_smarty_tpl->tpl_vars['my_filters_link']->value)) {?>
						<a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['my_filters_link']->value,'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="btn btn-default manage-permanent-filters<?php if ($_smarty_tpl->tpl_vars['no_layout']->value) {?> hidden<?php }?>" target="_blank"><?php echo smartyTranslate(array('s'=>'Manage permanent filters','mod'=>'amazzingfilter'),$_smarty_tpl);?>
</a>
					<?php }?>
				</div>
			<?php }?>
		</form>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['is_compact']->value) {?>
		<a href="#" class="icon-filter btn-primary compact-toggle"></a>
	<?php }?>
</div>

<?php }} ?>
