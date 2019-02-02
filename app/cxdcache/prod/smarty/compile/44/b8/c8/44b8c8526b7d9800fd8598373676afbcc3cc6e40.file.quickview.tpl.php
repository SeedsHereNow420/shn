<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:45
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/quickview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209773315c31a97d0ccb27-57933411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44b8c8526b7d9800fd8598373676afbcc3cc6e40' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/quickview.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'ca6d163464ea9f351e641e98f17b9b4aad19d000' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/miniatures/sticker.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '78606e7de160fb34c3b7441db7d78b804cb8e201' => 
    array (
      0 => 'module:stvideo/views/templates/hook/stvideo.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
    '1151c2c7524115caa39787a245346cf37856866f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-cover-item.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'd5101ef76064ebc7e852c3f205ee884223eba3a5' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-thumbnails-item.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '59e53d096740def4955e17a74dfd039d1fcc5c1f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-cover-thumbnails.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '27655825243e826f8dc8414cb4f2c87e282de418' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-prices.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '3d3a0d29bd13819ad8c171d5883293a37ba048aa' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-variants.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'af20cf76ff9cff23704bc3132710899fe93b7544' => 
    array (
      0 => 'module:stvideo/views/templates/hook/stvideo_link.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
    '6a2f5060db75951f7ab554fe7de265cb2596ee0c' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-add-to-cart.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209773315c31a97d0ccb27-57933411',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'sttheme' => 0,
    'quickview_image_column' => 0,
    'urls' => 0,
    'static_token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a97e21a516_09850944',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a97e21a516_09850944')) {function content_5c31a97e21a516_09850944($_smarty_tpl) {?>
<div id="quickview-modal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], ENT_QUOTES, 'UTF-8');?>
" class="modal fade quickview" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
       <button type="button" class="st_modal_close" data-dismiss="modal" aria-label="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Shop.Theme'),$_smarty_tpl);?>
">
         <span aria-hidden="true">&times;</span>
       </button>
     <div class="modal-body general_border">
      <div class="row product_page_container">
        <?php $_smarty_tpl->tpl_vars['quickview_image_column'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_image_column_md'], null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_secondary_column_md']) {?>
          <?php $_smarty_tpl->tpl_vars['quickview_image_column'] = new Smarty_variable((int)($_smarty_tpl->tpl_vars['sttheme']->value['pro_secondary_column_md']/2)+$_smarty_tpl->tpl_vars['quickview_image_column']->value, null, 0);?>
        <?php }?>
        <div class="col-lg-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_image_column_md'], ENT_QUOTES, 'UTF-8');?>
 mb-3">
          
            <?php /*  Call merged included template "catalog/_partials/product-cover-thumbnails.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-cover-thumbnails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97d101be3_36950541($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-cover-thumbnails.tpl" */?>
          
        </div>
        <div class="col-lg-<?php echo htmlspecialchars(12-$_smarty_tpl->tpl_vars['sttheme']->value['pro_image_column_md'], ENT_QUOTES, 'UTF-8');?>
">
          <div class="product_name_wrap"><h1 class="product_name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</h1></div>
          
            <?php /*  Call merged included template "catalog/_partials/product-prices.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-prices.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97dbb1249_05637393($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-prices.tpl" */?>
          
          
            <div id="product-description-short"><?php echo $_smarty_tpl->tpl_vars['product']->value['description_short'];?>
</div>
          
          
            <div class="product-actions">
              <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
" method="post" id="add-to-cart-or-refresh">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
">
                <input type="hidden" name="id_product" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id'], ENT_QUOTES, 'UTF-8');?>
" id="product_page_product_id">
                <input type="hidden" name="id_customization" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
" id="product_customization_id">
                
                  <?php /*  Call merged included template "catalog/_partials/product-variants.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-variants.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97dde42c6_36625911($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-variants.tpl" */?>
                

                
                  <?php /*  Call merged included template "catalog/_partials/product-add-to-cart.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-add-to-cart.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97df28464_06155214($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-add-to-cart.tpl" */?>
                
                
                
                  <input class="product-refresh hidden" data-url-update="false" name="refresh" type="submit" value="<?php echo smartyTranslate(array('s'=>'Refresh','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
" hidden>
                
            </form>
          </div>
        
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductAdditionalInfo','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

        </div>
      </div>
     </div>
   </div>
 </div>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:45
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-cover-thumbnails.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a97d101be3_36950541')) {function content_5c31a97d101be3_36950541($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>
<?php $_smarty_tpl->tpl_vars["image_count"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['product']->value['images']), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']==2) {?><?php $_smarty_tpl->tpl_vars['image_count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['sttheme']->value['pro_images']), null, 0);?><?php }?>
<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==6&&$_smarty_tpl->tpl_vars['image_count']->value<2) {?><?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 5;?><?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==6&&$_smarty_tpl->tpl_vars['image_count']->value>1) {?><?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 0;?><?php }?>
<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['is_mobile_device']) {?>
    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==5&&$_smarty_tpl->tpl_vars['image_count']->value<2) {?><?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile'] = 3;?><?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==5&&$_smarty_tpl->tpl_vars['image_count']->value>1) {?><?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile'] = 4;?><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==1) {?>
      <?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 3;?>
    <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==2) {?>
      <?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 4;?>
    <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==3) {?>
      <?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 5;?>
    <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails_mobile']==4) {?>
      <?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'] = 0;?>
    <?php }?>
