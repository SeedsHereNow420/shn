<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

ls_add_action('init', 'ls_register_form_actions');
function ls_register_form_actions()
{
    ls_add_action('save_post', 'layerslider_delete_caches');
    if (ls_current_user_can(ls_get_option('layerslider_custom_capability', 'manage_options'))) {
        // Sliders list layout
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'layout') {
            $type = (${'_GET'}['type'] === 'list') ? 'list' : 'grid';
            ls_update_user_meta(ls_get_current_user_id(), 'ls-sliders-layout', $type);
            ls_redirect('admin.php?page=layerslider');
        }

        // Remove slider
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'remove') {
            if (ls_check_admin_referer('remove_'.${'_GET'}['id'])) {
                ls_add_action('admin_init', 'layerslider_removeslider');
            }
        }

        // Restore slider
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'restore') {
            if (ls_check_admin_referer('restore_'.${'_GET'}['id'])) {
                ls_add_action('admin_init', 'layerslider_restoreslider');
            }
        }

        // Duplicate slider
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'duplicate') {
            if (ls_check_admin_referer('duplicate_'.${'_GET'}['id'])) {
                ls_add_action('admin_init', 'layerslider_duplicateslider');
            }
        }

        // Export slider
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'export') {
            if (ls_check_admin_referer('export-sliders')) {
                ${'_POST'}['sliders'] = array((int) ${'_GET'}['id']);
                ${'_POST'}['ls-export'] = true;
            }
        }

        // Empty caches
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'empty_caches') {
            if (ls_check_admin_referer('empty_caches')) {
                ls_add_action('admin_init', 'layerslider_empty_caches');
            }
        }

        // Update Library
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'update_store') {
            if (ls_check_admin_referer('update_store')) {
                ls_delete_option('ls-store-last-updated');
                ls_redirect('admin.php?page=layerslider&message=updateStore');
            }
        }

        // Slider list bulk actions
        if (isset(${'_POST'}['ls-bulk-action'])) {
            if (ls_check_admin_referer('bulk-action')) {
                ls_add_action('admin_init', 'ls_sliders_bulk_action');
            }
        }

        // Add new slider
        if (isset(${'_POST'}['ls-add-new-slider'])) {
            if (ls_check_admin_referer('add-slider')) {
                ls_add_action('admin_init', 'ls_add_new_slider');
            }
        }

        // Google Fonts
        if (isset(${'_POST'}['ls-save-google-fonts'])) {
            if (ls_check_admin_referer('save-google-fonts')) {
                ls_add_action('admin_init', 'ls_save_google_fonts');
            }
        }

        // Advanced settings
        if (isset(${'_POST'}['ls-save-advanced-settings'])) {
            if (ls_check_admin_referer('save-advanced-settings')) {
                ls_add_action('admin_init', 'ls_save_advanced_settings');
            }
        }

        // Access permission
        if (isset(${'_POST'}['ls-access-permission'])) {
            if (ls_check_admin_referer('save-access-permissions')) {
                ls_add_action('admin_init', 'ls_save_access_permissions');
            }
        }

        // Import sliders
        if (isset(${'_POST'}['ls-import'])) {
            if (ls_check_admin_referer('import-sliders')) {
                ls_add_action('admin_init', 'ls_import_sliders');
            }
        }

        // Export sliders
        if (isset(${'_POST'}['ls-export'])) {
            if (ls_check_admin_referer('export-sliders')) {
                ls_add_action('admin_init', 'ls_export_sliders');
            }
        }

        // Revisions Options
        if (isset(${'_POST'}['ls-revisions-options'])) {
            ls_add_action('admin_init', 'ls_save_revisions_options');
        }

        // Revert slider
        if (isset(${'_POST'}['ls-revert-slider'])) {
            ls_add_action('admin_init', 'ls_revert_slider');
        }

        // Custom CSS editor
        if (isset(${'_POST'}['ls-user-css'])) {
            if (ls_check_admin_referer('save-user-css')) {
                ls_add_action('admin_init', 'ls_save_user_css');
            }
        }

        // Skin editor
        if (isset(${'_POST'}['ls-user-skins'])) {
            if (ls_check_admin_referer('save-user-skin')) {
                ls_add_action('admin_init', 'ls_save_user_skin');
            }
        }

        // Transition builder
        if (isset(${'_POST'}['ls-user-transitions'])) {
            if (ls_check_admin_referer('save-user-transitions')) {
                ls_add_action('admin_init', 'ls_save_user_transitions');
            }
        }

        // Compatibility: convert old sliders to new data storage since 3.6
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'convert') {
            if (ls_check_admin_referer('convertoldsliders')) {
                ls_add_action('admin_init', 'layerslider_convert');
            }
        }

        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'hide-important-notice') {
            if (ls_check_admin_referer('hide-important-notice')) {
                $storeData = ls_get_option('ls-store-data', false);
                if (!empty($storeData) && !empty($storeData['important_notice']['date'])) {
                    ls_update_option('ls-last-important-notice', $storeData['important_notice']['date']);
                }

                ls_redirect('admin.php?page=layerslider');
            }
        }

        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'hide-support-notice') {
            if (ls_check_admin_referer('hide-support-notice')) {
                ls_update_option('ls-show-support-notice', 0);
                ls_redirect('admin.php?page=layerslider');
            }
        }
        /*
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'hide-canceled-activation-notice') {
            if (ls_check_admin_referer('hide-canceled-activation-notice')) {
                ls_update_option('ls-show-canceled_activation_notice', 0);
                ls_redirect('admin.php?page=layerslider');
            }
        }

        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'layerslider' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'hide-update-notice') {
            if (ls_check_admin_referer('hide-update-notice')) {
                $latest = ls_get_option('ls-latest-version', LS_PLUGIN_VERSION);
                ls_update_option('ls-last-update-notification', $latest);
                ls_redirect('admin.php?page=layerslider');
            }
        }

        // Erase Plugin Data
        if (isset(${'_POST'}['ls-erase-plugin-data'])) {
            if (ls_check_admin_referer('erase_data')) {
                ls_add_action('admin_init', 'ls_erase_plugin_data');
            }
        }
        */

        // AJAX functions
        ls_add_action('wp_ajax_ls_save_slider', 'ls_save_slider');
        ls_add_action('wp_ajax_ls_import_bundled', 'ls_import_bundled');
        ls_add_action('wp_ajax_ls_import_online', 'ls_import_online');
        ls_add_action('wp_ajax_ls_parse_date', 'ls_parse_date');
        ls_add_action('wp_ajax_ls_save_screen_options', 'ls_save_screen_options');
        ls_add_action('wp_ajax_ls_get_mce_sliders', 'ls_get_mce_sliders');
        ls_add_action('wp_ajax_ls_get_post_details', 'ls_get_post_details');
        ls_add_action('wp_ajax_ls_get_search_posts', 'ls_get_search_posts');
        ls_add_action('wp_ajax_ls_get_taxonomies', 'ls_get_taxonomies');
        ls_add_action('wp_ajax_ls_upload_from_url', 'ls_upload_from_url');
        ls_add_action('wp_ajax_ls_store_opened', 'ls_store_opened');
    }
}


