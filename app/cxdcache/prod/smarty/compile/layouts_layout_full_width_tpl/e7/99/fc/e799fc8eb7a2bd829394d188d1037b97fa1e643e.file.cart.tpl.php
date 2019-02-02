<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11886706435c31a80c423b17-54098273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e799fc8eb7a2bd829394d188d1037b97fa1e643e' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/cart.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'da3e212e1762d949765347b9237324c879a4e828' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/layouts/layout-full-width.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'fe2bd8cf39cbcc2e42dd334dc771a578c69b3fac' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/layouts/layout-both-columns.tpl',
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
    '238af640b88e46ce1fac4baf44ba2168b43845d9' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-activation.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'f6402f4533254ec7c2171173d503b44ca443b4be' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/header.tpl',
      1 => 1512984236,
      2 => 'file',
    ),
    'b06563dc6a847a518764a4220d3d535dfce4603f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/notifications.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '85612e7eed850dc4be2fa306f0dda0d1da6cb749' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-detailed-product-line.tpl',
      1 => 1512729993,
      2 => 'file',
    ),
    'c2bfd67ce4dd75ab4b75b2a3bfacea49bab71820' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-detailed.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '7854cfa85eaad2cbe759861e7d8fa11f4916203f' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-voucher.tpl',
      1 => 1513579246,
      2 => 'file',
    ),
    'de962f94a7027ee19070c961e8de1163a1049e8d' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-detailed-totals.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '8eb94384198e23b9e704a9ebea7ddc7f700b5339' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-detailed-actions.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '12aaaedabeaa89f8bbc1ead37e032b12972b9c59' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/footer-bottom.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '438a696cdcd6329b2325355d7633f88cd7988755' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/footer.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11886706435c31a80c423b17-54098273',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout' => 0,
    'language' => 0,
    'page' => 0,
    'sttheme' => 0,
    'cols_md' => 0,
    'cols_lg' => 0,
    'urls' => 0,
    'javascript' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a80c69a813_60759489',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a80c69a813_60759489')) {function content_5c31a80c69a813_60759489($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?><!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
	
	  <?php /*  Call merged included template "_partials/head.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c42efe7_23714970($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/head.tpl" */?>
	
  </head>
  <body id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
" class="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['page_name'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames($_smarty_tpl->tpl_vars['page']->value['body_classes']), ENT_QUOTES, 'UTF-8');?>
 lang_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['language']->value['is_rtl']) {?> is_rtl <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['is_mobile_device']) {?> mobile_device <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['use_mobile_header']==1) {?> use_mobile_header <?php }?><?php } else { ?> desktop_device <?php }?><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['slide_lr_column']) {?> slide_lr_column <?php }?>
  <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['use_mobile_header']==2) {?> use_mobile_header <?php }?>
	 hide-left-column hide-right-column 
  ">
	
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAfterBodyOpeningTag'),$_smarty_tpl);?>

    
	<div id="st-container" class="st-container st-effect-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['sidebar_transition'], ENT_QUOTES, 'UTF-8');?>
