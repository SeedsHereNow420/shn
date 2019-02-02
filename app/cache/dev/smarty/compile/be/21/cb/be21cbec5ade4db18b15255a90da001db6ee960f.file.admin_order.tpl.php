<?php /* Smarty version Smarty-3.1.19, created on 2019-01-09 12:22:38
         compiled from "/var/www/html/SHN/modules/bestkit_custompayment/views/templates/hook/admin_order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21390308265c36580e9453f4-15942331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '21390308265c36580e9453f4-15942331',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cpayment_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c36580e975784_89026272',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c36580e975784_89026272')) {function content_5c36580e975784_89026272($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['cpayment_data']->value['id_bestkit_custompayment_order'])) {?>
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