// Template store last viewed
function ls_store_opened()
{
    ls_update_user_meta(ls_get_current_user_id(), 'ls-store-last-viewed', date('Y-m-d'));
    die();
}


function layerslider_delete_caches()
{
    try {
        Cache::getInstance()->delete('ls-slider-data-*');
    } catch (Exception $ex) {
        // TODO
    }
}


function layerslider_empty_caches()
{
    layerslider_delete_caches();
    ls_redirect('admin.php?page=layerslider&message=cacheEmpty');
}


function ls_add_new_slider()
{
    $id = LsSliders::add(${'_POST'}['title']);
    ls_redirect('admin.php?page=layerslider&action=edit&id='.$id.'&showsettings=1');
}


function ls_sliders_bulk_action()
{

    // Export
    if (${'_POST'}['action'] === 'export') {
        ls_export_sliders();


    // Remove
    } elseif (${'_POST'}['action'] === 'remove') {
        if (!empty(${'_POST'}['sliders']) && is_array(${'_POST'}['sliders'])) {
            foreach (${'_POST'}['sliders'] as $item) {
                LsSliders::remove((int)$item);
                ls_delete_transient('ls-slider-data-'.(int)$item);
            }
            ls_redirect('admin.php?page=layerslider&message=removeSuccess');
        } else {
            ls_redirect('admin.php?page=layerslider&message=removeSelectError&error=1');
        }


    // Delete
    } elseif (${'_POST'}['action'] === 'delete') {
        if (!empty(${'_POST'}['sliders']) && is_array(${'_POST'}['sliders'])) {
            foreach (${'_POST'}['sliders'] as $item) {
                LsSliders::delete((int)$item);
                LsRevisions::clear((int)$item);
                ls_delete_transient('ls-slider-data-'.(int)$item);
            }
            ls_redirect('admin.php?page=layerslider&message=deleteSuccess');
        } else {
            ls_redirect('admin.php?page=layerslider&message=deleteSelectError&error=1');
        }


    // Restore
    } elseif (${'_POST'}['action'] === 'restore') {
        if (!empty(${'_POST'}['sliders']) && is_array(${'_POST'}['sliders'])) {
            foreach (${'_POST'}['sliders'] as $item) {
                LsSliders::restore((int)$item);
            }
            ls_redirect('admin.php?page=layerslider&message=restoreSuccess');
        } else {
            ls_redirect('admin.php?page=layerslider&message=restoreSelectError&error=1');
        }



    // Merge
    } elseif (${'_POST'}['action'] === 'merge') {
        // Error check
        if (!isset(${'_POST'}['sliders'][1]) || !is_array(${'_POST'}['sliders'])) {
            ls_redirect('admin.php?page=layerslider&error=1&message=mergeSelectError');
        }

        if ($sliders = LsSliders::find(${'_POST'}['sliders'])) {
            $ids = array();
            foreach ($sliders as $key => $item) {
                // Get IDs
                $ids[] = '#' . $item['id'];

                // Merge slides
                if ($key === 0) {
                    $data = $item['data'];
                } else {
                    $data['layers'] = array_merge($data['layers'], $item['data']['layers']);
                }
            }

            // Save as new
            $name = 'Merged sliders of ' . implode(', ', $ids);
            $data['properties']['title'] = $name;
            LsSliders::add($name, $data);
        }

        ls_redirect('admin.php?page=layerslider&message=mergeSuccess');
    }
}


