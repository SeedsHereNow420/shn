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
<script type="text/html" id="tmpl-embed-slider">
    <div id="ls-embed-modal-window">
        <header>
            <h1><?php ls_e('Embed Slider', 'LayerSlider') ?></h1>
            <b class="dashicons dashicons-no"></b>
        </header>
        <div class="km-ui-modal-scrollable">
            <div class="columns clearfix">
                <div class="ls-half">
                    <div>
                        <h3><?php ls_e('Easiest Method: Module Position', 'LayerSlider') ?></h3>
                        <p class="ls-modpos">
                            <input type="text" placeholder="<?php ls_e('- None -') ?>" class="km-combo-input" data-options='<?php echo ls_get_hook_list() ?>' data-hook /><i class="dashicons dashicons-update ls-hook-update"></i>
                        </p>
                        <p><?php ls_e("This is the most commonly used method. Just select a hook from the list, and it will appear on your frontoffice. (This can be also adjusted in the Slider Settings / Layout tab.)", 'LayerSlider') ?></p>
                        <p><?php ls_e("In Slider Settings / Misc tab you can also define on which Pages and Categories will it appear. There are additional filters like Shop and Language as well.", 'LayerSlider') ?></p>
                    </div>
                </div>
                <div class="ls-half">
                    <div>
                        <h3><?php ls_e('Alternate Method: Shortcode', 'LayerSlider') ?></h3>
                        <p>
                            <input type="text" class="shortcode" readonly="readonly" onclick="this.focus(); this.select();">
                        </p>
                        <p><?php ls_e("Shortcodes can be inserted into content, like CMS page, category or product description. This can help you to place a slider into a suitable area, even if there is no available hook there. To use that is quite easy, just need to place the shortcode into the content editor, where number is the ID of the slider (you can also use slug there if you set that in the slider settings).", 'LayerSlider') ?></p>
                    </div>
                </div>
            </div>
            <div class="ls-separator">
                <div>
                    <?php ls_e('We also have a video tutorial about how easy to embed Creative Slider:', 'LayerSlider') ?>
                    [ <a href="https://youtu.be/FF7_wd0vYTM" target="_blank"><?php ls_e('Tutorial Video', 'LayerSlider') ?></a> ]
                </div>
            </div>
        </div>
    </div>
</script>