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

{if $files_update_warnings}
	<div class="alert alert-warning">
		{l s='Some of your customized files have been updated in the new version' mod='amazzingfilter'}
		<ul>
		{foreach $files_update_warnings as $file => $identifier}
			<li>
				{$file|escape:'html':'UTF-8'}
				<span class="warning-advice">
					{l s='Make sure you update this file in your theme folder, and insert the following code to the last line' mod='amazzingfilter'}:
					<span class="code">{$identifier|escape:'html':'UTF-8'}</span>
				</span>
			</li>
		{/foreach}
		</ul>
	</div>
{/if}
<div class="bootstrap af clearfix">
	<div class="menu-panel col-lg-2 col-md-3">
		<div class="list-group">
			<a href="#indexation" class="list-group-item{if $indexation_required} active{/if}"><i class="icon-list"></i> {l s='Indexation' mod='amazzingfilter'} <i class="icon-exclamation indexation-warning{if !$indexation_required} hidden{/if}"></i></a>
			<a href="#filter-templates" class="list-group-item{if !$indexation_required} active{/if}"><i class="icon-filter"></i> {l s='Filter templates' mod='amazzingfilter'}</a>
			<a href="#hook-settings" class="list-group-item"><i class="icon-anchor"></i> {l s='Hook settings' mod='amazzingfilter'}</a>
			<a href="#general-settings" class="list-group-item"><i class="icon-cogs"></i> {l s='General settings' mod='amazzingfilter'}</a>
			<a href="#customer-filters" class="list-group-item"><i class="icon-user"></i> {l s='Customer filters' mod='amazzingfilter'}</a>
			{if $overrides_data}
				<a href="#overrides" class="list-group-item"><i class="icon-file-text-o"></i> {l s='Overrides' mod='amazzingfilter'}</a>
			{/if}
			<a href="#info" class="list-group-item"><i class="icon-info-circle"></i> {l s='Information' mod='amazzingfilter'}</a>
		</div>
	</div>
	<div class="panel tab-content col-lg-10 col-md-9">
        <div id="indexation" class="tab-pane{if $indexation_required} active{/if}">
			<h3>{l s='Data indexation' mod='amazzingfilter'}</h3>
			<div class="indexation-data row">
				{foreach $indexation_data as $id_shop => $data}
				<div class="col-lg-4 grid-item">
					<div class="shop-indexation-data{if !$data.missing} complete{/if}" data-shop="{$id_shop|intval}">
						<div class="shop-name">{$data.shop_name|escape:'html':'UTF-8'} <i class="icon-check visible-on-complete"></i></div>
						{l s='Total indexed' mod='amazzingfilter'}: <span class="count indexed">{$data.indexed|intval}</span><br>
						{l s='Missing in index' mod='amazzingfilter'}: <span class="count missing">{$data.missing|intval}</span><br>
						<div class="indexation-actions">
							<a href='#' class="eraseIndex"><i class="icon-eraser"></i> {l s='Erase index' mod='amazzingfilter'}</a>
							<a href='#' class="toggle-cron pull-right"><i class="icon-clock-o"></i> {l s='Cron indexation' mod='amazzingfilter'}</a>
							<div class="cron-block">
								<div class="cron-row first">
									<h4 class="cron-title">{l s='Index missing products URL' mod='amazzingfilter'}</h4>
									{$this->getCronURL($id_shop, ['action' => 'index-missing'])|escape:'html':'UTF-8'}
								</div>
								<div class="cron-row">
									<h4 class="cron-title">{l s='Index all products URL' mod='amazzingfilter'}</h4>
									{$this->getCronURL($id_shop, ['action' => 'index-all'])|escape:'html':'UTF-8'}
								</div>
								<div class="grey-note">
									{l s='Cron commands' mod='amazzingfilter'}:
									<span class="code">curl -L "indexation_url"</span>, or
									<span class="code">wget -O /dev/null -q "indexation_url"</span>
								</div>
								<a href="#" class="close-cron">&times;</a>
							</div>
						</div>
						<div class="progress">
							{$total = $data.missing + $data.indexed}
							{if $total}
								{$w = (100 - $data.missing/$total * 100)|round:0}
							{else}
								{$w = 100}
							{/if}
							<div class="progress-bar progress-bar-success indexation" role="progressbar" aria-valuenow="{$w|intval}"
							aria-valuemin="0" aria-valuemax="100" style="width:{$w|intval}%">
							</div>
						</div>
					</div>
				</div>
				{/foreach}
			</div>
			<div class="indexation-buttons">
				<div class="ajax-status stop">
					{l s='Indexation is in progress... Please, do not close this tab' mod='amazzingfilter'}
				</div>
				<button id="indexProducts" type="button" class="btn btn-default">
					<span class="start"><i class="icon-play"></i> {l s='Index missing products' mod='amazzingfilter'}</span>
					<span class="stop"><i class="icon-refresh icon-spin"></i> {l s='Stop indexation' mod='amazzingfilter'}</span>
	    		</button>
			</div>
    	</div>
        <div id="filter-templates" class="tab-pane{if !$indexation_required} active{/if}">
			<h3>{l s='Category templates' mod='amazzingfilter'}</h3>
			<div class="template-list categories">
    		{foreach $available_templates as $t}
    			{if $t.template_controller && $t.template_controller == 'category'}
    				{include file="./template-form.tpl"}
    			{/if}
    		{/foreach}
    		</div>
    		<button type="button" class="btn btn-primary addTemplate">
    			<i class="icon icon-plus"></i> {l s='New template' mod='amazzingfilter'}
    		</button>
			<h3 class="in-the-middle">{l s='Templates for other pages' mod='amazzingfilter'}</h3>
			<div class="template-list">
			{foreach $available_templates as $t}
				{if $t.template_controller && $t.template_controller != 'category'}
					{include file="./template-form.tpl"}
				{/if}
			{/foreach}
			</div>
        </div>
        <div id="hook-settings" class="tab-pane">
			<h3>{l s='Hook settings' mod='amazzingfilter'}</h3>
			<div class="ajax-warning alert alert-warning hidden"></div>
			<label class="inline-block">{l s='Hook filter to' mod='amazzingfilter'}</label>
			{$current_hook_name = ''}
			<div class="inline-block">
				<select class="hookSelector">
					{foreach $available_hooks as $hook_name => $selected}
						<option value="{$hook_name|escape:'html':'UTF-8'}"{if $selected} selected {$current_hook_name = $hook_name}{/if}>{$hook_name|escape:'html':'UTF-8'}</option>
					{/foreach}
				</select>
			</div>
			<div class="alert alert-info special-hook-note{if $current_hook_name != 'displayAmazzingFilter'} hidden{/if}">
				{l s='In order to display this hook, insert the following code in any tpl' mod='amazzingfilter'}:
				<b>{literal}{hook h='displayAmazzingFilter'}{/literal}</b>
			</div>
			<div class="dynamic-positions">
				{if $current_hook_name}{$this->renderHookPositionsForm($current_hook_name)} {* can not be escaped *}{/if}
			</div>
    	</div>
		<div id="general-settings" class="tab-pane">
			<h3>{l s='General settings' mod='amazzingfilter'}</h3>
			<form method="post" action="" class="settigns_form form-horizontal clearfix">
				{$special_fields = []}
				{foreach $general_settings_fields as $name => $field}
					{if $field.type != 'special'}
						{include file="./form-group.tpl" name = $name field = $field}
					{else}
						{$special_fields[$name] = $field}
					{/if}
				{/foreach}
				{foreach $special_fields as $name => $field}
				<div class="special-fields-group">
					<h3 class="in-the-middle">{$field.display_name|escape:'html':'UTF-8'}</h3>
					{foreach $field.multiple_values as $original_value => $label}
						{$value = $original_value}
						{if !empty($field.value[$original_value])}{$value = $field.value[$original_value]}{/if}
						<div class="form-group col-lg-6">
							<label class="control-label col-lg-6">{$label|escape:'html':'UTF-8'}</label>
							<div class="input-group col-lg-6">
								{if $name == 'af_classes'}{$addon = ' . '}{else}{$addon = '#'}{/if}
								<span class="input-group-addon">{$addon|escape:'html':'UTF-8'}</span>
								<input type="text" name="{$name|escape:'html':'UTF-8'}[{$original_value|escape:'html':'UTF-8'}]" value="{$value|escape:'html':'UTF-8'}" data-original="{$original_value|escape:'html':'UTF-8'}">
							</div>
						</div>
					{/foreach}
					<a href="#" class="resetFields col-lg-offset-3"><i class="icon-undo"></i> {if $name == 'af_classes'}{l s='Reset classes' mod='amazzingfilter'}{else}{l s='Reset IDs' mod='amazzingfilter'}{/if}</a>
				</div>
				{/foreach}
				<div class="panel-footer">
					<button type="button" name="saveSettings" class="saveSettings btn btn-default">
						<i class="process-icon-save"></i>
						{l s='Save' mod='amazzingfilter'}
					</button>
				</div>
			</form>
		</div>
		<div id="customer-filters" class="tab-pane">
			<h3>{l s='Customer filters' mod='amazzingfilter'}</h3>
			<form class="customer-filters">
				<div class="alert alert-info">
					{l s='Specify criteria, that can be used in customer filters' mod='amazzingfilter'}.<br>
					<i>{l s='In order to deactivate this feature, just make sure all criteria are unchecked' mod='amazzingfilter'}</i>
				</div>
				{foreach $available_customer_filters as $input_name => $f}
					<div class="col-lg-4">
						<label class="control-label">
							{$checked = in_array($input_name, $saved_customer_filters)}
							<input type="checkbox" name="customer_filters[]" value="{$input_name|escape:'html':'UTF-8'}"{if $checked} checked{/if}>
							<span class="prefix">{$f.prefix|escape:'html':'UTF-8'}:</span>
							{$f.name|escape:'html':'UTF-8'}
						</label>
					</div>
				{/foreach}
				<div class="clearfix"></div>
				<div class="panel-footer">
					<button type="button" class="saveAvailableCustomerFilters btn btn-default">
						<i class="process-icon-save"></i>
						{l s='Save' mod='amazzingfilter'}
					</button>
				</div>
			</form>
		</div>
		{if $overrides_data}
		<div id="overrides" class="tab-pane">
			<h3>{l s='Overrides' mod='amazzingfilter'}</h3>
			<div class="alert alert-info">
				{l s='In most cases overrides are added automatically on module installation' mod='amazzingfilter'}.
				{l s='They are used to improve filtering/indexation functionality' mod='amazzingfilter'}.<br>
				<span class="b">{l s='NOTE: These are advanced settings' mod='amazzingfilter'}.</span>
				{l s='Do not change anything here, if you are not sure what are you doing.' mod='amazzingfilter'}
			</div>
			<div class="overrides-list">
				{foreach $overrides_data as $class_name => $override}
					<div class="override-item{if $override.installed === true} installed{else if $override.installed === false} not-installed{/if} clearfix">
						<span class="override-name b">{$override.path|escape:'html':'UTF-8'}</span>
						{if $override.installed === true || $override.installed === false}
							<span class="override-status alert-success">{l s='Installed' mod='amazzingfilter'}</span>
							<span class="override-status alert-danger">{l s='Not installed' mod='amazzingfilter'}</span>
						{else}
							<span class="override-status alert-warning">{l s='The following methods are already overriden: %s' mod='amazzingfilter' sprintf=[$override.installed]}</span>
							<span class="grey-note pull-right install-manually">{l s='Should be added manually' mod='amazzingfilter'}</span>
						{/if}
						<button class="btn btn-default install-override pull-right" data-override="{$override.path|escape:'html':'UTF-8'}">
							{l s='Install' mod='amazzingfilter'}
						</button>
						<button class="btn btn-default uninstall-override pull-right" data-override="{$override.path|escape:'html':'UTF-8'}">
							{l s='Uninstall' mod='amazzingfilter'}
						</button>
						<div class="grey-note">
							{if $class_name == 'AdminProductsController'}
								{l s='Obligatory' mod='amazzingfilter'}.
							{else}
								{l s='Not obligatory' mod='amazzingfilter'}.
							{/if}
							{if $override.note}{$override.note|escape:'html':'UTF-8'}.{/if}
						</div>
					</div>
				{/foreach}
			</div>
		</div>
		{/if}
		<div id="info" class="tab-pane">
			<h3 class="panel-title"><span class="text">{l s='Information' mod='amazzingfilter'}</span></h3>
			<div class="info-row">Current version: <b>{$this->version|escape:'html':'UTF-8'}</b></div>
			<div class="info-row"><a href="{$changelog_link|escape:'html':'UTF-8'}" target="_blank"><i class="icon-code-fork"></i> Changelog</a></div>
			<div class="info-row"><a href="{$documentation_link|escape:'html':'UTF-8'}" target="_blank"><i class="icon-file-text"></i> Documentation</a></div>
			<div class="info-row"><a href="{$contact_us_link|escape:'html':'UTF-8'}" target="_blank"><i class="icon-envelope"></i> Contact us</a></div>
			<div class="info-row"><a href="{$other_modules_link|escape:'html':'UTF-8'}" target="_blank"><i class="icon-download"></i> Our modules</a></div>
		</div>
    </div>
</div>
<div class="modal fade" id="dynamic-popup" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            	<h3 class="modal-title"></h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="dynamic-content clearfix"></div>
        </div>
    </div>
</div>
{* since 2.8.0 *}
