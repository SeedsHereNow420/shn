<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

$lsPriority = LS_PRIORITY;

ls_add_action('ls_enqueue_scripts', 'layerslider_enqueue_content_res', $lsPriority);
ls_add_action('admin_enqueue_scripts', 'layerslider_enqueue_admin_res', $lsPriority);
ls_add_action('admin_enqueue_scripts', 'ls_load_google_fonts', $lsPriority);
ls_add_action('ls_enqueue_scripts', 'ls_load_google_fonts', ($lsPriority+1));


function layerslider_enqueue_content_res()
{

    // Include in the footer?
    $condsc = ls_get_option('ls_conditional_script_loading', false) ? true : false;
    $footer = ls_get_option('ls_include_at_footer', false) ? true : false;
    $footer = $condsc ? true : $footer;

    // Use Gogole CDN version of jQuery
    // if (ls_get_option('ls_use_custom_jquery', false)) {
    //     wp_deregister_script('jquery');
    //     ls_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), '1.8.3');
    // }

    // Register LayerSlider resources
    ls_register_script('layerslider-greensock', LS_VIEWS_URL.'js/layerslider/greensock.js', false, '1.19.0', $footer);
    ls_register_script('layerslider', LS_VIEWS_URL.'js/layerslider/layerslider.webshopworks.jquery.js', array('jquery'), LS_PLUGIN_VERSION, $footer);
    ls_register_script('layerslider-transitions', LS_VIEWS_URL.'js/layerslider/layerslider.transitions.js', false, LS_PLUGIN_VERSION, $footer);
    ls_enqueue_style('layerslider', LS_VIEWS_URL.'css/layerslider/layerslider.css', false, LS_PLUGIN_VERSION);

    // LayerSlider Origami plugin
    ls_register_script('layerslider-origami', LS_VIEWS_URL.'js/layerslider/plugins/origami/layerslider.origami.js', array('jquery'), LS_PLUGIN_VERSION, $footer);
    ls_register_style('layerslider-origami', LS_VIEWS_URL.'css/layerslider/plugins/origami/layerslider.origami.css', false, LS_PLUGIN_VERSION);

    // Build LS_Meta object
    $LS_Meta = array('v' => LS_PLUGIN_VERSION);

    if (!ls_is_admin() && ls_get_option('ls_gsap_sandboxing', false)) {
        $LS_Meta['fixGSAP'] = true;
    }

    // Print LS_Meta object
    ls_localize_script('layerslider-greensock', 'LS_Meta', $LS_Meta);

    // User resources
    $uploads = ls_upload_dir();
    if (file_exists(_PS_MODULE_DIR_.'layerslider/views/js/custom.transitions.js')) {
        ls_register_script('ls-user-transitions', LS_VIEWS_URL.'js/custom.transitions.js', false, LS_PLUGIN_VERSION, $footer);
    } elseif (file_exists($uploads['basedir'].'layerslider.custom.transitions.js')) {
        // depricated
        ls_register_script('ls-user-transitions', $uploads['baseurl'].'layerslider.custom.transitions.js', false, LS_PLUGIN_VERSION, $footer);
    }

    if (file_exists(_PS_MODULE_DIR_.'layerslider/views/css/custom.css')) {
        ls_enqueue_style('ls-user', LS_VIEWS_URL.'css/custom.css', false, LS_PLUGIN_VERSION);
    } elseif (file_exists($uploads['basedir'].'layerslider.custom.css')) {
        // depricated
        ls_enqueue_style('ls-user', $uploads['baseurl'].'layerslider.custom.css', false, LS_PLUGIN_VERSION);
    }

    if (! $footer) {
        ls_enqueue_script('layerslider-greensock');
        ls_enqueue_script('layerslider');
        ls_enqueue_script('layerslider-transitions');
        ls_enqueue_script('ls-user-transitions');
    }

    if (ls_get_option('ls_force_load_origami', false)) {
        ls_enqueue_script('layerslider-origami');
        ls_enqueue_style('layerslider-origami');
    }
}


