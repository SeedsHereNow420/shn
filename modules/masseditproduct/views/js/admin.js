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

if (typeof window.hideOtherLanguage == 'undefined')
    function hideOtherLanguage(id_lang) { changeFormLanguage(id_lang); }

Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};

$.fn.rowCopy = function () {
    $.each(this, function (index, item) {
        var elem = $(item);
        var _ajax = null;
        /**
         *
         * @type {string[]}
         */
        var form_elements = ['_search', '_id_product', '_lang', '_submit', 'search_input', 'selected_product'];

        if (elem.is('._row_copy')
            && elem.find('.' + form_elements.join(', .')).length == form_elements.length)
        {
            elem.find('._search').live('keyup focus', function () {
                elem.find('.search_result').remove();
                if (!elem.find('._search').val())
                    return false;
                sendAjax({
                    ajax: true,
                    action: 'row_copy_search_product',
                    query: elem.find('._search').val()
                }, function (r)
                {
                    /**
                     *
                     * @type {jQuery}
                     */
                    var html = $('<div class="search_result row"></div>');
                    $.each(r, function (index, item) {
                        html.append('<div data-id-product="'+item.id_product+'" class="col-lg-12">'+item.name+'</div>');
                    });
                    elem.find('._search').after(html);
                });
            });

            elem.find('._submit').live('click', function () {
                var self = $(this);
                sendAjax({
                    ajax: true,
                    action: 'copy_field_' + self.data('field'),
                    id_product: elem.find('._id_product').val(),
                    id_lang: elem.find('._lang').val()
                }, function (r) {
                    if (typeof r.response != 'undefined')
                    {
                        /**
                         *
                         * @type {Redactor}
                         */
                        var redactor = $('[name="'+self.data('field')+'"].editor_html').data('redactor');
                        redactor.setCode(r.response);
                    }
                });
            });

            elem.find('.search_input').live('click', function (e) {
                if ($(e.target).is('[data-id-product]'))
                {
                    elem.find('._id_product').val($(e.target).data('id-product'));
                    elem.find('.selected_product').text($(e.target).text());
                    elem.find('._search').val('');
                    elem.find('.search_result').remove();
                }
            });
            var body = $('body');
            var data_search_input = body.data('search_input');
            if (!data_search_input)
            {
                body.data('search_input', true);
                body.live('click', function (e) {
                    if (!$(e.target).closest('.search_input').length)
                        $('.search_result').remove();
                });
            }
        }

        if (elem.find('.' + form_elements.join(', .')).length != form_elements.length)
            console.log('Can not load row copy plugin!');

        function sendAjax(data, success, error)
        {
            if (_ajax != null)
            {
                _ajax.abort();
                _ajax = null;
            }

            _ajax = $.ajax({
                url: document.location.href.replace(document.location.hash, ''),
                type: 'POST',
                dataType: 'json',
                data: data,
                success: success,
                error: error
            });
        }
    });
};

$.fn.loadCombinations = function (ajax_array, after_load_func) {
    var counter_load_combinations = 0;
    var length = $(this).length;
    $(this).each(function () {
        var id_product = $(this).data('combinations');
        var $this = $(this);
        $this.addClass('loading');
        ajax_array.push($.ajax({
            url: document.location.href.replace(document.location.hash, ''),
            type: 'POST',
            dataType: 'json',
            asinc: false,
            data: {
                ajax: true,
                action: 'load_combinations',
                id_product: id_product
            },
            success: function (json) {
                $this.html(json.combinations);
                $this.removeClass('loading');

                counter_load_combinations++;

                if (counter_load_combinations == length) {
                    if (typeof after_load_func != 'undefined') {
                        after_load_func();
                    }
                }
            }
        }));
    });
};

//instead loadCombinations() for one ajax request
$.fn.loadCombinationsOneRequest = function (ajax_array, after_load_func) {
    var $this = $(this);
    var ids_product = [];
    $(this).each(function(){
        ids_product.push($(this).data('combinations'));
    });

    $.ajax({
        url: document.location.href.replace(document.location.hash, ''),
        type: 'POST',
        dataType: 'json',
        asinc: false,
        data: {
            ajax: true,
            action: 'load_combinations_one_request',
            ids_product: ids_product
        },
        success: function (json) {
            $this.each(function(){
                $(this).html(json[$(this).data('combinations')]);
            });

            if (typeof after_load_func != 'undefined') {
                after_load_func();
            }
        }
    });
    console.log(tt);
};