<?php }?>
<div class="images-container pro_number_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
">
<div class="images-container-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1||$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==2) {?> row <?php }?>">
<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v']) {?><?php $_smarty_tpl->createLocalArrayVariable('sttheme', null, 0);
$_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v'] = 3;?><?php }?>
<?php $_smarty_tpl->tpl_vars["gallery_top_width_v"] = new Smarty_variable(12-$_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v'], null, 0);?>
<?php $_smarty_tpl->tpl_vars["gallery_thumbnails_width_v_mobile"] = new Smarty_variable(floor($_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v'])+1, null, 0);?>
<?php $_smarty_tpl->tpl_vars["gallery_top_width_v_mobile"] = new Smarty_variable(12-$_smarty_tpl->tpl_vars['gallery_thumbnails_width_v_mobile']->value, null, 0);?>
<div class="pro_gallery_top_container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1||$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==2) {?> col-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_top_width_v_mobile']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-md-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_top_width_v']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php }?><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1) {?> push-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_thumbnails_width_v_mobile']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 push-md-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v'],'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php }?> mb-3">
  <div class="pro_gallery_top_inner posi_rel">
  
    <?php  $_smarty_tpl->tpl_vars['extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['extraContent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['extra']->key => $_smarty_tpl->tpl_vars['extra']->value) {
$_smarty_tpl->tpl_vars['extra']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['extra']->value['moduleName']=='ststickers') {?>
            <?php /*  Call merged included template "catalog/_partials/miniatures/sticker.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/miniatures/sticker.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stickers'=>$_smarty_tpl->tpl_vars['extra']->value['content'],'sticker_position'=>array(0,1,2,3,4,5,6,7,8,9),'sticker_sold_out'=>(!$_smarty_tpl->tpl_vars['product']->value['add_to_cart_url'])), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97d311013_15403899($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/miniatures/sticker.tpl" */?>
        <?php } elseif ($_smarty_tpl->tpl_vars['extra']->value['moduleName']=='stvideo') {?>
            <div class="st_popup_video_wrap">
            <?php /*  Call merged included template "module:stvideo/views/templates/hook/stvideo.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("module:stvideo/views/templates/hook/stvideo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stvideos'=>$_smarty_tpl->tpl_vars['extra']->value['content']['videos'],'video_position'=>array(1,2,3,4,5,6,7,8,9,12)), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97d4d5826_47936479($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:stvideo/views/templates/hook/stvideo.tpl" */?>
            </div>
        <?php }?>
    <?php } ?>
  

  
  
    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_thickbox']) {?>
      <div class="pro_popup_trigger_box">
      <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']==2) {?>
        <?php $_smarty_tpl->tpl_vars['pro_popup_trigger'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_images'], null, 0);?>
      <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['pro_popup_trigger'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['images'], null, 0);?>
      <?php }?>
      <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pro_popup_trigger']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
        
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['superlarge_default']['url'], ENT_QUOTES, 'UTF-8');?>
" class="pro_popup_trigger st_popup_image st_pro_popup_image replace-2x layer_icon_wrap" data-group="pro_gallery_popup_trigger" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"><i class="fto-resize-full"></i></a>
      <?php } ?>
      </div>
    <?php }?>
    <div class="swiper-container pro_gallery_top swiper-button-lr <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['thumbs_direction_nav']==3) {?> swiper-navigation-rectangle <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['thumbs_direction_nav']==2) {?> swiper-navigation-arrow <?php } else { ?> swiper-navigation-circle <?php }?>" <?php if ($_smarty_tpl->tpl_vars['language']->value['is_rtl']) {?> dir="rtl" <?php }?>>
        <div class="swiper-wrapper">
            <?php $_smarty_tpl->tpl_vars['pro_gallery_initial'] = new Smarty_variable(0, null, 0);?>
              <?php $_smarty_tpl->tpl_vars["curr_combination_thumbs"] = new Smarty_variable(array(), null, 0);?>
              <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
                <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image']==$_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?><?php $_smarty_tpl->tpl_vars['pro_gallery_initial'] = new Smarty_variable($_smarty_tpl->tpl_vars['index']->value, null, 0);?><?php }?>
                <?php $_smarty_tpl->createLocalArrayVariable('curr_combination_thumbs', null, 0);
$_smarty_tpl->tpl_vars['curr_combination_thumbs']->value[] = $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
                <?php /*  Call merged included template "catalog/_partials/product-cover-item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-cover-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97d5634e8_05403610($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-cover-item.tpl" */?>
              <?php } ?>
              <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']==2) {?>
                <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sttheme']->value['pro_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
                  <?php if (!in_array($_smarty_tpl->tpl_vars['image']->value['id_image'],$_smarty_tpl->tpl_vars['curr_combination_thumbs']->value)) {?>
                    <?php /*  Call merged included template "catalog/_partials/product-cover-item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-cover-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97d5634e8_05403610($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-cover-item.tpl" */?>
                  <?php }?>
                <?php } ?>
              <?php }?>
        </div>
        <div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==4) {?><div class="swiper-pagination"></div><?php }?>
    </div>
    <script type="text/javascript">
    //<![CDATA[
        
        if(typeof(swiper_options) ==='undefined')
        var swiper_options = [];
        
        
        swiper_options.push({
            
            id_st: '.pro_gallery_top',
            spaceBetween: <?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['sttheme']->value['gallery_spacing'], ENT_QUOTES, 'UTF-8');?>
,
            nextButton: '.pro_gallery_top .swiper-button-next',
            prevButton: '.pro_gallery_top .swiper-button-prev',
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==4) {?>
            pagination: '.pro_gallery_top .swiper-pagination',
            <?php }?>
            loop: false,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==3&&$_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_fw']) {?>
                <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_fw'], null, 0);?>
            <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>
                    <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xxl'], null, 0);?>
                <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=1) {?>
                    <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xl'], null, 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars['slidesPerView'] = new Smarty_variable($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_lg'], null, 0);?>
                <?php }?>
            <?php }?>
            slidesPerView: <?php if ($_smarty_tpl->tpl_vars['slidesPerView']->value<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slidesPerView']->value, ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?>,
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive']) {?>
            
            breakpoints: {
                
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==3&&$_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_fw']) {?>1600: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xxl']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xxl'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> },<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=2) {?>1440: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xl']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xl'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> },<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=1) {?>1200: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_lg']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_lg'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> },<?php }?>
                992: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_md']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_md'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> },
                768: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_sm']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_sm'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> },
                480: {slidesPerView: <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xs']<$_smarty_tpl->tpl_vars['image_count']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['pro_thumnbs_per_xs'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image_count']->value, ENT_QUOTES, 'UTF-8');?>
