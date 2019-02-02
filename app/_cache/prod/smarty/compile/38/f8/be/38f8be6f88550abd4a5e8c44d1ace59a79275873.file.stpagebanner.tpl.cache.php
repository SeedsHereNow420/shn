<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 08:10:21
         compiled from "modules/stpagebanner/views/templates/hook/stpagebanner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19498279405c2f856d1f1b24-90176319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38f8be6f88550abd4a5e8c44d1ace59a79275873' => 
    array (
      0 => 'modules/stpagebanner/views/templates/hook/stpagebanner.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19498279405c2f856d1f1b24-90176319',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'banner' => 0,
    'sttheme' => 0,
    'breadcrumb_width' => 0,
    'breadcrumb' => 0,
    'path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2f856d234047_16862840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2f856d234047_16862840')) {function content_5c2f856d234047_16862840($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['banner']->value)&&$_smarty_tpl->tpl_vars['banner']->value) {?>
<div id="<?php if ($_smarty_tpl->tpl_vars['banner']->value) {?>page_banner_container_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value['id_st_page_banner'], ENT_QUOTES, 'UTF-8');?>
<?php }?>" class="breadcrumb_wrapper <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3&&$_smarty_tpl->tpl_vars['breadcrumb_width']->value) {?> wide_container <?php }?>" <?php if ($_smarty_tpl->tpl_vars['banner']->value['image_multi_lang']) {?> style="background-image:url(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value['image_multi_lang'], ENT_QUOTES, 'UTF-8');?>
);" <?php }?>>
<?php if (!$_smarty_tpl->tpl_vars['banner']->value['hide_breadcrumb']||$_smarty_tpl->tpl_vars['banner']->value['description']) {?>
  <div class="<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>container<?php } else { ?>container-fluid<?php }?>"><div class="row">
        <div class="col-12 <?php if ($_smarty_tpl->tpl_vars['banner']->value['text_align']==2) {?> text-2 <?php } elseif ($_smarty_tpl->tpl_vars['banner']->value['text_align']==3) {?> text-3 <?php } else { ?> text-1 <?php }?>">
            <?php if ($_smarty_tpl->tpl_vars['banner']->value['description']) {?>
            <div class="style_content">
                <?php echo $_smarty_tpl->tpl_vars['banner']->value['description'];?>

            </div>
            <?php }?>
          <?php if (!$_smarty_tpl->tpl_vars['banner']->value['hide_breadcrumb']) {?>
          <nav data-depth="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['breadcrumb']->value['count'], ENT_QUOTES, 'UTF-8');?>
" class="breadcrumb_nav">
            <ul itemscope itemtype="http://schema.org/BreadcrumbList">
              <?php  $_smarty_tpl->tpl_vars['path'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['path']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['breadcrumb']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['path']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['path']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['path']->key => $_smarty_tpl->tpl_vars['path']->value) {
$_smarty_tpl->tpl_vars['path']->_loop = true;
 $_smarty_tpl->tpl_vars['path']->iteration++;
 $_smarty_tpl->tpl_vars['path']->last = $_smarty_tpl->tpl_vars['path']->iteration === $_smarty_tpl->tpl_vars['path']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['breadcrumb']['last'] = $_smarty_tpl->tpl_vars['path']->last;
?>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                  <a itemprop="item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['url'], ENT_QUOTES, 'UTF-8');?>
" class="text_color" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['title'], ENT_QUOTES, 'UTF-8');?>
">
                    <span itemprop="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['path']->value['title'], ENT_QUOTES, 'UTF-8');?>
</span>
                  </a>
                  <meta itemprop="position" content="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumb']['iteration'], ENT_QUOTES, 'UTF-8');?>
">
                </li>
                <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['breadcrumb']['last']) {?><li class="navigation-pipe"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['sttheme']->value['navigation_pipe'])===null||$tmp==='' ? '>' : $tmp);?>
</li><?php }?>
              <?php } ?>
            </ul>
          </nav>
          <?php }?>
        </div>
  </div></div>
<?php }?>
</div>
<?php }?><?php }} ?>
