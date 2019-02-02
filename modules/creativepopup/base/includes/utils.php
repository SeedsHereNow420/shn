<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

function cp_ordinal_number($number)
{
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    $mod100 = $number % 100;
    return $number.($mod100 >= 11 && $mod100 <= 13 ? 'th' :  $ends[$number % 10]);
}

function cp_check_unit($str, $key = '')
{

    if (strstr($str, 'px') == false && strstr($str, '%') == false) {
        if ($key !== 'z-index' && $key !== 'font-weight' && $key !== 'opacity') {
            return $str.'px';
        }
    }

    return $str;
}