function ls_save_google_fonts()
{


    // Build object to save
    $fonts = array();
    if (!empty(${'_POST'}['fontsData']) && is_array(${'_POST'}['fontsData'])) {
        foreach (${'_POST'}['fontsData'] as $key => $val) {
            if (!empty($val['urlParams'])) {
                $fonts[] = array(
                    'param' => $val['urlParams'],
                    'admin' => isset($val['onlyOnAdmin']) ? true : false
                );
            }
        }
    }

    // Google Fonts character sets
    array_shift(${'_POST'}['scripts']);
    ls_update_option('ls-google-font-scripts', ${'_POST'}['scripts']);

    // Save & redirect back
    ls_update_option('ls-google-fonts', $fonts);
    ls_redirect('admin.php?page=layerslider&message=googleFontsUpdated');
}


function ls_save_advanced_settings()
{

    $options = array(
        'use_cache',
        'load_unpacked',
        'gsap_sandboxing',
        'force_load_origami',
        'rocketscript_ignore',
    );
    foreach ($options as $item) {
        ls_update_option('ls_'.$item, (int) array_key_exists($item, ${'_POST'}));
    }

    ls_update_option('ls_scripts_priority', (int)${'_POST'}['scripts_priority']);

    ls_redirect('admin.php?page=layerslider&message=generalUpdated');
}


