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
<div id="CustomerThreadContacts">
	<div class="row">
		<div class=" col-lg-4">
			<div class="panel">
				<form action="{$link->getAdminLink('AdminZendesk')|escape:'html':'UTF-8'}&amp;viewticket&amp;id_ticket={$ticket->id|intval}" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="id_ticket" value="{$ticket->id|intval}">
					<h3>{l s='Type' mod='zendesk'}</h3>
					<p>
						<select id="type" class="form-control" name="type">
							<option value="question" {if $ticket->type eq 'question'}selected="selected"{/if}>{l s='question' mod='zendesk'}</option>
							<option value="incident" {if $ticket->type eq 'incident'}selected="selected"{/if}>{l s='incident' mod='zendesk'}</option>
							<option value="problem" {if $ticket->type eq 'problem'}selected="selected"{/if}>{l s='problem' mod='zendesk'}</option>
							<option value="task" {if $ticket->type eq 'task'}selected="selected"{/if}>{l s='task' mod='zendesk'}</option>
							<option value="" {if $ticket->type eq ''}selected="selected"{/if}>{l s='undefined' mod='zendesk'}</option>
						</select>

						<button type="submit" name="submitUpdateType" class="btn btn-primary">
							{l s='Update' mod='zendesk'}
						</button>
					</p>
				</form>
			</div>
		</div>
		<div class=" col-lg-4">
			<div class="panel">
				<form action="{$link->getAdminLink('AdminZendesk')|escape:'html':'UTF-8'}&amp;viewticket&amp;id_ticket={$ticket->id|intval}" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="id_ticket" value="{$ticket->id|intval}">
					<h3>{l s='Priority' mod='zendesk'}</h3>
					<p>
						<select id="priority" class="form-control" name="priority">
							<option value="low" {if $ticket->priority eq 'low'}selected="selected"{/if}>{l s='low' mod='zendesk'}</option>
							<option value="normal" {if $ticket->priority eq 'normal'}selected="selected"{/if}>{l s='normal' mod='zendesk'}</option>
							<option value="high" {if $ticket->priority eq 'high'}selected="selected"{/if}>{l s='high' mod='zendesk'}</option>
							<option value="urgent" {if $ticket->priority eq 'urgent'}selected="selected"{/if}>{l s='urgent' mod='zendesk'}</option>
							<option value="" {if $ticket->priority eq ''}selected="selected"{/if}>{l s='undefined' mod='zendesk'}</option>
						</select>

						<button type="submit" name="submitUpdatePriority" class="btn btn-primary">
							{l s='Update' mod='zendesk'}
						</button>
					</p>
				</form>
			</div>
		</div>
		<div class=" col-lg-4">
			<div class="panel">
				<form action="{$link->getAdminLink('AdminZendesk')|escape:'html':'UTF-8'}&amp;viewticket&amp;id_ticket={$ticket->id|intval}" method="post" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="id_ticket" value="{$ticket->id|intval}">
					<h3>{l s='Status' mod='zendesk'}</h3>
					<p>
						<select id="status" class="form-control" name="status">
							<option value="new" {if $ticket->status eq 'new'}selected="selected"{/if}>{l s='new' mod='zendesk'}</option>
							<option value="open" {if $ticket->status eq 'open'}selected="selected"{/if}>{l s='open' mod='zendesk'}</option>
							<option value="pending" {if $ticket->status eq 'pending'}selected="selected"{/if}>{l s='pending' mod='zendesk'}</option>
							<option value="solved" {if $ticket->status eq 'solved'}selected="selected"{/if}>{l s='solved' mod='zendesk'}</option>
							<option value="hold" {if $ticket->status eq 'hold'}selected="selected"{/if}>{l s='hold' mod='zendesk'}</option>
							<option value="closed" {if $ticket->status eq 'closed'}selected="selected"{/if}>{l s='closed' mod='zendesk'}</option>
							<option value="" {if $ticket->type eq ''}selected="selected"{/if}>{l s='undefined' mod='zendesk'}</option>
						</select>

						<button type="submit" name="submitUpdateStatus" class="btn btn-primary">
							{l s='Update' mod='zendesk'}
						</button>
					</p>
				</form>
			</div>
		</div>
	</div>
	<div class="clear">&nbsp;</div>
	<div class="panel">
		<div class="panel-heading">
			<h3>{l s='Thread' mod='zendesk'}</h3>
		</div>
		<div class="row">
			<div class="timeline">
				{foreach $messages as $message}
					{include file="./message_row.tpl" message=$message initial=false}
				{/foreach}
			</div>
		</div>
	</div>
	<div class="clear">&nbsp;</div>
	<div class="row">
		<div class="panel">
			<form action="{$link->getAdminLink('AdminZendesk')|escape:'html':'UTF-8'}&amp;viewticket&amp;id_ticket={$ticket->id|intval}" method="post" enctype="multipart/form-data" class="form-horizontal">
				<h3>{l s='Your answer to' mod='zendesk'} {$ticket->author->email|escape:'htmlall':'UTF-8'}</h3>
				<fieldset style="margin-top:10px;">
					<label class="control-label col-lg-3">{l s='Message' mod='zendesk'}</label>
					<textarea style="width: 450px; height: 175px;" name="message"></textarea>
					
					<div class="clear">&nbsp;</div>
					
					<label class="control-label col-lg-3">{l s='Mark as private' mod='zendesk'}</label>
					<label class="t" for="internal_on"><img src="../img/admin/enabled.gif" alt="{l s='Yes' mod='zendesk'}" title="{l s='Yes' mod='zendesk'}"></label>
					<input type="radio" name="internal" id="internal_on" value="0">
					<label class="t" for="internal_on"> {l s='Yes' mod='zendesk'}</label>
					<label class="t" for="internal_off"><img src="../img/admin/disabled.gif" alt="{l s='No' mod='zendesk'}" title="{l s='No' mod='zendesk'}" style="margin-left: 10px;"></label>
					<input type="radio" name="internal" id="internal_off" value="1" checked="checked">
					<label class="t" for="internal_off"> {l s='No' mod='zendesk'}</label>
					
					<div class="clear">&nbsp;</div>

					<label class="control-label col-lg-3">{l s='File' mod='zendesk'}</label>
					<div>
						<input type="file" name="fileUpload">
					</div>
					<div>
						<input type="submit" class="button" name="submitMessage" value="{l s='Send message' mod='zendesk'}" style="margin-top:20px;">
						<input type="hidden" name="id_ticket" value="{$ticket->id|intval}">
					</div>
				</fieldset>			
			</form>
		</div>
	</div>
</div>
{/if}