{if isset($slides)}
    <div class="container">
        <div class="row swiper_2_box">
            {math assign="slider_column_width" equation='x*y/y' x=$slides['two_slider_width'] y=10} 
            {math assign="banner_column_width" equation='(12-x)*y/y' x=$slides['two_slider_width'] y=10}
            <div class="swiper_2_left col-md-{$slider_column_width|replace:'.':'-'}">
                {if isset($slides['slide']) && count($slides['slide'])}
                    <div id="st_swiper_{$slides.id_st_swiper_group}" class="swiper-container {if $slides.prev_next>1} swiper-button-lr {if $slides.prev_next==6 || $slides.prev_next==7} swiper-navigation-circle {elseif $slides.prev_next==4 || $slides.prev_next==5} swiper-navigation-rectangle  {elseif $slides.prev_next==8 || $slides.prev_next==9} swiper-navigation-arrow {elseif $slides.prev_next==2 || $slides.prev_next==3} swiper-navigation-full {/if} {if $slides.prev_next==2 || $slides.prev_next==4 || $slides.prev_next==6|| $slides.prev_next==8} swiper-navigation_visible {/if}{/if}">
                        <div class="swiper-wrapper"> 
                        {foreach $slides['slide'] as $banner}
                            {include file="module:stswiper/views/templates/hook/stswiper-block.tpl" banner_data=$banner}
                        {/foreach}
                        </div>
                        {if $slides.prev_next>1}
                            <div class="swiper-button swiper-button-next"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
                            <div class="swiper-button swiper-button-prev"><i class="fto-left-open-3 slider_arrow_left"></i><i class="fto-right-open-3 slider_arrow_right"></i></div>
                        {/if}
                        {if $slides.pag_nav}
                        <div class="swiper-pagination {if $slides.pag_nav==2} swiper-pagination-st-custom {elseif $slides.pag_nav==4} swiper-pagination-st-round {/if}"></div>
                        {/if}
                        {if $slides.progress_bar}<div class="swiper_custom_progress swiper_custom_progress_{$slides.progress_bar}"><div class="swiper_custom_bar"></div></div>{/if}
                    </div>
                    {include file="module:stswiper/views/templates/hook/stswiper-script.tpl"}
                {/if}
            </div>
            <div class="swiper_2_right col-md-{$banner_column_width|replace:'.':'-'}">
                {if isset($slides['banners']) && count($slides['banners'])}
                    <div class="st_swiper_banner st_swiper_banner_nbr_{count($slides['banners'])} clearfix">
                        {foreach $slides['banners'] as $banner}
                            {include file="module:stswiper/views/templates/hook/stswiper-block.tpl" banner_data=$banner isbanner=1}
                        {/foreach}
                    </div>
                {/if}
            </div>
        </div>
    </div>
{/if}