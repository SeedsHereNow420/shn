<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:14:03
         compiled from "/var/www/html/SHN/nimda420/themes/default/template/page_header_toolbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6380093095c31aabb28cb80-12399524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0eb3a98f04fb86334cfe3aa6fc1ae86d76cc839d' => 
    array (
      0 => '/var/www/html/SHN/nimda420/themes/default/template/page_header_toolbar.tpl',
      1 => 1508771956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6380093095c31aabb28cb80-12399524',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'page_header_toolbar_title' => 0,
    'page_header_toolbar_btn' => 0,
    'current_tab_level' => 0,
    'breadcrumbs2' => 0,
    'toolbar_btn' => 0,
    'k' => 0,
    'table' => 0,
    'btn' => 0,
    'help_link' => 0,
    'tab_modules_open' => 0,
    'tab_modules_list' => 0,
    'tabs' => 0,
    'level_1' => 0,
    'level_2' => 0,
    'level_3' => 0,
    'level_4' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31aabb2ccf18_49604825',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31aabb2ccf18_49604825')) {function content_5c31aabb2ccf18_49604825($_smarty_tpl) {?>


<?php if (!isset($_smarty_tpl->tpl_vars['title']->value)&&isset($_smarty_tpl->tpl_vars['page_header_toolbar_title']->value)) {?>
  <?php $_smarty_tpl->tpl_vars['title'] = new Smarty_variable($_smarty_tpl->tpl_vars['page_header_toolbar_title']->value, null, 0);?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['page_header_toolbar_btn']->value)) {?>
  <?php $_smarty_tpl->tpl_vars['toolbar_btn'] = new Smarty_variable($_smarty_tpl->tpl_vars['page_header_toolbar_btn']->value, null, 0);?>
<?php }?>

<div class="bootstrap">
  <div class="page-head <?php if (isset($_smarty_tpl->tpl_vars['current_tab_level']->value)&&$_smarty_tpl->tpl_vars['current_tab_level']->value==3) {?>with-tabs<?php }?>">
    
      <h2 class="page-title">
        
        <?php if (is_array($_smarty_tpl->tpl_vars['title']->value)) {?><?php echo preg_replace('!<[^>]*?>!', ' ', end($_smarty_tpl->tpl_vars['title']->value));?>
<?php } else { ?><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['title']->value);?>
<?php }?>
      </h2>
    

    
      <ul class="breadcrumb page-breadcrumb">
        
        <?php if ($_smarty_tpl->tpl_vars['breadcrumbs2']->value['container']['name']!='') {?>
          <li class="breadcrumb-container">
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['breadcrumbs2']->value['container']['name']);?>

          </li>
        <?php }?>

        
        <?php if ($_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['name']!=''&&$_smarty_tpl->tpl_vars['breadcrumbs2']->value['container']['name']!=$_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['name']) {?>
          <li class="breadcrumb-current">
            <?php if ($_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['href']!='') {?><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['href']);?>
"><?php }?>
              <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['name']);?>

              <?php if ($_smarty_tpl->tpl_vars['breadcrumbs2']->value['tab']['href']!='') {?></a><?php }?>
          </li>
        <?php }?>

        
        
      </ul>
    
    
      <div class="page-bar toolbarBox">
        <div class="btn-toolbar">
          <a href="#" class="toolbar_btn dropdown-toolbar navbar-toggle" data-toggle="collapse"
             data-target="#toolbar-nav"><i class="process-icon-dropdown"></i>
            <div><?php echo smartyTranslate(array('s'=>'Menu'),$_smarty_tpl);?>
</div>
          </a>
          <ul id="toolbar-nav" class="nav nav-pills pull-right collapse navbar-collapse">
            <?php  $_smarty_tpl->tpl_vars['btn'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['btn']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['toolbar_btn']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['btn']->key => $_smarty_tpl->tpl_vars['btn']->value) {
$_smarty_tpl->tpl_vars['btn']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['btn']->key;
?>
              <?php if ($_smarty_tpl->tpl_vars['k']->value!='back'&&$_smarty_tpl->tpl_vars['k']->value!='modules-list') {?>
                <li>
                  <a id="page-header-desc-<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
-<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['imgclass'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['btn']->value['imgclass']);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php }?>"
                     class="toolbar_btn <?php if (isset($_smarty_tpl->tpl_vars['btn']->value['target'])&&$_smarty_tpl->tpl_vars['btn']->value['target']) {?> _blank<?php }?> pointer"<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['href'])) {?> href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['btn']->value['href']);?>
"<?php }?>
                     title="<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['help'])) {?><?php echo $_smarty_tpl->tpl_vars['btn']->value['help'];?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['btn']->value['desc']);?>
