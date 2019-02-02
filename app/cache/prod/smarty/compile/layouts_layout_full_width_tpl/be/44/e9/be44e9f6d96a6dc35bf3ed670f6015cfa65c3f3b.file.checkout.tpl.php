<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:19
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15228169115c32fdb3dd0708-79563611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be44e9f6d96a6dc35bf3ed670f6015cfa65c3f3b' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/checkout.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '8628bd58ce386ab27929d50c078c24862c7ee063' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/stylesheets.tpl',
      1 => 1513414681,
      2 => 'file',
    ),
    'd290d64558727c36ad4adcffed72251b248c9fbd' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/javascript.tpl',
      1 => 1513414062,
      2 => 'file',
    ),
    '2456b184eb9923a880afb3ace42a066cdad257ab' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/head.tpl',
      1 => 1512845888,
      2 => 'file',
    ),
    'a2bbd4e8ef3c63f0ec1cee08659bb87bfd950a32' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/header.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'b06563dc6a847a518764a4220d3d535dfce4603f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/notifications.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'b7ee33a9bbe3dd0bb03f60617e5ecd2861a578e7' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-product-line.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '7854cfa85eaad2cbe759861e7d8fa11f4916203f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-voucher.tpl',
      1 => 1513579246,
      2 => 'file',
    ),
    'dae223970456124496c0c0472e1056f6a2feeef9' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-totals.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '03462fb1056a845cca5ce0a1914c81077c0510ed' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '12aaaedabeaa89f8bbc1ead37e032b12972b9c59' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/footer-bottom.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15228169115c32fdb3dd0708-79563611',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language' => 0,
    'page' => 0,
    'sttheme' => 0,
    'cart' => 0,
    'checkout_process' => 0,
    'javascript' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c32fdb40bce76_49273348',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c32fdb40bce76_49273348')) {function content_5c32fdb40bce76_49273348($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
    
      <?php /*  Call merged included template "_partials/head.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb3dd2740_01454827($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/head.tpl" */?>
    
  </head>

  <body id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
" class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames($_smarty_tpl->tpl_vars['page']->value['body_classes']), ENT_QUOTES, 'UTF-8');?>
 lang_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['language']->value['is_rtl']) {?> is_rtl <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['is_mobile_device']) {?> mobile_device <?php } else { ?> desktop_device <?php }?>
   hide-left-column hide-right-column ">

    
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAfterBodyOpeningTag'),$_smarty_tpl);?>

    

  <div id="st-container" class="st-container st-effect-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['sidebar_transition'], ENT_QUOTES, 'UTF-8');?>
">
    <div class="st-pusher">
    <div class="st-content"><!-- this is the wrapper for the content -->
      <div class="st-content-inner">
  <!-- off-canvas-end -->
  <main id="body_wrapper">
    <div class="header-container">
      <header id="st_header" class="animated fast">
      
        <?php /*  Call merged included template "checkout/_partials/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb3e6fe37_68613619($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/header.tpl" */?>
      
      </header>
    </div>

    
      <?php /*  Call merged included template "_partials/notifications.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb3eb0b95_72017361($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/notifications.tpl" */?>
    

    <section id="wrapper" class="checkout_wrapper">
      <div class="container">

      
        <section id="content">
          <div class="row">
            <div class="col-lg-4 checkout_right_wrapper flex-last">
              <div class="checkout_right_column mb-3">

              
                <?php /*  Call merged included template "checkout/_partials/cart-summary.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-summary.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('cart'=>$_smarty_tpl->tpl_vars['cart']->value), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb3eec976_31633726($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-summary.tpl" */?>
              

              <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayReassurance'),$_smarty_tpl);?>

              </div>
            </div>
            <div class="col-lg-8 checkout_left_wrapper">
              <div class="checkout_left_column mb-3">
              
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0][0]->smartyRender(array('file'=>'checkout/checkout-process.tpl','ui'=>$_smarty_tpl->tpl_vars['checkout_process']->value),$_smarty_tpl);?>

              
              </div>
            </div>
          </div>
        </section>
      
      </div>
    </section>

    
      <footer id="footer" class="footer-container">
      <?php /*  Call merged included template "_partials/footer-bottom.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/footer-bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb4038518_99456599($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/footer-bottom.tpl" */?>
      </footer>
    

  </main>
  <!-- off-canvas-begin -->
      <div id="st-content-inner-after" data-version="<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['ps_version'])) {?><?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['ps_version'],'.','-'), ENT_QUOTES, 'UTF-8');?>
