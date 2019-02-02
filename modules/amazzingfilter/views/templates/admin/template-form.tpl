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

<div class="af_template {$t.template_controller|escape:'html':'UTF-8'}{if isset($template_filters)} open{/if}" data-id="{$t.id_template|intval}" data-controller="{$t.template_controller|escape:'html':'UTF-8'}">
	<form class="template-form form-horizontal">
	<div class="template_header clearfix">
		<div class="template-name">
			<h4 class="list-view inline-block">{$t.template_name|escape:'html':'UTF-8'}</h4>
			<div class="open-view">
				<input type="text" name="template_name" value="{$t.template_name|escape:'html':'UTF-8'}">
			</div>
		</div>
		<div class="template-controller hidden"> {* temporarily hidden. May be used in next versions *}
			<label class="inline-block">{l s='Displayed on' mod='amazzingfilter'}</label>
			<div class="inline-block list-view">
				{if isset($controller_options[$t.template_controller])}
					{$txt = $controller_options[$t.template_controller]}
				{else}
					{$txt = $t.template_controller}
				{/if}
				{Tools::strtolower($txt)|escape:'html':'UTF-8'}
			</div>
			<div class="inline-block open-view">
				<select name="template_controller">
					{foreach $controller_options as $value => $display_name}
						<option value="{$value|escape:'html':'UTF-8'}"{if $value == $t.template_controller} selected{/if}>{$display_name|escape:'html':'UTF-8'}</option>
					{/foreach}
				</select>
			</div>
		</div>
		<div class="template-actions pull-right">
			<a class="activateTemplate list-action-enable action-{if $t.active == 1}enabled{else}disabled{/if}" href="#" title="{l s='Activate' mod='amazzingfilter'}">
				<i class="icon-check"></i>
				<i class="icon-remove"></i>
				<input type="hidden" name="active" value="{$t.active|intval}">
			</a>
			<div class="btn-group pull-right">
				<a href="#" title="{l s='Edit' mod='amazzingfilter'}" class="editTemplate btn btn-default">
					<i class="icon icon-pencil"></i> {l s='Edit' mod='amazzingfilter'}
				</a>
				<a href="#" title="{l s='Scroll Up' mod='amazzingfilter'}" class="scrollUp btn btn-default">
					<i class="icon icon-minus"></i> {l s='Scroll Up' mod='amazzingfilter'}
				</a>
				{if $t.template_controller == 'category'}
				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<i class="icon-caret-down"></i>
				</button>
				<ul class="dropdown-menu">
					<li><a href="#" class="template-action" data-action="Duplicate">
						<i class="icon icon-copy"></i> {l s='Dduplicate' mod='amazzingfilter'}
					</a></li>
					<li><a chref="#" class="template-action" data-action="Delete">
						<i class="icon icon-trash"></i> {l s='Delete' mod='amazzingfilter'}
					</a></li>
				</ul>
				{/if}
			</div>
		</div>
	</div>
	<div class="template_settings row clearfix" style="display:none;">
		{if isset($template_filters) && isset($template_settings)}
		<div class="col-md-12">
			<div class="basic-settings clearfix">
				{foreach $template_settings as $name => $field}
					{include file="./form-group.tpl"
						label_class = 'basic-label'
						input_wrapper_class = 'basic-input'
					}
				{/foreach}
			</div>
		</div>
		<div class="col-md-12">
			<label class="basic-label">{l s='Current filters' mod='amazzingfilter'}</label>
			<div class="filters">
				<div class="f-list sortable">
					{foreach $template_filters as $key => $filter}
						{if !empty($filter)}{include file="./filter-form.tpl"}{/if}
					{/foreach}
				</div>
				<a href="#" class="addNewFilter" data-toggle="modal" data-target="#dynamic-popup">
					<i class="icon-plus"></i> {l s='add new' mod='amazzingfilter'}
				</a>
			</div>
		</div>
    	<div class="tempate-footer col-lg-12 clear-both">
    		<input type="hidden" name="id_template" value="{$t.id_template|intval}">
	    	<button type="button" name="saveTemplate" class="saveTemplate btn btn-default">
				<i class="process-icon-save"></i>
				{l s='Save template' mod='amazzingfilter'}
			</button>
		</div>
    	{/if}
	</div>
	</form>
</div>
{* since 2.8.0 *}
