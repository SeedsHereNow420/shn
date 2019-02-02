{**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 *}

<div id="fsau_tabs_15" class="productTabs">
    <ul class="tab">
        {foreach from=$fsau_tab_layout item=fsau_tab}
            <li class="tab-row">
                <a class="tab-page{if $fsau_active_tab == $fsau_tab.id} selected{/if}" href="javascript:;"
                   id="{$fsau_tab.id|escape:'htmlall':'UTF-8'}_tab">
                    {$fsau_tab.title|escape:'htmlall':'UTF-8'|fsauCorrectTheMess}
                </a>
            </li>
        {/foreach}
    </ul>
</div>
<div id="modules_tab_list">
    <div class="tab-pane" id="fsau_tabs_content_15">
        {foreach from=$fsau_tab_layout item=fsau_tab}
            <div class="product-tab-content{if $fsau_active_tab == $fsau_tab.id} active{/if}" id="{$fsau_tab.id|escape:'htmlall':'UTF-8'}_tab_content">
                {$fsau_tab.content|escape:'html':'UTF-8'|fsauCorrectTheMess}
            </div>
        {/foreach}
    </div>
</div>