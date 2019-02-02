<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Register "New" admin menu bar menu
ls_add_action('admin_bar_menu', 'ls_admin_bar', 999);
function ls_admin_bar($wp_admin_bar)
{
    $wp_admin_bar->add_node(array(
        'parent' => 'new-content',
        'id'    => 'ab-ls-add-new',
        'title' => 'LayerSlider',
        'href'  => ls_admin_url('admin.php?page=layerslider')
    ));
}

// Register sidebar menu
ls_add_action('admin_menu', 'layerslider_settings_menu');
function layerslider_settings_menu()
{

    $capability = 'manage_options';
    $icon = version_compare(ls_get_bloginfo('version'), '3.8', '>=') ? 'dashicons-images-alt2' : LS_VIEWS_URL.'img/admin/icon_16x16.png';

    // Add main page
    ls_add_menu_page('LayerSlider', 'LayerSlider', $capability, 'layerslider', 'layerslider_router', $icon);

    // Add "All Sliders" submenu
    ls_add_submenu_page('layerslider', 'LayerSlider', ls__('All Sliders', 'LayerSlider'), $capability, 'layerslider', 'layerslider_router');

    // Add "Revisions" submenu
    ls_add_submenu_page('layerslider', 'LayerSlider Revisions', ls__('Revisions', 'LayerSlider'), $capability, 'ls-revisions', 'layerslider_router');

    // Add "Skin Editor" submenu
    ls_add_submenu_page('layerslider', 'LayerSlider Skin Editor', ls__('Skin Editor', 'LayerSlider'), $capability, 'ls-skin-editor', 'layerslider_router');

    // Add "CSS Editor submenu"
    ls_add_submenu_page('layerslider', 'LayerSlider CSS Editor', ls__('CSS Editor', 'LayerSlider'), $capability, 'ls-style-editor', 'layerslider_router');

    // Add "Transition Builder" submenu
    ls_add_submenu_page('layerslider', 'LayerSlider Transition Builder', ls__('Transition Builder', 'LayerSlider'), $capability, 'ls-transition-builder', 'layerslider_router');
}

// Help menu
ls_add_filter('contextual_help', 'layerslider_help', 10, 3);
function layerslider_help($contextual_help, $screen_id, $screen)
{

    if (strpos($screen->base, 'layerslider') !== false && (!empty(${'_GET'}['page']) && ${'_GET'}['page'] !== 'ls-about')) {
        $screen->add_help_tab(array(
            'id' => 'help',
            'title' => 'Getting Help',
            'content' => '<p>Please read our <a href="http://docs.webshopworks.com/creative-slider" target="_blank">Online Documentation</a> carefully, it will likely answer all of your questions.</p><p>You can also check the <a href="http://docs.webshopworks.com/creative-slider/59-faq" target="_blank">FAQs</a> for additional information.</p>'
        ));
    }
}

function layerslider_router()
{

    // Get current screen details
    $screen = ls_get_current_screen();


    if (strpos($screen->base, 'ls-skin-editor') !== false) {
        include(LS_ROOT_PATH.'/views/skin_editor.php');
    } elseif (strpos($screen->base, 'ls-transition-builder') !== false) {
        include(LS_ROOT_PATH.'/views/transition_builder.php');
    } elseif (strpos($screen->base, 'ls-revisions') !== false) {
        include(LS_ROOT_PATH.'/views/revisions.php');
    } elseif (strpos($screen->base, 'ls-style-editor') !== false) {
        include(LS_ROOT_PATH.'/views/style_editor.php');
    } elseif (isset(${'_GET'}['action']) && ${'_GET'}['action'] == 'edit') {
        include(LS_ROOT_PATH.'/views/slider_edit.php');
    } else {
        include(LS_ROOT_PATH.'/views/slider_list.php');
    }
}
