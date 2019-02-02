<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:18:07
         compiled from "modules/stmultilink/views/templates/hook/stmultilink-footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14780162505c31abafc8b309-76487066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '351a9f0a51621eb7dd2f8eddb9cf585cb66f19e3' => 
    array (
      0 => 'modules/stmultilink/views/templates/hook/stmultilink-footer.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14780162505c31abafc8b309-76487066',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_groups' => 0,
    'link_group' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31abafc9a089_58305079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31abafc9a089_58305079')) {function content_5c31abafc9a089_58305079($_smarty_tpl) {?>

<?php  $_smarty_tpl->tpl_vars['link_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link_group']->key => $_smarty_tpl->tpl_vars['link_group']->value) {
$_smarty_tpl->tpl_vars['link_group']->_loop = true;
?>
<section id="multilink_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['id_st_multi_link_group'], ENT_QUOTES, 'UTF-8');?>
" class="stlinkgroups_links_footer <?php if (!$_smarty_tpl->tpl_vars['link_group']->value['is_stacked_footer']) {?>col-lg-<?php if ($_smarty_tpl->tpl_vars['link_group']->value['span']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['span'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>3<?php }?><?php }?> footer_block block <?php if ($_smarty_tpl->tpl_vars['link_group']->value['hide_on_mobile']) {?> hidden-md-down <?php }?>">
    <?php if ($_smarty_tpl->tpl_vars['link_group']->value['name']) {?>
    <div class="title_block <?php if ($_smarty_tpl->tpl_vars['link_group']->value['link_align']) {?> text-center <?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['link_group']->value['url']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="title_block_inner" title="<?php echo htmlspecialchars(strip_tags($_smarty_tpl->tpl_vars['link_group']->value['name']), ENT_QUOTES, 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['nofollow'])&&$_smarty_tpl->tpl_vars['link_group']->value['nofollow']) {?> rel="nofollow" <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['new_window'])&&$_smarty_tpl->tpl_vars['link_group']->value['new_window']) {?> target="_blank" <?php }?>><?php } else { ?><div class="title_block_inner"><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['link_group']->value['icon_class']) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
 st_custom_link_icon icon-mar-r4"></i><?php }?><?php echo $_smarty_tpl->tpl_vars['link_group']->value['name'];?>

        <?php if ($_smarty_tpl->tpl_vars['link_group']->value['url']) {?></a><?php } else { ?></div><?php }?>
        <div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div>
    </div>
    <?php }?>
    <ul class="footer_block_content bullet custom_links_list <?php if ($_smarty_tpl->tpl_vars['link_group']->value['link_align']) {?> text-center <?php }?>">
    <?php if ($_smarty_tpl->tpl_vars['link_group']->value['links']) {?>
    <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_group']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
    	<li>
    		<?php echo $_smarty_tpl->getSubTemplate ("module:stmultilink/views/templates/hook/stmultilink-item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    	</li>
    <?php } ?>
    <?php }?>
    </ul>
</section>
<?php } ?>
<?php }} ?>
