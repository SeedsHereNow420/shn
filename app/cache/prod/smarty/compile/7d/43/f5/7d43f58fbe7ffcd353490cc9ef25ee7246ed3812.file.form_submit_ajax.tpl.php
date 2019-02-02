<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 00:55:49
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/form_submit_ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19728369365c3465959531c4-05539412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d43f58fbe7ffcd353490cc9ef25ee7246ed3812' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/form_submit_ajax.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19728369365c3465959531c4-05539412',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'table' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c34659595bb67_08104506',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c34659595bb67_08104506')) {function content_5c34659595bb67_08104506($_smarty_tpl) {?>

<script type="text/javascript">
	$(document).ready(function() {
		$('#<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form').submit(function(e) {
			e.preventDefault();
			var form_datas = new Object;
			form_datas['liteDisplaying'] = 1;
			form_datas['submitFormAjax'] = 1;
			var form_inputs = $('#<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form input, #<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form textarea, #<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form button');
			var form_selects = $('#<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form select');
			$.each(form_inputs, function() {
				if (this.type == 'radio' || this.type == 'checkbox')
					if (!this.checked)
						return true;
				form_datas[this.name] = this.value;
			});
			$.each(form_selects, function() {
				if	(this.options != undefined && this.options.selectedIndex != undefined && this[this.options.selectedIndex] != undefined)
					form_datas[this.name] = this[this.options.selectedIndex].value;
			});
			$.ajax({
				type: this.method,
				url : this.action,
				async: true,
				dataType: "html",
				data : form_datas,
				success : function(res)
				{
					// Replace de body by the new one
					$('body').html(res.replace(/^.*<body>/, '').replace(/<\/body>.*$/, ''));
				}
			});
		});
	});
</script>
<?php }} ?>
