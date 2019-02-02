<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:06:29
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-prices.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2761329225c31a8f504ed32-57388298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27655825243e826f8dc8414cb4f2c87e282de418' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-prices.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2761329225c31a8f504ed32-57388298',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'countdown_active' => 0,
    'sttheme' => 0,
    'countdown_title_aw_display' => 0,
    'currency' => 0,
    'displayUnitPrice' => 0,
    'priceDisplay' => 0,
    'displayPackPrice' => 0,
    'noPackPrice' => 0,
    'configuration' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a8f5199b89_26322325',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a8f5199b89_26322325')) {function content_5c31a8f5199b89_26322325($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.date_format.php';
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