">
	  <div class="st-pusher">
		<div class="st-content"><!-- this is the wrapper for the content -->
		  <div class="st-content-inner">
	<!-- off-canvas-end -->

	<main id="body_wrapper">
	  <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['boxstyle'])&&$_smarty_tpl->tpl_vars['sttheme']->value['boxstyle']==2) {?><div id="page_wrapper"><?php }?>
	  
		<?php /*  Call merged included template "catalog/_partials/product-activation.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-activation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c48e716_38172422($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-activation.tpl" */?>
	  
	  <div class="header-container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_header']) {?> transparent-header <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_mobile_header']) {?> transparent-mobile-header <?php }?>">
	  <header id="st_header" class="animated fast">
		
		  <?php /*  Call merged included template "_partials/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c4932d5_31158767($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/header.tpl" */?>
		
	  </header>
	  </div>
	  
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBreadcrumb','page_name'=>$_smarty_tpl->tpl_vars['page']->value['page_name']),$_smarty_tpl);?>

		<div class="breadcrumb_spacing"></div>
	  
	  
		<?php /*  Call merged included template "_partials/notifications.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c51ae10_87731003($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/notifications.tpl" */?>
	  

	  
		  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFullWidthTop'),$_smarty_tpl);?>

		  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayFullWidthTop2'),$_smarty_tpl);?>

		  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayWrapperTop"),$_smarty_tpl);?>

	  

	  <section id="wrapper" class="columns-container">
		<div id="columns" class="container">
		  <div class="row">

			<?php $_smarty_tpl->tpl_vars['cols_md'] = new Smarty_variable(12, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['cols_lg'] = new Smarty_variable(12, null, 0);?>

			

			

			
  <div id="center_column" class="single_column col-sm-12">
    

  <section id="main">
    <div class="row">

      <!-- Left Block: cart product informations & shpping -->
      <div class="cart-grid-body col-12 col-lg-8 mb-3">

        <!-- cart products detailed -->
        <div class="card card_trans mb-3">
          <div class="card-header">
            <?php echo smartyTranslate(array('s'=>'Shopping Cart','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

          </div>
          
            <?php /*  Call merged included template "checkout/_partials/cart-detailed.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-detailed.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('cart'=>$_smarty_tpl->tpl_vars['cart']->value), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c563e00_37955650($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-detailed.tpl" */?>
          
        </div>

        
          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
" class="btn btn-default" title="<?php echo smartyTranslate(array('s'=>'Continue shopping','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
">
            <i class="fto-left-open"></i><?php echo smartyTranslate(array('s'=>'Continue shopping','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

          </a>
        

        <!-- shipping informations -->
        
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayShoppingCartFooter'),$_smarty_tpl);?>

        
      </div>

      <!-- Right Block: cart subtotal & cart total -->
      <div class="cart-grid-right col-12 col-lg-4  mb-3">

        
          <div class="card card_trans cart-summary">

            
              <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayShoppingCart'),$_smarty_tpl);?>

            

            
              <?php /*  Call merged included template "checkout/_partials/cart-detailed-totals.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-detailed-totals.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('cart'=>$_smarty_tpl->tpl_vars['cart']->value), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c5e25e8_02823604($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-detailed-totals.tpl" */?>
            

            
              <?php /*  Call merged included template "checkout/_partials/cart-detailed-actions.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-detailed-actions.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('cart'=>$_smarty_tpl->tpl_vars['cart']->value), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c5fd308_89464824($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-detailed-actions.tpl" */?>
            

          </div>
        

        
          <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayReassurance'),$_smarty_tpl);?>

        

      </div>

    </div>
  </section>

  </div>

		  </div>
		</div>
	  </section>
	  	
		  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFullWidthBottom"),$_smarty_tpl);?>

		  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayWrapperBottom"),$_smarty_tpl);?>

		  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterBefore"),$_smarty_tpl);?>

		
		
		  <?php /*  Call merged included template "_partials/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c635478_96108803($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/footer.tpl" */?>
		
	  <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['boxstyle'])&&$_smarty_tpl->tpl_vars['sttheme']->value['boxstyle']==2) {?></div><?php }?><!-- #page_wrapper -->
	</main>
	<!-- off-canvas-begin -->
			<div id="st-content-inner-after" data-version="<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['ps_version'])) {?><?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['ps_version'],'.','-'), ENT_QUOTES, 'UTF-8');?>
<?php }?>-<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['theme_version'])) {?><?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['theme_version'],'.','-'), ENT_QUOTES, 'UTF-8');?>
<?php }?>"></div>
		  </div><!-- /st-content-inner -->
		</div><!-- /st-content -->
		<div id="st-pusher-after"></div>
	  </div><!-- /st-pusher -->
	  		
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displaySideBar"),$_smarty_tpl);?>

	  
		
	
		<div id="sidebar_box" class="flex_container">
		
			
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayRightBar"),$_smarty_tpl);?>

			
		
		</div>
		
	</div><!-- /st-container -->
	<!-- off-canvas-end -->
	<div id="popup_go_login" class="inline_popup_content small_popup mfp-with-anim mfp-hide text-center">
	  <p class="fs_md"><?php echo smartyTranslate(array('s'=>'Please sign in first.','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</p>
	  <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['authentication'], ENT_QUOTES, 'UTF-8');?>
" class="go" title="<?php echo smartyTranslate(array('s'=>'Sign in','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Sign in','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a> 
	</div>
	<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['tracking_code'])&&$_smarty_tpl->tpl_vars['sttheme']->value['tracking_code']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['tracking_code'];?>
<?php }?>
	
      <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['bottom']), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c459423_98537002($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>
    
	
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBeforeBodyClosingTag'),$_smarty_tpl);?>

    
  </body>

</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/head.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c42efe7_23714970')) {function content_5c31a80c42efe7_23714970($_smarty_tpl) {?>

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/stylesheets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stylesheets'=>$_smarty_tpl->tpl_vars['stylesheets']->value), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c450c86_74884972($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/stylesheets.tpl" */?>



  <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['head'],'vars'=>$_smarty_tpl->tpl_vars['js_custom_vars']->value), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c459423_98537002($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>

<!--st end -->

  <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>


<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['head_code'])&&$_smarty_tpl->tpl_vars['sttheme']->value['head_code']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['head_code'];?>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/stylesheets.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c450c86_74884972')) {function content_5c31a80c450c86_74884972($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/javascript.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c459423_98537002')) {function content_5c31a80c459423_98537002($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-activation.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c48e716_38172422')) {function content_5c31a80c48e716_38172422($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['page']->value['admin_notifications']) {?>
  <div class="alert alert-warning row" role="alert">
    <div class="container">
      <div class="row">
        <?php  $_smarty_tpl->tpl_vars['notif'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notif']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['page']->value['admin_notifications']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notif']->key => $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->_loop = true;
?>
          <div class="col-sm-12">
            <i class="fto-attention-alt fs_lg"></i>
            <p class="alert-text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['notif']->value['message'], ENT_QUOTES, 'UTF-8');?>
</p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c4932d5_31158767')) {function content_5c31a80c4932d5_31158767($_smarty_tpl) {?>

  <?php $_smarty_tpl->_capture_stack[0][] = array("displayBanner", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayBanner"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
  <?php if (Smarty::$_smarty_vars['capture']['displayBanner']) {?>
  <div id="displayBanner" class="header-banner">
    <?php echo Smarty::$_smarty_vars['capture']['displayBanner'];?>

  </div>
  <?php }?>



  <section id="mobile_bar" class="animated fast">
    <div class="container">
      <div id="mobile_bar_top" class="flex_container">
        <?php $_smarty_tpl->_capture_stack[0][] = array("mobile_shop_logo", null, null); ob_start(); ?>
          <a class="mobile_logo" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
              <img class="logo" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['retina']&&$_smarty_tpl->tpl_vars['sttheme']->value['retina_logo_src']) {?> srcset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['retina_logo_src'], ENT_QUOTES, 'UTF-8');?>
 2x"<?php }?> alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width']) {?> width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height']) {?> height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>/>
            </a>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
          <div id="mobile_bar_left">
            <div class="flex_container">
            	<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['sticky_mobile_header']%2!=0) {?>
                  <?php echo Smarty::$_smarty_vars['capture']['mobile_shop_logo'];?>

              	<?php }?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayMobileBarLeft"),$_smarty_tpl);?>

            </div>
          </div>
          <div id="mobile_bar_center" class="flex_child">
            <div class="flex_container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['sticky_mobile_header']%2==0) {?> flex_center <?php }?>">
            	<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['sticky_mobile_header']%2==0) {?>
                  <?php echo Smarty::$_smarty_vars['capture']['mobile_shop_logo'];?>

              	<?php }?>
              <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayMobileBarCenter"),$_smarty_tpl);?>

            </div>
          </div>
          <div id="mobile_bar_right">
            <div class="flex_container"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayMobileBar"),$_smarty_tpl);?>
