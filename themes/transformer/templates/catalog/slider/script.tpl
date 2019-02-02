    <script type="text/javascript">
    //<![CDATA[
        {literal}
        if(typeof(swiper_options) ==='undefined')
        var swiper_options = [];
        {/literal}
        {literal}
        swiper_options.push({
            {/literal}
            {if $slider_slideshow}
                autoplay: {$slider_s_speed|default:5000},
                {if $slider_slideshow==2}autoplayStopOnLast: true,{/if}
            {/if}
            speed: {if $slider_a_speed}{$slider_a_speed}{else}400{/if},
            autoplayDisableOnInteraction: {if $slider_pause_on_hover}true{else}false{/if},
            loop: {if $rewind_nav}true{else}false{/if},
            {if $lazy_load && (!$sttheme.pro_tm_slider || (isset($is_product_slider) && !$is_product_slider))}
                lazyLoading: true,
                onLazyImageReady: function(swiper, slide, image){
                    if($(image).hasClass('front-image'))
                        $(image).parent().removeClass('is_lazy');//also in pro-lazy.js
                },
                lazyLoadingOnTransitionStart: true,
                lazyLoadingInPrevNext: true,
                lazyLoadingInPrevNextAmount: {if (isset($column_slider) && $column_slider) || $slider_move!=1}1{else}{max($pro_per_fw,$pro_per_xxl,$pro_per_xl,$pro_per_lg,$pro_per_md,$pro_per_sm,$pro_per_xs)}{/if},
            {/if}
            {if $direction_nav}
                nextButton: '{$block_name} .swiper-button-outer.swiper-button-next',
                prevButton: '{$block_name} .swiper-button-outer.swiper-button-prev',
            {/if}

            {if $control_nav}
            pagination: '{$block_name} .swiper-pagination',
            paginationType: {if $control_nav==2}'bullets'{elseif $control_nav==3}'progress'{else}'bullets'{/if}, //A bug of swiper, this should be 'custom' when nav==2
                {if $control_nav==2}
                {literal}
                paginationBulletRender: function (swiper, index, className) {
                    return '<span class="' + className + '">' + (index + 1) + '</span>';
                },
                {/literal}
                {/if}
            {/if}

            {if isset($column_slider) && $column_slider}

                slidesPerView : 1,
                observer : true,
                observeParents : true,

            {else}

                freeMode: {if $slider_move==2}true{else}false{/if},
                spaceBetween: {(int)$spacing_between}, //new
                    {if ((isset($homeverybottom) && $homeverybottom) || $sttheme.responsive_max==3) && $pro_per_fw}
                        {assign var='slidesPerView' value=$pro_per_fw}
                    {else}
                        {if $sttheme.responsive_max==2}
                            {assign var='slidesPerView' value=$pro_per_xxl}
                        {elseif $sttheme.responsive_max>=1}
                            {assign var='slidesPerView' value=$pro_per_xl}
                        {else}
                            {assign var='slidesPerView' value=$pro_per_lg}
                        {/if}
                    {/if}
                slidesPerView: {if $slidesPerView}{$slidesPerView}{else}1{/if},
                {if $slider_move==1}slidesPerGroup: {if $slidesPerView}{$slidesPerView}{else}1{/if},{/if}
                {if $sttheme.responsive && !$sttheme.version_switching}
                {literal}
                breakpoints: {
                    {/literal}
                    {if ((isset($homeverybottom) && $homeverybottom) || $sttheme.responsive_max==3) && $pro_per_fw}
                    {if $sttheme.responsive_max==2}1600{elseif $sttheme.responsive_max==1}1440{else}1200{/if}{literal}: {slidesPerView: {/literal}{$pro_per_xxl|default:3}{if $slider_move==1}, slidesPerGroup: {$pro_per_xxl|default:3}{/if}{literal} },{/literal}
                    {/if}
                    {if $sttheme.responsive_max==2}{literal}1440: {slidesPerView: {/literal}{$pro_per_xl|default:3}{if $slider_move==1}, slidesPerGroup: {$pro_per_xl|default:3}{/if}{literal} },{/literal}{/if}
                    {if $sttheme.responsive_max>=1}{literal}1200: {slidesPerView: {/literal}{$pro_per_lg|default:2}{if $slider_move==1}, slidesPerGroup: {$pro_per_lg|default:2}{/if}{literal} },{/literal}{/if}
                    992: {literal}{slidesPerView: {/literal}{$pro_per_md|default:4}{if $slider_move==1}, slidesPerGroup: {$pro_per_md|default:4}{/if}{literal} },{/literal}
                    768: {literal}{slidesPerView: {/literal}{$pro_per_sm|default:3}{if $slider_move==1}, slidesPerGroup: {$pro_per_sm|default:3}{/if}{literal} },{/literal}
                    480: {literal}{slidesPerView: {/literal}{$pro_per_xs|default:2}{if $slider_move==1}, slidesPerGroup: {$pro_per_xs|default:2}{/if}{literal} }
                },
                {/literal}
                {/if}

            {/if}
            {if isset($autoHeight) && $autoHeight}autoHeight:true,{/if}
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            {literal}
            onInit : function (swiper) {
                $(swiper.container).removeClass('swiper_loading').addClass('swiper_loaded');
                {/literal}
                {if $direction_nav}
                {literal}
                if($(swiper.slides).length==$(swiper.slides).filter('.swiper-slide-visible').length)
                {
                    $(swiper.params.nextButton).hide();
                    $(swiper.params.prevButton).hide();
                }
                else
                {
                    $(swiper.params.nextButton).show();
                    $(swiper.params.prevButton).show();
                }
                {/literal}
                {/if}
                {literal}
            },
            {/literal}
            //temp fix, loop breaks when roundlenghts and autoplay
            {if !$slider_slideshow}roundLengths: true,{/if}
            id_st: '{$block_name} .products_sldier_swiper'

        {literal}
        });
        {/literal} 

    //]]>
    </script>