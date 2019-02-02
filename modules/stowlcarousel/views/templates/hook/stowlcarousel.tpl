<!-- MODULE st owl carousel -->
{if isset($slide_group)}
    {foreach $slide_group as $group}
        {if isset($group['slide']) && count($group['slide'])}
            {if $group['is_full_width']}<div id="owl_carousel_container_{$group.id_st_owl_carousel_group}" class="owl_carousel_container full_container {if $group.hide_on_mobile == 1} hidden-md-down {elseif $group.hide_on_mobile == 2} hidden-lg-up {/if} block">{/if}
            <div id="st_owl_carousel_{$group.id_st_owl_carousel_group}" class="owl_carousel_wrap st_owl_carousel_{$group.templates} {if !$group['is_full_width']} block {/if} owl_images_slider {if $group.hide_on_mobile == 1} hidden-md-down {elseif $group.hide_on_mobile == 2} hidden-lg-up {/if}">
                {include file="module:stowlcarousel/views/templates/hook/stowlcarousel-{$group['templates']}.tpl" slides=$group}
            </div>
            {if $group['is_full_width']}</div>{/if}
        {/if}
    {/foreach}
{/if}
<!--/ MODULE st owl carousel -->