<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 08:54:41
         compiled from "/var/www/html/SHN/modules/wknewsticker/views/templates/admin/news_ticker/helpers/form/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17779968735c362751266fb4-50104122%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '638c758a29e58a19a468d3f7748cbbafd113dc5d' => 
    array (
      0 => '/var/www/html/SHN/modules/wknewsticker/views/templates/admin/news_ticker/helpers/form/form.tpl',
      1 => 1512974766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17779968735c362751266fb4-50104122',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current' => 0,
    'submit_action' => 0,
    'ticker' => 0,
    'token' => 0,
    'languages' => 0,
    'language' => 0,
    'default_lang' => 0,
    'lang' => 0,
    'total_languages' => 0,
    'default_lang_isocode' => 0,
    'configColor' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3627512bc839_48761409',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3627512bc839_48761409')) {function content_5c3627512bc839_48761409($_smarty_tpl) {?>
<form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&<?php if (!empty($_smarty_tpl->tpl_vars['submit_action']->value)) {?><?php echo $_smarty_tpl->tpl_vars['submit_action']->value;?>
<?php if (isset($_smarty_tpl->tpl_vars['ticker']->value)&&$_smarty_tpl->tpl_vars['ticker']->value['id_news_ticker']) {?>&id_news_ticker=<?php echo $_smarty_tpl->tpl_vars['ticker']->value['id_news_ticker'];?>
<?php }?><?php }?>&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" method="post" enctype="multipart/form-data">
	<div class="panel">
		<div class="panel-heading">
			<i class="icon-newspaper-o"></i>
			<?php if (isset($_smarty_tpl->tpl_vars['ticker']->value)&&$_smarty_tpl->tpl_vars['ticker']->value) {?>
				<?php echo smartyTranslate(array('s'=>'Edit Ticker','mod'=>'wknewsticker'),$_smarty_tpl);?>

			<?php } else { ?>
				<?php echo smartyTranslate(array('s'=>'Add new Ticker','mod'=>'wknewsticker'),$_smarty_tpl);?>

			<?php }?>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="tickermsg" class="col-lg-3 control-label required"><span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="<?php echo smartyTranslate(array('s'=>'Write ticker message to display','mod'=>'wknewsticker'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Ticker Message','mod'=>'wknewsticker'),$_smarty_tpl);?>
</span></label>
				<div class="col-lg-7">
					<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
						<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["lang"] = new Smarty_variable($_tmp1, null, 0);?>
						<?php $_smarty_tpl->tpl_vars["wk_message"] = new Smarty_variable("wk_message_".((string)$_smarty_tpl->tpl_vars['language']->value['id_lang']), null, 0);?>
						<div id="wk_msg_div_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" class="wk_msg_div_all" <?php if ($_smarty_tpl->tpl_vars['default_lang']->value!=$_smarty_tpl->tpl_vars['language']->value['id_lang']) {?>style="display:none;"<?php }?>>
							<textarea name="wk_message_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
"
							id="wk_message_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" cols="2" placeholder="<?php echo smartyTranslate(array('s'=>'Example ticker message','mod'=>'wknewsticker'),$_smarty_tpl);?>
" rows="1" class="form-control"><?php if (isset($_POST['wk_message'])) {?><?php echo $_POST['wk_message'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['ticker']->value)) {?><?php echo $_smarty_tpl->tpl_vars['ticker']->value['message'][$_smarty_tpl->tpl_vars['lang']->value];?>
<?php }?><?php }?></textarea>
						</div>
					<?php } ?>
		  		</div>
		  		<?php if ($_smarty_tpl->tpl_vars['total_languages']->value>1) {?>
				<div class="col-lg-2">
					<button type="button" id="wk_msg_btn" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<?php echo $_smarty_tpl->tpl_vars['default_lang_isocode']->value;?>

						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
							<li>
								<a href="javascript:void(0)" onclick="showNewsTickerLangField('<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
', <?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
);"><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
</a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<?php }?>
			</div>

			<div class="form-group">
				<label for="wk_url" class="col-lg-3 control-label"><span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="<?php echo smartyTranslate(array('s'=>'Write url on which you wants to redirect','mod'=>'wknewsticker'),$_smarty_tpl);?>
">
				<?php echo smartyTranslate(array('s'=>'Url','mod'=>'wknewsticker'),$_smarty_tpl);?>
</span></label>
				<div class="col-lg-7">
					<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
						<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["lang"] = new Smarty_variable($_tmp2, null, 0);?>
						<?php $_smarty_tpl->tpl_vars["wk_url"] = new Smarty_variable("wk_url_".((string)$_smarty_tpl->tpl_vars['language']->value['id_lang']), null, 0);?>
						<div id="wk_url_div_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" class="wk_url_div_all"<?php if ($_smarty_tpl->tpl_vars['default_lang']->value!=$_smarty_tpl->tpl_vars['language']->value['id_lang']) {?>style="display:none;"<?php }?>>
							<textarea name="wk_url_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" id="wk_url_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" cols="2" placeholder="<?php echo smartyTranslate(array('s'=>'http://example.com/','mod'=>'wknewsticker'),$_smarty_tpl);?>
