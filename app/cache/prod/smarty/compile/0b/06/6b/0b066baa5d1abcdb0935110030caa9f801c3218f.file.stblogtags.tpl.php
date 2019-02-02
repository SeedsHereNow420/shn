<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 00:55:20
         compiled from "modules/stblogtags/views/templates/hook/stblogtags.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17276162775c3313f80269b1-20745175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b066baa5d1abcdb0935110030caa9f801c3218f' => 
    array (
      0 => 'modules/stblogtags/views/templates/hook/stblogtags.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17276162775c3313f80269b1-20745175',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stblog' => 0,
    'tags' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3313f80301e8_44792967',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3313f80301e8_44792967')) {function content_5c3313f80301e8_44792967($_smarty_tpl) {?>
<div id="blog_tags_block" class="block tags_block column_block">
    <div class="title_block flex_container title_align_0 title_style_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['stblog']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner"><?php echo smartyTranslate(array('s'=>'Tags','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</div>
        <div class="flex_child title_flex_right"></div>
    </div>
	<div class="block_content tags_wrap">
    <?php if ($_smarty_tpl->tpl_vars['tags']->value) {?>
        <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['tag']->iteration=0;
 $_smarty_tpl->tpl_vars['tag']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->iteration++;
 $_smarty_tpl->tpl_vars['tag']->index++;
 $_smarty_tpl->tpl_vars['tag']->first = $_smarty_tpl->tpl_vars['tag']->index === 0;
 $_smarty_tpl->tpl_vars['tag']->last = $_smarty_tpl->tpl_vars['tag']->iteration === $_smarty_tpl->tpl_vars['tag']->total;
?>
    		<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'module','name'=>'stblogsearch','controller'=>'default','params'=>array('stb_search_query'=>$_smarty_tpl->tpl_vars['tag']->value['name'])),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'More about','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value['name'], ENT_QUOTES, 'UTF-8');?>
" class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value['class'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['tag']->last) {?>last_item<?php } elseif ($_smarty_tpl->tpl_vars['tag']->first) {?>first_item<?php } else { ?>item<?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
    	<?php } ?>
    <?php } else { ?>
    	<?php echo smartyTranslate(array('s'=>'No tags','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

    <?php }?>
	</div>
</div><?php }} ?>