</div>
          </div>
      </div>
      <div id="mobile_bar_bottom" class="flex_container">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayMobileBarBottom"),$_smarty_tpl);?>

      </div>
    </div>
  </section>

  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayNavFullWidth'),$_smarty_tpl);?>



  <?php $_smarty_tpl->_capture_stack[0][] = array("displayNav1", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayNav1"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
  <?php $_smarty_tpl->_capture_stack[0][] = array("displayNav2", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayNav2"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
  <?php $_smarty_tpl->_capture_stack[0][] = array("displayNav3", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayNav3"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
  <?php if (Smarty::$_smarty_vars['capture']['displayNav1']||Smarty::$_smarty_vars['capture']['displayNav2']||Smarty::$_smarty_vars['capture']['displayNav3']) {?>
    <div id="top_bar" class="nav_bar <?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['sttheme']->value['header_topbar_sep_type'])===null||$tmp==='' ? 'vertical-s' : $tmp), ENT_QUOTES, 'UTF-8');?>
 <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['sticky_topbar']) {?> hide_when_sticky <?php }?>" >
      <div class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['fullwidth_topbar']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>wide_container<?php }?>">
        <div id="top_bar_container" class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['fullwidth_topbar']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>container<?php } else { ?>container-fluid<?php }?>">
          <div id="top_bar_row" class="flex_container">
            <nav id="nav_left" class="flex_float_left"><div class="flex_box"><?php echo Smarty::$_smarty_vars['capture']['displayNav1'];?>
</div></nav>
            <nav id="nav_center" class="flex_float_center"><div class="flex_box"><?php echo Smarty::$_smarty_vars['capture']['displayNav3'];?>
</div></nav>
            <nav id="nav_right" class="flex_float_right"><div class="flex_box"><?php echo Smarty::$_smarty_vars['capture']['displayNav2'];?>
</div></nav>
          </div>
        </div>
      </div>
    </div>
  <?php }?>



  <div id="header_primary" class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['sticky_primary_header']) {?> hide_when_sticky <?php }?>">
    <div class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['fullwidth_header']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>wide_container<?php }?>">
      <div id="header_primary_container" class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['fullwidth_header']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>container<?php } else { ?>container-fluid<?php }?>">
        <div id="header_primary_row" class="flex_container <?php if (!isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])||!$_smarty_tpl->tpl_vars['sttheme']->value['logo_position']) {?> logo_left <?php } else { ?> logo_center <?php }?>">
        <?php $_smarty_tpl->_capture_stack[0][] = array("displaySlogan1", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displaySlogan1"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php $_smarty_tpl->_capture_stack[0][] = array("displaySlogan2", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displaySlogan2"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php $_smarty_tpl->_capture_stack[0][] = array("shop_logo", null, null); ob_start(); ?>
        <div class="logo_box">
          <div class="slogan_horizon">
            <a class="shop_logo" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['base_url'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
                <img class="logo" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['logo'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['retina']&&$_smarty_tpl->tpl_vars['sttheme']->value['retina_logo_src']) {?> srcset="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['retina_logo_src'], ENT_QUOTES, 'UTF-8');?>
 2x"<?php }?> alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop']->value['name'], ENT_QUOTES, 'UTF-8');?>
"<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width']) {?> width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'], ENT_QUOTES, 'UTF-8');?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height']) {?> height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>/>
            </a>
            <?php if (Smarty::$_smarty_vars['capture']['displaySlogan1']) {?><div class="slogan_box_beside"><?php echo Smarty::$_smarty_vars['capture']['displaySlogan1'];?>
</div><?php }?>
          </div>
          <?php if (Smarty::$_smarty_vars['capture']['displaySlogan2']) {?><div class="slogan_box_under"><?php echo Smarty::$_smarty_vars['capture']['displaySlogan2'];?>
</div><?php }?>
        </div>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
          <div id="header_left" class="">
            <div class="flex_container header_box <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['header_left_alignment']==1) {?> flex_center <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['header_left_alignment']==2) {?> flex_right <?php } else { ?> flex_left <?php }?>">
              <?php if (!isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])||!$_smarty_tpl->tpl_vars['sttheme']->value['logo_position']) {?>
                  <?php echo Smarty::$_smarty_vars['capture']['shop_logo'];?>

              <?php }?>
              <?php if (isset($_smarty_tpl->tpl_vars['HOOK_HEADER_LEFT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HEADER_LEFT']->value)) {?>
                <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER_LEFT']->value;?>

              <?php }?>
            </div>
          </div>
            <div id="header_center" class="">
              <div class="flex_container header_box <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['header_center_alignment']==1) {?> flex_center <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['header_center_alignment']==2) {?> flex_right <?php } else { ?> flex_left <?php }?>">
              <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])&&$_smarty_tpl->tpl_vars['sttheme']->value['logo_position']) {?>
                <?php echo Smarty::$_smarty_vars['capture']['shop_logo'];?>

              <?php }?>
              <?php if (isset($_smarty_tpl->tpl_vars['HOOK_HEADER_CENTER']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HEADER_CENTER']->value)) {?>
                  <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER_CENTER']->value;?>

                <?php }?>
              </div>
            </div>
          <div id="header_right" class="">
            <div id="header_right_top" class="flex_container header_box <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['header_right_alignment']==1) {?> flex_center <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['header_right_alignment']==2) {?> flex_right <?php } else { ?> flex_left <?php }?>">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayTop'),$_smarty_tpl);?>

            </div>
            <?php if (isset($_smarty_tpl->tpl_vars['HOOK_HEADER_BOTTOM']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HEADER_BOTTOM']->value)) {?>
                <div id="header_right_bottom" class="flex_container header_box <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['header_right_bottom_alignment']==1) {?> flex_center <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['header_right_bottom_alignment']==2) {?> flex_right <?php } else { ?> flex_left <?php }?>">
                    <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER_BOTTOM']->value;?>

                </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php $_smarty_tpl->_capture_stack[0][] = array("displayMainMenu", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayMainMenu"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
  <?php $_smarty_tpl->_capture_stack[0][] = array("displayMainMenuWidget", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayMainMenuWidget"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
  <?php $_smarty_tpl->tpl_vars['has_widgets'] = new Smarty_variable(0, null, 0);?>
  <?php if (isset(Smarty::$_smarty_vars['capture']['displayMainMenuWidget'])&&trim(Smarty::$_smarty_vars['capture']['displayMainMenuWidget'])) {?><?php $_smarty_tpl->tpl_vars['has_widgets'] = new Smarty_variable(1, null, 0);?><?php }?>
    <?php if ((isset(Smarty::$_smarty_vars['capture']['displayMainMenu'])&&trim(Smarty::$_smarty_vars['capture']['displayMainMenu']))||$_smarty_tpl->tpl_vars['has_widgets']->value) {?>
    <section id="top_extra" class="main_menu_has_widgets_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['has_widgets']->value, ENT_QUOTES, 'UTF-8');?>
">
      <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['megamenu_width']) {?><div class="wide_container boxed_megamenu"><?php }?>
      <div id="st_mega_menu_container" class="animated fast">
      <div class="container">
        <div id="top_extra_container" class="flex_container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['megamenu_position']==1) {?> flex_center <?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['megamenu_position']==2) {?> flex_right <?php }?>">
            <?php if (isset(Smarty::$_smarty_vars['capture']['displayMainMenu'])) {?><?php echo Smarty::$_smarty_vars['capture']['displayMainMenu'];?>
<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['has_widgets']->value) {?>
              <div id="main_menu_widgets">
                <div class="flex_box">
                  <?php if (isset(Smarty::$_smarty_vars['capture']['displayMainMenuWidget'])) {?><?php echo Smarty::$_smarty_vars['capture']['displayMainMenuWidget'];?>
<?php }?>
                </div>
              </div>
            <?php }?>
        </div>
      </div>
      </div>
      <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['megamenu_width']) {?></div><?php }?>
  </section>
  <?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/notifications.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c51ae10_87731003')) {function content_5c31a80c51ae10_87731003($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-detailed.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c563e00_37955650')) {function content_5c31a80c563e00_37955650($_smarty_tpl) {?>

<div class="cart-overview js-cart" data-refresh-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'cart','params'=>array('ajax'=>true,'action'=>'refresh')),$_smarty_tpl);?>
">
  <?php if ($_smarty_tpl->tpl_vars['cart']->value['products']) {?>
  <ul class="cart-items base_list_line mb-3 m-t-1">
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
      <li class="cart-item line_item">
        
          <?php /*  Call merged included template "checkout/_partials/cart-detailed-product-line.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-detailed-product-line.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c567895_78441642($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-detailed-product-line.tpl" */?>
        
      </li>
      <?php if (count($_smarty_tpl->tpl_vars['product']->value['customizations'])>1) {?><hr><?php }?>
    <?php } ?>
  </ul>
  <?php } else { ?>
    <div class="no-items pad_10"><?php echo smartyTranslate(array('s'=>'There are no more items in your cart','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</div>
  <?php }?>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-detailed-product-line.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c567895_78441642')) {function content_5c31a80c567895_78441642($_smarty_tpl) {?>
<div class="product-line-grid container-fluid">
  <div class="row">
  <!--  product left content: image-->
  <div class="product-line-grid-left col-md-2 col-3">
    <span class="product-image media-middle">
      <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['cart_default']['url'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['cart_default']['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['cover']['bySize']['cart_default']['height'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['name'],'quotes'), ENT_QUOTES, 'UTF-8');?>
" /></a>
    </span>
  </div>

  <!--  product left body: description -->
  <div class="product-line-grid-body col-md-5 col-7">
    <div class="product-line-info">
      <a class="label" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['url'], ENT_QUOTES, 'UTF-8');?>
" data-id_customization="<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['product']->value['id_customization']), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</a>
    </div>

    <div class="product-line-info product-price <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>has-discount<?php }?> mar_b6">
      <?php if ($_smarty_tpl->tpl_vars['product']->value['has_discount']) {?>
        <div class="product-discount">
          <span class="regular-price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['regular_price'], ENT_QUOTES, 'UTF-8');?>
</span>
          <?php if ($_smarty_tpl->tpl_vars['product']->value['discount_type']==='percentage') {?>
            <span class="discount discount-percentage">
                -<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_percentage_absolute'], ENT_QUOTES, 'UTF-8');?>

              </span>
          <?php } else { ?>
            <span class="discount discount-amount">
                -<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['discount_to_display'], ENT_QUOTES, 'UTF-8');?>

              </span>
          <?php }?>
        </div>
      <?php }?>
      <div class="current-price">
        <span class="price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</span>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['unit_price_full']) {?>
          <div class="unit-price-cart"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['unit_price_full'], ENT_QUOTES, 'UTF-8');?>
</div>
        <?php }?>
      </div>
    </div>


    <?php  $_smarty_tpl->tpl_vars["value"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["value"]->_loop = false;
 $_smarty_tpl->tpl_vars["attribute"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["value"]->key => $_smarty_tpl->tpl_vars["value"]->value) {
$_smarty_tpl->tpl_vars["value"]->_loop = true;
 $_smarty_tpl->tpl_vars["attribute"]->value = $_smarty_tpl->tpl_vars["value"]->key;
?>
      <div class="product-line-info">
        <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attribute']->value, ENT_QUOTES, 'UTF-8');?>
:</span>
        <span class="value"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8');?>
</span>
      </div>
    <?php } ?>

    <?php if (count($_smarty_tpl->tpl_vars['product']->value['customizations'])) {?>
      <br/>
      
      <?php  $_smarty_tpl->tpl_vars["customization"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["customization"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["customization"]->key => $_smarty_tpl->tpl_vars["customization"]->value) {
$_smarty_tpl->tpl_vars["customization"]->_loop = true;
?>
        <a href="#" data-toggle="modal" data-target="#product-customizations-modal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
" data-backdrop=false><?php echo smartyTranslate(array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</a>
        <div class="modal fade customization-modal" id="product-customizations-modal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <button type="button" class="st_modal_close" data-dismiss="modal" aria-label="<?php echo smartyTranslate(array('s'=>'Close','d'=>'Shop.Theme'),$_smarty_tpl);?>
">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="modal-body base_list_line general_border">
                <h6 class="fs_md mb-3"><?php echo smartyTranslate(array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</h6>
                <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?>
                  <div class="product-customization-line line_item row">
                    <div class="col-sm-3 col-4 label">
                      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');?>

                    </div>
                    <div class="col-sm-9 col-8 value">
                      <?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='text') {?>
                        <?php if ((int)$_smarty_tpl->tpl_vars['field']->value['id_module']) {?>
                          <?php echo $_smarty_tpl->tpl_vars['field']->value['text'];?>

                        <?php } else { ?>
                          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['text'], ENT_QUOTES, 'UTF-8');?>

                        <?php }?>
                      <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='image') {?>
                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['image']['small']['url'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['label'], ENT_QUOTES, 'UTF-8');?>
" />
                      <?php }?>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      
    <?php }?>
  </div>

  <!--  product left body: description -->
  <div class="product-line-grid-right product-line-actions col-md-5 col-12">
    <div class="row">
      <div class="col-3 hidden-md-up"></div>
      <div class="col-md-10 col-7">
        <div class="row">
          <div class="col-md-6 col-6 qty">
            <?php if (isset($_smarty_tpl->tpl_vars['product']->value['is_gift'])&&$_smarty_tpl->tpl_vars['product']->value['is_gift']) {?>
              <span class="gift-quantity"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
</span>
            <?php } else { ?>
              <div class="qty_wrap">
                <input
                  class="js-cart-line-product-quantity cart_quantity cart_quantity_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
"
                  data-down-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['down_quantity_url'], ENT_QUOTES, 'UTF-8');?>
"
                  data-up-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['up_quantity_url'], ENT_QUOTES, 'UTF-8');?>
"
                  data-update-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['update_quantity_url'], ENT_QUOTES, 'UTF-8');?>
