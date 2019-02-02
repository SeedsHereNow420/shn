<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

cp_add_action('init', 'cp_register_form_actions');
function cp_register_form_actions()
{
    cp_add_action('save_post', 'cp_delete_caches');
    if (cp_current_user_can(cp_get_option('cp_custom_capability', 'manage_options'))) {
        // Popups list layout
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'popups' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'layout') {
            $type = (${'_GET'}['type'] === 'list') ? 'list' : 'grid';
            cp_update_user_meta(cp_get_current_user_id(), 'cp-popups-layout', $type);
            cp_redirect('index.php?controller=AdminCreativePopup');
        }

        // Remove popup
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'popups' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'remove') {
            cp_add_action('admin_init', 'cp_remove_popup');
        }

        // Restore popup
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'popups' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'restore') {
            cp_add_action('admin_init', 'cp_restore_popup');
        }

        // Duplicate popup
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'popups' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'duplicate') {
            cp_add_action('admin_init', 'cp_duplicate_popup');
        }

        // Export popup
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'popups' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'export') {
            ${'_POST'}['sliders'] = array((int) ${'_GET'}['id']);
            ${'_POST'}['cp-export'] = true;
        }

        // Empty caches
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'popups' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'empty_caches') {
            cp_add_action('admin_init', 'cp_empty_caches');
        }

        // Update Library
        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'popups' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'update_store') {
            cp_delete_option('cp-store-last-updated');
            cp_redirect('index.php?controller=AdminCreativePopup&message=updateStore');
        }

        // Popup list bulk actions
        if (isset(${'_POST'}['cp-bulk-action'])) {
            cp_add_action('admin_init', 'cp_popups_bulk_action');
        }

        // Add new popup
        if (isset(${'_POST'}['cp-add-new-popup'])) {
            cp_add_action('admin_init', 'cp_add_new_popup');
        }

        // Google Fonts
        if (isset(${'_POST'}['cp-save-google-fonts'])) {
            cp_add_action('admin_init', 'cp_save_google_fonts');
        }

        // Advanced settings
        if (isset(${'_POST'}['cp-save-advanced-settings'])) {
            cp_add_action('admin_init', 'cp_save_advanced_settings');
        }

        // Access permission
        if (isset(${'_POST'}['cp-access-permission'])) {
            cp_add_action('admin_init', 'cp_save_access_permissions');
        }

        // Import popups
        if (isset(${'_POST'}['cp-import'])) {
            cp_add_action('admin_init', 'cp_import_popups');
        }

        // Export popups
        if (isset(${'_POST'}['cp-export'])) {
            cp_add_action('admin_init', 'cp_export_popups');
        }

        // Revisions Options
        if (isset(${'_POST'}['cp-revisions-options'])) {
            cp_add_action('admin_init', 'cp_save_revisions_options');
        }

        // Revert popup
        if (isset(${'_POST'}['cp-revert-popup'])) {
            cp_add_action('admin_init', 'cp_revert_popup');
        }

        // Custom CSS editor
        if (isset(${'_POST'}['cp-user-css'])) {
            cp_add_action('admin_init', 'cp_save_user_css');
        }

        // Skin editor
        if (isset(${'_POST'}['cp-user-skins'])) {
            cp_add_action('admin_init', 'cp_save_user_skin');
        }

        // Transition builder
        if (isset(${'_POST'}['cp-user-transitions'])) {
            cp_add_action('admin_init', 'cp_save_user_transitions');
        }

        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'popups' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'hide-important-notice') {
            $storeData = cp_get_option('cp-store-data', false);
            if (!empty($storeData) && !empty($storeData['important_notice']['date'])) {
                cp_update_option('cp-last-important-notice', $storeData['important_notice']['date']);
            }

            cp_redirect('index.php?controller=AdminCreativePopup');
        }

        if (isset(${'_GET'}['page']) && ${'_GET'}['page'] == 'popups' && isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'hide-support-notice') {
            cp_update_option('cp-show-support-notice', 0);
            cp_redirect('index.php?controller=AdminCreativePopup');
        }

        // AJAX functions
        cp_add_action('ajax_cp_save_popup', 'cp_save_popup');
        cp_add_action('ajax_cp_save_screen_options', 'cp_save_screen_options');
        cp_add_action('ajax_cp_get_mce_popups', 'cp_get_mce_popups');
        cp_add_action('ajax_cp_get_post_details', 'cp_get_post_details');
        cp_add_action('ajax_cp_get_search_posts', 'cp_get_search_posts');
        cp_add_action('ajax_cp_get_taxonomies', 'cp_get_taxonomies');
        cp_add_action('ajax_cp_upload_from_url', 'cp_upload_from_url');
        cp_add_action('ajax_cp_store_opened', 'cp_store_opened');
        cp_add_action('ajax_cp_change_status', 'cp_change_status');
    }
}


