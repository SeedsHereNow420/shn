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
    $sDefs = null;
    $sProps = null;
    $popup = null;
}
?>

<!-- Popup settings -->
<div class="cp-box cp-settings">
    <h3 class="header medium">
        <?php cp_e('More Settings') ?>
        <div class="cp-slider-settings-advanced">
            <?php cp_e('Show advanced settings') ?> <input type="checkbox" data-toggleitems=".cp-settings-contents .cp-advanced">
        </div>
    </h3>
    <div class="inner">
        <ul class="cp-settings-sidebar">
            <li data-deeplink="mobile" class="active">
                <i class="dashicons dashicons-smartphone"></i>
                <strong><?php cp_e('Mobile') ?></strong>
            </li>
            <li data-deeplink="pageshow">
                <i class="dashicons dashicons-editor-video"></i>
                <strong><?php cp_e('Pageshow') ?></strong>
            </li>
            <li data-deeplink="skin">
                <i class="dashicons dashicons-admin-appearance"></i>
                <strong><?php cp_e('Skin') ?></strong>
            </li>
            <li data-deeplink="navigation">
                <i class="dashicons dashicons-image-flip-horizontal"></i>
                <strong><?php cp_e('Navigation Area') ?></strong>
            </li>
            <li data-deeplink="thumbnav">
                <i class="dashicons dashicons-screenoptions"></i>
                <strong><?php cp_e('Thumbnail Navigation') ?></strong>
            </li>
            <li data-deeplink="videos">
                <i class="dashicons dashicons-video-alt3"></i>
                <strong><?php cp_e('Videos') ?></strong>
            </li>
            <li data-deeplink="transition">
                <i class="dashicons dashicons-admin-settings"></i>
                <strong><?php cp_e('Default Options') ?></strong>
            </li>
            <li data-deeplink="misc">
                <i class="dashicons dashicons-admin-generic"></i>
                <strong><?php cp_e('Misc') ?></strong>
            </li>
            <li data-deeplink="callbacks">
                <i class="dashicons dashicons-redo"></i>
                <strong><?php cp_e('Event Callbacks') ?></strong>
            </li>
        </ul>
        <div class="cp-settings-contents">
            <input type="hidden" name="popupVersion" value="<?php echo CP_PLUGIN_VERSION ?>">
            <table>
                <!-- Mobile -->
                <tbody class="active">
                    <?php
                    cp_option_row('checkbox', $sDefs['slideOnSwipe'], $sProps);
                    cp_option_row('checkbox', $sDefs['optimizeForMobile'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php cp_e('Control display by device width', 'LayerSlider') ?></th></tr>
                    <?php
                    cp_option_row('input', $sDefs['hideUnder'], $sProps);
                    cp_option_row('input', $sDefs['hideOver'], $sProps);
                    ?>
                </tbody>

                <!-- Slideshow -->
                <tbody>
                    <tr><th colspan="3"><?php cp_e('Pageshow behavior') ?></th></tr>
                    <tr>
                        <td><?php echo $sDefs['firstSlide']['name'] ?></td>
                        <td><?php cp_get_input($sDefs['firstSlide'], $sProps) ?></td>
                        <td class="desc"><?php echo $sDefs['firstSlide']['desc'] ?></td>
                    </tr>
                    <?php
                    cp_option_row('checkbox', $sDefs['autoStart'], $sProps);
                    cp_option_row('checkbox', $sDefs['pauseLayers'], $sProps);
                    cp_option_row('select', $sDefs['pauseOnHover'], $sProps);
                    cp_option_row('checkbox', $sDefs['hashChange'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php cp_e('Navigation between pages') ?></th></tr>
                    <?php
                    cp_option_row('checkbox', $sDefs['keybNavigation'], $sProps);
                    cp_option_row('checkbox', $sDefs['touchNavigation'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php cp_e('Cycles') ?></th></tr>
                    <?php
                    cp_option_row('input', $sDefs['loops'], $sProps);
                    cp_option_row('checkbox', $sDefs['forceLoopNumber'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php cp_e('Other settings') ?></th></tr>
                    <?php
                    cp_option_row('checkbox', $sDefs['twoWaySlideshow'], $sProps);
                    cp_option_row('checkbox', $sDefs['shuffle'], $sProps);
                    ?>
                </tbody>

                <!-- Skin -->
                <tbody>
                    <tr>
                        <td><?php cp_e('Skin') ?></td>
                        <td>
                            <select name="skin">
                            <?php $sProps['skin'] = empty($sProps['skin']) ? $sDefs['skin']['value'] : $sProps['skin'] ?>
                            <?php $skins = CpSources::getSkins(); ?>
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
                    cp_option_row('input', $sDefs['sliderFadeInDuration'], $sProps);
                    cp_option_row('input', $sDefs['popupClasses'], $sProps);
                    ?>
                    <tr>
                        <td><?php cp_e('Custom popup style') ?></td>
                        <td colspan="2"><textarea name="sliderstyle" cols="30" rows="10"><?php echo !empty($sProps['sliderstyle']) ? $sProps['sliderstyle'] : $sDefs['sliderStyle']['value'] ?></textarea></td>
                    </tr>
                </tbody>

                <!-- Navigation Area -->
                <tbody>
                    <tr><th colspan="3"><?php cp_e('Show navigation buttons') ?></th></tr>
                    <?php
                    cp_option_row('checkbox', $sDefs['navPrevNextButtons'], $sProps);
                    cp_option_row('checkbox', $sDefs['navStartStopButtons'], $sProps);
                    cp_option_row('checkbox', $sDefs['navSlideButtons'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php cp_e('Navigation buttons on hover') ?></th></tr>
                    <?php
                    cp_option_row('checkbox', $sDefs['hoverPrevNextButtons'], $sProps);
                    cp_option_row('checkbox', $sDefs['hoverSlideButtons'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php cp_e('Pageshow timers') ?></th></tr>
                    <?php
                    cp_option_row('checkbox', $sDefs['barTimer'], $sProps);
                    cp_option_row('checkbox', $sDefs['circleTimer'], $sProps);
                    cp_option_row('checkbox', $sDefs['slideBarTimer'], $sProps);
                    ?>
                </tbody>

                <!-- Thumbnail navigation -->
                <tbody>
                    <tr><th colspan="3"><?php cp_e('Appearance') ?></th></tr>
                    <?php
                    cp_option_row('select', $sDefs['thumbnailNavigation'], $sProps);
                    cp_option_row('input', $sDefs['thumbnailAreaWidth'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php cp_e('Thumbnail dimensions') ?></th></tr>
                    <?php
                    cp_option_row('input', $sDefs['thumbnailWidth'], $sProps);
                    cp_option_row('input', $sDefs['thumbnailHeight'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php cp_e('Thumbnail appearance') ?></th></tr>
                    <?php
                    cp_option_row('input', $sDefs['thumbnailActiveOpacity'], $sProps);
                    cp_option_row('input', $sDefs['thumbnailInactiveOpacity'], $sProps);
                    ?>
                </tbody>

                <!-- Videos -->
                <tbody>
                    <?php
                    cp_option_row('checkbox', $sDefs['autoPlayVideos'], $sProps);
                    cp_option_row('select', $sDefs['autoPauseSlideshow'], $sProps);
                    cp_option_row('select', $sDefs['youtubePreviewQuality'], $sProps);
                    ?>
                </tbody>

                <!-- Transition Defaults -->
                <tbody>
                    <tr><th colspan="3"><?php cp_e('Page background defaults') ?></th></tr>
                    <?php
                    cp_option_row('select', $sDefs['slideBGSize'], $sProps);
                    cp_option_row('select', $sDefs['slideBGPosition'], $sProps);
                    ?>
                    <tr><th colspan="3"><?php cp_e('Parallax defaults') ?></th></tr>
                    <?php
                    cp_option_row('input', $sDefs['parallaxSensitivity'], $sProps);
                    cp_option_row('select', $sDefs['parallaxCenterLayers'], $sProps);
                    cp_option_row('input', $sDefs['parallaxCenterDegree'], $sProps);
                    cp_option_row('checkbox', $sDefs['parallaxScrollReverse'], $sProps);
                    ?>
                    <tr class="cp-advanced cp-hidden"><th colspan="3"><?php cp_e('Misc') ?></th></tr>
                    <?php
                    cp_option_row('input', $sDefs['forceLayersOutDuration'], $sProps);
                    ?>
                </tbody>

                <!-- Misc -->
                <tbody>
                    <?php
                    cp_option_row('checkbox', $sDefs['allowRestartOnResize'], $sProps);
                    cp_option_row('select', $sDefs['preferBlendMode'], $sProps);
                    ?>
                    <tr>
                        <td><?php cp_e('Popup preview image') ?></td>
                        <td>
                            <?php $preview = !empty($popup['meta']['preview']) ? $popup['meta']['preview'] : null; ?>
                            <?php $previewId = !empty($popup['meta']['previewId']) ? $popup['meta']['previewId'] : null; ?>
                            <input type="hidden" name="previewId" value="<?php echo !empty($popup['meta']['previewId']) ? $popup['meta']['previewId'] : '' ?>">
                            <input type="hidden" name="preview" value="<?php echo !empty($popup['meta']['preview']) ? $popup['meta']['preview'] : '' ?>">
                            <div class="cp-image cp-slider-preview cp-upload" data-l10n-set="<?php cp_e('Click to set') ?>" data-l10n-change="<?php cp_e('Click to change') ?>">
                                <div><img src="<?php echo cp_apply_filters('cp_get_thumbnail', $previewId, $preview) ?>" alt=""></div>
                                <a href="#" class="dashicons dashicons-dismiss"></a>
                            </div>
                        </td>
                        <td class="desc"><?php cp_e('The preview image you can see in your list of popups.') ?></td>
                    </tr>
                </tbody>

                <!-- Event Callbacks -->
                <tbody>
                    <tr>
                        <td class="cp-callback" style="text-align: left; font-weight: 400;">

                            <div class="cp-notification-info">
                                <i class="dashicons dashicons-info"> </i>
                                <?php echo sprintf(cp__('Please read our %sonline documentation%s before start using the API.'), '<a href="http://docs.webshopworks.com/creative-popup" target="_blank">', '</a>') ?>
                            </div>

                            <div class="cp-callback-separator">Init Events</div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">popupWillLoad
                                    <figure><span>|</span> <?php cp_e('Fires before parsing user settings and rendering the UI.') ?></figure>
                                </h3>
                                <textarea name="popupWillLoad" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">popupDidLoad
                                    <figure><span>|</span> <?php cp_e('Fires when the popup is fully initialized and its DOM nodes become accessible.') ?></figure>
                                </h3>
                                <textarea name="popupDidLoad" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-callback-separator"><?php cp_e('Popup Events') ?></div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">popupWillOpen
                                    <figure><span>|</span> <?php cp_e('Fires when the Popup starts its opening transition and becomes visible.') ?></figure>
                                </h3>
                                <textarea name="popupWillOpen" data-event-data="false" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">popupDidOpen
                                    <figure><span>|</span> <?php cp_e('Fires when the Popup completed its opening transition.') ?></figure>
                                </h3>
                                <textarea name="popupDidOpen" data-event-data="false" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">popupWillClose
                                    <figure><span>|</span> <?php cp_e('Fires when the Popup stars its closing transition.') ?></figure>
                                </h3>
                                <textarea name="popupWillClose" data-event-data="false" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">popupDidClose
                                    <figure><span>|</span> <?php cp_e('Fires when the Popup completed its closing transition and became hidden.') ?></figure>
                                </h3>
                                <textarea name="popupDidClose" data-event-data="false" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-callback-separator"><?php cp_e('Resize Events') ?></div>

                            <div class="cp-box cp-callback-box side">
                                <h3 class="header">popupWillResize
                                    <figure><span>|</span> <?php cp_e('Fires before the popup renders resize events.') ?></figure>
                                </h3>
                                <textarea name="popupWillResize" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">popupDidResize
                                    <figure><span>|</span> <?php cp_e('Fires after the popup has rendered resize events.') ?></figure>
                                </h3>
                                <textarea name="popupDidResize" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-callback-separator"><?php cp_e('Pageshow Events') ?></div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageshowStateDidChange
                                    <figure><span>|</span> <?php cp_e('Fires upon every pageshow state change, which may not influence the playing status.') ?></figure>
                                </h3>
                                <textarea name="pageshowStateDidChange" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageshowDidPause
                                    <figure><span>|</span> <?php cp_e('Fires when the pageshow pauses from playing status.') ?></figure>
                                </h3>
                                <textarea name="pageshowDidPause" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box side">
                                <h3 class="header">pageshowDidResume
                                    <figure><span>|</span> <?php cp_e('Fires when the pageshow resumes from paused status.') ?></figure>
                                </h3>
                                <textarea name="pageshowDidResume" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-callback-separator"><?php cp_e('Page Change Events') ?></div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageChangeWillStart
                                    <figure><span>|</span> <?php cp_e('Signals when the popup wants to change pages, and is your last chance to divert it or intervene in any way.') ?></figure>
                                </h3>
                                <textarea name="pageChangeWillStart" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageChangeDidStart
                                    <figure><span>|</span> <?php cp_e('Fires when the popup has started a page change.') ?></figure>
                                </h3>
                                <textarea name="pageChangeDidStart" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageChangeWillComplete
                                    <figure><span>|</span> <?php cp_e('Fires before completing a page change.') ?></figure>
                                </h3>
                                <textarea name="pageChangeWillComplete" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageChangeDidComplete
                                    <figure><span>|</span> <?php cp_e('Fires after a page change has completed and the page indexes have been updated. ') ?></figure>
                                </h3>
                                <textarea name="pageChangeDidComplete" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-callback-separator"><?php cp_e('Page Timeline Events') ?></div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageTimelineDidCreate
                                    <figure><span>|</span> <?php cp_e("Fires when the current page's animation timeline (e.g. your layers) becomes accessible for interfacing.") ?></figure>
                                </h3>
                                <textarea name="pageTimelineDidCreate" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, data) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageTimelineDidUpdate
                                    <figure><span>|</span> <?php cp_e("Fires rapidly (at each frame) throughout the entire page while playing, including reverse playback.") ?></figure>
                                </h3>
                                <textarea name="pageTimelineDidUpdate" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, timeline) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageTimelineDidStart
                                    <figure><span>|</span> <?php cp_e("Fires when the current page's animation timeline (e.g. your layers) has started playing.") ?></figure>
                                </h3>
                                <textarea name="pageTimelineDidStart" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageTimelineDidComplete
                                    <figure><span>|</span> <?php cp_e("Fires when the current page's animation timeline (e.g. layer transitions) has completed.") ?></figure>
                                </h3>
                                <textarea name="pageTimelineDidComplete" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">pageTimelineDidReverseComplete
                                    <figure><span>|</span> <?php cp_e('Fires when all reversed animations have reached the beginning of the current page.') ?></figure>
                                </h3>
                                <textarea name="pageTimelineDidReverseComplete" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event, popup) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-callback-separator"><?php cp_e('Destroy Events') ?></div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">popupDidDestroy
                                    <figure><span>|</span> <?php cp_e('Fires when the popup destructor has finished and it is safe to remove the popup from the DOM.') ?></figure>
                                </h3>
                                <textarea name="popupDidDestroy" data-event-data="false" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event) {\n\t\n}" ?></textarea>
                            </div>

                            <div class="cp-box cp-callback-box">
                                <h3 class="header">popupDidRemove
                                    <figure><span>|</span> <?php cp_e('Fires when the popup has been removed from the DOM when using the <i>destroy</i> API method.') ?></figure>
                                </h3>
                                <textarea name="popupDidRemove" data-event-data="false" cols="20" rows="5" class="cp-codemirror"><?php echo "function(event) {\n\t\n}" ?></textarea>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="clear"></div>
    </div>
</div>
