var blog_flexslider_options;
jQuery(function($){
    var blog_flexslider_options_default = {
        autoPlay : false,
        navigation: true,
        pagination: false,
        singleItem : true,
        autoHeight : false,
        slideSpeed: 200,
        stopOnHover: true,
        transitionStyle:"fade"
    };
    var blog_flexslider_options_extend = $.extend({}, blog_flexslider_options_default, blog_flexslider_options);
    $(".blog_flexslider").owlCarousel(blog_flexslider_options_extend);
    $('.full_video').fitVids();
});