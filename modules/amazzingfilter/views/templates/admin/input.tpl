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

{if empty($input_class)}{$input_class = ''}{/if}
{if !empty($field.input_class)}{$input_class = $input_class|cat:' '|cat:$field.input_class}{/if}

{if $field.type == 'cat_tree'}
    {include file="./cat-tree.tpl"}
{else if $field.type == 'switcher'}
    {if !empty($group_identifier)}{$id = $group_identifier}{else}{$id = Tools::str2url($name)}{/if}
    <span class="switch prestashop-switch {$input_class|escape:'html':'UTF-8'}">
        <input type="radio" id="{$id|escape:'html':'UTF-8'}" name="{$name|escape:'html':'UTF-8'}" value="1"{if !empty($value)} checked{/if}{if !empty($field.requires_activation)} disabled{/if}>
        <label for="{$id|escape:'html':'UTF-8'}">{l s='Yes' mod='amazzingfilter'}</label>
        <input type="radio" id="{$id|escape:'html':'UTF-8'}_0" name="{$name|escape:'html':'UTF-8'}" value="0"{if empty($value)} checked{/if}{if !empty($field.requires_activation)} disabled{/if}>
        <label for="{$id|escape:'html':'UTF-8'}_0">{l s='No' mod='amazzingfilter'}</label>
        <a class="slide-button btn"></a>
    </span>
{else if $field.type == 'select'}
    <select class="{$input_class|escape:'html':'UTF-8'}" name="{$name|escape:'html':'UTF-8'}">
        {foreach $field.options as $i => $opt}
            <option value="{$i|escape:'html':'UTF-8'}"{if $value|cat:'' == $i} selected{/if}>{$opt|escape:'html':'UTF-8'}</option>
        {/foreach}
    </select>
{else if $field.type == 'checkbox'}
    {* checkbox is added inside label*}
{else}
    <input type="text" name="{$name|escape:'html':'UTF-8'}" value="{$value|escape:'html':'UTF-8'}" class="{$input_class|escape:'html':'UTF-8'}">
{/if}
{* since 2.8.0 *}
