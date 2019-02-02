/**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 */

var FSAU = FSAU || { };
FSAU.hash = '';

$(document).ready(function(){
    FSAU.anchor = window.location.hash;
    if (FSAU.anchor) {
        var refresh_url = false;
        for (var anchor in FSAU.product_urls) {
            if (anchor == FSAU.anchor) {
                if (!FSAU.product_urls.hasOwnProperty(anchor)) {
                    continue;
                }
                refresh_url = FSAU.product_urls[anchor];
            }
        }

        if (refresh_url) {
            prestashop.emit('updateProduct', { reason: { productUrl: refresh_url }});
        }
    }
});
