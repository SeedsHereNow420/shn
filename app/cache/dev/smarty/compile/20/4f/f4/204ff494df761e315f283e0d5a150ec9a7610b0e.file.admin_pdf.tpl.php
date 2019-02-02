<?php /* Smarty version Smarty-3.1.19, created on 2019-01-06 08:23:42
         compiled from "modules/bestkit_custompayment/views/templates/hook/admin_pdf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7851246205c322b8ea59d84-79694992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '204ff494df761e315f283e0d5a150ec9a7610b0e' => 
    array (
      0 => 'modules/bestkit_custompayment/views/templates/hook/admin_pdf.tpl',
      1 => 1519199423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7851246205c322b8ea59d84-79694992',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cpayment_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c322b8ea5d229_40487544',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c322b8ea5d229_40487544')) {function content_5c322b8ea5d229_40487544($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['cpayment_data']->value['id_bestkit_custompayment_order'])) {?>
    <table width="100%">
        <tbody>
            <tr>
                <th class="header small"><?php echo smartyTranslate(array('s'=>'Fee/discount','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
</th>
                <th class="header small"><?php echo smartyTranslate(array('s'=>'Amount','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
</th>
            </tr>
            <tr class="product">
                <td class="product center">
                    <?php echo smartyTranslate(array('s'=>'Payment method fee','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>

                </td>
                <td class="product center"><?php echo htmlspecialchars(Tools::convertPrice($_smarty_tpl->tpl_vars['cpayment_data']->value['fee']), ENT_QUOTES, 'UTF-8');?>
</td>
            </tr>
        </tbody>
    </table>
<?php }?><?php }} ?>
