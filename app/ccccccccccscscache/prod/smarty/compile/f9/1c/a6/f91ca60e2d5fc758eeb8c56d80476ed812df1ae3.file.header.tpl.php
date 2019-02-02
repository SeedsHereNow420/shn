<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:24:30
         compiled from "/var/www/html/SHN/nimda420/themes/new-theme/template/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6745813055c319f1e3b9038-42142842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f91ca60e2d5fc758eeb8c56d80476ed812df1ae3' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/new-theme/template/header.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6745813055c319f1e3b9038-42142842',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'img_dir' => 0,
    'meta_title' => 0,
    'shop_name' => 0,
    'display_header_javascript' => 0,
    'controller_name' => 0,
    'iso_user' => 0,
    'full_language_code' => 0,
    'full_cldr_language_code' => 0,
    'country_iso_code' => 0,
    'round_mode' => 0,
    'shop_context' => 0,
    'token' => 0,
    'currentIndex' => 0,
    'default_language' => 0,
    'link' => 0,
    'tab_modules_list' => 0,
    'css_files' => 0,
    'css_uri' => 0,
    'js_def' => 0,
    'js_files' => 0,
    'displayBackOfficeHeader' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319f1e495210_52540510',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319f1e495210_52540510')) {function content_5c319f1e495210_52540510($_smarty_tpl) {?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.75, maximum-scale=0.75, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="robots" content="NOFOLLOW, NOINDEX">

<link rel="icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
favicon.ico" />
<link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
app_icon.png" />

<title><?php if ($_smarty_tpl->tpl_vars['meta_title']->value!='') {?><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
 • <?php }?><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</title>

<?php if (!isset($_smarty_tpl->tpl_vars['display_header_javascript']->value)||$_smarty_tpl->tpl_vars['display_header_javascript']->value) {?>
  <script type="text/javascript">
    var help_class_name = '<?php echo addcslashes($_smarty_tpl->tpl_vars['controller_name']->value,'\'');?>
';
    var iso_user = '<?php echo addcslashes($_smarty_tpl->tpl_vars['iso_user']->value,'\'');?>
';
    var full_language_code = '<?php echo addcslashes($_smarty_tpl->tpl_vars['full_language_code']->value,'\'');?>
';
    var full_cldr_language_code = '<?php echo addcslashes($_smarty_tpl->tpl_vars['full_cldr_language_code']->value,'\'');?>
';
    var country_iso_code = '<?php echo addcslashes($_smarty_tpl->tpl_vars['country_iso_code']->value,'\'');?>
';
    var _PS_VERSION_ = '<?php echo addcslashes(@constant('_PS_VERSION_'),'\'');?>
';
    var roundMode = <?php echo intval($_smarty_tpl->tpl_vars['round_mode']->value);?>
;
    var youEditFieldFor = '';
    <?php if (isset($_smarty_tpl->tpl_vars['shop_context']->value)) {?>
    <?php if ($_smarty_tpl->tpl_vars['shop_context']->value==Shop::CONTEXT_ALL) {?>
    youEditFieldFor = '<?php echo smartyTranslate(array('s'=>'This field will be modified for all your shops.','js'=>1),$_smarty_tpl);?>
';
    <?php } elseif ($_smarty_tpl->tpl_vars['shop_context']->value==Shop::CONTEXT_GROUP) {?>
    youEditFieldFor = '<?php echo smartyTranslate(array('s'=>'This field will be modified for all shops in this shop group:','js'=>1),$_smarty_tpl);?>
 <b><?php echo addcslashes($_smarty_tpl->tpl_vars['shop_name']->value,'\'');?>
</b>';
    <?php } else { ?>
    youEditFieldFor = '<?php echo smartyTranslate(array('s'=>'This field will be modified for this shop:','js'=>1),$_smarty_tpl);?>
 <b><?php echo addcslashes($_smarty_tpl->tpl_vars['shop_name']->value,'\'');?>
</b>';
    <?php }?>
    <?php }?>
    var new_order_msg = '<?php echo smartyTranslate(array('s'=>'A new order has been placed on your shop.','js'=>1),$_smarty_tpl);?>