function ls_save_screen_options()
{
    ${'_POST'}['options'] = !empty(${'_POST'}['options']) ? ${'_POST'}['options'] : array();
    ls_update_option('ls-screen-options', ${'_POST'}['options']);
    die();
}


function ls_get_mce_sliders()
{

    $sliders = LsSliders::find(array('limit' => 50));
    foreach ($sliders as $key => $item) {
        $sliders[$key]['preview'] = ls_apply_filters('ls_preview_for_slider', $item);
        $sliders[$key]['name'] = ! empty($item['name']) ? htmlspecialchars($item['name']) : 'Unnamed';
    }

    die(Tools::jsonEncode($sliders));
}


function ls_save_slider()
{

    // Vars
    $id     = (int) ${'_POST'}['id'];
    $data     = ${'_POST'}['sliderData'];

    // Security check
    if (!ls_check_admin_referer('ls-save-slider-' . $id)) {
        return false;
    }

    // Parse slider settings
    $data['properties'] = Tools::jsonDecode(_ss(html_entity_decode($data['properties'])), true);

    // Parse slide data
    if (!empty($data['layers']) && is_array($data['layers'])) {
        foreach ($data['layers'] as $slideKey => $slideData) {
            $slideData = Tools::jsonDecode(_ss($slideData), true);

            if (! empty($slideData['sublayers'])) {
                foreach ($slideData['sublayers'] as $layerKey => $layerData) {
                    if (! empty($layerData['transition'])) {
                        $slideData['sublayers'][$layerKey]['transition'] = addslashes($layerData['transition']);
                    }

                    if (! empty($layerData['styles'])) {
                        $slideData['sublayers'][$layerKey]['styles'] = addslashes($layerData['styles']);
                    }
                }
            }

            $data['layers'][$slideKey] = $slideData;
        }
    }

    $title = ls_esc_sql($data['properties']['title']);
    $slug = !empty($data['properties']['slug']) ? ls_esc_sql($data['properties']['slug']) : '';


    // Relative URL
    if (isset($data['properties']['relativeurls'])) {
        $data = layerslider_convert_urls($data);
    }

    // WPML
    // if (function_exists('icl_register_string')) {
    //     layerslider_register_wpml_strings($id, $data);
    // }

    // Delete transient (if any) to
    // invalidate outdated data
    ls_delete_transient('ls-slider-data-'.$id);

    // Update the slider
    if (empty($id)) {
        $id = LsSliders::add($title, $data, $slug);
    } else {
        LsSliders::update($id, $title, $data, $slug);
    }

    // Revisions handling
    if (LsRevisions::$active) {
        $lastRevision = LsRevisions::last($id);

        if (! $lastRevision || $lastRevision->date_c < time() - 60*LsRevisions::$interval) {
            LsRevisions::add($id, json_encode($data));

            if (LsRevisions::count($id) > LsRevisions::$limit) {
                LsRevisions::shift($id);
            }
        }
    }

    die(Tools::jsonEncode(array('status' => 'ok')));
}


function ls_save_revisions_options()
{
    // Security check
    ls_check_admin_referer('ls-save-revisions-options');

    ls_update_option('ls-revisions-enabled', (int)isset(${'_POST'}['ls-revisions-enabled']));
    ls_update_option('ls-revisions-limit', ${'_POST'}['ls-revisions-limit']);
    ls_update_option('ls-revisions-interval', ${'_POST'}['ls-revisions-interval']);

    if (empty(${'_POST'}['ls-revisions-enabled'])) {
        LsRevisions::truncate();
    }

    ls_redirect('admin.php?page=ls-revisions');
}


function ls_revert_slider()
{
    $sliderId = (int)${'_POST'}['slider-id'];
    $revisionId = (int)${'_POST'}['revision-id'];

    // Security check
    ls_check_admin_referer('ls-revert-slider-'.$sliderId);

    LsRevisions::revert($sliderId, $revisionId);

    ls_redirect('admin.php?page=layerslider&action=edit&id='.$sliderId);
}


