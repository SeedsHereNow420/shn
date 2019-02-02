{if isset($cpayment_data.id_bestkit_custompayment_order)}
    <table>
        <td>
            <tr id="total_cpaymentfee">
                <td class="text-right">{l s='Fee/discount' mod='bestkit_custompayment'}</td>
                <td class="amount text-right nowrap">{Tools::convertPrice($cpayment_data.fee)}</td>
                <td class="partial_refund_fields current-edit" style="display:none;"></td>
            </tr>
        </td>
    </table>

    <script>
        $( document ).ready(function() {
            $('#total_cpaymentfee').insertAfter('#total_products');
        });
    </script>
{/if}