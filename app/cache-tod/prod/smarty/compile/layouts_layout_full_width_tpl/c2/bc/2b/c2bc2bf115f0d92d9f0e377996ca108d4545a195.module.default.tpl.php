<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "module:stblog/views/templates/front/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11576238385c31dcfb103ca0-10602122%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2bc2bf115f0d92d9f0e377996ca108d4545a195' => 
    array (
      0 => 'module:stblog/views/templates/front/default.tpl',
      1 => 1512351208,
      2 => 'module',
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
    '2cd986cbc088107ffda5e3831ebc49c92630ce14' => 
    array (
      0 => 'module:stblog/views/templates/slider/post-cover.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
    '876a8f4592d7db7d4593242f128c3a2c701899e4' => 
    array (
      0 => 'module:stlovedproduct/views/templates/hook/icon.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
    'b417ddcda6fbb33009e62237cb0569abc4971026' => 
    array (
      0 => 'module:stlovedproduct/views/templates/hook/fly.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
    '7b169325ecf751cfd9501b31278f6c5282c7bb68' => 
    array (
      0 => 'module:stblog/views/templates/slider/post.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
    '5a65d0fd2a8aa0efd7ec4d2367566284a2fd186d' => 
    array (
      0 => 'module:stblog/views/templates/slider/list-item.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
    'ca6253cec57b0c9ce45d5571b9217b31ab4f4cc2' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/_partials/pagination.tpl',
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
  'nocache_hash' => '11576238385c31dcfb103ca0-10602122',
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
  'unifunc' => 'content_5c31dcfb330502_16067318',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31dcfb330502_16067318')) {function content_5c31dcfb330502_16067318($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?><!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
	
	  <?php /*  Call merged included template "_partials/head.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb111247_83533837($_smarty_tpl);
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
	 hide-left-column hide-right-column  is_blog 
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-activation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb144021_05178285($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-activation.tpl" */?>
	  
	  <div class="header-container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_header']) {?> transparent-header <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_mobile_header']) {?> transparent-mobile-header <?php }?>">
	  <header id="st_header" class="animated fast">
		
		  <?php /*  Call merged included template "_partials/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb148e69_54279627($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/header.tpl" */?>
		
	  </header>
	  </div>
	  
	  
		<?php /*  Call merged included template "_partials/notifications.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb193ef7_43362420($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/notifications.tpl" */?>
	  

	  
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayStBlogFullWidthTop'),$_smarty_tpl);?>



	  <section id="wrapper" class="columns-container">
		<div id="columns" class="container">
		  <div class="row">

			<?php $_smarty_tpl->tpl_vars['cols_md'] = new Smarty_variable(12, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['cols_lg'] = new Smarty_variable(12, null, 0);?>

			

			

			
  <div id="center_column" class="single_column col-sm-12">
    

  <section id="main">
    
    
      
    

    
<section id="content" class="page-blog-default">
<?php echo $_smarty_tpl->tpl_vars['HOOK_ST_BLOG_HOME_TOP']->value;?>

<?php echo $_smarty_tpl->tpl_vars['HOOK_ST_BLOG_HOME']->value;?>

<?php if ($_smarty_tpl->tpl_vars['blog_show_all']->value&&$_smarty_tpl->tpl_vars['blogs']->value) {?>
<?php /*  Call merged included template "module:stblog/views/templates/slider/list-item.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("module:stblog/views/templates/slider/list-item.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('display_sd'=>$_smarty_tpl->tpl_vars['stblog']->value['display_sd']), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb1d5e55_42901167($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:stblog/views/templates/slider/list-item.tpl" */?>
<?php /*  Call merged included template "_partials/pagination.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('pagination'=>$_smarty_tpl->tpl_vars['pagination']->value,'is_blog_fengye'=>true), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb2cc627_71834918($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/pagination.tpl" */?>
<?php }?>
</section>


    
      <footer class="page-footer">
        
          <!-- Footer content -->
        
      </footer>
    

  </section>


  </div>

		  </div>
		</div>
	  </section>
	  	
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayStBlogFullWidthBottom'),$_smarty_tpl);?>


		
		  <?php /*  Call merged included template "_partials/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb2ef9f3_65927377($_smarty_tpl);
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['bottom']), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb12cfb2_59994236($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>
    
	
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBeforeBodyClosingTag'),$_smarty_tpl);?>

    
  </body>

</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/head.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb111247_83533837')) {function content_5c31dcfb111247_83533837($_smarty_tpl) {?>

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/stylesheets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stylesheets'=>$_smarty_tpl->tpl_vars['stylesheets']->value), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb124781_66873819($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/stylesheets.tpl" */?>



  <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['head'],'vars'=>$_smarty_tpl->tpl_vars['js_custom_vars']->value), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb12cfb2_59994236($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>

<!--st end -->

  <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>


<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['head_code'])&&$_smarty_tpl->tpl_vars['sttheme']->value['head_code']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['head_code'];?>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/stylesheets.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb124781_66873819')) {function content_5c31dcfb124781_66873819($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/javascript.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb12cfb2_59994236')) {function content_5c31dcfb12cfb2_59994236($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-activation.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb144021_05178285')) {function content_5c31dcfb144021_05178285($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb148e69_54279627')) {function content_5c31dcfb148e69_54279627($_smarty_tpl) {?>

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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/notifications.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb193ef7_43362420')) {function content_5c31dcfb193ef7_43362420($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "module:stblog/views/templates/slider/list-item.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb1d5e55_42901167')) {function content_5c31dcfb1d5e55_42901167($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/function.math.php';
if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?>
  <?php $_smarty_tpl->tpl_vars['for_w'] = new Smarty_variable('category', null, 0);?>
  <?php if (isset($_smarty_tpl->tpl_vars['for_f']->value)&&$_smarty_tpl->tpl_vars['for_f']->value) {?>
    <?php $_smarty_tpl->tpl_vars['for_w'] = new Smarty_variable($_smarty_tpl->tpl_vars['for_f']->value, null, 0);?>
  <?php }?>
  <?php $_smarty_tpl->tpl_vars['is_list'] = new Smarty_variable(0, null, 0);?>
  <?php if (($_smarty_tpl->tpl_vars['for_w']->value=='category'&&$_smarty_tpl->tpl_vars['category_layouts']->value!=3)||(isset($_smarty_tpl->tpl_vars['display_as_grid']->value)&&($_smarty_tpl->tpl_vars['display_as_grid']->value==3||$_smarty_tpl->tpl_vars['display_as_grid']->value==4))) {?><?php $_smarty_tpl->tpl_vars['is_list'] = new Smarty_variable(1, null, 0);?><?php }?>
  
  <?php if (!$_smarty_tpl->tpl_vars['pro_per_fw']->value) {?><?php $_smarty_tpl->tpl_vars['pro_per_fw'] = new Smarty_variable(1, null, 0);?><?php }?>
  <?php if (!$_smarty_tpl->tpl_vars['pro_per_xxl']->value) {?><?php $_smarty_tpl->tpl_vars['pro_per_xxl'] = new Smarty_variable(1, null, 0);?><?php }?>
  <?php if (!$_smarty_tpl->tpl_vars['pro_per_xl']->value) {?><?php $_smarty_tpl->tpl_vars['pro_per_xl'] = new Smarty_variable(1, null, 0);?><?php }?>
  <?php if (!$_smarty_tpl->tpl_vars['pro_per_lg']->value) {?><?php $_smarty_tpl->tpl_vars['pro_per_lg'] = new Smarty_variable(1, null, 0);?><?php }?>
  <?php if (!$_smarty_tpl->tpl_vars['pro_per_md']->value) {?><?php $_smarty_tpl->tpl_vars['pro_per_md'] = new Smarty_variable(1, null, 0);?><?php }?>
  <?php if (!$_smarty_tpl->tpl_vars['pro_per_sm']->value) {?><?php $_smarty_tpl->tpl_vars['pro_per_sm'] = new Smarty_variable(1, null, 0);?><?php }?>
  <?php if (!$_smarty_tpl->tpl_vars['pro_per_xs']->value) {?><?php $_smarty_tpl->tpl_vars['pro_per_xs'] = new Smarty_variable(1, null, 0);?><?php }?>
  
  <?php $_smarty_tpl->tpl_vars['nbLi'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['blogs']->value), null, 0);?>
  <?php $_smarty_tpl->tpl_vars['nbLiNext'] = new Smarty_variable(($_smarty_tpl->tpl_vars['nbLi']->value+1), null, 0);?>
  <?php echo smarty_function_math(array('equation'=>"nbLi/nbItemsPerLineScreen",'nbLi'=>$_smarty_tpl->tpl_vars['nbLi']->value,'nbItemsPerLineScreen'=>$_smarty_tpl->tpl_vars['pro_per_fw']->value,'assign'=>'nbLinesScreen'),$_smarty_tpl);?>

  <?php echo smarty_function_math(array('equation'=>"nbLi/nbItemsPerLineLarge",'nbLi'=>$_smarty_tpl->tpl_vars['nbLi']->value,'nbItemsPerLineLarge'=>$_smarty_tpl->tpl_vars['pro_per_xxl']->value,'assign'=>'nbLinesLarge'),$_smarty_tpl);?>

  <?php echo smarty_function_math(array('equation'=>"nbLi/nbItemsPerLineDesktop",'nbLi'=>$_smarty_tpl->tpl_vars['nbLi']->value,'nbItemsPerLineDesktop'=>$_smarty_tpl->tpl_vars['pro_per_xl']->value,'assign'=>'nbLinesDesktop'),$_smarty_tpl);?>

  <?php echo smarty_function_math(array('equation'=>"nbLi/nbItemsPerLine",'nbLi'=>$_smarty_tpl->tpl_vars['nbLi']->value,'nbItemsPerLine'=>$_smarty_tpl->tpl_vars['pro_per_lg']->value,'assign'=>'nbLines'),$_smarty_tpl);?>

  <?php echo smarty_function_math(array('equation'=>"nbLi/nbItemsPerLineTablet",'nbLi'=>$_smarty_tpl->tpl_vars['nbLi']->value,'nbItemsPerLineTablet'=>$_smarty_tpl->tpl_vars['pro_per_md']->value,'assign'=>'nbLinesTablet'),$_smarty_tpl);?>

  <?php echo smarty_function_math(array('equation'=>"nbLi/nbItemsPerLineMobile",'nbLi'=>$_smarty_tpl->tpl_vars['nbLi']->value,'nbItemsPerLineMobile'=>$_smarty_tpl->tpl_vars['pro_per_sm']->value,'assign'=>'nbLinesMobile'),$_smarty_tpl);?>

  <?php echo smarty_function_math(array('equation'=>"nbLi/nbItemsPerLinePortrait",'nbLi'=>$_smarty_tpl->tpl_vars['nbLi']->value,'nbItemsPerLinePortrait'=>$_smarty_tpl->tpl_vars['pro_per_xs']->value,'assign'=>'nbLinesPortrait'),$_smarty_tpl);?>


  <div class="st_posts product_list <?php if ($_smarty_tpl->tpl_vars['is_list']->value) {?> list <?php } else { ?> row grid <?php }?>">
    <?php  $_smarty_tpl->tpl_vars['blog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blog']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['blog']->key => $_smarty_tpl->tpl_vars['blog']->value) {
$_smarty_tpl->tpl_vars['blog']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['blog']->key;
?>
    <?php $_smarty_tpl->tpl_vars["curr_index"] = new Smarty_variable($_smarty_tpl->tpl_vars['index']->value, null, 0);?>
    <?php $_smarty_tpl->tpl_vars["curr_iteration"] = new Smarty_variable($_smarty_tpl->tpl_vars['index']->value+1, null, 0);?>
    <?php echo smarty_function_math(array('equation'=>"(total%perLine)",'total'=>$_smarty_tpl->tpl_vars['nbLi']->value,'perLine'=>$_smarty_tpl->tpl_vars['pro_per_fw']->value,'assign'=>'totModuloScreen'),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"(total%perLine)",'total'=>$_smarty_tpl->tpl_vars['nbLi']->value,'perLine'=>$_smarty_tpl->tpl_vars['pro_per_xxl']->value,'assign'=>'totModuloLarge'),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"(total%perLine)",'total'=>$_smarty_tpl->tpl_vars['nbLi']->value,'perLine'=>$_smarty_tpl->tpl_vars['pro_per_xl']->value,'assign'=>'totModuloDesktop'),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"(total%perLine)",'total'=>$_smarty_tpl->tpl_vars['nbLi']->value,'perLine'=>$_smarty_tpl->tpl_vars['pro_per_lg']->value,'assign'=>'totModulo'),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"(total%perLine)",'total'=>$_smarty_tpl->tpl_vars['nbLi']->value,'perLine'=>$_smarty_tpl->tpl_vars['pro_per_md']->value,'assign'=>'totModuloTablet'),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"(total%perLine)",'total'=>$_smarty_tpl->tpl_vars['nbLi']->value,'perLine'=>$_smarty_tpl->tpl_vars['pro_per_sm']->value,'assign'=>'totModuloMobile'),$_smarty_tpl);?>

    <?php echo smarty_function_math(array('equation'=>"(total%perLine)",'total'=>$_smarty_tpl->tpl_vars['nbLi']->value,'perLine'=>$_smarty_tpl->tpl_vars['pro_per_xs']->value,'assign'=>'totModuloPortrait'),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->tpl_vars['totModuloScreen']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModuloScreen'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_fw']->value, null, 0);?><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['totModuloLarge']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModuloLarge'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_xxl']->value, null, 0);?><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['totModuloDesktop']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModuloDesktop'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_xl']->value, null, 0);?><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['totModulo']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModulo'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_lg']->value, null, 0);?><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['totModuloTablet']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModuloTablet'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_md']->value, null, 0);?><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['totModuloMobile']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModuloMobile'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_sm']->value, null, 0);?><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['totModuloPortrait']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModuloPortrait'] = new Smarty_variable($_smarty_tpl->tpl_vars['pro_per_xs']->value, null, 0);?><?php }?>
      <div class="product_list_item <?php if ($_smarty_tpl->tpl_vars['is_list']->value) {?> clearfix <?php } else { ?> col-fw-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_fw']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-xxl-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_xxl']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-xl-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_xl']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-lg-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_lg']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-md-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_md']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-sm-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_sm']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-<?php echo htmlspecialchars(smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_xs']->value),'.','-'), ENT_QUOTES, 'UTF-8');?>
 <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_fw']->value==0) {?> last-item-of-screen-line<?php } elseif ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_fw']->value==1) {?> first-item-of-screen-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value>($_smarty_tpl->tpl_vars['nbLi']->value-$_smarty_tpl->tpl_vars['totModuloScreen']->value)) {?> last-screen-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_index']->value<$_smarty_tpl->tpl_vars['pro_per_fw']->value) {?> first-screen-line<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_xxl']->value==0) {?> last-item-of-large-line<?php } elseif ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_xxl']->value==1) {?> first-item-of-large-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value>($_smarty_tpl->tpl_vars['nbLi']->value-$_smarty_tpl->tpl_vars['totModuloLarge']->value)) {?> last-large-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_index']->value<$_smarty_tpl->tpl_vars['pro_per_xxl']->value) {?> first-large-line<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_xl']->value==0) {?> last-item-of-desktop-line<?php } elseif ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_xl']->value==1) {?> first-item-of-desktop-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value>($_smarty_tpl->tpl_vars['nbLi']->value-$_smarty_tpl->tpl_vars['totModuloDesktop']->value)) {?> last-desktop-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_index']->value<$_smarty_tpl->tpl_vars['pro_per_xl']->value) {?> first-desktop-line<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_lg']->value==0) {?> last-in-line<?php } elseif ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_lg']->value==1) {?> first-in-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value>($_smarty_tpl->tpl_vars['nbLi']->value-$_smarty_tpl->tpl_vars['totModulo']->value)) {?> last-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_index']->value<$_smarty_tpl->tpl_vars['pro_per_lg']->value) {?> first-line<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_md']->value==0) {?> last-item-of-tablet-line<?php } elseif ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_md']->value==1) {?> first-item-of-tablet-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value>($_smarty_tpl->tpl_vars['nbLi']->value-$_smarty_tpl->tpl_vars['totModuloTablet']->value)) {?> last-tablet-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_index']->value<$_smarty_tpl->tpl_vars['pro_per_md']->value) {?> first-tablet-line<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_sm']->value==0) {?> last-item-of-mobile-line<?php } elseif ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_sm']->value==1) {?> first-item-of-mobile-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value>($_smarty_tpl->tpl_vars['nbLi']->value-$_smarty_tpl->tpl_vars['totModuloMobile']->value)) {?> last-mobile-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_index']->value<$_smarty_tpl->tpl_vars['pro_per_sm']->value) {?> first-mobile-line<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_xs']->value==0) {?> last-item-of-portrait-line<?php } elseif ($_smarty_tpl->tpl_vars['curr_iteration']->value%$_smarty_tpl->tpl_vars['pro_per_xs']->value==1) {?> first-item-of-portrait-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_iteration']->value>($_smarty_tpl->tpl_vars['nbLi']->value-$_smarty_tpl->tpl_vars['totModuloPortrait']->value)) {?> last-portrait-line<?php }?><?php if ($_smarty_tpl->tpl_vars['curr_index']->value<$_smarty_tpl->tpl_vars['pro_per_xs']->value) {?> first-portrait-line<?php }?>">
        <?php /*  Call merged included template "module:stblog/views/templates/slider/post.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('module:stblog/views/templates/slider/post.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb24c0d2_37663911($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:stblog/views/templates/slider/post.tpl" */?>
      </div>
    <?php } ?>
  </div><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "module:stblog/views/templates/slider/post.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb24c0d2_37663911')) {function content_5c31dcfb24c0d2_37663911($_smarty_tpl) {?>
