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

<form id='configuration_form' class="form-horizontal defaultForm" method="post" action="{$action|escape:'htmlall':'UTF-8'}">
{if $psv >= 1.6}
	<div class="col-lg-12">
		<div class="panel">
			<div class="panel-heading">{l s='Products' mod='hioutofstocknotification'}</div>
{else}
	<div class="tab-pane" id="oosn-product-form">
	<h4>{l s='Products' mod='hioutofstocknotification'}</h4>
{/if}
		<table class="table product" style="width: 100%;">
			<tr>
				<th>{l s='ID' mod='hioutofstocknotification'}</th>
				<th>{l s='Product' mod='hioutofstocknotification'}</th>
				<th>{l s='ID Customer' mod='hioutofstocknotification'}</th>
				<th>{l s='Email' mod='hioutofstocknotification'}</th>
				<th>{l s='Date' mod='hioutofstocknotification'}</th>
				<th>{l s='Action' mod='hioutofstocknotification'}</th>
			</tr>
			{if !empty($get_subscribe_product)}
				{foreach from=$get_subscribe_product item=product}
					<tr>
						<td class="pointer">{$product.id|escape:'htmlall':'UTF-8'}</td>
						<td class="pointer">
							<div style="display: inline-block; margin-right: 10px;">
								<a href="{$product.product_link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">
									<img src="{$protocol|escape:'htmlall':'UTF-8'}{$product.product_img|escape:'htmlall':'UTF-8'}"/>
								</a>
							</div>
							<div style="display: inline-block;">
								<p>
									<a href="{$product.product_link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">
										{$product.name|escape:'htmlall':'UTF-8'}
									</a>
								</p>
								{if !empty($product.pr_comb_name)}
									<small>
										<a href="{$product.product_link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">
										{foreach $product.pr_comb_name as $attr}
											{$attr.group_name|escape:'htmlall':'UTF-8'}: {$attr.attribute_name|escape:'htmlall':'UTF-8'}
										{/foreach}
										</a>
									</small></br>
								{/if}
								<small>{l s='ID Product: ' mod='hioutofstocknotification'} {$product.id_product|escape:'htmlall':'UTF-8'}</small></br>
							</div>
						</td>

						<td>{if $product.id_customer == 0}{l s='Visitor' mod='hioutofstocknotification'}{else}{$product.id_customer|escape:'htmlall':'UTF-8'}{/if}</td>
						<td>{$product.email|escape:'htmlall':'UTF-8'}</td>
						<td>{$product.date|escape:'htmlall':'UTF-8'}</td>
						<td>
							<button type="submit" name="delete_sub_product" class="{if $psv >= 1.6}btn btn-default{else}button{/if}">
								{l s='Delete' mod='hioutofstocknotification'}
							</button>
						</td>
						{if $subscribe_get_url != 'confprdelivery'}
							<td>
								<button type="submit" name="sub_hi_send" class="{if $psv >= 1.6}btn btn-default{else}button{/if}">
									{l s='Send' mod='hioutofstocknotification'}
								</button>
							</td>
						{/if}
						<input type="hidden" value="{$product.id|intval}" name="hidden_id">
						<input type="hidden" value="{$product.id_product|intval}" name="hidden_id_product">
						<input type="hidden" name="oosn_basedir" id="basedir" value="{$oosn_basedir|escape:'htmlall':'UTF-8'}">
						<input type="hidden" name="oosn_secure_key" value="{$secure_key|escape:'htmlall':'UTF-8'}">
						<input type="hidden" name="oosn_prefix" value="{$prefix|escape:'htmlall':'UTF-8'}">
					</tr>
				{/foreach}
			{else}
				{if $psv >= 1.6}
					<tr>
						<td class="list-empty" colspan="6">
							<div class="list-empty-msg">
								<i class="icon-warning-sign list-empty-icon"></i>
								{l s='No records found' mod='hioutofstocknotification'}
							</div>
						</td>
					</tr>
				{else}
					<tr><td class="center" colspan="6">{l s='No items found' mod='hioutofstocknotification'}</td></tr>
				{/if}
			{/if}
		</table>
{if $psv >= 1.6}
		</div>
	</div>
{else}
	</div>
{/if}
</form>
<div class="col-lg-12">
	{if $start != $stop}
		<ul class="{if $psv >= 1.6}pagination{else}pagination_1_5{/if}">
			{if $p != 1 && $p}
				{assign var='p_previous' value=$p-1}
				<li id="pagination_previous{if isset($paginationId)}_{$paginationId|escape:'htmlall':'UTF-8'}{/if}" class="pagination_previous">
					<a rel="nofollow" href="{if $requestPage|strstr:'?'}{$requestPage|escape:'htmlall':'UTF-8'}&p={$prev_p|escape:'htmlall':'UTF-8'}{else}{$requestPage|escape:'htmlall':'UTF-8'}?p={$prev_p|escape:'htmlall':'UTF-8'}{/if}">
						<i class="icon-chevron-left"></i> <b>{l s='Previous' mod='hioutofstocknotification'}</b>
					</a>
				</li>
			{else}
				<li id="pagination_previous{if isset($paginationId)}_{$paginationId|escape:'htmlall':'UTF-8'}{/if}" class="disabled pagination_previous">
					<span>
						<i class="icon-chevron-left"></i> <b>{l s='Previous' mod='hioutofstocknotification'}</b>
					</span>
				</li>
			{/if}
			{if $start == 3}
				<li>
					<a rel="nofollow" href="{$requestPage|escape:'htmlall':'UTF-8'}&p=1">
						<span>1</span>
					</a>
				</li>
				<li>
					<a rel="nofollow"  href="{$requestPage|escape:'htmlall':'UTF-8'}&p=2">
						<span>2</span>
					</a>
				</li>
			{/if}
			{if $start == 2}
				<li>
					<a rel="nofollow"  href="{$requestPage|escape:'htmlall':'UTF-8'}&p=1">
						<span>1</span>
					</a>
				</li>
			{/if}
			{if $start > 3}
				<li>
					<a rel="nofollow"  href="{$requestPage|escape:'htmlall':'UTF-8'}&p=1">
						<span>1</span>
					</a>
				</li>
				<li class="truncate">
					<span>
						<span>...</span>
					</span>
				</li>
			{/if}
			{section name=pagination start=$start loop=$stop+1 step=1}
				{if $p == $smarty.section.pagination.index}
					<li class="active current">
						<span>
							<span>{$p|escape:'html':'UTF-8'}</span>
						</span>
					</li>
				{else}
					<li>
						<a rel="nofollow" href="{$requestPage|escape:'htmlall':'UTF-8'}&p={$smarty.section.pagination.index|escape:'htmlall':'UTF-8'}">
							<span>{$smarty.section.pagination.index|escape:'html':'UTF-8'}</span>
						</a>
					</li>
				{/if}
			{/section}
			{if $pages_nb>$stop+2}
				<li class="truncate">
					<span>
						<span>...</span>
					</span>
				</li>
				<li>
					<a href="{$requestPage|escape:'htmlall':'UTF-8'}&p={$pages_nb|escape:'htmlall':'UTF-8'}">
						<span>{$pages_nb|intval}</span>
					</a>
				</li>
			{/if}
			{if $pages_nb==$stop+1}
				<li>
					<a href="{$requestPage|escape:'htmlall':'UTF-8'}&p={$pages_nb|escape:'htmlall':'UTF-8'}">
						<span>{$pages_nb|intval}</span>
					</a>
				</li>
			{/if}
			{if $pages_nb==$stop+2}
				<li>
					<a href="{$requestPage|escape:'htmlall':'UTF-8'}&p={$pages_nb-1|escape:'htmlall':'UTF-8'}">
						<span>{$pages_nb-1|intval}</span>
					</a>
				</li>
				<li>
					<a href="{$requestPage|escape:'htmlall':'UTF-8'}&p={$pages_nb|escape:'htmlall':'UTF-8'}">
						<span>{$pages_nb|intval}</span>
					</a>
				</li>
			{/if}
			{if $pages_nb > 1 AND $p != $pages_nb}
				{assign var='p_next' value=$p+1}
				<li id="pagination_next{if isset($paginationId)}_{$paginationId|escape:'htmlall':'UTF-8'}{/if}" class="pagination_next">
					<a rel="nofollow" href="{if $requestPage|strstr:'?'}{$requestPage|escape:'htmlall':'UTF-8'}&p={$next_p|escape:'htmlall':'UTF-8'}{else}{$requestPage|escape:'htmlall':'UTF-8'}?p={$next_p|escape:'htmlall':'UTF-8'}{/if}">
						<b>{l s='Next' mod='hioutofstocknotification'}</b> <i class="icon-chevron-right"></i>
					</a>
				</li>
			{else}
				<li id="pagination_next{if isset($paginationId)}_{$paginationId|escape:'htmlall':'UTF-8'}{/if}" class="disabled pagination_next">
					<span>
						<b>{l s='Next' mod='hioutofstocknotification'}</b> <i class="icon-chevron-right"></i>
					</span>
				</li>
			{/if}
		</ul>
	{/if}
</div>
