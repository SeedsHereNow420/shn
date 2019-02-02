{if isset($countdown_active) && $countdown_active}
    {if $product.show_price AND !$sttheme.is_catalog}{if $product.has_discount}
        {if ($smarty.now|date_format:'%Y-%m-%d %H:%M:%S' >= $product.specific_prices.from && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' < $product.specific_prices.to)}
            {if $countdown_v_alignment!=2}
                <div class="countdown_wrap countdown_timer countdown_style_{$countdown_style|default:0} {if $countdown_v_alignment} v_middle{/if} {if isset($for_w) && $for_w=='category'} c_countdown_timer{else} s_countdown_timer{/if}" data-countdown="{$product.specific_prices.to|date_format:'%Y/%m/%d %H:%M:%S'}" data-gmdate="{gmdate('Y/m/d H:i:s',strtotime($product.specific_prices.to))}" data-id-product="{$product.id_product}"></div>
            {else}
                <div class="countdown_outer_box">
                    <div class="countdown_box">
                        <i class="icon-clock"></i><span class="countdown_pro {if isset($for_w) && $for_w=='category'} c_countdown_timer{else} s_countdown_timer{/if}" data-countdown="{$product.specific_prices.to|date_format:'%Y/%m/%d %H:%M:%S'}" data-gmdate="{gmdate('Y/m/d H:i:s',strtotime($product.specific_prices.to))}" data-id-product="{$product.id_product}"></span>
                    </div>
                </div>
            {/if}
        {elseif ($product.specific_prices.to == '0000-00-00 00:00:00') && ($product.specific_prices.from == '0000-00-00 00:00:00') && $countdown_title_aw_display}
            {if $countdown_v_alignment!=2}
                <div class="countdown_wrap s_countdown_perm {if $countdown_v_alignment} v_middle{/if}" data-id-product="{$product.id_product}">
                    <div class="countdown_title">{l s='Limited special offer' d='Shop.Theme.Transformer'}</div>
                </div>
            {else}
                <div class="countdown_outer_box countdown_pro_perm" data-id-product="{$product.id_product}">
                    <div class="countdown_box">
                        <i class="icon-clock"></i><span>{l s='Limited special offer' d='Shop.Theme.Transformer'}</span>
                    </div>
                </div>
            {/if}
        {/if}
    {/if}{/if}
{/if}