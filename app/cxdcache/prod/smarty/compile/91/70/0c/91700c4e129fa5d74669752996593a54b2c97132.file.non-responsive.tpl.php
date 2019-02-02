<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:26
         compiled from "/var/www/html/SHN/nimda420/themes/new-theme/template/components/layout/non-responsive.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6405676755c31a96a8bc8c5-99975690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91700c4e129fa5d74669752996593a54b2c97132' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/new-theme/template/components/layout/non-responsive.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6405676755c31a96a8bc8c5-99975690',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'default_tab_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a96a915810_23292456',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a96a915810_23292456')) {function content_5c31a96a915810_23292456($_smarty_tpl) {?>
<div id="non-responsive" class="js-non-responsive">
  <h1><?php echo smartyTranslate(array('s'=>'Oh no!'),$_smarty_tpl);?>
</h1>
  <p class="m-t-3">
    <?php echo smartyTranslate(array('s'=>'The mobile version of this page is not available yet.'),$_smarty_tpl);?>

  </p>
  <p class="m-t-2">
    <?php echo smartyTranslate(array('s'=>'Please use a desktop computer to access this page, until is adapted to mobile.'),$_smarty_tpl);?>

  </p>
  <p class="m-t-2">
    <?php echo smartyTranslate(array('s'=>'Thank you.'),$_smarty_tpl);?>

  </p>
  <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['default_tab_link']->value,'html','UTF-8');?>
" class="btn btn-primary p-y-1 m-t-3">
    <i class="material-icons">arrow_back</i>
    <?php echo smartyTranslate(array('s'=>'Back'),$_smarty_tpl);?>

  </a>
</div>
<div class="mobile-layer"></div>
<?php }} ?>