function PopupForm(popup_selector)
{
    this.popup = $(popup_selector);
    this.ajaxCombinations = [];
    var _this = this;
    this.select_products = {};
    this.products = {};
    this.init = function () {
        _this.popup.delegate('.toggleList', 'click', function () {
            if ($(this).is('.active'))
            {
                _this.popup.find('.list_products, .popup_info_template').stop(true, true).slideUp(500);
                $(this).removeClass('active');
            }
            else
            {
                _this.popup.find('.list_products, .popup_info_template').stop(true, true).slideDown(500);
                $(this).addClass('active');
            }
        });
        _this.popup.delegate('.clearAll', 'click', function () {
            _this.popup.find('.product_item').each(function () {
                var id_product = $(this).data('id');
                _this.removeProduct(id_product);
            });
        });
        _this.popup.delegate('.removeProduct', 'click', function (e) {
            e.preventDefault();
            var product = $(this).closest('.product_item');
            var id_product = product.data('id');
            _this.removeProduct(id_product);
        });
        $('[class*=mode_]').stop(true, true).hide();
        $('.' + _this.popup.find('[name=mode]:checked').val()).stop(true, true).show();
        _this.popup.find('[name=mode]').change(function () {
            $('[class*=mode_]').stop(true, true).slideUp(500);
            $('.' + $(this).val()).stop(true, true).slideDown(500);
            if($(this).val() == 'mode_edit')
                createListPositionsForImageCaption(_this);
        });
        
        _this.popup.find('.saveTemplateProduct').live('click', function (e) {
            e.preventDefault();
            var template_product = _this.popup.find('[name="template_product"]').val();
            if (!template_product) {
                alert(text_template_name_empty);
                return false;
            }

            if (!Object.size(_this.products)) {
                alert(text_not_products);
                return false;
            }

            $.ajax({
                url: document.location.href.replace('#'+document.location.hash, ''),
                type: 'POST',
                dataType: 'json',
                data: {
                    ajax: true,
                    action: 'save_template_product',
                    products: _this.products,
                    name: _this.popup.find('[name="template_product"]').val()
                },
                success: function (json) {
                    if (json.hasError) {
                        alert(json.errors.join('\n'));
                    } else {
                        var $template_products = _this.popup.find('select[name="template_products"]');
                        $template_products.html('<option value="">-----</option>');

                        $.each(json.templates_products, function (index, template) {
                            $template_products.append('<option value="'+template.id+'">'+template.name+'</option>');
                        });
                    }
                }
            });
        });
        
        _this.popup.find('.deleteTemplateProduct').live('click', function (e) {
            e.preventDefault();

            $.ajax({
                url: document.location.href.replace('#'+document.location.hash, ''),
                type: 'POST',
                dataType: 'json',
                data: {
                    ajax: true,
                    action: 'delete_template_product',
                    id: _this.popup.find('[name="template_products"]').val()
                },
                success: function (json) {
                    _this.popup.find('[name="template_products"] option:selected').remove();
                }
            });
        });

        _this.popup.find('.selectTemplateProduct').live('click', function (e) {
            e.preventDefault();

            $.ajax({
                url: document.location.href.replace('#'+document.location.hash, ''),
                type: 'POST',
                dataType: 'json',
                data: {
                    ajax: true,
                    action: 'get_template_product',
                    id: _this.popup.find('[name="template_products"]').val()
                },
                success: function (json) {
                    _this.popup.find('.list_products').html(json.popup_list);
                    $('.table_selected_products table tbody').html(json.list);
                    _this.products = json.products;
                    $('.table_selected_products .selector_container').setSelectorContainer();
                    var id_tab = parseInt(tab_container.tab.find('ul li.active').data('tab').replace('tab', ''));
                    if (id_tab == 2 || id_tab == 3) {
                        $('.table_selected_products [data-combinations]').show();
                    } else {
                        $('[data-combinations]').hide();
                    }

                    if (_this.ajaxCombinations.length) {
                        $.each(_this.ajaxCombinations, function (key, item) {
                            item.abort();
                        });
                        _this.ajaxCombinations = [];
                    }
                    var $col_combinations = $('.table_selected_products td[data-combinations]');
                    if ($col_combinations.length) {
                        $col_combinations.loadCombinationsOneRequest(_this.ajaxCombinations, function () {
                            $('.table_selected_products .selector_container').setSelectorContainer();
                        });
                    }
                    $('#beginSearch').trigger('click');
                }
            });
        });

        _this.updatePopup();
    };
    this.mergeProducts = function () {
        var products = _this.select_products;
        for (var i in products)
        {
            if (typeof _this.products[i] == 'undefined')
            {
                _this.products[i] = products[i];
                var product = products[i];
                _this.popup.find('.list_products')
                    .append('<div class="product_item product_'+product.id+'" data-id="'+product.id+'">'+
                        product.id+' - '+product.name
                        +' <a class="removeProduct" href="#"><i class="icon-remove"></i></a></div>');
                $('.table_search_product .product_' + product.id).find('[name=product]').removeAttr('checked');
                $('.table_search_product .product_' + product.id).removeClass('selected stateSelected').addClass('un-selected stateUnSelected');
                $('.table_selected_products table tbody').append($('.table_search_product .product_' + product.id).remove());
                $('.table_selected_products .selector_container').setSelectorContainer();
                var id_tab = parseInt(tab_container.tab.find('ul li.active').data('tab').replace('tab', ''));
                if (id_tab == 2 || id_tab == 3)
                    $('.table_selected_products [data-combinations]').show();
                else
                    $('[data-combinations]').hide();
            }
        }
        _this.resetSelect();
        _this.updatePopup();
        if (!$('.table_search_product tbody tr').length)
        {
            window.page = 1;
            $('#beginSearch').trigger('click');
        }
    };
    this.selectProduct = function (product) {
        if (typeof _this.select_products[product.id] == 'undefined')
        {
            _this.select_products[product.id] = product;
        }
        _this.updatePopup();
    };
    this.unselectProduct = function (id) {
        if (typeof _this.select_products[id] != 'undefined')
        {
            delete _this.select_products[id];
            _this.updatePopup();
            return true;
        }
        return false;
    };
    this.resetSelect = function ()
    {
        _this.select_products = {};
        _this.updatePopup();
    };
    this.removeProduct = function(id_product)
    {
        console.log(_this.products);
        $('.table_search_product .no_products').remove();
        if (typeof _this.products[id_product] != 'undefined')
        {
            delete _this.products[id_product];
            _this.popup.find('.list_products .product_' + id_product).remove();
            $('.table_selected_products .product_' + id_product + ' .selector_container').trigger('destroy');
            $('.table_search_product table tbody').append($('.table_selected_products .product_' + id_product).remove());
        }
        _this.updatePopup();
    };
    this.updatePopup = function ()
    {
        /*
        if (!Object.size(_this.products))
            _this.popup.find('.toggleList, .clearAll').hide();
        else
            _this.popup.find('.toggleList, .clearAll').show();
        */

        _this.popup.find('.count_selected_products').text(Object.size(_this.select_products));
        _this.popup.find('.count_products').text(Object.size(_this.products));
    };
}


function TabContainer(tab_container_selector)
{
    var _this = this;
    this.tab = $(tab_container_selector);
    this.init = function () {
        $('#title_create_tabs').hide();
        _this.tab.find('ul.tabs > li').live('click', function () {
            $('.tabs_content > .panel-heading').hide();
            if ($(this).data('action') == 'create_products') {
                $('#title_create_tabs').show();
            } else {
                $('#title_edit_tabs').show();
            }
            _this.tab.find('.tabs > li').removeClass('active');
            $(this).addClass('active');
            _this.tab.find('.tabs_content > div').hide();
            var id_tab = parseInt($(this).data('tab').replace('tab', ''));
            if (id_tab == 2 || id_tab == 3 || id_tab || id_tab == 8 || id_tab == 11 || id_tab == 10)
                $('.table_selected_products [data-combinations]').show();
            else
                $('[data-combinations]').hide();
            _this.tab.find('[id="'+$(this).data('tab')+'"]').show();
        });
        _this.tab.find('.tabs_content > div').hide();
        _this.tab.find('.tabs_content > div:first').show();
        _this.tab.find('ul.tabs > li:first').addClass('active');
    }
}

