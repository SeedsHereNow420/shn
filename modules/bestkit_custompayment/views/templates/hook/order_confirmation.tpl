{* d='Modules.BestkitCustompayment.OrderConf'} *}


<p>{l s='Your order is complete.' mod='bestkit_custompayment'}
	<br /><br />
	
	<p>{l s='- The total amount of your order comes to:' mod='bestkit_custompayment'}<span id="amount" class="price"> {Tools::displayPrice($total)}</span> {l s='(tax incl.)' mod='bestkit_custompayment'}</p>
	
	<p>{l s='- The fee/discount of your order comes to:' mod='bestkit_custompayment'}<span id="amount" class="price"> {Tools::displayPrice($custom_payment_fee)}</span></p>
	
	{$order_confirmation_text} {*|escape:'htmlall':'UTF-8' is not possible using here*}
	
	<br />{l s='For any questions or for further information, please contact our' mod='bestkit_custompayment'} <a href="{$link->getPageLink('contact', true)|escape:'htmlall':'UTF-8'}">{l s='customer service department.' mod='bestkit_custompayment'}</a>
</p>