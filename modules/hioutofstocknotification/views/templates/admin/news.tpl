{**
* 2013 - 2017 HiPresta
*
* MODULE Out Of Stock Notification
*
* @version   1.2.2
* @author    HiPresta <suren.mikaelyan@gmail.com>
* @link      http://www.hipresta.com
* @copyright HiPresta 2015
* @license   Addons PrestaShop license limitation
*
* NOTICE OF LICENSE
*
* Don't use this module on several shops. The license provided by PrestaShop Addons 
* for all its modules is valid only once for a single shop.
*}
<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
    {literal}
    #mc_embed_signup{background:#fff;font:14px Helvetica,Arial,sans-serif; }
    {/literal}
    {if $psv == 1.5}
        {literal}
            label{
                width: auto;
            }
            #mc_embed_signup .button{
                background: #aaa;
                text-shadow: none;
            }
            #mc_embed_signup .mc-field-group{
                clear: none;
            }
        {/literal}
    {/if}
    /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
    <form action="//presta-fan.us8.list-manage.com/subscribe/post?u=d57fefb39a6ab6e5af2fe3977&amp;id=1cd9b6e66e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
            <h2>{l s='Subscribe to our mailing list for updates and new modules' mod='hioutofstocknotification'}</h2>
            <div class="indicates-required">
                <span class="asterisk">*</span>{l s='indicates required' mod='hioutofstocknotification'}
            </div>
            <div class="mc-field-group">
                <label for="mce-EMAIL">
                    {l s='Email Address' mod='hioutofstocknotification'} <span class="asterisk">*</span>
                </label>
                <input type="email" value="{$employee_email|escape:'html':'UTF-8'}" name="EMAIL" class="required email" id="mce-EMAIL">
            </div>
            <div class="mc-field-group">
                <label for="mce-FNAME">{l s='First Name' mod='hioutofstocknotification'}</label>
                <input type="text" value="{$employee_fname|escape:'html':'UTF-8'}" name="FNAME" class="" id="mce-FNAME">
            </div>
            <div class="mc-field-group">
                <label for="mce-LNAME">{l s='Last Name' mod='hioutofstocknotification'}</label>
                <input type="text" value="{$employee_lname|escape:'html':'UTF-8'}" name="LNAME" class="" id="mce-LNAME">
            </div>
            <input type="hidden" value="OOSN" name="MMERGE3" id="mce-MMERGE3">
            <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_d57fefb39a6ab6e5af2fe3977_1cd9b6e66e" tabindex="-1" value="">
            </div>
            <div class="clear">
                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
            </div>
        </div>
    </form>
</div>
<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
<script type='text/javascript'>
    {literal}(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='MMERGE3';ftypes[3]='text';}(jQuery));var $mcj = jQuery.noConflict(true);
    {/literal}
</script>