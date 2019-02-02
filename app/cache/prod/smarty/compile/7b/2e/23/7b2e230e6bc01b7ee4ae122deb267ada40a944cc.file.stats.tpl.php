<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 13:40:06
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/stats/stats.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10244647005c366a36dfb258-28190136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b2e230e6bc01b7ee4ae122deb267ada40a944cc' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/stats/stats.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10244647005c366a36dfb258-28190136',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_name' => 0,
    'module_instance' => 0,
    'hook' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c366a36dff663_08350447',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c366a36dff663_08350447')) {function content_5c366a36dff663_08350447($_smarty_tpl) {?>

		<div class="panel">
			<?php if ($_smarty_tpl->tpl_vars['module_name']->value) {?>
				<?php if ($_smarty_tpl->tpl_vars['module_instance']->value&&$_smarty_tpl->tpl_vars['module_instance']->value->active) {?>
					<?php echo $_smarty_tpl->tpl_vars['hook']->value;?>

				<?php } else { ?>
					<?php echo smartyTranslate(array('s'=>'Module not found','d'=>'Admin.Stats.Notification'),$_smarty_tpl);?>

				<?php }?>
			<?php } else { ?>
				<h3 class="space"><?php echo smartyTranslate(array('s'=>'Please select a module from the left column.','d'=>'Admin.Stats.Notification'),$_smarty_tpl);?>
</h3>
			<?php }?>
		</div>
	</div>
</div>
<?php }} ?>
