{*
* 2007-2018 PrestaShop
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
*	@author PrestaShop SA <contact@prestashop.com>
*	@copyright	2007-2018 PrestaShop SA
*	@license		http://opensource.org/licenses/afl-3.0.php	Academic Free License (AFL 3.0)
*	International Registered Trademark & Property of PrestaShop SA
*}
<div class="row">
  <div class="col-xs-12">
    <div class="well">
      <div class="text-center">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="marketing-tab" role="tab" data-toggle="tab" href="#marketing" aria-controls="marketing" aria-selected="true">Marketing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#account" id="account-tab" role="tab" data-toggle="tab" aria-controls="account" aria-selected="false">Account</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane active" id="marketing" role="tabpanel" aria-labelledby="marketing-tab">
            <img class="mail-chimp" src="{$module_dir|escape:'htmlall':'UTF-8'}/views/img/mail-chimp.png">
            <h1 id="marketing" class="tabcontent">MailChimp for PrestaShop</h1>
            <div class="row ">
              <div class="col-xs-10 col-xs-offset-1">
                <h4>Use your customer data to personalize your marketing, sell more stuff, and grow your business.</h4>
              </div>
            </div>
            <div class="marketing-offers text-left">
              <div class="row " style="margin-top: 15px;">
                <section class="col-xs-12 col-md-4" style="padding-right: 15px;">
                  <h2>Abandoned cart email</h2>
                  <p>Remind customers about items they've left behind to recapture
                     sales and generate more revenue.</p>
                </section>
                <section class="col-xs-12 col-md-8 well" style="background: rgb(255, 255, 255);">
                  <span class="col-xs-9">
                    <p>This email includes items from the customer’s cart and a quick link to
                       checkout. You can customize it in MailChimp.</p>
                  </span>
                  <span class="col-xs-3">
                    <a href="https://admin.mailchimp.com/jump/create-campaign/abandoned-cart" class="btn btn-info" role="button">Create in Mailchimp</a>
                  </span>
                </section>
              </div>
              <div class="row " style="margin-top: 15px;">
                <section class="col-xs-12 col-md-4" style="padding-right: 15px;">
                  <h2>Product retargeting email</h2>
                  <p>Encourage customers to make a purchase with retargeting emails that showcase new items, best sellers, and other products they might like.</p>
                </section>
                <section class="col-xs-12 col-md-8 well" style="background: rgb(255, 255, 255);">
                  <span class="col-xs-9">
                    <p>After someone visits a product page, this email reminds them of what they saw. Use MailChimp’s editor to customize the design.</p>
                  </span>
                  <span class="col-xs-3">
                    <a href="https://admin.mailchimp.com/jump/create-campaign/retarget-site-visitors" class="btn btn-info" role="button">Create in Mailchimp</a>
                  </span>
                </section>
              </div>
              <div class="row ">
                <section class="col-xs-12 col-md-4" style="padding-right: 15px;">
                  <h2>Order notifications</h2>
                  <p>Design, send, and track personalized order confirmations, invoices, and other customer notification emails that match your branding.</p>
                </section>
                <section class="col-xs-12 col-md-8 well" style="background: rgb(255, 255, 255);">
                  <span class="col-xs-9">
                    <p>Decide which notifications to send, and customize their look and feel.</p>
                  </span>
                  <span class="col-xs-3">
                    <a href="https://admin.mailchimp.com/jump/create-campaign/order-notifications" class="btn btn-info" role="button">Create in Mailchimp</a>
                  </span>
                </section>
              </div>
              <div class="row " style="margin-top: 15px;">
                <section class="col-xs-12 col-md-4" style="padding-right: 15px;">
                  <h2>Pop-up form</h2>
                  <p>Create and track beautiful pop-up signup forms to convert your website visitors into list subscribers.</p>
                </section>
                <section class="col-xs-12 col-md-8 well" style="background: rgb(255, 255, 255);">
                  <span class="col-xs-9">
                    <p>Use MailChimp’s design tools to build a custom pop-up signup form, set delay, and other options.</p>
                  </span>
                  <span class="col-xs-3">
                    <a href="https://admin.mailchimp.com/account/connected-sites" class="btn btn-info" role="button">Create in Mailchimp</a>
                  </span>
                </section>
              </div>
            </div>
          </div>
          <div class="tab-pane " id="account" role="tabpanel" aria-labelledby="account-tab">
            <div class="account-info text-left">
              <div class="row " style="margin-top: 15px;">
                <section class="col-xs-12 col-md-4" style="padding-right: 15px;">
                  <h2>Account</h2>
                  <p></p>
                </section>
                <section class="col-xs-12 col-md-8 well" style="background: rgb(255, 255, 255);">
                  <div >
                    {if isset($login_url)}
                      <div class="row">
                        <div class="col-md-6"><a href={$login_url|escape:'htmlall':'UTF-8'} class="btn btn-default btn-lg">Connect to MailChimp</a></div>
                        <div class="col-md-6 text-right"><br />Need a MailChimp account? <a href="https://login.mailchimp.com/signup/?utm_source=integration&utm_medium=integration&utm_campaign=mailchimp-account-signup&utm_term=ecomm&utm_content=mailchimp-signup">Create an account</a></div>
                      </div>
                    {/if}
                    {if isset($list_name)}
                      <span id="Account" >Connected to list {$list_name|escape:'htmlall':'UTF-8'}</span>
                    {/if}
                  </div>
                </section>
              </div>
              <div class="row " style="margin-top: 15px;">
                <section class="col-xs-12 col-md-4" style="padding-right: 15px;">
                  <h2>Terms and conditions</h2>
                  <p>View MailChimp’s policies and conditions at any time.</p>
                </section>
                <section class="col-xs-12 col-md-8 well" style="background: rgb(255, 255, 255);">
                  <p><a target="_blank" href="https://mailchimp.com/legal/privacy">Privacy</a> and <a target="_blank" href="https://mailchimp.com/legal">terms</a>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