<?php }?> }
            },
            
            <?php }?>
            onSlideChangeEnd: function(swiper){
              prestashop.easyzoom.init(swiper.wrapper.find('.swiper-slide-visible .easyzoom'));
              
              if($('.pro_gallery_thumbs').length && typeof($('.pro_gallery_thumbs')[0].swiper)!=='undefined')
              {
                $('.pro_gallery_thumbs')[0].swiper.slideTo(swiper.activeIndex);
                $($('.pro_gallery_thumbs')[0].swiper.slides).removeClass('clicked_thumb').eq(swiper.activeIndex).addClass('clicked_thumb');
              }
            },
            onInit : function (swiper) {
                  prestashop.easyzoom.init(swiper.wrapper.find('.swiper-slide-visible .easyzoom'));
                  $('.pro_popup_trigger_box a').removeClass('st_active').eq(swiper.activeIndex).addClass('st_active');

                  if($(swiper.slides).length==$(swiper.slides).filter('.swiper-slide-visible').length)
                  {
                      $(swiper.params.nextButton).hide();
                      $(swiper.params.prevButton).hide();
                  }
                  else
                  {
                      $(swiper.params.nextButton).show();
                      $(swiper.params.prevButton).show();
                  }
              },
            onSlideChangeStart : function (swiper) {
                  $('.pro_popup_trigger_box a').removeClass('st_active').eq(swiper.activeIndex).addClass('st_active');
              },
            roundLengths: true,
            lazyLoading: true,
            lazyLoadingInPrevNext: true,
            lazyLoadingInPrevNextAmount: 2,
            initialSlide: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pro_gallery_initial']->value, ENT_QUOTES, 'UTF-8');?>

        
        });
         
    //]]>
    </script>
  
  </div>
</div>
<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=4&&$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=5) {?>
<div class="pro_gallery_thumbs_container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1||$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==2) {?> col-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_thumbnails_width_v_mobile']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-md-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['gallery_thumbnails_width_v'],'.','-'), ENT_QUOTES, 'UTF-8');?>
 pro_gallery_thumbs_vertical <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==3) {?> pro_gallery_thumbs_grid <?php } else { ?> pro_gallery_thumbs_horizontal <?php }?><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1) {?> pull-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_top_width_v_mobile']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
  pull-md-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['gallery_top_width_v']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php }?>">
  
    <div class="swiper-container pro_gallery_thumbs swiper-button-lr <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['thumbs_direction_nav']==3) {?> swiper-navigation-rectangle <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['thumbs_direction_nav']==2) {?> swiper-navigation-arrow <?php } else { ?> swiper-navigation-circle <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==0) {?> swiper-small-button <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']) {?> hightlight_curr_thumbs <?php }?>" <?php if ($_smarty_tpl->tpl_vars['language']->value['is_rtl']) {?> dir="rtl" <?php }?>>
        <div class="swiper-wrapper">
            <?php $_smarty_tpl->tpl_vars["curr_combination_thumbs"] = new Smarty_variable(array(), null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
              <?php $_smarty_tpl->createLocalArrayVariable('curr_combination_thumbs', null, 0);
$_smarty_tpl->tpl_vars['curr_combination_thumbs']->value[] = $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
              <?php /*  Call merged included template "catalog/_partials/product-thumbnails-item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-thumbnails-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('curr_combination_thumb'=>true,'disable_lazyloading'=>$_smarty_tpl->tpl_vars['pro_gallery_initial']->value), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97d955516_27967443($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-thumbnails-item.tpl" */?>
            <?php } ?>
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']==2) {?>
              <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sttheme']->value['pro_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
                <?php if (!in_array($_smarty_tpl->tpl_vars['image']->value['id_image'],$_smarty_tpl->tpl_vars['curr_combination_thumbs']->value)) {?>
                  <?php /*  Call merged included template "catalog/_partials/product-thumbnails-item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-thumbnails-item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('disable_lazyloading'=>$_smarty_tpl->tpl_vars['pro_gallery_initial']->value), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97d955516_27967443($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-thumbnails-item.tpl" */?>
                <?php }?>
              <?php } ?>
            <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1||$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==2) {?>
        <div class="swiper-button swiper-button-top"><i class="fto-up-open slider_arrow_top"></i><i class="fto-down-open slider_arrow_bottom"></i></div>
        <div class="swiper-button swiper-button-bottom"><i class="fto-up-open slider_arrow_top"></i><i class="fto-down-open slider_arrow_bottom"></i></div>
        <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==0) {?>
        <div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
        <?php }?>
    </div>
    <script type="text/javascript">
    //<![CDATA[
    sttheme.product_thumbnails = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails'], ENT_QUOTES, 'UTF-8');?>
