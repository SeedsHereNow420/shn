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
<script type="text/html" id="cp-layer-item-template">
    <li>
        <span class="cp-sublayer-sortable-handle dashicons dashicons-menu"></span>
        <span class="cp-sublayer-controls">
            <span class="cp-icon-eye dashicons dashicons-visibility" data-help="<?php cp_e('Toggle layer visibility.') ?>"></span>
            <span class="cp-icon-lock dashicons dashicons-lock disabled" data-help="<?php cp_e('Prevent layer dragging in the editor.') ?>"></span>
        </span>
        <div class="cp-sublayer-thumb"></div>
        <input type="text" name="subtitle" class="cp-sublayer-title" value="<?php echo sprintf(cp__('Layer #%d'), '1') ?>">
        <a href="#" title="<?php cp_e('Duplicate this layer') ?>" class="dashicons dashicons-admin-page duplicate"></a>
        <a href="#" title="<?php cp_e('Remove this layer') ?>" class="dashicons dashicons-trash remove"></a>
    </li>
</script>
