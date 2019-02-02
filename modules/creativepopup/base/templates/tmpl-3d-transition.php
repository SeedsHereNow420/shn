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
<script type="text/html" id="cp-3d-transition-template">
    <div class="cp-transition-item">
        <table class="cp-box cp-tr-settings">
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
                                <tr>
                                    <td class="right"><?php cp_e('Depth') ?></td>
                                    <td colspan="3">
                                        <label data-help="<?php cp_e('The script tries to identify the optimal depth for your rotated objects (tiles). With this option you can force your objects to have a large depth when performing 180 degree (and its multiplies) rotation.') ?>">
                                            <input type="checkbox" class="checkbox" name="depth" value="large">
                                            <?php cp_e('Large depth') ?>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <td colspan="4">
                        <?php cp_e('Before animation') ?>
                        <p class="cp-builder-checkbox">
                            <label><input type="checkbox" class="cp-builder-collapse-toggle"> <?php cp_e('Enabled') ?></label>
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody class="before cp-builder-collapsed">
                <tr>
                    <td class="right"><?php cp_e('Duration') ?></td>
                    <td><input type="text" name="duration" value="1000" data-help="<?php cp_e('The duration of your animation. This value is in millisecs, so the value 1000 means 1 second.') ?>"></td>
                    <td class="right"><a href="http://easings.net/" target="_blank"><?php cp_e('Easing') ?></a></td>
                    <td>
                        <select name="easing" data-help="<?php cp_e('The timing function of the animation. With this function you can manipulate the movement of the animated object. Please click on the link next to this select field to open easings.net for more information and real-time examples.') ?>">
                            <option>linear</option>
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
                            <option>easeInBack</option>
                            <option>easeOutBack</option>
                            <option>easeInOutBack</option>
                        </select>
                    </td>
                </tr>
                <tr class="transition">
                    <td colspan="4">
                        <ul class="cp-tr-tags"></ul>
                        <p class="cp-tr-add-property">
                            <a href="#" class="cp-icon-tr-add"><i class="dashicons dashicons-plus"></i><?php cp_e('Add new') ?></a>
                            <select>
                                <option value="scale3d,0.8"><?php cp_e('Scale3D') ?></option>
                                <option value="rotateX,90"><?php cp_e('RotateX') ?></option>
                                <option value="rotateY,90"><?php cp_e('RotateY') ?></option>
                                <option value="delay,200"><?php cp_e('Delay') ?></option>
                            </select>
                        </p>
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <td colspan="4">
                        <?php cp_e('Animation') ?>
                    </td>
                </tr>
            </thead>
            <tbody class="animation">
                <tr>
                    <td class="right"><?php cp_e('Duration') ?></td>
                    <td><input type="text" name="duration" value="1000" data-help="<?php cp_e('The duration of your animation. This value is in millisecs, so the value 1000 means 1 second.') ?>"></td>
                    <td class="right"><a href="http://easings.net/" target="_blank"><?php cp_e('Easing') ?></a></td>
                    <td>
                        <select name="easing" data-help="<?php cp_e('The timing function of the animation. With this function you can manipulate the movement of the animated object. Please click on the link next to this select field to open easings.net for more information and real-time examples.') ?>">
                            <option>linear</option>
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
                            <option>easeInBack</option>
                            <option>easeOutBack</option>
                            <option>easeInOutBack</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="right"><?php cp_e('Direction') ?></td>
                    <td>
                        <select name="direction" data-help="<?php cp_e('The direction of rotation.') ?>">
                            <option value="vertical"><?php cp_e('Vertical'); ?></option>
                            <option value="horizontal" selected="selected"><?php cp_e('Horizontal') ?></option>
                        </select>
                    </td>
                </tr>
                <tr class="transition">
                    <td colspan="4">
                        <ul class="cp-tr-tags">
                            <li>
                                <p>
                                    <span><?php cp_e('RotateX') ?></span>
                                    <input type="text" name="rotateY" value="90">
                                </p>
                                <a href="#" class="dashicons dashicons-dismiss"></a>
                            </li>
                        </ul>
                        <p class="cp-tr-add-property">
                            <a href="#" class="cp-icon-tr-add"><i class="dashicons dashicons-plus"></i><?php cp_e('Add new') ?></a>
                            <select>
                                <option value="scale3d,0.8"><?php cp_e('Scale3D') ?></option>
                                <option value="rotateX,90"><?php cp_e('RotateX') ?></option>
                                <option value="rotateY,90"><?php cp_e('RotateY') ?></option>
                                <option value="delay,200"><?php cp_e('Delay') ?></option>
                            </select>
                        </p>
                    </td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <td colspan="4">
                        <?php cp_e('After animation') ?>
                        <p class="cp-builder-checkbox">
                            <label><input type="checkbox" class="cp-builder-collapse-toggle"> <?php cp_e('Enabled') ?></label>
                        </p>
                    </td>
                </tr>
            </thead>
            <tbody class="after cp-builder-collapsed">
                <tr>
                    <td class="right"><?php cp_e('Duration') ?></td>
                    <td><input type="text" name="duration" value="1000" data-help="<?php cp_e('The duration of your animation. This value is in millisecs, so the value 1000 means 1 second.') ?>"></td>
                    <td class="right"><a href="http://easings.net/" target="_blank"><?php cp_e('Easing') ?></a></td>
                    <td>
                        <select name="easing" data-help="<?php cp_e('The timing function of the animation. With this function you can manipulate the movement of the animated object. Please click on the link next to this select field to open easings.net for more information and real-time examples.') ?>">
                            <option>linear</option>
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
                            <option>easeInBack</option>
                            <option>easeOutBack</option>
                            <option>easeInOutBack</option>
                        </select>
                    </td>
                </tr>
                <tr class="transition">
                    <td colspan="4">
                        <ul class="cp-tr-tags"></ul>
                        <p class="cp-tr-add-property">
                            <a href="#" class="cp-icon-tr-add"><i class="dashicons dashicons-plus"></i><?php cp_e('Add new') ?></a>
                            <select>
                                <option value="scale3d,0.8"><?php cp_e('Scale3D') ?></option>
                                <option value="rotateX,90"><?php cp_e('RotateX') ?></option>
                                <option value="rotateY,90"><?php cp_e('RotateY') ?></option>
                                <option value="delay,200"><?php cp_e('Delay') ?></option>
                            </select>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</script>