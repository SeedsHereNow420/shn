{*
* 2007-2015 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2015 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{extends file='layouts/layout-content-only.tpl'}

{block name='breadcrumb'}{/block}
{block name="content"}{/block}
{block name="full_width_top" append}
	<!-- Start -->
	{foreach $adveditor_banners as $banner_index => $banner}
	<div id="adveditor_box_{$banner@index}" class="adveditor_box">
	<div class="adveditor_block">
		<div class="adveditor_top p-b-2 p-t-2">
			<div class="flex_container flex_center">
			<div class="st_banner_block style_content">
				<img class="adveditor_image" src="{$banner_url}banner{$banner_index}.jpg" alt="" />
				<div class="adveditor_a_warper">
					<div class="adveditor_content">
						<div class="layered_content">
							{foreach $banner.elements as $element_index => $element}
								{if $element.type=='header'}
									<{$element.tag} class="style_header style_header_{$element_index} {if isset($element.transform)} {$element.transform} {/if}">{$element.text}</{$element.tag}>
								{/if}
								{if $element.type=='separator'}
									<div class="steasy_divider flex_container flex_center  style_separator_{$element_index}">
										<div class="steasy_divider_item"></div>
        								<div class="steasy_divider_text"></div>
										<div class="steasy_divider_item"></div>
									</div>
								{/if}
							{/foreach}
							<div class="style_buttons">
								{foreach $banner.buttons as $button_index => $button}
									<span class="btn style_button style_button_{$button_index} {if isset($button.class)} {$button.class} {else} btn-default {/if} {if isset($button.hidden) && $button.hidden} hidden-xs-up {/if}">{if isset($button.text)}{$button.text}{else}SHOP NOW{/if}</span>
								{/foreach}
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		
		<div class="adveditor_bottom sttab_block sttab_2_1">
			<div class="adveditor_middle m-b-1">
				<div class="container flex_container flex_left">
				<div class="fs_lg color_fff m-r-3 font-weight-bold">{l s='Banner style' d='Admin.Theme.Transformer'} {$banner_index+1}</div>
				<ul class="nav nav-tabs tab_lg" role="tablist">
					{if !$adv_content_only}
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#banner_{$banner_index}_tab_0" role="tab">{l s='Settings' d='Admin.Theme.Transformer'}</a>
					</li>
					{/if}
					{foreach $banner.elements as $element_index => $element}
						<li class="nav-item">
							<a class="nav-link {if $adv_content_only && $element@first} active {/if}" data-toggle="tab" href="#banner_{$banner_index}_tab_1{$element_index}" role="tab" data-banner-index="{$banner_index}" data-element-class="{if $element.type=='header'}.style_header{elseif $element.type=='separator'}.style_separator{/if}_{$element_index}">{if isset($element.tag)}{$element.tag|strtoupper}{else}{$element.type|strtoupper}{/if}</a>
						</li>
					{/foreach}
					{foreach $banner.buttons as $button_index => $button}
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#banner_{$banner_index}_tab_2{$button_index}" role="tab" data-banner-index="{$banner_index}" data-element-class=".style_button_{$button_index}">{l s='Button' d='Admin.Theme.Transformer'} {$button_index+1}</a>
						</li>
					{/foreach}
				</ul>
				</div>
			</div>
			<div class="container">
			<!-- Tab panes -->
			<div class="tab-content">
			  <div class="tab-pane {if !$adv_content_only} active {/if}" id="banner_{$banner_index}_tab_0" role="tabpanel">
			  	<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Horizontal align' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
					    <div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input h_align" name="banner{$banner_index}_h_align" value="flex_left" {if isset($banner.settings.h_align) && $banner.settings.h_align=='flex_left'} checked="checked" {/if} autocomplete="off" />
					        {l s='Left' d='Admin.Theme.Transformer'}
					      </label>
					    </div>
					    <div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input h_align" name="banner{$banner_index}_h_align" value="flex_center" {if isset($banner.settings.h_align) && $banner.settings.h_align=='flex_center'} checked="checked" {/if} {if !isset($banner.settings.h_align)} checked="checked" {/if} autocomplete="off" />
					        {l s='Center' d='Admin.Theme.Transformer'}
					      </label>
					    </div>
					    <div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input h_align" name="banner{$banner_index}_h_align" value="flex_right" {if isset($banner.settings.h_align) && $banner.settings.h_align=='flex_right'} checked="checked" {/if} autocomplete="off" />
					        {l s='Right' d='Admin.Theme.Transformer'}
					      </label>
					    </div>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Vertical align' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
					    <div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input v_align" name="banner{$banner_index}_v_align" value="flex_start" {if isset($banner.settings.v_align) && $banner.settings.v_align=='flex_start'} checked="checked" {/if} autocomplete="off" />
					        {l s='Top' d='Admin.Theme.Transformer'}
					      </label>
					    </div>
				    	<div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input v_align" name="banner{$banner_index}_v_align" value="flex_middle" {if isset($banner.settings.v_align) && $banner.settings.v_align=='flex_middle'} checked="checked" {/if} {if !isset($banner.settings.v_align)} checked="checked" {/if} autocomplete="off" />
					        {l s='middle' d='Admin.Theme.Transformer'}
					      </label>
					    </div>
					    <div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input v_align" name="banner{$banner_index}_v_align" value="flex_end" {if isset($banner.settings.v_align) && $banner.settings.v_align=='flex_end'} checked="checked" {/if} autocomplete="off" />
					        {l s='Bottom' d='Admin.Theme.Transformer'}
					      </label>
					    </div>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Text align' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
					    <div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input t_align" name="banner{$banner_index}_t_align" value="text-1" {if isset($banner.settings.t_align) && $banner.settings.t_align=='text-1'} checked="checked" {/if} autocomplete="off" />
					        {l s='Left' d='Admin.Theme.Transformer'}
					      </label>
					    </div>
				    	<div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input t_align" name="banner{$banner_index}_t_align" value="text-2" {if isset($banner.settings.t_align) && $banner.settings.t_align=='text-2'} checked="checked" {/if} {if !isset($banner.settings.t_align)} checked="checked" {/if} autocomplete="off" />
					        {l s='Center' d='Admin.Theme.Transformer'}
					      </label>
					    </div>
					    <div class="form-check">
					      <label class="form-check-label">
					        <input type="radio" class="form-check-input t_align" name="banner{$banner_index}_t_align" value="text-3" {if isset($banner.settings.t_align) && $banner.settings.t_align=='text-3'} checked="checked" {/if} autocomplete="off" />
					        {l s='Right' d='Admin.Theme.Transformer'}
					      </label>
					    </div>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Padding' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="row">
					    	<div class="col-6">
						    	<label>{l s='Top' d='Admin.Theme.Transformer'}</label>
						    	<div class="input-group">
						    		<input class="adveditor_size form-control" value="{if isset($banner.settings.padding_top)}{$banner.settings.padding_top}{/if}" type="text" data-target=".adveditor_content" data-property="padding-top" data-unit="%" placeholder="5" autocomplete="off" />
								  	<span class="input-group-addon">%</span>
								</div>
						    </div>
						    <div class="col-6">
						    	<label>{l s='Right' d='Admin.Theme.Transformer'}</label>
						    	<div class="input-group">
						    		<input class="adveditor_size form-control" value="{if isset($banner.settings.padding_right)}{$banner.settings.padding_right}{/if}" type="text" data-target=".adveditor_content" data-property="padding-right" data-unit="%" placeholder="5" autocomplete="off" />
								  	<span class="input-group-addon">%</span>
								</div>
						    </div>
					    </div>
					    <div class="row">
						    <div class="col-6">
						    	<label>{l s='Bottom' d='Admin.Theme.Transformer'}</label>
						    	<div class="input-group">
						    		<input class="adveditor_size form-control" value="{if isset($banner.settings.padding_bottom)}{$banner.settings.padding_bottom}{/if}" type="text" data-target=".adveditor_content" data-property="padding-bottom" data-unit="%" placeholder="5" autocomplete="off" />
								  	<span class="input-group-addon">%</span>
								</div>
						    </div>
						    <div class="col-6">
						    	<label>{l s='Left' d='Admin.Theme.Transformer'}</label>
						    	<div class="input-group">
						    		<input class="adveditor_size form-control" value="{if isset($banner.settings.padding_left)}{$banner.settings.padding_left}{/if}" type="text" data-target=".adveditor_content" data-property="padding-left" data-unit="%" placeholder="5" autocomplete="off" />
								  	<span class="input-group-addon">%</span>
								</div>
						    </div>
					    </div>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Background' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
					    <div class="row">
						    <div class="col-6">
						    	<div class="input-group">
						    		<input type="color" data-hex="true" class="form-control mColorPickerInput" value="{if isset($banner.settings.background)}{$banner.settings.background}{/if}" data-target=".layered_content" data-property="background-color"  autocomplete="off" />
						    	</div>
						    </div>
						    <div class="col-6">
						    	<div class="input-group">
						    		<input class="adveditor_size form-control" value="{if isset($banner.settings.text_padding)}{$banner.settings.text_padding}{/if}" type="text" data-target=".layered_content" autocomplete="off" data-property="padding" data-unit="px" placeholder="{if isset($banner.settings.text_padding)}{$banner.settings.text_padding}{/if}"/>
								  	<span class="input-group-addon">px</span>
								</div>
						    </div>
						</div>
				    </div>
				</div>	 
			  	<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Link' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<input type="text" autocomplete="off" class="adveditor_banner_url form-control" value=""/>
				    	<p class="form-text text-muted">
						  {l s='If this field is filled in, whole banner would be clickable, button links would be ignored, becase cannot be nested.' d='Admin.Theme.Transformer'}
						</p>
				    	<label>{l s='Link title' d='Admin.Theme.Transformer'}</label>
				    	<input type="text" autocomplete="off" class="adveditor_banner_url_title form-control" value=""/>	
				    </div>
				</div>	 	
			  </div>
			  {foreach $banner.elements as $element_index => $element}
			  {if $element.type=='header'}	
		  	  <div class="tab-pane {if $adv_content_only && $element@first} active {/if}" id="banner_{$banner_index}_tab_1{$element_index}" role="tabpanel">				
			  	<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Header' d='Admin.Theme.Transformer'} {$element_index+1}</label>
				    <div class="col-9">
				    	<textarea autocomplete="off" class="adveditor_text_val form-control" data-target=".style_header_{$element_index}">{$element.text}</textarea>	
				    	<div>
				    		<button type="button" class="btn btn-primary adveditor_transform" data-transform="text-uppercase" data-target=".style_header_{$element_index}">{l s='Uppercase' d='Admin.Theme.Transformer'}</button>
					    	<button type="button" class="btn btn-primary adveditor_transform" data-transform="text-lowercase" data-target=".style_header_{$element_index}">{l s='Lowercase' d='Admin.Theme.Transformer'}</button>
					    	<button type="button" class="btn btn-primary adveditor_transform" data-transform="text-capitalize" data-target=".style_header_{$element_index}">{l s='Capitalize' d='Admin.Theme.Transformer'}</button>
					    	<button type="button" class="btn btn-primary adveditor_transform" data-transform="" data-target=".style_header_{$element_index}">{l s='None' d='Admin.Theme.Transformer'}</button>
				    	</div>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Color' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input type="color" data-hex="true" class="form-control mColorPickerInput" value="{if isset($element.color)}{$element.color}{/if}" data-target=".style_header_{$element_index}" data-property="color"  autocomplete="off" />
				    	</div>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Font size' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input class="adveditor_size form-control" value="{if isset($element.font_size)}{$element.font_size}{/if}" type="text" data-target=".style_header_{$element_index}" autocomplete="off" data-property="font-size" data-unit="{if $element.tag=='p' || $element.tag=='div'}px{else}em{/if}" placeholder="{if isset($element.font_size)}{$element.font_size}{/if}"/>
						  	<span class="input-group-addon">px</span>
						</div>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Google fonts' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="row">
					    	<div class="col-6">
						    	<select id="banner{$banner_index}_header_{$element_index}" class="adveditor_font form-control" data-target=".style_header_{$element_index}" autocomplete="off">
						    		<option value=""></option>
						    		{if isset($element.font_family)}
						    			{assign var='font_family' value=$element.font_family}
						    		{else}
						    			{assign var='font_family' value=''}
						    		{/if}
						    		{foreach $googleFonts as $font}
						    		<option value="{$font.family}" {if $font.family==$font_family} selected="selected" {/if}>{$font.family}</option>
						    		{/foreach}
						    	</select>
						    </div>
						    <div class="col-6">
				    			<select id="banner{$banner_index}_header_{$element_index}_weight" class="adveditor_font_weight form-control" data-target=".style_header_{$element_index}" autocomplete="off"></select>
						    </div>
					    </div>
				    </div>
				</div>	
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Line height' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input class="adveditor_size form-control" value="{if isset($element.line_height)}{$element.line_height}{/if}" type="text" data-target=".style_header_{$element_index}" autocomplete="off" data-property="line-height" data-unit="%"  placeholder="150" />
						  	<span class="input-group-addon">%</span>
						</div>
						<p class="form-text text-muted">
						  {l s='150 by default. You can use this setting to change the spacing between headers.' d='Admin.Theme.Transformer'}
						</p>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Margin bottom' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input class="adveditor_size form-control" value="{if isset($element.margin_bottom)}{$element.margin_bottom}{/if}" type="text" data-target=".style_header_{$element_index}" autocomplete="off" data-property="margin-bottom" data-unit="px" data-zero="1"  placeholder="8" />
						  	<span class="input-group-addon">px</span>
						</div>
				    </div>
				</div>
				{if isset($element.block_width_percentage)}
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Width' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
			    		<select class="adveditor_width form-control" data-target=".style_header_{$element_index}" autocomplete="off">
				    		{foreach $element.block_width_percentage as $width}
				    		<option value="{$width}" {if $width==$element.width} selected="selected" {/if}>{$width}%</option>
				    		{/foreach}
				    	</select>
				    </div>
				</div>	
				{/if}	
			  </div>
			  {/if}
			  {if $element.type=='separator'}
			  <div class="tab-pane" id="banner_{$banner_index}_tab_1{$element_index}" role="tabpanel">
			  	<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Text' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<textarea autocomplete="off" class="adveditor_text_val form-control" data-target=".steasy_divider_text">{if isset($element.text)}{$element.text}{/if}</textarea>	
				    </div>
				</div>	 	
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Text Color' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input type="color" data-hex="true" class="form-control mColorPickerInput" value="{if isset($element.color)}{$element.color}{/if}" data-target=".steasy_divider_text" data-property="color"  autocomplete="off" />
				    	</div>
				    </div>
				</div>	
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Font size' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input class="adveditor_size form-control" value="{if isset($element.font_size)}{$element.font_size}{/if}" type="text" data-target=".steasy_divider_text" autocomplete="off" data-property="font-size" data-unit="px" placeholder="{if isset($element.font_size)}{$element.font_size}{/if}"/>
						  	<span class="input-group-addon">px</span>
						</div>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Google fonts' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="row">
					    	<div class="col-6">
						    	<select id="banner{$banner_index}_header_{$element_index}" class="adveditor_font form-control" data-target=".steasy_divider_text" autocomplete="off">
						    		<option value=""></option>
						    		{if isset($element.font_family)}
						    			{assign var='font_family' value=$element.font_family}
						    		{else}
						    			{assign var='font_family' value=''}
						    		{/if}
						    		{foreach $googleFonts as $font}
						    		<option value="{$font.family}" {if $font.family==$font_family} selected="selected" {/if}>{$font.family}</option>
						    		{/foreach}
						    	</select>
						    </div>
						    <div class="col-6">
				    			<select id="banner{$banner_index}_header_{$element_index}_weight" class="adveditor_font_weight form-control" data-target=".steasy_divider_text" autocomplete="off"></select>
						    </div>
					    </div>
				    </div>
				</div>	
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Separator Color' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input type="color" data-hex="true" class="form-control mColorPickerInput" value="{if isset($element.border_color)}{$element.border_color}{/if}" data-target=".steasy_divider_item" data-property="border-color"  autocomplete="off" />
				    	</div>
				    </div>
				</div>	
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Separator Width' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input class="adveditor_size form-control" value="{if isset($element.border_width)}{$element.border_width}{/if}" type="text" data-target=".steasy_divider_item" autocomplete="off" data-property="width" data-unit="px" placeholder="30" />
						  	<span class="input-group-addon">px</span>
						</div>
				    </div>
				</div>	
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Separator height' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input class="adveditor_size form-control" value="{if isset($element.border_height)}{$element.border_height}{/if}" type="text" data-target=".steasy_divider_item" autocomplete="off" data-property="border-bottom-width" data-unit="px" placeholder="2" />
						  	<span class="input-group-addon">px</span>
						</div>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Margin bottom' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input class="adveditor_size form-control" value="{if isset($element.margin_bottom)}{$element.margin_bottom}{/if}" type="text" data-target=".steasy_divider" autocomplete="off" data-property="margin-bottom" data-unit="px" data-zero="1"  placeholder="8" />
						  	<span class="input-group-addon">px</span>
						</div>
				    </div>
				</div>		
			  </div>		
			  {/if}		  	
			  {/foreach}
			  {foreach $banner.buttons as $button_index => $button}
			  <div class="tab-pane" id="banner_{$banner_index}_tab_2{$button_index}" role="tabpanel">
			  	<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Button' d='Admin.Theme.Transformer'} {$button_index+1} {l s='status' d='Admin.Theme.Transformer'} </label>
				    <div class="col-9">
					    <button type="button" class="btn btn-primary adveditor_btn_hide" data-target=".style_button_{$button_index}">{l s='Hide this button' d='Admin.Theme.Transformer'}</button>
					    <button type="button" class="btn btn-primary adveditor_btn_show" data-target=".style_button_{$button_index}">{l s='Show this button' d='Admin.Theme.Transformer'}</button>
				    </div>
				</div>		
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Button' d='Admin.Theme.Transformer'} {$button_index+1}</label>
				    <div class="col-9">
					    <div class="row">
						    <div class="col-6">
						    	<label>{l s='Text' d='Admin.Theme.Transformer'}</label>
						    	<div class="input-group">
						    		<input type="text" autocomplete="off" class="adveditor_button form-control" value="{if isset($button.text)}{$button.text}{else}SHOP NOW{/if}" data-target=".style_button_{$button_index}"/>
								</div>
								<p class="form-text text-muted">
								  {l s='If the text filed is empty, this button will be unvisiable.' d='Admin.Theme.Transformer'}
								</p>
						    </div>
						    <div class="col-6">
						    	<label>{l s='Link' d='Admin.Theme.Transformer'}</label>
						    	<div class="input-group">
						    		<input type="text" autocomplete="off" class="adveditor_button_url form-control" value="" data-target=".style_button_{$button_index}"/>
								</div>
						    </div>
					    </div>
				    		
				    </div>
				</div>			
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Style' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    		<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-default">{l s='Default' d='Admin.Theme.Transformer'}</button>
				    		<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-white">{l s='White' d='Admin.Theme.Transformer'}</button>
				    		<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-primary">{l s='Primary' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-secondary">{l s='Secondary' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-success">{l s='Success' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-info">{l s='Info' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-warning">{l s='Warning' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-danger">{l s='Danger' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-link">{l s='Link' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-outline-primary">{l s='Primary' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-outline-secondary">{l s='Secondary' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-outline-success">{l s='Success' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-outline-info">{l s='Info' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-outline-warning">{l s='Warning' d='Admin.Theme.Transformer'}</button>
							<button data-target=".style_button_{$button_index}" class="adveditor_btn btn btn-outline-danger">{l s='Danger' d='Admin.Theme.Transformer'}</button>
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label">Size</label>
				    <div class="col-9">
					    <div class="row">
						    <div class="col-4">
						    	<label>{l s='Font-size' d='Admin.Theme.Transformer'}</label>
						    	<div class="input-group">
						    		<input class="adveditor_size form-control" value="{if isset($button.height)}{$button.height}{/if}" type="text" data-target=".style_button_{$button_index}" autocomplete="off" data-property="font-size" data-unit="px" />
								  	<span class="input-group-addon">px</span>
								</div>
						    </div>
						    <div class="col-4">
						    	<label>{l s='Height' d='Admin.Theme.Transformer'}</label>
						    	<div class="input-group">
						    		<input class="adveditor_size form-control" value="{if isset($button.height)}{$button.height}{/if}" type="text" data-target=".style_button_{$button_index}" autocomplete="off" data-property="height" data-line-height="4" data-unit="px" />
								  	<span class="input-group-addon">px</span>
								</div>
						    </div>
						    <div class="col-4">
						    	<label>{l s='Increase button width' d='Admin.Theme.Transformer'}</label>
						    	<div class="input-group">
						    		<input class="adveditor_size form-control" value="{if isset($button.width)}{$button.width}{/if}" type="text" data-target=".style_button_{$button_index}" autocomplete="off" data-property="padding-left padding-right" data-unit="px" />
								  	<span class="input-group-addon">px</span>
								</div>
						    </div>
					    </div>
				    		
				    </div>
				</div>								
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Color' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input type="color" data-hex="true" class="form-control mColorPickerInput" value="{if isset($button.color)}{$button.color}{/if}" data-target=".style_button_{$button_index}" data-property="color"  autocomplete="off" />
				    	</div>
				    	<p class="form-text text-muted">
						  {l s='Use the "Button hover color" setting on the detail page to change button hover color' d='Admin.Theme.Transformer'}
						</p>
				    </div>
				</div>		
				<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Background' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<div class="input-group">
				    		<input type="color" data-hex="true" class="form-control mColorPickerInput" value="{if isset($button.background)}{$button.background}{/if}" data-target=".style_button_{$button_index}" data-property="background"  autocomplete="off" />
				    	</div>
				    	<p class="form-text text-muted">
						  {l s='Use the "Button hover background color" setting on the detail page to change button hover background color' d='Admin.Theme.Transformer'}
						</p>
				    </div>
				</div>	
			  </div>
			  {/foreach}
			</div>	
			</div><!-- end container -->	
			<div class="adveditor_source_code_block display_none">
		  		<div class="form-group row">
				    <label class="col-3 form-control-label">{l s='Source code' d='Admin.Theme.Transformer'}</label>
				    <div class="col-9">
				    	<textarea autocomplete="off" class="adveditor_source_code form-control"></textarea>	
				    </div>
				</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label"></label>
				    <div class="col-9">
				    	<div class="alert alert-success hidden-xs-up" role="alert">
						   {l s='Successfully copied to clipboard' d='Admin.Theme.Transformer'}
						</div>
				    	<button type="button" class="btn btn-primary adveditor_copy">{l s='Copy to clipboard' d='Admin.Theme.Transformer'}</button>
				    	<p class="form-text text-muted">
						  <a href="javascript:;" class="adveditor_help_link" rel="nofollow" title="{l s='How to paste the code?' d='Admin.Theme.Transformer'}">{l s='How to paste the code?' d='Admin.Theme.Transformer'}<img src="{$banner_url}how_to_paste.jpg" alt="{l s='How to paste the code?' d='Admin.Theme.Transformer'}" /></a>
						</p>
				    	{if $adveditor_window}
				    	<div class="alert alert-info" role="alert">
						   {l s='You are editing in a new window, so if you are using any Google fonts, you have to manually add them on the detial page via' d='Admin.Theme.Transformer'} <a href="javascript:;" class="adveditor_help_link" rel="nofollow" title="{l s='' d='Admin.Theme.Transformer'}">{l s='here.' d='Admin.Theme.Transformer'}<img src="{$banner_url}where_is_the_google_fonts_field.jpg" alt="" /></a> {l s='Do not have to this when on modal dialog.' d='Admin.Theme.Transformer'}
						</div>
						{/if}
				    </div>
				</div>
			</div>
				<div class="form-group row">
				    <label class="col-3 form-control-label"></label>
				    <div class="col-9">
				  		<div class="alert alert-success hidden-xs-up" role="alert">
						  {l s='Content here has been successfully inserted into the "Caption" field.' d='Admin.Theme.Transformer'}
						</div>
			  			{if !$adveditor_window}
			  				<button type="button" class="btn btn-primary adveditor_insert">{l s='Insert' d='Admin.Theme.Transformer'}</button>
			  				<button type="button" class="btn btn-primary adveditor_close">{l s='Close' d='Admin.Theme.Transformer'}</button>
			  			{/if}
			  			<button type="button" class="btn btn-primary adveditor_code">{l s='Get code' d='Admin.Theme.Transformer'}</button>
				    </div>
				</div>	
			</div>
		</div>
	</div>
	{/foreach}
	<!-- End -->
{/block}
{block name="javascript_bottom" append}
<script type="text/javascript">
	jQuery(function($){
		$('.adveditor_block').adveditor({literal}{'googleFontsJson':{/literal} googleFontsJson});
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        	$('.adveditor_curr', '#adveditor_box_'+$(e.target).data('banner-index')).removeClass('adveditor_curr');
		    if($(e.target).data('element-class')){
        		$($(e.target).data('element-class'), '#adveditor_box_'+$(e.target).data('banner-index')).addClass('adveditor_curr');
        	}
		})
	});
</script>
{/block}
{block name='full_width_bottom'}{/block}
{block name='side_bar'}{/block}
{block name='right_left_bar'}{/block}

