/**
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

$(function () {
    window.tree = new TreeCustom('.tree_custom .block_category_tree', '.tree_custom .tree_categories_header');
    window.tree.init();

    $('#beginSearch').live('click', function (e, orderby, orderway) {

        var categories = '';
        $('[name="categories[]"]:checked').each(function (i) {
            categories += ($(this).val());
            if($('[name="categories[]"]:checked').length > i+1)
                categories += ',';
        });
        if($('[name="categoryBox[]"]:checked').length)
        {
            $('[name="categoryBox[]"]:checked').each(function (i) {
                categories += ($(this).val());
                if($('[name="categoryBox[]"]:checked').length > i+1)
                    categories += ',';
            });
        }
        var manufacturers = '';
        $('[name="manufacturer[]"] option:selected').each(function (i) {
            manufacturers += ($(this).val());
            if($('[name="manufacturer[]"] option:selected').length > i+1)
                manufacturers += ',';
        });
        var suppliers = '';
        $('[name="supplier[]"] option:selected').each(function (i) {
            suppliers += ($(this).val());
            if($('[name="supplier[]"] option:selected').length > i+1)
                suppliers += ',';
        });

        if(typeof orderby !== 'undefined' && typeof orderway !== 'undefined')
            var sort = '&order_by='+orderby+'&order_way='+orderway;
        else
            var sort = '';

        var url = location.href.match(/^[^&]+&[^&]+/i);
        location.href = url
            + '&categories=' + categories
            + '&search_default_categories=' + ($('#search_default_categories').prop('checked') ? 1 : 0)
            + '&search_query=' + $('[name="search_query"]').val()
            + '&type_search=' + $('[name="type_search"]').val()
            + '&manufacturers=' + manufacturers
            + '&suppliers=' + suppliers
            + '&how_many_show=' + $('[name="how_many_show"]').val()
            + '&active=' + parseInt($('[name="active"]:checked').val())
            + '&disable=' + parseInt($('[name="disable"]:checked').val())
            + '&product_name_type_search=' + $('[name="product_name_type_search"]:checked').val()
            + '&qty_from=' + ($('[name="qty_from"]').val() != '' ? parseInt($('[name="qty_from"]').val()) : '')
            + '&qty_to=' + ($('[name="qty_to"]').val() != '' ? parseInt($('[name="qty_to"]').val()) : '')
            + '&price_from=' + ($('[name="price_from"]').val() != '' ? parseFloat($('[name="price_from"]').val()) : '')
            + '&price_to=' + ($('[name="price_to"]').val() != '' ? parseFloat($('[name="price_to"]').val()) : '')
            + '&refilters=' + '1'
            + sort;
    });

    $('#resetSearch').live('click', function () {
        location.href = location.href.match(/^[^&]+&[^&]+/i);
    });

    $('.pagination-link').off().click(function () {
        var url = location.href.replace(/&submitFilterproduct=\d+/i, '');
        url = location.href.replace(/#product/i, '');
        location.href = url + '&submitFilterproduct=' + $(this).data('page');
    });

    $(".tabs a[data-toggle='tab']").click(function(e){
        e.preventDefault();
        $(this).tab('show');
    });

    $(".panel-heading-top, .hidden_filter").click(function () {
        $(".mode_search > .row").slideToggle();
        $(".hidden_filter i").toggleClass('icon-chevron-up').toggleClass('icon-chevron-down');
    });

    $('input.search_category:first').focus({el:$('.block_category_tree.tree_root:first input.tree_input')}, function(eventObj){
        eventObj.data.el.each(function(){
            $(this).attr('data-search', $(this).data('name').toLowerCase());
        });
    });

    $('table.product .title_box a').on('click', function(){
        var $_GET = {};
        var __GET = $(this).attr('href').split("&");
        for(var i=0; i<__GET.length; i++) {
            var getVar = __GET[i].split("=");
            $_GET[getVar[0]] = typeof(getVar[1])=='undefined' ? '' : getVar[1];
        }
        $('#beginSearch').trigger('click', [$_GET.productOrderby, $_GET.productOrderway]);

        return false;
    });
});