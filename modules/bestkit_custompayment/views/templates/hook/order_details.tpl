<div class="bestkit_custompayment_wrapper">
	<h3>{l s='Order has fee' sprintf=$custom_payment_fee mod='bestkit_custompayment'}</h3>

	<div>{l s='- The total amount of your order comes to:' mod='bestkit_custompayment'}<span id="amount" class="price"> {Tools::displayPrice($total)}</span> {l s='(tax incl.)' mod='bestkit_custompayment'}</div>
		
	<div>{l s='- The fee/discount of your order comes to:' mod='bestkit_custompayment'}<span id="amount" class="price"> {Tools::displayPrice($custom_payment_fee)}</span></div>
		
	{$order_confirmation_text} {*|escape:'htmlall':'UTF-8' is not possible using here*}
		
	<div>{l s='For any questions or for further information, please contact our' mod='bestkit_custompayment'} <a href="{$link->getPageLink('contact', true)|escape:'htmlall':'UTF-8'}">{l s='customer service department.' mod='bestkit_custompayment'}</a></div>
</div>



<table>
	<tr class="item bestkit_custompayment_row">
		<td colspan="1">
			<strong>{l s='Order fee' mod='bestkit_custompayment'}</strong>
		</td>
		<td colspan="4">
			<span class="custom_payment_fee price">{Tools::displayPrice($custom_payment_fee)}</span>
		</td>
	</tr>
</table>

<script>
	$('.bestkit_custompayment_row').insertBefore($('.totalprice.item'))
</script>
