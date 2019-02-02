<div class="search_widget_block search_widget_{$quick_search_simple}">
<div class="search_widget" data-search-controller-url="{$search_controller_url}">
	<form method="get" action="{$search_controller_url}" class="search_widget_form">
		<input type="hidden" name="controller" value="search">
		<div class="search_widget_form_inner input-group round_item js-parent-focus input-group-with-border">
	      <input type="text" class="form-control search_widget_text js-child-focus" name="s" value="{$search_string}" placeholder="{l s='Search our catalog' d='Shop.Theme.Transformer'}">
	      <span class="input-group-btn">
	        <button class="btn btn-search btn-spin search_widget_btn link_color icon_btn" type="submit"><i class="fto-search-1"></i><span class="icon_text">{l s='Search' d='Shop.Theme.Transformer'}</span></button>
	      </span>
	    </div>

	</form>
	<div class="search_results {if $quick_search_as_results&1} search_show_img {/if}{if $quick_search_as_results&2} search_show_name {/if}{if $quick_search_as_results&4} search_show_price {/if}"></div>
	<a href="javascript:;" title="{l s='More products.' d='Shop.Theme.Transformer'}" rel="nofollow" class="display_none search_more_products go">{l s='Click for more products.' d='Shop.Theme.Transformer'}</a>
	<div class="display_none search_no_products">{l s='No produts were found.' d='Shop.Theme.Transformer'}</div>
</div>
</div>
