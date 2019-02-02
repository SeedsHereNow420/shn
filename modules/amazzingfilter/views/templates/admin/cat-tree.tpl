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

{*** Scripts included here for portability ***}
{literal}
<script type="text/javascript">
	var blockUpdateSelectedCatsTxt = false;
	updateSelectedCatsTxt();
	$('.cat-item.closed').each(function(){
		markCheckedChildren($(this));
	});
	$('.toggleChildren').on('click', function(e){
		e.preventDefault();
		var $catItem = $(this).closest('.cat-item');
		$catItem.toggleClass('closed');
		markCheckedChildren($catItem);
	});
	$('.cat-checkbox').on('change', function(){
		$(this.closest('label')).toggleClass('checked', $(this).prop('checked'));
	});
	$('[data-bulk-action]').on('click change', function(e){
		// avoid double actions. click is automatically triggered before change
		if (e.type == 'click') {
			$(this).data('justclicked', true);
		} else if (e.type == 'change' && $(this).data('justclicked')) {
			$(this).data('justclicked', '');
			return;
		}
		var action = $(this).data('bulk-action');
		switch (action) {
			case 'open':
			case 'close':
				var selector = action == 'open' ? '.cat-item.closed' : '.cat-item:not(.closed)';
				$(selector).children('.cat-item-label').children('.toggleChildren').click();
				break;
			case 'check':
			case 'uncheck':
			case 'invert':
				blockUpdateSelectedCatsTxt = true;
				$('.cat-checkbox').each(function (){
					var checked = action == 'check' ? true : action == 'uncheck' ? false : !$(this).prop('checked');
					$(this).prop('checked', checked).change();
				});
				$('.cat-item.closed').each(function(){
					markCheckedChildren($(this));
				});
				blockUpdateSelectedCatsTxt = false;
				updateSelectedCatsTxt();
				break;
		}
	});

	$('.category-inline-data').on('click', function(){
		$(this).closest('.form-group').toggleClass('show-cat-tree');
	});
	$('.hideTree').on('click', function(){
		$(this).closest('.form-group').removeClass('show-cat-tree');
	});
	$('.cat-checkbox').on('change', function(){
		updateSelectedCatsTxt();
	});
	$('.toggleCatIDs').on('change', function(){
		var show = $(this).prop('checked');
		$('.cat-id').toggleClass('hidden', !show);
	});

	function markCheckedChildren($catItem) {
		var childrenChecked = $catItem.find('.cat-level').find('.cat-checkbox:checked').length,
			showNum = childrenChecked && $catItem.hasClass('closed');
		$catItem.children('.checked-num').toggleClass('hidden', !showNum).find('.dynamic-num').html(childrenChecked);
	}

	function updateSelectedCatsTxt() {
		if (blockUpdateSelectedCatsTxt) {
			return;
		}
		var $checked = $('.cat-checkbox:checked'),
			total = $checked.length,
			displayedNum = 7,
			list = [];
		$checked.each(function(){
			if (list.length < displayedNum) {
				list.push($(this).closest('.cat-item-label').find('.cat-name').text());
			} else {
				list.push('...');
				return false;
			}
		});
		list = list.join(', ');
		$('.category-inline-data').toggleClass('has-selection', !!total)
		.find('.cat-names').html(list).siblings('.total').find('.value').html(total);
	}
</script>
{/literal}

{function renderCategoryLevel categories = [] root = true}
	{if empty($name)}{$name = 'categoryBox'}{/if}
	<div class="cat-level {if $root}root{else}child{/if}">
	{foreach $categories as $c}
		{$id = $c.id_category}
		{$children = []}{if !empty($tree_categories[$id])}{$children = $tree_categories[$id]}{/if}
		<div class="cat-item{if $children} has-children{if $c.id_parent != $id_parent} closed{/if}{/if}">
			<label class="cat-item-label{if $c.checked} checked{/if}">
				{if !$root}
					<input type="checkbox" class="cat-checkbox" name="{$name|escape:'html':'UTF-8'}[]" value="{$id|intval}"{if $c.checked} checked{/if}>
					<span class="cat-id hidden">{$id|intval}</span>
				{/if}
				<span class="cat-name">{$c.name|escape:'html':'UTF-8'}</span>
				{if $children && !$root}<a href="#" class="icon-folder-open toggleChildren"></a>{/if}
			</label>
			{if $children}
				<span class="checked-num hidden">(<span class="dynamic-num"></span> {l s='checked' mod='amazzingfilter'})</span>
				{renderCategoryLevel categories = $children root = false}
			{/if}
		</div>
	{/foreach}
	</div>
{/function}

<div class="category-inline-data">
	<span class="all">{l s='All available (including new created)' mod='amazzingfilter'}</span>
	<span class="selected-cats">
		<span class="cat-names"></span>
		<span class="total pull-right">{l s='total' mod='amazzingfilter'} <span class="value"></span></span>
	</span>
	<i class="icon-angle-down toggleIndicator"></i>
</div>
<div class="clearfix cat-tree clear-both">
	<a href="#" class="hideTree">{l s='hide' mod='amazzingfilter'}</a>
	{renderCategoryLevel categories = $tree_categories[$id_parent]}
	<div class="tree-footer clearfix">
		<div class="tree-single-action pull-left">
			<label class="tree-action"><input type="checkbox" class="toggleCatIDs"> {l s='Show category IDs'}</label>
		</div>
		<div class="tree-bulk-actions pull-right">
			{l s='bulk actions' mod='amazzingfilter'}:
			<label class="tree-action bulk" data-bulk-action="open">
				<i class="icon-folder-open"></i> {l s='open' mod='amazzingfilter'}
			</label>
			<label class="tree-action bulk" data-bulk-action="close">
				<i class="icon-folder-close"></i> {l s='close' mod='amazzingfilter'}
			</label>
			<label class="tree-action bulk" data-bulk-action="check">
				<i class="icon-check-sign"></i> {l s='check' mod='amazzingfilter'}
			</label>
			<label class="tree-action bulk" data-bulk-action="uncheck">
				<i class="icon-check-empty"></i> {l s='uncheck' mod='amazzingfilter'}
			</label>
			<label class="tree-action bulk" data-bulk-action="invert">
				<span class="txt"><i class="icon-random"></i> {l s='invert' mod='amazzingfilter'}</span>
			</label>
		</div>
	</div>
</div>
{* since 2.8.0 *}
