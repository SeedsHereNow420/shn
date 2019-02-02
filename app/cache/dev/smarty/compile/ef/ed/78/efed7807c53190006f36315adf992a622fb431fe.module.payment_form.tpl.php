<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:37:09
         compiled from "module:prismpay/views/templates/front/payment_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12025078945c322eb5d868a8-23715766%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efed7807c53190006f36315adf992a622fb431fe' => 
    array (
      0 => 'module:prismpay/views/templates/front/payment_form.tpl',
      1 => 1538965039,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '12025078945c322eb5d868a8-23715766',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322eb5d877a0_75626978',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322eb5d877a0_75626978')) {function content_5c322eb5d877a0_75626978($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/prismpay/views/templates/front/payment_form.tpl -->

<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8');?>
" method="post" id="prismpay_Form">
<div class=\"threeds_loading\"><div class=\"message\"><p>(VISA OR MASTERCARD ONLY)<br /></p></div></div>
<table class='pc-crd-dtl'>
<tbody>
<tr>
<td colspan='2'  >
<input type="text" placeholder="NAME ON CARD" name="pc_cardholder_name" id="pc_cardholder_name" class="form-control required">
<span>FULL NAME AS IT APPEARS ON YOUR CARD</span>
</td>
</tr>
<tr>
<td colspan='2'  >
<div id='pc-cr-ctn' class='' >
<input type="text" placeholder="CARD NUMBER" name="pc_cardnum" id="pc_cardnum" class="form-control required">
<input type='hidden' name='pc_card_type'  id='pc_card_type' >
<span>FULL CARD NUMBER</span>
</div>
</td>
</tr>
<tr>
<td  >
<input type="text" maxlength="4" placeholder="MMYY" name="pc_exp_date" id="pc_exp_date" class="form-control required">
<span>EXP. DATE MMYY</span>
</td>
<td >
<input type="text" maxlength="4" placeholder="CVV" name="pc_cvv" id="pc_cvv" class="form-control required">
<span>CVV 3-DIGIT CODE</span>
</td>
</tr>
<tr>
<td colspan='2'  >
<div class='errlab' id='errlbctn'>
</div>
</td>
</tr>
</tbody>
</table>
</form><!-- end /var/www/html/SHN/modules/prismpay/views/templates/front/payment_form.tpl --><?php }} ?>
