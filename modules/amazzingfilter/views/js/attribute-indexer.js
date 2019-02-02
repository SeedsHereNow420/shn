/**
*  2007-2017 PrestaShop
*
*  @author    Amazzing
*  @copyright Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

$(window).on('load', function(){

    var indexationRequired = false,
        id_product = $('[name="form[id_product]"]').val();

    if (typeof displayFieldsManager != 'undefined') {
        /**
        * checkAccessVariations is called after generating/deleting combinations
        * inside displayFieldsManager.refresh
        * see /admin/themes/default/js/bundle/product/form.js and product-combinations.js
        **/
        var originalCheckAccessVariations = displayFieldsManager.checkAccessVariations;
        displayFieldsManager.checkAccessVariations = function() {
            runIndexer();
            return originalCheckAccessVariations();
        }
    }

    $('#accordion_combinations').on('click', '.delete', function(){
        indexationRequired = true;
    });

    $('#create-combinations, #delete-combinations').on('click', function(){
        indexationRequired = true;
    });

    function runIndexer() {
        if (indexationRequired) {
            $.ajax({
                url: af_ajax_action_path,
                data: 'action=IndexProduct&id_product='+id_product,
                dataType: 'json',
                success: function(r) {
                    console.dir('Combinations reindexed for product id='+r.indexed);
                    indexationRequired = false;
                }
            });
        }
    }

});
/* since 2.6.0 */
