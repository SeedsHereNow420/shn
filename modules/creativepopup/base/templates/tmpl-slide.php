<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

if (defined('CP_INCLUDE')) {
    $cpDefaults = null;
}
?>
<div class="cp-box cp-layer-box active">
    <input type="hidden" name="layerkey" value="0">
    <table>
        <thead class="cp-layer-options-thead">
            <tr>
                <td colspan="4">
                    <i class="dashicons dashicons-welcome-write-blog"></i>
                    <h4><?php cp_e('Page Options') ?>
                        <button type="button" class="button cp-layer-duplicate"><span class="dashicons dashicons-admin-page"></span><?php cp_e('Duplicate Page') ?></button>
                    </h4>
                </td>
            </tr>
        </thead>
        <tbody class="cp-slide-options">
            <input type="hidden" name="post_offset" value="-1">
            <input type="hidden" name="3d_transitions">
            <input type="hidden" name="2d_transitions">
            <input type="hidden" name="custom_3d_transitions">
            <input type="hidden" name="custom_2d_transitions">
            <tr>
                <td class="slide-image">
                    <h3 class="subheader"><?php cp_e('page background image') ?></h3>
                    <div class="inner">
                        <div class="float">
                            <input type="hidden" name="backgroundId">
                            <input type="hidden" name="background">
                            <div class="cp-image cp-upload cp-bulk-upload cp-slide-image not-set" data-l10n-set="<?php cp_e('Click to set') ?>" data-l10n-change="<?php cp_e('Click to change') ?>" data-help="<?php echo $cpDefaults['slides']['image']['tooltip'] ?>">
                                <div><img src="<?php echo CP_VIEWS_URL.'img/admin/blank.gif' ?>" alt=""></div>
                                <a href="#" class="aviary dashicons dashicons-image-crop"></a>
                                <a href="#" class="dashicons dashicons-dismiss"></a>
                            </div>
                            <span class="indent">
                                <?php cp_e('or') ?> <a href="#" class="cp-url-prompt"><?php cp_e('enter URL') ?></a>
                                | <a href="#" class="cp-post-image"><?php cp_e('use product img') ?></a>
                            </span>
                        </div>
                        <div class="float">
                            <div class="row-helper">
                                <?php echo $cpDefaults['slides']['imageSize']['name'] ?>
                                <?php cp_get_select($cpDefaults['slides']['imageSize'], null, array('class' => 'slideprop')) ?>
                            </div>
                            <div class="row-helper">
                                <?php echo $cpDefaults['slides']['imagePosition']['name'] ?>
                                <?php cp_get_select($cpDefaults['slides']['imagePosition'], null, array('class' => 'slideprop')) ?>
                            </div>
                            <div class="row-helper">
                                <?php echo $cpDefaults['slides']['imageColor']['name'] ?>
                                <?php cp_get_input($cpDefaults['slides']['imageColor'], null, array('class' => 'slideprop cp-colorpicker')) ?>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="slide-thumb">
                    <h3 class="subheader"><?php cp_e('Page Thumbnail') ?></h3>
                    <div class="inner">
                        <input type="hidden" name="thumbnailId">
                        <input type="hidden" name="thumbnail">
                        <div class="cp-image cp-upload cp-slide-thumbnail not-set" data-l10n-set="<?php cp_e('Click to set') ?>" data-l10n-change="<?php cp_e('Click to change') ?>" data-help="<?php echo $cpDefaults['slides']['thumbnail']['tooltip'] ?>">
                            <div><img src="<?php echo CP_VIEWS_URL.'img/admin/blank.gif' ?>" alt=""></div>
                            <a href="#" class="aviary dashicons dashicons-image-crop"></a>
                            <a href="#" class="dashicons dashicons-dismiss"></a>
                        </div>
                        <span class="indent">
                            <?php cp_e('or') ?> <a href="#" class="cp-url-prompt"><?php cp_e('enter URL') ?></a> | <a href="#" class="cp-capture-page"><?php cp_e('capture page') ?></a>
                        </span>
                    </div>
                </td>
                <td class="slide-timing">
                    <h3 class="subheader"><?php cp_e('Page Timing') ?></h3>
                    <div class="inner">
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['delay']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['delay'], null, array('class' => 'slideprop')) ?> ms<br>
                        </div>
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['timeshift']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['timeshift'], null, array('class' => 'slideprop')) ?> ms
                        </div>
                    </div>
                </td>
                <td class="slide-transition">
                    <h3 class="subheader"><?php cp_e('Page Transition') ?></h3>
                    <div class="inner">
                        <button type="button" class="button cp-select-transitions new" data-help="<?php cp_e('You can select your desired page transitions by clicking on this button.') ?>">Select transitions</button> <br>
                        <div class="row-helper">
                            <?php cp_get_input($cpDefaults['slides']['transitionDuration'], null, array('class' => 'slideprop')) ?>
                            <span>ms</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="cp-advanced cp-hidden">
                <td class="cp-slide-link">
                    <h3 class="subheader"><?php cp_e('Page Linking') ?></h3>
                    <div class="inner">
                        <div class="row-helper">
                            <?php cp_get_input($cpDefaults['slides']['linkUrl'], null, array('class' => 'slideprop url', 'placeholder' => $cpDefaults['slides']['linkUrl']['name'])) ?>
                            <span><a href="#" class="dyn"><?php cp_e('use product URL') ?></a></span>
                        </div>
                        <div class="row-helper">
                            <?php cp_get_select($cpDefaults['slides']['linkTarget'], null, array('class' => 'slideprop')) ?>
                            <?php cp_get_select($cpDefaults['slides']['linkType'], null, array('class' => 'slideprop')) ?>
                        </div>
                    </div>
                </td>
                <td class="post-options">
                    <h3 class="subheader"></h3>
                    <div class="inner">
                        <button type="button" class="button cp-configure-posts"><span class="dashicons dashicons-admin-post"></span><?php cp_e('Configure<br>dynamic content') ?></button>
                    </div>
                </td>
                <td class="additional-settings">
                    <h3 class="subheader"><?php cp_e('Additional Page Settings') ?></h3>
                    <div class="inner">
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['deeplink']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['deeplink'], null, array('class' => 'slideprop')) ?>
                        </div>
                        <div class="row-helper cp-global-hover">
                            <a href="https://creativepopup.webshopworks.com/global-hover-example-51" target="_blank">
                                <?php echo $cpDefaults['slides']['globalHover']['name'] ?>
                            </a>
                            <?php cp_get_checkbox($cpDefaults['slides']['globalHover'], null, array('class' => 'slideprop')) ?>
                        </div>
                    </div>
                </td>
                <td class="slide-actions">
                    <h3 class="subheader"></h3>
                    <div class="inner">
                        <div class="row-helper">
                            <span>
                                <?php cp_e('Hide this page') ?>
                            </span>
                            <input type="checkbox" name="skip" class="checkbox large slideprop" data-help="<?php cp_e("If you don't want to use this page in your front-page, but you want to keep it, you can hide it with this switch.") ?>">
                        </div>
                        <div class="row-helper">
                            <span>
                                <?php echo $cpDefaults['slides']['overflow']['name'] ?>
                            </span>
                            <?php cp_get_checkbox($cpDefaults['slides']['overflow'], null, array('class' => 'slideprop large')) ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="cp-advanced cp-hidden">
                <td class="slide-ken-burns">
                    <h3 class="subheader"><?php cp_e('Ken Burns Effect') ?></h3>
                    <div class="inner">
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['kenBurnsZoom']['name'] ?>
                            <?php cp_get_select($cpDefaults['slides']['kenBurnsZoom'], null, array('class' => 'slideprop')) ?>
                        </div>
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['kenBurnsScale']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['kenBurnsScale'], null, array('class' => 'slideprop')) ?>
                        </div>
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['kenBurnsRotate']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['kenBurnsRotate'], null, array('class' => 'slideprop')) ?>
                        </div>
                    </div>
                </td>
                <td class="slide-parallax">
                    <h3 class="subheader"></h3>
                    <div class="inner">
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['parallaxType']['name'] ?>
                            <?php cp_get_select($cpDefaults['slides']['parallaxType'], null, array('class' => 'slideprop')) ?>
                        </div>
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['parallaxEvent']['name'] ?>
                            <?php cp_get_select($cpDefaults['slides']['parallaxEvent'], null, array('class' => 'slideprop')) ?>
                        </div>
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['parallaxAxis']['name'] ?>
                            <?php cp_get_select($cpDefaults['slides']['parallaxAxis'], null, array('class' => 'slideprop')) ?>
                        </div>
                    </div>
                </td>
                <td class="slide-parallax">
                    <h3 class="subheader"><?php cp_e('Parallax Defaults') ?></h3>
                    <div class="inner">
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['parallaxTransformOrigin']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['parallaxTransformOrigin'], null, array('class' => 'slideprop')) ?>
                        </div>
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['parallaxDurationMove']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['parallaxDurationMove'], null, array('class' => 'slideprop')) ?>
                        </div>
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['parallaxDurationLeave']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['parallaxDurationLeave'], null, array('class' => 'slideprop')) ?>
                        </div>
                    </div>
                </td>
                <td class="slide-parallax">
                    <h3 class="subheader"></h3>
                    <div class="inner">
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['parallaxDistance']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['parallaxDistance'], null, array('class' => 'slideprop')) ?>
                        </div>
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['parallaxRotate']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['parallaxRotate'], null, array('class' => 'slideprop')) ?>
                        </div>
                        <div class="row-helper">
                            <?php echo $cpDefaults['slides']['parallaxPerspective']['name'] ?>
                            <?php cp_get_input($cpDefaults['slides']['parallaxPerspective'], null, array('class' => 'slideprop')) ?>
                        </div>
                    </div>
                </td>
            </tr>
