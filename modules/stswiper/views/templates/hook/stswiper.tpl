<!-- MODULE st swiper -->
{if isset($slide_group)}
    {foreach $slide_group as $group}
        {if isset($group['slide']) && count($group['slide'])}
            {if $group['is_full_width']}<div id="swiper_container_out_{$group.id_st_swiper_group}" class="swiper_wraper_out full_container {if $group['hide_on_mobile']} hidden-md-down {/if} block">{/if}
            <div id="swiper_container_{$group.id_st_swiper_group}" class="swiper_wraper st_swiper_{$group.templates} {if !$group['is_full_width']} block {/if} swiper_images_slider {if $group.hide_on_mobile == 1} hidden-md-down {elseif $group.hide_on_mobile == 2} hidden-lg-up {/if}">
                {include file="module:stswiper/views/templates/hook/stswiper-{$group['templates']}.tpl" slides=$group}
            </div>
            {if $group['is_full_width']}</div>{/if}
        {/if}
    {/foreach}
{/if}
<!--/ MODULE st swiper -->