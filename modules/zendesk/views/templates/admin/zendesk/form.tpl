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
{if isset($error)}
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>
		{l s='Error' mod='zendesk'}
	</div>
{else}
	{if $ticket->status eq 'closed'}
	<div class="panel">
		<div class="panel-heading">
			<i class="icon-comments"></i>
			{l s='Thread' mod='zendesk'}
		</div>
		<div class="row">
			<div class="module_warning alert alert-warning">
				{l s='This ticket is closed. You can\'t edit or answer to it' mod='zendesk'}
			</div>
			<div class="timeline">
				{foreach $messages as $message}
					{include file="./message.tpl" message=$message initial=false}
				{/foreach}
			</div>
		</div>
	</div>
	{else}
	<div class="row">
		<div class=" col-lg-4">
			<div class="panel">
				<form action="{$link->getAdminLink('AdminZendesk')|escape:'html':'UTF-8'}&amp;viewticket&amp;id_ticket={$ticket->id|intval}" method="post" enctype="multipart/form-data" class="form-horizontal">
					<h3>{l s='Type' mod='zendesk'}</h3>
					<div class="row">
						<div class="col-lg-9">
							<select id="type" class="form-control" name="type">
								<option value="question" {if $ticket->type eq 'question'}selected="selected"{/if}>{l s='question' mod='zendesk'}</option>
								<option value="incident" {if $ticket->type eq 'incident'}selected="selected"{/if}>{l s='incident' mod='zendesk'}</option>
								<option value="problem" {if $ticket->type eq 'problem'}selected="selected"{/if}>{l s='problem' mod='zendesk'}</option>
								<option value="task" {if $ticket->type eq 'task'}selected="selected"{/if}>{l s='task' mod='zendesk'}</option>
								{if $ticket->type eq ''}<option disabled="disabled" value=""selected="selected">{l s='undefined' mod='zendesk'}</option>{/if}
							</select>
							<input type="hidden" name="id_ticket" value="{$ticket->id|intval}">
						</div>
						<div class="col-lg-3">
							<button type="submit" name="submitUpdateType" class="btn btn-primary">
								{l s='Update' mod='zendesk'}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class=" col-lg-4">
			<div class="panel">
				<form action="{$link->getAdminLink('AdminZendesk')|escape:'html':'UTF-8'}&amp;viewticket&amp;id_ticket={$ticket->id|intval}" method="post" enctype="multipart/form-data" class="form-horizontal">
					<h3>{l s='Priority' mod='zendesk'}</h3>
					<div class="row">
						<div class="col-lg-9">
							<select id="priority" class="form-control" name="priority">
								<option value="low" {if $ticket->priority eq 'low'}selected="selected"{/if}>{l s='low' mod='zendesk'}</option>
								<option value="normal" {if $ticket->priority eq 'normal'}selected="selected"{/if}>{l s='normal' mod='zendesk'}</option>
								<option value="high" {if $ticket->priority eq 'high'}selected="selected"{/if}>{l s='high' mod='zendesk'}</option>
								<option value="urgent" {if $ticket->priority eq 'urgent'}selected="selected"{/if}>{l s='urgent' mod='zendesk'}</option>
								{if $ticket->priority eq ''}<option disabled="disabled" value="" selected="selected">{l s='undefined' mod='zendesk'}</option>{/if}
							</select>
							<input type="hidden" name="id_ticket" value="{$ticket->id|intval}">
						</div>
						<div class="col-lg-3">
							<button type="submit" name="submitUpdatePriority" class="btn btn-primary">
								{l s='Update' mod='zendesk'}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class=" col-lg-4">
			<div class="panel">
				<form action="{$link->getAdminLink('AdminZendesk')|escape:'html':'UTF-8'}&amp;viewticket&amp;id_ticket={$ticket->id|intval}" method="post" enctype="multipart/form-data" class="form-horizontal">
					<h3>{l s='Status' mod='zendesk'}</h3>
					<div class="row">
						<div class="col-lg-9">
							<select id="status" class="form-control" name="status">
								<option value="open" {if $ticket->status eq 'open'}selected="selected"{/if}>{l s='open' mod='zendesk'}</option>
								<option value="pending" {if $ticket->status eq 'pending'}selected="selected"{/if}>{l s='pending' mod='zendesk'}</option>
								<option value="solved" {if $ticket->status eq 'solved'}selected="selected"{/if}>{l s='solved' mod='zendesk'}</option>
								<option value="closed" {if $ticket->status eq 'closed'}selected="selected"{/if}>{l s='closed' mod='zendesk'}</option>
								{if $ticket->status eq ''}<option disabled="disabled" value="undefinded" selected="selected">{l s='undefined' mod='zendesk'}</option>{/if}
								{if $ticket->status eq 'new'}<option disabled="disabled" value="new" selected="selected">{l s='new' mod='zendesk'}</option>{/if}
								{if $ticket->status eq 'hold'}<option disabled="disabled" value="hold" selected="selected">{l s='hold' mod='zendesk'}</option>{/if}
							</select>
							<input type="hidden" name="id_ticket" value="{$ticket->id|intval}">
						</div>
						<div class="col-lg-3">
							<button type="submit" name="submitUpdateStatus" class="btn btn-primary">
								{l s='Update' mod='zendesk'}
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="panel">
		<div class="panel-heading">
			<i class="icon-comments"></i>
			{l s='Thread' mod='zendesk'}
		</div>
		<div class="row">
			<div class="timeline">
				{foreach $messages as $message}
					{include file="./message.tpl" message=$message initial=false}
				{/foreach}
			</div>
		</div>
	</div>
	<div class="row">
		<div class="panel">
			<form action="{$link->getAdminLink('AdminZendesk')|escape:'html':'UTF-8'}&amp;viewticket&amp;id_ticket={$ticket->id|intval}" method="post" enctype="multipart/form-data" class="form-horizontal">
				<h3>{l s='Your answer to' mod='zendesk'} {if $ticket->author}{$ticket->author->email|escape:'htmlall':'UTF-8'}{else}{/if} </h3>
				<div class="row">
					<div id="message" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-3">{l s='Choose a standard message' mod='zendesk'}</label>
							<div class="col-lg-9">									
								<select class="chosen form-control" name="order_message" id="order_message" onchange="orderOverwriteMessage(this, '{l s='Do you want to overwrite your existing message?' mod='zendesk'}')">
									<option value="0" selected="selected">-</option>
									{foreach from=$orderMessages item=orderMessage}
									<option value="{$orderMessage['message']|escape:'html':'UTF-8'}">{$orderMessage['name']|escape:'htmlall':'UTF-8'}</option>
									{/foreach}
								</select>
								<p class="help-block">
									<a href="{$link->getAdminLink('AdminOrderMessage')|escape:'html':'UTF-8'}">
										{l s='Configure predefined messages' mod='zendesk'}
										<i class="icon-external-link"></i>
									</a>
								</p>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-3">{l s='Mark as private' mod='zendesk'}</label>
							<div class="col-lg-9">
								<span class="switch prestashop-switch fixed-width-lg">
									<input type="radio" name="internal" id="internal_on" value="0" />
									<label for="internal_on">
										{l s='Yes' mod='zendesk'}
									</label>
									<input type="radio" name="internal" id="internal_off" value="1" checked="checked" />
									<label for="internal_off">
										{l s='No' mod='zendesk'}
									</label>
									<a class="slide-button btn"></a>
								</span>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-3">{l s='File' mod='zendesk'}</label>
							<div class="col-lg-9">
								{$file_upload_form}
                                <!--HTML code genrated, no escape needed-->
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-lg-3">{l s='Message' mod='zendesk'}</label>
							<div class="col-lg-9">
								<textarea id="txt_msg" class="textarea-autosize" name="message">{Tools::getValue('message')|escape:'html':'UTF-8'}</textarea>
								<p id="nbchars"></p>
								<p>{$signature|escape:'htmlall':'UTF-8'|nl2br}</p>
							</div>
						</div>


						<input type="hidden" name="id_ticket" value="{$ticket->id|intval}">
						<button type="submit" id="submitMessage" class="btn btn-primary pull-right" name="submitMessage">
							{l s='Send message' mod='zendesk'}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	{/if}
{/if}