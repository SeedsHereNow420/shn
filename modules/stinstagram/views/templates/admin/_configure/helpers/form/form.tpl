{*
* 2007-2016 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    ST-themes
*  @copyright 2007-2016 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*  
*  
*}

{extends file="helpers/form/form.tpl"}{block name="autoload_tinyMCE"}
    {literal}
	tinySetup({
		editor_selector :"autoload_rte",
		plugins : "colorpicker link image paste pagebreak table contextmenu filemanager table code media autoresize textcolor template",
		toolbar1 : "code,|,bold,italic,underline,strikethrough,|,alignleft,aligncenter,alignright,alignfull,formatselect,|,blockquote,colorpicker,pasteword,|,bullist,numlist,|,outdent,indent,|,link,unlink,|,cleanup,|,media,image,|,template",
        templates : "{/literal}{$smarty.const._MODULE_DIR_|escape:'htmlall':'UTF-8'}{literal}stinstagram/template_list.php",
        valid_children : '+a[div|h1|h2|h3|h4|h5|h6|h7|span|img|em|p]',
        verify_html : false
	});
    {/literal}
{/block}

{block name="field"}
	{if $input.type == 'dropdownlistgroup'}
		<div class="col-lg-{if isset($input.col)}{$input.col|intval}{else}9{/if} {if !isset($input.label)}col-lg-offset-3{/if} fontello_wrap">
			<div class="row">
				{foreach $input.values.medias AS $media}
					<div class="col-xs-4 col-sm-3">
						<label data-html="true" data-toggle="tooltip" class="label-tooltip" data-original-title="{if $media=='fw'}{l s='If this is set and this module is hooked to the displayFullWidthXXX hooks, then this module will be displayed in full screen.' d='Admin.Theme.Transformer'}{elseif $media=='xxl'}{l s='Desktops (>1400px)' d='Admin.Theme.Transformer'}{elseif $media=='xl'}{l s='Desktops (>1200px)' d='Admin.Theme.Transformer'}{elseif $media=='lg'}{l s='Desktops (>992px)' d='Admin.Theme.Transformer'}{elseif $media=='md'}{l s='Tablets (>768px)' d='Admin.Theme.Transformer'}{elseif $media=='sm'}{l s='Phones (>544px)' d='Admin.Theme.Transformer'}{elseif $media=='xs'}{l s='Phones (<544px)' d='Admin.Theme.Transformer'}{/if}">{if $media=='fw'}{l s='Full screen' d='Admin.Theme.Transformer'}{elseif $media=='xxl'}{l s='Extra large devices' d='Admin.Theme.Transformer'}{elseif $media=='xl'}{l s='Large devices' d='Admin.Theme.Transformer'}{elseif $media=='lg'}{l s='Medium devices' d='Admin.Theme.Transformer'}{elseif $media=='md'}{l s='Small devices' d='Admin.Theme.Transformer'}{elseif $media=='sm'}{l s='Extra small devices' d='Admin.Theme.Transformer'}{elseif $media=='xs'}{l s='Extremely small devices' d='Admin.Theme.Transformer'}{/if}</label>
						<select name="{$input.name|escape:'htmlall':'UTF-8'}_{$media|escape:'htmlall':'UTF-8'}" id="{$input.name|escape:'htmlall':'UTF-8'}_{$media|escape:'htmlall':'UTF-8'}" class="fixed-width-md">
						{if $media=='fw'}<option value="0" {if !$fields_value[$input['name']|cat:"_"|cat:$media]} selected="selected" {/if}></option>{/if}
            			{for $foo=1 to $input.values.maximum}
	                        <option value="{$foo|escape:'htmlall':'UTF-8'}" {if $fields_value[$input['name']|cat:"_"|cat:$media] == $foo} selected="selected" {/if}>{$foo|escape:'htmlall':'UTF-8'}</option>
	                    {/for}
            			</select>
					</div>
				{/foreach}
			</div>
			{if isset($input.desc) && !empty($input.desc)}
				<p class="help-block">
					{if is_array($input.desc)}
						{foreach $input.desc as $p}
							{if is_array($p)}
								<span id="{$p.id|escape:'html':'UTF-8'}">{$p.text|escape:'html':'UTF-8'}</span><br />
							{else}
								{$p|escape:'html':'UTF-8'}<br />
							{/if}
						{/foreach}
					{else}
						{$input.desc|escape:'html':'UTF-8'}
					{/if}
				</p>
			{/if}
		</div>
	{elseif $input.type == 'go_back_to_list'}
		<div class="col-lg-9">
			<a class="btn btn-default btn-block fixed-width-md" href="{$input.name|escape:'htmlall':'UTF-8'}" title="{l s='Back to list' d='Modules.Stinstagram.Admin'}"><i class="icon-arrow-left"></i> {l s='Back to list' d='Modules.Stinstagram.Admin'}</a>
		</div>
	{elseif $input.type == 'show_bg_patterns'}
		<div class="col-lg-9">
			{for $foo=1 to $input.size}
				<div class="parttern_wrap" style="background:url({$input.name|escape:'htmlall':'UTF-8'}{$foo|escape:'htmlall':'UTF-8'}.png);"><span>{$foo|escape:'htmlall':'UTF-8'}</span></div>
			{/for}
			<div>{l s='Pattern credits:' d='Modules.Stinstagram.Admin'}<a href="http://subtlepatterns.com" target="_blank">subtlepatterns.com</a></div>
		</div>
	{elseif $input.type == 'verify_username'}
		<div class="col-lg-9">
			<div><button id="st_verify_user" type="button" class="btn btn-info">{$input.name|escape:'htmlall':'UTF-8'}</button></div>
            <div id="message_box"></div>
			{if isset($input.desc) && !empty($input.desc)}
				<p class="help-block">
					{if is_array($input.desc)}
						{foreach $input.desc as $p}
							{if is_array($p)}
								<span id="{$p.id|escape:'htmlall':'UTF-8'}">{$p.text|escape:'html':'UTF-8'}</span><br />
							{else}
								{$p|escape:'html':'UTF-8'}<br />
							{/if}
						{/foreach}
					{else}
						{$input.desc|escape:'html':'UTF-8'}
					{/if}
				</p>
			{/if}
		</div>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}