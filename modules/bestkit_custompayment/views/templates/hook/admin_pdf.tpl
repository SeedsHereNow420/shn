{if isset($cpayment_data.id_bestkit_custompayment_order)}
    <table width="100%">
        <tbody>
            <tr>
                <th class="header small">{l s='Fee/discount' mod='bestkit_custompayment'}</th>
                <th class="header small">{l s='Amount' mod='bestkit_custompayment'}</th>
            </tr>
            <tr class="product">
                <td class="product center">
                    {l s='Payment method fee' mod='bestkit_custompayment'}
                </td>
                <td class="product center">{Tools::convertPrice($cpayment_data.fee)}</td>
            </tr>
        </tbody>
    </table>
{/if}