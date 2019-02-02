/*
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    ST-themes <hellolee@gmail.com>
*  @copyright 2007-2017 ST-themes
*  @license   Use, by you or one client for one Prestashop instance.
*/
jQuery(function($) {
  if($('.st_map_block').length && typeof(st_google_api_key)!=='undefined')
    $.getScript('https://maps.googleapis.com/maps/api/js?key='+st_google_api_key+'&callback=init_global_maps');
});
var init_global_maps = function(){
  $.each($('.st_map_block'), function(){
    window['initMap_'+$(this).data('id_map')]()
  });
};