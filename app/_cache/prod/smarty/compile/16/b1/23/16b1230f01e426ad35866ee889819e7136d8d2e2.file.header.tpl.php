<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 08:10:11
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13452385215c2f85634bf220-94133190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16b1230f01e426ad35866ee889819e7136d8d2e2' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/header.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13452385215c2f85634bf220-94133190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'iso' => 0,
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
    'brightness' => 0,
    'display_header' => 0,
    'employee' => 0,
    'collapse_menu' => 0,
    'default_tab_link' => 0,
    'quick_access' => 0,
    'quick' => 0,
    'matchQuickLink' => 0,
    'quick_access_current_link_name' => 0,
    'quick_access_current_link_icon' => 0,
    'host_mode' => 0,
    'login_link' => 0,
    'show_new_orders' => 0,
    'show_new_customers' => 0,
    'show_new_messages' => 0,
    'active' => 0,
    'no_order_tip' => 0,
    'no_customer_tip' => 0,
    'no_customer_message_tip' => 0,
    'base_url' => 0,
    'debug_mode' => 0,
    'maintenance_mode' => 0,
    'is_multishop' => 0,
    'shop_list' => 0,
    'multishop_context' => 0,
    'displayBackOfficeTop' => 0,
    'bootstrap' => 0,
    'page_header_toolbar' => 0,
    'current_tab_level' => 0,
    'modal_module_list' => 0,
    'install_dir_exists' => 0,
    'lite_display' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2f85635b08d1_93776270',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2f85635b08d1_93776270')) {function content_5c2f85635b08d1_93776270($_smarty_tpl) {?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js lt-ie9 lt-ie8 lt-ie7 lt-ie6"> <![endif]-->
<!--[if IE 7]>    <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js lt-ie9 lt-ie8 ie7"> <![endif]-->
<!--[if IE 8]>    <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if gt IE 8]> <html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
" class="no-js ie9"> <![endif]-->
<html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
">
<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=0.75, maximum-scale=0.75, user-scalable=0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
favicon.ico" />
	<link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
app_icon.png" />

	<meta name="robots" content="NOFOLLOW, NOINDEX">
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
<?php if (isset($_smarty_tpl->tpl_vars['shop_context']->value)) {?>
	<?php if ($_smarty_tpl->tpl_vars['shop_context']->value==Shop::CONTEXT_ALL) {?>
		var youEditFieldFor = '<?php echo smartyTranslate(array('s'=>'This field will be modified for all your shops.','js'=>1),$_smarty_tpl);?>
';
	<?php } elseif ($_smarty_tpl->tpl_vars['shop_context']->value==Shop::CONTEXT_GROUP) {?>
		var youEditFieldFor = '<?php echo smartyTranslate(array('s'=>'This field will be modified for all shops in this shop group:','js'=>1),$_smarty_tpl);?>
 <b><?php echo addcslashes($_smarty_tpl->tpl_vars['shop_name']->value,'\'');?>
</b>';
	<?php } else { ?>
		var youEditFieldFor = '<?php echo smartyTranslate(array('s'=>'This field will be modified for this shop:','js'=>1),$_smarty_tpl);?>
 <b><?php echo addcslashes($_smarty_tpl->tpl_vars['shop_name']->value,'\'');?>
</b>';
	<?php }?>
<?php } else { ?>
		var youEditFieldFor = '';
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
		var customer_name_msg = '<?php echo smartyTranslate(array('s'=>'register','js'=>1),$_smarty_tpl);?>
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
	<?php if (isset($_smarty_tpl->tpl_vars['brightness']->value)) {?>
	<!--
		// @todo: multishop color
		<style type="text/css">
			div#header_infos, div#header_infos a#header_shopname, div#header_infos a#header_logout, div#header_infos a#header_foaccess {color:<?php echo $_smarty_tpl->tpl_vars['brightness']->value;?>
}
		</style>
	-->
	<?php }?>
</head>

<?php if ($_smarty_tpl->tpl_vars['display_header']->value) {?>
	<body class="ps_back-office<?php if ($_smarty_tpl->tpl_vars['employee']->value->bo_menu) {?> page-sidebar<?php if ($_smarty_tpl->tpl_vars['collapse_menu']->value) {?> page-sidebar-closed<?php }?><?php } else { ?> page-topbar<?php }?> <?php echo strtolower($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['controller']));?>
">
	
	<header id="header" class="bootstrap">
		<nav id="header_infos" role="navigation">
			<div class="navbar-header">
				<button id="header_nav_toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-primary">
					<i class="icon-reorder"></i>
				</button>

				
				<a id="header_logo" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['default_tab_link']->value,'html','UTF-8');?>
">
				</a>

				
				<?php if (count($_smarty_tpl->tpl_vars['quick_access']->value)>=0) {?>
					<ul id="header_quick">
						<li class="dropdown">
							<a href="javascript:void(0)" id="quick_select" class="dropdown-toggle" data-toggle="dropdown"><?php echo smartyTranslate(array('s'=>'Quick Access','d'=>'Admin.Navigation.Header'),$_smarty_tpl);?>
 <i class="icon-caret-down"></i></a>
							<ul class="dropdown-menu">
								<?php  $_smarty_tpl->tpl_vars['quick'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['quick']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['quick_access']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['quick']->key => $_smarty_tpl->tpl_vars['quick']->value) {
$_smarty_tpl->tpl_vars['quick']->_loop = true;
?>
									<li <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['quick']->value['link'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['link']->value->matchQuickLink($_tmp1)) {?><?php $_smarty_tpl->tpl_vars["matchQuickLink"] = new Smarty_variable($_smarty_tpl->tpl_vars['quick']->value['id_quick_access'], null, 0);?>class="active"<?php }?>>
										<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['quick']->value['link'],'html','UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['quick']->value['new_window']) {?>target="_blank"<?php }?>>
											<?php if (isset($_smarty_tpl->tpl_vars['quick']->value['icon'])) {?>
												<i class="icon-<?php echo $_smarty_tpl->tpl_vars['quick']->value['icon'];?>
 icon-fw"></i>
											<?php } else { ?>
												<i class="icon-chevron-right icon-fw"></i>
											<?php }?>
											<?php echo $_smarty_tpl->tpl_vars['quick']->value['name'];?>

										</a>
									</li>
								<?php } ?>
								<li class="divider"></li>
								<?php if (isset($_smarty_tpl->tpl_vars['matchQuickLink']->value)) {?>
									<li>
										<a href="javascript:void(0);" class="ajax-quick-link" data-method="remove" data-quicklink-id="<?php echo $_smarty_tpl->tpl_vars['matchQuickLink']->value;?>
">
											<i class="icon-minus-circle"></i>
											<?php echo smartyTranslate(array('s'=>'Remove from QuickAccess'),$_smarty_tpl);?>

										</a>
									</li>
								<?php } else { ?>
                  <li>
                    <a href="javascript:void(0);" class="ajax-quick-link" data-method="add">
                      <i class="icon-plus-circle"></i>
                      <?php echo smartyTranslate(array('s'=>'Add current page to QuickAccess'),$_smarty_tpl);?>

                    </a>
                  </li>
                <?php }?>
                <li>
                  <a href="<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getAdminLink("AdminQuickAccesses"));?>
">
                    <i class="icon-cog"></i>
                    <?php echo smartyTranslate(array('s'=>'Manage quick accesses'),$_smarty_tpl);?>

                  </a>
                </li>
							</ul>
						</li>
					</ul>
					<?php $_smarty_tpl->tpl_vars['quick_access_current_link_name'] = new Smarty_variable(explode(" - ",$_smarty_tpl->tpl_vars['quick_access_current_link_name']->value), null, 0);?>
					<script>
						$(function() {
							$('.ajax-quick-link').on('click', function(e){
								e.preventDefault();

								var method = $(this).data('method');

								if(method == 'add')
									var name = prompt('<?php echo smartyTranslate(array('s'=>'Please name this shortcut:','js'=>1),$_smarty_tpl);?>
', '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['quick_access_current_link_name']->value[0],32);?>
');

								if(method == 'add' && name || method == 'remove')
								{
									$.ajax({
										type: 'POST',
										headers: { "cache-control": "no-cache" },
										async: false,
										url: "<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminQuickAccesses');?>
" + "&action=GetUrl" + "&rand=<?php echo rand(1,200);?>
" + "&ajax=1" + "&method=" + method + ( $(this).data('quicklink-id') ? "&id_quick_access=" + $(this).data('quicklink-id') : ""),
										data: {
											"url": "<?php echo $_smarty_tpl->tpl_vars['link']->value->getQuickLink($_SERVER['REQUEST_URI']);?>
",
											"name": name,
											"icon": "<?php echo $_smarty_tpl->tpl_vars['quick_access_current_link_icon']->value;?>
"
										},
										dataType: "json",
										success: function(data) {
											var quicklink_list ='';
											$.each(data, function(index,value){
												if (typeof data[index]['name'] !== 'undefined')
													quicklink_list += '<li><a href="' + data[index]['link'] + '&token=' + data[index]['token'] + '"><i class="icon-chevron-right"></i> ' + data[index]['name'] + '</a></li>';
											});

											if (typeof data['has_errors'] !== 'undefined' && data['has_errors'])
												$.each(data, function(index, value)
												{
													if (typeof data[index] == 'string')
														$.growl.error({ title: "", message: data[index]});
												});
											else if (quicklink_list)
											{
												$("#header_quick ul.dropdown-menu").html(quicklink_list);
												showSuccessMessage(update_success_msg);
											}
										}
									});
								}
							});
						});
					</script>
				<?php }?>

				
				<?php echo $_smarty_tpl->getSubTemplate ("search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('show_clear_btn'=>1), 0);?>


				
				<ul id="header_employee_box">
					<li id="employee_infos" class="dropdown hidden-xs">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminEmployees'),'html','UTF-8');?>
&amp;id_employee=<?php echo intval($_smarty_tpl->tpl_vars['employee']->value->id);?>
&amp;updateemployee" class="employee_name dropdown-toggle" data-toggle="dropdown">
							<span class="employee_avatar_small">
                <img class="imgm img-thumbnail" alt="" src="<?php echo $_smarty_tpl->tpl_vars['employee']->value->getImage();?>
" width="32" height="32" />
							</span>
						</a>
						<ul id="employee_links" class="dropdown-menu">
							<li data-mobile="true" data-from="employee_links" data-target="menu">
								<span class="employee_avatar">
									<img class="imgm img-thumbnail" alt="" src="<?php echo $_smarty_tpl->tpl_vars['employee']->value->getImage();?>
" width="96" height="96" />
								</span>
							</li>
							<li class="text-center text-nowrap username" data-mobile="true" data-from="employee_links" data-target="menu"><?php echo $_smarty_tpl->tpl_vars['employee']->value->firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['employee']->value->lastname;?>
</li>
							<li class="divider"></li>
							<li><a class="admin-link" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminEmployees'),'html','UTF-8');?>
&amp;id_employee=<?php echo intval($_smarty_tpl->tpl_vars['employee']->value->id);?>
&amp;updateemployee"><i class="icon-wrench"></i> <?php echo smartyTranslate(array('s'=>'My preferences','d'=>'Admin.Navigation.Header'),$_smarty_tpl);?>
</a></li>
							<?php if ($_smarty_tpl->tpl_vars['host_mode']->value) {?>
							<li><a href="https://www.prestashop.com/cloud/" class="_blank"><i class="icon-wrench"></i> <?php echo smartyTranslate(array('s'=>'My PrestaShop account','d'=>'Admin.Navigation.Header'),$_smarty_tpl);?>
</a></li>
							<?php }?>
							<li class="divider"></li>
							<li class="signout" data-mobile="true" data-from="employee_links" data-target="menu" data-after="true"><a id="header_logout" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['login_link']->value,'html','UTF-8');?>
&amp;logout"><i class="icon-signout"></i> <?php echo smartyTranslate(array('s'=>'Sign out','d'=>'Admin.Navigation.Header'),$_smarty_tpl);?>
</a></li>
						</ul>
					</li>
				</ul>

				
        <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value||$_smarty_tpl->tpl_vars['show_new_customers']->value||$_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
          <ul class="header-list navbar-right">
            <li id="notification" class="dropdown">
              <a href="javascript:void(0);" class="notification dropdown-toggle notifs">
                <i class="material-icons">notifications_none</i>
                <span id="total_notif_number_wrapper" class="notifs_badge hide">
                  <span id="total_notif_value">0</span>
                </span>
              </a>
              <div class="dropdown-menu notifs_dropdown">
                <div class="notifications">
                  <ul class="nav nav-tabs" role="tablist">
                    <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable("active", null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value) {?>
                      <li class="nav-item <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
">
                        <a class="nav-link" data-toggle="tab" data-type="order" href="#orders-notifications" role="tab" id="orders-tab"><?php echo smartyTranslate(array('s'=>'Latest orders'),$_smarty_tpl);?>
<span id="orders_notif_value"></span></a>
                      </li>
                      <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable('', null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['show_new_customers']->value) {?>
                      <li class="nav-item <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
">
                        <a class="nav-link" data-toggle="tab" data-type="customer" href="#customers-notifications" role="tab" id="customers-tab"><?php echo smartyTranslate(array('s'=>'New customers'),$_smarty_tpl);?>
<span id="customers_notif_value"></span></a>
                      </li>
                      <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable('', null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
                      <li class="nav-item <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
">
                        <a class="nav-link" data-toggle="tab" data-type="customer_message" href="#messages-notifications" role="tab" id="messages-tab"><?php echo smartyTranslate(array('s'=>'Messages'),$_smarty_tpl);?>
<span id="customer_messages_notif_value"></span></a>
                      </li>
                      <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable('', null, 0);?>
                    <?php }?>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable("active", null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value) {?>
                      <div class="tab-pane <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 empty" id="orders-notifications" role="tabpanel">
                        <p class="no-notification">
                          <?php echo smartyTranslate(array('s'=>'No new order for now :(','d'=>'Admin.Navigation.Notification'),$_smarty_tpl);?>
<br>
                          <?php echo $_smarty_tpl->tpl_vars['no_order_tip']->value;?>

                        </p>
                        <div class="notification-elements"></div>
                      </div>
                      <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable('', null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['show_new_customers']->value) {?>
                      <div class="tab-pane <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 empty" id="customers-notifications" role="tabpanel">
                        <p class="no-notification">
                          <?php echo smartyTranslate(array('s'=>'No new customer for now :(','d'=>'Admin.Navigation.Notification'),$_smarty_tpl);?>
<br>
                          <?php echo $_smarty_tpl->tpl_vars['no_customer_tip']->value;?>

                        </p>
                        <div class="notification-elements"></div>
                      </div>
                      <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable('', null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
                      <div class="tab-pane <?php echo $_smarty_tpl->tpl_vars['active']->value;?>
 empty" id="messages-notifications" role="tabpanel">
                        <p class="no-notification">
                          <?php echo smartyTranslate(array('s'=>'No new message for now.','d'=>'Admin.Navigation.Notification'),$_smarty_tpl);?>
<br>
                          <?php echo $_smarty_tpl->tpl_vars['no_customer_message_tip']->value;?>

                        </p>
                        <div class="notification-elements"></div>
                      </div>
                      <?php $_smarty_tpl->tpl_vars['active'] = new Smarty_variable('', null, 0);?>
                    <?php }?>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        <?php }?>

				
				<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2) {?>
					<ul id="header-list" class="header-list navbar-right">
						<li class="shopname" data-mobile="true" data-from="header-list" data-target="menu">
              <?php if (isset($_smarty_tpl->tpl_vars['debug_mode']->value)&&$_smarty_tpl->tpl_vars['debug_mode']->value==true) {?>
                <span class="shop-state hidden-xs" id="debug-mode">
                  <i class="material-icons">bug_report</i>
                  <span class="label-tooltip" data-toggle="tooltip" data-placement="bottom" data-html="true"
                    title="<p class='text-left text-nowrap'><strong><?php echo smartyTranslate(array('s'=>'Your shop is in debug mode.'),$_smarty_tpl);?>
</strong></p><p class='text-left'><?php echo smartyTranslate(array('s'=>'All the PHP errors and messages are displayed. When you no longer need it, [1]turn off[/1] this mode.','html'=>true,'sprintf'=>array('[1]'=>'<strong>','[/1]'=>'</strong>')),$_smarty_tpl);?>
</p>"><?php echo smartyTranslate(array('s'=>'Debug mode'),$_smarty_tpl);?>
</span>
                </span>
              <?php }?>
              <?php if (isset($_smarty_tpl->tpl_vars['maintenance_mode']->value)&&$_smarty_tpl->tpl_vars['maintenance_mode']->value==true) {?>
                <span class="shop-state" id="maintenance-mode">
                  <i class="material-icons">build</i>
                    <a class="label-tooltip" data-toggle="tooltip" data-placement="bottom" data-html="true"
                    title="<p class='text-left text-nowrap'><strong><?php echo smartyTranslate(array('s'=>'Your shop is in maintenance.'),$_smarty_tpl);?>
</strong></p><p class='text-left'><?php echo smartyTranslate(array('s'=>'Your visitors and customers cannot access your shop while in maintenance mode.%s To manage the maintenance settings, go to Shop Parameters > Maintenance tab.','sprintf'=>array('<br />')),$_smarty_tpl);?>
</p>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminMaintenance'),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Maintenance mode'),$_smarty_tpl);?>

                    </a>
                </span>
              <?php }?>
							<?php if (isset($_smarty_tpl->tpl_vars['is_multishop']->value)&&$_smarty_tpl->tpl_vars['is_multishop']->value&&$_smarty_tpl->tpl_vars['shop_list']->value&&(isset($_smarty_tpl->tpl_vars['multishop_context']->value)&&$_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_GROUP||$_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_SHOP||$_smarty_tpl->tpl_vars['multishop_context']->value&Shop::CONTEXT_ALL)) {?>
								<ul id="header_shop">
									<li class="dropdown">
										<?php echo $_smarty_tpl->tpl_vars['shop_list']->value;?>

									</li>
								</ul>
							<?php } else { ?>
								<a id="header_shopname" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['base_url']->value,'html','UTF-8');?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</a>
							<?php }?>
						</li>
					</ul>
				<?php }?>

				
				<span id="ajax_running" class="hidden-xs">
					<i class="icon-refresh icon-spin icon-fw"></i>
				</span>

	<?php if (isset($_smarty_tpl->tpl_vars['displayBackOfficeTop']->value)) {?><?php echo $_smarty_tpl->tpl_vars['displayBackOfficeTop']->value;?>
<?php }?>
			</div>
		</nav>
	</header>

	<div id="main">
		<?php echo $_smarty_tpl->getSubTemplate ('nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


		<div id="content" class="<?php if (!$_smarty_tpl->tpl_vars['bootstrap']->value) {?>nobootstrap<?php } else { ?>bootstrap<?php }?><?php if (!isset($_smarty_tpl->tpl_vars['page_header_toolbar']->value)) {?> no-header-toolbar<?php }?> <?php if ($_smarty_tpl->tpl_vars['current_tab_level']->value==3) {?>with-tabs<?php }?>">
			<?php if (isset($_smarty_tpl->tpl_vars['page_header_toolbar']->value)) {?><?php echo $_smarty_tpl->tpl_vars['page_header_toolbar']->value;?>
<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['modal_module_list']->value)) {?><?php echo $_smarty_tpl->tpl_vars['modal_module_list']->value;?>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['install_dir_exists']->value) {?>
			<div class="alert alert-warning">
				<?php echo smartyTranslate(array('s'=>'For security reasons, you must also delete the /install folder.'),$_smarty_tpl);?>

			</div>
<?php }?>

			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminAfterHeader'),$_smarty_tpl);?>





<?php } else { ?>
	<body<?php if (isset($_smarty_tpl->tpl_vars['lite_display']->value)&&$_smarty_tpl->tpl_vars['lite_display']->value) {?> class="ps_back-office display-modal"<?php }?>>
		<div id="main">
			<div id="content" class="<?php if (!$_smarty_tpl->tpl_vars['bootstrap']->value) {?>nobootstrap<?php } else { ?>bootstrap<?php }?>">
<?php }?>
<?php }} ?>
