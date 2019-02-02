<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

$time = time();
$installed = cp_get_option('cp-date-installed', 0);
$level = cp_get_option('cp-share-displayed', 1);

switch ($level) {
    case 1:
        $time = $time-60*60*24*14;
        $odds = 100;
        break;

    case 2:
        $time = $time-60*60*24*30*2;
        $odds = 200;
        break;

    case 3:
        $time = $time-60*60*24*30*6;
        $odds = 300;
        break;

    default:
        $time = $time-60*60*24*30*6;
        $odds = 1000;
        break;
}

if ($installed && $time > $installed) {
    if (mt_rand(1, $odds) == 3) {
        cp_update_option('cp-share-displayed', ++$level);
        ?>
        <div class="cp-overlay" data-manualclose="true"></div>
        <div id="cp-share-template" class="cp-modal cp-box">
            <h3>
                <?php cp_e('Enjoy using Creative Popup?') ?>
                <a href="#" class="dashicons dashicons-no-alt"></a>
            </h3>
            <div class="inner desc">
                <?php cp_e("If so, please consider recommending it to your friends on your favorite social network!"); ?>
            </div>
            <div class="inner">
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://addons.prestashop.com/en/sliders-galleries/19062-layer-slider-responsive-slideshow.html" target="_blank">
                    <i class="dashicons dashicons-facebook-alt"></i> <?php cp_e('Share') ?>
                </a>

                <a href="http://www.twitter.com/share?url=https%3A%2F%2Faddons.prestashop.com%2Fen%2Fsliders-galleries%2F19062-layer-slider-responsive-slideshow.html&amp;text=Check%20out%20LayerSlider%2C%20an%20awesome%20%23slider%20%23module%20for%20%23PrestaShop&amp;via=WebshopWorks" target="_blank">
                    <i class="dashicons dashicons-twitter"></i> <?php cp_e('Tweet') ?>
                </a>

                <a href="https://plus.google.com/share?url=https://addons.prestashop.com/en/sliders-galleries/19062-layer-slider-responsive-slideshow.html" target="_blank">
                    <i class="dashicons dashicons-googleplus"></i> +1
                </a>
            </div>
        </div>
        <?php
    }
}
