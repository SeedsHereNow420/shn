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
    $pages = null;
    $cpInit = null;
    $cpPlugins = null;
    $popupID = 0;
}

// Get init code
$init = array();
foreach ($pages['properties']['attrs'] as $key => $val) {
    if (is_bool($val)) {
        $val = $val ? 'true' : 'false';
        $init[] = $key.': '.$val;
    } elseif (is_numeric($val)) {
        $init[] = $key.': '.$val;
    } else {
        $init[] = "$key: '$val'";
    }
}

// Popup
if (!empty($pages['properties']['attrs']['type']) && $pages['properties']['attrs']['type'] === 'popup') {
    $cpPlugins[] = 'popup';
}

if (! empty($cpPlugins)) {
    $init[] = 'plugins: ' . Tools::jsonEncode(array_values(array_unique($cpPlugins)));
}

$init = implode(', ', $init);

$cpInit[] = '<js>' . NL;
$cpInit[] = 'cpjq("#'.$popupID.'")';
if (!empty($pages['callbacks']) && is_array($pages['callbacks'])) {
    foreach ($pages['callbacks'] as $event => $function) {
        $cpInit[] = '.on("'.$event.'", '.cp_ss($function).')';
    }
}
$cpInit[] = '.creativePopup({'.$init.'});' . NL;
$cpInit[] = '</js>';
