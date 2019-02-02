<style type="text/css">
	
</style>
<div class="form-group status-ord-acts">
	{if $idCurrentState==2 && $pay_module=='prismpay'  }
	<div class="col-md-8 col-sm-12 sml-fnt" >
	{/if} 
	<select style="background-color: {$obj_order_state->color|escape:'htmlall':'UTF-8'}; color: #FFFFFF; border-color: {$obj_order_state->color|escape:'htmlall':'UTF-8'};" ps_current_state ="{$idCurrentState|escape:'htmlall':'UTF-8'}" ps_id_order="{if isset($id_order)}{$id_order|escape:'htmlall':'UTF-8'}{/if}" class="form-control changeorderstatus">
		{if isset($statuses)}
			{foreach $statuses as $status}
				<option style="background-color: {$status.color|escape:'htmlall':'UTF-8'}; color: #FFFFFF;" {if $idCurrentState == $status.id_order_state}selected="selected"{/if} value="{$status.id_order_state|escape:'htmlall':'UTF-8'}">{$status.name|escape:'htmlall':'UTF-8'}</option>
			{/foreach}
		{/if}
	</select>
	{if $idCurrentState==2 && $pay_module=='prismpay'  }
	</div>
	<div class="col-md-4 col-sm-12 smlr-fnt" >
	<input data-current-state ="{$idCurrentState|escape:'htmlall':'UTF-8'}"  data-amnt-order='{$amount_paid}' data-id-order="{if isset($id_order)}{$id_order|escape:'htmlall':'UTF-8'}{/if}" value='Refund' class="btn btn-warning btn-hlf refund-btn">
	</div>
	{/if} 
</div>

<div id='refnd-bdrop' class="refnd-bdrop" >
<div class='refd-cntr' ><a href='javascript:void(0)' class='rfnd-cls' >X</a>
<div class='hd-refd' >Select applicable one</div>
<div class='refd-ctn'  >
<input class='btn btn-primary act-rfnd' name='fl-refnd'  type='button' value='Full Refund' />
<div >OR</div>
<div class='form-group'>
<label class='control-label pull-left'>$</label><input class='form-control amnt-rfnd' max=''  min='1' type='number'  name='rfnd-amnt' id='rfnd-amnt'   />
<input type='hidden'  name='rfnd-order-id' id='rfnd-order-id'   />
<div class='r-n-b'>Max is $<span id='rfn-b-v'></span></div>
</div>
<input class='btn btn-primary act-rfnd' name='pr-refnd'  type='button' value='Partial Refund'  />
</div>
</div>
</div>



{strip}
	{addJsDefL name='success'}{l s='Order has been updated successfully.' js=1 mod='orderstatuschange'}{/addJsDefL}
	{addJsDefL name='invalid'}{l s='The new order status is invalid.' js=1 mod='orderstatuschange'}{/addJsDefL}
	{addJsDefL name='error'}{l s='An error occurred while changing order status, or we were unable to send an email to the customer.' js=1 mod='orderstatuschange'}{/addJsDefL}
	{addJsDefL name='already'}{l s='The order has already been assigned this status.' js=1 mod='orderstatuschange'}{/addJsDefL}
	{addJsDefL name='noPermission'}{l s='You do not have permission to edit this.' js=1 mod='orderstatuschange'}{/addJsDefL}
{/strip}