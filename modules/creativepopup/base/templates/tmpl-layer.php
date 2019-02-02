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
    $googleFonts = null;
}
?>
<script type="text/html" id="cp-layer-template">
    <div class="cp-sublayer-page cp-sublayer-basic active">


        <div class="cp-set-screen-types">
            <?php cp_e('Show this layer on the following devices:') ?>

                <button data-type="desktop" class="button dashicons dashicons-desktop playing" data-help="Show this layer on desktop."></button><!--
            --><button data-type="tablet" class="button dashicons dashicons-tablet" data-help="Show this layer on tablets."></button><!--
            --><button data-type="phone" class="button dashicons dashicons-smartphone" data-help="Show this layer on mobile phones."></button>

        </div>


        <input type="hidden" name="media" value="img">
        <div class="cp-layer-kind">
            <ul>
                <li data-section="img" class="active"><span class="dashicons dashicons-format-image"></span><?php cp_e('Image') ?></li>
                <li data-section="text" data-placeholder="<?php cp_e('Enter text only content here ...') ?>"><span class="dashicons dashicons-text"></span><?php cp_e('Text') ?></li>
                <li data-section="html" data-placeholder="<?php cp_e('Enter custom HTML code, which will appear on your front-office pages ...') ?>"><span class="dashicons dashicons-editor-code "></span><?php cp_e('HTML') ?></li>
                <li data-section="media" data-placeholder="<?php cp_e('Paste embed code here   or   add self-hosted media ...') ?>">
                    <span class="dashicons dashicons-video-alt3"></span><?php cp_e('Video / Audio') ?>
                </li>
                <li data-section="post" data-placeholder="<?php cp_e('You can enter both post placeholders and custom content here (including HTML) ...') ?>"><span class="dashicons dashicons-admin-post"></span><?php cp_e('Dynamic content') ?></li>
            </ul>
        </div>
        <!-- End of Layer Media Type -->

        <!-- Layer Element Type -->
        <input type="hidden" name="type" value="p">
        <ul class="cp-sublayer-element cp-hidden">
            <li class="cp-type active" data-element="p"><?php cp_e('Paragraph') ?></li>
            <li class="cp-type" data-element="h1"><?php cp_e('H1') ?></li>
            <li class="cp-type" data-element="h2"><?php cp_e('H2') ?></li>
            <li class="cp-type" data-element="h3"><?php cp_e('H3') ?></li>
            <li class="cp-type" data-element="h4"><?php cp_e('H4') ?></li>
            <li class="cp-type" data-element="h5"><?php cp_e('H5') ?></li>
            <li class="cp-type" data-element="h6"><?php cp_e('H6') ?></li>
        </ul>
        <!-- End of Layer Element Type -->

        <div class="cp-layer-sections">

            <!-- Image Layer -->
            <div class="cp-image-uploader slide-image clearfix">
                <input type="hidden" name="imageId">
                <input type="hidden" name="image">
                <div class="cp-image cp-upload cp-bulk-upload cp-layer-image not-set" data-l10n-set="<?php cp_e('Click to set') ?>" data-l10n-change="<?php cp_e('Click to change') ?>">
                    <div><img src="<?php echo CP_VIEWS_URL.'img/admin/blank.gif' ?>" alt=""></div>
                    <a href="#" class="aviary dashicons dashicons-image-crop"></a>
                    <a href="#" class="dashicons dashicons-dismiss"></a>
                </div>
                <p>
                    <?php cp_e('Click on the image preview to open Image Manager or') ?>
                    <a href="#" class="cp-url-prompt"><?php cp_e('insert from URL') ?></a> or
                    <a href="#" class="cp-post-image"><?php cp_e('use product img') ?></a>.
                </p>
            </div>

            <!-- Text/HTML/Video Layer -->
            <div class="cp-html-code cp-hidden">
                <div class="cp-html-textarea">
                    <textarea name="html" cols="50" rows="5" placeholder="Enter layer content here"></textarea>
                    <button type="button" class="button cp-upload cp-bulk-upload cp-insert-media">
                        <span class="dashicons dashicons-admin-media"></span>
                        <?php cp_e('Add Media') ?>
                    </button>
                </div>
                <div class="cp-options">

                    <div class="cp-image-uploader slide-image clearfix">
                        <table>
                            <tr>
                                <td>
                                    <input type="hidden" name="posterId">
                                    <input type="hidden" name="poster">
                                    <div class="cp-image cp-upload cp-bulk-upload cp-media-image not-set" data-l10n-set="<?php cp_e('Click to set') ?>" data-l10n-change="<?php cp_e('Click to change') ?>">
                                        <div><img src="<?php echo CP_VIEWS_URL.'img/admin/blank.gif' ?>" alt=""></div>
                                        <a href="#" class="aviary dashicons dashicons-image-crop"></a>
                                        <a href="#" class="dashicons dashicons-dismiss"></a>
                                    </div>
                                </td>
                                <td>
                                    <p>
                                        <?php cp_e('Insert a video poster image from your Image Manager or ') ?>
                                        <a href="#" class="cp-url-prompt"><?php cp_e('insert from URL') ?></a>.
                                    </p>
                                </td>
                                <td>
                                    <?php cp_get_checkbox($cpDefaults['layers']['mediaBackgroundVideo'], null, array('class' => 'sublayerprop hero bgvideo')) ?>
                                    <?php echo $cpDefaults['layers']['mediaBackgroundVideo']['name'] ?>
                                </td>
                            </tr>
                        </table>

                        <div class="cp-bgvideo-options cp-notification-info">
                            <i class="dashicons dashicons-info"></i>
                            <?php cp_e('Please note, the page background image (if any) will cover the video.') ?>
                        </div>
                    </div>

                    <div class="cp-separator"><span><?php cp_e('options') ?></span></div>
                    <table class="cp-media-options">
                        <tr>
                            <td>
                                <?php echo $cpDefaults['layers']['mediaAutoPlay']['name'] ?> <br>
                                <?php cp_get_select($cpDefaults['layers']['mediaAutoPlay'], null, array('class' => 'sublayerprop')) ?>
                            </td>
                            <td>
                                <?php echo $cpDefaults['layers']['mediaFillMode']['name'] ?> <br>
                                <?php cp_get_select($cpDefaults['layers']['mediaFillMode'], null, array('class' => 'sublayerprop')) ?>
                            </td>
                            <td>
                                <?php echo $cpDefaults['layers']['mediaControls']['name'] ?> <br>
                                <?php cp_get_select($cpDefaults['layers']['mediaControls'], null, array('class' => 'sublayerprop')) ?>
                            </td>
                            <td>
                                <?php echo $cpDefaults['layers']['mediaInfo']['name'] ?> <br>
                                <?php cp_get_select($cpDefaults['layers']['mediaInfo'], null, array('class' => 'sublayerprop')) ?>
                            </td>
                            <td class="volume">
                                <?php echo $cpDefaults['layers']['mediaVolume']['name'] ?> <br>
                                <?php cp_get_input($cpDefaults['layers']['mediaVolume'], null, array('class' => 'sublayerprop')) ?>
                            </td>
                            <td class="overlay">
                                <?php echo $cpDefaults['layers']['mediaOverlay']['name']; ?><br>
                                <?php

                                $location = CP_VIEWS_URL.'/img/core/overlays/*';
                                $overlays = array('disabled' => 'No overlay image');

                                foreach (glob($location) as $file) {
                                    $basename = basename($file);
                                    $url = CP_VIEWS_URL.'/img/core/overlays/'.$basename;

                                    $overlays[$url] = $basename;
                                }

                                cp_get_select($cpDefaults['layers']['mediaOverlay'], null, array('class' => 'sublayerprop', 'options' => $overlays ));
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Dynamic Layer -->
            <div class="cp-post-section cp-hidden">
                <div class="cp-posts-configured">
                    <ul class="cp-post-placeholders clearfix">
                        <li><span>[id]</span></li>
                        <li><span>[url]</span></li>
                        <li><span>[date-published]</span></li>
                        <li><span>[date-modified]</span></li>
                        <li><span>[image]</span></li>
                        <li><span>[image-url]</span></li>
                        <li><span>[name]</span></li>
                        <li><span>[price]</span></li>
                        <li><span>[description]</span></li>
                        <li><span>[description-short]</span></li>
                        <!--li data-placeholder="<a href=&quot;[url]&quot;>Read more</a>"><span>[link]</span></li-->
                        <li><span>[manufacturer]</span></li>
                        <li><span>[category]</span></li>
                        <li><span>[breadcrumbs]</span></li>
                    </ul>
                    <p>
                        <?php cp_e("Click on one or more post placeholders to insert them into your layer's content. Post placeholders act like shortcodes, and they will be filled with the actual content from your dynamic content.") ?><br>
                        <?php cp_e('Limit text length (if any)') ?>
                        <input type="number" name="post_text_length">
                        <button type="button" class="button cp-configure-posts"><span class="dashicons dashicons-admin-post"></span><?php cp_e('Configure dynamic content') ?></button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="cp-sublayer-page cp-sublayer-options">
        <div class="cp-easy">
            <ul class="layer-properties-box clearfix">
                <li class="cp-easy-tr" data-prop="transitionin">
                    <h6><?php cp_e('Add opening transition') ?></h6>
                    <h5><span><?php cp_e('Opening transition') ?></span></h5>
                    <button type="button" class="button cp-blue-button cp-preset">
                        <i class="dashicons dashicons-admin-settings"></i>
                        <?php cp_e('Choose preset') ?>
                    </button>
                    <ul></ul>
                    <select class="cp-add-tr-prop"><option value="">&#10010;&nbsp;&nbsp;&nbsp;<?php cp_e('Add property') ?></option></select>
                </li>
                <li class="cp-easy-tr" data-prop="transitionout">
                    <h6><?php cp_e('Add ending transition') ?></h6>
                    <h5><span><?php cp_e('Ending transition') ?></span><i class="dashicons dashicons-no"></i></h5>
                    <button type="button" class="button cp-blue-button cp-preset">
                        <i class="dashicons dashicons-admin-settings"></i>
                        <?php cp_e('Choose preset') ?>
                    </button>
                    <ul></ul>
                    <select class="cp-add-tr-prop"><option value="">&#10010;&nbsp;&nbsp;&nbsp;<?php cp_e('Add property') ?></option></select>
                </li>
                <li class="cp-easy-tr" data-prop="loop">
                    <h6><?php cp_e('Add loop transition') ?></h6>
                    <h5><span><?php cp_e('Loop transition') ?></span><i class="dashicons dashicons-no"></i></h5>
                    <button type="button" class="button cp-blue-button cp-preset">
                        <i class="dashicons dashicons-admin-settings"></i>
                        <?php cp_e('Choose preset') ?>
                    </button>
                    <ul></ul>
                    <select class="cp-add-tr-prop"><option value="">&#10010;&nbsp;&nbsp;&nbsp;<?php cp_e('Add property') ?></option></select>
                </li>
                <li class="cp-easy-tr" data-prop="hover">
                    <h6><?php cp_e('Add hover transition') ?></h6>
                    <h5><span><?php cp_e('Hover transition') ?></span><i class="dashicons dashicons-no"></i></h5>
                    <button type="button" class="button cp-blue-button cp-preset">
                        <i class="dashicons dashicons-admin-settings"></i>
                        <?php cp_e('Choose preset') ?>
                    </button>
                    <ul></ul>
                    <select class="cp-add-tr-prop"><option value="">&#10010;&nbsp;&nbsp;&nbsp;<?php cp_e('Add property') ?></option></select>
                </li>
            </ul>
        </div>
        <div class="cp-adv" style="">
            <select id="cp-transition-selector">
                <option value="0"><?php cp_e('Opening Transition properties') ?></option>
                <option value="1"><?php cp_e('Opening Text Transition properties') ?></option>
                <option value="2"><?php cp_e('Loop or Middle Transition properties') ?></option>
                <option value="3"><?php cp_e('Ending Text Transition properties') ?></option>
                <option value="4"><?php cp_e('Ending Transition properties') ?></option>
                <option value="5"><?php cp_e('Hover Transition properties') ?></option>
                <option value="6"><?php cp_e('Parallax Transition properties') ?></option>
            </select>

            <table id="cp-transition-selector-table">
                <tr>
                    <td class="cp-padding"></td>
                    <td class="cp-opening-transition">
                        <div>
                            <div class="cp-tpreview-wrapper" id="cp-tpreview-in">
                                <div class="cp-preview-layer"></div>
                            </div>
                            <span><?php cp_e('Opening<br>Transition') ?></span>
                        </div>
                    </td>
                    <td class="cp-padding cp-only-with-text-layers"></td>
                    <td class="cp-opening-transition cp-only-with-text-layers">
                        <div>
                            <div class="cp-tpreview-wrapper" id="cp-tpreview-textin">
                                <span class="cp-preview-layer_t cp-preview-layer_t4">t</span>
                                <span class="cp-preview-layer_t cp-preview-layer_t3">x</span>
                                <span class="cp-preview-layer_t cp-preview-layer_t2">e</span>
                                <span class="cp-preview-layer_t cp-preview-layer_t1">t</span>
                            </div>
                            <span><?php cp_e('Opening Text<br>Transition') ?></span>
                        </div>
                    </td>
                    <td class="cp-padding"></td>
                    <td>
                        <div>
                            <div class="cp-tpreview-wrapper" id="cp-tpreview-loop">
                                <div class="cp-preview-layer"></div>
                            </div>
                            <span><?php cp_e('Loop or Middle<br>Transition') ?></span>
                        </div>
                    </td>
                    <td class="cp-padding cp-only-with-text-layers"></td>
                    <td class="cp-only-with-text-layers">
                        <div>
                            <div class="cp-tpreview-wrapper" id="cp-tpreview-textout">
                                <span class="cp-preview-layer_t cp-preview-layer_t4">t</span>
                                <span class="cp-preview-layer_t cp-preview-layer_t3">x</span>
                                <span class="cp-preview-layer_t cp-preview-layer_t2">e</span>
                                <span class="cp-preview-layer_t cp-preview-layer_t1">t</span>
                            </div>
                            <span><?php cp_e('Ending Text<br>Transition') ?></span>
                        </div>
                    </td>
                    <td class="cp-padding"></td>
                    <td>
                        <div>
                            <div class="cp-tpreview-wrapper" id="cp-tpreview-out">
                                <div class="cp-preview-layer"></div>
                            </div>
                            <span><?php cp_e('Ending<br>Transition') ?></span>
                        </div>
                    </td>
                    <td class="cp-padding"></td>
                    <td>
                        <div>
                            <div class="cp-tpreview-wrapper" id="cp-tpreview-hover">
                                <div class="cp-preview-layer"></div>
                            </div>
                            <span><?php cp_e('Hover<br>Transition') ?></span>
                        </div>
                    </td>
                    <td class="cp-padding"></td>
                    <td>
                        <div>
                            <div class="cp-tpreview-wrapper" id="cp-tpreview-parallax">
                                <div class="cp-preview-layer"></div>
                                <div class="cp-preview-layer cp-preview-layer_b"></div>
                            </div>
                            <span><?php cp_e('Parallax<br>Transition') ?></span>
                        </div>
                    </td>
                    <td class="cp-padding"></td>
                </tr>
            </table>

            <div id="cp-transition-warning">
                <div class="cp-notification-info">
                    <i class="dashicons dashicons-info"></i>
                    <?php cp_e('Layers require an opening transition in order to become visible in the popup. Enable either <mark>Opening Transition</mark> or <mark>Opening Text Transition</mark> to make this layer visible again.') ?>
                </div>
            </div>

            <div id="cp-layer-transitions">

                <!-- Opening Transition -->
                <section data-storage="cp-tr-in">
                    <div>
                        <div class="cp-separator"><span><?php cp_e('Opening Transition properties') ?></span></div>
                        <header>
                            <div class="cp-h-enabled"><?php cp_e('ENABLED') ?></div>
                            <div class="cp-h-button"><?php cp_get_checkbox($cpDefaults['layers']['transitionIn'], null, array('class' => 'sublayerprop large toggle')) ?></div>
                            <div class="cp-h-description"><?php cp_e('The following are the initial options from which this layer animates toward the appropriate values set under the Styles tab when it enters into the popup canvas.') ?></div>
                            <div class="cp-h-actions">
                                <a href="#" class="copy"><i class="dashicons dashicons-clipboard"></i> <?php cp_e('Copy transition properties') ?></a>
                                <a href="#" class="paste"><i class="dashicons dashicons-admin-page"></i> <?php cp_e('Paste transition properties') ?></a>
                            </div>
                        </header>
                    </div>
                    <div class="overlay">
                        <ul class="layer-properties-box clearfix">
                            <li>
                                <h5><span><?php cp_e('Position &amp; Dimensions') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInOffsetX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInOffsetX'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInOffsetY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInOffsetY'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInScaleX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInScaleX'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInScaleY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInScaleY'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInWidth']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInWidth'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInHeight']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInHeight'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Rotation, Skew &amp; Mask') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInRotate']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInRotate'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInRotateX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInRotateX'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInRotateY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInRotateY'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInSkewX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInSkewX'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInSkewY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInSkewY'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInClip']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInClip'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Timing &amp; Transform') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInDelay']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInDelay'], null, array('class' => 'sublayerprop')) ?> ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInDuration']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInDuration'], null, array('class' => 'sublayerprop')) ?> ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="http://easings.net/" target="_blank"><?php echo $cpDefaults['layers']['transitionInEasing']['name'] ?></a>
                                        </div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['transitionInEasing'], null, array('class' => 'sublayerprop', 'options' => $cpDefaults['easings'])) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInTransformOrigin']['name'] ?>
                                        </div>
                                        <div>
                                            <i class="dashicons dashicons-search"></i><?php cp_get_input($cpDefaults['layers']['transitionInTransformOrigin'], null, array('class' => 'sublayerprop', 'style' => 'width:130px')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInPerspective']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInPerspective'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <div>
                                            Perspective
                                        </div>
                                        <div>
                                            <?php //cp_get_input($cpDefaults['layers']['transitionInTransformPerspective'], null, array('class' => 'sublayerprop', 'style' => 'width:130px')) ?>
                                        </div>
                                    </li> -->
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Style properties') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInFade']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_checkbox($cpDefaults['layers']['transitionInFade'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInColor']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInColor'], null, array('class' => 'sublayerprop cp-colorpicker')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInBGColor']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInBGColor'], null, array('class' => 'sublayerprop cp-colorpicker')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionInRadius']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInRadius'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                     <li>
                                        <div>
                                            <a href="https://developer.mozilla.org/en/docs/Web/CSS/filter#Functions" target="_blank"><?php echo $cpDefaults['layers']['transitionInFilter']['name'] ?></a>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionInFilter'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                 </ul>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Opening Text Transition -->
                <section class="cp-text-transition" data-storage="cp-tr-text-in">
                    <div>
                        <div class="cp-separator"><span><?php cp_e('Opening Text Transition properties') ?></span></div>
                        <header>
                            <div class="cp-h-enabled"><?php cp_e('ENABLED') ?></div>
                            <div class="cp-h-button"><?php cp_get_checkbox($cpDefaults['layers']['textTransitionIn'], null, array('class' => 'sublayerprop large toggle')) ?></div>
                            <div class="cp-h-description"><?php cp_e('The following options specify the initial state of each text fragments before they start animating toward the joint whole word.') ?></div>
                            <div class="cp-h-actions">
                                <a href="#" class="copy"><i class="dashicons dashicons-clipboard"></i> <?php cp_e('Copy transition properties') ?></a>
                                <a href="#" class="paste"><i class="dashicons dashicons-admin-page"></i> <?php cp_e('Paste transition properties') ?></a>
                            </div>
                        </header>
                    </div>
                    <div class="overlay">
                        <ul class="layer-properties-box clearfix">
                            <li>
                                <h5><span><?php cp_e('Type, Position &amp; Dimensions') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textTypeIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['textTypeIn'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textOffsetXIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textOffsetXIn'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textOffsetYIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textOffsetYIn'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textScaleXIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textScaleXIn'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textScaleYIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textScaleYIn'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Rotation &amp; Skew') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textRotateIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textRotateIn'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textRotateXIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textRotateXIn'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textRotateYIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textRotateYIn'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textSkewXIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textSkewXIn'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textSkewYIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textSkewYIn'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Timing &amp; Transform') ?></span></h5>
                                <ul>
                                    <li class="start-at-wrapper" data-help="<?php cp_e('Sets the starting time for this transition. Select one of the pre-defined options from this list to control timing in relation with other transition types. Additionally, you can shift starting time with the modifier controls below.') ?>">
                                        <div><?php cp_e('Start when') ?></div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textStartAtIn'], null, array('class' => 'sublayerprop start-at-calc undomanager-merge')) ?>
                                            <?php cp_get_select($cpDefaults['layers']['textStartAtInTiming'], null, array('class' => 'sublayerprop start-at-timing')) ?>
                                        </div>
                                    </li>
                                    <li class="start-at-wrapper" data-help="<?php cp_e('Shifts the above selected starting time by performing a custom operation. For example, &quot;- 1000&quot; will advance the animation by playing it 1 second (1000 milliseconds) earlier.') ?>">
                                        <div><?php cp_e('with modifier') ?></div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['textStartAtInOperator'], null, array('class' => 'sublayerprop start-at-operator')) ?>
                                            <?php cp_get_input($cpDefaults['layers']['textStartAtInValue'], null, array('class' => 'sublayerprop start-at-value')) ?>  ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textDurationIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textDurationIn'], null, array('class' => 'sublayerprop')) ?> ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textShiftIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textShiftIn'], null, array('class' => 'sublayerprop')) ?> ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="http://easings.net/" target="_blank"><?php echo $cpDefaults['layers']['textEasingIn']['name'] ?></a>
                                        </div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['textEasingIn'], null, array('class' => 'sublayerprop', 'options' => $cpDefaults['easings'])) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textTransformOriginIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textTransformOriginIn'], null, array('class' => 'sublayerprop', 'style' => 'width:130px')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textPerspectiveIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textPerspectiveIn'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Style properties') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textFadeIn']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_checkbox($cpDefaults['layers']['textFadeIn'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Loop or Middle Transition -->
                <section data-storage="cp-tr-loop">
                    <div>
                        <div class="cp-separator"><span><?php cp_e('Loop / Middle Transition properties') ?></span></div>
                        <header>
                            <div class="cp-h-enabled"><?php cp_e('ENABLED') ?></div>
                            <div class="cp-h-button"><?php cp_get_checkbox($cpDefaults['layers']['loop'], null, array('class' => 'sublayerprop large toggle')) ?></div>
                            <div class="cp-h-description"><?php cp_e('Repeats a transition based on the options below. If you set the Loop Count to 1, it can also act as a middle transition in the chain of animation lifecycles.') ?></div>
                            <div class="cp-h-actions">
                                <a href="#" class="copy"><i class="dashicons dashicons-clipboard"></i> <?php cp_e('Copy transition properties') ?></a>
                                <a href="#" class="paste"><i class="dashicons dashicons-admin-page"></i> <?php cp_e('Paste transition properties') ?></a>
                            </div>
                        </header>
                    </div>
                    <div class="overlay">
                        <ul class="layer-properties-box clearfix">
                            <li>
                                <h5><span><?php cp_e('Position &amp; Dimensions') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopOffsetX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopOffsetX'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopOffsetY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopOffsetY'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopScaleX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopScaleX'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopScaleY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopScaleY'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Rotation, Skew &amp; Mask') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopRotate']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopRotate'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopRotateX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopRotateX'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopRotateY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopRotateY'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopSkewX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopSkewX'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopSkewY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopSkewY'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopClip']['name'] ?><br>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopClip'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Timing &amp; Transform') ?></span></h5>
                                <ul>
                                    <li class="start-at-wrapper" data-help="<?php cp_e('Sets the starting time for this transition. Select one of the pre-defined options from this list to control timing in relation with other transition types. Additionally, you can shift starting time with the modifier controls below.'); ?>">
                                        <div><?php cp_e('Start when') ?></div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopStartAt'], null, array('class' => 'sublayerprop start-at-calc undomanager-merge')) ?>
                                            <?php cp_get_select($cpDefaults['layers']['loopStartAtTiming'], null, array('class' => 'sublayerprop start-at-timing')) ?>
                                        </div>
                                    </li>
                                    <li class="start-at-wrapper" data-help="<?php cp_e('Shifts the above selected starting time by performing a custom operation. For example, &quot;- 1000&quot; will advance the animation by playing it 1 second (1000 milliseconds) earlier.'); ?>">
                                        <div><?php cp_e('with modifier') ?></div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['loopStartAtOperator'], null, array('class' => 'sublayerprop start-at-operator')) ?>
                                            <?php cp_get_input($cpDefaults['layers']['loopStartAtValue'], null, array('class' => 'sublayerprop start-at-value')) ?>  ms
                                        </div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['loopDuration']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['loopDuration'], null, array('class' => 'sublayerprop')) ?> ms</div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="http://easings.net/" target="_blank"><?php echo $cpDefaults['layers']['loopEasing']['name'] ?></a>
                                        </div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['loopEasing'], null, array('class' => 'sublayerprop', 'options' => $cpDefaults['easings'])) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopCount']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopCount'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopWait']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopWait'], null, array('class' => 'sublayerprop')) ?> ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopYoyo']['name'] ?>
                                        </div>
                                        <div>
                                            <label style="display:inline" data-help="<?php echo $cpDefaults['layers']['loopYoyo']['tooltip'] ?>"><?php cp_get_checkbox($cpDefaults['layers']['loopYoyo'], null, array('class' => 'sublayerprop')) ?></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopTransformOrigin']['name'] ?>
                                        </div>
                                        <div>
                                            <i class="dashicons dashicons-search"></i><?php cp_get_input($cpDefaults['layers']['loopTransformOrigin'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopPerspective']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopPerspective'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>


                            </li>
                            <li>
                                <h5><span><?php cp_e('Style properties') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['loopOpacity']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopOpacity'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                     <li>
                                        <div>
                                            <a href="https://developer.mozilla.org/en/docs/Web/CSS/filter#Functions" target="_blank"><?php echo $cpDefaults['layers']['loopFilter']['name'] ?></a>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['loopFilter'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Ending Text Transition -->
                <section class="cp-text-transition" data-storage="cp-tr-text-out">
                    <div>
                        <div class="cp-separator"><span><?php cp_e('Ending Text Transition properties') ?></span></div>
                        <header>
                            <div class="cp-h-enabled"><?php cp_e('ENABLED') ?></div>
                            <div class="cp-h-button"><?php cp_get_checkbox($cpDefaults['layers']['textTransitionOut'], null, array('class' => 'sublayerprop large toggle')) ?></div>
                            <div class="cp-h-description"><?php cp_e('Each text fragment will animate from the joint whole word to the options you specify here.') ?></div>
                            <div class="cp-h-actions">
                                <a href="#" class="copy"><i class="dashicons dashicons-clipboard"></i> <?php cp_e('Copy transition properties') ?></a>
                                <a href="#" class="paste"><i class="dashicons dashicons-admin-page"></i> <?php cp_e('Paste transition properties') ?></a>
                            </div>
                        </header>
                    </div>
                    <div class="overlay">
                        <ul class="layer-properties-box clearfix">
                            <li>
                                <h5><span><?php cp_e('Type, Position &amp; Dimensions') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textTypeOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['textTypeOut'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textOffsetXOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textOffsetXOut'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textOffsetYOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textOffsetYOut'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textScaleXOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textScaleXOut'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textScaleYOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textScaleYOut'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Rotation &amp; Skew') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textRotateOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textRotateOut'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textRotateXOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textRotateXOut'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textRotateYOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textRotateYOut'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textSkewXOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textSkewXOut'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textSkewYOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textSkewYOut'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Timing &amp; Transform') ?></span></h5>
                                <ul>
                                    <li class="start-at-wrapper" data-help="<?php cp_e('Sets the starting time for this transition. Select one of the pre-defined options from this list to control timing in relation with other transition types. Additionally, you can shift starting time with the modifier controls below.'); ?>">
                                        <div><?php cp_e('Start when') ?></div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textStartAtOut'], null, array('class' => 'sublayerprop start-at-calc undomanager-merge')) ?>
                                            <?php cp_get_select($cpDefaults['layers']['textStartAtOutTiming'], null, array('class' => 'sublayerprop start-at-timing')) ?>
                                        </div>
                                    </li>
                                    <li class="start-at-wrapper" data-help="<?php cp_e('Shifts the above selected starting time by performing a custom operation. For example, &quot;- 1000&quot; will advance the animation by playing it 1 second (1000 milliseconds) earlier.'); ?>">
                                        <div><?php cp_e('with modifier') ?></div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['textStartAtOutOperator'], null, array('class' => 'sublayerprop start-at-operator')) ?>
                                            <?php cp_get_input($cpDefaults['layers']['textStartAtOutValue'], null, array('class' => 'sublayerprop start-at-value')) ?>  ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textDurationOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textDurationOut'], null, array('class' => 'sublayerprop')) ?> ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textShiftOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textShiftOut'], null, array('class' => 'sublayerprop')) ?> ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="http://easings.net/" target="_blank"><?php echo $cpDefaults['layers']['textEasingOut']['name'] ?></a>
                                        </div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['textEasingOut'], null, array('class' => 'sublayerprop', 'options' => $cpDefaults['easings'])) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textTransformOriginOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textTransformOriginOut'], null, array('class' => 'sublayerprop', 'style' => 'width:130px')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textPerspectiveOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['textPerspectiveOut'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Style properties') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['textFadeOut']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_checkbox($cpDefaults['layers']['textFadeOut'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </section>

                <!-- Ending Transition -->
                <section data-storage="cp-tr-out">
                    <div>
                        <div class="cp-separator"><span><?php cp_e('Ending Transition properties') ?></span></div>
                        <header>
                            <div class="cp-h-enabled"><?php cp_e('ENABLED') ?></div>
                            <div class="cp-h-button"><?php cp_get_checkbox($cpDefaults['layers']['transitionOut'], null, array('class' => 'sublayerprop large toggle')) ?></div>
                            <div class="cp-h-description"><?php cp_e('The following options will be the end values where this layer animates toward when it leaves the popup canvas.') ?></div>
                            <div class="cp-h-actions">
                                <a href="#" class="copy"><i class="dashicons dashicons-clipboard"></i> <?php cp_e('Copy transition properties') ?></a>
                                <a href="#" class="paste"><i class="dashicons dashicons-admin-page"></i> <?php cp_e('Paste transition properties') ?></a>
                            </div>
                        </header>
                    </div>
                    <div class="overlay">
                        <ul class="layer-properties-box clearfix">
                            <li>
                                <h5><span><?php cp_e('Position &amp; Dimensions') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutOffsetX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutOffsetX'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutOffsetY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutOffsetY'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutScaleX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutScaleX'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutScaleY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutScaleY'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutWidth']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutWidth'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutHeight']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutHeight'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Rotation, Skew &amp; Mask') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutRotate']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutRotate'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutRotateX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutRotateX'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutRotateY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutRotateY'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutSkewX']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutSkewX'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutSkewY']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutSkewY'], null, array('class' => 'sublayerprop')) ?> &deg;
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutClip']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutClip'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Timing &amp; Transform') ?></span></h5>
                                <ul>
                                    <li class="start-at-wrapper" data-help="<?php cp_e('Sets the starting time for this transition. Select one of the pre-defined options from this list to control timing in relation with other transition types. Additionally, you can shift starting time with the modifier controls below.'); ?>">
                                        <div><?php cp_e('Start when') ?></div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutStartAt'], null, array('class' => 'sublayerprop start-at-calc undomanager-merge')) ?>
                                            <?php cp_get_select($cpDefaults['layers']['transitionOutStartAtTiming'], null, array('class' => 'sublayerprop start-at-timing')) ?>
                                        </div>
                                    </li>
                                    <li class="start-at-wrapper" data-help="<?php cp_e('Shifts the above selected starting time by performing a custom operation. For example, &quot;- 1000&quot; will advance the animation by playing it 1 second (1000 milliseconds) earlier.'); ?>">
                                        <div><?php cp_e('with modifier') ?></div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['transitionOutStartAtOperator'], null, array('class' => 'sublayerprop start-at-operator')) ?>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutStartAtValue'], null, array('class' => 'sublayerprop start-at-value')) ?>  ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutDuration']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutDuration'], null, array('class' => 'sublayerprop')) ?> ms
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <a href="http://easings.net/" target="_blank"><?php echo $cpDefaults['layers']['transitionOutEasing']['name'] ?></a>
                                        </div>
                                        <div>
                                            <?php cp_get_select($cpDefaults['layers']['transitionOutEasing'], null, array('class' => 'sublayerprop', 'options' => $cpDefaults['easings'])) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutTransformOrigin']['name'] ?>
                                        </div>
                                        <div>
                                            <i class="dashicons dashicons-search"></i><?php cp_get_input($cpDefaults['layers']['transitionOutTransformOrigin'], null, array('class' => 'sublayerprop', 'style' => 'width:130px')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutPerspective']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutPerspective'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <div>
                                            Perspective
                                        </div>
                                        <div>
                                            <?php //cp_get_input($cpDefaults['layers']['transitionOutTransformPerspective'], null, array('class' => 'sublayerprop', 'style' => 'width:130px')) ?>
                                        </div>
                                    </li> -->
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Style properties') ?></span></h5>
                                <ul>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutFade']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_checkbox($cpDefaults['layers']['transitionOutFade'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutColor']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutColor'], null, array('class' => 'sublayerprop cp-colorpicker')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutBGColor']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutBGColor'], null, array('class' => 'sublayerprop cp-colorpicker')) ?>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <?php echo $cpDefaults['layers']['transitionOutRadius']['name'] ?>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutRadius'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                     <li>
                                        <div>
                                            <a href="https://developer.mozilla.org/en/docs/Web/CSS/filter#Functions" target="_blank"><?php echo $cpDefaults['layers']['transitionOutFilter']['name'] ?></a>
                                        </div>
                                        <div>
                                            <?php cp_get_input($cpDefaults['layers']['transitionOutFilter'], null, array('class' => 'sublayerprop')) ?>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </section>


                <!-- Hover Transition -->
                <section data-storage="cp-tr-hover">
                    <div>
                        <div class="cp-separator"><span><?php cp_e('Hover Transition properties') ?></span></div>
                        <header>
                            <div class="cp-h-enabled"><?php cp_e('ENABLED') ?></div>
                            <div class="cp-h-button"><?php cp_get_checkbox($cpDefaults['layers']['hover'], null, array('class' => 'sublayerprop large toggle')) ?></div>
                            <div class="cp-h-description"><?php cp_e('Plays a transition based on the options below when the user moves the mouse cursor over this layer.') ?></div>
                            <div class="cp-h-actions">
                                <a href="#" class="copy"><i class="dashicons dashicons-clipboard"></i> <?php cp_e('Copy transition properties') ?></a>
                                <a href="#" class="paste"><i class="dashicons dashicons-admin-page"></i> <?php cp_e('Paste transition properties') ?></a>
                            </div>
                        </header>
                    </div>
                    <div class="overlay">
                        <ul class="layer-properties-box clearfix">
                            <li>
                                <h5><span><?php cp_e('Position &amp; Dimensions') ?></span></h5>
                                <ul>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverOffsetX']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverOffsetX'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverOffsetY']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverOffsetY'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverScaleX']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverScaleX'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverScaleY']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverScaleY'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Rotation, Skew &amp; Mask') ?></span></h5>
                                <ul>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverRotate']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverRotate'], null, array('class' => 'sublayerprop')) ?> &deg;</div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverRotateX']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverRotateX'], null, array('class' => 'sublayerprop')) ?> &deg;</div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverRotateY']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverRotateY'], null, array('class' => 'sublayerprop')) ?> &deg;</div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverSkewX']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverSkewX'], null, array('class' => 'sublayerprop')) ?> &deg;</div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverSkewY']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverSkewY'], null, array('class' => 'sublayerprop')) ?> &deg;</div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Timing &amp; Transform') ?></span></h5>
                                <ul>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverInDuration']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverInDuration'], null, array('class' => 'sublayerprop')) ?> ms</div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverOutDuration']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverOutDuration'], null, array('class' => 'sublayerprop')) ?> ms</div>
                                    </li>
                                    <li>
                                        <div><a href="http://easings.net/" target="_blank"><?php echo $cpDefaults['layers']['hoverInEasing']['name'] ?></a></div>
                                        <div><?php cp_get_select($cpDefaults['layers']['hoverInEasing'], null, array('class' => 'sublayerprop', 'options' => $cpDefaults['easings'])) ?></div>
                                    </li>
                                    <li>
                                        <div><a href="http://easings.net/" target="_blank"><?php echo $cpDefaults['layers']['hoverOutEasing']['name'] ?></a></div>
                                        <div><?php cp_get_select($cpDefaults['layers']['hoverOutEasing'], null, array('class' => 'sublayerprop', 'options' => array_merge(array('' => '- Same easing -'), $cpDefaults['easings']))) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverTransformOrigin']['name'] ?></div>
                                        <div><i class="dashicons dashicons-search"></i><?php cp_get_input($cpDefaults['layers']['hoverTransformOrigin'], null, array('class' => 'sublayerprop', 'style' => 'width:130px')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverTransformPerspective']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverTransformPerspective'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Style properties') ?></span></h5>
                                <ul>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverOpacity']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverOpacity'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverColor']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverColor'], null, array('class' => 'sublayerprop cp-colorpicker')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverBGColor']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverBGColor'], null, array('class' => 'sublayerprop cp-colorpicker')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverBorderRadius']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['hoverBorderRadius'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['hoverTopOn']['name'] ?></div>
                                        <div><?php cp_get_checkbox($cpDefaults['layers']['hoverTopOn'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </section>




                <!-- Parallax Transition -->
                <section data-storage="cp-tr-parallax">
                    <div>
                        <div class="cp-separator"><span><?php cp_e('Parallax Transition properties') ?></span></div>
                        <header>
                            <div class="cp-h-enabled"><?php cp_e('ENABLED') ?></div>
                            <div class="cp-h-button"><?php cp_get_checkbox($cpDefaults['layers']['parallax'], null, array('class' => 'sublayerprop large toggle')) ?></div>
                            <div class="cp-h-description"><?php cp_e('Select a parallax type and event, then set the Parallax Level option to enable parallax layers.') ?></div>
                            <div class="cp-h-actions">
                                <a href="#" class="copy"><i class="dashicons dashicons-clipboard"></i> <?php cp_e('Copy transition properties') ?></a>
                                <a href="#" class="paste"><i class="dashicons dashicons-admin-page"></i> <?php cp_e('Paste transition properties') ?></a>
                            </div>
                        </header>
                    <div class="overlay">
                        <ul class="layer-properties-box clearfix col-3">
                            <li>
                                <h5><span><?php cp_e('Basic Settings') ?></span></h5>
                                <ul>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['parallaxLevel']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['parallaxLevel'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['parallaxType']['name'] ?></div>
                                        <div><?php cp_get_select($cpDefaults['layers']['parallaxType'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['parallaxEvent']['name'] ?></div>
                                        <div><?php cp_get_select($cpDefaults['layers']['parallaxEvent'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['parallaxAxis']['name'] ?></div>
                                        <div><?php cp_get_select($cpDefaults['layers']['parallaxAxis'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Distance &amp; Rotation') ?></span></h5>
                                <ul>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['parallaxDistance']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['parallaxDistance'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['parallaxRotate']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['parallaxRotate'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <h5><span><?php cp_e('Timing &amp; Transform') ?></span></h5>
                                <ul>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['parallaxDurationMove']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['parallaxDurationMove'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['parallaxDurationLeave']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['parallaxDurationLeave'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['parallaxTransformOrigin']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['parallaxTransformOrigin'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                    <li>
                                        <div><?php echo $cpDefaults['layers']['parallaxPerspective']['name'] ?></div>
                                        <div><?php cp_get_input($cpDefaults['layers']['parallaxPerspective'], null, array('class' => 'sublayerprop')) ?></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>

            <div class="cp-separator"><span><?php cp_e('Other settings') ?></span></div>

            <div class="cp-layer-other-settings clearfix">
                <div>
                    <div>
                        <?php echo $cpDefaults['layers']['transitionStatic']['name'] ?>
                    </div>
                    <div>
                        <?php cp_get_select($cpDefaults['layers']['transitionStatic'], null, array('class' => 'sublayerprop')) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cp-sublayer-page cp-sublayer-link">
        <h3 class="subheader"><?php cp_e('Linking') ?></h3>
        <div class="cp-slide-link clearfix">
            <div>
                <?php cp_get_input($cpDefaults['layers']['linkURL'], null, array('class' => 'url', 'placeholder' => $cpDefaults['layers']['linkURL']['name'])) ?>
                <input type="hidden" name="linkId">
                <input type="hidden" name="linkName">
                <input type="hidden" name="linkType">
                <a href="#" class="change">
                    <span class="dashicons dashicons-editor-unlink"></span>
                    <?php cp_e('Change Link') ?>
                </a>
                <span><a href="#" class="dyn"><?php cp_e('Use Dynamic post URL') ?></a></span>
            </div>
            <?php cp_get_select($cpDefaults['layers']['linkTarget'], null) ?>
        </div>

        <h3 class="subheader"><?php cp_e('Common Attributes') ?></h3>
        <div class="cp-sublayer-attributes">
            <table class="cp-sublayer-common-attributes">
                <tbody>
                    <tr data-help="<?php echo $cpDefaults['layers']['ID']['tooltip'] ?>">
                        <td class="first"><input type="text" value="id" disabled></td>
                        <td class="second"><input type="text" name="id"></td>
                        <td class="third" data-help="<?php cp_e("In some cases your layers may be wrapped by another element. For example, an ＜A＞ tag when you use layer linking. Some attributes will be applied on the wrapper (if any), which is desirable in many cases (e.g. lightbox plugins). If there is no wrapper element, attributes will be automatically applied on the layer itself. If the pre-defined option doesn't fit your needs, use custom attributes below to override it.") ?>">
                            <?php cp_e('On layer') ?>
                        </td>
                    </tr>
                    <tr data-help="<?php echo $cpDefaults['layers']['class']['tooltip'] ?>">
                        <td class="first"><input type="text" value="class" disabled></td>
                        <td class="second"><input type="text" name="class"></td>
                        <td class="third" data-help="<?php cp_e("In some cases your layers may be wrapped by another element. For example, an ＜A＞ tag when you use layer linking. Some attributes will be applied on the wrapper (if any), which is desirable in many cases (e.g. lightbox plugins). If there is no wrapper element, attributes will be automatically applied on the layer itself. If the pre-defined option doesn't fit your needs, use custom attributes below to override it.") ?>">
                            <?php cp_e('On layer') ?>
                        </td>
                    </tr>
                    <tr data-help="<?php echo $cpDefaults['layers']['title']['tooltip'] ?>">
                        <td class="first"><input type="text" value="title" disabled></td>
                        <td class="second"><input type="text" name="title"></td>
                        <td class="third" data-help="<?php cp_e("In some cases your layers may be wrapped by another element. For example, an ＜A＞ tag when you use layer linking. Some attributes will be applied on the wrapper (if any), which is desirable in many cases (e.g. lightbox plugins). If there is no wrapper element, attributes will be automatically applied on the layer itself. If the pre-defined option doesn't fit your needs, use custom attributes below to override it.") ?>">
                            <?php cp_e('On parent') ?>
                        </td>
                    </tr>
                    <tr data-help="<?php echo $cpDefaults['layers']['alt']['tooltip'] ?>">
                        <td class="first"><input type="text" value="alt" disabled></td>
                        <td class="second"><input type="text" name="alt"></td>
                        <td class="third" data-help="<?php cp_e("In some cases your layers may be wrapped by another element. For example, an ＜A＞ tag when you use layer linking. Some attributes will be applied on the wrapper (if any), which is desirable in many cases (e.g. lightbox plugins). If there is no wrapper element, attributes will be automatically applied on the layer itself. If the pre-defined option doesn't fit your needs, use custom attributes below to override it.") ?>">
                            <?php cp_e('On layer') ?>
                        </td>
                    </tr>
                    <tr data-help="<?php echo $cpDefaults['layers']['rel']['tooltip'] ?>">
                        <td class="first"><input type="text" value="rel" disabled></td>
                        <td class="second"><input type="text" name="rel"></td>
                        <td class="third" data-help="<?php cp_e("In some cases your layers may be wrapped by another element. For example, an ＜A＞ tag when you use layer linking. Some attributes will be applied on the wrapper (if any), which is desirable in many cases (e.g. lightbox plugins). If there is no wrapper element, attributes will be automatically applied on the layer itself. If the pre-defined option doesn't fit your needs, use custom attributes below to override it.") ?>">
                            <?php cp_e('On parent') ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h3 class="subheader"><?php cp_e('Custom Attributes') ?></h3>
        <div class="cp-sublayer-attributes">
            <table class="cp-sublayer-custom-attributes">
                <tbody>
                    <tr>
                        <td colspan="3">
                            <p><?php echo $cpDefaults['layers']['innerAttributes']['desc']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="first">
                            <input type="text" placeholder="<?php cp_e('Attribute name') ?>">
                        </td>
                        <td class="second">
                            <input type="text" placeholder="<?php cp_e('Attribute value') ?>">
                        </td>
                        <td class="third" data-help="<?php cp_e("In some cases your layers may be wrapped by another element. For example, an ＜A＞ tag when you use layer linking. By default, new attributes will be applied on the wrapper (if any), which is desirable in most cases (e.g. lightbox plugins). If there is no wrapper element, attributes will be automatically applied on the layer itself. Uncheck this option when you need to apply this attribute on the layer element in all cases.") ?>">
                            <input type="checkbox" class="small noreset" checked> <?php cp_e('On parent') ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="cp-sublayer-page cp-sublayer-style clearfix" data-storage="cp-styles">

        <div>

            <div>
                <div>
                    <h5><?php cp_e('Layout') ?> <span>| <?php cp_e('sizing & position') ?></span></h5>
                    <div class="cp-layer-visual-box">
                        <div class="cp-layer-position">
                            <div>
                                <?php cp_get_input($cpDefaults['layers']['top'], null, array('class' => 'auto cp-layer-top')) ?>
                                <?php cp_get_input($cpDefaults['layers']['left'], null, array('class' => 'auto cp-layer-left')) ?>
                                <span class="cp-layer-top"><?php echo $cpDefaults['layers']['top']['name'] ?></span>
                                <span class="cp-layer-left"><?php echo $cpDefaults['layers']['left']['name'] ?></span>
                            </div>
                            <div class="cp-layer-border">
                                <?php cp_e('border') ?>
                                <b class="cp-border-top-value">–</b>
                                <b class="cp-border-right-value">–</b>
                                <b class="cp-border-bottom-value">–</b>
                                <b class="cp-border-left-value">–</b>
                                <div class="cp-layer-padding">
                                    <?php cp_e('padding') ?>
                                    <b class="cp-padding-top-value">–</b>
                                    <b class="cp-padding-right-value">–</b>
                                    <b class="cp-padding-bottom-value">–</b>
                                    <b class="cp-padding-left-value">–</b>
                                    <div class="cp-layer-size">
                                        <?php cp_get_input($cpDefaults['layers']['width'], null, array('class' => 'auto', 'placeholder' => 'auto')) ?><span class="cp-x">x</span><?php cp_get_input($cpDefaults['layers']['height'], null, array('class' => 'auto', 'placeholder' => 'auto')) ?>
                                        <br>
                                        <span class="cp-wh"><?php echo $cpDefaults['layers']['width']['name'] ?></span><span class="cp-wh"><?php echo $cpDefaults['layers']['height']['name'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-holder cp-position cp-adv">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $cpDefaults['layers']['position']['name'] ?>
                                    </td>
                                    <td>
                                        <?php cp_get_select($cpDefaults['layers']['position'], null, array('class' => 'sublayerprop')) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $cpDefaults['layers']['zIndex']['name'] ?>
                                    </td>
                                    <td>
                                        <?php cp_get_input($cpDefaults['layers']['zIndex'], null, array('class' => 'auto')) ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-holder cp-border-padding">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="cp-bptable-1"></td>
                                    <td class="cp-bptable-2"><?php cp_e('Border') ?></td>
                                    <td class="cp-bptable-3"><?php cp_e('Padding') ?></td>
                                </tr>
                                <tr data-edge="top">
                                    <td><?php cp_e('Top') ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['borderTop'], null, array('class' => 'auto')) ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['paddingTop'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr data-edge="right">
                                    <td><?php cp_e('Right') ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['borderRight'], null, array('class' => 'auto')) ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['paddingRight'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr data-edge="bottom">
                                    <td><?php cp_e('Bottom') ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['borderBottom'], null, array('class' => 'auto')) ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['paddingBottom'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr data-edge="left">
                                    <td><?php cp_e('Left') ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['borderLeft'], null, array('class' => 'auto')) ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['paddingLeft'], null, array('class' => 'auto')) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div>

            <div class="cp-h-actions">
                <div>
                    <h5><?php cp_e('Actions') ?></h5>
                    <div class="table-holder">
                        <a href="#" class="copy"><i class="dashicons dashicons-clipboard"></i> <?php cp_e('Copy layer styles') ?></a>
                        <a href="#" class="paste"><i class="dashicons dashicons-admin-page"></i> <?php cp_e('Paste layer styles') ?></a>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <h5><?php cp_e('Text') ?> <span>| <?php cp_e('font &amp; style') ?></span></h5>
                    <div class="table-holder">
                        <table>
                            <tbody>

                                <?php
                                $fontList = array(
                                    array('name' => 'Arial', 'font' => true),
                                    array('name' => 'Helvetica', 'font' => true),
                                    array('name' => 'Georgia', 'font' => true),
                                    array('name' => 'Comic Sans MS', 'value' => "'Comic Sans MS'", 'font' => true),
                                    array('name' => 'Impact', 'font' => true),
                                    array('name' => 'Tahoma', 'font' => true),
                                    array('name' => 'Verdana', 'font' => true),
                                );

                                foreach ($googleFonts as $font) : ?>
                                    <?php list($family) = explode(':', $font['param']); ?>
                                    <?php $item = array('font' => true); ?>
                                    <?php
                                    if (strpos($family, '+')) : ?>
                                        <?php $family = str_replace('+', ' ', $family); ?>
                                        <?php $item['value'] = "'{$family}'"; ?>
                                    <?php
                                    endif; ?>

                                    <?php $item['name'] = $family; ?>
                                    <?php $fontList[] = $item; ?>
                                <?php
                                endforeach; ?>
                                <tr>
                                    <td class="right"><?php echo $cpDefaults['layers']['fontFamily']['name'] ?></td>
                                    <td>
                                            <?php cp_get_input($cpDefaults['layers']['fontFamily'], null, array(
                                                'class' => 'auto',
                                                'data-options' => Tools::jsonEncode($fontList)
                                            )) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['fontSize']['name'] ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['fontSize'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['lineHeight']['name'] ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['lineHeight'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['textAlign']['name'] ?></td>
                                    <td><?php cp_get_select($cpDefaults['layers']['textAlign'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['fontWeight']['name'] ?></td>
                                    <td><?php cp_get_select($cpDefaults['layers']['fontWeight'], null, array('class' => 'auto'), true) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['fontStyle']['name'] ?></td>
                                    <td><?php cp_get_select($cpDefaults['layers']['fontStyle'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['textDecoration']['name'] ?></td>
                                    <td><?php cp_get_select($cpDefaults['layers']['textDecoration'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['letterSpacing']['name'] ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['letterSpacing'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['color']['name'] ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['color'], null, array('class' => 'auto cp-colorpicker')) ?></td>
                                </tr>
                                <tr class="cp-adv">
                                    <td><?php echo $cpDefaults['layers']['minFontSize']['name'] ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['minFontSize'], null, array('class' => 'sublayerprop')) ?></td>
                                </tr>
                                <tr class="cp-adv">
                                    <td><?php echo $cpDefaults['layers']['minMobileFontSize']['name'] ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['minMobileFontSize'], null, array('class' => 'sublayerprop')) ?></td>
                                </tr>
                                <tr>
                                    <td><?php cp_e('Word-wrap') ?></td>
                                    <td><?php cp_get_checkbox($cpDefaults['layers']['wordWrap'], null, array('class' => 'auto')) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div>
            <div>
                <div>
                    <h5><?php cp_e('Misc') ?> <span>| <?php cp_e('other settings') ?></span></h5>
                    <div class="table-holder">
                        <table>
                            <tbody>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['background']['name'] ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['background'], null, array('class' => 'auto cp-colorpicker')) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['opacity']['name'] ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['opacity'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $cpDefaults['layers']['borderRadius']['name'] ?></td>
                                    <td><?php cp_get_input($cpDefaults['layers']['borderRadius'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr class="cp-adv">
                                    <td>
                                        <div>
                                            <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/blend-mode" target="_blank">
                                                <?php echo $cpDefaults['layers']['blendMode']['name'] ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?php cp_get_select($cpDefaults['layers']['blendMode'], null, array('class' => 'auto')) ?></td>
                                </tr>
                                <tr class="cp-adv">
                                    <td>
                                        <div>
                                            <a href="https://developer.mozilla.org/en/docs/Web/CSS/filter#Functions" target="_blank">
                                                <?php echo $cpDefaults['layers']['filter']['name'] ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?php cp_get_input($cpDefaults['layers']['filter'], null, array('class' => 'auto')) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="cp-adv">
                <div>
                    <h5><?php cp_e('Transforms') ?> <span>| <?php cp_e('between transitions') ?></span></h5>
                    <div class="textarea-helper">
                        <table>
                            <tr>
                                <td class="right"><?php echo $cpDefaults['layers']['rotate']['name'] ?></td>
                                <td><?php cp_get_input($cpDefaults['layers']['rotate'], null, array('class' => 'sublayerprop transforms')) ?> &deg;</td>
                                <td class="right"><?php echo $cpDefaults['layers']['scaleX']['name'] ?></td>
                                <td><?php cp_get_input($cpDefaults['layers']['scaleX'], null, array('class' => 'sublayerprop transforms')) ?></td>
                            </tr>
                            <tr>
                                <td class="right"><?php echo $cpDefaults['layers']['rotateX']['name'] ?></td>
                                <td><?php cp_get_input($cpDefaults['layers']['rotateX'], null, array('class' => 'sublayerprop transforms')) ?> &deg;</td>
                                <td class="right"><?php echo $cpDefaults['layers']['scaleY']['name'] ?></td>
                                <td><?php cp_get_input($cpDefaults['layers']['scaleY'], null, array('class' => 'sublayerprop transforms')) ?></td>
                            </tr>
                            <tr>
                                <td class="right"><?php echo $cpDefaults['layers']['rotateY']['name'] ?></td>
                                <td><?php cp_get_input($cpDefaults['layers']['rotateY'], null, array('class' => 'sublayerprop transforms')) ?> &deg;</td>
                                <td class="right"><?php echo $cpDefaults['layers']['skewX']['name'] ?></td>
                                <td><?php cp_get_input($cpDefaults['layers']['skewX'], null, array('class' => 'sublayerprop transforms')) ?> &deg;</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="right"><?php echo $cpDefaults['layers']['skewY']['name'] ?></td>
                                <td><?php cp_get_input($cpDefaults['layers']['skewY'], null, array('class' => 'sublayerprop transforms')) ?> &deg;</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="cp-adv">
                <h5><?php cp_e('Custom CSS') ?> <span>| <?php cp_e('write your own code') ?></span></h5>
                <div class="textarea-helper">
                    <textarea rows="5" cols="50" name="style" class="style" data-help="<?php cp_e('If you want to set style settings other then above, you can use here any CSS codes. Please make sure to write valid markup.') ?>"></textarea>
                </div>
            </div>
        </div>

    </div>
</script>
