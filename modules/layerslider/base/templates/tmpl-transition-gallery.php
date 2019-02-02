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
<script type="text/html" id="tmpl-ls-transition-modal">
    <div id="ls-transition-window">
        <header>
            <h1><?php ls_e('Choose a slide transition to import', 'LayerSlider') ?></h1>
            <b class="dashicons dashicons-no"></b>
            <div id="transitionmenu" class="filters buildermenu">
                <span><?php ls_e('Show Transitions:', 'LayerSlider') ?></span>
                <ul>
                    <li class="active"><?php ls_e('2D', 'LayerSlider') ?></li>
                    <li><?php ls_e('3D', 'LayerSlider') ?></li>
                </ul>
            </div>
        </header>
        <div class="km-ui-modal-scrollable inner">
            <div id="ls-transitions-list">

                <!-- 2D -->
                <section data-tr-type="2d_transitions"></section>

                <!-- 3D -->
                <section data-tr-type="3d_transitions"></section>
            </div>
        </div>
    </div>
</script>