" rows="1" class="form-control"><?php if (isset($_POST['wk_url'])) {?><?php echo $_POST['wk_url'];?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['ticker']->value)) {?><?php echo $_smarty_tpl->tpl_vars['ticker']->value['url'][$_smarty_tpl->tpl_vars['lang']->value];?>
<?php }?><?php }?></textarea>
						</div>
					<?php } ?>
		  		</div>
		  		<?php if ($_smarty_tpl->tpl_vars['total_languages']->value>1) {?>
				<div class="col-lg-2">
					<button type="button" id="wk_url_btn" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<?php echo $_smarty_tpl->tpl_vars['default_lang_isocode']->value;?>

						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
							<li>
								<a href="javascript:void(1)" onclick="showNewsTickerLangField('<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
', <?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
);"><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
</a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<?php }?>
			</div>

			<div class="form-group">
				<label for="wk_font_color" class="col-lg-3 control-label">
					<span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="<?php echo smartyTranslate(array('s'=>'choose the color for text.','mod'=>'wknewsticker'),$_smarty_tpl);?>
">
						<?php echo smartyTranslate(array('s'=>'Font Color ','mod'=>'wknewsticker'),$_smarty_tpl);?>

					</span>
				</label>
				<div class="input-group col-lg-3">
					<input type="color" name="wk_font_color" class="form-control mColorPickerInput" data-hex="true" value="<?php if (isset($_POST['wk_font_color'])) {?><?php echo $_POST['wk_font_color'];?>
<?php } elseif (isset($_smarty_tpl->tpl_vars['ticker']->value)) {?><?php echo $_smarty_tpl->tpl_vars['ticker']->value['color'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['configColor']->value;?>
<?php }?>"/>
				</div>
			</div>
        	<div class="form-group row">
                <label class="control-label col-lg-3 col-md-3 col-xs-3 text-right">
                    <span class="label-tooltip" data-toggle="tooltip" data-html="true" title="<?php echo smartyTranslate(array('s'=>'Select whether ticker mesaage displayed or not.','mod'=>'wknewsticker'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Enable','mod'=>'wknewsticker'),$_smarty_tpl);?>
</span>
                </label>
                <div class="col-lg-3 col-md-3 col-xs-3 col-offset-lg-6">
                    <span class="switch prestashop-switch fixed-width-lg">
                        <input type="radio" value="1" id="wk_active_on" name="wk_active" <?php if (isset($_POST['wk_active'])) {?><?php if ($_POST['wk_active']==1) {?> checked="checked"<?php }?>
                        <?php } elseif (isset($_smarty_tpl->tpl_vars['ticker']->value['active'])) {?><?php if ($_smarty_tpl->tpl_vars['ticker']->value['active']==1) {?> checked="checked"<?php }?><?php } else { ?> checked="checked"<?php }?> />
                        <label class="radioCheck" for="wk_active_on"><?php echo smartyTranslate(array('s'=>'Yes','mod'=>'wknewsticker'),$_smarty_tpl);?>
</label>
                        <input type="radio" value="0" id="wk_active_off" name="wk_active" <?php if (isset($_POST['wk_active'])) {?><?php if ($_POST['wk_active']==0) {?> checked="checked"<?php }?><?php } elseif (isset($_smarty_tpl->tpl_vars['ticker']->value['active'])) {?><?php if ($_smarty_tpl->tpl_vars['ticker']->value['active']==0) {?> checked="checked"<?php }?><?php }?> />
                        <label class="radioCheck" for="wk_active_off"><?php echo smartyTranslate(array('s'=>'No','mod'=>'wknewsticker'),$_smarty_tpl);?>
</label>
                        <a class="slide-button btn"></a>
                    </span>
                </div>
			</div>
		</div>
		<div class="panel-footer">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminNewsTicker');?>
" class="btn btn-default"><i class="process-icon-cancel"></i> <?php echo smartyTranslate(array('s'=>'Cancel','mod'=>'wknewsticker'),$_smarty_tpl);?>
</a>
			<button type="submit" value="1" id="newsTickerSubmit" name="submitAddwk_news_ticker" class="btn btn-default pull-right">
				<i class="process-icon-save"></i><?php echo smartyTranslate(array('s'=>'Save','mod'=>'wknewsticker'),$_smarty_tpl);?>

			</button>
			<button type="submit" name="submitAddwk_news_tickerAndStay" class="btn btn-default pull-right"><i class="process-icon-save"></i><?php echo smartyTranslate(array('s'=>'Save and stay','mod'=>'wknewsticker'),$_smarty_tpl);?>
</button>
		</div>
	</div>
</form>
<?php }} ?>
