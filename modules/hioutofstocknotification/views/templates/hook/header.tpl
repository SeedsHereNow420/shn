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

<script type="text/javascript">
	{literal}
		var oosn_front_controller_url = '{/literal}{$oosn_front_controller_url nofilter}{literal}';
		var psv = {/literal}{$psv|escape:'htmlall':'UTF-8'}{literal};
		var oosn_secure_key = '{/literal}{$oosn_secure_key|escape:'htmlall':'UTF-8'}{literal}';
		var oosn_position = '{/literal}{$oosn_position|escape:'htmlall':'UTF-8'}{literal}';
		var quantity = {/literal}{$quantity|intval}{literal};
		var id_product = {/literal}{$id_product|intval}{literal};
		var id_combination = {/literal}{$id_combination|intval}{literal};
		var oosn_stock_managment = {/literal}{$oosn_stock_managment|intval}{literal};
	{/literal}
</script>