// Template store last viewed
function cp_store_opened()
{
    cp_update_user_meta(cp_get_current_user_id(), 'cp-store-last-viewed', date('Y-m-d'));
    die();
}


function cp_delete_caches()
{
    try {
        Cache::getInstance()->delete('cp-popup-data-*');
    } catch (Exception $ex) {
        // TODO
    }
}


function cp_empty_caches()
{
    cp_delete_caches();
    cp_redirect('index.php?controller=AdminCreativePopup&message=cacheEmpty');
}


function cp_add_new_popup()
{
    $id = CpInstances::add(${'_POST'}['title']);
    cp_redirect('index.php?controller=AdminCreativePopup&action=edit&id='.$id.'&showsettings=1');
}


function cp_popups_bulk_action()
{
    // Publish
    if (${'_POST'}['action'] === 'publish') {
        if (!empty(${'_POST'}['sliders']) && is_array(${'_POST'}['sliders'])) {
            CpInstances::changeStatus(${'_POST'}['sliders'], 1);
            cp_redirect('index.php?controller=AdminCreativePopup&message=publishSuccess');
        } else {
            cp_redirect('index.php?controller=AdminCreativePopup&message=publishSelectError&error=1');
        }

    // Unpublish
    } elseif (${'_POST'}['action'] === 'unpublish') {
        if (!empty(${'_POST'}['sliders']) && is_array(${'_POST'}['sliders'])) {
            CpInstances::changeStatus(${'_POST'}['sliders'], 0);
            cp_redirect('index.php?controller=AdminCreativePopup&message=unpublishSuccess');
        } else {
            cp_redirect('index.php?controller=AdminCreativePopup&message=unpublishSelectError&error=1');
        }

    // Export
    } elseif (${'_POST'}['action'] === 'export') {
        cp_export_popups();

    // Remove
    } elseif (${'_POST'}['action'] === 'remove') {
        if (!empty(${'_POST'}['sliders']) && is_array(${'_POST'}['sliders'])) {
            foreach (${'_POST'}['sliders'] as $item) {
                CpInstances::remove((int)$item);
            }
            cp_redirect('index.php?controller=AdminCreativePopup&message=removeSuccess');
        } else {
            cp_redirect('index.php?controller=AdminCreativePopup&message=removeSelectError&error=1');
        }

    // Delete
    } elseif (${'_POST'}['action'] === 'delete') {
        if (!empty(${'_POST'}['sliders']) && is_array(${'_POST'}['sliders'])) {
            foreach (${'_POST'}['sliders'] as $item) {
                CpInstances::delete((int)$item);
                CpRevisions::clear((int)$item);
            }
            cp_redirect('index.php?controller=AdminCreativePopup&message=deleteSuccess');
        } else {
            cp_redirect('index.php?controller=AdminCreativePopup&message=deleteSelectError&error=1');
        }

    // Restore
    } elseif (${'_POST'}['action'] === 'restore') {
        if (!empty(${'_POST'}['sliders']) && is_array(${'_POST'}['sliders'])) {
            foreach (${'_POST'}['sliders'] as $item) {
                CpInstances::restore((int)$item);
            }
            cp_redirect('index.php?controller=AdminCreativePopup&message=restoreSuccess');
        } else {
            cp_redirect('index.php?controller=AdminCreativePopup&message=restoreSelectError&error=1');
        }

    // Merge
    } elseif (${'_POST'}['action'] === 'merge') {
        // Error check
        if (!isset(${'_POST'}['sliders'][1]) || !is_array(${'_POST'}['sliders'])) {
            cp_redirect('index.php?controller=AdminCreativePopup&error=1&message=mergeSelectError');
        }

        if ($popups = CpInstances::find(${'_POST'}['sliders'])) {
            $ids = array();
            foreach ($popups as $key => $item) {
                // Get IDs
                $ids[] = '#' . $item['id'];

                // Merge popups
                if ($key === 0) {
                    $data = $item['data'];
                } else {
                    $data['layers'] = array_merge($data['layers'], $item['data']['layers']);
                }
            }

            // Save as new
            $name = cp__('Merged popups of ') . implode(', ', $ids);
            $data['properties']['title'] = $name;
            CpInstances::add($name, $data);
        }

        cp_redirect('index.php?controller=AdminCreativePopup&message=mergeSuccess');
    }
}


