{*
* paycertify_proxy
*}

<form action="{$action}" method="post" id="paycertify_proxyForm">
<div class=\"threeds_loading\"><div class=\"message\"><p>Securing your purchase. <br /><small>ONLY CLICK THE ORDER BUTTON ONCE OR YOU MAY DUPLICATE YOUR ORDER AND DOUBLE-CHARGE YOURSELF</small></p></div></div>
<input type="hidden" name="3ds_type" id="3ds_type" value="{*$this->threeDSType()*}">
<input type="hidden" name="3ds_fallback" id="3ds_fallback" value="{*$this->isThreeDSFallbackEnabled()*}">
<table class='pc-crd-dtl'>
<tbody>
<tr>
<td colspan='2'  >
<input type="text" placeholder="Name On Card" name="pc_cardholder_name" id="pc_cardholder_name" class="form-control required">
</td>
</tr>
<tr>
<td colspan='2'  >
<div id='pc-cr-ctn' class='' >
<input type="text" placeholder="Card Number" name="pc_cardnum" id="pc_cardnum" class="form-control required"></div>
</td>
</tr>
<tr>
<td  >
<input type="text" maxlength="4" placeholder="MMYY" name="pc_exp_date" id="pc_exp_date" class="form-control required">
<span>Expiry Date MM/YY</span>
</td>
<td >
<input type="text" maxlength="4" placeholder="CVV" name="pc_cvv" id="pc_cvv" class="form-control required">
<span>3 or 4 Digit CVV no.</span>
</td>
</tr>
<tr>
<td colspan='2'  >
<div class='errlab' id='errlbctn'>
</div>
</td>
</tr>
</tbody>
</table>
</form>