<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 00:55:19
         compiled from "modules/stblogblockcategory/views/templates/hook/stblogblockcategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6995488095c3313f7f39f44-60834286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '806208e91ca802606d21f82f20f50661593ce261' => 
    array (
      0 => 'modules/stblogblockcategory/views/templates/hook/stblogblockcategory.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6995488095c3313f7f39f44-60834286',
  'function' => 
  array (
    'categories' => 
    array (
      'parameter' => 
      array (
        'nodes' => 
        array (
        ),
        'depth' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'nodes' => 0,
    'depth' => 0,
    'node' => 0,
    'categories' => 0,
    'stblog' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3313f8007009_22215771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3313f8007009_22215771')) {function content_5c3313f8007009_22215771($_smarty_tpl) {?>
<?php if (!function_exists('smarty_template_function_categories')) {
    function smarty_template_function_categories($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['categories']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
  <?php if (count($_smarty_tpl->tpl_vars['nodes']->value)) {?><ul class="category-sub-menu"><?php  $_smarty_tpl->tpl_vars['node'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['node']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nodes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['node']->key => $_smarty_tpl->tpl_vars['node']->value) {
$_smarty_tpl->tpl_vars['node']->_loop = true;
?><li data-depth="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['depth']->value, ENT_QUOTES, 'UTF-8');?>
"><div class="acc_header flex_container"><a class="flex_child" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'module','name'=>'stblog','controller'=>'category','params'=>array('id_st_blog_category'=>$_smarty_tpl->tpl_vars['node']->value['id_st_blog_category'],'rewrite'=>$_smarty_tpl->tpl_vars['node']->value['link_rewrite'])),$_smarty_tpl);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a><?php if ($_smarty_tpl->tpl_vars['node']->value['child']&&count($_smarty_tpl->tpl_vars['node']->value['child'])) {?><span class="acc_icon collapsed" data-toggle="collapse" data-target="#blog_category_node_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['id_st_blog_category'], ENT_QUOTES, 'UTF-8');?>
"><i class="fto-plus-2 acc_open fs_xl"></i><i class="fto-minus acc_close fs_xl"></i></span><?php }?></div><?php if ($_smarty_tpl->tpl_vars['node']->value['child']&&count($_smarty_tpl->tpl_vars['node']->value['child'])) {?><div class="collapse" id="blog_category_node_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['id_st_blog_category'], ENT_QUOTES, 'UTF-8');?>
"><?php smarty_template_function_categories($_smarty_tpl,array('nodes'=>$_smarty_tpl->tpl_vars['node']->value['child'],'depth'=>$_smarty_tpl->tpl_vars['depth']->value+1));?>
</div><?php }?></li><?php } ?></ul><?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if (count($_smarty_tpl->tpl_vars['categories']->value)) {?>
<div class="st_blog_block_categories block column_block">
  <div class="title_block flex_container title_align_0 title_style_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['stblog']->value['heading_style'], ENT_QUOTES, 'UTF-8');?>
">
    <div class="flex_child title_flex_left"></div>
    <div class="title_block_inner"><?php echo smartyTranslate(array('s'=>'Blog categories','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</div>
    <div class="flex_child title_flex_right"></div>
  </div>
  <div class="block_content">
    <div class="acc_box category-top-menu">
      <?php smarty_template_function_categories($_smarty_tpl,array('nodes'=>$_smarty_tpl->tpl_vars['categories']->value));?>

    </div>
  </div>
</div>
<?php }?><?php }} ?>
