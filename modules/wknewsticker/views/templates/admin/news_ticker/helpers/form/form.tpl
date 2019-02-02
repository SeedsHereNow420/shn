{**
* 2010-2017 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2017 Webkul IN
*  @license   https://store.webkul.com/license.html
*}
<form class="form-horizontal" action="{$current}&{if !empty($submit_action)}{$submit_action}{if isset($ticker) && $ticker.id_news_ticker}&id_news_ticker={$ticker.id_news_ticker}{/if}{/if}&token={$token}" method="post" enctype="multipart/form-data">
	<div class="panel">
		<div class="panel-heading">
			<i class="icon-newspaper-o"></i>
			{if isset($ticker) && $ticker}
				{l s='Edit Ticker' mod='wknewsticker'}
			{else}
				{l s='Add new Ticker' mod='wknewsticker'}
			{/if}
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="tickermsg" class="col-lg-3 control-label required"><span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="{l s='Write ticker message to display' mod='wknewsticker'}">{l s='Ticker Message' mod='wknewsticker'}</span></label>
				<div class="col-lg-7">
					{foreach from=$languages item=language}
						{assign var="lang" value={$language.id_lang}}
						{assign var="wk_message" value="wk_message_`$language.id_lang`"}
						<div id="wk_msg_div_{$language.id_lang}" class="wk_msg_div_all" {if $default_lang != $language.id_lang}style="display:none;"{/if}>
							<textarea name="wk_message_{$language.id_lang}"
							id="wk_message_{$language.id_lang}" cols="2" placeholder="{l s='Example ticker message' mod='wknewsticker'}" rows="1" class="form-control">{if isset($smarty.post.wk_message)}{$smarty.post.wk_message}{else}{if isset($ticker)}{$ticker.message.{$lang}}{/if}{/if}</textarea>
						</div>
					{/foreach}
		  		</div>
		  		{if $total_languages gt 1}
				<div class="col-lg-2">
					<button type="button" id="wk_msg_btn" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						{$default_lang_isocode}
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						{foreach from=$languages item=language}
							<li>
								<a href="javascript:void(0)" onclick="showNewsTickerLangField('{$language.iso_code}', {$language.id_lang});">{$language.name}</a>
							</li>
						{/foreach}
					</ul>
				</div>
				{/if}
			</div>

			<div class="form-group">
				<label for="wk_url" class="col-lg-3 control-label"><span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="{l s='Write url on which you wants to redirect' mod='wknewsticker'}">
				{l s='Url' mod='wknewsticker'}</span></label>
				<div class="col-lg-7">
					{foreach from=$languages item=language}
						{assign var="lang" value={$language.id_lang}}
						{assign var="wk_url" value="wk_url_`$language.id_lang`"}
						<div id="wk_url_div_{$language.id_lang}" class="wk_url_div_all"{if $default_lang != $language.id_lang}style="display:none;"{/if}>
							<textarea name="wk_url_{$language.id_lang}" id="wk_url_{$language.id_lang}" cols="2" placeholder="{l s='http://example.com/' mod='wknewsticker'}" rows="1" class="form-control">{if isset($smarty.post.wk_url)}{$smarty.post.wk_url}{else}{if isset($ticker)}{$ticker.url.{$lang}}{/if}{/if}</textarea>
						</div>
					{/foreach}
		  		</div>
		  		{if $total_languages gt 1}
				<div class="col-lg-2">
					<button type="button" id="wk_url_btn" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						{$default_lang_isocode}
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						{foreach from=$languages item=language}
							<li>
								<a href="javascript:void(1)" onclick="showNewsTickerLangField('{$language.iso_code}', {$language.id_lang});">{$language.name}</a>
							</li>
						{/foreach}
					</ul>
				</div>
				{/if}
			</div>

			<div class="form-group">
				<label for="wk_font_color" class="col-lg-3 control-label">
					<span class="label-tooltip" data-toggle="tooltip" title="" data-original-title="{l s='choose the color for text.' mod='wknewsticker'}">
						{l s='Font Color ' mod='wknewsticker'}
					</span>
				</label>
				<div class="input-group col-lg-3">
					<input type="color" name="wk_font_color" class="form-control mColorPickerInput" data-hex="true" value="{if isset($smarty.post.wk_font_color)}{$smarty.post.wk_font_color}{elseif isset($ticker)}{$ticker.color}{else}{$configColor}{/if}"/>
				</div>
			</div>
        	<div class="form-group row">
                <label class="control-label col-lg-3 col-md-3 col-xs-3 text-right">
                    <span class="label-tooltip" data-toggle="tooltip" data-html="true" title="{l s='Select whether ticker mesaage displayed or not.' mod='wknewsticker'}">{l s='Enable' mod='wknewsticker'}</span>
                </label>
                <div class="col-lg-3 col-md-3 col-xs-3 col-offset-lg-6">
                    <span class="switch prestashop-switch fixed-width-lg">
                        <input type="radio" value="1" id="wk_active_on" name="wk_active" {if isset($smarty.post.wk_active)}{if $smarty.post.wk_active == 1} checked="checked"{/if}
                        {elseif isset($ticker['active'])}{if $ticker['active'] == 1} checked="checked"{/if}{else} checked="checked"{/if} />
                        <label class="radioCheck" for="wk_active_on">{l s='Yes' mod='wknewsticker'}</label>
                        <input type="radio" value="0" id="wk_active_off" name="wk_active" {if isset($smarty.post.wk_active)}{if $smarty.post.wk_active == 0} checked="checked"{/if}{elseif isset($ticker['active'])}{if $ticker['active'] == 0} checked="checked"{/if}{/if} />
                        <label class="radioCheck" for="wk_active_off">{l s='No' mod='wknewsticker'}</label>
                        <a class="slide-button btn"></a>
                    </span>
                </div>
			</div>
		</div>
		<div class="panel-footer">
			<a href="{$link->getAdminLink('AdminNewsTicker')}" class="btn btn-default"><i class="process-icon-cancel"></i> {l s='Cancel' mod='wknewsticker'}</a>
			<button type="submit" value="1" id="newsTickerSubmit" name="submitAddwk_news_ticker" class="btn btn-default pull-right">
				<i class="process-icon-save"></i>{l s='Save' mod='wknewsticker'}
			</button>
			<button type="submit" name="submitAddwk_news_tickerAndStay" class="btn btn-default pull-right"><i class="process-icon-save"></i>{l s='Save and stay' mod='wknewsticker'}</button>
		</div>
	</div>
</form>
