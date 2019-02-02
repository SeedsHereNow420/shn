<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Show the welcome screen when the slider ID is missing or the plugin is not yet activated
if (empty(${'_GET'}['id']) || !ls_get_option('layerslider-authorized-site', false)) {
    include LS_ROOT_PATH . '/templates/tmpl-revisions-welcome.php';
} else {
    $revisions = LsRevisions::snapshots((int)${'_GET'}['id']);
    if (!$revisions) {
        $notification = sprintf(ls__('There are no revisions available for the selected slider yet. Revisions will be added over time when you make new changes to your sliders. Check %sRevisions Preferences%s and make sure that Revisions is enabled.', 'LayerSlider'), '<a href="#" class="ls-revisions-options">', '</a>');
        include LS_ROOT_PATH . '/templates/tmpl-revisions-welcome.php';
    } else {
        include LS_ROOT_PATH . '/templates/tmpl-revisions-history.php';
    }
}
