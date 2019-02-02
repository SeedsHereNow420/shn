<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:23:43
         compiled from "/var/www/html/SHN/pdf/invoice.note-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17380679355c322b8faf31d2-90312569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fbd97c7ca7bb04d8da3a272fa083ef85b683118' => 
    array (
      0 => '/var/www/html/SHN/pdf/invoice.note-tab.tpl',
      1 => 1546552162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17380679355c322b8faf31d2-90312569',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_invoice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322b8faf6687_25620564',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322b8faf6687_25620564')) {function content_5c322b8faf6687_25620564($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['order_invoice']->value->note)&&$_smarty_tpl->tpl_vars['order_invoice']->value->note) {?>
	<tr>
		<td colspan="12" height="10">&nbsp;</td>
	</tr>

	<tr>
		<td colspan="6" class="left">
			<table id="note-tab" style="width: 100%">
				<tr>
					<td class="grey"><?php echo smartyTranslate(array('s'=>'Note','d'=>'Shop.Pdf','pdf'=>'true'),$_smarty_tpl);?>
</td>
				</tr>
				<tr>
					<td class="note"><?php echo nl2br($_smarty_tpl->tpl_vars['order_invoice']->value->note);?>
</td>
				</tr>
			</table>
		</td>
		<td colspan="1">&nbsp;</td>
	</tr>
<?php }?>
<?php }} ?>
