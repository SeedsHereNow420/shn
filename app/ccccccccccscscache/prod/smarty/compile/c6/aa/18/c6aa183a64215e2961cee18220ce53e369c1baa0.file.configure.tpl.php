<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:23:06
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/modules/configure.tpl" */ ?>
<?php /*%%SmartyHeaderCode:908658255c319ecaf334a0-93488500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6aa183a64215e2961cee18220ce53e369c1baa0' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/modules/configure.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '0eb3a98f04fb86334cfe3aa6fc1ae86d76cc839d' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/page_header_toolbar.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '908658255c319ecaf334a0-93488500',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'page_header_toolbar_title' => 0,
    'page_header_toolbar_btn' => 0,
    'current_tab_level' => 0,
    'breadcrumbs2' => 0,
    'toolbar_btn' => 0,
    'k' => 0,
    'table' => 0,
    'btn' => 0,
    'help_link' => 0,
    'tab_modules_open' => 0,
    'tab_modules_list' => 0,
    'tabs' => 0,
    'level_1' => 0,
    'level_2' => 0,
    'level_3' => 0,
    'level_4' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319ecb204207_25719296',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319ecb204207_25719296')) {function content_5c319ecb204207_25719296($_smarty_tpl) {?>


<?php if (!isset($_smarty_tpl->tpl_vars['title']->value)&&isset($_smarty_tpl->tpl_vars['page_header_toolbar_title']->value)) {?>
  <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable($_smarty_tpl->tpl_vars['page_header_toolbar_title']->value, null, 0);?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['page_header_toolbar_btn']->value)) {?>
  <?php $_smarty_tpl->tpl_vars['toolbar_btn'] = new Smarty_variable($_smarty_tpl->tpl_vars['page_header_toolbar_btn']->value, null, 0);?>
<?php }?>

<div class="bootstrap">
  <div class="page-head <?php if (isset($_smarty_tpl->tpl_vars['current_tab_level']->value)&&$_smarty_tpl->tpl_vars['current_tab_level']->value==3) {?>with-tabs<?php }?>">
    
<h2 class="page-title">
	<?php echo smartyTranslate(array('s'=>'Configure','d'=>'Admin.Actions'),$_smarty_tpl);?>

</h2>
<h4 class="page-subtitle"><?php echo $_smarty_tpl->tpl_vars['module_display_name']->value;?>
</h4>


    
<ul class="breadcrumb page-breadcrumb">
	<?php if ($_smarty_tpl->tpl_vars['breadcrumbs2']->value['container']['name']!='') {?>
		<li class="breadcrumb-current">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['breadcrumbs2']->value['container']['name']);?>

		</li>
	<?php }?>
	<li><?php echo $_smarty_tpl->tpl_vars['module_name']->value;?>
</li>
	<li>
		<i class="icon-wrench"></i>
		<?php echo smartyTranslate(array('s'=>'Configure','d'=>'Admin.Actions'),$_smarty_tpl);?>

	</li>
</ul>

    
<script type="text/javascript">
	var header_confirm_reset = '<?php echo smartyTranslate(array('s'=>'Confirm reset','d'=>'Admin.Modules.Notification'),$_smarty_tpl);?>
';
	var body_confirm_reset = '<?php echo smartyTranslate(array('s'=>'Would you like to delete the content related to this module ?','d'=>'Admin.Modules.Notification'),$_smarty_tpl);?>
';
	var left_button_confirm_reset = '<?php echo smartyTranslate(array('s'=>'No - reset only the parameters','d'=>'Admin.Modules.Notification'),$_smarty_tpl);?>
';
	var right_button_confirm_reset = '<?php echo smartyTranslate(array('s'=>'Yes - reset everything','d'=>'Admin.Modules.Notification'),$_smarty_tpl);?>
';
</script>
<div class="page-bar toolbarBox">
	<div class="btn-toolbar">
		<ul class="nav nav-pills pull-right">
			<li>
				<a id="desc-module-back" class="toolbar_btn" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'sf','route'=>'admin_module_manage'),$_smarty_tpl);?>
">
					<i class="process-icon-back"></i>
					<div><?php echo smartyTranslate(array('s'=>'Back','d'=>'Admin.Global'),$_smarty_tpl);?>
</div>
				</a>
			</li>
			<!-- <li>
				<a id="desc-module-disable" class="toolbar_btn" href="<?php echo $_smarty_tpl->tpl_vars['module_disable_link']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Disable','d'=>'Admin.Actions'),$_smarty_tpl);?>
">
					<i class="process-icon-off"></i>
					<div><?php echo smartyTranslate(array('s'=>'Disable','d'=>'Admin.Actions'),$_smarty_tpl);?>
</div>
				</a>
			</li>
			<li>
				<a id="desc-module-uninstall" class="toolbar_btn" href="<?php echo $_smarty_tpl->tpl_vars['module_uninstall_link']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Uninstall'),$_smarty_tpl);?>
">
					<i class="process-icon-uninstall"></i>
					<div><?php echo smartyTranslate(array('s'=>'Uninstall'),$_smarty_tpl);?>
</div>
				</a>
			</li>
			<li>
				<a id="desc-module-reset" class="toolbar_btn <?php if ($_smarty_tpl->tpl_vars['is_reset_ready']->value) {?>reset_ready<?php }?>" href="<?php echo $_smarty_tpl->tpl_vars['module_reset_link']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Reset'),$_smarty_tpl);?>
">
					<i class="process-icon-reset"></i>
					<div><?php echo smartyTranslate(array('s'=>'Reset'),$_smarty_tpl);?>
</div>
				</a>
			</li> -->
			<?php if (isset($_smarty_tpl->tpl_vars['trad_link']->value)) {?>
			<li>
				<a id="desc-module-translate" data-toggle="modal" data-target="#moduleTradLangSelect" class="toolbar_btn" href="#" title="<?php echo smartyTranslate(array('s'=>'Translate'),$_smarty_tpl);?>
">
					<i class="process-icon-flag"></i>
					<div><?php echo smartyTranslate(array('s'=>'Translate','d'=>'Admin.Actions'),$_smarty_tpl);?>
</div>
				</a>
			</li>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['module_update_link']->value)) {?>
			<li>
				<a id="desc-module-update" class="toolbar_btn" href="<?php echo $_smarty_tpl->tpl_vars['module_update_link']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Update'),$_smarty_tpl);?>
">
					<i class="process-icon-refresh"></i>
					<div><?php echo smartyTranslate(array('s'=>'Check update','d'=>'Admin.Modules.Feature'),$_smarty_tpl);?>
</div>
				</a>
			</li>
			<?php }?>
			<li>
				<a id="desc-module-hook" class="toolbar_btn" href="<?php echo $_smarty_tpl->tpl_vars['module_hook_link']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'Manage hooks'),$_smarty_tpl);?>
">
					<i class="process-icon-anchor"></i>
					<div><?php echo smartyTranslate(array('s'=>'Manage hooks','d'=>'Admin.Modules.Feature'),$_smarty_tpl);?>
</div>
				</a>
			</li>
		</ul>
	</div>
</div>



    <?php if (isset($_smarty_tpl->tpl_vars['current_tab_level']->value)&&$_smarty_tpl->tpl_vars['current_tab_level']->value==3) {?>
      <div class="page-head-tabs">
        <?php  $_smarty_tpl->tpl_vars['level_1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['level_1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tabs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['level_1']->key => $_smarty_tpl->tpl_vars['level_1']->value) {
$_smarty_tpl->tpl_vars['level_1']->_loop = true;
?>
          <?php  $_smarty_tpl->tpl_vars['level_2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['level_2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['level_1']->value['sub_tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['level_2']->key => $_smarty_tpl->tpl_vars['level_2']->value) {
$_smarty_tpl->tpl_vars['level_2']->_loop = true;
?>
            <?php  $_smarty_tpl->tpl_vars['level_3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['level_3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['level_2']->value['sub_tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['level_3']->key => $_smarty_tpl->tpl_vars['level_3']->value) {
$_smarty_tpl->tpl_vars['level_3']->_loop = true;
?>
              <?php if ($_smarty_tpl->tpl_vars['level_3']->value['current']) {?>
                <?php  $_smarty_tpl->tpl_vars['level_4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['level_4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['level_3']->value['sub_tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['level_4']->key => $_smarty_tpl->tpl_vars['level_4']->value) {
$_smarty_tpl->tpl_vars['level_4']->_loop = true;
?>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['level_4']->value['href'];?>
" <?php if ($_smarty_tpl->tpl_vars['level_4']->value['current']) {?>class="current"<?php }?>><?php echo $_smarty_tpl->tpl_vars['level_4']->value['name'];?>
</a>
                <?php } ?>
              <?php }?>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </div>
    <?php }?>
  </div>
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayDashboardTop'),$_smarty_tpl);?>

</div>
<?php }} ?>
