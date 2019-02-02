<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

$lsDefaults = array(

    'slider' => array(

        'createdWith' => array(
            'value' => '',
            'keys' => 'createdWith'
        ),

        'sliderVersion' => array(
            'value' => '',
            'keys' => 'sliderVersion',
            'props' => array(
                'forceoutput' => true
            )
        ),

        'status' => array(
            'value' => true,
            'name' => ls__('Status', 'LayerSlider'),
            'keys' => 'status',
            'desc' => ls__('Unpublished sliders will not be visible for your visitors until you re-enable this option. This also applies to scheduled sliders, thus leaving this option enabled is recommended in most cases.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'scheduleStart' => array(
            'value' => '',
            'name' => ls__('Schedule From', 'LayerSlider'),
            'keys' => 'schedule_start',
            'desc' => ls__("<ul>
    <li>Scheduled sliders will only be visible to your visitors between the time period you set here.</li>
    <li>We're using international date and time format to avoid ambiguity.</li>
    <li>Clear the text field above and left it empty if you want to cancel the schedule.</li>
</ul>

<span>IMPORTANT:</span>
<ul>
    <li>You will still need to set the slider status as published,</li>
    <li>and insert the slider to the target page with one of the methods described in the <a href=\"http://docs.webshopworks.com/creative-slider/56-place-slider-on-the-site/\" target=\"_blank\">documentation</a>.</li>
</ul>", 'LayerSlider'),
            'attrs' => array(
                'placeholder' => ls__('No schedule', 'LayerSlider')
            ),
            'props' => array(
                'meta' => true
            )
        ),


        'scheduleEnd' => array(
            'value' => '',
            'name' => ls__('Schedule Until', 'LayerSlider'),
            'keys' => 'schedule_end',
            'desc' => '',
            'attrs' => array(
                'placeholder' => ls__('No schedule', 'LayerSlider')
            ),
            'props' => array(
                'meta' => true
            )
        ),


        // ============= //
        // |   Layout  | //
        // ============= //

        'hook' => array(
            'value' => '',
            'name' => ls__('Module Position'),
            'keys' => 'hook',
            'desc' => ls__('Slider will appear on the selected position.'),
            'props' => array('meta' => true),
            'attrs' => array(
                'type' => 'text',
                'placeholder' => ls__('- None -'),
                'data-options' => ls_get_hook_list()
            )
        ),

        // responsive | fullwidth | fullsize | fixedsize
        'type' => array(
            'value' => 'responsive',
            'name' => ls__('Slider type', 'LayerSlider'),
            'keys' => 'type',
            'desc' => '',
            'attrs' => array(
                'type' => 'hidden'
            )

        ),

        // The width of a new slider.
        'width' => array(
            'value' => 1280,
            'name' => ls__('Canvas width', 'LayerSlider'),
            'keys' => 'width',
            'desc' => ls__('The width of the slider canvas in pixels.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'text',
                'placeholder' => 1280
            ),
            'props' => array(
                'meta' => true
            )
        ),

        // The height of a new slider.
        'height' => array(
            'value' => 720,
            'name' => ls__('Canvas height', 'LayerSlider'),
            'keys' => 'height',
            'desc' => ls__('The height of the slider canvas in pixels.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'text',
                'placeholder' => 720
            ),
            'props' => array(
                'meta' => true
            )
        ),


        // The maximum width that the slider can get in responsive mode.
        'maxWidth' => array(
            'value' => '',
            'name' => ls__('Max-width', 'LayerSlider'),
            'keys' => 'maxwidth',
            'desc' => ls__('The maximum width your slider can take in pixels when responsive mode is enabled.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'min' => 0,
                'placeholder' => '100%'
            ),
            'props' => array(
                'meta' => true
            )
        ),


        // Turn on responsiveness under a given width of the slider.
        // Depends on: enabled fullWidth option. Defaults to: 0
        'responsiveUnder' => array(
            'value' => '',
            'name' => ls__('Responsive under', 'LayerSlider'),
            'keys' => array('responsiveunder', 'responsiveUnder'),
            'desc' => ls__('Turns on responsive mode in a full-width slider under the specified value in pixels. Can only be used with full-width mode.', 'LayerSlider'),
            'advanced' => true,
            'attrs' => array(
                'type' => 'number',
                'min' => 0,
                'placeholder' => ls__('Canvas width', 'LayerSlider')
            )
        ),

        'layersContrainer' => array(
            'value' => '',
            'keys' => array('sublayercontainer', 'layersContainer')
        ),


        'fullSizeMode' => array(
            'value' => 'normal',
            'name' => ls__('Mode', 'LayerSlider'),
            'keys' => 'fullSizeMode',
            'desc' => ls__('Select the sizing behavior of your full size sliders (e.g. hero scene).', 'LayerSlider'),
            'options' => array(
                'normal' => ls__('Normal', 'LayerSlider'),
                'hero' => ls__('Hero scene', 'LayerSlider'),
                'fitheight' => ls__('Fit to parent height', 'LayerSlider')
            ),
            'attrs' => array(
                'min' => 0
            )
        ),

        'allowFullscreen' => array(
            'value' => false,
            'name' => ls__('Allow fullscreen mode', 'LayerSlider'),
            'keys' => 'allowFullscreen',
            'desc' => ls__('Visitors can enter OS native full-screen mode when double clicking on the slider.', 'LayerSlider')
        ),

        'maxRatio' => array(
            'value' => '',
            'name' => ls__('Maximum responsive ratio', 'LayerSlider'),
            'keys' => 'maxRatio',
            'desc' => ls__('The slider will not enlarge your layers above the target ratio. The value 1 will keep your layers in their initial size, without any upscaling.', 'LayerSlider'),
            'advanced' => true
        ),

        'fitScreenWidth' => array(
            'value' => true,
            'name' => ls__('Fit to screen width', 'LayerSlider'),
            'keys' => 'fitScreenWidth',
            'desc' => ls__('If enabled, the slider will always have the same width as the viewport, even if a theme uses a boxed layout, unless you choose the "Fit to parent height" full size mode.', 'LayerSlider'),
            'advanced' => true
        ),

        'preventSliderClip' => array(
            'value' => true,
            'name' => ls__('Prevent slider clipping', 'LayerSlider'),
            'keys' => 'preventSliderClip',
            'desc' => ls__('Ensures that the theme cannot clip parts of the slider when used in a boxed layout.', 'LayerSlider'),
            'advanced' => true
        ),


        'insertMethod' => array(
            'value' => 'prependTo',
            'name' => ls__('Move the slider by', 'LayerSlider'),
            'keys' => 'insertMethod',
            'desc' => ls__('Move your slider to a different part of the page by providing a jQuery DOM manipulation method & selector for the target destination.', 'LayerSlider'),
            'options' => array(
                'prependTo' => 'prepending to',
                'appendTo' => 'appending to',
                'insertBefore' => 'inserting before',
                'insertAfter' => 'inserting after'
            )
        ),

        'insertSelector' => array(
            'value' => '',
            'keys' => 'insertSelector',
            'attrs' => array(
                'placeholder' => 'Enter selector'
            )
        ),

        'clipSlideTransition' => array(
            'value' => 'disabled',
            'name' => ls__('Clip slide transition', 'LayerSlider'),
            'keys' => 'clipSlideTransition',
            'desc' => ls__('Choose on which axis (if any) you want to clip the overflowing content (i.e. that breaks outside of the slider bounds).', 'LayerSlider'),
            'advanced' => true,
            'options' => array(
                'disabled' => ls__('Do not hide', 'LayerSlider'),
                'enabled' => ls__('Hide on both axis', 'LayerSlider'),
                'x' => ls__('X Axis', 'LayerSlider'),
                'y' => ls__('Y Axis', 'LayerSlider')
            )
        ),

        // == COMPATIBILITY ==

        'responsiveness' => array(
            'value' => true,
            'keys' => 'responsive',
            'props' => array(
                'meta' => true,
                'output' => true
            )
        ),
        'fullWidth' => array(
            'value' => false,
            'keys' => 'forceresponsive',
            'props' => array(
                'meta' => true,
                'output' => true
            )
        ),

        // == END OF COMPATIBILITY ==

        'slideBGSize' => array(
            'value' => 'cover',
            'name' => ls__('Background size', 'LayerSlider'),
            'keys' => 'slideBGSize',
            'desc' => ls__('This will be used as a default on all slides, unless you choose to explicitly override it on a per slide basis.', 'LayerSlider'),
            'options' => array(
                'auto' => ls__('Auto', 'LayerSlider'),
                'cover' => ls__('Cover', 'LayerSlider'),
                'contain' => ls__('Contain', 'LayerSlider'),
                '100% 100%' => ls__('Stretch', 'LayerSlider')
            )
        ),

        'slideBGPosition' => array(
            'value' => '50% 50%',
            'name' => ls__('Background position', 'LayerSlider'),
            'keys' => 'slideBGPosition',
            'desc' => ls__('This will be used as a default on all slides, unless you choose the explicitly override it on a per slide basis.', 'LayerSlider'),
            'options' => array(
                '0% 0%' => ls__('left top', 'LayerSlider'),
                '0% 50%' => ls__('left center', 'LayerSlider'),
                '0% 100%' => ls__('left bottom', 'LayerSlider'),
                '50% 0%' => ls__('center top', 'LayerSlider'),
                '50% 50%' => ls__('center center', 'LayerSlider'),
                '50% 100%' => ls__('center bottom', 'LayerSlider'),
                '100% 0%' => ls__('right top', 'LayerSlider'),
                '100% 50%' => ls__('right center', 'LayerSlider'),
                '100% 100%' => ls__('right bottom', 'LayerSlider')
            )
        ),


        'parallaxSensitivity' => array(
            'value' => 10,
            'name' => ls__('Parallax sensitivity', 'LayerSlider'),
            'keys' => 'parallaxSensitivity',
            'desc' => ls__('Increase or decrease the sensitivity of parallax content when moving your mouse cursor or tilting your mobile device.', 'LayerSlider')
        ),


        'parallaxCenterLayers' => array(
            'value' => 'center',
            'name' => ls__('Parallax center layers', 'LayerSlider'),
            'keys' => 'parallaxCenterLayers',
            'desc' => ls__('Choose a center point for parallax content where all layers will be aligned perfectly according to their original position.', 'LayerSlider'),
            'options' => array(
                'center' => ls__('At center of the viewport', 'LayerSlider'),
                'top' => ls__('At the top of the viewport', 'LayerSlider')
            )
        ),

        'parallaxCenterDegree' => array(
            'value' => 40,
            'name' => ls__('Parallax center degree', 'LayerSlider'),
            'keys' => 'parallaxCenterDegree',
            'desc' => ls__('Provide a comfortable holding position (in degrees) for mobile devices, which should be the center point for parallax content where all layers should align perfectly.', 'LayerSlider')
        ),

        'parallaxScrollReverse' => array(
            'value' => false,
            'name' => 'Reverse scroll direction',
            'keys' => 'parallaxScrollReverse',
            'desc' => ls__('Your parallax layers will move to the opposite direction when scrolling the page.', 'LayerSlider')
        ),


        // ================= //
        // |    Mobile    | //
        // ================= //

        'optimizeForMobile' => array(
            'value' => true,
            'name' => ls__('Optimize for mobile', 'LayerSlider'),
            'keys' => 'optimizeForMobile',
            'advanced' => true,
            'desc' => ls__('Enable optimizations on mobile devices to avoid performance issues (e.g. fewer tiles in slide transitions, reducing performance-heavy effects with very similar results, etc).', 'LayerSlider')
        ),


        // Disable the slider on mobile devices.
        // Defaults to: false
        'disableOnMobile' => array(
            'value' => false,
            'name' => ls__('Disable on mobile', 'LayerSlider'),
            'keys' => 'disableonmobile',
            'desc' => ls__('Disable the slider on mobile devices.', 'LayerSlider'),
            'props' => array('meta' => true)
        ),

        // Disable the slider on tablet devices.
        // Defaults to: false
        'disableOnTablet' => array(
            'value' => false,
            'name' => ls__('Disable on tablet', 'LayerSlider'),
            'keys' => 'disableontablet',
            'desc' => ls__('Disable the slider on tablet devices.', 'LayerSlider'),
            'props' => array('meta' => true)
        ),

        // Disable the slider on desktop devices.
        // Defaults to: false
        'disableOnDesktop' => array(
            'value' => false,
            'name' => ls__('Disable on desktop', 'LayerSlider'),
            'keys' => 'disableondesktop',
            'desc' => ls__('Disable the slider on desktop devices.', 'LayerSlider'),
            'props' => array('meta' => true)
        ),

        // Hides the slider under the given value of browser width in pixels.
        // Defaults to: 0
        'hideUnder' => array(
            'value' => '',
            'name' => ls__('Hide under', 'LayerSlider'),
            'keys' => array('hideunder', 'hideUnder'),
            'desc' => ls__('Hides the slider when the viewport width goes under the specified value.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'min' => -1
            )
        ),

        // Hides the slider over the given value of browser width in pixel.
        // Defaults to: 100000
        'hideOver' => array(
            'value' => '',
            'name' => ls__('Hide over', 'LayerSlider'),
            'keys' => array('hideover', 'hideOver'),
            'desc' => ls__('Hides the slider when the viewport becomes wider than the specified value.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'min' => -1
            )
        ),

        'slideOnSwipe' => array(
            'value' => true,
            'name' => ls__('Use slide effect when swiping', 'LayerSlider'),
            'keys' => 'slideOnSwipe',
            'desc' => ls__('Ignore selected slide transitions and use sliding effects only when users are changing slides with a swipe gesture on mobile devices.', 'LayerSlider')
        ),

        // ================ //
        // |   Slideshow  | //
        // ================ //

        // Automatically start slideshow.
        'autoStart' => array(
            'value' => true,
            'name' => ls__('Auto-start slideshow', 'LayerSlider'),
            'keys' => array('autostart', 'autoStart'),
            'desc' => ls__('Slideshow will automatically start after page load.', 'LayerSlider')
        ),

        'startInViewport' => array(
            'value' => true,
            'name' => ls__('Start only in viewport', 'LayerSlider'),
            'keys' => array('startinviewport', 'startInViewport'),
            'desc' => ls__('The slider will not start until it becomes visible.', 'LayerSlider')
        ),

        'hashChange' => array(
            'value' => false,
            'name' => ls__('Change URL hash', 'LayerSlider'),
            'keys' => 'hashChange',
            'desc' => ls__('Updates the hash in the page URL when changing slides based on the deeplinks you’ve set to your slides. This makes it possible to share URLs that will start the slider with the currently visible slide.', 'LayerSlider'),
            'advanced' => true
        ),

        'pauseLayers' => array(
            'value' => false,
            'name' => ls__('Pause layers', 'LayerSlider'),
            'keys' => 'pauseLayers',
            'desc' => ls__('If you enable this option, layer transitions will not start playing as long the slideshow is in a paused state.', 'LayerSlider'),
            'advanced' => true
        ),

        'pauseOnHover' => array(
            'value' => 'enabled',
            'name' => ls__('Pause on hover', 'LayerSlider'),
            'keys' => array('pauseonhover', 'pauseOnHover'),
            'options' => array(
                'disabled' => ls__('Do nothing', 'LayerSlider'),
                'enabled' => ls__('Pause slideshow', 'LayerSlider'),
                'layers' => ls__('Pause slideshow and layer transitions', 'LayerSlider'),
                'looplayers' => ls__('Pause slideshow and layer transitions, including loops', 'LayerSlider')
            ),
            'desc' => ls__('Decide what should happen when you move your mouse cursor over the slider.', 'LayerSlider')
        ),

        // The starting slide of a slider. Non-index value, starts with 1.
        'firstSlide' => array(
            'value' => 1,
            'name' => ls__('Start with slide', 'LayerSlider'),
            'keys' => array('firstlayer', 'firstSlide'),
            'desc' => ls__('The slider will start with the specified slide. You can also use the value "random".', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '["random"]')
        ),

        // Use global shortcuts to control the slider.
        'keybNavigation' => array(
            'value' => true,
            'name' => ls__('Keyboard navigation', 'LayerSlider'),
            'keys' => array('keybnav', 'keybNav'),
            'desc' => ls__('You can navigate through slides with the left and right arrow keys.', 'LayerSlider')
        ),

        // Accepts touch gestures if enabled.
        'touchNavigation' => array(
            'value' => true,
            'name' => ls__('Touch navigation', 'LayerSlider'),
            'keys' => array('touchnav', 'touchNav'),
            'desc' => ls__('Gesture-based navigation when swiping on touch-enabled devices.', 'LayerSlider')
        ),

        'playByScroll' => array(
            'value' => false,
            'name' => ls__('Play By Scroll', 'LayerSlider'),
            'keys' => 'playByScroll',
            'desc' => ls__('Play the slider by scrolling the web page. <a href="https://layerslider.webshopworks.com/play-by-scroll-26" target="_blank">Click here</a> to see a live example.', 'LayerSlider'),
            'premium' => true
        ),


        'playByScrollSpeed' => array(
            'value' => 1,
            'name' => ls__('Play By Scroll Speed', 'LayerSlider'),
            'keys' => 'playByScrollSpeed',
            'desc' => ls__('Play By Scroll speed multiplier.', 'LayerSlider'),
            'premium' => true
        ),

        'playByScrollStart' => array(
            'value' => false,
            'name' => ls__('Start immediately', 'LayerSlider'),
            'keys' => 'playByScrollStart',
            'desc' => ls__('Instead of freezing the slider until visitors start scrolling, the slider will automatically start playback and will only pause at the first keyframe.', 'LayerSlider'),
            'premium' => true
        ),

        // Number of loops taking by the slideshow.
        // Depends on: shuffle. Defaults to: 0 => infinite
        'loops' => array(
            'value' => 0,
            'name' => ls__('Cycles', 'LayerSlider'),
            'keys' => array('loops', 'cycles'),
            'desc' => ls__('Number of cycles if slideshow is enabled.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'min' => 0
            )
        ),

        // The slideshow will always stop at the given number of
        // loops, even when the user restarts slideshow.
        // Depends on: loop. Defaults to: true
        'forceLoopNumber' => array(
            'value' => true,
            'name' => ls__('Force number of cycles', 'LayerSlider'),
            'keys' => array('forceloopnum', 'forceCycles'),
            'advanced' => true,
            'desc' => ls__('The slider will always stop at the given number of cycles, even if the slideshow restarts.', 'LayerSlider')
        ),

        // The slideshow will change slides in random order.
        'shuffle' => array(
            'value' => false,
            'name' => ls__('Shuffle mode', 'LayerSlider'),
            'keys' => array('randomslideshow', 'shuffleSlideshow'),
            'desc' => ls__('Slideshow will proceed in random order. This feature does not work with looping.', 'LayerSlider')
        ),

        // Whether slideshow should goind backwards or not
        // when you switch to a previous slide.
        'twoWaySlideshow' => array(
            'value' => false,
            'name' => ls__('Two way slideshow', 'LayerSlider'),
            'keys' => array('twowayslideshow', 'twoWaySlideshow'),
            'advanced' => true,
            'desc' => ls__('Slideshow can go backwards if someone switches to a previous slide.', 'LayerSlider')
        ),

        'forceLayersOutDuration' => array(
            'value' => 750,
            'name' => ls__('Forced animation duration', 'LayerSlider'),
            'keys' => 'forceLayersOutDuration',
            'advanced' => true,
            'desc' => ls__('The animation speed in milliseconds when the slider forces remaining layers out of scene before swapping slides.', 'LayerSlider'),
            'attrs' => array(
                'min' => 0
            )
        ),

        // ================= //
        // |   Appearance  | //
        // ================= //

        // The default skin.
        'skin' => array(
            'value' => 'v6',
            'name' => ls__('Skin', 'LayerSlider'),
            'keys' => 'skin',
            'desc' => ls__("The skin used for this slider. The 'noskin' skin is a border- and buttonless skin. Your custom skins will appear in the list when you create their folders.", "LayerSlider")
        ),


        'sliderFadeInDuration' => array(
            'value' => 350,
            'name' => ls__('Initial fade duration', 'LayerSlider'),
            'keys' => array('sliderfadeinduration', 'sliderFadeInDuration'),
            'advanced' => true,
            'desc' => ls__('Change the duration of the initial fade animation when the page loads. Enter 0 to disable fading.', 'LayerSlider'),
            'attrs' => array(
                'min' => 0
            )
        ),

        'sliderClasses' => array(
            'value' => '',
            'name' => ls__('Slider Classes', 'LayerSlider'),
            'keys' => 'sliderclass',
            'desc' => ls__('One or more space-separated class names to be added to the slider container element.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        // Some CSS values you can append on each slide individually
        // to make some adjustments if needed.
        'sliderStyle' => array(
            'value' => 'margin-bottom: 0px;',
            'name' => ls__('Slider CSS', 'LayerSlider'),
            'keys' => array('sliderstyle', 'sliderStyle'),
            'desc' => ls__('You can enter custom CSS to change some style properties on the slider wrapper element. More complex CSS should be applied with the Custom Styles Editor.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),


        // Global background color on all slides.
        'globalBGColor' => array(
            'value' => '',
            'name' => ls__('Background color', 'LayerSlider'),
            'keys' => array('backgroundcolor', 'globalBGColor'),
            'desc' => ls__('Global background color of the slider. Slides with non-transparent background will cover this one. You can use all CSS methods such as HEX or RGB(A) values.', 'LayerSlider')
        ),

        // Global background image on all slides.
        'globalBGImage' => array(
            'value' => '',
            'name' => ls__('Background image', 'LayerSlider'),
            'keys' => array('backgroundimage', 'globalBGImage'),
            'desc' => ls__('Global background image of the slider. Slides with non-transparent backgrounds will cover it. This image will not scale in responsive mode.', 'LayerSlider')
        ),

        'globalBGImageId' => array(
            'value' => '',
            'keys' => array('backgroundimageId', 'globalBGImageId'),
            'props' => array(
                'meta' => true
            )
        ),

        // Global background image repeat
        'globalBGRepeat' => array(
            'value' => 'no-repeat',
            'name' => ls__('Background repeat', 'LayerSlider'),
            'keys' => 'globalBGRepeat',
            'desc' => ls__('Global background image repeat.', 'LayerSlider'),
            'options' => array(
                'no-repeat' => ls__('No-repeat', 'LayerSlider'),
                'repeat' => ls__('Repeat', 'LayerSlider'),
                'repeat-x' => ls__('Repeat-x', 'LayerSlider'),
                'repeat-y' => ls__('Repeat-y', 'LayerSlider')
            )
        ),

        // Global background image behavior
        'globalBGAttachment' => array(
            'value' => 'scroll',
            'name' => ls__('Background behavior', 'LayerSlider'),
            'keys' => 'globalBGAttachment',
            'desc' => ls__('Choose between a scrollable or fixed global background image.', 'LayerSlider'),
            'options' => array(
                'scroll' => ls__('Scroll', 'LayerSlider'),
                'fixed' => ls__('Fixed', 'LayerSlider')
            )
        ),

        // Global background image position
        'globalBGPosition' => array(
            'value' => '50% 50%',
            'name' => ls__('Background position', 'LayerSlider'),
            'keys' => 'globalBGPosition',
            'desc' => ls__('Global background image position of the slider. The first value is the horizontal position and the second value is the vertical.', 'LayerSlider')
        ),

        // Global background image size
        'globalBGSize' => array(
            'value' => 'auto',
            'name' => ls__('Background size', 'LayerSlider'),
            'keys' => 'globalBGSize',
            'desc' => ls__('Global background size of the slider. You can set the size in pixels, percentages, or constants: auto | cover | contain ', 'LayerSlider'),
            'attrs' => array('data-options' => '[{
                "name": "auto",
                "value": "auto"
            }, {
                "name": "cover",
                "value": "cover"
            }, {
                "name": "contain",
                "value": "contain"
            }, {
                "name": "stretch",
                "value": "100% 100%"
            }]')
        ),



        // ================= //
        // |   Navigation  | //
        // ================= //

        // Show the next and previous buttons.
        'navPrevNextButtons' => array(
            'value' => true,
            'name' => ls__('Show Prev & Next buttons', 'LayerSlider'),
            'keys' => array('navprevnext', 'navPrevNext'),
            'desc' => ls__('Disabling this option will hide the Prev and Next buttons.', 'LayerSlider')
        ),

        // Show the next and previous buttons
        // only when hovering over the slider.
        'hoverPrevNextButtons' => array(
            'value' => true,
            'name' => ls__('Show Prev & Next buttons on hover', 'LayerSlider'),
            'keys' => array('hoverprevnext', 'hoverPrevNext'),
            'desc' => ls__('Show the buttons only when someone moves the mouse cursor over the slider. This option depends on the previous setting.', 'LayerSlider')
        ),

        // Show the start and stop buttons
        'navStartStopButtons' => array(
            'value' => true,
            'name' => ls__('Show Start & Stop buttons', 'LayerSlider'),
            'keys' => array('navstartstop', 'navStartStop'),
            'desc' => ls__('Disabling this option will hide the Start & Stop buttons.', 'LayerSlider')
        ),

        // Show the slide buttons or thumbnails.
        'navSlideButtons' => array(
            'value' => true,
            'name' => ls__('Show slide navigation buttons', 'LayerSlider'),
            'keys' => array('navbuttons', 'navButtons'),
            'desc' => ls__('Disabling this option will hide slide navigation buttons or thumbnails.', 'LayerSlider')
        ),

        // Show the slider buttons or thumbnails
        // ony when hovering over the slider.
        'hoverSlideButtons' => array(
            'value' => false,
            'name' => ls__('Slide navigation on hover', 'LayerSlider'),
            'keys' => array('hoverbottomnav', 'hoverBottomNav'),
            'desc' => ls__('Slide navigation buttons (including thumbnails) will be shown on mouse hover only.', 'LayerSlider')
        ),

        // Show bar timer
        'barTimer' => array(
            'value' => false,
            'name' => ls__('Show bar timer', 'LayerSlider'),
            'keys' => array('bartimer', 'showBarTimer'),
            'desc' => ls__('Show the bar timer to indicate slideshow progression.', 'LayerSlider')
        ),

        // Show circle timer. Requires CSS3 capable browser.
        // This setting will overrule the 'barTimer' option.
        'circleTimer' => array(
            'value' => true,
            'name' => ls__('Show circle timer', 'LayerSlider'),
            'keys' => array('circletimer', 'showCircleTimer'),
            'desc' => ls__('Use circle timer to indicate slideshow progression.', 'LayerSlider')
        ),

        'slideBarTimer' => array(
            'value' => false,
            'name' => ls__('Show slidebar timer', 'LayerSlider'),
            'keys' => array('slidebartimer', 'showSlideBarTimer'),
            'desc' => ls__('You can grab the slidebar timer playhead and seek the whole slide real-time like a movie.', 'LayerSlider')
        ),

        // ========================== //
        // |  Thumbnail navigation  | //
        // ========================== //

        // Use thumbnails for slide buttons
        // Depends on: navSlideButtons.
        // Possible values: 'disabled', 'hover', 'always'
        'thumbnailNavigation' => array(
            'value' => 'hover',
            'name' => ls__('Thumbnail navigation', 'LayerSlider'),
            'keys' => array('thumb_nav', 'thumbnailNavigation'),
            'desc' => ls__('Use thumbnail navigation instead of slide bullet buttons.', 'LayerSlider'),
            'options' => array(
                'disabled' => ls__('Disabled', 'LayerSlider'),
                'hover' => ls__('Hover', 'LayerSlider'),
                'always' => ls__('Always', 'LayerSlider')
            )
        ),

        // The width of the thumbnail area in percents.
        'thumbnailAreaWidth' => array(
            'value' => '60%',
            'name' => ls__('Thumbnail container width', 'LayerSlider'),
            'keys' => array('thumb_container_width', 'tnContainerWidth'),
            'desc' => ls__('The width of the thumbnail area relative to the slider size.', 'LayerSlider')
        ),

        // Thumbnails' width in pixels.
        'thumbnailWidth' => array(
            'value' => 100,
            'name' => ls__('Thumbnail width', 'LayerSlider'),
            'keys' => array('thumb_width', 'tnWidth'),
            'desc' => ls__('The width of thumbnails in the navigation area.', 'LayerSlider'),
            'attrs' => array(
                'min' => 0
            )
        ),

        // Thumbnails' height in pixels.
        'thumbnailHeight' => array(
            'value' => 60,
            'name' => ls__('Thumbnail height', 'LayerSlider'),
            'keys' => array('thumb_height', 'tnHeight'),
            'desc' => ls__('The height of thumbnails in the navigation area.', 'LayerSlider'),
            'attrs' => array(
                'min' => 0
            )
        ),


        // The opacity of the active thumbnail in percents.
        'thumbnailActiveOpacity' => array(
            'value' => 35,
            'name' => ls__('Active thumbnail opacity', 'LayerSlider'),
            'keys' => array('thumb_active_opacity', 'tnActiveOpacity'),
            'desc' => ls__("Opacity in percentage of the active slide's thumbnail.", "LayerSlider"),
            'attrs' => array(
                'min' => 0,
                'max' => 100
            )
        ),

        // The opacity of inactive thumbnails in percents.
        'thumbnailInactiveOpacity' => array(
            'value' => 100,
            'name' => ls__('Inactive thumbnail opacity', 'LayerSlider'),
            'keys' => array('thumb_inactive_opacity', 'tnInactiveOpacity'),
            'desc' => ls__('Opacity in percentage of inactive slide thumbnails.', 'LayerSlider'),
            'attrs' => array(
                'min' => 0,
                'max' => 100
            )
        ),

        // ============ //
        // |  Videos  | //
        // ============ //

        // Automatically starts vidoes on the given slide.
        'autoPlayVideos' => array(
            'value' => true,
            'name' => ls__('Automatically play videos', 'LayerSlider'),
            'keys' => array('autoplayvideos', 'autoPlayVideos'),
            'desc' => ls__('Videos will be automatically started on the active slide.', 'LayerSlider')
        ),

        // Automatically pauses the slideshow when a video is playing.
        // Auto means it only pauses the slideshow while the video is playing.
        // Possible values: 'auto', 'enabled', 'disabled'
        'autoPauseSlideshow' => array(
            'value' => 'auto',
            'name' => ls__('Pause slideshow', 'LayerSlider'),
            'keys' => array('autopauseslideshow', 'autoPauseSlideshow'),
            'desc' => ls__('The slideshow can temporally be paused while videos are playing. You can choose to permanently stop the pause until manual restarting.', 'LayerSlider'),
            'options' => array(
                'auto' => ls__('While playing', 'LayerSlider'),
                'enabled' => ls__('Permanently', 'LayerSlider'),
                'disabled' => ls__('No action', 'LayerSlider')
            )
        ),

        // The preview image quality of a YouTube video.
        // Some videos doesn't have HD preview images and
        // you may have to lower the quality settings.
        // Possible values:
            // 'maxresdefault.jpg',
            // 'hqdefault.jpg',
            // 'mqdefault.jpg',
            // 'default.jpg'
        'youtubePreviewQuality' => array(
            'value' => 'maxresdefault.jpg',
            'name' => ls__('Youtube preview', 'LayerSlider'),
            'keys' => array('youtubepreview', 'youtubePreview'),
            'desc' => ls__('The automatically fetched preview image quaility for YouTube videos when you do not set your own. Please note, some videos do not have HD previews, and you may need to choose a lower quaility.', 'LayerSlider'),
            'options' => array(
                'maxresdefault.jpg' => ls__('Maximum quality', 'LayerSlider'),
                'hqdefault.jpg' => ls__('High quality', 'LayerSlider'),
                'mqdefault.jpg' => ls__('Medium quality', 'LayerSlider'),
                'default.jpg' => ls__('Default quality', 'LayerSlider')
            )
        ),

        // ========== //
        // |  Misc  | //
        // ========== //


        // Ignores the host/domain names in URLS by converting the to
        // relative format. Useful when you move your site.
        // Prevents linking content from 3rd party servers.
        'relativeURLs' => array(
            'value' => false,
            'name' => ls__('Use relative URLs', 'LayerSlider'),
            'keys' => 'relativeurls',
            'desc' => ls__('Use relative URLs for local images. This setting could be important when moving your PS installation.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'allowRestartOnResize' => array(
            'value' => false,
            'name' => ls__('Allow restarting slides on resize', 'LayerSlider'),
            'keys' => 'allowRestartOnResize',
            'desc' => ls__('Certain transformation and transition options cannot be updated on the fly when the browser size or device orientation changes. By enabling this option, the slider will automatically detect such situations and will restart the itself to preserve its appearance.', 'LayerSlider'),
            'advanced' => true
        ),

        'useSrcset' => array(
            'value' => true,
            'name' => ls__('Use srcset attribute', 'LayerSlider'),
            'keys' => 'useSrcset',
            'desc' => ls__('The srcset attribute allows loading dynamically scaled images based on screen resolution. It can save bandwidth and allow using retina-ready images on high resolution devices. In some rare edge cases, this option might cause blurry images.', 'LayerSlider')
        ),

        'preferBlendMode' => array(
            'value' => 'disabled',
            'name' => ls__('Prefer Blend Mode', 'LayerSlider'),
            'keys' => 'preferBlendMode',
            'desc' => ls__('Enable this option to avoid blend mode issues with slide transitions. Due to technical limitations, this will also clip your slide transitions regardless of your settings.', 'LayerSlider'),
            'options' => array(
                'enabled' => ls__('Enabled', 'LayerSlider'),
                'disabled' => ls__('Disabled', 'LayerSlider')
            ),
            'advanced' => true
        ),


        // ============== //
        // |  YourLogo  | //
        // ============== //

        // Places a fixed image on the top of the slider.
        'yourLogoImage' => array(
            'value' => '',
            'name' => ls__('YourLogo', 'LayerSlider'),
            'keys' => array('yourlogo', 'yourLogo'),
            'desc' => ls__('A fixed image layer can be shown above the slider that remains still throughout the whole slider. Can be used to display logos or watermarks.', 'LayerSlider')
        ),

        // Custom CSS style settings for the YourLogo image.
        // Depends on: yourLogoImage
        'yourLogoStyle' => array(
            'value' => 'left: -10px; top: -10px;',
            'name' => ls__('YourLogo style', 'LayerSlider'),
            'keys' => array('yourlogostyle', 'yourLogoStyle'),
            'desc' => ls__('CSS properties to control the image placement and appearance.', 'LayerSlider')
        ),

        // Linking the YourLogo image to a given URL.
        // Depends on: yourLogoImage
        'yourLogoLink' => array(
            'value' => '',
            'name' => ls__('YourLogo link', 'LayerSlider'),
            'keys' => array('yourlogolink', 'yourLogoLink'),
            'desc' => ls__('Enter a URL to link the YourLogo image.', 'LayerSlider')
        ),

        // Link target for yourLogoLink.
        // Depends on: yourLogoLink
        'yourLogoTarget' => array(
            'value' => '_self',
            'name' => ls__('Link target', 'LayerSlider'),
            'keys' => array('yourlogotarget', 'yourLogoTarget'),
            'desc' => '',
            'options' => array(
                '_self' => ls__('Open on the same page', 'LayerSlider'),
                '_blank' => ls__('Open on new page', 'LayerSlider'),
                '_parent' => ls__('Open in parent frame', 'LayerSlider'),
                '_top' => ls__('Open in main frame', 'LayerSlider')
            ),
        ),

        // Post options
        'postType' => array(
            'value' => '',
            'keys' => 'post_type',
            'props' => array(
                'meta' => true
            )
        ),

        'postOrderBy' => array(
            'value' => 'date',
            'keys' => 'post_orderby',
            'options' => array(
                'date' => ls__('Date Created', 'LayerSlider'),
                'modified' => ls__('Last Modified', 'LayerSlider'),
                'ID' => ls__('Post ID', 'LayerSlider'),
                'title' => ls__('Post Title', 'LayerSlider'),
                'comment_count' => ls__('Number of Comments', 'LayerSlider'),
                'rand' => ls__('Random', 'LayerSlider')
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'postOrder' => array(
            'value' => 'DESC',
            'keys' => 'post_order',
            'options' => array(
                'ASC' => ls__('Ascending', 'LayerSlider'),
                'DESC' => ls__('Descending', 'LayerSlider')
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'postCategories' => array(
            'value' => '',
            'keys' => 'post_categories',
            'props' => array(
                'meta' => true
            )
        ),

        'postTags' => array(
            'value' => '',
            'keys' => 'post_tags',
            'props' => array(
                'meta' => true
            )
        ),

        'postTaxonomy' => array(
            'value' => '',
            'keys' => 'post_taxonomy',
            'props' => array(
                'meta' => true
            )
        ),

        'postTaxTerms' => array(
            'value' => '',
            'keys' => 'post_tax_terms',
            'props' => array(
                'meta' => true
            )
        ),

        // Old and obsolete API
        'cbInit' => array(
            'value' => "function(element) {\r\n\r\n}",
            'keys' => array('cbinit','cbInit'),
            'props' => array(
                'meta' => true
            )
        ),

        'cbStart' => array(
            'value' => "function(data) {\r\n\r\n}",
            'keys' => array('cbstart','cbStart'),
            'props' => array(
                'meta' => true
            )
        ),

        'cbStop' => array(
            'value' => "function(data) {\r\n\r\n}",
            'keys' => array('cbstop','cbStop'),
            'props' => array(
                'meta' => true
            )
        ),

        'cbPause' => array(
            'value' => "function(data) {\r\n\r\n}",
            'keys' => array('cbpause','cbPause'),
            'props' => array(
                'meta' => true
            )
        ),

        'cbAnimStart' => array(
            'value' => "function(data) {\r\n\r\n}",
            'keys' => array('cbanimstart','cbAnimStart'),
            'props' => array(
                'meta' => true
            )
        ),

        'cbAnimStop' => array(
            'value' => "function(data) {\r\n\r\n}",
            'keys' => array('cbanimstop','cbAnimStop'),
            'props' => array(
                'meta' => true
            )
        ),

        'cbPrev' => array(
            'value' => "function(data) {\r\n\r\n}",
            'keys' => array('cbprev','cbPrev'),
            'props' => array(
                'meta' => true
            )
        ),

        'cbNext' => array(
            'value' => "function(data) {\r\n\r\n}",
            'keys' => array('cbnext','cbNext'),
            'props' => array(
                'meta' => true
            )
        ),
    ),

    'slides' => array(

        // The background image of slides
        // Defaults to: void
        'image' => array (
            'value' => '',
            'name' => ls__('Set a slide image', 'LayerSlider'),
            'keys' => 'background',
            'tooltip' => ls__('The slide image/background. Click on the image to open the Image Manager to choose or upload an image.', 'LayerSlider'),
            'props' => array('meta' => true)
        ),

        'imageId' => array (
            'value' => '',
            'keys' => 'backgroundId',
            'props' => array('meta' => true)
        ),

        'imageSize' => array(
            'value' => 'inherit',
            'name' => ls__('Size', 'LayerSlider'),
            'keys' => 'bgsize',
            'tooltip' => ls__('The size of the slide background image. Leave this option on inherit if you want to set it globally from Slider Settings.', 'LayerSlider'),
            'options' => array(
                'inherit' => ls__('Inherit', 'LayerSlider'),
                'auto' => ls__('Auto', 'LayerSlider'),
                'cover' => ls__('Cover', 'LayerSlider'),
                'contain' => ls__('Contain', 'LayerSlider'),
                '100% 100%' => ls__('Stretch', 'LayerSlider')
            )
        ),

        'imagePosition' => array(
            'value' => 'inherit',
            'name' => ls__('Position', 'LayerSlider'),
            'keys' => 'bgposition',
            'tooltip' => ls__('The position of the slide background image. Leave this option on inherit if you want to set it globally from Slider Settings.', 'LayerSlider'),
            'options' => array(
                'inherit' => ls__('Inherit', 'LayerSlider'),
                '0% 0%' => ls__('left top', 'LayerSlider'),
                '0% 50%' => ls__('left center', 'LayerSlider'),
                '0% 100%' => ls__('left bottom', 'LayerSlider'),
                '50% 0%' => ls__('center top', 'LayerSlider'),
                '50% 50%' => ls__('center center', 'LayerSlider'),
                '50% 100%' => ls__('center bottom', 'LayerSlider'),
                '100% 0%' => ls__('right top', 'LayerSlider'),
                '100% 50%' => ls__('right center', 'LayerSlider'),
                '100% 100%' => ls__('right bottom', 'LayerSlider')
            )
        ),

        'imageColor' => array(
            'value' => '',
            'name' => ls__('Color', 'LayerSlider'),
            'keys' => 'bgcolor',
            'tooltip' => ls__('The slide background color. You can use color names, hexadecimal, RGB or RGBA values.', 'LayerSlider')
        ),

        'thumbnail' => array (
            'value' => '',
            'name' => ls__('Set a slide thumbnail', 'LayerSlider'),
            'keys' => 'thumbnail',
            'tooltip' => ls__('The thumbnail image of this slide. Click on the image to open the Image Manager to choose or upload an image. If you leave this field empty, the slide image will be used.', 'LayerSlider'),
            'props' => array('meta' => true)
        ),

        'thumbnailId' => array (
            'value' => '',
            'keys' => 'thumbnailId',
            'props' => array('meta' => true)
        ),

        // Default slide delay in millisecs.
        // Defaults to: 4000 (ms) => 4secs
        'delay' => array(
            'value' => '',
            'name' => ls__('Duration', 'LayerSlider'),
            'keys' => array('slidedelay', 'duration'),
            'tooltip' => ls__("Here you can set the time interval between slide changes, this slide will stay visible for the time specified here. This value is in millisecs, so the value 1000 means 1 second. Please don't use 0 or very low values.", "LayerSlider"),
            'attrs' => array(
                'type' => 'number',
                'min' => 0,
                'step' => 500,
                'placeholder' => 'auto'
            )
        ),

        '2dTransitions' => array(
            'value' => '',
            'keys' => array('2d_transitions', 'transition2d')
        ),

        '3dTransitions' => array(
            'value' => '',
            'keys' => array('3d_transitions', 'transition3d')
        ),

        'custom2dTransitions' => array(
            'value' => '',
            'keys' => array('custom_2d_transitions', 'customtransition2d')
        ),

        'custom3dTransitions' => array(
            'value' => '',
            'keys' => array('custom_3d_transitions', 'customtransition3d')
        ),

        'transitionOrigami' => array(
            'value' => false,
            'keys' => 'transitionorigami',
            'premium' => true
        ),

        'transitionDuration' => array(
            'value' => '',
            'name' => ls__('Duration', 'LayerSlider'),
            'keys' => 'transitionduration',
            'tooltip' => ls__("We've made our pre-defined slide transitions with special care to fit in most use cases. However, if you would like to increase or decrease the speed of these transitions, you can override their timing here by providing your own transition length in milliseconds. (1 second = 1000 milliseconds)", "LayerSlider"),
            'attrs' => array(
                'type' => 'number',
                'min' => 0,
                'step' => 500,
                'placeholder' => ls__('custom duration', 'LayerSlider')
            )

        ),

        'timeshift' => array(
            'value' => 0,
            'name' => ls__('Time Shift', 'LayerSlider'),
            'keys' => 'timeshift',
            'tooltip' => ls__("You can shift the starting point of the slide animation timeline, so layers can animate in an earlier time after a slide change. This value is in milliseconds. A second is 1000 milliseconds. You can only use a negative value.", 'LayerSlider'),
            'attrs' => array(
                'step' => 50
            )
        ),

        'linkUrl' => array(
            'value' => '',
            'name' => ls__('Enter URL', 'LayerSlider'),
            'keys' => array('layer_link', 'linkUrl'),
            'tooltip' => ls__('If you want to link the whole slide, type the URL here. You can choose one of the pre-defined options from the dropdown list when you click into this field. You can also type a hash mark followed by a number to link this layer to another slide. Example: #3 - this will switch to the third slide.', 'LayerSlider'),
            'attrs' => array(
                'data-options' => '[{
                    "name": "Switch to the next slide",
                    "value": "#next"
                }, {
                    "name": "Switch to the previous slide",
                    "value": "#prev"
                }, {
                    "name": "Stop the slideshow",
                    "value": "#stop"
                }, {
                    "name": "Resume the slideshow",
                    "value": "#start"
                }, {
                    "name": "Replay the slide from the start",
                    "value": "#replay"
                }, {
                    "name": "Reverse the slide, then pause it",
                    "value": "#reverse"
                }, {
                    "name": "Reverse the slide, then replay it",
                    "value": "#reverse-replay"
                }]'
            ),
            'props' => array(
                'meta' => true
            )

        ),

        'linkId' => array(
            'value' => '',
            'keys' => 'linkId',
            'props' => array( 'meta' => true )
        ),

        'linkTarget' => array(
            'value' => '_self',
            'name' => ls__('Link Target', 'LayerSlider'),
            'keys' => array('layer_link_target', 'linkTarget'),
            'options' => array(
                '_self' => ls__('Open on the same page', 'LayerSlider'),
                '_blank' => ls__('Open on new page', 'LayerSlider'),
                '_parent' => ls__('Open in parent frame', 'LayerSlider'),
                '_top' => ls__('Open in main frame', 'LayerSlider'),
                'ls-scroll' => ls__('Scroll to element (Enter selector)', 'LayerSlider')
            ),
            'props' => array(
                'meta' => true
            )

        ),

        'linkType' => array(
            'value' => 'over',
            'keys' => array('layer_link_type', 'linkType'),
            'tooltip' => ls__('Choose whether the slide link should be on top or underneath your layers. The later option makes the link clickable only at empty spaces where the slide background is visible, and enables you to link both slides and layers independently from each other.', 'LayerSlider'),
            'options' => array(
                'over' => ls__('On top of layers', 'LayerSlider'),
                'under' => ls__('Underneath layers', 'LayerSlider'),
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'ID' => array(
            'value' => '',
            'name' => ls__('#ID', 'LayerSlider'),
            'keys' => 'id',
            'tooltip' => ls__('You can apply an ID attribute on the HTML element of this slide to work with it in your custom CSS or Javascript code.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'deeplink' => array(
            'value' => '',
            'name' => ls__('Deeplink', 'LayerSlider'),
            'keys' => 'deeplink',
            'tooltip' => ls__('You can specify a slide alias name which you can use in your URLs with a hash mark, so LayerSlider will start with the correspondig slide.', 'LayerSlider')
        ),

        'globalHover' => array(
            'value' => false,
            'name' => ls__('Global Hover', 'LayerSlider'),
            'keys' => 'globalhover',
            'tooltip' => ls__('By turning this option on, all layers will trigger their Hover Transitions at the same time when you hover over the slider with your mouse cursor. It’s useful to create spectacular effects that involve multiple layer transitions and activate on hovering over the slider instead of individual layers.', 'LayerSlider'),
            'premium' => true
        ),

        'postContent' => array(
            'value' => null,
            'keys' => 'post_content',
            'props' => array(
                'meta' => true
            )
        ),


        'postOffset' => array(
            'value' => '',
            'keys' => 'post_offset',
            'props' => array(
                'meta' => true
            )
        ),

        'skipSlide' => array(
            'value' => false,
            'name' => ls__('Hidden', 'LayerSlider'),
            'keys' => 'skip',
            'tooltip' => ls__("If you don't want to use this slide in your front-page, but you want to keep it, you can hide it with this switch.", 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),


        'overflow' => array(
            'value' => false,
            'name' => ls__('Overflow layers', 'LayerSlider'),
            'keys' => 'overflow',
            'tooltip' => ls__('By default the slider clips the layers outside of its bounds. Enable this option to allow overflowing content.', 'LayerSlider')
        ),

        'scheduleStart' => array(
            'value' => '',
            'name' => ls__('Start on'),
            'keys' => 'schedule_start',
            'desc' => ls__("Scheduled slide will only be visible to your visitors between the time period you set here.<br>We're using international date and time format to avoid ambiguity."),
            'attrs' => array(
                'placeholder' => ls__('No schedule')
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'scheduleEnd' => array(
            'value' => '',
            'name' => ls__('Stop on'),
            'keys' => 'schedule_end',
            'desc' => 'Clear the text field above and left it empty if you want to cancel the schedule.',
            'attrs' => array(
                'placeholder' => ls__('No schedule')
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'title' => array(
            'value' => '',
            'name' => ls__('Title', 'LayerSlider'),
            'keys' => 'title',
            'props' => array('meta' => true),
        ),

        'alt' => array(
            'value' => '',
            'name' => ls__('Alt', 'LayerSlider'),
            'keys' => 'alt',
            'tooltip' => ls__('Name or describe your slide image, so search engines and VoiceOver softwares can properly identify it.', 'LayerSlider'),
            'props' => array('meta' => true),
        ),

        // Ken Burns effect
        'kenBurnsZoom' => array(
            'value' => 'disabled',
            'name' => ls__('Zoom', 'LayerSlider'),
            'keys' => 'kenburnszoom',
            'options' => array(
                'disabled' => ls__('Disabled', 'LayerSlider'),
                'in' => ls__('Zoom In', 'LayerSlider'),
                'out' => ls__('Zoom Out', 'LayerSlider'),
            )
        ),

        'kenBurnsRotate' => array(
            'value' => '',
            'name' => ls__('Rotate', 'LayerSlider'),
            'keys' => 'kenburnsrotate',
            'tooltip' => ls__('The amount of rotation (if any) in degrees used in the Ken Burns effect. Negative values are allowed for counterclockwise rotation.', 'LayerSlider'),

        ),

        'kenBurnsScale' => array(
            'value' => 1.2,
            'name' => ls__('Scale', 'LayerSlider'),
            'keys' => 'kenburnsscale',
            'tooltip' => ls__('Increase or decrease the size of the slide background image in the Ken Burns effect. The default value is 1, the value 2 will double the image, while 0.5 results half the size. Negative values will flip the image.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'step' => 0.1
            ),
            'props' => array(
                'output' => true
            )
        ),


        // Parallax
        'parallaxType' => array(
            'value' => '2d',
            'name' => ls__('Type', 'LayerSlider'),
            'keys' => 'parallaxtype',
            'tooltip' => ls__('The default value for parallax layers on this slide, which they will inherit, unless you set it otherwise on the affected layers.', 'LayerSlider'),
            'options' => array(
                '2d' => ls__('2D', 'LayerSlider'),
                '3d' => ls__('3D', 'LayerSlider')
             )
        ),

        'parallaxEvent' => array(
            'value' => 'cursor',
            'name' => ls__('Event', 'LayerSlider'),
            'keys' => 'parallaxevent',
            'tooltip' => ls__('You can trigger the parallax effect by either scrolling the page, or by moving your mouse cursor / tilting your mobile device. This is the default value on this slide, which parallax layers will inherit, unless you set it otherwise directly on them.', 'LayerSlider'),
            'options' => array(
                'cursor' => ls__('Cursor or Tilt', 'LayerSlider'),
                'scroll' => ls__('Scroll', 'LayerSlider')
             )
        ),

        'parallaxAxis' => array(
            'value' => 'both',
            'name' => ls__('Axes', 'LayerSlider'),
            'keys' => 'parallaxaxis',
            'tooltip' => ls__('Choose on which axes parallax layers should move. This is the default value on this slide, which parallax layers will inherit, unless you set it otherwise directly on them.', 'LayerSlider'),
            'options' => array(
                'none' => ls__('None', 'LayerSlider'),
                'both' => ls__('Both axes', 'LayerSlider'),
                'x' => ls__('Horizontal only', 'LayerSlider'),
                'y' => ls__('Vertical only', 'LayerSlider')
            )
        ),


        'parallaxTransformOrigin' => array(
            'value' => '50% 50% 0',
            'name' => ls__('Transform Origin', 'LayerSlider'),
            'keys' => 'parallaxtransformorigin',
            'tooltip' => ls__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center.', 'LayerSlider')
        ),

        'parallaxDurationMove' => array(
            'value' => 1500,
            'name' => ls__('Move duration', 'LayerSlider'),
            'keys' => 'parallaxdurationmove',
            'tooltip' => ls__('Controls the speed of animating layers when you move your mouse cursor or tilt your mobile device. This is the default value on this slide, which parallax layers will inherit, unless you set it otherwise directly on them.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'step' => 100,
                'min' => 0
            )
        ),

        'parallaxDurationLeave' => array(
            'value' => 1200,
            'name' => ls__('Leave duration', 'LayerSlider'),
            'keys' => 'parallaxdurationleave',
            'tooltip' => ls__('Controls how quickly your layers revert to their original position when you move your mouse cursor outside of a parallax slider. This value is in milliseconds. 1 second = 1000 milliseconds. This is the default value on this slide, which parallax layers will inherit, unless you set it otherwise directly on them.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'step' => 100,
                'min' => 0
            )
        ),

        'parallaxDistance' => array(
            'value' => 10,
            'name' => ls__('Distance', 'LayerSlider'),
            'keys' => 'parallaxdistance',
            'tooltip' => ls__('Increase or decrease the amount of layer movement when moving your mouse cursor or tilting on a mobile device. This is the default value on this slide, which parallax layers will inherit, unless you set it otherwise directly on them.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'step' => 1
            )

        ),

        'parallaxRotate' => array(
            'value' => 10,
            'name' => ls__('Rotation', 'LayerSlider'),
            'keys' => 'parallaxrotate',
            'tooltip' => ls__('Increase or decrease the amount of layer rotation in the 3D space when moving your mouse cursor or tilting on a mobile device. This is the default value on this slide, which parallax layers will inherit, unless you set it otherwise directly on them.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'step' => 1
            )
        ),

        'parallaxPerspective' => array(
            'value' => 500,
            'name' => ls__('Perspective', 'LayerSlider'),
            'keys' => 'parallaxtransformperspective',
            'tooltip' => ls__('Changes the perspective of layers in the 3D space. This is the default value on this slide, which parallax layers will inherit, unless you set it otherwise directly on them.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'step' => 100
            )
        ),

        // 'filterFrom' => array(
        //     'value' => '',
        //     'name' => ls__('Filter From', 'LayerSlider'),
        //     'keys' => 'filterfrom',
        //     'tooltip' => ls__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use.', 'LayerSlider'),
        //     'advanced' => true,
        //     'attrs' => array(
        //         'data-options' => '[{
        //             "name": "Blur",
        //             "value": "blur(5px)"
        //         }, {
        //             "name": "Brightness",
        //             "value": "brightness(40%)"
        //         }, {
        //             "name": "Contrast",
        //             "value": "contrast(200%)"
        //         }, {
        //             "name": "Grayscale",
        //             "value": "grayscale(50%)"
        //         }, {
        //             "name": "Hue-rotate",
        //             "value": "hue-rotate(90deg)"
        //         }, {
        //             "name": "Invert",
        //             "value": "invert(75%)"
        //         }, {

        //             "name": "Saturate",
        //             "value": "saturate(30%)"
        //         }, {
        //             "name": "Sepia",
        //             "value": "sepia(60%)"
        //         }]'
        //     )
        // ),

        // 'filterTo' => array(
        //     'value' => '',
        //     'name' => ls__('Filter To', 'LayerSlider'),
        //     'keys' => 'filterto',
        //     'tooltip' => ls__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use.', 'LayerSlider'),
        //     'advanced' => true,
        //     'attrs' => array(
        //         'data-options' => '[{
        //             "name": "Blur",
        //             "value": "blur(5px)"
        //         }, {
        //             "name": "Brightness",
        //             "value": "brightness(40%)"
        //         }, {
        //             "name": "Contrast",
        //             "value": "contrast(200%)"
        //         }, {
        //             "name": "Grayscale",
        //             "value": "grayscale(50%)"
        //         }, {
        //             "name": "Hue-rotate",
        //             "value": "hue-rotate(90deg)"
        //         }, {
        //             "name": "Invert",
        //             "value": "invert(75%)"
        //         }, {

        //             "name": "Saturate",
        //             "value": "saturate(30%)"
        //         }, {
        //             "name": "Sepia",
        //             "value": "sepia(60%)"
        //         }]'
        //     )
        // )
    ),

    'layers' => array(

        // ======================= //
        // |  Content  | //
        // ======================= //

        'uuid' => array(
            'value' => '',
            'keys' => 'uuid',
            'props' => array(
                'meta' => true
            )
        ),

        'type' => array(
            'value' => '',
            'keys' => 'type',
            'props' => array(
                'meta' => true
            )
        ),

        'hide_on_desktop' => array(
            'value' => false,
            'keys' => 'hide_on_desktop',
            'props' => array(
                'meta' => true
            )
        ),

        'hide_on_tablet' => array(
            'value' => false,
            'keys' => 'hide_on_tablet',
            'props' => array(
                'meta' => true
            )
        ),

        'hide_on_phone' => array(
            'value' => false,
            'keys' => 'hide_on_phone',
            'props' => array(
                'meta' => true
            )
        ),

        'media' => array(
            'value' => '',
            'keys' => 'media',
            'props' => array(
                'meta' => true
            )
        ),

        'image' => array(
            'value' => '',
            'keys' => 'image',
            'props' => array(
                'meta' => true
            )
        ),

        'imageId' => array(
            'value' => '',
            'keys' => 'imageId',
            'props' => array('meta' => true)
        ),

        'html' => array(
            'value' => '',
            'keys' => 'html',
            'props' => array(
                'meta' => true
            )
        ),

        'mediaAutoPlay' => array(
            'value' => 'inherit',
            'name' => ls__('Autoplay', 'LayerSlider'),
            'keys' => 'autoplay',
            'options' => array(
                'inherit' => ls__('Inherit', 'LayerSlider'),
                'enabled' => ls__('Enabled', 'LayerSlider'),
                'disabled' => ls__('Disabled', 'LayerSlider')
            )
        ),

        'mediaInfo' => array(
            'value' => true,
            'name' => ls__('Show Info', 'LayerSlider'),
            'keys' => 'showinfo',
            'options' => array(
                'auto' => ls__('Auto', 'LayerSlider'),
                'enabled' => ls__('Enabled', 'LayerSlider'),
                'disabled' => ls__('Disabled', 'LayerSlider')
            )
        ),

        'mediaControls' => array(
            'value' => true,
            'name' => ls__('Controls', 'LayerSlider'),
            'keys' => 'controls',
            'options' => array(
                'auto' => ls__('Auto', 'LayerSlider'),
                'enabled' => ls__('Enabled', 'LayerSlider'),
                'disabled' => ls__('Disabled', 'LayerSlider')
            )
        ),


        'mediaPoster' => array(
            'value' => '',
            'keys' => 'poster',
        ),


        'mediaFillMode' => array(
            'value' => 'cover',
            'name' => ls__('Fill mode', 'LayerSlider'),
            'keys' => 'fillmode',
            'options' => array(
                'contain'  => ls__('Contain', 'LayerSlider'),
                'cover'  => ls__('Cover', 'LayerSlider')
            )
        ),


        'mediaVolume' => array(
            'value' => '',
            'name' => ls__('Volume', 'LayerSlider'),
            'keys' => 'volume',
            'attrs' => array(
                'type' => 'number',
                'min' => 0,
                'max' => 100,
                'placeholder' => 'auto'
            )
        ),

        'mediaBackgroundVideo' => array(
            'value' => false,
            'name' => ls__('Use this video as slide background', 'LayerSlider'),
            'keys' => 'backgroundvideo',
            'tooltip' => ls__('Forces this layer to act like the slide background by covering the whole slider and ignoring some transitions. Please make sure to provide your own poster image with the option above, so the slider can display it immediately on page load.', 'LayerSlider')
        ),

        'mediaOverlay' => array(
            'value' => 'disabled',
            'name' => ls__('Choose an overlay image:', 'LayerSlider'),
            'keys' => 'overlay',
            'tooltip' => ls__('Cover your videos with an overlay image to have dotted or striped effects on them.', 'LayerSlider')
        ),


        'postTextLength' => array(
            'value' => '',
            'keys' => 'post_text_length',
            'props' => array(
                'meta' => true
            )
        ),


        // ======================= //
        // |  Animation options  | //
        // ======================= //
        'transition' => array('value' => '', 'keys' => 'transition', 'props' => array('meta' => true)),

        'transitionIn' => array(
            'value' => true,
            'keys' => 'transitionin'
        ),

        'transitionInOffsetX' => array(
            'value' => '0',
            'name' => ls__('OffsetX', 'LayerSlider'),
            'keys' => 'offsetxin',
            'tooltip' => ls__("Shifts the layer starting position from its original on the horizontal axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'left' or 'right' position the layer out the staging area, so it enters the scene from either side when animating to its destination location.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Enter the stage from left",
                "value": "left"
            }, {
                "name": "Enter the stage from right",
                "value": "right"
            }, {
                "name": "100% layer width",
                "value": "100lw"
            }, {
                "name": "-100% layer width",
                "value": "-100lw"
            }, {
                "name": "50% slider width",
                "value": "50sw"
            }, {
                "name": "-50% slider width",
                "value": "-50sw"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'transitionInOffsetY' => array(
            'value' => '0',
            'name' => ls__('OffsetY', 'LayerSlider'),
            'keys' => 'offsetyin',
            'tooltip' => ls__("Shifts the layer starting position from its original on the vertical axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the height of this layer. The values 'top' or 'bottom' position the layer out the staging area, so it enters the scene from either vertical side when animating to its destination location.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Enter the stage from top",
                "value": "top"
            }, {
                "name": "Enter the stage from bottom",
                "value": "bottom"
            }, {
                "name": "100% layer height",
                "value": "100lh"
            }, {
                "name": "-100% layer height",
                "value": "-100lh"
            }, {
                "name": "50% slider height",
                "value": "50sh"
            }, {
                "name": "-50% slider height",
                "value": "-50sh"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        // Duration of the transition in millisecs when a layer animates in.
        // Original: durationin
        // Defaults to: 1000 (ms) => 1sec
        'transitionInDuration' => array(
            'value' => 1000,
            'name' => ls__('Duration', 'LayerSlider'),
            'keys' => 'durationin',
            'tooltip' => ls__('The length of the transition in milliseconds when the layer enters the scene. A second equals to 1000 milliseconds.', 'LayerSlider'),
            'attrs' => array('min' => 0, 'step' => 50)
        ),

        // Delay before the transition in millisecs when a layer animates in.
        // Original: delayin
        // Defaults to: 0 (ms)
        'transitionInDelay' => array(
            'value' => 0,
            'name' => ls__('Start at', 'LayerSlider'),
            'keys' => 'delayin',
            'tooltip' => ls__('Delays the transition with the given amount of milliseconds before the layer enters the scene. A second equals to 1000 milliseconds.', 'LayerSlider'),
            'attrs' => array('min' => 0, 'step' => 50)
        ),

        // Easing of the transition when a layer animates in.
        // Original: easingin
        // Defaults to: 'easeInOutQuint'
        'transitionInEasing' => array(
            'value' => 'easeInOutQuint',
            'name' => ls__('Easing', 'LayerSlider'),
            'keys' => 'easingin',
            'tooltip' => ls__("The timing function of the animation. With this function you can manipulate the movement of the animated object. Please click on the link next to this select field to open easings.net for more information and real-time examples.", "LayerSlider")
        ),

        'transitionInFade' => array(
            'value' => true,
            'name' => ls__('Fade', 'LayerSlider'),
            'keys' => 'fadein',
            'tooltip' => ls__('Fade the layer during the transition.', 'LayerSlider'),
        ),

        // Initial rotation degrees when a layer animates in.
        // Original: rotatein
        // Defaults to: 0 (deg)
        'transitionInRotate' => array(
            'value' => 0,
            'name' => ls__('Rotate', 'LayerSlider'),
            'keys' => 'rotatein',
            'tooltip' => ls__('Rotates the layer by the given number of degrees. Negative values are allowed for counterclockwise rotation.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionInRotateX' => array(
            'value' => 0,
            'name' => ls__('RotateX', 'LayerSlider'),
            'keys' => 'rotatexin',
            'tooltip' => ls__('Rotates the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionInRotateY' => array(
            'value' => 0,
            'name' => ls__('RotateY', 'LayerSlider'),
            'keys' => 'rotateyin',
            'tooltip' => ls__('Rotates the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionInSkewX' => array(
            'value' => 0,
            'name' => ls__('SkewX', 'LayerSlider'),
            'keys' => 'skewxin',
            'tooltip' => ls__('Skews the layer along the X (horizontal) by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionInSkewY' => array(
            'value' => 0,
            'name' => ls__('SkewY', 'LayerSlider'),
            'keys' => 'skewyin',
            'tooltip' => ls__('Skews the layer along the Y (vertical) by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionInScaleX' => array(
            'value' => 1,
            'name' => ls__('ScaleX', 'LayerSlider'),
            'keys' => 'scalexin',
            'tooltip' => ls__("Scales the layer along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'transitionInScaleY' => array(
            'value' => 1,
            'name' => ls__('ScaleY', 'LayerSlider'),
            'keys' => 'scaleyin',
            'tooltip' => ls__("Scales the layer along the Y (vertical) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'transitionInTransformOrigin' => array(
            'value' => '50% 50% 0',
            'name' => ls__('Transform Origin', 'LayerSlider'),
            'keys' => 'transformoriginin',
            'tooltip' => ls__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center, slidercenter, slidermiddle, slidertop, sliderright, sliderbottom, sliderleft.', 'LayerSlider'),
        ),

        'transitionInClip' => array(
            'value' => '',
            'name' => ls__('Mask', 'LayerSlider'),
            'keys' => 'clipin',
            'tooltip' => ls__("Clips (cuts off) the sides of the layer by the given amount specified in pixels or percentages. The 4 value in order: top, right, bottom and the left side of the layer.", "LayerSlider"),
            'attrs' => array('data-options' => '[{
                "name": "From top",
                "value": "0 0 100% 0"
            }, {
                "name": "From right",
                "value": "0 0 0 100%"
            }, {
                "name": "From bottom",
                "value": "100% 0 0 0"
            }, {
                "name": "From left",
                "value": "0 100% 0 0"
            }]')
        ),

        'transitionInBGColor' => array(
            'value' => '',
            'name' => ls__('Background', 'LayerSlider'),
            'keys' => 'bgcolorin',
            'tooltip' => ls__("The background color of your layer. You can use color names, hexadecimal, RGB or RGBA values as well as the 'transparent' keyword. Example: #FFF", 'LayerSlider'),
        ),

        'transitionInColor' => array(
            'value' => '',
            'name' => ls__('Color', 'LayerSlider'),
            'keys' => 'colorin',
            'tooltip' => ls__("The color of your text. You can use color names, hexadecimal, RGB or RGBA values. Example: #333", 'LayerSlider'),
        ),

        'transitionInRadius' => array(
            'value' => '',
            'name' => ls__('Rounded Corners', 'LayerSlider'),
            'keys' => 'radiusin',
            'tooltip' => ls__('If you want rounded corners, you can set its radius here in pixels. Example: 5px', 'LayerSlider'),
        ),

        'transitionInWidth' => array(
            'value' => '',
            'name' => ls__('Width', 'LayerSlider'),
            'keys' => 'widthin',
            'tooltip' => ls__('The initial width of this layer from which it will be animated to its proper size during the transition.', 'LayerSlider'),
        ),

        'transitionInHeight' => array(
            'value' => '',
            'name' => ls__('Height', 'LayerSlider'),
            'keys' => 'heightin',
            'tooltip' => ls__('The initial height of this layer from which it will be animated to its proper size during the transition.', 'LayerSlider'),
        ),

        'transitionInFilter' => array(
            'value' => '',
            'name' => ls__('Filter', 'LayerSlider'),
            'keys' => 'filterin',
            'tooltip' => ls__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use. Click on the "Filter" link for more information.', 'LayerSlider'),
            'premium' => true,
            'attrs' => array(
                'data-options' => '[{
                    "name": "Blur",
                    "value": "blur(5px)"
                }, {
                    "name": "Brightness",
                    "value": "brightness(40%)"
                }, {
                    "name": "Contrast",
                    "value": "contrast(200%)"
                }, {
                    "name": "Grayscale",
                    "value": "grayscale(50%)"
                }, {
                    "name": "Hue-rotate",
                    "value": "hue-rotate(90deg)"
                }, {
                    "name": "Invert",
                    "value": "invert(75%)"
                }, {
                    "name": "Saturate",
                    "value": "saturate(30%)"
                }, {
                    "name": "Sepia",
                    "value": "sepia(60%)"
                }]'
            )
        ),

        'transitionInPerspective' => array(
            'value' => '500',
            'name' => ls__('Perspective', 'LayerSlider'),
            'keys' => 'transformperspectivein',
            'tooltip' => ls__('Changes the perspective of this layer in the 3D space.', 'LayerSlider')
        ),

        // ======

        'transitionOut' => array(
            'value' => true,
            'keys' => 'transitionout'
        ),

        'transitionOutOffsetX' => array(
            'value' => 0,
            'name' => ls__('OffsetX', 'LayerSlider'),
            'keys' => 'offsetxout',
            'tooltip' => ls__("Shifts the layer from its original position on the horizontal axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'left' or 'right' animate the layer out the staging area, so it can leave the scene on either side.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Leave the stage on left",
                "value": "left"
            }, {
                "name": "Leave the stage on right",
                "value": "right"
            }, {
                "name": "100% layer width",
                "value": "100lw"
            }, {
                "name": "-100% layer width",
                "value": "-100lw"
            }, {
                "name": "50% slider width",
                "value": "50sw"
            }, {
                "name": "-50% slider width",
                "value": "-50sw"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'transitionOutOffsetY' => array(
            'value' => 0,
            'name' => ls__('OffsetY', 'LayerSlider'),
            'keys' => 'offsetyout',
            'tooltip' => ls__("Shifts the layer from its original position on the vertical axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the height of this layer. The values 'top' or 'bottom' animate the layer out the staging area, so it can leave the scene on either vertical side.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Leave the stage on top",
                "value": "top"
            }, {
                "name": "Leave the stage on bottom",
                "value": "bottom"
            }, {
                "name": "100% layer height",
                "value": "100lh"
            }, {
                "name": "-100% layer height",
                "value": "-100lh"
            }, {
                "name": "50% slider height",
                "value": "50sh"
            }, {
                "name": "-50% slider height",
                "value": "-50sh"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        // Duration of the transition in millisecs when a layer animates out.
        // Original: durationout
        // Defaults to: 1000 (ms) => 1sec
        'transitionOutDuration' => array(
            'value' => 1000,
            'name' => ls__('Duration', 'LayerSlider'),
            'keys' => 'durationout',
            'tooltip' => ls__('The length of the transition in milliseconds when the layer leaves the slide. A second equals to 1000 milliseconds.', 'LayerSlider'),
            'attrs' => array('min' => 0, 'step' => 50)
        ),

        'showUntil' => array(
            'value' => '0',
            'keys' => 'showuntil'
        ),

        'transitionOutStartAt' => array(
            'value' => 'slidechangeonly',
            'name' => ls__('Start at', 'LayerSlider'),
            'keys' => 'startatout',
            'tooltip' => ls__('You can set the starting time of this transition. Use one of the pre-defined options to use relative timing, which can be shifted with custom operations.', 'LayerSlider'),
            'attrs' => array('type' => 'hidden')
        ),


        'transitionOutStartAtTiming' => array(
            'value' => 'slidechangeonly',
            'keys' => 'startatouttiming',
            'props' => array('meta' => true),
            'options' => array(
                'slidechangeonly' => ls__('Slide change starts (ignoring modifier)', 'LayerSlider'),
                'transitioninend' => ls__('Opening Transition completes', 'LayerSlider'),
                'textinstart' => ls__('Opening Text Transition starts', 'LayerSlider'),
                'textinend' => ls__('Opening Text Transition completes', 'LayerSlider'),
                'allinend' => ls__('Opening and Opening Text Transition complete', 'LayerSlider'),
                'loopstart' => ls__('Loop starts', 'LayerSlider'),
                'loopend' => ls__('Loop completes', 'LayerSlider'),
                'transitioninandloopend' => ls__('Opening and Loop Transitions complete', 'LayerSlider'),
                'textinandloopend' => ls__('Opening Text and Loop Transitions complete', 'LayerSlider'),
                'allinandloopend' => ls__('Opening, Opening Text and Loop Transitions complete', 'LayerSlider'),
                'textoutstart' => ls__('Ending Text Transition starts', 'LayerSlider'),
                'textoutend' => ls__('Ending Text Transition completes', 'LayerSlider'),
                'textoutandloopend' => ls__('Ending Text and Loop Transitions complete', 'LayerSlider')
            )
        ),

        'transitionOutStartAtOperator' => array(
            'value' => '+',
            'keys' => 'startatoutoperator',
            'props' => array('meta' => true),
            'options' => array('+', '-', '/', '*')
        ),

        'transitionOutStartAtValue' => array(
            'value' => 0,
            'keys' => 'startatoutvalue',
            'props' => array('meta' => true)
        ),

        // Easing of the transition when a layer animates out.
        // Original: easingout
        // Defaults to: 'easeInOutQuint'
        'transitionOutEasing' => array(
            'value' => 'easeInOutQuint',
            'name' => ls__('Easing', 'LayerSlider'),
            'keys' => 'easingout',
            'tooltip' => ls__("The timing function of the animation. With this function you can manipulate the movement of the animated object. Please click on the link next to this select field to open easings.net for more information and real-time examples.", "LayerSlider")
        ),

        'transitionOutFade' => array(
            'value' => true,
            'name' => ls__('Fade', 'LayerSlider'),
            'keys' => 'fadeout',
            'tooltip' => ls__('Fade the layer during the transition.', 'LayerSlider'),
        ),


        // Initial rotation degrees when a layer animates out.
        // Original: rotateout
        // Defaults to: 0 (deg)
        'transitionOutRotate' => array(
            'value' => 0,
            'name' => ls__('Rotate', 'LayerSlider'),
            'keys' => 'rotateout',
            'tooltip' => ls__('Rotates the layer by the given number of degrees. Negative values are allowed for counterclockwise rotation.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionOutRotateX' => array(
            'value' => 0,
            'name' => ls__('RotateX', 'LayerSlider'),
            'keys' => 'rotatexout',
            'tooltip' => ls__('Rotates the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionOutRotateY' => array(
            'value' => 0,
            'name' => ls__('RotateY', 'LayerSlider'),
            'keys' => 'rotateyout',
            'tooltip' => ls__('Rotates the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionOutSkewX' => array(
            'value' => 0,
            'name' => ls__('SkewX', 'LayerSlider'),
            'keys' => 'skewxout',
            'tooltip' => ls__('Skews the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionOutSkewY' => array(
            'value' => 0,
            'name' => ls__('SkewY', 'LayerSlider'),
            'keys' => 'skewyout',
            'tooltip' => ls__('Skews the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionOutScaleX' => array(
            'value' => 1,
            'name' => ls__('ScaleX', 'LayerSlider'),
            'keys' => 'scalexout',
            'tooltip' => ls__("Scales the layer along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'transitionOutScaleY' => array(
            'value' => 1,
            'name' => ls__('ScaleY', 'LayerSlider'),
            'keys' => 'scaleyout',
            'tooltip' => ls__("Scales the layer along the Y (vertical) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'transitionOutTransformOrigin' => array(
            'value' => '50% 50% 0',
            'name' => ls__('Transform Origin', 'LayerSlider'),
            'keys' => 'transformoriginout',
            'tooltip' => ls__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center, slidercenter, slidermiddle, slidertop, sliderright, sliderbottom, sliderleft.', 'LayerSlider'),
        ),

        'transitionOutClip' => array(
            'value' => '',
            'name' => ls__('Mask', 'LayerSlider'),
            'keys' => 'clipout',
            'tooltip' => ls__("Clips (cuts off) the sides of the layer by the given amount specified in pixels or percentages. The 4 value in order: top, right, bottom and the left side of the layer.", "LayerSlider"),
            'attrs' => array('data-options' => '[{
                "name": "From top",
                "value": "0 0 100% 0"
            }, {
                "name": "From right",
                "value": "0 0 0 100%"
            }, {
                "name": "From bottom",
                "value": "100% 0 0 0"
            }, {
                "name": "From left",
                "value": "0 100% 0 0"
            }]')
        ),

        'transitionOutFilter' => array(
            'value' => '',
            'name' => ls__('Filter', 'LayerSlider'),
            'keys' => 'filterout',
            'tooltip' => ls__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use. Click on the "Filter" link for more information.', 'LayerSlider'),
            'premium' => true,
            'attrs' => array(
                'data-options' => '[{
                    "name": "Blur",
                    "value": "blur(5px)"
                }, {
                    "name": "Brightness",
                    "value": "brightness(40%)"
                }, {
                    "name": "Contrast",
                    "value": "contrast(200%)"
                }, {
                    "name": "Grayscale",
                    "value": "grayscale(50%)"
                }, {
                    "name": "Hue-rotate",
                    "value": "hue-rotate(90deg)"
                }, {
                    "name": "Invert",
                    "value": "invert(75%)"
                }, {
                    "name": "Saturate",
                    "value": "saturate(30%)"
                }, {
                    "name": "Sepia",
                    "value": "sepia(60%)"
                }]'
            )
        ),

        'transitionOutPerspective' => array(
            'value' => '500',
            'name' => ls__('Perspective', 'LayerSlider'),
            'keys' => 'transformperspectiveout',
            'tooltip' => ls__('Changes the perspective of this layer in the 3D space.', 'LayerSlider')
        ),

        // -----

        'skipLayer' => array(
            'value' => false,
            'name' => ls__('Hidden', 'LayerSlider'),
            'keys' => 'skip',
            'tooltip' => ls__("If you don't want to use this layer, but you want to keep it, you can hide it with this switch.", "LayerSlider"),
            'props' => array(
                'meta' => true
            )
        ),

        'transitionOutBGColor' => array(
            'value' => '',
            'name' => ls__('Background', 'LayerSlider'),
            'keys' => 'bgcolorout',
            'tooltip' => ls__('Animates the background toward the color you specify here when the layer leaves the slider canvas.', 'LayerSlider'),
        ),

        'transitionOutColor' => array(
            'value' => '',
            'name' => ls__('Color', 'LayerSlider'),
            'keys' => 'colorout',
            'tooltip' => ls__('Animates the text color toward the color you specify here when the layer leaves the slider canvas.', 'LayerSlider'),
        ),

        'transitionOutRadius' => array(
            'value' => '',
            'name' => ls__('Rounded Corners', 'LayerSlider'),
            'keys' => 'radiusout',
            'tooltip' => ls__('Animates rounded corners toward the value you specify here when the layer leaves the slider canvas.', 'LayerSlider'),
        ),

        'transitionOutWidth' => array(
            'value' => '',
            'name' => ls__('Width', 'LayerSlider'),
            'keys' => 'widthout',
            'tooltip' => ls__('Animates the layer width toward the value you specify here when the layer leaves the slider canvas.', 'LayerSlider'),
        ),

        'transitionOutHeight' => array(
            'value' => '',
            'name' => ls__('Height', 'LayerSlider'),
            'keys' => 'heightout',
            'tooltip' => ls__('Animates the layer height toward the value you specify here when the layer leaves the slider canvas.', 'LayerSlider'),
        ),


        // == Compatibility ==
        'transitionInType' => array(
            'value' => 'auto',
            'keys' => 'slidedirection'
        ),
        'transitionOutType' => array(
            'value' => 'auto',
            'keys' => 'slideoutdirection'
        ),

        'transitionOutDelay' => array(
            'value' => 0,
            'keys' => 'delayout'
        ),

        'transitionInScale' => array(
            'value' => '1.0',
            'keys' => 'scalein'
        ),

        'transitionOutScale' => array(
            'value' => '1.0',
            'keys' => 'scaleout'
        ),



        // Text Animation IN
        // -----------------

        'textTransitionIn' => array(
            'value' => false,
            'keys' => 'texttransitionin'
        ),

        'textTypeIn' => array(
            'value' => 'chars_asc',
            'name' => ls__('Text Animation', 'LayerSlider'),
            'keys' => 'texttypein',
            'tooltip' => ls__('Select how your text should be split and animated.', 'LayerSlider'),
            'options' => array(
                'chars_asc'  => ls__('by chars ascending', 'LayerSlider'),
                'chars_desc' => ls__('by chars descending', 'LayerSlider'),
                'chars_rand' => ls__('by chars random', 'LayerSlider'),
                'chars_center' => ls__('by chars center to edge', 'LayerSlider'),
                'chars_edge' => ls__('by chars edge to center', 'LayerSlider'),
                'words_asc'  => ls__('by words ascending', 'LayerSlider'),
                'words_desc' => ls__('by words descending', 'LayerSlider'),
                'words_rand' => ls__('by words random', 'LayerSlider'),
                'words_center' => ls__('by words center to edge', 'LayerSlider'),
                'words_edge' => ls__('by words edge to center', 'LayerSlider'),
                'lines_asc'  => ls__('by lines ascending', 'LayerSlider'),
                'lines_desc' => ls__('by lines descending', 'LayerSlider'),
                'lines_rand' => ls__('by lines random', 'LayerSlider'),
                'lines_center' => ls__('by lines center to edge', 'LayerSlider'),
                'lines_edge' => ls__('by lines edge to center', 'LayerSlider'),
            ),
            'props' => array(
                'output' => true
            )
        ),

        'textShiftIn' => array(
            'value' => 50,
            'name' => ls__('Shift In', 'LayerSlider'),
            'tooltip' => ls__('Delays the transition of each text nodes relative to each other. A second equals to 1000 milliseconds.', 'LayerSlider'),
            'keys'  => 'textshiftin',
            'attrs' => array('type' => 'number')
        ),

        'textOffsetXIn' => array(
            'value' => 0,
            'name' => ls__('OffsetX', 'LayerSlider'),
            'tooltip' => ls__("Shifts the starting position of text nodes from their original on the horizontal axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'left' or 'right' position text nodes out the staging area, so they enter the scene from either side when animating to their destination location. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.", "LayerSlider"),
            'keys'  => 'textoffsetxin',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Enter the stage from left",
                "value": "left"
            }, {
                "name": "Enter the stage from right",
                "value": "right"
            }, {
                "name": "100% layer width",
                "value": "100lw"
            }, {
                "name": "-100% layer width",
                "value": "-100lw"
            }, {
                "name": "50% slider width",
                "value": "50sw"
            }, {
                "name": "-50% slider width",
                "value": "-50sw"
            }, {
                "name": "Cycle between values",
                "value": "50|-50"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'textOffsetYIn' => array(
            'value' => 0,
            'name' => ls__('OffsetY', 'LayerSlider'),
            'tooltip' => ls__("Shifts the starting position of text nodes from their original on the vertical axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'top' or 'bottom' position text nodes out the staging area, so they enter the scene from either vertical side when animating to their destination location. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.", "LayerSlider"),
            'keys'  => 'textoffsetyin',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Enter the stage from top",
                "value": "top"
            }, {
                "name": "Enter the stage from bottom",
                "value": "bottom"
            }, {
                "name": "100% layer height",
                "value": "100lh"
            }, {
                "name": "-100% layer height",
                "value": "-100lh"
            }, {
                "name": "50% slider height",
                "value": "50sh"
            }, {
                "name": "-50% slider height",
                "value": "-50sh"
            }, {
                "name": "Cycle between values",
                "value": "50|-50"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'textDurationIn' => array(
            'value' => 1000,
            'name' => ls__('Duration', 'LayerSlider'),
            'tooltip' => ls__('The transition length in milliseconds of the individual text fragments. A second equals to 1000 milliseconds.', 'LayerSlider'),
            'keys'  => 'textdurationin',
            'attrs' => array('min' => 0, 'step' => 50)
        ),

        'textEasingIn' => array(
            'value' => 'easeInOutQuint',
            'name' => ls__('Easing', 'LayerSlider'),
            'tooltip' => ls__("The timing function of the animation. With this function you can manipulate the movement of animated text fragments. Please click on the link next to this select field to open easings.net for more information and real-time examples.", "LayerSlider"),
            'keys'  => 'texteasingin',
        ),

        'textFadeIn' => array(
            'value' => true,
            'name' => ls__('Fade', 'LayerSlider'),
            'tooltip' => ls__('Fade the text fragments during their transition.', 'LayerSlider'),
            'keys'  => 'textfadein'
        ),

        'textStartAtIn' => array(
            'value' => 'transitioninend',
            'name' => ls__('StartAt', 'LayerSlider'),
            'tooltip' => ls__('You can set the starting time of this transition. Use one of the pre-defined options to use relative timing, which can be shifted with custom operations.', 'LayerSlider'),
            'keys'  => 'textstartatin',
            'attrs' => array('type' => 'hidden')
        ),

        'textStartAtInTiming' => array(
            'value' => 'transitioninend',
            'keys'  => 'textstartatintiming',
            'props' => array('meta' => true),
            'options' => array(
                'transitioninstart' => ls__('Opening Transition starts', 'LayerSlider'),
                'transitioninend' => ls__('Opening Transition completes', 'LayerSlider'),
                'loopstart' => ls__('Loop starts', 'LayerSlider'),
                'loopend' => ls__('Loop completes', 'LayerSlider'),
                'transitioninandloopend' => ls__('Opening and Loop Transitions complete', 'LayerSlider')
            )
        ),

        'textStartAtInOperator' => array(
            'value' => '+',
            'keys'  => 'textstartatinoperator',
            'props' => array('meta' => true),
            'options' => array('+', '-', '/', '*')
        ),

        'textStartAtInValue' => array(
            'value' => 0,
            'keys'  => 'textstartatinvalue',
            'props' => array('meta' => true)
        ),



        'textRotateIn' => array(
            'value' => 0,
            'name' => ls__('Rotate', 'LayerSlider'),
            'tooltip' => ls__('Rotates text fragments clockwise by the given number of degrees. Negative values are allowed for counterclockwise rotation. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.', 'LayerSlider'),
            'keys'  => 'textrotatein',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textRotateXIn' => array(
            'value' => 0,
            'name' => ls__('RotateX', 'LayerSlider'),
            'tooltip' => ls__('Rotates text fragments along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.', 'LayerSlider'),
            'keys'  => 'textrotatexin',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textRotateYIn' => array(
            'value' => 0,
            'name' => ls__('RotateY', 'LayerSlider'),
            'tooltip' => ls__('Rotates text fragments along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.', 'LayerSlider'),
            'keys'  => 'textrotateyin',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textScaleXIn' => array(
            'value' => 1,
            'name' => ls__('ScaleX', 'LayerSlider'),
            'keys'  => 'textscalexin',
            'tooltip' => ls__("Scales text fragments along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks text fragments compared to their original size. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'textScaleYIn' => array(
            'value' => 1,
            'name' => ls__('ScaleY', 'LayerSlider'),
            'keys'  => 'textscaleyin',
            'tooltip' => ls__("Scales text fragments along the Y (vertical) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks text fragments compared to their original size. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'textSkewXIn' => array(
            'value' => 0,
            'name' => ls__('SkewX', 'LayerSlider'),
            'tooltip' => ls__('Skews text fragments along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.', 'LayerSlider'),
            'keys'  => 'textskewxin',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textSkewYIn' => array(
            'value' => 0,
            'name' => ls__('SkewY', 'LayerSlider'),
            'tooltip' => ls__('Skews text fragments along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.', 'LayerSlider'),
            'keys'  => 'textskewyin',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),



        'textTransformOriginIn' => array(
            'value' => '50% 50% 0',
            'name' => ls__('Transform Origin', 'LayerSlider'),
            'tooltip' => ls__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center, slidercenter, slidermiddle, slidertop, sliderright, sliderbottom, sliderleft.', 'LayerSlider'),
            'keys'  => 'texttransformoriginin',
            'attrs' => array('data-options' => '[{
                "name": "Cycle between values",
                "value": "50% 50% 0|100% 100% 0"
            }]')
        ),

        'textPerspectiveIn' => array(
            'value' => '500',
            'name' => ls__('Perspective', 'LayerSlider'),
            'keys' => 'texttransformperspectivein',
            'tooltip' => ls__('Changes the perspective of this layer in the 3D space.', 'LayerSlider')
        ),




        // Text Animation OUT
        // -----------------

        'textTransitionOut' => array(
            'value' => false,
            'keys' => 'texttransitionout'
        ),

        'textTypeOut' => array(
            'value' => 'chars_desc',
            'name' => ls__('Text Animation', 'LayerSlider'),
            'keys' => 'texttypeout',
            'tooltip' => ls__('Select how your text should be split and animated.', 'LayerSlider'),
            'options' => array(
                'chars_asc'  => ls__('by chars ascending', 'LayerSlider'),
                'chars_desc' => ls__('by chars descending', 'LayerSlider'),
                'chars_rand' => ls__('by chars random', 'LayerSlider'),
                'chars_center' => ls__('by chars center to edge', 'LayerSlider'),
                'chars_edge' => ls__('by chars edge to center', 'LayerSlider'),
                'words_asc'  => ls__('by words ascending', 'LayerSlider'),
                'words_desc' => ls__('by words descending', 'LayerSlider'),
                'words_rand' => ls__('by words random', 'LayerSlider'),
                'words_center' => ls__('by words center to edge', 'LayerSlider'),
                'words_edge' => ls__('by words edge to center', 'LayerSlider'),
                'lines_asc'  => ls__('by lines ascending', 'LayerSlider'),
                'lines_desc' => ls__('by lines descending', 'LayerSlider'),
                'lines_rand' => ls__('by lines random', 'LayerSlider'),
                'lines_center' => ls__('by lines center to edge', 'LayerSlider'),
                'lines_edge' => ls__('by lines edge to center', 'LayerSlider'),
            ),
            'props' => array(
                'output' => true
            )
        ),

        'textShiftOut' => array(
            'value' => '',
            'name' => ls__('Shift Out', 'LayerSlider'),
            'tooltip' => ls__('Delays the transition of each text nodes relative to each other. A second equals to 1000 milliseconds.', 'LayerSlider'),
            'keys'  => 'textshiftout',
            'attrs' => array('type' => 'number')
        ),

        'textOffsetXOut' => array(
            'value' => 0,
            'name' => ls__('OffsetX', 'LayerSlider'),
            'tooltip' => ls__("Shifts the ending position of text nodes from their original on the horizontal axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'left' or 'right' position text nodes out the staging area, so they leave the scene from either side when animating to their destination location. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.", "LayerSlider"),
            'keys'  => 'textoffsetxout',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Leave the stage on left",
                "value": "left"
            }, {
                "name": "Leave the stage on right",
                "value": "right"
            }, {
                "name": "100% layer width",
                "value": "100lw"
            }, {
                "name": "-100% layer width",
                "value": "-100lw"
            }, {
                "name": "50% slider width",
                "value": "50sw"
            }, {
                "name": "-50% slider width",
                "value": "-50sw"
            }, {
                "name": "Cycle between values",
                "value": "50|-50"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'textOffsetYOut' => array(
            'value' => 0,
            'name' => ls__('OffsetY', 'LayerSlider'),
            'tooltip' => ls__("Shifts the ending position of text nodes from their original on the vertical axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'top' or 'bottom' position text nodes out the staging area, so they leave the scene from either vertical side when animating to their destination location. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.", "LayerSlider"),
            'keys'  => 'textoffsetyout',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Leave the stage on top",
                "value": "top"
            }, {
                "name": "Leave the stage on bottom",
                "value": "bottom"
            }, {
                "name": "100% layer height",
                "value": "100lh"
            }, {
                "name": "-100% layer height",
                "value": "-100lh"
            }, {
                "name": "50% slider height",
                "value": "50sh"
            }, {
                "name": "-50% slider height",
                "value": "-50sh"
            }, {
                "name": "Cycle between values",
                "value": "50|-50"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'textDurationOut' => array(
            'value' => 1000,
            'name' => ls__('Duration', 'LayerSlider'),
            'tooltip' => ls__('The transition length in milliseconds of the individual text fragments. A second equals to 1000 milliseconds.', 'LayerSlider'),
            'keys'  => 'textdurationout',
            'attrs' => array('min' => 0, 'step' => 50)
        ),

        'textEasingOut' => array(
            'value' => 'easeInOutQuint',
            'name' => ls__('Easing', 'LayerSlider'),
            'tooltip' => ls__("The timing function of the animation. With this function you can manipulate the movement of animated text fragments. Please click on the link next to this select field to open easings.net for more information and real-time examples.", "LayerSlider"),
            'keys'  => 'texteasingout',
            'attrs' => array('type' => 'hidden')
        ),

        'textFadeOut' => array(
            'value' => true,
            'name' => ls__('Fade', 'LayerSlider'),
            'tooltip' => ls__('Fade the text fragments during their transition.', 'LayerSlider'),
            'keys'  => 'textfadeout'
        ),

        'textStartAtOut' => array(
            'value' => 'allinandloopend',
            'name' => ls__('StartAt', 'LayerSlider'),
            'tooltip' => ls__('You can set the starting time of this transition. Use one of the pre-defined options to use relative timing, which can be shifted with custom operations.', 'LayerSlider'),
            'keys'  => 'textstartatout',
            'attrs' => array('type' => 'hidden')
        ),

        'textStartAtOutTiming' => array(
            'value' => 'allinandloopend',
            'keys'  => 'textstartatouttiming',
            'props' => array('meta' => true),
            'options' => array(
                'transitioninend' => ls__('Opening Transition completes', 'LayerSlider'),
                'textinstart' => ls__('Opening Text Transition starts', 'LayerSlider'),
                'textinend' => ls__('Opening Text Transition completes', 'LayerSlider'),
                'allinend' => ls__('Opening and Opening Text Transition complete', 'LayerSlider'),
                'loopstart' => ls__('Loop starts', 'LayerSlider'),
                'loopend' => ls__('Loop completes', 'LayerSlider'),
                'transitioninandloopend' => ls__('Opening and Loop Transitions complete', 'LayerSlider'),
                'textinandloopend' => ls__('Opening Text and Loop Transitions complete', 'LayerSlider'),
                'allinandloopend' => ls__('Opening, Opening Text and Loop Transitions complete', 'LayerSlider')
            )
        ),

        'textStartAtOutOperator' => array(
            'value' => '+',
            'keys'  => 'textstartatoutoperator',
            'props' => array('meta' => true),
            'options' => array('+', '-', '/', '*')
        ),

        'textStartAtOutValue' => array(
            'value' => 0,
            'keys'  => 'textstartatoutvalue',
            'props' => array('meta' => true)
        ),

        'textRotateOut' => array(
            'value' => 0,
            'name' => ls__('Rotate', 'LayerSlider'),
            'tooltip' => ls__('Rotates text fragments clockwise by the given number of degrees. Negative values are allowed for counterclockwise rotation. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.', 'LayerSlider'),
            'keys'  => 'textrotateout',
            'attrs' => array('type' => 'text', 'data-options' => '[{
            "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textRotateXOut' => array(
            'value' => 0,
            'name' => ls__('RotateX', 'LayerSlider'),
            'tooltip' => ls__('Rotates text fragments along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.', 'LayerSlider'),
            'keys'  => 'textrotatexout',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textRotateYOut' => array(
            'value' => 0,
            'name' => ls__('RotateY', 'LayerSlider'),
            'tooltip' => ls__('Rotates text fragments along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.', 'LayerSlider'),
            'keys'  => 'textrotateyout',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textScaleXOut' => array(
            'value' => 1,
            'name' => ls__('ScaleX', 'LayerSlider'),
            'keys'  => 'textscalexout',
            'tooltip' => ls__("Scales text fragments along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks text fragments compared to their original size. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'textScaleYOut' => array(
            'value' => 1,
            'name' => ls__('ScaleY', 'LayerSlider'),
            'keys'  => 'textscaleyout',
            'tooltip' => ls__("Scales text fragments along the Y (vertical) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks text fragments compared to their original size. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'textSkewXOut' => array(
            'value' => 0,
            'name' => ls__('SkewX', 'LayerSlider'),
            'tooltip' => ls__('Skews text fragments along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.', 'LayerSlider'),
            'keys'  => 'textskewxout',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textSkewYOut' => array(
            'value' => 0,
            'name' => ls__('SkewY', 'LayerSlider'),
            'tooltip' => ls__('Skews text fragments along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the slider will use different transition variations on each text node by cycling between the provided values.', 'LayerSlider'),
            'keys'  => 'textskewyout',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),



        'textTransformOriginOut' => array(
            'value' => '50% 50% 0',
            'name' => ls__('Transform Origin', 'LayerSlider'),
            'tooltip' => ls__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center, slidercenter, slidermiddle, slidertop, sliderright, sliderbottom, sliderleft.', 'LayerSlider'),
            'keys'  => 'texttransformoriginout',
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "50% 50% 0|100% 100% 0"
            }]')
        ),


        'textPerspectiveOut' => array(
            'value' => '500',
            'name' => ls__('Perspective', 'LayerSlider'),
            'keys' => 'texttransformperspectiveout',
            'tooltip' => ls__('Changes the perspective of this layer in the 3D space.', 'LayerSlider')
        ),







        // ======


        // LOOP

        'loop' => array(
            'value' => false,
            'keys' => 'loop'
        ),

        'loopOffsetX' => array(
            'value' => 0,
            'name' => ls__('OffsetX', 'LayerSlider'),
            'keys' => 'loopoffsetx',
            'tooltip' => ls__("Shifts the layer starting position from its original on the horizontal axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'left' or 'right' position the layer out the staging area, so it can leave and re-enter the scene from either side during the transition.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Move out of stage on left",
                "value": "left"
            }, {
                "name": "Move out of stage on right",
                "value": "right"
            }, {
                "name": "100% layer width",
                "value": "100lw"
            }, {
                "name": "-100% layer width",
                "value": "-100lw"
            }, {
                "name": "50% slider width",
                "value": "50sw"
            }, {
                "name": "-50% slider width",
                "value": "-50sw"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'loopOffsetY' => array(
            'value' => 0,
            'name' => ls__('OffsetY', 'LayerSlider'),
            'keys' => 'loopoffsety',
            'tooltip' => ls__("Shifts the layer starting position from its original on the vertical axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the height of this layer. The values 'top' or 'bottom' position the layer out the staging area, so it can leave and re-enter the scene from either vertical side during the transition.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Move out of stage on top",
                "value": "top"
            }, {
                "name": "Move out of stage on bottom",
                "value": "bottom"
            }, {
                "name": "100% layer height",
                "value": "100lh"
            }, {
                "name": "-100% layer height",
                "value": "-100lh"
            }, {
                "name": "50% slider height",
                "value": "50sh"
            }, {
                "name": "-50% slider height",
                "value": "-50sh"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'loopDuration' => array(
            'value' => 1000,
            'name' => ls__('Duration', 'LayerSlider'),
            'keys' => 'loopduration',
            'tooltip' => ls__('The length of the transition in milliseconds. A second is equal to 1000 milliseconds.', 'LayerSlider'),
            'attrs' => array('min' => 0, 'step' => 100)
        ),

        'loopStartAt' => array(
            'value' => 'allinend',
            'name' => ls__('Start at', 'LayerSlider'),
            'keys' => 'loopstartat',
            'tooltip' => ls__('You can set the starting time of this transition. Use one of the pre-defined options to use relative timing, which can be shifted with custom operations.', 'LayerSlider'),
            'attrs' => array('type' => 'hidden', 'step' => 100),
        ),

        'loopStartAtTiming' => array(
            'value' => 'allinend',
            'keys'  => 'loopstartattiming',
            'props' => array('meta' => true),
            'options' => array(
                'transitioninstart' => ls__('Opening Transition starts', 'LayerSlider'),
                'transitioninend' => ls__('Opening Transition completes', 'LayerSlider'),
                'textinstart' => ls__('Opening Text Transition starts', 'LayerSlider'),
                'textinend' => ls__('Opening Text Transition completes', 'LayerSlider'),
                'allinend' => ls__('Opening and Opening Text Transition complete', 'LayerSlider')
            )
        ),

        'loopStartAtOperator' => array(
            'value' => '+',
            'keys'  => 'loopstartatoperator',
            'props' => array('meta' => true),
            'options' => array('+', '-', '/', '*')
        ),

        'loopStartAtValue' => array(
            'value' => 0,
            'keys'  => 'loopstartatvalue',
            'props' => array('meta' => true)
        ),

        'loopEasing' => array(
            'value' => 'linear',
            'name' => ls__('Easing', 'LayerSlider'),
            'keys' => 'loopeasing',
            'tooltip' => ls__("The timing function of the animation to manipualte the layer's movement. Click on the link next to this field to open easings.net for examples and more information", "LayerSlider")
        ),

        'loopOpacity' => array(
            'value' => 1,
            'name' => ls__('Opacity', 'LayerSlider'),
            'keys' => 'loopopacity',
            'tooltip' => ls__('Fades the layer. You can use values between 1 and 0 to set the layer fully opaque or transparent respectively. For example, the value 0.5 will make the layer semi-transparent.', 'LayerSlider'),
            'attrs' => array('min' => 0, 'max' => 1, 'step' => 0.01)
        ),

        'loopRotate' => array(
            'value' => 0,
            'name' => ls__('Rotate', 'LayerSlider'),
            'keys' => 'looprotate',
            'tooltip' => ls__('Rotates the layer by the given number of degrees. Negative values are allowed for counterclockwise rotation.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'loopRotateX' => array(
            'value' => 0,
            'name' => ls__('RotateX', 'LayerSlider'),
            'keys' => 'looprotatex',
            'tooltip' => ls__('Rotates the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'loopRotateY' => array(
            'value' => 0,
            'name' => ls__('RotateY', 'LayerSlider'),
            'keys' => 'looprotatey',
            'tooltip' => ls__('Rotates the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'loopSkewX' => array(
            'value' => 0,
            'name' => ls__('SkewX', 'LayerSlider'),
            'keys' => 'loopskewx',
            'tooltip' => ls__('Skews the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'loopSkewY' => array(
            'value' => 0,
            'name' => ls__('SkewY', 'LayerSlider'),
            'keys' => 'loopskewy',
            'tooltip' => ls__('Skews the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'loopScaleX' => array(
            'value' => 1,
            'name' => ls__('ScaleX', 'LayerSlider'),
            'keys' => 'loopscalex',
            'tooltip' => ls__("Scales the layer along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'loopScaleY' => array(
            'value' => 1,
            'name' => ls__('ScaleY', 'LayerSlider'),
            'keys' => 'loopscaley',
            'tooltip' => ls__("Scales the layer along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'loopTransformOrigin' => array(
            'value' => '50% 50% 0',
            'name' => ls__('Transform Origin', 'LayerSlider'),
            'keys' => 'looptransformorigin',
            'tooltip' => ls__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center, slidercenter, slidermiddle, slidertop, sliderright, sliderbottom, sliderleft.', 'LayerSlider')
        ),

        'loopClip' => array(
            'value' => '',
            'name' => ls__('Mask', 'LayerSlider'),
            'keys' => 'loopclip',
            'tooltip' => ls__('Clips (cuts off) the sides of the layer by the given amount specified in pixels or percentages. The 4 value in order: top, right, bottom and the left side of the layer.', 'LayerSlider'),
            'attrs' => array('data-options' => '[{
                "name": "From top",
                "value": "0 0 100% 0"
            }, {
                "name": "From right",
                "value": "0 0 0 100%"
            }, {
                "name": "From bottom",
                "value": "100% 0 0 0"
            }, {
                "name": "From left",
                "value": "0 100% 0 0"
            }]')
        ),

        'loopCount' => array(
            'value' => 1,
            'name' => ls__('Count', 'LayerSlider'),
            'keys' => 'loopcount',
            'tooltip' => ls__('The number of times repeating the Loop transition. The count includes the reverse part of the transitions when you use the Yoyo feature. Use the value -1 to repeat infinitely or zero to disable looping.', 'LayerSlider'),
            'attrs' => array(
                'step' => 1,
                'data-options' => '[{
                    "name": "Infinite",
                    "value": -1
                }]'
            ),
            'props' => array(
                'output' => true
            )
        ),

        'loopWait' => array(
            'value' => 0,
            'name' => ls__('Wait', 'LayerSlider'),
            'keys' => 'looprepeatdelay',
            'tooltip' => ls__('Waiting time between repeats in milliseconds. A second is 1000 milliseconds.', 'LayerSlider'),
            'attrs' => array('min' => 0, 'step' => 100)
        ),

        'loopYoyo' => array(
            'value' => false,
            'name' => ls__('Yoyo', 'LayerSlider'),
            'keys' => 'loopyoyo',
            'tooltip' => ls__('Enable this option to allow reverse transition, so you can loop back and forth seamlessly.', 'LayerSlider')
        ),

        'loopPerspective' => array(
            'value' => '500',
            'name' => ls__('Perspective', 'LayerSlider'),
            'keys' => 'looptransformperspective',
            'tooltip' => ls__('Changes the perspective of this layer in the 3D space.', 'LayerSlider')
        ),

        'loopFilter' => array(
            'value' => '',
            'name' => ls__('Filter', 'LayerSlider'),
            'keys' => 'loopfilter',
            'tooltip' => ls__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use. Click on the "Filter" link for more information.', 'LayerSlider'),
            'premium' => true,
            'attrs' => array(
                'data-options' => '[{
                    "name": "Blur",
                    "value": "blur(5px)"
                }, {
                    "name": "Brightness",
                    "value": "brightness(40%)"
                }, {
                    "name": "Contrast",
                    "value": "contrast(200%)"
                }, {
                    "name": "Grayscale",
                    "value": "grayscale(50%)"
                }, {
                    "name": "Hue-rotate",
                    "value": "hue-rotate(90deg)"
                }, {
                    "name": "Invert",
                    "value": "invert(75%)"
                }, {
                    "name": "Saturate",
                    "value": "saturate(30%)"
                }, {
                    "name": "Sepia",
                    "value": "sepia(60%)"
                }]'
            )
        ),





        // HOVER

        'hover' => array(
            'value' => false,
            'keys' => 'hover'
        ),


        'hoverOffsetX' => array(
            'value' => 0,
            'name' => ls__('OffsetX', 'LayerSlider'),
            'keys' => 'hoveroffsetx',
            'tooltip' => ls__("Moves the layer horizontally by the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. ", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "20% layer width",
                "value": "20lw"
            }, {
                "name": "-20% layer width",
                "value": "-20lw"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'hoverOffsetY' => array(
            'value' => 0,
            'name' => ls__('OffsetY', 'LayerSlider'),
            'keys' => 'hoveroffsety',
            'tooltip' => ls__("Moves the layer vertically by the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. ", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "20% layer height",
                "value": "20lh"
            }, {
                "name": "-20% layer height",
                "value": "-20lh"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'hoverInDuration' => array(
            'value' => 500,
            'name' => ls__('Duration', 'LayerSlider'),
            'keys' => 'hoverdurationin',
            'tooltip' => ls__('The length of the transition in milliseconds. A second is equal to 1000 milliseconds.', 'LayerSlider'),
            'attrs' => array('min' => 0, 'step' => 100)
        ),

        'hoverOutDuration' => array(
            'value' => '',
            'name' => ls__('Reverse<br>duration', 'LayerSlider'),
            'keys' => 'hoverdurationout',
            'tooltip' => ls__('The duration of the reverse transition in milliseconds. A second is equal to 1000 milliseconds.', 'LayerSlider'),
            'attrs' => array('min' => 0, 'step' => 100, 'placeholder' => 'same')
        ),

        'hoverInEasing' => array(
            'value' => 'easeInOutQuint',
            'name' => ls__('Easing', 'LayerSlider'),
            'keys' => 'hovereasingin',
            'tooltip' => ls__("The timing function of the animation to manipualte the layer's movement. Click on the link next to this field to open easings.net for examples and more information", "LayerSlider")
        ),

        'hoverOutEasing' => array(
            'value' => '',
            'name' => ls__('Reverse<br>easing', 'LayerSlider'),
            'keys' => 'hovereasingout',
            'tooltip' => ls__("The timing function of the reverse animation to manipualte the layer's movement. Click on the link next to this field to open easings.net for examples and more information", "LayerSlider"),
            'attrs' => array('placeholder' => 'same')
        ),

        'hoverOpacity' => array(
            'value' => '',
            'name' => ls__('Opacity', 'LayerSlider'),
            'keys' => 'hoveropacity',
            'tooltip' => ls__('Fades the layer. You can use values between 1 and 0 to set the layer fully opaque or transparent respectively. For example, the value 0.5 will make the layer semi-transparent.', 'LayerSlider'),
            'attrs' => array(
                'min' => 0,
                'max' => 1,
                'step' => 0.1
            )
        ),

        'hoverRotate' => array(
            'value' => 0,
            'name' => ls__('Rotate', 'LayerSlider'),
            'keys' => 'hoverrotate',
            'tooltip' => ls__('Rotates the layer clockwise by the given number of degrees. Negative values are allowed for counterclockwise rotation.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'hoverRotateX' => array(
            'value' => 0,
            'name' => ls__('RotateX', 'LayerSlider'),
            'keys' => 'hoverrotatex',
            'tooltip' => ls__('Rotates the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'hoverRotateY' => array(
            'value' => 0,
            'name' => ls__('RotateY', 'LayerSlider'),
            'keys' => 'hoverrotatey',
            'tooltip' => ls__('Rotates the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'hoverSkewX' => array(
            'value' => 0,
            'name' => ls__('SkewX', 'LayerSlider'),
            'keys' => 'hoverskewx',
            'tooltip' => ls__('Skews the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'hoverSkewY' => array(
            'value' => 0,
            'name' => ls__('SkewY', 'LayerSlider'),
            'keys' => 'hoverskewy',
            'tooltip' => ls__('Skews the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.', 'LayerSlider'),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'hoverScaleX' => array(
            'value' => 1,
            'name' => ls__('ScaleX', 'LayerSlider'),
            'keys' => 'hoverscalex',
            'tooltip' => ls__("Scales the layer along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'hoverScaleY' => array(
            'value' => 1,
            'name' => ls__('ScaleY', 'LayerSlider'),
            'keys' => 'hoverscaley',
            'tooltip' => ls__("Scales the layer along the Y (vertical) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size.", "LayerSlider"),
            'attrs' => array('type' => 'text', 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'hoverTransformOrigin' => array(
            'value' => '50% 50% 0',
              'attrs' => array('placeholder' => 'inherit'),
            'name' => ls__('Transform Origin', 'LayerSlider'),
            'keys' => 'hovertransformorigin',
            'tooltip' => ls__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center.', 'LayerSlider'),
        ),

        'hoverBGColor' => array(
            'value' => '',
            'name' => ls__('Background', 'LayerSlider'),
            'keys' => 'hoverbgcolor',
            'tooltip' => ls__("The background color of this layer. You can use color names, hexadecimal, RGB or RGBA values as well as the 'transparent' keyword. Example: #FFF", "LayerSlider")
        ),

        'hoverColor' => array(
            'value' => '',
            'name' => ls__('Color', 'LayerSlider'),
            'keys' => 'hovercolor',
            'tooltip' => ls__('The text color of this text. You can use color names, hexadecimal, RGB or RGBA values. Example: #333', 'LayerSlider')
        ),

        'hoverBorderRadius' => array(
            'value' => '',
            'name' => ls__('Rounded corners', 'LayerSlider'),
            'keys' => 'hoverborderradius',
            'tooltip' => ls__('If you want rounded corners, you can set here its radius in pixels. Example: 5px', 'LayerSlider')
        ),

        'hoverTransformPerspective' => array(
            'value' => 500,
            'name' => ls__('Perspective', 'LayerSlider'),
            'keys' => 'hovertransformperspective',
            'tooltip' => ls__('Changes the perspective of layers in the 3D space.', 'LayerSlider')
        ),

        'hoverTopOn' => array(
            'value' => true,
            'name' => ls__('Always on top', 'LayerSlider'),
            'keys' => 'hoveralwaysontop',
            'tooltip' => ls__('Show this layer above every other layer while hovering.', 'LayerSlider')
        ),





        // Parallax
        'parallax' => array(
            'value' => false,
            'keys' => 'parallax'
        ),

        'parallaxLevel' => array(
            'value' => 10,
            'name' => ls__('Parallax Level', 'LayerSlider'),
            'tooltip' => ls__('Set the intensity of the parallax effect. Use negative values to shift layers in the opposite direction.', 'LayerSlider'),
            'keys' => 'parallaxlevel',
            'props' => array(
                'output' => true
            )
        ),

        'parallaxType' => array(
            'value' => 'inherit',
            'name' => ls__('Type', 'LayerSlider'),
            'tooltip' => ls__('Choose if you want 2D or 3D parallax layers.', 'LayerSlider'),
            'keys' => 'parallaxtype',
            'options' => array(
                'inherit' => ls__('Inherit from Slide Options', 'LayerSlider'),
                '2d' => ls__('2D', 'LayerSlider'),
                '3d' => ls__('3D', 'LayerSlider')
             )
        ),

        'parallaxEvent' => array(
            'value' => 'inherit',
            'name' => ls__('Event', 'LayerSlider'),
            'tooltip' => ls__('You can trigger the parallax effect by either scrolling the page, or by moving your mouse cursor / tilting your mobile device.', 'LayerSlider'),
            'keys' => 'parallaxevent',
            'options' => array(
                'inherit' => ls__('Inherit from Slide Options', 'LayerSlider'),
                'cursor' => ls__('Cursor or Tilt', 'LayerSlider'),
                'scroll' => ls__('Scroll', 'LayerSlider')
             )
        ),

        'parallaxAxis' => array(
            'value' => 'inherit',
            'name' => ls__('Axes', 'LayerSlider'),
            'tooltip' => ls__('Choose on which axes parallax layers should move.', 'LayerSlider'),
            'keys' => 'parallaxaxis',
            'options' => array(
                'inherit' => ls__('Inherit from Slide Options', 'LayerSlider'),
                'none' => ls__('None', 'LayerSlider'),
                'both' => ls__('Both', 'LayerSlider'),
                'x' => ls__('Horizontal only', 'LayerSlider'),
                'y' => ls__('Vertical only', 'LayerSlider')
            )
        ),


        'parallaxTransformOrigin' => array(
            'value' => '',
            'name' => ls__('Transform Origin', 'LayerSlider'),
            'tooltip' => ls__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center.', 'LayerSlider'),
            'keys' => 'parallaxtransformorigin',
            'attrs' => array(
                'placeholder' => 'Inherit from Slide Options'
            )
        ),

        'parallaxDurationMove' => array(
            'value' => '',
            'name' => ls__('Move Duration', 'LayerSlider'),
            'tooltip' => ls__('Controls the speed of animating layers when you move your mouse cursor or tilt your mobile device.', 'LayerSlider'),
            'keys' => 'parallaxdurationmove',
            'attrs' => array(
                'type' => 'number',
                'step' => 100,
                'min' => 0,
                'placeholder' => 'Inherit from Slide Options'
            )
        ),

        'parallaxDurationLeave' => array(
            'value' => '',
            'name' => ls__('Leave Duration', 'LayerSlider'),
            'tooltip' => ls__('Controls how quickly parallax layers revert to their original position when you move your mouse cursor outside of the slider. This value is in milliseconds. A second equals to 1000 milliseconds.', 'LayerSlider'),
            'keys' => 'parallaxdurationleave',
            'attrs' => array(
                'type' => 'number',
                'step' => 100,
                'min' => 0,
                'placeholder' => 'Inherit from Slide Options'
            )
        ),

        'parallaxRotate' => array(
            'value' => '',
            'name' => ls__('Rotation', 'LayerSlider'),
            'tooltip' => ls__('Increase or decrease the amount of layer rotation in the 3D space when moving your mouse cursor or tilting on a mobile device.', 'LayerSlider'),
            'keys' => 'parallaxrotate',
            'attrs' => array(
                'type' => 'number',
                'step' => 1,
                'placeholder' => 'Inherit from Slide Options'
            )
        ),

        'parallaxDistance' => array(
            'value' => '',
            'name' => ls__('Distance', 'LayerSlider'),
            'tooltip' => ls__('Increase or decrease the amount of layer movement when moving your mouse cursor or tilting on a mobile device.', 'LayerSlider'),
            'keys' => 'parallaxdistance',
            'attrs' => array(
                'type' => 'number',
                'step' => 1,
                'placeholder' => 'Inherit from Slide Options'
            )
        ),

        'parallaxPerspective' => array(
            'value' => '',
            'name' => ls__('Perspective', 'LayerSlider'),
            'tooltip' => ls__('Changes the perspective of layers in the 3D space.', 'LayerSlider'),
            'keys' => 'parallaxtransformperspective',
            'attrs' => array(
                'type' => 'number',
                'step' => 100,
                'placeholder' => 'Inherit from Slide Options'
            )
        ),


        // TRANSITON MISC
        'transitionStatic' => array(
            'value' => 'none',
            'name' => ls__('Static layer', 'LayerSlider'),
            'keys' => 'static',
            'tooltip' => ls__("You can keep this layer on top of the slider across multiple slides. Just select the slide on which this layer should animate out. Alternatively, you can make this layer global on all slides after it transitioned in.", "LayerSlider"),
            'options' => array(
                'none' => ls__('Disabled (default)', 'LayerSlider'),
                'forever' => ls__('Enabled (never animate out)', 'LayerSlider')
            )
        ),

        'transitionKeyframe' => array(
            'value' => false,
            'name' => ls__('Play By Scroll Keyframe', 'LayerSlider'),
            'keys' => 'keyframe',
            'tooltip' => ls__('A Play by Scroll slider will pause when this layer finished its opening transition.', 'LayerSlider')
        ),


// Attributes


        'linkURL' => array(
            'value' => '',
            'name' => ls__('Enter URL', 'LayerSlider'),
            'keys' => 'url',
            'tooltip' => ls__('If you want to link your layer, type here the URL. You can use a hash mark followed by a number to link this layer to another slide. Example: #3 - this will switch to the third slide.', 'LayerSlider'),
            'attrs' => array(
                'data-options' => '[{
                    "name": "Switch to the next slide",
                    "value": "#next"
                }, {
                    "name": "Switch to the previous slide",
                    "value": "#prev"
                }, {
                    "name": "Stop the slideshow",
                    "value": "#stop"
                }, {
                    "name": "Resume the slideshow",
                    "value": "#start"
                }, {
                    "name": "Replay the slide from the start",
                    "value": "#replay"
                }, {
                    "name": "Reverse the slide, then pause it",
                    "value": "#reverse"
                }, {
                    "name": "Reverse the slide, then replay it",
                    "value": "#reverse-replay"
                }]'
            ),
            'props' => array(
                'meta' => true
            )
        ),


        'linkTarget' => array(
            'value' => '_self',
            'name' => ls__('URL target', 'LayerSlider'),
            'keys' => 'target',
            'options' => array(
                '_self' => ls__('Open on the same page', 'LayerSlider'),
                '_blank' => ls__('Open on new page', 'LayerSlider'),
                '_parent' => ls__('Open in parent frame', 'LayerSlider'),
                '_top' => ls__('Open in main frame', 'LayerSlider'),
                'ls-scroll' => ls__('Scroll to element (Enter selector)', 'LayerSlider')
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'innerAttributes' => array(
            'value' => '',
            'name' => ls__('Custom Attributes', 'LayerSlider'),
            'keys' => 'innerAttributes',
            'desc' => ls__('Your list of custom attributes. Use this feature if your needs are not covered by the common attributes above or you want to override them. You can use data-* as well as regular attribute names. Empty attributes (without value) are also allowed. For example, to make a FancyBox gallery, you may enter "data-fancybox-group" and "gallery1" for the attribute name and value, respectively.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'outerAttributes' => array(
            'value' => '',
            'name' => ls__('Custom Attributes', 'LayerSlider'),
            'keys' => 'outerAttributes',
            'desc' => ls__('Your list of custom attributes. Use this feature if your needs are not covered by the common attributes above or you want to override them. You can use data-* as well as regular attribute names. Empty attributes (without value) are also allowed. For example, to make a FancyBox gallery, you may enter "data-fancybox-group" and "gallery1" for the attribute name and value, respectively.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        // Styles

        'width' => array(
            'value' => '',
            'name' => ls__('Width', 'LayerSlider'),
            'keys' => 'width',
            'tooltip' => ls__("You can set the width of your layer. You can use pixels, percentage, or the default value 'auto'. Examples: 100px, 50% or auto.", "LayerSlider"),
            'props' => array(
                'meta' => true
            )
        ),

        'height' => array(
            'value' => '',
            'name' => ls__('Height', 'LayerSlider'),
            'keys' => 'height',
            'tooltip' => ls__("You can set the height of your layer. You can use pixels, percentage, or the default value 'auto'. Examples: 100px, 50% or auto", "LayerSlider"),
            'props' => array(
                'meta' => true
            )
        ),

        'top' => array(
            'value' => '10px',
            'name' => ls__('Top', 'LayerSlider'),
            'keys' => 'top',
            'tooltip' => ls__("The layer position from the top of the slide. You can use pixels and percentage. Examples: 100px or 50%. You can move your layers in the preview above with a drag n' drop, or set the exact values here.", "LayerSlider"),
            'props' => array(
                'meta' => true
            )
        ),

        'left' => array(
            'value' => '10px',
            'name' => ls__('Left', 'LayerSlider'),
            'keys' => 'left',
            'tooltip' => ls__("The layer position from the left side of the slide. You can use pixels and percentage. Examples: 100px or 50%. You can move your layers in the preview above with a drag n' drop, or set the exact values here.", "LayerSlider"),
            'props' => array(
                'meta' => true
            )
        ),

        'paddingTop' => array(
            'value' => '',
            'name' => ls__('Top', 'LayerSlider'),
            'keys' => 'padding-top',
            'tooltip' => ls__('Padding on the top of the layer. Example: 10px', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'paddingRight' => array(
            'value' => '',
            'name' => ls__('Right', 'LayerSlider'),
            'keys' => 'padding-right',
            'tooltip' => ls__('Padding on the right side of the layer. Example: 10px', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'paddingBottom' => array(
            'value' => '',
            'name' => ls__('Bottom', 'LayerSlider'),
            'keys' => 'padding-bottom',
            'tooltip' => ls__('Padding on the bottom of the layer. Example: 10px', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'paddingLeft' => array(
            'value' => '',
            'name' => ls__('Left', 'LayerSlider'),
            'keys' => 'padding-left',
            'tooltip' => ls__('Padding on the left side of the layer. Example: 10px', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'borderTop' => array(
            'value' => '',
            'name' => ls__('Top', 'LayerSlider'),
            'keys' => 'border-top',
            'tooltip' => ls__('Border on the top of the layer. Example: 5px solid #000', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'borderRight' => array(
            'value' => '',
            'name' => ls__('Right', 'LayerSlider'),
            'keys' => 'border-right',
            'tooltip' => ls__('Border on the right side of the layer. Example: 5px solid #000', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'borderBottom' => array(
            'value' => '',
            'name' => ls__('Bottom', 'LayerSlider'),
            'keys' => 'border-bottom',
            'tooltip' => ls__('Border on the bottom of the layer. Example: 5px solid #000', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'borderLeft' => array(
            'value' => '',
            'name' => ls__('Left', 'LayerSlider'),
            'keys' => 'border-left',
            'tooltip' => ls__('Border on the left side of the layer. Example: 5px solid #000', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'fontFamily' => array(
            'value' => '',
            'name' => ls__('Family', 'LayerSlider'),
            'keys' => 'font-family',
            'tooltip' => ls__('List of your chosen fonts separated with a comma. Please use apostrophes if your font names contains white spaces. Example: Helvetica, Arial, sans-serif', 'LayerSlider')
        ),

        'fontSize' => array(
            'value' => '',
            'name' => ls__('Font size', 'LayerSlider'),
            'keys' => 'font-size',
            'tooltip' => ls__('The font size in pixels. Example: 16px.', 'LayerSlider'),
            'attrs' => array('data-options' => '["9", "10", "11", "12", "13", "14", "18", "24", "36", "48", "64", "96"]'),
            'props' => array(
                'meta' => true
            )
        ),

        'lineHeight' => array(
            'value' => '',
            'name' => ls__('Line height', 'LayerSlider'),
            'keys' => 'line-height',
            'tooltip' => ls__("The line height of your text. The default setting is 'normal'. Example: 22px", "LayerSlider"),
            'props' => array(
                'meta' => true
            )
        ),

        'fontWeight' => array(
            'value' => 400,
            'name' => ls__('Font weight', 'LayerSlider'),
            'keys' => 'font-weight',
            'tooltip' => ls__('Sets the font boldness. Please note, not every font supports all the listed variants, thus some settings may have the same result.', ''),
            'options' => array(
                '100' => ls__('100 (UltraLight)', 'LayerSlider'),
                '200' => ls__('200 (Thin)', 'LayerSlider'),
                '300' => ls__('300 (Light)', 'LayerSlider'),
                '400' => ls__('400 (Regular)', 'LayerSlider'),
                '500' => ls__('500 (Medium)', 'LayerSlider'),
                '600' => ls__('600 (Semibold)', 'LayerSlider'),
                '700' => ls__('700 (Bold)', 'LayerSlider'),
                '800' => ls__('800 (Heavy)', 'LayerSlider'),
                '900' => ls__('900 (Black)', 'LayerSlider')
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'fontStyle' => array(
            'value' => 'normal',
            'name' => ls__('Font style', 'LayerSlider'),
            'keys' => 'font-style',
            'tooltip' => ls__('Oblique is an auto-generated italic version of your chosen font and can force slating even if there is no italic font variant available. However, you should use the regular italic option whenever is possible. Please double check to load italic font variants when using Google Fonts.', ''),
            'options' => array(
                'normal' => ls__('Normal', 'LayerSlider'),
                'italic' => ls__('Italic', 'LayerSlider'),
                'oblique' => ls__('Oblique (Forced slant)', 'LayerSlider')
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'textDecoration' => array(
            'value' => 'none',
            'name' => ls__('Text decoration', 'LayerSlider'),
            'keys' => 'text-decoration',
            'options' => array(
                'none' => 'None',
                'underline' => ls__('Underline', 'LayerSlider'),
                'overline' => ls__('Overline', 'LayerSlider'),
                'line-through' => ls__('Line through', 'LayerSlider')

            ),
            'props' => array(
                'meta' => true
            )
        ),

        'letterSpacing' => array(
            'value' => '',
            'name' => ls__('Letter spacing', 'LayerSlider'),
            'keys' => 'letter-spacing',
            'tooltip' => ls__('Controls the amount of space between each character. Useful the change letter density in a line or block of text. Negative values and decimals can be used.', 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'step' => 0.5
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'textAlign' => array(
            'value' => 'none',
            'name' => ls__('Text align', 'LayerSlider'),
            'keys' => 'text-align',
            'options' => array(
                'initial' => ls__('Initial (Language default)', 'LayerSlider'),
                'left' => ls__('Left', 'LayerSlider'),
                'right' => ls__('Right', 'LayerSlider'),
                'center' => ls__('Center', 'LayerSlider'),
                'justify' => ls__('Justify', 'LayerSlider')

            ),
            'props' => array(
                'meta' => true
            )
        ),

        'opacity' => array(
            'value' => 1,
            'name' => ls__('Opacity', 'LayerSlider'),
            'keys' => 'opacity',
            'tooltip' => ls__('Fades the layer. You can use values between 1 and 0 to set the layer fully opaque or transparent respectively. For example, the value 0.5 will make the layer semi-transparent.', 'LayerSlider'),
            'attrs' => array(
                'min' => 0,
                'max' => 1,
                'step' => 0.1
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'minFontSize' => array(
            'value' => '',
            'name' => ls__('Min. font size', 'LayerSlider'),
            'keys' => 'minfontsize',
            'tooltip' => ls__('The minimum font size in a responsive slider. This option allows you to prevent your texts layers becoming too small on smaller screens.', 'LayerSlider')
        ),

        'minMobileFontSize' => array(
            'value' => '',
            'name' => ls__('Min. mobile font size', 'LayerSlider'),
            'keys' => 'minmobilefontsize',
            'tooltip' => ls__('The minimum font size in a responsive slider on mobile devices. This option allows you to prevent your texts layers becoming too small on smaller screens.', 'LayerSlider')
        ),



        'color' => array(
            'value' => '',
            'name' => ls__('Color', 'LayerSlider'),
            'keys' => 'color',
            'tooltip' => ls__('The color of your text. You can use color names, hexadecimal, RGB or RGBA values. Example: #333', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'background' => array(
            'value' => '',
            'name' => ls__('Background', 'LayerSlider'),
            'keys' => 'background',
            'tooltip' => ls__("The background color of your layer. You can use color names, hexadecimal, RGB or RGBA values as well as the 'transparent' keyword. Example: #FFF", "LayerSlider"),
            'props' => array(
                'meta' => true
            )
        ),

        'borderRadius' => array(
            'value' => '',
            'name' => ls__('Rounded corners', 'LayerSlider'),
            'keys' => 'border-radius',
            'tooltip' => ls__('If you want rounded corners, you can set its radius here. Example: 5px', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'wordWrap' => array(
            'value' => false,
            'name' => 'Word-wrap',
            'keys' => 'wordwrap',
            'tooltip' => 'Enable this option to allow line breaking if your text content does not fit into one line. By default, layers have auto sizes based on the text length. If you set custom sizes, it\'s recommended to enable this option in most cases.',
            'props' => array(
                'meta' => true
            )
        ),

        'style' => array(
            'value' => '',
            'name' => ls__('Custom styles', 'LayerSlider'),
            'keys' => 'style',
            'tooltip' => ls__('If you want to set style settings other than above, you can use here any CSS codes. Please make sure to write valid markup.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'styles' => array(
            'value' => '',
            'keys' => 'styles',
            'props' => array(
                'meta' => true,
                'raw' => true
            )
        ),

        'rotate' => array(
            'value' => 0,
            'name' => ls__('Rotate', 'LayerSlider'),
            'keys' => 'rotation',
            'tooltip' => ls__('The rotation angle where this layer animates toward when entering into the slider canvas. Negative values are allowed for counterclockwise rotation.', 'LayerSlider')
        ),

        'rotateX' => array(
            'value' => 0,
            'name' => ls__('RotateX', 'LayerSlider'),
            'keys' => 'rotationX',
            'tooltip' => ls__('The rotation angle on the horizontal axis where this animates toward when entering into the slider canvas. Negative values are allowed for reversed direction.', 'LayerSlider')
        ),

        'rotateY' => array(
            'value' => 0,
            'name' => ls__('RotateY', 'LayerSlider'),
            'keys' => 'rotationY',
            'tooltip' => ls__('The rotation angle on the vertical axis where this layer animates toward when entering into the slider canvas. Negative values are allowed for reversed direction.', 'LayerSlider')
        ),

        'scaleX' => array(
            'value' => 1,
            'name' => ls__('ScaleX', 'LayerSlider'),
            'keys' => 'scaleX',
            'tooltip' => ls__('The layer horizontal scale where this layer animates toward when entering into the slider canvas.', 'LayerSlider')
        ),

        'scaleY' => array(
            'value' => 1,
            'name' => ls__('ScaleY', 'LayerSlider'),
            'keys' => 'scaleY',
            'tooltip' => ls__('The layer vertical scale where this layer animates toward when entering into the slider canvas.', 'LayerSlider')
        ),

        'skewX' => array(
            'value' => 0,
            'name' => ls__('SkewX', 'LayerSlider'),
            'keys' => 'skewX',
            'tooltip' => ls__('The layer horizontal skewing angle where this layer animates toward when entering into the slider canvas.', 'LayerSlider')
        ),

        'skewY' => array(
            'value' => 0,
            'name' => ls__('SkewY', 'LayerSlider'),
            'keys' => 'skewY',
            'tooltip' => ls__('The layer vertical skewing angle where this layer animates toward when entering into the slider canvas.', 'LayerSlider')
        ),

        'position' => array(
            'value' => 'relative',
            'name' => ls__('Calculate positions from', 'LayerSlider'),
            'keys' => 'position',
            'tooltip' => ls__('Sets the layer position origin from which top and left values are calculated. The default is the upper left corner of the slider canvas. In a full width and full size slider, your content is centered based on the screen size to achieve the best possible fit. By selecting the "sides of the screen" option in those scenarios, you can allow layers to escape the centered inner area and stick to the sides of the screen.', 'LayerSlider'),
            'options' => array(
                'relative' => ls__('sides of the slider', 'LayerSlider'),
                'fixed' => ls__('sides of the screen', 'LayerSlider'),
            )
        ),

        'zIndex' => array(
            'value' => '',
            'name' => ls__('Stacking order', 'LayerSlider'),
            'keys' => 'z-index',
            'tooltip' => ls__("This option controls the vertical stacking order of layers that overlap. In CSS, it's commonly called as z-index. Elements with a higher value are stacked in front of elements with a lower one, effectively covering them. By default, this value is calculated automatically based on the order of your layers, thus simply re-ordering them can fix overlap issues. Use this option only if you want to set your own value manually in special cases like using static layers.<br><br>On each slide, the stacking order starts counting from 100. Providing a number less than 100 will put the layer behind every other layer on all slides. Specifying a much greater number, for example 500, will make the layer to be on top of everything else.", 'LayerSlider'),
            'attrs' => array(
                'type' => 'number',
                'min' => 1,
                'placeholder' => 'auto'
            )
        ),

        'blendMode' => array(
            'value' => 'normal',
            'name' => ls__('Blend mode', 'LayerSlider'),
            'keys' => 'mix-blend-mode',
            'tooltip' => ls__('Choose how layers and the slide background should blend into each other. Blend modes are an easy way to add eye-catching effects and is one of the most frequently used features in graphic and print design.', 'LayerSlider'),
            'premium' => true,
            'options' => array(
                'normal' => 'Normal',
                'multiply' => 'Multiply',
                'screen' => 'Screen',
                'overlay' => 'Overlay',
                'darken' => 'Darken',
                'lighten' => 'Lighten',
                'color-dodge' => 'Color-dodge',
                'color-burn' => 'Color-burn',
                'hard-light' => 'Hard-light',
                'soft-light' => 'Soft-light',
                'difference' => 'Difference',
                'exclusion' => 'Exclusion',
                'hue' => 'Hue',
                'saturation' => 'Saturation',
                'color' => 'Color',
                'luminosity' => 'Luminosity'
            )
        ),

        'filter' => array(
            'value' => '',
            'name' => ls__('Filter', 'LayerSlider'),
            'keys' => 'filter',
            'tooltip' => ls__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use. Click on the "Filter" link for more information.', 'LayerSlider'),
            'premium' => true,
            'attrs' => array(
                'data-options' => '[{
                    "name": "Blur",
                    "value": "blur(5px)"
                }, {
                    "name": "Brightness",
                    "value": "brightness(40%)"
                }, {
                    "name": "Contrast",
                    "value": "contrast(200%)"
                }, {
                    "name": "Grayscale",
                    "value": "grayscale(50%)"
                }, {
                    "name": "Hue-rotate",
                    "value": "hue-rotate(90deg)"
                }, {
                    "name": "Invert",
                    "value": "invert(75%)"
                }, {
                    "name": "Saturate",
                    "value": "saturate(30%)"
                }, {
                    "name": "Sepia",
                    "value": "sepia(60%)"
                }]'
            )
        ),



        // Attributes

        'ID' => array(
            'value' => '',
            'name' => ls__('ID', 'LayerSlider'),
            'keys' => 'id',
            'tooltip' => ls__("You can apply an ID attribute on the HTML element of this layer to work with it in your custom CSS or Javascript code.", 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'class' => array(
            'value' => '',
            'name' => ls__('Classes', 'LayerSlider'),
            'keys' => 'class',
            'tooltip' => ls__('You can apply classes on the HTML element of this layer to work with it in your custom CSS or Javascript code.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'title' => array(
            'value' => '',
            'name' => ls__('Title', 'LayerSlider'),
            'keys' => 'title',
            'tooltip' => ls__('You can add a title to this layer which will display as a tooltip if someone holds his mouse cursor over the layer.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'alt' => array(
            'value' => '',
            'name' => ls__('Alt', 'LayerSlider'),
            'keys' => 'alt',
            'tooltip' => ls__('Name or describe your image layer, so search engines and VoiceOver softwares can properly identify it.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        ),

        'rel' => array(
            'value' => '',
            'name' => ls__('Rel', 'LayerSlider'),
            'keys' => 'rel',
            'tooltip' => ls__('Plugins and search engines may use this attribute to get more information about the role and behavior of a link.', 'LayerSlider'),
            'props' => array(
                'meta' => true
            )
        )

    ),

    'easings' => array(
        'linear',
        'swing',
        'easeInQuad',
        'easeOutQuad',
        'easeInOutQuad',
        'easeInCubic',
        'easeOutCubic',
        'easeInOutCubic',
        'easeInQuart',
        'easeOutQuart',
        'easeInOutQuart',
        'easeInQuint',
        'easeOutQuint',
        'easeInOutQuint',
        'easeInSine',
        'easeOutSine',
        'easeInOutSine',
        'easeInExpo',
        'easeOutExpo',
        'easeInOutExpo',
        'easeInCirc',
        'easeOutCirc',
        'easeInOutCirc',
        'easeInElastic',
        'easeOutElastic',
        'easeInOutElastic',
        'easeInBack',
        'easeOutBack',
        'easeInOutBack',
        'easeInBounce',
        'easeOutBounce',
        'easeInOutBounce'
    )
);
