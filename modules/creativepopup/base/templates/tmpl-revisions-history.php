<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Attempt to avoid memory limit issues
@ini_set('memory_limit', '256M');

// Get the IF of the slider
$id = (int) ${'_GET'}['id'];

// Get slider
$popupItem = CpInstances::find($id);
$popup = $popupItem['data'];

cp_enqueue_script('cp-admin');

$revisions = CpRevisions::snapshots($id);
$revisionsCount = count($revisions);

foreach ($revisions as $key => $revision) {
    $revisions[$key]->avatar = cp_get_avatar_url($revisions[$key]->author);
    $revisions[$key]->nickname = cp_get_userdata($revisions[$key]->author)->user_nicename;
    $revisions[$key]->time_diff = sprintf(cp__(' %s ago'), cp_human_time_diff($revision->date_c));
    $revisions[$key]->created = date('M j @ H:i', $revision->date_c);

    $popup = json_decode($revision->data, true);

    // Fixes
    if (!isset($popup['layers'][0]['properties'])) {
        $popup['layers'][0]['properties'] = array();
    }

    if (! empty($popup['properties']['width'])) {
        if (strpos($popup['properties']['width'], '%') !== false) {
            $popup['properties']['width'] = 1000;
        }
    }

    if (! empty($popup['properties']['width'])) {
        $popup['properties']['width'] = (int) $popup['properties']['width'];
    }

    if (! empty($popup['properties']['width'])) {
        $popup['properties']['height'] = (int) $popup['properties']['height'];
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

                // Ensure that magic quotes will not mess with JSON data
                $layerVal['styles'] = Tools::stripslashes($layerVal['styles']);
                $layerVal['transition'] = Tools::stripslashes($layerVal['transition']);

                // Parse embedded JSON data
                $layerVal['styles'] = !empty($layerVal['styles']) ? (object) json_decode(cp_ss($layerVal['styles']), true) : new stdClass;
                $layerVal['transition'] = !empty($layerVal['transition']) ? (object) json_decode(cp_ss($layerVal['transition']), true) : new stdClass;
                $layerVal['html'] = !empty($layerVal['html']) ? cp_ss($layerVal['html']) : '';

                // Custom attributes
                $layerVal['innerAttributes'] = !empty($layerVal['innerAttributes']) ? (object) $layerVal['innerAttributes'] : new stdClass;
                $layerVal['outerAttributes'] = !empty($layerVal['outerAttributes']) ? (object) $layerVal['outerAttributes'] : new stdClass;

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

    $revisions[$key]->data = $popup;
}
?>

<!-- Get slider data from DB -->
<script type="text/javascript">

    // Revisions
    window.lsRevisions = <?php echo json_encode($revisions); ?>;

    // Slider data
    window.lsSliderData = <?php echo json_encode($popup) ?>;

    window.lsPostsJSON = [];

    // Plugin path
    var pluginPath = '<?php echo CP_VIEWS_URL ?>';
    var lsTrImgPath = '<?php echo CP_VIEWS_URL ?>img/admin/';

</script>


<div id="cp-revisions">

    <div class="wrap">
        <h2>
            <?php cp_e('Revisions for Popup:') ?>
            <?php $popupName = !empty($popup['properties']['title']) ? $popup['properties']['title'] : 'Unnamed'; ?>
            <?php echo cp_apply_filters('cp_popup_title', $popupName, 30) ?>
            <a href="<?php echo cp_admin_url('?controller=AdminCreativePopup&action=edit&id='.$id) ?>" class="add-new-h2"><?php cp_e('Back to Popup') ?></a>
        </h2>
        <form method="post" id="cp-revisions-form">
            <input type="hidden" name="cp-revert-popup" value="1">
            <input type="hidden" name="slider-id" value="<?php echo $id ?>">
            <input type="hidden" id="revision-id" name="revision-id" value="<?php echo $revision->id ?>">
            <span class="cp-revisions-oldest"><?php echo date('M j, Y', $revisions[0]->date_c) ?></span>
            <span class="cp-revisions-now"><?php cp_e('Now') ?></span>

            <div id="cp-revisions-selected">
                <table>
                    <tr>
                        <td class="avatar" rowspan="2">
                            <img src="<?php echo $revision->avatar ?>">
                        </td>
                        <td>
                            <?php echo sprintf(cp__('Selected Revision by %s'), '<strong class="author">'.$revision->nickname.'</strong>')  ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="time-diff"><?php echo $revision->time_diff ?></span>
                            (<span class="date"><?php echo $revision->created ?></span>)
                        </td>
                    </tr>
                </table>
                <button class="button button-primary button-hero"><?php cp_e('Revert to This Revision') ?></button>
            </div>

            <input type="range" id="cp-revisions-range" min="1" max="<?php echo $revisionsCount ?>" value="<?php echo $revisionsCount ?>" name="revision" list="cp-revisions-timeline">
            <datalist id="cp-revisions-timeline">
                <?php for ($c = 1; $c <= $revisionsCount; $c++) : ?>
                <option><?php echo $c ?></option>
                <?php endfor ?>
            </datalist>
        </form>

        <div class="cp-notification-info">
            <i class="dashicons dashicons-info"></i>
            <?php cp_e('Reverting a popup to an earlier version adds another snapshot to Revisions, which can also be reverted if you change your mind and would rather return to the original copy.') ?>
            <?php cp_e('Popup Revisions also saves the undo/redo controls. Even if there is no perfect snapshot, you will be able to undo the changes in-between to find what you are looking for.') ?>
        </div>

        <h2 class="cp-revisions-h2"><?php cp_e('Preview for Selected Revision') ?></h2>
        <div id="cp-slider-form">
            <div id="cp-layer-tabs">
                <?php
                foreach ($popup['layers'] as $key => $layer) :
                    $active = empty($key) ? 'active' : '';
                    $name = !empty($layer['properties']['title']) ? $layer['properties']['title'] : sprintf(cp__('Page #%d'), ($key+1));
                    $bgImage = !empty($layer['properties']['background']) ? $layer['properties']['background'] : null;
                    $bgImageId = !empty($layer['properties']['backgroundId']) ? $layer['properties']['backgroundId'] : null;
                    $image = cp_apply_filters('cp_get_image', $bgImageId, $bgImage, true);
                    ?>
                    <a href="#" class="<?php echo $active ?>" data-help="<div style='background-image: url(<?php echo $image?>);'></div>" data-help-class="cp-slide-preview-tooltip popover-light km-ui-popup" data-help-delay="1" data-help-transition="false">
                        <span><?php echo $name ?></span>
                        <span class="dashicons dashicons-dismiss"></span>
                    </a>
                <?php
                endforeach; ?>
                <div class="unsortable clear"></div>
            </div>

            <!-- Slides -->
            <div id="cp-layers" class="clearfix">
                <div class="cp-box cp-layer-box active">
                    <table id="cp-preview-table">
                        <tbody>
                            <tr id="slider-editor-toolbar">
                                <td >
                                    <div class="cp-editor-zoom">
                                        <!-- <span class="dashicons dashicons-editor-expand cp-layers-icon"></span> -->
                                        <div class="cp-editor-slider" ></div>
                                        <span class="cp-editor-slider-val">100%</span>
                                        |
                                        <?php cp_e('Auto-Fit') ?>
                                        <input id="zoom-fit" class="cp-checkbox checkbox small" type="checkbox" checked>
                                    </div>


                                    <div class="cp-editor-preview">
                                        <button type="button" class="button cp-preview-button"><?php cp_e('Preview Page') ?></button>
                                    </div>


                                    <div class="cp-editor-layouts">
                                        <button data-type="desktop" class="button dashicons dashicons-desktop playing" data-help="<?php cp_e('Show layers that are visible on desktop.') ?>"></button><!--
                                    --><button data-type="tablet" class="button dashicons dashicons-tablet" data-help="<?php cp_e('Show layers that are visible on tablets.') ?>"></button><!--
                                    --><button data-type="phone"  class="button dashicons dashicons-smartphone" data-help="<?php cp_e('Show layers that are visible on mobile phones.') ?>"></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cp-preview-td">
                        <div class="cp-preview-wrapper cp-preview-size" data-dragover="<?php cp_e('Drop image(s) here') ?>">
                            <div class="cp-preview cp-preview-size">
                                <div id="cp-preview-layers" class="draggable cp-layer cp-preview-transform">
                                    <div id="cp-static-preview" class="disabled"></div>
                                </div>
                            </div>
                            <div class="cp-real-time-preview cp-preview-size"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
