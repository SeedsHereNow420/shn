<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Get all skins
$skins = CpSources::getSkins();
$skin = (!empty(${'_GET'}['skin']) && strpos(${'_GET'}['skin'], '..') === false) ? ${'_GET'}['skin'] : '';
if (empty($skin)) {
    $skin = reset($skins);
    $skin = $skin['handle'];
}
$skin = CpSources::getSkin($skin);
$file = $skin['file'];

// Get screen options
$cpScreenOptions = cp_get_option('cp-screen-options', '0');
$cpScreenOptions = ($cpScreenOptions == 0) ? array() : $cpScreenOptions;
$cpScreenOptions = is_array($cpScreenOptions) ? $cpScreenOptions : unserialize($cpScreenOptions);

// Defaults
if (!isset($cpScreenOptions['showTooltips'])) {
    $cpScreenOptions['showTooltips'] = 'true';
}

?>

<div id="cp-screen-options" class="metabox-prefs hidden">
    <div id="screen-options-wrap" class="hidden">
        <form id="cp-screen-options-form" method="post">
            <h5><?php cp_e('Show on screen') ?></h5>
            <label>
                <input type="checkbox" name="showTooltips"<?php echo $cpScreenOptions['showTooltips'] == 'true' ? ' checked="checked"' : ''?>> <?php cp_e('Tooltips') ?>
            </label>
        </form>
    </div>
    <div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle">
        <button type="button" id="show-settings-link" class="button show-settings" aria-controls="screen-options-wrap" aria-expanded="false"><?php cp_e('Screen Options') ?></button>
    </div>
</div>

<div class="wrap">

    <!-- Page title -->
    <h2>
        <?php cp_e('Creative Popup - Skin Editor') ?>
        <a href="<?php echo Context::getContext()->link->getAdminLink('AdminCreativePopup') ?>" class="add-new-h2"><?php cp_e('Back to the list') ?></a>
    </h2>

    <!-- Error messages -->
    <?php if (isset(${'_GET'}['edited'])) : ?>
        <div class="cp-notification updated">
            <div><?php cp_e('Your changes has been saved!') ?></div>
        </div>
    <?php endif ?>
    <!-- End of error messages -->

    <!-- Editor box -->
    <form method="post" class="cp-box cp-skin-editor-box">
        <input type="hidden" name="cp-user-skins" value="1">
        <h3 class="header medium">
            <?php cp_e('Skin Editor') ?>
            <figure><span>|</span><?php cp_e('Ctrl+Q to fold/unfold a block') ?></figure>
            <p>
                <span><?php cp_e('Choose a skin:') ?></span>
                <select name="skin" class="cp-skin-editor-select">
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
        <p class="inner"><?php cp_e('Built-in skins will be overwritten by plugin updates. Making changes should be done through the Custom Styles Editor.') ?></p>
        <div class="inner">
            <textarea rows="10" cols="50" name="contents" class="cp-codemirror"><?php echo htmlentities(Tools::file_get_contents($file)); ?></textarea>
            <p class="footer">
            <?php if (!is_writable($file)) : ?>
                <?php cp_e('You need to make this file writable in order to save your changes.') ?>
            <?php else : ?>
                <button class="button-primary"><?php cp_e('Save changes') ?></button>
                <?php cp_e("Modifying a skin with invalid code can break your popups' appearance. Changes cannot be reverted after saving.") ?>
            <?php endif ?>
            </p>
        </div>
    </form>
</div>
<script type="text/javascript">
    // Screen options
    var lsScreenOptions = <?php echo Tools::jsonEncode($cpScreenOptions) ?>;
</script>
