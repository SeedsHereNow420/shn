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
    $notification = '';
}
?>
<div id="cp-revisions-welcome">

    <div class="wrap">

        <?php if (! empty($notification)) : ?>
        <div class="cp-notification-info">
            <i class="dashicons dashicons-info"></i>
            <?php echo $notification ?>
        </div>
        <?php endif ?>

        <h1><?php cp_e('You Can Rewind Time') ?></h1>
        <p class="center">
            <?php echo cp_e('Have a peace of mind knowing that your popup edits are always safe and you can revert back unwanted changes or faulty saves at any time. This feature serves not just as a backup solution, but a complete version control system where you can visually compare the changes you have made along the way.') ?>
            <br><br>
            <a href="#" class="cp-revisions-options"><?php cp_e('Customize Revisions Preferences') ?></a>
            <a target="_blank" href="https://creativepopup.webshopworks.com/revisions-63" class="cp-revisions-more-info"><?php cp_e('More Information') ?></a>
        </p>
        <div class="center">
            <video autoplay loop muted>
                <source src="<?php echo CP_VIEWS_URL ?>/img/admin/revisions.mp4" type="video/mp4">
            </video>
        </div>
    </div>


    <script type="text/html" id="tmpl-revisions-options">
        <div id="cp-revisions-modal-window">
            <header>
                <h1><?php cp_e('Revisions Preferences') ?></h1>
                <b class="dashicons dashicons-no"></b>
            </header>
            <form method="post" class="km-ui-modal-scrollable">
                <input type="hidden" name="cp-revisions-options" value="1">
                <table>
                    <tr>
                        <td><input type="checkbox" name="cp-revisions-enabled" class="hero" data-warning="<?php cp_e('Disabling Popup Revisions will also remove all revisions saved so far. Are you sure you want to continue?') ?>" <?php echo CpRevisions::$enabled ? 'checked' : '' ?>></td>
                        <td><?php cp_e('Enable Revisions') ?></td>
                    </tr>
                </table>


                <div>
                    <h2 class="cp-revisions-h2"><?php cp_e('Update Frequency') ?></h2>
                    <?php echo sprintf(cp__('Limit the total number of revisions per popup to %s.'), '<input type="number" name="cp-revisions-limit" min="2" max="500" value="'.CpRevisions::$limit.'">') ?> <br>
                    <?php echo sprintf(cp__('Wait at least %s minutes between edits before adding a new revision.'), '<input type="number" name="cp-revisions-interval" min="0" max="500" value="'.CpRevisions::$interval.'">') ?>
                </div>

                <div class="cp-notification-info">
                    <i class="dashicons dashicons-info"></i>
                    <?php cp_e('Popup Revisions also stores the undo/redo controls. There is no reason using very frequent saves since you will be able to undo the changes in-between.') ?>
                </div>

                <button class="button button-primary button-hero"><?php cp_e('Update Revisions Preferences') ?></button>
            </form>
        </div>
    </script>
</div>
