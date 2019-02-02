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
<form {if $psv < 1.6} id="configuration_form" style="height:200px" {/if} class="defaultForm" method="post"  action="{$action|escape:'htmlall':'UTF-8'}" >
{if $psv >= 1.6}
	<div class="col-lg-12">
		<div class="panel">
			<div class="panel-heading">{l s='Stats' mod='hioutofstocknotification'}</div>
{else}
	<h4 style="margin:0;">{l s='Stats' mod='hioutofstocknotification'}</h4>
		<div class="separation"></div>
{/if}
			<table class="table product" style="width: 100%;">
				<tr>
					<th>{l s='Sent emails' mod='hioutofstocknotification'}</th>
					<th>{l s='Opened emails ' mod='hioutofstocknotification'}</th>
					<th>{l s='Buy Now Clicks' mod='hioutofstocknotification'}</th>
					<th>{l s='View Clicks' mod='hioutofstocknotification'}</th>
				</tr>
				<tr>
					<td>{$email_sent_count|intval}</td>
					<td>{$email_opened_count|intval}</td>
					<td>{$email_buy_now_sub_count|intval}</td>
					<td>{$email_view_sub_count|intval}</td>
				</tr>
			</table>
{if $psv >= 1.6}
			<div class="panel-footer">
				<button type="submit" class="btn btn-default pull-right" name="reset_statistic">
					<i class="icon-eraser"> </i>{l s='Reset Statistic' mod='hioutofstocknotification'}
				</button>
			</div>
		</div>
	</div>
{else}
	<div>
		<button type="submit" class="button" name="reset_statistic" style="margin-top:10px;">{l s='Reset Statistic' mod='hioutofstocknotification'}</button>
	</div>
{/if}
</form>

