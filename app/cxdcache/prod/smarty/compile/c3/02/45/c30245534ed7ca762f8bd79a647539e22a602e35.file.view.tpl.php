<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:59:22
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/information/helpers/view/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15102123985c31a74a347157-72233492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c30245534ed7ca762f8bd79a647539e22a602e35' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/information/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '7cac1082554124db66226276f88c32a350f4f98e' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15102123985c31a74a347157-72233492',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name_controller' => 0,
    'hookName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a74a3cce40_52562438',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a74a3cce40_52562438')) {function content_5c31a74a3cce40_52562438($_smarty_tpl) {?>

<div class="leadin"></div>


	<?php if (!$_smarty_tpl->tpl_vars['host_mode']->value) {?>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$.ajax({
				type: 'GET',
				url: '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminInformation'));?>
',
				data: {
					'action': 'checkFiles',
					'ajax': 1
				},
				dataType: 'json',
				success: function(json)
				{
					var tab = {
						'missing': '<?php echo smartyTranslate(array('s'=>'Missing files','d'=>'Admin.Advparameters.Notification'),$_smarty_tpl);?>
',
						'updated': '<?php echo smartyTranslate(array('s'=>'Updated files','d'=>'Admin.Advparameters.Notification'),$_smarty_tpl);?>
'
					};

					if (json.missing.length || json.updated.length)
						$('#changedFiles').html('<div class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'Changed/missing files have been detected.','js'=>1,'d'=>'Admin.Advparameters.Notification'),$_smarty_tpl);?>
</div>');
					else
						$('#changedFiles').html('<div class="alert alert-success"><?php echo smartyTranslate(array('s'=>'No change has been detected in your files.','js'=>1,'d'=>'Admin.Advparameters.Notification'),$_smarty_tpl);?>
</div>');

					$.each(tab, function(key, lang)
					{
						if (json[key].length)
						{
							var html = $('<ul>').attr('id', key+'_files');
							$(json[key]).each(function(key, file)
							{
								html.append($('<li>').html(file))
							});
							$('#changedFiles')
								.append($('<h4>').html(lang+' ('+json[key].length+')'))
								.append(html);
						}
					});
				}
			});
		});
	</script>
	<?php }?>
	<div class="row">
		<div class="col-lg-6">
			<div class="panel">
				<h3>
					<i class="icon-info"></i>
					<?php echo smartyTranslate(array('s'=>'Configuration information','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>

				</h3>
				<p><?php echo smartyTranslate(array('s'=>'This information must be provided when you report an issue on our bug tracker or forum.','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</p>
			</div>
			<?php if (!$_smarty_tpl->tpl_vars['host_mode']->value) {?>
			<div class="panel">
				<h3>
					<i class="icon-info"></i>
					<?php echo smartyTranslate(array('s'=>'Server information','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>

				</h3>
				<?php if (count($_smarty_tpl->tpl_vars['uname']->value)) {?>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Server information:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['uname']->value,'html','UTF-8');?>

				</p>
				<?php }?>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Server software version:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['version']->value['server'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'PHP version:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['version']->value['php'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Memory limit:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['version']->value['memory_limit'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Max execution time:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['version']->value['max_execution_time'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Upload Max File size:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['version']->value['upload_max_filesize'],'html','UTF-8');?>

				</p>
				<?php if ($_smarty_tpl->tpl_vars['apache_instaweb']->value) {?>
					<p><?php echo smartyTranslate(array('s'=>'PageSpeed module for Apache installed (mod_instaweb)','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</p>
				<?php }?>
			</div>
			<div class="panel">
				<h3>
					<i class="icon-info"></i>
					<?php echo smartyTranslate(array('s'=>'Database information'),$_smarty_tpl);?>

				</h3>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'MySQL version:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['database']->value['version'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'MySQL server:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['database']->value['server'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'MySQL name:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['database']->value['name'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'MySQL user:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['database']->value['user'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Tables prefix:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['database']->value['prefix'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'MySQL engine:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['database']->value['engine'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'MySQL driver:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['database']->value['driver'],'html','UTF-8');?>

				</p>
			</div>
		</div>
		<?php }?>
		<div class="col-lg-6">
			<div class="panel">
				<h3>
					<i class="icon-info"></i>
					<?php echo smartyTranslate(array('s'=>'Store information','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>

				</h3>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'PrestaShop version:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['shop']->value['ps'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Shop URL:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['shop']->value['url'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Current theme in use:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['shop']->value['theme'],'html','UTF-8');?>

				</p>
			</div>
			<div class="panel">
				<h3>
					<i class="icon-info"></i>
					<?php echo smartyTranslate(array('s'=>'Mail configuration','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>

				</h3>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Mail method:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong>

			<?php if ($_smarty_tpl->tpl_vars['mail']->value) {?>
				<?php echo smartyTranslate(array('s'=>'You are using the PHP mail() function.','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</p>
			<?php } else { ?>
				<?php echo smartyTranslate(array('s'=>'You are using your own SMTP parameters.','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'SMTP server:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['smtp']->value['server'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'SMTP username:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong>
					<?php if ($_smarty_tpl->tpl_vars['smtp']->value['user']!='') {?>
						<?php echo smartyTranslate(array('s'=>'Defined','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>

					<?php } else { ?>
						<span style="color:red;"><?php echo smartyTranslate(array('s'=>'Not defined','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</span>
					<?php }?>
				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'SMTP password:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong>
					<?php if ($_smarty_tpl->tpl_vars['smtp']->value['password']!='') {?>
						<?php echo smartyTranslate(array('s'=>'Defined','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>

					<?php } else { ?>
						<span style="color:red;"><?php echo smartyTranslate(array('s'=>'Not defined','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</span>
					<?php }?>
				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Encryption:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['smtp']->value['encryption'],'html','UTF-8');?>

				</p>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'SMTP port:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['smtp']->value['port'],'html','UTF-8');?>

				</p>
			<?php }?>
			</div>
			<div class="panel">
				<h3>
					<i class="icon-info"></i>
					<?php echo smartyTranslate(array('s'=>'Your information','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>

				</h3>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Your web browser:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['user_agent']->value,'html','UTF-8');?>

				</p>
			</div>

			<div class="panel" id="checkConfiguration">
				<h3>
					<i class="icon-info"></i>
					<?php echo smartyTranslate(array('s'=>'Check your configuration','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>

				</h3>
				<p>
					<strong><?php echo smartyTranslate(array('s'=>'Required parameters:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong>
				<?php if (!$_smarty_tpl->tpl_vars['failRequired']->value) {?>
					<span class="text-success"><?php echo smartyTranslate(array('s'=>'OK','d'=>'Admin.Advparameters.Notification'),$_smarty_tpl);?>
</span>
				</p>
				<?php } else { ?>
					<span class="text-danger"><?php echo smartyTranslate(array('s'=>'Please fix the following error(s)','d'=>'Admin.Advparameters.Notification'),$_smarty_tpl);?>
</span>
				</p>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['testsRequired']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
						<?php if ($_smarty_tpl->tpl_vars['value']->value=='fail'&&isset($_smarty_tpl->tpl_vars['testsErrors']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
							<li><?php echo $_smarty_tpl->tpl_vars['testsErrors']->value[$_smarty_tpl->tpl_vars['key']->value];?>
</li>
						<?php }?>
					<?php } ?>
				</ul>
				<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['failOptional']->value)) {?>
					<p>
						<strong><?php echo smartyTranslate(array('s'=>'Optional parameters:','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</strong>
					<?php if (!$_smarty_tpl->tpl_vars['failOptional']->value) {?>
						<span class="text-success"><?php echo smartyTranslate(array('s'=>'OK','d'=>'Admin.Advparameters.Notification'),$_smarty_tpl);?>
</span>
					</p>
					<?php } else { ?>
						<span class="text-danger"><?php echo smartyTranslate(array('s'=>'Please fix the following error(s)','d'=>'Admin.Advparameters.Notification'),$_smarty_tpl);?>
</span>
					</p>
					<ul>
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['testsOptional']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
							<?php if ($_smarty_tpl->tpl_vars['value']->value=='fail'&&isset($_smarty_tpl->tpl_vars['testsErrors']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
								<li><?php echo $_smarty_tpl->tpl_vars['testsErrors']->value[$_smarty_tpl->tpl_vars['key']->value];?>
</li>
							<?php }?>
						<?php } ?>
					</ul>
					<?php }?>
				<?php }?>
			</div>
		</div>
	</div>
	<?php if (!$_smarty_tpl->tpl_vars['host_mode']->value) {?>
	<div class="panel">
		<h3>
			<i class="icon-info"></i>
			<?php echo smartyTranslate(array('s'=>'List of changed files','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>

		</h3>
		<div id="changedFiles"><i class="icon-spin icon-refresh"></i> <?php echo smartyTranslate(array('s'=>'Checking files...','d'=>'Admin.Advparameters.Notification'),$_smarty_tpl);?>
</div>
	</div>
	<?php }?>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminView'),$_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo ucfirst($_smarty_tpl->tpl_vars['name_controller']->value);?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php } elseif (isset($_GET['controller'])) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo htmlentities(ucfirst($_GET['controller']));?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php }?>
<?php }} ?>