<?php }?>-<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['theme_version'])) {?><?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['theme_version'],'.','-'), ENT_QUOTES, 'UTF-8');?>
<?php }?>"></div>
      </div><!-- /st-content-inner -->
    </div><!-- /st-content -->
    <div id="st-pusher-after"></div>
    </div><!-- /st-pusher -->

       
    <div class="st-menu" id="checkout_mobile_nav">
      <div class="mobile_nav_box">
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayCheckoutMobileNav"),$_smarty_tpl);?>

      </div>
    </div>
    

  </div><!-- /st-container -->
  <!-- off-canvas-end -->

    
      <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['bottom']), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb3e3e108_45632133($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>
    

    
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBeforeBodyClosingTag'),$_smarty_tpl);?>

    

  </body>

</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:19
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/head.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdb3dd2740_01454827')) {function content_5c32fdb3dd2740_01454827($_smarty_tpl) {?>

  <meta charset="utf-8">


  <meta http-equiv="x-ua-compatible" content="ie=edge">



  <title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['title'], ENT_QUOTES, 'UTF-8');?>
</title>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayAfterTitle"),$_smarty_tpl);?>

  <meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['description'], ENT_QUOTES, 'UTF-8');?>
">
  <meta name="keywords" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['keywords'], ENT_QUOTES, 'UTF-8');?>
">
  <?php if ($_smarty_tpl->tpl_vars['page']->value['meta']['robots']!=='index') {?>
    <meta name="robots" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['meta']['robots'], ENT_QUOTES, 'UTF-8');?>
">
  <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['page']->value['canonical']) {?>
    <link rel="canonical" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['canonical'], ENT_QUOTES, 'UTF-8');?>
">
  <?php }?>


<!--st begin -->

<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['responsive'])&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&(!$_smarty_tpl->tpl_vars['sttheme']->value['enabled_version_swithing']||$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']==0)) {?>
    <meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
<?php }?>

<!--st end -->

  <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon'], ENT_QUOTES, 'UTF-8');?>
?<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon_update_time'], ENT_QUOTES, 'UTF-8');?>
">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon'], ENT_QUOTES, 'UTF-8');?>
?<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['favicon_update_time'], ENT_QUOTES, 'UTF-8');?>
">
  <!--st begin -->
  <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_57'])&&$_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_57']) {?>
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_57'], ENT_QUOTES, 'UTF-8');?>
" />
  <?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_72'])&&$_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_72']) {?>
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_72'], ENT_QUOTES, 'UTF-8');?>
" />
  <?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_114'])&&$_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_114']) {?>
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_114'], ENT_QUOTES, 'UTF-8');?>
" />
  <?php }?>
  <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_144'])&&$_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_144']) {?>
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_144'], ENT_QUOTES, 'UTF-8');?>
" />
  <?php }?>

<!--st end -->

  <?php /*  Call merged included template "_partials/stylesheets.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/stylesheets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stylesheets'=>$_smarty_tpl->tpl_vars['stylesheets']->value), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb3e15eb6_66416658($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/stylesheets.tpl" */?>



  <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['head'],'vars'=>$_smarty_tpl->tpl_vars['js_custom_vars']->value), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb3e3e108_45632133($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>

<!--st end -->

  <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>


<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['head_code'])&&$_smarty_tpl->tpl_vars['sttheme']->value['head_code']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['head_code'];?>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:19
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/stylesheets.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdb3e15eb6_66416658')) {function content_5c32fdb3e15eb6_66416658($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['stylesheet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylesheet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stylesheets']->value['external']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->key => $_smarty_tpl->tpl_vars['stylesheet']->value) {
$_smarty_tpl->tpl_vars['stylesheet']->_loop = true;
?>
  <link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['uri'], ENT_QUOTES, 'UTF-8');?>
" media="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['media'], ENT_QUOTES, 'UTF-8');?>
">
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['stylesheet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['stylesheet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stylesheets']->value['inline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['stylesheet']->key => $_smarty_tpl->tpl_vars['stylesheet']->value) {
$_smarty_tpl->tpl_vars['stylesheet']->_loop = true;
?>
  <style>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stylesheet']->value['content'], ENT_QUOTES, 'UTF-8');?>

  </style>
<?php } ?>


<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['custom_css'])&&count($_smarty_tpl->tpl_vars['sttheme']->value['custom_css'])) {?>
  <?php  $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sttheme']->value['custom_css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css_uri']->key => $_smarty_tpl->tpl_vars['css_uri']->value) {
$_smarty_tpl->tpl_vars['css_uri']->_loop = true;
?>
  <link href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['css_uri']->value, ENT_QUOTES, 'UTF-8');?>
