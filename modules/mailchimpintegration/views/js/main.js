/**
* 2007-2018 PrestaShop
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2018 PrestaShop SA
* @license   http://addons.prestashop.com/en/content/12-terms-and-conditions-of-use
* International Registered Trademark & Property of PrestaShop SA
*/

$(document).ready(function () {
  var x = $('#configuration_form_submit_btn').text();
  if(x.indexOf('Disconnect') !== -1) {
    $('#configuration_form').submit(function() {
      return confirm("This will disable your MailChimp store and break any existing automations, are you sure?");
     });
  }
});