$(function () {
    var ajax_url = document.location.href.replace(document.location.hash, '');

    window.page = 1;
    window.tree = new TreeCustom('.tree_custom .tree_categories', '.tree_custom .tree_categories_header');
    window.tree.init();
    window.tree_categories = new TreeCustom('.tree_custom_categories .tree_categories', '.tree_custom_categories .tree_categories_header');
    window.tree_categories.init();
    window.tree_categories.afterChange = function () {
        var categories = this.getListSelectedCategories();
        var category_default = $('[name=category_default]');
        category_default.html('');
        category_default.append('<option value="0">-</option>');
        $.each(categories, function (index, value) {
            category_default.append('<option value="'+value.id+'">'+value.name+'</option>');
        });
    };

    $('.table_head th .title_box a').live('click', function(){
        var orderby = $(this).parent('span').data('orderby');
        var orderway = $(this).data('orderway');
        $('#beginSearch').trigger('order', [orderby, orderway]);
    });

    window.tree_categories.checkAssociatedCategory(2);

    var ajaxLoadCombinations = [];
    $('#beginSearch').live('click order', function (event, orderby, orderway) {
        $('.wrapp_content').addClass('loading');
        var categories = tree.getListSelectedCategories();
        var search_only_default_category = $('#search_only_default_category').prop('checked');
        var search_query = $('[name=search_query]').val();
        var type_search = $('[name=type_search]').val();
        var manufacturers = $('[name="manufacturer[]"]').val();
        var suppliers = $('[name="supplier[]"]').val();
        var how_many_show = $('[name="how_many_show"]').val();
        var active = parseInt($('[name="active"]:checked').val());
        var disable = parseInt($('[name="disable"]:checked').val());
        var product_name_type_search = $('[name="product_name_type_search"]:checked').val();

        var qty_from = ($('[name="qty_from"]').val() != '' ? parseInt($('[name="qty_from"]').val()) : '');
        var qty_to = ($('[name="qty_to"]').val() != '' ? parseInt($('[name="qty_to"]').val()) : '');

        var price_from = ($('[name="price_from"]').val() != '' ? parseFloat($('[name="price_from"]').val()) : '');
        var price_to = ($('[name="price_to"]').val() != '' ? parseFloat($('[name="price_to"]').val()) : '');

        var features = [];

        $('[name="features[]"]:checked').each(function () {
            features.push($(this).val());
        });

        var no_feature_value = [];

        $('[name="no_feature_value[]"]:checked').each(function () {
            no_feature_value.push($(this).val());
        });

        var exclude_ids = [];
        $('.table_selected_products [name="id_product"]').each(function () {
            exclude_ids.push($(this).val());
        });
        var url = document.location.href.replace(document.location.hash, '');
        var data = {
            categories: categories,
            search_only_default_category: search_only_default_category ? 1 : 0,
            search_query: search_query,
            type_search: type_search,
            manufacturers: manufacturers,
            suppliers: suppliers,
            how_many_show: how_many_show,
            active: active,
            disable: disable,
            page: window.page,
            ajax: true,
            action: 'search_products',
            exclude_ids: exclude_ids,
            product_name_type_search: product_name_type_search,
            qty_from: qty_from,
            qty_to: qty_to,
            price_from: price_from,
            price_to: price_to,
            features: features,
            no_feature_value: no_feature_value
        };

        if(typeof orderby == 'string' && typeof orderway == 'string')
        {
            data['orderby'] = orderby;
            data['orderway'] = orderway;
        }

        if (ajaxLoadCombinations.length) {
            $.each(ajaxLoadCombinations, function (key, item) {
                item.abort();
            });
            ajaxLoadCombinations = [];
        }

        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (r) {
                $('.table_search_product').html(r.products);
                popup_form.resetSelect();
                var id_tab = parseInt(tab_container.tab.find('ul li.active').data('tab').replace('tab', ''));
                if (id_tab == 2 || id_tab == 3)
                    $('.table_selected_products [data-combinations]').show();
                else
                    $('[data-combinations]').hide();
                $('#count_result').remove();

                $('.panel.mode_search .panel-heading:last').append('<span id="count_result" class="badge">'+r.count_result+'</span>');

                var $col_combinations = $('.table_search_product td[data-combinations]');
                if ($col_combinations.length) {
                    $col_combinations.loadCombinationsOneRequest(ajaxLoadCombinations, function () {
                        $('.wrapp_content').removeClass('loading');
                    });
                } else {
                    $('.wrapp_content').removeClass('loading');
                }
                //var table = $('.table_search_product table').finderSelect({
                //    children: '> tr:not(.table_head)'
                //});
                //table.finderSelect('addHook','highlight:before', function(el) {
                //    el.find('input[name=product]').attr('checked', 'checked');
                //    el.each(function () {
                //        popup_form.selectProduct({
                //            id: $(this).find('[name=id_product]').val(),
                //            name: $(this).find('[data-name]').text()
                //        });
                //    });
                //});
                //table.finderSelect('addHook','unHighlight:before', function(el) {
                //    el.find('input[name=product]').removeAttr('checked');
                //    el.find('input[name=id_product]').each(function () {
                //        popup_form.unselectProduct($(this).val());
                //    });
                //});
                document.location.hash = r.hash;
            },
            error: function () {
                $('.wrapp_content').removeClass('loading');
            }
        });
    });

    $('#setCategoryAllProduct').live('click', function () {
        var tab = $('#tab1');
        var data = {};
        var categories = tree_categories.getListSelectedCategories();
        data['category'] = [];
        data['id_category_default'] = parseInt(tab.find('[name=category_default]').val());
        data['action_with_category'] = parseInt(tab.find('[name=action_with_category]:checked').val());
        data['remove_old_categories'] = (tab.find('[name=remove_old_categories]').length
        && tab.find('[name=remove_old_categories]').is(':checked') ? 1 : 0);
        $.each(categories, function (index, category) {
            data['category'].push(category.id);
        });

        setAllProducts(data, 'category');
    });

    $('#setPriceAllProduct').live('click', function () {
        var tab = $('#tab2');
        var data = {};
        data['type_price'] = tab.find('[name="type_price"]:checked').val();
        data['action_price'] = tab.find('[name="action_price"]:checked').val();
        data['change_for'] = tab.find('[name="change_for"]:checked').val();
        data['combinations'] = $.getAllValues();
        data['price_value'] = tab.find('[name="price_value"]').val();
        data['id_tax_rules_group'] = tab.find('[name="id_tax_rules_group"]').val();
        data['not_change_final_price'] = (tab.find('[name="not_change_final_price"]').prop('checked') ? 1 : 0);
        setAllProducts(data, 'price');
    });

    $('[value=price]').live('change', function () {
        var checkbox = $('[value=tax_rule_group]');
        if ($(this).prop('checked')) {
            checkbox.attr('disabled', false);
        } else {
            checkbox.attr('disabled', true);
        }
    });

    $('[value=tax_rule_group]').live('change', function () {
        var checkbox = $('[value=price]');
        if ($(this).prop('checked')) {
            checkbox.attr('disabled', false);
        } else {
            checkbox.attr('disabled', true);
        }
    });

    $('#setQuantityAllProduct').live('click', function () {
        var tab = $('#tab3');
        var data = {};
        data['quantity'] = parseInt(tab.find('[name="quantity"]').val());
        data['change_for'] = tab.find('[name="change_for_qty"]:checked').val();
        data['change_type'] = tab.find('[name="change_type"]:checked').val();
        data['combinations'] = $.getAllValues();
        data['action_quantity'] = parseInt(tab.find('[name="action_quantity"]:checked').val());
        data['warehouse'] = parseInt(tab.find('[name=warehouse]').val());
        data['action_warehouse'] = parseInt(tab.find('[name=action_warehouse]').val());

        data['language'] = tab.find('[name=language_qty]:checked').val();
        data['available_now'] = tab.find('[name=available_now]').val();
        data['available_later'] = tab.find('[name=available_later]').val();

        data['change_available_date'] = tab.find('[name=change_available_date]:checked').val();
        data['available_date'] = tab.find('[name=available_date]').val();
        data['out_of_stock'] = tab.find('[name=out_of_stock]:checked').val();
        data['minimal_quantity'] = tab.find('[name=minimal_quantity]').val();
        setAllProducts(data, 'quantity');
    });

    $('#setActiveAllProduct').live('click', function () {
        var tab = $('#tab4');
        var data = {};
        data['active'] = parseInt(tab.find('[name="is_active"]:checked').val());
        data['on_sale'] = (tab.find('[name="on_sale"]').is(':checked') ? 1 : 0);
        data['visibility'] = tab.find('[name="visibility"]').val();
        data['condition'] = tab.find('[name="condition"]').val();
        data['available_for_order'] = (tab.find('[name="available_for_order"]:checked').length ? 1 : 0);
        data['show_price'] = (tab.find('[name="show_price"]:checked').length ? 1 : 0);
        data['online_only'] = (tab.find('[name="online_only"]:checked').length ? 1 : 0);
        data['delete_product'] = (tab.find('[name="delete_product"]:checked').length ? 1 : 0);
        setAllProducts(data, 'active');
    });

    $('#setManufacturerAllProduct').live('click', function () {
        var tab = $('#tab5');
        var data = {};
        data['id_manufacturer'] = parseInt(tab.find('[name="id_manufacturer"]').val());
        setAllProducts(data, 'manufacturer');
    });

    $('#setAccessoriesAllProduct').live('click', function () {
        var tab = $('#tab6');
        var data = {};
        data['accessories'] = [];
        tab.find('[name="accessories[]"] option').each(function () {
            data['accessories'].push({
                id: parseInt($(this).attr('value'))
            });
        });
        data['remove_old'] = parseInt(tab.find('[name=remove_old]:checked').val());
        setAllProducts(data, 'accessories');
    });

    $('#setSupplierAllProduct').live('click', function () {
        var tab = $('#tab7');
        var data = {};
        data['supplier'] = [];
        tab.find('[name="supplier[]"] option:selected').each(function () {
            data['supplier'].push(parseInt($(this).attr('value')));
        });
        data['id_supplier_default'] = tab.find('[name="id_supplier_default"]').val();
        data['suppliers_sr[]'] = tab.find('[name="suppliers_sr[]"]').val();
        data['supplier_reference'] = tab.find('[name="supplier_reference"]').val();
        data['product_price'] = tab.find('[name="product_price"]').val();
        data['product_price_currency'] = tab.find('[name="product_price_currency"]').val();
        data['combinations'] = $.getAllValues();
        setAllProducts(data, 'supplier');
    });

    $('#setSpecificPriceAllProduct').live('click', function () {
        var tab = $('#tab8');
        var data = {};
        data['action_for_sp'] = tab.find('[name="action_for_sp"]:checked').val();
        data['sp_from_quantity'] = tab.find('[name="sp_from_quantity"]').val();
        data['sp_id_currency'] = tab.find('[name="sp_id_currency"]').val();
        data['sp_id_country'] = tab.find('[name="sp_id_country"]').val();
        data['sp_id_group'] = tab.find('[name="sp_id_group"]').val();
        data['sp_from'] = tab.find('[name="sp_from"]').val();
        data['sp_to'] = tab.find('[name="sp_to"]').val();
        data['sp_reduction'] = tab.find('[name="sp_reduction"]').val();
        data['sp_reduction_type'] = tab.find('[name="sp_reduction_type"]').val();
        data['change_for'] = tab.find('[name="change_for_sp"]:checked').val();
        data['price'] = tab.find('[name="price"]').val();
        data['delete_old_discount'] = (tab.find('[name="delete_old_discount"]').is(':checked') ? 1 : 0);
        data['leave_base_price'] = (tab.find('[name="leave_base_price"]').is(':checked') ? 1 : 0);
        data['combinations'] = $.getAllValues();
        setAllProducts(data, 'discount');
    });

    $('#setFeaturesAllProduct').live('click', function () {
        var tab = $('#tab9');
        var data = {};

        if (typeof window.parent.frames['seosaextendedfeatures'] != 'undefined') {
            var contentWindow = window.parent.frames['seosaextendedfeatures'].contentWindow;

            var table_features = $('.table-features', contentWindow.document);
            table_features.trigger('change');
            table_features.find(':input:not(button)').each(function () {
                var original_name = $(this).attr('name');
                if (original_name.match(/\[custom\]/)) {
                    var values = contentWindow.angular.element($('[name="'+original_name+'"]', contentWindow.document)).scope().values;
                    var match = original_name.match(/\[[a-zA-Z]+\]$/);
                    var name = original_name.replace(match[0], '');
                    $.each(languages, function (index, l) {
                        data[name+'['+l.iso_code+']'] = (typeof values[l.id_lang] != 'undefined' ? values[l.id_lang] : '');
                    });
                } else {
                    data[$(this).attr('name')] = $(this).val();
                }
            });
        } else {
            $('.table-features').trigger('change');
            tab.find(':input:not(button)').each(function () {
                data[$(this).attr('name')] = $(this).val();
            });
        }
        setAllProducts(data, 'features');
    });

    $('#setDeliveryAllProduct').live('click', function () {
        var tab = $('#tab10');
        var data = {};
        tab.find('input[type=text], input[type=checkbox]:checked').not('button').each(function () {
            data[$(this).attr('name')] = $(this).val();
        });
        data['combinations'] = $.getAllValues();
        data['weight_change_for_combination'] = tab.find('[name="weight_change_for_combination"]:checked').val();
        setAllProducts(data, 'delivery');
    });

    $('#setImageAllProduct').live('click', function () {
        var tab = $('#tab11');
        tab.addClass('loading');
        var images = new FormData();
        images.append('action', 'upload_images');
        images.append('ajax', true);
        tab.find('input[name="image[]"]').each(function (index, value) {
            images.append('image['+index+']', $(this).get(0).files[0]);
        });
        $.ajax({
            url: document.location.href,
            type: 'POST',
            processData: false,
            contentType: false,
            dataType: 'json',
            data: images,
            success: function (r)
            {
                var data = {};
                data['responseImages'] = r.responseImages;
                data['combinations'] = $.getAllValues();
                data['change_for'] = parseInt(tab.find('[name="change_for"]:checked').val());
                data['delete_images'] = (tab.find('[name=delete_images]').is(':checked') ? 1 : 0);
                tab.find('[name^=legend_]').each(function() {
                    data['legend_' + $(this).data('lang')] = $(this).val();
                });
                data['position'] = tab.find('[name="id_caption"]').val();
                data['delete_captions'] = (tab.find('[name=delete_captions]').is(':checked') ? 1 : 0);

                setAllProducts(data, 'image', function () {
                    tab.removeClass('loading');
                });
            },
            error: function ()
            {
                tab.removeClass('loading');
            }
        });
    });

    $('#setDescriptionAllProduct').live('click', function () {
        var tab = $('#tab12');
        var data = {};
        data['description'] = tab.find('[name=description]').val();
        data['description_short'] = tab.find('[name=description_short]').val();
        data['language'] = tab.find('[name=language]:checked').val();
        data['product_name'] = tab.find('[name=name]').val();
        console.log(data);
        setAllProducts(data, 'description');
    });

    $('#setAttachmentAllProduct').live('click', function () {
        var tab = $('#tab14');
        var data = {};
        data['attachments'] = [];
        tab.find('[name="attachments[]"] option').each(function () {
            data['attachments'].push($(this).attr('value'));
        });
        data['old_attachment'] = (tab.find('[name="old_attachment"]').is(':checked') ? 1 : 0);
        setAllProducts(data, 'attachment');
    });


    $('#setRuleCombinationAllProduct').live('click', function () {
        var tab = $('#tab13');
        var data = {};

        var selected_attributes = $('[name=selected_attributes]').val();
        selected_attributes = (selected_attributes ? selected_attributes.split('|') : []);
        var attrs = [];
        $.each(selected_attributes, function (index, value) {
            var value_arr = value.split('_');
            attrs.push(value_arr[1]);
        });

        data['exact_match'] = (tab.find('[name=exact_match]:checked').length ? 1 : 0);
        data['selected_attributes'] = attrs;
        data['delete_attribute'] = $('.delete_attribute:visible [name="delete_attribute"]').val();
        data['add_attribute'] = $('.add_attribute:visible [name="add_attribute"]').val();
        data['force_delete_attribute'] = ($('[name="force_delete_attribute"]:checked').length ? 1 : 0);
        setAllProducts(data, 'rule_combination');
    });

    $('#advanced_stock_management').live('click', function()
    {
        var val = 0;
        if ($(this).prop('checked'))
            val = 1;

        // self.ajaxCall({actionQty: 'advanced_stock_management', value: val});
        if (val == 1)
        {
            $(this).val(1);
            $('#depends_on_stock_1').attr('disabled', false);
        }
        else
        {
            $(this).val(0);
            $('#depends_on_stock_1').attr('disabled', true);
            $('#depends_on_stock_0').attr('checked', true);
            // self.ajaxCall({actionQty: 'depends_on_stock', value: 0});
            // self.refreshQtyAvailabilityForm();
        }
        // self.refreshQtyAvailabilityForm();
    });

    $('#setAdvancedStockManagementAllProduct').live('click', function () {
        var tab = $('#tab15');
        var data = {};
        data['advanced_stock_management'] = (tab.find('[name=advanced_stock_management]').prop('checked')) ? 1 : 0;
        data['depends_on_stock'] = tab.find('[name=depends_on_stock]:checked').val();
        setAllProducts(data, 'advanced_stock_management');
    });

    $('#setMetaAllProduct').live('click', function () {
        setTimeout(function () {
            var tab = $('#tab16');
            var tags = tab.find('[name=tags]').val();
            var tag_no_enter = $('.tagify-container').find('input').val();
            if(tags && tag_no_enter)
                tags += ','+tag_no_enter;
            else if (tag_no_enter)
                tags = tag_no_enter;
            var data = {};
            data['meta_title'] = tab.find('[name=meta_title]').val();
            data['meta_description'] = tab.find('[name=meta_description]').val();
            data['meta_keywords'] = tab.find('[name=meta_keywords]').val();
            data['tags'] = tags;
            data['edit_tags'] = tab.find('[name=edit_tags]:checked').val();
            data['language'] = tab.find('[name=language_meta]:checked').val();
            setAllProducts(data, 'meta');
        }, 300)
    });

    $('#setReferenceAllProduct').live('click', function () {
        var tab = $('#tab17');
        var data = {};
        data['reference']= tab.find('[name="reference"]').val();
        data['ean13']= tab.find('[name="ean13"]').val();
        data['upc'] = tab.find('[name="upc"]').val();
        data['change_for_property']= tab.find('[name="change_for_property"]:checked').val();
        data['combinations'] = $.getAllValues();
        setAllProducts(data, 'reference');
    });

    $('#setCustomizationAllProduct').live('click', function () {
        var tab = $('#tab19');
        var data = {};

        tab.find('[name^="label_"]').each(function () {
            var elem = $(this);
            var input_name = elem.attr('name').replace('_', '[').split('_').join('][')+']';

            if (elem.is('[type=text]')) {
                data[input_name] = elem.val();
            }
            if (elem.is('[type=checkbox]')
            && elem.is(':checked')) {
                data[input_name] = elem.val();
            }
        });

        data['delete_customization_fields'] = (tab.find('[name="delete_customization_fields"]:checked').length ? 1 : 0);

        setAllProducts(data, 'customization');
    });

    $('#createProducts').live('click', function (){
        var tab = $('#tab18');
        var data = {};
        for(var i in languages) {
            data['name_'+languages[i].id_lang] = tab.find('[name="name_'+languages[i].id_lang+'"]').val();
        }
        data.attribute = tab.find('[name="attribute"]').val();
        var categories = [];
        tab.find('[name="categoryBox[]"]:checked').each(function () {
            categories.push($(this).val());
        });
        data.categoryBox = categories;
        data.id_category_default = tab.find('[name="id_category_default"]').val();
        data.unit_price = tab.find('[name="unit_price"]').val();
        setAllProducts(data, 'createProducts');
    });

    $('.product_checkbox').live('click', function () {
        var tr = $(this).closest('tr');
        if ($(this).is(':checked'))
        {
            tr.addClass('selected');
            popup_form.selectProduct({
                id: tr.find('[name=id_product]').val(),
                name: tr.find('[data-name]').text()
            });
            popup_form.mergeProducts();
        }
        else
        {
            tr.removeClass('selected');
            popup_form.unselectProduct(tr.find('[name=id_product]').val());
        }
    });
    $('[name="supplier[]"]').live('change', function () {
        $('[name="id_supplier_default"]').html('');
        $(this).find('option:selected').each(function () {
            $('[name="id_supplier_default"]').append($(this).clone());
        });
    });
    checkURL();
    window.popup_form = new PopupForm('.popup_mep');
    window.popup_form.init();
    window.tab_container = new TabContainer('.tab_container');
    window.tab_container.init();

    $('.selectAll').live('click', function () {
        $('.table_search_product .product_checkbox').each(function () {
            var tr = $(this).closest('tr');
            tr.addClass('selected');
            popup_form.selectProduct({
                id: tr.find('[name=id_product]').val(),
                name: tr.find('[data-name]').text()
            });
        });
        popup_form.mergeProducts();
    });

    $('[name="type_search"]').live('change', function () {
        if (parseInt($(this).val()) != 1)
            $('.search_product_name').show();
        else
            $('.search_product_name').hide();
    });

    $('.add_image').live('click', function () {
        $('.images').append($('#image_row').html());
    });
    $('.images').append($('#image_row').html());

    $('[name=available_for_order]').live('change', function () {
        if ($(this).is(':checked'))
            $('[name=show_price]').attr('checked', 'checked').attr('disabled', 'disabled');
        else
            $('[name=show_price]').removeAttr('disabled');
    });


    $('.disable_option').live('change', disableOption);
    $('.disable_option').each(disableOption);
    function disableOption()
    {
        var checked = $(this).is(':checked');
        if ($(this).is('[type=radio]'))
        {
            if (parseInt($('[name="'+$(this).attr('name')+'"]:checked').val()) == 1)
                checked = true;
            else
                checked = false;
        }

        if (checked)
            $(this).closest('.row').addClass('disabled_option_stage');
        else
            $(this).closest('.row').removeClass('disabled_option_stage');
    }

    $('[name="attribute_group"]').live('change', function () {
        var row = $(this).closest('.row_attributes');
        row.find('div[id^="attribute_group_"]').hide();
        row.find('[id="attribute_group_'+$(this).val()+'"]').show();
    }).trigger('change');

    $('.removeRowAttributes').live('click', function () {
        var selected_attributes = $('[name=selected_attributes]').val();
        selected_attributes = (selected_attributes ? selected_attributes.split('|') : []);
        var attr = $(this).closest('').data('key');
        var key = $.inArray(attr, selected_attributes)
        if (key == -1)
        {
            selected_attributes.splice(key, 1);
            $('[name=selected_attributes]').val(selected_attributes.join('|'));
            $(this).closest('.selected_attribute').remove();
        }
        else
            alert('Not exists key!');
    });

    $('.addAttribute').live('click', function (e) {
        e.preventDefault();
        var selected_attributes = $('[name=selected_attributes]').val();
        selected_attributes = (selected_attributes ? selected_attributes.split('|') : []);
        var row_attributes = $(this).closest('.row_attributes');

        var id_attribute_group = row_attributes.find('[name=attribute_group]').val();
        var id_attribute = row_attributes.find('#attribute_group_'+id_attribute_group+' [name=attributes]').val();

        var group_name = row_attributes.find('[name=attribute_group] option:selected').text();
        var attr_name = row_attributes.find('#attribute_group_'+id_attribute_group+' [name=attributes] option:selected').text();

        var attr = id_attribute_group+'_'+id_attribute;
        if ($.inArray(attr, selected_attributes) != -1 || $('[data-key^="'+id_attribute_group+'_"]').length)
        {
            alert(text_already_exists_attribute);
            return false;
        }
        selected_attributes.push(attr);
        $('[name=selected_attributes]').val(selected_attributes.join('|'));
        $('.selected_attributes').append('<div class="selected_attribute row">' +
            '<div class="col-lg-10 col-sm-10">'
            +group_name
            +':'+attr_name
            + '</div><div class="col-lg-2 col-sm-2"><a data-key="'+attr+'" class="removeRowAttributes btn btn-danger"><i class="icon-remove"></a></div>'
            +'</div>');
    });

    $('.view_more_features').live('click', function (e) {
        e.preventDefault();
        var self = $(this);
        if (self.is('.off'))
            return false;
        var page = feature_pages.shift();
        self.addClass('off');
        $.ajax({
            url: document.location.href.replace(document.location.hash, ''),
            type: 'POST',
            dataType: 'json',
            data: {
                ajax: true,
                action: 'load_features',
                p: page
            },
            success: function (r) {
                self.removeClass('off');
                if (!r.hasError)
                {
                    $('.list_features').append(r.features_list);
                    initLanguages();
                    $('.disable_option').trigger('change');
                    var counter = self.find('.counter');
                    counter.text(parseInt(counter.text()) - count_feature_view);
                }
                else
                {
                    feature_pages.unshift(page);
                }
                if (!feature_pages.length)
                    self.remove();
            },
            error: function ()
            {
                self.removeClass('off');
                feature_pages.unshift(page);
            }
        });
    });

    $('[data-attachment-file] input').live('change', function () {
        $('.message_error').html('').hide();
        var self = $(this);
        var tab = $('#tab14');

        var filename = tab.find('[name="filename_'+id_language+'"]').val();

        if (!filename)
        {
            alert(text_filename_empty);
            clearInput();
            return false;
        }
        var file = self.get(0).files[0];

        var data = new FormData();
        data.append('file', file);

        $.each(languages, function (id_lang, lang) {
            data.append('filename_' + lang.id_lang, tab.find('[name="filename_'+lang.id_lang+'"]').val());
            data.append('description_' + lang.id_lang, tab.find('[name="description_'+lang.id_lang+'"]').val());
        });

        data.append('action', 'download_attachment');
        data.append('ajax', true);

        $.ajax({
            url: document.location.href.replace(document.location.hash, ''),
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                if (typeof data.error != 'undefined' && data.error.length)
                {
                    $('.message_error').html(data.error.join('<br>')).slideDown(500);
                }
                else
                {
                    tab.find('[name^="filename_"], [name^="description_"]').val("");
                    $('.select_attachments .no_selected_product')
                        .append('<option value="' + data.id_attachment + '">' + data.filename + '</option>');
                }
            }
        });

        function clearInput()
        {
            self.replaceWith(self.clone());
        }
    });

    $('[name="change_type"]').live('change', function () {
        $('._type').removeClass('hide_option').hide();
        $('.type_'+ $(this).val()).show();
    });
    $('._type').addClass('hide_option');

    $('._row_copy').rowCopy();

    $('[name=action_with_category]').live('change', function () {
        $('._action').hide();
        if (!parseInt($(this).val()))
            $('._action_add').show();
    });

    $('[name=action_with_category]:checked').trigger('change');

    $('.leave_base_price').live('change', function () {
        if ($(this).is(':checked'))
            $('.specific_price_price').attr('disabled', true).val(-1);
        else
            $('.specific_price_price').removeAttr('disabled').val(0);
    });

    $.changeLanguage(id_language);

    $('[data-feature-values]').each(function () {
        var self = $(this);
        self.addClass('_loading');
        $.ajax({
            url: document.location.href.replace('#'+document.location.hash, ''),
            type: 'POST',
            dataType: 'json',
            data: {
                ajax: true,
                action: 'render_feature_values',
                id_feature: self.data('feature-values')
            },
            success: function (json) {
                self.removeClass('_loading').html(json.html);
            }
        });
    });

    $('[name="feature_group"]').live('change', function () {
        $('[data-feature-values]').hide();
        $('[data-feature-values="'+$(this).val()+'"]').show();
    }).trigger('change');

    function addCustomizationField(type)
    {
        var counter = $('[data-customization-field="'+type+'"]').length;
        $.ajax({
            url: ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                ajax: true,
                action: 'add_customization_field',
                type: type,
                counter: counter
            },
            success: function (json) {
                $('#customization_fields_'+type).append(json.html);
                $.triggerChangeLang();
            }
        });
    }

    $('.addFileLabel').live('click', function () {
        addCustomizationField(0);
    });
    $('.addTextLabel').live('click', function () {
        addCustomizationField(1);
    });
});


