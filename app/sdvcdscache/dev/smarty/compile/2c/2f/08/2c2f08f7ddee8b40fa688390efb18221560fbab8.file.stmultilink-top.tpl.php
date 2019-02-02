<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:16:48
         compiled from "modules/stmultilink/views/templates/hook/stmultilink-top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9557902245c31ab6002b249-10029032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c2f08f7ddee8b40fa688390efb18221560fbab8' => 
    array (
      0 => 'modules/stmultilink/views/templates/hook/stmultilink-top.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9557902245c31ab6002b249-10029032',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_groups' => 0,
    'link_group' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31ab600401e7_96773423',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31ab600401e7_96773423')) {function content_5c31ab600401e7_96773423($_smarty_tpl) {?>

<!-- Block stlinkgroups top module -->
<?php  $_smarty_tpl->tpl_vars['link_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['link_group']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['link_group']->key => $_smarty_tpl->tpl_vars['link_group']->value) {
$_smarty_tpl->tpl_vars['link_group']->_loop = true;
 $_smarty_tpl->tpl_vars['link_group']->index++;
 $_smarty_tpl->tpl_vars['link_group']->first = $_smarty_tpl->tpl_vars['link_group']->index === 0;
?>
    <div id="multilink_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['id_st_multi_link_group'], ENT_QUOTES, 'UTF-8');?>
" class="stlinkgroups_top dropdown_wrap <?php if ($_smarty_tpl->tpl_vars['link_group']->first) {?>first-item<?php }?> top_bar_item"><?php if ($_smarty_tpl->tpl_vars['link_group']->value['url']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars(strip_tags($_smarty_tpl->tpl_vars['link_group']->value['name']), ENT_QUOTES, 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['nofollow'])&&$_smarty_tpl->tpl_vars['link_group']->value['nofollow']) {?> rel="nofollow" <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['new_window'])&&$_smarty_tpl->tpl_vars['link_group']->value['new_window']) {?> target="_blank" <?php }?><?php } else { ?><div<?php }?> class="dropdown_tri <?php if (is_array($_smarty_tpl->tpl_vars['link_group']->value['links'])&&count($_smarty_tpl->tpl_vars['link_group']->value['links'])) {?> dropdown_tri_in <?php }?> header_item" aria-haspopup="true" aria-expanded="false"><?php if ($_smarty_tpl->tpl_vars['link_group']->value['icon_class']) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
 st_custom_link_icon <?php if (is_array($_smarty_tpl->tpl_vars['link_group']->value['links'])&&count($_smarty_tpl->tpl_vars['link_group']->value['links'])) {?> mar_r4 <?php }?>"></i><?php }?><span id="multilink_lable_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['id_st_multi_link_group'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['link_group']->value['name'];?>
</span><i class="fto-angle-down arrow_down arrow"></i><i class="fto-angle-up arrow_up arrow"></i><?php if ($_smarty_tpl->tpl_vars['link_group']->value['url']) {?></a><?php } else { ?></div><?php }?>
        <?php if (is_array($_smarty_tpl->tpl_vars['link_group']->value['links'])&&count($_smarty_tpl->tpl_vars['link_group']->value['links'])) {?>
        <div class="dropdown_list" aria-labelledby="multilink_lable_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['id_st_multi_link_group'], ENT_QUOTES, 'UTF-8');?>
">
            <ul class="dropdown_list_ul dropdown_box custom_links_list <?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['link_align'])&&$_smarty_tpl->tpl_vars['link_group']->value['link_align']) {?> text-center <?php }?>">
    		<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_group']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
    			<li>
            		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="dropdown_list_item" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['title'], ENT_QUOTES, 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['link']->value['nofollow'])&&$_smarty_tpl->tpl_vars['link']->value['nofollow']) {?> rel="nofollow" <?php }?> <?php if ($_smarty_tpl->tpl_vars['link']->value['new_window']) {?> target="_blank" <?php }?>>
                        <?php if ($_smarty_tpl->tpl_vars['link']->value['icon_class']) {?><i class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['icon_class'], ENT_QUOTES, 'UTF-8');?>
 mar_r4"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['label'], ENT_QUOTES, 'UTF-8');?>

            		</a>
    			</li>
    		<?php } ?>
    		</ul>
        </div>
        <?php }?>
    </div>
<?php } ?>
<!-- /Block stlinkgroups top module --><?php }} ?>
