<?php /* Smarty version Smarty-3.1.19, created on 2019-01-03 11:38:10
         compiled from "modules/stthemeeditor/views/templates/hook/stthemeeditor-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9250014645c2e64a249a4d2-32469852%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb577caf9ad3e8d4f6ef4d8834b5792a9c458fdf' => 
    array (
      0 => 'modules/stthemeeditor/views/templates/hook/stthemeeditor-header.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9250014645c2e64a249a4d2-32469852',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sttheme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2e64a24a11a8_73012801',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2e64a24a11a8_73012801')) {function content_5c2e64a24a11a8_73012801($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['version_switching'])&&$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']==1) {?>
<style type="text/css">body{min-width:<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>1440<?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==1) {?>1200<?php } else { ?>992<?php }?>px;}</style>
<?php }?>
<?php }} ?>
