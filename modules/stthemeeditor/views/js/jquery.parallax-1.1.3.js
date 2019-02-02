/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
	var $window = $(window);
	var windowHeight = $window.height();

	$window.resize(function () {
		windowHeight = $window.height();
	});

	$.fn.parallax = function(xpos, speedFactor, outerHeight) {
		if($('body').hasClass('mobile_device'))
			return false;
		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;
		
		//get the starting position of each element to have parallax applied to it		
		$this.each(function(){
		    firstTop = $this.offset().top;
		});

		if (outerHeight) {
			getHeight = function(jqo) {
				return jqo.outerHeight(true);
			};
		} else {
			getHeight = function(jqo) {
				return jqo.height();
			};
		}
			
		// setup defaults if arguments aren't specified
		if (arguments.length < 1 || xpos === null) xpos = "50%";
		if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
		if (arguments.length < 3 || outerHeight === null) outerHeight = true;
		
		// function to be called whenever the window is scrolled or resized
		function update(){
			var pos = $window.scrollTop();				

			$this.each(function(){
				var $element = $(this);
				var top = $element.offset().top;
				var height = getHeight($element);

				// Check if totally above or totally below viewport
				if (top + height < pos || top > pos + windowHeight) {
					return;
				}

				$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
			});
		}		

		$window.bind('scroll', update).resize(update);
		update();
	};
})(jQuery);

function initParallax() {
	if ($(".parallax_box").length) {
		$(".parallax_box").each(function() {
			var e = $(this).data("speed") * .4;
			$(this).parallax("50%", e);
		});
	}
}



var parallax_viewport_video = function(){
	if(!document.createElement('video').canPlayType)
		$('.parallax_box').removeClass('parallax_video_box');
    var $window =$(window);
	var viewport = {
		top : $window.scrollTop(),
		left : $window.scrollLeft()
	};
	viewport.right = viewport.left + $window.width();
	viewport.bottom = viewport.top + $window.height()-100;

	$('.parallax_video_box .play_when_in_viewport').each(function(){
		if(!$(this).hasClass('manual_action')){
			var this_offset = $(this).offset();
			this_offset.right = this_offset.left + $(this).parent().outerWidth();
			this_offset.bottom = this_offset.top + $(this).parent().outerHeight()-100;
			
			var in_viewport = (!(viewport.right < this_offset.left 
				|| viewport.left > this_offset.right 
				|| viewport.bottom < this_offset.top 
				|| viewport.top > this_offset.bottom
			));

			if(in_viewport)
			{
				if(!!document.createElement('video').canPlayType)
					$(this).find('.parallax_video').get(0).play();
				$(this).find('.parallax_video_play').data('play-or-pause','play').find('i').removeClass('icon-play-circled').addClass('icon-pause-circled');
			}
			else
			{
				if(!!document.createElement('video').canPlayType)
					$(this).find('.parallax_video').get(0).pause();
				$(this).find('.parallax_video_play').data('play-or-pause','pause').find('i').removeClass('icon-pause-circled').addClass('icon-play-circled');
			}
		}
    });
}
	
$(document).ready(function(){
	$('.parallax_video_play').click(function(e) {
		if($(this).data('play-or-pause') == 'pause')
		{
			$(this).data('play-or-pause','play').find('i').removeClass('icon-pause-circled').addClass('icon-play-circled');
			var px_video = $(this).parent().addClass('manual_action');
			if(!!document.createElement('video').canPlayType)
				px_video.find('.parallax_video').get(0).play();
		}
		else
		{
			$(this).data('play-or-pause','pause').find('i').removeClass('icon-play-circled').addClass('icon-pause-circled');
			var px_video = $(this).parent().addClass('manual_action');
			if(!!document.createElement('video').canPlayType)
				px_video.find('.parallax_video').get(0).pause();
		}
	});
	parallax_vertical_video();
	parallax_viewport_video();

});	
$(window).scroll(function() {
	parallax_viewport_video();
});
$(window).on('resize', function() { 
	parallax_vertical_video();
});
var parallax_vertical_video_timer;
var parallax_vertical_video = function(){
	clearTimeout(parallax_vertical_video_timer);
	parallax_vertical_video_timer = setTimeout(function() {
		$('.parallax_video_box .parallax_video').each(function() {
			var p_height = $(this).parents('.parallax_box').outerHeight();
			var v_height = $(this).height();
			var v_width = $(this).width();
			if(p_height>v_height)
			{
				var p_width = Math.ceil(v_width/v_height*p_height);
				$(this).css('width', p_width);
				$(this).css('top', 0);
				$(this).css('left', -(p_width-v_width)/2);
			}
			else
			{
				$(this).css('width', '100%');
				$(this).css('top', (p_height-v_height)/2);
			}
			return true;
		});
	}, 300);
	
};