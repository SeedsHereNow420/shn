<!-- MODULE stowlcarousel -->
{if isset($slides)}
    {if isset($slides['slide']) && count($slides['slide'])}
        <div id="st_owl_carousel-{$slides.id_st_owl_carousel_group}" class="{if count($slides['slide'])>1} owl-carousel owl-theme {if $slides['prev_next']} owl-navigation-lr {if $slides['prev_next']==4 || $slides['prev_next']==6} owl-navigation-circle {elseif $slides['prev_next']==3 || $slides['prev_next']==5} owl-navigation-rectangle {/if} {if $slides['prev_next']==1 || $slides['prev_next']==5 || $slides['prev_next']==6} owl-navigation_visible {/if}{/if}{/if}">
            {foreach $slides['slide'] as $banner}
                {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-block.tpl" banner_data=$banner}
            {/foreach}
        </div>
        {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-script.tpl" js_data=$slides}
    {/if}
{/if}
<!--/ MODULE stowlcarousel -->