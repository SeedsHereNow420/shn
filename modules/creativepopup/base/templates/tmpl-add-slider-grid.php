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
<script type="text/html" id="tmpl-cp-add-slider-grid">
    <form method="post" id="cp-add-slider-template" class="preview">
        <input type="hidden" name="cp-add-new-popup" value="1">
        <h3><?php cp_e('Name your new popup') ?></h3>
        <div class="inner">
            <input type="text" name="title" placeholder="<?php cp_e('e.g. Homepage popup') ?>">
            <button class="button button-primary">
                <?php cp_e('Add popup') ?>
                <i class="dashicons dashicons-arrow-right-alt"></i>
            </button>
        </div>
    </form>
</script>