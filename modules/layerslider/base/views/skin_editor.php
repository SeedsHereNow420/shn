<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Get all skins
$skins = LsSources::getSkins();
$skin = (!empty(${'_GET'}['skin']) && strpos(${'_GET'}['skin'], '..') === false) ? ${'_GET'}['skin'] : '';
if (empty($skin)) {
    $skin = reset($skins);
    $skin = $skin['handle'];
}
$skin = LsSources::getSkin($skin);
$file = $skin['file'];

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
        <?php ls_e('Skin Editor', 'LayerSlider') ?>
        <a href="<?php echo Context::getContext()->link->getAdminLink('AdminLayerSlider') ?>" class="add-new-h2"><?php ls_e('Back to the list', 'LayerSlider') ?></a>
    </h2>

    <!-- Error messages -->
    <?php if (isset(${'_GET'}['edited'])) : ?>
        <div class="ls-notification updated">
            <div><?php ls_e('Your changes has been saved!', 'LayerSlider') ?></div>
        </div>
    <?php endif ?>
    <!-- End of error messages -->

    <!-- Editor box -->
    <form method="post" class="ls-box ls-skin-editor-box">
        <input type="hidden" name="ls-user-skins" value="1">
        <?php ls_nonce_field('save-user-skin'); ?>
        <h3 class="header medium">
            <?php ls_e('Skin Editor', 'LayerSlider') ?>
            <figure><span>|</span><?php ls_e('Ctrl+Q to fold/unfold a block', 'LayerSlider') ?></figure>
            <p>
                <span><?php ls_e('Choose a skin:', 'LayerSlider') ?></span>
                <select name="skin" class="ls-skin-editor-select">
                <?php foreach ($skins as $item) : ?>
                    <?php if ($item['handle'] == $skin['handle']) : ?>
                        <option value="<?php echo $item['handle'] ?>" selected="selected"><?php echo $item['name'] ?></option>
                    <?php else : ?>
                        <option value="<?php echo $item['handle'] ?>"><?php echo $item['name'] ?></option>
                    <?php endif ?>
                <?php endforeach ?>
                </select>
            </p>
        </h3>
        <p class="inner"><?php ls_e('Built-in skins will be overwritten by plugin updates. Making changes should be done through the Custom Styles Editor.', 'LayerSlider') ?></p>
        <div class="inner">
            <textarea rows="10" cols="50" name="contents" class="ls-codemirror"><?php echo htmlentities(Tools::file_get_contents($file)); ?></textarea>
            <p class="footer">
            <?php if (!is_writable($file)) : ?>
                <?php ls_e('You need to make this file writable in order to save your changes.', 'LayerSlider') ?>
            <?php else : ?>
                <button class="button-primary"><?php ls_e('Save changes', 'LayerSlider') ?></button>
                <?php ls_e("Modifying a skin with invalid code can break your sliders' appearance. Changes cannot be reverted after saving.", "LayerSlider") ?>
            <?php endif ?>
            </p>
        </div>
    </form>
</div>
<script type="text/javascript">
    // Screen options
    var lsScreenOptions = <?php echo Tools::jsonEncode($lsScreenOptions) ?>;
</script>
