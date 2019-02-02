<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/addresses.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1030136595c322d985000f4-20249137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33bc1b733b27e88c88b0d288f9e5078e7ffc2689' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/addresses.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '239c14ec75acc03d922a0bb22343bf69573da5a1' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/page.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '20a7735d78f79d21db4350bf6d087241b6adafc2' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/page.tpl',
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
    'a032451b2533259bd2c1bf91fc0fc8ec002430c2' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/_partials/my-account-items.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'a57888a68b5d931c96147a13120b794f7e46f9d7' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/_partials/my-account-nav.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '804d1912ab54df40c196efd00b2636b07d6ae5b8' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/_partials/block-address.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    '16ba00a7f3004266bef8a3e1f7caf7552d3bb38c' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/_partials/my-account-links.tpl',
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
  'nocache_hash' => '1030136595c322d985000f4-20249137',
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
  'unifunc' => 'content_5c322d9863f2b9_67780250',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322d9863f2b9_67780250')) {function content_5c322d9863f2b9_67780250($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?><!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
	
	  <?php /*  Call merged included template "_partials/head.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1030136595c322d985000f4-20249137');
content_5c322d98512c62_13312964($_smarty_tpl);
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-activation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1030136595c322d985000f4-20249137');
content_5c322d98547e34_27531668($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-activation.tpl" */?>
	  
	  <div class="header-container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_header']) {?> transparent-header <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_mobile_header']) {?> transparent-mobile-header <?php }?>">
	  <header id="st_header" class="animated fast">
		
		  <?php /*  Call merged included template "_partials/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1030136595c322d985000f4-20249137');
content_5c322d9854c9c6_44795575($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/header.tpl" */?>
		
	  </header>
	  </div>
	  
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBreadcrumb','page_name'=>$_smarty_tpl->tpl_vars['page']->value['page_name']),$_smarty_tpl);?>

		<div class="breadcrumb_spacing"></div>
	  
	  

	  
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
    
    
      
        <h3 class="page_heading">
          
  <?php echo smartyTranslate(array('s'=>'Your addresses','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>


        </h3>
      
    

    
  <section id="content" class="page-content row">
    <div class="col-lg-3 hidden-md-down my_account_left_column">
    	
		    <?php /*  Call merged included template "customer/_partials/my-account-nav.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('customer/_partials/my-account-nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1030136595c322d985000f4-20249137');
content_5c322d985c2c10_47475809($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "customer/_partials/my-account-nav.tpl" */?>
	    
    </div>
    <div class="col-lg-9">
    	
	    	
			    <?php /*  Call merged included template "_partials/notifications.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1030136595c322d985000f4-20249137');
content_5c322d98594fd8_02903948($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/notifications.tpl" */?>
			 
	    
	    

  
  <div class="row com_grid_view">
  <?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customer']->value['addresses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['address']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value) {
$_smarty_tpl->tpl_vars['address']->_loop = true;
 $_smarty_tpl->tpl_vars['address']->index++;
?>
    <div class="col-md-6 <?php if ($_smarty_tpl->tpl_vars['address']->index%2==0) {?> first-item-of-large-line  first-item-of-desktop-line first-item-of-line <?php }?>">
    
      <?php /*  Call merged included template "customer/_partials/block-address.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('customer/_partials/block-address.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('address'=>$_smarty_tpl->tpl_vars['address']->value), 0, '1030136595c322d985000f4-20249137');
content_5c322d985db7a8_28864564($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "customer/_partials/block-address.tpl" */?>
    
    </div>
  <?php } ?>
  </div>

  <div class="addresses-footer mb-3">
    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['address'], ENT_QUOTES, 'UTF-8');?>
" data-link-action="add-address" class="">
      <i class="fto-plus-2 fs_md mar_r4"></i><?php echo smartyTranslate(array('s'=>'Create new address','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

    </a>
  </div>


        
            <?php /*  Call merged included template "customer/_partials/my-account-links.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('customer/_partials/my-account-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1030136595c322d985000f4-20249137');
content_5c322d985e4617_80729525($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "customer/_partials/my-account-links.tpl" */?>
        
    </div>
  </section>


    
      <footer class="page-footer">
        
    

      </footer>
    

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1030136595c322d985000f4-20249137');
content_5c322d985ff147_53145001($_smarty_tpl);
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['bottom']), 0, '1030136595c322d985000f4-20249137');
content_5c322d985327a2_59020402($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>
    
	
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBeforeBodyClosingTag'),$_smarty_tpl);?>

    
  </body>

</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/head.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d98512c62_13312964')) {function content_5c322d98512c62_13312964($_smarty_tpl) {?>

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/stylesheets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stylesheets'=>$_smarty_tpl->tpl_vars['stylesheets']->value), 0, '1030136595c322d985000f4-20249137');
content_5c322d985293f7_09722888($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/stylesheets.tpl" */?>



  <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['head'],'vars'=>$_smarty_tpl->tpl_vars['js_custom_vars']->value), 0, '1030136595c322d985000f4-20249137');
