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

{if $psv >= 1.7}
	<a class="col-lg-4 col-md-6 col-sm-6 col-xs-12" href="{$link->getModuleLink('hioutofstocknotification', 'subscribe')|escape:'html':'UTF-8'}">
      <span class="link-item">
        <i class="material-icons">notifications</i>
        {l s='Out of stock subscriptions' mod='hioutofstocknotification'}
      </span>
    </a>
{else}
	<li>
		{if $psv < 1.6}
			<img src="{$base_dir|escape:'htmlall':'UTF-8'}modules/hioutofstocknotification/views/img/bullhorn.png" class="oosn_bullhorn"> 
			<a href="{$link->getModuleLink('hioutofstocknotification', 'subscribe')|escape:'html':'UTF-8'}"/>
				{l s='Out of stock subscriptions' mod='hioutofstocknotification'}
			</a>
		{else}
			<a href="{$link->getModuleLink('hioutofstocknotification', 'subscribe')|escape:'html':'UTF-8'}"/> 
				<i class="icon-bullhorn"></i>
				<span>{l s='out of stock subscriptions' mod='hioutofstocknotification'}</span>
			</a>
		{/if}
	</li>
{/if}


 