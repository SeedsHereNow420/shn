<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 20:08:15
         compiled from "module:stshoppingcart/views/templates/hook/stshoppingcart-product-line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5771888455c317f2f8f6a27-40459194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f7dcea9f4d40597f4750872ede978d328725705' => 
    array (
      0 => 'module:stshoppingcart/views/templates/hook/stshoppingcart-product-line.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '5771888455c317f2f8f6a27-40459194',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'pro_quantity_input' => 0,
    'property' => 0,
    'property_value' => 0,
    'customization' => 0,
    'field' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c317f2f9119d6_67572255',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c317f2f9119d6_67572255')) {function content_5c317f2f9119d6_67572255($_smarty_tpl) {?><div class="flex_container flex_start">
    <img class="small_cart_product_image" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['cart_default']['url'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['cart_default']['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['cart_default']['height'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['legend'], ENT_QUOTES, 'UTF-8');?>
" itemprop="image">
    <div class="small_cart_info flex_child">
        <div class="flex_container flex_start mar_b4">
            <span class="product-quantity mar_r4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
x</span>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" class="product-name mar_r4 flex_child"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],30,'...'), ENT_QUOTES, 'UTF-8');?>
</a>
            <div class="price mar_r4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</div>
            <a  class="ajax_remove_button"
                rel="nofollow"
                href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['remove_from_cart_url'], ENT_QUOTES, 'UTF-8');?>
"
                data-link-action="remove-from-cart"
                title="<?php echo smartyTranslate(array('s'=>"Remove",'d'=>"Shop.Theme.Actions"),$_smarty_tpl);?>
"
            >
                <i class="fto-cancel"></i>
            </a>
        </div>
        <div class="flex_container flex_start">
        <?php $_smarty_tpl->tpl_vars['pro_quantity_input'] = new Smarty_variable(Configuration::get('STSN_PRO_QUANTITY_INPUT'), null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['pro_quantity_input']->value==2||$_smarty_tpl->tpl_vars['pro_quantity_input']->value==3) {?>
        <div class="qty_wrap mar_t4">
            <input
                class="cart_quantity cart_quantity_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
"
                type="text"
                value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
"
                name="cart_quantity"
              data-down-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['down_quantity_url'], ENT_QUOTES, 'UTF-8');?>
"
              data-up-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['up_quantity_url'], ENT_QUOTES, 'UTF-8');?>
"
              data-update-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['update_quantity_url'], ENT_QUOTES, 'UTF-8');?>
"
              data-product-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
"
                data-minimal-quantity="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['minimal_quantity'], ENT_QUOTES, 'UTF-8');?>
"
              />
        </div>
        <?php }?>
        <?php if (count($_smarty_tpl->tpl_vars['product']->value['attributes'])) {?>
        <div class="flex_child">
        <?php  $_smarty_tpl->tpl_vars["property_value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["property_value"]->_loop = false;
 $_smarty_tpl->tpl_vars["property"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["property_value"]->key => $_smarty_tpl->tpl_vars["property_value"]->value) {
$_smarty_tpl->tpl_vars["property_value"]->_loop = true;
 $_smarty_tpl->tpl_vars["property"]->value = $_smarty_tpl->tpl_vars["property_value"]->key;
?>
          <div class="small_cart_attr_attr">
              <span class="small_cart_attr_k"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['property']->value, ENT_QUOTES, 'UTF-8');?>
:</span><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['property_value']->value, ENT_QUOTES, 'UTF-8');?>
</span>
          </div>
        <?php } ?>
        </div>
        <?php }?>
        </div>
    </div>
</div>
<?php if (count($_smarty_tpl->tpl_vars['product']->value['customizations'])) {?>
    <div class="customizations">
        <ul class="base_list_line">
            <?php  $_smarty_tpl->tpl_vars["customization"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["customization"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["customization"]->key => $_smarty_tpl->tpl_vars["customization"]->value) {
$_smarty_tpl->tpl_vars["customization"]->_loop = true;
?>
                <li class="line_item">
                    <span class="product-quantity"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
</span>
                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['remove_from_cart_url'], ENT_QUOTES, 'UTF-8');?>
" class="remove-from-cart" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Remove','d'=>"Shop.Theme.Actions"),$_smarty_tpl);?>
</a>
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?>
                            <li>
                                <span class="mar_r6 font-weight-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span>
                                <?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='text') {?>
                                    <span><?php echo $_smarty_tpl->tpl_vars['field']->value['text'];?>
</span>
                                <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='image') {?>
                                    <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['image']['small']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');?>
" />
                                <?php }?>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php }?>
<?php }} ?>
