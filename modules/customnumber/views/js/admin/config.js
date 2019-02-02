/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

(function ($) {
    $(function () {
        // Reset numbering
        var showReset = function () {
            $('input[name=f_5]').each(function () {
                var p = $('.' + $(this).attr('id')).closest(".col-lg-9").parent();

                if (this.checked) {
                    p.slideDown();
                } else {
                    p.slideUp();
                }
            });
        };

        $('input[name=f_5]').on('click', showReset);

        showReset();
        
        // Provisioning
        var provisioningEnable = function () {
            var disabled = ($(this).val() === '1');
            
            $(this).closest('form')
                    .find('input')
                    .not('input[name^="f_0"], input:hidden')
                    .prop('disabled', disabled);
            
            $('.next-number').parent()[disabled ? 'slideUp' : 'slideDown']();
        };
        
        $('input[name=f_01]').on('click', provisioningEnable)
                .filter(':checked').each(provisioningEnable);
        
        // Supported tags
        $('.supported-tags a').on('click', function() {
            var format = $('#f_1');
            
            if (!format.prop('disabled')) {
                format.val(format.val() + '{' + $(this).data('tag') + '}');
            }
        });
        
        // Next number
        var nextNumber = function() {
            var form = $('#configuration_form');
            
            var params = form.serialize() + '&nextnumber=1';
            var label = $('.next-number');
            
            if (label.is(':hidden')) {
                return false;
            }
            
            $.ajax({
                    type: 'POST',
                    headers: { "cache-control": "no-cache" },
                    url: form.attr('action'),
                    async: true,
                    cache: false,
                    dataType : "json",
                    data: params,
                    success: function(jsonData)
                    {
                        label.text(jsonData.hasError ? 'n/a' : jsonData.number);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown)
                    {
                            alert("TECHNICAL ERROR: \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
                    }
            });
            
            return false;
        };

        $('input[name^="f_"]').on('change', nextNumber);
        $('.next-number-refresh').on('click', nextNumber).click();
    });
})(jQuery);