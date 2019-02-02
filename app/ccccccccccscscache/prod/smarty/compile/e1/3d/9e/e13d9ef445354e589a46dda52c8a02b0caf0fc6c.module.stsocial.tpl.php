<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:29:52
         compiled from "module:stsocial/views/templates/hook/stsocial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3355231125c31a06021fd65-76106191%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e13d9ef445354e589a46dda52c8a02b0caf0fc6c' => 
    array (
      0 => 'module:stsocial/views/templates/hook/stsocial.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '3355231125c31a06021fd65-76106191',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stsocial' => 0,
    'share_url' => 0,
    'urls' => 0,
    'share_name' => 0,
    'page' => 0,
    'social_links_size' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a06022ce98_77761794',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a06022ce98_77761794')) {function content_5c31a06022ce98_77761794($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['stsocial']->value)&&$_smarty_tpl->tpl_vars['stsocial']->value) {?>
<?php if (!isset($_smarty_tpl->tpl_vars['share_url']->value)) {?><?php $_smarty_tpl->tpl_vars['share_url'] = new Smarty_variable($_smarty_tpl->tpl_vars['urls']->value['current_url'], null, 0);?><?php }?>
<?php if (!isset($_smarty_tpl->tpl_vars['share_name']->value)) {?><?php $_smarty_tpl->tpl_vars['share_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['page']->value['meta']['title'], null, 0);?><?php }?>
	<div class="social_share_block social_size_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['social_links_size']->value, ENT_QUOTES, 'UTF-8');?>
 flex_container flex_left">
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stsocial']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['v']->value['sidebar']&&$_smarty_tpl->tpl_vars['v']->value['url']&&$_smarty_tpl->tpl_vars['v']->value['url_key']) {?>
		    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['url'], ENT_QUOTES, 'UTF-8');?>
?<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['url_key'], ENT_QUOTES, 'UTF-8');?>
=<?php echo htmlspecialchars(urlencode($_smarty_tpl->tpl_vars['share_url']->value), ENT_QUOTES, 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['v']->value['name_key']) {?>&<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['name_key'], ENT_QUOTES, 'UTF-8');?>
=<?php echo htmlspecialchars(urlencode($_smarty_tpl->tpl_vars['share_name']->value), ENT_QUOTES, 'UTF-8');?>
<?php }?>" class="social_share_item social_share_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['id_st_social'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['v']->value['item']) {?> social_share_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['item'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['v']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['title'], ENT_QUOTES, 'UTF-8');?>
" target="_blank" rel="nofollow"><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
"></i></a>
		<?php }?>
	<?php } ?>
	</div>
<?php }?><?php }} ?>