';
    var order_number_msg = '<?php echo smartyTranslate(array('s'=>'Order number:','js'=>1),$_smarty_tpl);?>
 ';
    var total_msg = '<?php echo smartyTranslate(array('s'=>'Total:','js'=>1),$_smarty_tpl);?>
 ';
    var from_msg = '<?php echo smartyTranslate(array('s'=>'From:','js'=>1),$_smarty_tpl);?>
 ';
    var see_order_msg = '<?php echo smartyTranslate(array('s'=>'View this order','js'=>1),$_smarty_tpl);?>
';
    var new_customer_msg = '<?php echo smartyTranslate(array('s'=>'A new customer registered on your shop.','js'=>1),$_smarty_tpl);?>
';
    var customer_name_msg = '<?php echo smartyTranslate(array('s'=>'Customer name:','js'=>1),$_smarty_tpl);?>
 ';
    var new_msg = '<?php echo smartyTranslate(array('s'=>'A new message was posted on your shop.','js'=>1),$_smarty_tpl);?>
';
    var see_msg = '<?php echo smartyTranslate(array('s'=>'Read this message','js'=>1),$_smarty_tpl);?>
';
    var token = '<?php echo addslashes($_smarty_tpl->tpl_vars['token']->value);?>
';
    var token_admin_orders = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminOrders'),$_smarty_tpl);?>
';
    var token_admin_customers = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminCustomers'),$_smarty_tpl);?>
';
    var token_admin_customer_threads = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminCustomerThreads'),$_smarty_tpl);?>
';
    var currentIndex = '<?php echo addcslashes($_smarty_tpl->tpl_vars['currentIndex']->value,'\'');?>
';
    var employee_token = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminEmployees'),$_smarty_tpl);?>
';
    var choose_language_translate = '<?php echo smartyTranslate(array('s'=>'Choose language','js'=>1),$_smarty_tpl);?>
';
    var default_language = '<?php echo intval($_smarty_tpl->tpl_vars['default_language']->value);?>
';
    var admin_modules_link = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getAdminLink("AdminModulesSf",true,array('route'=>"admin_module_catalog_post")));?>
';
    var tab_modules_list = '<?php if (isset($_smarty_tpl->tpl_vars['tab_modules_list']->value)&&$_smarty_tpl->tpl_vars['tab_modules_list']->value) {?><?php echo addslashes($_smarty_tpl->tpl_vars['tab_modules_list']->value);?>
<?php }?>';
    var update_success_msg = '<?php echo smartyTranslate(array('s'=>'Update successful','js'=>1),$_smarty_tpl);?>
';
    var errorLogin = '<?php echo smartyTranslate(array('s'=>'PrestaShop was unable to log in to Addons. Please check your credentials and your Internet connection.','js'=>1),$_smarty_tpl);?>
';
    var search_product_msg = '<?php echo smartyTranslate(array('s'=>'Search for a product','js'=>1),$_smarty_tpl);?>
';
  </script>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {?>
  <?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
    <link href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['css_uri']->value,'html','UTF-8');?>
" rel="stylesheet" type="text/css"/>
  <?php } ?>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['js_def']->value)&&count($_smarty_tpl->tpl_vars['js_def']->value)||isset($_smarty_tpl->tpl_vars['js_files']->value)&&count($_smarty_tpl->tpl_vars['js_files']->value))) {?>
  <?php echo $_smarty_tpl->getSubTemplate ((@constant('_PS_ALL_THEMES_DIR_')).("javascript.tpl"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['displayBackOfficeHeader']->value)) {?>
  <?php echo $_smarty_tpl->tpl_vars['displayBackOfficeHeader']->value;?>

<?php }?>
<?php }} ?>
