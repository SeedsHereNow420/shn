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
<div class="form-group">
	<div class="col-lg-9 col-lg-offset-3">
		<p class="checkbox">
			<label for="stspecialslider"><input type="checkbox" name="stspecialslider" value="{$id_product}" id="stspecialslider"{if $checked} checked="checked"{/if} />{l s='Display this product in the Special products slider if it has specific prices.' d='Modules.Stspecialslider.Admin'}</label>
		</p>
	</div>
</div>
<script type="text/javascript">
{literal}
jQuery(document).ready(function($){
    $('input[name="stspecialslider"]').click(function(){
        $.getJSON('{/literal}{$currentIndex}{literal}&act=setstspecial&fl='+($(this).is(':checked')?1:0)+'&id_product='+$(this).val()+'&ajax=1&ts='+new Date().getTime(),
            function(json){
                if(json.r)
                    showSuccessMessage(json.msg);
                else
                    showErrorMessage(json.msg);
            }
        ); 
    });
});
{/literal}
</script>
