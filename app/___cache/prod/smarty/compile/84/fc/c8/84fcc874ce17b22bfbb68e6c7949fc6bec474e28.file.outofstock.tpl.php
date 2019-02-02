<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 20:06:13
         compiled from "modules/hioutofstocknotification/views/templates/hook/outofstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7122896515c317eb5a37ba3-39183698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84fcc874ce17b22bfbb68e6c7949fc6bec474e28' => 
    array (
      0 => 'modules/hioutofstocknotification/views/templates/hook/outofstock.tpl',
      1 => 1519199271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7122896515c317eb5a37ba3-39183698',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'display_oosn' => 0,
    'order_out_of_stock' => 0,
    'oosn_position' => 0,
    'show_subscribe_form' => 0,
    'psv' => 0,
    'logged' => 0,
    'oosn_auto_fill_on' => 0,
    'oosn_customer' => 0,
    'id_combination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c317eb5a43730_77198313',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c317eb5a43730_77198313')) {function content_5c317eb5a43730_77198313($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['display_oosn']->value&&$_smarty_tpl->tpl_vars['order_out_of_stock']->value) {?>
	<div class="subscribe_form_content">
		<?php if ($_smarty_tpl->tpl_vars['oosn_position']->value=='popup') {?>
			<a class="oosn-popup <?php if (!$_smarty_tpl->tpl_vars['show_subscribe_form']->value) {?> hide <?php }?>" href="#oosn-popup-container"><?php echo smartyTranslate(array('s'=>'Subscribe To When In Stock','mod'=>'hioutofstocknotification'),$_smarty_tpl);?>
</a>
			<div id="oosn-popup-container" class="oosn-popup-container">
		<?php }?>
				<div id="hi-oosn-block" class="<?php if (!$_smarty_tpl->tpl_vars['show_subscribe_form']->value) {?>hide<?php }?> clearfix">
					<span class="hi-oosn-title"><?php echo smartyTranslate(array('s'=>'Subscribe To When In Stock','mod'=>'hioutofstocknotification'),$_smarty_tpl);?>
</span>
					<div class="hi-oosn-email-content clearfix">
						<input type="text" name="hi_stock_email" <?php if ($_smarty_tpl->tpl_vars['psv']->value<1.6) {?> class="hi_stock_email_" <?php } else { ?> class="hi_stock_email" <?php }?> placeholder="<?php echo smartyTranslate(array('s'=>'Email','mod'=>'hioutofstocknotification'),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['logged']->value&&$_smarty_tpl->tpl_vars['oosn_auto_fill_on']->value) {?> value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['oosn_customer']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
						<button type="submit" class="oosn-button" id="submit_subscribe">
						</button>
						<input type="hidden" name="product_combination_id" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_combination']->value, ENT_QUOTES, 'UTF-8');?>
">
						<div class="hi-oosn-invalid-email hide">
							<div></div>
							<span></span>
						</div>
					</div>
				</div>
				<div class="<?php if ($_smarty_tpl->tpl_vars['psv']->value>=1.6) {?> alert alert-success <?php } else { ?> success <?php }?> hi-oosn-success hide">
					<?php echo smartyTranslate(array('s'=>'You have successfully subscribed to this product','mod'=>'hioutofstocknotification'),$_smarty_tpl);?>

				</div>
		<?php if ($_smarty_tpl->tpl_vars['oosn_position']->value=="popup") {?>
			</div>
		<?php }?>
	</div>
<?php }?>
<?php }} ?>
