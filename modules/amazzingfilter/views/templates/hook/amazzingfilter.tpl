{*
* 2007-2017 Amazzing
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
*
*  @author    Amazzing <mail@amazzing.ru>
*  @copyright 2007-2017 Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*
*}

{*** main layout is coming after functions ***}
{function renderBoxes type = 'checkbox' values = [] foldered = false root = 1}
	{if $values|count}
	<ul class="{if !$root}child-categories{/if}">
	{foreach $values as $value}
		{$v = $value.id}
		{$id = $t|cat:'-'|cat:$v}
		{if !empty($filter.special)}{$id = $k}{/if}
		{$count = 0}
		{$children = []}
		{if !empty($count_data.$id)}{$count = $count_data.$id}{/if}
		{if $check_for_children && !empty($filter.values[$v])}{$children = $filter.values[$v]}{/if}
		{$is_customer_filter = !empty($applied_customer_filters[$k][$v])}
		<li class="item-{$id|escape:'html':'UTF-8'}{if isset($value.class)} {$value.class|escape:'html':'UTF-8'}{/if}{if !empty($value.selected)} active{/if}{if !empty($children)} af-parent-category{/if}{if !$count} no-matches{/if}{if $is_customer_filter} has-customer-filter{/if}">
			<label for="{$id|escape:'html':'UTF-8'}"{if isset($value.class) && $value.class == 'color_attribute'} title="{$value.name|escape:'html':'UTF-8'}"{/if}{if isset($value.style)} style="{$value.style|escape:'html':'UTF-8'}" {/if}{if $is_customer_filter}class="customer-filter-label" data-id="{$id|escape:'html':'UTF-8'}"{/if}>
				{if !$is_customer_filter}
					<input type="{$type|escape:'html':'UTF-8'}" id="{$id|escape:'html':'UTF-8'}" class="af {$type|escape:'html':'UTF-8'}" name="{$filter.submit_name|escape:'html':'UTF-8'}" value="{$v|escape:'html':'UTF-8'}" data-url="{$value.link|escape:'html':'UTF-8'}"{if !empty($value.selected)} checked{/if}>
				{else}
					<a href="#" class="{$af_classes['icon-lock']|escape:'html':'UTF-8'}"></a><input type="hidden" id="{$id|escape:'html':'UTF-8'}" class="af {$type|escape:'html':'UTF-8'} customer-filter" name="{$filter.submit_name|escape:'html':'UTF-8'}" value="{$v|escape:'html':'UTF-8'}" data-name="{$filter.submit_name|escape:'html':'UTF-8'}" data-url="{$value.link|escape:'html':'UTF-8'}">
				{/if}
				<span class="name">{$value.name|escape:'html':'UTF-8'}</span>
				{if $hidden_inputs.count_data}<span class="count">{$count|intval}</span>{/if}
				{if !empty($children) && $foldered}<a href="#" class="af-toggle-child"><span class="hidden-on-open">+</span><span class="visible-on-open">-</span></a>{/if}
			</label>
			{if !empty($children)}
				{renderBoxes type = $type values = $children foldered = $foldered root = 0}
			{/if}

		</li>
	{/foreach}
	</ul>
	{/if}
{/function}

{function renderOptions values = [] nesting_prefix = ''}
	{foreach $values as $value}
		{$v = $value.id}
		{$id = $t|cat:'-'|cat:$v}
		{$count = 0}
		{if !empty($count_data.$id)}{$count = $count_data.$id}{/if}
		{$is_customer_filter = !empty($applied_customer_filters[$k][$v])}
		{if $count || !empty($value.selected) || $is_customer_filter || !$hidden_inputs.hide_zero_matches}
			<option id="{$id|escape:'html':'UTF-8'}" value="{$v|escape:'html':'UTF-8'}" data-url="{$value.link|escape:'html':'UTF-8'}"  data-text="{$value.name|escape:'html':'UTF-8'}" class="{if $is_customer_filter}customer-filter {/if}{if !$count}no-matches{/if}"{if !empty($value.selected)} selected{/if}{if !$count && $hidden_inputs.dim_zero_matches} disabled{/if}>
				{if $nesting_prefix}{$nesting_prefix|escape:'html':'UTF-8'}{/if}
				{$value.name|escape:'html':'UTF-8'}
				{if $hidden_inputs.count_data && $count}({$count|intval}){/if}
			</option>
			{if $check_for_children && !empty($filter.values[$v])}
				{renderOptions values = $filter.values[$v] nesting_prefix = $nesting_prefix|cat:'-'}
			{/if}
		{/if}
	{/foreach}
{/function}

