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
<section class="product-customization mb-3">
  {if !$configuration.is_catalog}
      <div class="page_heading">{l s='Product customization' d='Shop.Theme.Catalog'}</div>
      <div class="mb-1">{l s='Don\'t forget to save your customization to be able to add to cart' d='Shop.Forms.Help'}</div>

      {block name='product_customization_form'}
        <form method="post" action="{$product.url}" enctype="multipart/form-data">
          <ul class="clearfix">
            {foreach from=$customizations.fields item="field"}
              <li class="product-customization-item mb-2">
                <label class="font-weight-bold"> {$field.label}</label>
                {if $field.type == 'text'}
                  <textarea placeholder="{l s='Your message here' d='Shop.Forms.Help'}" class="product-message" maxlength="250" {if $field.required} required {/if} name="{$field.input_name}"></textarea>
                  <small class="float-xs-right">{l s='250 char. max' d='Shop.Forms.Help'}</small>
                  {if $field.text !== ''}
                      <p class="customization-message">{l s='Your customization:' d='Shop.Theme.Catalog'}
                          <label>{$field.text}</label>
                      </p>
                  {/if}
                {elseif $field.type == 'image'}
                  {if $field.is_customized}
                    <br>
                    <img src="{$field.image.small.url}" class="mar_r6" alt="{$field.label}" />
                    <a class="remove-image" href="{$field.remove_image_url}" rel="nofollow" title="{l s='Remove Image' d='Shop.Theme.Actions'}">{l s='Remove Image' d='Shop.Theme.Actions'}</a>
                  {/if}
                  <span class="custom-file">
                    <span class="js-file-name">{l s='No selected file' d='Shop.Forms.Help'}</span>
                    <input class="file-input js-file-input" {if $field.required} required {/if} type="file" name="{$field.input_name}">
                    <button class="btn btn-default">{l s='Choose file' d='Shop.Theme.Actions'}</button>
                  </span>
                  <small class="float-xs-right">{l s='.png .jpg .gif' d='Shop.Forms.Help'}</small>
                {/if}
              </li>
            {/foreach}
          </ul>
          <div class="clearfix">
            <button class="btn btn-default float-xs-right" type="submit" name="submitCustomizedData">{l s='Save Customization' d='Shop.Theme.Actions'}</button>
          </div>
        </form>
      {/block}
      <div class="steasy_divider between_detials_and_buttons"><div class="steasy_divider_item"></div></div>
  {/if}
</section>