$(function()
{
    $('.editor_html').redactor({
        buttonSource: true,
        imageUpload: upload_image_dir,
        fileUpload: upload_file_dir,
        plugins: ['table', 'video']
    });
});

function setAllProducts(data, field, afterUpdate)
{
    $('.message_successfully').hide();
    $('.message_error').hide();
    var table = $('.table_selected_products tbody');
    var url = document.location.href.replace(document.location.hash, '');
    data['products'] = popup_form.products;
    data['ajax'] = true;
    data['change_date_upd'] = parseInt($('[name="change_date_upd"]:checked').val());
    data['reindex_products'] = parseInt($('[name="reindex_products"]:checked').val());
    data['action'] = 'api';
    data['method'] = 'set_'+field+'_all_product';

    data['disabled'] = [];

    $('[name^="disabled"]:checked').each(function () {
        if ($(this).is('[type="checkbox"]'))
        {
            if ($(this).val().indexOf(',') != -1)
            {
                var values = $(this).val().split(',');
                $.each(values, function (index, value) {
                    data['disabled'].push(value);
                });
            }
            else
            {
                data['disabled'].push($(this).val());
            }
        }

        if ($(this).is('[type="radio"]'))
        {
            if ($(this).val() == 0)
            {
                if (typeof data['disabled[feature]'] == 'undefined')
                    data['disabled[feature]'] = [];
                data['disabled[feature]'].push(parseInt($(this).data('feature')));
            }
        }
    });

    var timeout_success = null;
    if (timeout_success != null)
        clearTimeout(timeout_success);

    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function (r)
        {
            if (typeof afterUpdate != 'undefined')
                afterUpdate();
            if (!r.hasError)
            {
                $('.message_successfully').stop(true, true).slideDown(500);
                timeout_success = setTimeout(function () {
                    $('.message_successfully').stop(true, true).slideUp(300);
                }, 3000);

                if (field == 'discount')
                    field = 'price';

                if (typeof r.delete_products != 'undefined')
                {
                    $.each(r.delete_products, function (index, id_product) {
                        window.popup_form.removeProduct(id_product);
                    });
                    $('#beginSearch').trigger('click');
                }

                for (var i in r.products)
                {
                    if (field == 'active' || field == 'stock_management')
                        table.find('.product_' + i + ' [data-'+field+'] img').attr('src', (r.products[i] ? '../img/admin/enabled.gif' : '../img/admin/disabled.gif'));
                    else if (field == 'price')
                    {
                        table.find('.product_' + i + ' [data-'+field+']').text(r.products[i].price);
                        table.find('.product_' + i + ' [data-'+field+'_final]').text(r.products[i].price_final);
                    }
                    else if (field == 'accessories' || field == 'discount' || field == 'features')
                    {

                    }
                    else
                        table.find('.product_' + i + ' [data-'+field+']').text(r.products[i]);
                }

                if (field == 'price')
                {
                    for (var i in r.combinations)
                    {
                        $('[data-pa-price="'+i+'"]').text(r.combinations[i].price);
                        $('[data-pa-total-price="'+i+'"]').text(r.combinations[i].total_price);
                        $('[data-pa-price-final="'+i+'"]').text(r.combinations[i].price_final);
                        $('[data-pa-total-price-final="'+i+'"]').text(r.combinations[i].total_price_final);
                    }
                }
                if (field == 'quantity')
                {
                    for (var i in r.combinations)
                    {
                        $('[data-pa-quantity="'+i+'"]').text(parseInt(r.combinations[i]));
                    }
                }
                if (field == 'reference')
                {
                    for (var i in r.ids_product)
                    {
                        $('tr.product_'+r.ids_product[i]+' [data-reference]').text(r.reference);
                    }
                }
            }
            else
            {
                var error_mesage = [];
                $.each(r.log, function (index, log) {
                    if (log.type == 'error')
                        error_mesage.push(log.message);
                });
                $('.message_error').html(error_mesage.join('<br>')).slideDown(500);
            }
        },
        error: function (r) {
            $('.message_error').html(r.responseText).slideDown(500);
        }
    });
}

