<?php /* Smarty version Smarty-3.1.19, created on 2019-01-05 23:18:07
         compiled from "modules/dealsofthedaypro//views/templates/front/dealsofthedaypro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6698813535c31abafb183f8-54714540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2fcfadcbfcd768d5b6cd2d7c669e36ec995bf4c' => 
    array (
      0 => 'modules/dealsofthedaypro//views/templates/front/dealsofthedaypro.tpl',
      1 => 1537597046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6698813535c31abafb183f8-54714540',
  'function' => 
  array (
    'generateslider' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'data' => 0,
    'id_category' => 0,
    'slider' => 0,
    'page' => 0,
    'dealsofthedaypro_hookposition' => 0,
    'catitem' => 0,
    'link' => 0,
    'homeSize' => 0,
    'restricted_country_mode' => 0,
    'sliders' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5c31abafb70e42_07909389',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c31abafb70e42_07909389')) {function content_5c31abafb70e42_07909389($_smarty_tpl) {?>

<?php if (!function_exists('smarty_template_function_generateslider')) {
    function smarty_template_function_generateslider($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['generateslider']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<!-- StorefrontSlider-->
<?php if ($_smarty_tpl->tpl_vars['data']->value!='') {?>





<?php  $_smarty_tpl->tpl_vars['slider'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slider']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slider']->key => $_smarty_tpl->tpl_vars['slider']->value) {
$_smarty_tpl->tpl_vars['slider']->_loop = true;
?>

<?php if ((in_array($_smarty_tpl->tpl_vars['id_category']->value,$_smarty_tpl->tpl_vars['slider']->value['display_cat'])&&$_smarty_tpl->tpl_vars['page']->value['page_name']=='category'&&$_smarty_tpl->tpl_vars['slider']->value['status']>0)||(isset($_smarty_tpl->tpl_vars['slider']->value['home_visible'])&&$_smarty_tpl->tpl_vars['page']->value['page_name']=='index'&&$_smarty_tpl->tpl_vars['slider']->value['status']>0)||(isset($_smarty_tpl->tpl_vars['slider']->value['display_custom_hook'])&&$_smarty_tpl->tpl_vars['slider']->value['display_custom_hook']=='1'&&$_smarty_tpl->tpl_vars['slider']->value['status']>0)) {?>
<style>
/* COLOURS */
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_l {
  background-image: linear-gradient(to top, rgba(<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['maincolor_rgb'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
, 0.7), rgba(255, 255, 255, 0)) !important;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_counterbtn_a {
  background: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['color1'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 none repeat scroll 0 0 !important;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_counter {
  color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['color1'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 !important;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_counterimg path {
  fill: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['color1'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_counterbtn_a {
  color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['color2'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 !important;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_lh {
  color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['color3'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 !important;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_sl {
  background-color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['color4'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 !important;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_slr{
  margin-top: -15px;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_slr_item_name {
  color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['color5'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 ;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_slr_item_discount {
  color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['color6'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 !important;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_slr_item_extra {
  color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['color7'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 !important;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_slr_item_extra2 {
  color: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['color8'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
 !important;
}

/*colorfill*/
.deal_slr_item_ii > div {
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    background-size: 200px 200px;
}
.deal_slr_item_ii > img {
  max-width: 90%;
}

<?php if ($_smarty_tpl->tpl_vars['slider']->value['rounded']) {?>
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .left_deal_w, #dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_slr_item_ii {
  border-radius: 8px;
}
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_counterbtn_a {
  border-radius: 4px;
}
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['slider']->value['margin']>21) {?>
#dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 .deal_slr_item {
  margin-right: <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['margin'],"html",'UTF-8')-20, ENT_QUOTES, 'UTF-8');?>
px;
}
<?php }?>

.deal_slr_item_ii {
  webkit-box-shadow: -4px 7px 28px -7px rgba(0,0,0,0.0075);
  -moz-box-shadow: -4px 7px 28px -7px rgba(0,0,0,0.0075);
  box-shadow: -4px 7px 28px -7px rgba(0,0,0,0.0075);
}
</style>
<div id="dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
" class="" data-slider="">
<div class="container" <?php if ($_smarty_tpl->tpl_vars['page']->value['page_name']=='index') {?>style="padding-left:1px;padding-right:1px;"<?php }?>>
<div class="row">
<div class="<?php if ($_smarty_tpl->tpl_vars['dealsofthedaypro_hookposition']->value!='contenttop'||$_smarty_tpl->tpl_vars['page']->value['page_name']=='index') {?>col-md-12<?php }?>">
  
    <div class="full_deal">
    <div class="left_deal">
      <div class="left_deal_w">
        <div class="deal_l">
          <div class="deal_lv">
            <h2 class="deal_lh"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['maintext'],"html",'UTF-8'), ENT_QUOTES, 'UTF-8');?>
</h2>
            <?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['slider']->value['exp_date'], $tmp)>0) {?>
            <div class="deal_counter"><div id="dealscount<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
"><span></span></div>
            <script>
            // Set the date we're counting down to
            var countDownDate<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 = new Date("<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['exp_date'],"html",'UTF-8'), ENT_QUOTES, 'UTF-8');?>
").getTime(); //31 March 17 21:43:00
            //console.log(countDownDate<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
);
            //correct date format Jan 5, 2018 15:37:25
              // Update the count down every 1 second
              var x<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 = setInterval(function() {

                  // get client's current date
                  var now = new Date().getTime();
                  // better get date to utc
                  var date = new Date();
                  var utc = date.getTime() + (date.getTimezoneOffset() * 60000);

                  // Find the distance between now an the count down date
                  //var distance = countDownDate - now;
                  var demo = 2;
                  //console.log(countDownDate<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
); // 1536841282000
                  var distance<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 = countDownDate<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 - utc;
                  //console.log('distance= '+distance);
                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 % (1000 * 60)) / 1000);
                  //console.log(days);
                  if (demo == '1') {
                    days = Math.abs(days);
                    hours = Math.abs(hours);
                    minutes = Math.abs(minutes);
                    seconds = Math.abs(seconds);
                    if (days > 2) {
                      days = 1;
                    }
                  }
                  // Output the result in an element with id="dealscount"
                  document.getElementById("dealscount<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
").innerHTML = days + "d " + hours + "h "
                  + minutes + "m " + seconds + "s ";

                  // If the count down is over, write some text
                  //console.log(seconds);
                  //console.log(distance<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
);
                  if ((distance<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 < 0 && demo != 1) || isNaN(distance<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
)) {
                      clearInterval(x<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
);
                      document.getElementById("dealscount<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
").innerHTML = " ";
                  }
              }, 1000);
              </script>
            </div>
            <?php }?>
            <?php if (preg_match_all('/[^\s]/u',$_smarty_tpl->tpl_vars['slider']->value['btntext'], $tmp)>0) {?>
            <div class="deal_counterbtn">
              <a class="deal_counterbtn_a" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['btnlink'],"html",'UTF-8'), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['slider']->value['btntext'],"html",'UTF-8'), ENT_QUOTES, 'UTF-8');?>
</a>
            </div>
            <?php }?>
          </div>
        </div>
        <div class="deal_sl">
        <div class="deal_slr">
              <?php if (!$_smarty_tpl->tpl_vars['slider']->value['offslider']&&count($_smarty_tpl->tpl_vars['slider']->value['products'])>3) {?>
              <script>
              function DeferedJQuery<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
() {
                  //Do stuff with jQuery
                  //jQuery(document).ready(function($){
                  <?php if ($_smarty_tpl->tpl_vars['slider']->value['slideshow']==1) {?>
                  var autostart = true;
                  <?php } else { ?>
                  var autostart = false;
                  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['slider']->value['margin']>5) {?>
                  var margin = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['margin'], ENT_QUOTES, 'UTF-8');?>
;
                  <?php } else { ?>
                  var margin = 5;
                  <?php }?>
              		//console.log(margin);
              		$('.deal_prevb').show();
              		$('.deal_nextb').show();
              		//console.log("slider<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
 enabled");
              		$(".bxslider<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
").bxSlider({
              	    minSlides: 3,
              	    maxSlides: 7,
              	    nextSelector: '.deal_nextbsvg<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
',
              	    prevSelector: '.deal_prevbsvg<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
',
              	    nextText: '>', //→
              	    prevText: '<', //←
              	    pager: false,
              	    easing: 'swing', //'ease-in-out', //'linear', http://gsgd.co.uk/sandbox/jquery/easing/
              	    //randomStart: true,
              	    //slideWidth: 232,
              	    //mode: 'fade',
              	    infiniteLoop: true,
              	    slideMargin: margin,
              			auto: autostart,
                    captions: false,
                    //ticker: true,
                    responsive: true,
              	  });
                  //});
              }

              function defer(method) {
                  if (window.jQuery) {
                      //DeferedJQuery<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
();
                      method();
                  } else {
                      setTimeout(function() { defer(method) }, 500);
                  }
              }

              defer(function () {
                  //console.log("jQuery is now loaded");
                  DeferedJQuery<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
();
              });
              </script>
              <div id="deal_prev_button" class="deal_prev" onclick="document.getElementById('dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
').getElementsByClassName('bx-prev')[0].click()"><div class="deal_prevb" style="display:none;">
                <svg width="14.6" height="24" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="deal_prevbsvg<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
"><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#fff" class="deal_prevbsvgpath"/></svg>
              </div></div>
              <div id="deal_next_button" class="deal_next" onclick="document.getElementById('dealsofthedaypro<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
').getElementsByClassName('bx-next')[0].click()"><div class="deal_nextb" style="display:none;">
                <svg width="14.6" height="24" viewBox="0 0 16 27" xmlns="http://www.w3.org/2000/svg" class="deal_nextbsvg<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
" ><path d="M16 23.207L6.11 13.161 16 3.093 12.955 0 0 13.161l12.955 13.161z" fill="#fff" class="deal_nextbsvgpath"/></svg>
              </div></div>
              <?php }?>
            <div id="slider<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
">
            <ul class="bxslider<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slider']->value['id_displaydealsofthedaypro_sliders'], ENT_QUOTES, 'UTF-8');?>
">
            <?php  $_smarty_tpl->tpl_vars['catitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['catitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['catitem']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['catitem']->key => $_smarty_tpl->tpl_vars['catitem']->value) {
$_smarty_tpl->tpl_vars['catitem']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['catitem']['iteration']++;
?>
            <?php $_smarty_tpl->tpl_vars["counter"] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['foreach']['catitem']['iteration'], null, 0);?>
                <?php if (isset($_smarty_tpl->tpl_vars['catitem']->value['name'])&&$_smarty_tpl->tpl_vars['catitem']->value['active']=='1') {?>
                <li class="deal_slr_item" style="max-width:216px;"><div class="deal_slr_item">
                    <a title="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['catitem']->value['name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" class="deal_slr_item_a" href="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['catitem']->value['plink'],"html",'UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
                      <div class="deal_slr_item_i" style="height:200px;">
                          <div class="deal_slr_item_ii" style="height:200px;width:200px;" >
                          <img class="deal_slr_item_image" src="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['catitem']->value['link_rewrite'],$_smarty_tpl->tpl_vars['catitem']->value['id_image'],'home_default'),'html'), ENT_QUOTES, 'UTF-8');?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeSize']->value['height'], ENT_QUOTES, 'UTF-8');?>
" width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['homeSize']->value['width'], ENT_QUOTES, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['catitem']->value['name'],'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
" colorify-get<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['catitem']['iteration'], ENT_QUOTES, 'UTF-8');?>
 cid="colorify-get<?php echo htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['foreach']['catitem']['iteration'], ENT_QUOTES, 'UTF-8');?>
" />
                      </div>
                      </div>
                      
                      <div class="deal_slr_item_name"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->tpl_vars['catitem']->value['name'],'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</div>
                      <div class="deal_slr_item_discount">
                        <?php if (!isset($_smarty_tpl->tpl_vars['catitem']) || !is_array($_smarty_tpl->tpl_vars['catitem']->value)) $_smarty_tpl->createLocalArrayVariable('catitem');
if ($_smarty_tpl->tpl_vars['catitem']->value['show_price'] = 1&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
                        <?php if (isset($_smarty_tpl->tpl_vars['catitem']->value['productPrice'])&&isset($_smarty_tpl->tpl_vars['catitem']->value['productPriceWithoutReduction'])) {?>
                        <!--start price default data-->
                        <?php if ($_smarty_tpl->tpl_vars['catitem']->value['specificPrice']) {?>
                        <span id="reduction_percents" <?php if ($_smarty_tpl->tpl_vars['catitem']->value['productPriceWithoutReduction']<=0||!$_smarty_tpl->tpl_vars['catitem']->value['specificPrice']||$_smarty_tpl->tpl_vars['catitem']->value['specificPrice']['reduction_type']!='percentage') {?> style="display:none;"<?php }?>><?php if ($_smarty_tpl->tpl_vars['catitem']->value['specificPrice']&&$_smarty_tpl->tpl_vars['catitem']->value['specificPrice']['reduction_type']=='percentage') {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['catitem']->value['specificPrice']['reduction']*$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape(100,'htmlall','UTF-8'), ENT_QUOTES, 'UTF-8');?>
<?php echo smartyTranslate(array('s'=>'% Off','mod'=>'dealsofthedaypro'),$_smarty_tpl);?>
<?php }?></span>
        								<span id="reduction_amounts" <?php if ($_smarty_tpl->tpl_vars['catitem']->value['productPriceWithoutReduction']<=0||!$_smarty_tpl->tpl_vars['catitem']->value['specificPrice']||$_smarty_tpl->tpl_vars['catitem']->value['specificPrice']['reduction_type']!='amount'||floatval($_smarty_tpl->tpl_vars['catitem']->value['specificPrice']['reduction'])==0) {?> style="display:none"<?php }?>><?php if ($_smarty_tpl->tpl_vars['catitem']->value['specificPrice']&&$_smarty_tpl->tpl_vars['catitem']->value['specificPrice']['reduction_type']=='amount'&&floatval($_smarty_tpl->tpl_vars['catitem']->value['specificPrice']['reduction'])!=0) {?>-<?php echo htmlspecialchars(Tools::displayPrice($_smarty_tpl->tpl_vars['catitem']->value['productPriceWithoutReduction']-$_smarty_tpl->tpl_vars['catitem']->value['productPrice']), ENT_QUOTES, 'UTF-8');?>
<?php echo smartyTranslate(array('s'=>' Off','mod'=>'dealsofthedaypro'),$_smarty_tpl);?>
<?php }?></span>
                        <?php } else { ?>
                        <?php echo htmlspecialchars(Tools::displayPrice($_smarty_tpl->tpl_vars['catitem']->value['price']), ENT_QUOTES, 'UTF-8');?>

                        
                        <?php }?>
                        <!--end price default data-->
                        <?php }?>
                        <?php }?>


                      </div>
                      <div class="deal_slr_item_extra">
                        <?php if ($_smarty_tpl->tpl_vars['slider']->value['showcase']==01&&isset($_smarty_tpl->tpl_vars['catitem']->value['manufacturer_name'])) {?>
                            <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['catitem']->value['manufacturer_name']),53,''),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>

                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['slider']->value['showcase']==02&&isset($_smarty_tpl->tpl_vars['catitem']->value['supplier_name'])) {?>
                            <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['catitem']->value['supplier_name']),53,''),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>

                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['slider']->value['showcase']==03&&isset($_smarty_tpl->tpl_vars['catitem']->value['categorydefault'])) {?>
                            <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['catitem']->value['categorydefault']),53,''),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>

                        <?php }?>
                      </div>
                      <div class="deal_slr_item_extra2"><?php if (isset($_smarty_tpl->tpl_vars['catitem']->value['description_short'])&&$_smarty_tpl->tpl_vars['slider']->value['description']) {?><p><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['escape'][0][0]->smartyEscape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['catitem']->value['description_short']),53,'...'),'html','UTF-8'), ENT_QUOTES, 'UTF-8');?>
</p>
                      <?php } else { ?><p><br /></p><?php }?></div>
                    </a>
                </div>
                </li>
                <?php }?>
            <?php } ?>
            </ul></div>
        </div>
        </div>
</div></div>
<div class="right_deal"></div>
</div>
</div></div></div></div>
<?php }?>
<?php } ?>
<?php }?>
<!-- StorefrontSlider -->
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if ($_smarty_tpl->tpl_vars['sliders']->value!='') {?>
<?php smarty_template_function_generateslider($_smarty_tpl,array('data'=>$_smarty_tpl->tpl_vars['sliders']->value));?>

<?php }?>
<?php }} ?>
