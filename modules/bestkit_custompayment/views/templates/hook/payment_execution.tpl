{* d='Modules.BestkitCustompayment.PaymentExecHook'} *}

<style>
	p.payment_module a#bestkit_custompayment_{$bestkit_custompayment.id_bestkit_custompayment|intval} {
		background: url({$bestkit_custompayment.src|escape:'htmlall':'UTF-8'}) 15px 15px no-repeat #fbfbfb;
	}
</style>

<div class="row">
	<div class="col-xs-12 col-md-6">
        {$bestkit_custompayment.description nofilter}
        {if $bestkit_custompayment.commision_percent != 0 || $bestkit_custompayment.commision_amount != 0}
			<span>
                {if $bestkit_custompayment.commision_percent != 0}
                    {if $bestkit_custompayment.commision_percent > 0}
                        {l s='Fee:' mod='bestkit_custompayment'} {l s='+' mod='bestkit_custompayment'}
                    {else}
                        {l s='Discount:' mod='bestkit_custompayment'}
                    {/if}
                    {$bestkit_custompayment.commision_percent|number_format:2:".":","}%;
                {/if}
                {if $bestkit_custompayment.commision_amount != 0}
                    {if $bestkit_custompayment.commision_amount > 0}
                        {l s='Fee:' mod='bestkit_custompayment'} {l s='+' mod='bestkit_custompayment'}
                    {else}
                        {l s='Discount:' mod='bestkit_custompayment'}
                    {/if}
                    {$bestkit_custompayment.commision_amount|number_format:2:".":","} {$bestkit_custompayment.commision_currency_human->iso_code|escape:'htmlall':'UTF-8'};
                {/if}
			</span>
        {/if}
	</div>
</div>