function checkURL()
{
    var hash = document.location.hash;
    var data = hash.replace('#', '').split('&');
    for (var i = 0; i < data.length; i++)
        data[i] = decodeURIComponent(data[i]);
    for (var i in data)
    {
        var param = data[i].split('-');
        if (param[0] == 'categories')
        {
            $.each(param[1].split('_'), function (index, value)
            {
                window.tree.checkAssociatedCategory(value);
            });
        }
        else if(param[0] == 'manufacturers')
        {
            var manufacturers = $('[name="manufacturers[]"]');
            $.each(param[1].split('_'), function (index, value)
            {
                manufacturers.find('option[value='+value+']').attr('selected', 'selected');
            });
        }
        else if(param[0] == 'suppliers')
        {
            var suppliers = $('[name="supplier[]"]');
            $.each(param[1].split('_'), function (index, value)
            {
                suppliers.find('option[value='+value+']').attr('selected', 'selected');
            });
        }
        else if(param[0] == 'search_query')
        {
            $('[name=search_query]').val(param[1]);
        }
        else if(param[0] == 'qty_from')
        {
            $('[name=qty_from]').val(param[1]);
        }
        else if(param[0] == 'qty_to')
        {
            $('[name=qty_to]').val(param[1]);
        }
        else if(param[0] == 'type_search')
        {
            var type_search = $('[name=type_search]');
            type_search.find('option').removeAttr('selected');
            type_search.find('option[value='+param[1]+']').attr('selected', 'selected');
        }
        else if(param[0] == 'product_name_type_search')
        {
            var product_name_type_search = $('[name=product_name_type_search]');
            product_name_type_search.removeAttr('checked');
            $('[name=product_name_type_search][value='+param[1]+']').attr('checked', 'checked');
        }
        else if(param[0] == 'how_many_show')
        {
            var how_many_show = $('[name=how_many_show]');
            how_many_show.find('option').removeAttr('selected');
            how_many_show.find('option[value='+param[1]+']').attr('selected', 'selected');
        }
        else if(param[0] == 'active')
        {
            var active = $('[name=active]');
            active.removeAttr('checked');
            $('[name=active][value='+param[1]+']').attr('checked', 'checked');
        }
        else if(param[0] == 'disable')
        {
            var disable = $('[name=disable]');
            disable.removeAttr('checked');
            $('[name=disable][value='+param[1]+']').attr('checked', 'checked');
        }
        else if(param[0] == 'page')
        {
            window.page = param[1];
        }
    }

    if (data.length)
        $('#beginSearch').trigger('click');
}

