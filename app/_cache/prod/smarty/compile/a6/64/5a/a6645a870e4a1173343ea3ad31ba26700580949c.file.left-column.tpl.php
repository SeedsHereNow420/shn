<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 08:10:21
         compiled from "modules/faqs/views/templates/front/left-column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15957632255c2f856da46fd8-30299618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6645a870e4a1173343ea3ad31ba26700580949c' => 
    array (
      0 => 'modules/faqs/views/templates/front/left-column.tpl',
      1 => 1512425160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15957632255c2f856da46fd8-30299618',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout' => 0,
    'infos' => 0,
    'basePath' => 0,
    'id_shop' => 0,
    'id_lang' => 0,
    'faqCategory' => 0,
    'most' => 0,
    'product_category_assoc_faqs' => 0,
    'faq' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2f856db03928_78322294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2f856db03928_78322294')) {function content_5c2f856db03928_78322294($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['layout']->value=='layouts/layout-both-columns.tpl'&&$_smarty_tpl->tpl_vars['infos']->value['hookName']=='displayRightColumn') {?> <?php } else { ?>

  <?php if (isset($_smarty_tpl->tpl_vars['infos']->value['button'])&&$_smarty_tpl->tpl_vars['infos']->value['button']) {?>
    <div class="block block-faq-left-column">
      <h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Ask a question','mod'=>'faqs'),$_smarty_tpl);?>
</h4>
      <div class="block_content list-block">
        <button type="submit" class="button btn-primary button-ask-question">
          <span><?php echo smartyTranslate(array('s'=>'Ask a question','mod'=>'faqs'),$_smarty_tpl);?>
</span>
        </button>
        <input type="hidden" name="basePath" class="basePath" value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['basePath']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="id_shop" class="id_shop" value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_shop']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
        <input type="hidden" name="id_lang" class="id_lang" value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['id_lang']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
      </div>
    </div>
  <?php }?>

  <?php if (isset($_smarty_tpl->tpl_vars['infos']->value['faqCategories'])&&$_smarty_tpl->tpl_vars['infos']->value['faqCategories']) {?>
    <div class="block block-faq-left-column">
      <h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Faq categories','mod'=>'faqs'),$_smarty_tpl);?>
</h4>
      <div class="block_content list-block">
        <ul class="categories">
          <?php  $_smarty_tpl->tpl_vars['faqCategory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['faqCategory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value['faqCategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['faqCategory']->key => $_smarty_tpl->tpl_vars['faqCategory']->value) {
$_smarty_tpl->tpl_vars['faqCategory']->_loop = true;
?>
            <li>
              <a class="category_name name_<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['id_gomakoil_faq_category'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 change_item"  href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['infos']->value['faqUrl'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
.html"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['name'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  <?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['infos']->value['mostFaq'])&&$_smarty_tpl->tpl_vars['infos']->value['mostFaq']) {?>
    <div class="block block-faq-left-column">
      <h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Featured FAQs','mod'=>'faqs'),$_smarty_tpl);?>
</h4>
      <div class="block_content list-block">
        <ul class="categories">
          <?php  $_smarty_tpl->tpl_vars['most'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['most']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value['mostFaq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['most']->key => $_smarty_tpl->tpl_vars['most']->value) {
$_smarty_tpl->tpl_vars['most']->_loop = true;
?>
            <?php if (($_smarty_tpl->tpl_vars['most']->value['association']&&!$_smarty_tpl->tpl_vars['most']->value['hide_faq'])||!$_smarty_tpl->tpl_vars['most']->value['association']) {?>
              <li>
                <a class="questions change_item" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['infos']->value['faqUrl'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['most']->value['link_rewrite_cat'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['most']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
.html">
                  <i class="material-icons">&#xE315;</i>
                  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(strip_tags($_smarty_tpl->tpl_vars['most']->value['question'],'<span>'),'htmlall','UTF-8');?>

                </a>
              </li>
            <?php }?>
          <?php } ?>
        </ul>
      </div>
    </div>
  <?php }?>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['product_category_assoc_faqs']->value)&&$_smarty_tpl->tpl_vars['product_category_assoc_faqs']->value!=false) {?>
  <div class="block block-faq-left-column">
    <h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Product category FAQs','mod'=>'faqs'),$_smarty_tpl);?>
</h4>
    <div class="block_content list-block">
      <ul class="categories">
          <?php  $_smarty_tpl->tpl_vars['faq'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['faq']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product_category_assoc_faqs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['faq']->key => $_smarty_tpl->tpl_vars['faq']->value) {
$_smarty_tpl->tpl_vars['faq']->_loop = true;
?>
            <li>
              <a class="questions change_item"
                 href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['infos']->value['faqUrl'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faq']->value['link_rewrite_cat'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faq']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
.html">
                <i class="material-icons">&#xE315;</i><?php echo htmlspecialchars(strip_tags($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faq']->value['question'],'htmlall','UTF-8'),'<span>'), ENT_QUOTES, 'UTF-8');?>

              </a>
            </li>
          <?php } ?>
      </ul>
    </div>
  </div>
<?php }?>
<?php }} ?>
