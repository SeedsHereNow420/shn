<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

function layerslider_convert()
{

    // Get old sliders if any
    $sliders = ls_get_option('layerslider-slides', array());
    $sliders = is_array($sliders) ? $sliders : unserialize($sliders);

    // Create new storage in DB
    layerslider_create_db_table();

    // Iterate over them
    if (!empty($sliders) && is_array($sliders)) {
        foreach ($sliders as $key => $slider) {
            LsSliders::add($slider['properties']['title'], $slider);
        }
    }

    // Remove old data and exit
    ls_delete_option('layerslider-slides');
    ls_redirect('admin.php?page=layerslider');
}


function lsSliderById($id)
{

    $args = is_numeric($id) ? (int) $id : array('limit' => 1);
    $slider = LsSliders::find($args);

    if ($slider == null) {
        return false;
    }

    return $slider;
}

function lsSliders($limit = 50, $desc = true, $withData = false)
{

    $args = array();
    $args['limit'] = $limit;
    $args['order'] = ($desc === true) ? 'DESC' : 'ASC';
    $args['data'] = ($withData === true) ? true : false;

    $sliders = LsSliders::find($args);

    // No results
    if ($sliders == null) {
        return array();
    }

    return $sliders;
}
