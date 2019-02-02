<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 11:01:37
         compiled from "module:stcustomersignin/views/templates/hook/stcustomersignin-mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4417113375c2fad9175d611-60472513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c163a3e6aeaa3df0c86d48f35cc4dd180ffe4e8d' => 
    array (
      0 => 'module:stcustomersignin/views/templates/hook/stcustomersignin-mobile.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '4417113375c2fad9175d611-60472513',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language' => 0,
    'logged' => 0,
    'welcome_logged' => 0,
    'welcome_link' => 0,
    'my_account_url' => 0,
    'show_user_info_icons' => 0,
    'customerName' => 0,
    'logout_url' => 0,
    'welcome' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2fad91770b82_04905371',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fad91770b82_04905371')) {function content_5c2fad91770b82_04905371($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/stcustomersignin/views/templates/hook/stcustomersignin-mobile.tpl --><!-- Block user information module NAV  -->
<?php $_smarty_tpl->tpl_vars['show_user_info_icons'] = new Smarty_variable(Configuration::get('ST_SHOW_USER_INFO_ICONS'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['welcome_logged'] = new Smarty_variable(Configuration::get('STSN_WELCOME_LOGGED',$_smarty_tpl->tpl_vars['language']->value['id']), null, 0);?>
<?php $_smarty_tpl->tpl_vars['welcome_link'] = new Smarty_variable(Configuration::get('STSN_WELCOME_LINK',$_smarty_tpl->tpl_vars['language']->value['id']), null, 0);?>
<?php $_smarty_tpl->tpl_vars['welcome'] = new Smarty_variable(Configuration::get('STSN_WELCOME',$_smarty_tpl->tpl_vars['language']->value['id']), null, 0);?>
<ul id="userinfo_mod_mobile_menu" class="mo_mu_level_0 mobile_menu_ul">
<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
	<?php if (isset($_smarty_tpl->tpl_vars['welcome_logged']->value)&&trim($_smarty_tpl->tpl_vars['welcome_logged']->value)) {?>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php if ($_smarty_tpl->tpl_vars['welcome_link']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome_link']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>" rel="nofollow" class="mo_ma_level_0 <?php if (!$_smarty_tpl->tpl_vars['welcome_link']->value) {?> ma_span<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome_logged']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome_logged']->value, ENT_QUOTES, 'UTF-8');?>

        </a>
    </li>
    <?php }?>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value, ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" class="mo_ma_level_0" title="<?php echo smartyTranslate(array('s'=>'View my customer account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
            <?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="fto-user icon_btn mar_r4"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customerName']->value, ENT_QUOTES, 'UTF-8');?>

        </a>
    </li>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value, ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" class="mo_ma_level_0" title="<?php echo smartyTranslate(array('s'=>'View my customer account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
            <?php echo smartyTranslate(array('s'=>'My account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

        </a>
    </li>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logout_url']->value, ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" class="mo_ma_level_0" title="<?php echo smartyTranslate(array('s'=>'Log me out','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
            <?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="fto-logout mar_r4"></i><?php }?><?php echo smartyTranslate(array('s'=>'Sign out','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

        </a>
    </li>
<?php } else { ?>
	<?php if (isset($_smarty_tpl->tpl_vars['welcome']->value)&&trim($_smarty_tpl->tpl_vars['welcome']->value)) {?>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php if ($_smarty_tpl->tpl_vars['welcome_link']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome_link']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>" rel="nofollow" class="mo_ma_level_0 <?php if (!$_smarty_tpl->tpl_vars['welcome_link']->value) {?> ma_span<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome']->value, ENT_QUOTES, 'UTF-8');?>
">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome']->value, ENT_QUOTES, 'UTF-8');?>

        </a>
    </li>
    <?php }?>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Log in to your customer account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow" class="mo_ma_level_0">
            <?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="fto-user icon_btn mar_r4"></i><?php }?><?php echo smartyTranslate(array('s'=>'Login','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

        </a>
    </li>
<?php }?>
</ul>
<!-- /Block usmodule NAV -->
<!-- end /var/www/html/SHN/modules/stcustomersignin/views/templates/hook/stcustomersignin-mobile.tpl --><?php }} ?>
