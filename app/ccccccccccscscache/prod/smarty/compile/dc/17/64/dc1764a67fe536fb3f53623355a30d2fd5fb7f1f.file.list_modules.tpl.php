<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:22:38
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/modules_positions/list_modules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9547245235c319eae6243f5-09585040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc1764a67fe536fb3f53623355a30d2fd5fb7f1f' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/modules_positions/list_modules.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9547245235c319eae6243f5-09585040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'can_move' => 0,
    'modules' => 0,
    'module' => 0,
    'display_key' => 0,
    'url_submit' => 0,
    'hooks' => 0,
    'hook' => 0,
    'current' => 0,
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319eae702669_64267322',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319eae702669_64267322')) {function content_5c319eae702669_64267322($_smarty_tpl) {?>

<script type="text/javascript">
	var come_from = 'AdminModulesPositions';
</script>

<div></div>

<?php if (!$_smarty_tpl->tpl_vars['can_move']->value) {?>
					<p class="alert alert-warning">
						<?php echo smartyTranslate(array('s'=>'If you want to order/move the following data, please select a shop from the shop list.','d'=>'Admin.Design.Notification'),$_smarty_tpl);?>

					</p>
<?php }?>

<div class="row">
	<div class="col-lg-9">
		<div class="panel">
			<form class="well form-horizontal" id="position_filer">
				<div class="row">
					<div class="form-group col-lg-6 col-sm-12">
						<label class="control-label col-lg-4" style="text-align: left"><?php echo smartyTranslate(array('s'=>'Show','d'=>'Admin.Actions'),$_smarty_tpl);?>
</label>
						<div class="col-lg-7">
							<select id="show_modules" class="filter" style="width: 100%;">
								<option value="all"><?php echo smartyTranslate(array('s'=>'All modules','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>
&nbsp;</option>
								<?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['modules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['module']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
 $_smarty_tpl->tpl_vars['module']->iteration++;
?>
									<option value="<?php echo intval($_smarty_tpl->tpl_vars['module']->value->id);?>
"<?php if ($_smarty_tpl->tpl_vars['display_key']->value==$_smarty_tpl->tpl_vars['module']->value->id) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['module']->value->displayName,'html','UTF-8');?>
</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group col-lg-6 col-sm-12">
						<label class="control-label col-lg-offset-1 col-lg-4" style="text-align: left"><?php echo smartyTranslate(array('s'=>'Search for a hook','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>
</label>
						<div class="col-lg-7">
							<div class="input-group">
								<div class="input-group-addon"><i class="icon icon-search"></i></div>
								<input type="text" class="form-control" id="hook_search" name="hook_search" placeholder="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
							<p class="checkbox">
								<label class="control-label" for="hook_position">
									<input type="checkbox" id="hook_position"/>
									<?php echo smartyTranslate(array('s'=>'Display non-positionable hooks','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>

								</label>
							</p>
					</div>
				</div>
			</form>
			<div id="modulePosition">
				<form method="post" action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['url_submit']->value,'html','UTF-8');?>
" >
					<?php  $_smarty_tpl->tpl_vars['hook'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['hook']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hooks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['hook']->key => $_smarty_tpl->tpl_vars['hook']->value) {
$_smarty_tpl->tpl_vars['hook']->_loop = true;
?>
					<section class="hook_panel <?php if ($_smarty_tpl->tpl_vars['hook']->value['position']==0) {?>hook_position<?php }?>" <?php if ($_smarty_tpl->tpl_vars['hook']->value['position']==0) {?>style="display:none;"<?php }?>>
						<a name="<?php echo $_smarty_tpl->tpl_vars['hook']->value['name'];?>
"></a>
						<header class="hook_panel_header">
							<span class="hook_name"><?php echo $_smarty_tpl->tpl_vars['hook']->value['name'];?>
</span>
							<!-- <span class="hook_title"><?php echo $_smarty_tpl->tpl_vars['hook']->value['title'];?>
</span> -->
							<span class="badge pull-right">
								<?php if ($_smarty_tpl->tpl_vars['hook']->value['module_count']&&$_smarty_tpl->tpl_vars['can_move']->value) {?>
								<input type="checkbox" id="Ghook<?php echo $_smarty_tpl->tpl_vars['hook']->value['id_hook'];?>
" onclick="hookCheckboxes(<?php echo $_smarty_tpl->tpl_vars['hook']->value['id_hook'];?>
, 0, this)"/>
								<?php }?>
								<?php echo $_smarty_tpl->tpl_vars['hook']->value['module_count'];?>
 <?php if ($_smarty_tpl->tpl_vars['hook']->value['module_count']>1) {?><?php echo smartyTranslate(array('s'=>'Modules','d'=>'Admin.Global'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Module','d'=>'Admin.Global'),$_smarty_tpl);?>
<?php }?>
							</span>

							<?php if (!empty($_smarty_tpl->tpl_vars['hook']->value['description'])) {?>
							<div class="hook_description"><?php echo $_smarty_tpl->tpl_vars['hook']->value['description'];?>
</div>
							<?php }?>
						</header>

						<?php if ($_smarty_tpl->tpl_vars['hook']->value['module_count']) {?>
						<section class="module_list">
						<ul class="list-unstyled<?php if (count($_smarty_tpl->tpl_vars['hook']->value['modules'])>1) {?> sortable<?php }?>">

							<?php  $_smarty_tpl->tpl_vars['module'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['module']->_loop = false;
 $_smarty_tpl->tpl_vars['position'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['hook']->value['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['module']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['module']->key => $_smarty_tpl->tpl_vars['module']->value) {
$_smarty_tpl->tpl_vars['module']->_loop = true;
 $_smarty_tpl->tpl_vars['position']->value = $_smarty_tpl->tpl_vars['module']->key;
 $_smarty_tpl->tpl_vars['module']->iteration++;
?>
							<?php if (isset($_smarty_tpl->tpl_vars['module']->value['instance'])) {?>
							<li id="<?php echo intval($_smarty_tpl->tpl_vars['hook']->value['id_hook']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['module']->value['instance']->id);?>
" class="module_position_<?php echo intval($_smarty_tpl->tpl_vars['module']->value['instance']->id);?>
 module_list_item<?php if ($_smarty_tpl->tpl_vars['can_move']->value&&$_smarty_tpl->tpl_vars['hook']->value['module_count']>=2) {?> draggable<?php }?>">
								<div class="module_col_select">
									<input type="checkbox" id="mod<?php echo intval($_smarty_tpl->tpl_vars['hook']->value['id_hook']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['module']->value['instance']->id);?>
" class="modules-position-checkbox hook<?php echo $_smarty_tpl->tpl_vars['hook']->value['id_hook'];?>
" onclick="hookCheckboxes(<?php echo $_smarty_tpl->tpl_vars['hook']->value['id_hook'];?>
, 1, this)" name="unhooks[]" value="<?php echo $_smarty_tpl->tpl_vars['hook']->value['id_hook'];?>
_<?php echo $_smarty_tpl->tpl_vars['module']->value['instance']->id;?>
"/>
								</div>
								<?php if (!$_smarty_tpl->tpl_vars['display_key']->value) {?>
								<div class="module_col_position<?php if ($_smarty_tpl->tpl_vars['can_move']->value&&$_smarty_tpl->tpl_vars['hook']->value['module_count']>=2) {?> dragHandle<?php }?>" id="td_<?php echo intval($_smarty_tpl->tpl_vars['hook']->value['id_hook']);?>
_<?php echo $_smarty_tpl->tpl_vars['module']->value['instance']->id;?>
">
									<span class="positions"><?php echo $_smarty_tpl->tpl_vars['module']->iteration;?>
</span>
									<?php if ($_smarty_tpl->tpl_vars['can_move']->value) {?>
									<div class="btn-group-vertical">
										<a class="btn btn-default btn-xs" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['current']->value,'html','UTF-8');?>
&amp;id_module=<?php echo intval($_smarty_tpl->tpl_vars['module']->value['instance']->id);?>
&amp;id_hook=<?php echo intval($_smarty_tpl->tpl_vars['hook']->value['id_hook']);?>
&amp;direction=0&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['token']->value,'html','UTF-8');?>
&amp;changePosition#<?php echo $_smarty_tpl->tpl_vars['hook']->value['name'];?>
">
											<i class="icon-chevron-up"></i>
										</a>

										<a class="btn btn-default btn-xs" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['current']->value,'html','UTF-8');?>
&amp;id_module=<?php echo intval($_smarty_tpl->tpl_vars['module']->value['instance']->id);?>
&amp;id_hook=<?php echo intval($_smarty_tpl->tpl_vars['hook']->value['id_hook']);?>
&amp;direction=1&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['token']->value,'html','UTF-8');?>
&amp;changePosition#<?php echo $_smarty_tpl->tpl_vars['hook']->value['name'];?>
">
											<i class="icon-chevron-down"></i>
										</a>
									</div>
									<?php }?>
								</div>
								<?php }?>
								<div class="module_col_icon">
									<img width="57" src="../modules/<?php echo $_smarty_tpl->tpl_vars['module']->value['instance']->name;?>
/logo.png" alt="<?php echo stripslashes($_smarty_tpl->tpl_vars['module']->value['instance']->name);?>
" />
								</div>
								<div class="module_col_infos">
									<span class="module_name">
										<?php echo stripslashes($_smarty_tpl->tpl_vars['module']->value['instance']->displayName);?>
 <?php if ($_smarty_tpl->tpl_vars['module']->value['instance']->version) {?>
										<small class="text-muted">&nbsp;-&nbsp;v<?php if (intval($_smarty_tpl->tpl_vars['module']->value['instance']->version)==$_smarty_tpl->tpl_vars['module']->value['instance']->version) {?><?php echo sprintf('%.1f',$_smarty_tpl->tpl_vars['module']->value['instance']->version);?>
<?php } else { ?><?php echo floatval($_smarty_tpl->tpl_vars['module']->value['instance']->version);?>
<?php }?></small><?php }?>
									</span>
									<div class="module_description"><?php echo $_smarty_tpl->tpl_vars['module']->value['instance']->description;?>
</div>
								</div>
								<div class="module_col_actions">
									<!-- <div class="lab_modules_positions" for="mod<?php echo $_smarty_tpl->tpl_vars['hook']->value['id_hook'];?>
_<?php echo $_smarty_tpl->tpl_vars['module']->value['instance']->id;?>
"></div> -->
									<div class="btn-group">
										<a class="btn btn-default" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['current']->value,'html','UTF-8');?>
&amp;id_module=<?php echo intval($_smarty_tpl->tpl_vars['module']->value['instance']->id);?>
&amp;id_hook=<?php echo $_smarty_tpl->tpl_vars['hook']->value['id_hook'];?>
&amp;editGraft<?php if ($_smarty_tpl->tpl_vars['display_key']->value) {?>&amp;show_modules=<?php echo $_smarty_tpl->tpl_vars['display_key']->value;?>
<?php }?>&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['token']->value,'html','UTF-8');?>
">
											<i class="icon-pencil"></i>
											<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Admin.Actions'),$_smarty_tpl);?>

										</a>
										<a class="btn btn-default dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>&nbsp;
										</a>
										<ul class="dropdown-menu">
											<li>
												<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['current']->value,'html','UTF-8');?>
&amp;id_module=<?php echo intval($_smarty_tpl->tpl_vars['module']->value['instance']->id);?>
&amp;id_hook=<?php echo $_smarty_tpl->tpl_vars['hook']->value['id_hook'];?>
&amp;deleteGraft<?php if ($_smarty_tpl->tpl_vars['display_key']->value) {?>&amp;show_modules=<?php echo $_smarty_tpl->tpl_vars['display_key']->value;?>
<?php }?>&amp;token=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['token']->value,'html','UTF-8');?>
">
													<i class="icon-minus-sign-alt"></i>
													<?php echo smartyTranslate(array('s'=>'Unhook','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>

												</a>
											</li>
										</ul>
									</div>
								</div>
							</li>
							<?php }?>
						<?php } ?>
						</ul>
						</section>
	<?php } else { ?>
							<!-- <p><?php echo smartyTranslate(array('s'=>'No module was found for this hook.'),$_smarty_tpl);?>
</p> -->
	<?php }?>
					</section>
<?php } ?>
					<div id="unhook_button_position_bottom">
						<button type="submit" class="btn btn-default" name="unhookform">
							<i class="icon-minus-sign-alt"></i>
							<?php echo smartyTranslate(array('s'=>'Unhook the selection','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>

						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="panel" id="modules-position-selection-panel">
			<h3><i class="icon-check"></i> <?php echo smartyTranslate(array('s'=>'Selection','d'=>'Admin.Global'),$_smarty_tpl);?>
</h3>
			<p>
				<span id="modules-position-single-selection"><?php echo smartyTranslate(array('s'=>'1 module selected','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>
</span>
				<span id="modules-position-multiple-selection">
					<span id="modules-position-selection-count"></span> <?php echo smartyTranslate(array('s'=>'modules selected','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>

				</span>
			</p>
			<div class="text-center">
				<button class="btn btn-default"><i class="icon-remove"></i> <?php echo smartyTranslate(array('s'=>'Unhook the selection','d'=>'Admin.Design.Feature'),$_smarty_tpl);?>
</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.sortable').sortable({
		forcePlaceholderSize: true
	}).bind('sortupdate', function(e, ui) {
		var ids = ui.item.attr('id').split('_');
		var way = (ui.start_index < ui.end_index)? 1 : 0;
		var data = ids[0]+'[]=';

		$.each(e.target.children, function(index, element) {
			data += '&'+ids[0]+'[]='+$(element).attr('id');
		});

		$.ajax({
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			async: false,
			url: currentIndex + '&token=' + token + '&' + 'rand=' + new Date().getTime(),
			data: data + '&action=updatePositions&id_hook='+ids[0]+'&id_module='+ids[1]+'&way='+way+'&ajax=1' ,
			success: function(data) {
				start = 0;

				$.each(e.target.children, function(index, element) {
					$(element).find('.positions').html(++start);
				});

				showSuccessMessage(update_success_msg);
			}
		});
	});
</script>
<?php }} ?>
