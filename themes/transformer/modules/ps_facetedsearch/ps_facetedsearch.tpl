{if isset($listing.rendered_facets) && $listing.rendered_facets && !$sttheme.filter_position}
<div id="search_filters_wrapper" class="column_filter block column_block">
    <div class="title_block flex_container title_align_0 title_style_{(int)$sttheme.heading_style}">
        <div class="flex_child title_flex_left"></div>
        <span class="title_block_inner">{l s='Filter By' d='Shop.Theme.Actions'}</span>
        <div class="flex_child title_flex_right"></div>
    </div>
	<div class="block_content">
		{$listing.rendered_facets nofilter}
	</div>
</div>
{/if}
