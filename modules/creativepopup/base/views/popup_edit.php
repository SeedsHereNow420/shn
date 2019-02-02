<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

if (defined('CP_INCLUDE')) {
    $cpDefaults = null;
}

// Attempt to avoid memory limit issues
@ini_set('memory_limit', '256M');

// Get the IF of the slider
$id = (int) ${'_GET'}['id'];

// Get slider
$popupItem = CpInstances::find($id);
$popup = $popupItem['data'];
$popup['properties']['title'] = $popupItem['name'];


// Get screen options
$cpScreenOptions = cp_get_option('cp-screen-options', '0');
$cpScreenOptions = ($cpScreenOptions == 0) ? array() : $cpScreenOptions;
$cpScreenOptions = is_array($cpScreenOptions) ? $cpScreenOptions : unserialize($cpScreenOptions);

// Defaults: tooltips
if (! isset($cpScreenOptions['showTooltips'])) {
    $cpScreenOptions['showTooltips'] = 'true';
}

// Deafults: keyboard shortcuts
if (! isset($cpScreenOptions['useKeyboardShortcuts'])) {
    $cpScreenOptions['useKeyboardShortcuts'] = 'true';
}

// Deafults: keyboard shortcuts
if (! isset($cpScreenOptions['useNotifyOSD'])) {
    $cpScreenOptions['useNotifyOSD'] = 'true';
}

// Get CpQuery
if (! defined('CP_QUERY')) {
    libxml_use_internal_errors(true);
    include CP_ROOT_PATH.'/helpers/CpQuery.php';
}

// Get defaults
include CP_ROOT_PATH . '/config/defaults.php';
include CP_ROOT_PATH . '/helpers/admin.ui.tools.php';

// Run filters
if (cp_has_filter('cp_override_defaults')) {
    $newDefaults = cp_apply_filters('cp_override_defaults', $cpDefaults);
    if (!empty($newDefaults) && is_array($newDefaults)) {
        $cpDefaults = $newDefaults;
        unset($newDefaults);
    }
}

// Show tab
$settingsTabClass = isset(${'_GET'}['showsettings']) ? 'active' : '';
$pagesTabClass = !isset(${'_GET'}['showsettings']) ? 'active' : '';

// Fixes
if (!isset($popup['layers'][0]['properties'])) {
    $popup['layers'][0]['properties'] = array();
}

// Get google fonts
$googleFonts = cp_get_option('cp-google-fonts', array());

// Get post types
$postTypes = CpPosts::getPostTypes();
$postCategories = cp_get_categories();
$postTags = cp_get_tags();
$postTaxonomies = cp_get_taxonomies(array('_builtin' => false), 'objects');
?>
<div id="cp-screen-options" class="metabox-prefs hidden">
    <div id="screen-options-wrap" class="hidden">
        <form id="cp-screen-options-form" method="post">
            <h5><?php cp_e('Use features') ?></h5>
            <label>
                <input type="checkbox" name="showTooltips"<?php echo $cpScreenOptions['showTooltips'] == 'true' ? ' checked="checked"' : ''?>> Tooltips
            </label>
            <label>
                <input type="checkbox" name="useKeyboardShortcuts"<?php echo $cpScreenOptions['useKeyboardShortcuts'] == 'true' ? ' checked="checked"' : ''?>> Keyboard shortcuts
            </label>
            <label>
                <input type="checkbox" name="useNotifyOSD"<?php echo $cpScreenOptions['useNotifyOSD'] == 'true' ? ' checked="checked"' : ''?>> On Screen Notifications
            </label>
        </form>
    </div>
    <div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle">
        <button type="button" id="show-settings-link" class="button show-settings" aria-controls="screen-options-wrap" aria-expanded="false"><?php cp_e('Screen Options') ?></button>
    </div>
</div>

<!-- Load templates -->
<?php
include CP_ROOT_PATH . '/templates/tmpl-share-sheet.php';
include CP_ROOT_PATH . '/templates/tmpl-layer-item.php';
include CP_ROOT_PATH . '/templates/tmpl-static-layer-item.php';
include CP_ROOT_PATH . '/templates/tmpl-layer.php';
include CP_ROOT_PATH . '/templates/tmpl-transition-window.php';
include CP_ROOT_PATH . '/templates/tmpl-popup-presets-window.php';
include CP_ROOT_PATH . '/templates/tmpl-popup-example-slider.php';
include CP_ROOT_PATH . '/templates/tmpl-post-chooser.php';

