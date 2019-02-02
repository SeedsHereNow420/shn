<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:08:25
         compiled from "/var/www/html/SHN/nimda420/themes/new-theme/template/layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10078700995c31a969ebb522-02644994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1973e96f1a2b8093dec2afda77ba2f4dfd40211' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/new-theme/template/layout.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10078700995c31a969ebb522-02644994',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'iso' => 0,
    'header' => 0,
    'collapse_menu' => 0,
    'default_tab_link' => 0,
    'show_new_orders' => 0,
    'show_new_customers' => 0,
    'show_new_messages' => 0,
    'maintenance_mode' => 0,
    'link' => 0,
    'debug_mode' => 0,
    'displayBackOfficeTop' => 0,
    'install_dir_exists' => 0,
    'page_header_toolbar' => 0,
    'modal_module_list' => 0,
    'page' => 0,
    'display_footer' => 0,
    'php_errors' => 0,
    'modals' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a96a0e0838_55231629',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a96a0e0838_55231629')) {function content_5c31a96a0e0838_55231629($_smarty_tpl) {?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
">
<head>
  <?php echo $_smarty_tpl->tpl_vars['header']->value;?>

</head>
<body class="<?php echo strtolower($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_GET['controller']));?>
<?php if ($_smarty_tpl->tpl_vars['collapse_menu']->value) {?> page-sidebar-closed<?php }?>">



<header>
  <nav class="main-header">

    <button class="btn btn-primary-reverse onclick btn-lg unbind ajax-spinner"></button>

    
    

    
    <i class="material-icons pull-left p-x-1 js-mobile-menu hidden-md-up">menu</i>
    <a class="logo pull-left" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['default_tab_link']->value,'html','UTF-8');?>
"></a>

    <div class="component pull-left hidden-md-down"><?php echo $_smarty_tpl->getSubTemplate ("components/layout/quick_access.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
    <div class="component hidden-md-down"><?php echo $_smarty_tpl->getSubTemplate ("components/layout/search_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>


    <div class="component pull-md-right -norightmargin hidden-md-down"><?php echo $_smarty_tpl->getSubTemplate ("components/layout/employee_dropdown.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
    <?php if ($_smarty_tpl->tpl_vars['show_new_orders']->value||$_smarty_tpl->tpl_vars['show_new_customers']->value||$_smarty_tpl->tpl_vars['show_new_messages']->value) {?>
      <div class="component pull-xs-right"><?php echo $_smarty_tpl->getSubTemplate ("components/layout/notifications_center.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
    <?php }?>
    <div class="component pull-md-right hidden-md-down"><?php echo $_smarty_tpl->getSubTemplate ("components/layout/shop_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>
    <?php if (isset($_smarty_tpl->tpl_vars['maintenance_mode']->value)&&$_smarty_tpl->tpl_vars['maintenance_mode']->value==true) {?>
      <div class="component pull-right hidden-md-down">
        <div class="shop-state" id="maintenance-mode">
          <i class="material-icons">build</i>
          <a class="label-tooltip" data-toggle="tooltip" data-placement="bottom" data-html="true" title="<p class='text-left text-nowrap'><strong><?php echo smartyTranslate(array('s'=>'Your shop is in maintenance.'),$_smarty_tpl);?>
</strong></p><p class='text-left'><?php echo smartyTranslate(array('s'=>'Your visitors and customers cannot access your shop while in maintenance mode.%s To manage the maintenance settings, go to Shop Parameters > Maintenance tab.','sprintf'=>array('<br />')),$_smarty_tpl);?>
</p>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminMaintenance'),'html','UTF-8');?>
">
              <?php echo smartyTranslate(array('s'=>'Maintenance mode'),$_smarty_tpl);?>

          </a>
        </div>
      </div>
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['debug_mode']->value)&&$_smarty_tpl->tpl_vars['debug_mode']->value==true) {?>
      <div class="component pull-right hidden-md-down">
        <div class="shop-state" id="debug-mode">
          <i class="material-icons">bug_report</i>
          <span class="label-tooltip" data-toggle="tooltip" data-placement="bottom" data-html="true"
            title="<p class='text-left text-nowrap'><strong><?php echo smartyTranslate(array('s'=>'Your shop is in debug mode.'),$_smarty_tpl);?>
</strong></p><p class='text-left'><?php echo smartyTranslate(array('s'=>'All the PHP errors and messages are displayed. When you no longer need it, [1]turn off[/1] this mode.','html'=>true,'sprintf'=>array('[1]'=>'<strong>','[/1]'=>'</strong>')),$_smarty_tpl);?>
</p>"><?php echo smartyTranslate(array('s'=>'Debug mode'),$_smarty_tpl);?>
</span>
        </div>
      </div>
    <?php }?>
    

    

    
    <?php if (isset($_smarty_tpl->tpl_vars['displayBackOfficeTop']->value)) {?><?php echo $_smarty_tpl->tpl_vars['displayBackOfficeTop']->value;?>
<?php }?>

  </nav>
</header>

<?php echo $_smarty_tpl->getSubTemplate ('components/layout/nav_bar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="main-div">

  <?php if ($_smarty_tpl->tpl_vars['install_dir_exists']->value) {?>

    <div class="alert alert-warning">
      <?php echo smartyTranslate(array('s'=>'For security reasons, you must also delete the /install folder.'),$_smarty_tpl);?>

    </div>

  <?php } else { ?>

    <?php if (isset($_smarty_tpl->tpl_vars['page_header_toolbar']->value)) {?><?php echo $_smarty_tpl->tpl_vars['page_header_toolbar']->value;?>
<?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['modal_module_list']->value)) {?><?php echo $_smarty_tpl->tpl_vars['modal_module_list']->value;?>
<?php }?>

    <div class="content-div <?php if (!isset($_smarty_tpl->tpl_vars['page_header_toolbar']->value)) {?>-notoolbar<?php }?>">

      

      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminAfterHeader'),$_smarty_tpl);?>


      

      <?php echo $_smarty_tpl->getSubTemplate ('components/layout/error_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <?php echo $_smarty_tpl->getSubTemplate ('components/layout/information_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <?php echo $_smarty_tpl->getSubTemplate ('components/layout/confirmation_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <?php echo $_smarty_tpl->getSubTemplate ('components/layout/warning_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


      <div class="row ">
        <div class="col-xs-12">
          <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

        </div>
      </div>

    </div>

  <?php }?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('components/layout/non-responsive.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>



<?php if ($_smarty_tpl->tpl_vars['display_footer']->value) {?>
  <?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['php_errors']->value)) {?>
  <?php echo $_smarty_tpl->getSubTemplate ("error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['modals']->value)) {?>
  <div class="bootstrap">
    <?php echo $_smarty_tpl->tpl_vars['modals']->value;?>

  </div>
<?php }?>

</body>
</html>
<?php }} ?>
