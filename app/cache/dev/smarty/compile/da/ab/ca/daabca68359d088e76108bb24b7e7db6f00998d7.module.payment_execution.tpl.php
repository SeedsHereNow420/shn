<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:37:09
         compiled from "module:bestkit_custompayment/views/templates/hook/payment_execution.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16796260255c322eb5d93a03-00897606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'daabca68359d088e76108bb24b7e7db6f00998d7' => 
    array (
      0 => 'module:bestkit_custompayment/views/templates/hook/payment_execution.tpl',
      1 => 1519199423,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '16796260255c322eb5d93a03-00897606',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'bestkit_custompayment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322eb5da09b1_35099303',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322eb5da09b1_35099303')) {function content_5c322eb5da09b1_35099303($_smarty_tpl) {?><!-- begin /var/www/html/SHN/modules/bestkit_custompayment/views/templates/hook/payment_execution.tpl -->

<style>
	p.payment_module a#bestkit_custompayment_<?php echo htmlspecialchars(intval($_smarty_tpl->tpl_vars['bestkit_custompayment']->value['id_bestkit_custompayment']), ENT_QUOTES, 'UTF-8');?>
 {
		background: url(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['bestkit_custompayment']->value['src'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
) 15px 15px no-repeat #fbfbfb;
	}
</style>

<div class="row">
	<div class="col-xs-12 col-md-6">
        <?php echo $_smarty_tpl->tpl_vars['bestkit_custompayment']->value['description'];?>

        <?php if ($_smarty_tpl->tpl_vars['bestkit_custompayment']->value['commision_percent']!=0||$_smarty_tpl->tpl_vars['bestkit_custompayment']->value['commision_amount']!=0) {?>
			<span>
                <?php if ($_smarty_tpl->tpl_vars['bestkit_custompayment']->value['commision_percent']!=0) {?>
                    <?php if ($_smarty_tpl->tpl_vars['bestkit_custompayment']->value['commision_percent']>0) {?>
                        <?php echo smartyTranslate(array('s'=>'Fee:','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'+','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>

                    <?php } else { ?>
                        <?php echo smartyTranslate(array('s'=>'Discount:','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>

                    <?php }?>
                    <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['bestkit_custompayment']->value['commision_percent'],2,".",","), ENT_QUOTES, 'UTF-8');?>
%;
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['bestkit_custompayment']->value['commision_amount']!=0) {?>
                    <?php if ($_smarty_tpl->tpl_vars['bestkit_custompayment']->value['commision_amount']>0) {?>
                        <?php echo smartyTranslate(array('s'=>'Fee:','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'+','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>

                    <?php } else { ?>
                        <?php echo smartyTranslate(array('s'=>'Discount:','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>

                    <?php }?>
                    <?php echo htmlspecialchars(number_format($_smarty_tpl->tpl_vars['bestkit_custompayment']->value['commision_amount'],2,".",","), ENT_QUOTES, 'UTF-8');?>
 <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['bestkit_custompayment']->value['commision_currency_human']->iso_code,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;
                <?php }?>
			</span>
        <?php }?>
	</div>
</div><!-- end /var/www/html/SHN/modules/bestkit_custompayment/views/templates/hook/payment_execution.tpl --><?php }} ?>
