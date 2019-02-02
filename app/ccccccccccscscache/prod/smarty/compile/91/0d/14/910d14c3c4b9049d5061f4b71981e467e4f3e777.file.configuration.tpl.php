<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:23:06
         compiled from "/var/www/html/SHN/modules/prismpay/views/templates/admin/configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20991860275c319ecaf1a553-21094096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '910d14c3c4b9049d5061f4b71981e467e4f3e777' => 
    array (
      0 => '/var/www/html/SHN/modules/prismpay/views/templates/admin/configuration.tpl',
      1 => 1537901778,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20991860275c319ecaf1a553-21094096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'P_P_CLIENT_ID' => 0,
    'P_P_PASSWORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319ecaf20d60_86764832',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319ecaf20d60_86764832')) {function content_5c319ecaf20d60_86764832($_smarty_tpl) {?><div>
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_SERVER['REQUEST_URI'],'htmlall','UTF-8');?>
" method="post">
	<fieldset>
		<legend>Configure your Prismpay Payment Gateway Options</legend> 
                <!-- <div class="form-group">
                    <label class="control-label">API Client ID</label>
                    <input type="text" name="g_e_client_id" value="<?php echo $_smarty_tpl->tpl_vars['P_P_CLIENT_ID']->value;?>
" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="control-label">API Password</label>
                    <input type="password" name="g_e_password" value="<?php echo $_smarty_tpl->tpl_vars['P_P_PASSWORD']->value;?>
" class="form-control"/>
                </div> -->
				<h2>This page will be updated</h2>
		<br/>
		<!-- <center>
			<input type="submit" name="submitConfigPrsm" value="Update settings" class="button" />
		</center> -->
	</fieldset>
</form>
</div>
<?php }} ?>
