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
<script type="text/html" id="tmpl-cp-transition-modal">
    <div id="cp-transition-window">
        <header>
            <h1><?php cp_e('Choose a page transition to import') ?></h1>
            <b class="dashicons dashicons-no"></b>
            <div id="transitionmenu" class="filters buildermenu">
                <span><?php cp_e('Show Transitions:') ?></span>
                <ul>
                    <li class="active"><?php cp_e('2D') ?></li>
                    <li><?php cp_e('3D') ?></li>
                </ul>
            </div>
        </header>
        <div class="km-ui-modal-scrollable inner">
            <div id="cp-transitions-list">

                <!-- 2D -->
                <section data-tr-type="2d_transitions"></section>

                <!-- 3D -->
                <section data-tr-type="3d_transitions"></section>
            </div>
        </div>
    </div>
</script>