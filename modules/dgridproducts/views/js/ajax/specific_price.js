/**
 * 2007-2016 PrestaShop
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
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

function SpecificPrice()
{
    var self = this;
    // Bind to show/hide new specific price form
    this.toggleSpecificPrice = function (){
        $('#show_specific_price').click(function()
        {
            $('#form_specific_price').slideToggle();
            $('#hide_specific_price').show();
            $('#show_specific_price').hide();
            return false;
        });

        $('#hide_specific_price').click(function()
        {
            $('#form_specific_price').slideToggle();
            $('#hide_specific_price').hide();
            $('#show_specific_price').show();
            return false;
        });
    };
    this.deleteSpecificPrice = function (url, parent){
        if (typeof url !== 'undefined')
            $.ajax({
                url: url,
                data: {
                    ajax: true
                },
                context: document.body,
                dataType: 'json',
                context: this,
                async: false,
                success: function(data) {
                    if (data !== null)
                    {
                        if (data.status == 'ok')
                        {
                            showSuccessMessage(data.message);
                            parent.remove();
                        }
                        else
                            showErrorMessage(data.message);
                    }
                }
            });
    };

    // Bind to delete specific price link
    this.bindDelete = function(){
        $('.form_popup').delegate('a[name="delete_link"]', 'click', function(e){
            e.preventDefault();
            if (confirm(delete_price_rule))
                self.deleteSpecificPrice(this.href, $(this).parents('tr'));
        })
    };
    this.loadInformations = function(select_id, action)
    {
        id_shop = $('#sp_id_shop').val();
        $.ajax({
            url: product_url + '&action='+action+'&ajax=true&id_shop='+id_shop,
            success: function(data) {
                $(select_id + ' option').not(':first').remove();
                $(select_id).append(data);
            }
        });
    };
    this.onReady = function(){
        self.toggleSpecificPrice();
        self.deleteSpecificPrice();
        self.bindDelete();

        $('#sp_id_shop').change(function() {
            self.loadInformations('#sp_id_group','getGroupsOptions');
            self.loadInformations('#spm_currency_0', 'getCurrenciesOptions');
            self.loadInformations('#sp_id_country', 'getCountriesOptions');
        });
        if (display_multishop_checkboxes)
            ProductMultishop.checkAllPrices();
    };
}