;
    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=3) {?>
        
        if(typeof(swiper_options) ==='undefined')
        var swiper_options = [];
        
        
        swiper_options.push({
            
            id_st: '.pro_gallery_thumbs',
            spaceBetween: 10,
            slidesPerView: 'auto',
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==1||$_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']==2) {?>
            direction: 'vertical',
            nextButton: '.pro_gallery_thumbs .swiper-button-top',
            prevButton: '.pro_gallery_thumbs .swiper-button-bottom',
            <?php } else { ?>
            nextButton: '.pro_gallery_thumbs .swiper-button-next',
            prevButton: '.pro_gallery_thumbs .swiper-button-prev',
            <?php }?>            
            loop: false,
            slideToClickedSlide: true,
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            onSlideChangeEnd: function(swiper){
              if(typeof($('.pro_gallery_top')[0].swiper)!=='undefined')
                $('.pro_gallery_top')[0].swiper.slideTo(swiper.activeIndex);
            },
            onInit : function (swiper) {
                if($(swiper.slides).length==$(swiper.slides).filter('.swiper-slide-visible').length)
                {
                    $(swiper.params.nextButton).hide();
                    $(swiper.params.prevButton).hide();
                }
                else
                {
                    $(swiper.params.nextButton).show();
                    $(swiper.params.prevButton).show();
                }
            },
            onClick: function(swiper){
              if(typeof($('.pro_gallery_top')[0].swiper)!=='undefined')
                $('.pro_gallery_top')[0].swiper.slideTo(swiper.clickedIndex);
              $(swiper.slides).removeClass('clicked_thumb').eq(swiper.clickedIndex).addClass('clicked_thumb');
            },
            roundLengths: true,
            lazyLoading: <?php if ($_smarty_tpl->tpl_vars['pro_gallery_initial']->value) {?>false<?php } else { ?>true<?php }?>,
            lazyLoadingInPrevNext: true,
            lazyLoadingInPrevNextAmount: 2,
            initialSlide: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pro_gallery_initial']->value, ENT_QUOTES, 'UTF-8');?>

        
        });
         
    <?php }?>
    //]]>
    </script>
  
