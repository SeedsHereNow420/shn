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
{block name='login_form'}

<form id="login-form" action="{block name='login_form_actionurl'}{$action}{/block}" method="post">

  <div class="form_content">
    <div class="form_content_inner">
      {include file='_partials/form-errors.tpl' errors=$errors['']}

      {block name='login_form_fields'}
        {foreach from=$formFields item="field"}
          {block name='form_field'}
            {form_field field=$field file='_partials/form-fields-1.tpl'}
          {/block}
        {/foreach}
      {/block}
      <div class="p-b-1">
          <a href="{$urls.pages.password}" class="forgot-password" rel="nofollow" title="{l s='Forgot your password?' d='Shop.Theme.Customeraccount'}">
            {l s='Forgot your password?' d='Shop.Theme.Customeraccount'}
          </a>
      </div>
    </div>
  </div>
  {block name='login_form_footer'}
  <footer class="form-footer">
    <input type="hidden" name="submitLogin" value="1">
    {block name='form_buttons'}
    <button class="btn btn-primary btn-large js-submit-active btn-spin btn-full-width" data-link-action="sign-in" type="submit" id="SubmitLogin">
      <i class="fto-lock"></i>
      {l s='Sign in' d='Shop.Theme.Actions'}
    </button>
    {/block}
  </footer>
  {/block}

</form>
{/block}
