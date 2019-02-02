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
function updateBookmark(id_order, bookmark, title, error) {
    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        success: function(data) {
            if (data.status == "success") {
                $("#book" + bookmark + id_order + "enabled").toggleClass("hiddenBook");
                $("#book" + bookmark + id_order + "disabled").toggleClass("hiddenBook");
                $.growl.notice({
                    title: title,
                    message: ""
                });
            } else {
                $.growl.error({
                    title: error,
                    message: data.msg
                });
            }
        },
        url: "../modules/ordersplusplus/ajax/updateBookmark.php",
        data: {id_order: id_order, bookmark: bookmark},
    });
}
