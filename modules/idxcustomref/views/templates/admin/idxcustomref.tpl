{**
* 2007-2015 PrestaShop
*
* NOTICE OF LICENSE
*
* @author    Innova Deluxe SL
* @copyright 2014 Innova Deluxe SL
* @license   INNOVADELUXE
*}
{literal}
<script type="text/javascript">
var rest = 0;
var order_reference_user = '';
$(document).ready(function(){

var prefix_value = $('#IDXCUSTOMREF_PREFIX').val();
var reference_number_value = $('#IDXCUSTOMREF_REF_NUM').val();
var user_total_length = $('#IDXCUSTOMREF_REF_NUM_LENGTH').val();
var info_msg = '';
var exampleOfOrder = '';
order_reference_user = $('#IDXCUSTOMREF_REF_NUM').val();
$('#IDXCUSTOMREF_REF_NUM').after('<label class="control-label"><span id="dlx_after_ref_order" class="label-tooltip"></span><span id="dlxExample" class="label-tooltip"></span></label>');

$("#IDXCUSTOMREF_REF_NUM_LENGTH, #IDXCUSTOMREF_REF_NUM").change(function(){
  user_total_length = $(this).val();
order_reference_user = $(this).val();
});


$('#IDXCUSTOMREF_PREFIX').keyup(function(e) {

var prefix_value = $(this).val().length;
rest = user_total_length-prefix_value;
info_msg = "{/literal}{l s='Total number length allowed:' mod='idxcustomref'}{literal}" + rest + "{/literal} {l s='characters' mod='idxcustomref'}{literal}";
exampleOfOrder = "{/literal}{l s='Orders would look like this:' mod='idxcustomref'}{literal}" + $(this).val() +getZeros(0) + order_reference_user;
if (rest > -1)
{
$('#dlx_after_ref_order').html(info_msg);
// $('#dlxExample').html(exampleOfOrder);
}

if (rest < 0 && e.which != 8)
{
var aux_tex =  $('#IDXCUSTOMREF_PREFIX').val().substring(0,  $('#IDXCUSTOMREF_PREFIX').val().length-1);
$('#IDXCUSTOMREF_PREFIX').val(aux_tex);
e.preventDefault();
return false;
}

});


$('#IDXCUSTOMREF_REF_NUM').keyup(function(e){
var prefix_value = $(this).val().length;
var newrest = rest;
// info_msg = "{/literal}{l s='Total number length allowed:' mod='idxcustomref'}{literal}" + rest;
exampleOfOrder = "{/literal}{l s='Orders would look like this:' mod='idxcustomref'}{literal}" + $('#IDXCUSTOMREF_PREFIX').val() + getZeros(prefix_value) + $(this).val();
if (newrest > -1)
{
// $('#dlx_after_ref_order').html(info_msg);
// $('#dlxExample').html(exampleOfOrder);
}

if (newrest < 0 && e.which != 8)
{
var aux_tex =  $('#IDXCUSTOMREF_PREFIX').val().substring(0,  $('#IDXCUSTOMREF_REF_NUM').val().length-1);
$('#IDXCUSTOMREF_PREFIX').val(aux_tex);
e.preventDefault();
return false;
}

})

})
function getZeros(toRest)
{
var format = "";
for (i = 0; i<rest-toRest; i++)
format+="0";
// format+=order_reference_user;
return format;
}
</script>
{/literal}