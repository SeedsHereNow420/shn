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
function oppSaveNotes($id_order, title, error) {
    $.ajax({
        type: "POST",
        dataType: "json",
        cache: false,
        success: function(data) {
            if (data.status == "success") {
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
        url: "../modules/ordersplusplus/ajax/oppSaveNotes.php",
        data: {id_order: $id_order, notes: $("#oppNotes").val()},
    });
}
