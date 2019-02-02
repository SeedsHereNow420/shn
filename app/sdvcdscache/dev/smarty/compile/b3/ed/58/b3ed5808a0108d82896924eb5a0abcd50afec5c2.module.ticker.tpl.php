<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:16:48
         compiled from "module:wknewsticker/views/templates/hook/ticker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9480646745c31ab600185d2-84341990%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3ed5808a0108d82896924eb5a0abcd50afec5c2' => 
    array (
      0 => 'module:wknewsticker/views/templates/hook/ticker.tpl',
      1 => 1512974766,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '9480646745c31ab600185d2-84341990',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'configValue' => 0,
    'tickerDetail' => 0,
    'tickerValues' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31ab60026582_56336276',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31ab60026582_56336276')) {function content_5c31ab60026582_56336276($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.math.php';
?><!-- begin /var/www/html/SHN/modules/wknewsticker/views/templates/hook/ticker.tpl -->
<style type="text/css">
#wk_news_ticker_main_block {
	background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['configValue']->value['backColor'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;
	height: <?php echo smarty_function_math(array('equation'=>"x + y",'x'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['configValue']->value['fontSize'],'htmlall','UTF-8'),'y'=>20),$_smarty_tpl);?>
px;
}
#wk_news_ticker_block {
	height: inherit;
}
#wk_news_ticker_text {
	height: inherit;
}
#wk_news_ticker_text span {
	height: inherit;
	font-size: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['configValue']->value['fontSize'], ENT_QUOTES, 'UTF-8');?>
px;
}
#wk_news_ticker_text span {
	line-height: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['configValue']->value['fontSize'], ENT_QUOTES, 'UTF-8');?>
px;
}
</style>
<?php if (isset($_smarty_tpl->tpl_vars['tickerDetail']->value)&&$_smarty_tpl->tpl_vars['tickerDetail']->value) {?>
	<div id="wk_news_ticker_main_block">
		<div id="wk_news_ticker_block">
			<div id="wk_news_ticker_text">
				<?php  $_smarty_tpl->tpl_vars['tickerValues'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tickerValues']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tickerDetail']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tickerValues']->key => $_smarty_tpl->tpl_vars['tickerValues']->value) {
$_smarty_tpl->tpl_vars['tickerValues']->_loop = true;
?>
					<span style="color: <?php if ($_smarty_tpl->tpl_vars['tickerValues']->value['color']) {?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tickerValues']->value['color'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['configValue']->value['fontColor'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php }?>;">
					<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tickerValues']->value['anchor_link'], ENT_QUOTES, 'UTF-8');?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1) {?>
						<a style="color: <?php if ($_smarty_tpl->tpl_vars['tickerValues']->value['color']) {?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tickerValues']->value['color'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['configValue']->value['fontColor'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php }?>" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tickerValues']->value['anchor_link'],'quotes','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" target="_blank"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tickerValues']->value['message'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a>
					<?php } else { ?>
						<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['tickerValues']->value['message'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>

					<?php }?>
					</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php } ?>
			</div>
		</div>
	</div>
<?php }?>
<!-- end /var/www/html/SHN/modules/wknewsticker/views/templates/hook/ticker.tpl --><?php }} ?>
