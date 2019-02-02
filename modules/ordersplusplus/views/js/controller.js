/**
*  Copyright (C) Prestalia - All Rights Reserved
*
*  Unauthorized copying of this file, via any medium is strictly prohibited
*  Proprietary and confidential
*
*  @author    Prestalia <prestalia.it>
*  @copyright 2015-2016 Prestalia
*  @license   Closed source, proprietary software
*/

$(document).ready(function() {
    $("#opp-category-save").addClass("opp-save-filter");
    $("#opp-category-reset").addClass("opp-reset-filter");
    $(".opp-order-status[style]").each(function() {
        $back = $(this).css("background-color");
        $(this).removeAttr("style");
        $(this).parent().parent().parent().css("background-color", $back);
    });
    $(".opp-tooltip").tooltip();
    $(".opp-tooltip-img").tooltip({
        content: function() {
            return '<img src="' + $(this).attr("title") + '"/>';
        }
    });

    $('#product_autocomplete_input')
        .autocomplete('ajax_products_list.php', {
            minChars: 1,
            autoFill: true,
            max:20,
            matchContains: true,
            mustMatch: true,
            scroll: false,
            cacheLength: 0,
            formatItem: function(item) {
                return item[1]+' - '+item[0];
            }
      }).result(addFilterOrdersProducts);

    $('#product_autocomplete_input').setOptions({
        extraParams: {
            excludeIds : getFilterOrdersProductsIds()
        }
    });

    if (typeof($('#inputProducts').val()) != 'undefined' && $("#inputProducts").val() != "") {
        var ids = $("#inputProducts").val().split("-");
        var names = $("#nameProducts").val().split("¤");

        $.each(names, function(key, val) {
            $('#divProductsFilter').append(val + ' <span class="delProductIds" name="' + ids[key] + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span><br />');
        });
    }

    $('#divProductsFilter').delegate('.delProductIds', 'click', function(){
        delProductIds($(this).attr('name'));
    });

    excludeCategoriesSetInitialState();

    $('#opp-categories-tree .tree-folder-name input[type="checkbox"]').change(function() {
        oppCategoryTreeToggleSubcats($(this).prop('checked'), $(this).parent().next('.tree'));
    });

});

function filterByCategories(id_shop, id_employee, title, message, error) {
    var categories = [];
    $("#opp-categories-tree input:checked").each(function() {
        categories.push($(this).val());
    });
    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        success: function(data) {
            if (data.status == "success") {
                $.growl.notice({
                    title: title,
                    message: message
                });
                window.location.replace(data.redirect);
            } else {
                $.growl.error({
                    title: error,
                    message: data.msg
                });
            }
        },
        url: "../modules/ordersplusplus/ajax/filterByCategories.php",
        data: {
            categories       : categories,
            id_shop          : id_shop,
            id_employee      : id_employee,
            exclude_unchecked: oppExcludeCategories,
            redirect         : window.location.href
        }
    });
}

function filterByCustomerGroup(id_shop, id_employee, title, message, error) {
    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        success: function(data) {
            if (data.status == "success") {
                $.growl.notice({
                    title: title,
                    message: message
                });
                window.location.replace(data.redirect);
            } else {
                $.growl.error({
                    title: error,
                    message: data.msg
                });
            }
        },
        url: "../modules/ordersplusplus/ajax/filterByCustomerGroup.php",
        data: {customer_group: $("#opp-customer-group").val(), id_shop: id_shop, id_employee: id_employee, redirect: window.location.href}
    });
}

function filterByProduct(id_shop, id_employee, title, message, error) {
    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        success: function(data) {
            if (data.status == "success") {
                $.growl.notice({
                    title: title,
                    message: message
                });
                window.location.replace(data.redirect);
            } else {
                $.growl.error({
                    title: error,
                    message: data.msg
                });
            }
        },
        url: "../modules/ordersplusplus/ajax/filterByProduct.php",
        data: {ids: $("#inputProducts").val(), names: $("#nameProducts").val(), id_shop: id_shop, id_employee: id_employee, redirect: window.location.href}
    });
}

function resetFilter(filter, id_shop, id_employee, title, message, error) {
    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        success: function(data) {
            if (data.status == "success") {
                $.growl.warning({
                    title: title,
                    message: message
                });
                window.location.replace(data.redirect);
            } else {
                $.growl.error({
                    title: error,
                    message: data.msg
                });
            }
        },
        url: "../modules/ordersplusplus/ajax/resetFilter.php",
        data: {filter: filter, id_shop: id_shop, id_employee: id_employee, redirect: window.location.href}
    });
}

function getSelectedOrders()
{
    var out = "";

    $('input[name="orderBox[]"]').each(function() {
        if ($(this).prop('checked')) {
            out += $(this).prop('value') + "|";
        }
    });

    return out;
}

function changeOrderState(id_shop, id_employee, title, message, error) {
    var orders = getSelectedOrders();

    if (orders != "") {
        $.ajax({
            type: "POST",
            dataType: "json",
            cache: false,
            success: function(data) {
                if (data.status == "success") {
                    $.growl.notice({
                        title: title,
                        message: message
                    });
                    window.location.replace(data.redirect);
                } else {
                    $.growl.error({
                        title: error,
                        message: data.msg
                    });
                }
            },
            url: "../modules/ordersplusplus/ajax/changeOrderState.php",
            data: {new_state: $("#opp-dest-order-state").val(), orders: orders, id_shop: id_shop, id_employee: id_employee, redirect: window.location.href}
        });
    }
}

