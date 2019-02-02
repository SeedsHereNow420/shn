{**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{if $field.type == 'hidden'}
  {block name='form_field_item_hidden'}
  <input type="hidden" name="{$field.name}" value="{$field.value}">
  {/block}
{else}

  <div class="form-group form-group-small {if !empty($field.errors)}has-error{/if}">
    {if $field.required || $field.type !== 'checkbox'}
    <label class="{if $field.required} required{/if}">
        {$field.label}
        {block name='form_field_comment'}
          {if (!$field.required && !in_array($field.type, ['radio-buttons', 'checkbox']))}
           {l s='(Optional)' d='Shop.Forms.Labels'}
          {/if}
        {/block}
    </label>
    {/if}
    <div class="{if ($field.type === 'radio-buttons')} form-control-valign{/if}">

    {include file='_partials/form-fields-list.tpl'}

    </div>
    
    
  </div>
  
{/if}
