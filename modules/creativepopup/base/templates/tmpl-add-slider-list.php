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
<script type="text/html" id="tmpl-cp-add-slider-list">
    <form method="post" id="cp-add-slider-template-list" name="addNew" class="cp-pointer cp-box cp-window">
        <input type="hidden" name="cp-add-new-popup" value="1">
        <h3 class="header">
            <?php cp_e('Name your new popup') ?>
            <i class="cp-close dashicons dashicons-no-alt"></i>
        </h3>
        <div class="inner">
            <label><?php cp_e('Popup name:') ?></label><br>
            <input type="text" name="title" placeholder="<?php cp_e('e.g. Homepage popup') ?>">
            <span><?php cp_e("Internal only. This won't be shown to customers.") ?></span>
        </div>
        <div class="footer">
            <button class="button cp-green-button"><?php cp_e('Create Popup') ?></button>
        </div>
    </form>
</script>
<script type="text/html" id="tmpl-cp-addons-connect">
    <div id="cp-addons-connect" class="cp-pointer cp-box cp-window">
        <h3 class="header">
            <?php cp_e('Choose a start template') ?>
            <i class="cp-close dashicons dashicons-no-alt"></i>
        </h3>
        <div class="inner">
            <p><?php cp_e("Premium start templates are only available after you connected your site with PrestaShop's marketplace.") ?></p>
            <a href="https://www.youtube.com/watch?v=SLFFWyY2NYM" target="_blank"><?php cp_e('Check this video for more details.') ?></a>
        </div>
        <div class="footer">
            <a href="javascript:;" class="cp-add-empty"><?php cp_e('Start with empty') ?></a>
            <button class="button cp-green-button" id="btn-connect-ps"><?php cp_e('Connect to PrestaShop Addons') ?></button>
        </div>
    </div>
</script>
<script type="text/html" id="tmpl-cp-choose-template">
    <div id="cp-choose-template" class="cp-pointer cp-box cp-window">
        <h3 class="header">
            <?php cp_e('Choose a start template') ?>
            <i class="cp-close dashicons dashicons-no-alt"></i>
        </h3>
    </div>
</script>