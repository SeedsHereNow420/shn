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

<fieldset style="margin-top:10px;{if $message->author->role != 'end-user'}{if $message->public}background-color:#F0F8E6;border:1px solid #88D254{else}background-color:#FFF6D9;border:1px solid #EFDAA3{/if}{/if}">
	<legend style="{if $message->author->role != 'end-user'}{if $message->public}background-color:#F0F8E6;border:1px solid #88D254{else}background-color:#FFF6D9;border:1px solid #EFDAA3{/if}{/if}">
		{if $message->author->role eq 'end-user'}
			<img src="../img/t/AdminCustomers.gif" />
		{else}
			<img src="../img/t/AdminEmployees.gif" />
		{/if}
		{$message->author->name|escape:'htmlall':'UTF-8'}
	</legend>
	<div class="infoCustomer">
		<dl>			
			<dt>{l s='Date' mod='zendesk'}</dt>
			<dd>{dateFormat date=$message->created_at full=0} - {$message->created_at|substr:11:5|escape:'htmlall':'UTF-8'}</dd>
		</dl>
		<dl>
			<dt>{l s='Message' mod='zendesk'}</dt>
			<dd>
				<br />
				{$message->body|escape:'html':'UTF-8'|nl2br}
				<br />
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
			</dd>
		</dl>
	</div>
</fieldset>