" rel="stylesheet" media="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['custom_css_media'], ENT_QUOTES, 'UTF-8');?>
" />
  <?php } ?>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:19
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/javascript.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdb3e3e108_45632133')) {function content_5c32fdb3e3e108_45632133($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['javascript']->value['external']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
  <script src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js']->value['uri'], ENT_QUOTES, 'UTF-8');?>
" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js']->value['attribute'], ENT_QUOTES, 'UTF-8');?>
></script>
<?php } ?>

<?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['javascript']->value['inline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
  <script>
    <?php echo $_smarty_tpl->tpl_vars['js']->value['content'];?>

  </script>
<?php } ?>

<?php if (isset($_smarty_tpl->tpl_vars['vars']->value)&&count($_smarty_tpl->tpl_vars['vars']->value)) {?>
  <script>
    <?php  $_smarty_tpl->tpl_vars['var_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var_value']->_loop = false;
 $_smarty_tpl->tpl_vars['var_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var_value']->key => $_smarty_tpl->tpl_vars['var_value']->value) {
$_smarty_tpl->tpl_vars['var_value']->_loop = true;
 $_smarty_tpl->tpl_vars['var_name']->value = $_smarty_tpl->tpl_vars['var_value']->key;
?>
    var <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
 = <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['var_value']->value);?>
;
    <?php } ?>
  </script>
<?php }?>


<!--st begin -->
<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['custom_js'])&&$_smarty_tpl->tpl_vars['sttheme']->value['custom_js']) {?>
  <script src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['custom_js'], ENT_QUOTES, 'UTF-8');?>
"></script>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:19
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdb3e6fe37_68613619')) {function content_5c32fdb3e6fe37_68613619($_smarty_tpl) {?>

  <section id="mobile_bar" class="animated fast">
    <div class="container">
      <div id="mobile_bar_top" class="flex_container">
          <div id="mobile_bar_left" class="flex_child">
            <a class="mobile_logo" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
              <img class="logo" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['retina']&&$_smarty_tpl->tpl_vars['sttheme']->value['retina_logo_src']) {?> srcset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['retina_logo_src'], ENT_QUOTES, 'UTF-8');?>
 2x" <?php }?> alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width']) {?> width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height']) {?> height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>/>
            </a>
          </div>
          <div id="mobile_bar_right">
            <div class="flex_container">
              <a class="checkout_mobile_bar_tri mobile_bar_item mobile_bar_tri" data-name="checkout_mobile_nav" data-direction="open_bar_right" href="javascript:;" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Menu','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
                  <i class="fto-menu fs_xl"></i>
                  <span class="mobile_bar_tri_text"><?php echo smartyTranslate(array('s'=>'Menu','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span>
              </a>
            </div>
          </div>
      </div>
    </div>
  </section>


<header id="header_primary" class="checkout_header">
  <div class="wide_container">
      <div class="container">
        <div id="checkout_header_wrap" class="flex_container">
          <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])&&$_smarty_tpl->tpl_vars['sttheme']->value['logo_position']==1) {?><div class="flex_child"></div><?php }?>
          <a class="shop_logo" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
            <img class="logo" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['retina']&&$_smarty_tpl->tpl_vars['sttheme']->value['retina_logo_src']) {?> srcset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['retina_logo_src'], ENT_QUOTES, 'UTF-8');?>
 2x" <?php }?> alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width']) {?> width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height']) {?> height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>/>
          </a>
          <div class="flex_child">
              <div class="checkout_header_right flex_container flex_right ">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayCheckoutHeader'),$_smarty_tpl);?>

              </div>
          </div>
        </div>
    </div>
  </div>
</header>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:19
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/notifications.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdb3eb0b95_72017361')) {function content_5c32fdb3eb0b95_72017361($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['notifications']->value)) {?>
<aside id="notifications">
  <div class="container">
    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['error']) {?>
      
      <div class="row">
        <article class="alert alert-danger" role="alert" data-alert="danger">
          <ul class="m-b-0">
            <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
              <li><?php echo $_smarty_tpl->tpl_vars['notif']->value;?>
</li>
            <?php } ?>
          </ul>
        </article>
      </div>
      
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['warning']) {?>
      
      <div class="row">
        <article class="alert alert-warning" role="alert" data-alert="warning">
          <ul class="m-b-0">
            <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['warning']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
              <li><?php echo $_smarty_tpl->tpl_vars['notif']->value;?>
</li>
            <?php } ?>
          </ul>
        </article>
      </div>
      
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['success']) {?>
      
      <div class="row">
        <article class="alert alert-success" role="alert" data-alert="success">
          <ul class="m-b-0">
            <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['success']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
              <li><?php echo $_smarty_tpl->tpl_vars['notif']->value;?>
</li>
            <?php } ?>
          </ul>
        </article>
      </div>
      
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['notifications']->value['info']) {?>
      
      <div class="row">
        <article class="alert alert-info" role="alert" data-alert="info">
          <ul class="m-b-0">
            <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
              <li><?php echo $_smarty_tpl->tpl_vars['notif']->value;?>
</li>
            <?php } ?>
          </ul>
        </article>
      </div>
      
    <?php }?>
  </div>
