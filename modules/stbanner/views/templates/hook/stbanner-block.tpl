{if $banner_data['url'] && !$banner_data['description_has_links']}
    <a id="st_banner_block_{$banner_data['id_st_banner']}" href="{$banner_data['url']|escape:'html'}" class="st_banner_block_{$banner_data['id_st_banner']} st_banner_block" target="{if $banner_data['new_window']}_blank{else}_self{/if}" title="{$banner_data['title']|escape:'htmlall':'UTF-8'}" style="{if !$banner_style}height:{$banner_height}px;{/if}">
{else}
    <div id="st_banner_block_{$banner_data['id_st_banner']}" class="st_banner_block_{$banner_data['id_st_banner']} st_banner_block" style="{if !$banner_style}height:{$banner_height}px;{/if}">
{/if}
    {if $banner_style}
        <img class="adveditor_image" src="{$banner_data['image_multi_lang']}" alt="{$banner_data['title']|escape:'htmlall':'UTF-8'}" />
    {else}
        <div class="st_banner_image" style="{if isset($banner_data['image_multi_lang']) && $banner_data['image_multi_lang']}background-image:url({$banner_data['image_multi_lang']});{/if}{if isset($banner_data['bg_color']) && $banner_data['bg_color']}background-color:{$banner_data['bg_color']};{/if}"></div>
    {/if}
    {if $banner_data['description']}
        <div class="st_image_layered_description {if $banner_data.hide_text_on_mobile} hidden-sm-down {/if} {if $banner_data.text_align==1} text-1 {elseif $banner_data.text_align==3} text-3 {else} text-2 {/if} {if $banner_data.text_position==1} flex_start flex_left {elseif $banner_data.text_position==2} flex_start flex_center {elseif $banner_data.text_position==3} flex_start flex_right {elseif $banner_data.text_position==4} flex_middle flex_left {elseif $banner_data.text_position==6} flex_middle flex_right {elseif $banner_data.text_position==7} flex_end flex_left {elseif $banner_data.text_position==8} flex_end flex_center {elseif $banner_data.text_position==9} flex_end flex_right {else} flex_middle flex_center {/if}">
        	<div class="st_image_layered_description_inner {if $banner_data.text_width} width_{$banner_data.text_width} {/if} style_content">
        	{$banner_data['description'] nofilter}
        	</div>
        </div>
    {/if}
{if $banner_data['url'] && !$banner_data['description_has_links']}
    </a>
{else}
    </div>
{/if}