</div>
<?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_gallerys']==1&&count($_smarty_tpl->tpl_vars['curr_combination_thumbs']->value)<count($_smarty_tpl->tpl_vars['sttheme']->value['pro_images'])) {?>
  <a href="javascript:;" class="btn btn-link pro_gallery_show_all"><?php echo smartyTranslate(array('s'=>'Show all images','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a>
<?php }?>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:45
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/miniatures/sticker.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a97d311013_15403899')) {function content_5c31a97d311013_15403899($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars["has_sticker_static"] = new Smarty_variable(0, null, 0);?><?php if (isset($_smarty_tpl->tpl_vars['stickers']->value)&&$_smarty_tpl->tpl_vars['stickers']->value) {?><?php  $_smarty_tpl->tpl_vars['ststicker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ststicker']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stickers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ststicker']->key => $_smarty_tpl->tpl_vars['ststicker']->value) {
$_smarty_tpl->tpl_vars['ststicker']->_loop = true;
?><?php if (in_array($_smarty_tpl->tpl_vars['ststicker']->value['sticker_position'],$_smarty_tpl->tpl_vars['sticker_position']->value)) {?><?php if (!$_smarty_tpl->tpl_vars['has_sticker_static']->value) {?><div class="st_sticker_block"><?php $_smarty_tpl->tpl_vars['has_sticker_static'] = new Smarty_variable(1, null, 0);?><?php }?><div class="st_sticker layer_btn flag_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['ststicker']->value['is_flag'], ENT_QUOTES, 'UTF-8');?>
 <?php if (in_array(10,$_smarty_tpl->tpl_vars['sticker_position']->value)||in_array(11,$_smarty_tpl->tpl_vars['sticker_position']->value)) {?> st_sticker_static <?php }?> st_sticker_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['id_st_sticker'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['type']) {?> st_sticker_type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['type'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?> st_sticker_img <?php }?>"><?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['height'], ENT_QUOTES, 'UTF-8');?>
"><?php } else { ?><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></div><?php }?><?php } ?><?php }?><?php if (isset($_smarty_tpl->tpl_vars['ststickers']->value)&&$_smarty_tpl->tpl_vars['ststickers']->value) {?><?php  $_smarty_tpl->tpl_vars['flag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['flag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['flags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['flag']->key => $_smarty_tpl->tpl_vars['flag']->value) {
$_smarty_tpl->tpl_vars['flag']->_loop = true;
?><?php  $_smarty_tpl->tpl_vars['ststicker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ststicker']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ststickers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ststicker']->key => $_smarty_tpl->tpl_vars['ststicker']->value) {
$_smarty_tpl->tpl_vars['ststicker']->_loop = true;
?><?php if (in_array($_smarty_tpl->tpl_vars['ststicker']->value['sticker_position'],$_smarty_tpl->tpl_vars['sticker_position']->value)&&(($_smarty_tpl->tpl_vars['flag']->value['type']=='new'&&$_smarty_tpl->tpl_vars['ststicker']->value['type']==1)||($_smarty_tpl->tpl_vars['flag']->value['type']=='on-sale'&&$_smarty_tpl->tpl_vars['ststicker']->value['type']==2)||($_smarty_tpl->tpl_vars['flag']->value['type']=='discount'&&$_smarty_tpl->tpl_vars['ststicker']->value['type']==3)||($_smarty_tpl->tpl_vars['flag']->value['type']=='online-only'&&$_smarty_tpl->tpl_vars['ststicker']->value['type']==5)||($_smarty_tpl->tpl_vars['flag']->value['type']=='pack'&&$_smarty_tpl->tpl_vars['ststicker']->value['type']==6))) {?><?php if (!$_smarty_tpl->tpl_vars['has_sticker_static']->value) {?><div class="st_sticker_block"><?php $_smarty_tpl->tpl_vars['has_sticker_static'] = new Smarty_variable(1, null, 0);?><?php }?><div class="st_sticker layer_btn flag_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['ststicker']->value['is_flag'], ENT_QUOTES, 'UTF-8');?>
 <?php if (in_array(10,$_smarty_tpl->tpl_vars['sticker_position']->value)||in_array(11,$_smarty_tpl->tpl_vars['sticker_position']->value)) {?> st_sticker_static <?php }?> st_sticker_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['id_st_sticker'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['type']) {?> st_sticker_type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['type'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?> st_sticker_img <?php }?>"><?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
"  width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['height'], ENT_QUOTES, 'UTF-8');?>
"><?php } else { ?><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></div><?php }?><?php } ?><?php } ?><?php  $_smarty_tpl->tpl_vars['ststicker'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ststicker']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ststickers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ststicker']->key => $_smarty_tpl->tpl_vars['ststicker']->value) {
$_smarty_tpl->tpl_vars['ststicker']->_loop = true;
?><?php if (in_array($_smarty_tpl->tpl_vars['ststicker']->value['sticker_position'],$_smarty_tpl->tpl_vars['sticker_position']->value)&&(($_smarty_tpl->tpl_vars['ststicker']->value['type']==4&&$_smarty_tpl->tpl_vars['sticker_sold_out']->value)||($_smarty_tpl->tpl_vars['ststicker']->value['type']==7&&!$_smarty_tpl->tpl_vars['sticker_sold_out']->value))) {?><?php if (!$_smarty_tpl->tpl_vars['has_sticker_static']->value) {?><div class="st_sticker_block"><?php $_smarty_tpl->tpl_vars['has_sticker_static'] = new Smarty_variable(1, null, 0);?><?php }?><div class="st_sticker layer_btn flag_<?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['ststicker']->value['is_flag'], ENT_QUOTES, 'UTF-8');?>
 <?php if (in_array(10,$_smarty_tpl->tpl_vars['sticker_position']->value)||in_array(11,$_smarty_tpl->tpl_vars['sticker_position']->value)) {?> st_sticker_static <?php }?> st_sticker_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['id_st_sticker'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['type']) {?> st_sticker_type_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['type'], ENT_QUOTES, 'UTF-8');?>
 <?php }?> <?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?> st_sticker_img <?php }?>"><?php if ($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang']) {?><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['image_multi_lang'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
"  width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['height'], ENT_QUOTES, 'UTF-8');?>
"><?php } else { ?><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ststicker']->value['text'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?></div><?php }?><?php } ?><?php }?><?php if ($_smarty_tpl->tpl_vars['has_sticker_static']->value) {?></div><?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:45
         compiled from "module:stvideo/views/templates/hook/stvideo.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a97d4d5826_47936479')) {function content_5c31a97d4d5826_47936479($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['video']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stvideos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['video']->value['url']&&in_array($_smarty_tpl->tpl_vars['video']->value['video_position'],$_smarty_tpl->tpl_vars['video_position']->value)) {?>
<a class="st_popup_video layer_icon_wrap <?php if ($_smarty_tpl->tpl_vars['video']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['video']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?>" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Open video','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow"><i class="fto-play"></i></a>
<?php }?>
<?php } ?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:45
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-cover-item.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a97d5634e8_05403610')) {function content_5c31a97d5634e8_05403610($_smarty_tpl) {?>
              <div class="swiper-slide">
                <div class="easyzoom--overlay <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']) {?> easyzoom <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']==2) {?> disable_easyzoom_on_mobile <?php }?>">
                    <a href="<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']==1||($_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']==2&&!$_smarty_tpl->tpl_vars['sttheme']->value['is_mobile_device'])||$_smarty_tpl->tpl_vars['sttheme']->value['enable_thickbox']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize']['superlarge_default']['url'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>javascript:;<?php }?>" class="<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_thickbox']&&!$_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']) {?> st_popup_image st_pro_popup_image <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['retina']&&isset($_smarty_tpl->tpl_vars['image']->value['bySize']['superlarge_default_2x']['url'])) {?> replace-2x <?php }?>" <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['enable_thickbox']&&!$_smarty_tpl->tpl_vars['sttheme']->value['enable_zoom']) {?> data-group="pro_gallery_popup" <?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
">
                        <img
                          class="pro_gallery_item <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']) {?>swiper-lazy<?php }?>"
                          <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']) {?>data-<?php }?>src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['gallery_image_type']]['url'], ENT_QUOTES, 'UTF-8');?>
"
                          <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['retina']&&isset($_smarty_tpl->tpl_vars['image']->value['bySize'][($_smarty_tpl->tpl_vars['sttheme']->value['gallery_image_type']).('_2x')]['url'])) {?> <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']) {?>data-<?php }?>srcset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][($_smarty_tpl->tpl_vars['sttheme']->value['gallery_image_type']).('_2x')]['url'], ENT_QUOTES, 'UTF-8');?>
 2x" <?php }?>
                          alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
                          title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
"
                          width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['gallery_image_type']]['width'], ENT_QUOTES, 'UTF-8');?>
"
                          height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['gallery_image_type']]['height'], ENT_QUOTES, 'UTF-8');?>
"
                          data-id_image="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['id_image'], ENT_QUOTES, 'UTF-8');?>
