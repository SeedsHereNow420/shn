<!-- MODULE stowlcarousel -->
{if isset($slides)}
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                {if isset($slides['banners']) && isset($slides['banners'][0])}
                    <div class="owl-carousel-banner">
                        {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-block.tpl" banner_data=$slides['banners'][0]}
                    </div>
                {/if}
            </div>
            <div class="col-12 col-sm-6">
                {if isset($slides['slide']) && count($slides['slide'])}
                    <div id="st_owl_carousel-{$slides.id_st_owl_carousel_group}" class="{if count($slides['slide'])>1} owl-carousel owl-theme owl-navigation-lr {if $slides['prev_next']==2} owl-navigation-rectangle {elseif $slides['prev_next']==3} owl-navigation-circle {/if}{/if}">
                        {foreach $slides['slide'] as $banner}
                            {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-block.tpl" banner_data=$banner}
                        {/foreach}
                    </div>
                    {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-script.tpl" js_data=$slides}
                {/if}
            </div>
            <div class="col-12 col-sm-3">
                {if isset($slides['banners']) && isset($slides['banners'][1])}
                    <div class="owl-carousel-banner">
                        {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-block.tpl" banner_data=$slides['banners'][1]}
                    </div>
                {/if}
            </div>
        </div>
    </div>
{/if}
<!--/ MODULE stowlcarousel -->