<?php if (!isset($_smarty_tpl->tpl_vars['blog_image_type']->value)||!$_smarty_tpl->tpl_vars['blog_image_type']->value) {?>
    <?php if (isset($_smarty_tpl->tpl_vars['for_w']->value)&&$_smarty_tpl->tpl_vars['for_w']->value=='category'&&($_smarty_tpl->tpl_vars['category_layouts']->value==1||($_smarty_tpl->tpl_vars['category_layouts']->value==3&&$_smarty_tpl->tpl_vars['pro_per_lg']->value==1))) {?>
        <?php $_smarty_tpl->tpl_vars['blog_image_type'] = new Smarty_variable('large', null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['blog_image_type'] = new Smarty_variable('medium', null, 0);?>
    <?php }?>
<?php }?>

<?php $_smarty_tpl->tpl_vars['is_lazy'] = new Smarty_variable(!isset($_smarty_tpl->tpl_vars['for_w']->value)&&isset($_smarty_tpl->tpl_vars['lazy_load']->value)&&$_smarty_tpl->tpl_vars['lazy_load']->value, null, 0);?>
<div class="block_blog <?php if (isset($_smarty_tpl->tpl_vars['classname']->value)) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['classname']->value, ENT_QUOTES, 'UTF-8');?>
 <?php }?>">
    <div class="pro_outer_box <?php if ((isset($_smarty_tpl->tpl_vars['for_w']->value)&&$_smarty_tpl->tpl_vars['for_w']->value=='category'&&$_smarty_tpl->tpl_vars['category_layouts']->value==2)||(isset($_smarty_tpl->tpl_vars['display_as_grid']->value)&&($_smarty_tpl->tpl_vars['display_as_grid']->value==2||$_smarty_tpl->tpl_vars['display_as_grid']->value==4))) {?> blog_lr clearfix <?php }?>">
    <?php if ($_smarty_tpl->tpl_vars['blog']->value['cover']) {?>
    <div class="pro_first_box">
        <?php /*  Call merged included template "module:stblog/views/templates/slider/post-cover.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('module:stblog/views/templates/slider/post-cover.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_video'=>1), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb257b71_23453756($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:stblog/views/templates/slider/post-cover.tpl" */?>
        <?php if (isset($_smarty_tpl->tpl_vars['loved_position']->value)&&$_smarty_tpl->tpl_vars['loved_position']->value) {?>
            <?php /*  Call merged included template "module:stlovedproduct/views/templates/hook/icon.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('module:stlovedproduct/views/templates/hook/icon.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id_source'=>$_smarty_tpl->tpl_vars['blog']->value['id_st_blog'],'love_blog'=>true), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb288007_68715304($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:stlovedproduct/views/templates/hook/icon.tpl" */?>
        <?php }?>
    </div>
    <?php }?>
    <div class="pro_second_box pro_block_align_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['stblog']->value['blog_block_align'], ENT_QUOTES, 'UTF-8');?>
