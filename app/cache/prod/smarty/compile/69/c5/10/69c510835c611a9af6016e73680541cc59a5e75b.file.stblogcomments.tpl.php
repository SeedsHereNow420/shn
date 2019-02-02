<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 05:22:21
         compiled from "modules/stblogcomments/views/templates/hook/stblogcomments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3682951945c33528d7b06c9-34208803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69c510835c611a9af6016e73680541cc59a5e75b' => 
    array (
      0 => 'modules/stblogcomments/views/templates/hook/stblogcomments.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3682951945c33528d7b06c9-34208803',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nbComments' => 0,
    'stblog' => 0,
    'comments' => 0,
    'comment' => 0,
    'too_early' => 0,
    'logged' => 0,
    'allow_guests' => 0,
    'secure_key' => 0,
    'link' => 0,
    'id_st_blog_comment_form' => 0,
    'delay' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c33528d7c46a7_13104611',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c33528d7c46a7_13104611')) {function content_5c33528d7c46a7_13104611($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['nbComments']->value) {?>
<section id="comments" class="block section">
    <div class="title_block flex_container title_align_0 title_style_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['stblog']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nbComments']->value, ENT_QUOTES, 'UTF-8');?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['nbComments']->value<=1) {?><?php echo smartyTranslate(array('s'=>'Comment','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Comments','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?></div>
        <div class="flex_child title_flex_right"></div>
    </div>
	<ul class="st_blog_comment_list base_list_line medium_list line_free">
		<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
			<?php echo $_smarty_tpl->getSubTemplate ('./comment-tree-branch.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('node'=>$_smarty_tpl->tpl_vars['comment']->value,'reply_ready'=>($_smarty_tpl->tpl_vars['too_early']->value==false&&($_smarty_tpl->tpl_vars['logged']->value||$_smarty_tpl->tpl_vars['allow_guests']->value))), 0);?>

        <?php } ?>
    </ul>
</section>
<?php }?>	
<section id="st_blog_comment_reply_block" class="block section">
    <div class="title_block flex_container title_align_0 title_style_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['stblog']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
">
        <div class="flex_child title_flex_left"></div>
        <div id="stblog_leave_a_comment" class="title_block_inner"><?php echo smartyTranslate(array('s'=>'Leave a Comment','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</div>
        <div id="stblog_leave_a_reply" class="title_block_inner"><?php echo smartyTranslate(array('s'=>'Leave a Reply','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</div>
        <div class="flex_child title_flex_right"></div>
    </div>
	<div class="st_blog_comment_reply">
        <?php if (($_smarty_tpl->tpl_vars['too_early']->value==false&&($_smarty_tpl->tpl_vars['logged']->value||$_smarty_tpl->tpl_vars['allow_guests']->value))) {?>
        <form name="st_blog_comment_form" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('stblogcomments','default',array('action'=>'add_comment','secure_key'=>$_smarty_tpl->tpl_vars['secure_key']->value)), ENT_QUOTES, 'UTF-8');?>
">
            <?php if ($_smarty_tpl->tpl_vars['allow_guests']->value==true&&$_smarty_tpl->tpl_vars['logged']->value==0) {?>
            <div id="comment_input" class="row">
                <p class="col-4"><input name="customer_name" type="text" class="form-control" placeholder="<?php echo smartyTranslate(array('s'=>'Name (required)','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" value="" /></p>
                <p class="col-4"><input name="customer_email" type="text" class="form-control" placeholder="<?php echo smartyTranslate(array('s'=>'Email','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" value="" /></p>
            </div>
            <?php }?>
            <div id="comment_textarea" class="row">
                <div class="col-8">
                <textarea id="comment_content" name="content" rows="30" cols="6" class="form-control" autocomplete="off"></textarea>
                </div>
            </div>
            <input name="id_st_blog" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_st_blog_comment_form']->value, ENT_QUOTES, 'UTF-8');?>
" />
            <input id="blog_comment_parent_id" name="id_parent" type="hidden" value="0" />
            <div>
                <input type="submit" name="st_blog_comment_submit" id="st_blog_comment_submit" value="<?php echo smartyTranslate(array('s'=>'Post comment','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" class="btn btn-default mar_r4" />
                <a href="javascript:;" id="cancel_comment_reply_link" class="go hidden"><?php echo smartyTranslate(array('s'=>'Cancel reply','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a>
            </div>
        </form>
        <?php } elseif (($_smarty_tpl->tpl_vars['too_early']->value==false&&!$_smarty_tpl->tpl_vars['logged']->value&&!$_smarty_tpl->tpl_vars['allow_guests']->value)) {?>
        <?php echo smartyTranslate(array('s'=>'Please [1]login[/1] to post a comment.','d'=>'Shop.Theme.Transformer','sprintf'=>array('[1]'=>(('<a href="').($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true))).('" rel="nofollow" title="" class="go">'),'[/1]'=>'</a>')),$_smarty_tpl);?>

        <?php } elseif ($_smarty_tpl->tpl_vars['too_early']->value==true) {?>
        <?php echo smartyTranslate(array('s'=>'You should wait %delay% seconds before posting a new comment.','sprintf'=>array('%delay%'=>$_smarty_tpl->tpl_vars['delay']->value),'d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

        <?php }?>
    </div>
</section><?php }} ?>