?>

<!-- Load slide template -->
<script type="text/html" id="cp-slide-template">
    <?php include CP_ROOT_PATH . '/templates/tmpl-slide.php'; ?>
</script>

<!-- Popup JSON data source -->
<?php

if (! isset($popup['properties']['status'])) {
    $popup['properties']['status'] = true;
}

$popup['properties']['schedule_start'] = '';
$popup['properties']['schedule_end'] = '';

if (! empty($popupItem['schedule_start'])) {
    $popup['properties']['schedule_start'] = (int) $popupItem['schedule_start'];
}

if (! empty($popupItem['schedule_end'])) {
    $popup['properties']['schedule_end'] = (int) $popupItem['schedule_end'];
}

if (! empty($popup['properties']['width'])) {
    if (strpos($popup['properties']['width'], '%') !== false) {
        $popup['properties']['width'] = 1000;
    }
}

if (! empty($popup['properties']['sublayercontainer'])) {
    unset($popup['properties']['sublayercontainer']);
}

if (! empty($popup['properties']['width'])) {
    $popup['properties']['width'] = (int) $popup['properties']['width'];
}

if (! empty($popup['properties']['width'])) {
    $popup['properties']['height'] = (int) $popup['properties']['height'];
}

if (empty($popup['properties']['pauseonhover'])) {
    $popup['properties']['pauseonhover'] = 'enabled';
}

// Convert old checkbox values
foreach ($popup['properties'] as $optionKey => $optionValue) {
    switch ($optionValue) {
        case 'on':
            $popup['properties'][$optionKey] = true;
            break;

        case 'off':
            $popup['properties'][$optionKey] = false;
            break;
    }
}

foreach ($popup['layers'] as $pageKey => $pageVal) {
    // Get slide background
    if (! empty($pageVal['properties']['backgroundId'])) {
        $pageVal['properties']['background'] = cp_apply_filters('cp_get_image', $pageVal['properties']['backgroundId'], $pageVal['properties']['background']);
        $pageVal['properties']['backgroundThumb'] = cp_apply_filters('cp_get_thumbnail', $pageVal['properties']['backgroundId'], $pageVal['properties']['background']);
    }

    // Get page thumbnail
    if (! empty($pageVal['properties']['thumbnailId'])) {
        $pageVal['properties']['thumbnail'] = cp_apply_filters('cp_get_image', $pageVal['properties']['thumbnailId'], $pageVal['properties']['thumbnail']);
        $pageVal['properties']['thumbnailThumb'] = cp_apply_filters('cp_get_thumbnail', $pageVal['properties']['thumbnailId'], $pageVal['properties']['thumbnail']);
    }

    // v6.3.0: Improve compatibility with *really* old sliders
    if (! empty($pageVal['sublayers']) && is_array($pageVal['sublayers'])) {
        $pageVal['sublayers'] = array_values($pageVal['sublayers']);
    }


    $popup['layers'][$pageKey] = $pageVal;

    if (!empty($pageVal['sublayers']) && is_array($pageVal['sublayers'])) {
        // v6.0: Reverse layers list
        $pageVal['sublayers'] = array_reverse($pageVal['sublayers']);

        foreach ($pageVal['sublayers'] as $layerKey => $layerVal) {
            if (! empty($layerVal['imageId'])) {
                $layerVal['image'] = cp_apply_filters('cp_get_image', $layerVal['imageId'], $layerVal['image']);
                $layerVal['imageThumb'] = cp_apply_filters('cp_get_thumbnail', $layerVal['imageId'], $layerVal['image']);
            }

            if (! empty($layerVal['posterId'])) {
                $layerVal['poster'] = cp_apply_filters('cp_get_image', $layerVal['posterId'], $layerVal['poster']);
                $layerVal['posterThumb'] = cp_apply_filters('cp_get_thumbnail', $layerVal['posterId'], $layerVal['poster']);
            }

            $layerVal['styles'] = Tools::stripslashes($layerVal['styles']);
            $layerVal['transition'] = Tools::stripslashes($layerVal['transition']);

            // Parse embedded JSON data
            $layerVal['styles'] = !empty($layerVal['styles']) ? (object) Tools::jsonDecode(cp_ss($layerVal['styles']), true) : new stdClass;
            $layerVal['transition'] = !empty($layerVal['transition']) ? (object) Tools::jsonDecode(cp_ss($layerVal['transition']), true) : new stdClass;
            $layerVal['html'] = !empty($layerVal['html']) ? cp_ss($layerVal['html']) : '';

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

            $popup['layers'][$pageKey]['sublayers'][$layerKey] = $layerVal;
        }
    } else {
        $popup['layers'][$pageKey]['sublayers'] = array();
    }
}

