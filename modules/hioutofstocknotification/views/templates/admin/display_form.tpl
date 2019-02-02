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

<div class="{if $psv >= 1.6}form-horizontal col-lg-10 {else}form_content{/if}">
	{foreach $errors as $error}
		<div class="{if $psv >= 1.6}alert alert-danger{else}error{/if}">
			{$error|escape:'htmlall':'UTF-8'}
		</div>
	{/foreach}
	{foreach $success as $succes}
		<div class="{if $psv >= 1.6}alert alert-success{else}conf{/if}">
			{$succes|escape:'htmlall':'UTF-8'}
		</div>
	{/foreach}
	{$content nofilter}
</div>
<div class="clearfix"></div>