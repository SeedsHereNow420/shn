<!-- MODULE st banner -->
{if isset($groups)}
    {foreach $groups as $group}
        {assign var='style' value=0}
        {if isset($group.style) && $group.style}{$style=1}{/if}
        {capture name="parallax_param"}{if $group.bg_img && $group.speed!=1 && !$group.mpfour} data-stellar-background-ratio="{$group.speed}" data-stellar-vertical-offset="{(int)$group.bg_img_v_offset}" {/if}{/capture}
        {capture name="video_background"}{if $group.mpfour} data-vide-bg="mp4: {$group.mpfour}{if $group.webm}, webm: {$group.webm}{/if}{if $group.ogg}, ogv: {$group.ogg}{/if}{if $group.video_poster}, poster: {$group.video_poster}{/if}" data-vide-options="loop: {if $group.loop}true{else}false{/if}, muted: {if $group.muted}true{else}false{/if}, position: 50% {(int)$group.video_v_offset}%" {/if}{/capture}
        {if $group.is_full_width}<div id="banner_container_{$group.id_st_banner_group}" class="banner_container full_container {if $group.hide_on_mobile == 1} hidden-md-down {elseif $group.hide_on_mobile == 2} hidden-lg-up {/if} block {if $group.mpfour} video_bg_block {/if}" {$smarty.capture.parallax_param nofilter} {$smarty.capture.video_background nofilter}>{if !$group.stretched}<div class="container">{/if}{/if}
            <div id="st_banner_{$group.id_st_banner_group}" class="st_banner_row st_banner_{$style} {if !$group.is_full_width} block {/if} {if $group.hide_on_mobile == 1} hidden-md-down {elseif $group.hide_on_mobile == 2} hidden-lg-up {/if}{if $group['hover_effect']} hover_effect_{$group['hover_effect']} {/if} {if isset($group.is_column) && $group.is_column} column_block {/if} {if $group.mpfour} video_bg_block {/if}" {if !$group.is_full_width}{$smarty.capture.parallax_param nofilter} {$smarty.capture.video_background nofilter}{/if}>
                {if isset($group['banners']) && count($group['banners'])}
                    <div class="row block_content">
                        <div id="banner_box_{$group['id_st_banner_group']}" class="col-lg-12 banner_col" data-height="100">
                            {include file="module:stbanner/views/templates/hook/stbanner-block.tpl" banner_data=$group['banners'][0] banner_height=$group['height'] banner_style=$style}
                        </div>
                    </div>
                {elseif isset($group['columns'])}
                    {include file="module:stbanner/views/templates/hook/stbanner-column.tpl" columns_data=$group['columns'] banner_style=$style}
                {/if}
            </div>
        {if $group.is_full_width}</div>{if !$group.stretched}</div>{/if}{/if}
    {/foreach}
{/if}
<!--/ MODULE st banner -->