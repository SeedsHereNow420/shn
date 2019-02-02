<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Update notice
if (strpos($_SERVER['REQUEST_URI'], '?page=layerslider') !== false) {
    ls_add_action('admin_notices', 'layerslider_dependency_notice');
}

function layerslider_dependency_notice()
{
    if (version_compare(PHP_VERSION, '5.3.0', '<') || !class_exists('DOMDocument')) {
        ?>
        <div class="layerslider_notice">
            <img src="<?php echo LS_VIEWS_URL.'img/admin/ls_80x80.png' ?>" alt="LayerSlider icon">
            <h1><?php ls_e('Server configuration issues detected!', 'LayerSlider') ?></h1>
            <p>
                <?php ls_e('phpQuery, an external library in LayerSlider, have unmet dependencies. It requires PHP5 with the following extensions installed: PHP DOM extension, PHP Multibyte String extension. Please contact with your hosting provider to resolve these dependencies, as it will likely prevent LayerSlider from functioning properly.', 'LayerSlider') ?>
                <strong><?php ls_e('This issue could result a blank page in slider builder.', 'LayerSlider') ?></strong>
            </p>
            <div class="clear"></div>
        </div>
        <?php
    }
}
