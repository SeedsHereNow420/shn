{*
* 2015 Amazzing
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
*
*  @author    Amazzing <mail@amazzing.ru>
*  @copyright 2015 Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{if !$is_17}<li class="my-filters">{/if}
	<a class="af{if $is_17} col-lg-4 col-md-6 col-sm-6 col-xs-12{/if}" href="{$href|escape:'html':'UTF-8'}">
		<span class="link-item">
			<i class="{$layout_classes['icon-filter']|escape:'html':'UTF-8'}"></i>
			{l s='Filtering preferences' mod='amazzingfilter'}
		</span>
	</a>
{if !$is_17}</li>{/if}
{* since 2.5.0 *}