function ls_parse_date()
{
    die(Tools::jsonEncode(array('errorCount' => 1, 'dateStr' => '')));
}


/********************************************************/
/*               Action to duplicate slider             */
/********************************************************/
function layerslider_duplicateslider()
{

    // Check and get the ID
    $id = (int) ${'_GET'}['id'];
    if (!isset(${'_GET'}['id'])) {
        return;
    }

    // Get the original slider
    $slider = LsSliders::find((int)${'_GET'}['id']);
    $data = $slider['data'];

    // Name check
    if (empty($data['properties']['title'])) {
        $data['properties']['title'] = 'Unnamed';
    }

    // Insert the duplicate
    $data['properties']['title'] .= ' copy';
    unset($data['properties']['hook']);
    unset($data['properties']['shop']);
    unset($data['properties']['lang']);
    unset($data['properties']['cats']);
    unset($data['properties']['pages']);
    unset($data['properties']['position']);
    LsSliders::add($data['properties']['title'], $data);

    // Success
    ls_redirect('admin.php?page=layerslider&message=duplicateSuccess');
}


/********************************************************/
/*                Action to remove slider               */
/********************************************************/
function layerslider_removeslider()
{

    // Check received data
    if (empty(${'_GET'}['id'])) {
        return false;
    }

    // Remove the slider
    LsSliders::remove((int)${'_GET'}['id']);

    // Delete transient cache
    ls_delete_transient('ls-slider-data-'.(int)${'_GET'}['id']);

    // Reload page
    ls_redirect('admin.php?page=layerslider&message=removeSuccess');
}


/********************************************************/
/*                Action to restore slider              */
/********************************************************/
function layerslider_restoreslider()
{

    // Check received data
    if (empty(${'_GET'}['id'])) {
        return false;
    }

    // Remove the slider
    LsSliders::restore((int) ${'_GET'}['id']);

    // Delete transient cache
    ls_delete_transient('ls-slider-data-'.(int)${'_GET'}['id']);

    // Reload page
    if (! empty(${'_GET'}['ref'])) {
        ls_redirect(urldecode(${'_GET'}['ref']));
    } else {
        ls_redirect('admin.php?page=layerslider&message=restoreSuccess');
    }

    exit;
}


/********************************************************/
/*            Actions to import sample slider            */
/********************************************************/
function ls_import_bundled()
{

    // Check nonce
    if (! ls_check_ajax_referer('ls-import-demos', 'security')) {
        return false;
    }

    // Get samples and importUtil
    $sliders = LsSources::getDemoSliders();
    include LS_ROOT_PATH.'/classes/class.ls.importutil.php';

    if (! empty(${'_GET'}['slider']) && is_string(${'_GET'}['slider'])) {
        if ($item = LsSources::getDemoSlider(${'_GET'}['slider'])) {
            if (file_exists($item['file'])) {
                $import = new LsImportUtil($item['file']);
                $id = $import->lastImportId;
            }
        }
    }

    die(Tools::jsonEncode(array(
        'success' => !! $id,
        'slider_id' => $id,
        'url' => ls_admin_url('admin.php?page=layerslider&action=edit&id='.$id)
    )));
}


function ls_import_online()
{
}


// PLUGIN USER PERMISSIONS
//-------------------------------------------------------
function ls_save_access_permissions()
{
    // Get capability
    $capability = (${'_POST'}['custom_role'] == 'custom') ? ${'_POST'}['custom_capability'] : ${'_POST'}['custom_role'];

    // Test value
    if (empty($capability) || !ls_current_user_can($capability)) {
        ls_redirect('admin.php?page=layerslider&error=1&message=permissionError');
    } else {
        ls_update_option('layerslider_custom_capability', $capability);
        ls_redirect('admin.php?page=layerslider&message=permissionSuccess');
    }
}


