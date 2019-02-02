<?php /* Smarty version Smarty-3.1.19, created on 2019-01-04 11:29:30
         compiled from "/var/www/html/SHN/modules/dashtrends/views/templates/hook/dashboard_zone_two.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13770220675c2fb41a6fe483-84969229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95618a591c7b42b355125c8959d04dac88d51695' => 
    array (
      0 => '/var/www/html/SHN/modules/dashtrends/views/templates/hook/dashboard_zone_two.tpl',
      1 => 1508771972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13770220675c2fb41a6fe483-84969229',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currency' => 0,
    '_PS_PRICE_DISPLAY_PRECISION_' => 0,
    'allow_push' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c2fb41a70bfb1_91646809',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c2fb41a70bfb1_91646809')) {function content_5c2fb41a70bfb1_91646809($_smarty_tpl) {?>
<script>
	var currency_format = <?php echo floatval($_smarty_tpl->tpl_vars['currency']->value->format);?>
;
	var currency_sign = '<?php echo addcslashes($_smarty_tpl->tpl_vars['currency']->value->sign,'\'');?>
';
	var currency_blank = <?php echo intval($_smarty_tpl->tpl_vars['currency']->value->blank);?>
;
	var priceDisplayPrecision = <?php echo intval($_smarty_tpl->tpl_vars['_PS_PRICE_DISPLAY_PRECISION_']->value);?>
;
</script>
<div class="clearfix"></div>
<section id="dashtrends" class="panel widget<?php if ($_smarty_tpl->tpl_vars['allow_push']->value) {?> allow_push<?php }?>">
	<header class="panel-heading">
		<i class="icon-bar-chart"></i> <?php echo smartyTranslate(array('s'=>'Dashboard','d'=>'Modules.Dashtrends.Admin'),$_smarty_tpl);?>

		<span class="panel-heading-action">
			<a class="list-toolbar-btn" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminDashboard'),'html','UTF-8');?>
&amp;profitability_conf=1" title="<?php echo smartyTranslate(array('s'=>'Configure','d'=>'Admin.Actions'),$_smarty_tpl);?>
">
				<i class="process-icon-configure"></i>
			</a>
			<a class="list-toolbar-btn" href="#" onclick="refreshDashboard('dashtrends'); return false;" title="<?php echo smartyTranslate(array('s'=>'Refresh','d'=>'Admin.Actions'),$_smarty_tpl);?>
">
				<i class="process-icon-refresh"></i>
			</a>
		</span>
	</header>
	<div id="dashtrends_toolbar" class="row">
		<dl class="col-xs-4 col-lg-2 label-tooltip" onclick="selectDashtrendsChart(this, 'sales');" data-toggle="tooltip" data-original-title="<?php echo smartyTranslate(array('s'=>'Sum of revenue (excl. tax) generated within the date range by orders considered validated.','d'=>'Modules.Dashtrends.Admin'),$_smarty_tpl);?>
" data-placement="bottom">
				<dt><?php echo smartyTranslate(array('s'=>'Sales','d'=>'Admin.Global'),$_smarty_tpl);?>
</dt>
				<dd class="data_value size_l"><span id="sales_score"></span></dd>
				<dd class="dash_trend"><span id="sales_score_trends"></span></dd>
		</dl>
		<dl class="col-xs-4 col-lg-2 label-tooltip" onclick="selectDashtrendsChart(this, 'orders');" data-toggle="tooltip" data-original-title="<?php echo smartyTranslate(array('s'=>'Total number of orders received within the date range that are considered validated.','d'=>'Modules.Dashtrends.Admin'),$_smarty_tpl);?>
" data-placement="bottom">
				<dt><?php echo smartyTranslate(array('s'=>'Orders','d'=>'Admin.Global'),$_smarty_tpl);?>
</dt>
				<dd class="data_value size_l"><span id="orders_score"></span></dd>
				<dd class="dash_trend"><span id="orders_score_trends"></span></dd>
		</dl>
		<dl class="col-xs-4 col-lg-2 label-tooltip" onclick="selectDashtrendsChart(this, 'average_cart_value');" data-toggle="tooltip" data-original-title="<?php echo smartyTranslate(array('s'=>'Average Cart Value is a metric representing the value of an average order within the date range. It is calculated by dividing Sales by Orders.','d'=>'Modules.Dashtrends.Admin'),$_smarty_tpl);?>
" data-placement="bottom">
				<dt><?php echo smartyTranslate(array('s'=>'Cart Value','d'=>'Modules.Dashtrends.Admin'),$_smarty_tpl);?>
</dt>
				<dd class="data_value size_l"><span id="cart_value_score"></span></dd>
				<dd class="dash_trend"><span id="cart_value_score_trends"></span></dd>
		</dl>
		<dl class="col-xs-4 col-lg-2 label-tooltip" onclick="selectDashtrendsChart(this, 'visits');" data-toggle="tooltip" data-original-title="<?php echo smartyTranslate(array('s'=>'Total number of visits within the date range. A visit is the period of time a user is actively engaged with your website.','d'=>'Modules.Dashtrends.Admin'),$_smarty_tpl);?>
" data-placement="bottom">
				<dt><?php echo smartyTranslate(array('s'=>'Visits','d'=>'Admin.Global'),$_smarty_tpl);?>
</dt>
				<dd class="data_value size_l"><span id="visits_score"></span></dd>
				<dd class="dash_trend"><span id="visits_score_trends"></span></dd>
		</dl>
		<dl class="col-xs-4 col-lg-2 label-tooltip" onclick="selectDashtrendsChart(this, 'conversion_rate');" data-toggle="tooltip" data-original-title="<?php echo smartyTranslate(array('s'=>'Ecommerce Conversion Rate is the percentage of visits that resulted in an validated order.','d'=>'Modules.Dashtrends.Admin'),$_smarty_tpl);?>
" data-placement="bottom">
			<dt><?php echo smartyTranslate(array('s'=>'Conversion Rate','d'=>'Admin.Global'),$_smarty_tpl);?>
</dt>
			<dd class="data_value size_l"><span id="conversion_rate_score"></span></dd>
			<dd class="dash_trend"><span id="conversion_rate_score_trends"></span></dd>
		</dl>
		<dl class="col-xs-4 col-lg-2 label-tooltip" onclick="selectDashtrendsChart(this, 'net_profits');" data-toggle="tooltip" data-original-title="<?php echo smartyTranslate(array('s'=>'Net profit is a measure of the profitability of a venture after accounting for all Ecommerce costs. You can provide these costs by clicking on the configuration icon right above here.','d'=>'Modules.Dashtrends.Admin'),$_smarty_tpl);?>
" data-placement="bottom">
				<dt><?php echo smartyTranslate(array('s'=>'Net Profit','d'=>'Modules.Dashtrends.Admin'),$_smarty_tpl);?>
</dt>
				<dd class="data_value size_l"><span id="net_profits_score"></span></dd>
				<dd class="dash_trend"><span id="net_profits_score_trends"></span></dd>
		</dl>
	</div>
	<div id="dash_trends_chart1" class="chart with-transitions">
		<svg></svg>
	</div>
</section>
<?php }} ?>
