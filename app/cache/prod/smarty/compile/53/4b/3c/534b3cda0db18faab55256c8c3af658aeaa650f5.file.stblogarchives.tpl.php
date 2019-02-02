<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 00:55:19
         compiled from "modules/stblogarchives/views/templates/hook/stblogarchives.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19009125215c3313f7f21a60-95197866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '534b3cda0db18faab55256c8c3af658aeaa650f5' => 
    array (
      0 => 'modules/stblogarchives/views/templates/hook/stblogarchives.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19009125215c3313f7f21a60-95197866',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stblog' => 0,
    'archives' => 0,
    'archive' => 0,
    'ar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3313f7f2f742_46195647',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3313f7f2f742_46195647')) {function content_5c3313f7f2f742_46195647($_smarty_tpl) {?>

<div id="st_blog_block_archives" class="block column_block">
    <div class="title_block flex_container title_align_0 title_style_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['stblog']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
">
        <div class="flex_child title_flex_left"></div>
        <div class="title_block_inner"><?php echo smartyTranslate(array('s'=>'Blog archives','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</div>
        <div class="flex_child title_flex_right"></div>
    </div>
	<div class="block_content">
    <div class="acc_box category-top-menu">
		<ul class="category-sub-menu">
        <?php  $_smarty_tpl->tpl_vars['archive'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['archive']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['archives']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['archive']->key => $_smarty_tpl->tpl_vars['archive']->value) {
$_smarty_tpl->tpl_vars['archive']->_loop = true;
?>
            <li>
                <div class="acc_header flex_container">
                    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'module','name'=>'stblogarchives','controller'=>'default','params'=>array('m'=>$_smarty_tpl->tpl_vars['archive']->value['Y'])),$_smarty_tpl);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['archive']->value['Y'], ENT_QUOTES, 'UTF-8');?>
" class="flex_child"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['archive']->value['Y'], ENT_QUOTES, 'UTF-8');?>
</a>
                    <?php if ($_smarty_tpl->tpl_vars['archive']->value['child']&&count($_smarty_tpl->tpl_vars['archive']->value['child'])) {?>
                        <span class="acc_icon collapsed" data-toggle="collapse" data-target="#blog_archive_node_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['archive']->value['Y'], ENT_QUOTES, 'UTF-8');?>
">
                          <i class="fto-plus-2 acc_open fs_xl"></i>
                          <i class="fto-minus acc_close fs_xl"></i>
                        </span>
                    <?php }?>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['archive']->value['child']&&count($_smarty_tpl->tpl_vars['archive']->value['child'])) {?>
                <div class="collapse" id="blog_archive_node_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['archive']->value['Y'], ENT_QUOTES, 'UTF-8');?>
">
    			<ul class="category-sub-menu">
                <?php  $_smarty_tpl->tpl_vars['ar'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ar']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['archive']->value['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ar']->key => $_smarty_tpl->tpl_vars['ar']->value) {
$_smarty_tpl->tpl_vars['ar']->_loop = true;
?>
                    <li>
                        <div class="acc_header flex_container">
                            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'module','name'=>'stblogarchives','controller'=>'default','params'=>array('m'=>$_smarty_tpl->tpl_vars['ar']->value['Ym'])),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['ar']->value['M'],'d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" class="flex_child"><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['ar']->value['M'],'d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a>
                        </div>
                    </li>
                <?php } ?>
                </ul>
                </div>
                <?php }?>
            </li>
		<?php } ?>
		</ul>
    </div>
	</div>
</div><?php }} ?>
