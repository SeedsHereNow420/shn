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
    $notification = '';
}
?>
<div id="ls-revisions-welcome">

    <div class="wrap">

        <?php if (! empty($notification)) : ?>
        <div class="ls-notification-info">
            <i class="dashicons dashicons-info"></i>
            <?php echo $notification ?>
        </div>
        <?php endif ?>

        <?php if (! ls_get_option('layerslider-authorized-site', false)) : ?>
        <div class="ls-notification">
            <i class="dashicons dashicons-warning"></i>
            <?php echo sprintf(ls__('Slider Revisions is a premium feature. Activate your copy of LayerSlider in order to enjoy our premium benefits. %sPurchase a license%s or %sread the documentation%s to learn more. %sGot LayerSlider in a theme?%s', 'LayerSlider'), '<a href="http://codecanyon.net/cart/add_items?ref=kreatura&item_ids=1362246" target="_blank">', '</a>', '<a href="https://support.kreaturamedia.com/docs/layersliderwp/documentation.html#activation" target="_blank">', '</a>', '<a href="https://support.kreaturamedia.com/docs/layersliderwp/documentation.html#activation-bundles" target="_blank">', '</a>') ?>
        </div>
        <?php endif ?>

        <h1><?php ls_e('You Can Now Rewind Time', 'LayerSlider') ?></h1>
        <p class="center">
            <?php echo ls_e('Have a peace of mind knowing that your slider edits are always safe and you can revert back unwanted changes or faulty saves at any time. This feature serves not just as a backup solution, but a complete version control system where you can visually compare the changes you have made along the way.', 'LayerSlider') ?>
            <br><br>
            <a href="#" class="ls-revisions-options"><?php ls_e('Customize Revisions Preferences', 'LayerSlider') ?></a>
            <a target="_blank" href="https://creativeslider.webshopworks.com/revisions-63" class="ls-revisions-more-info"><?php ls_e('More Information', 'LayerSlider') ?></a>
        </p>
        <div class="center">
            <video autoplay loop muted>
                <source src="<?php echo LS_VIEWS_URL ?>/img/admin/revisions.mp4" type="video/mp4">
            </video>
        </div>
    </div>


    <script type="text/html" id="tmpl-revisions-options">
        <div id="ls-revisions-modal-window">
            <header>
                <h1><?php ls_e('Revisions Preferences', 'LayerSlider') ?></h1>
                <b class="dashicons dashicons-no"></b>
            </header>
            <form method="post" class="km-ui-modal-scrollable">
                <?php ls_nonce_field('ls-save-revisions-options'); ?>
                <input type="hidden" name="ls-revisions-options" value="1">
                <table>
                    <tr>
                        <td><input type="checkbox" name="ls-revisions-enabled" class="hero" data-warning="<?php ls_e('Disabling Slider Revisions will also remove all revisions saved so far. Are you sure you want to continue?', 'LayerSlider') ?>" <?php echo LsRevisions::$enabled ? 'checked' : '' ?>></td>
                        <td><?php ls_e('Enable Revisions', 'LayerSlider') ?></td>
                    </tr>
                </table>


                <div>
                    <h2 class="ls-revisions-h2"><?php ls_e('Update Frequency', 'LayerSlider') ?></h2>
                    <?php echo sprintf(ls__('Limit the total number of revisions per slider to %s.', 'LayerSlider'), '<input type="number" name="ls-revisions-limit" min="2" max="500" value="'.LsRevisions::$limit.'">') ?> <br>
                    <?php echo sprintf(ls__('Wait at least %s minutes between edits before adding a new revision.', 'LayerSlider'), '<input type="number" name="ls-revisions-interval" min="0" max="500" value="'.LsRevisions::$interval.'">') ?>
                </div>

                <div class="ls-notification-info">
                    <i class="dashicons dashicons-info"></i>
                    <?php ls_e('Slider Revisions also stores the undo/redo controls. There is no reason using very frequent saves since you will be able to undo the changes in-between.', 'LayerSlider') ?>
                </div>

                <button class="button button-primary button-hero"><?php ls_e('Update Revisions Preferences', 'LayerSlider') ?></button>
            </form>
        </div>
    </script>
</div>
