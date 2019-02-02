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
<form class="form-horizontal defaultForm" method="post">
	{if $psv >= 1.6}
		<div class="col-lg-12">
			<div class="panel">
				<div class="panel-heading">{l s='Choose the fields to export' mod='hioutofstocknotification'}</div>
	{else}
		<div class="tab-pane" id="oosn-product-form">
			<h4 style="margin:0;">{l s='Choose the fields to export' mod='hioutofstocknotification'}</h4>
				<div class="separation"></div>
	{/if}
				<table class="colum_table" style="width:100%">
					<tr>
						<th>{l s='ID' mod='hioutofstocknotification'}</th>
						<td><input type="checkbox" name="id_CsvPdf" value="1" {if $export_id} checked="checked" {else}'0'{/if}></td>
					</tr>
					<tr>
						<th>{l s='ID Shop' mod='hioutofstocknotification'}</th>
						<td><input type="checkbox" name="id_shop_CsvPdf" value="1" {if $export_id_shop} checked="checked" {else}'0'{/if}></td>
					</tr>
					<tr>
						<th>{l s='ID Product' mod='hioutofstocknotification'}</th>
						<td><input type="checkbox" name="id_product_CsvPdf" value="1" {if $export_id_product} checked="checked" {else}'0'{/if}></td>
					</tr>
					<tr>
						<th>{l s='ID Customer' mod='hioutofstocknotification'}</th>
						<td><input type="checkbox" name="customer_id_CsvPdf" value="1" {if $export_customer_id} checked="checked" {else}'0'{/if}></td>
					</tr>
					<tr>
						<th>{l s='ID Combination' mod='hioutofstocknotification'}</th>
						<td><input type="checkbox" name="id_combination_CsvPdf" value="1" {if $export_comb_id} checked="checked" {else}'0'{/if}></td>
					</tr>
					<tr>
						<th>{l s='Email' mod='hioutofstocknotification'}</th>
						<td><input type="checkbox" name="email_CsvPdf" value="1" {if $export_email} checked="checked" {else}'0'{/if}></td>
					</tr>
					<tr>
						<th>{l s='Date' mod='hioutofstocknotification'}</th>
						<td><input type="checkbox" name="date_CsvPdf" value="1" {if $export_date} checked="checked" {else}'0'{/if}></td>
					</tr>
					<tr>
						<th>{l s='Status' mod='hioutofstocknotification'}</th>
						<td><input type="checkbox" name="status_CsvPdf" value="1" {if $export_status} checked="checked" {else}'0'{/if}></td>
					</tr>
					{if !$oosn_remove_email}
						<tr class="filtr">
							<th>{l s='Filter Status' mod='hioutofstocknotification'}</th>
							<td class="status">
								<select name="filter_export_status" class="filter_export_status" >
									<option value="">--:--</option>
									<option value="1" {if $filter_export_status == '1'} selected="selected" {else}''{/if}>
										{l s='Pending' mod='hioutofstocknotification'}
									</option>
									<option value="2" {if $filter_export_status == '2'} selected="selected" {else}''{/if} >
										{l s='Delivered' mod='hioutofstocknotification'}
									</option>
								</select>
							</td>
						</tr>
					{/if}
				</table>
	{if $psv >= 1.6}
				<div class="panel-footer">
					<button type="submit" name="submit_csv" class="btn btn-default"><i class="process-icon-export"></i>
						{l s='CSV' mod='hioutofstocknotification'}
					</button>
					<button type="submit" name="submit_pdf" class="btn btn-default"><i class="process-icon-download-alt"></i>
						{l s='PDF' mod='hioutofstocknotification'}
					</button>
					<button type="submit" class="btn btn-default pull-right" name="reset_export">
						<i class="icon-eraser"></i>{l s='Reset Filters' mod='hioutofstocknotification'}
					</button>
				</div>
			</div>
		</div>
	{else}
			<div>
				<input type="submit" name="submit_csv" value="CSV" class="button">
				<input type="submit" name="submit_pdf" value="PDF" class="button">
				<button type="submit" class="button" name="reset_export">{l s='Reset Filters' mod='hioutofstocknotification'}</button>
			</div>
		</div>
	{/if}
</form>
