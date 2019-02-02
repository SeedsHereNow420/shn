{if $stvideos.size_charts}
    {foreach $stvideos.size_charts as $size_chart}
    {if in_array($size_chart.video_position, $video_position) && $size_chart.title && $size_chart.content}
    <div class="inline_popup_wrap pro_right_item">
    <a class="inline_popup_tri {if $size_chart.hide_on_mobile == 1} hidden-md-down {elseif $size_chart.hide_on_mobile == 2} hidden-lg-up {/if}" href="#inline_popup_content_{$size_chart.id_st_video}" title="{$size_chart.title}" rel="nofollow">{$size_chart.title}</a>
    <div id="inline_popup_content_{$size_chart.id_st_video}" class="inline_popup_content mfp-hide mfp-with-anim">{$size_chart.content nofilter}</div>
    </div>
    {/if}
    {/foreach}
{elseif $stvideos.videos}
    {foreach $stvideos.videos as $video}
    {if in_array($video.video_position, $video_position) && $size_chart.url}
        <a class="st_popup_video {if $video.hide_on_mobile == 1} hidden-md-down {elseif $video.hide_on_mobile == 2} hidden-lg-up {/if} {if count(array_intersect(array(13,14,15), $video_position))} mar_b6 {else} pro_right_item {/if}" href="{$video.url}" title="{l s='View video' d='Shop.Theme.Transformer'}" rel="nofollow">{l s='View video' d='Shop.Theme.Transformer'}</a>
        <a class="st_popup_video {if $video.hide_on_mobile == 1} hidden-md-down {elseif $video.hide_on_mobile == 2} hidden-lg-up {/if} pro_right_item" href="{$video.url}" title="{l s='View video' d='Shop.Theme.Transformer'}" rel="nofollow">{l s='View video' d='Shop.Theme.Transformer'}</a>
    {/if}
    {/foreach}
{/if}