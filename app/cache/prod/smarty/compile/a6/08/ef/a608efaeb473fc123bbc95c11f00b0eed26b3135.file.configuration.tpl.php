<?php /* Smarty version Smarty-3.1.19, created on 2019-01-08 03:04:14
         compiled from "/var/www/html/SHN/modules/prestashippingeasy/views/templates/admin/configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9496798535c3483aec317e1-55296680%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a608efaeb473fc123bbc95c11f00b0eed26b3135' => 
    array (
      0 => '/var/www/html/SHN/modules/prestashippingeasy/views/templates/admin/configuration.tpl',
      1 => 1515295075,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9496798535c3483aec317e1-55296680',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_dir' => 0,
    'callback_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c3483aec435d9_83588903',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c3483aec435d9_83588903')) {function content_5c3483aec435d9_83588903($_smarty_tpl) {?>
<div class="shipeasy">
	<div class="shipeasy-header text-center">
		<a rel="external" href="http://shippingeasy.com/integrate-shipping-prestashop-shippingeasy-app/?se-ref=95c" target="_blank" class="shipeasy-logo"><img alt="" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['module_dir']->value,'html','UTF-8');?>
/img/SE_logo_green_377x200.png" /></a>
		<span class="shipeasy-intro">
			<h1><?php echo smartyTranslate(array('s'=>'ShippingEasy Ecommerce Solution','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</h1>
			<p class="H3">
				<?php echo smartyTranslate(array('s'=>'Easy integration : Stores, Marketplaces, Deal Sites, Inventory & Accounting','mod'=>'prestashippingeasy'),$_smarty_tpl);?>

			</p>
		</span><br />
	</div>
	<div class="shipeasy-content">
		<div class="shipeasy-leftCol">
			<h3><?php echo smartyTranslate(array('s'=>'4 reasons you should try ShippingEasy:','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</h3>
			<ol>
				<li><strong><?php echo smartyTranslate(array('s'=>'Stores | Marketplaces integrate.','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</strong> <?php echo smartyTranslate(array('s'=>'ShippingEasy brings in orders in real time from wherever you sell online. 20+ integrations including eBay, Amazon, etsy, Sears, Jane.com, Stitch Labs, QuickBooks and more.','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</li>
				<li><strong><?php echo smartyTranslate(array('s'=>'Lowest USPS Rates | Multi-Carrier.','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</strong> <?php echo smartyTranslate(array('s'=>'Commercial Plus Pricing saves you money over the rates available from PC Postage providers, including Stamps.com. Your negotiated rates with UPS and FedEx.','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</li>
				<li><strong><?php echo smartyTranslate(array('s'=>'Easy to use | Advanced automation:','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</strong> <?php echo smartyTranslate(array('s'=>'Simple software that helps you print labels fast. All the tools and options you need without the clutter. Split orders. Combine orders. Map orders. It\'s all here.','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</li>
				<li><strong><?php echo smartyTranslate(array('s'=>'We help | Onboarding:','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</strong> <?php echo smartyTranslate(array('s'=>'All plan users get the benefit of being walked through the set up process. Phone (855-202-2275), email, and chat forevermore.','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</li>
			</ol><br /><br /><br />
			<div class="text-center">
			<a class="shipeasy-create-btn btn btn-default btn-lg" rel="external" href="http://shippingeasy.com/plans-pricing-prestashop/?se-ref=95d" target="_blank"><span><?php echo smartyTranslate(array('s'=>'Get your FREE 30 day trial','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</span></a><br /><br /><br /><br /><br />
			</div>
			<div style="clear: right"></div> 
		</div>
		<div class="shipeasy-video">
			<iframe width="410" height="231" src="//www.youtube.com/embed/ERu4VFwZaP8?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
			<h4><?php echo smartyTranslate(array('s'=>'What you\'ll get access to:','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</h4>
			<ul>
				<li><strong><?php echo smartyTranslate(array('s'=>'Batch shipping:','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</strong> <?php echo smartyTranslate(array('s'=>'Print labels and packing slips in batches of 200','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</li>
				<li><strong><?php echo smartyTranslate(array('s'=>'Rules & automation:','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</strong> <?php echo smartyTranslate(array('s'=>'map order details to carriers and more','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</li>
				<li><strong><?php echo smartyTranslate(array('s'=>'Fast label printing:','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</strong> <?php echo smartyTranslate(array('s'=>'to designated thermal, laser or other printer','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</li>
				<li><strong><?php echo smartyTranslate(array('s'=>'USB scales:','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</strong> <?php echo smartyTranslate(array('s'=>'plug it in to auto-populate weight in the app','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</li>
				<li><strong><?php echo smartyTranslate(array('s'=>'Amazing support:','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</strong> <?php echo smartyTranslate(array('s'=>'polite specialists available from 7am - 7pm','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</li>
			</ol>
		</div>
	</div>
	<div class="info col-lg-7">
		<p style="margin-left: 5px;">
			<strong><?php echo smartyTranslate(array('s'=>'Complete your Setup','mod'=>'prestashippingeasy'),$_smarty_tpl);?>
</strong>
			<br />
			<?php echo smartyTranslate(array('s'=>'Your "Callback Interface URL"','mod'=>'prestashippingeasy'),$_smarty_tpl);?>

			<br />
			<input type="text" onclick="$(this).select()" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['callback_url']->value,'html','UTF-8');?>
" class="callbackurl" />
		</p>
	</div>
	<div style="clear: both;"></div>
	<br />
	<br />
</div>
<?php }} ?>
