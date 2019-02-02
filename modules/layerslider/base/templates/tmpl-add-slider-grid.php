<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;
?>
<script type="text/html" id="tmpl-ls-add-slider-grid">
    <form method="post" id="ls-add-slider-template" class="preview">
        <?php ls_nonce_field('add-slider'); ?>
        <input type="hidden" name="ls-add-new-slider" value="1">
        <h3><?php ls_e('Name your new slider', 'LayerSlider') ?></h3>
        <div class="inner">
            <input type="text" name="title" placeholder="<?php ls_e('e.g. Homepage slider', 'LayerSlider') ?>">
            <button class="button button-primary">
                <?php ls_e('Add slider', 'LayerSlider') ?>
                <i class="dashicons dashicons-arrow-right-alt"></i>
            </button>
        </div>
    </form>
</script>