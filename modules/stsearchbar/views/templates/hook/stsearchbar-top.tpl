{*
* 2007-2017 PrestaShop
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
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*}
<!-- Block search module TOP -->
{if isset($search_main_menu) || (!isset($search_top_bar) && $quick_search_simple lt 2)}
<div id="search_block_top" class="{if $quick_search_simple} quick_search_simple {/if} top_bar_item clearfix">
	<form id="searchbox" method="get" action="{$search_controller_url}" >
		<div id="searchbox_inner" class="clearfix">
            <input type="hidden" name="controller" value="search">
			<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="{l s='Search here' d='Shop.Theme.Transformer'}" value="{$search_query|escape:'htmlall':'UTF-8'|stripslashes}" autocomplete="off" />
			<button type="submit" name="submit_search" class="button-search">
				<i class="icon-search-1 icon-large"></i>
			</button>
			<div class="hidden more_prod_string">{l s='More products »' d='Shop.Theme.Transformer'}</div>
		</div>
	</form>
    <script type="text/javascript">
    // <![CDATA[
    {literal}
    jQuery(function($){
        $('#searchbox').submit(function(){
            var search_query_top_val = $.trim($('#search_query_top').val());
            if(search_query_top_val=='' || search_query_top_val==$.trim($('#search_query_top').attr('placeholder')))
            {
                $('#search_query_top').focusout();
                return false;
            }
            return true;
        });
    });
    {/literal}
    //]]>
    </script>
</div>
{else}
<div id="search_block_nav" class="top_bar_item dropdown_wrap">
    <div class="dropdown_tri header_item">
        <i class="icon-search-1 icon-small"></i>{if $quick_search_simple==2}{l s='Search' d='Shop.Theme.Transformer'}{/if}
    </div>
    <div class="dropdown_list">
        <div id="search_block_top" class="top_bar_item clearfix">
            <form id="searchbox" method="get" action="{$search_controller_url}" >
                <input type="hidden" name="controller" value="search">
                <input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="{l s='Search here' d='Shop.Theme.Transformer'}" value="{$search_query|escape:'htmlall':'UTF-8'|stripslashes}" />
                <button type="submit" name="submit_search" class="button-search">
                    <i class="icon-search-1 icon-large"></i>
                </button>
                <div class="hidden more_prod_string">{l s='More products »' d='Shop.Theme.Transformer'}</div>
            </form>
            <script type="text/javascript">
            // <![CDATA[
            {literal}
            jQuery(function($){
                $('#searchbox').submit(function(){
                    var search_query_top_val = $.trim($('#search_query_top').val());
                    if(search_query_top_val=='' || search_query_top_val==$.trim($('#search_query_top').attr('placeholder')))
                    {
                        $('#search_query_top').focusout();
                        return false;
                    }
                    return true;
                });
            });
            {/literal}
            //]]>
            </script>
        </div>
    </div>
</div>
{/if}
<!-- /Block search module TOP -->