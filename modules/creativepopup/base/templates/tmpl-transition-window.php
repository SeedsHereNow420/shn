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
            <h1><?php cp_e('Select page transitions') ?></h1>
            <b class="dashicons dashicons-no"></b>
            <div id="tryorigami"></div>
            <div id="transitionmenu" class="filters">
                <span><?php cp_e('Show transitions:') ?></span>
                <ul>
                    <li class="active"><?php cp_e('2D') ?></li>
                    <li><?php cp_e('3D') ?></li>
                    <li><?php cp_e('Custom 2D &amp; 3D') ?></li>
                    <li><?php cp_e('Special Effects') ?></li>
                </ul>
                <i><?php cp_e('Apply to others') ?></i>
                <i class="off"><?php cp_e('Select all') ?></i>
            </div>
        </header>
        <div class="km-ui-modal-scrollable inner">
            <div id="cp-transitions-list">

                <!-- 2D -->
                <section data-tr-type="2d_transitions">
                    <div></div>
                </section>

                <!-- 3D -->
                <section data-tr-type="3d_transitions">
                    <div></div>
                </section>

                <!-- Custom 2D -->
                <section data-tr-type="custom_2d_transitions">
                    <h4><?php cp_e('Custom 2D transitions') ?></h4>
                    <div>
                        <p><?php cp_e("You haven't created any custom 2D transitions yet.") ?></p>
                    </div>
                </section>

                <!-- Custom 3D -->
                <section data-tr-type="custom_3d_transitions">
                    <h4><?php cp_e('Custom 3D transitions') ?></h4>
                    <div>
                        <p><?php cp_e("You haven't created any custom 3D transitions yet.") ?></p>
                    </div>
                </section>

                <!-- Special Effects -->
                <section data-tr-type="special_effects" id="cp-special-effects">

                <p class="cp-description">
                    <small>
                        <?php cp_e('Special effects are like regular page transitions and they work in the same way. You can set them on each page individually. Mixing them with other transitions on other pages is perfectly fine. You can also apply them on all of your pages at once by pressing the "Apply to others" button above. In case of 3D special effects, selecting additional 2D transitions can ensure backward compatibility for older browsers.') ?>
                    </small>
                </p>

                    <div class="separated">

                        <table>
                            <tr>
                                <td>
                                    <h4><?php cp_e('Origami transition') ?></h4>
                                </td>
                                <td rowspan="2">
                                    <p>
                                        <?php cp_e('Share your gorgeous photos with the world or your loved ones in a truly inspirational way and create popups with stunning effects with Origami.') ?>
                                    </p>
                                    <small>
                                        <?php cp_e('Origami is a form of 3D transition and it works in the same way as regular page transitions do. Besides Internet Explorer, Origami works in all the modern browsers (including Edge).') ?>
                                    </small>
                                </td>
                            </tr>
                            <tr>
                                <td class="center">
                                    <div class="cp-select-special-transition" data-name="transitionorigami">
                                        <span class="dashicons dashicons-yes"></span>
                                        <?php cp_e('Use it on this page') ?>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>

                    <div class="separated cp-future">
                        <h4><?php cp_e('More effects are coming soon') ?></h4>
                    </div>

                </section>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="tmpl-cp-layer-presets">
    <h3 class="header">
        <b class="cp-close dashicons dashicons-no-alt"></b>
    </h3>
    <div class="cp-side-menu">
        <a class="cp-menu-heading">Choose preset</a>
    </div>
    <div class="cp-right-side">
        <div class="cp-container" style="height: 357px;"></div>
        <div class="footer">
            <button id="cp-choose-tr" class="button cp-green-button"><?php cp_e('Choose') ?></button>
        </div>
    </div>
</script>

<script src="<?php echo CP_VIEWS_URL.'js/admin/cp-layer-presets.js' ?>"></script>