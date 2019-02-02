<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:29:52
         compiled from "modules/stmultilink/views/templates/hook/stmultilink-mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10945711695c31a0605edf93-09186427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad9f9b6c359c2049badb130e9fdd4a69410e4345' => 
    array (
      0 => 'modules/stmultilink/views/templates/hook/stmultilink-mobile.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10945711695c31a0605edf93-09186427',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_groups' => 0,
    'link_group' => 0,
    'has_children' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a0605f9f81_07950452',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a0605f9f81_07950452')) {function content_5c31a0605f9f81_07950452($_smarty_tpl) {?>

<!-- Block stlinkgroups top module -->
<?php  $_smarty_tpl->tpl_vars['link_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link_group']->key => $_smarty_tpl->tpl_vars['link_group']->value) {
$_smarty_tpl->tpl_vars['link_group']->_loop = true;
?>
<?php if (!$_smarty_tpl->tpl_vars['link_group']->value['hide_on_mobile']) {?>
<ul id="multilink_mobile_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['id_st_multi_link_group'], ENT_QUOTES, 'UTF-8');?>
" class="mo_mu_level_0 mobile_menu_ul">
    <li class="mo_ml_level_0 mo_ml_column">
        <?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((is_array($_smarty_tpl->tpl_vars['link_group']->value['links'])&&count($_smarty_tpl->tpl_vars['link_group']->value['links'])), null, 0);?>
        <div class="menu_a_wrap">
        <a href="<?php if ($_smarty_tpl->tpl_vars['link_group']->value['url']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['url'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>" title="<?php echo htmlspecialchars(strip_tags($_smarty_tpl->tpl_vars['link_group']->value['name']), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" class="mo_ma_level_0 <?php if (!$_smarty_tpl->tpl_vars['link_group']->value['url']) {?>ma_span<?php }?>"<?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['new_window'])&&$_smarty_tpl->tpl_vars['link_group']->value['new_window']) {?> target="_blank" <?php }?>>
            <?php if ($_smarty_tpl->tpl_vars['link_group']->value['icon_class']) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
"></i><?php }?><?php echo $_smarty_tpl->tpl_vars['link_group']->value['name'];?>

        </a>
        <?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><span class="opener dlm"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></span><?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
        <ul class="mo_mu_level_1 mo_sub_ul">
        <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_group']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
            <li class="mo_ml_level_1 mo_sub_li">
                <?php echo $_smarty_tpl->getSubTemplate ("module:stmultilink/views/templates/hook/stmultilink-item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('link_extra_classes'=>"mo_ma_level_1 mo_sub_a"), 0);?>

            </li>
        <?php } ?>
        </ul>
        <?php }?>
    </li>
</ul>
<?php }?>
<?php } ?>
<!-- /Block stlinkgroups top module --><?php }} ?>
