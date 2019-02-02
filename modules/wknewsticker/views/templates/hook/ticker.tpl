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
<style type="text/css">
#wk_news_ticker_main_block {
	background-color: {$configValue.backColor|escape:'htmlall':'UTF-8'};
	height: {math equation="x + y" x=$configValue['fontSize']|escape:'htmlall':'UTF-8' y=20}px;
}
#wk_news_ticker_block {
	height: inherit;
}
#wk_news_ticker_text {
	height: inherit;
}
#wk_news_ticker_text span {
	height: inherit;
	font-size: {$configValue['fontSize']}px;
}
#wk_news_ticker_text span {
	line-height: {$configValue['fontSize']}px;
}
</style>
{if isset($tickerDetail) && $tickerDetail}
	<div id="wk_news_ticker_main_block">
		<div id="wk_news_ticker_block">
			<div id="wk_news_ticker_text">
				{foreach $tickerDetail as $tickerValues}
					<span style="color: {if $tickerValues['color']}{$tickerValues['color']|escape:'htmlall':'UTF-8'}{else}{$configValue['fontColor']|escape:'htmlall':'UTF-8'}{/if};">
					{if {$tickerValues['anchor_link']}}
						<a style="color: {if $tickerValues['color']}{$tickerValues['color']|escape:'htmlall':'UTF-8'}{else}{$configValue['fontColor']|escape:'htmlall':'UTF-8'}{/if}" href="{$tickerValues['anchor_link']|escape:'quotes':'UTF-8'}" target="_blank">{$tickerValues['message']|escape:'htmlall':'UTF-8'}</a>
					{else}
						{$tickerValues['message']|escape:'htmlall':'UTF-8'}
					{/if}
					</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				{/foreach}
			</div>
		</div>
	</div>
{/if}
