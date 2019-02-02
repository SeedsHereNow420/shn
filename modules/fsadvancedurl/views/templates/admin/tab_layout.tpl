{**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 *}

<div class="row">
    <div id="fsau_tabs" class="col-lg-2 col-md-3">
        <div class="list-group">
            {foreach from=$fsau_tab_layout item=fsau_tab}
                <a class="list-group-item{if $fsau_active_tab == $fsau_tab.id} active{/if}"
                   href="#{$fsau_tab.id|escape:'htmlall':'UTF-8'}"
                   aria-controls="{$fsau_tab.id|escape:'htmlall':'UTF-8'}" role="tab" data-toggle="tab">
                    {$fsau_tab.title|escape:'htmlall':'UTF-8'|fsauCorrectTheMess}
                </a>
            {/foreach}
        </div>
    </div>
    <div class="col-lg-10 col-md-9">
        <div class="tab-content">
            {foreach from=$fsau_tab_layout item=fsau_tab}
                <div role="tabpanel" class="tab-pane{if $fsau_active_tab == $fsau_tab.id} active{/if}" id="{$fsau_tab.id|escape:'htmlall':'UTF-8'}">
                    {$fsau_tab.content|escape:'html':'UTF-8'|fsauCorrectTheMess}
                </div>
            {/foreach}
        </div>
    </div>
</div>
<div class="clearfix"></div>