<!--             <tr class="cp-advanced cp-hidden">
                <td>
                    <h3 class="subheader"><?php cp_e('Filters') ?></h3>
                    <div class="inner">
                        <div class="row-helper">
                            <?php //echo $cpDefaults['slides']['filterFrom']['name'] ?>
                            <?php //cp_get_input($cpDefaults['slides']['filterFrom'], null, array('class' => 'slideprop')) ?>
                        </div>
                        <div class="row-helper">
                            <?php //echo $cpDefaults['slides']['filterTo']['name'] ?>
                            <?php //cp_get_input($cpDefaults['slides']['filterTo'], null, array('class' => 'slideprop')) ?>
                        </div>
                    </div>
                </td>
                <td colspan="3"></td>
            </tr>
 -->        </tbody>
    </table>

    <div id="cp-more-slide-options" class="button">
        <div>
            <strong>
                <?php cp_e('Show More Options') ?>
                <small><?php cp_e('Linking, Ken Burns, Parallax') ?></small>
            </strong>
            <strong><?php cp_e('Show Less Options') ?></strong>
        </div>

    </div>

    <table id="cp-preview-table">
        <thead>
            <tr>
                <td>
                    <i class="dashicons dashicons-editor-video cp-preview-icon"></i>
                    <h4>
                        <span><?php cp_e('Preview') ?></span>
                    </h4>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr id="slider-editor-toolbar">
                <td>
                    <div class="cp-editor-zoom">
                        <!-- <span class="dashicons dashicons-editor-expand cp-layers-icon"></span> -->
                        <div class="cp-editor-slider" ></div>
                        <span class="cp-editor-slider-val">100%</span>
                        |
                        <?php cp_e('Auto-Fit') ?>
                        <input id="zoom-fit" class="cp-checkbox checkbox small" type="checkbox" checked>
                    </div>
                    <div class="cp-editor-alignment">
                        <button type="button" class="button" data-cp-su>
                            <span class="dashicons dashicons-align-right cp-layers-icon"></span>
                            <?php cp_e('Align Layer to...') ?>
                        </button>
                        <div class="cp-su-data">
                            <table id="cp-layer-alignment" class="cp-layer-alignment">
                                <tr>
                                    <td data-move="top left"><i><?php cp_e('top left') ?></i></td>
                                    <td data-move="top center"><i><?php cp_e('top center') ?></i></td>
                                    <td data-move="top right"><i><?php cp_e('top right') ?></i></td>
                                </tr>
                                <tr>
                                    <td data-move="middle left"><i><?php cp_e('middle left') ?></i></td>
                                    <td data-move="middle center"><i><?php cp_e('middle center') ?></i></td>
                                    <td data-move="middle right"><i><?php cp_e('middle right') ?></i></td>
                                </tr>
                                <tr>
                                    <td data-move="bottom left"><i><?php cp_e('bottom left') ?></i></td>
                                    <td data-move="bottom center"><i><?php cp_e('bottom center') ?></i></td>
                                    <td data-move="bottom right"><i><?php cp_e('bottom right') ?></i></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="cp-editor-undo-redo">
                        <div class="cp-editor-undo disabled">
                            <button type="button" class="button-left button">
                                <span class="dashicons dashicons-undo cp-layers-icon"></span>
                            </button>
                            <?php cp_e('Undo') ?>
                        </div>
                        |
                        <div class="cp-editor-redo disabled">
                            <?php cp_e('Redo') ?>
                            <button type="button" class="button-right button">
                                <span class="dashicons dashicons-redo cp-layers-icon"></span>
                            </button>
                        </div>
                    </div>

                    <div>
                        <button type="button" class="button cp-popup-preview-button cp-green-button">
                            <i class="dashicons dashicons-visibility"></i>
                            <?php cp_e('Live Preview') ?>
                        </button>
                    </div>

                     <div class="cp-editor-preview">
                        <?php cp_e('Preview') ?>
                        <button type="button" class="button cp-preview-button"><?php cp_ex('Page', 'noun') ?></button><!--
                     --><button type="button" class="button cp-layer-preview-button"><?php cp_e('Layer') ?></button>
                    </div>


                    <div class="cp-editor-layouts">
                        <button data-type="desktop" class="button dashicons dashicons-desktop playing" data-help="<?php cp_e('Show layers that are visible on desktop.') ?>"></button><!--
                    --><button data-type="tablet" class="button dashicons dashicons-tablet" data-help="<?php cp_e('Show layers that are visible on tablets.') ?>"></button><!--
                    --><button data-type="phone"  class="button dashicons dashicons-smartphone" data-help="<?php cp_e('Show layers that are visible on mobile phones.') ?>"></button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="cp-preview-td">
        <div class="cp-preview-wrapper cp-preview-size" data-dragover="<?php cp_e('Drop image(s) here') ?>">
            <div class="cp-preview cp-preview-size">
                <div id="cp-preview-layers" class="draggable cp-layer cp-preview-transform">
                    <div id="cp-static-preview" class="disabled"></div>
                </div>
            </div>
            <div class="cp-real-time-preview cp-preview-size"></div>
        </div>
    </div>

    <div class="cp-sublayer-wrapper">
        <h4>
            <span class="dashicons dashicons-images-alt2 cp-layers-icon"></span>
            <span class="cp-layers-text"><?php cp_e('Layers') ?></span>
            <a href="#" class="cp-add-sublayer">
                <span class="dashicons dashicons-plus"></span><?php cp_e('Add New') ?>
            </a>
            <div class="cp-timeline-switch filters">
                <ul>
                    <li class="active"><?php cp_e('Layer options') ?></li>
                    <li><?php cp_e('Timeline') ?></li>
                </ul>
            </div>
        </h4>
        <table class="cp-layers-table">
            <tr>
                <td class="cp-layers-list">
                    <div class="cp-layers-wrapper">
                        <div class="subheader"><?php cp_e('Static layers from other pages') ?></div>
                        <ul class="cp-static-sublayers cp-sublayer-sortable"></ul>
                        <div class="subheader"><?php cp_e('Layers on this page') ?></div>
                        <ul class="cp-sublayers cp-sublayer-sortable"></ul>
                        <div class="cp-empty-layer-notification">
                            <i class="dashicons dashicons-info"></i><br>
                            <?php cp_e('This page has no layers') ?><br>
                            <?php printf(cp__('Click %sAdd New%s to add your first layer.'), '<span><span class="dashicons dashicons-plus"></span>', '</span>') ?>
                        </div>
                    </div>
                </td>
                <td class="cp-layers-settings">
                    <div id="cp-layers-settings-popout" data-km-ui-resize="600,950,1300">

                        <div id="cp-layers-settings-popout-handler"
                            data-help="<?php cp_e('You can grab me here and drag where you need.') ?>"
                            data-km-ui-popover-once="true"
                            data-km-ui-popover-autoclose="3"
                            data-km-ui-popover-distance="20"
                            data-km-ui-popover-theme="red">
                            <?php cp_e('Layer editor') ?>
                            <b id="menu-set-putback">
                                <i class="dashicons dashicons-external"></i>
                                <?php cp_e('Put back') ?>
                            </b>
                        </div>

                        <div class="cp-multi-select-notice">
                            <h5>
                                <span class="dashicons dashicons-info"></span>
                                <?php cp_e('Multiple Selection Mode') ?>
                                <sup><?php cp_e('BETA') ?></sup>
                            </h5>
                            <span><?php cp_e('In Multiple Selection Mode you can override specific options on all selected layers. Each option field has been reset, only the options you change will be updated on the selected layers. This feature is currently in beta phase, use it cautiously.') ?></span>
                            <small><?php cp_e('Changes will be applied on all selected layers.') ?></small>
                        </div>
                        <div class="cp-sublayer-pages-wrapper">
                            <div class="cp-sublayer-nav">
                                <a href="#" class="active"><?php cp_e('Content') ?></a>
                                <a href="#"><?php cp_e('Transitions') ?></a>
                                <a href="#"><?php cp_e('Link & Attributes') ?></a>
                                <a href="#"><?php cp_e('Styles') ?></a>
                                <b id="cp-easy-view">
                                    <span><?php cp_e('EASY MODE') ?></span>
                                </b>
                                <b id="menu-set-float">
                                    <i class="dashicons dashicons-external"></i>
                                    <?php cp_e('Pop out editor') ?>
                                </b>
                            </div>
                            <div class="cp-sublayer-pages">
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
        </table>
        <div class="cp-preview-timeline" data-timeline-for="cp-preview-timeline"></div>
    </div>
</div>
