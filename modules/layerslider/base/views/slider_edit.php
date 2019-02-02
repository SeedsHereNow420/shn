<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

if (defined('LS_INCLUDE')) {
    $lsDefaults = null;
}

// Attempt to avoid memory limit issues
@ini_set('memory_limit', '256M');

// Get the IF of the slider
$id = (int) ${'_GET'}['id'];

// Get slider
$sliderItem = LsSliders::find($id);
$slider = $sliderItem['data'];


// Get screen options
$lsScreenOptions = ls_get_option('ls-screen-options', '0');
$lsScreenOptions = ($lsScreenOptions == 0) ? array() : $lsScreenOptions;
$lsScreenOptions = is_array($lsScreenOptions) ? $lsScreenOptions : unserialize($lsScreenOptions);

// Defaults: tooltips
if (! isset($lsScreenOptions['showTooltips'])) {
    $lsScreenOptions['showTooltips'] = 'true';
}

// Deafults: keyboard shortcuts
if (! isset($lsScreenOptions['useKeyboardShortcuts'])) {
    $lsScreenOptions['useKeyboardShortcuts'] = 'true';
}

// Deafults: keyboard shortcuts
if (! isset($lsScreenOptions['useNotifyOSD'])) {
    $lsScreenOptions['useNotifyOSD'] = 'true';
}

// Get phpQuery
if (! defined('LS_PHPQUERY')) {
    libxml_use_internal_errors(true);
    include LS_ROOT_PATH.'/helpers/phpQuery.php';
}

// Get defaults
include LS_ROOT_PATH . '/config/defaults.php';
include LS_ROOT_PATH . '/helpers/admin.ui.tools.php';

// Run filters
if (ls_has_filter('layerslider_override_defaults')) {
    $newDefaults = ls_apply_filters('layerslider_override_defaults', $lsDefaults);
    if (!empty($newDefaults) && is_array($newDefaults)) {
        $lsDefaults = $newDefaults;
        unset($newDefaults);
    }
}

// Show tab
$settingsTabClass = isset(${'_GET'}['showsettings']) ? 'active' : '';
$slidesTabClass = !isset(${'_GET'}['showsettings']) ? 'active' : '';

// Fixes
if (!isset($slider['layers'][0]['properties'])) {
    $slider['layers'][0]['properties'] = array();
}

// Get google fonts
$googleFonts = ls_get_option('ls-google-fonts', array());

// Get post types
$postTypes = LsPosts::getPostTypes();
$postCategories = ls_get_categories();
$postTags = ls_get_tags();
$postTaxonomies = ls_get_taxonomies(array('_builtin' => false), 'objects');
?>
<div id="ls-screen-options" class="metabox-prefs hidden">
    <div id="screen-options-wrap" class="hidden">
        <form id="ls-screen-options-form" method="post">
            <?php ls_nonce_field('ls-save-screen-options'); ?>
            <h5><?php ls_e('Use features', 'LayerSlider') ?></h5>
            <label>
                <input type="checkbox" name="showTooltips"<?php echo $lsScreenOptions['showTooltips'] == 'true' ? ' checked="checked"' : ''?>> Tooltips
            </label>
            <label>
                <input type="checkbox" name="useKeyboardShortcuts"<?php echo $lsScreenOptions['useKeyboardShortcuts'] == 'true' ? ' checked="checked"' : ''?>> Keyboard shortcuts
            </label>
            <label>
                <input type="checkbox" name="useNotifyOSD"<?php echo $lsScreenOptions['useNotifyOSD'] == 'true' ? ' checked="checked"' : ''?>> On Screen Notifications
            </label>
        </form>
    </div>
    <div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle">
        <button type="button" id="show-settings-link" class="button show-settings" aria-controls="screen-options-wrap" aria-expanded="false"><?php ls_e('Screen Options', 'LayerSlider') ?></button>
    </div>
</div>

<!-- Load templates -->
<?php
include LS_ROOT_PATH . '/templates/tmpl-share-sheet.php';
include LS_ROOT_PATH . '/templates/tmpl-layer-item.php';
include LS_ROOT_PATH . '/templates/tmpl-static-layer-item.php';
include LS_ROOT_PATH . '/templates/tmpl-layer.php';
include LS_ROOT_PATH . '/templates/tmpl-transition-window.php';
include LS_ROOT_PATH . '/templates/tmpl-post-chooser.php';

