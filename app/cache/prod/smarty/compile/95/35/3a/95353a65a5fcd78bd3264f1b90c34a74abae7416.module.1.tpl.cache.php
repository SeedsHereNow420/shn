<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:56:12
         compiled from "module:steasycontent/views/templates/hook/textboxes/1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17074219365c33061c704776-02687409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95353a65a5fcd78bd3264f1b90c34a74abae7416' => 
    array (
      0 => 'module:steasycontent/views/templates/hook/textboxes/1.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '17074219365c33061c704776-02687409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'element' => 0,
    'easy_image_path' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c33061c71ac45_61015010',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c33061c71ac45_61015010')) {function content_5c33061c71ac45_61015010($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_image'])&&$_smarty_tpl->tpl_vars['element']->value['st_image']) {?>
<img src="<?php if (strpos($_smarty_tpl->tpl_vars['element']->value['st_image'],'/modules/')!==false) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_image'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars(($_smarty_tpl->tpl_vars['easy_image_path']->value).($_smarty_tpl->tpl_vars['element']->value['st_image']), ENT_QUOTES, 'UTF-8');?>
<?php }?>" class="easy_image mar_b1" alt="<?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_header']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_header'], ENT_QUOTES, 'UTF-8');?>
<?php }?>">
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_stars']) {?>
<div class="testimonial_stars stars_box m-b-1 fs_lg">
	<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
	<i class="fto-star-2 <?php if ($_smarty_tpl->tpl_vars['foo']->value<=$_smarty_tpl->tpl_vars['element']->value['st_el_stars']) {?> star_on <?php } else { ?> star_off <?php }?>"></i>
	<?php }} ?>
</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_header'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_header']) {?><h6 class="easy_header"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_header'], ENT_QUOTES, 'UTF-8');?>
</h6><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_sub_header'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_sub_header']) {?><div class=" mar_b1 easy_sub_header"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_sub_header'], ENT_QUOTES, 'UTF-8');?>
</div><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_text'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_text']) {?><div class="easy_text <?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_text_style'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_text_style']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_text_style'], ENT_QUOTES, 'UTF-8');?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['element']->value['st_el_text'];?>
</div><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_info'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_info']) {?><div class="mar_b1 easy_additional_info"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_info'], ENT_QUOTES, 'UTF-8');?>
</div><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_el_url'])&&$_smarty_tpl->tpl_vars['element']->value['st_el_url']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_button']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_button'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Read more','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>" class="btn btn-link easy_link" rel="nofollow"><?php if ($_smarty_tpl->tpl_vars['element']->value['st_el_button']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_el_button'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Read more','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></a><?php }?>
<?php }} ?>
