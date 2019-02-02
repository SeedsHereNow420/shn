{*
* 2007-2017 PrestaShop
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}
{extends file="helpers/form/form.tpl"}

{block name="field"}
	{if $input.type == 'fontello'}
		<div class="fontello_wrap">
			<a id="btn_{$input.name}" class="btn btn-default" data-toggle="modal" href="#" data-target="#modal_{$input.name}">
				<i class="{if $fields_value[$input.name] && array_key_exists($fields_value[$input.name], $input.values.classes)}{$input.values.classes[$fields_value[$input.name]]}{/if}"></i>{l s='Edit' d='Admin.Theme.Transformer'}
			</a>
			<div class="modal fade" id="modal_{$input.name}" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">{l s='Icon' d='Admin.Theme.Transformer'}</h4>
					</div>
					<div class="modal-body">
						<ul class="fontello_list clearfix">
							<li>
								<label>
									<input type="radio"	name="{$input.name}" id="{$input.name}" value=""{if $fields_value[$input.name] == ''} checked="checked"{/if}/>
									{l s='None' d='Admin.Theme.Transformer'}
								</label>
							</li>
							{foreach $input.values.classes AS $code=>$class}
								<li>
								<label>
								<input type="radio"	name="{$input.name}" id="{$input.name}_{$class}" data-classname="{$class}" value="{$code}"{if $fields_value[$input.name] == {$code}} checked="checked"{/if}/>
									<i class="{$class}"></i>
								</label>
								</li>
							{/foreach}
						</ul>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">{l s='OK' d='Admin.Theme.Transformer'}</button>
					</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(function($){
					$("input[name={$input.name}]").change(function() { 
						$("#btn_{$input.name} i").removeClass().addClass($("input[name={$input.name}]:checked").data('classname'));
					});
				});
			</script>
			{if !isset($font_icon_css_loaded)}
			{assign var="font_icon_css_loaded" value=1}
			<style type="text/css">
				@font-face {
				  font-family: 'fontello';
				  src: url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.eot');
				  src: url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.eot#iefix') format('embedded-opentype'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.woff2') format('woff2'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.woff') format('woff'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.ttf') format('truetype'),
				       url('{$input.values.module_name}../../themes/{$input.values.theme_name}/font-fontello/font/fontello.svg#fontello') format('svg');
				  font-weight: normal;
				  font-style: normal;
				}
				{$input.values.css}
			</style>
			{/if}
		</div>
	{elseif $input.type == 'radio'}
		<div class="col-lg-{if isset($input.col)}{$input.col|intval}{else}9{/if}{if !isset($input.label)} col-lg-offset-3{/if}">
		{foreach $input.values as $value}
										<div class="radio {if isset($input.class)}{$input.class}{/if}">
											{strip}
											<label>
											<input type="radio"	name="{$input.name}" id="{$value.id}" value="{$value.value|escape:'html':'UTF-8'}"{if $fields_value[$input.name] == $value.value} checked="checked"{/if}{if isset($input.disabled) && $input.disabled} disabled="disabled"{/if}/>
												{if isset($input.icon_path)}<img src="{$input.icon_path}img/{$input.name}_{$value.value}.jpg" />{/if}
												{$value.label}
											</label>
											{/strip}
										</div>
										{if isset($value.p) && $value.p}<p class="help-block">{$value.p}</p>{/if}
									{/foreach}
									</div>
	{else}
		{$smarty.block.parent}
	{/if}
{/block}