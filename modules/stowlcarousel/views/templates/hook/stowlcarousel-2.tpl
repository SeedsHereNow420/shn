{if isset($slides)}
    <div class="container">
        <div class="row">
            {math assign="slider_column_width" equation='x*y/y' x=$slides['two_slider_width'] y=10} 
            {math assign="banner_column_width" equation='(12-x)*y/y' x=$slides['two_slider_width'] y=10}
            <div class="col-md-{$slider_column_width|replace:'.':'-'}">
                {if isset($slides['slide']) && count($slides['slide'])}
                    <div id="st_owl_carousel-{$slides.id_st_owl_carousel_group}" class="{if count($slides['slide'])>1} owl-carousel owl-theme {if $slides['prev_next']} owl-navigation-lr {if $slides['prev_next']==4 || $slides['prev_next']==6} owl-navigation-circle {elseif $slides['prev_next']==3 || $slides['prev_next']==5} owl-navigation-rectangle {/if} {if $slides['prev_next']==2 || $slides['prev_next']==3 || $slides['prev_next']==4} owl-navigation_visible {/if}{/if}{/if}">
                        {foreach $slides['slide'] as $banner}
                            {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-block.tpl" banner_data=$banner}
                        {/foreach}
                    </div>
                    {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-script.tpl" js_data=$slides}
                {/if}
            </div>
            <div class="col-md-{$banner_column_width|replace:'.':'-'}">
                {if isset($slides['banners']) && count($slides['banners'])}
                    <div class="owl-carousel-banner carousel_banner_nbr_{count($slides['banners'])} clearfix">
                        {foreach $slides['banners'] as $banner}
                            {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-block.tpl" banner_data=$banner}
                        {/foreach}
                    </div>
                {/if}
            </div>
        </div>
    </div>
{/if}
