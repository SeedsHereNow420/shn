<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 12:15:43
         compiled from "modules/hioutofstocknotification/views/templates/hook/subscribe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1148477465c36566fb552c8-08140237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bae8dc5852203465428fe93a0b8e98d6698613c' => 
    array (
      0 => 'modules/hioutofstocknotification/views/templates/hook/subscribe.tpl',
      1 => 1519199271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1148477465c36566fb552c8-08140237',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'psv' => 0,
    'link' => 0,
    'base_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c36566fb784e3_06168024',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c36566fb784e3_06168024')) {function content_5c36566fb784e3_06168024($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['psv']->value>=1.7) {?>
	<a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getModuleLink('hioutofstocknotification','subscribe'),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
      <span class="link-item">
        <i class="material-icons">notifications</i>
        <?php echo smartyTranslate(array('s'=>'Out of stock subscriptions','mod'=>'hioutofstocknotification'),$_smarty_tpl);?>

      </span>
    </a>
<?php } else { ?>
	<li>
		<?php if ($_smarty_tpl->tpl_vars['psv']->value<1.6) {?>
			<img src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['base_dir']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
modules/hioutofstocknotification/views/img/bullhorn.png" class="oosn_bullhorn"> 
			<a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getModuleLink('hioutofstocknotification','subscribe'),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"/>
				<?php echo smartyTranslate(array('s'=>'Out of stock subscriptions','mod'=>'hioutofstocknotification'),$_smarty_tpl);?>

			</a>
		<?php } else { ?>
			<a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getModuleLink('hioutofstocknotification','subscribe'),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"/> 
				<i class="icon-bullhorn"></i>
				<span><?php echo smartyTranslate(array('s'=>'out of stock subscriptions','mod'=>'hioutofstocknotification'),$_smarty_tpl);?>
</span>
			</a>
		<?php }?>
	</li>
<?php }?>


 <?php }} ?>
