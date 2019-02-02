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
<script type="text/html" id="tmpl-ls-add-slider-list">
    <form method="post" id="ls-add-slider-template-list" class="ls-pointer ls-box">
        <?php ls_nonce_field('add-slider'); ?>
        <input type="hidden" name="ls-add-new-slider" value="1">
        <span class="ls-mce-arrow"></span>
        <h3 class="header"><?php ls_e('Name your new slider', 'LayerSlider') ?></h3>
        <div class="inner">
            <input type="text" name="title" placeholder="<?php ls_e('e.g. Homepage slider', 'LayerSlider') ?>">
            <button class="button"><?php ls_e('Add slider', 'LayerSlider') ?></button>
        </div>
    </form>
</script>