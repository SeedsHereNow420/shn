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
{extends file='page.tpl'}
{block name='body_class' append} login_page {/block}
{block name='page_title' hide}{/block}

{block name='page_content'}
{assign var="auth_login_width" value=6}
{if $sttheme.auth_login_width}{$auth_login_width=$sttheme.auth_login_width}{/if}
    <div class="row">
    {if $sttheme.auth_layout}
    {block name='new_customers_container'}
      <div class="col-lg-{12-$auth_login_width}">
        <section id="create_account_block" class="from_blcok block login_form_block">
          {if $sttheme.auth_heading_align!=3}<h3 class="page_heading login_form_heading {if $sttheme.auth_heading_align==1} text-2 {elseif $sttheme.auth_heading_align==2} text-3 {else} text-1 {/if}">{l s='New customers?' d='Shop.Theme.Transformer'}</h3>{/if}
          <div class="form_content">
          <div class="form_content_inner">
              <div class="p-b-1">{l s='It\'s quick and easy to create an account to shop faster and save your order to account.' d='Shop.Theme.Transformer'}</div>
          </div>
          {if isset($oasl_login_disable) && $oasl_login_disable == 2}{$HOOK_OASL_CUSTOM nofilter}{/if}
          </div>
          <footer class="form-footer">
              <a class="btn btn-primary btn-large js-btn-active btn-spin btn-full-width" href="{$urls.pages.register}" data-link-action="display-register-form" id="SubmitCreate" rel="nofollow">
                  <i class="fto-user icon_btn"></i>
                  {l s='Create an account' d='Shop.Theme.Actions'}
              </a>
          </footer>
        </section>
      </div>
    {/block}
    {/if}
    {block name='login_form_container'}
      <div class="{if $sttheme.auth_layout} col-lg-{$auth_login_width} {else} col-lg-{$auth_login_width} {if $layout=='layouts/layout-full-width.tpl'}offset-lg-{floor((12-$auth_login_width)/2)}{/if} {/if}">{*to do looking for a better way to tell if has columns*}
        <section id="login_form_block" class="from_blcok block login_form_block {if !$sttheme.auth_layout} one_column_login {/if}">
          {if $sttheme.auth_heading_align!=3}<h3 class="page_heading {if $sttheme.auth_heading_align==1} text-2 {elseif $sttheme.auth_heading_align==2} text-3 {else} text-1 {/if}">{l s='Registered customers' d='Shop.Theme.Transformer'}</h3>{/if}
          {render file='customer/_partials/login-form.tpl' ui=$login_form}
          {if !$sttheme.auth_layout}
          <div class="form_content_inner text-center p-t-1">
            <h6 class="fs_lg heading_color heading_font">{l s='New customers?' d='Shop.Theme.Transformer'}</h6>
            <div class="p-b-1">{l s='It\'s quick and easy to create an account to shop faster and save your order to account.' d='Shop.Theme.Transformer'}</div>
          </div>
          {if isset($oasl_login_disable) && $oasl_login_disable == 2}{$HOOK_OASL_CUSTOM nofilter}{/if}
          <footer class="form-footer text-center">
            <a href="{$urls.pages.register}" class="no_account btn btn-default btn-large js-btn-active btn-spin btn-full-width" data-link-action="display-register-form" title="{l s='No account? Create one here' d='Shop.Theme.Customeraccount'}">
              <i class="fto-user icon_btn"></i>{l s='Create an account' d='Shop.Theme.Customeraccount'}
            </a>
          </footer>
          {/if}  
        </section>
      </div>
    {/block}
    </div>
    {block name='display_after_login_form'}
      {hook h='displayCustomerLoginFormAfter'}
    {/block}
{/block}