?>

<!-- Load slide template -->
<script type="text/html" id="ls-slide-template">
    <?php include LS_ROOT_PATH . '/templates/tmpl-slide.php'; ?>
</script>

<!-- Slider JSON data source -->
<?php

if (! isset($slider['properties']['status'])) {
    $slider['properties']['status'] = true;
}

// COMPAT: If old and non-fullwidth slider
if (! isset($slider['properties']['slideBGSize']) && ! isset($slider['properties']['new'])) {
    if (empty($slider['properties']['forceresponsive'])) {
        $slider['properties']['slideBGSize'] = 'auto';
    }
}

$slider['properties']['schedule_start'] = '';
$slider['properties']['schedule_end'] = '';

if (! empty($sliderItem['schedule_start'])) {
    $slider['properties']['schedule_start'] = (int) $sliderItem['schedule_start'];
}

if (! empty($sliderItem['schedule_end'])) {
    $slider['properties']['schedule_end'] = (int) $sliderItem['schedule_end'];
}

// Get yourLogo
if (! empty($slider['properties']['yourlogoId'])) {
    $slider['properties']['yourlogo'] = ls_apply_filters('ls_get_image', $slider['properties']['yourlogoId'], $slider['properties']['yourlogo']);
    $slider['properties']['yourlogoThumb'] = ls_apply_filters('ls_get_thumbnail', $slider['properties']['yourlogoId'], $slider['properties']['yourlogo']);
}


$slider['properties']['cbinit'] = !empty($slider['properties']['cbinit']) ? _ss($slider['properties']['cbinit']) : $lsDefaults['slider']['cbInit']['value'];
$slider['properties']['cbstart'] = !empty($slider['properties']['cbstart']) ? _ss($slider['properties']['cbstart']) : $lsDefaults['slider']['cbStart']['value'];
$slider['properties']['cbstop'] = !empty($slider['properties']['cbstop']) ? _ss($slider['properties']['cbstop']) : $lsDefaults['slider']['cbStop']['value'];
$slider['properties']['cbpause'] = !empty($slider['properties']['cbpause']) ? _ss($slider['properties']['cbpause']) : $lsDefaults['slider']['cbPause']['value'];
$slider['properties']['cbanimstart'] = !empty($slider['properties']['cbanimstart']) ? _ss($slider['properties']['cbanimstart']) : $lsDefaults['slider']['cbAnimStart']['value'];
$slider['properties']['cbanimstop'] = !empty($slider['properties']['cbanimstop']) ? _ss($slider['properties']['cbanimstop']) : $lsDefaults['slider']['cbAnimStop']['value'];
$slider['properties']['cbprev'] = !empty($slider['properties']['cbprev']) ? _ss($slider['properties']['cbprev']) : $lsDefaults['slider']['cbPrev']['value'];
$slider['properties']['cbnext'] = !empty($slider['properties']['cbnext']) ? _ss($slider['properties']['cbnext']) : $lsDefaults['slider']['cbNext']['value'];


if (empty($slider['properties']['new']) && empty($slider['properties']['type'])) {
    if (!empty($slider['properties']['forceresponsive'])) {
        $slider['properties']['type'] = 'fullwidth';

        if (strpos($slider['properties']['width'], '%') !== false) {
            if (! empty($slider['properties']['responsiveunder'])) {
                $slider['properties']['width'] = $slider['properties']['responsiveunder'];
            } elseif (! empty($slider['properties']['sublayercontainer'])) {
                $slider['properties']['width'] = $slider['properties']['sublayercontainer'];
            }
        }
    } elseif (empty($slider['properties']['responsive'])) {
        $slider['properties']['type'] = 'fixedsize';
    } else {
        $slider['properties']['type'] = 'responsive';
    }
}

if (! empty($slider['properties']['width'])) {
    if (strpos($slider['properties']['width'], '%') !== false) {
        $slider['properties']['width'] = 1000;
    }
}

if (! empty($slider['properties']['sublayercontainer'])) {
    unset($slider['properties']['sublayercontainer']);
}

