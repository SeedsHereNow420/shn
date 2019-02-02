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

{function renderCheckBoxes filter = [] values = [] check_for_children = false}
	{if $values|count && $filter}
		<ul>
		{foreach $values as $value}
			{$id = $value.id}
			{$children = []}
			{if $check_for_children && !empty($filter.values[$id])}{$children = $filter.values[$id]}{/if}
			<li class="{if !empty($children)}af-parent-category{/if}">
				<label>
					<input type="checkbox" class="af checkbox" name="{$filter.submit_name|escape:'html':'UTF-8'}" value="{$id|escape:'html':'UTF-8'}"{if !empty($customer_filters.$k.$id)} checked{/if}>
					<span class="name">{$value.name|escape:'html':'UTF-8'}</span>
				</label>
				{if !empty($children)}
					{renderCheckBoxes filter = $filter values = $children check_for_children = $check_for_children}
				{/if}
			</li>
		{/foreach}
		</ul>
	{/if}
{/function}

{capture name=path}<span>{l s='My filter preferences' mod='amazzingfilter'}</span>{/capture}
<form class="my-filters af">
	<h1 class="page-header">{l s='Manage permanent filters' mod='amazzingfilter'}</h1>
	<div class="row clearfix">
		{foreach $filters as $k => $filter}
		<div class="my-filter-group col-lg-3">
			<div class="content">
				<h4 class="panel-heading">
					{$total = 0}
					{if !empty($customer_filters.$k)}{$total = $customer_filters.$k|count}{/if}
					{$filter.name|escape:'html':'UTF-8'} (<span class="total-checked">{$total|intval}</span>)
					<a href="#" class="{$layout_classes['icon-plus']|escape:'html':'UTF-8'} pull-right js-action toggleFilterGroup"></a>
				</h4>
				<div class="criteria">
					{$check_for_children = isset($filter.id_parent)}
					{$values = $filter.values}{if $check_for_children}{$values = $values[$filter.id_parent]}{/if}
					{renderCheckBoxes filter = $filter values = $values check_for_children = $check_for_children}
				</div>
			</div>
		</div>
		{/foreach}
	</div>
	<div class="form-footer clear-both">
		<button class="btn btn-default js-action saveMyFilters"><i class="{$layout_classes['icon-save']|escape:'html':'UTF-8'}"></i> {l s='Save' mod='amazzingfilter'}</button>
		<span class="success hidden"><i class="{$layout_classes['icon-check']|escape:'html':'UTF-8'}"></i> {l s='Saved' mod='amazzingfilter'}</span>
	</div>
</form>
{* since 2.6.0 *}