content_5c322d985327a2_59020402($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>

<!--st end -->

  <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>


<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['head_code'])&&$_smarty_tpl->tpl_vars['sttheme']->value['head_code']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['head_code'];?>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/stylesheets.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d985293f7_09722888')) {function content_5c322d985293f7_09722888($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/javascript.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d985327a2_59020402')) {function content_5c322d985327a2_59020402($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-activation.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d98547e34_27531668')) {function content_5c322d98547e34_27531668($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d9854c9c6_44795575')) {function content_5c322d9854c9c6_44795575($_smarty_tpl) {?>

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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/notifications.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d98594fd8_02903948')) {function content_5c322d98594fd8_02903948($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/my-account-nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d985c2c10_47475809')) {function content_5c322d985c2c10_47475809($_smarty_tpl) {?>
    <div class="list-group mb-3">

	    <?php /*  Call merged included template "customer/_partials/my-account-items.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('customer/_partials/my-account-items.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1030136595c322d985000f4-20249137');
content_5c322d985c37f5_45733549($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "customer/_partials/my-account-items.tpl" */?>
            <div class="list-group-item">
            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'index','params'=>array('mylogout'=>'')),$_smarty_tpl);?>
" class="sign-out-link" title="<?php echo smartyTranslate(array('s'=>'Sign out','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-logout-1 mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Sign out','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
            </div>

	</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/my-account-items.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d985c37f5_45733549')) {function content_5c322d985c37f5_45733549($_smarty_tpl) {?>
	      <div class="list-group-item">
	      <a class=" landing-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['my_account'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Dashboard','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
	          <i class="fto-cog mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Dashboard','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

	      </a>
	      </div>

	      <div class="list-group-item">
	      <a class=" identity-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['identity'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Information','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
">
	          <i class="fto-vcard-1 mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Information','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

	      </a>
	      </div>

	      <?php if (count($_smarty_tpl->tpl_vars['customer']->value['addresses'])) {?>
	        <div class="list-group-item">
	        <a class=" addresses-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['addresses'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Addresses','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
">
	            <i class="fto-location-2 mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Addresses','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

	        </a>
	        </div>
	      <?php } else { ?>
	        <div class="list-group-item">
	        <a class=" address-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['address'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Add first address','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
">
	            <i class="fto-location-2 mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Add first address','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

	        </a>
	        </div>
	      <?php }?>

	      <?php if (!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>
	        <div class="list-group-item">
	        <a class=" history-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['history'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Order history and details','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
">
	            <i class="fto-calendar-1 mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Order history and details','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

	        </a>
	        </div>
	      <?php }?>

	      <?php if (!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>
	        <div class="list-group-item">
	        <a class=" order-slips-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['order_slip'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Credit slips','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
">
	            <i class="fto-dot-circled mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Credit slips','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

	        </a>
	        </div>
	      <?php }?>

	      <?php if ($_smarty_tpl->tpl_vars['configuration']->value['voucher_enabled']&&!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>
	        <div class="list-group-item">
	        <a class=" discounts-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['discount'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Vouchers','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
">
	            <i class="fto-tag-2 mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Vouchers','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

	        </a>
	        </div>
	      <?php }?>

	      <?php if ($_smarty_tpl->tpl_vars['configuration']->value['return_enabled']&&!$_smarty_tpl->tpl_vars['configuration']->value['is_catalog']) {?>
	        <div class="list-group-item">
	        <a class=" returns-link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['order_follow'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Merchandise returns','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
">
	            <i class="fto-paper-plane mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Merchandise returns','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

	        </a>
	        </div>
	      <?php }?>

	      
	        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayCustomeraccount'),$_smarty_tpl);?>

	      <?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/block-address.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d985db7a8_28864564')) {function content_5c322d985db7a8_28864564($_smarty_tpl) {?>

<article id="address-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="address card card_trans mb-3" data-id-address="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
  <div class="address-body card-block">
    <p class="font-weight-bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value['alias'], ENT_QUOTES, 'UTF-8');?>
</p>
    <address><?php echo $_smarty_tpl->tpl_vars['address']->value['formatted'];?>
</address>
  </div>
  
  <div class="address-footer card-footer">
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'address','id'=>$_smarty_tpl->tpl_vars['address']->value['id']),$_smarty_tpl);?>
" data-link-action="edit-address" class="inline_block mar_r6">
      <i class="fto-edit mar_r4"></i><?php echo smartyTranslate(array('s'=>'Update','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

    </a>
    <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'address','id'=>$_smarty_tpl->tpl_vars['address']->value['id'],'params'=>array('delete'=>1,'token'=>$_smarty_tpl->tpl_vars['token']->value)),$_smarty_tpl);?>
" data-link-action="delete-address" class="inline_block">
      <i class="fto-cancel mar_r4"></i><?php echo smartyTranslate(array('s'=>'Delete','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

    </a>
  </div>
  
</article>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/my-account-links.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d985e4617_80729525')) {function content_5c322d985e4617_80729525($_smarty_tpl) {?>

<div class="clearfix my_account_page_footer mt-3 mb-3">
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['my_account'], ENT_QUOTES, 'UTF-8');?>
" class="fl">
	  <i class="fto-left fto_mar_lr2"></i>
	  <?php echo smartyTranslate(array('s'=>'Back to your account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

	</a>
	<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['index'], ENT_QUOTES, 'UTF-8');?>
" class="fr">
	  <i class="fto-home fto_mar_lr2"></i>
	  <?php echo smartyTranslate(array('s'=>'Home','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>

	</a>
</div>

<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d985ff147_53145001')) {function content_5c322d985ff147_53145001($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/footer-bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '1030136595c322d985000f4-20249137');
content_5c322d9861b4c1_14713805($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/footer-bottom.tpl" */?>
</footer><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:32:24
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer-bottom.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322d9861b4c1_14713805')) {function content_5c322d9861b4c1_14713805($_smarty_tpl) {?>
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
