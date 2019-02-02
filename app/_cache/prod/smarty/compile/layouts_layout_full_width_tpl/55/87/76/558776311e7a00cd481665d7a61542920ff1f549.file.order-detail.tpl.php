<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/order-detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14707967015c2fde35c18046-73157051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '558776311e7a00cd481665d7a61542920ff1f549' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/order-detail.tpl',
      1 => 1513747777,
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
    '8bd7171a99f3c9812a4ab42df45d0a194c7994db' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/_partials/order-detail-return.tpl',
      1 => 1513579246,
      2 => 'file',
    ),
    'caddda551120aba601fd1a5cd98f1d2a005165f8' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/customer/_partials/order-detail-no-return.tpl',
      1 => 1513579246,
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
  'nocache_hash' => '14707967015c2fde35c18046-73157051',
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
  'unifunc' => 'content_5c2fde35e20955_28330191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fde35e20955_28330191')) {function content_5c2fde35e20955_28330191($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
?><!doctype html>
<html lang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8');?>
">

  <head>
	
	  <?php /*  Call merged included template "_partials/head.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35c32654_32035105($_smarty_tpl);
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('catalog/_partials/product-activation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35c667d3_43153386($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "catalog/_partials/product-activation.tpl" */?>
	  
	  <div class="header-container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_header']) {?> transparent-header <?php }?> <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_mobile_header']) {?> transparent-mobile-header <?php }?>">
	  <header id="st_header" class="animated fast">
		
		  <?php /*  Call merged included template "_partials/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35c6b745_39443105($_smarty_tpl);
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
          
  <?php echo smartyTranslate(array('s'=>'Order details','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>


        </h3>
      
    

    
  <section id="content" class="page-content row">
    <div class="col-lg-3 hidden-md-down my_account_left_column">
    	
		    <?php /*  Call merged included template "customer/_partials/my-account-nav.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('customer/_partials/my-account-nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35ce5cc2_05179907($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "customer/_partials/my-account-nav.tpl" */?>
	    
    </div>
    <div class="col-lg-9">
    	
	    	
			    <?php /*  Call merged included template "_partials/notifications.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/notifications.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35cb6733_88554527($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/notifications.tpl" */?>
			 
	    
	    
  
    <div id="order-infos">
      <div class="box">
          <div class="row">
            <div class="col-<?php if ($_smarty_tpl->tpl_vars['order']->value['details']['reorder_url']) {?>9<?php } else { ?>12<?php }?> fs_lg heading_color">
                <?php echo smartyTranslate(array('s'=>'Order Reference %reference% - placed on %date%','d'=>'Shop.Theme.Customeraccount','sprintf'=>array('%reference%'=>$_smarty_tpl->tpl_vars['order']->value['details']['reference'],'%date%'=>$_smarty_tpl->tpl_vars['order']->value['details']['order_date'])),$_smarty_tpl);?>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['order']->value['details']['reorder_url']) {?>
              <div class="col-3 text-right">
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['details']['reorder_url'], ENT_QUOTES, 'UTF-8');?>
" class="go" title="<?php echo smartyTranslate(array('s'=>'Reorder','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Reorder','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
              </div>
            <?php }?>
            <div class="clearfix"></div>
          </div>
      </div>

      <div class="box">
          <ul>
            <li><span class="heading_color"><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
:</span> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['carrier']['name'], ENT_QUOTES, 'UTF-8');?>
</li>
            <li><span class="heading_color"><?php echo smartyTranslate(array('s'=>'Payment method','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
:</span> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['details']['payment'], ENT_QUOTES, 'UTF-8');?>
</li>

            <?php if ($_smarty_tpl->tpl_vars['order']->value['details']['invoice_url']) {?>
              <li>
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['details']['invoice_url'], ENT_QUOTES, 'UTF-8');?>
" class="go" title="<?php echo smartyTranslate(array('s'=>'Download your invoice as a PDF file.','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
">
                  <?php echo smartyTranslate(array('s'=>'Download your invoice as a PDF file.','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

                </a>
              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['order']->value['details']['recyclable']) {?>
              <li>
                <?php echo smartyTranslate(array('s'=>'You have given permission to receive your order in recycled packaging.','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

              </li>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['order']->value['details']['gift_message']) {?>
              <li><?php echo smartyTranslate(array('s'=>'You have requested gift wrapping for this order.','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
</li>
              <li><?php echo smartyTranslate(array('s'=>'Message','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value['details']['gift_message'];?>
</li>
            <?php }?>
          </ul>
      </div>
    </div>
  

  
    <section id="order-history" class="box">
      <h6 class="page_heading"><?php echo smartyTranslate(array('s'=>'Follow your order\'s status step-by-step','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
</h6>
      <table class="table  table-bordered table-labeled hidden-xs-down">
        <thead>
          <tr>
            <th><?php echo smartyTranslate(array('s'=>'Date','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
</th>
            <th><?php echo smartyTranslate(array('s'=>'Status','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
</th>
          </tr>
        </thead>
        <tbody>
          <?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
            <tr>
              <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['state']->value['history_date'], ENT_QUOTES, 'UTF-8');?>
</td>
              <td>
                <span class="badge badge-default <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['state']->value['contrast'], ENT_QUOTES, 'UTF-8');?>
" style="background-color:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['state']->value['color'], ENT_QUOTES, 'UTF-8');?>
">
                  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['state']->value['ostate_name'], ENT_QUOTES, 'UTF-8');?>

                </span>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="hidden-sm-up base_list_line medium_list">
        <?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
          <div class="line_item">
            <div class="date"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['state']->value['history_date'], ENT_QUOTES, 'UTF-8');?>
</div>
            <div class="state">
              <span class="badge badge-default <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['state']->value['contrast'], ENT_QUOTES, 'UTF-8');?>
" style="background-color:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['state']->value['color'], ENT_QUOTES, 'UTF-8');?>
">
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['state']->value['ostate_name'], ENT_QUOTES, 'UTF-8');?>

              </span>
            </div>
          </div>
        <?php } ?>
      </div>
    </section>
  

  <?php if ($_smarty_tpl->tpl_vars['order']->value['follow_up']) {?>
    <div class="box">
      <p><?php echo smartyTranslate(array('s'=>'Click the following link to track the delivery of your order','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
</p>
      <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['follow_up'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['follow_up'], ENT_QUOTES, 'UTF-8');?>
</a>
    </div>
  <?php }?>

  
    <div class="addresses row">
      <?php if ($_smarty_tpl->tpl_vars['order']->value['addresses']['delivery']) {?>
        <div class="col-lg-6 col-md-6">
          <article id="delivery-address" class="pad_10 general_border mb-4">
            <div class="heading_color"><?php echo smartyTranslate(array('s'=>'Delivery address %alias%','d'=>'Shop.Theme.Checkout','sprintf'=>array('%alias%'=>$_smarty_tpl->tpl_vars['order']->value['addresses']['delivery']['alias'])),$_smarty_tpl);?>
</div>
            <address><?php echo $_smarty_tpl->tpl_vars['order']->value['addresses']['delivery']['formatted'];?>
</address>
          </article>
        </div>
      <?php }?>

      <div class="col-lg-6 col-md-6">
        <article id="invoice-address" class="pad_10 general_border mb-4">
          <div class="heading_color"><?php echo smartyTranslate(array('s'=>'Invoice address %alias%','d'=>'Shop.Theme.Checkout','sprintf'=>array('%alias%'=>$_smarty_tpl->tpl_vars['order']->value['addresses']['invoice']['alias'])),$_smarty_tpl);?>
</div>
          <address><?php echo $_smarty_tpl->tpl_vars['order']->value['addresses']['invoice']['formatted'];?>
</address>
        </article>
      </div>
    </div>
  

  <?php echo $_smarty_tpl->tpl_vars['HOOK_DISPLAYORDERDETAIL']->value;?>


  
    <?php if ($_smarty_tpl->tpl_vars['order']->value['details']['is_returnable']) {?>
      <?php /*  Call merged included template "customer/_partials/order-detail-return.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('customer/_partials/order-detail-return.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35d19e91_59884785($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "customer/_partials/order-detail-return.tpl" */?>
    <?php } else { ?>
      <?php /*  Call merged included template "customer/_partials/order-detail-no-return.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('customer/_partials/order-detail-no-return.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35d62183_52018490($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "customer/_partials/order-detail-no-return.tpl" */?>
    <?php }?>
  

  
    <?php if ($_smarty_tpl->tpl_vars['order']->value['shipping']) {?>
      <div class="box">
        <table class="table  table-bordered hidden-sm-down">
          <thead>
            <tr>
              <th><?php echo smartyTranslate(array('s'=>'Date','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
</th>
              <th><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</th>
              <th><?php echo smartyTranslate(array('s'=>'Weight','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</th>
              <th><?php echo smartyTranslate(array('s'=>'Shipping cost','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</th>
              <th><?php echo smartyTranslate(array('s'=>'Tracking number','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</th>
            </tr>
          </thead>
          <tbody>
            <?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['shipping']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
              <tr>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['shipping_date'], ENT_QUOTES, 'UTF-8');?>
</td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['carrier_name'], ENT_QUOTES, 'UTF-8');?>
</td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['shipping_weight'], ENT_QUOTES, 'UTF-8');?>
</td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['shipping_cost'], ENT_QUOTES, 'UTF-8');?>
</td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['tracking'], ENT_QUOTES, 'UTF-8');?>
</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <div class="hidden-md-up shipping-lines base_list_line medium_list">
          <?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['shipping']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
              <ul class="shipping-line line_item mb-0">
                <li>
                  <strong><?php echo smartyTranslate(array('s'=>'Date','d'=>'Shop.Theme.Global'),$_smarty_tpl);?>
</strong> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['shipping_date'], ENT_QUOTES, 'UTF-8');?>

                </li>
                <li>
                  <strong><?php echo smartyTranslate(array('s'=>'Carrier','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</strong> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['carrier_name'], ENT_QUOTES, 'UTF-8');?>

                </li>
                <li>
                  <strong><?php echo smartyTranslate(array('s'=>'Weight','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</strong> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['shipping_weight'], ENT_QUOTES, 'UTF-8');?>

                </li>
                <li>
                  <strong><?php echo smartyTranslate(array('s'=>'Shipping cost','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</strong> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['shipping_cost'], ENT_QUOTES, 'UTF-8');?>

                </li>
                <li>
                  <strong><?php echo smartyTranslate(array('s'=>'Tracking number','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</strong> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['tracking'], ENT_QUOTES, 'UTF-8');?>

                </li>
              </ul>
          <?php } ?>
        </div>
      </div>
    <?php }?>
  

  
  

        
            <?php /*  Call merged included template "customer/_partials/my-account-links.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('customer/_partials/my-account-links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35d99e64_70716577($_smarty_tpl);
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35ddd850_37150857($_smarty_tpl);
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['bottom']), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35c50567_80168714($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>
    
	
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayBeforeBodyClosingTag'),$_smarty_tpl);?>

    
  </body>

</html>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/head.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35c32654_32035105')) {function content_5c2fde35c32654_32035105($_smarty_tpl) {?>

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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/stylesheets.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('stylesheets'=>$_smarty_tpl->tpl_vars['stylesheets']->value), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35c47951_85780240($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/stylesheets.tpl" */?>



  <?php /*  Call merged included template "_partials/javascript.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("_partials/javascript.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('javascript'=>$_smarty_tpl->tpl_vars['javascript']->value['head'],'vars'=>$_smarty_tpl->tpl_vars['js_custom_vars']->value), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35c50567_80168714($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/javascript.tpl" */?>

<!--st end -->

  <?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>


<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['head_code'])&&$_smarty_tpl->tpl_vars['sttheme']->value['head_code']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['head_code'];?>
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/stylesheets.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35c47951_85780240')) {function content_5c2fde35c47951_85780240($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/javascript.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35c50567_80168714')) {function content_5c2fde35c50567_80168714($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/catalog/_partials/product-activation.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35c667d3_43153386')) {function content_5c2fde35c667d3_43153386($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35c6b745_39443105')) {function content_5c2fde35c6b745_39443105($_smarty_tpl) {?>

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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/notifications.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35cb6733_88554527')) {function content_5c2fde35cb6733_88554527($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/my-account-nav.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35ce5cc2_05179907')) {function content_5c2fde35ce5cc2_05179907($_smarty_tpl) {?>
    <div class="list-group mb-3">

	    <?php /*  Call merged included template "customer/_partials/my-account-items.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('customer/_partials/my-account-items.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35ce6871_23761975($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "customer/_partials/my-account-items.tpl" */?>
            <div class="list-group-item">
            <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'index','params'=>array('mylogout'=>'')),$_smarty_tpl);?>
" class="sign-out-link" title="<?php echo smartyTranslate(array('s'=>'Sign out','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-logout-1 mar_r4 fs_lg"></i><?php echo smartyTranslate(array('s'=>'Sign out','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
            </div>

	</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/my-account-items.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35ce6871_23761975')) {function content_5c2fde35ce6871_23761975($_smarty_tpl) {?>
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/order-detail-return.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35d19e91_59884785')) {function content_5c2fde35d19e91_59884785($_smarty_tpl) {?>

<form id="order-return-form" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['order_follow'], ENT_QUOTES, 'UTF-8');?>
" method="post">

<div class="box hidden-sm-down">
  <table id="order-products" class="table table-bordered return">
    <thead>
      <tr>
        <th class="head-checkbox"><input type="checkbox"/></th>
        <th><?php echo smartyTranslate(array('s'=>'Product','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Quantity','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Returned','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Unit price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Total price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</th>
      </tr>
    </thead>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
      <tr>
        <td>
          <?php if (!$_smarty_tpl->tpl_vars['product']->value['customizations']) {?>
            <span id="_desktop_product_line_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
">
              <input type="checkbox" id="cb_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
" name="ids_order_detail[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
">
            </span>
          <?php } else { ?>
            <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
              <span id="_desktop_product_customization_line_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
">
                <input type="checkbox" id="cb_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
" name="customization_ids[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
][]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
">
              </span>
            <?php } ?>
          <?php }?>
        </td>
        <td>
          <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
<br/>
          <?php if ($_smarty_tpl->tpl_vars['product']->value['reference']) {?>
            <?php echo smartyTranslate(array('s'=>'Reference','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');?>
<br/>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['product']->value['customizations']) {?>
            <?php  $_smarty_tpl->tpl_vars["customization"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["customization"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["customization"]->key => $_smarty_tpl->tpl_vars["customization"]->value) {
$_smarty_tpl->tpl_vars["customization"]->_loop = true;
?>
              <div class="customization">
                <a href="#" data-toggle="modal" data-target="#product-customizations-modal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
" data-backdrop=false><?php echo smartyTranslate(array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</a>
              </div>
              <div id="_desktop_product_customization_modal_wrapper_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
">
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
              </div>
            <?php } ?>
          <?php }?>
        </td>
        <td class="qty">
          <?php if (!$_smarty_tpl->tpl_vars['product']->value['customizations']) {?>
            <div class="current">
              <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>

            </div>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['quantity']>$_smarty_tpl->tpl_vars['product']->value['qty_returned']) {?>
              <div class="select" id="_desktop_return_qty_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
">
                <select name="order_qte_input[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
]" class="form-control form-control-select">
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['name'] = 'quantity';
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['product']->value['quantity']+1-$_smarty_tpl->tpl_vars['product']->value['qty_returned']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['total']);
?>
                    <option value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['section']['quantity']['index'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['section']['quantity']['index'], ENT_QUOTES, 'UTF-8');?>
</option>
                  <?php endfor; endif; ?>
                </select>
              </div>
            <?php }?>
          <?php } else { ?>
            <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
               <div class="current">
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['quantity'], ENT_QUOTES, 'UTF-8');?>

              </div>
              <div class="select" id="_desktop_return_qty_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
">
                <select
                  name="customization_qty_input[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
]"
                  class="form-control form-control-select"
                >
                  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['name'] = 'quantity';
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'] = (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['customization']->value['quantity']+1) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['quantity']['total']);
?>
                    <option value="<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['section']['quantity']['index'], ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['section']['quantity']['index'], ENT_QUOTES, 'UTF-8');?>
</option>
                  <?php endfor; endif; ?>
                </select>
              </div>
            <?php } ?>
            <div class="clearfix"></div>
          <?php }?>
        </td>
        <td class="text-right"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['qty_returned'], ENT_QUOTES, 'UTF-8');?>
</td>
        <td class="text-right price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</td>
        <td class="text-right price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['total'], ENT_QUOTES, 'UTF-8');?>
</td>
      </tr>
    <?php } ?>
    <tfoot>
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayCartRuleOrderDetailReturn",'order'=>$_smarty_tpl->tpl_vars['order']->value['details']),$_smarty_tpl);?>

                                <?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['subtotals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['line']->value['value']) {?>
          <tr class="text-right line-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['type'], ENT_QUOTES, 'UTF-8');?>
">
            <td colspan="5"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['label'], ENT_QUOTES, 'UTF-8');?>
</td>
            <td colspan="2" class="price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['value'], ENT_QUOTES, 'UTF-8');?>
</td>
          </tr>
        <?php }?>
      <?php } ?>
      <tr class="text-right line-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['totals']['total']['type'], ENT_QUOTES, 'UTF-8');?>
">
        <td colspan="5"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
</td>
        <td colspan="2" class="price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</td>
      </tr>
    </tfoot>
  </table>
</div>

<div class="order-items hidden-md-up box base_list_line medium_list">
  <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
    <div class="order-item line_item">
      <div class="row">
        <div class="checkbox">
          <?php if (!$_smarty_tpl->tpl_vars['product']->value['customizations']) {?>
            <span id="_mobile_product_line_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
"></span>
          <?php } else { ?>
            <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
              <span id="_mobile_product_customization_line_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
"></span>
            <?php } ?>
          <?php }?>
        </div>
        <div class="content">
          <div class="row">
            <div class="col-sm-5 desc">
              <div class="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</div>
              <?php if ($_smarty_tpl->tpl_vars['product']->value['reference']) {?>
                <div class="ref"><?php echo smartyTranslate(array('s'=>'Reference','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');?>
</div>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['product']->value['customizations']) {?>
                <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
                  <div class="customization">
                    <a href="#" data-toggle="modal" data-target="#product-customizations-modal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</a>
                  </div>
                  <div id="_mobile_product_customization_modal_wrapper_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
">
                  </div>
                <?php } ?>
              <?php }?>
            </div>
            <div class="col-sm-7 qty">
              <div class="row">
                <div class="col-4 text-sm-left text-1">
                  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>

                </div>
                <div class="col-4">
                  <?php if ($_smarty_tpl->tpl_vars['product']->value['customizations']) {?>
                    <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
                      <div class="q"><?php echo smartyTranslate(array('s'=>'Quantity','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
</div>
                      <div class="s" id="_mobile_return_qty_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
"></div>
                    <?php } ?>
                  <?php } else { ?>
                    <div class="q"><?php echo smartyTranslate(array('s'=>'Quantity','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>
</div>
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['quantity']>$_smarty_tpl->tpl_vars['product']->value['qty_returned']) {?>
                      <div class="s" id="_mobile_return_qty_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_order_detail'], ENT_QUOTES, 'UTF-8');?>
"></div>
                    <?php }?>
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['product']->value['qty_returned']>0) {?>
                    <div><?php echo smartyTranslate(array('s'=>'Returned','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['qty_returned'], ENT_QUOTES, 'UTF-8');?>
</div>
                  <?php }?>
                </div>
                <div class="col-4 text-right">
                  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['total'], ENT_QUOTES, 'UTF-8');?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<div class="order-totals hidden-md-up box">
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayCartRuleOrderDetailReturn",'order'=>$_smarty_tpl->tpl_vars['order']->value['details']),$_smarty_tpl);?>

                                <?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['subtotals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['line']->value['value']) {?>
      <div class="order-total row">
        <div class="col-8"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['label'], ENT_QUOTES, 'UTF-8');?>
</strong></div>
        <div class="col-4 text-right"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['value'], ENT_QUOTES, 'UTF-8');?>
</div>
      </div>
    <?php }?>
  <?php } ?>
  <div class="order-total row">
    <div class="col-8"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
</strong></div>
    <div class="col-4 text-right"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</div>
  </div>
</div>

<div class="box">
  <h6 class="page_heading"><?php echo smartyTranslate(array('s'=>'Merchandise return','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
</h6>
  <p><?php echo smartyTranslate(array('s'=>'If you wish to return one or more products, please mark the corresponding boxes and provide an explanation for the return. When complete, click the button below.','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
</p>
  <section class="form-fields">
    <div class="form-group">
      <textarea cols="67" rows="3" name="returnText" class="form-control"></textarea>
    </div>
  </section>
  <footer class="form-footer">
    <input type="hidden" name="id_order" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['details']['id'], ENT_QUOTES, 'UTF-8');?>
">
    <button class="form-control-submit btn btn-default" type="submit" name="submitReturnMerchandise">
      <?php echo smartyTranslate(array('s'=>'Request a return','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

    </button>
  </footer>
</div>

</form>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/order-detail-no-return.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35d62183_52018490')) {function content_5c2fde35d62183_52018490($_smarty_tpl) {?>

<div class="box hidden-sm-down">
  <table id="order-products" class="table table-bordered">
    <thead>
      <tr>
        <th><?php echo smartyTranslate(array('s'=>'Product','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Quantity','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Unit price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</th>
        <th><?php echo smartyTranslate(array('s'=>'Total price','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</th>
      </tr>
    </thead>
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
      <tr>
        <td>
          <strong>
            <a <?php if (isset($_smarty_tpl->tpl_vars['product']->value['download_link'])) {?>href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['download_link'], ENT_QUOTES, 'UTF-8');?>
"<?php }?>>
              <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>

            </a>
          </strong><br/>
          <?php if ($_smarty_tpl->tpl_vars['product']->value['reference']) {?>
            <?php echo smartyTranslate(array('s'=>'Reference','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');?>
<br/>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['product']->value['customizations']) {?>
            <?php  $_smarty_tpl->tpl_vars["customization"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["customization"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["customization"]->key => $_smarty_tpl->tpl_vars["customization"]->value) {
$_smarty_tpl->tpl_vars["customization"]->_loop = true;
?>
              <div class="customization">
                <a href="#" data-toggle="modal" data-target="#product-customizations-modal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
" data-backdrop=false><?php echo smartyTranslate(array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</a>
              </div>
              <div id="_desktop_product_customization_modal_wrapper_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
">
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
              </div>
            <?php } ?>
          <?php }?>
        </td>
        <td>
          <?php if ($_smarty_tpl->tpl_vars['product']->value['customizations']) {?>
            <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
              <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['quantity'], ENT_QUOTES, 'UTF-8');?>

            <?php } ?>
          <?php } else { ?>
            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>

          <?php }?>
        </td>
        <td class="text-right price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>
</td>
        <td class="text-right price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['total'], ENT_QUOTES, 'UTF-8');?>
</td>
      </tr>
    <?php } ?>
    <tfoot>
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayCartRuleOrderDetailNoReturn",'order'=>$_smarty_tpl->tpl_vars['order']->value['details']),$_smarty_tpl);?>

                                <?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['subtotals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['line']->value['value']) {?>
          <tr class="text-right line-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['type'], ENT_QUOTES, 'UTF-8');?>
">
            <td colspan="3"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['label'], ENT_QUOTES, 'UTF-8');?>
</td>
            <td class="price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['value'], ENT_QUOTES, 'UTF-8');?>
</td>
          </tr>
        <?php }?>
      <?php } ?>
      <tr class="text-right line-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['totals']['total']['type'], ENT_QUOTES, 'UTF-8');?>
">
        <td colspan="3"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
</td>
        <td class="price"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</td>
      </tr>
    </tfoot>
  </table>
</div>

<div class="order-items hidden-md-up box base_list_line medium_list">
  <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
    <div class="order-item line_item">
      <div class="row">
        <div class="col-sm-5 desc">
          <div class="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8');?>
</div>
          <?php if ($_smarty_tpl->tpl_vars['product']->value['reference']) {?>
            <div class="ref"><?php echo smartyTranslate(array('s'=>'Reference','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reference'], ENT_QUOTES, 'UTF-8');?>
</div>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['product']->value['customizations']) {?>
            <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
              <div class="customization">
                <a href="#" data-toggle="modal" data-target="#product-customizations-modal-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Product customization','d'=>'Shop.Theme.Catalog'),$_smarty_tpl);?>
</a>
              </div>
              <div id="_mobile_product_customization_modal_wrapper_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['id_customization'], ENT_QUOTES, 'UTF-8');?>
">
              </div>
            <?php } ?>
          <?php }?>
        </div>
        <div class="col-sm-7 qty">
          <div class="row">
            <div class="col-4 text-sm-left text-1">
              <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['price'], ENT_QUOTES, 'UTF-8');?>

            </div>
            <div class="col-4">
              <?php if ($_smarty_tpl->tpl_vars['product']->value['customizations']) {?>
                <?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value['customizations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
?>
                  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customization']->value['quantity'], ENT_QUOTES, 'UTF-8');?>

                <?php } ?>
              <?php } else { ?>
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['quantity'], ENT_QUOTES, 'UTF-8');?>

              <?php }?>
            </div>
            <div class="col-4 text-right">
              <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['total'], ENT_QUOTES, 'UTF-8');?>

            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<div class="order-totals hidden-md-up box">
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayCartRuleOrderDetailNoReturn",'order'=>$_smarty_tpl->tpl_vars['order']->value['details']),$_smarty_tpl);?>

                                <?php  $_smarty_tpl->tpl_vars['line'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['line']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['subtotals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['line']->key => $_smarty_tpl->tpl_vars['line']->value) {
$_smarty_tpl->tpl_vars['line']->_loop = true;
?>
    <?php if ($_smarty_tpl->tpl_vars['line']->value['value']) {?>
      <div class="order-total row">
        <div class="col-8"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['label'], ENT_QUOTES, 'UTF-8');?>
</strong></div>
        <div class="col-4 text-right"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['line']->value['value'], ENT_QUOTES, 'UTF-8');?>
</div>
      </div>
    <?php }?>
  <?php } ?>
  <div class="order-total row">
    <div class="col-8"><strong><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['totals']['total']['label'], ENT_QUOTES, 'UTF-8');?>
</strong></div>
    <div class="col-4 text-right"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['totals']['total']['value'], ENT_QUOTES, 'UTF-8');?>
</div>
  </div>
</div>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/customer/_partials/my-account-links.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35d99e64_70716577')) {function content_5c2fde35d99e64_70716577($_smarty_tpl) {?>

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
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35ddd850_37150857')) {function content_5c2fde35ddd850_37150857($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/var/www/html/SHN/vendor/prestashop/smarty/plugins/modifier.replace.php';
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
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('_partials/footer-bottom.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '14707967015c2fde35c18046-73157051');
content_5c2fde35dfae76_10981857($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "_partials/footer-bottom.tpl" */?>
</footer><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 14:29:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/_partials/footer-bottom.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5c2fde35dfae76_10981857')) {function content_5c2fde35dfae76_10981857($_smarty_tpl) {?>
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