">
        <?php if (isset($_smarty_tpl->tpl_vars['stblog']->value['length_of_name'])&&$_smarty_tpl->tpl_vars['stblog']->value['length_of_name']==1) {?>
            <?php $_smarty_tpl->tpl_vars["length_of_name"] = new Smarty_variable(70, null, 0);?>
        <?php }?>
        <h1 class="s_title_block <?php if (isset($_smarty_tpl->tpl_vars['stblog']->value['length_of_name'])) {?><?php if ($_smarty_tpl->tpl_vars['stblog']->value['length_of_name']==3) {?> two_rows <?php } elseif ($_smarty_tpl->tpl_vars['stblog']->value['length_of_name']==1||$_smarty_tpl->tpl_vars['stblog']->value['length_of_name']==2) {?> nohidden <?php }?><?php }?>"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
" ><?php if (isset($_smarty_tpl->tpl_vars['stblog']->value['length_of_name'])&&$_smarty_tpl->tpl_vars['stblog']->value['length_of_name']==1) {?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['blog']->value['name'],$_smarty_tpl->tpl_vars['length_of_name']->value,'...'), ENT_QUOTES, 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
<?php }?></a></h1>

        <?php if ($_smarty_tpl->tpl_vars['stblog']->value['display_date']||$_smarty_tpl->tpl_vars['stblog']->value['display_comment_count']||$_smarty_tpl->tpl_vars['stblog']->value['display_viewcount']||$_smarty_tpl->tpl_vars['stblog']->value['display_author']) {?>
        <div class="blog_info">
            <?php if ($_smarty_tpl->tpl_vars['stblog']->value['display_author']&&$_smarty_tpl->tpl_vars['blog']->value['author']) {?><span class="posted_by mar_r4"><?php echo smartyTranslate(array('s'=>'by','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span><span class="link_color"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['author'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['stblog']->value['display_comment_count']&&isset($_smarty_tpl->tpl_vars['blog']->value['comment_number'])&&$_smarty_tpl->tpl_vars['blog']->value['comment_number']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8');?>
#comments" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['comment_number'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['blog']->value['comment_number']>1) {?><?php echo smartyTranslate(array('s'=>'Comments','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Comment','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?>"><i class="fto-chat-1 mar_r4"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['comment_number'], ENT_QUOTES, 'UTF-8');?>
</a><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['stblog']->value['display_viewcount']) {?><span><i class="fto-eye-2 mar_r4"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['counter'], ENT_QUOTES, 'UTF-8');?>
</span><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['stblog']->value['display_date']) {?>
            <span class="date-add"><i class="fto-clock mar_r4"></i><?php if ($_smarty_tpl->tpl_vars['stblog']->value['display_date']==2) {?><?php if (!count($_smarty_tpl->tpl_vars['blog']->value['timeago'])) {?><?php echo smartyTranslate(array('s'=>'Just now','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php } else { ?><?php if (key($_smarty_tpl->tpl_vars['blog']->value['timeago'])=='y') {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['timeago']['y'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['blog']->value['timeago']['y']>1) {?><?php echo smartyTranslate(array('s'=>'Year','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Years','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?><?php } elseif (key($_smarty_tpl->tpl_vars['blog']->value['timeago'])=='m') {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['timeago']['m'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['blog']->value['timeago']['m']>1) {?><?php echo smartyTranslate(array('s'=>'Month','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Months','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?><?php } elseif (key($_smarty_tpl->tpl_vars['blog']->value['timeago'])=='w') {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['timeago']['w'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['blog']->value['timeago']['w']>1) {?><?php echo smartyTranslate(array('s'=>'Week','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Weeks','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?><?php } elseif (key($_smarty_tpl->tpl_vars['blog']->value['timeago'])=='d') {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['timeago']['d'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['blog']->value['timeago']['d']>1) {?><?php echo smartyTranslate(array('s'=>'Day','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Days','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?><?php } elseif (key($_smarty_tpl->tpl_vars['blog']->value['timeago'])=='h') {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['timeago']['h'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['blog']->value['timeago']['h']>1) {?><?php echo smartyTranslate(array('s'=>'Hour','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Hours','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?><?php } elseif (key($_smarty_tpl->tpl_vars['blog']->value['timeago'])=='i') {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['timeago']['i'], ENT_QUOTES, 'UTF-8');?>
 <?php if ($_smarty_tpl->tpl_vars['blog']->value['timeago']['i']>1) {?><?php echo smartyTranslate(array('s'=>'Minute','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Minutes','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?><?php }?>&nbsp;<?php echo smartyTranslate(array('s'=>'ago','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
<?php }?><?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['blog']->value['date_add'],'full'=>0),$_smarty_tpl);?>
<?php }?></span>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['loved_position']->value)&&!$_smarty_tpl->tpl_vars['loved_position']->value) {?>
              <?php /*  Call merged included template "module:stlovedproduct/views/templates/hook/fly.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('module:stlovedproduct/views/templates/hook/fly.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id_source'=>$_smarty_tpl->tpl_vars['blog']->value['id_st_blog'],'classname'=>"btn_inline",'love_blog'=>true), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb2b48e0_33049365($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "module:stlovedproduct/views/templates/hook/fly.tpl" */?>
            <?php }?>
        </div>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['display_sd']->value&&$_smarty_tpl->tpl_vars['blog']->value['content_short']) {?>
        <div class="blok_blog_short_content fs_md pad_b6">
            <?php if ($_smarty_tpl->tpl_vars['display_sd']->value==2) {?><?php echo $_smarty_tpl->tpl_vars['blog']->value['content_short'];?>

            <?php } elseif ($_smarty_tpl->tpl_vars['display_sd']->value==3) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['content_short']),120,'...');?>

            <?php } elseif ($_smarty_tpl->tpl_vars['display_sd']->value==1) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['content_short']),220,'...');?>

            <?php } elseif ($_smarty_tpl->tpl_vars['display_sd']->value==4) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['content']),120,'...');?>

            <?php } elseif ($_smarty_tpl->tpl_vars['display_sd']->value==5) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['content']),220,'...');?>

            <?php } elseif ($_smarty_tpl->tpl_vars['display_sd']->value==6) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['content']),600,'...');?>

            <?php } elseif ($_smarty_tpl->tpl_vars['display_sd']->value==7) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['content']),1200,'...');?>

            <?php }?>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['stblog']->value['display_read_more']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'Read more','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" class="<?php if ($_smarty_tpl->tpl_vars['stblog']->value['display_read_more']==2) {?>go<?php } else { ?>btn btn-default<?php }?>"><?php echo smartyTranslate(array('s'=>'Read more','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a><?php }?>
        <?php }?>
        
    </div>
    </div>
