<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:07:46
         compiled from "module:steasycontent/views/templates/hook/steasycontent-element-7.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19228339005c31a9422f22e8-59940808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f901d0ff842de4aa4f2f64bbb2a0180ed492e40' => 
    array (
      0 => 'module:steasycontent/views/templates/hook/steasycontent-element-7.tpl',
      1 => 1512351208,
      2 => 'module',
    ),
  ),
  'nocache_hash' => '19228339005c31a9422f22e8-59940808',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sub_column' => 0,
    'element' => 0,
    'urls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31a942427aa9_25175646',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31a942427aa9_25175646')) {function content_5c31a942427aa9_25175646($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_lat'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_lat']&&isset($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_lng'])&&$_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_lng']) {?>

<div id="st_map_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['id_st_easy_content_column'], ENT_QUOTES, 'UTF-8');?>
" data-id_map="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['id_st_easy_content_column'], ENT_QUOTES, 'UTF-8');?>
" class="st_map_block <?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_el_hide_on_mobile']==1) {?> hidden-md-down <?php } elseif ($_smarty_tpl->tpl_vars['sub_column']->value['st_el_hide_on_mobile']==2) {?> hidden-lg-up <?php }?>"></div>

<script type="text/javascript">
<?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_api_key']) {?>
var st_google_api_key = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_api_key'], ENT_QUOTES, 'UTF-8');?>
";
<?php }?>

function initMap_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['id_st_easy_content_column'], ENT_QUOTES, 'UTF-8');?>
()
{
    var latlng = new google.maps.LatLng(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_lat'], ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_lng'], ENT_QUOTES, 'UTF-8');?>
);
    var mapOptions = {
        mapTypeId: google.maps.MapTypeId.<?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_type']) {?><?php echo htmlspecialchars(mb_strtoupper($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_type'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>ROADMAP<?php }?>,
        zoom: <?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_zoom']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_zoom'], ENT_QUOTES, 'UTF-8');?>
<?php } else { ?>14<?php }?>,
        
        
        <?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_hide_control']) {?>disableDefaultUI: true,<?php }?>
        /*zoomControl: boolean,
        mapTypeControl: boolean,
        scaleControl: boolean,
        streetViewControl: boolean,
        rotateControl: boolean,
        fullscreenControl: boolean
        */
        <?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_zoom_scroll_off']) {?>scrollwheel: false,<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_dragging_off']) {?>draggable: false,<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_style']) {?>styles: <?php echo $_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_style'];?>
,<?php }?>
        
        center: latlng
    }
    var map = new google.maps.Map(document.getElementById('st_map_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sub_column']->value['id_st_easy_content_column'], ENT_QUOTES, 'UTF-8');?>
'), 
        mapOptions);
    
    


    <?php if (isset($_smarty_tpl->tpl_vars['sub_column']->value['elements'])) {?>
    <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sub_column']->value['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value) {
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['element']->value['st_gmap_lat']&&$_smarty_tpl->tpl_vars['element']->value['st_gmap_lng']) {?>

        // marker
        var latlng_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
 = new google.maps.LatLng(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_gmap_lat'], ENT_QUOTES, 'UTF-8');?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_gmap_lng'], ENT_QUOTES, 'UTF-8');?>
);
        var marker_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
 = new google.maps.Marker({
            position: latlng_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
,
            <?php if ($_smarty_tpl->tpl_vars['sub_column']->value['st_gmap_marker_animation']) {?>animation: google.maps.Animation.DROP,<?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['element']->value['st_gmap_marker_img'])&&$_smarty_tpl->tpl_vars['element']->value['st_gmap_marker_img']) {?>icon: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urls']->value['pic_url'], ENT_QUOTES, 'UTF-8');?>
steasycontent/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_gmap_marker_img'], ENT_QUOTES, 'UTF-8');?>
',<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['element']->value['st_gmap_marker_title']) {?>title : '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_gmap_marker_title'], ENT_QUOTES, 'UTF-8');?>
',<?php }?>
            map: map
        });
            
        // Infor window
        <?php if ($_smarty_tpl->tpl_vars['element']->value['st_gmap_marker_text']) {?>
        var infowindow_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
 = new google.maps.InfoWindow({
            content: '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['element']->value['st_gmap_marker_text']),'quotes');?>
',
            <?php if ($_smarty_tpl->tpl_vars['element']->value['st_gmap_info_width']) {?>maxWidth: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['st_gmap_info_width'], ENT_QUOTES, 'UTF-8');?>
,<?php }?>
            position: latlng_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>

        });
        marker_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
.addListener('click', function() {
            infowindow_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
.open(map, marker_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['element']->value['id_st_easy_content_element'], ENT_QUOTES, 'UTF-8');?>
);
        });
        <?php }?>
        <?php }?>
    <?php } ?>
    <?php }?>

}

</script>
<?php }?><?php }} ?>