// IMPORT SLIDERS
//-------------------------------------------------------
function ls_import_sliders()
{
    // Check export file if any
    if (!is_uploaded_file($_FILES['import_file']['tmp_name'])) {
        ls_redirect('admin.php?page=layerslider&error=1&message=importSelectError');
    }

    include LS_ROOT_PATH.'/classes/class.ls.importutil.php';
    $import = new LsImportUtil($_FILES['import_file']['tmp_name'], $_FILES['import_file']['name']);

    if (! empty($import->lastImportId) && (int)$import->sliderCount === 1) {
        // One slider, redirect to editor
        ls_redirect('admin.php?page=layerslider&action=edit&id='.$import->lastImportId);
    } else {
        // Multiple sliders, redirect to slider list
        ls_redirect('admin.php?page=layerslider&message=importSuccess&sliderCount='.$import->sliderCount);
    }
}


// EXPORT SLIDERS
//-------------------------------------------------------
function ls_export_sliders($sliderId = 0)
{
    // Get sliders
    if (! empty($sliderId)) {
        $sliders = LsSliders::find($sliderId);
    } elseif (isset(${'_POST'}['sliders'][0]) && ${'_POST'}['sliders'][0] == -1) {
        $sliders = LsSliders::find(array('limit' => 500));
    } elseif (!empty(${'_POST'}['sliders'])) {
        $sliders = LsSliders::find(${'_POST'}['sliders']);
    } else {
        ls_redirect('admin.php?page=layerslider&error=1&message=exportSelectError');
    }

    // Check results
    if (empty($sliders)) {
        ls_redirect('admin.php?page=layerslider&error=1&message=exportNotFound');
    }

    if (class_exists('ZipArchive')) {
        include LS_ROOT_PATH.'/classes/class.ls.exportutil.php';
        $zip = new LsExportUtil;
    }

    // Gather slider data
    $data = array();
    foreach ($sliders as $item) {
        // init PS specific props
        unset($item['data']['properties']['hook']);
        unset($item['data']['properties']['shop']);
        unset($item['data']['properties']['lang']);
        unset($item['data']['properties']['cats']);
        unset($item['data']['properties']['pages']);
        unset($item['data']['properties']['position']);

        // Gather Google Fonts used in slider
        $item['data']['googlefonts'] = $zip->fontsForSlider($item['data']);

        // Slider settings array for fallback mode
        $data[] = $item['data'];

        // If ZipArchive is available
        if (class_exists('ZipArchive')) {
            // Add slider folder and settings.json
            $name = empty($item['name']) ? 'slider_' . $item['id'] : $item['name'];
            $name = ls_sanitize_file_name($name);
            $zip->addSettings(Tools::jsonEncode($item['data']), $name);

            // Add images?
            if (!isset(${'_POST'}['skip_images'])) {
                $images = $zip->getImagesForSlider($item['data']);
                $images = $zip->getFSPaths($images);
                $zip->addImage($images, $name);
            }
        }
    }

    if (class_exists('ZipArchive')) {
        $zip->download();
    } else {
        $name = 'LayerSlider Export '.date('Y-m-d').' at '.date('H.i.s').'.json';
        header('Content-type: application/force-download');
        header('Content-Disposition: attachment; filename="'.str_replace(' ', '_', $name).'"');
        die(call_user_func('base'.'64_encode', Tools::jsonEncode($data)));
    }
}


// TRANSITION BUILDER
//-------------------------------------------------------
function ls_save_user_css()
{
    // Get target file and content
    $file = _PS_MODULE_DIR_.'layerslider/views/css/custom.css';

    // Attempt to save changes
    if (is_writable(dirname($file))) {
        file_put_contents($file, _ss(${'_POST'}['contents']));
        ls_redirect('admin.php?page=ls-style-editor&edited=1');

    // File isn't writable
    } else {
        ls_die(ls__("It looks like your files isn't writable, so PHP couldn't make any changes (CHMOD).", "LayerSlider"), ls__('Cannot write to file', 'LayerSlider'), array('back_link' => true));
    }
}


