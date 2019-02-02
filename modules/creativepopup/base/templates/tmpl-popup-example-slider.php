<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;
?>
<script type="text/html" id="tmpl-popup-example-slider">
    <div class="cp-slide" data-cp="overflow:true;kenburnsscale:1.2;">
        <img width="1500" height="1000" src="<?php echo CP_VIEWS_URL ?>/img/admin/popup-example-bg.jpg" class="cp-l"  style="left:0px;top:11px;width:100%;height:100%;border-radius:20px;" data-cp="offsetyin:-100;durationin:1500;easingin:easeOutQuint;rotatein:3;rotatexin:10;parallax:true;parallaxlevel:2;rotation:3;">
        <img width="330" height="459" src="<?php echo CP_VIEWS_URL ?>/img/admin/popup-example-slidy.png" class="cp-l" style="top:170px;left:34px;width:231px;height:321px;" data-cp="offsetxin:-50lw;delayin:400;easingin:easeOutBack;skewxin:10;offsetxout:-50;parallax:true;parallaxlevel:-8;parallaxdistance:15;">
        <div style="top:154px;left:232px;width:25px;height:25px;border-radius:100%;background:#ffffff;border-right:3px solid rgba(0,0,0,.3);border-bottom:3px solid rgba(0,0,0,.3);border-left:3px solid rgba(0,0,0,.3);border-top:3px solid rgba(0,0,0,.3);font-size:9px;" class="cp-l" data-cp="offsetxin:-40;offsetyin:20;delayin:750;easingin:easeOutQuint;scalexin:.5;scaleyin:.5;parallax:true;parallaxlevel:-6;"></div>
        <div style="box-shadow: 0 10px 50px rgba(0,0,0,.3);top:0px;left:266px;width:426px;height:237px;border-radius:100%;background:#ffffff;border-right:3px solid rgba(0,0,0,.5);border-top:3px solid rgba(0,0,0,.5);border-bottom:3px solid rgba(0,0,0,.5);border-left:3px solid rgba(0,0,0,.5);font-size:9px;" class="cp-l" data-cp="offsetxin:-40;offsetyin:20;delayin:1000;easingin:easeOutQuint;scalexin:.8;scaleyin:.8;transformoriginin:0% 50% 0;parallax:true;parallaxlevel:-4;rotation:-5;"></div>
        <p style="white-space: normal;top:27px;left:308px;text-align:center;font-family:Pacifico;color:#777;font-size:42px;width:349px;" class="cp-l" data-cp="durationin:1;rotatein:-3;rotateyin:8;offsetxout:-0;rotateout:-3;rotateyout:-8;scalexout:0.5;scaleyout:0.5;texttransitionin:true;texttypein:chars_asc;textshiftin:25;textoffsetyin:random(-10,10);texteasingin:easeOutElastic;textstartatin:transitioninend + 1500;textrotateyin:90;parallax:true;parallaxlevel:-4;rotation:-5;rotationY:-8;"><?php cp_e('Your popup will appear here!') ?></p>
        <p style="white-space: normal;top:280px;left:251px;text-align:right;font-family:Pacifico;color:#555555;font-size:23px;width:400px;" class="cp-l" data-cp="durationin:1;rotatein:-3;rotateyin:8;offsetxout:-0;rotateout:-3;rotateyout:-8;scalexout:0.5;scaleyout:0.5;texttransitionin:true;texttypein:words_rand;textshiftin:20;textoffsetxin:random(-10,10);textoffsetyin:random(-10,10);textdurationin:1500;texteasingin:easeOutElastic;textstartatin:transitioninend + 2500;textrotatein:random(2,-2);parallax:true;parallaxlevel:2;rotation:3;"><?php cp_e('Since you have an empty popup, we’re showing you this for preview purposes. Start adding content to this popup and the preview feature will display your actual work instead of this message.') ?></p>
    </div>
</script>