function layerslider_enqueue_admin_res()
{
    $l10n_ls_mce = null;
    $l10n_ls = null;

    // Load global LayerSlider CSS
    ls_enqueue_style('layerslider-global', LS_VIEWS_URL.'css/admin/global.css', false, LS_PLUGIN_VERSION);

    // Load global LayerSlider JS
    include LS_ROOT_PATH.'/wp/tinymce_l10n.php';
    ls_localize_script('layerslider-global', 'LS_MCE_l10n', $l10n_ls_mce);

    // Embed CSS. Hides the admin menu bar and the sidebar.
    if (! empty(${'_GET'}['ls-embed'])) {
        ls_enqueue_style('layerslider-embed', LS_VIEWS_URL.'css/admin/embed.css', false, LS_PLUGIN_VERSION);
    }

    // Use Gogole CDN version of jQuery
    // if (ls_get_option('ls_use_custom_jquery', false)) {
    //     ls_deregister_script('jquery');
    //     ls_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', array(), '1.8.3');
    // }

    // Load LayerSlider-only resources
    $screen = ls_get_current_screen();
    if (strpos($screen->base, 'layerslider') !== false) {
        // New Media Library
        // if (function_exists('ls_enqueue_media')) {
        //     ls_enqueue_media();
        // }

        // Load some bundled WP resources
        ls_enqueue_script('thickbox');
        ls_enqueue_style('thickbox');
        ls_enqueue_script('wp-pointer');
        ls_enqueue_style('wp-pointer');

        ls_localize_script('ps-modules', 'PS_Modules', ls_get_modules());

        // Dashicons
        if (version_compare(ls_get_bloginfo('version'), '3.8', '<')) {
            ls_enqueue_style('dashicons', LS_VIEWS_URL.'css/dashicons/dashicons.css', false, LS_PLUGIN_VERSION);
        }

        // Global scripts & stylesheets
        ls_enqueue_script('layerslider-greensock', LS_VIEWS_URL.'js/layerslider/greensock.js', false, '1.19.0');
        ls_enqueue_script('kreaturamedia-ui', LS_VIEWS_URL.'js/admin/km-ui.js', array('jquery'), LS_PLUGIN_VERSION);
        ls_enqueue_script('ls-admin-global', LS_VIEWS_URL.'js/admin/ls-admin-common.js', array('jquery'), LS_PLUGIN_VERSION);
        ls_enqueue_style('layerslider-admin', LS_VIEWS_URL.'css/admin/admin.css', false, LS_PLUGIN_VERSION);
        ls_enqueue_style('layerslider-admin-new', LS_VIEWS_URL.'css/admin/admin_new.css', false, LS_PLUGIN_VERSION);
        ls_enqueue_style('kreaturamedia-ui', LS_VIEWS_URL.'css/admin/km-ui.css', false, LS_PLUGIN_VERSION);

        // 3rd-party: CodeMirror
        ls_enqueue_style('codemirror', LS_VIEWS_URL.'css/codemirror/lib/codemirror.css', false, LS_PLUGIN_VERSION);
        ls_enqueue_script('codemirror', LS_VIEWS_URL.'js/codemirror/lib/codemirror.js', array('jquery'), LS_PLUGIN_VERSION);
        ls_enqueue_style('codemirror-solarized', LS_VIEWS_URL.'css/codemirror/theme/solarized.mod.css', false, LS_PLUGIN_VERSION);
        ls_enqueue_script('codemirror-syntax-css', LS_VIEWS_URL.'js/codemirror/mode/css/css.js', array('jquery'), LS_PLUGIN_VERSION);
        ls_enqueue_script('codemirror-syntax-javascript', LS_VIEWS_URL.'js/codemirror/mode/javascript/javascript.js', array('jquery'), LS_PLUGIN_VERSION);
        ls_enqueue_script('codemirror-foldcode', LS_VIEWS_URL.'js/codemirror/addon/fold/foldcode.js', array('jquery'), LS_PLUGIN_VERSION);
        ls_enqueue_script('codemirror-foldgutter', LS_VIEWS_URL.'js/codemirror/addon/fold/foldgutter.js', array('jquery'), LS_PLUGIN_VERSION);
        ls_enqueue_script('codemirror-brace-fold', LS_VIEWS_URL.'js/codemirror/addon/fold/brace-fold.js', array('jquery'), LS_PLUGIN_VERSION);
        ls_enqueue_script('codemirror-active-line', LS_VIEWS_URL.'js/codemirror/addon/selection/active-line.js', array('jquery'), LS_PLUGIN_VERSION);

        // Localize admin scripts
        include LS_ROOT_PATH.'/wp/scripts_l10n.php';
        ls_localize_script('ls-admin-global', 'LS_l10n', $l10n_ls);

        // Sliders list page
        if (!empty(${'_GET'}['page']) && ${'_GET'}['page'] != 'ls-transition-builder' && ${'_GET'}['page'] != 'ls-revisions' && empty(${'_GET'}['action'])) {
            ls_enqueue_script('ls-admin-sliders', LS_VIEWS_URL.'js/admin/ls-admin-sliders.js', array('jquery'), LS_PLUGIN_VERSION);
            // ls_enqueue_script('ls-shuffle', LS_VIEWS_URL.'/static/shuffle/shuffle.min.js', array('jquery'), LS_PLUGIN_VERSION);

        // Slider & Transition Builder
        } else {
            // Load some bundled WP resources
            ls_enqueue_script('jquery-ui-sortable');
            ls_enqueue_script('jquery-ui-selectable');
            ls_enqueue_script('jquery-ui-draggable');
            ls_enqueue_script('jquery-ui-resizable');
            ls_enqueue_script('jquery-ui-slider');

            ls_register_script('layerslider-admin', LS_VIEWS_URL.'/js/admin/ls-admin-slider-builder.js', array('jquery', 'json2'), LS_PLUGIN_VERSION);

            // Slider Builder JS. Don't load automatically other than the Slider Builder
            if (!empty(${'_GET'}['page']) && ${'_GET'}['page'] != 'ls-transition-builder' && ${'_GET'}['page'] != 'ls-revisions') {
                ls_enqueue_script('layerslider-admin');
            }

            // LayerSlider includes for preview
            ls_enqueue_script('layerslider', LS_VIEWS_URL.'js/layerslider/layerslider.webshopworks.jquery.js', array('jquery'), LS_PLUGIN_VERSION);
            ls_enqueue_script('layerslider-transitions', LS_VIEWS_URL.'js/layerslider/layerslider.transitions.js', false, LS_PLUGIN_VERSION);
            ls_enqueue_script('layerslider-tr-gallery', LS_VIEWS_URL.'js/admin/layerslider.transition.gallery.js', array('jquery'), LS_PLUGIN_VERSION);
            ls_enqueue_style('layerslider', LS_VIEWS_URL.'css/layerslider/layerslider.css', false, LS_PLUGIN_VERSION);
            ls_enqueue_style('layerslider-tr-gallery', LS_VIEWS_URL.'css/admin/layerslider.transitiongallery.css', false, LS_PLUGIN_VERSION);

            // LayerSlider Timeline plugin
            ls_enqueue_script('layerslider-timeline', LS_VIEWS_URL.'js/layerslider/plugins/timeline/layerslider.timeline.js', array('jquery'), LS_PLUGIN_VERSION);
            ls_enqueue_style('layerslider-timeline', LS_VIEWS_URL.'css/layerslider/plugins/timeline/layerslider.timeline.css', false, LS_PLUGIN_VERSION);

            // LayerSlider Origami plugin
            ls_enqueue_script('layerslider-origami', LS_VIEWS_URL.'js/layerslider/plugins/origami/layerslider.origami.js', array('jquery'), LS_PLUGIN_VERSION);
            ls_enqueue_style('layerslider-origami', LS_VIEWS_URL.'css/layerslider/plugins/origami/layerslider.origami.css', false, LS_PLUGIN_VERSION);

            // 3rd-party: MiniColor
            ls_enqueue_script('minicolor', LS_VIEWS_URL.'js/minicolors/jquery.minicolors.js', array('jquery'), LS_PLUGIN_VERSION);
            ls_enqueue_style('minicolor', LS_VIEWS_URL.'css/minicolors/jquery.minicolors.css', false, LS_PLUGIN_VERSION);

            // 3rd-party: CC Image Editor
            ls_enqueue_script('cc-image-sdk', 'https://dme0ih8comzn4.cloudfront.net/imaging/v3/editor.js', false, LS_PLUGIN_VERSION);

            // 3rd-party: Air Datepicker
            ls_enqueue_style('air-datepicker', LS_VIEWS_URL.'css/air-datepicker/air-datepicker.min.css', false, '2.1.0');
            ls_enqueue_script('air-datepicker', LS_VIEWS_URL.'js/air-datepicker/air-datepicker.min.js', array('jquery'), '2.1.0en');

            // 3rd party: html2canvas
            ls_enqueue_script('html2canvas', LS_VIEWS_URL.'js/html2canvas/html2canvas.min.js', array('jquery'), '1.0.0a9');

            // User transitions
            $uploads = ls_upload_dir();
            if (file_exists(_PS_MODULE_DIR_.'layerslider/views/js/custom.transitions.js')) {
                ls_enqueue_script('ls-user-transitions', LS_VIEWS_URL.'js/custom.transitions.js', false, LS_PLUGIN_VERSION);
            } elseif (file_exists($uploads['basedir'].'layerslider.custom.transitions.js')) {
                // depricated
                ls_enqueue_script('ls-user-transitions', $uploads['baseurl'].'layerslider.custom.transitions.js', false, LS_PLUGIN_VERSION);
            }

            // User CSS
            if (file_exists(_PS_MODULE_DIR_.'layerslider/views/css/custom.css')) {
                ls_enqueue_style('ls-user', LS_VIEWS_URL.'css/custom.css', false, LS_PLUGIN_VERSION);
            } elseif (file_exists($uploads['basedir'].'layerslider.custom.css')) {
                // depricated
                ls_enqueue_style('ls-user', $uploads['baseurl'].'layerslider.custom.css', false, LS_PLUGIN_VERSION);
            }
        }
    }

    // Transition builder
    if (strpos($screen->base, 'ls-transition-builder') !== false) {
        ls_enqueue_script('layerslider_tr_builder', LS_VIEWS_URL.'js/admin/ls-admin-transition-builder.js', array('jquery'), LS_PLUGIN_VERSION);
    }

    // Revisions
    if (strpos($screen->base, 'ls-revisions') !== false) {
        ls_enqueue_style('ls-revisions', LS_VIEWS_URL.'/css/admin/revisions.css', false, LS_PLUGIN_VERSION);
        ls_enqueue_script('ls-revisions', LS_VIEWS_URL.'/js/admin/ls-admin-revisions.js', array('jquery'), LS_PLUGIN_VERSION);
    }

    // Skin editor
    if (strpos($screen->base, 'ls-skin-editor') !== false || strpos($screen->base, 'ls-style-editor') !== false) {
        ls_enqueue_style('ls-skin-editor', LS_VIEWS_URL.'css/admin/skin.editor.css', false, LS_PLUGIN_VERSION);
    }

    // About page
    if (strpos($screen->base, 'ls-about') !== false) {
        ls_enqueue_style('ls-about-page', LS_VIEWS_URL.'css/admin/about.css', false, LS_PLUGIN_VERSION);
    }
}



