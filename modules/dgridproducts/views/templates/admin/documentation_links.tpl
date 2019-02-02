{*
* 2007-2016 PrestaShop
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
*  @author    SeoSA <885588@bk.ru>
*  @copyright 2012-2017 SeoSA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="custom_bootstrap">
<ul class="tabs">
    <li class="active">
        <a class="grid_prod_search" href="#grid_prod_search" data-toggle="tab">{l s='Search Products' mod='dgridproducts'}</a>
    </li>
    <li>
        <a class="grid_prod_doc" href="{$link_on_tab_module|escape:'quotes':'UTF-8'}">{l s='Setting grid' mod='dgridproducts'}</a>
    </li>
    <li>
        <a class="grid_prod_doc" href="{$link_on_tab_module|escape:'quotes':'UTF-8'}">{l s='Documentation' mod='dgridproducts'}</a>
    </li>
    <li>
        <a id="seosa_manager_btn" href="#">{l s='Our modules' mod='dgridproducts'}</a>
    </li>
</ul>

<script src='https://seosaps.com/ru/module/seosamanager/manager?ajax=1&action=script&iso_code={Context::getContext()->language->iso_code|escape:'quotes':'UTF-8'}'></script>

