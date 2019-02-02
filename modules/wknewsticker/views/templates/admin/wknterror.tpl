{**
* 2010-2017 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2017 Webkul IN
*  @license   https://store.webkul.com/license.html
*}
{if isset($errors) and $errors}
    <div class='alert alert-danger'>
        {foreach $errors as $err}
            {$err}
            <br />
        {/foreach}
       
    </div>
{else}
    {if isset($update) and $update}
        <div class='alert alert-success'>
            <button type='button' class='close' data-dismiss='alert'>×</button>{l s='Successful update' mod='wknewsticker'}
        </div>
    {/if}
{/if}