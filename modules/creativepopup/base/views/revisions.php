<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Show the welcome screen when the popup ID is missing or the plugin is not yet activated
if (empty(${'_GET'}['id'])) {
    include CP_ROOT_PATH . '/templates/tmpl-revisions-welcome.php';
} else {
    $revisions = CpRevisions::snapshots((int)${'_GET'}['id']);
    if (!$revisions) {
        $notification = sprintf(cp__('There are no revisions available for the selected popup yet. Revisions will be added over time when you make new changes to your popups. Check %sRevisions Preferences%s and make sure that Revisions is enabled.'), '<a href="#" class="cp-revisions-options">', '</a>');
        include CP_ROOT_PATH . '/templates/tmpl-revisions-welcome.php';
    } else {
        include CP_ROOT_PATH . '/templates/tmpl-revisions-history.php';
    }
}
