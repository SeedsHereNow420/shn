{**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 *}

{l s='Available keywords:' mod='fsadvancedurl'}
<a href="javascript:;" onclick="FSAU.toggleDescription('desc_{$fsau_input_id|escape:'htmlall':'UTF-8'}')">
    {l s='Show/Hide' mod='fsadvancedurl'}
</a>
<div id="desc_{$fsau_input_id|escape:'htmlall':'UTF-8'}" style="display:none;">
    {l s='To add a keyword click on it!' mod='fsadvancedurl'}<br />
    {foreach from=$fsau_keywords item=fsau_keyword name=fsau_keywords_loop}
        <a href="javascript:;" onclick="{$fsau_js_function|escape:'htmlall':'UTF-8'}('{$fsau_keyword|escape:'htmlall':'UTF-8'}', '{$fsau_input_id|escape:'htmlall':'UTF-8'}')">
            {literal}{{/literal}{$fsau_keyword|escape:'htmlall':'UTF-8'}{literal}}{/literal}
        </a>
        {if !$smarty.foreach.fsau_keywords_loop.last}, {/if}
    {/foreach}
</div>