"
                  data-product-id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_product'], ENT_QUOTES, 'UTF-8');?>
"
                  type="text"
                  value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
"
                  name="product-quantity-spin"
                  min="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['minimal_quantity'], ENT_QUOTES, 'UTF-8');?>
"
                />
              </div>
            <?php }?>
				<br>
				<span class="stck-info" style="<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity_available']<$_smarty_tpl->tpl_vars['product']->value['cart_quantity']) {?>color:red<?php }?>">
				In stock :<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity_available'], ENT_QUOTES, 'UTF-8');?>

				</span>
          </div>

          <div class="col-md-6 col-2">
            <span class="product-price price">
              <strong>
                <?php if (isset($_smarty_tpl->tpl_vars['product']->value['is_gift'])&&$_smarty_tpl->tpl_vars['product']->value['is_gift']) {?>
                  <span class="gift"><?php echo smartyTranslate(array('s'=>'Gift','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</span>
                <?php } else { ?>
                  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['total'], ENT_QUOTES, 'UTF-8');?>

                <?php }?>
              </strong>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-2 text-right">
        <div class="cart-line-product-actions ">
          <a
              class                       = "remove-from-cart"
              rel                         = "nofollow"
              href                        = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['remove_from_cart_url'], ENT_QUOTES, 'UTF-8');?>
