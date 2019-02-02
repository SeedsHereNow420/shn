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

<div class="filter clearfix" data-key="{$filter.key|escape:'html':'UTF-8'}">
	<div class="f-name">
		<span class="prefix">{$filter.prefix|escape:'html':'UTF-8'}</span>
		<span class="name" data-name="{$filter.name_original|escape:'html':'UTF-8'}">{$filter.name|escape:'html':'UTF-8'}</span>
	</div>
	<div class="f-actions pull-right">
		<a href="#" class="icon-cog toggleFilterSettings" title="{l s='Additional settings' mod='amazzingfilter'}"></a>
		<a href="#" class="icon-trash removeFilter"></a>
	</div>
	<div class="f-quick-settings pull-right">
		{foreach $filter.settings as $name => $field}
			{if empty($field.quick)}{continue}{/if}
			{include file="./form-group.tpl"
				name = $field.input_name
				group_class = 'inline-block'
				input_wrapper_class = 'inline-block'
				label_class = 'inline-block'
			}
		{/foreach}
	</div>
	<div class="f-settings clearfix">
		{foreach $filter.settings as $name => $field}
			{if !empty($field.quick)}{continue}{/if}
			{include file="./form-group.tpl"
				name = $field.input_name
			}
		{/foreach}
	</div>
</div>
{* since 2.8.0 *}
