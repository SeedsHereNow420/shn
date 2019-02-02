<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

if (defined('LS_INCLUDE')) {
    $lsDefaults = null;
    $slider = null;
}

$sDefs  =& $lsDefaults['slider'];
$sProps =& $slider['properties'];
?>

<!-- Slider title -->
<div class="ls-slider-titlewrap">
    <?php $sliderName = !empty($sProps['title']) ? htmlspecialchars(_ss($sProps['title'])) : ''; ?>
    <input type="text" name="title" value="<?php echo $sliderName ?>" id="title" autocomplete="off" placeholder="<?php ls_e('Type your slider name here', 'LayerSlider') ?>">
    <div class="ls-slider-slug">
        <?php ls_e('Slider slug', 'LayerSlider') ?>:<input type="text" name="slug" value="<?php echo !empty($sProps['slug']) ? $sProps['slug'] : '' ?>" autocomplete="off" placeholder="<?php ls_e('e.g. homepageslider', 'LayerSlider') ?>" data-help="Set a custom slider identifier to use in shortcodes instead of the database ID. Needs to be unique, and can contain only alphanumeric characters. This setting is optional.">
    </div>
</div>

<!-- Slider settings -->
<div class="ls-box ls-settings">
    <h3 class="header medium">
        <?php ls_e('Slider Settings', 'LayerSlider') ?>
        <div class="ls-slider-settings-advanced">
            <?php ls_e('Show advanced settings', 'LayerSlider') ?> <input type="checkbox" data-toggleitems=".ls-settings-contents .ls-advanced">
        </div>
    </h3>
    <div class="inner">
        <ul class="ls-settings-sidebar">
            <li data-deeplink="publish">
                <i class="dashicons dashicons-calendar-alt"></i>
                <strong><?php ls_e('Publish', 'LayerSlider') ?></strong>
            </li>
            <li data-deeplink="layout" class="active">
                <i class="dashicons dashicons-editor-distractionfree"></i>
                <strong><?php ls_e('Layout', 'LayerSlider') ?></strong>
            </li>
            <li data-deeplink="mobile">
                <i class="dashicons dashicons-smartphone"></i>
                <strong><?php ls_e('Mobile', 'LayerSlider') ?></strong>
            </li>
            <li data-deeplink="slideshow">
                <i class="dashicons dashicons-editor-video"></i>
                <strong><?php ls_e('Slideshow', 'LayerSlider') ?></strong>
            </li>
            <li data-deeplink="appearance">
                <i class="dashicons dashicons-admin-appearance"></i>
                <strong><?php ls_e('Appearance', 'LayerSlider') ?></strong>
            </li>
            <li data-deeplink="navigation">
                <i class="dashicons dashicons-image-flip-horizontal"></i>
                <strong><?php ls_e('Navigation Area', 'LayerSlider') ?></strong>
            </li>
            <li data-deeplink="thumbnav">
                <i class="dashicons dashicons-screenoptions"></i>
                <strong><?php ls_e('Thumbnail Navigation', 'LayerSlider') ?></strong>
            </li>
            <li data-deeplink="videos">
                <i class="dashicons dashicons-video-alt3"></i>
                <strong><?php ls_e('Videos', 'LayerSlider') ?></strong>
            </li>
            <li data-deeplink="yourlogo">
                <i class="dashicons dashicons-admin-post"></i>
                <strong><?php ls_e('YourLogo', 'LayerSlider') ?></strong>
            </li>
            <li data-deeplink="transition">
                <i class="dashicons dashicons-admin-settings"></i>
                <strong><?php ls_e('Default Options', 'LayerSlider') ?></strong>
            </li>
            <li data-deeplink="misc">
                <i class="dashicons dashicons-admin-generic"></i>
                <strong><?php ls_e('Misc', 'LayerSlider') ?></strong>
            </li>

        </ul>
        <div class="ls-settings-contents">
            <input type="hidden" name="sliderVersion" value="<?php echo LS_PLUGIN_VERSION ?>">
            <table>
                <!-- Publish -->
                <tbody>
                    <tr><th colspan="2"><?php echo $sDefs['status']['name'] ?></th></tr>
                    <tr>
                        <td colspan="2" class="hero">
                            <p>
                                <?php lsGetCheckbox($sDefs['status'], $sProps, array('class' => 'hero ls-publish-checkbox')); ?>
                                <?php echo $sDefs['status']['desc'] ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th class="half"><?php echo $sDefs['scheduleStart']['name'] ?></th>
                        <th class="half"><?php echo $sDefs['scheduleEnd']['name'] ?></th>
                    </tr>
                    <tr>
                        <td class="half">
                            <div class="ls-datepicker-wrapper">
                                <label><?php ls_e('Interpreted as:', 'LayerSlider') ?> <span></span></label>
                                <?php lsGetInput($sDefs['scheduleStart'], $sProps, array('class' => 'ls-datepicker-input', 'data-schedule-key' => 'schedule_start')); ?>
                            </div>
                        </td>
                        <td class="half">
                            <div class="ls-datepicker-wrapper">
                                <label><?php ls_e('Interpreted as:', 'LayerSlider') ?> <span></span></label>
                                <?php lsGetInput($sDefs['scheduleEnd'], $sProps, array('class' => 'ls-datepicker-input', 'data-schedule-key' => 'schedule_end')); ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="hero">
                            <div class="ls-schedule-desc"><?php echo $sDefs['scheduleStart']['desc'] ?></div>
                        </td>
                    </tr>
                </tbody>

                <!-- Layout -->
                <tbody class="active">
                    <tr>
                        <td><?php echo $sDefs['hook']['name'] ?></td>
                        <td>
                            <?php lsGetInput($sDefs['hook'], $sProps, array()); ?>
                            <a href="#misc"><i class="dashicons dashicons-admin-generic ls-conf"></i><?php ls_e('Configure') ?></a>
                        </td>
                        <td class="desc"><?php echo $sDefs['hook']['desc'] ?></td>
                    </tr>
                    <tr><th colspan="3"><?php ls_e('Slider type & dimensions', 'LayerSlider') ?></th></tr>
                    <tr>
                        <td colspan="3" class="ls-slider-dimensions">
                            <div data-type="fixedsize">
                                <img src="<?php echo LS_VIEWS_URL.'img/admin/layout-fixed.png' ?>">
                                <span><?php ls_e('Fixed size', 'LayerSlider') ?></span>
                            </div>

                            <div data-type="responsive">
                                <img src="<?php echo LS_VIEWS_URL.'img/admin/layout-responsive.png' ?>">
                                <span><?php ls_e('Responsive', 'LayerSlider') ?></span>
                            </div>

                            <div data-type="fullwidth">
                                <img src="<?php echo LS_VIEWS_URL.'img/admin/layout-full-width.png' ?>">
                                <span><?php ls_e('Full width', 'LayerSlider') ?></span>
                            </div>

                            <div data-type="fullsize">
                                <img src="<?php echo LS_VIEWS_URL.'img/admin/layout-full-screen.png' ?>">
                                <span><?php ls_e('Full size', 'LayerSlider') ?></span>
                            </div>
                            <?php lsGetInput($sDefs['type'], $sProps); ?>
                        </td>
                    </tr>
                    <?php
                    lsOptionRow('input', $sDefs['width'], $sProps, array(), 'ls-popup-hide');
                    lsOptionRow('input', $sDefs['height'], $sProps, array(), 'ls-popup-hide');
                    lsOptionRow('input', $sDefs['maxWidth'], $sProps, array(), 'ls-popup-hide');
                    lsOptionRow('input', $sDefs['responsiveUnder'], $sProps, array(), 'full-width-row ls-popup-hide');
                    lsOptionRow('select', $sDefs['fullSizeMode'], $sProps, array(), 'full-size-row ls-popup-hide');
                    lsOptionRow('checkbox', $sDefs['fitScreenWidth'], $sProps, array(), 'full-width-row full-size-row ls-popup-hide');
                    lsOptionRow('checkbox', $sDefs['allowFullscreen'], $sProps, array(), 'ls-popup-hide')
                    ?>

                    <tr class="ls-advanced ls-hidden"><th colspan="3"><?php ls_e('Other settings', 'LayerSlider') ?></th></tr>
                    <?php lsOptionRow('input', $sDefs['maxRatio'], $sProps); ?>
                    <tr class="ls-advanced ls-hidden">
                        <td style="vertical-align: top; padding-top: 10px;">
                            <div>
                                <i class="dashicons dashicons-flag" data-help="Advanced option"></i>
                                <?php echo $sDefs['insertMethod']['name'] ?>
                            </div>
                        </td>
                        <td>
                            <?php
                                lsGetSelect($sDefs['insertMethod'], $sProps);
                                lsGetInput($sDefs['insertSelector'], $sProps);
                            ?>
                        </td>
                        <td class="desc"><?php echo $sDefs['insertMethod']['desc'] ?></td>
                    </tr>
                    <?php
                    lsOptionRow('select', $sDefs['clipSlideTransition'], $sProps);
                    lsOptionRow('checkbox', $sDefs['preventSliderClip'], $sProps, array(), 'full-width-row full-size-row');
                    ?>
                </tbody>


                <!-- Mobile -->
                <tbody>
                    <?php
                    lsOptionRow('checkbox', $sDefs['slideOnSwipe'], $sProps);
                    lsOptionRow('checkbox', $sDefs['optimizeForMobile'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Control display by user agent', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('checkbox', $sDefs['disableOnMobile'], $sProps);
                    lsOptionRow('checkbox', $sDefs['disableOnTablet'], $sProps);
                    lsOptionRow('checkbox', $sDefs['disableOnDesktop'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Control display by device width', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('input', $sDefs['hideUnder'], $sProps);
                    lsOptionRow('input', $sDefs['hideOver'], $sProps);
                    ?>
                </tbody>

                <!-- Slideshow -->
                <tbody>
                    <tr><th colspan="3"><?php ls_e('Slideshow behavior', 'LayerSlider') ?></th></tr>
                    <tr>
                        <td><?php echo $sDefs['firstSlide']['name'] ?></td>
                        <td><?php lsGetInput($sDefs['firstSlide'], $sProps) ?></td>
                        <td class="desc"><?php echo $sDefs['firstSlide']['desc'] ?></td>
                    </tr>
                    <?php
                    lsOptionRow('checkbox', $sDefs['autoStart'], $sProps);
                    lsOptionRow('checkbox', $sDefs['pauseLayers'], $sProps);
                    lsOptionRow('checkbox', $sDefs['startInViewport'], $sProps);
                    lsOptionRow('select', $sDefs['pauseOnHover'], $sProps);
                    lsOptionRow('checkbox', $sDefs['hashChange'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Slideshow navigation', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('checkbox', $sDefs['keybNavigation'], $sProps);
                    lsOptionRow('checkbox', $sDefs['touchNavigation'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Play By Scroll', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('checkbox', $sDefs['playByScroll'], $sProps);
                    lsOptionRow('checkbox', $sDefs['playByScrollStart'], $sProps);
                    lsOptionRow('input', $sDefs['playByScrollSpeed'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Cycles', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('input', $sDefs['loops'], $sProps);
                    lsOptionRow('checkbox', $sDefs['forceLoopNumber'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Other settings', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('checkbox', $sDefs['twoWaySlideshow'], $sProps);
                    lsOptionRow('checkbox', $sDefs['shuffle'], $sProps);
                    ?>
                </tbody>

                <!-- Appearance -->
                <tbody>
                    <tr><th colspan="3"><?php ls_e('Slider appearance', 'LayerSlider') ?></th></tr>
                    <tr>
                        <td><?php ls_e('Skin', 'LayerSlider') ?></td>
                        <td>
                            <select name="skin">
                            <?php $sProps['skin'] = empty($sProps['skin']) ? $sDefs['skin']['value'] : $sProps['skin'] ?>
                            <?php $skins = LsSources::getSkins(); ?>
                            <?php foreach ($skins as $skin) : ?>
                                <?php $selected = ($skin['handle'] == $sProps['skin']) ? ' selected="selected"' : '' ?>
                                <option value="<?php echo $skin['handle'] ?>"<?php echo $selected ?>>
                                    <?php
                                    echo $skin['name'];
                                    if (!empty($skin['info']['note'])) {
                                        echo ' - ' . $skin['info']['note'];
                                    }
                                    ?>
                                </option>
                            <?php endforeach; ?>
                            </select>
                        </td>
                        <td class="desc"><?php echo $sDefs['skin']['desc'] ?></td>
                    </tr>
                    <?php
                    lsOptionRow('input', $sDefs['sliderFadeInDuration'], $sProps);
                    lsOptionRow('input', $sDefs['sliderClasses'], $sProps);
                    ?>
                    <tr>
                        <td><?php ls_e('Custom slider CSS', 'LayerSlider') ?></td>
                        <td colspan="2"><textarea name="sliderstyle" cols="30" rows="10"><?php echo !empty($sProps['sliderstyle']) ? $sProps['sliderstyle'] : $sDefs['sliderStyle']['value'] ?></textarea></td>
                    </tr>

                    <tr><th colspan="3"><?php ls_e('Slider global background', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('input', $sDefs['globalBGColor'], $sProps, array('class' => 'input ls-colorpicker minicolors-input'));
                    ?>
                    <tr>
                        <td><?php ls_e('Background image', 'LayerSlider') ?></td>
                        <td>
                            <?php $bgImage = !empty($sProps['backgroundimage']) ? $sProps['backgroundimage'] : null; ?>
                            <?php $bgImageId = !empty($sProps['backgroundimageId']) ? $sProps['backgroundimageId'] : null; ?>
                            <input type="hidden" name="backgroundimageId" value="<?php echo !empty($sProps['backgroundimageId']) ? $sProps['backgroundimageId'] : '' ?>">
                            <input type="hidden" name="backgroundimage" value="<?php echo !empty($sProps['backgroundimage']) ? $sProps['backgroundimage'] : '' ?>">
                            <div class="ls-image ls-global-background ls-upload" data-l10n-set="<?php ls_e('Click to set', 'LayerSlider') ?>" data-l10n-change="<?php ls_e('Click to change', 'LayerSlider') ?>">
                                <div><img src="<?php echo ls_apply_filters('ls_get_thumbnail', $bgImageId, $bgImage) ?>" alt=""></div>
                                <a href="#" class="dashicons dashicons-dismiss"></a>
                            </div>
                        </td>
                        <td class="desc"><?php echo $sDefs['globalBGImage']['desc'] ?></td>
                    </tr>
                    <?php
                    lsOptionRow('select', $sDefs['globalBGRepeat'], $sProps);
                    lsOptionRow('select', $sDefs['globalBGAttachment'], $sProps);
                    lsOptionRow('input', $sDefs['globalBGPosition'], $sProps, array('class' => 'input'));
                    ?>
                    <tr>
                        <td><?php echo $sDefs['globalBGSize']['name'] ?></td>
                        <td><?php lsGetInput($sDefs['globalBGSize'], $sProps, array('class' => 'input')) ?></div>
                        </td>
                        <td class="desc"><?php echo $sDefs['globalBGSize']['desc'] ?></td>
                    </tr>

                </tbody>

                <!-- Navigation Area -->
                <tbody>
                    <tr><th colspan="3"><?php ls_e('Show navigation buttons', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('checkbox', $sDefs['navPrevNextButtons'], $sProps);
                    lsOptionRow('checkbox', $sDefs['navStartStopButtons'], $sProps);
                    lsOptionRow('checkbox', $sDefs['navSlideButtons'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Navigation buttons on hover', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('checkbox', $sDefs['hoverPrevNextButtons'], $sProps);
                    lsOptionRow('checkbox', $sDefs['hoverSlideButtons'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Slideshow timers', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('checkbox', $sDefs['barTimer'], $sProps);
                    lsOptionRow('checkbox', $sDefs['circleTimer'], $sProps);
                    lsOptionRow('checkbox', $sDefs['slideBarTimer'], $sProps);
                    ?>
                </tbody>

                <!-- Thumbnail navigation -->
                <tbody>
                    <tr><th colspan="3"><?php ls_e('Appearance', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('select', $sDefs['thumbnailNavigation'], $sProps);
                    lsOptionRow('input', $sDefs['thumbnailAreaWidth'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Thumbnail dimensions', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('input', $sDefs['thumbnailWidth'], $sProps);
                    lsOptionRow('input', $sDefs['thumbnailHeight'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Thumbnail appearance', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('input', $sDefs['thumbnailActiveOpacity'], $sProps);
                    lsOptionRow('input', $sDefs['thumbnailInactiveOpacity'], $sProps);
                    ?>
                </tbody>

                <!-- Videos -->
                <tbody>
                    <?php
                    lsOptionRow('checkbox', $sDefs['autoPlayVideos'], $sProps);
                    lsOptionRow('select', $sDefs['autoPauseSlideshow'], $sProps);
                    lsOptionRow('select', $sDefs['youtubePreviewQuality'], $sProps);
                    ?>
                </tbody>


                <!-- YourLogo -->
                <tbody>
                    <tr>
                        <td><?php echo $sDefs['yourLogoImage']['name'] ?></td>
                        <td>
                            <?php $sProps['yourlogo'] = !empty($sProps['yourlogo']) ? $sProps['yourlogo'] : null; ?>
                            <?php $sProps['yourlogoId'] = !empty($sProps['yourlogoId']) ? $sProps['yourlogoId'] : null; ?>
                            <input type="hidden" name="yourlogoId" value="<?php echo !empty($sProps['yourlogoId']) ? $sProps['yourlogoId'] : '' ?>">
                            <input type="hidden" name="yourlogo" value="<?php echo !empty($sProps['yourlogo']) ? $sProps['yourlogo'] : '' ?>">
                            <div class="ls-image ls-upload ls-yourlogo-upload not-set" data-l10n-set="<?php ls_e('Click to set', 'LayerSlider') ?>" data-l10n-change="<?php ls_e('Click to change', 'LayerSlider') ?>">
                                <div><img src="<?php echo ls_apply_filters('ls_get_thumbnail', $sProps['yourlogoId'], $sProps['yourlogo']) ?>" alt=""></div>
                                <a href="#" class="dashicons dashicons-dismiss"></a>
                            </div>
                        </td>
                        <td class="desc"><?php echo $sDefs['yourLogoImage']['desc'] ?></td>
                    </tr>
                    <tr>
                        <td><?php echo $sDefs['yourLogoStyle']['name'] ?></td>
                        <td colspan="2">
                            <textarea name="yourlogostyle" cols="30" rows="10"><?php echo !empty($sProps['yourlogostyle']) ? $sProps['yourlogostyle'] : $sDefs['yourLogoStyle']['value'] ?></textarea>
                        </td>
                    </tr>
                    <?php
                    lsOptionRow('input', $sDefs['yourLogoLink'], $sProps);
                    lsOptionRow('select', $sDefs['yourLogoTarget'], $sProps);
                    ?>
                </tbody>

                <!-- Transition Defaults -->
                <tbody>
                    <tr><th colspan="3"><?php ls_e('Slide background defaults', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('select', $sDefs['slideBGSize'], $sProps);
                    lsOptionRow('select', $sDefs['slideBGPosition'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php ls_e('Parallax defaults', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('input', $sDefs['parallaxSensitivity'], $sProps);
                    lsOptionRow('select', $sDefs['parallaxCenterLayers'], $sProps);
                    lsOptionRow('input', $sDefs['parallaxCenterDegree'], $sProps);
                    lsOptionRow('checkbox', $sDefs['parallaxScrollReverse'], $sProps);
                    ?>
                    <tr class="ls-advanced ls-hidden"><th colspan="3"><?php ls_e('Misc', 'LayerSlider') ?></th></tr>
                    <?php
                    lsOptionRow('input', $sDefs['forceLayersOutDuration'], $sProps);
                    ?>
                </tbody>

                <!-- Misc -->
                <tbody>
                    <?php
                    // lsOptionRow('checkbox', $sDefs['relativeURLs'], $sProps);
                    // lsOptionRow('checkbox', $sDefs['useSrcset'], $sProps);
                    lsOptionRow('checkbox', $sDefs['allowRestartOnResize'], $sProps);
                    lsOptionRow('select', $sDefs['preferBlendMode'], $sProps);
                    ?>
                    <tr>
                        <td><?php ls_e('Slider preview image', 'LayerSlider') ?></td>
                        <td>
                            <?php $preview = !empty($slider['meta']['preview']) ? $slider['meta']['preview'] : null; ?>
                            <?php $previewId = !empty($slider['meta']['previewId']) ? $slider['meta']['previewId'] : null; ?>
                            <input type="hidden" name="previewId" value="<?php echo !empty($slider['meta']['previewId']) ? $slider['meta']['previewId'] : '' ?>">
                            <input type="hidden" name="preview" value="<?php echo !empty($slider['meta']['preview']) ? $slider['meta']['preview'] : '' ?>">
                            <div class="ls-image ls-slider-preview ls-upload" data-l10n-set="<?php ls_e('Click to set', 'LayerSlider') ?>" data-l10n-change="<?php ls_e('Click to change', 'LayerSlider') ?>">
                                <div><img src="<?php echo ls_apply_filters('ls_get_thumbnail', $previewId, $preview) ?>" alt=""></div>
                                <a href="#" class="dashicons dashicons-dismiss"></a>
                            </div>
                        </td>
                        <td class="desc"><?php ls_e('The preview image you can see in your list of sliders.', 'LayerSlider') ?></td>
                    </tr>
                </tbody>

            </table>
        </div>
        <div class="clear"></div>
    </div>
</div>