</aside>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:19
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdb3eec976_31633726')) {function content_5c32fdb3eec976_31633726($_smarty_tpl) {?>
<section id="js-checkout-summary" class="js-cart" data-refresh-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
?ajax=1&action=refresh">
  <div class="card-block checkout-summary-block">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayCheckoutSummaryTop'),$_smarty_tpl);?>

    
      <div class="cart-summary-products">

        <div class="mar_b6">
        <a href="#" class="font-weight-bold" data-toggle="collapse" data-target="#cart-summary-product-list">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['summary_string'], ENT_QUOTES, 'UTF-8');?>

            <i class="fto-down-open mar_l4"></i>
        </a>
        </div>

        
          <div class="collapse" id="cart-summary-product-list">
            <ul class="summary-product-list base_list_line dotted_line">
              <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                <li class="summary-product-item flex_container line_item"><?php /*  Call merged included template "checkout/_partials/cart-summary-product-line.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-summary-product-line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb3ef7fa1_25508877($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-summary-product-line.tpl" */?></li>
              <?php } ?>
            </ul>
          </div>
        
      </div>
    

    
      <?php  $_smarty_tpl->tpl_vars["subtotal"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subtotal"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['subtotals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subtotal"]->key => $_smarty_tpl->tpl_vars["subtotal"]->value) {
$_smarty_tpl->tpl_vars["subtotal"]->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['subtotal']->value&&$_smarty_tpl->tpl_vars['subtotal']->value['type']!=='tax') {?>
          <div class="cart-summary-line clearfix cart-summary-subtotals" id="cart-subtotal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['type'], ENT_QUOTES, 'UTF-8');?>
">
            <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['label'], ENT_QUOTES, 'UTF-8');?>
</span>
            <span class="value price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['value'], ENT_QUOTES, 'UTF-8');?>
</span>
          </div>
        <?php }?>
      <?php } ?>
    

  </div>

  
    <?php /*  Call merged included template "checkout/_partials/cart-voucher.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-voucher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb3f25198_85033411($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-voucher.tpl" */?>
  

  <hr>

  
    <?php /*  Call merged included template "checkout/_partials/cart-summary-totals.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-summary-totals.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('cart'=>$_smarty_tpl->tpl_vars['cart']->value), 0, '15228169115c32fdb3dd0708-79563611');
content_5c32fdb3f33e83_09039912($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-summary-totals.tpl" */?>
  

</section>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:19
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-product-line.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdb3ef7fa1_25508877')) {function content_5c32fdb3ef7fa1_25508877($_smarty_tpl) {?>

  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" class="mar_r6">
    <img class="general_border" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['small']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
" />
  </a>
  <div class="product-quantity mar_r4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
