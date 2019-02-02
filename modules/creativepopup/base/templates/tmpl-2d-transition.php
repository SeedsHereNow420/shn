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
<script type="text/html" id="cp-2d-transition-template">
    <div class="cp-transition-item">
        <table class="cp-box cp-tr-settings bottomborder">
            <thead>
                <tr>
                    <td colspan="2"><?php cp_e('Preview') ?></td>
                    <td colspan="2"><?php cp_e('Tiles') ?></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">
                        <div class="cp-builder-preview cp-transition-preview">
                            <img src="<?php echo CP_VIEWS_URL ?>img/admin/sample_slide_1.png" alt="preview image">
                        </div>
                    </td>
                    <td colspan="2">
                        <table class="tiles">
                            <tbody>
                                <tr>
                                    <td class="right"><?php cp_e('Rows') ?></td>
                                    <td><input type="text" name="rows" value="1" data-help="<?php cp_e('<i>number</i> or <i>min,max</i> If you specify a value greater than 1, Creative Popup will cut your page background image into tiles. You can specify here how many rows of your transition should have. If you specify two numbers separated with a comma, Creative Popup will use that as a range and pick a random number between your values.') ?>"></td>
                                    <td class="right"><?php cp_e('Cols') ?></td>
                                    <td><input type="text" name="cols" value="1" data-help="<?php cp_e('<i>number</i> or <i>min,max</i> If you specify a value greater than 1, Creative Popup will cut your page background image into tiles. You can specify here how many columns of your transition should have. If you specify two numbers separated with a comma, Creative Popup will use that as a range and pick a random number between your values.') ?>"></td>
                                </tr>
                            </tbody>
                            <tbody class="tile">
                                <tr>
                                    <td class="right"><?php cp_e('Delay') ?></td>
                                    <td><input type="text" name="delay" value="75" data-help="<?php cp_e('You can apply a delay between the tiles and postpone their animation relative to each other.') ?>"></td>
                                    <td class="right"><?php cp_e('Sequence') ?></td>
                                    <td>
                                        <select name="sequence" data-help="<?php cp_e('You can control the animation order of the tiles here.') ?>">
                                            <option value="forward"><?php cp_e('Forward') ?></option>
                                            <option value="reverse"><?php cp_e('Reverse') ?></option>
                                            <option value="col-forward"><?php cp_e('Col-forward') ?></option>
                                            <option value="col-reverse"><?php cp_e('Col-reverse') ?></option>
                                            <option value="random"><?php cp_e('Random') ?></option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <td colspan="4"><?php cp_e('Transition') ?></td>
                </tr>
            </thead>
            <tbody class="transition">
                <tr>
                    <td class="right"><?php cp_e('Duration') ?></td>
                    <td><input type="text" name="duration" value="1000" data-help="<?php cp_e('The duration of the animation. This value is in millisecs, so the value 1000 measn 1 second.') ?>"></td>
                    <td class="right"><a href="http://easings.net/" target="_blank"><?php cp_e('Easing') ?></a></td>
                    <td>
                        <select name="easing" data-help="<?php cp_e('The timing function of the animation. With this function you can manipulate the movement of the animated object. Please click on the link next to this select field to open easings.net for more information and real-time examples.') ?>">
                            <option>linear</option>
                            <option>swing</option>
                            <option>easeInQuad</option>
                            <option>easeOutQuad</option>
                            <option>easeInOutQuad</option>
                            <option>easeInCubic</option>
                            <option>easeOutCubic</option>
                            <option>easeInOutCubic</option>
                            <option>easeInQuart</option>
                            <option>easeOutQuart</option>
                            <option>easeInOutQuart</option>
                            <option>easeInQuint</option>
                            <option>easeOutQuint</option>
                            <option selected="selected">easeInOutQuint</option>
                            <option>easeInSine</option>
                            <option>easeOutSine</option>
                            <option>easeInOutSine</option>
                            <option>easeInExpo</option>
                            <option>easeOutExpo</option>
                            <option>easeInOutExpo</option>
                            <option>easeInCirc</option>
                            <option>easeOutCirc</option>
                            <option>easeInOutCirc</option>
                            <option>easeInElastic</option>
                            <option>easeOutElastic</option>
                            <option>easeInOutElastic</option>
                            <option>easeInBack</option>
                            <option>easeOutBack</option>
                            <option>easeInOutBack</option>
                            <option>easeInBounce</option>
                            <option>easeOutBounce</option>
                            <option>easeInOutBounce</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="right"><?php cp_e('Type') ?></td>
                    <td>
                        <select name="type" data-help="<?php cp_e('The type of the animation, either slide, fade or both (mixed).') ?>">
                            <option value="slide"><?php cp_e('Slide') ?></option>
                            <option value="fade"><?php cp_e('Fade') ?></option>
                            <option value="mixed"><?php cp_e('Mixed') ?></option>
                        </select>
                    </td>
                    <td class="right"><?php cp_e('Direction') ?></td>
                    <td>
                        <select name="direction" data-help="<?php cp_e('The direction of the slide or mixed animation if you\'ve chosen this type in the previous settings.') ?>">
                            <option value="top"><?php cp_e('Top') ?></option>
                            <option value="right"><?php cp_e('Right') ?></option>
                            <option value="bottom"><?php cp_e('Bottom') ?></option>
                            <option value="left"><?php cp_e('Left') ?></option>
                            <option value="random"><?php cp_e('Random') ?></option>
                            <option value="topleft"><?php cp_e('Top left') ?></option>
                            <option value="topright"><?php cp_e('Top right') ?></option>
                            <option value="bottomleft"><?php cp_e('Bottom left') ?></option>
                            <option value="bottomright"><?php cp_e('Bottom right') ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="right"><?php cp_e('RotateX') ?></td>
                    <td><input type="text" name="rotateX" value="0" data-help="<?php cp_e('The initial rotation of the individual tiles which will be animated to the default (0deg) value around the X axis. You can use negatuve values.') ?>"></td>
                    <td class="right"><?php cp_e('RotateY') ?></td>
                    <td><input type="text" name="rotateY" value="0" data-help="<?php cp_e('The initial rotation of the individual tiles which will be animated to the default (0deg) value around the Y axis. You can use negatuve values.') ?>"></td>
                </tr>
                <tr>
                    <td class="right"><?php cp_e('RotateZ') ?></td>
                    <td><input type="text" name="rotate" value="0" data-help="<?php cp_e('The initial rotation of the individual tiles which will be animated to the default (0deg) value around the Z axis. You can use negatuve values.') ?>"></td>
                    <td class="right"><?php cp_e('Scale') ?></td>
                    <td><input type="text" name="scale" value="1.0" data-help="<?php cp_e('The initial scale of the individual tiles which will be animated to the default (1.0) value.') ?>"></td>
                </tr>
            </tbody>
        </table>
    </div>
</script>