function changeCarrier(id_shop, id_employee, title, message, error) {
    var orders = getSelectedOrders();

    if (orders != "") {
        $.ajax({
            type: "POST",
            dataType: "json",
            cache: false,
            success: function(data) {
                if (data.status == "success") {
                    $.growl.notice({
                        title: title,
                        message: message
                    });
                    window.location.replace(data.redirect);
                } else {
                    $.growl.error({
                        title: error,
                        message: data.msg
                    });
                }
            },
            url: "../modules/ordersplusplus/ajax/changeCarrier.php",
            data: {
                new_carrier: $("#opp-dest-carrier").val(),
                new_weight: $("#opp-dest-shipping-weight").val(),
                orders: orders,
                id_shop: id_shop,
                id_employee: id_employee,
                redirect: window.location.href
            }
        });
    }
}

function delProductIds(id)
{
    var div = getE('divProductsFilter');
    var input = getE('inputProducts');
    var name = getE('nameProducts');

    // Cut hidden fields in array
    var inputCut = input.value.split('-');
    var nameCut = name.value.split('¤');

    if (inputCut.length != nameCut.length)
        return jAlert('Bad size');

    // Reset all hidden fields
    input.value = '';
    name.value = '';
    div.innerHTML = '';
    for (var i in inputCut) {
        // If empty, error, next
        if (!inputCut[i] || !nameCut[i])
            continue ;

        // Add to hidden fields no selected products OR add to select field selected product
        if (inputCut[i] != id) {
            input.value += inputCut[i] + '-';
            name.value += nameCut[i] + '¤';
            div.innerHTML += nameCut[i] + ' <span class="delProductIds" name="' + inputCut[i] + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span><br />';
        }
        else
            $('#selectAccessories').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
    }

    $('#product_autocomplete_input').setOptions({
        extraParams: {excludeIds : getFilterOrdersProductsIds()}
    });
}

function getFilterOrdersProductsIds(id_product)
{
    if (typeof($('#inputProducts').val()) == 'undefined' || $('#inputProducts').val() == "") {
        return '-1';
    }

    var ids = id_product + ',';
    ids += $('#inputProducts').val().replace(/\\-/g,',').replace(/\\,$/,'');
    ids = ids.replace(/\,$/,'');

    return ids;
}

function addFilterOrdersProducts(event, data, formatted)
{
    if (data == null)
        return false;
    var productId = data[1];
    var productName = data[0];

    var $divProductsFilter = $('#divProductsFilter');
    var $inputProducts = $('#inputProducts');
    var $nameProducts = $('#nameProducts');

    /* delete product from select + add product line to the div, input_name, input_ids elements */
    $divProductsFilter.html($divProductsFilter.html() + productName + ' <span class="delProductIds" name="' + productId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span><br />');
    $nameProducts.val($nameProducts.val() + productName + '¤');
    $inputProducts.val($inputProducts.val() + productId + '-');
    $('#product_autocomplete_input').val('');
    $('#product_autocomplete_input').setOptions({
        extraParams: {excludeIds : getFilterOrdersProductsIds()}
    });
}

function excludeCategoriesSetInitialState()
{
    var icon = $("#opp-category-exclude>i");

    if (typeof(oppExcludeCategories) != 'undefined' && oppExcludeCategories) {
        icon.switchClass("icon-check-empty", "icon-check-sign", 0);
    } else {
        icon.switchClass("icon-check-sign", "icon-check-empty", 0);
    }
}

function excludeCategoriesClick()
{
    var icon = $("#opp-category-exclude>i");

    if (!oppExcludeCategories) {
        icon.switchClass("icon-check-empty", "icon-check-sign", 0);
        oppExcludeCategories = 1;
    } else {
        icon.switchClass("icon-check-sign", "icon-check-empty", 0);
        oppExcludeCategories = 0;
    }
}

function oppDownloadPDF(link, action, id_order) {
    window.open(link + "&submitAction=" + action + "&id_order=" + id_order, "_self");
}

function oppCategoryTreeToggleSubcats(checked, tree)
{
    $(tree)
    .children('.tree-item')
    .children('.tree-item-name')
    .children('input[type="checkbox"]')
    .prop('checked', checked);

    $(tree)
    .children('.tree-folder')
    .children('.tree-folder-name')
    .children('input[type="checkbox"]')
    .prop('checked', checked);

    if (checked) {
        $(tree)
        .children('.tree-item')
        .children('.tree-item-name')
        .addClass('tree-selected');

        $(tree)
        .children('.tree-folder')
        .children('.tree-folder-name')
        .addClass('tree-selected');
    } else {
        $(tree)
        .children('.tree-item')
        .children('.tree-item-name')
        .removeClass('tree-selected');

        $(tree)
        .children('.tree-folder')
        .children('.tree-folder-name')
        .removeClass('tree-selected');
    }

    $(tree)
    .children('.tree-folder')
    .children('.tree').each(function() {
        oppCategoryTreeToggleSubcats(checked, $(this));
    });
}