// SKIN EDITOR
//-------------------------------------------------------
function ls_save_user_skin()
{
    // Error checking
    if (empty(${'_POST'}['skin']) || strpos(${'_POST'}['skin'], '..') !== false) {
        ls_die(ls__("It looks like you haven't selected any skin to edit.", "LayerSlider"), ls__('No skin selected.', 'LayerSlider'), array('back_link' => true));
    }

    // Get skin file and contents
    $skin = LsSources::getSkin(${'_POST'}['skin']);
    $file = $skin['file'];

    // Attempt to write the file
    if (is_writable($file)) {
        file_put_contents($file, _ss(${'_POST'}['contents']));
        ls_redirect('admin.php?page=ls-skin-editor&skin='.$skin['handle'].'&edited=1');
    } else {
        ls_die(ls__("It looks like your files isn't writable, so PHP couldn't make any changes (CHMOD).", "LayerSlider"), ls__('Cannot write to file', 'LayerSlider'), array('back_link' => true));
    }
}


// TRANSITION BUILDER
//-------------------------------------------------------
function ls_save_user_transitions()
{
    $custom_trs = _PS_MODULE_DIR_.'layerslider/views/js/custom.transitions.js';
    $data = 'var layerSliderCustomTransitions = '._ss(${'_POST'}['ls-transitions']).';';
    file_put_contents($custom_trs, $data);
    die('SUCCESS');
}


// --
function ls_get_post_details()
{
    $params = ${'_POST'}['params'];

    $queryArgs = array(
        'post_status' => 'publish',
        'limit' => 100,
        'posts_per_page' => 100,
        'post_type' => $params['post_type']
    );

    if (!empty($params['post_orderby'])) {
        $queryArgs['orderby'] = $params['post_orderby'];
    }

    if (!empty($params['post_order'])) {
        $queryArgs['order'] = $params['post_order'];
    }

    if (!empty($params['post_categories'][0])) {
        $queryArgs['category__in'] = $params['post_categories'];
    }

    if (!empty($params['post_tags'][0])) {
        $queryArgs['tag__in'] = $params['post_tags'];
    }

    if (!empty($params['post_taxonomy']) && !empty($params['post_tax_terms'])) {
        $queryArgs['tax_query'][] = array(
            'taxonomy' => $params['post_taxonomy'],
            'field' => 'id',
            'terms' => $params['post_tax_terms']
        );
    }

    $posts = LsPosts::find($queryArgs)->getParsedObject();

    die(Tools::jsonEncode($posts));
}


function layerslider_convert_urls($arr)
{
    // Global BG
    if (!empty($arr['properties']['backgroundimage']) && Tools::strpos($arr['properties']['backgroundimage'], 'http://') !== false) {
        $arr['properties']['backgroundimage'] = parse_url($arr['properties']['backgroundimage'], PHP_URL_PATH);
    }

    // YourLogo img
    if (!empty($arr['properties']['yourlogo']) && Tools::strpos($arr['properties']['yourlogo'], 'http://') !== false) {
        $arr['properties']['yourlogo'] = parse_url($arr['properties']['yourlogo'], PHP_URL_PATH);
    }

    if (!empty($arr['layers'])) {
        foreach ($arr['layers'] as $key => $slide) {
            // Layer BG
            if (Tools::strpos($slide['properties']['background'], 'http://') !== false) {
                $arr['layers'][$key]['properties']['background'] = parse_url($slide['properties']['background'], PHP_URL_PATH);
            }

            // Layer Thumb
            if (Tools::strpos($slide['properties']['thumbnail'], 'http://') !== false) {
                $arr['layers'][$key]['properties']['thumbnail'] = parse_url($slide['properties']['thumbnail'], PHP_URL_PATH);
            }

            // Image sublayers
            if (!empty($slide['sublayers'])) {
                foreach ($slide['sublayers'] as $subkey => $layer) {
                    if ($layer['media'] == 'img' && Tools::strpos($layer['image'], 'http://') !== false) {
                        $arr['layers'][$key]['sublayers'][$subkey]['image'] = parse_url($layer['image'], PHP_URL_PATH);
                    }
                }
            }
        }
    }

    return $arr;
}
