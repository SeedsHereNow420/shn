jQuery(function($){
    load_qrcode();
    prestashop.on('quickViewLoaded', function (event) {
        load_qrcode();
    });
});
function load_qrcode(){
    $('.qrcode_drop').on('st.dropdown.shown', function(){
        var qr_link = $(this).find('.qrcode_link');
        if(qr_link.find('img').size()==0)
        {
            $('<img/>', {
                src: qr_link.attr('href')
            })
            .load(function() {
                qr_link.find('i').replaceWith($(this));
            });
        }
    });
}