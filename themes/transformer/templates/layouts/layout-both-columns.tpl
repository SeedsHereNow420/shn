<!doctype html>
<html lang="{$language.iso_code}">

  <head>
	{block name='head'}
	  {include file='_partials/head.tpl'}
	{/block}
  </head>
  <body id="{$page.page_name}" class="{$page.page_name} {$page.body_classes|classnames} lang_{$language.iso_code} {if $language.is_rtl} is_rtl {/if}
  {if $sttheme.is_mobile_device} mobile_device {if $sttheme.use_mobile_header==1} use_mobile_header {/if}{else} desktop_device {/if}{if $sttheme.slide_lr_column} slide_lr_column {/if}
  {if $sttheme.use_mobile_header==2} use_mobile_header {/if}
	{block name='body_class'} hide-left-column hide-right-column {/block}
  ">{*similar code in checkout/checkout.tpl*}
	{block name='hook_after_body_opening_tag'}
      {hook h='displayAfterBodyOpeningTag'}
    {/block}
	<div id="st-container" class="st-container st-effect-{$sttheme.sidebar_transition}">
	  <div class="st-pusher">
		<div class="st-content"><!-- this is the wrapper for the content -->
		  <div class="st-content-inner">
	<!-- off-canvas-end -->

	<main id="body_wrapper">
	  {if isset($sttheme.boxstyle) && $sttheme.boxstyle==2}<div id="page_wrapper">{/if}
	  {block name='product_activation'}
		{include file='catalog/_partials/product-activation.tpl'}
	  {/block}
	  <div class="header-container {if $sttheme.transparent_header} transparent-header {/if} {if $sttheme.transparent_mobile_header} transparent-mobile-header {/if}">
	  <header id="st_header" class="animated fast">
		{block name='header'}
		  {include file='_partials/header.tpl'}
		{/block}
	  </header>
	  </div>
	  {block name='breadcrumb'}
		{hook h='displayBreadcrumb' page_name=$page.page_name}
		<div class="breadcrumb_spacing"></div>{*using a div insteads of margin bottom for product first section background, the problem is that in futher there might be something placed between breadcrumb and product first section, zen me ban *}
	  {/block}
	  {block name='notifications'}
		{include file='_partials/notifications.tpl'}
	  {/block}

	  {block name="full_width_top"}
		  {hook h='displayFullWidthTop'}
		  {hook h='displayFullWidthTop2'}
		  {hook h="displayWrapperTop"}
	  {/block}

	  <section id="wrapper" class="columns-container">
		<div id="columns" class="container">
		  <div class="row">

			{assign var='cols_md' value=12}
			{assign var='cols_lg' value=12}

			{block name="left_column"}
			{$cols_md=($cols_md - $sttheme.left_column_size_md)}
			{$cols_lg=($cols_lg - $sttheme.left_column_size_lg)}
			  <div id="left_column" class="main_column {if $sttheme.slide_lr_column} col-8 {else} col-12 {/if} col-lg-{$sttheme.left_column_size_md|replace:'.':'-'} col-xl-{$sttheme.left_column_size_lg|replace:'.':'-'}">
			  <div class="wrapper-sticky">
			  	<div class="main_column_box">
				{if $page.page_name == 'product'}
				{hook h='displayLeftColumnProduct'}
				{elseif $page.page_name == 'module-stblog-default' || $page.page_name == 'module-stblog-category' || $page.page_name == 'module-stblog-article' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogsearch-default'}{*to do a better way*}
				{hook h='displayStBlogLeftColumn'}
				{else}
				{hook h="displayLeftColumn"}
				{/if}
			  	</div>
			  </div>
			  </div>
			{/block}

			{block name="right_column"}
			{$cols_md=($cols_md - $sttheme.right_column_size_md)}
			{$cols_lg=($cols_lg - $sttheme.right_column_size_lg)}
			  <div id="right_column" class="main_column {if $sttheme.slide_lr_column} col-8 {else} col-12 {/if} col-lg-{$sttheme.right_column_size_md|replace:'.':'-'} col-xl-{$sttheme.right_column_size_lg|replace:'.':'-'}">
			  <div class="wrapper-sticky">
			  	<div class="main_column_box">
				{if $page.page_name == 'product'}
				{hook h='displayRightColumnProduct'}
				{elseif $page.page_name == 'module-stblog-default' || $page.page_name == 'module-stblog-category' || $page.page_name == 'module-stblog-article' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogarchives-default' || $page.page_name == 'module-stblogsearch-default'}{*to do a better way*}
				{hook h='displayStBlogRightColumn'}
				{else}
				{hook h="displayRightColumn"}
				{/if}
			  	</div>
			  </div>
			  </div>
			{/block}

			{block name="content_wrapper"}
			  <div id="center_column" class="col-lg-{$cols_md|replace:'.':'-'} col-xl-{$cols_lg|replace:'.':'-'}">
			  	{hook h="displayContentWrapperTop"}
				{block name="content"}
				  <p>Hello world! This is HTML5 Boilerplate.</p>
				{/block}
				{hook h="displayContentWrapperBottom"}
			  </div>
			{/block}
		  </div>
		</div>
	  </section>
	  	{block name="full_width_bottom"}
		  {hook h="displayFullWidthBottom"}
		  {hook h="displayWrapperBottom"}
		  {hook h="displayFooterBefore"}
		{/block}
		{block name="footer"}
		  {include file="_partials/footer.tpl"}
		{/block}
	  {if isset($sttheme.boxstyle) && $sttheme.boxstyle==2}</div>{/if}<!-- #page_wrapper -->
	</main>
	<!-- off-canvas-begin -->
			<div id="st-content-inner-after" data-version="{if isset($sttheme.ps_version)}{$sttheme.ps_version|replace:'.':'-'}{/if}-{if isset($sttheme.theme_version)}{$sttheme.theme_version|replace:'.':'-'}{/if}"></div>
		  </div><!-- /st-content-inner -->
		</div><!-- /st-content -->
		<div id="st-pusher-after"></div>
	  </div><!-- /st-pusher -->
	  {block name="side_bar"}		
		{hook h="displaySideBar"}
	  {/block}
		
	
		<div id="sidebar_box" class="flex_container">
		{block name="right_left_bar"}
			{block name='right_left_bar_left_column'}
				{if $sttheme.slide_lr_column}
				<div id="switch_left_column_wrap" class="rightbar_wrap hidden-lg-up">
					<a href="javascript:;" id="switch_left_column" data-name="left_column" data-direction="open_column" class="rightbar_tri icon_wrap with_text" title="{l s='Toggle left column' d='Shop.Theme.Transformer'}"><i class="fto-columns"></i><span class="icon_text">{l s='Left column' d='Shop.Theme.Transformer'}</span></a>   
				</div>
				{/if}
			{/block}
			{hook h="displayRightBar"}
			{block name='right_left_bar_right_column'}
				{if $sttheme.slide_lr_column}
				<div id="switch_right_column_wrap" class="rightbar_wrap hidden-lg-up">
					<a href="javascript:;" id="switch_right_column" data-name="right_column" data-direction="open_column" class="rightbar_tri icon_wrap with_text" title="{l s='Toggle right column' d='Shop.Theme.Transformer'}"><i class="fto-columns"></i><span class="icon_text">{l s='Right column' d='Shop.Theme.Transformer'}</span></a>   
				</div>
				{/if}
			{/block}
		{/block}
		</div>
		
	</div><!-- /st-container -->
	<!-- off-canvas-end -->
	<div id="popup_go_login" class="inline_popup_content small_popup mfp-with-anim mfp-hide text-center">
	  <p class="fs_md">{l s='Please sign in first.' d='Shop.Theme.Transformer'}</p>
	  <a href="{$urls.pages.authentication}" class="go" title="{l s='Sign in' d='Shop.Theme.Transformer'}">{l s='Sign in' d='Shop.Theme.Transformer'}</a> 
	</div>
	{if isset($sttheme.tracking_code) && $sttheme.tracking_code}{$sttheme.tracking_code nofilter}{/if}
	{block name='javascript_bottom'}
      {include file="_partials/javascript.tpl" javascript=$javascript.bottom}
    {/block}
	{block name='hook_before_body_closing_tag'}
      {hook h='displayBeforeBodyClosingTag'}
    {/block}
  </body>

</html>
