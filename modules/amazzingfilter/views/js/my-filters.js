/**
*  2015 Amazzing
*
*  @author    Amazzing
*  @copyright Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

$(document).ready(function(){
	var icon_minus_selector = '.'+af_classes['icon-minus'].replace(/ /g, '.');
	$(document).on('click', '.js-action', function(e){
		e.preventDefault();
	}).on('click', '.toggleFilterGroup', function(e){
		var $content = $(this).parent().next(),
			cls = $(this).attr('class'),
			$parent = $(this).closest('.my-filter-group'),
			topPos = $parent.offset().top,
			$closedSiblingsInRow = $('');
			$openSiblingsInRow = $('');
		$parent.siblings().each(function(){
			if ($(this).offset().top == topPos){
				if ($(this).hasClass('open')) {
					$openSiblingsInRow = $openSiblingsInRow.add($(this));
				} else {
					$closedSiblingsInRow = $closedSiblingsInRow.add($(this));
				}
			}
		});
		if ($(this).hasClass(af_classes['icon-minus'])) {
			$(this).attr('class', cls.replace(af_classes['icon-minus'], af_classes['icon-plus']));
			$parent.removeClass('open');
			if ($openSiblingsInRow.length) {
				$parent.addClass('sibling-with-margin');
				$closedSiblingsInRow.addClass('sibling-with-margin');
			} else {
				$closedSiblingsInRow.removeClass('sibling-with-margin');
			}
		} else {
			$(this).attr('class', cls.replace(af_classes['icon-plus'], af_classes['icon-minus']));
			$parent.addClass('open');
			$closedSiblingsInRow.addClass('sibling-with-margin');
			$parent.removeClass('sibling-with-margin');
		}
	}).on('click', '.saveMyFilters', function(e){
		var $successIcon = $(this).next();
		$successIcon.addClass('hidden');
		var data = $(this).closest('form').serialize();
		$.ajax({
			type: 'POST',
			url: af_ajax_path,
			dataType : 'json',
			data: data,
			success: function(r)
			{
				if (r.success) {
					$successIcon.removeClass('hidden');
					$('.my-filter-group').each(function(){
						$(this).find(icon_minus_selector).click();
						var total = $(this).find('.checkbox:checked').length;
						$(this).find('.total-checked').html(total);
					});
				}
			},
			error: function(r)
			{
				console.warn(r.responseText);
			}
		});
	});
});
