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

{*** Styles/scripts included here for portability. This file is displayed in dynamic popup ***}
{literal}
<style type="text/css">
	.filter-group {
		padding: 10px;
	}
	.filter-group-title {
		background: #F1F1F1;
    	padding: 5px 25px;
    	margin: 0 -20px 10px;
	}
	.filter-group-title label {
		font-weight: normal;
	    margin: 0 10px;
	    color: #999;
	}
	.filter-group-title .pull-right .inline-block {
		margin-left: 5px;
	}
	.filter-group input.quick-search,
	.filter-group select.sort-by {
		height: 31px;
		line-height: 32px;
		border-radius: 5px;
		margin-top: 1px;
	}
	.filter-group a.filter-group-item {
	    padding: 8px;
	    border: 2px solid #DDD;
	    color: #777;
	    margin: 3px;
	    border-radius: 5px;
	    text-decoration: none;
	    display: inline-block;
	}
	.item-id {
		opacity: 0.5;
	}
	.filter-group a.filter-group-item:hover {
		color: #00AFF0;
	}
	.filter-group a.filter-group-item.selected {
		color: #00AFF0;
		border-color: #00AFF0;
	}
	.filter-group a.filter-group-item.blocked {
		background: #F5F5F5;
		color: #CCC;
		border-color: #DDD;
		cursor: not-allowed;
	}
	.blocked .item-id {
		opacity: 0.7;
	}
	.filter-group .no-results {
		padding: 10px;
	    margin: 3px;
	}
	.filter-items-list {
		max-height: 130px;
		overflow-y: scroll;
	}
	.available-filters-footer {
		margin: 15px -10px -10px;
		background: #EEE;
		padding: 15px;
		border-radius: 0 0 5px 5px;
	}
	.available-filters-footer .btn {
		padding-left: 30px;
		padding-right: 30px;
	}
	.bootstrap .available-filters-footer .btn-blocked,
	.bootstrap .available-filters-footer .btn-blocked:hover {
		background: #CCC;
		border: 1px solid #CCC;
		cursor: not-allowed;
		outline: none;
	}
</style>
<script type="text/javascript">
	var quickSearchTimer;
	function activateInstantSearch() {
		$('.quick-search').on('keyup', function(){
			var $parent = $(this).closest('.filter-group'),
				$items = $parent.find('.filter-group-item'),
				$noResulsWarning = $parent.find('.no-results'),
				value = $(this).val();
			clearTimeout(quickSearchTimer);
			quickSearchTimer = setTimeout(function() {
				// search for IDs starting from 1 characters, other strings - starting from 3
				if (!isNaN(value) || value.length > 2) {
					$items.each(function(){
						var hidden = $(this).text().toLowerCase().indexOf(value.toLowerCase()) === -1;
						$(this).toggleClass('hidden', hidden);
					});
				} else {
					$items.removeClass('hidden');
				}
				$noResulsWarning.toggleClass('hidden', !!$items.not('.hidden').length);
				updateTotals($parent);
			}, 300);
		});
	}

	function activateSortBy() {
		$('.sort-by').on('change',function(){
			var $list = $(this).closest('.filter-group').find('.filter-items-list'),
				$elements = $list.find('.filter-group-item'),
				sortBy = $(this).val();
			if (sortBy == 'name') {
				$elements.sort(function(a, b){
					return $(a).find('.item-'+sortBy).text().toUpperCase().
					localeCompare($(b).find('.item-'+sortBy).text().toUpperCase());
				});
			} else {
				$elements.sort(function(a, b){
					return $(a).find('.item-'+sortBy).text() - $(b).find('.item-'+sortBy).text();
				});
			}
			$list.prepend($elements);
		})
	}
	function markBlockedFilters() {
		var $template = $('.af_template.open'),
			$filters = $template.find('.filter'),
			controller_first_char = $template.data('controller').charAt(0);
		$filters.each(function(){
			$('.filter-group-item[data-key="'+$(this).data('key')+'"]').addClass('blocked');
		});
		if (controller_first_char == 'm' || controller_first_char == 's') {
			$('.filter-group-item[data-key="'+controller_first_char+'"]').addClass('blocked');
		}
		updateTotals(false);
	}
	activateInstantSearch();
	activateSortBy();
	markBlockedFilters();
	$('.filter-group-item').on('click', function(){
		if (!$(this).hasClass('blocked')) {
			$(this).toggleClass('selected');
		}
		toggleAddBtn();
	});
	$('.check-all').on('change', function(){
		var selected = $(this).prop('checked');
		$(this).closest('.filter-group').find('.filter-group-item').not('.hidden, .blocked').toggleClass('selected', selected);
		toggleAddBtn();
	})
	function toggleAddBtn() {
		var selectedNum = $('.filter-group-item.selected').not('.hidden, .blocked').length;
		$('.addSelectedFilters').toggleClass('btn-blocked', !selectedNum).find('.total-selected').html('('+selectedNum+')');
	}
	function updateTotals($groups){
		$groups = $groups ? $groups : $('.filter-group');
		$groups.each(function(){
			var groupTotal = $(this).find('.filter-group-item').not('.hidden, .blocked').length;
			$(this).find('.total').html('('+groupTotal+')');
		});
		toggleAddBtn();
	}
</script>
{/literal}

{foreach $available_filters as $subtitle => $filters}
	{$quick_search = $filters|count > 10}
	<div class="filter-group">
		<div class="filter-group-title">
			<h4 class="inline-block">{$subtitle|escape:'html':'UTF-8'}</h4>
			<label class="inline-block">
				<input type="checkbox" class="check-all">
				{l s='select available' mod='amazzingfilter'}
				<span class="total">({$filters|count})</span>
			</label>
			{if $quick_search}
				<div class="pull-right">
					<div class="inline-block">
						<input type="text" class="quick-search" placeholder="{l s='Quick search' mod='amazzingfilter'}">
					</div>
					<div class="inline-block hidden">
						<select name="" class="sort-by">
							<option value="position">{l s='Sort by position' mod='amazzingfilter'}</option>
							<option value="name">{l s='Sort by name' mod='amazzingfilter'}</option>
							{* categories are initially sorted by id *}
							<option value="id"{if current(array_keys($filters)) == 'c'} selected{/if}>{l s='Sort by ID' mod='amazzingfilter'}</option>
						</select>
					</div>
				</div>
			{/if}
		</div>
		<div class="filter-items-list">
			{foreach $filters as $key => $filter}<a href="#" data-key="{$key|escape:'html':'UTF-8'}" class="filter-group-item">
				<span class="item-id{if !$filter.id} hidden{/if}">{$filter.id|intval}</span>
				<span class="item-name">{$filter.name|escape:'html':'UTF-8'}</span>
				<span class="item-position hidden">{$filter.position|intval}</span>
			</a>{/foreach}
			{if $quick_search}
				<div class="alert-warning no-results hidden">{l s='No matches' mod='amazzingfilter'}</div>
			{/if}
		</div>
	</div>
{/foreach}
<div class="available-filters-footer text-center">
	<button class="btn btn-primary btn-blocked addSelectedFilters">
		{l s='Add selected' mod='amazzingfilter'} <span class="total-selected">(0)</span>
	</button>
</div>
{* since 2.8.0 *}
