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

{if $psv >= 1.6}
	<div class="col-lg-2">
		<div class="list-group">
			{foreach from=$tabs key=action item=name}
				<a {if $action == 'version'} style="margin-top:30px;" {/if} class="list-group-item {if {$oosn_key|escape:'htmlall':'UTF-8'} == "{$action}" || ($oosn_key == '' && $action == 'confgeneralset')} active{/if}"
				{if $action != 'version'} href="{$module_url|escape:'htmlall':'UTF-8'}&histock={$action|escape:'htmlall':'UTF-8'}"{/if}>

					{if $action != 'version'}
						{$name|escape:'htmlall':'UTF-8'}
					{else}
						{$name|escape:'htmlall':'UTF-8'} - {$module_version|escape:'html':'UTF-8'}
					{/if}
				</a>
			{/foreach}
		</div>
	</div>
{else}
	<div class="productTabs">
		<ul class="tab">
			{foreach from=$tabs key=action item=name}
				<li class="tab-row">
					<a {if $action == 'version'} style="margin-top:30px;" {/if} class="tab-page 
						{if {$oosn_key|escape:'htmlall':'UTF-8'} == "{$action}" || ($oosn_key == '' && $action == 'confgeneralset')} selected{/if}"
						{if $action != 'version'} href="{$module_url|escape:'htmlall':'UTF-8'}&histock={$action|escape:'htmlall':'UTF-8'}"{/if}>
						{if $action != 'version'}
							{$name|escape:'htmlall':'UTF-8'}
						{else}
							{$name|escape:'htmlall':'UTF-8'} - {$module_version|escape:'html':'UTF-8'}
						{/if}
					</a>
				</li>
			{/foreach}
		</ul>
	</div>
{/if}
