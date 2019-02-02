<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 13:13:26
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/pagination-sample.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11060572495c2fcc76a03461-63492466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72a340a270dc873e68c40f0f6c77ad09211abee9' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/pagination-sample.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11060572495c2fcc76a03461-63492466',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pagination' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2fcc76a131f4_51769855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fcc76a131f4_51769855')) {function content_5c2fcc76a131f4_51769855($_smarty_tpl) {?>

  <nav class="paginaton_sample" aria-label="Page navigation">
    <ul class="pagination">
      <?php  $_smarty_tpl->tpl_vars["page"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["page"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pagination']->value['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["page"]->key => $_smarty_tpl->tpl_vars["page"]->value) {
$_smarty_tpl->tpl_vars["page"]->_loop = true;
?>
        <li class="page-item <?php if ($_smarty_tpl->tpl_vars['page']->value['current']) {?> active <?php }?> <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames(array('disabled'=>!$_smarty_tpl->tpl_vars['page']->value['clickable'])), ENT_QUOTES, 'UTF-8');?>
">
          <?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous'||$_smarty_tpl->tpl_vars['page']->value['type']==='next'||$_smarty_tpl->tpl_vars['page']->value['current']) {?>
            <a
              rel="<?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous') {?>prev<?php } elseif ($_smarty_tpl->tpl_vars['page']->value['type']==='next') {?>next<?php } else { ?>nofollow<?php }?>"
              href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['url'], ENT_QUOTES, 'UTF-8');?>
"
              class="page-link <?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous') {?>previous <?php } elseif ($_smarty_tpl->tpl_vars['page']->value['type']==='next') {?>next <?php }?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames(array('js-search-link'=>true)), ENT_QUOTES, 'UTF-8');?>
"
              <?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous') {?> aria-label="Previous" <?php } elseif ($_smarty_tpl->tpl_vars['page']->value['type']==='next') {?> aria-label="Next" <?php }?>
            >
              <?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous') {?>
                <i class="fto-left-open-3"></i><span class="sr-only"><?php echo smartyTranslate(array('s'=>'Previous','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span>
              <?php } elseif ($_smarty_tpl->tpl_vars['page']->value['type']==='next') {?>
                <i class="fto-right-open-3"></i><span class="sr-only"><?php echo smartyTranslate(array('s'=>'Next','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span>
              <?php } else { ?>
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page'], ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars(count($_smarty_tpl->tpl_vars['pagination']->value['pages'])-2, ENT_QUOTES, 'UTF-8');?>

              <?php }?>
            </a>
          <?php }?>
        </li>
      <?php } ?>
    </ul>
  </nav>
<?php }} ?>