function cp_save_google_fonts()
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
    cp_update_option('cp-google-font-scripts', ${'_POST'}['scripts']);

    // Save & redirect back
    cp_update_option('cp-google-fonts', $fonts);
    cp_redirect('index.php?controller=AdminCreativePopup&message=googleFontsUpdated');
}


function cp_save_advanced_settings()
{

    $options = array(
        'use_cache',
        'load_unpacked',
        'gsap_sandboxing',
        'force_load_origami'
    );
    foreach ($options as $item) {
        $prefix = 'gsap_sandboxing' == $item ? 'ls_' : 'cp_';
        cp_update_option($prefix.$item, (int) array_key_exists($item, ${'_POST'}));
    }

    cp_update_option('cp_scripts_priority', (int)${'_POST'}['scripts_priority']);

    cp_redirect('index.php?controller=AdminCreativePopup&message=generalUpdated');
}


function cp_save_screen_options()
{
    ${'_POST'}['options'] = !empty(${'_POST'}['options']) ? ${'_POST'}['options'] : array();
    cp_update_option('cp-screen-options', ${'_POST'}['options']);
    die();
}


function cp_get_mce_popups()
{

    $popups = CpInstances::find(array('limit' => 50));
    foreach ($popups as $key => $item) {
        $popups[$key]['preview'] = cp_apply_filters('cp_preview_for_popup', $item);
        $popups[$key]['name'] = ! empty($item['name']) ? htmlspecialchars($item['name']) : 'Unnamed';
    }

    die(Tools::jsonEncode($popups));
}


function cp_save_popup()
{

    // Vars
    $id = (int) ${'_POST'}['id'];
    $data = ${'_POST'}['sliderData'];

    // Parse popup settings
    $data['properties'] = Tools::jsonDecode(cp_ss(html_entity_decode($data['properties'])), true);

    // Parse page data
    if (!empty($data['layers']) && is_array($data['layers'])) {
        foreach ($data['layers'] as $pageKey => $pageData) {
            $pageData = Tools::jsonDecode(cp_ss($pageData), true);

            if (! empty($pageData['sublayers'])) {
                foreach ($pageData['sublayers'] as $layerKey => $layerData) {
                    if (! empty($layerData['transition'])) {
                        $pageData['sublayers'][$layerKey]['transition'] = addslashes($layerData['transition']);
                    }

                    if (! empty($layerData['styles'])) {
                        $pageData['sublayers'][$layerKey]['styles'] = addslashes($layerData['styles']);
                    }
                }
            }

            $data['layers'][$pageKey] = $pageData;
        }
    }

    $title = cp_esc_sql($data['properties']['title']);

    // Update the popup
    if (empty($id)) {
        $id = CpInstances::add($title, $data);
    } else {
        CpInstances::update($id, $title, $data);
        // Popup Index
        if (!CpInstances::isDeleted($id)) {
            !empty($data['properties']['status']) ? CpPopups::addIndex($id, $data['properties']) : CpPopups::removeIndex($id);
        }
    }

    // Revisions handling
    if (CpRevisions::$active) {
        $lastRevision = CpRevisions::last($id);

        if (! $lastRevision || $lastRevision->date_c < time() - 60*CpRevisions::$interval) {
            CpRevisions::add($id, json_encode($data));

            if (CpRevisions::count($id) > CpRevisions::$limit) {
                CpRevisions::shift($id);
            }
        }
    }

    die(Tools::jsonEncode(array('status' => 'ok')));
}


