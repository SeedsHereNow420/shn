<span class="sale_percentage_sticker">
    {if $percentage_amount=='percentage'}
        {$reduction*100|floatval}%{if $discount_percentage==2}<br/>{else} {/if}{l s='Off' d='Shop.Theme.Transformer'}
    {elseif $percentage_amount=='amount'}
        {l s='Save' d='Shop.Theme.Transformer'}{if $discount_percentage==2}<br/>{else} {/if}{convertPrice price=$price_without_reduction-$price|floatval}
    {/if}
</span>