if (! empty($popup['callbacks'])) {
    foreach ($popup['callbacks'] as $key => $callback) {
        $popup['callbacks'][$key] = cp_ss($callback);
    }
}

// Slider version
$popup['properties']['popupVersion'] = CP_PLUGIN_VERSION;

$sDefs  =& $cpDefaults['slider'];
$sProps =& $popup['properties'];
?>

<!-- Get slider data from DB -->
<script type="text/javascript">

    // Slider data
    window.lsSliderData = <?php echo Tools::jsonEncode($popup) ?>;

    // Plugin path
    var pluginPath = '<?php echo CP_VIEWS_URL ?>';
    var lsTrImgPath = '<?php echo CP_VIEWS_URL ?>img/admin/';

    // Screen options
    var lsScreenOptions = <?php echo Tools::jsonEncode($cpScreenOptions) ?>;
</script>


<form method="post" id="cp-slider-form" novalidate="novalidate" autocomplete="off">

    <input type="hidden" name="popup_id" value="<?php echo $id ?>">
    <input type="hidden" name="action" value="cp_save_popup">

    <div class="wrap">
        <!-- Trigger warning -->
        <div id="cp-popup-notifications" class="cp-hidden">
            <div class="cp-notification error">
                <i class="dashicons dashicons-warning"></i>
                <?php cp_e('Your Popup will not show up until you set a trigger. Check out the Launch Popup section and choose how and when your Popup should be displayed.') ?>
            </div>
        </div>

        <!-- Title -->
        <h2>
            <?php cp_e('Editing Popup:') ?>
            <?php $popupName = !empty($popup['properties']['title']) ? $popup['properties']['title'] : 'Unnamed'; ?>
            <?php echo cp_apply_filters('cp_popup_title', $popupName, 30) ?>
            <a href="<?php echo cp_admin_url('?controller=AdminCreativePopup') ?>" class="add-new-h2"><?php cp_e('Back to the list') ?></a>
        </h2>

        <div class="cp-notify-osd">
            <span class="icon"></span>
            <span class="text"></span>
        </div>

        <div class="cp-main-publish" data-help="<?php echo $sDefs['status']['desc'] ?>">
            <?php cp_get_checkbox($sDefs['status'], $sProps, array('class' => 'larger cp-publish-checkbox')); ?>
            <?php echo $sDefs['status']['name'] ?>
        </div>

        <!-- Main menu bar -->
        <div id="cp-main-nav-bar">
            <a href="#appearance" data-deeplink="appearance" class="settings <?php echo $settingsTabClass ?>">
                <i class="dashicons dashicons-editor-distractionfree"></i>
                <?php cp_e('Appearance') ?>
            </a>
            <a href="#" class="layers <?php echo $pagesTabClass ?>">
                <i class="dashicons dashicons-images-alt"></i>
                <?php cp_e('Live Editor') ?>
            </a>
            <a href="#triggers" data-deeplink="triggers" class="triggers">
                <i class="dashicons dashicons-external"></i>
                <?php cp_e('Triggers') ?>
            </a>
            <a href="#targets" data-deeplink="targets" class="targets">
                <svg viewBox="0 0 512 512"><path fill="currentColor" d="M500 224h-30.364C455.724 130.325 381.675 56.276 288 42.364V12c0-6.627-5.373-12-12-12h-40c-6.627 0-12 5.373-12 12v30.364C130.325 56.276 56.276 130.325 42.364 224H12c-6.627 0-12 5.373-12 12v40c0 6.627 5.373 12 12 12h30.364C56.276 381.675 130.325 455.724 224 469.636V500c0 6.627 5.373 12 12 12h40c6.627 0 12-5.373 12-12v-30.364C381.675 455.724 455.724 381.675 469.636 288H500c6.627 0 12-5.373 12-12v-40c0-6.627-5.373-12-12-12zM288 404.634V364c0-6.627-5.373-12-12-12h-40c-6.627 0-12 5.373-12 12v40.634C165.826 392.232 119.783 346.243 107.366 288H148c6.627 0 12-5.373 12-12v-40c0-6.627-5.373-12-12-12h-40.634C119.768 165.826 165.757 119.783 224 107.366V148c0 6.627 5.373 12 12 12h40c6.627 0 12-5.373 12-12v-40.634C346.174 119.768 392.217 165.757 404.634 224H364c-6.627 0-12 5.373-12 12v40c0 6.627 5.373 12 12 12h40.634C392.232 346.174 346.243 392.217 288 404.634zM288 256c0 17.673-14.327 32-32 32s-32-14.327-32-32c0-17.673 14.327-32 32-32s32 14.327 32 32z"></path></svg>
                <span><?php cp_e('Targets') ?></span>
            </a>
            <a href="#more" data-deeplink="more" class="settings">
                <i class="dashicons dashicons-admin-tools"></i>
                <?php cp_e('More Settings') ?>
            </a>
            <a href="http://docs.webshopworks.com/creative-popup" target="_blank" class="support right unselectable">
                <i class="dashicons dashicons-editor-help"></i>
                <?php cp_e('Documentation') ?>
            </a>
            <a href="#" class="clear unselectable"></a>
        </div>

    </div>

    <!-- Post options -->
    <?php include CP_ROOT_PATH . '/templates/tmpl-post-options.php'; ?>

    <!-- Pages -->
    <div id="cp-pages">

        <!-- Appearance -->
        <div class="cp-page cp-slider-settings cp-appearance <?php echo $settingsTabClass ?>">
            <!-- Popup title -->
            <div class="cp-slider-titlewrap">
                <?php $popupName = !empty($sProps['title']) ? htmlspecialchars(cp_ss($sProps['title'])) : ''; ?>
                <input type="text" name="title" value="<?php echo $popupName ?>" id="title" autocomplete="off" placeholder="<?php cp_e('Type your popup name here') ?>">
            </div>

            <div class="cp-box cp-settings">
                <h3 class="header medium">
                    <?php cp_e('Appearance') ?>
                    <div class="cp-slider-settings-advanced">
                        <?php cp_e('Show advanced settings') ?> <input type="checkbox" data-toggleitems=".cp-appearance .cp-advanced">
                    </div>
                </h3>
                <table>
                    <!-- Layout -->
                    <tbody class="active cp-settings-popup">
                        <tr>
                            <th colspan="3"><i class="dashicons dashicons-layout"></i><?php cp_e('Layout Settings') ?></th>
                        </tr>
                        <tr>
                            <td colspan="3" class="cp-popup-appearance">
                                <table>
                                    <tr>
                                        <td class="cp-popup-preview cp-spacer-top" style="padding-bottom: 10px;">
                                            <button type="button" id="tmpl-popup-presets-button" class="button cp-blue-button cp-preset">
                                                <i class="dashicons dashicons-admin-settings"></i>
                                                <?php cp_e('Choose Preset') ?>
                                            </button>
                                            <div class="cp-layout-illustration cp-popup-layout-preview">
                                                <div class="cp-layout-illustration-inner">
                                                    <div class="cp-popup-layout-example">
                                                        <div class="cp-popup-layout-padding">
                                                            <div class="cp-popup-layout-inner cp-popup-right-bottom">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="button cp-popup-preview-button cp-green-button">
                                                    <i class="dashicons dashicons-visibility"></i>
                                                    <?php cp_e('Live Preview') ?>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="cp-popup-layout cp-spacer-top">
                                            <ul class="layer-properties-box">
                                                <li>
                                                    <h5><span><?php cp_e('Popup size') ?></span></h5>
                                                    <ul>
                                                        <li>
                                                            <div><?php cp_e('Width') ?></div>
                                                            <div><?php cp_get_input($sDefs['popupWidth'], $sProps, array('class' => 'mini cp-popup-width')); ?> px</div>
                                                        </li>
                                                        <li>
                                                            <div><?php cp_e('Height') ?></div>
                                                            <div><?php cp_get_input($sDefs['popupHeight'], $sProps, array('class' => 'mini cp-popup-height')); ?> px</div>
                                                        </li>
                                                    </ul>
                                                    <h5 class="cp-fit-screen"><span><?php cp_e('Fit screen size') ?></span></h5>
                                                    <ul>
                                                        <li>
                                                            <div><?php cp_get_checkbox($sDefs['popupFitWidth'], $sProps, array('class' => 'cp-popup-fit-width popup-prop')); ?></div>
                                                            <div><?php cp_e('Fit Screen Width') ?></div>
                                                        </li>
                                                        <li>
                                                            <div><?php cp_get_checkbox($sDefs['popupFitHeight'], $sProps, array('class' => 'cp-popup-fit-height popup-prop')); ?></div>
                                                            <div><?php cp_e('Fit Screen Height') ?></div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <h5><span><?php cp_e('Align popup to') ?></span></h5>
                                                    <div class="cp-align-popup">
                                                        <?php
                                                        cp_get_input($sDefs['popupPositionHorizontal'], $sProps, array('type' => 'hidden', 'class' => 'popup-prop'));
                                                        cp_get_input($sDefs['popupPositionVertical'], $sProps, array('type' => 'hidden', 'class' => 'popup-prop'));
                                                        ?>
                                                        <table class="cp-layer-alignment cp-popup-position">
                                                            <tr>
                                                                <td data-move="top left"><i><?php cp_e('top left') ?></i></td>
                                                                <td data-move="top center"><i><?php cp_e('top center') ?></i></td>
                                                                <td data-move="top right"><i><?php cp_e('top right') ?></i></td>
                                                            </tr>
                                                            <tr>
                                                                <td data-move="middle left"><i><?php cp_e('middle left') ?></i></td>
                                                                <td data-move="middle center"><i><?php cp_e('middle center') ?></i></td>
                                                                <td data-move="middle right"><i><?php cp_e('middle right') ?></i></td>
                                                            </tr>
                                                            <tr>
                                                                <td data-move="bottom left"><i><?php cp_e('bottom left') ?></i></td>
                                                                <td data-move="bottom center"><i><?php cp_e('bottom center') ?></i></td>
                                                                <td data-move="bottom right"><i><?php cp_e('bottom right') ?></i></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </li>
                                                <li>
                                                    <h5><span><?php cp_e('Distance from sides') ?></span></h5>
                                                    <ul>
                                                        <li>
                                                            <div><?php cp_e('Left') ?></div>
                                                            <div><?php cp_get_input($sDefs['popupDistanceLeft'], $sProps, array('class' => 'mini cp-popup-distance-left popup-prop')); ?> px</div>
                                                        </li>
                                                        <li>
                                                            <div><?php cp_e('Right') ?></div>
                                                            <div><?php cp_get_input($sDefs['popupDistanceRight'], $sProps, array('class' => 'mini cp-popup-distance-right popup-prop')); ?> px</div>
                                                        </li>
                                                        <li>
                                                            <div><?php cp_e('Top') ?></div>
                                                            <div><?php cp_get_input($sDefs['popupDistanceTop'], $sProps, array('class' => 'mini cp-popup-distance-top popup-prop')); ?> px</div>
                                                        </li>
                                                        <li>
                                                            <div><?php cp_e('Bottom') ?></div>
                                                            <div><?php cp_get_input($sDefs['popupDistanceBottom'], $sProps, array('class' => 'mini cp-popup-distance-bottom popup-prop')); ?> px</div>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><th colspan="3"><i class="dashicons dashicons-editor-expand"></i><?php cp_e('Modal Options') ?></th></tr>
                        <?php
                        cp_option_row('select', $sDefs['popupTransitionIn'], $sProps, array('class' => 'popup-prop'));
                        cp_option_row('input', $sDefs['popupDurationIn'], $sProps, array('class' => 'popup-prop input'));
                        cp_option_row('input', $sDefs['popupDelayIn'], $sProps, array('class' => 'popup-prop input'));
                        cp_option_row('select', $sDefs['popupTransitionOut'], $sProps, array('class' => 'popup-prop'));
                        cp_option_row('input', $sDefs['popupDurationOut'], $sProps, array('class' => 'popup-prop input'));
                        cp_option_row('checkbox', $sDefs['popupStartSliderImmediately'], $sProps, array('class' => 'popup-prop'));
                        cp_option_row('select', $sDefs['popupResetOnClose'], $sProps, array('class' => 'popup-prop'));
                        cp_option_row('checkbox', $sDefs['popupShowCloseButton'], $sProps, array('class' => 'popup-prop'));
                        cp_option_row('input', $sDefs['popupCloseButtonStyle'], $sProps, array('class' => 'popup-prop input'));
                        ?>


                        <tr><th colspan="3"><i class="dashicons dashicons-editor-contract"></i><?php cp_e('Overlay Options') ?></th></tr>
                        <?php
                        cp_option_row('checkbox', $sDefs['popupDisableOverlay'], $sProps);
                        cp_option_row('checkbox', $sDefs['popupOverlayClickToClose'], $sProps);
                        cp_option_row('input', $sDefs['popupOverlayBackground'], $sProps, array('class' => 'popup-prop cp-colorpicker minicolors-input input'));
                        cp_option_row('input', $sDefs['popupAjaxLoadColor'], $sProps, array('class' => 'popup-prop cp-colorpicker minicolors-input input'));
                        cp_option_row('select', $sDefs['popupOverlayTransitionIn'], $sProps, array('class' => 'popup-prop'));
                        cp_option_row('input', $sDefs['popupOverlayDurationIn'], $sProps, array('class' => 'popup-prop input'));
                        cp_option_row('select', $sDefs['popupOverlayTransitionOut'], $sProps, array('class' => 'popup-prop'));
                        cp_option_row('input', $sDefs['popupOverlayDurationOut'], $sProps, array('class' => 'popup-prop input'));
                        ?>

                        <tr><th colspan="3"><i class="dashicons dashicons-format-image"></i><?php cp_e('Popup global background') ?></th></tr>
                        <?php
                        cp_option_row('input', $sDefs['globalBGColor'], $sProps, array('class' => 'input cp-colorpicker minicolors-input'));
                        ?>
                        <tr>
                            <td><?php cp_e('Background image') ?></td>
                            <td>
                                <?php $bgImage = !empty($sProps['backgroundimage']) ? $sProps['backgroundimage'] : null; ?>
                                <?php $bgImageId = !empty($sProps['backgroundimageId']) ? $sProps['backgroundimageId'] : null; ?>
                                <input type="hidden" name="backgroundimageId" value="<?php echo !empty($sProps['backgroundimageId']) ? $sProps['backgroundimageId'] : '' ?>">
                                <input type="hidden" name="backgroundimage" value="<?php echo !empty($sProps['backgroundimage']) ? $sProps['backgroundimage'] : '' ?>">
                                <div class="cp-image cp-global-background cp-upload" data-l10n-set="<?php cp_e('Click to set') ?>" data-l10n-change="<?php cp_e('Click to change') ?>">
                                    <div><img src="<?php echo cp_apply_filters('cp_get_thumbnail', $bgImageId, $bgImage) ?>" alt=""></div>
                                    <a href="#" class="dashicons dashicons-dismiss"></a>
                                </div>
                            </td>
                            <td class="desc"><?php echo $sDefs['globalBGImage']['desc'] ?></td>
                        </tr>
                        <?php
                        cp_option_row('select', $sDefs['globalBGRepeat'], $sProps);
                        cp_option_row('input', $sDefs['globalBGPosition'], $sProps, array('class' => 'input'));
                        ?>
                        <tr>
                            <td><?php echo $sDefs['globalBGSize']['name'] ?></td>
                            <td><?php cp_get_input($sDefs['globalBGSize'], $sProps, array('class' => 'input')) ?></div>
                            </td>
                            <td class="desc"><?php echo $sDefs['globalBGSize']['desc'] ?></td>
                        </tr>

                        <tr class="cp-advanced cp-hidden"><th colspan="3"><i class="dashicons dashicons-admin-generic"></i><?php cp_e('Other settings') ?></th></tr>
                        <?php
                        cp_option_row('input', $sDefs['maxRatio'], $sProps, array('class' => 'input'));
                        cp_option_row('select', $sDefs['clipSlideTransition'], $sProps);
                        ?>
                        <input value="popup" type="hidden" name="type" data-value="popup">
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Slides -->
        <div class="cp-page <?php echo $pagesTabClass ?>">

            <!-- Slide tabs -->
            <div id="cp-layer-tabs">
            <?php
            foreach ($popup['layers'] as $key => $layer) :
                $active = empty($key) ? 'active' : '';
                $name = !empty($layer['properties']['title']) ? $layer['properties']['title'] : 'Page #'.($key+1);
                $bgImage = !empty($layer['properties']['background']) ? $layer['properties']['background'] : null;
                $bgImageId = !empty($layer['properties']['backgroundId']) ? $layer['properties']['backgroundId'] : null;
                $image = cp_apply_filters('cp_get_image', $bgImageId, $bgImage, true);
                ?>
                <a href="#" class="<?php echo $active ?>" data-help="<div style='background-image: url(<?php echo $image?>);'></div>" data-help-class="cp-slide-preview-tooltip popover-light cp-popup" data-help-delay="1" data-help-transition="false">
                    <span><?php echo $name ?></span>
                    <span class="dashicons dashicons-dismiss"></span>
                </a>
            <?php
            endforeach ?>
                <a href="#"  title="<?php cp_e('Add new Page') ?>" class="unsortable" id="cp-add-layer"><i class="dashicons dashicons-plus"></i></a>
                <div class="unsortable clear"></div>
            </div>

            <!-- Slides -->
            <div id="cp-layers" class="clearfix">
                <?php include CP_ROOT_PATH . '/templates/tmpl-slide.php'; ?>
            </div>
        </div>

        <!-- Triggers -->
        <div class="cp-page cp-slider-settings cp-triggers">
            <div class="cp-box cp-settings">
                <h3 class="header medium"><?php cp_e('Triggers') ?></h3>
                <table>
                    <tbody class="cp-settings-popup active">
                        <tr>
                            <th colspan="3">
                                <svg viewBox="0 0 512 512"><path fill="currentColor" d="M505.1 19.1C503.8 13 499 8.2 492.9 6.9 460.7 0 435.5 0 410.4 0 307.2 0 245.3 55.2 199.1 128H94.9c-18.2 0-34.8 10.3-42.9 26.5L2.6 253.3c-8 16 3.6 34.7 21.5 34.7h95.1c-5.9 12.8-11.9 25.5-18 37.7-3.1 6.2-1.9 13.6 3 18.5l63.6 63.6c4.9 4.9 12.3 6.1 18.5 3 12.2-6.1 24.9-12 37.7-17.9V488c0 17.8 18.8 29.4 34.7 21.5l98.7-49.4c16.3-8.1 26.5-24.8 26.5-42.9V312.8c72.6-46.3 128-108.4 128-211.1.1-25.2.1-50.4-6.8-82.6zM400 160c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48z"></path></svg>
                                <?php cp_e('Launch Popup') ?>
                            </th>
                        </tr>
                        <tr class="cp-popup-triggers">
                            <td><?php echo $sDefs['popupShowOnTimeout']['name'] ?></td>
                            <td><?php cp_get_input($sDefs['popupShowOnTimeout'], $sProps, array('class' => 'mini')) ?> <?php cp_e('seconds') ?></td>
                            <td class="desc"><?php echo $sDefs['popupShowOnTimeout']['desc'] ?></td>
                        </tr>
                        <tr class="cp-popup-triggers">
                            <td><?php echo $sDefs['popupShowOnIdle']['name'] ?></td>
                            <td><?php cp_get_input($sDefs['popupShowOnIdle'], $sProps, array('class' => 'mini')) ?> <?php cp_e('seconds') ?></td>
                            <td class="desc"><?php echo $sDefs['popupShowOnIdle']['desc'] ?></td>
                        </tr>
                        <?php
                        cp_option_row('input', $sDefs['popupShowOnScroll'], $sProps, array('class' => 'mini'), 'cp-popup-triggers');
                        cp_option_row('checkbox', $sDefs['popupShowOnLeave'], $sProps, array(), 'cp-popup-triggers');
                        cp_option_row('input', $sDefs['popupShowOnClick'], $sProps, array(), 'cp-popup-triggers');
                        ?>

                        <tr><th colspan="3"><i class="dashicons dashicons-no"></i><?php cp_e('Close Popup') ?></th></tr>
                        <tr>
                            <td><?php echo $sDefs['popupCloseOnTimeout']['name'] ?></td>
                            <td><?php cp_get_input($sDefs['popupCloseOnTimeout'], $sProps, array('class' => 'mini')) ?> <?php cp_e('seconds') ?></td>
                            <td class="desc"><?php echo $sDefs['popupCloseOnTimeout']['desc'] ?></td>
                        </tr>
                        <?php
                        cp_option_row('input', $sDefs['popupCloseOnScroll'], $sProps, array('class' => 'mini'));
                        cp_option_row('checkbox', $sDefs['popupCloseOnSliderEnd'], $sProps, array('class' => 'popup-prop'));
                        ?>

                        <tr><th colspan="3"><i class="dashicons dashicons-update"></i><?php cp_e('Repeat Control') ?></th></tr>
                        <?php cp_option_row('checkbox', $sDefs['popupRepeat'], $sProps); ?>
                        <tr>
                            <td><?php echo $sDefs['popupRepeatDays']['name'] ?></td>
                            <td><?php cp_get_input($sDefs['popupRepeatDays'], $sProps, array('class' => 'mini')) ?> <?php cp_e('days') ?></td>
                            <td class="desc"><?php echo $sDefs['popupRepeatDays']['desc'] ?></td>
                        </tr>
                        <?php cp_option_row('checkbox', $sDefs['popupShowOnce'], $sProps); ?>
                        <tr><th colspan="3"><i class="dashicons dashicons-calendar-alt"></i><?php cp_e('Scheduling') ?></th></tr>
                        <tr>
                            <td><?php echo $sDefs['scheduleStart']['name'] ?></td>
                            <td><?php cp_get_input($sDefs['scheduleStart'], $sProps, array('class' => 'cp-datepicker-input', 'data-schedule-key' => 'schedule_start')); ?></td>
                            <td class="desc"><?php echo $sDefs['scheduleStart']['desc'] ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $sDefs['scheduleEnd']['name'] ?></td>
                            <td><?php cp_get_input($sDefs['scheduleEnd'], $sProps, array('class' => 'cp-datepicker-input', 'data-schedule-key' => 'schedule_end')); ?></td>
                            <td class="desc"><?php echo $sDefs['scheduleEnd']['desc'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Targets -->
        <div class="cp-page cp-slider-settings cp-targets">
            <div class="cp-box cp-settings">
                <h3 class="header medium"><?php cp_e('Targets') ?></h3>
                <table>
                    <tbody class="cp-settings-popup active">
                        <tr>
                            <td><?php echo $sDefs['shop']['name'] ?></td>
                            <td><?php cp_get_select($sDefs['shop'], $sProps, array(), true); ?></td>
                            <td class="desc"><?php echo $sDefs['shop']['desc'] ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $sDefs['lang']['name'] ?></td>
                            <td><?php cp_get_select($sDefs['lang'], $sProps, array(), true); ?></td>
                            <td class="desc"><?php echo $sDefs['lang']['desc'] ?></td>
                        </tr>
                        <tr>
                            <th colspan="3"><i class="dashicons dashicons-media-default"></i><?php cp_e('Target Pages') ?></th>
                        </tr>
                        <tr>
                            <td><?php echo $sDefs['pages']['name'] ?></td>
                            <td colspan="2">
                                <?php cp_get_select($sDefs['cats'], $sProps, array(), true); ?>
                                <?php cp_get_select($sDefs['pages'], $sProps, array(), true); ?>
                                <br><p class="desc" style="font-weight:400"><?php echo $sDefs['pages']['desc'] ?></p>
                            </td>
                        </tr>

                        <tr><th colspan="3"><i class="dashicons dashicons-groups"></i><?php cp_e('Target Audience') ?></th></tr>
                        <tr>
                            <td><?php echo $sDefs['popupRoles']['name'] ?></td>
                            <td><?php cp_get_select($sDefs['popupRoles'], $sProps, array(), true); ?></td>
                            <td class="desc"><?php echo $sDefs['popupRoles']['desc'] ?></td>
                        </tr>
                        <?php cp_option_row('checkbox', $sDefs['popupFirstTimeVisitor'], $sProps); ?>
                        <tr><th colspan="3"><i class="dashicons dashicons-smartphone"></i><?php cp_e('Target by device') ?></th></tr>
                        <?php
                        cp_option_row('checkbox', $sDefs['disableOnMobile'], $sProps);
                        cp_option_row('checkbox', $sDefs['disableOnTablet'], $sProps);
                        cp_option_row('checkbox', $sDefs['disableOnDesktop'], $sProps);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- More Settings -->
        <div class="cp-page cp-slider-settings cp-more">
            <?php include CP_ROOT_PATH . '/templates/tmpl-slider-settings.php'; ?>
        </div>
    </div>

    <div class="cp-publish">
        <button type="submit" class="button button-primary button-hero"><?php cp_e('Save changes') ?></button>
        <div class="cp-save-shortcode">
            <?php
            $revisions = CpRevisions::count($id);
            if ($revisions > 1) : ?>
                <p class="revisions"><span><i class="dashicons dashicons-backup"></i><?php echo sprintf(cp__('Revisions Available:'), $revisions) ?></span><br><a href="<?php echo cp_admin_url('?controller=AdminCreativePopupRevisions&id='.$id) ?>"><?php echo sprintf(cp__('Browse %d Revisions'), $revisions) ?></a></p>
            <?php
            endif ?>
        </div>
    </div>
</form>