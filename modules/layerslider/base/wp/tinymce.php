<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

function ls_mce_hooks()
{
    if (ls_current_user_can('edit_posts') || ls_current_user_can('edit_pages')) {
        if (ls_get_user_option('rich_editing')) {
            ls_add_filter('mce_buttons', 'ls_register_mce_buttons');
            ls_add_filter('mce_external_plugins', 'ls_register_mce_js');
        }
    }
}

function ls_register_mce_buttons($buttons)
{
    array_push($buttons, 'layerslider_button');
    return $buttons;
}

function ls_register_mce_js($plugins)
{
    $plugins['layerslider_button'] = LS_VIEWS_URL.'js/admin/ls-admin-tinymce.js';
    return $plugins;
}

ls_add_action('init', 'ls_mce_hooks');