x</div>
  <div class="product-name flex_child mar_r4"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</div>
  <div class="summary-product-price">
    <span class="product-price price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductPriceBlock','product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl);?>

  </div>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:19
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-voucher.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdb3f25198_85033411')) {function content_5c32fdb3f25198_85033411($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['cart']->value['vouchers']['allowed']) {?>
  
  <div class="cart-voucher">
  <hr>
    <div class="card-block">
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayCartRuleCartVoucher",'discounts'=>$_smarty_tpl->tpl_vars['cart']->value['vouchers']),$_smarty_tpl);?>

                                <?php if ($_smarty_tpl->tpl_vars['cart']->value['vouchers']['added']) {?>
        <ul class="promo-name mar_b10">
          <?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['voucher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['vouchers']['added']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value) {
$_smarty_tpl->tpl_vars['voucher']->_loop = true;
?>
            
            <li class="cart-summary-line">
              <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
              <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['delete_url'], ENT_QUOTES, 'UTF-8');?>
" data-link-action="remove-voucher" title="<?php echo smartyTranslate(array('s'=>'Remove','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-cancel mar_l4"></i></a>
              <div class="value">
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['reduction_formatted'], ENT_QUOTES, 'UTF-8');?>

              </div>
            </li>
            
          <?php } ?>
        </ul>
      <?php }?>
      <div class="mar_b10">
        <a class="collapse-button promo-code-button go" data-toggle="collapse" href="#promo-code" aria-expanded="false" aria-controls="promo-code">
          <?php echo smartyTranslate(array('s'=>'Have a promo code?','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

        </a>
      </div>
      <div class="promo-code collapse<?php if (count($_smarty_tpl->tpl_vars['cart']->value['discounts'])>0) {?> in<?php }?>" id="promo-code">
        
        <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['cart'], ENT_QUOTES, 'UTF-8');?>
" data-link-action="add-voucher" method="post">
          <input type="hidden" name="token" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_token']->value, ENT_QUOTES, 'UTF-8');?>
">
          <input type="hidden" name="addDiscount" value="1">
          <div class="input-group mar_b10">
            <input class="promo-input form-control" type="text" name="discount_name" placeholder="<?php echo smartyTranslate(array('s'=>'Promo code','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-default"><span><?php echo smartyTranslate(array('s'=>'Add','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</span></button>
            </span>
          </div>
        </form>
        
        
        <div class="alert alert-danger js-error" role="alert">
          <span class="js-error-text"></span>
        </div>
        
      </div>
      <?php if (count($_smarty_tpl->tpl_vars['cart']->value['discounts'])>0) {?>
        <p class="block-promo promo-highlighted mar_b10">
          <?php echo smartyTranslate(array('s'=>'Take advantage of our exclusive offers:','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

        </p>
        <ul class="js-discount promo-discounts m-b-0">
        <?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['discounts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
          <li class="cart-summary-line clearfix">
            <span class="label"><span class="code"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['discount']->value['code'], ENT_QUOTES, 'UTF-8');?>
</span> - <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['discount']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
          </li>
        <?php } ?>
        </ul>
      <?php }?>
    </div>
  </div>
  
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:19
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-summary-totals.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdb3f33e83_09039912')) {function content_5c32fdb3f33e83_09039912($_smarty_tpl) {?>
<div class="cart-summary-totals card-block">

  
    <div class="cart-summary-line clearfix cart-total">
      <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['labels']['tax_short'], ENT_QUOTES, 'UTF-8');?>
</span>
      <span class="value price fs_lg font-weight-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
  

  
    <div class="cart-summary-line clearfix">
      <span class="label sub"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['label'], ENT_QUOTES, 'UTF-8');?>
</span>
      <span class="value sub price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
  

</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 23:20:20
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer-bottom.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c32fdb4038518_99456599')) {function content_5c32fdb4038518_99456599($_smarty_tpl) {?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("displayFooterBottomLeft", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterBottomLeft"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("displayFooterBottomRight", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterBottomRight"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php if ((isset($_smarty_tpl->tpl_vars['sttheme']->value['copyright_text'])&&$_smarty_tpl->tpl_vars['sttheme']->value['copyright_text'])||trim(Smarty::$_smarty_vars['capture']['displayFooterBottomLeft'])||trim(Smarty::$_smarty_vars['capture']['displayFooterBottomRight'])||(isset($_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src'])&&$_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src'])||(isset($_smarty_tpl->tpl_vars['sttheme']->value['responsive'])&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&isset($_smarty_tpl->tpl_vars['sttheme']->value['enabled_version_swithing'])&&$_smarty_tpl->tpl_vars['sttheme']->value['enabled_version_swithing'])) {?>
    <div id="footer-bottom" class="<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['f_info_center']) {?> footer_bottom_center <?php }?>">
        <div class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['f_info_fullwidth']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>wide_container<?php }?>">
            <div class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['f_info_fullwidth']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>container<?php } else { ?>container-fluid<?php }?>">
                <div class="row">
                    <div class="col-12 col-sm-12 clearfix">      
                    	<?php if ((isset($_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src'])&&$_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src'])||trim(Smarty::$_smarty_vars['capture']['displayFooterBottomRight'])) {?>
                        <aside id="footer_bottom_right">
                        	<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src'])&&$_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src']) {?>    
	                            <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo smartyTranslate(array('s'=>'Payment methods','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" />
	                        <?php }?>
                            <?php echo Smarty::$_smarty_vars['capture']['displayFooterBottomRight'];?>

                        </aside>
    					<?php }?>
                        <aside id="footer_bottom_left">
                        	<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['copyright_text'])) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['copyright_text'];?>
<?php }?>
	    					<?php echo Smarty::$_smarty_vars['capture']['displayFooterBottomLeft'];?>
 
    					</aside> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?><?php }} ?>
