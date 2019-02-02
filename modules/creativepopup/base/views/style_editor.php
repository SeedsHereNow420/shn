<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Get contents
$file = _PS_MODULE_DIR_.'creativepopup/views/css/custom.css';
$contents = file_exists($file) ? Tools::file_get_contents($file) : '';

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
        <?php cp_e('Creative Popup - CSS Editor') ?>
        <a href="<?php echo Context::getContext()->link->getAdminLink('AdminCreativePopup') ?>" class="add-new-h2"><?php cp_e('Back to the list') ?></a>
    </h2>

    <!-- Error messages -->
    <?php if (isset(${'_GET'}['edited'])) : ?>
        <div class="cp-notification updated">
            <div><?php cp_e('Your changes has been saved!') ?></div>
        </div>
    <?php endif; ?>
    <!-- End of error messages -->

    <!-- Editor box -->
    <div class="cp-box cp-skin-editor-box">
        <h3 class="header medium">
            <?php cp_e('Contents of your custom CSS file') ?>
            <figure><span>|</span><?php cp_e('Ctrl+Q to fold/unfold a block') ?></figure>
        </h3>
        <form method="post" class="inner">
            <input type="hidden" name="cp-user-css" value="1">
            <textarea rows="10" cols="50" name="contents" class="cp-codemirror"
           ><?php
            if (!empty($contents)) :
                echo htmlentities($contents);
            else :
                echo '/*' . NL . cp__('You can type here custom CSS code, which will be loaded both on your admin and front-end pages. Please make sure to not override layout properties (positions and sizes), as they can interfere with the popups built-in responsive functionality. Here are few example targets to help you get started:');
                echo NL . '*/' . NL . NL;
            endif ?></textarea>
            <p class="footer">
            <?php if (!is_writable(_PS_MODULE_DIR_.'creativepopup/views/css')) : ?>
                <?php cp_e('You need to make your uploads folder writable in order to save your changes.') ?>
            <?php else : ?>
                <button class="button-primary"><?php cp_e('Save changes') ?></button>
                <?php cp_e('Using invalid CSS code could break the appearance of your site or your popups. Changes cannot be reverted after saving.') ?>
            <?php endif ?>
            </p>
        </form>
    </div>
</div>
<script type="text/javascript">
    // Screen options
    var lsScreenOptions = <?php echo Tools::jsonEncode($cpScreenOptions) ?>;
</script>
