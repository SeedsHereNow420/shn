<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

/********************************************************/
/*                        Actions                       */
/********************************************************/

// Legacy, will be dropped
$GLOBALS['lsAutoUpdateBox'] = true;

// Basic configuration
define('LS_DB_TABLE', 'layerslider');
define('LS_DB_VERSION', '6.5.8');
define('LS_PLUGIN_VERSION', '6.6.5');

// Path info
define('LS_ROOT_FILE', __FILE__);
define('LS_ROOT_PATH', dirname(__FILE__));
define('LS_ROOT_URL', ls_plugins_url('', __FILE__));

// Other constants
define('LS_WP_ADMIN', true);
define('LS_PLUGIN_SLUG', basename(dirname(__FILE__)));
define('LS_PLUGIN_BASE', ls_plugin_basename(__FILE__));
define('LS_MARKETPLACE_ID', '1362246');
define('LS_TEXTDOMAIN', 'LayerSlider');
define('LS_REPO_BASE_URL', 'https://repository.kreaturamedia.com/v4/');

defined('NL') or define("NL", "\r\n");
defined('TAB') or define("TAB", "\t");

// Shared
include LS_ROOT_PATH.'/wp/scripts.php';
include LS_ROOT_PATH.'/wp/menus.php';
include LS_ROOT_PATH.'/wp/hooks.php';
include LS_ROOT_PATH.'/wp/shortcodes.php';
include LS_ROOT_PATH.'/wp/compatibility.php';
include LS_ROOT_PATH.'/includes/slider_utils.php';
include LS_ROOT_PATH.'/classes/class.ls.posts.php';
include LS_ROOT_PATH.'/classes/class.ls.sliders.php';
include LS_ROOT_PATH.'/classes/class.ls.sources.php';

// Back-end only
if (ls_is_admin()) {
    include LS_ROOT_PATH.'/wp/actions.php';
    include LS_ROOT_PATH.'/wp/activation.php';
    include LS_ROOT_PATH.'/wp/tinymce.php';
    include LS_ROOT_PATH.'/wp/notices.php';
    include LS_ROOT_PATH.'/classes/class.ls.revisions.php';

    LsRevisions::init();
}

// Register [layerslider] shortcode
LsShortcode::registerShortcode();

// Add default skins.
// Reads all sub-directories (individual skins) from the given path.
LsSources::addSkins(_PS_MODULE_DIR_.'layerslider/views/css/layerslider/skins/');


// Offering a way for authors to override LayerSlider resources by
// triggering filter and action hooks after the theme has loaded.
// add_action('after_setup_theme', 'layerslider_after_setup_theme');
// function layerslider_after_setup_theme() {
//     $url = apply_filters('layerslider_root_url', plugins_url('', __FILE__));
//     define('LS_ROOT_URL', $url);
//     layerslider_loaded();
// }


/********************************************************/
/*                        MISC                          */
/********************************************************/
/*
function layerslider_builder_convert_numbers(&$item, $key)
{
    if (is_numeric($item)) {
        $item = (float) $item;
    }
}

function ls_ordinal_number($number)
{
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    $mod100 = $number % 100;
    return $number . ($mod100 >= 11 && $mod100 <= 13 ? 'th' :  $ends[$number % 10]);
}



function layerslider_check_unit($str, $key = '')
{

    if (strstr($str, 'px') == false && strstr($str, '%') == false) {
        if ($key !== 'z-index' && $key !== 'font-weight' && $key !== 'opacity') {
            return $str.'px';
        }
    }

    return $str;
}

function layerslider_convert_urls($arr)
{

    // Global BG
    if (!empty($arr['properties']['backgroundimage']) && strpos($arr['properties']['backgroundimage'], 'http://') !== false) {
        $arr['properties']['backgroundimage'] = parse_url($arr['properties']['backgroundimage'], PHP_URL_PATH);
    }

    // YourLogo img
    if (!empty($arr['properties']['yourlogo']) && strpos($arr['properties']['yourlogo'], 'http://') !== false) {
        $arr['properties']['yourlogo'] = parse_url($arr['properties']['yourlogo'], PHP_URL_PATH);
    }

    if (!empty($arr['layers'])) {
        foreach ($arr['layers'] as $key => $slide) {
            // Layer BG
            if (strpos($slide['properties']['background'], 'http://') !== false) {
                $arr['layers'][$key]['properties']['background'] = parse_url($slide['properties']['background'], PHP_URL_PATH);
            }

            // Layer Thumb
            if (strpos($slide['properties']['thumbnail'], 'http://') !== false) {
                $arr['layers'][$key]['properties']['thumbnail'] = parse_url($slide['properties']['thumbnail'], PHP_URL_PATH);
            }

            // Image sublayers
            if (!empty($slide['sublayers'])) {
                foreach ($slide['sublayers'] as $subkey => $layer) {
                    if ($layer['media'] == 'img' && strpos($layer['image'], 'http://') !== false) {
                        $arr['layers'][$key]['sublayers'][$subkey]['image'] = parse_url($layer['image'], PHP_URL_PATH);
                    }
                }
            }
        }
    }

    return $arr;
}
*/
