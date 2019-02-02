{**
 * NOTICE OF LICENSE.
 *
 * This source file is subject to the following license: REGULAR LICENSE
 * that is bundled with this package in the file LICENSE.txt.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 * @author    VaSibi
 * @copyright VaSibi
 * @license   REGULAR LICENSE
 *}

{if isset($params.type)}
    {if $params.type == 'text'}
        {if isset($params.lang) && $params.lang}
                {foreach from=$languages item=language name=helper_lang_foreach}
                    <div class="translatable-field row lang-{$language.id_lang|intval}" {if !$smarty.foreach.helper_lang_foreach.first}style="display: none;"{/if}>
                        <div class="col-lg-9">
                            <input type="text"
                                   id="{if isset($params.id)}{$params.id|escape:'html':'UTF-8'}{/if}_{$language.id_lang|intval}"
                                   class="form-control {if isset($params.class)}{$params.class|escape:'html':'UTF-8'}{/if}"
                                   name="{if isset($params.name)}{$params.name|escape:'html':'UTF-8'}{/if}_{$language.id_lang|intval}"
                                   value="{if isset($params.values) && isset($params.values[$language.id_lang])}{$params.values[$language.id_lang]|escape:'html':'UTF-8'}{/if}"
                            />
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-default dropdown-toggle" tabindex="-1" data-toggle="dropdown">
                                {$language.iso_code|escape:'html':'UTF-8'}
                                <i class="icon-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu">
                                {foreach from=$languages item=lang}
                                    <li><a href="javascript:hideOtherLanguage({$lang.id_lang|intval});" tabindex="-1">{$lang.name|escape:'html':'UTF-8'}</a></li>
                                {/foreach}
                            </ul>
                        </div>
                    </div>
                {/foreach}
        {/if}
    {/if}
{/if}
