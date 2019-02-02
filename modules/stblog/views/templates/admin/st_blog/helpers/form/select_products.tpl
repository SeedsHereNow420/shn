{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

    <label class="control-label col-lg-3">
        <span class="alert-info">{l s="Select Products:" d='Admin.Theme.Transformer'}</span>
    </label>
	<div class="form-group">
	<table class="double_select">
        <tr>
            <td class="fixed-width-md" align="right">
                {l s="Product Name:" d='Admin.Theme.Transformer'}
            </td>
            <td>
                <input type="text" size="40" name="product_name" id="product_name" value="" />
            </td>
        </tr>
		<tr>
			<td class="fixed-width-md" align="right">
                {l s="Current Products:" d='Admin.Theme.Transformer'}
			</td>
            <td>
           	    <select multiple id="select_right" name="products[]">
					{foreach from=$field.products item='product'}
                    {if is_array($product) && count($product)}
					<option selected="selected" value="{$product.id_product}">{$product.name}</option>
                    {/if}
					{/foreach}
				</select>
				<div>{l s='Double click to move items' d='Admin.Theme.Transformer'}</div>
				<a href="#" id="move_to" class="multiple_select_remove">
					{l s='Remove Item' d='Admin.Theme.Transformer'}
				</a>
            </td>
		</tr>
	</table>
	<div class="clear">&nbsp;</div>
    </div>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#move_to').click(function(){
			$('#select_right option:selected').remove();
            return false;
		});
		$('#select_right option').live('dblclick', function(){
			$(this).remove();
		});
        $('#product_name').autocomplete('ajax_products_list.php', {
            minChars: 1,
            autoFill: true,
            max:20,
            matchContains: true,
            mustMatch:true,
            scroll:false,
            cacheLength:0,
            extraParams:{ excludeIds:function(){
                    if (ids = $('#select_right').val())
                        return ids.join(',');
                    else
                        return '-1';
                    }
            },
            formatItem: function(item) {
                if (item.length == 2) {
                    return item[1]+' - '+item[0];    
                }
                return false;
            }
            }).result(function(event, data, formatted) {
                if (data == null)
                    return false;
                var productId = data[1];
                var productName = data[0];
                if (productId && productName) {
                    $('#select_right').append('<option value="'+productId+'" selected="selected">'+productId+' - '+productName+'</option>');
                    $('#product_name').val('');    
                }
            }); 
	});
	$('#st_blog_form').submit(function()
	{
		$('#select_right option').each(function(i){
			$(this).attr("selected", "selected");
		});
        return true;
	});
	</script>