</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "module:stblog/views/templates/slider/post-cover.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb257b71_23453756')) {function content_5c31dcfb257b71_23453756($_smarty_tpl) {?>
        <?php if (isset($_smarty_tpl->tpl_vars['blog']->value['cover'])&&$_smarty_tpl->tpl_vars['blog']->value['cover']) {?>
        <?php if ($_smarty_tpl->tpl_vars['blog']->value['type']==1) {?>
            <?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?><i class="swiper-lazy-preloader fto-spin5 animate-spin"></i><?php }?>
            <div class="blog_image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8');?>
" rel="bookmark" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><img <?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?>data-src<?php } else { ?>src<?php }?>="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['image'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['height'], ENT_QUOTES, 'UTF-8');?>
" class="<?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?> swiper-lazy <?php }?> front-image" /></a>
              <meta itemprop="url" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['image'], ENT_QUOTES, 'UTF-8');?>
">
              <meta itemprop="width" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['width'], ENT_QUOTES, 'UTF-8');?>
">
              <meta itemprop="height" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['height'], ENT_QUOTES, 'UTF-8');?>
">
            </div>
        <?php }?>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['blog']->value['type']==2) {?>
        <?php if (isset($_smarty_tpl->tpl_vars['blog']->value['galleries'])&&count($_smarty_tpl->tpl_vars['blog']->value['galleries'])) {?>
            <div class="swiper-container tm_gallery swiper-button-lr swiper-navigation-circle swiper-small-button" data-lazyload="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['is_lazy']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['is_rtl']) {?> dir="rtl" <?php }?> itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                <div class="swiper-wrapper">
                    <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blog']->value['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['image']->key;
 $_smarty_tpl->tpl_vars['image']->index++;
 $_smarty_tpl->tpl_vars['image']->first = $_smarty_tpl->tpl_vars['image']->index === 0;
?>
                      <div class="swiper-slide">
                        <?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?><i class="swiper-lazy-preloader fto-spin5 animate-spin"></i><?php }?>
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8');?>
" class="tm_gallery_item_box" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
                                <img
                                  class="tm_gallery_item <?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?> swiper-lazy <?php }?>"
                                  <?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?>data-src<?php } else { ?>src<?php }?>="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['image'], ENT_QUOTES, 'UTF-8');?>
