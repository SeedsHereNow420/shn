<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 00:55:19
         compiled from "modules/stblogcomments/views/templates/hook/stblogcomments-column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4911155105c3313f800cee5-24532214%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56ab9bacb1205b98c0a50aba421482457a9ac9a8' => 
    array (
      0 => 'modules/stblogcomments/views/templates/hook/stblogcomments-column.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4911155105c3313f800cee5-24532214',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stblog' => 0,
    'latest_comments' => 0,
    'comment' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3313f8019f87_17943604',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3313f8019f87_17943604')) {function content_5c3313f8019f87_17943604($_smarty_tpl) {?>
<section id="st_blog_latest_comments" class="block column_block">
    <div class="title_block flex_container title_align_0 title_style_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['stblog']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner"><?php echo smartyTranslate(array('s'=>'Latest Comments','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</div>
        <div class="flex_child title_flex_right"></div>
    </div>
    <div class="block_content">
        <?php if ($_smarty_tpl->tpl_vars['latest_comments']->value&&count($_smarty_tpl->tpl_vars['latest_comments']->value)) {?>
		<ul class="pro_column_list base_list_line medium_list">
            <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['latest_comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
            <li class="clearfix line_item pro_column_box">
                <div class="pro_column_left">
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('stblog','article',array('id_st_blog'=>$_smarty_tpl->tpl_vars['comment']->value['id_st_blog'],'rewrite'=>$_smarty_tpl->tpl_vars['comment']->value['link_rewrite'])), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['customer_name'], ENT_QUOTES, 'UTF-8');?>
">
                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['avatar'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['customer_name'], ENT_QUOTES, 'UTF-8');?>
" />
    			</a>
                </div>
    			<div class="pro_column_right">
    				<h4 class="s_title_block nohidden"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['customer_name'], ENT_QUOTES, 'UTF-8');?>
</h4>           			      
                    <?php echo smartyTranslate(array('s'=>'on','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
 <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('stblog','article',array('id_st_blog'=>$_smarty_tpl->tpl_vars['comment']->value['id_st_blog'],'rewrite'=>$_smarty_tpl->tpl_vars['comment']->value['link_rewrite'])), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['comment']->value['name'],50,'...'), ENT_QUOTES, 'UTF-8');?>
</a>
                </div>
            </li>
            <?php } ?>
        </ul>
        <?php } else { ?>
            <?php echo smartyTranslate(array('s'=>'No comments','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

        <?php }?>
	</div>
</section><?php }} ?>
