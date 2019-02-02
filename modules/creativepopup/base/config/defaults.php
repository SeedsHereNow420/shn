<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

require_once _PS_MODULE_DIR_.'creativepopup/classes/CpHelper.php';

$cpDefaults = array(

    'slider' => array(

        'createdWith' => array(
            'value' => '',
            'keys' => 'createdWith'
        ),

        'popupVersion' => array(
            'value' => '',
            'keys' => 'popupVersion',
            'props' => array(
                'forceoutput' => true
            )
        ),

        'status' => array(
            'value' => false,
            'name' => cp__('Published'),
            'keys' => 'status',
            'desc' => cp__('Unpublished popups will not be visible for your visitors until you enable this option.'),
            'props' => array(
                'meta' => true
            )
        ),

        'scheduleStart' => array(
            'value' => '',
            'name' => cp__('Start on'),
            'keys' => 'schedule_start',
            'desc' => cp__("Scheduled popups will only be visible to your visitors between the time period you set here.<br>We're using international date and time format to avoid ambiguity."),
            'attrs' => array(
                'placeholder' => cp__('No schedule')
            ),
            'props' => array(
                'meta' => true
            )
        ),


        'scheduleEnd' => array(
            'value' => '',
            'name' => cp__('Stop on'),
            'keys' => 'schedule_end',
            'desc' => 'Clear the text field above and left it empty if you want to cancel the schedule.<br><span>IMPORTANT:</span> You will still need to set the popup status as published',
            'attrs' => array(
                'placeholder' => cp__('No schedule')
            ),
            'props' => array(
                'meta' => true
            )
        ),


        // ============= //
        // |   Layout  | //
        // ============= //

        // responsive | fullwidth | fullsize | fixedsize
        'type' => array(
            'value' => 'responsive',
            'name' => cp__('Popup type'),
            'keys' => 'type',
            'desc' => '',
            'attrs' => array(
                'type' => 'hidden'
            )

        ),

        'maxRatio' => array(
            'value' => '',
            'name' => cp__('Maximum responsive ratio'),
            'keys' => 'maxRatio',
            'desc' => cp__('The popup will not enlarge your layers above the target ratio. The value 1 will keep your layers in their initial size, without any upscaling.'),
            'advanced' => true
        ),

        'clipSlideTransition' => array(
            'value' => 'disabled',
            'name' => cp__('Clip page transition'),
            'keys' => 'clipSlideTransition',
            'desc' => cp__('Choose on which axis (if any) you want to clip the overflowing content (i.e. that breaks outside of the popup bounds).'),
            'advanced' => true,
            'options' => array(
                'disabled' => cp__('Do not hide'),
                'enabled' => cp__('Hide on both axis'),
                'x' => cp__('X Axis'),
                'y' => cp__('Y Axis')
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
            'name' => cp__('Background size'),
            'keys' => 'slideBGSize',
            'desc' => cp__('This will be used as a default on all pages, unless you choose to explicitly override it on a per page basis.'),
            'options' => array(
                'auto' => cp__('Auto'),
                'cover' => cp__('Cover'),
                'contain' => cp__('Contain'),
                '100% 100%' => cp__('Stretch')
            )
        ),

        'slideBGPosition' => array(
            'value' => '50% 50%',
            'name' => cp__('Background position'),
            'keys' => 'slideBGPosition',
            'desc' => cp__('This will be used as a default on all pages, unless you choose the explicitly override it on a per page basis.'),
            'options' => array(
                '0% 0%' => cp__('left top'),
                '0% 50%' => cp__('left center'),
                '0% 100%' => cp__('left bottom'),
                '50% 0%' => cp__('center top'),
                '50% 50%' => cp__('center center'),
                '50% 100%' => cp__('center bottom'),
                '100% 0%' => cp__('right top'),
                '100% 50%' => cp__('right center'),
                '100% 100%' => cp__('right bottom')
            )
        ),


        'parallaxSensitivity' => array(
            'value' => 10,
            'name' => cp__('Parallax sensitivity'),
            'keys' => 'parallaxSensitivity',
            'desc' => cp__('Increase or decrease the sensitivity of parallax content when moving your mouse cursor or tilting your mobile device.')
        ),


        'parallaxCenterLayers' => array(
            'value' => 'center',
            'name' => cp__('Parallax center layers'),
            'keys' => 'parallaxCenterLayers',
            'desc' => cp__('Choose a center point for parallax content where all layers will be aligned perfectly according to their original position.'),
            'options' => array(
                'center' => cp__('At center of the viewport'),
                'top' => cp__('At the top of the viewport')
            )
        ),

        'parallaxCenterDegree' => array(
            'value' => 40,
            'name' => cp__('Parallax center degree'),
            'keys' => 'parallaxCenterDegree',
            'desc' => cp__('Provide a comfortable holding position (in degrees) for mobile devices, which should be the center point for parallax content where all layers should align perfectly.')
        ),

        'parallaxScrollReverse' => array(
            'value' => false,
            'name' => 'Reverse scroll direction',
            'keys' => 'parallaxScrollReverse',
            'desc' => cp__('Your parallax layers will move to the opposite direction when scrolling the page.')
        ),


        // ================= //
        // |    Mobile    | //
        // ================= //

        'optimizeForMobile' => array(
            'value' => true,
            'name' => cp__('Optimize for mobile'),
            'keys' => 'optimizeForMobile',
            'advanced' => true,
            'desc' => cp__('Enable optimizations on mobile devices to avoid performance issues (e.g. fewer tiles in page transitions, reducing performance-heavy effects with very similar results, etc).')
        ),


        'disableOnMobile' => array(
            'value' => false,
            'name' => cp__('Disable on mobile'),
            'keys' => 'disableonmobile',
            'desc' => cp__('Disable the popup on mobile devices.'),
            'props' => array('meta' => true)
        ),

        'disableOnTablet' => array(
            'value' => false,
            'name' => cp__('Disable on tablet'),
            'keys' => 'disableontablet',
            'desc' => cp__('Disable the popup on tablet devices.'),
            'props' => array('meta' => true)
        ),

        'disableOnDesktop' => array(
            'value' => false,
            'name' => cp__('Disable on desktop'),
            'keys' => 'disableondesktop',
            'desc' => cp__('Disable the popup on desktop devices.'),
            'props' => array('meta' => true)
        ),


        // Hides the popup under the given value of browser width in pixels.
        // Defaults to: 0
        'hideUnder' => array(
            'value' => '',
            'name' => cp__('Hide under'),
            'keys' => array('hideunder', 'hideUnder'),
            'desc' => cp__('Hides the popup when the viewport width goes under the specified value.'),
            'attrs' => array(
                'type' => 'number',
                'min' => -1
            )
        ),

        // Hides the popup over the given value of browser width in pixel.
        // Defaults to: 100000
        'hideOver' => array(
            'value' => '',
            'name' => cp__('Hide over'),
            'keys' => array('hideover', 'hideOver'),
            'desc' => cp__('Hides the popup when the viewport becomes wider than the specified value.'),
            'attrs' => array(
                'type' => 'number',
                'min' => -1
            )
        ),

        'slideOnSwipe' => array(
            'value' => true,
            'name' => cp__('Use slide effect when swiping'),
            'keys' => 'slideOnSwipe',
            'desc' => cp__('Ignore selected page transitions and use sliding effects only when users are changing pages with a swipe gesture on mobile devices.')
        ),

        // ================ //
        // |   Slideshow  | //
        // ================ //

        // Automatically start popup.
        'autoStart' => array(
            'value' => false,
            'name' => cp__('Auto-play pages'),
            'keys' => array('autostart', 'autoStart'),
            'desc' => cp__('Next page will automatically play after actual page is finished.')
        ),

        'hashChange' => array(
            'value' => false,
            'name' => cp__('Change URL hash'),
            'keys' => 'hashChange',
            'desc' => cp__('Updates the hash in the site URL when changing pages based on the deeplinks you’ve set to your pages. This makes it possible to share URLs that will start the popup with the currently visible page.'),
            'advanced' => true
        ),

        'pauseLayers' => array(
            'value' => false,
            'name' => cp__('Pause layers'),
            'keys' => 'pauseLayers',
            'desc' => cp__('If you enable this option, layer transitions will not start playing as long the pageshow is in a paused state.'),
            'advanced' => true
        ),

        'pauseOnHover' => array(
            'value' => 'enabled',
            'name' => cp__('Pause on hover'),
            'keys' => array('pauseonhover', 'pauseOnHover'),
            'options' => array(
                'disabled' => cp__('Disabled'),
                'enabled' => cp__('Pause pageshow'),
                'layers' => cp__('Pause pageshow and layer transitions'),
                'looplayers' => cp__('Pause pageshow and layer transitions, including loops')
            ),
            'desc' => cp__('Decide what should happen when you move your mouse cursor over the popup.')
        ),

        // The starting page of a popup. Non-index value, starts with 1.
        'firstSlide' => array(
            'value' => 1,
            'name' => cp__('Start with page'),
            'keys' => array('firstlayer', 'firstSlide'),
            'desc' => cp__('The popup will start with the specified page. You can also use the value "random".'),
            'attrs' => array('type' => 'text', 'data-options' => '["random"]')
        ),

        // Use global shortcuts to control the popup.
        'keybNavigation' => array(
            'value' => false,
            'name' => cp__('Keyboard navigation'),
            'keys' => array('keybnav', 'keybNav'),
            'desc' => cp__('You can navigate through pages with the left and right arrow keys.')
        ),

        // Accepts touch gestures if enabled.
        'touchNavigation' => array(
            'value' => false,
            'name' => cp__('Touch navigation'),
            'keys' => array('touchnav', 'touchNav'),
            'desc' => cp__('Gesture-based navigation when swiping on touch-enabled devices.')
        ),

        // Number of loops taking by the popup.
        // Depends on: shuffle. Defaults to: 0 => infinite
        'loops' => array(
            'value' => 0,
            'name' => cp__('Cycles'),
            'keys' => array('loops', 'cycles'),
            'desc' => cp__('Number of cycles if auto-play is enabled. (0 means infinity)'),
            'attrs' => array(
                'type' => 'number',
                'min' => 0
            )
        ),

        // The popup will always stop at the given number of
        // loops, even when the user restarts popup.
        // Depends on: loop. Defaults to: true
        'forceLoopNumber' => array(
            'value' => true,
            'name' => cp__('Force number of cycles'),
            'keys' => array('forceloopnum', 'forceCycles'),
            'advanced' => true,
            'desc' => cp__('The popup will always stop at the given number of cycles, even if the pageshow restarts.')
        ),

        // The popup will change pages in random order.
        'shuffle' => array(
            'value' => false,
            'name' => cp__('Shuffle mode'),
            'keys' => array('randomslideshow', 'shuffleSlideshow'),
            'desc' => cp__('Pages will proceed in random order.')
        ),

        // Whether popup should goind backwards or not
        // when you switch to a previous page.
        'twoWaySlideshow' => array(
            'value' => false,
            'name' => cp__('Two way pageshow'),
            'keys' => array('twowayslideshow', 'twoWaySlideshow'),
            'advanced' => true,
            'desc' => cp__('Pageshow can go backwards if someone switches to a previous page.')
        ),

        'forceLayersOutDuration' => array(
            'value' => 750,
            'name' => cp__('Forced animation duration'),
            'keys' => 'forceLayersOutDuration',
            'advanced' => true,
            'desc' => cp__('The animation speed in milliseconds when the popup forces remaining layers out of scene before swapping pages.'),
            'attrs' => array(
                'min' => 0
            )
        ),

        // ================= //
        // |   Appearance  | //
        // ================= //

        // The default skin.
        'skin' => array(
            'value' => 'noskin',
            'name' => cp__('Skin'),
            'keys' => 'skin',
            'desc' => cp__("The skin used for this popup. The 'noskin' skin is a border- and buttonless skin. Your custom skins will appear in the list when you create their folders.")
        ),


        'sliderFadeInDuration' => array(
            'value' => 350,
            'name' => cp__('Initial fade duration'),
            'keys' => array('sliderfadeinduration', 'sliderFadeInDuration'),
            'advanced' => true,
            'desc' => cp__('Change the duration of the initial fade animation when the page loads. Enter 0 to disable fading.'),
            'attrs' => array(
                'min' => 0
            )
        ),

        'popupClasses' => array(
            'value' => '',
            'name' => cp__('Popup Classes'),
            'keys' => 'popupclass',
            'desc' => cp__('One or more space-separated class names to be added to the popup container element.'),
            'props' => array(
                'meta' => true
            )
        ),

        // Some CSS values you can append on each page individually
        // to make some adjustments if needed.
        'sliderStyle' => array(
            'value' => '',
            'name' => cp__('Popup CSS'),
            'keys' => array('sliderstyle', 'sliderStyle'),
            'desc' => cp__('You can enter custom CSS to change some style properties on the popup wrapper element. More complex CSS should be applied with the Custom Styles Editor.'),
            'props' => array(
                'meta' => true
            )
        ),


        // Global background color on all pages.
        'globalBGColor' => array(
            'value' => '',
            'name' => cp__('Background color'),
            'keys' => array('backgroundcolor', 'globalBGColor'),
            'desc' => cp__('Global background color of the popup. Pages with non-transparent background will cover this one. You can use all CSS methods such as HEX or RGB(A) values.')
        ),

        // Global background image on all pages.
        'globalBGImage' => array(
            'value' => '',
            'name' => cp__('Background image'),
            'keys' => array('backgroundimage', 'globalBGImage'),
            'desc' => cp__('Global background image of the popup. Pages with non-transparent backgrounds will cover it. This image will not scale in responsive mode.')
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
            'name' => cp__('Background repeat'),
            'keys' => 'globalBGRepeat',
            'desc' => cp__('Global background image repeat.'),
            'options' => array(
                'no-repeat' => cp__('No-repeat'),
                'repeat' => cp__('Repeat'),
                'repeat-x' => cp__('Repeat-x'),
                'repeat-y' => cp__('Repeat-y')
            )
        ),

        // Global background image behavior
        'globalBGAttachment' => array(
            'value' => 'scroll',
            'name' => cp__('Background behavior'),
            'keys' => 'globalBGAttachment',
            'desc' => cp__('Choose between a scrollable or fixed global background image.'),
            'options' => array(
                'scroll' => cp__('Scroll'),
                'fixed' => cp__('Fixed')
            )
        ),

        // Global background image position
        'globalBGPosition' => array(
            'value' => '50% 50%',
            'name' => cp__('Background position'),
            'keys' => 'globalBGPosition',
            'desc' => cp__('Global background image position of the popup. The first value is the horizontal position and the second value is the vertical.')
        ),

        // Global background image size
        'globalBGSize' => array(
            'value' => 'cover',
            'name' => cp__('Background size'),
            'keys' => 'globalBGSize',
            'desc' => cp__('Global background size of the popup. You can set the size in pixels, percentages, or constants: auto | cover | contain '),
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
            'value' => false,
            'name' => cp__('Show Prev & Next buttons'),
            'keys' => array('navprevnext', 'navPrevNext'),
            'desc' => cp__('Disabling this option will hide the Prev and Next buttons.')
        ),

        // Show the next and previous buttons
        // only when hovering over the popup.
        'hoverPrevNextButtons' => array(
            'value' => false,
            'name' => cp__('Show Prev & Next buttons on hover'),
            'keys' => array('hoverprevnext', 'hoverPrevNext'),
            'desc' => cp__('Show the buttons only when someone moves the mouse cursor over the popup. This option depends on the previous setting.')
        ),

        // Show the start and stop buttons
        'navStartStopButtons' => array(
            'value' => false,
            'name' => cp__('Show Start & Stop buttons'),
            'keys' => array('navstartstop', 'navStartStop'),
            'desc' => cp__('Disabling this option will hide the Start & Stop buttons.')
        ),

        // Show the page buttons or thumbnails.
        'navSlideButtons' => array(
            'value' => false,
            'name' => cp__('Show page navigation buttons'),
            'keys' => array('navbuttons', 'navButtons'),
            'desc' => cp__('Disabling this option will hide page navigation buttons or thumbnails.')
        ),

        // Show the popup buttons or thumbnails
        // ony when hovering over the popup.
        'hoverSlideButtons' => array(
            'value' => false,
            'name' => cp__('Page navigation on hover'),
            'keys' => array('hoverbottomnav', 'hoverBottomNav'),
            'desc' => cp__('Page navigation buttons (including thumbnails) will be shown on mouse hover only.')
        ),

        // Show bar timer
        'barTimer' => array(
            'value' => false,
            'name' => cp__('Show bar timer'),
            'keys' => array('bartimer', 'showBarTimer'),
            'desc' => cp__('Show the bar timer to indicate pageshow progression.')
        ),

        // Show circle timer. Requires CSS3 capable browser.
        // This setting will overrule the 'barTimer' option.
        'circleTimer' => array(
            'value' => false,
            'name' => cp__('Show circle timer'),
            'keys' => array('circletimer', 'showCircleTimer'),
            'desc' => cp__('Use circle timer to indicate pageshow progression.')
        ),

        'slideBarTimer' => array(
            'value' => false,
            'name' => cp__('Show pagebar timer'),
            'keys' => array('slidebartimer', 'showSlideBarTimer'),
            'desc' => cp__('You can grab the pagebar timer playhead and seek the whole page real-time like a movie.')
        ),

        // ========================== //
        // |  Thumbnail navigation  | //
        // ========================== //

        // Use thumbnails for page buttons
        // Depends on: navSlideButtons.
        // Possible values: 'disabled', 'hover', 'always'
        'thumbnailNavigation' => array(
            'value' => 'hover',
            'name' => cp__('Thumbnail navigation'),
            'keys' => array('thumb_nav', 'thumbnailNavigation'),
            'desc' => cp__('Use thumbnail navigation instead of page bullet buttons.'),
            'options' => array(
                'disabled' => cp__('Disabled'),
                'hover' => cp__('Hover'),
                'always' => cp__('Always')
            )
        ),

        // The width of the thumbnail area in percents.
        'thumbnailAreaWidth' => array(
            'value' => '60%',
            'name' => cp__('Thumbnail container width'),
            'keys' => array('thumb_container_width', 'tnContainerWidth'),
            'desc' => cp__('The width of the thumbnail area relative to the popup size.')
        ),

        // Thumbnails' width in pixels.
        'thumbnailWidth' => array(
            'value' => 100,
            'name' => cp__('Thumbnail width'),
            'keys' => array('thumb_width', 'tnWidth'),
            'desc' => cp__('The width of thumbnails in the navigation area.'),
            'attrs' => array(
                'min' => 0
            )
        ),

        // Thumbnails' height in pixels.
        'thumbnailHeight' => array(
            'value' => 60,
            'name' => cp__('Thumbnail height'),
            'keys' => array('thumb_height', 'tnHeight'),
            'desc' => cp__('The height of thumbnails in the navigation area.'),
            'attrs' => array(
                'min' => 0
            )
        ),


        // The opacity of the active thumbnail in percents.
        'thumbnailActiveOpacity' => array(
            'value' => 35,
            'name' => cp__('Active thumbnail opacity'),
            'keys' => array('thumb_active_opacity', 'tnActiveOpacity'),
            'desc' => cp__("Opacity in percentage of the active page's thumbnail."),
            'attrs' => array(
                'min' => 0,
                'max' => 100
            )
        ),

        // The opacity of inactive thumbnails in percents.
        'thumbnailInactiveOpacity' => array(
            'value' => 100,
            'name' => cp__('Inactive thumbnail opacity'),
            'keys' => array('thumb_inactive_opacity', 'tnInactiveOpacity'),
            'desc' => cp__('Opacity in percentage of inactive page thumbnails.'),
            'attrs' => array(
                'min' => 0,
                'max' => 100
            )
        ),

        // ============ //
        // |  Videos  | //
        // ============ //

        // Automatically starts vidoes on the given page.
        'autoPlayVideos' => array(
            'value' => true,
            'name' => cp__('Automatically play videos'),
            'keys' => array('autoplayvideos', 'autoPlayVideos'),
            'desc' => cp__('Videos will be automatically started on the active page.')
        ),

        // Automatically pauses the pageshow when a video is playing.
        // Auto means it only pauses the pageshow while the video is playing.
        // Possible values: 'auto', 'enabled', 'disabled'
        'autoPauseSlideshow' => array(
            'value' => 'auto',
            'name' => cp__('Pause pageshow'),
            'keys' => array('autopauseslideshow', 'autoPauseSlideshow'),
            'desc' => cp__('The pageshow can temporally be paused while videos are playing. You can choose to permanently stop the pause until manual restarting.'),
            'options' => array(
                'auto' => cp__('While playing'),
                'enabled' => cp__('Permanently'),
                'disabled' => cp__('No action')
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
            'name' => cp__('Youtube preview'),
            'keys' => array('youtubepreview', 'youtubePreview'),
            'desc' => cp__('The automatically fetched preview image quaility for YouTube videos when you do not set your own. Please note, some videos do not have HD previews, and you may need to choose a lower quaility.'),
            'options' => array(
                'maxresdefault.jpg' => cp__('Maximum quality'),
                'hqdefault.jpg' => cp__('High quality'),
                'mqdefault.jpg' => cp__('Medium quality'),
                'default.jpg' => cp__('Default quality')
            )
        ),

        // =========== //
        // |  Popup  | //
        // =========== //

        'popupShowOnClick' => array(
            'value' => '',
            'name' => cp__('Open by click'),
            'keys' => 'popupShowOnClick',
            'desc' => cp__('Enter a jQuery selector to open the Popup by clicking on the target element(s). Acting as a toggle, a secondary click will close the Popup. Leave this field empty if you don’t want to use this trigger.')
        ),

        'popupShowOnScroll' => array(
            'value' => '',
            'name' => cp__('Open at scroll position'),
            'keys' => 'popupShowOnScroll',
            'desc' => cp__('Enter a scroll position in pixels or percents, which will open the Popup when visitors scroll to that location. Leave this field empty if you don’t want to use this trigger.')
        ),

        'popupCloseOnScroll' => array(
            'value' => '',
            'name' => cp__('Close at scroll position'),
            'keys' => 'popupCloseOnScroll',
            'desc' => cp__('Enter a scroll position in pixels or percents, which will close the Popup when visitors scroll to that location. Leave this field empty if you don’t want to use this trigger.')
        ),

        'popupCloseOnTimeout' => array(
            'value' => '',
            'name' => cp__('Close automatically after'),
            'keys' => 'popupCloseOnTimeout',
            'desc' => cp__('Automatically closes the Popup in the specified number of seconds after it was opened. Leave this field empty if you don’t want to use this trigger.')
        ),

        'popupCloseOnSliderEnd' => array(
            'value' => false,
            'name' => cp__('Close on popup end'),
            'keys' => 'popupCloseOnSliderEnd',
            'desc' => cp__('Closes the Popup after the pageshow has completed a full cycle and all your pages were displayed.')
        ),

        'popupShowOnLeave' => array(
            'value' => false,
            'name' => cp__('Before leaving the page'),
            'keys' => 'popupShowOnLeave',
            'desc' => cp__('Opens the Popup before leaving the page. A leave intent is considered when visitors leave the browser window with their mouse cursor in the direction where the window controls and the tab bar is located.')
        ),

        'popupShowOnIdle' => array(
            'value' => '',
            'name' => cp__('Open when idle for'),
            'keys' => 'popupShowOnIdle',
            'desc' => cp__('Opens the Popup after the specified number of seconds when the user is inactive without moving the mouse cursor or pressing any button. Leave this field empty if you don’t want to use this trigger.')
        ),

        'popupShowOnTimeout' => array(
            'value' => '',
            'name' => cp__('Open automatically after'),
            'keys' => 'popupShowOnTimeout',
            'desc' => cp__('Automatically opens the Popup after the specified number of seconds. Leave this field empty if you don’t want to use this trigger.')
        ),


        'popupShowOnce' => array(
            'value' => true,
            'name' => cp__('Prevent reopening'),
            'keys' => 'popupShowOnce',
            'desc' => cp__('Depending on your settings, the same Popup can be displayed in multiple times without reloading the page. Such example would be when you use a scroll trigger and the user scrolls to that location a number of times. Enabling this option will prevent opening this Popup consequently.')
        ),

        'popupDisableOverlay' => array(
            'value' => false,
            'name' => cp__('Disable overlay'),
            'keys' => 'popupDisableOverlay',
            'desc' => cp__('Disable this option to hide the overlay behind the Popup.')
        ),

        'popupShowCloseButton' => array(
            'value' => true,
            'name' => cp__('Show close button'),
            'keys' => 'popupShowCloseButton',
            'desc' => cp__('Disable this option to hide the Popup close button. This option is also useful when you would like to use a custom close button. To do that, select the “Close the Popup” option from the layer linking field.')
        ),

        'popupAjaxLoadColor' => array(
            'value' => '#ffffff',
            'name' => cp__('AJAX loader color'),
            'keys' => 'popupAjaxLoadColor',
            'desc' => cp__('The AJAX loader color. You can use color names, hexadecimal, RGB or RGBA values.')
        ),

        'popupCloseButtonStyle' => array(
            'value' => '',
            'name' => cp__('Close button custom CSS'),
            'keys' => 'popupCloseButtonStyle',
            'desc' => cp__('Enter a list of CSS properties, which will be applied to the built-in close button (if enabled) to customize it’s appearance.'),
            'advanced' => true
        ),

        'popupOverlayClickToClose' => array(
            'value' => true,
            'name' => cp__('Close by clicking away'),
            'keys' => 'popupOverlayClickToClose',
            'desc' => cp__('Close the Popup by clicking on the overlay.')
        ),

        'popupStartSliderImmediately' => array(
            'value' => true,
            'name' => cp__('Start popup immediately'),
            'keys' => 'popupStartSliderImmediately',
            'desc' => cp__('Enable this option to start your popup immediately, without waiting for the Popup to complete its opening transition.'),
            'advanced' => true
        ),

        'popupResetOnClose' => array(
            'value' => 'slide',
            'name' => cp__('Reset on close'),
            'keys' => 'popupResetOnClose',
            'desc' => cp__('Choose whether the popup should play all page transitions over again when re-opening the popup.'),
            'advanced' => true,
            'options' => array(
                'disabled' => cp__('Disabled'),
                'slide' => cp__('Enabled')
            )
        ),

        // 'popupCustomStyle' => array(
        //  'value' => '',
        //  'name' => cp__('Popup custom CSS'),
        //  'keys' => 'popupCustomStyle',
        //  'desc' => cp__('Enter CSS properties, which will be applied to the popup main container element to customize it’s appearance.')
        // ),

        'popupWidth' => array(
            'value' => 640,
            'name' => cp__('Popup Width'),
            'keys' => 'popupWidth',
            'attrs' => array(
                'type' => 'number',
                'min' => 0,
            ),
            'props' => array(
                'output' => true
            )
        ),

        'popupHeight' => array(
            'value' => 360,
            'name' => cp__('Popup Height'),
            'keys' => 'popupHeight',
            'attrs' => array(
                'type' => 'number',
                'min' => 0,
            ),
            'props' => array(
                'output' => true
            )
        ),

        'popupFitWidth' => array(
            'value' => false,
            'name' => cp__('Fit Width'),
            'keys' => 'popupFitWidth'
        ),

        'popupFitHeight' => array(
            'value' => false,
            'name' => cp__('Fit Height'),
            'keys' => 'popupFitHeight'
        ),

        'popupPositionHorizontal' => array(
            'value' => 'center',
            'keys' => 'popupPositionHorizontal'
        ),

        'popupPositionVertical' => array(
            'value' => 'middle',
            'keys' => 'popupPositionVertical'
        ),

        'popupDistanceLeft' => array(
            'value' => 10,
            'name' => cp__('Distance left'),
            'keys' => 'popupDistanceLeft',
            'tooltip' => cp__('Distance specified in pixels from the left side of the browser window.')
        ),

        'popupDistanceRight' => array(
            'value' => 10,
            'name' => cp__('Distance right'),
            'keys' => 'popupDistanceRight',
            'tooltip' => cp__('Distance specified in pixels from the right side of the browser window.')
        ),

        'popupDistanceTop' => array(
            'value' => 10,
            'name' => cp__('Distance top'),
            'keys' => 'popupDistanceTop',
            'tooltip' => cp__('Distance specified in pixels from the top of the browser window.')
        ),

        'popupDistanceBottom' => array(
            'value' => 10,
            'name' => cp__('Distance bottom'),
            'keys' => 'popupDistanceBottom',
            'tooltip' => cp__('Distance specified in pixels from the bottom of the browser window.')
        ),

        'popupDurationIn' => array(
            'value' => 1000,
            'name' => cp__('Opening duration'),
            'keys' => 'popupDurationIn',
            'desc' => cp__('The Popup opening transition duration specified in milliseconds. A second equals to 1000 milliseconds.'),
            'attrs' => array(
                'min' => 0,
                'step' => 100
            )
        ),

        'popupDurationOut' => array(
            'value' => 500,
            'name' => cp__('Closing duration'),
            'keys' => 'popupDurationOut',
            'desc' => cp__('The Popup closing transition duration specified in milliseconds. A second equals to 1000 milliseconds.'),
            'attrs' => array(
                'min' => 0,
                'step' => 100
            )
        ),

        'popupDelayIn' => array(
            'value' => 200,
            'name' => cp__('Opening delay'),
            'keys' => 'popupDelayIn',
            'desc' => cp__('Delay before opening the Popup specified in milliseconds. A second equals to 1000 milliseconds.'),
            'advanced' => true,
            'attrs' => array(
                'min' => 0,
                'step' => 100
            )
        ),

        // 'popupEaseIn' => array(
        //  'value' => 'easeInOutQuint',
        //  'name' => cp__('Opening easing'),
        //  'keys' => 'popupEaseIn',
        //  'desc' => cp__('The timing function of the animation. With it you can manipulate the movement of animated objects. Please click on the link next to this select field to open easings.net for more information and real-time examples.')
        // ),

        // 'popupEaseOut' => array(
        //  'value' => 'easeInQuint',
        //  'name' => cp__('Closing easing'),
        //  'keys' => 'popupEaseOut',
        //  'desc' => cp__('The timing function of the animation. With it you can manipulate the movement of animated objects. Please click on the link next to this select field to open easings.net for more information and real-time examples.')
        // ),

        'popupTransitionIn' => array(
            'value' => 'fade',
            'name' => cp__('Opening transition'),
            'keys' => 'popupTransitionIn',
            'desc' => cp__('Choose from one of the pre-defined Popup opening transitions.'),
            'options' => array(
                'fade' => cp__('Fade'),
                'slidefromtop' => cp__('Slide from top'),
                'slidefrombottom' => cp__('Slide from bottom'),
                'slidefromleft' => cp__('Slide from left'),
                'slidefromright' => cp__('Slide from right'),
                'rotatefromtop' => cp__('Rotate from top'),
                'rotatefrombottom' => cp__('Rotate from bottom'),
                'rotatefromleft' => cp__('Rotate from left'),
                'rotatefromright' => cp__('Rotate from right'),
                'scalefromtop' => cp__('Scale from top'),
                'scalefrombottom' => cp__('Scale from bottom'),
                'scalefromleft' => cp__('Scale from left'),
                'scalefromright' => cp__('Scale from right'),
                'scale' => cp__('Scale'),
                'spin' => cp__('Spin'),
                'spinx' => cp__('Spin horizontally'),
                'spiny' => cp__('Spin vertically'),
                'elastic' => cp__('Elastic')
            )
        ),

        'popupTransitionOut' => array(
            'value' => 'fade',
            'name' => cp__('Closing transition'),
            'keys' => 'popupTransitionOut',
            'desc' => cp__('Choose from one of the pre-defined Popup closing transitions.'),
            'options' => array(
                'fade' => cp__('Fade'),
                'slidetotop' => cp__('Slide to top'),
                'slidetobottom' => cp__('Slide to bottom'),
                'slidetoleft' => cp__('Slide to left'),
                'slidetoright' => cp__('Slide to right'),
                'rotatetotop' => cp__('Rotate to top'),
                'rotatetobottom' => cp__('Rotate to bottom'),
                'rotatetoleft' => cp__('Rotate to left'),
                'rotatetoright' => cp__('Rotate to right'),
                'scaletotop' => cp__('Scale to top'),
                'scaletobottom' => cp__('Scale to bottom'),
                'scaletoleft' => cp__('Scale to left'),
                'scaletoright' => cp__('Scale to right'),
                'scale' => cp__('Scale'),
                'spin' => cp__('Spin'),
                'spinx' => cp__('Spin horizontally'),
                'spiny' => cp__('Spin vertically'),
                'elastic' => cp__('Elastic')
            )
        ),

        // 'popupCustomTransitionIn' => array(
        //  'value' => '',
        //  'name' => cp__('Custom opening transition'),
        //  'keys' => 'popupCustomTransitionIn',
        // ),

        // 'popupCustomTransitionOut' => array(
        //  'value' => '',
        //  'name' => cp__('Custom closing transition'),
        //  'keys' => 'popupCustomTransitionOut',
        // ),

        'popupOverlayBackground' => array(
            'value' => 'rgba(0,0,0,.85)',
            'name' => cp__('Overlay color'),
            'keys' => 'popupOverlayBackground',
            'desc' => cp__('The overlay color. You can use color names, hexadecimal, RGB or RGBA values.')
        ),

        'popupOverlayDurationIn' => array(
            'value' => 400,
            'name' => cp__('Overlay opening duration'),
            'keys' => 'popupOverlayDurationIn',
            'desc' => cp__('The overlay opening transition duration specified in milliseconds. A second equals to 1000 milliseconds.'),
            'attrs' => array(
                'min' => 0,
                'step' => 100
            )
        ),

        'popupOverlayDurationOut' => array(
            'value' => 400,
            'name' => cp__('Overlay closing duration'),
            'keys' => 'popupOverlayDurationOut',
            'desc' => cp__('The overlay closing transition duration specified in milliseconds. A second equals to 1000 milliseconds.'),
            'attrs' => array(
                'min' => 0,
                'step' => 100
            )
        ),

        // 'popupOverlayEaseIn' => array(
        //  'value' => 'easeInQuint',
        //  'name' => cp__('Overlay opening easing'),
        //  'keys' => 'popupOverlayEaseIn',
        //  'desc' => cp__('The timing function of the animation. With it you can manipulate the movement of animated objects. Please click on the link next to this select field to open easings.net for more information and real-time examples.')
        // ),

        // 'popupOverlayEaseOut' => array(
        //  'value' => 'easeInQuint',
        //  'name' => cp__('Overlay closing easing'),
        //  'keys' => 'popupOverlayEaseOut',
        //  'desc' => cp__('The timing function of the animation. With it you can manipulate the movement of animated objects. Please click on the link next to this select field to open easings.net for more information and real-time examples.')
        // ),

        'popupOverlayTransitionIn' => array(
            'value' => 'fade',
            'name' => cp__('Opening transition'),
            'keys' => 'popupOverlayTransitionIn',
            'desc' => cp__('Choose from one of the pre-defined overlay opening transitions.'),
            'options' => array(
                'fade' => cp__('Fade'),
                'slidefromtop' => cp__('Slide from top'),
                'slidefrombottom' => cp__('Slide from bottom'),
                'slidefromleft' => cp__('Slide from left'),
                'slidefromright' => cp__('Slide from right'),
                'fadefromtopright' => cp__('Fade from top right'),
                'fadefromtopleft' => cp__('Fade from top left'),
                'fadefrombottomright' => cp__('Fade from bottom right'),
                'fadefrombottomleft' => cp__('Fade from bottom left'),
                'scale' => cp__('Scale')
            )
        ),

        'popupOverlayTransitionOut' => array(
            'value' => 'fade',
            'name' => cp__('Closing transition'),
            'keys' => 'popupOverlayTransitionOut',
            'desc' => cp__('Choose from one of the pre-defined overlay closing transitions.'),
            'options' => array(
                'fade' => cp__('Fade'),
                'slidetotop' => cp__('Slide to top'),
                'slidetobottom' => cp__('Slide to bottom'),
                'slidetoleft' => cp__('Slide to left'),
                'slidetoright' => cp__('Slide to right'),
                'fadetotopright' => cp__('Fade to top right'),
                'fadetotopleft' => cp__('Fade to top left'),
                'fadetobottomright' => cp__('Fade to bottom right'),
                'fadetobottomleft' => cp__('Fade to bottom left'),
                'scale' => cp__('Scale')
            )
        ),

        'popupRoles' => array(
            'value' => array('0'),
            'name' => cp__('Show Popup for group(s)'),
            'keys' => 'popup_roles',
            'desc' => cp__('PrestaShop has three default customer groups<br><i>Visitor</i> - All persons without a customer account or customers that are not logged in.<br><i>Guest</i> - All persons who placed an order through Guest Checkout.<br><i>Customer</i> - All persons who created an account on this site.'),
            'props' => array( 'meta' => true ),
            'attrs' => array( 'multiple' => true, 'size' => 4, 'style' => 'height:auto' ),
            'options' => cp_get_options(Group::getGroups(Context::getContext()->language->id), 'id_group')
        ),

        'popupFirstTimeVisitor' => array(
            'value' => false,
            'name' => cp__('Show only for first time visitors'),
            'keys' => 'popup_first_time_visitor',
            'props' => array( 'meta' => true )
        ),

        'popupRepeat' => array(
            'value' => true,
            'name' => cp__('Repeat Popup'),
            'keys' => 'popup_repeat',
            'desc' => cp__('Enables or disables repeating this Popup to your target audience with the below specified frequency.'),
            'props' => array( 'meta' => true )
        ),

        'popupRepeatDays' => array(
            'value' => '',
            'name' => cp__('Repeat after'),
            'keys' => 'popup_repeat_days',
            'desc' => cp__('Controls the repeat frequency of this Popup specified in days. Leave this option empty if you want to display the Popup on each page load. Enter 0 to repeat after the end of a browsing session (when the browser closes).'),
            'props' => array( 'meta' => true ),
            'attrs' => array(
                'type' => 'number',
                'min' => 0,
                'max' => 365
            )
        ),

        // ========== //
        // |  Misc  | //
        // ========== //

        'shop' => array(
            'value' => '0',
            'name' => cp__('Store'),
            'keys' => 'shop',
            'desc' => cp__('Popup will appear only on the selected shop. (In case of Multistore)'),
            'props' => array( 'meta' => true ),
            'options' => cp_get_options(Shop::getShops(), 'id_shop')
        ),

        'lang' => array(
            'value' => '0',
            'name' => cp__('Language'),
            'keys' => 'lang',
            'desc' => cp__('Popup will appear only on the selected language. (In case of multilanguage)'),
            'props' => array( 'meta' => true ),
            'options' => cp_get_options(Language::getLanguages(), 'id_lang')
        ),

        'cats' => array(
            'value' => array('all'),
            'name' => cp__('Show popup on these<br>Categories & Pages'),
            'keys' => 'cats',
            'props' => array( 'meta' => true ),
            'attrs' => array( 'multiple' => true, 'size' => 15, 'style' => 'width:auto; height:auto;' ),
            'options' => cp_get_options(CpHelper::getCategories(), 'value', 'option', false)
        ),

        'pages' => array(
            'value' => array('all'),
            'name' => cp__('Show popup on these<br>Categories & Pages'),
            'keys' => 'pages',
            'desc' => cp__('Use Ctrl to select multiple categories or pages.'),
            'props' => array( 'meta' => true ),
            'attrs' => array( 'multiple' => true, 'size' => 15, 'style' => 'width:auto; height:auto;' ),
            'options' => cp_get_options(CpHelper::getCMSCategories(), 'value', 'option', false)
        ),

        'allowRestartOnResize' => array(
            'value' => false,
            'name' => cp__('Allow restarting pages on resize'),
            'keys' => 'allowRestartOnResize',
            'desc' => cp__('Certain transformation and transition options cannot be updated on the fly when the browser size or device orientation changes. By enabling this option, the popup will automatically detect such situations and will restart the itself to preserve its appearance.'),
            'advanced' => true
        ),

        'preferBlendMode' => array(
            'value' => 'disabled',
            'name' => cp__('Prefer Blend Mode'),
            'keys' => 'preferBlendMode',
            'desc' => cp__('Enable this option to avoid blend mode issues with page transitions. Due to technical limitations, this will also clip your page transitions regardless of your settings.'),
            'options' => array(
                'enabled' => cp__('Enabled'),
                'disabled' => cp__('Disabled')
            ),
            'advanced' => true
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
            'value' => 'date_add',
            'keys' => 'post_orderby',
            'options' => array(
                'date_add' => cp__('Date Created'),
                'date_upd' => cp__('Last Modified'),
                'position' => cp__('Popularity'),
                'quantity' => cp__('Sold quantity'),
                'reduction' => cp__('Special offer'),
                'name' => cp__('Product name'),
                'price' => cp__('Product price'),
                'rand' => cp__('Random'),
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'postOrder' => array(
            'value' => 'DESC',
            'keys' => 'post_order',
            'options' => array(
                'ASC' => cp__('Ascending'),
                'DESC' => cp__('Descending')
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

        // The background image of pages
        // Defaults to: void
        'image' => array (
            'value' => '',
            'name' => cp__('Set a page image'),
            'keys' => 'background',
            'tooltip' => cp__('The page image/background. Click on the image to open the Image Manager to choose or upload an image.'),
            'props' => array('meta' => true)
        ),

        'imageId' => array (
            'value' => '',
            'keys' => 'backgroundId',
            'props' => array('meta' => true)
        ),

        'imageSize' => array(
            'value' => 'inherit',
            'name' => cp__('Size'),
            'keys' => 'bgsize',
            'tooltip' => cp__('The size of the page background image. Leave this option on inherit if you want to set it globally from More Settings / Default Options.'),
            'options' => array(
                'inherit' => cp__('Inherit'),
                'auto' => cp__('Auto'),
                'cover' => cp__('Cover'),
                'contain' => cp__('Contain'),
                '100% 100%' => cp__('Stretch')
            )
        ),

        'imagePosition' => array(
            'value' => 'inherit',
            'name' => cp__('Position'),
            'keys' => 'bgposition',
            'tooltip' => cp__('The position of the page background image. Leave this option on inherit if you want to set it globally from More Settings / Default Options.'),
            'options' => array(
                'inherit' => cp__('Inherit'),
                '0% 0%' => cp__('left top'),
                '0% 50%' => cp__('left center'),
                '0% 100%' => cp__('left bottom'),
                '50% 0%' => cp__('center top'),
                '50% 50%' => cp__('center center'),
                '50% 100%' => cp__('center bottom'),
                '100% 0%' => cp__('right top'),
                '100% 50%' => cp__('right center'),
                '100% 100%' => cp__('right bottom')
            )
        ),

        'imageColor' => array(
            'value' => '',
            'name' => cp__('Color'),
            'keys' => 'bgcolor',
            'tooltip' => cp__('The page background color. You can use color names, hexadecimal, RGB or RGBA values.')
        ),

        'thumbnail' => array (
            'value' => '',
            'name' => cp__('Set a page thumbnail'),
            'keys' => 'thumbnail',
            'tooltip' => cp__('The thumbnail image of this page. Click on the image to open the Image Manager to choose or upload an image. If you leave this field empty, the page image will be used.'),
            'props' => array('meta' => true)
        ),

        'thumbnailId' => array (
            'value' => '',
            'keys' => 'thumbnailId',
            'props' => array('meta' => true)
        ),

        // Default page delay in millisecs.
        // Defaults to: 4000 (ms) => 4secs
        'delay' => array(
            'value' => '',
            'name' => cp__('Duration'),
            'keys' => array('slidedelay', 'duration'),
            'tooltip' => cp__("Here you can set the time interval between page changes, this page will stay visible for the time specified here. This value is in millisecs, so the value 1000 means 1 second. Please don't use 0 or very low values."),
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
            'name' => cp__('Duration'),
            'keys' => 'transitionduration',
            'tooltip' => cp__("We've made our pre-defined page transitions with special care to fit in most use cases. However, if you would like to increase or decrease the speed of these transitions, you can override their timing here by providing your own transition length in milliseconds. (1 second = 1000 milliseconds)"),
            'attrs' => array(
                'type' => 'number',
                'min' => 0,
                'step' => 500,
                'placeholder' => cp__('custom duration')
            )

        ),

        'timeshift' => array(
            'value' => 0,
            'name' => cp__('Time Shift'),
            'keys' => 'timeshift',
            'tooltip' => cp__("You can shift the starting point of the page animation timeline, so layers can animate in an earlier time after a page change. This value is in milliseconds. A second is 1000 milliseconds. You can only use a negative value."),
            'attrs' => array(
                'step' => 50
            )
        ),

        'linkUrl' => array(
            'value' => '',
            'name' => cp__('Enter URL'),
            'keys' => array('layer_link', 'linkUrl'),
            'tooltip' => cp__('If you want to link the whole page, type the URL here. You can choose one of the pre-defined options from the dropdown list when you click into this field. You can also type a hash mark followed by a number to link this layer to another page. Example: #3 - this will switch to the third page.'),
            'attrs' => array(
                'data-options' => '[{
                    "name": "Switch to the next page",
                    "value": "#next"
                }, {
                    "name": "Switch to the previous page",
                    "value": "#prev"
                }, {
                    "name": "Stop the pageshow",
                    "value": "#stop"
                }, {
                    "name": "Resume the pageshow",
                    "value": "#start"
                }, {
                    "name": "Replay the page from the start",
                    "value": "#replay"
                }, {
                    "name": "Reverse the page, then pause it",
                    "value": "#reverse"
                }, {
                    "name": "Reverse the page, then replay it",
                    "value": "#reverse-replay"
                }, {
                    "name": "Close the Popup",
                    "value": "#closepopup"
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
            'name' => cp__('Link Target'),
            'keys' => array('layer_link_target', 'linkTarget'),
            'options' => array(
                '_self' => cp__('Open on the same page'),
                '_blank' => cp__('Open on new page'),
                '_parent' => cp__('Open in parent frame'),
                '_top' => cp__('Open in main frame'),
                'cp-scroll' => cp__('Scroll to element (Enter selector)')
            ),
            'props' => array(
                'meta' => true
            )

        ),

        'linkType' => array(
            'value' => 'over',
            'keys' => array('layer_link_type', 'linkType'),
            'tooltip' => cp__('Choose whether the page link should be on top or underneath your layers. The later option makes the link clickable only at empty spaces where the page background is visible, and enables you to link both pages and layers independently from each other.'),
            'options' => array(
                'over' => cp__('On top of layers'),
                'under' => cp__('Underneath layers'),
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'ID' => array(
            'value' => '',
            'name' => cp__('#ID'),
            'keys' => 'id',
            'tooltip' => cp__('You can apply an ID attribute on the HTML element of this page to work with it in your custom CSS or Javascript code.'),
            'props' => array(
                'meta' => true
            )
        ),

        'deeplink' => array(
            'value' => '',
            'name' => cp__('Deeplink'),
            'keys' => 'deeplink',
            'tooltip' => cp__('You can specify a page alias name which you can use in your URLs with a hash mark, so popup will start with the correspondig page.')
        ),

        'globalHover' => array(
            'value' => false,
            'name' => cp__('Global Hover'),
            'keys' => 'globalhover',
            'tooltip' => cp__('By turning this option on, all layers will trigger their Hover Transitions at the same time when you hover over the popup with your mouse cursor. It’s useful to create spectacular effects that involve multiple layer transitions and activate on hovering over the popup instead of individual layers.'),
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
            'name' => cp__('Hidden'),
            'keys' => 'skip',
            'tooltip' => cp__("If you don't want to use this page in your front-page, but you want to keep it, you can hide it with this switch."),
            'props' => array(
                'meta' => true
            )
        ),


        'overflow' => array(
            'value' => false,
            'name' => cp__('Overflow layers'),
            'keys' => 'overflow',
            'tooltip' => cp__('By default the popup clips the layers outside of its bounds. Enable this option to allow overflowing content.')
        ),

        // Ken Burns effect
        'kenBurnsZoom' => array(
            'value' => 'disabled',
            'name' => cp__('Zoom'),
            'keys' => 'kenburnszoom',
            'options' => array(
                'disabled' => cp__('Disabled'),
                'in' => cp__('Zoom In'),
                'out' => cp__('Zoom Out'),
            )
        ),

        'kenBurnsRotate' => array(
            'value' => '',
            'name' => cp__('Rotate'),
            'keys' => 'kenburnsrotate',
            'tooltip' => cp__('The amount of rotation (if any) in degrees used in the Ken Burns effect. Negative values are allowed for counterclockwise rotation.'),

        ),

        'kenBurnsScale' => array(
            'value' => 1.2,
            'name' => cp__('Scale'),
            'keys' => 'kenburnsscale',
            'tooltip' => cp__('Increase or decrease the size of the page background image in the Ken Burns effect. The default value is 1, the value 2 will double the image, while 0.5 results half the size. Negative values will flip the image.'),
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
            'name' => cp__('Type'),
            'keys' => 'parallaxtype',
            'tooltip' => cp__('The default value for parallax layers on this page, which they will inherit, unless you set it otherwise on the affected layers.'),
            'options' => array(
                '2d' => cp__('2D'),
                '3d' => cp__('3D')
             )
        ),

        'parallaxEvent' => array(
            'value' => 'cursor',
            'name' => cp__('Event'),
            'keys' => 'parallaxevent',
            'tooltip' => cp__('You can trigger the parallax effect by either scrolling the site, or by moving your mouse cursor / tilting your mobile device. This is the default value on this page, which parallax layers will inherit, unless you set it otherwise directly on them.'),
            'options' => array(
                'cursor' => cp__('Cursor or Tilt'),
                'scroll' => cp__('Scroll')
             )
        ),

        'parallaxAxis' => array(
            'value' => 'both',
            'name' => cp__('Axes'),
            'keys' => 'parallaxaxis',
            'tooltip' => cp__('Choose on which axes parallax layers should move. This is the default value on this page, which parallax layers will inherit, unless you set it otherwise directly on them.'),
            'options' => array(
                'none' => cp__('None'),
                'both' => cp__('Both axes'),
                'x' => cp__('Horizontal only'),
                'y' => cp__('Vertical only')
            )
        ),


        'parallaxTransformOrigin' => array(
            'value' => '50% 50% 0',
            'name' => cp__('Transform Origin'),
            'keys' => 'parallaxtransformorigin',
            'tooltip' => cp__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center.')
        ),

        'parallaxDurationMove' => array(
            'value' => 1500,
            'name' => cp__('Move duration'),
            'keys' => 'parallaxdurationmove',
            'tooltip' => cp__('Controls the speed of animating layers when you move your mouse cursor or tilt your mobile device. This is the default value on this page, which parallax layers will inherit, unless you set it otherwise directly on them.'),
            'attrs' => array(
                'type' => 'number',
                'step' => 100,
                'min' => 0
            )
        ),

        'parallaxDurationLeave' => array(
            'value' => 1200,
            'name' => cp__('Leave duration'),
            'keys' => 'parallaxdurationleave',
            'tooltip' => cp__('Controls how quickly your layers revert to their original position when you move your mouse cursor outside of a parallax popup. This value is in milliseconds. 1 second = 1000 milliseconds. This is the default value on this page, which parallax layers will inherit, unless you set it otherwise directly on them.'),
            'attrs' => array(
                'type' => 'number',
                'step' => 100,
                'min' => 0
            )
        ),

        'parallaxDistance' => array(
            'value' => 10,
            'name' => cp__('Distance'),
            'keys' => 'parallaxdistance',
            'tooltip' => cp__('Increase or decrease the amount of layer movement when moving your mouse cursor or tilting on a mobile device. This is the default value on this page, which parallax layers will inherit, unless you set it otherwise directly on them.'),
            'attrs' => array(
                'type' => 'number',
                'step' => 1
            )

        ),

        'parallaxRotate' => array(
            'value' => 10,
            'name' => cp__('Rotation'),
            'keys' => 'parallaxrotate',
            'tooltip' => cp__('Increase or decrease the amount of layer rotation in the 3D space when moving your mouse cursor or tilting on a mobile device. This is the default value on this page, which parallax layers will inherit, unless you set it otherwise directly on them.'),
            'attrs' => array(
                'type' => 'number',
                'step' => 1
            )
        ),

        'parallaxPerspective' => array(
            'value' => 500,
            'name' => cp__('Perspective'),
            'keys' => 'parallaxtransformperspective',
            'tooltip' => cp__('Changes the perspective of layers in the 3D space. This is the default value on this page, which parallax layers will inherit, unless you set it otherwise directly on them.'),
            'attrs' => array(
                'type' => 'number',
                'step' => 100
            )
        ),

        // 'filterFrom' => array(
        //     'value' => '',
        //     'name' => cp__('Filter From'),
        //     'keys' => 'filterfrom',
        //     'tooltip' => cp__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use.'),
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
        //     'name' => cp__('Filter To'),
        //     'keys' => 'filterto',
        //     'tooltip' => cp__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use.'),
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
            'name' => cp__('Autoplay'),
            'keys' => 'autoplay',
            'options' => array(
                'inherit' => cp__('Inherit'),
                'enabled' => cp__('Enabled'),
                'disabled' => cp__('Disabled')
            )
        ),

        'mediaInfo' => array(
            'value' => true,
            'name' => cp__('Show Info'),
            'keys' => 'showinfo',
            'options' => array(
                'auto' => cp__('Auto'),
                'enabled' => cp__('Enabled'),
                'disabled' => cp__('Disabled')
            )
        ),

        'mediaControls' => array(
            'value' => true,
            'name' => cp__('Controls'),
            'keys' => 'controls',
            'options' => array(
                'auto' => cp__('Auto'),
                'enabled' => cp__('Enabled'),
                'disabled' => cp__('Disabled')
            )
        ),


        'mediaPoster' => array(
            'value' => '',
            'keys' => 'poster',
        ),


        'mediaFillMode' => array(
            'value' => 'cover',
            'name' => cp__('Fill mode'),
            'keys' => 'fillmode',
            'options' => array(
                'contain'  => cp__('Contain'),
                'cover'  => cp__('Cover')
            )
        ),


        'mediaVolume' => array(
            'value' => '',
            'name' => cp__('Volume'),
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
            'name' => cp__('Use this video as page background'),
            'keys' => 'backgroundvideo',
            'tooltip' => cp__('Forces this layer to act like the page background by covering the whole popup and ignoring some transitions. Please make sure to provide your own poster image with the option above, so the popup can display it immediately.')
        ),

        'mediaOverlay' => array(
            'value' => 'disabled',
            'name' => cp__('Choose an overlay image:'),
            'keys' => 'overlay',
            'tooltip' => cp__('Cover your videos with an overlay image to have dotted or striped effects on them.')
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
            'name' => cp__('OffsetX'),
            'keys' => 'offsetxin',
            'tooltip' => cp__("Shifts the layer starting position from its original on the horizontal axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'left' or 'right' position the layer out the staging area, so it enters the scene from either side when animating to its destination location."),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
                "name": "50% popup width",
                "value": "50sw"
            }, {
                "name": "-50% popup width",
                "value": "-50sw"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'transitionInOffsetY' => array(
            'value' => '0',
            'name' => cp__('OffsetY'),
            'keys' => 'offsetyin',
            'tooltip' => cp__("Shifts the layer starting position from its original on the vertical axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the height of this layer. The values 'top' or 'bottom' position the layer out the staging area, so it enters the scene from either vertical side when animating to its destination location."),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
                "name": "50% popup height",
                "value": "50sh"
            }, {
                "name": "-50% popup height",
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
            'name' => cp__('Duration'),
            'keys' => 'durationin',
            'tooltip' => cp__('The length of the transition in milliseconds when the layer enters the scene. A second equals to 1000 milliseconds.'),
            'attrs' => array('min' => 0, 'step' => 50, 'placeholder' => 1000)
        ),

        // Delay before the transition in millisecs when a layer animates in.
        // Original: delayin
        // Defaults to: 0 (ms)
        'transitionInDelay' => array(
            'value' => 0,
            'name' => cp__('Start at'),
            'keys' => 'delayin',
            'tooltip' => cp__('Delays the transition with the given amount of milliseconds before the layer enters the scene. A second equals to 1000 milliseconds.'),
            'attrs' => array('min' => 0, 'step' => 50, 'placeholder' => 0)
        ),

        // Easing of the transition when a layer animates in.
        // Original: easingin
        // Defaults to: 'easeInOutQuint'
        'transitionInEasing' => array(
            'value' => 'easeInOutQuint',
            'name' => cp__('Easing'),
            'keys' => 'easingin',
            'tooltip' => cp__("The timing function of the animation. With this function you can manipulate the movement of the animated object. Please click on the link next to this select field to open easings.net for more information and real-time examples.")
        ),

        'transitionInFade' => array(
            'value' => true,
            'name' => cp__('Fade'),
            'keys' => 'fadein',
            'tooltip' => cp__('Fade the layer during the transition.'),
        ),

        // Initial rotation degrees when a layer animates in.
        // Original: rotatein
        // Defaults to: 0 (deg)
        'transitionInRotate' => array(
            'value' => 0,
            'name' => cp__('Rotate'),
            'keys' => 'rotatein',
            'tooltip' => cp__('Rotates the layer by the given number of degrees. Negative values are allowed for counterclockwise rotation.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionInRotateX' => array(
            'value' => 0,
            'name' => cp__('RotateX'),
            'keys' => 'rotatexin',
            'tooltip' => cp__('Rotates the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionInRotateY' => array(
            'value' => 0,
            'name' => cp__('RotateY'),
            'keys' => 'rotateyin',
            'tooltip' => cp__('Rotates the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionInSkewX' => array(
            'value' => 0,
            'name' => cp__('SkewX'),
            'keys' => 'skewxin',
            'tooltip' => cp__('Skews the layer along the X (horizontal) by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionInSkewY' => array(
            'value' => 0,
            'name' => cp__('SkewY'),
            'keys' => 'skewyin',
            'tooltip' => cp__('Skews the layer along the Y (vertical) by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionInScaleX' => array(
            'value' => 1,
            'name' => cp__('ScaleX'),
            'keys' => 'scalexin',
            'tooltip' => cp__("Scales the layer along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'transitionInScaleY' => array(
            'value' => 1,
            'name' => cp__('ScaleY'),
            'keys' => 'scaleyin',
            'tooltip' => cp__("Scales the layer along the Y (vertical) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'transitionInTransformOrigin' => array(
            'value' => '50% 50% 0',
            'name' => cp__('Transform Origin'),
            'keys' => 'transformoriginin',
            'tooltip' => cp__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center, popupcenter, popupmiddle, popuptop, popupright, popupbottom, popupleft.'),
            'attrs' => array('placeholder' => '50% 50% 0')
        ),

        'transitionInClip' => array(
            'value' => '',
            'name' => cp__('Mask'),
            'keys' => 'clipin',
            'tooltip' => cp__("Clips (cuts off) the sides of the layer by the given amount specified in pixels or percentages. The 4 value in order: top, right, bottom and the left side of the layer."),
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
            'name' => cp__('Background'),
            'keys' => 'bgcolorin',
            'tooltip' => cp__("The background color of your layer. You can use color names, hexadecimal, RGB or RGBA values as well as the 'transparent' keyword. Example: #FFF"),
        ),

        'transitionInColor' => array(
            'value' => '',
            'name' => cp__('Color'),
            'keys' => 'colorin',
            'tooltip' => cp__("The color of your text. You can use color names, hexadecimal, RGB or RGBA values. Example: #333"),
        ),

        'transitionInRadius' => array(
            'value' => '',
            'name' => cp__('Rounded Corners'),
            'keys' => 'radiusin',
            'tooltip' => cp__('If you want rounded corners, you can set its radius here in pixels. Example: 5px'),
        ),

        'transitionInWidth' => array(
            'value' => '',
            'name' => cp__('Width'),
            'keys' => 'widthin',
            'tooltip' => cp__('The initial width of this layer from which it will be animated to its proper size during the transition.'),
        ),

        'transitionInHeight' => array(
            'value' => '',
            'name' => cp__('Height'),
            'keys' => 'heightin',
            'tooltip' => cp__('The initial height of this layer from which it will be animated to its proper size during the transition.'),
        ),

        'transitionInFilter' => array(
            'value' => '',
            'name' => cp__('Filter'),
            'keys' => 'filterin',
            'tooltip' => cp__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use. Click on the "Filter" link for more information.'),
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
            'name' => cp__('Perspective'),
            'keys' => 'transformperspectivein',
            'tooltip' => cp__('Changes the perspective of this layer in the 3D space.'),
            'attrs' => array('placeholder' => 500)
        ),

        // ======

        'transitionOut' => array(
            'value' => true,
            'keys' => 'transitionout'
        ),

        'transitionOutOffsetX' => array(
            'value' => 0,
            'name' => cp__('OffsetX'),
            'keys' => 'offsetxout',
            'tooltip' => cp__("Shifts the layer from its original position on the horizontal axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'left' or 'right' animate the layer out the staging area, so it can leave the scene on either side."),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
                "name": "50% popup width",
                "value": "50sw"
            }, {
                "name": "-50% popup width",
                "value": "-50sw"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'transitionOutOffsetY' => array(
            'value' => 0,
            'name' => cp__('OffsetY'),
            'keys' => 'offsetyout',
            'tooltip' => cp__("Shifts the layer from its original position on the vertical axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the height of this layer. The values 'top' or 'bottom' animate the layer out the staging area, so it can leave the scene on either vertical side."),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
                "name": "50% popup height",
                "value": "50sh"
            }, {
                "name": "-50% popup height",
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
            'name' => cp__('Duration'),
            'keys' => 'durationout',
            'tooltip' => cp__('The length of the transition in milliseconds when the layer leaves the page. A second equals to 1000 milliseconds.'),
            'attrs' => array('min' => 0, 'step' => 50, 'placeholder' => 1000)
        ),

        'showUntil' => array(
            'value' => '0',
            'keys' => 'showuntil'
        ),

        'transitionOutStartAt' => array(
            'value' => 'slidechangeonly',
            'name' => cp__('Start at'),
            'keys' => 'startatout',
            'tooltip' => cp__('You can set the starting time of this transition. Use one of the pre-defined options to use relative timing, which can be shifted with custom operations.'),
            'attrs' => array('type' => 'hidden')
        ),


        'transitionOutStartAtTiming' => array(
            'value' => 'slidechangeonly',
            'keys' => 'startatouttiming',
            'props' => array('meta' => true),
            'options' => array(
                'slidechangeonly' => cp__('Page change starts (ignoring modifier)'),
                'transitioninend' => cp__('Opening Transition completes'),
                'textinstart' => cp__('Opening Text Transition starts'),
                'textinend' => cp__('Opening Text Transition completes'),
                'allinend' => cp__('Opening and Opening Text Transition complete'),
                'loopstart' => cp__('Loop starts'),
                'loopend' => cp__('Loop completes'),
                'transitioninandloopend' => cp__('Opening and Loop Transitions complete'),
                'textinandloopend' => cp__('Opening Text and Loop Transitions complete'),
                'allinandloopend' => cp__('Opening, Opening Text and Loop Transitions complete'),
                'textoutstart' => cp__('Ending Text Transition starts'),
                'textoutend' => cp__('Ending Text Transition completes'),
                'textoutandloopend' => cp__('Ending Text and Loop Transitions complete')
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
            'props' => array('meta' => true),
            'attrs' => array('step' => 50, 'placeholder' => 0)
        ),

        // Easing of the transition when a layer animates out.
        // Original: easingout
        // Defaults to: 'easeInOutQuint'
        'transitionOutEasing' => array(
            'value' => 'easeInOutQuint',
            'name' => cp__('Easing'),
            'keys' => 'easingout',
            'tooltip' => cp__("The timing function of the animation. With this function you can manipulate the movement of the animated object. Please click on the link next to this select field to open easings.net for more information and real-time examples.")
        ),

        'transitionOutFade' => array(
            'value' => true,
            'name' => cp__('Fade'),
            'keys' => 'fadeout',
            'tooltip' => cp__('Fade the layer during the transition.'),
        ),


        // Initial rotation degrees when a layer animates out.
        // Original: rotateout
        // Defaults to: 0 (deg)
        'transitionOutRotate' => array(
            'value' => 0,
            'name' => cp__('Rotate'),
            'keys' => 'rotateout',
            'tooltip' => cp__('Rotates the layer by the given number of degrees. Negative values are allowed for counterclockwise rotation.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionOutRotateX' => array(
            'value' => 0,
            'name' => cp__('RotateX'),
            'keys' => 'rotatexout',
            'tooltip' => cp__('Rotates the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionOutRotateY' => array(
            'value' => 0,
            'name' => cp__('RotateY'),
            'keys' => 'rotateyout',
            'tooltip' => cp__('Rotates the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionOutSkewX' => array(
            'value' => 0,
            'name' => cp__('SkewX'),
            'keys' => 'skewxout',
            'tooltip' => cp__('Skews the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionOutSkewY' => array(
            'value' => 0,
            'name' => cp__('SkewY'),
            'keys' => 'skewyout',
            'tooltip' => cp__('Skews the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'transitionOutScaleX' => array(
            'value' => 1,
            'name' => cp__('ScaleX'),
            'keys' => 'scalexout',
            'tooltip' => cp__("Scales the layer along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'transitionOutScaleY' => array(
            'value' => 1,
            'name' => cp__('ScaleY'),
            'keys' => 'scaleyout',
            'tooltip' => cp__("Scales the layer along the Y (vertical) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'transitionOutTransformOrigin' => array(
            'value' => '50% 50% 0',
            'name' => cp__('Transform Origin'),
            'keys' => 'transformoriginout',
            'tooltip' => cp__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center, popupcenter, popupmiddle, popuptop, popupright, popupbottom, popupleft.'),
            'attrs' => array('placeholder' => '50% 50% 0')
        ),

        'transitionOutClip' => array(
            'value' => '',
            'name' => cp__('Mask'),
            'keys' => 'clipout',
            'tooltip' => cp__("Clips (cuts off) the sides of the layer by the given amount specified in pixels or percentages. The 4 value in order: top, right, bottom and the left side of the layer."),
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
            'name' => cp__('Filter'),
            'keys' => 'filterout',
            'tooltip' => cp__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use. Click on the "Filter" link for more information.'),
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
            'name' => cp__('Perspective'),
            'keys' => 'transformperspectiveout',
            'tooltip' => cp__('Changes the perspective of this layer in the 3D space.'),
            'attrs' => array('placeholder' => 500)
        ),

        // -----

        'skipLayer' => array(
            'value' => false,
            'name' => cp__('Hidden'),
            'keys' => 'skip',
            'tooltip' => cp__("If you don't want to use this layer, but you want to keep it, you can hide it with this switch."),
            'props' => array(
                'meta' => true
            )
        ),

        'transitionOutBGColor' => array(
            'value' => '',
            'name' => cp__('Background'),
            'keys' => 'bgcolorout',
            'tooltip' => cp__('Animates the background toward the color you specify here when the layer leaves the popup canvas.'),
        ),

        'transitionOutColor' => array(
            'value' => '',
            'name' => cp__('Color'),
            'keys' => 'colorout',
            'tooltip' => cp__('Animates the text color toward the color you specify here when the layer leaves the popup canvas.'),
        ),

        'transitionOutRadius' => array(
            'value' => '',
            'name' => cp__('Rounded Corners'),
            'keys' => 'radiusout',
            'tooltip' => cp__('Animates rounded corners toward the value you specify here when the layer leaves the popup canvas.'),
        ),

        'transitionOutWidth' => array(
            'value' => '',
            'name' => cp__('Width'),
            'keys' => 'widthout',
            'tooltip' => cp__('Animates the layer width toward the value you specify here when the layer leaves the popup canvas.'),
        ),

        'transitionOutHeight' => array(
            'value' => '',
            'name' => cp__('Height'),
            'keys' => 'heightout',
            'tooltip' => cp__('Animates the layer height toward the value you specify here when the layer leaves the popup canvas.'),
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
            'name' => cp__('Text Animation'),
            'keys' => 'texttypein',
            'tooltip' => cp__('Select how your text should be split and animated.'),
            'options' => array(
                'chars_asc'  => cp__('by chars ascending'),
                'chars_desc' => cp__('by chars descending'),
                'chars_rand' => cp__('by chars random'),
                'chars_center' => cp__('by chars center to edge'),
                'chars_edge' => cp__('by chars edge to center'),
                'words_asc'  => cp__('by words ascending'),
                'words_desc' => cp__('by words descending'),
                'words_rand' => cp__('by words random'),
                'words_center' => cp__('by words center to edge'),
                'words_edge' => cp__('by words edge to center'),
                'lines_asc'  => cp__('by lines ascending'),
                'lines_desc' => cp__('by lines descending'),
                'lines_rand' => cp__('by lines random'),
                'lines_center' => cp__('by lines center to edge'),
                'lines_edge' => cp__('by lines edge to center'),
            ),
            'props' => array(
                'output' => true
            )
        ),

        'textShiftIn' => array(
            'value' => 50,
            'name' => cp__('Shift In'),
            'tooltip' => cp__('Delays the transition of each text nodes relative to each other. A second equals to 1000 milliseconds.'),
            'keys'  => 'textshiftin',
            'attrs' => array('type' => 'number', 'placeholder' => 50)
        ),

        'textOffsetXIn' => array(
            'value' => 0,
            'name' => cp__('OffsetX'),
            'tooltip' => cp__("Shifts the starting position of text nodes from their original on the horizontal axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'left' or 'right' position text nodes out the staging area, so they enter the scene from either side when animating to their destination location. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values."),
            'keys'  => 'textoffsetxin',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
                "name": "50% popup width",
                "value": "50sw"
            }, {
                "name": "-50% popup width",
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
            'name' => cp__('OffsetY'),
            'tooltip' => cp__("Shifts the starting position of text nodes from their original on the vertical axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'top' or 'bottom' position text nodes out the staging area, so they enter the scene from either vertical side when animating to their destination location. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values."),
            'keys'  => 'textoffsetyin',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
                "name": "50% popup height",
                "value": "50sh"
            }, {
                "name": "-50% popup height",
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
            'name' => cp__('Duration'),
            'tooltip' => cp__('The transition length in milliseconds of the individual text fragments. A second equals to 1000 milliseconds.'),
            'keys'  => 'textdurationin',
            'attrs' => array('min' => 0, 'step' => 50, 'placeholder' => 1000)
        ),

        'textEasingIn' => array(
            'value' => 'easeInOutQuint',
            'name' => cp__('Easing'),
            'tooltip' => cp__("The timing function of the animation. With this function you can manipulate the movement of animated text fragments. Please click on the link next to this select field to open easings.net for more information and real-time examples."),
            'keys'  => 'texteasingin',
        ),

        'textFadeIn' => array(
            'value' => true,
            'name' => cp__('Fade'),
            'tooltip' => cp__('Fade the text fragments during their transition.'),
            'keys'  => 'textfadein'
        ),

        'textStartAtIn' => array(
            'value' => 'transitioninend',
            'name' => cp__('StartAt'),
            'tooltip' => cp__('You can set the starting time of this transition. Use one of the pre-defined options to use relative timing, which can be shifted with custom operations.'),
            'keys'  => 'textstartatin',
            'attrs' => array('type' => 'hidden')
        ),

        'textStartAtInTiming' => array(
            'value' => 'transitioninend',
            'keys'  => 'textstartatintiming',
            'props' => array('meta' => true),
            'options' => array(
                'transitioninstart' => cp__('Opening Transition starts'),
                'transitioninend' => cp__('Opening Transition completes'),
                'loopstart' => cp__('Loop starts'),
                'loopend' => cp__('Loop completes'),
                'transitioninandloopend' => cp__('Opening and Loop Transitions complete')
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
            'props' => array('meta' => true),
            'attrs' => array('step' => 50, 'placeholder' => 0)
        ),



        'textRotateIn' => array(
            'value' => 0,
            'name' => cp__('Rotate'),
            'tooltip' => cp__('Rotates text fragments clockwise by the given number of degrees. Negative values are allowed for counterclockwise rotation. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values.'),
            'keys'  => 'textrotatein',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textRotateXIn' => array(
            'value' => 0,
            'name' => cp__('RotateX'),
            'tooltip' => cp__('Rotates text fragments along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values.'),
            'keys'  => 'textrotatexin',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textRotateYIn' => array(
            'value' => 0,
            'name' => cp__('RotateY'),
            'tooltip' => cp__('Rotates text fragments along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values.'),
            'keys'  => 'textrotateyin',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textScaleXIn' => array(
            'value' => 1,
            'name' => cp__('ScaleX'),
            'keys'  => 'textscalexin',
            'tooltip' => cp__("Scales text fragments along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks text fragments compared to their original size. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'textScaleYIn' => array(
            'value' => 1,
            'name' => cp__('ScaleY'),
            'keys'  => 'textscaleyin',
            'tooltip' => cp__("Scales text fragments along the Y (vertical) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks text fragments compared to their original size. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'textSkewXIn' => array(
            'value' => 0,
            'name' => cp__('SkewX'),
            'tooltip' => cp__('Skews text fragments along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values.'),
            'keys'  => 'textskewxin',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textSkewYIn' => array(
            'value' => 0,
            'name' => cp__('SkewY'),
            'tooltip' => cp__('Skews text fragments along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values.'),
            'keys'  => 'textskewyin',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),



        'textTransformOriginIn' => array(
            'value' => '50% 50% 0',
            'name' => cp__('Transform Origin'),
            'tooltip' => cp__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center, popupcenter, popupmiddle, popuptop, popupright, popupbottom, popupleft.'),
            'keys'  => 'texttransformoriginin',
            'attrs' => array('placeholder' => '50% 50% 0', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "50% 50% 0|100% 100% 0"
            }]')
        ),

        'textPerspectiveIn' => array(
            'value' => '500',
            'name' => cp__('Perspective'),
            'keys' => 'texttransformperspectivein',
            'tooltip' => cp__('Changes the perspective of this layer in the 3D space.'),
            'attrs' => array('placeholder' => 500)
        ),




        // Text Animation OUT
        // -----------------

        'textTransitionOut' => array(
            'value' => false,
            'keys' => 'texttransitionout'
        ),

        'textTypeOut' => array(
            'value' => 'chars_desc',
            'name' => cp__('Text Animation'),
            'keys' => 'texttypeout',
            'tooltip' => cp__('Select how your text should be split and animated.'),
            'options' => array(
                'chars_asc'  => cp__('by chars ascending'),
                'chars_desc' => cp__('by chars descending'),
                'chars_rand' => cp__('by chars random'),
                'chars_center' => cp__('by chars center to edge'),
                'chars_edge' => cp__('by chars edge to center'),
                'words_asc'  => cp__('by words ascending'),
                'words_desc' => cp__('by words descending'),
                'words_rand' => cp__('by words random'),
                'words_center' => cp__('by words center to edge'),
                'words_edge' => cp__('by words edge to center'),
                'lines_asc'  => cp__('by lines ascending'),
                'lines_desc' => cp__('by lines descending'),
                'lines_rand' => cp__('by lines random'),
                'lines_center' => cp__('by lines center to edge'),
                'lines_edge' => cp__('by lines edge to center'),
            ),
            'props' => array(
                'output' => true
            )
        ),

        'textShiftOut' => array(
            'value' => '',
            'name' => cp__('Shift Out'),
            'tooltip' => cp__('Delays the transition of each text nodes relative to each other. A second equals to 1000 milliseconds.'),
            'keys'  => 'textshiftout',
            'attrs' => array('type' => 'number')
        ),

        'textOffsetXOut' => array(
            'value' => 0,
            'name' => cp__('OffsetX'),
            'tooltip' => cp__("Shifts the ending position of text nodes from their original on the horizontal axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'left' or 'right' position text nodes out the staging area, so they leave the scene from either side when animating to their destination location. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values."),
            'keys'  => 'textoffsetxout',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
                "name": "50% popup width",
                "value": "50sw"
            }, {
                "name": "-50% popup width",
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
            'name' => cp__('OffsetY'),
            'tooltip' => cp__("Shifts the ending position of text nodes from their original on the vertical axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'top' or 'bottom' position text nodes out the staging area, so they leave the scene from either vertical side when animating to their destination location. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values."),
            'keys'  => 'textoffsetyout',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
                "name": "50% popup height",
                "value": "50sh"
            }, {
                "name": "-50% popup height",
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
            'name' => cp__('Duration'),
            'tooltip' => cp__('The transition length in milliseconds of the individual text fragments. A second equals to 1000 milliseconds.'),
            'keys'  => 'textdurationout',
            'attrs' => array('min' => 0, 'step' => 50, 'placeholder' => 1000)
        ),

        'textEasingOut' => array(
            'value' => 'easeInOutQuint',
            'name' => cp__('Easing'),
            'tooltip' => cp__("The timing function of the animation. With this function you can manipulate the movement of animated text fragments. Please click on the link next to this select field to open easings.net for more information and real-time examples."),
            'keys'  => 'texteasingout',
            'attrs' => array('type' => 'hidden')
        ),

        'textFadeOut' => array(
            'value' => true,
            'name' => cp__('Fade'),
            'tooltip' => cp__('Fade the text fragments during their transition.'),
            'keys'  => 'textfadeout'
        ),

        'textStartAtOut' => array(
            'value' => 'allinandloopend',
            'name' => cp__('StartAt'),
            'tooltip' => cp__('You can set the starting time of this transition. Use one of the pre-defined options to use relative timing, which can be shifted with custom operations.'),
            'keys'  => 'textstartatout',
            'attrs' => array('type' => 'hidden')
        ),

        'textStartAtOutTiming' => array(
            'value' => 'allinandloopend',
            'keys'  => 'textstartatouttiming',
            'props' => array('meta' => true),
            'options' => array(
                'transitioninend' => cp__('Opening Transition completes'),
                'textinstart' => cp__('Opening Text Transition starts'),
                'textinend' => cp__('Opening Text Transition completes'),
                'allinend' => cp__('Opening and Opening Text Transition complete'),
                'loopstart' => cp__('Loop starts'),
                'loopend' => cp__('Loop completes'),
                'transitioninandloopend' => cp__('Opening and Loop Transitions complete'),
                'textinandloopend' => cp__('Opening Text and Loop Transitions complete'),
                'allinandloopend' => cp__('Opening, Opening Text and Loop Transitions complete')
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
            'props' => array('meta' => true),
            'attrs' => array('step' => 50, 'placeholder' => 0)
        ),

        'textRotateOut' => array(
            'value' => 0,
            'name' => cp__('Rotate'),
            'tooltip' => cp__('Rotates text fragments clockwise by the given number of degrees. Negative values are allowed for counterclockwise rotation. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values.'),
            'keys'  => 'textrotateout',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
            "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textRotateXOut' => array(
            'value' => 0,
            'name' => cp__('RotateX'),
            'tooltip' => cp__('Rotates text fragments along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values.'),
            'keys'  => 'textrotatexout',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textRotateYOut' => array(
            'value' => 0,
            'name' => cp__('RotateY'),
            'tooltip' => cp__('Rotates text fragments along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values.'),
            'keys'  => 'textrotateyout',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textScaleXOut' => array(
            'value' => 1,
            'name' => cp__('ScaleX'),
            'keys'  => 'textscalexout',
            'tooltip' => cp__("Scales text fragments along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks text fragments compared to their original size. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'textScaleYOut' => array(
            'value' => 1,
            'name' => cp__('ScaleY'),
            'keys'  => 'textscaleyout',
            'tooltip' => cp__("Scales text fragments along the Y (vertical) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks text fragments compared to their original size. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'textSkewXOut' => array(
            'value' => 0,
            'name' => cp__('SkewX'),
            'tooltip' => cp__('Skews text fragments along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values.'),
            'keys'  => 'textskewxout',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'textSkewYOut' => array(
            'value' => 0,
            'name' => cp__('SkewY'),
            'tooltip' => cp__('Skews text fragments along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction. By listing multiple values separated with a | character, the popup will use different transition variations on each text node by cycling between the provided values.'),
            'keys'  => 'textskewyout',
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Cycle between values",
                "value": "30|-30"
            }, {
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),



        'textTransformOriginOut' => array(
            'value' => '50% 50% 0',
            'name' => cp__('Transform Origin'),
            'tooltip' => cp__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center, popupcenter, popupmiddle, popuptop, popupright, popupbottom, popupleft.'),
            'keys'  => 'texttransformoriginout',
            'attrs' => array('type' => 'text', 'placeholder' => '50% 50% 0', 'data-options' => '[{
                "name": "Cycle between values",
                "value": "50% 50% 0|100% 100% 0"
            }]')
        ),


        'textPerspectiveOut' => array(
            'value' => '500',
            'name' => cp__('Perspective'),
            'keys' => 'texttransformperspectiveout',
            'tooltip' => cp__('Changes the perspective of this layer in the 3D space.')
        ),







        // ======


        // LOOP

        'loop' => array(
            'value' => false,
            'keys' => 'loop'
        ),

        'loopOffsetX' => array(
            'value' => 0,
            'name' => cp__('OffsetX'),
            'keys' => 'loopoffsetx',
            'tooltip' => cp__("Shifts the layer starting position from its original on the horizontal axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. The values 'left' or 'right' position the layer out the staging area, so it can leave and re-enter the scene from either side during the transition."),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
                "name": "50% popup width",
                "value": "50sw"
            }, {
                "name": "-50% popup width",
                "value": "-50sw"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'loopOffsetY' => array(
            'value' => 0,
            'name' => cp__('OffsetY'),
            'keys' => 'loopoffsety',
            'tooltip' => cp__("Shifts the layer starting position from its original on the vertical axis with the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the height of this layer. The values 'top' or 'bottom' position the layer out the staging area, so it can leave and re-enter the scene from either vertical side during the transition."),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
                "name": "50% popup height",
                "value": "50sh"
            }, {
                "name": "-50% popup height",
                "value": "-50sh"
            }, {
                "name": "Random",
                "value": "random(-100,100)"
            }]')
        ),

        'loopDuration' => array(
            'value' => 1000,
            'name' => cp__('Duration'),
            'keys' => 'loopduration',
            'tooltip' => cp__('The length of the transition in milliseconds. A second is equal to 1000 milliseconds.'),
            'attrs' => array('min' => 0, 'step' => 100, 'placeholder' => 1000)
        ),

        'loopStartAt' => array(
            'value' => 'allinend',
            'name' => cp__('Start at'),
            'keys' => 'loopstartat',
            'tooltip' => cp__('You can set the starting time of this transition. Use one of the pre-defined options to use relative timing, which can be shifted with custom operations.'),
            'attrs' => array('type' => 'hidden'),
        ),

        'loopStartAtTiming' => array(
            'value' => 'allinend',
            'keys'  => 'loopstartattiming',
            'props' => array('meta' => true),
            'options' => array(
                'transitioninstart' => cp__('Opening Transition starts'),
                'transitioninend' => cp__('Opening Transition completes'),
                'textinstart' => cp__('Opening Text Transition starts'),
                'textinend' => cp__('Opening Text Transition completes'),
                'allinend' => cp__('Opening and Opening Text Transition complete')
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
            'props' => array('meta' => true),
            'attrs' => array('step' => 50, 'placeholder' => 0)
        ),

        'loopEasing' => array(
            'value' => 'linear',
            'name' => cp__('Easing'),
            'keys' => 'loopeasing',
            'tooltip' => cp__("The timing function of the animation to manipualte the layer's movement. Click on the link next to this field to open easings.net for examples and more information")
        ),

        'loopOpacity' => array(
            'value' => 1,
            'name' => cp__('Opacity'),
            'keys' => 'loopopacity',
            'tooltip' => cp__('Fades the layer. You can use values between 1 and 0 to set the layer fully opaque or transparent respectively. For example, the value 0.5 will make the layer semi-transparent.'),
            'attrs' => array('min' => 0, 'max' => 1, 'step' => 0.01, 'placeholder' => 1)
        ),

        'loopRotate' => array(
            'value' => 0,
            'name' => cp__('Rotate'),
            'keys' => 'looprotate',
            'tooltip' => cp__('Rotates the layer by the given number of degrees. Negative values are allowed for counterclockwise rotation.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'loopRotateX' => array(
            'value' => 0,
            'name' => cp__('RotateX'),
            'keys' => 'looprotatex',
            'tooltip' => cp__('Rotates the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'loopRotateY' => array(
            'value' => 0,
            'name' => cp__('RotateY'),
            'keys' => 'looprotatey',
            'tooltip' => cp__('Rotates the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'loopSkewX' => array(
            'value' => 0,
            'name' => cp__('SkewX'),
            'keys' => 'loopskewx',
            'tooltip' => cp__('Skews the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'loopSkewY' => array(
            'value' => 0,
            'name' => cp__('SkewY'),
            'keys' => 'loopskewy',
            'tooltip' => cp__('Skews the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'loopScaleX' => array(
            'value' => 1,
            'name' => cp__('ScaleX'),
            'keys' => 'loopscalex',
            'tooltip' => cp__("Scales the layer along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'loopScaleY' => array(
            'value' => 1,
            'name' => cp__('ScaleY'),
            'keys' => 'loopscaley',
            'tooltip' => cp__("Scales the layer along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'loopTransformOrigin' => array(
            'value' => '50% 50% 0',
            'name' => cp__('Transform Origin'),
            'keys' => 'looptransformorigin',
            'tooltip' => cp__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center, popupcenter, popupmiddle, popuptop, popupright, popupbottom, popupleft.'),
            'attrs' => array('placeholder' => '50% 50% 0')
        ),

        'loopClip' => array(
            'value' => '',
            'name' => cp__('Mask'),
            'keys' => 'loopclip',
            'tooltip' => cp__('Clips (cuts off) the sides of the layer by the given amount specified in pixels or percentages. The 4 value in order: top, right, bottom and the left side of the layer.'),
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
            'name' => cp__('Count'),
            'keys' => 'loopcount',
            'tooltip' => cp__('The number of times repeating the Loop transition. The count includes the reverse part of the transitions when you use the Yoyo feature. Use the value -1 to repeat infinitely or zero to disable looping.'),
            'attrs' => array(
                'step' => 1,
                'placeholder' => 1,
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
            'name' => cp__('Wait'),
            'keys' => 'looprepeatdelay',
            'tooltip' => cp__('Waiting time between repeats in milliseconds. A second is 1000 milliseconds.'),
            'attrs' => array('min' => 0, 'step' => 100, 'placeholder' => 0)
        ),

        'loopYoyo' => array(
            'value' => false,
            'name' => cp__('Yoyo'),
            'keys' => 'loopyoyo',
            'tooltip' => cp__('Enable this option to allow reverse transition, so you can loop back and forth seamlessly.')
        ),

        'loopPerspective' => array(
            'value' => '500',
            'name' => cp__('Perspective'),
            'keys' => 'looptransformperspective',
            'tooltip' => cp__('Changes the perspective of this layer in the 3D space.'),
            'attrs' => array('placeholder' => 500)
        ),

        'loopFilter' => array(
            'value' => '',
            'name' => cp__('Filter'),
            'keys' => 'loopfilter',
            'tooltip' => cp__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use. Click on the "Filter" link for more information.'),
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
            'name' => cp__('OffsetX'),
            'keys' => 'hoveroffsetx',
            'tooltip' => cp__("Moves the layer horizontally by the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. "),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
            'name' => cp__('OffsetY'),
            'keys' => 'hoveroffsety',
            'tooltip' => cp__("Moves the layer vertically by the given number of pixels. Use negative values for the opposite direction. Percentage values are relative to the width of this layer. "),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
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
            'name' => cp__('Duration'),
            'keys' => 'hoverdurationin',
            'tooltip' => cp__('The length of the transition in milliseconds. A second is equal to 1000 milliseconds.'),
            'attrs' => array('min' => 0, 'step' => 100, 'placeholder' => 500)
        ),

        'hoverOutDuration' => array(
            'value' => '',
            'name' => cp__('Reverse<br>duration'),
            'keys' => 'hoverdurationout',
            'tooltip' => cp__('The duration of the reverse transition in milliseconds. A second is equal to 1000 milliseconds.'),
            'attrs' => array('min' => 0, 'step' => 100, 'placeholder' => 'same')
        ),

        'hoverInEasing' => array(
            'value' => 'easeInOutQuint',
            'name' => cp__('Easing'),
            'keys' => 'hovereasingin',
            'tooltip' => cp__("The timing function of the animation to manipualte the layer's movement. Click on the link next to this field to open easings.net for examples and more information")
        ),

        'hoverOutEasing' => array(
            'value' => '',
            'name' => cp__('Reverse<br>easing'),
            'keys' => 'hovereasingout',
            'tooltip' => cp__("The timing function of the reverse animation to manipualte the layer's movement. Click on the link next to this field to open easings.net for examples and more information"),
            'attrs' => array('placeholder' => 'same')
        ),

        'hoverOpacity' => array(
            'value' => '',
            'name' => cp__('Opacity'),
            'keys' => 'hoveropacity',
            'tooltip' => cp__('Fades the layer. You can use values between 1 and 0 to set the layer fully opaque or transparent respectively. For example, the value 0.5 will make the layer semi-transparent.'),
            'attrs' => array(
                'min' => 0,
                'max' => 1,
                'step' => 0.1
            )
        ),

        'hoverRotate' => array(
            'value' => 0,
            'name' => cp__('Rotate'),
            'keys' => 'hoverrotate',
            'tooltip' => cp__('Rotates the layer clockwise by the given number of degrees. Negative values are allowed for counterclockwise rotation.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'hoverRotateX' => array(
            'value' => 0,
            'name' => cp__('RotateX'),
            'keys' => 'hoverrotatex',
            'tooltip' => cp__('Rotates the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'hoverRotateY' => array(
            'value' => 0,
            'name' => cp__('RotateY'),
            'keys' => 'hoverrotatey',
            'tooltip' => cp__('Rotates the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'hoverSkewX' => array(
            'value' => 0,
            'name' => cp__('SkewX'),
            'keys' => 'hoverskewx',
            'tooltip' => cp__('Skews the layer along the X (horizontal) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'hoverSkewY' => array(
            'value' => 0,
            'name' => cp__('SkewY'),
            'keys' => 'hoverskewy',
            'tooltip' => cp__('Skews the layer along the Y (vertical) axis by the given number of degrees. Negative values are allowed for reverse direction.'),
            'attrs' => array('type' => 'text', 'placeholder' => 0, 'data-options' => '[{
                "name": "Random",
                "value": "random(-45,45)"
            }]')
        ),

        'hoverScaleX' => array(
            'value' => 1,
            'name' => cp__('ScaleX'),
            'keys' => 'hoverscalex',
            'tooltip' => cp__("Scales the layer along the X (horizontal) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'hoverScaleY' => array(
            'value' => 1,
            'name' => cp__('ScaleY'),
            'keys' => 'hoverscaley',
            'tooltip' => cp__("Scales the layer along the Y (vertical) axis by the specified vector. Use the value 1 for the original size. The value 2 will double, while 0.5 shrinks the layer compared to its original size."),
            'attrs' => array('type' => 'text', 'placeholder' => 1, 'data-options' => '[{
                "name": "Random",
                "value": "random(2,4)"
            }]')
        ),

        'hoverTransformOrigin' => array(
            'value' => '50% 50% 0',
              'attrs' => array('placeholder' => 'inherit'),
            'name' => cp__('Transform Origin'),
            'keys' => 'hovertransformorigin',
            'tooltip' => cp__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center.'),
            'attrs' => array('placeholder' => '50% 50% 0')
        ),

        'hoverBGColor' => array(
            'value' => '',
            'name' => cp__('Background'),
            'keys' => 'hoverbgcolor',
            'tooltip' => cp__("The background color of this layer. You can use color names, hexadecimal, RGB or RGBA values as well as the 'transparent' keyword. Example: #FFF")
        ),

        'hoverColor' => array(
            'value' => '',
            'name' => cp__('Color'),
            'keys' => 'hovercolor',
            'tooltip' => cp__('The text color of this text. You can use color names, hexadecimal, RGB or RGBA values. Example: #333')
        ),

        'hoverBorderRadius' => array(
            'value' => '',
            'name' => cp__('Rounded corners'),
            'keys' => 'hoverborderradius',
            'tooltip' => cp__('If you want rounded corners, you can set here its radius in pixels. Example: 5px')
        ),

        'hoverTransformPerspective' => array(
            'value' => 500,
            'name' => cp__('Perspective'),
            'keys' => 'hovertransformperspective',
            'tooltip' => cp__('Changes the perspective of layers in the 3D space.'),
            'attrs' => array('placeholder' => 500)
        ),

        'hoverTopOn' => array(
            'value' => true,
            'name' => cp__('Always on top'),
            'keys' => 'hoveralwaysontop',
            'tooltip' => cp__('Show this layer above every other layer while hovering.')
        ),





        // Parallax
        'parallax' => array(
            'value' => false,
            'keys' => 'parallax'
        ),

        'parallaxLevel' => array(
            'value' => 10,
            'name' => cp__('Parallax Level'),
            'tooltip' => cp__('Set the intensity of the parallax effect. Use negative values to shift layers in the opposite direction.'),
            'keys' => 'parallaxlevel',
            'props' => array(
                'output' => true
            ),
            'attrs' => array('placeholder' => 10)
        ),

        'parallaxType' => array(
            'value' => 'inherit',
            'name' => cp__('Type'),
            'tooltip' => cp__('Choose if you want 2D or 3D parallax layers.'),
            'keys' => 'parallaxtype',
            'options' => array(
                'inherit' => cp__('Inherit from Page Options'),
                '2d' => cp__('2D'),
                '3d' => cp__('3D')
             )
        ),

        'parallaxEvent' => array(
            'value' => 'inherit',
            'name' => cp__('Event'),
            'tooltip' => cp__('You can trigger the parallax effect by either scrolling the page, or by moving your mouse cursor / tilting your mobile device.'),
            'keys' => 'parallaxevent',
            'options' => array(
                'inherit' => cp__('Inherit from Page Options'),
                'cursor' => cp__('Cursor or Tilt'),
                'scroll' => cp__('Scroll')
             )
        ),

        'parallaxAxis' => array(
            'value' => 'inherit',
            'name' => cp__('Axes'),
            'tooltip' => cp__('Choose on which axes parallax layers should move.'),
            'keys' => 'parallaxaxis',
            'options' => array(
                'inherit' => cp__('Inherit from Page Options'),
                'none' => cp__('None'),
                'both' => cp__('Both'),
                'x' => cp__('Horizontal only'),
                'y' => cp__('Vertical only')
            )
        ),


        'parallaxTransformOrigin' => array(
            'value' => '',
            'name' => cp__('Transform Origin'),
            'tooltip' => cp__('Sets a point on canvas from which transformations are calculated. For example, a layer may rotate around its center axis or a completely custom point, such as one of its corners. The three values represent the X, Y and Z axes in 3D space. Apart from the pixel and percentage values, you can also use the following constants: top, right, bottom, left, center.'),
            'keys' => 'parallaxtransformorigin',
            'attrs' => array(
                'placeholder' => cp__('Inherit from Page Options')
            )
        ),

        'parallaxDurationMove' => array(
            'value' => '',
            'name' => cp__('Move Duration'),
            'tooltip' => cp__('Controls the speed of animating layers when you move your mouse cursor or tilt your mobile device.'),
            'keys' => 'parallaxdurationmove',
            'attrs' => array(
                'type' => 'number',
                'step' => 100,
                'min' => 0,
                'placeholder' => cp__('Inherit from Page Options')
            )
        ),

        'parallaxDurationLeave' => array(
            'value' => '',
            'name' => cp__('Leave Duration'),
            'tooltip' => cp__('Controls how quickly parallax layers revert to their original position when you move your mouse cursor outside of the popup. This value is in milliseconds. A second equals to 1000 milliseconds.'),
            'keys' => 'parallaxdurationleave',
            'attrs' => array(
                'type' => 'number',
                'step' => 100,
                'min' => 0,
                'placeholder' => cp__('Inherit from Page Options')
            )
        ),

        'parallaxRotate' => array(
            'value' => '',
            'name' => cp__('Rotation'),
            'tooltip' => cp__('Increase or decrease the amount of layer rotation in the 3D space when moving your mouse cursor or tilting on a mobile device.'),
            'keys' => 'parallaxrotate',
            'attrs' => array(
                'type' => 'number',
                'step' => 1,
                'placeholder' => cp__('Inherit from Page Options')
            )
        ),

        'parallaxDistance' => array(
            'value' => '',
            'name' => cp__('Distance'),
            'tooltip' => cp__('Increase or decrease the amount of layer movement when moving your mouse cursor or tilting on a mobile device.'),
            'keys' => 'parallaxdistance',
            'attrs' => array(
                'type' => 'number',
                'step' => 1,
                'placeholder' => cp__('Inherit from Page Options')
            )
        ),

        'parallaxPerspective' => array(
            'value' => '',
            'name' => cp__('Perspective'),
            'tooltip' => cp__('Changes the perspective of layers in the 3D space.'),
            'keys' => 'parallaxtransformperspective',
            'attrs' => array(
                'type' => 'number',
                'step' => 100,
                'placeholder' => cp__('Inherit from Page Options')
            )
        ),


        // TRANSITON MISC
        'transitionStatic' => array(
            'value' => 'none',
            'name' => cp__('Static layer'),
            'keys' => 'static',
            'tooltip' => cp__("You can keep this layer on top of the popup across multiple pages. Just select the page on which this layer should animate out. Alternatively, you can make this layer global on all pages after it transitioned in."),
            'options' => array(
                'none' => cp__('Disabled (default)'),
                'forever' => cp__('Enabled (never animate out)')
            )
        ),


// Attributes


        'linkURL' => array(
            'value' => '',
            'name' => cp__('Enter URL'),
            'keys' => 'url',
            'tooltip' => cp__('If you want to link your layer, type here the URL. You can use a hash mark followed by a number to link this layer to another popup page. Example: #3 - this will switch to the third page.'),
            'attrs' => array(
                'data-options' => '[{
                    "name": "Switch to the next page",
                    "value": "#next"
                }, {
                    "name": "Switch to the previous page",
                    "value": "#prev"
                }, {
                    "name": "Stop the pageshow",
                    "value": "#stop"
                }, {
                    "name": "Resume the pageshow",
                    "value": "#start"
                }, {
                    "name": "Replay the page from the start",
                    "value": "#replay"
                }, {
                    "name": "Reverse the page, then pause it",
                    "value": "#reverse"
                }, {
                    "name": "Reverse the page, then replay it",
                    "value": "#reverse-replay"
                }, {
                    "name": "Close the Popup",
                    "value": "#closepopup"
                }]'
            ),
            'props' => array(
                'meta' => true
            )
        ),


        'linkTarget' => array(
            'value' => '_self',
            'name' => cp__('URL target'),
            'keys' => 'target',
            'options' => array(
                '_self' => cp__('Open on the same page'),
                '_blank' => cp__('Open on new page'),
                '_parent' => cp__('Open in parent frame'),
                '_top' => cp__('Open in main frame'),
                'cp-scroll' => cp__('Scroll to element (Enter selector)')
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'innerAttributes' => array(
            'value' => '',
            'name' => cp__('Custom Attributes'),
            'keys' => 'innerAttributes',
            'desc' => cp__('Your list of custom attributes. Use this feature if your needs are not covered by the common attributes above or you want to override them. You can use data-* as well as regular attribute names. Empty attributes (without value) are also allowed. For example, to make a FancyBox gallery, you may enter "data-fancybox-group" and "gallery1" for the attribute name and value, respectively.'),
            'props' => array(
                'meta' => true
            )
        ),

        'outerAttributes' => array(
            'value' => '',
            'name' => cp__('Custom Attributes'),
            'keys' => 'outerAttributes',
            'desc' => cp__('Your list of custom attributes. Use this feature if your needs are not covered by the common attributes above or you want to override them. You can use data-* as well as regular attribute names. Empty attributes (without value) are also allowed. For example, to make a FancyBox gallery, you may enter "data-fancybox-group" and "gallery1" for the attribute name and value, respectively.'),
            'props' => array(
                'meta' => true
            )
        ),

        // Styles

        'width' => array(
            'value' => '',
            'name' => cp__('Width'),
            'keys' => 'width',
            'tooltip' => cp__("You can set the width of your layer. You can use pixels, percentage, or the default value 'auto'. Examples: 100px, 50% or auto."),
            'props' => array(
                'meta' => true
            )
        ),

        'height' => array(
            'value' => '',
            'name' => cp__('Height'),
            'keys' => 'height',
            'tooltip' => cp__("You can set the height of your layer. You can use pixels, percentage, or the default value 'auto'. Examples: 100px, 50% or auto"),
            'props' => array(
                'meta' => true
            )
        ),

        'top' => array(
            'value' => '10px',
            'name' => cp__('Top'),
            'keys' => 'top',
            'tooltip' => cp__("The layer position from the top of the page. You can use pixels and percentage. Examples: 100px or 50%. You can move your layers in the preview above with a drag and drop, or set the exact values here."),
            'props' => array(
                'meta' => true
            )
        ),

        'left' => array(
            'value' => '10px',
            'name' => cp__('Left'),
            'keys' => 'left',
            'tooltip' => cp__("The layer position from the left side of the page. You can use pixels and percentage. Examples: 100px or 50%. You can move your layers in the preview above with a drag and drop, or set the exact values here."),
            'props' => array(
                'meta' => true
            )
        ),

        'paddingTop' => array(
            'value' => '',
            'name' => cp__('Top'),
            'keys' => 'padding-top',
            'tooltip' => cp__('Padding on the top of the layer. Example: 10px'),
            'props' => array(
                'meta' => true
            )
        ),

        'paddingRight' => array(
            'value' => '',
            'name' => cp__('Right'),
            'keys' => 'padding-right',
            'tooltip' => cp__('Padding on the right side of the layer. Example: 10px'),
            'props' => array(
                'meta' => true
            )
        ),

        'paddingBottom' => array(
            'value' => '',
            'name' => cp__('Bottom'),
            'keys' => 'padding-bottom',
            'tooltip' => cp__('Padding on the bottom of the layer. Example: 10px'),
            'props' => array(
                'meta' => true
            )
        ),

        'paddingLeft' => array(
            'value' => '',
            'name' => cp__('Left'),
            'keys' => 'padding-left',
            'tooltip' => cp__('Padding on the left side of the layer. Example: 10px'),
            'props' => array(
                'meta' => true
            )
        ),

        'borderTop' => array(
            'value' => '',
            'name' => cp__('Top'),
            'keys' => 'border-top',
            'tooltip' => cp__('Border on the top of the layer. Example: 5px solid #000'),
            'props' => array(
                'meta' => true
            )
        ),

        'borderRight' => array(
            'value' => '',
            'name' => cp__('Right'),
            'keys' => 'border-right',
            'tooltip' => cp__('Border on the right side of the layer. Example: 5px solid #000'),
            'props' => array(
                'meta' => true
            )
        ),

        'borderBottom' => array(
            'value' => '',
            'name' => cp__('Bottom'),
            'keys' => 'border-bottom',
            'tooltip' => cp__('Border on the bottom of the layer. Example: 5px solid #000'),
            'props' => array(
                'meta' => true
            )
        ),

        'borderLeft' => array(
            'value' => '',
            'name' => cp__('Left'),
            'keys' => 'border-left',
            'tooltip' => cp__('Border on the left side of the layer. Example: 5px solid #000'),
            'props' => array(
                'meta' => true
            )
        ),

        'fontFamily' => array(
            'value' => '',
            'name' => cp__('Family'),
            'keys' => 'font-family',
            'tooltip' => cp__('List of your chosen fonts separated with a comma. Please use apostrophes if your font names contains white spaces. Example: Helvetica, Arial, sans-serif')
        ),

        'fontSize' => array(
            'value' => '',
            'name' => cp__('Font size'),
            'keys' => 'font-size',
            'tooltip' => cp__('The font size in pixels. Example: 16px.'),
            'attrs' => array('data-options' => '["9", "10", "11", "12", "13", "14", "18", "24", "36", "48", "64", "96"]'),
            'props' => array(
                'meta' => true
            )
        ),

        'lineHeight' => array(
            'value' => '',
            'name' => cp__('Line height'),
            'keys' => 'line-height',
            'tooltip' => cp__("The line height of your text. The default setting is 'normal'. Example: 22px"),
            'props' => array(
                'meta' => true
            )
        ),

        'fontWeight' => array(
            'value' => 400,
            'name' => cp__('Font weight'),
            'keys' => 'font-weight',
            'tooltip' => cp__('Sets the font boldness. Please note, not every font supports all the listed variants, thus some settings may have the same result.', ''),
            'options' => array(
                '100' => cp__('100 (UltraLight)'),
                '200' => cp__('200 (Thin)'),
                '300' => cp__('300 (Light)'),
                '400' => cp__('400 (Regular)'),
                '500' => cp__('500 (Medium)'),
                '600' => cp__('600 (Semibold)'),
                '700' => cp__('700 (Bold)'),
                '800' => cp__('800 (Heavy)'),
                '900' => cp__('900 (Black)')
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'fontStyle' => array(
            'value' => 'normal',
            'name' => cp__('Font style'),
            'keys' => 'font-style',
            'tooltip' => cp__('Oblique is an auto-generated italic version of your chosen font and can force slating even if there is no italic font variant available. However, you should use the regular italic option whenever is possible. Please double check to load italic font variants when using Google Fonts.', ''),
            'options' => array(
                'normal' => cp__('Normal'),
                'italic' => cp__('Italic'),
                'oblique' => cp__('Oblique (Forced slant)')
            ),
            'props' => array(
                'meta' => true
            )
        ),

        'textDecoration' => array(
            'value' => 'none',
            'name' => cp__('Text decoration'),
            'keys' => 'text-decoration',
            'options' => array(
                'none' => 'None',
                'underline' => cp__('Underline'),
                'overline' => cp__('Overline'),
                'line-through' => cp__('Line through')

            ),
            'props' => array(
                'meta' => true
            )
        ),

        'letterSpacing' => array(
            'value' => '',
            'name' => cp__('Letter spacing'),
            'keys' => 'letter-spacing',
            'tooltip' => cp__('Controls the amount of space between each character. Useful the change letter density in a line or block of text. Negative values and decimals can be used.'),
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
            'name' => cp__('Text align'),
            'keys' => 'text-align',
            'options' => array(
                'initial' => cp__('Initial (Language default)'),
                'left' => cp__('Left'),
                'right' => cp__('Right'),
                'center' => cp__('Center'),
                'justify' => cp__('Justify')

            ),
            'props' => array(
                'meta' => true
            )
        ),

        'opacity' => array(
            'value' => 1,
            'name' => cp__('Opacity'),
            'keys' => 'opacity',
            'tooltip' => cp__('Fades the layer. You can use values between 1 and 0 to set the layer fully opaque or transparent respectively. For example, the value 0.5 will make the layer semi-transparent.'),
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
            'name' => cp__('Min. font size'),
            'keys' => 'minfontsize',
            'tooltip' => cp__('The minimum font size in the popup. This option allows you to prevent your texts layers becoming too small on smaller screens.')
        ),

        'minMobileFontSize' => array(
            'value' => '',
            'name' => cp__('Min. mobile font size'),
            'keys' => 'minmobilefontsize',
            'tooltip' => cp__('The minimum font size in the popup on mobile devices. This option allows you to prevent your texts layers becoming too small on smaller screens.')
        ),



        'color' => array(
            'value' => '',
            'name' => cp__('Color'),
            'keys' => 'color',
            'tooltip' => cp__('The color of your text. You can use color names, hexadecimal, RGB or RGBA values. Example: #333'),
            'props' => array(
                'meta' => true
            )
        ),

        'background' => array(
            'value' => '',
            'name' => cp__('Background'),
            'keys' => 'background',
            'tooltip' => cp__("The background color of your layer. You can use color names, hexadecimal, RGB or RGBA values as well as the 'transparent' keyword. Example: #FFF"),
            'props' => array(
                'meta' => true
            )
        ),

        'borderRadius' => array(
            'value' => '',
            'name' => cp__('Rounded corners'),
            'keys' => 'border-radius',
            'tooltip' => cp__('If you want rounded corners, you can set its radius here. Example: 5px'),
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
            'name' => cp__('Custom styles'),
            'keys' => 'style',
            'tooltip' => cp__('If you want to set style settings other than above, you can use here any CSS codes. Please make sure to write valid markup.'),
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
            'name' => cp__('Rotate'),
            'keys' => 'rotation',
            'tooltip' => cp__('The rotation angle where this layer animates toward when entering into the popup canvas. Negative values are allowed for counterclockwise rotation.')
        ),

        'rotateX' => array(
            'value' => 0,
            'name' => cp__('RotateX'),
            'keys' => 'rotationX',
            'tooltip' => cp__('The rotation angle on the horizontal axis where this animates toward when entering into the popup canvas. Negative values are allowed for reversed direction.')
        ),

        'rotateY' => array(
            'value' => 0,
            'name' => cp__('RotateY'),
            'keys' => 'rotationY',
            'tooltip' => cp__('The rotation angle on the vertical axis where this layer animates toward when entering into the popup canvas. Negative values are allowed for reversed direction.')
        ),

        'scaleX' => array(
            'value' => 1,
            'name' => cp__('ScaleX'),
            'keys' => 'scaleX',
            'tooltip' => cp__('The layer horizontal scale where this layer animates toward when entering into the popup canvas.')
        ),

        'scaleY' => array(
            'value' => 1,
            'name' => cp__('ScaleY'),
            'keys' => 'scaleY',
            'tooltip' => cp__('The layer vertical scale where this layer animates toward when entering into the popup canvas.')
        ),

        'skewX' => array(
            'value' => 0,
            'name' => cp__('SkewX'),
            'keys' => 'skewX',
            'tooltip' => cp__('The layer horizontal skewing angle where this layer animates toward when entering into the popup canvas.')
        ),

        'skewY' => array(
            'value' => 0,
            'name' => cp__('SkewY'),
            'keys' => 'skewY',
            'tooltip' => cp__('The layer vertical skewing angle where this layer animates toward when entering into the popup canvas.')
        ),

        'position' => array(
            'value' => 'relative',
            'name' => cp__('Calculate positions from'),
            'keys' => 'position',
            'tooltip' => cp__('Sets the layer position origin from which top and left values are calculated. The default is the upper left corner of the popup canvas. In a full width and full size popup, your content is centered based on the screen size to achieve the best possible fit. By selecting the "sides of the screen" option in those scenarios, you can allow layers to escape the centered inner area and stick to the sides of the screen.'),
            'options' => array(
                'relative' => cp__('sides of the popup'),
                'fixed' => cp__('sides of the screen'),
            )
        ),

        'zIndex' => array(
            'value' => '',
            'name' => cp__('Stacking order'),
            'keys' => 'z-index',
            'tooltip' => cp__("This option controls the vertical stacking order of layers that overlap. In CSS, it's commonly called as z-index. Elements with a higher value are stacked in front of elements with a lower one, effectively covering them. By default, this value is calculated automatically based on the order of your layers, thus simply re-ordering them can fix overlap issues. Use this option only if you want to set your own value manually in special cases like using static layers.<br><br>On each page, the stacking order starts counting from 100. Providing a number less than 100 will put the layer behind every other layer on all pages. Specifying a much greater number, for example 500, will make the layer to be on top of everything else."),
            'attrs' => array(
                'type' => 'number',
                'min' => 1,
                'placeholder' => 'auto'
            )
        ),

        'blendMode' => array(
            'value' => 'normal',
            'name' => cp__('Blend mode'),
            'keys' => 'mix-blend-mode',
            'tooltip' => cp__('Choose how layers and the page background should blend into each other. Blend modes are an easy way to add eye-catching effects and is one of the most frequently used features in graphic and print design.'),
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
            'name' => cp__('Filter'),
            'keys' => 'filter',
            'tooltip' => cp__('Filters provide effects like blurring or color shifting your layers. Click into the text field to see a selection of filters you can use. Although clicking on the pre-defined options will reset the text field, you can apply multiple filters simply by providing a space separated list of all the filters you would like to use. Click on the "Filter" link for more information.'),
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
            'name' => cp__('ID'),
            'keys' => 'id',
            'tooltip' => cp__("You can apply an ID attribute on the HTML element of this layer to work with it in your custom CSS or Javascript code."),
            'props' => array(
                'meta' => true
            )
        ),

        'class' => array(
            'value' => '',
            'name' => cp__('Classes'),
            'keys' => 'class',
            'tooltip' => cp__('You can apply classes on the HTML element of this layer to work with it in your custom CSS or Javascript code.'),
            'props' => array(
                'meta' => true
            )
        ),

        'title' => array(
            'value' => '',
            'name' => cp__('Title'),
            'keys' => 'title',
            'tooltip' => cp__('You can add a title to this layer which will display as a tooltip if someone holds his mouse cursor over the layer.'),
            'props' => array(
                'meta' => true
            )
        ),

        'alt' => array(
            'value' => '',
            'name' => cp__('Alt'),
            'keys' => 'alt',
            'tooltip' => cp__('Name or describe your image layer, so search engines and VoiceOver softwares can properly identify it.'),
            'props' => array(
                'meta' => true
            )
        ),

        'rel' => array(
            'value' => '',
            'name' => cp__('Rel'),
            'keys' => 'rel',
            'tooltip' => cp__('Plugins and search engines may use this attribute to get more information about the role and behavior of a link.'),
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