"
              data-link-action            = "delete-from-cart"
              data-id-product             = "<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['id_product'],'javascript'), ENT_QUOTES, 'UTF-8');?>
"
              data-id-product-attribute   = "<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'],'javascript'), ENT_QUOTES, 'UTF-8');?>
"
              data-id-customization   	  = "<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['product']->value['id_customization'],'javascript'), ENT_QUOTES, 'UTF-8');?>
"
          >
            <?php if (!isset($_smarty_tpl->tpl_vars['product']->value['is_gift'])||!$_smarty_tpl->tpl_vars['product']->value['is_gift']) {?>
              <i class="fto-cancel"></i>
            <?php }?>
          </a>
          
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayCartExtraProductActions','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

          
        </div>
      </div>
    </div>
  </div>

</div>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-detailed-totals.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c5e25e8_02823604')) {function content_5c31a80c5e25e8_02823604($_smarty_tpl) {?>
 
<div class="cart-detailed-totals">

  <div class="card-block">
    <?php  $_smarty_tpl->tpl_vars["subtotal"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["subtotal"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value['subtotals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["subtotal"]->key => $_smarty_tpl->tpl_vars["subtotal"]->value) {
$_smarty_tpl->tpl_vars["subtotal"]->_loop = true;
?>
      <?php if ($_smarty_tpl->tpl_vars['subtotal']->value['value']&&$_smarty_tpl->tpl_vars['subtotal']->value['type']!=='tax') {?>
        <div class="cart-summary-line clearfix" id="cart-subtotal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['type'], ENT_QUOTES, 'UTF-8');?>
">
          <span class="label<?php if ('products'===$_smarty_tpl->tpl_vars['subtotal']->value['type']) {?> js-subtotal<?php }?>">
            <?php if ('products'==$_smarty_tpl->tpl_vars['subtotal']->value['type']) {?>
              <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['summary_string'], ENT_QUOTES, 'UTF-8');?>

            <?php } else { ?>
              <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['label'], ENT_QUOTES, 'UTF-8');?>

            <?php }?>
          </span>
          <div class="value price">
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subtotal']->value['value'], ENT_QUOTES, 'UTF-8');?>

            <?php if ($_smarty_tpl->tpl_vars['subtotal']->value['type']==='shipping') {?>
              <div class="shipping_sub_total_details"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayCheckoutSubtotalDetails','subtotal'=>$_smarty_tpl->tpl_vars['subtotal']->value),$_smarty_tpl);?>
</div>
            <?php }?>
          </div>          
        </div>
      <?php }?>
    <?php } ?>
  </div>

  
    <?php /*  Call merged included template "checkout/_partials/cart-voucher.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('checkout/_partials/cart-voucher.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c5ea8b8_45827649($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "checkout/_partials/cart-voucher.tpl" */?>
  

  <hr>

  <div class="card-block">
    <div class="cart-summary-line clearfix cart-total">
      <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['labels']['tax_short'], ENT_QUOTES, 'UTF-8');?>
