{* d='Modules.BestkitCustompayment.PaymentExecFront'} *}

{extends file='page.tpl'}

{block name='page_title'}
    {$customPaymentObj->name|escape:'htmlall':'UTF-8'}
{/block}

{block name='page_content_container'}
	<section>
		<form action="{$link->getModuleLink('bestkit_custompayment', 'payment', [], true)|escape:'htmlall':'UTF-8'}" method="post" id="creditForm" name="creditForm" class="std">
			<div class="box cheque-box">
				{* <h3 class="page-subheading">
					{$customPaymentObj->name|escape:'htmlall':'UTF-8'}
				</h3> *}
				<p class="cheque-indent">
					<div class="desc_short">{$customPaymentObj->description_short|escape:'htmlall':'UTF-8'}</div>

					<div class="desc">{$customPaymentObj->description nofilter}</div> {* |escape:'htmlall':'UTF-8' is not possible using there *}

					{if $customPaymentObj->description_short || $customPaymentObj->description}
						<hr>
					{/if}

					<strong class="dark">{l s='Here is a short summary of your order:' mod='bestkit_custompayment'}</strong>

					<p>
						{l s='- The total amount of your order comes to:' mod='bestkit_custompayment'}<span id="amount" class="price"> {Tools::displayPrice($total)}</span> {l s='(tax incl.)' mod='bestkit_custompayment'}
					</p>

					<p>
						{l s='- The fee/discount of your order comes to:' mod='bestkit_custompayment'}<span id="amount" class="price"> {Tools::displayPrice($custom_payment_fee)}</span>
					</p>

					<strong class="dark">{l s='Confirm your order of' mod='bestkit_custompayment'} <b class="price">{Tools::displayPrice($total+$custom_payment_fee)}</b> {l s='by clicking the button "Confirm my order"' mod='bestkit_custompayment'}</strong>
				</p>
			</div>

			<p class="cart_navigation clearfix" id="cart_navigation">
				<a class="button btn btn-default button-medium" href="{$link->getPageLink('order', true, NULL, "step=3")|escape:'htmlall':'UTF-8'}">
					<i class="icon-chevron-left"></i>{l s='Other payment methods' mod='bestkit_custompayment'}
				</a>
				<button class="btn btn-primary" type="submit">
					<span>{l s='Confirm my order' mod='bestkit_custompayment'}<i class="icon-chevron-right right"></i></span>
				</button>
			</p>

			<input type="hidden" name="submit_payment" />
			<input type="hidden" name="id" value="{$customPaymentObj->id|intval}" />
		</form>
	</section>
{/block}