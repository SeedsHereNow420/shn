<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:18:07
         compiled from "module:stcustomersignin/views/templates/hook/stcustomersignin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11102842455c31abaf7b27d7-14596582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43b8c09337d64b800baa98253de92269f5c603b2' => 
    array (
      0 => 'module:stcustomersignin/views/templates/hook/stcustomersignin.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '11102842455c31abaf7b27d7-14596582',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
    'welcome_logged' => 0,
    'welcome_link' => 0,
    'show_welcome_msg' => 0,
    'userinfo_dropdown' => 0,
    'my_account_url' => 0,
    'show_user_info_icons' => 0,
    'customerName' => 0,
    'show_love' => 0,
    'show_wishlist' => 0,
    'logout_url' => 0,
    'welcome' => 0,
    'userinfo_login' => 0,
    'authentication_url' => 0,
    'formFields' => 0,
    'field' => 0,
    'urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31abaf7e2c04_48651264',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31abaf7e2c04_48651264')) {function content_5c31abaf7e2c04_48651264($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
		<?php if (isset($_smarty_tpl->tpl_vars['welcome_logged']->value)&&trim($_smarty_tpl->tpl_vars['welcome_logged']->value)) {?><?php if ($_smarty_tpl->tpl_vars['welcome_link']->value) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome_link']->value, ENT_QUOTES, 'UTF-8');?>
" class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>" rel="nofollow" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome_logged']->value, ENT_QUOTES, 'UTF-8');?>
"><?php } else { ?><span class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>"><?php }?><span class="header_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome_logged']->value, ENT_QUOTES, 'UTF-8');?>
</span><?php if ($_smarty_tpl->tpl_vars['welcome_link']->value) {?></a><?php } else { ?></span><?php }?><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['userinfo_dropdown']->value) {?>
			<div class="userinfo_mod_top dropdown_wrap top_bar_item"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value, ENT_QUOTES, 'UTF-8');?>
" class="dropdown_tri dropdown_tri_in header_item" title="<?php echo smartyTranslate(array('s'=>'View my customer account','d'=>'Shop.Theme.Customeraccount'),$_smarty_tpl);?>
" rel="nofollow" aria-haspopup="true" aria-expanded="false"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="fto-user icon_btn header_v_align_m fs_lg mar_r4"></i><?php }?><span class="header_v_align_m"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customerName']->value, ENT_QUOTES, 'UTF-8');?>
</span><i class="fto-angle-down arrow_down arrow"></i><i class="fto-angle-up arrow_up arrow"></i></a>
		        <div class="dropdown_list">
            		<ul class="dropdown_list_ul dropdown_box custom_links_list">
            			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" rel="nofollow" class="dropdown_list_item"><?php echo smartyTranslate(array('s'=>'My account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a></li>
						<?php if ($_smarty_tpl->tpl_vars['show_love']->value) {?><li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'module','name'=>'stlovedproduct','controller'=>'myloved'),$_smarty_tpl);?>