if (! empty($slider['properties']['width'])) {
    $slider['properties']['width'] = (int) $slider['properties']['width'];
}

if (! empty($slider['properties']['width'])) {
    $slider['properties']['height'] = (int) $slider['properties']['height'];
}

if (empty($slider['properties']['pauseonhover'])) {
    $slider['properties']['pauseonhover'] = 'enabled';
}

if (empty($slider['properties']['sliderVersion']) && empty($slider['properties']['circletimer'])) {
    $slider['properties']['circletimer'] = false;
}

// Convert old checkbox values
foreach ($slider['properties'] as $optionKey => $optionValue) {
    switch ($optionValue) {
        case 'on':
            $slider['properties'][$optionKey] = true;
            break;

        case 'off':
            $slider['properties'][$optionKey] = false;
            break;
    }
}

foreach ($slider['layers'] as $slideKey => $slideVal) {
    // Get slide background
    if (! empty($slideVal['properties']['backgroundId'])) {
        $slideVal['properties']['background'] = ls_apply_filters('ls_get_image', $slideVal['properties']['backgroundId'], $slideVal['properties']['background']);
        $slideVal['properties']['backgroundThumb'] = ls_apply_filters('ls_get_thumbnail', $slideVal['properties']['backgroundId'], $slideVal['properties']['background']);
    }

    // Get slide thumbnail
    if (! empty($slideVal['properties']['thumbnailId'])) {
        $slideVal['properties']['thumbnail'] = ls_apply_filters('ls_get_image', $slideVal['properties']['thumbnailId'], $slideVal['properties']['thumbnail']);
        $slideVal['properties']['thumbnailThumb'] = ls_apply_filters('ls_get_thumbnail', $slideVal['properties']['thumbnailId'], $slideVal['properties']['thumbnail']);
    }

    // v6.3.0: Improve compatibility with *really* old sliders
    if (! empty($slideVal['sublayers']) && is_array($slideVal['sublayers'])) {
        $slideVal['sublayers'] = array_values($slideVal['sublayers']);
    }


    $slider['layers'][$slideKey] = $slideVal;

    if (!empty($slideVal['sublayers']) && is_array($slideVal['sublayers'])) {
        // v6.0: Reverse layers list
        $slideVal['sublayers'] = array_reverse($slideVal['sublayers']);

        foreach ($slideVal['sublayers'] as $layerKey => $layerVal) {
            if (! empty($layerVal['imageId'])) {
                $layerVal['image'] = ls_apply_filters('ls_get_image', $layerVal['imageId'], $layerVal['image']);
                $layerVal['imageThumb'] = ls_apply_filters('ls_get_thumbnail', $layerVal['imageId'], $layerVal['image']);
            }

            if (! empty($layerVal['posterId'])) {
                $layerVal['poster'] = ls_apply_filters('ls_get_image', $layerVal['posterId'], $layerVal['poster']);
                $layerVal['posterThumb'] = ls_apply_filters('ls_get_thumbnail', $layerVal['posterId'], $layerVal['poster']);
            }

            $layerVal['styles'] = Tools::stripslashes($layerVal['styles']);
            $layerVal['transition'] = Tools::stripslashes($layerVal['transition']);

            // Parse embedded JSON data
            $layerVal['styles'] = !empty($layerVal['styles']) ? (object) Tools::jsonDecode(_ss($layerVal['styles']), true) : new stdClass;
            $layerVal['transition'] = !empty($layerVal['transition']) ? (object) Tools::jsonDecode(_ss($layerVal['transition']), true) : new stdClass;
            $layerVal['html'] = !empty($layerVal['html']) ? _ss($layerVal['html']) : '';

            // Add 'top', 'left' and 'wordwrap' to the styles object
            if (isset($layerVal['top'])) {
                $layerVal['styles']->top = $layerVal['top'];
                unset($layerVal['top']);
            }
            if (isset($layerVal['left'])) {
                $layerVal['styles']->left = $layerVal['left'];
                unset($layerVal['left']);
            }
            if (isset($layerVal['wordwrap'])) {
                $layerVal['styles']->wordwrap = $layerVal['wordwrap'];
                unset($layerVal['wordwrap']);
            }

            if (! empty($layerVal['transition']->showuntil)) {
                $layerVal['transition']->startatout = 'transitioninend + '.$layerVal['transition']->showuntil;
                $layerVal['transition']->startatouttiming = 'transitioninend';
                $layerVal['transition']->startatoutvalue = $layerVal['transition']->showuntil;
                unset($layerVal['transition']->showuntil);
            }

            if (! empty($layerVal['transition']->parallaxlevel)) {
                $layerVal['transition']->parallax = true;
            }

            // Custom attributes
            $layerVal['innerAttributes'] = !empty($layerVal['innerAttributes']) ?  (object) $layerVal['innerAttributes'] : new stdClass;
            $layerVal['outerAttributes'] = !empty($layerVal['outerAttributes']) ?  (object) $layerVal['outerAttributes'] : new stdClass;

            // v6.5.6: Convert old checkbox media settings to the new
            // select based options.
            if (isset($layerVal['transition']->controls)) {
                if (true === $layerVal['transition']->controls) {
                    $layerVal['transition']->controls = 'auto';
                } elseif (false === $layerVal['transition']->controls) {
                    $layerVal['transition']->controls = 'disabled';
                }
            }

            $slider['layers'][$slideKey]['sublayers'][$layerKey] = $layerVal;
        }
    } else {
        $slider['layers'][$slideKey]['sublayers'] = array();
    }
}

