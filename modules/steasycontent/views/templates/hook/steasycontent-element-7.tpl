{*
* 2007-2016 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2016 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
{if isset($sub_column.st_gmap_lat) && $sub_column.st_gmap_lat && isset($sub_column.st_gmap_lng) && $sub_column.st_gmap_lng}

<div id="st_map_{$sub_column.id_st_easy_content_column}" data-id_map="{$sub_column.id_st_easy_content_column}" class="st_map_block {if $sub_column.st_el_hide_on_mobile == 1} hidden-md-down {elseif $sub_column.st_el_hide_on_mobile == 2} hidden-lg-up {/if}"></div>

<script type="text/javascript">
{if $sub_column.st_gmap_api_key}
var st_google_api_key = "{$sub_column.st_gmap_api_key}";
{/if}
{literal}
function initMap_{/literal}{$sub_column.id_st_easy_content_column}{literal}()
{
    var latlng = new google.maps.LatLng({/literal}{$sub_column.st_gmap_lat}, {$sub_column.st_gmap_lng}{literal});
    var mapOptions = {
        mapTypeId: google.maps.MapTypeId.{/literal}{if $sub_column.st_gmap_type}{$sub_column.st_gmap_type|upper}{else}ROADMAP{/if}{literal},
        zoom: {/literal}{if $sub_column.st_gmap_zoom}{$sub_column.st_gmap_zoom}{else}14{/if}{literal},
        
        {/literal}
        {if $sub_column.st_gmap_hide_control}disableDefaultUI: true,{/if}
        /*zoomControl: boolean,
        mapTypeControl: boolean,
        scaleControl: boolean,
        streetViewControl: boolean,
        rotateControl: boolean,
        fullscreenControl: boolean
        */
        {if $sub_column.st_gmap_zoom_scroll_off}scrollwheel: false,{/if}
        {if $sub_column.st_gmap_dragging_off}draggable: false,{/if}
        {if $sub_column.st_gmap_style}styles: {$sub_column.st_gmap_style nofilter},{/if}
        {literal}
        center: latlng
    }
    var map = new google.maps.Map(document.getElementById('st_map_{/literal}{$sub_column.id_st_easy_content_column}{literal}'), 
        mapOptions);
    
    {/literal}


    {if isset($sub_column['elements'])}
    {foreach $sub_column['elements'] as $element}
        {if $element.st_gmap_lat && $element.st_gmap_lng}

        // marker
        var latlng_{$element.id_st_easy_content_element} = new google.maps.LatLng({$element.st_gmap_lat}, {$element.st_gmap_lng});
        var marker_{$element.id_st_easy_content_element}{literal} = new google.maps.Marker({
            position: latlng_{/literal}{$element.id_st_easy_content_element},
            {if $sub_column.st_gmap_marker_animation}animation: google.maps.Animation.DROP,{/if}
            {if isset($element.st_gmap_marker_img) && $element.st_gmap_marker_img}icon: '{$urls.pic_url}steasycontent/{$element.st_gmap_marker_img}',{/if}
            {if $element.st_gmap_marker_title}title : '{$element.st_gmap_marker_title}',{/if}
            {literal}map: map
        });{/literal}
            
        // Infor window
        {if $element.st_gmap_marker_text}
        var infowindow_{$element.id_st_easy_content_element}{literal} = new google.maps.InfoWindow({
            content: '{/literal}{$element.st_gmap_marker_text|strip|escape:quotes nofilter}',
            {if $element.st_gmap_info_width}maxWidth: {$element.st_gmap_info_width},{/if}
            position: latlng_{$element.id_st_easy_content_element}{literal}
        });
        marker_{/literal}{$element.id_st_easy_content_element}{literal}.addListener('click', function() {
            infowindow_{/literal}{$element.id_st_easy_content_element}{literal}.open(map, marker_{/literal}{$element.id_st_easy_content_element}{literal});
        });{/literal}
        {/if}
        {/if}
    {/foreach}
    {/if}
{literal}
}
{/literal}
</script>
{/if}