"
                                  alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
                                  title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
"
                                  width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['width'], ENT_QUOTES, 'UTF-8');?>
" 
                                  height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['height'], ENT_QUOTES, 'UTF-8');?>
"
                                />
                                <?php if ($_smarty_tpl->tpl_vars['image']->first) {?>
                                <meta itemprop="url" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['image'], ENT_QUOTES, 'UTF-8');?>
">
                                <meta itemprop="width" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['width'], ENT_QUOTES, 'UTF-8');?>
">
                                <meta itemprop="height" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['height'], ENT_QUOTES, 'UTF-8');?>
">
                                <?php }?>
                            </a>
                      </div>
                    <?php } ?>
                </div>
                <div class="swiper-button swiper-button-next"><i class="fto-left-open slider_arrow_left"></i><i class="fto-right-open slider_arrow_right"></i></div>
                <div class="swiper-button swiper-button-prev"><i class="fto-left-open slider_arrow_left"></i><i class="fto-right-open slider_arrow_right"></i></div>
            </div>
        <?php } elseif (isset($_smarty_tpl->tpl_vars['blog']->value['cover'])&&$_smarty_tpl->tpl_vars['blog']->value['cover']) {?>
            <?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?><i class="swiper-lazy-preloader fto-spin5 animate-spin"></i><?php }?>
            <div class="blog_image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8');?>
