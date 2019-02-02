<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 22:23:24
         compiled from "/var/www/html/SHN/modules/dashactivity/views/templates/hook/dashboard_zone_one.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3796715615c319edc290a56-26975730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '862afed525d14d806de2fad7b80fd1c024771b3c' => 
    array (
      0 => '/var/www/html/SHN/modules/dashactivity/views/templates/hook/dashboard_zone_one.tpl',
      1 => 1513040483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3796715615c319edc290a56-26975730',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'allow_push' => 0,
    'dashactivity_config_form' => 0,
    'link' => 0,
    'DASHACTIVITY_VISITOR_ONLINE' => 0,
    'DASHACTIVITY_CART_ACTIVE' => 0,
    'stock_management' => 0,
    'gapi_mode' => 0,
    'date_subtitle' => 0,
    'date_format' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c319edc2d0d44_97891146',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c319edc2d0d44_97891146')) {function content_5c319edc2d0d44_97891146($_smarty_tpl) {?>
<section id="dashactivity" class="panel widget<?php if ($_smarty_tpl->tpl_vars['allow_push']->value) {?> allow_push<?php }?>">
	<div class="panel-heading">
		<i class="icon-time"></i> <?php echo smartyTranslate(array('s'=>'Activity overview','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>

		<span class="panel-heading-action">
			<a class="list-toolbar-btn" href="#" onclick="toggleDashConfig('dashactivity'); return false;" title="<?php echo smartyTranslate(array('s'=>'Configure','d'=>'Admin.Actions'),$_smarty_tpl);?>
">
				<i class="process-icon-configure"></i>
			</a>
			<a class="list-toolbar-btn" href="#" onclick="refreshDashboard('dashactivity'); return false;" title="<?php echo smartyTranslate(array('s'=>'Refresh','d'=>'Admin.Actions'),$_smarty_tpl);?>
">
				<i class="process-icon-refresh"></i>
			</a>
		</span>
	</div>
	<section id="dashactivity_config" class="dash_config hide">
		<header><i class="icon-wrench"></i> <?php echo smartyTranslate(array('s'=>'Configuration','d'=>'Admin.Global'),$_smarty_tpl);?>
</header>
		<?php echo $_smarty_tpl->tpl_vars['dashactivity_config_form']->value;?>

	</section>
	<section id="dash_live" class="loading">
		<ul class="data_list_large">
			<li>
				<span class="data_label size_l">
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminStats'),'html','UTF-8');?>
&amp;module=statslive"><?php echo smartyTranslate(array('s'=>'Online Visitors','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a>
					<small class="text-muted"><br/>
						<?php echo smartyTranslate(array('s'=>'in the last %d minutes','sprintf'=>intval($_smarty_tpl->tpl_vars['DASHACTIVITY_VISITOR_ONLINE']->value),'d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>

					</small>
				</span>
				<span class="data_value size_xxl">
					<span id="online_visitor"></span>
				</span>
			</li>
			<li>
				<span class="data_label size_l">
					<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCarts'),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Active Shopping Carts','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a>
					<small class="text-muted"><br/>
						<?php echo smartyTranslate(array('s'=>'in the last %d minutes','sprintf'=>intval($_smarty_tpl->tpl_vars['DASHACTIVITY_CART_ACTIVE']->value),'d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>

					</small>
				</span>
				<span class="data_value size_xxl">
					<span id="active_shopping_cart"></span>
				</span>
			</li>
		</ul>
	</section>
	<section id="dash_pending" class="loading">
		<header><i class="icon-time"></i> <?php echo smartyTranslate(array('s'=>'Currently Pending','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</header>
		<ul class="data_list">
			<li>
				<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminOrders'),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Orders','d'=>'Admin.Global'),$_smarty_tpl);?>
</a></span>
				<span class="data_value size_l">
					<span id="pending_orders"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminReturn'),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Return/Exchanges','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a></span>
				<span class="data_value size_l">
					<span id="return_exchanges"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCarts'),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Abandoned Carts','d'=>'Admin.Global'),$_smarty_tpl);?>
</a></span>
				<span class="data_value size_l">
					<span id="abandoned_cart"></span>
				</span>
			</li>
			<?php if (isset($_smarty_tpl->tpl_vars['stock_management']->value)&&$_smarty_tpl->tpl_vars['stock_management']->value) {?>
				<li>
					<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminTracking'),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'Out of Stock Products','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a></span>
					<span class="data_value size_l">
						<span id="products_out_of_stock"></span>
					</span>
				</li>
			<?php }?>
		</ul>
	</section>
	<section id="dash_notifications" class="loading">
		<header><i class="icon-exclamation-sign"></i> <?php echo smartyTranslate(array('s'=>'Notifications','d'=>'Admin.Advparameters.Feature'),$_smarty_tpl);?>
</header>
		<ul class="data_list_vertical">
			<li>
				<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomerThreads'),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'New Messages','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a></span>
				<span class="data_value size_l">
					<span id="new_messages"></span>
				</span>
			</li>
			<?php if (Module::isInstalled('productcomments')) {?>
				<li>
				<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8');?>
&amp;configure=productcomments&amp;tab_module=front_office_features&amp;module_name=productcomments"><?php echo smartyTranslate(array('s'=>'Product Reviews','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a></span>
					<span class="data_value size_l">
						<span id="product_reviews"></span>
					</span>
				</li>
			<?php }?>
		</ul>
	</section>
	<section id="dash_customers" class="loading">
		<header><i class="icon-user"></i> <?php echo smartyTranslate(array('s'=>'Customers & Newsletters','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
 <span class="subtitle small" id="customers-newsletters-subtitle"></span></header>
		<ul class="data_list">
			<li>
				<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomers'),'html','UTF-8');?>
"><?php echo smartyTranslate(array('s'=>'New Customers','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a></span>
				<span class="data_value size_md">
					<span id="new_customers"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminStats'),'html','UTF-8');?>
&amp;module=statsnewsletter"><?php echo smartyTranslate(array('s'=>'New Subscriptions','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a></span>
				<span class="data_value size_md">
					<span id="new_registrations"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8');?>
&amp;configure=ps_emailsubscription&amp;module_name=ps_emailsubscription"><?php echo smartyTranslate(array('s'=>'Total Subscribers','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a></span>
				<span class="data_value size_md">
					<span id="total_suscribers"></span>
				</span>
			</li>
		</ul>
	</section>
	<section id="dash_traffic" class="loading">
		<header>
			<i class="icon-globe"></i> <?php echo smartyTranslate(array('s'=>'Traffic','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
 <span class="subtitle small" id="traffic-subtitle"></span>
		</header>
		<ul class="data_list">
			<?php if ($_smarty_tpl->tpl_vars['gapi_mode']->value) {?>
				<li>
					<span class="data_label">
						<img src="../modules/dashactivity/gapi-logo.gif" width="16" height="16" alt=""/> <a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminModules'),'html','UTF-8');?>
&amp;<?php echo $_smarty_tpl->tpl_vars['gapi_mode']->value;?>
=gapi"><?php echo smartyTranslate(array('s'=>'Link to your Google Analytics account','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a>
					</span>
				</li>
			<?php }?>
			<li>
				<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminStats'),'html','UTF-8');?>
&amp;module=statsforecast"><?php echo smartyTranslate(array('s'=>'Visits','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a></span>
				<span class="data_value size_md">
					<span id="visits"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminStats'),'html','UTF-8');?>
&amp;module=statsvisits"><?php echo smartyTranslate(array('s'=>'Unique Visitors','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</a></span>
				<span class="data_value size_md">
					<span id="unique_visitors"></span>
				</span>
			</li>
			<li>
				<span class="data_label"><?php echo smartyTranslate(array('s'=>'Traffic Sources','d'=>'Modules.Dashactivity.Admin'),$_smarty_tpl);?>
</span>
				<ul class="data_list_small" id="dash_traffic_source">
				</ul>
				<div id="dash_traffic_chart2" class='chart with-transitions'>
					<svg></svg>
				</div>
			</li>
		</ul>
	</section>
</section>
<script type="text/javascript">
	date_subtitle = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['date_subtitle']->value,'html','UTF-8');?>
";
	date_format   = "<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['date_format']->value,'html','UTF-8');?>
";
</script>
<?php }} ?>
