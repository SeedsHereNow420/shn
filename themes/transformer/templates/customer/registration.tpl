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

{block name='page_title' hide}{/block}

{block name='page_content'}
    {block name='register_form_container'}
    {assign var="auth_login_width" value=6}
    {if $sttheme.auth_login_width}{$auth_login_width=$sttheme.auth_login_width}{/if}
      <div class="row">
        <div class="col-lg-{$auth_login_width} {if $auth_login_width<11}offset-lg-{floor((12-$auth_login_width)/2)}{/if}">
        <section id="register_form_block" class="from_blcok block login_form_block">
          {if $sttheme.auth_heading_align!=3}<h3 class="page_heading {if $sttheme.auth_heading_align==1} text-2 {elseif $sttheme.auth_heading_align==2} text-3 {else} text-1 {/if}">{l s='Create an account' d='Shop.Theme.Customeraccount'}</h3>{/if}
          <div class="form_content">
            <div class="form_content_inner">
                <p>
                  {l s='Already have an account?' d='Shop.Theme.Customeraccount'} <a href="{$urls.pages.authentication}" rel="nofollow" title="{l s='Log in instead!' d='Shop.Theme.Customeraccount'}">{l s='Log in instead!' d='Shop.Theme.Customeraccount'}</a>
                </p>
                {$hook_create_account_top nofilter}
            </div>
          </div>
          {render file='customer/_partials/customer-form-regi.tpl' ui=$register_form}            
        </section>
        </div>
      </div>
    {/block}
{/block}
