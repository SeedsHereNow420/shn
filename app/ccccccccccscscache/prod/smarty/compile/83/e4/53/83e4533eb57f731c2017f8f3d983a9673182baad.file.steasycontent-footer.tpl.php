<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:29:52
         compiled from "modules/steasycontent/views/templates/hook/steasycontent-footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2004368305c31a060514352-34495519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83e4533eb57f731c2017f8f3d983a9673182baad' => 
    array (
      0 => 'modules/steasycontent/views/templates/hook/steasycontent-footer.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2004368305c31a060514352-34495519',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'easy_content' => 0,
    'ec' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a060523333_59624135',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a060523333_59624135')) {function content_5c31a060523333_59624135($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['easy_content']->value)>0) {?>
    <?php  $_smarty_tpl->tpl_vars['ec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['easy_content']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ec']->key => $_smarty_tpl->tpl_vars['ec']->value) {
$_smarty_tpl->tpl_vars['ec']->_loop = true;
?>
    <section id="easycontent_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['id_st_easy_content'], ENT_QUOTES, 'UTF-8');?>
" class="<?php if ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?> easycontent <?php if (!$_smarty_tpl->tpl_vars['ec']->value['is_stacked_footer']) {?>col-lg-<?php if ($_smarty_tpl->tpl_vars['ec']->value['span']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['span'], ENT_QUOTES, 'UTF-8');?>
<?php }?><?php }?> footer_block block">
        <?php if ($_smarty_tpl->tpl_vars['ec']->value['title']) {?>
        <div class="title_block">
            <?php if ($_smarty_tpl->tpl_vars['ec']->value['url']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="title_block_inner" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['title'], ENT_QUOTES, 'UTF-8');?>
"><?php } else { ?><div class="title_block_inner"><?php }?>
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['title'], ENT_QUOTES, 'UTF-8');?>

            <?php if ($_smarty_tpl->tpl_vars['ec']->value['url']) {?></a><?php } else { ?></div><?php }?>
            <div class="opener"><i class="fto-plus-2 plus_sign"></i><i class="fto-minus minus_sign"></i></div>
        </div>
        <?php }?>
    	<div class="style_content footer_block_content <?php if (!$_smarty_tpl->tpl_vars['ec']->value['title']) {?> keep_open<?php }?>  <?php if ($_smarty_tpl->tpl_vars['ec']->value['width']) {?> width_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['width'], ENT_QUOTES, 'UTF-8');?>
 <?php }?>">
            <?php if ($_smarty_tpl->tpl_vars['ec']->value['text']) {?><div class="easy_brother_block text-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['text_align'], ENT_QUOTES, 'UTF-8');?>
 text-md-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['mobile_text_align'], ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['ec']->value['text'];?>
</div><?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['ec']->value['columns'])&&count($_smarty_tpl->tpl_vars['ec']->value['columns'])) {?><?php echo $_smarty_tpl->getSubTemplate ("module:steasycontent/views/templates/hook/steasycontent-columns.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('columns'=>$_smarty_tpl->tpl_vars['ec']->value['columns']), 0);?>
<?php }?>
    	</div>
    </section>
    <?php } ?>
<?php }?><?php }} ?>