<?php }?>"<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['js'])&&$_smarty_tpl->tpl_vars['btn']->value['js']) {?> onclick="<?php echo $_smarty_tpl->tpl_vars['btn']->value['js'];?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['btn']->value['modal_target'])&&$_smarty_tpl->tpl_vars['btn']->value['modal_target']) {?> data-target="<?php echo $_smarty_tpl->tpl_vars['btn']->value['modal_target'];?>
" data-toggle="modal"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['btn']->value['help'])) {?> data-toggle="tooltip" data-placement="bottom"<?php }?>>
                    <i
                      class="<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['icon'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['btn']->value['icon']);?>
<?php } else { ?>process-icon-<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['imgclass'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['btn']->value['imgclass']);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php }?><?php }?><?php if (isset($_smarty_tpl->tpl_vars['btn']->value['class'])) {?> <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['btn']->value['class']);?>
<?php }?>"></i>
                    <div<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['force_desc'])&&$_smarty_tpl->tpl_vars['btn']->value['force_desc']==true) {?> class="locked"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['btn']->value['desc']);?>
</div>
                  </a>
                </li>
              <?php }?>
            <?php } ?>
            <?php if (isset($_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list'])) {?>
              <li>
                <a
                  id="page-header-desc-<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
-<?php if (isset($_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['imgclass'])) {?><?php echo $_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['imgclass'];?>
<?php } else { ?>modules-list<?php }?>"
                  class="toolbar_btn<?php if (isset($_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['class'])) {?> <?php echo $_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['class'];?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['target'])&&$_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['target']) {?> _blank<?php }?>"
                  <?php if (isset($_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['href'])) {?>href="<?php echo $_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['href'];?>
"<?php }?>
                  title="<?php echo $_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['desc'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['js'])&&$_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['js']) {?> onclick="<?php echo $_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['js'];?>
"<?php }?>>
                  <i
                    class="<?php if (isset($_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['icon'])) {?><?php echo $_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['icon'];?>
<?php } else { ?>process-icon-<?php if (isset($_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['imgclass'])) {?><?php echo $_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['imgclass'];?>
<?php } else { ?>modules-list<?php }?><?php }?>"></i>
                  <div<?php if (isset($_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['force_desc'])&&$_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['force_desc']==true) {?> class="locked"<?php }?>><?php echo $_smarty_tpl->tpl_vars['toolbar_btn']->value['modules-list']['desc'];?>
</div>
                </a>
              </li>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['help_link']->value)) {?>
              <li>
                <a class="toolbar_btn btn-help" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['help_link']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Help'),$_smarty_tpl);?>
">
                  <i class="process-icon-help"></i>
                  <div><?php echo smartyTranslate(array('s'=>'Help'),$_smarty_tpl);?>
</div>
                </a>
              </li>
            <?php }?>
          </ul>
          <?php if ((isset($_smarty_tpl->tpl_vars['tab_modules_open']->value)&&$_smarty_tpl->tpl_vars['tab_modules_open']->value)||isset($_smarty_tpl->tpl_vars['tab_modules_list']->value)) {?>
            <script type="text/javascript">
              //<![CDATA[
              var modules_list_loaded = false;
              <?php if (isset($_smarty_tpl->tpl_vars['tab_modules_open']->value)&&$_smarty_tpl->tpl_vars['tab_modules_open']->value) {?>
              $(function () {
                $('#modules_list_container').modal('show');
                openModulesList();

              });
              <?php }?>
              <?php if (isset($_smarty_tpl->tpl_vars['tab_modules_list']->value)) {?>
              $('.process-icon-modules-list').parent('a').unbind().bind('click', function (event) {
                event.preventDefault();
                $('#modules_list_container').modal('show');
                openModulesList();
              });
              <?php }?>
              //]]>
            </script>
          <?php }?>
        </div>
      </div>
    
    <?php if (isset($_smarty_tpl->tpl_vars['current_tab_level']->value)&&$_smarty_tpl->tpl_vars['current_tab_level']->value==3) {?>
      <div class="page-head-tabs">
        <?php  $_smarty_tpl->tpl_vars['level_1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['level_1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tabs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['level_1']->key => $_smarty_tpl->tpl_vars['level_1']->value) {
$_smarty_tpl->tpl_vars['level_1']->_loop = true;
?>
          <?php  $_smarty_tpl->tpl_vars['level_2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['level_2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['level_1']->value['sub_tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['level_2']->key => $_smarty_tpl->tpl_vars['level_2']->value) {
$_smarty_tpl->tpl_vars['level_2']->_loop = true;
?>
            <?php  $_smarty_tpl->tpl_vars['level_3'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['level_3']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['level_2']->value['sub_tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['level_3']->key => $_smarty_tpl->tpl_vars['level_3']->value) {
$_smarty_tpl->tpl_vars['level_3']->_loop = true;
?>
              <?php if ($_smarty_tpl->tpl_vars['level_3']->value['current']) {?>
                <?php  $_smarty_tpl->tpl_vars['level_4'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['level_4']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['level_3']->value['sub_tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['level_4']->key => $_smarty_tpl->tpl_vars['level_4']->value) {
$_smarty_tpl->tpl_vars['level_4']->_loop = true;
?>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['level_4']->value['href'];?>
" <?php if ($_smarty_tpl->tpl_vars['level_4']->value['current']) {?>class="current"<?php }?>><?php echo $_smarty_tpl->tpl_vars['level_4']->value['name'];?>
</a>
                <?php } ?>
              <?php }?>
            <?php } ?>
          <?php } ?>
        <?php } ?>
      </div>
    <?php }?>
  </div>
  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayDashboardTop'),$_smarty_tpl);?>

</div>
<?php }} ?>