" rel="bookmark" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><img <?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?>data-src<?php } else { ?>src<?php }?>="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['image'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['height'], ENT_QUOTES, 'UTF-8');?>
" class="<?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?> swiper-lazy <?php }?> front-image" /></a>
              <meta itemprop="url" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['image'], ENT_QUOTES, 'UTF-8');?>
">
              <meta itemprop="width" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['width'], ENT_QUOTES, 'UTF-8');?>
">
              <meta itemprop="height" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['height'], ENT_QUOTES, 'UTF-8');?>
">
            </div>
        <?php }?>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['blog']->value['type']==3) {?>
            <?php if (isset($_smarty_tpl->tpl_vars['show_video']->value)&&$_smarty_tpl->tpl_vars['show_video']->value&&$_smarty_tpl->tpl_vars['blog']->value['video']) {?>
              <div class="blog_video"><div class="video_wraper"><?php echo $_smarty_tpl->tpl_vars['blog']->value['video'];?>
</div></div>
            <?php } elseif (isset($_smarty_tpl->tpl_vars['blog']->value['cover'])&&$_smarty_tpl->tpl_vars['blog']->value['cover']) {?>
              <?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?><i class="swiper-lazy-preloader fto-spin5 animate-spin"></i><?php }?>
              <div class="blog_image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8');?>
" rel="bookmark" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
"><img <?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?>data-src<?php } else { ?>src<?php }?>="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['image'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['width'], ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['height'], ENT_QUOTES, 'UTF-8');?>
" class="<?php if ($_smarty_tpl->tpl_vars['is_lazy']->value) {?> swiper-lazy <?php }?> front-image" /></a>
                <meta itemprop="url" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['image'], ENT_QUOTES, 'UTF-8');?>