if (! empty($slider['callbacks'])) {
    foreach ($slider['callbacks'] as $key => $callback) {
        $slider['callbacks'][$key] = _ss($callback);
    }
}

// Slider version
$slider['properties']['sliderVersion'] = LS_PLUGIN_VERSION;
?>

<!-- Get slider data from DB -->
<script type="text/javascript">

    // Slider data
    window.lsSliderData = <?php echo Tools::jsonEncode($slider) ?>;

    // Plugin path
    var pluginPath = '<?php echo LS_VIEWS_URL ?>';
    var lsTrImgPath = '<?php echo LS_VIEWS_URL ?>img/admin/';

    // Screen options
    var lsScreenOptions = <?php echo Tools::jsonEncode($lsScreenOptions) ?>;
</script>



<form method="post" id="ls-slider-form" novalidate="novalidate" autocomplete="off">

    <input type="hidden" name="slider_id" value="<?php echo $id ?>">
    <input type="hidden" name="action" value="ls_save_slider">
    <?php ls_nonce_field('ls-save-slider-' . $id); ?>

    <div class="wrap">

        <!-- Title -->
        <h2>
            <?php ls_e('Editing slider:', 'LayerSlider') ?>
            <?php $sliderName = !empty($slider['properties']['title']) ? $slider['properties']['title'] : 'Unnamed'; ?>
            <?php echo ls_apply_filters('ls_slider_title', $sliderName, 30) ?>
            <a href="?page=layerslider" class="add-new-h2"><?php ls_e('Back to the list', 'LayerSlider') ?></a>
        </h2>

        <!-- Version number -->
        <?php include LS_ROOT_PATH . '/templates/tmpl-beta-feedback.php'; ?>

        <div class="ls-notify-osd">
            <span class="icon"></span>
            <span class="text"></span>
        </div>

        <!-- Main menu bar -->
        <div id="ls-main-nav-bar">
            <a href="#slider-settings" data-deeplink="slider-settings" class="settings <?php echo $settingsTabClass ?>">
                <i class="dashicons dashicons-admin-tools"></i>
                <?php ls_e('Slider Settings', 'LayerSlider') ?>
            </a>
            <a href="#" class="layers <?php echo $slidesTabClass ?>">
                <i class="dashicons dashicons-images-alt"></i>
                <?php ls_e('Slides', 'LayerSlider') ?>
            </a>
            <a href="#callbacks" data-deeplink="callbacks" class="callbacks">
                <i class="dashicons dashicons-redo"></i>
                <?php ls_e('Event Callbacks', 'LayerSlider') ?>
            </a>
            <a href="http://docs.webshopworks.com/creative-slider/59-faq" target="_blank" class="faq right unselectable">
                <i class="dashicons dashicons-sos"></i>
                <?php ls_e('FAQ', 'LayerSlider') ?>
            </a>
            <a href="http://docs.webshopworks.com/creative-slider" target="_blank" class="support right unselectable">
                <i class="dashicons dashicons-editor-help"></i>
                <?php ls_e('Documentation', 'LayerSlider') ?>
            </a>
            <a href="#" class="clear unselectable"></a>
        </div>

    </div>

    <!-- Post options -->
    <?php include LS_ROOT_PATH . '/templates/tmpl-post-options.php'; ?>

    <!-- Pages -->
    <div id="ls-pages">

        <!-- Slider Settings -->
        <div class="ls-page ls-settings ls-slider-settings <?php echo $settingsTabClass ?>">
            <?php include LS_ROOT_PATH . '/templates/tmpl-slider-settings.php'; ?>
        </div>

        <!-- Slides -->
        <div class="ls-page <?php echo $slidesTabClass ?>">

            <!-- Slide tabs -->
            <div id="ls-layer-tabs">
            <?php
            foreach ($slider['layers'] as $key => $layer) :
                $active = empty($key) ? 'active' : '';
                $name = !empty($layer['properties']['title']) ? $layer['properties']['title'] : 'Slide #'.($key+1);
                $bgImage = !empty($layer['properties']['background']) ? $layer['properties']['background'] : null;
                $bgImageId = !empty($layer['properties']['backgroundId']) ? $layer['properties']['backgroundId'] : null;
                $image = ls_apply_filters('ls_get_image', $bgImageId, $bgImage, true);
                ?>
                <a href="#" class="<?php echo $active ?>" data-help="<div style='background-image: url(<?php echo $image?>);'></div>" data-help-class="ls-slide-preview-tooltip popover-light ls-popup" data-help-delay="1" data-help-transition="false">
                    <span><?php echo $name ?></span>
                    <span class="dashicons dashicons-dismiss"></span>
                </a>
            <?php
            endforeach ?>
                <a href="#"  title="<?php ls_e('Add new slide', 'LayerSlider') ?>" class="unsortable" id="ls-add-layer"><i class="dashicons dashicons-plus"></i></a>
                <div class="unsortable clear"></div>
            </div>

            <!-- Slides -->
            <div id="ls-layers" class="clearfix">
                <?php include LS_ROOT_PATH . '/templates/tmpl-slide.php'; ?>
            </div>
        </div>

        <!-- Event Callbacks -->
        <div class="ls-page ls-callback-page">

            <div class="ls-notification-info">
                <i class="dashicons dashicons-info"> </i>
                <?php echo sprintf(ls__('Please read our %sonline documentation%s before start using the API. LayerSlider 6 introduced an entirely new API model with different events and methods.', 'LayerSlider'), '<a href="http://docs.webshopworks.com/creative-slider/55-advanced-customization/226-creative-slider-api" target="_blank">', '</a>') ?>
            </div>


            <div class="ls-callback-separator">Init Events</div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    sliderWillLoad
                    <figure><span>|</span> <?php ls_e('Fires before parsing user settings and rendering the UI.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="sliderWillLoad" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    sliderDidLoad
                    <figure><span>|</span> <?php ls_e('Fires when the slider is fully initialized and its DOM nodes become accessible.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="sliderDidLoad" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-callback-separator"><?php ls_e('Resize Events', 'LayerSlider') ?></div>


            <div class="ls-box ls-callback-box side">
                <h3 class="header">
                    sliderWillResize
                    <figure><span>|</span> <?php ls_e('Fires before the slider renders resize events.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="sliderWillResize" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    sliderDidResize
                    <figure><span>|</span> <?php ls_e('Fires after the slider has rendered resize events.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="sliderDidResize" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-callback-separator"><?php ls_e('Slideshow Events', 'LayerSlider') ?></div>


            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideshowStateDidChange
                    <figure><span>|</span> <?php ls_e('Fires upon every slideshow state change, which may not influence the playing status.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideshowStateDidChange" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideshowDidPause
                    <figure><span>|</span> <?php ls_e('Fires when the slideshow pauses from playing status.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideshowDidPause" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-box ls-callback-box side">
                <h3 class="header">
                    slideshowDidResume
                    <figure><span>|</span> <?php ls_e('Fires when the slideshow resumes from paused status.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideshowDidResume" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>


            <div class="ls-callback-separator"><?php ls_e('Slide Change Events', 'LayerSlider') ?></div>


            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideChangeWillStart
                    <figure><span>|</span> <?php ls_e('Signals when the slider wants to change slides, and is your last chance to divert it or intervene in any way.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideChangeWillStart" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideChangeDidStart
                    <figure><span>|</span> <?php ls_e('Fires when the slider has started a slide change.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideChangeDidStart" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideChangeWillComplete
                    <figure><span>|</span> <?php ls_e('Fires before completing a slide change.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideChangeWillComplete" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideChangeDidComplete
                    <figure><span>|</span> <?php ls_e('Fires after a slide change has completed and the slide indexes have been updated. ', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideChangeDidComplete" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>


            <div class="ls-callback-separator"><?php ls_e('Slide Timeline Events', 'LayerSlider') ?></div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideTimelineDidCreate
                    <figure><span>|</span> <?php ls_e("Fires when the current slide's animation timeline (e.g. your layers) becomes accessible for interfacing.", 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideTimelineDidCreate" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, data) {\n\t\n}" ?></textarea>
                </div>
            </div>


            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideTimelineDidUpdate
                    <figure><span>|</span> <?php ls_e("Fires rapidly (at each frame) throughout the entire slide while playing, including reverse playback.", 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideTimelineDidUpdate" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, timeline) {\n\t\n}" ?></textarea>
                </div>
            </div>


            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideTimelineDidStart
                    <figure><span>|</span> <?php ls_e("Fires when the current slide's animation timeline (e.g. your layers) has started playing.", 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideTimelineDidStart" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideTimelineDidComplete
                    <figure><span>|</span> <?php ls_e("Fires when the current slide's animation timeline (e.g. layer transitions) has completed.", 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideTimelineDidComplete" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    slideTimelineDidReverseComplete
                    <figure><span>|</span> <?php ls_e('Fires when all reversed animations have reached the beginning of the current slide.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="slideTimelineDidReverseComplete" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event, slider) {\n\t\n}" ?></textarea>
                </div>
            </div>


            <div class="ls-callback-separator"><?php ls_e('Destroy Events', 'LayerSlider') ?></div>


            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    sliderDidDestroy
                    <figure><span>|</span> <?php ls_e('Fires when the slider destructor has finished and it is safe to remove the slider from the DOM.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="sliderDidDestroy" data-event-data="false" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event) {\n\t\n}" ?></textarea>
                </div>
            </div>

            <div class="ls-box ls-callback-box">
                <h3 class="header">
                    sliderDidRemove
                    <figure><span>|</span> <?php ls_e('Fires when the slider has been removed from the DOM when using the <i>destroy</i> API method.', 'LayerSlider') ?></figure>
                </h3>
                <div>
                    <textarea name="sliderDidRemove" data-event-data="false" cols="20" rows="5" class="ls-codemirror"><?php echo "function(event) {\n\t\n}" ?></textarea>
                </div>
            </div>


        </div>
    </div>

    <div class="ls-publish">
        <button type="submit" class="button button-primary button-hero"><?php ls_e('Save changes', 'LayerSlider') ?></button>
        <div class="ls-save-shortcode">
            <?php
            $revisions = LsRevisions::count($id);
            if ($revisions > 1) : ?>
                <p class="revisions"><span><i class="dashicons dashicons-backup"></i><?php echo sprintf(ls__('Revisions Available:', 'LayerSlider'), $revisions) ?></span><br><a href="<?php echo ls_admin_url('admin.php?page=ls-revisions&id='.$id) ?>"><?php echo sprintf(ls__('Browse %d Revisions', 'LayerSlider'), $revisions) ?></a></p>
            <?php
            endif ?>
            <p><span><?php ls_e('Use shortcode:', 'LayerSlider') ?></span><br><span>[layerslider id="<?php echo !empty($slider['properties']['slug']) ? $slider['properties']['slug'] : $id ?>"]</span></p>
            <p><span><?php ls_e('Use PHP function:', 'LayerSlider') ?></span><br><span>&lt;?php layerslider(<?php echo !empty($slider['properties']['slug']) ? "'{$slider['properties']['slug']}'" : $id ?>) ?&gt;</span></p>
        </div>
    </div>
</form>