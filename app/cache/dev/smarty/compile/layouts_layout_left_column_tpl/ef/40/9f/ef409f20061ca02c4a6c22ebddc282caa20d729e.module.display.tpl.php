<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:33:11
         compiled from "module:faqs/views/templates/front/display.tpl" */ ?>
<?php /*%%SmartyHeaderCode:632367835c322dc732d015-33622115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef409f20061ca02c4a6c22ebddc282caa20d729e' => 
    array (
      0 => 'module:faqs/views/templates/front/display.tpl',
      1 => 1512425160,
      2 => 'module',
    ),
    '20a7735d78f79d21db4350bf6d087241b6adafc2' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/page.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'f4677dd9a54526cefb1c100cb3af28ccb7003477' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/layouts/layout-left-column.tpl',
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
  'nocache_hash' => '632367835c322dc732d015-33622115',
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
  'unifunc' => 'content_5c322dc77810f9_08892092',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322dc77810f9_08892092')) {function content_5c322dc77810f9_08892092($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?><!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
	
	  <?php /*  Call merged included template "_partials/head.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '632367835c322dc732d015-33622115');
content_5c322dc73387b6_54908353($_smarty_tpl);
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
	 show-left-column hide-right-column 
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-activation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '632367835c322dc732d015-33622115');
content_5c322dc73fa1a1_10568703($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-activation.tpl" */?>
	  
	  <div class="header-container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_header']) {?> transparent-header <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_mobile_header']) {?> transparent-mobile-header <?php }?>">
	  <header id="st_header" class="animated fast">
		
		  <?php /*  Call merged included template "_partials/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '632367835c322dc732d015-33622115');
content_5c322dc73fef80_80866963($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/header.tpl" */?>
		
	  </header>
	  </div>
	  
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBreadcrumb','page_name'=>$_smarty_tpl->tpl_vars['page']->value['page_name']),$_smarty_tpl);?>

		<div class="breadcrumb_spacing"></div>
	  
	  
		<?php /*  Call merged included template "_partials/notifications.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '632367835c322dc732d015-33622115');
content_5c322dc74e66b1_54655119($_smarty_tpl);
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

			
    <?php if ($_smarty_tpl->tpl_vars['faq']->value||$_smarty_tpl->tpl_vars['questions']->value||$_smarty_tpl->tpl_vars['search_val']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['layout']->value=='layouts/layout-left-column.tpl'||$_smarty_tpl->tpl_vars['layout']->value=='layouts/layout-both-columns.tpl') {?>
            <div id="left-column" class="col-xs-12 col-sm-3">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['widget'][0][0]->smartyWidget(array('name'=>"faqs",'hook'=>'displayLeftColumn'),$_smarty_tpl);?>

            </div>
        <?php }?>
    <?php }?>


			
    <?php if ($_smarty_tpl->tpl_vars['faq']->value||$_smarty_tpl->tpl_vars['questions']->value||$_smarty_tpl->tpl_vars['search_val']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['layout']->value=='layouts/layout-right-column.tpl') {?>
            <div id="right-column" class="col-xs-12 col-sm-4 col-md-3">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['widget'][0][0]->smartyWidget(array('name'=>"faqs",'hook'=>'displayRightColumn'),$_smarty_tpl);?>

            </div>
        <?php }?>
    <?php }?>


			
			  <div id="center_column" class="col-lg-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['cols_md']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
 col-xl-<?php echo htmlspecialchars(smarty_modifier_replace($_smarty_tpl->tpl_vars['cols_lg']->value,'.','-'), ENT_QUOTES, 'UTF-8');?>
">
			  	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayContentWrapperTop"),$_smarty_tpl);?>

				

  <section id="main">
    
    
      
    

    
      <section id="content" class="page-content">
        
        
    <?php if (!$_smarty_tpl->tpl_vars['faq']->value&&!$_smarty_tpl->tpl_vars['questions']->value&&!$_smarty_tpl->tpl_vars['search_val']->value) {?>
        <div class="gomakoil_faq_page">
            <?php if (isset($_smarty_tpl->tpl_vars['mostFaq']->value)&&$_smarty_tpl->tpl_vars['mostFaq']->value) {?>
                <div class="most_faqs">
                    <div class="title_home_page_fag"><?php echo smartyTranslate(array('s'=>'Featured Frequently Asked Questions','mod'=>'faqs'),$_smarty_tpl);?>
</div>
                    <div class="content_home_page_fag">
                        <?php $_smarty_tpl->tpl_vars['count_most'] = new Smarty_variable(0, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['most'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['most']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mostFaq']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['most']->key => $_smarty_tpl->tpl_vars['most']->value) {
$_smarty_tpl->tpl_vars['most']->_loop = true;
?>
                            <?php if (($_smarty_tpl->tpl_vars['most']->value['association']&&!$_smarty_tpl->tpl_vars['most']->value['hide_faq'])||!$_smarty_tpl->tpl_vars['most']->value['association']) {?>
                                <?php $_smarty_tpl->tpl_vars['count_most'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_most']->value+1, null, 0);?>
                                <a class="questions change_item<?php if ($_smarty_tpl->tpl_vars['most']->value['as_url']) {?> as_url<?php }?>" >
                                    <i class="material-icons">&#xE315;</i>
                                    <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['count_most']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
. <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(strip_tags($_smarty_tpl->tpl_vars['most']->value['question'],'<span>'),'htmlall','UTF-8');?>

                                </a>
                                <a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['most']->value['link_rewrite_cat'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['most']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
.html" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                                <div class="answer_faq">
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['most']->value['answer'],'htmlall','UTF-8');?>

                                </div>
                            <?php }?>
                        <?php } ?>
                    </div>
                </div>
            <?php }?>
            <div class="search_faqs">
                <input type="text" class="search_fag_input" placeholder="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'faqs'),$_smarty_tpl);?>
">
                <button type="submit"  onclick="searchFags($('.search_fag_input').val(), '<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
search/'); return false;"  class="button search_fag_submit btn-primary"><span><?php echo smartyTranslate(array('s'=>'Search','mod'=>'faqs'),$_smarty_tpl);?>
</span></button>
            </div>
            <div class="topic_faqs">
                <div class="title_home_page_fag"><?php echo smartyTranslate(array('s'=>'Faq topics','mod'=>'faqs'),$_smarty_tpl);?>
</div>
                <div class="content_home_page_cat">
                    <?php  $_smarty_tpl->tpl_vars['faqCategory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['faqCategory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['faqCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['faqCategory']->key => $_smarty_tpl->tpl_vars['faqCategory']->value) {
$_smarty_tpl->tpl_vars['faqCategory']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['faqCategory']->value['faqs']) {?>
                        <div class="category_block">
                            <a class="category_name_home_page name_<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['id_gomakoil_faq_category'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 change_item" style="color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['color'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"  href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
.html"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['name'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a>
                            <div class="all_questions">
                                    <?php $_smarty_tpl->tpl_vars['count_fag_in_cat'] = new Smarty_variable(0, null, 0);?>
                                    <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['faqCategory']->value['faqs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
?>
                                        <?php if (($_smarty_tpl->tpl_vars['question']->value['association']&&!$_smarty_tpl->tpl_vars['question']->value['hide_faq'])||!$_smarty_tpl->tpl_vars['question']->value['association']) {?>
                                            <?php $_smarty_tpl->tpl_vars['count_fag_in_cat'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_fag_in_cat']->value+1, null, 0);?>
                                            <?php if (count($_smarty_tpl->tpl_vars['faqCategory']->value['faqs'])>3) {?>
                                                <?php if ($_smarty_tpl->tpl_vars['count_fag_in_cat']->value<=3) {?>
                                                    <a class="questions change_item<?php if ($_smarty_tpl->tpl_vars['question']->value['as_url']) {?> as_url<?php }?>"  >
                                                        <i class="material-icons">&#xE315;</i>
                                                        <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['count_fag_in_cat']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
. <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(strip_tags($_smarty_tpl->tpl_vars['question']->value['question'],'<span>'),'htmlall','UTF-8');?>

                                                    </a>
                                                    <a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['question']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
.html" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                                                    <div class="answer_faq">
                                                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['question']->value['answer'],'htmlall','UTF-8');?>

                                                    </div>
                                                    <?php if ($_smarty_tpl->tpl_vars['count_fag_in_cat']->value=='3') {?>
                                                        <a class="more_faq_cat" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
.html" style="color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['color'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" ><?php echo smartyTranslate(array('s'=>'show more','mod'=>'faqs'),$_smarty_tpl);?>
</a>
                                                    <?php }?>
                                                <?php }?>
                                            <?php } else { ?>
                                                <a class="questions change_item<?php if ($_smarty_tpl->tpl_vars['question']->value['as_url']) {?> as_url<?php }?>" >
                                                    <i class="material-icons">&#xE315;</i>
                                                    <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['count_fag_in_cat']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
. <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(strip_tags($_smarty_tpl->tpl_vars['question']->value['question'],'<span>'),'htmlall','UTF-8');?>

                                                </a>
                                                <a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqCategory']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['question']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
.html" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                                                <div class="answer_faq">
                                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['question']->value['answer'],'htmlall','UTF-8');?>

                                                </div>
                                            <?php }?>
                                        <?php }?>
                                    <?php } ?>
                            </div>
                        </div>
                        <?php }?>
                    <?php } ?>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div id="center_column_fag" class="center_column_fag" >
            <div class="gomakoil_faq_page">
                <?php if ($_smarty_tpl->tpl_vars['questions']->value['content']) {?>

                    <div class="faq faq_cat">
                        <h1 class="title_category_page" style="color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['questions']->value['color'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" > <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['questions']->value['name'],'htmlall','UTF-8');?>
 </h1>
                        <div class="search_faqs">
                            <input type="text" class="search_fag_input" placeholder="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'faqs'),$_smarty_tpl);?>
">
                            <button type="submit" onclick="searchFags($('.search_fag_input').val(), '<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
search/'); return false;" class="button search_fag_submit btn-primary"><span><?php echo smartyTranslate(array('s'=>'Search','mod'=>'faqs'),$_smarty_tpl);?>
</span></button>
                        </div>
                        <?php $_smarty_tpl->tpl_vars['count_question'] = new Smarty_variable(0, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questions']->value['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
?>
                            <?php if (($_smarty_tpl->tpl_vars['question']->value['association']&&!$_smarty_tpl->tpl_vars['question']->value['hide_faq'])||!$_smarty_tpl->tpl_vars['question']->value['association']) {?>
                                <?php $_smarty_tpl->tpl_vars['count_question'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_question']->value+1, null, 0);?>
                                <a class="questions change_item<?php if ($_smarty_tpl->tpl_vars['question']->value['as_url']) {?> as_url<?php }?>"  >
                                    <i class="material-icons">&#xE315;</i>
                                    <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['count_question']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
. <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(strip_tags($_smarty_tpl->tpl_vars['question']->value['question'],'<span>'),'htmlall','UTF-8');?>

                                </a>
                                <a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['category'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['question']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
.html" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                                <div class="answer_faq">
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['question']->value['answer'],'htmlall','UTF-8');?>

                                </div>
                            <?php }?>
                        <?php } ?>
                    </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['search_val']->value) {?>
                    <div class="title_category_page"><?php echo smartyTranslate(array('s'=>'Search','mod'=>'faqs'),$_smarty_tpl);?>
 "<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['search_val']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"</div>
                    <div class="search_faqs">
                        <input type="text" class="search_fag_input" placeholder="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'faqs'),$_smarty_tpl);?>
" value="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['search_val']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
                        <button type="submit" onclick="searchFags($('.search_fag_input').val(), '<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
search/'); return false;"   class="button search_fag_submit btn-primary"><span><?php echo smartyTranslate(array('s'=>'Search','mod'=>'faqs'),$_smarty_tpl);?>
</span></button>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['search']->value) {?>
                        <?php $_smarty_tpl->tpl_vars['count_question'] = new Smarty_variable(0, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['search']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value) {
$_smarty_tpl->tpl_vars['question']->_loop = true;
?>
                            <?php if (($_smarty_tpl->tpl_vars['question']->value['association']&&!$_smarty_tpl->tpl_vars['question']->value['hide_faq'])||!$_smarty_tpl->tpl_vars['question']->value['association']) {?>
                                <?php $_smarty_tpl->tpl_vars['count_question'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_question']->value+1, null, 0);?>
                                <a class="questions change_item<?php if ($_smarty_tpl->tpl_vars['question']->value['as_url']) {?> as_url<?php }?>"  >
                                    <i class="material-icons">&#xE315;</i>
                                    <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['count_question']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
. <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(strip_tags($_smarty_tpl->tpl_vars['question']->value['question'],'<span>'),'htmlall','UTF-8');?>

                                </a>
                                <a href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faqUrl']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['question']->value['link_rewrite_cat'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
/<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['question']->value['link_rewrite'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
.html" class="icon_fag"><i class="material-icons">&#xE157;</i></a><div style="clear: both"></div>
                                <div class="answer_faq">
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['question']->value['answer'],'htmlall','UTF-8');?>

                                </div>
                            <?php }?>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="no_questions"><?php echo smartyTranslate(array('s'=>'No results were found for your search','mod'=>'faqs'),$_smarty_tpl);?>
 "<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['search_val']->value,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
"</div>
                    <?php }?>

                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['faq']->value) {?>
                    <?php if (($_smarty_tpl->tpl_vars['faq']->value['association']&&!$_smarty_tpl->tpl_vars['faq']->value['hide_faq'])||!$_smarty_tpl->tpl_vars['faq']->value['association']) {?>
                        <div class="faq ">
                            <div class="title_faq_page"> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(strip_tags($_smarty_tpl->tpl_vars['faq']->value['question']),'htmlall','UTF-8');?>
 </div>
                            <div class="answer">
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['faq']->value['answer'],'htmlall','UTF-8');?>

                            </div>
                        </div>
                    <?php }?>
                <?php }?>
            </div>
        </div>
    <?php }?>

      </section>
    

    
      <footer class="page-footer">
        
          <!-- Footer content -->
        
      </footer>
    

  </section>


				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayContentWrapperBottom"),$_smarty_tpl);?>

			  </div>
			
		  </div>
		</div>
	  </section>
	  	
		  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFullWidthBottom"),$_smarty_tpl);?>

		  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayWrapperBottom"),$_smarty_tpl);?>

		  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFooterBefore"),$_smarty_tpl);?>

		
		
		  <?php /*  Call merged included template "_partials/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '632367835c322dc732d015-33622115');
content_5c322dc76b1291_82450739($_smarty_tpl);
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
		
			
				<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['slide_lr_column']) {?>
				<div id="switch_left_column_wrap" class="rightbar_wrap hidden-lg-up">
					<a href="javascript:;" id="switch_left_column" data-name="left_column" data-direction="open_column" class="rightbar_tri icon_wrap with_text" title="<?php echo smartyTranslate(array('s'=>'Toggle left column','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><i class="fto-columns"></i><span class="icon_text"><?php echo smartyTranslate(array('s'=>'Left column','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span></a>   
				</div>
				<?php }?>
			
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['bottom']), 0, '632367835c322dc732d015-33622115');
content_5c322dc7393c25_11494800($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>
    
	
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBeforeBodyClosingTag'),$_smarty_tpl);?>

    
  </body>

</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:33:11
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/head.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322dc73387b6_54908353')) {function content_5c322dc73387b6_54908353($_smarty_tpl) {?>

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/stylesheets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stylesheets'=>$_smarty_tpl->tpl_vars['stylesheets']->value), 0, '632367835c322dc732d015-33622115');
content_5c322dc738b553_48394233($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/stylesheets.tpl" */?>



  <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['head'],'vars'=>$_smarty_tpl->tpl_vars['js_custom_vars']->value), 0, '632367835c322dc732d015-33622115');
content_5c322dc7393c25_11494800($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>

<!--st end -->

  <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>


<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['head_code'])&&$_smarty_tpl->tpl_vars['sttheme']->value['head_code']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['head_code'];?>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:33:11
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/stylesheets.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322dc738b553_48394233')) {function content_5c322dc738b553_48394233($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:33:11
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/javascript.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322dc7393c25_11494800')) {function content_5c322dc7393c25_11494800($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:33:11
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-activation.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322dc73fa1a1_10568703')) {function content_5c322dc73fa1a1_10568703($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:33:11
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322dc73fef80_80866963')) {function content_5c322dc73fef80_80866963($_smarty_tpl) {?>

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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:33:11
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/notifications.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322dc74e66b1_54655119')) {function content_5c322dc74e66b1_54655119($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:33:11
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322dc76b1291_82450739')) {function content_5c322dc76b1291_82450739($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/footer-bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '632367835c322dc732d015-33622115');
content_5c322dc76cdb49_75305193($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/footer-bottom.tpl" */?>
</footer><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:33:11
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer-bottom.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c322dc76cdb49_75305193')) {function content_5c322dc76cdb49_75305193($_smarty_tpl) {?>
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