">
                <meta itemprop="width" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['width'], ENT_QUOTES, 'UTF-8');?>
">
                <meta itemprop="height" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['cover']['links'][$_smarty_tpl->tpl_vars['blog_image_type']->value]['height'], ENT_QUOTES, 'UTF-8');?>
">
              </div>
              <span class="blog_type_icon icon_wrap"><i class="fto-video fs_lg"></i></span>
            <?php }?>
        <?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "module:stlovedproduct/views/templates/hook/icon.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb288007_68715304')) {function content_5c31dcfb288007_68715304($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['id_source']->value)&&$_smarty_tpl->tpl_vars['id_source']->value) {?>
<a class="add_to_love btn-spin layer_btn hover_out" href="javascript:;" data-id-source="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_source']->value, ENT_QUOTES, 'UTF-8');?>
" data-type="<?php if (isset($_smarty_tpl->tpl_vars['love_blog']->value)&&$_smarty_tpl->tpl_vars['love_blog']->value) {?>2<?php } else { ?>1<?php }?>" title="<?php echo smartyTranslate(array('s'=>'Add to loved','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow"><i class="fto-heart-4 icon_btn"></i></a>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "module:stlovedproduct/views/templates/hook/fly.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb2b48e0_33049365')) {function content_5c31dcfb2b48e0_33049365($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['id_source']->value)&&$_smarty_tpl->tpl_vars['id_source']->value) {?>
<a class="add_to_love hover_fly_btn <?php if (isset($_smarty_tpl->tpl_vars['classname']->value)) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['classname']->value, ENT_QUOTES, 'UTF-8');?>
 <?php }?> btn-spin pro_right_item" data-id-source="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id_source']->value, ENT_QUOTES, 'UTF-8');?>
