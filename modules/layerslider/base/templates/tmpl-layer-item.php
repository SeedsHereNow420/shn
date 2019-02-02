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
<script type="text/html" id="ls-layer-item-template">
    <li>
        <span class="ls-sublayer-sortable-handle dashicons dashicons-menu"></span>
        <span class="ls-sublayer-controls">
            <span class="ls-icon-eye dashicons dashicons-visibility" data-help="<?php ls_e('Toggle layer visibility.', 'LayerSlider') ?>"></span>
            <span class="ls-icon-lock dashicons dashicons-lock disabled" data-help="<?php ls_e('Prevent layer dragging in the editor.', 'LayerSlider') ?>"></span>
        </span>
        <div class="ls-sublayer-thumb"></div>
        <input type="text" name="subtitle" class="ls-sublayer-title" value="<?php echo sprintf(ls__('Layer #%d', 'LayerSlider'), '1') ?>">
        <a href="#" title="<?php ls_e('Duplicate this layer', 'LayerSlider') ?>" class="dashicons dashicons-admin-page duplicate"></a>
        <a href="#" title="<?php ls_e('Remove this layer', 'LayerSlider') ?>" class="dashicons dashicons-trash remove"></a>
    </li>
</script>
