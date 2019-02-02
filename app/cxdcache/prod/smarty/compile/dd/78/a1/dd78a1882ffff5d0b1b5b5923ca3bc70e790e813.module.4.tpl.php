<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:10:01
         compiled from "module:steasycontent/views/templates/hook/icon_with_text/4.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9061893485c31a9c9ae4004-73342060%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd78a1882ffff5d0b1b5b5923ca3bc70e790e813' => 
    array (
      0 => 'module:steasycontent/views/templates/hook/icon_with_text/4.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '9061893485c31a9c9ae4004-73342060',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'element' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a9c9b33ea4_43109628',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a9c9b33ea4_43109628')) {function content_5c31a9c9b33ea4_43109628($_smarty_tpl) {?>
<div class="easy_icon_with_text_<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_icon_with_text'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_icon_with_text'], ENT_QUOTES, 'UTF-8');?>
<?php }?> flex_container flex_start">
	<em class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_icon'], ENT_QUOTES, 'UTF-8');?>
 easy_icon fs_md color_444"><span class="unvisible">&nbsp;</span></em>
	<div class="flex_child">
        <?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_header'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_header']) {?>
            <?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_url']) {?>
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_url'], ENT_QUOTES, 'UTF-8');?>
" class="fs_lg easy_header color_444" rel="nofollow" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_header'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_header'], ENT_QUOTES, 'UTF-8');?>
</a>                
            <?php } else { ?>
                <div class="fs_lg easy_header color_444"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_header'], ENT_QUOTES, 'UTF-8');?>
</div>
            <?php }?>
        <?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_sub_header'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_sub_header']) {?><div class="easy_sub_header pad_b6"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_sub_header'], ENT_QUOTES, 'UTF-8');?>
</div><?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_text'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_text']) {?><div class="easy_text <?php if (!$_smarty_tpl->tpl_vars['element']->value['st_el_url']) {?> pad_b6<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_text'], ENT_QUOTES, 'UTF-8');?>
</div><?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_url'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_url']&&$_smarty_tpl->tpl_vars['element']->value['st_el_button']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_button']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_button'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Read more','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>" class="easy_link" rel="nofollow"><?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_button']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_button'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Read more','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></a><?php }?>
	</div>
</div><?php }} ?>
