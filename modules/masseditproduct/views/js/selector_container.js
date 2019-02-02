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

$.fn.SelectorContainers = [];
$.fn.setSelectorContainer = function ()
{
    $.each(this, function (index, value)
    {
        if ($(value).attr('class').match(/sc_/) == null)
        {
            var selector_container = new selectorContainer(value);
            selector_container.init('sc_' + $.fn.SelectorContainers.length);
            $.fn.SelectorContainers.push(selector_container);
        }
    });
    function selectorContainer(elem)
    {
        var _this = this;
        this.elem = $(elem);
        this.init = function (class_name)
        {
            _this.elem.addClass(class_name);
            _this.elem.live('destroy', function () {
                _this.elem.removeClass(class_name);
                $.each($.fn.SelectorContainers, function (index, value) {
                    if (value != undefined)
                    {
                        if (!value.elem.is('.'+class_name))
                            $.fn.SelectorContainers.splice(index, 1);
                    }
                });
            });

            _this.elem.live('collapse', function () {
                $(this).find('.selector_item').stop(true, true).slideUp(300);
                $(this).find('.selector_label').removeClass('open');
            });

            _this.elem.find('.selector_list').click(function (e) {
                e.preventDefault();
                $.each($.fn.SelectorContainers, function (index, value) {
                    if (!value.elem.is('.'+class_name))
                        value.elem.trigger('collapse');
                });

                if ($(this).closest('.selector_label').is('.open'))
                {
                    _this.elem.find('.selector_item').stop(true, true).slideUp(300);
                    $(this).closest('.selector_label').removeClass('open');
                }
                else
                {
                    _this.elem.find('.selector_item').stop(true, true).slideDown(300);
                    $(this).closest('.selector_label').addClass('open');
                }
            });

            _this.elem.find('[data-selector-all]').click(function ()
            {
                 if ($(this).is(':checked'))
                    _this.elem.find('[data-selector-item]').attr('checked', 'checked');
                 else
                     _this.elem.find('[data-selector-item]').removeAttr('checked');
                _this.updateContainer();
            });

            _this.elem.find('[data-selector-item]').click(function () {
                _this.updateContainer();
                _this.elem.find('[data-selector-all]').removeAttr('checked');
            });
        };

        this.updateContainer = function ()
        {
            _this.elem.find('.selector_count').text(_this.elem.find('[data-selector-item]:checked').length);
        };

        this.getValues = function () {
            var arr_values = [];
            _this.elem.find('[data-selector-item]:checked').each(function ()
            {
                arr_values.push($(this).data('selector-item'));
            });
            return arr_values;
        };
    }
};

$.getAllValues = function()
{
    var values = [];
    $.each($.fn.SelectorContainers, function (index, value)
    {
        if (value != 'undefined')
            values = values.concat(value.getValues());
    });
    return values;
};