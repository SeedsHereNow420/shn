<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:06:29
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-customization.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8400792365c31a8f5cba7c4-91151371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95d4af5659d0e4d4a3667e03984ebd142d9cc8d6' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-customization.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8400792365c31a8f5cba7c4-91151371',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'configuration' => 0,
    'product' => 0,
    'customizations' => 0,
    'field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a8f5d79733_25525106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a8f5d79733_25525106')) {function content_5c31a8f5d79733_25525106($_smarty_tpl) {?>
<section class="product-customization mb-3">
  <?php if (!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>
      <div class="page_heading"><?php echo smartyTranslate(array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</div>
      <div class="mb-1"><?php echo smartyTranslate(array('s'=>'Don\'t forget to save your customization to be able to add to cart','d'=>'Shop.Forms.Help'),$_smarty_tpl);?>
</div>

      
        <form method="post" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" enctype="multipart/form-data">
          <ul class="clearfix">
            <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customizations']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?>
              <li class="product-customization-item mb-2">
                <label class="font-weight-bold"> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');?>
</label>
                <?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='text') {?>
                  <textarea placeholder="<?php echo smartyTranslate(array('s'=>'Your message here','d'=>'Shop.Forms.Help'),$_smarty_tpl);?>
" class="product-message" maxlength="250" <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required <?php }?> name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['input_name'], ENT_QUOTES, 'UTF-8');?>
"></textarea>
                  <small class="float-xs-right"><?php echo smartyTranslate(array('s'=>'250 char. max','d'=>'Shop.Forms.Help'),$_smarty_tpl);?>
</small>
                  <?php if ($_smarty_tpl->tpl_vars['field']->value['text']!=='') {?>
                      <p class="customization-message"><?php echo smartyTranslate(array('s'=>'Your customization:','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

                          <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['text'], ENT_QUOTES, 'UTF-8');?>
</label>
                      </p>
                  <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='image') {?>
                  <?php if ($_smarty_tpl->tpl_vars['field']->value['is_customized']) {?>
                    <br>
                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['image']['small']['url'], ENT_QUOTES, 'UTF-8');?>
" class="mar_r6" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');?>
" />
                    <a class="remove-image" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['remove_image_url'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Remove Image','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Remove Image','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
                  <?php }?>
                  <span class="custom-file">
                    <span class="js-file-name"><?php echo smartyTranslate(array('s'=>'No selected file','d'=>'Shop.Forms.Help'),$_smarty_tpl);?>
</span>
                    <input class="file-input js-file-input" <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required <?php }?> type="file" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['input_name'], ENT_QUOTES, 'UTF-8');?>
">
                    <button class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Choose file','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</button>
                  </span>
                  <small class="float-xs-right"><?php echo smartyTranslate(array('s'=>'.png .jpg .gif','d'=>'Shop.Forms.Help'),$_smarty_tpl);?>
</small>
                <?php }?>
              </li>
            <?php } ?>
          </ul>
          <div class="clearfix">
            <button class="btn btn-default float-xs-right" type="submit" name="submitCustomizedData"><?php echo smartyTranslate(array('s'=>'Save Customization','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</button>
          </div>
        </form>
      
      <div class="steasy_divider between_detials_and_buttons"><div class="steasy_divider_item"></div></div>
  <?php }?>
</section><?php }} ?>
