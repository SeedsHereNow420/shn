<div class="banner_image_box" style="background-image:url('{$banner_data['image_multi_lang']}');"></div>
{if $banner_data['url'] && !$banner_data['button_text']}
    <a href="{$banner_data['url']|escape:'html'}" class="banner_scaffold" target="{if $banner_data['new_window']}_blank{else}_self{/if}" title="{$banner_data['title']|escape:'htmlall':'UTF-8'}">
{else}
	<div class="banner_scaffold">
{/if}

{if $banner_data['description'] || ($banner_data['button_text'] && $banner_data['url'])}
	<div class="text_td">
		{if $banner_data['description']}{$banner_data['description']}{/if}
		{if $banner_data['button_text'] && $banner_data['url']}<a href="{$banner_data['url']|escape:'html'}" class="banner_btn" target="{if $banner_data['new_window']}_blank{else}_self{/if}" title="{$banner_data['button_text']}">{$banner_data['button_text']}</a>{/if}
	</div>
{/if}

{if $banner_data['url'] && !$banner_data['button_text']}
    </a>
{else}
	</div>
{/if}