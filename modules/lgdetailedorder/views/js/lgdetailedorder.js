/**
 *  Please read the terms of the CLUF license attached to this module(cf "licences" folder)
 *
 * @author    Línea Gráfica E.C.E. S.L.
 * @copyright Lineagrafica.es - Línea Gráfica E.C.E. S.L. all rights reserved.
 * @license   https://www.lineagrafica.es/licenses/license_en.pdf https://www.lineagrafica.es/licenses/license_es.pdf https://www.lineagrafica.es/licenses/license_fr.pdf
 */

function print(){
    var icons = document.getElementById('iconsPrintClose');
    var parent = icons.parentNode;
    parent.removeChild(icons);
    var printing = document.getElementById('detailedorderinfo').innerHTML;
    parent.appendChild(icons);
    print_window = window.open('about:blank');
    print_window.document.write(printing);
    print_window.window.print();
    print_window.window.close();
}

function getOrderDetail(id_order)
{
    $.ajax({
        url: 'index.php',
        type: 'post',
        cache: false,
        data: {
            'ajax': 1,
            'controller': 'AdminModules',
            'configure': 'lgdetailedorder',
            'module_name': 'lgdetailedorder',
            'action': 'getOrderDetails',
            'token': lgdetailedorder_token,
            'getOrderInfo': true,
            'id_order': id_order,
            'rand': new Date().getTime()
        },
        dataType: 'json',
        success: function(datos) {
            $('#detailedorderinfo').css('display','block');
            $('#detailedorderinfo').html(datos.html);
        },
    });
    return false;
}

function closeInfo()
{
    $('#detailedorderinfo').css('display','none');
}

$(document).ready(
    function() {

        var filas = $("table.order").find("tbody>tr");
        var numlines = filas.length;
        for (i=0;i<numlines;i++)
        {
            var z = 0;
            $(filas[i]).find('td').each (function() {
                z++;
                if (z == 2)
                {
                    var id_order = $(this).text();
                    $(this).html(id_order+'<img src="../modules/lgdetailedorder/views/img/info-icon.png" onmouseover="getOrderDetail('+id_order+');" style="width:21px; cursor:pointer;">');
                }
            });
        }

        $('#submitFilterorder').after('<div id="detailedorderinfo" class="printing lgwindow"></div>');
    }
);
