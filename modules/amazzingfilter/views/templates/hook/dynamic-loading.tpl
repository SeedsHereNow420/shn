{*
* 2007-2017 Amazzing
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
*
*  @author    Amazzing <mail@amazzing.ru>
*  @copyright 2007-2017 Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*
*}

{* button will be moved dynamically under the list *}
<div class="af dynamic-loading{if $hidden_inputs.p_type == 3} infinite-scroll{/if} hidden">
    {if $is_17}<span class="dynamic-product-count"></span>{/if}
    <button class="loadMore button lnk_view btn btn-default">
        <span>{l s='Load more' mod='amazzingfilter'}</span>
    </button>
    <span class="loading-indicator">...</span>
</div>
{* since 2.7.0 *}