function ls_load_google_fonts()
{

    // Get font list
    $fonts = ls_get_option('ls-google-fonts', array());
    $scripts = ls_get_option('ls-google-font-scripts', array('latin', 'latin-ext'));

    // Check fonts if any
    if (!empty($fonts) && is_array($fonts)) {
        $lsFonts = array();
        foreach ($fonts as $item) {
            if (ls_is_admin() || !$item['admin']) {
                $lsFonts[] = htmlspecialchars($item['param']);
            }
        }

        if (!empty($lsFonts)) {
            $lsFonts = implode('%7C', $lsFonts);
            $protocol = ls_is_ssl() ? 'https' : 'http';
            $query_args = array(
                'family' => $lsFonts,
                'subset' => implode('%2C', $scripts),
            );

            ls_enqueue_style(
                'ls-google-fonts',
                ls_add_query_arg($query_args, "$protocol://fonts.googleapis.com/css"),
                array(),
                null
            );
        }
    }
}

function ls_meta_generator()
{
    $str = '<meta name="generator" content="Powered by Creative Slider '.LS_PLUGIN_VERSION.' - Multi-Purpose, Responsive, Parallax, Mobile-Friendly Slider Module for PrestaShop." />' . NL;

    return ls_apply_filters('ls_meta_generator', $str);
}
