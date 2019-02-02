<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 12:14:43
         compiled from "modules/quantitylimit/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20978138785c36563344fab5-16629529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '082af416c833dc440d2328fdbf11938344534a98' => 
    array (
      0 => 'modules/quantitylimit/views/templates/hook/header.tpl',
      1 => 1513817419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20978138785c36563344fab5-16629529',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_page' => 0,
    'is_swal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3656334539a5_85681446',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3656334539a5_85681446')) {function content_5c3656334539a5_85681446($_smarty_tpl) {?>
<script type="text/javascript">
//<![CDATA[
	var error_label = "<?php echo smartyTranslate(array('s'=>'Error','mod'=>'quantitylimit','js'=>1),$_smarty_tpl);?>
";
    var page_name = "<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['current_page']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
";
	var is_swal = parseInt("<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['is_swal']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
");
//]]>
</script>
<?php }} ?>
