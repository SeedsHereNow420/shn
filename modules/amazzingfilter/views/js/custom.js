/**
*  2007-2017 PrestaShop
*
*  @author    Amazzing
*  @copyright Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*
* Override this file if you want to keep custom code after module upgrade
*
*/

function updateContentAfter(jsonData) {
	if (is_17) {
		// temporary fix for classic theme in 1.7
		var maxColorBoxes = 5;
		$('.js-product-miniature').each(function(){
			var $boxes = $(this).find('.variant-links').find('.color');
			if ($boxes.length > maxColorBoxes) {
				$boxes.eq(maxColorBoxes - 1).nextAll('.color').addClass('hidden');
				$(this).find('.variant-links').find('.js-count').html('+'+($boxes.length - maxColorBoxes));
			}
		});
	}
}
