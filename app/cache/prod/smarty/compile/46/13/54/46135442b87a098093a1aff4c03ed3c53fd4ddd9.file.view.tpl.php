<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 09:11:13
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/customer_threads/helpers/view/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17076232475c362b3165e555-75726429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46135442b87a098093a1aff4c03ed3c53fd4ddd9' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/customer_threads/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '7cac1082554124db66226276f88c32a350f4f98e' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/helpers/view/view.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '45b0797ce8cf0f452b7f85552853db5f966443c9' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/customer_threads/helpers/view/modal.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    '161def178f899f599b9e6a3cfb0a1a4aac7bd03d' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/customer_threads/helpers/view/message.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
    'ba1a3eece6f53eea7319ab812d2df0d7b983067d' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/controllers/customer_threads/helpers/view/timeline_item.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17076232475c362b3165e555-75726429',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'name_controller' => 0,
    'hookName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c362b316f6787_69657805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c362b316f6787_69657805')) {function content_5c362b316f6787_69657805($_smarty_tpl) {?>

<div class="leadin"></div>


<?php /*  Call merged included template "./modal.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./modal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '17076232475c362b3165e555-75726429');
content_5c362b31684ba2_92916982($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "./modal.tpl" */?>
<div class="panel">
	<div class="panel-heading">
		<i class="icon-comments"></i>
		<?php echo smartyTranslate(array('s'=>"Thread",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
: <span class="badge">#<?php echo intval($_smarty_tpl->tpl_vars['id_customer_thread']->value);?>
</span>
		<?php if (isset($_smarty_tpl->tpl_vars['next_thread']->value)&&$_smarty_tpl->tpl_vars['next_thread']->value) {?>
			<a class="btn btn-default pull-right" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['next_thread']->value['href'],'html','UTF-8');?>
">
				<?php echo $_smarty_tpl->tpl_vars['next_thread']->value['name'];?>
 <i class="icon-forward"></i>
			</a>
		<?php }?>
	</div>
	<div class="well">
		<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomerThreads'),'html','UTF-8');?>
&amp;viewcustomer_thread&amp;id_customer_thread=<?php echo intval($_smarty_tpl->tpl_vars['id_customer_thread']->value);?>
" method="post" enctype="multipart/form-data" class="form-horizontal">
			<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['actions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value) {
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
				<button class="btn btn-default" name="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value['name'],'html','UTF-8');?>
" value="<?php echo intval($_smarty_tpl->tpl_vars['action']->value['value']);?>
">
					<?php if (isset($_smarty_tpl->tpl_vars['action']->value['icon'])) {?><i class="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['action']->value['icon'],'html','UTF-8');?>
"></i><?php }?><?php echo $_smarty_tpl->tpl_vars['action']->value['label'];?>

				</button>
			<?php } ?>
			<button class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal">
				<?php echo smartyTranslate(array('s'=>"Forward this discussion to another employee",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

			</button>
		</form>
	</div>
	<div class="row">
		<div class="message-item-initial media">
			<a href="<?php if (isset($_smarty_tpl->tpl_vars['customer']->value->id)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomers'),'html','UTF-8');?>
&amp;id_customer=<?php echo intval($_smarty_tpl->tpl_vars['customer']->value->id);?>
&amp;viewcustomer&<?php } else { ?>#<?php }?>" class="avatar-lg pull-left"><i class="icon-user icon-3x"></i></a>
			<div class="media-body">
				<div class="row">
					<div class="col-sm-6">
					<?php if (isset($_smarty_tpl->tpl_vars['customer']->value->firstname)) {?>
						<h2>
							<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomers'),'html','UTF-8');?>
&amp;id_customer=<?php echo intval($_smarty_tpl->tpl_vars['customer']->value->id);?>
&amp;viewcustomer&">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['customer']->value->firstname,'html','UTF-8');?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['customer']->value->lastname,'html','UTF-8');?>
 <small>(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['customer']->value->email,'html','UTF-8');?>
)</small>
							</a>
						</h2>
					<?php } else { ?>
						<h2><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['thread']->value->email,'html','UTF-8');?>
</h2>
					<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['contact']->value)&&trim($_smarty_tpl->tpl_vars['contact']->value)!='') {?>
						<span><?php echo smartyTranslate(array('s'=>"To:",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 </span><span class="badge"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['contact']->value,'html','UTF-8');?>
</span>
					<?php }?>
					</div>
					<?php if (isset($_smarty_tpl->tpl_vars['customer']->value->firstname)) {?>
						<div class="col-sm-6">
							<p>
							<?php if ($_smarty_tpl->tpl_vars['count_ok']->value) {?>
								<?php echo smartyTranslate(array('s'=>'[1]%count%[/1] order(s) validated for a total amount of [2]%total%[/2]','html'=>true,'sprintf'=>array('%count%'=>$_smarty_tpl->tpl_vars['count_ok']->value,'%total%'=>$_smarty_tpl->tpl_vars['total_ok']->value,'[1]'=>'<span class="badge">','[/1]'=>'</span>','[2]'=>'<span class="badge badge-success">','[/2]'=>'</span>'),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

							<?php } else { ?>
								<?php echo smartyTranslate(array('s'=>"No orders validated for the moment",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

							<?php }?>
							</p>
							<p class="text-muted"><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['customer']->value->date_add,'full'=>0),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smartyTranslate(array('s'=>"Customer since: %s",'sprintf'=>array($_tmp1),'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</p>
						</div>
					<?php }?>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<?php if (!$_smarty_tpl->tpl_vars['first_message']->value['id_employee']) {?>
							<?php /*  Call merged included template "./message.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['first_message']->value,'initial'=>true), 0, '17076232475c362b3165e555-75726429');
content_5c362b316b4fd9_93957360($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "./message.tpl" */?>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value) {
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
			<?php /*  Call merged included template "./message.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('message'=>$_smarty_tpl->tpl_vars['message']->value,'initial'=>false), 0, '17076232475c362b3165e555-75726429');
content_5c362b316b4fd9_93957360($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "./message.tpl" */?>
		<?php } ?>
	</div>
</div>
<div class="panel">
	<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomerThreads'),'html','UTF-8');?>
&amp;id_customer_thread=<?php echo intval($_smarty_tpl->tpl_vars['thread']->value->id);?>
&amp;viewcustomer_thread" method="post" enctype="multipart/form-data" class="form-horizontal">
	<h3><?php echo smartyTranslate(array('s'=>"Your answer to",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
 <?php if (isset($_smarty_tpl->tpl_vars['customer']->value->firstname)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['customer']->value->firstname,'html','UTF-8');?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['customer']->value->lastname,'html','UTF-8');?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['thread']->value->email;?>
<?php }?></h3>
	<div class="row">
		<div class="media">
			<div class="pull-left">
				<span class="avatar-md"><?php if (isset($_smarty_tpl->tpl_vars['current_employee']->value->firstname)) {?><img src="<?php echo $_smarty_tpl->tpl_vars['current_employee']->value->getImage();?>
" alt=""><?php }?></span>
			</div>
			<div class="media-body">
				<textarea cols="30" rows="7" name="reply_message"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['PS_CUSTOMER_SERVICE_SIGNATURE']->value,'html','UTF-8');?>
</textarea>
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<!--
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			<i class="icon-magic icon-2x"></i><br>
			<?php echo smartyTranslate(array('s'=>"Choose a template"),$_smarty_tpl);?>

		</button>
		-->
		<button class="btn btn-default pull-right" name="submitReply"><i class="process-icon-mail-reply"></i> <?php echo smartyTranslate(array('s'=>"Send"),$_smarty_tpl);?>
</button>
		<input type="hidden" name="id_customer_thread" value="<?php echo intval($_smarty_tpl->tpl_vars['thread']->value->id);?>
" />
		<input type="hidden" name="msg_email" value="<?php echo $_smarty_tpl->tpl_vars['thread']->value->email;?>
" />
	</div>
	</form>
</div>

<?php if (count($_smarty_tpl->tpl_vars['timeline_items']->value)) {?>
<div class="panel">
	<h3>
		<i class="icon-clock-o"></i>
		<?php echo smartyTranslate(array('s'=>"Orders and messages timeline",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>

	</h3>
	<div class="timeline">
		<?php  $_smarty_tpl->tpl_vars['dates'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dates']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['timeline_items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dates']->key => $_smarty_tpl->tpl_vars['dates']->value) {
$_smarty_tpl->tpl_vars['dates']->_loop = true;
?>
			<?php  $_smarty_tpl->tpl_vars['timeline_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['timeline_item']->_loop = false;
 $_smarty_tpl->tpl_vars['date'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['dates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['timeline_item']->key => $_smarty_tpl->tpl_vars['timeline_item']->value) {
$_smarty_tpl->tpl_vars['timeline_item']->_loop = true;
 $_smarty_tpl->tpl_vars['date']->value = $_smarty_tpl->tpl_vars['timeline_item']->key;
?>
				<?php /*  Call merged included template "controllers/customer_threads/helpers/view/timeline_item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("controllers/customer_threads/helpers/view/timeline_item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('timeline_item'=>$_smarty_tpl->tpl_vars['timeline_item']->value), 0, '17076232475c362b3165e555-75726429');
content_5c362b316de6b7_03083062($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "controllers/customer_threads/helpers/view/timeline_item.tpl" */?>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<?php }?>
<script type="text/javascript">
	var timer;
		$(document).ready(function(){
			$('select[name=id_employee_forward]').change(function(){
				if ($(this).val() >= 0)
					$('#message_forward').show(400);
				else
					$('#message_forward').hide(200);
				if ($(this).val() == 0)
					$('#message_forward_email').show(200);
				else
					$('#message_forward_email').hide(200);
			});
			$('textarea[name=message_forward]').click(function(){
				if($(this).val() == '<?php echo smartyTranslate(array('s'=>'You can add a comment here.'),$_smarty_tpl);?>
')
				{
					$(this).val('');
				}
			});
			timer = setInterval("markAsRead()", 3000);
		});

	function markAsRead()
	{
		$.ajax({
			type: 'POST',
			url: 'ajax-tab.php',
			async: true,
			dataType: 'json',
			data: {
				controller: 'AdminCustomerThreads',
				action: 'markAsRead',
				token : '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['token']->value,'html','UTF-8');?>
',
				id_thread: <?php echo $_smarty_tpl->tpl_vars['id_customer_thread']->value;?>

			}
		});
		clearInterval(timer);
		timer = null;
	}
</script>



<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminView'),$_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo ucfirst($_smarty_tpl->tpl_vars['name_controller']->value);?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php } elseif (isset($_GET['controller'])) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo htmlentities(ucfirst($_GET['controller']));?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 09:11:13
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/customer_threads/helpers/view/modal.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c362b31684ba2_92916982')) {function content_5c362b31684ba2_92916982($_smarty_tpl) {?>
<form action="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomerThreads'),'html','UTF-8');?>
&amp;viewcustomer_thread&amp;id_customer_thread=<?php echo intval($_smarty_tpl->tpl_vars['id_customer_thread']->value);?>
" method="post" enctype="multipart/form-data" class="form-horizontal">
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title"><?php echo smartyTranslate(array('s'=>"Forward this discussion",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</h4>
		</div>
		<div class="modal-body">
			<div class="row row-margin-bottom">
				<label class="control-label col-lg-6"><?php echo smartyTranslate(array('s'=>'Forward this discussion to an employee:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</label>
				<div class="col-lg-3">
					<select name="id_employee_forward">
						<option value="-1"><?php echo smartyTranslate(array('s'=>'-- Choose --','d'=>'Admin.Actions'),$_smarty_tpl);?>
</option>
						<?php  $_smarty_tpl->tpl_vars['employee'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['employee']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['employees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['employee']->key => $_smarty_tpl->tpl_vars['employee']->value) {
$_smarty_tpl->tpl_vars['employee']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['employee']->value['id_employee'];?>
"> <?php echo Tools::substr($_smarty_tpl->tpl_vars['employee']->value['firstname'],0,1);?>
. <?php echo $_smarty_tpl->tpl_vars['employee']->value['lastname'];?>
</option>
						<?php } ?>
						<option value="0"><?php echo smartyTranslate(array('s'=>'Someone else','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</option>
					</select>
				</div>
			</div>
			<div id="message_forward_email" class="row row-margin-bottom" style="display:none">
				<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Email','d'=>'Admin.Global'),$_smarty_tpl);?>
</label>
				<div class="col-lg-3">
					<input type="email" name="email" />
				</div>
			</div>
			<div id="message_forward" style="display:none;">
				<div class="row row-margin-bottom">
					<label class="control-label col-lg-3"><?php echo smartyTranslate(array('s'=>'Comment:','d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</label>
					<div class="col-lg-7">
						<textarea name="message_forward" rows="6"><?php echo smartyTranslate(array('s'=>'You can add a comment here.','d'=>'Admin.Orderscustomers.Help'),$_smarty_tpl);?>
</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo smartyTranslate(array('s'=>"Close"),$_smarty_tpl);?>
</button>
			<button type="submit" class="btn btn-primary" name="submitForward" disabled="disabled"><i class="icon-mail-forward"></i> <?php echo smartyTranslate(array('s'=>"Forward",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</button>
		</div>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
	$("select[name='id_employee_forward']").on('change', function() {
		if ($(this).val() != '-1')
			$("button[name='submitForward']").prop('disabled', false);
		else
			$("button[name='submitForward']").prop('disabled', 'disabled');
	});
</script>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 09:11:13
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/customer_threads/helpers/view/message.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c362b316b4fd9_93957360')) {function content_5c362b316b4fd9_93957360($_smarty_tpl) {?>

<?php if (!$_smarty_tpl->tpl_vars['message']->value['id_employee']) {?>
	<?php $_smarty_tpl->tpl_vars["type"] = new Smarty_variable("customer", null, 0);?>
<?php } else { ?>
	<?php $_smarty_tpl->tpl_vars["type"] = new Smarty_variable("employee", null, 0);?>
<?php }?>

<div class="message-item<?php if ($_smarty_tpl->tpl_vars['initial']->value) {?>-initial-body<?php }?>">
<?php if (!$_smarty_tpl->tpl_vars['initial']->value) {?>
	<div class="message-avatar">
		<div class="avatar-md">
			<?php if ($_smarty_tpl->tpl_vars['type']->value=='customer') {?>
				<i class="icon-user icon-3x"></i>
			<?php } else { ?>
				<?php if (isset($_smarty_tpl->tpl_vars['current_employee']->value->firstname)) {?><img src="<?php echo $_smarty_tpl->tpl_vars['message']->value['employee_image'];?>
" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['current_employee']->value->firstname,'html','UTF-8');?>
" /><?php }?>
			<?php }?>
		</div>
	</div>
<?php }?>
	<div class="message-body">
		<?php if (!$_smarty_tpl->tpl_vars['initial']->value) {?>
			<h4 class="message-item-heading">
				<i class="icon-mail-reply text-muted"></i>
					<?php if ($_smarty_tpl->tpl_vars['type']->value=='customer') {?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['customer_name'],'html','UTF-8');?>

					<?php } else { ?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['employee_name'],'html','UTF-8');?>

					<?php }?>
			</h4>
		<?php }?>
		<span class="message-date">&nbsp;<i class="icon-calendar"></i> - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['message']->value['date_add'],'full'=>0),$_smarty_tpl);?>
 - <i class="icon-time"></i> <?php echo substr($_smarty_tpl->tpl_vars['message']->value['date_add'],11,5);?>
</span>
		<?php if (isset($_smarty_tpl->tpl_vars['message']->value['file_name'])) {?> <span class="message-product">&nbsp;<i class="icon-link"></i> <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['file_name'],'html','UTF-8');?>
" class="_blank"><?php echo smartyTranslate(array('s'=>"Attachment",'d'=>'Admin.Catalog.Feature'),$_smarty_tpl);?>
</a></span><?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['message']->value['product_name'])) {?> <span class="message-attachment">&nbsp;<i class="icon-book"></i> <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['product_link'],'html','UTF-8');?>
" class="_blank"><?php echo smartyTranslate(array('s'=>"Product",'d'=>'Admin.Global'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['product_name'],'html','UTF-8');?>
 </a></span><?php }?>
		<p class="message-item-text"><?php echo nl2br($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['message']->value['message'],'html','UTF-8'));?>
</p>
	</div>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 09:11:13
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/controllers/customer_threads/helpers/view/timeline_item.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c362b316de6b7_03083062')) {function content_5c362b316de6b7_03083062($_smarty_tpl) {?>
<article class="timeline-item<?php if (isset($_smarty_tpl->tpl_vars['timeline_item']->value['alt'])) {?> alt<?php }?>">
	<div class="timeline-caption">
		<div class="timeline-panel arrow arrow-<?php echo $_smarty_tpl->tpl_vars['timeline_item']->value['arrow'];?>
">
			<span class="timeline-icon" style="background-color:<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['timeline_item']->value['background_color'],'html','UTF-8');?>
;">
				<i class="<?php echo $_smarty_tpl->tpl_vars['timeline_item']->value['icon'];?>
"></i>
			</span>
			<span class="timeline-date"><i class="icon-calendar"></i> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['timeline_item']->value['date'],'full'=>0),$_smarty_tpl);?>
 - <i class="icon-time"></i> <?php echo substr($_smarty_tpl->tpl_vars['timeline_item']->value['date'],11,5);?>
</span>
			<?php if (isset($_smarty_tpl->tpl_vars['timeline_item']->value['id_order'])) {?><a class="badge" href="#"><?php echo smartyTranslate(array('s'=>"Order #",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
<?php echo intval($_smarty_tpl->tpl_vars['timeline_item']->value['id_order']);?>
</a><br/><?php }?>
			<span><?php echo nl2br($_smarty_tpl->tpl_vars['timeline_item']->value['content']);?>
</span>
			<?php if (isset($_smarty_tpl->tpl_vars['timeline_item']->value['see_more_link'])) {?>
				<br/><br/><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['timeline_item']->value['see_more_link'],'html','UTF-8');?>
" class="btn btn-default _blank"><?php echo smartyTranslate(array('s'=>"See more",'d'=>'Admin.Orderscustomers.Feature'),$_smarty_tpl);?>
</a>
			<?php }?>
		</div>
	</div>
</article>
<?php }} ?>