" data-type="<?php if (isset($_smarty_tpl->tpl_vars['love_blog']->value)&&$_smarty_tpl->tpl_vars['love_blog']->value) {?>2<?php } else { ?>1<?php }?>" href="javascript:;" title="<?php echo smartyTranslate(array('s'=>'Love','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow"><div class="hover_fly_btn_inner"><i class="fto-heart-4 icon_btn"></i><span class="btn_text"><?php echo smartyTranslate(array('s'=>'Love','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span><?php if (isset($_smarty_tpl->tpl_vars['loved_with_number']->value)&&$_smarty_tpl->tpl_vars['loved_with_number']->value) {?><span class="amount_inline"><?php echo htmlspecialchars((int)$_smarty_tpl->tpl_vars['loved_total']->value, ENT_QUOTES, 'UTF-8');?>
</span><?php }?></div></a>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/pagination.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb2cc627_71834918')) {function content_5c31dcfb2cc627_71834918($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['is_product_page'] = new Smarty_variable(true, null, 0);?>
<?php $_smarty_tpl->tpl_vars['pagi_class'] = new Smarty_variable('js-search-link', null, 0);?>
<?php if (isset($_smarty_tpl->tpl_vars['is_blog_fengye']->value)) {?>
  <?php if ((int)$_smarty_tpl->tpl_vars['is_blog_fengye']->value==2) {?>
    <?php $_smarty_tpl->tpl_vars['pagi_class'] = new Smarty_variable('pc-search-link', null, 0);?>
  <?php } else { ?>
    <?php $_smarty_tpl->tpl_vars['is_product_page'] = new Smarty_variable(false, null, 0);?>
  <?php }?>
<?php }?>
<nav class="bottom_pagination flex_box flex_space_between mb-3">
  <div class="product_count">
    
    <?php echo smartyTranslate(array('s'=>'Showing %from%-%to% of %total% item(s)','d'=>'Shop.Theme.Catalog','sprintf'=>array('%from%'=>$_smarty_tpl->tpl_vars['pagination']->value['items_shown_from'],'%to%'=>$_smarty_tpl->tpl_vars['pagination']->value['items_shown_to'],'%total%'=>$_smarty_tpl->tpl_vars['pagination']->value['total_items'])),$_smarty_tpl);?>

    
  </div>
  <nav aria-label="Page navigation">
    
    <ul class="pagination">
      <?php  $_smarty_tpl->tpl_vars["page"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["page"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pagination']->value['pages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["page"]->key => $_smarty_tpl->tpl_vars["page"]->value) {
$_smarty_tpl->tpl_vars["page"]->_loop = true;
?>
        <li class="page-item <?php if ($_smarty_tpl->tpl_vars['page']->value['current']) {?> active <?php }?> <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames(array('disabled'=>!$_smarty_tpl->tpl_vars['page']->value['clickable'])), ENT_QUOTES, 'UTF-8');?>
">
          <?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='spacer') {?>
            <span class="spacer">&hellip;</span>
          <?php } else { ?>
            <a
              rel="<?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous') {?>prev<?php } elseif ($_smarty_tpl->tpl_vars['page']->value['type']==='next') {?>next<?php } else { ?>nofollow<?php }?>"
              href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value['url'], ENT_QUOTES, 'UTF-8');?>
"
              class="page-link <?php if ($_smarty_tpl->tpl_vars['page']->value['type']==='previous') {?>previous <?php } elseif ($_smarty_tpl->tpl_vars['page']->value['type']==='next') {?>next <?php }?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames(array('disabled'=>!$_smarty_tpl->tpl_vars['page']->value['clickable'],$_smarty_tpl->tpl_vars['pagi_class']->value=>$_smarty_tpl->tpl_vars['is_product_page']->value)), ENT_QUOTES, 'UTF-8');?>
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

              <?php }?>
            </a>
          <?php }?>
        </li>
      <?php } ?>
    </ul>
    
  </nav>
</nav>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb2ef9f3_65927377')) {function content_5c31dcfb2ef9f3_65927377($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/footer-bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11576238385c31dcfb103ca0-10602122');
content_5c31dcfb30c1c7_58598212($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/footer-bottom.tpl" */?>
</footer><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 02:48:27
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer-bottom.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c31dcfb30c1c7_58598212')) {function content_5c31dcfb30c1c7_58598212($_smarty_tpl) {?>
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
