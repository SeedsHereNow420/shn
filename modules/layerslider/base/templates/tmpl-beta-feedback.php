<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

if (strpos(LS_PLUGIN_VERSION, 'b') !== false) : ?>
    <div class="ls-version-number">
        <?php echo sprintf(ls__('Using beta version (%s)', 'LayerSlider'), LS_PLUGIN_VERSION) ?>
        <a href="mailto:info@webshopworks.com?subject=LayerSlider PS (v<?php echo LS_PLUGIN_VERSION ?>) Feedback"><?php ls_e('Send feedback', 'LayerSlider') ?></a>
    </div>
    <?php
endif;
