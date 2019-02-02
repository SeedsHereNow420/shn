<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:37:09
         compiled from "/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/personal-information.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10204011395c322eb5cb70c3-22190483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32ac6f64f6267f7de325aaf9c2279c4c96006004' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/personal-information.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
    'c1dd22c22d3b86ef11ef70d5ea8456804fe446b4' => 
    array (
      0 => '/var/www/html/SHN/themes/transformer/templates/checkout/_partials/steps/checkout-step.tpl',
      1 => 1512351208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10204011395c322eb5cb70c3-22190483',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'identifier' => 0,
    'step_is_current' => 0,
    'step_is_reachable' => 0,
    'step_is_complete' => 0,
    'position' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322eb5cd22e6_97815403',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322eb5cd22e6_97815403')) {function content_5c322eb5cd22e6_97815403($_smarty_tpl) {?>

<section  id    = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8');?>
"
          class = "<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['classnames'][0][0]->smartyClassnames(array('checkout-step'=>true,'-current'=>$_smarty_tpl->tpl_vars['step_is_current']->value,'-reachable'=>$_smarty_tpl->tpl_vars['step_is_reachable']->value,'-complete'=>$_smarty_tpl->tpl_vars['step_is_complete']->value,'js-current-step'=>$_smarty_tpl->tpl_vars['step_is_current']->value)), ENT_QUOTES, 'UTF-8');?>
"
>
  <div class="step-title flex_container">
    <div class="heading_color fs_lg font-weight-bold">
      <i class="fto-ok-1 fs_md done"></i>
      <span class="step-number"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['position']->value, ENT_QUOTES, 'UTF-8');?>
</span>
      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8');?>

    </div>
    <a href="javascript:;" class="step-edit text_color" title="<?php echo smartyTranslate(array('s'=>'Edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"><i class="fto-edit fs_md mar_r4 edit"></i><?php echo smartyTranslate(array('s'=>'Edit','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
</a>
  </div>

  <div class="content">
    
  <?php if ($_smarty_tpl->tpl_vars['customer']->value['is_logged']&&!$_smarty_tpl->tpl_vars['customer']->value['is_guest']) {?>

    <p class="identity">
      
      <?php echo smartyTranslate(array('s'=>'Connected as [1]%firstname% %lastname%[/1].','d'=>'Shop.Theme.Customeraccount','sprintf'=>array('[1]'=>"<a href='".((string)$_smarty_tpl->tpl_vars['urls']->value['pages']['identity'])."'>",'[/1]'=>"</a>",'%firstname%'=>$_smarty_tpl->tpl_vars['customer']->value['firstname'],'%lastname%'=>$_smarty_tpl->tpl_vars['customer']->value['lastname'])),$_smarty_tpl);?>

    </p>
    <p>
      
      <?php echo smartyTranslate(array('s'=>'Not you? [1]Log out[/1]','d'=>'Shop.Theme.Customeraccount','sprintf'=>array('[1]'=>"<a href='".((string)$_smarty_tpl->tpl_vars['urls']->value['actions']['logout'])."'>",'[/1]'=>"</a>")),$_smarty_tpl);?>

    </p>
    <?php if (!isset($_smarty_tpl->tpl_vars['empty_cart_on_logout']->value)||$_smarty_tpl->tpl_vars['empty_cart_on_logout']->value) {?>
      <p><?php echo smartyTranslate(array('s'=>'If you sign out now, your cart will be emptied.','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
</p>
    <?php }?>
  <?php } else { ?>
    <div class="sttab_block sttab_2 sttab_2_1">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link <?php if (!$_smarty_tpl->tpl_vars['show_login_form']->value) {?>active<?php }?>" data-toggle="tab" href="#checkout-guest-form" role="tab" title="<?php if ($_smarty_tpl->tpl_vars['guest_allowed']->value) {?><?php echo smartyTranslate(array('s'=>'Order as a guest','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Create an account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
<?php }?>">
          <?php if ($_smarty_tpl->tpl_vars['guest_allowed']->value) {?>
            <?php echo smartyTranslate(array('s'=>'Order as a guest','d'=>'Shop.Theme.Checkout'),$_smarty_tpl);?>

          <?php } else { ?>
            <?php echo smartyTranslate(array('s'=>'Create an account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>

          <?php }?>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link <?php if ($_smarty_tpl->tpl_vars['show_login_form']->value) {?>active<?php }?>"
          data-link-action="show-login-form"
          data-toggle="tab"
          href="#checkout-login-form"
          role="tab"
          title="<?php echo smartyTranslate(array('s'=>'Sign in','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>
"
        >
          <?php echo smartyTranslate(array('s'=>'Sign in','d'=>'Shop.Theme.Actions'),$_smarty_tpl);?>

        </a>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane <?php if (!$_smarty_tpl->tpl_vars['show_login_form']->value) {?>active<?php }?>" id="checkout-guest-form" role="tabpanel">
        <div class="tab-pane-body">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0][0]->smartyRender(array('file'=>'checkout/_partials/customer-form.tpl','ui'=>$_smarty_tpl->tpl_vars['register_form']->value,'guest_allowed'=>$_smarty_tpl->tpl_vars['guest_allowed']->value),$_smarty_tpl);?>

        </div>
      </div>
      <div class="tab-pane <?php if ($_smarty_tpl->tpl_vars['show_login_form']->value) {?>active<?php }?>" id="checkout-login-form" role="tabpanel">
        <div class="tab-pane-body">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['render'][0][0]->smartyRender(array('file'=>'checkout/_partials/login-form.tpl','ui'=>$_smarty_tpl->tpl_vars['login_form']->value),$_smarty_tpl);?>

        </div>
      </div>
    </div>
    </div>


  <?php }?>

  </div>
</section>
<?php }} ?>