" rel="nofollow" class="dropdown_list_item" title="<?php echo smartyTranslate(array('s'=>'Loved items','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Loved items','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a></li><?php }?>
						<?php if ($_smarty_tpl->tpl_vars['show_wishlist']->value) {?><li><a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->getUrlSmarty(array('entity'=>'module','name'=>'stwishlist','controller'=>'mywishlist'),$_smarty_tpl);?>
" rel="nofollow" class="dropdown_list_item" title="<?php echo smartyTranslate(array('s'=>'Wishlist','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Wishlist','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a></li><?php }?>
						<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logout_url']->value, ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" class="dropdown_list_item" title="<?php echo smartyTranslate(array('s'=>'Log me out','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Sign out','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</a></li>
		    		</ul>
		        </div>
		    </div>
		<?php } else { ?>
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" class="account top_bar_item" rel="nofollow"><span class="header_item"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="fto-user icon_btn header_v_align_m <?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value!=2) {?>fs_lg<?php } else { ?>fs_big<?php }?> mar_r4"></i><?php }?><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value!=2) {?><span class="header_v_align_m"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customerName']->value, ENT_QUOTES, 'UTF-8');?>
</span><?php }?></span></a>
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
" class="my_account_link top_bar_item" rel="nofollow"><span class="header_item"><?php echo smartyTranslate(array('s'=>'My account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span></a>
			<a class="logout top_bar_item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logout_url']->value, ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log me out','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><span class="header_item"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="fto-logout <?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value!=2) {?>fs_lg<?php } else { ?>fs_big<?php }?> mar_r4 header_v_align_m"></i><?php }?><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value!=2) {?><span class="header_v_align_m"><?php echo smartyTranslate(array('s'=>'Sign out','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span><?php }?></span></a>
		<?php }?>
<?php } else { ?>
		<?php if (isset($_smarty_tpl->tpl_vars['welcome']->value)&&trim($_smarty_tpl->tpl_vars['welcome']->value)) {?><?php if ($_smarty_tpl->tpl_vars['welcome_link']->value) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome_link']->value, ENT_QUOTES, 'UTF-8');?>
" class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>" rel="nofollow" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome']->value, ENT_QUOTES, 'UTF-8');?>
"><?php } else { ?><span class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>"><?php }?><span class="header_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['welcome']->value, ENT_QUOTES, 'UTF-8');?>
</span><?php if ($_smarty_tpl->tpl_vars['welcome_link']->value) {?></a><?php } else { ?></span><?php }?><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['userinfo_login']->value) {?>
			<div class="quick_login dropdown_wrap top_bar_item"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value, ENT_QUOTES, 'UTF-8');?>
" class="dropdown_tri dropdown_tri_in header_item" aria-haspopup="true" aria-expanded="false" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log in to your customer account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="fto-user icon_btn header_v_align_m <?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value!=2) {?>fs_lg<?php } else { ?>fs_big<?php }?> mar_r4"></i><?php }?><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value!=2) {?><span class="header_v_align_m"><?php echo smartyTranslate(array('s'=>'Login','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span><?php }?><i class="fto-angle-down arrow_down arrow"></i><i class="fto-angle-up arrow_up arrow"></i></a>
		        <div class="dropdown_list" aria-labelledby="<?php echo smartyTranslate(array('s'=>'Login','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
		            <div class="dropdown_box login_from_block">
		    			<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['authentication_url']->value, ENT_QUOTES, 'UTF-8');?>
" method="post">
						  <div class="form_content">
					        <?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['formFields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value) {
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?>
					            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['form_field'][0][0]->smartyFormField(array('field'=>$_smarty_tpl->tpl_vars['field']->value,'file'=>'_partials/form-fields-1.tpl'),$_smarty_tpl);?>

					        <?php } ?>
						      <div class="form-group forgot-password">
						          <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['password'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Forgot your password?','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
						            <?php echo smartyTranslate(array('s'=>'Forgot your password?','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

						          </a>
						      </div>
						  </div>
						  <footer class="form-footer">
						    <input type="hidden" name="submitLogin" value="1">
						    <button class="btn btn-primary btn-spin btn-full-width" data-link-action="sign-in" type="submit" id="SubmitLogin">
						      <i class="fto-lock fto_small"></i>
						      <?php echo smartyTranslate(array('s'=>'Sign in','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

						    </button>
						    <a class="btn btn-link btn-full-width btn-spin js-submit-active" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pages']['register'], ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Create an account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
">
								<?php echo smartyTranslate(array('s'=>'Create an account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>

							</a>
						  </footer>

						</form>

		    		</div>
		        </div>
		    </div>
		<?php } else { ?>
		<a class="login top_bar_item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['my_account_url']->value, ENT_QUOTES, 'UTF-8');?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log in to your customer account','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
"><span class="header_item"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="fto-user icon_btn header_v_align_m <?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value!=2) {?>fs_lg<?php } else { ?>fs_big<?php }?> mar_r4"></i><?php }?><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value!=2) {?><span class="header_v_align_m"><?php echo smartyTranslate(array('s'=>'Login','d'=>'Shop.Theme.Transformer'),$_smarty_tpl);?>
</span><?php }?></span></a>
		<?php }?>
<?php }?><?php }} ?>