</span>
      <span class="value price fs_lg font-weight-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>

    <div class="cart-summary-line clearfix">
      <span class="label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['label'], ENT_QUOTES, 'UTF-8');?>
</span>
      <span class="value price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['subtotals']['tax']['value'], ENT_QUOTES, 'UTF-8');?>
</span>
    </div>
  </div>

  <hr>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-voucher.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c5ea8b8_45827649')) {function content_5c31a80c5ea8b8_45827649($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/cart-detailed-actions.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c5fd308_89464824')) {function content_5c31a80c5fd308_89464824($_smarty_tpl) {?>

<div class="checkout cart-detailed-actions card-block">
  <?php if ($_smarty_tpl->tpl_vars['cart']->value['minimalPurchaseRequired']) {?>
    <div class="alert alert-warning" role="alert">
      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value['minimalPurchaseRequired'], ENT_QUOTES, 'UTF-8');?>

    </div>
    <button type="button" class="btn btn-default disabled btn-full-width" disabled><?php echo smartyTranslate(array('s'=>'Proceed to checkout','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</button>
  <?php } elseif (empty($_smarty_tpl->tpl_vars['cart']->value['products'])) {?>
    <div class="text-center">
      <button type="button" class="btn btn-default disabled" disabled><?php echo smartyTranslate(array('s'=>'Proceed to checkout','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</button>
    </div>
  <?php } else { ?>
    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['order'], ENT_QUOTES, 'UTF-8');?>
" class="btn btn-default btn-full-width"><?php echo smartyTranslate(array('s'=>'Proceed to checkout','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayExpressCheckout'),$_smarty_tpl);?>

  <?php }?>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c635478_96108803')) {function content_5c31a80c635478_96108803($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>

<footer id="footer" class="footer-container">
    
	<?php if (trim($_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_1']->value)||trim($_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_2']->value)||trim($_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_3']->value)||trim($_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_4']->value)||trim($_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_5']->value)||trim($_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_6']->value)) {?>
    <section id="footer-primary">
		<div class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['f_top_fullwidth']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>wide_container<?php }?>">
            <div class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['f_top_fullwidth']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>container<?php } else { ?>container-fluid<?php }?>">
                <div class="row">
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_1']) {?><div id="stacked_footer_column_1" class="col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_1'],'.','-'), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_1']->value;?>
</div><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_2']) {?><div id="stacked_footer_column_2" class="col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_2'],'.','-'), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_2']->value;?>
</div><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_3']) {?><div id="stacked_footer_column_3" class="col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_3'],'.','-'), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_3']->value;?>
</div><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_4']) {?><div id="stacked_footer_column_4" class="col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_4'],'.','-'), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_4']->value;?>
</div><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_5']) {?><div id="stacked_footer_column_5" class="col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_5'],'.','-'), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_5']->value;?>
</div><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_6']) {?><div id="stacked_footer_column_6" class="col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['stacked_footer_column_6'],'.','-'), ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->tpl_vars['HOOK_STACKED_FOOTER_6']->value;?>
</div><?php }?>
                </div>
			</div>
        </div>
    </section>
    <?php }?>
    
    
    <?php $_smarty_tpl->_capture_stack[0][] = array("displayFooter", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooter"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php if (trim(Smarty::$_smarty_vars['capture']['displayFooter'])) {?>
    <section id="footer-secondary">
		<div class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['footer_fullwidth']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>wide_container<?php }?>">
			<div class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['footer_fullwidth']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>container<?php } else { ?>container-fluid<?php }?>">
                <div class="row">
				    <?php echo Smarty::$_smarty_vars['capture']['displayFooter'];?>

                </div>
			</div>
        </div>
    </section>
    <?php }?>
    
    
    <?php $_smarty_tpl->_capture_stack[0][] = array("displayFooterAfter", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterAfter"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php if (trim(Smarty::$_smarty_vars['capture']['displayFooterAfter'])) {?>
    <section id="footer-tertiary">
		<div class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['f_secondary_fullwidth']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>wide_container<?php }?>">
			<div class="<?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['f_secondary_fullwidth']&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']!=3) {?>container<?php } else { ?>container-fluid<?php }?>">
                <div class="row">
                	<?php echo Smarty::$_smarty_vars['capture']['displayFooterAfter'];?>

                </div>
			</div>
        </div>
    </section>
    <?php }?>
    

    <?php /*  Call merged included template "_partials/footer-bottom.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/footer-bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11886706435c31a80c423b17-54098273');
content_5c31a80c656df0_93659509($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/footer-bottom.tpl" */?>
</footer><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:02:36
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer-bottom.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31a80c656df0_93659509')) {function content_5c31a80c656df0_93659509($_smarty_tpl) {?>
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
