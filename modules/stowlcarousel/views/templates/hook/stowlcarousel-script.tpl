<script type="text/javascript">
//<![CDATA[
    {literal}
    if(typeof(stowlcarousel_array) ==='undefined')
    var stowlcarousel_array = [];
    {/literal}
        {if count($js_data['slide'])>1}{literal}
        stowlcarousel_array[{/literal}{$js_data.id_st_owl_carousel_group}{literal}] = {
            {/literal}
            autoPlay : {if $js_data.auto_advance && !$js_data.progress_bar}{$js_data.time|default:7000}{else}false{/if},
            navigation: {if $js_data.prev_next}true{else}false{/if},
            pagination: {if $js_data.pag_nav}true{else}false{/if},
            paginationSpeed : 1000,
            goToFirstSpeed : 2000,
            rewindNav: {if $js_data.rewind_nav}true{else}false{/if},
            singleItem : {if $js_data.templates!=3}true{else}false{/if},
            {if $js_data.templates==3}
              {literal}
              itemsCustom : [
                {/literal}{if $sttheme.responsive && !$sttheme.version_switching}{literal}
                [0,{/literal}{$js_data.items_xxs}{literal}]
                ,[460,{/literal}{$js_data.items_xs}{literal}]
                ,[748,{/literal}{$js_data.items_sm}{literal}]
                ,[972,{/literal}{$js_data.items_md}{literal}]
                ,[1180,{/literal}{$js_data.items_lg}{literal}]
                ,[1420,{/literal}{$js_data.items_xlg}{literal}]
                {/literal}{else}{literal}
                [0,{/literal}{if $sttheme.responsive_max==2}{$js_data.items_xlg}{elseif $sttheme.responsive_max==1}{$js_data.items_lg}{else}{$js_data.items_md}{/if}{literal}]
                {/literal}
                {/if}
                {if $js_data.is_full_width}
                {literal}
                ,[1600,{/literal}{$js_data.items_xxlg}{literal}]
                ,[1900,{/literal}{$js_data.items_huge}{literal}]
                {/literal}{/if}{literal}
              ],
              {/literal}
            {/if}
            autoHeight : {if $js_data.auto_height}true{else}false{/if},
            slideSpeed: {$js_data.trans_period|default:400},
            stopOnHover: {if $js_data.pause}true{else}false{/if},
            mouseDrag: {if $js_data.mouse_drag}true{else}false{/if},
            {if $js_data.progress_bar}
            progress_bar: {$js_data.progress_bar},
            bar_time : {$js_data.time|default:7000},
            {/if}
            transitionStyle: "{if array_key_exists($js_data.transition_style, $transition_style)}{$transition_style[$js_data.transition_style]['name']}{else}fade{/if}"
            {literal}
        };
        {/literal}{/if}
//]]>
</script>