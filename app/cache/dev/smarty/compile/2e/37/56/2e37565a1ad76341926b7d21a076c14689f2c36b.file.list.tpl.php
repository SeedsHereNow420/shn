<?php /* Smarty version Smarty-3.1.19, created on 2019-01-10 14:28:27
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/helpers/modules_list/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2513933905c37c70b746a91-04852057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e37565a1ad76341926b7d21a076c14689f2c36b' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/modules_list/list.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2513933905c37c70b746a91-04852057',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'panel_id' => 0,
    'panel_title' => 0,
    'modules_list' => 0,
    'controller_name' => 0,
    'view_all' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c37c70b774ac7_26515052',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c37c70b774ac7_26515052')) {function content_5c37c70b774ac7_26515052($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.counter.php';
if (!is_callable('smarty_function_cycle')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.cycle.php';
?>
<div class="panel" <?php if (isset($_smarty_tpl->tpl_vars['panel_id']->value)) {?>id="<?php echo $_smarty_tpl->tpl_vars['panel_id']->value;?>
"<?php }?>>
	<h3>
		<i class="icon-list-ul"></i>
		<?php if (isset($_smarty_tpl->tpl_vars['panel_title']->value)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['panel_title']->value,'html','UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Modules list'),$_smarty_tpl);?>
<?php }?>
	</h3>
	<div class="modules_list_container_tab row">
		<div class="col-lg-12">
			<?php if (count($_smarty_tpl->tpl_vars['modules_list']->value)) {?>
				<table class="table">
					<?php echo smarty_function_counter(array('start'=>1,'assign'=>"count"),$_smarty_tpl);?>

						<?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['modules_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
?>
							<?php ob_start();?><?php echo smarty_function_cycle(array('values'=>",row alt"),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ('controllers/modules/tab_module_line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('class_row'=>$_tmp1), 0);?>

						<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

					<?php } ?>
				</table>
				<?php if ($_smarty_tpl->tpl_vars['controller_name']->value=='AdminPayment'&&isset($_smarty_tpl->tpl_vars['view_all']->value)) {?>
					<div class="panel-footer">
						<div class="col-lg-4 col-lg-offset-4">
							<a class="btn btn-default btn-block" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModulesSf',true,array('filterCategoryTab'=>'payments_gateways')),'html','UTF-8');?>
">
								<i class="process-icon-payment"></i>
								<?php echo smartyTranslate(array('s'=>'View all available payments solutions'),$_smarty_tpl);?>

							</a>
						</div>
					</div>
				<?php }?>
			<?php } else { ?>
				<table class="table">
					<tr>
						<td>
							<div class="alert alert-warning">
							<?php if ($_smarty_tpl->tpl_vars['controller_name']->value=='AdminPayment') {?>
							<?php echo smartyTranslate(array('s'=>'It seems there are no recommended payment solutions for your country.'),$_smarty_tpl);?>
<br />
							<a class="_blank" href="https://www.prestashop.com/en/contact-us"><?php echo smartyTranslate(array('s'=>'Do you think there should be one? Let us know!'),$_smarty_tpl);?>
</a>
							<?php } else { ?><?php echo smartyTranslate(array('s'=>'No modules available in this section.'),$_smarty_tpl);?>
<?php }?></div>
						</td>
					</tr>
				</table>
			<?php }?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.fancybox-quick-view').each(function() {
            $(this).fancybox({
                type: 'ajax',
                autoDimensions: false,
                autoSize: false,
                width: 600,
                height: 'auto',
                helpers: {
                    overlay: {
                        locked: false
                    }
                },
                href: $(this).attr('href')+'&admin_list_from_source='+getControllerActionMap('read-more')
            });
        });
	});
</script>
<?php }} ?>
