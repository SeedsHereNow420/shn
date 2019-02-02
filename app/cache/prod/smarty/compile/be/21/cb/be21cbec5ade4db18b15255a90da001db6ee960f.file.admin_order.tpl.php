<?php /* Smarty version Smarty-3.1.19, created on 2019-01-07 09:40:27
         compiled from "/var/www/html/SHN/modules/bestkit_custompayment/views/templates/hook/admin_order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8654811245c338f0beb75c9-30856507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be21cbec5ade4db18b15255a90da001db6ee960f' => 
    array (
      0 => '/var/www/html/SHN/modules/bestkit_custompayment/views/templates/hook/admin_order.tpl',
      1 => 1519199423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8654811245c338f0beb75c9-30856507',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cpayment_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c338f0bec01a6_74632607',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c338f0bec01a6_74632607')) {function content_5c338f0bec01a6_74632607($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['cpayment_data']->value['id_bestkit_custompayment_order'])) {?>
    <table>
        <td>
            <tr id="total_cpaymentfee">
                <td class="text-right"><?php echo smartyTranslate(array('s'=>'Fee/discount','mod'=>'bestkit_custompayment'),$_smarty_tpl);?>
</td>
                <td class="amount text-right nowrap"><?php echo Tools::convertPrice($_smarty_tpl->tpl_vars['cpayment_data']->value['fee']);?>
</td>
                <td class="partial_refund_fields current-edit" style="display:none;"></td>
            </tr>
        </td>
    </table>

    <script>
        $( document ).ready(function() {
            $('#total_cpaymentfee').insertAfter('#total_products');
        });
    </script>
<?php }?><?php }} ?>
