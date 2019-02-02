<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Get uploads dir
$file = _PS_MODULE_DIR_.'layerslider/views/css/custom.css';

// Get contents
if (file_exists($file)) {
    $contents = Tools::file_get_contents($file);
} else {
    $upload_dir = ls_upload_dir();
    $file = $upload_dir['basedir'].'layerslider.custom.css';
    $contents = file_exists($file) ? Tools::file_get_contents($file) : '';
}

// Get screen options
$lsScreenOptions = ls_get_option('ls-screen-options', '0');
$lsScreenOptions = ($lsScreenOptions == 0) ? array() : $lsScreenOptions;
$lsScreenOptions = is_array($lsScreenOptions) ? $lsScreenOptions : unserialize($lsScreenOptions);

// Defaults
if (!isset($lsScreenOptions['showTooltips'])) {
    $lsScreenOptions['showTooltips'] = 'true';
}
?>

<div id="ls-screen-options" class="metabox-prefs hidden">
    <div id="screen-options-wrap" class="hidden">
        <form id="ls-screen-options-form" method="post">
            <?php ls_nonce_field('ls-save-screen-options'); ?>
            <h5><?php ls_e('Show on screen', 'LayerSlider') ?></h5>
            <label>
                <input type="checkbox" name="showTooltips"<?php echo $lsScreenOptions['showTooltips'] == 'true' ? ' checked="checked"' : ''?>> <?php ls_e('Tooltips', 'LayerSlider') ?>
            </label>
        </form>
    </div>
    <div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle">
        <button type="button" id="show-settings-link" class="button show-settings" aria-controls="screen-options-wrap" aria-expanded="false"><?php ls_e('Screen Options', 'LayerSlider') ?></button>
    </div>
</div>
<div class="wrap">

    <!-- Page title -->
    <h2>Creative Slider -
        <?php ls_e('CSS Editor', 'LayerSlider') ?>
        <a href="<?php echo Context::getContext()->link->getAdminLink('AdminLayerSlider') ?>" class="add-new-h2"><?php ls_e('Back to the list', 'LayerSlider') ?></a>
    </h2>

    <!-- Error messages -->
    <?php if (isset(${'_GET'}['edited'])) : ?>
        <div class="ls-notification updated">
            <div><?php ls_e('Your changes has been saved!', 'LayerSlider') ?></div>
        </div>
    <?php endif; ?>
    <!-- End of error messages -->

    <!-- Editor box -->
    <div class="ls-box ls-skin-editor-box">
        <h3 class="header medium">
            <?php ls_e('Contents of your custom CSS file', 'LayerSlider') ?>
            <figure><span>|</span><?php ls_e('Ctrl+Q to fold/unfold a block', 'LayerSlider') ?></figure>
        </h3>
        <form method="post" class="inner">
            <input type="hidden" name="ls-user-css" value="1">
            <?php ls_nonce_field('save-user-css'); ?>
            <textarea rows="10" cols="50" name="contents" class="ls-codemirror"
           ><?php
            if (!empty($contents)) :
                echo htmlentities($contents);
            else :
                echo '/*' . NL . ls__('You can type here custom CSS code, which will be loaded both on your admin and front-end pages. Please make sure to not override layout properties (positions and sizes), as they can interfere with the sliders built-in responsive functionality. Here are few example targets to help you get started:', 'LayerSlider');
                echo NL . '*/' . NL . NL;
                echo '.ls-container { /* Slider container */' . NL . NL . '}' .NL.NL;
                echo '.ls-layers { /* Layers wrapper */ ' . NL  . NL . '}' . NL.NL;
                echo '.ls-3d-box div { /* Sides of 3D transition objects */ ' . NL  . NL . '}';
            endif ?></textarea>
            <p class="footer">
            <?php if (!is_writable(dirname($file))) : ?>
                <?php ls_e('You need to make your uploads folder writable in order to save your changes.', 'LayerSlider') ?>
            <?php else : ?>
                <button class="button-primary"><?php ls_e('Save changes', 'LayerSlider') ?></button>
                <?php ls_e('Using invalid CSS code could break the appearance of your site or your sliders. Changes cannot be reverted after saving.', 'LayerSlider') ?>
            <?php endif ?>
            </p>
        </form>
    </div>
</div>
<script type="text/javascript">
    // Screen options
    var lsScreenOptions = <?php echo Tools::jsonEncode($lsScreenOptions) ?>;
</script>