function cp_save_revisions_options()
{
    cp_update_option('cp-revisions-enabled', (int)isset(${'_POST'}['cp-revisions-enabled']));
    cp_update_option('cp-revisions-limit', ${'_POST'}['cp-revisions-limit']);
    cp_update_option('cp-revisions-interval', ${'_POST'}['cp-revisions-interval']);

    if (empty(${'_POST'}['cp-revisions-enabled'])) {
        CpRevisions::truncate();
    }

    cp_redirect('index.php?controller=AdminCreativePopupRevisions');
}


function cp_revert_popup()
{
    $popupId = (int)${'_POST'}['slider-id'];
    $revisionId = (int)${'_POST'}['revision-id'];

    CpRevisions::revert($popupId, $revisionId);

    cp_redirect('index.php?controller=AdminCreativePopup&action=edit&id='.$popupId);
}


/********************************************************/
/*               Action to duplicate popup              */
/********************************************************/
function cp_duplicate_popup()
{

    // Check and get the ID
    $id = (int) ${'_GET'}['id'];
    if (!isset(${'_GET'}['id'])) {
        return;
    }

    // Get the original popup
    $popup = CpInstances::find((int)${'_GET'}['id']);
    $data = $popup['data'];

    // Name check
    if (empty($data['properties']['title'])) {
        $data['properties']['title'] = 'Unnamed';
    }

    // Insert the duplicate
    $data['properties']['title'] .= ' copy';
    CpInstances::add($data['properties']['title'], $data);

    // Success
    cp_redirect('index.php?controller=AdminCreativePopup&message=duplicateSuccess');
}


/********************************************************/
/*                Action to remove popup                */
/********************************************************/
function cp_remove_popup()
{

    // Check received data
    if (empty(${'_GET'}['id'])) {
        return false;
    }

    // Remove the popup
    CpInstances::remove((int)${'_GET'}['id']);

    // Reload page
    cp_redirect('index.php?controller=AdminCreativePopup&message=removeSuccess');
}


/********************************************************/
/*                Action to restore popup               */
/********************************************************/
function cp_restore_popup()
{

    // Check received data
    if (empty(${'_GET'}['id'])) {
        return false;
    }

    // Remove the popup
    CpInstances::restore((int) ${'_GET'}['id']);

    // Reload page
    cp_redirect('index.php?controller=AdminCreativePopup&message=restoreSuccess');

    exit;
}


// PLUGIN USER PERMISSIONS
//-------------------------------------------------------
function cp_save_access_permissions()
{
    // Get capability
    $capability = (${'_POST'}['custom_role'] == 'custom') ? ${'_POST'}['custom_capability'] : ${'_POST'}['custom_role'];

    // Test value
    if (empty($capability) || !cp_current_user_can($capability)) {
        cp_redirect('index.php?controller=AdminCreativePopup&error=1&message=permissionError');
    } else {
        cp_update_option('cp_custom_capability', $capability);
        cp_redirect('index.php?controller=AdminCreativePopup&message=permissionSuccess');
    }
}


// IMPORT SLIDERS
//-------------------------------------------------------
function cp_import_popups()
{
    // Check export file if any
    if (!is_uploaded_file($_FILES['import_file']['tmp_name'])) {
        cp_redirect('index.php?controller=AdminCreativePopup&error=1&message=importSelectError');
    }

    include CP_ROOT_PATH.'/classes/ImportUtil.php';
    $import = new CpImportUtil($_FILES['import_file']['tmp_name'], $_FILES['import_file']['name']);

    if (! empty($import->lastImportId) && (int)$import->popupCount === 1) {
        // One popup, redirect to editor
        cp_redirect('index.php?controller=AdminCreativePopup&action=edit&id='.$import->lastImportId);
    } else {
        // Multiple popups, redirect to popup list
        cp_redirect('index.php?controller=AdminCreativePopup&message=importSuccess&popupCount='.$import->popupCount);
    }
}