{function renderAvailableOptions values = [] nesting_prefix = ''}
	{foreach $values as $value}
		{$v = $value.id}
		{$id = $t|cat:'-'|cat:$v}
		<span class="{if !empty($applied_customer_filters[$k][$v])}customer-filter{/if}" data-value="{$v|escape:'html':'UTF-8'}" data-url="{$value.link|escape:'html':'UTF-8'}" data-text="{if $nesting_prefix}{$nesting_prefix|escape:'html':'UTF-8'} {/if}{$value.name|escape:'html':'UTF-8'}" data-id="{$id|escape:'html':'UTF-8'}"></span>
		{if $check_for_children && !empty($filter.values[$v])}
			{renderAvailableOptions values = $filter.values[$v] nesting_prefix = $nesting_prefix|cat:'-'}
		{/if}
	{/foreach}
{/function}

{$horizontal_layout = !$is_compact && $hook_name == 'displayTopColumn'}
<div id="amazzing_filter" class="af block {$hook_name|escape:'html':'UTF-8'}{if $horizontal_layout} horizontal-layout{/if}{if !$hidden_inputs.count_data} hide-counters{/if}{if $hidden_inputs.hide_zero_matches} hide-zero-matches{/if}{if $hidden_inputs.dim_zero_matches} dim-zero-matches{/if}{if $is_compact} compact{/if}"{if !$filters} style="display:none"{/if}>
	{if $hook_name != 'displayHome' && !$is_compact}
		<h2 class="title_block">
			{if $current_controller == 'index'}{l s='Instant filter' mod='amazzingfilter'}{else}{l s='Filter by' mod='amazzingfilter'}{/if}
		</h2>
	{/if}
	<div class="{if $is_compact}compact_{/if}block_content">
		{if $hook_name != 'displayHome'}
		<div class="selectedFilters">
			<div class="clearAll hidden">
				{l s='Clear filters' mod='amazzingfilter'}
				<a href="#" class="{$af_classes['icon-eraser']|escape:'html':'UTF-8'} all" title="{l s='Clear all' mod='amazzingfilter'}"></a>
			</div>
		</div>
		{/if}
		<form action="#" id="af_form">
			<span class="hidden_inputs">
				<!-- additional template settings -->
				{foreach $hidden_inputs as $name => $value}
					<input type="hidden" id="af_{$name|escape:'html':'UTF-8'}" name="{$name|escape:'html':'UTF-8'}" value="{$value|escape:'html':'UTF-8'}">
				{/foreach}
			</span>
			{foreach $filters as $k => $filter}
			{if !empty($filter.values)}
			{$t = $k|truncate:1:'':true}
			{$check_for_children = !empty($filter.id_parent) && !empty($filter.values[$filter.id_parent])}
			{if $is_compact && isset($filter.foldered)}{$filter.foldered = 1}{/if}
			<div class="af_filter {$k|escape:'html':'UTF-8'} clearfix{if $t == 'p' || $t == 'w'} range-filter{/if}{if $filter.type == 4} has-slider{else} type-{$filter.type|intval}{/if}{if !empty($filter.is_color_group)} color-group{/if}{if !empty($filter.special)} special{/if}{if !empty($filter.foldered)} foldered{/if}{if !empty($filter.class)} {$filter.class|escape:'html':'UTF-8'}{/if}{if !empty($filter.minimized)} closed{/if}" data-trigger="{$k|escape:'html':'UTF-8'}" data-url="{$filter.link|escape:'html':'UTF-8'}">
				<div class="af_subtitle_heading{if !empty($filter.special)} hidden{/if}">
					<h5 class="af_subtitle">{$filter.name|escape:'html':'UTF-8'}</h5>
				</div>
				<div class="af_filter_content">
				{if $filter.type == 1 || $filter.type == 2}
					{$values = $filter.values}
					{if $check_for_children}{$values = $filter.values[$filter.id_parent]}{/if}
					{$type = 'checkbox'}{if $filter.type == 2}{$type = 'radio'}{/if}
					{renderBoxes type = $type values = $values foldered = !empty($filter.foldered)}
				{else if $filter.type == 3}
					{$values = $filter.values}
					{if $check_for_children}{$values = $filter.values[$filter.id_parent]}{/if}
					{$selector_id = 'selector-'|cat:$k}
					{if !empty($applied_customer_filters[$k])}
						{$customer_filter_id = current(array_keys($applied_customer_filters[$k]))}
						{$customer_filter_name = current($applied_customer_filters[$k])}
						<label class="customer-filter-label for-select" data-id="{$t|escape:'html':'UTF-8'}-{$customer_filter_id|intval}">
							<a href="#" class="{$af_classes['icon-lock']|escape:'html':'UTF-8'}"></a>
							<span class="name">{$customer_filter_name|escape:'html':'UTF-8'}</span>
						</label>
						<div class="selector-with-customer-filter hidden">
					{/if}
					<select id="{$selector_id|escape:'html':'UTF-8'}" class="af-select form-control" name="{$filter.submit_name|escape:'html':'UTF-8'}">
						<option value="0" class="first">{l s='No filters' mod='amazzingfilter'}</option>
						{renderOptions values = $values}
					</select>
					<div class="dynamic-select-options hidden">
						{renderAvailableOptions values = $values}
					</div>
					{if !empty($applied_customer_filters[$k])}</div>{/if}
				{else if $filter.type == 4}
					<div class="{$k|escape:'html':'UTF-8'}_slider af_slider slider" data-url="{$filter.link|escape:'html':'UTF-8'}" data-type="{$k|escape:'html':'UTF-8'}">
						<div class="slider-bar">
							<div id="{$k|escape:'html':'UTF-8'}_slider"></div>
						</div>
						<div class="slider-values">
							<span class="from_display slider_value">
								<span class="prefix">{$filter.prefix|escape:'html':'UTF-8'}</span>
								<span class="value">{$filter.values.from|floatval}</span>
								<span class="suffix">{$filter.suffix|escape:'html':'UTF-8'}</span>
								<input type="text" id="{$k|escape:'html':'UTF-8'}_from" class="input-text" name="sliders[{$k|escape:'html':'UTF-8'}][from]" value="{$filter.values.from|floatval}" >
								<input type="hidden" id="{$k|escape:'html':'UTF-8'}_min" name="sliders[{$k|escape:'html':'UTF-8'}][min]" value="{$filter.values.min|floatval}" >
							</span>
							<span class="to_display slider_value">
								<span class="prefix">{$filter.prefix|escape:'html':'UTF-8'}</span>
								<span class="value">{$filter.values.to|floatval}</span>
								<span class="suffix">{$filter.suffix|escape:'html':'UTF-8'}</span>
								<input type="text" id="{$k|escape:'html':'UTF-8'}_to" class="input-text" name="sliders[{$k|escape:'html':'UTF-8'}][to]" value="{$filter.values.to|floatval}">
								<input type="hidden" id="{$k|escape:'html':'UTF-8'}_max"name="sliders[{$k|escape:'html':'UTF-8'}][max]" value="{$filter.values.max|floatval}">
							</span>
						</div>
					</div>
					{if !empty($numeric_slider_values[$k])}
						<input type="hidden" name="numeric_slider_values[{$k|escape:'html':'UTF-8'}]" value="{$numeric_slider_values[$k]|implode:','|escape:'html':'UTF-8'}">
					{/if}
				{/if}
				{if !empty($available_options[$k])}
					<input type="hidden" name="available_options[{$k|escape:'html':'UTF-8'}]" value="{$available_options[$k]|implode:','|escape:'html':'UTF-8'}">
				{/if}
				</div>
				{if $filter.type == 1 && empty($filter.is_color_group)}
					<a href="#" class="toggle-cut-off">
						<span class="more">{l s='more...' mod='amazzingfilter'}</span>
						<span class="less">{l s='less' mod='amazzingfilter'}</span>
					</a>
				{/if}
			</div>
			{/if}
			{/foreach}
			{if $hook_name == 'displayHome'}
				<div class="btn-holder"><a href="#" class="submitFilter btn btn-default full-width">{l s='OK' mod='amazzingfilter'}</a></div>
			{/if}
			{$no_layout = $current_controller == 'index'}
			{$view_products_btn = $no_layout || $hidden_inputs.reload_action == 2 || $is_compact}
			{if $view_products_btn || !empty($my_filters_link)}
				<div class="btn-holder">
					{if $view_products_btn}
						<a href="#" class="btn btn-default full-width viewFilteredProducts{if $no_layout} no-layout{/if}">
							{l s='View products' mod='amazzingfilter'}
							<span class="af-total-count">{$total_products|intval}</span>
						</a>
					{/if}
					{if !empty($my_filters_link)}
						<a href="{$my_filters_link|escape:'html':'UTF-8'}" class="btn btn-default manage-permanent-filters{if $no_layout} hidden{/if}" target="_blank">{l s='Manage permanent filters' mod='amazzingfilter'}</a>
					{/if}
				</div>
			{/if}
		</form>
	</div>
	{if $is_compact}
		<a href="#" class="icon-filter btn-primary compact-toggle"></a>
	{/if}
</div>
{* since 2.8.0 *}
