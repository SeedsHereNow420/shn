{*
* 2007-2015 PrestaWach
*
*  @author    PrestaWach <info@prestawach.info>
* @copyright 2017 PrestaWach
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<div class="not-first-time" {if $escFirstTime}style="display: none;"{/if}>
	<p>
		{l s='The "indexed" products have been analyzed by ElasticSearch and will appear in the results of a front office search' mod='elasticsearchconnector'}
		<br />
		{l s='Indexed products' mod='elasticsearchconnector'}
		<strong>
			<span id="indexed-nb-products">{$indexedNbProducts|intval}</span> / <span id="total-nb-products">{$totalNbProducts|intval}</span>
		</strong>
	</p>
	<p>
		<a class="ajaxcall btn btn-default btn-lg" href="{$cronUrl|escape:'htmlall':'UTF-8'}&full=1">
			{l s='Re-build the entire index now' mod='elasticsearchconnector'}
			&nbsp;&nbsp;
			<i class="icon icon-angle-right icon-lg"></i>
		</a>

		{if $indexedNbProducts < $totalNbProducts}
		<a class="ajaxcall btn btn-default btn-lg" href="{$cronUrl|escape:'htmlall':'UTF-8'}&full=0">
			{l s='Add missing products to the index now' mod='elasticsearchconnector'}
			&nbsp;&nbsp;
			<i class="icon icon-angle-right icon-lg"></i>
		</a>
		{/if}
	</p>
	<br />
	<p>
		{l s='You can set a cron job that will rebuild your index using the following URL:' mod='elasticsearchconnector'}
		<br />
		{l s='Re-build the entire index:' mod='elasticsearchconnector'} {$cronSearchFullUrl|escape:'htmlall':'UTF-8'}
		<br />
		{l s='Add missing products to the index:' mod='elasticsearchconnector'} {$cronSearchMissingUrl|escape:'htmlall':'UTF-8'}
	</p>
</div>

<div class="first-time" {if !$escFirstTime}style="display: none;"{/if}>
	<p>
		{l s='The products have not been analyzed by ElasticSearch and will not appear in the results of a front office search' mod='elasticsearchconnector'}
	</p>
	<p>
		<a class="ajaxcall btn btn-default btn-lg" href="{$cronUrl|escape:'htmlall':'UTF-8'}&full=1">
			{l s='Re-build the entire index now' mod='elasticsearchconnector'}
			&nbsp;&nbsp;
			<i class="icon icon-angle-right icon-lg"></i>
		</a>
	</p>
</div>

<script type="text/javascript">
	var escFirstTime = '{$escFirstTime|intval}';
	var translations = new Array();

	translations['in_progress'] = '{l s='(in progress)' js=1 mod='elasticsearchconnector'}';
	translations['in_progress_continue'] = '{l s='(in progress, [count] products left)' js=1 mod='elasticsearchconnector'}';
	translations['regenerate_finished'] = '{l s='Regenerate finished' js=1 mod='elasticsearchconnector'}';
	translations['regenerate_failed'] = '{l s='Regenerate failed' js=1 mod='elasticsearchconnector'}';
</script>