"
                          <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['google_rich_snippets']) {?> itemprop="image" <?php }?>
                        />
                    </a>
                </div>
              </div><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:45
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-thumbnails-item.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a97d955516_27967443')) {function content_5c31a97d955516_27967443($_smarty_tpl) {?>
              <div class="swiper-slide <?php if ($_smarty_tpl->tpl_vars['image']->value['id_image']==$_smarty_tpl->tpl_vars['product']->value['cover']['id_image']) {?> clicked_thumb <?php }?>">
                <div class="pro_gallery_thumb_box general_border <?php if (isset($_smarty_tpl->tpl_vars['curr_combination_thumb']->value)&&$_smarty_tpl->tpl_vars['curr_combination_thumb']->value) {?> curr_combination_thumb <?php }?>">
                  <img
                      class="pro_gallery_thumb <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=3&&!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']&&(!isset($_smarty_tpl->tpl_vars['disable_lazyloading']->value)||!$_smarty_tpl->tpl_vars['disable_lazyloading']->value)&&(!isset($_smarty_tpl->tpl_vars['disable_lazyloading']->value)||!$_smarty_tpl->tpl_vars['disable_lazyloading']->value)) {?>swiper-lazy<?php }?>"
                      <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=3&&!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']&&(!isset($_smarty_tpl->tpl_vars['disable_lazyloading']->value)||!$_smarty_tpl->tpl_vars['disable_lazyloading']->value)) {?>data-<?php }?>src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['thumb_image_type']]['url'], ENT_QUOTES, 'UTF-8');?>
"
                      <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['retina']&&isset($_smarty_tpl->tpl_vars['image']->value['bySize'][($_smarty_tpl->tpl_vars['sttheme']->value['thumb_image_type']).('_2x')]['url'])) {?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_thumbnails']!=3&&!$_smarty_tpl->tpl_vars['sttheme']->value['is_ajax']&&(!isset($_smarty_tpl->tpl_vars['disable_lazyloading']->value)||!$_smarty_tpl->tpl_vars['disable_lazyloading']->value)) {?>data-<?php }?>srcset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][($_smarty_tpl->tpl_vars['sttheme']->value['thumb_image_type']).('_2x')]['url'], ENT_QUOTES, 'UTF-8');?>
 2x" <?php }?>
                      alt="<?php if ($_smarty_tpl->tpl_vars['image']->value['legend']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
<?php }?>"
                      title="<?php if ($_smarty_tpl->tpl_vars['image']->value['legend']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
<?php }?>"
                      width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['thumb_image_type']]['width'], ENT_QUOTES, 'UTF-8');?>
"
                      height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['bySize'][$_smarty_tpl->tpl_vars['sttheme']->value['thumb_image_type']]['height'], ENT_QUOTES, 'UTF-8');?>
"
                      
                    /> 
                </div>
              </div><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:45
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-prices.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a97dbb1249_05637393')) {function content_5c31a97dbb1249_05637393($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.date_format.php';
?>
<?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']) {?>
  <div class="product-prices">
    
    
      <?php if (isset($_smarty_tpl->tpl_vars['countdown_active']->value)&&$_smarty_tpl->tpl_vars['countdown_active']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['sttheme']->value['is_catalog']&&$_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
          <?php if ((smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S')>=$_smarty_tpl->tpl_vars['product']->value['specific_prices']['from']&&smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S')<$_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'])) {?>
          <div class="countdown_outer_box">
            <div class="countdown_heading"><?php echo smartyTranslate(array('s'=>'Limited time offer','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
:</div>
            <div class="countdown_box">
              <i class="icon-clock"></i><span class="countdown_pro c_countdown_timer" data-countdown="<?php echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'],'%Y/%m/%d %H:%M:%S'), ENT_QUOTES, 'UTF-8');?>
" data-gmdate="<?php echo htmlspecialchars(gmdate('Y/m/d H:i:s',strtotime($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'])), ENT_QUOTES, 'UTF-8');?>
" data-id-product="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id']), ENT_QUOTES, 'UTF-8');?>
"></span>
            </div>
          </div>
          <?php } elseif (($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to']=='0000-00-00 00:00:00')&&($_smarty_tpl->tpl_vars['product']->value['specific_prices']['from']=='0000-00-00 00:00:00')&&$_smarty_tpl->tpl_vars['countdown_title_aw_display']->value) {?>
            <div class="countdown_outer_box countdown_pro_perm" data-id-product="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id']), ENT_QUOTES, 'UTF-8');?>
">
              <div class="countdown_box">
                <i class="icon-clock"></i><span><?php echo smartyTranslate(array('s'=>'Limited special offer','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span>
              </div>
            </div>
          <?php }?>
        <?php }?>
      <?php }?>
    
    
      <div
        class="product-price"
        <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['google_rich_snippets']) {?>
        itemprop="offers"
        itemscope
        itemtype="https://schema.org/Offer"
        <?php }?>
      >
        <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['google_rich_snippets']) {?><link itemprop="availability" href="https://schema.org/<?php if ($_smarty_tpl->tpl_vars['product']->value['availability']=='unavailable') {?>OutOfStock<?php } else { ?>InStock<?php }?>"/><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['display_pro_condition']&&$_smarty_tpl->tpl_vars['product']->value['condition']&&$_smarty_tpl->tpl_vars['sttheme']->value['google_rich_snippets']) {?><link itemprop="itemCondition" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['condition']['schema_url'], ENT_QUOTES, 'UTF-8');?>
"/><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['google_rich_snippets']) {?><meta itemprop="priceCurrency" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
"><?php }?>

        <div class="current-price">
          <span class="price" <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['google_rich_snippets']) {?> itemprop="price" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price_amount'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>

          
            <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl);?>

                <span class="regular-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['regular_price'], ENT_QUOTES, 'UTF-8');?>
</span>
            <?php }?>
          
          <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
          <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['hide_discount']) {?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['discount_type']==='percentage') {?>
              <span class="discount discount-percentage"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_percentage'], ENT_QUOTES, 'UTF-8');?>
</span>
            <?php } else { ?>
              <span class="discount discount-amount">-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_to_display'], ENT_QUOTES, 'UTF-8');?>
</span>
            <?php }?>
          <?php }?>
          <?php }?>
        </div>

        
          <?php if ($_smarty_tpl->tpl_vars['displayUnitPrice']->value) {?>
            <div class="product-unit-price sub"><?php echo smartyTranslate(array('s'=>'(%unit_price%)','d'=>'Shop.Theme.Catalog','sprintf'=>array('%unit_price%'=>$_smarty_tpl->tpl_vars['product']->value['unit_price_full'])),$_smarty_tpl);?>
</div>
          <?php }?>
        
      </div>
    

    
      <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==2) {?>
        <div class="product-without-taxes"><?php echo smartyTranslate(array('s'=>'%price% tax excl.','d'=>'Shop.Theme.Catalog','sprintf'=>array('%price%'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc'])),$_smarty_tpl);?>
</div>
      <?php }?>
    

    
      <?php if ($_smarty_tpl->tpl_vars['displayPackPrice']->value) {?>
        <div class="product-pack-price"><span><?php echo smartyTranslate(array('s'=>'Instead of %price%','d'=>'Shop.Theme.Catalog','sprintf'=>array('%price%'=>$_smarty_tpl->tpl_vars['noPackPrice']->value)),$_smarty_tpl);?>
</span></div>
      <?php }?>
    

    
      <?php if ($_smarty_tpl->tpl_vars['product']->value['ecotax']['amount']>0) {?>
        <div class="price-ecotax"><?php echo smartyTranslate(array('s'=>'Including %amount% for ecotax','d'=>'Shop.Theme.Catalog','sprintf'=>array('%amount%'=>$_smarty_tpl->tpl_vars['product']->value['ecotax']['value'])),$_smarty_tpl);?>

          <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
            <?php echo smartyTranslate(array('s'=>'(not impacted by the discount)','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>

          <?php }?>
        </div>
      <?php }?>
    

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"weight",'hook_origin'=>'product_sheet'),$_smarty_tpl);?>


    <div class="tax-shipping-delivery-label">
      <?php if ($_smarty_tpl->tpl_vars['configuration']->value['display_taxes_label']) {?>
        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['labels']['tax_long'], ENT_QUOTES, 'UTF-8');?>

      <?php }?>
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"price"),$_smarty_tpl);?>

      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"after_price"),$_smarty_tpl);?>

    </div>
  </div>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:45
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-variants.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a97dde42c6_36625911')) {function content_5c31a97dde42c6_36625911($_smarty_tpl) {?>
<div class="product-variants">
  <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute_group'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute_group']->value = $_smarty_tpl->tpl_vars['group']->key;