function setPage(page)
{
    window.page = page;
    page = 'page-' + page;
    var hash = document.location.hash.replace('#', '');
    if (!hash.length)
        document.location.hash = page;
    else
    {
        var old_page = /page-[0-9]+/.exec(hash);
        if (old_page)
        {
            hash.replace(old_page[0], page);
        }
        else
        {
            hash += '&' + page;
        }
        document.location.hash = page;
    }
    checkURL();
}

function createListPositionsForImageCaption(obj)
{
    if($('input[value="disable_image_caption"]').prop("checked"))
        return;
    $('[value="disable_image_caption"]').closest('div').addClass('loading');
    var data = {};
    data['products'] = obj.products;
    data['ajax'] = true;
    data['action'] = 'getMaxPositionForImageCaption';

    $.ajax({
        url: document.location.href,
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function (r) {
            $('#caption_selection > select').find('option:gt(0)').remove();
            $('#caption_selection > select').append(r.option);
            $('[value="disable_image_caption"]').closest('div').removeClass('loading');
            return;
        }
    });
}

$(document).ready(function(){
    $('input[value="disable_image_caption"]').change(function () {
        if($('input[value="disable_image_caption"]').prop("checked") == false)
            createListPositionsForImageCaption(window.popup_form);
    });
});

$(document).ready(function(){
    $(".tab-menu").click(function(){
        $(".tab_container li").slideToggle();
    });

    $(".tab_container li").click(function () {
        $(".tab_container .tabs > li").css('display', 'none');
    });

    return false;
});
$(document).ready(function(){
    $(".panel-heading span, .change_date_button").click(function () {
        $(".change_date_container").slideToggle();
    });
    $(".panel-heading span, .change_date_button").click(function () {
        $(".change_date_button i").toggleClass('icon-minus');
    });

    $('[name="variable_feature"]').trigger('click');
});

