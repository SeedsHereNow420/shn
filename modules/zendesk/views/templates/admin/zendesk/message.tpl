{*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*  @author    Presta-Module
*  @author    202 ecommerce
*  @copyright 2009-2016 Presta-Module
*  @copyright 2017-2018 202 ecommerce
*  @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
*}

{if $message->author->role eq 'end-user'}
	{assign var="icon" value="envelope"}
{else}
	{if $message->public}
		{assign var="icon" value="mail-reply"}
	{else}
		{assign var="icon" value="pencil"}
	{/if}
{/if}

<article class="timeline-item{if isset($message->alt)} alt{/if} timeline-inverted {if !$message->public}note{/if}">
	<div class="timeline-caption">
		<div class="timeline-panel arrow arrow-left">
			<span class="timeline-icon">
				<i class="icon-{$icon|escape:'htmlall':'UTF-8'} text-muted"></i>
			</span>
			<span class="timeline-date"><i class="icon-calendar"></i> {dateFormat date=$message->created_at full=0} - <i class="icon-time"></i> {$message->created_at|substr:11:5|escape:'htmlall':'UTF-8'}</span>
			{if isset($message->id_order)}<a class="badge" href="#">{l s='Order #' mod='zendesk'}{$message->id_order|intval}</a><br/>{/if}
			<span class="timeline-content">{$message->body|escape:'html':'UTF-8'|nl2br}</span>
			{if count($message->attachments)}
				{foreach $message->attachments as $attachment}
					<div class="file">
						<a class="{if isset($attachment->thumbnails[0]->content_url)}fancybox{/if}" href="{$attachment->content_url|escape:'htmlall':'UTF-8'}">
							{if isset($attachment->thumbnails[0]->content_url)}<img src="{$attachment->thumbnails[0]->content_url|escape:'htmlall':'UTF-8'}" /><br />{/if}
							{$attachment->file_name|escape:'htmlall':'UTF-8'}</a>
						<br />
					</div>
				{/foreach}
			{/if}
		</div>
	</div>
</article>