?>
    <div class="clearfix product-variants-item">
      <span class="control-label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
      <?php if ($_smarty_tpl->tpl_vars['group']->value['group_type']=='select') {?>
        <select
          class="form-control form-control-select"
          id="group_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
"
          data-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
"
          name="group[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
]">
          <?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
            <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['selected']) {?> selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>
</option>
          <?php } ?>
        </select>
      <?php } elseif ($_smarty_tpl->tpl_vars['group']->value['group_type']=='color') {?>
        <ul id="group_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
" class="clearfix li_fl">
          <?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
            <li class="input-container" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
              <input class="input-color" type="radio" data-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
" name="group[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['selected']) {?> checked="checked"<?php }?>/>
              <span class="color <?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['texture']) {?>texture<?php }?>"
                <?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['html_color_code']) {?> style="background-color: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['html_color_code'], ENT_QUOTES, 'UTF-8');?>
" <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['texture']) {?> style="background-image: url(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['texture'], ENT_QUOTES, 'UTF-8');?>
)" <?php }?>
              ><span class="sr-only"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span></span>
              <span class="st-input-loading"><i class="fto-spin5 animate-spin"></i></span>
            </li>
          <?php } ?>
        </ul>
      <?php } elseif ($_smarty_tpl->tpl_vars['group']->value['group_type']=='radio') {?>
        <ul id="group_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
" class="clearfix li_fl">
          <?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
            <li class="input-container" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
              <input class="input-radio" type="radio" data-product-attribute="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
" name="group[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute_group']->value, ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_attribute']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['group_attribute']->value['selected']) {?> checked="checked"<?php }?>/>
              <span class="radio-label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
              <span class="st-input-loading"><i class="fto-spin5 animate-spin"></i></span>
            </li>
          <?php } ?>
        </ul>
      <?php }?>
    </div>
  <?php } ?>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:45
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-add-to-cart.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a97df28464_06155214')) {function content_5c31a97df28464_06155214($_smarty_tpl) {?>