$(document).ready(function(){
    $('input.search_category:first').focus({el:$('.tree_categories.tree_root:first input.tree_input')}, function(eventObj){
        eventObj.data.el.each(function(){
            $(this).attr('data-search', $(this).data('name').toLowerCase());
        });
    });

    $('.select2').select2();

    $('.tabs_content').on('change', '[name="action_for_sp"]', function () {
        var disabled = $('[name="sp_from_quantity"], [name="sp_reduction"], [name="price"], [name="leave_base_price"], [name="sp_reduction_type"]');
        var enabled = disabled;
        if($('[name="leave_base_price"]').prop("checked"))
            enabled = enabled.not('[name="price"]');
        $(this).val() == 1 ? disabled.attr('disabled', true) : enabled.attr('disabled', false);
    });

    $('input[name="change_for"]').on('change', {product:change_product, combination:change_combination},function(event){
        var value = event.data.product;
        if($('#change_for_combination').prop('checked'))
            value = event.data.combination;

        var row = $(this).closest('.row').next();
        row.find('.control-label').text(value.title);
        row.find('label[for="type_price_base"]').find('span').text(value.base);
        row.find('label[for="type_price_final"]').find('span').text(value.final);
    });
});

$(document).ready(function(){
    $('.start_select_combinations').live('click', function () {
        event.preventDefault();
        var data = {};
        data['ajax'] = true;
        data['action'] = 'get_combinations_by_attributes';
        $('.panel.mode_edit .attribute_group_block').each(function (index) {
            data['data['+index+']'] = {'attribute':$(this).find('.select_attribute').val(),
                'value': $(this).find('.select_attribute_value').val()
            };
        });

        $.ajax({
            url: document.location.href.replace(document.location.hash, ''),
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (r) {
                if(r.hasError) {
                    alert(r.error);
                } else{
                    $('input[data-selector-item]').each(function (index, value) {
                        var selector_item_combination = $(this).data('selector-item').split('_');
                        for(var i in r.data) {
                            if(selector_item_combination[1] == r.data[i].id_product_attribute) {
                                $(this).prop('checked', true);
                            }
                        }
                    });
                    updateCountSelectedCombinations();
                }
            }
        });
    });

    $('.select_attribute').live('change', function () {
        var data = {};
        data['ajax'] = true;
        data['action'] = 'get_attributes_by_group';
        data['group'] = $(this).val();
        $(this).closest('.attribute_group_block').find('div:nth-child(2)').addClass('loading');
        $.ajax({
            url: document.location.href.replace(document.location.hash, ''),
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function (r) {
                if(r.hasError) {
                    alert(r.error);
                } else{
                    var option = '';
                    for(var i in r.data){
                        option += '<option value="'+r.data[i].id_attribute+'">'+r.data[i].name+'</option>';
                    }
                    $('.select_attribute_value').html(option);
                }
                $('.select_attribute').closest('.attribute_group_block').find('div:nth-child(2)').removeClass('loading');
            },
        });
    });

    $('.check_attribute_combinations').live('click', function () {
        event.preventDefault();
        $('.panel.mode_edit #attributes_select').toggle(200);
    });

    $('th[data-combinations] > a').live('click', function () {
        event.preventDefault();
        $('.select_combinations').toggle(200);
    });

    $('.check_all_combinations').live('click', function () {
        event.preventDefault();
        $('input[data-selector-item]').prop('checked', true);
        updateCountSelectedCombinations();
    });

    $('.uncheck_all_combinations').live('click', function () {
        event.preventDefault();
        $('input[data-selector-item]').prop('checked', false);
        updateCountSelectedCombinations();
    });
});

function updateCountSelectedCombinations() {
    $.each($.fn.SelectorContainers, function () {
        this.updateContainer();
    });
    return false;
}
