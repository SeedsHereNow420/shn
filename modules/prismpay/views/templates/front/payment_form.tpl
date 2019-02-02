{*
* prismpay
*}

<form action="{$action}" method="post" id="prismpay_Form">
<div class=\"threeds_loading\"><div class=\"message\"><p>(VISA OR MASTERCARD ONLY)<br /></p></div></div>
<table class='pc-crd-dtl'>
<tbody>
<tr>
<td colspan='2'  >
<input type="text" placeholder="NAME ON CARD" name="pc_cardholder_name" id="pc_cardholder_name" class="form-control required">
<span>FULL NAME AS IT APPEARS ON YOUR CARD</span>
</td>
</tr>
<tr>
<td colspan='2'  >
<div id='pc-cr-ctn' class='' >
<input type="text" placeholder="CARD NUMBER" name="pc_cardnum" id="pc_cardnum" class="form-control required">
<input type='hidden' name='pc_card_type'  id='pc_card_type' >
<span>FULL CARD NUMBER</span>
</div>
</td>
</tr>
<tr>
<td  >
<input type="text" maxlength="4" placeholder="MMYY" name="pc_exp_date" id="pc_exp_date" class="form-control required">
<span>EXP. DATE MMYY</span>
</td>
<td >
<input type="text" maxlength="4" placeholder="CVV" name="pc_cvv" id="pc_cvv" class="form-control required">
<span>CVV 3-DIGIT CODE</span>
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