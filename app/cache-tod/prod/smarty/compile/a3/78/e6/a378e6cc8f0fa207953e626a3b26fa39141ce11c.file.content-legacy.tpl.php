<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 03:04:21
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/modules/content-legacy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13117266365c31e0b59b21c4-00563190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a378e6cc8f0fa207953e626a3b26fa39141ce11c' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/modules/content-legacy.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13117266365c31e0b59b21c4-00563190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_content' => 0,
    'context_mode' => 0,
    'logged_on_addons' => 0,
    'iso_code' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31e0b59bc9b8_63063328',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31e0b59bc9b8_63063328')) {function content_5c31e0b59bc9b8_63063328($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['module_content']->value)) {?>
	<?php echo $_smarty_tpl->tpl_vars['module_content']->value;?>

<?php } else { ?>

	<?php if (isset($_GET['addnewmodule'])&&($_smarty_tpl->tpl_vars['context_mode']->value==Context::MODE_HOST)) {?>

		<div class="defaultForm form-horizontal">

			<?php if ($_smarty_tpl->tpl_vars['logged_on_addons']->value) {?>

				<div class="panel">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
							<img class="img-responsive" alt="PrestaShop Addons" src="themes/default/img/prestashop-addons-logo.png">
						</div>
						<div class="col-lg-4 col-lg-offset-1 col-md-4 col-sm-7 col-xs-12 addons-style-search-bar">
							<form id="addons-search-form" method="get" action="http://addons.prestashop.com/<?php echo $_smarty_tpl->tpl_vars['iso_code']->value;?>
/search" class="float">
							<label><?php echo smartyTranslate(array('s'=>'Search on PrestaShop Marketplace:'),$_smarty_tpl);?>
</label>
							<div class="input-group">
								<input id="addons-search-box" class="form-control" type="text" autocomplete="off" name="query" value="" placeholder="Search on PrestaShop Marketplace">
								<div id="addons-search-btn" class="btn btn-primary input-group-addon">
									<i class="icon-search"></i>
								</div>
							</div>
							</form>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 addons-see-all-themes">
							<?php echo smartyTranslate(array('s'=>'Or'),$_smarty_tpl);?>
<a href="http://addons.prestashop.com/<?php echo $_smarty_tpl->tpl_vars['iso_code']->value;?>
/2-modules-prestashop" class="btn btn-primary" onclick="return !window.open(this.href)"><?php echo smartyTranslate(array('s'=>'See all modules'),$_smarty_tpl);?>
</a>
						</div>
					</div>
				</div>

			<?php } else { ?>

				<div class="panel" id="">
					<div class="panel-heading">
						<i class="icon-picture"></i> <?php echo smartyTranslate(array('s'=>'Add a new module'),$_smarty_tpl);?>

					</div>

					<div class="form-wrapper">
						<div class="form-group">
							<p><?php echo smartyTranslate(array('s'=>'To add a new module, simply connect to your PrestaShop Addons account and all your purchases will be automatically imported.'),$_smarty_tpl);?>
</p>
						</div>
					</div><!-- /.form-wrapper -->

					<div class="panel-footer">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules',true),'html','UTF-8');?>
" class="btn btn-default">
							<i class="process-icon-cancel"></i> <?php echo smartyTranslate(array('s'=>'Cancel','d'=>'Admin.Actions'),$_smarty_tpl);?>

						</a>
						<a href="#" data-toggle="modal" data-target="#modal_addons_connect" class="btn btn-default pull-right">
							<i class="process-icon-next"></i> <?php echo smartyTranslate(array('s'=>'Next','d'=>'Admin.Global'),$_smarty_tpl);?>

						</a>
					</div>
				</div>

			<?php }?>

				<div class="alert alert-info">
					<h4><?php echo smartyTranslate(array('s'=>'Can I add my own modules?'),$_smarty_tpl);?>
</h4>
					<p><?php echo smartyTranslate(array('s'=>'Please note that for security reasons, you can only add modules that are being distributed on PrestaShop Addons, the official marketplace.'),$_smarty_tpl);?>
</p>
				</div>

		</div>

	<?php } elseif (!isset($_GET['configure'])) {?>
		<?php echo $_smarty_tpl->getSubTemplate ('controllers/modules/js.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('controllers/modules/page.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
<?php }?>
<?php }} ?>