<div class="product-add-to-cart  mb-3">
  <?php if (!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>

    
        <?php if ($_smarty_tpl->tpl_vars['product']->value['show_availability']&&$_smarty_tpl->tpl_vars['product']->value['availability_message']) {?>
        <div id="product-availability" class="<?php if ($_smarty_tpl->tpl_vars['product']->value['availability']=='available') {?> product-available <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['availability']=='last_remaining_items') {?> product-last-items <?php } else { ?> product-unavailable <?php }?> mar_b6 fs_md">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['availability_message'], ENT_QUOTES, 'UTF-8');?>

            
              <?php if ($_smarty_tpl->tpl_vars['product']->value['show_quantities']) {?>
                  <span class="product-quantities" data-stock="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
" data-allow-oosp="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['allow_oosp'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity_label'], ENT_QUOTES, 'UTF-8');?>
</span>
              <?php }?>
            
        </div>
        <?php }?>
    

    
        <?php if ($_smarty_tpl->tpl_vars['product']->value['minimal_quantity']>1) {?>
      <div class="product-minimal-quantity mar_b6">
          <?php echo smartyTranslate(array('s'=>'The minimum purchase order quantity for the product is %quantity%.','d'=>'Shop.Theme.Checkout','sprintf'=>array('%quantity%'=>$_smarty_tpl->tpl_vars['product']->value['minimal_quantity'])),$_smarty_tpl);?>

      </div>
        <?php }?>
    
    
    
      <?php if ($_smarty_tpl->tpl_vars['product']->value['availability_date']) {?>
        <div class="product-availability-date mar_b6">
          <span><?php echo smartyTranslate(array('s'=>'Availability date:','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
 </span> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['availability_date'], ENT_QUOTES, 'UTF-8');?>

        </div>
      <?php }?>
    

    <div class="pro_cart_block flex_container flex_column_sm">
    
      <div class="product-quantity flex_child">
        <div class="qty qty_wrap qty_wrap_big mar_b6 <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_buy_button']) {?> qty_full_width <?php }?>">
          <input
            type="text"
            name="qty"
            id="quantity_wanted"
            value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity_wanted'], ENT_QUOTES, 'UTF-8');?>
"
            class="input-group"
            min="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['minimal_quantity'], ENT_QUOTES, 'UTF-8');?>
"
            aria-label="<?php echo smartyTranslate(array('s'=>'Quantity','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"
          >
        </div>
        <div class="add mar_b6 <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['product_buy_button']) {?> add_full_width <?php }?>">
          <button class="btn btn-default btn-large add-to-cart btn-full-width btn-spin" data-button-action="add-to-cart" type="submit" <?php if (!$_smarty_tpl->tpl_vars['product']->value['add_to_cart_url']) {?> disabled <?php }?>>
            <i class="fto-glyph icon_btn"></i><span><?php echo smartyTranslate(array('s'=>'Add to cart','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span>
          </button>
        </div>
      </div>
    

      <div class="pro_cart_right">
        <div class="flex_box">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductCartRight'),$_smarty_tpl);?>

        <?php  $_smarty_tpl->tpl_vars['extra'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['extra']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['extraContent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['extra']->key => $_smarty_tpl->tpl_vars['extra']->value) {
$_smarty_tpl->tpl_vars['extra']->_loop = true;
?>
          <?php if ($_smarty_tpl->tpl_vars['extra']->value['moduleName']=='stvideo') {?>
              <?php /*  Call merged included template "module:stvideo/views/templates/hook/stvideo_link.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("module:stvideo/views/templates/hook/stvideo_link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stvideos'=>$_smarty_tpl->tpl_vars['extra']->value['content'],'video_position'=>array(12)), 0, '209773315c31a97d0ccb27-57933411');
content_5c31a97e0fa021_37913237($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:stvideo/views/templates/hook/stvideo_link.tpl" */?>
          <?php }?>
        <?php } ?>
        </div>
      </div>
    </div>
  <?php }?>
</div>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:46
         compiled from "module:stvideo/views/templates/hook/stvideo_link.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a97e0fa021_37913237')) {function content_5c31a97e0fa021_37913237($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['stvideos']->value['size_charts']) {?>
    <?php  $_smarty_tpl->tpl_vars['size_chart'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['size_chart']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stvideos']->value['size_charts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['size_chart']->key => $_smarty_tpl->tpl_vars['size_chart']->value) {
$_smarty_tpl->tpl_vars['size_chart']->_loop = true;
?>
    <?php if (in_array($_smarty_tpl->tpl_vars['size_chart']->value['video_position'],$_smarty_tpl->tpl_vars['video_position']->value)&&$_smarty_tpl->tpl_vars['size_chart']->value['title']&&$_smarty_tpl->tpl_vars['size_chart']->value['content']) {?>
    <div class="inline_popup_wrap pro_right_item">
    <a class="inline_popup_tri <?php if ($_smarty_tpl->tpl_vars['size_chart']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['size_chart']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?>" href="#inline_popup_content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['size_chart']->value['id_st_video'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['size_chart']->value['title'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['size_chart']->value['title'], ENT_QUOTES, 'UTF-8');?>
</a>
    <div id="inline_popup_content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['size_chart']->value['id_st_video'], ENT_QUOTES, 'UTF-8');?>
" class="inline_popup_content mfp-hide mfp-with-anim"><?php echo $_smarty_tpl->tpl_vars['size_chart']->value['content'];?>
</div>
    </div>
    <?php }?>
    <?php } ?>
<?php } elseif ($_smarty_tpl->tpl_vars['stvideos']->value['videos']) {?>
    <?php  $_smarty_tpl->tpl_vars['video'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['video']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stvideos']->value['videos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['video']->key => $_smarty_tpl->tpl_vars['video']->value) {
$_smarty_tpl->tpl_vars['video']->_loop = true;
?>
    <?php if (in_array($_smarty_tpl->tpl_vars['video']->value['video_position'],$_smarty_tpl->tpl_vars['video_position']->value)&&$_smarty_tpl->tpl_vars['size_chart']->value['url']) {?>
        <a class="st_popup_video <?php if ($_smarty_tpl->tpl_vars['video']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['video']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?> <?php if (count(array_intersect(array(13,14,15),$_smarty_tpl->tpl_vars['video_position']->value))) {?> mar_b6 <?php } else { ?> pro_right_item <?php }?>" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'View video','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'View video','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a>
        <a class="st_popup_video <?php if ($_smarty_tpl->tpl_vars['video']->value['hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['video']->value['hide_on_mobile']==2) {?> hidden-lg-up <?php }?> pro_right_item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['video']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'View video','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'View video','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a>
    <?php }?>
    <?php } ?>
<?php }?><?php }} ?>
