<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Private filters, can change at any time
cp_add_filter('cp_popup_title', 'cp_filter_popup_title', 10, 2);
cp_add_filter('cp_preview_for_popup', 'cp_preview_for_popup', 10, 1);
cp_add_filter('cp_get_thumbnail', 'cp_get_thumbnail', 10, 3);
cp_add_filter('cp_get_image', 'cp_get_image', 10, 2);

// Public filters
cp_add_filter('cp_parse_defaults', 'cp_parse_defaults', 10, 2);

function cp_filter_popup_title($title = '', $maxLength = 50)
{
    $name = empty($title) ? 'Unnamed' : htmlspecialchars(cp_ss($title));
    return isset($name[$maxLength]) ? Tools::substr($name, 0, $maxLength) . ' ...' : $name;
}

function cp_preview_for_popup($popup = array())
{
    // Attempt to find pre-defined popup banner
    if (! empty($popup['data']['meta']) && ! empty($popup['data']['meta']['preview'])) {
        return $popup['data']['meta']['preview'];
    }

    // Find an image
    if (isset($popup['data']['layers'])) {
        foreach ($popup['data']['layers'] as $layer) {
            if (!empty($layer['properties']['thumbnail']) && $layer['properties']['thumbnail'] !== '[image-url]') {
                $image = $layer['properties']['thumbnail'];
                break;
            }
            if (!empty($layer['properties']['background']) && $layer['properties']['background'] !== '[image-url]') {
                $image = $layer['properties']['background'];
                break;
            }
        }
    }

    return ! empty($image) ? $image : '';
}


function cp_get_thumbnail($id = null, $url = null, $blankPlaceholder = false)
{
    if (!empty($url)) {
        return $url;
    }

    return CP_VIEWS_URL.'img/admin/blank.gif';
}

function cp_get_image($id = null, $url = null)
{
    if (! empty($url)) {
        return $url;
    }

    return CP_VIEWS_URL.'img/admin/blank.gif';
}


function cp_parse_defaults($defaults = array(), $raw = array())
{
    $ret = array();

    foreach ($defaults as $key => $default) {
        $phpKey = is_string($default['keys']) ? $default['keys'] : $default['keys'][0];
        $jsKey  = is_string($default['keys']) ? $default['keys'] : $default['keys'][1];
        $retKey = isset($default['props']['meta']) ? 'props' : 'attrs';

        if (isset($default['props']['forceoutput'])) {
            if (! isset($raw[$phpKey])) {
                $ret[$retKey][$jsKey] = $default['value'];
            } else {
                $ret[$retKey][$jsKey] = $raw[$phpKey];
            }
        } elseif (isset($raw[$phpKey]) && isset($default['props']['output'])) {
            $ret[$retKey][$jsKey] = $raw[$phpKey];
        } elseif (isset($raw[$phpKey]) && is_array($raw[$phpKey])) {
            $ret[$retKey][$jsKey] = $raw[$phpKey];
        } elseif (isset($raw[$phpKey]) && is_bool($default['value'])) {
            if ($default['value'] == true && empty($raw[$phpKey])) {
                $ret[$retKey][$jsKey] = false;
            } elseif ($default['value'] == false && !empty($raw[$phpKey])) {
                $ret[$retKey][$jsKey] = true;
            }
        } elseif (isset($raw[$phpKey])) {
            if (isset($default['props']['meta']) || ((string)$default['value'] !== (string)$raw[$phpKey] && (string)$raw[$phpKey] !== '')) {
                $raw[$phpKey] = isset($default['props']['raw']) ? addslashes($raw[$phpKey]) : $raw[$phpKey];
                $ret[$retKey][$jsKey] = cp_ss($raw[$phpKey]);
            }
        }
    }

    return $ret;
}

function cp_array_to_attr($arr, $mode = '')
{
    if (!empty($arr) && is_array($arr)) {
        $ret = array();
        foreach ($arr as $key => $val) {
            if ($mode == 'css' && is_numeric($val)) {
                $ret[] = ''.$key.':'.cp_check_unit($val, $key).';';
            } elseif (is_bool($val)) {
                $bool = $val ? 'true' : 'false';
                $ret[] = "$key:$bool;";
            } else {
                $ret[] = "$key:$val;";
            }
        }
        return implode('', $ret);
    }
}
