{*
* 2013 - 2017 HiPresta
*
* MODULE Out Of Stock Notification
*
* @version   1.2.2
* @author    HiPresta <suren.mikaelyan@gmail.com>
* @link      http://www.hipresta.com
* @copyright HiPresta 2015
* @license   Addons PrestaShop license limitation
*
* NOTICE OF LICENSE
*
* Don't use this module on several shops. The license provided by PrestaShop Addons 
* for all its modules is valid only once for a single shop.
*}

<table class="content" >
	<tr> 
		{if $id}
			<th>{l s='Id' mod='hioutofstocknotification'}</th>
		{/if}
		{if $id_shop}
			<th>{l s='Id Shop' mod='hioutofstocknotification'}</th>
		{/if}
		{if $id_product}
			<th>{l s='Id Product' mod='hioutofstocknotification'}</th>
		{/if}
		{if $id_customer}
			<th>{l s='Id customer' mod='hioutofstocknotification'}</th>
		{/if}
		{if $id_combination}
			<th>{l s='Id Combination' mod='hioutofstocknotification'}</th>
		{/if}
		{if $email}
			<th>{l s='Email' mod='hioutofstocknotification'}</th>
		{/if}
		{if $status}
			<th>{l s='Status' mod='hioutofstocknotification'}</th>
		{/if}
		{if $date}
			<th>{l s='Date' mod='hioutofstocknotification'}</th>
		{/if}
	</tr>
	{foreach $requests as $res} 
		<tr>
			{if $id }
				<td>{$res.id|intval}</td>
			{/if}
			{if $id_shop}
				<td>{$res.id_shop|intval}</td>
			{/if}
			{if $id_product}
				<td>{$res.id_product|intval}</td>
			{/if}
			{if $id_customer}
				<td>{$res.id_customer|intval}</td>
			{/if}
			{if $id_combination}
				<td>{$res.id_combination|intval}</td>
			{/if}
			{if $email}
				<td>{$res.email|escape:'htmlall':'UTF-8'}</td>
			{/if}
			{if $status}
				<td>
					{if $res.status == 1}
						{l s='Pending' mod='hioutofstocknotification'}
					{/if}
					{if $res.status == 2}
						{l s='Delivery' mod='hioutofstocknotification'}
					{/if}
				</td>
			{/if}
			{if $date}
				<td>{$res.date|escape:'htmlall':'UTF-8'}</td>
			{/if}
		</tr>
	{/foreach}
</table>

<style type="text/css">
	.content{
		border: 1px solid #4A4444;
		width: 100%;
	}
	.content tr td{
		font-size: 18px;
		border-left:1px solid #4A4444;
		border-bottom:1px solid #4A4444;
	}
	.content tr th{
		font-size: 16px;
		border-right:1px solid #4A4444;
		border-bottom:1px solid #4A4444;
	}	
</style>


