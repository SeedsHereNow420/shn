<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:03
         compiled from "modules/stcountdown/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8474426575c32fda3ea0a25-66940873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f47dd20b766b72c023afc5be8017aa4587328ac9' => 
    array (
      0 => 'modules/stcountdown/views/templates/hook/header.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8474426575c32fda3ea0a25-66940873',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'custom_css' => 0,
    'countdown_active' => 0,
    's_countdown_all' => 0,
    's_countdown_id_products' => 0,
    's_countdown_style' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fda40639c6_59525646',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fda40639c6_59525646')) {function content_5c32fda40639c6_59525646($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['custom_css']->value)&&$_smarty_tpl->tpl_vars['custom_css']->value) {?>
<style type="text/css"><?php echo $_smarty_tpl->tpl_vars['custom_css']->value;?>
</style>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['countdown_active']->value)&&$_smarty_tpl->tpl_vars['countdown_active']->value) {?>
<script type="text/javascript">
//<![CDATA[

var s_countdown_all = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s_countdown_all']->value, ENT_QUOTES, 'UTF-8');?>
;
var s_countdown_id_products = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s_countdown_id_products']->value, ENT_QUOTES, 'UTF-8');?>
; 
var s_countdown_style = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['s_countdown_style']->value, ENT_QUOTES, 'UTF-8');?>
; 
var s_countdown_lang = new Array();
s_countdown_lang['day'] = "<?php echo smartyTranslate(array('s'=>'day','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
";
s_countdown_lang['days'] = "<?php echo smartyTranslate(array('s'=>'days','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
";
s_countdown_lang['hrs'] = "<?php echo smartyTranslate(array('s'=>'hrs','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
";
s_countdown_lang['min'] = "<?php echo smartyTranslate(array('s'=>'min','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
";
s_countdown_lang['sec'] = "<?php echo smartyTranslate(array('s'=>'sec','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
";

//]]>
</script>
<?php }?><?php }} ?>