// EXPORT SLIDERS
//-------------------------------------------------------
function cp_export_popups($popupId = 0)
{
    // Get popups
    if (! empty($popupId)) {
        $popups = CpInstances::find($popupId);
    } elseif (isset(${'_POST'}['sliders'][0]) && ${'_POST'}['sliders'][0] == -1) {
        $popups = CpInstances::find(array('limit' => 500));
    } elseif (!empty(${'_POST'}['sliders'])) {
        $popups = CpInstances::find(${'_POST'}['sliders']);
    } else {
        cp_redirect('index.php?controller=AdminCreativePopup&error=1&message=exportSelectError');
    }

    // Check results
    if (empty($popups)) {
        cp_redirect('index.php?controller=AdminCreativePopup&error=1&message=exportNotFound');
    }

    if (class_exists('ZipArchive')) {
        include CP_ROOT_PATH.'/classes/ExportUtil.php';
        $zip = new CpExportUtil;
    }

    // Gather popup data
    $data = array();
    foreach ($popups as $item) {
        // init PS specific props
        unset($item['data']['properties']['hook']);
        unset($item['data']['properties']['shop']);
        unset($item['data']['properties']['lang']);
        unset($item['data']['properties']['cats']);
        unset($item['data']['properties']['pages']);
        unset($item['data']['properties']['position']);

        // Gather Google Fonts used in popup
        $item['data']['googlefonts'] = $zip->fontsForPopup($item['data']);

        // Popup settings array for fallback mode
        $data[] = $item['data'];

        // If ZipArchive is available
        if (class_exists('ZipArchive')) {
            // Add popup folder and settings.json
            $name = empty($item['name']) ? 'popup_' . $item['id'] : $item['name'];
            $name = cp_sanitize_file_name($name);
            $zip->addSettings(Tools::jsonEncode($item['data']), $name);

            // Add images?
            if (!isset(${'_POST'}['skip_images'])) {
                $images = $zip->getImagesForPopup($item['data']);
                $images = $zip->getFSPaths($images);
                $zip->addImage($images, $name);
            }
        }
    }

    if (class_exists('ZipArchive')) {
        $zip->download();
    } else {
        $name = 'CreativePopup Export '.date('Y-m-d').' at '.date('H.i.s').'.json';
        header('Content-type: application/force-download');
        header('Content-Disposition: attachment; filename="'.str_replace(' ', '_', $name).'"');
        die(call_user_func('base'.'64_encode', Tools::jsonEncode($data)));
    }
}


// TRANSITION BUILDER
//-------------------------------------------------------
function cp_save_user_css()
{
    // Get target file and content
    $file = _PS_MODULE_DIR_.'creativepopup/views/css/custom.css';

    // Attempt to save changes
    if (is_writable(_PS_MODULE_DIR_.'creativepopup/views/css')) {
        file_put_contents($file, cp_ss(${'_POST'}['contents']));
        cp_redirect('index.php?controller=AdminCreativePopupStyle&edited=1');

    // File isn't writable
    } else {
        cp_die(cp__("It looks like your files isn't writable, so PHP couldn't make any changes (CHMOD)."), cp__('Cannot write to file'), array('back_link' => true));
    }
}


// SKIN EDITOR
//-------------------------------------------------------
function cp_save_user_skin()
{
    // Error checking
    if (empty(${'_POST'}['skin']) || strpos(${'_POST'}['skin'], '..') !== false) {
        cp_die(cp__("It looks like you haven't selected any skin to edit."), cp__('No skin selected.'), array('back_link' => true));
    }

    // Get skin file and contents
    $skin = CpSources::getSkin(${'_POST'}['skin']);
    $file = $skin['file'];

    // Attempt to write the file
    if (is_writable($file)) {
        file_put_contents($file, cp_ss(${'_POST'}['contents']));
        cp_redirect('index.php?controller=AdminCreativePopupSkin&skin='.$skin['handle'].'&edited=1');
    } else {
        cp_die(cp__("It looks like your files isn't writable, so PHP couldn't make any changes (CHMOD)."), cp__('Cannot write to file'), array('back_link' => true));
    }
}


// TRANSITION BUILDER
//-------------------------------------------------------
function cp_save_user_transitions()
{
    $custom_trs = _PS_MODULE_DIR_ . 'creativepopup/views/js/custom.transitions.js';
    $data = 'var cpCustomTransitions = '.cp_ss(${'_POST'}['cp-transitions']).';';
    file_put_contents($custom_trs, $data);
    die('SUCCESS');
}


// --
function cp_get_post_details()
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

    $posts = CpPosts::find($queryArgs)->getParsedObject();

    die(Tools::jsonEncode($posts));
}

function cp_change_status()
{
    $res = 0;
    if ($id = (int) Tools::getValue('id', 0)) {
        $published = (int) Tools::getValue('published', 0);
        $res = CpInstances::changeStatus($id, $published);
    }
    die($res ? 'OK' : 'NOK');
}
