<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:06:42
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/images/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15316260375c33872278a7c6-09926802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d87d66be9352c89884265eccb7cf1397e76f06b' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/images/content.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15316260375c33872278a7c6-09926802',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
    'display_move' => 0,
    'current' => 0,
    'token' => 0,
    'table' => 0,
    'display_regenerate' => 0,
    'types' => 0,
    'k' => 0,
    'type' => 0,
    'formats' => 0,
    'format' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3387227bce37_27237509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3387227bce37_27237509')) {function content_5c3387227bce37_27237509($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
	<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['display_move']->value)&&$_smarty_tpl->tpl_vars['display_move']->value) {?>
    <form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['current']->value,'html','UTF-8');?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['token']->value,'html','UTF-8');?>
" method="post" class="form-horizontal">
        <div class="panel">
            <h3>
                <i class="icon-picture"></i>
                <?php echo smartyTranslate(array('s'=>'Move images','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>

            </h3>
            <div class="alert alert-warning">
                <p><?php echo smartyTranslate(array('s'=>'You can choose to keep your images stored in the previous system. There\'s nothing wrong with that.','d'=>'Admin.Design.Notification'),$_smarty_tpl);?>
</p>
                <p><?php echo smartyTranslate(array('s'=>'You can also decide to move your images to the new storage system. In this case, click on the "Move images" button below. Please be patient. This can take several minutes.','d'=>'Admin.Design.Notification'),$_smarty_tpl);?>
</p>
            </div>
            <div class="alert alert-info">&nbsp;
                <?php echo smartyTranslate(array('s'=>'After moving all of your product images, set the "Use the legacy image filesystem" option above to "No" for best performance.','d'=>'Admin.Design.Notification'),$_smarty_tpl);?>

            </div>
            <div class="row">
                <div class="col-lg-12 pull-right">
                    <button type="submit" name="submitMoveImages<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" class="btn btn-default pull-right" onclick="return confirm('<?php echo smartyTranslate(array('s'=>'Are you sure?','d'=>'Admin.Notifications.Warning'),$_smarty_tpl);?>
');"><i class="process-icon-cogs"></i> <?php echo smartyTranslate(array('s'=>'Move images','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>
</button>
                </div>
            </div>
        </div>
    </form>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['display_regenerate']->value)) {?>

	<form class="form-horizontal" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['current']->value,'html','UTF-8');?>
&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['token']->value,'html','UTF-8');?>
" method="post">
		<div class="panel">
			<h3>
                <i class="icon-picture"></i>
                <?php echo smartyTranslate(array('s'=>'Regenerate thumbnails','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>

            </h3>

			<div class="alert alert-info">
				<?php echo smartyTranslate(array('s'=>'Regenerates thumbnails for all existing images','d'=>'Admin.Design.Help'),$_smarty_tpl);?>
<br />
				<?php echo smartyTranslate(array('s'=>'Please be patient. This can take several minutes.','d'=>'Admin.Design.Help'),$_smarty_tpl);?>
<br />
				<?php echo smartyTranslate(array('s'=>'Be careful! Manually uploaded thumbnails will be erased and replaced by automatically generated thumbnails.','d'=>'Admin.Design.Help'),$_smarty_tpl);?>

			</div>

			<div class="form-group">
				<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Select an image','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>
</label>
				<div class="col-lg-9">
					<select name="type" onchange="changeFormat(this)">
						<option value="all"><?php echo smartyTranslate(array('s'=>'All','d'=>'Admin.Global'),$_smarty_tpl);?>
</option>
						<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['type']->key;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</option>
						<?php } ?>
					</select>
				</div>
			</div>

			<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['type']->key;
?>
			<div class="form-group second-select format_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" style="display:none;">
				<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Select a format','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>
</label>
				<div class="col-lg-9 margin-form">
					<select name="format_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
						<option value="all"><?php echo smartyTranslate(array('s'=>'All','d'=>'Admin.Global'),$_smarty_tpl);?>
</option>
						<?php  $_smarty_tpl->tpl_vars['format'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['format']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formats']->value[$_smarty_tpl->tpl_vars['k']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['format']->key => $_smarty_tpl->tpl_vars['format']->value) {
$_smarty_tpl->tpl_vars['format']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['format']->value['id_image_type'];?>
"><?php echo $_smarty_tpl->tpl_vars['format']->value['name'];?>
</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<?php } ?>
			<script>
				function changeFormat(elt)
				{
					$('.second-select').hide();
					$('.format_' + $(elt).val()).show();
				}
			</script>

			<div class="form-group">
				<label class="control-label col-lg-3">
					<?php echo smartyTranslate(array('s'=>'Erase previous images','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>

				</label>
				<div class="col-lg-9">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="erase" id="erase_on" value="1" checked="checked">
						<label for="erase_on" class="radioCheck">
							<?php echo smartyTranslate(array('s'=>'Yes','d'=>'Admin.Global'),$_smarty_tpl);?>

						</label>
						<input type="radio" name="erase" id="erase_off" value="0">
						<label for="erase_off" class="radioCheck">
							<?php echo smartyTranslate(array('s'=>'No','d'=>'Admin.Global'),$_smarty_tpl);?>

						</label>
						<a class="slide-button btn"></a>
					</span>
					<p class="help-block">
						<?php echo smartyTranslate(array('s'=>'Select "No" only if your server timed out and you need to resume the regeneration.','html'=>1,'d'=>'Admin.Design.Help'),$_smarty_tpl);?>

					</p>
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" name="submitRegenerate<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
" class="btn btn-default pull-right" onclick="return confirm('<?php echo smartyTranslate(array('s'=>'Are you sure?','d'=>'Admin.Notifications.Warning'),$_smarty_tpl);?>
');">
					<i class="process-icon-cogs"></i> <?php echo smartyTranslate(array('s'=>'Regenerate thumbnails','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>

				</button>
			</div>
		</div>
	</form>
<?php }?>
<?php }} ?>
