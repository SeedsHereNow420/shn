{**
*  Copyright (C) Prestalia - All Rights Reserved
*
*  Unauthorized copying of this file, via any medium is strictly prohibited
*  Proprietary and confidential
*
*  @author    Prestalia <prestalia.it>
*  @copyright 2015-2016 Prestalia
*  @license   Closed source, proprietary software
*}

{if $iso == 'it'}
    {$link_docs="{$base_url|escape:'htmlall':'UTF-8'}modules/ordersplusplus/readme_IT.pdf"}
    {$link_addons="http://addons.prestashop.com/it/112_prestalia"}
{else}
    {$link_docs="{$base_url|escape:'htmlall':'UTF-8'}modules/ordersplusplus/readme_EN.pdf"}
    {$link_addons="http://addons.prestashop.com/en/112_prestalia"}
{/if}

<!-- Prestalia Header -->
<div id="mHeader">
    <div id="mHeader_sx">
        <img src="{$base_url|escape:'htmlall':'UTF-8'}modules/ordersplusplus/views/img/prestalia_header/logo-name.png"/>
        <span id="module-version">v{$module_version|escape:'htmlall':'UTF-8'}</span>
    </div>

    <div id="mHeader_logo">
        <img src="{$base_url|escape:'htmlall':'UTF-8'}modules/ordersplusplus/views/img/prestalia_header/logoPrestalia.png"/>
    </div>

    <div id="mHeader_menu">
        <a title="{l s='Manual' mod='ordersplusplus'}" id="btnGuide" href="{$link_docs|escape:'htmlall':'UTF-8'}" target="_blank">
            <i></i><span>{l s='Manual' mod='ordersplusplus'}</span>
        </a>
        <a title="{l s='Our modules on Addons' mod='ordersplusplus'}" id="btnAdv" href="{$link_addons|escape:'htmlall':'UTF-8'}" target="_blank">
            <i></i><span>{l s='Our modules on Addons' mod='ordersplusplus'}</span>
        </a>
    </div>
</div>

<div style="clear: both;"></div>
