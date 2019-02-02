<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 09:11:22
         compiled from "modules/stbloglinknav/views/templates/hook/stbloglinknav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11185939225c2f93ba610213-72478508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba3b0d4d9defcad056bd9621263be12f1ab00309' => 
    array (
      0 => 'modules/stbloglinknav/views/templates/hook/stbloglinknav.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11185939225c2f93ba610213-72478508',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prev_blog' => 0,
    'next_blog' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2f93ba61b647_33184139',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2f93ba61b647_33184139')) {function content_5c2f93ba61b647_33184139($_smarty_tpl) {?>
<!-- MODULE St Blog Link Nav  -->
<?php if ($_smarty_tpl->tpl_vars['prev_blog']->value||$_smarty_tpl->tpl_vars['next_blog']->value) {?>
<section id="blog_link_nav" class="clearfix general_bottom_border">
    <?php if ($_smarty_tpl->tpl_vars['prev_blog']->value) {?>
    <a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getModuleLink('stblog','article',array('id_st_blog'=>$_smarty_tpl->tpl_vars['prev_blog']->value['id_st_blog'],'rewrite'=>$_smarty_tpl->tpl_vars['prev_blog']->value['link_rewrite'])),'html'), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Previous article','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" class="fl"><i class="icon-left-open-3 icon-mar-lr2"></i><?php echo smartyTranslate(array('s'=>'Previous article','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['next_blog']->value) {?>
    <a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getModuleLink('stblog','article',array('id_st_blog'=>$_smarty_tpl->tpl_vars['next_blog']->value['id_st_blog'],'rewrite'=>$_smarty_tpl->tpl_vars['next_blog']->value['link_rewrite'])),'html'), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Next article','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" class="fr"><?php echo smartyTranslate(array('s'=>'Next article','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<i class="icon-right-open-3 icon-mar-lr2"></i></a>
    <?php }?>
</section>
<?php }?>
<!-- /MODULE St Blog Link Nav --><?php }} ?>
