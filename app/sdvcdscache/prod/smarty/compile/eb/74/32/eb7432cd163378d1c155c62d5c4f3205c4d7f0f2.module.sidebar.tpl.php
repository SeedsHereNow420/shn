<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:18:07
         compiled from "module:stwishlist/views/templates/hook/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17656938025c31abafd6fd60-45124253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb7432cd163378d1c155c62d5c4f3205c4d7f0f2' => 
    array (
      0 => 'module:stwishlist/views/templates/hook/sidebar.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '17656938025c31abafd6fd60-45124253',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wishlists' => 0,
    'wishlist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31abafd75ab8_94771008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31abafd75ab8_94771008')) {function content_5c31abafd75ab8_94771008($_smarty_tpl) {?>
<nav class="st-menu" id="side_wishlist">
    <div class="st-menu-header">
        <h3 class="st-menu-title"><?php echo smartyTranslate(array('s'=>'Wishlist','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</h3>
        <a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><i class="fto-angle-double-right side_close_right"></i><i class="fto-angle-double-left side_close_left"></i></a>
    </div>
    <div id="side_wishlist_block" class="pad_10">
        <h3 class="page_heading"><?php echo smartyTranslate(array('s'=>'Save to wishlist','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</h3>
        <ul id="select_wishlist" class="base_list_line">
        <?php if (isset($_smarty_tpl->tpl_vars['wishlists']->value)&&count($_smarty_tpl->tpl_vars['wishlists']->value)) {?>
        <?php  $_smarty_tpl->tpl_vars['wishlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['wishlist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wishlists']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['wishlist']->key => $_smarty_tpl->tpl_vars['wishlist']->value) {
$_smarty_tpl->tpl_vars['wishlist']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ('module:stwishlist/views/templates/hook/item.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id_st_wishlist'=>$_smarty_tpl->tpl_vars['wishlist']->value['id_st_wishlist'],'wishlist_name'=>$_smarty_tpl->tpl_vars['wishlist']->value['name'],'wishlist_total'=>$_smarty_tpl->tpl_vars['wishlist']->value['total']), 0);?>

        <?php } ?>
        <?php }?>
        </ul>
        <div class="form-group form-group-small m-t-1">
            <div class="input-group">
              <input
                      class="form-control"
                      name="name"
                      type="text"
                      placeholder="<?php echo smartyTranslate(array('s'=>'Create a wishlist','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"
                      value="" />
              <span class="input-group-btn">
                <button
                  class="btn_send btn btn-default btn-spin"
                  type="submit"
                  id="side_wishlist_submit"
                >
                   <i class="fto-plus-2"></i><?php echo smartyTranslate(array('s'=>'Create','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

                </button>
              </span>
            </div>
        </div>
    </div>
</nav><?php }} ?>
