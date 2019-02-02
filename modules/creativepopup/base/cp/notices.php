<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Update notice
cp_add_action('admin_notices', 'cp_dependency_notice');

function cp_dependency_notice()
{
    if (version_compare(PHP_VERSION, '5.3.0', '<') || !class_exists('DOMDocument')) {
        ?>
        <div class="cp_notice">
            <h1><?php cp_e('Server configuration issues detected!') ?></h1>
            <p>
                <?php cp_e('It requires at least PHP 5.3.0 with the following extensions installed: PHP DOM extension, PHP Multibyte String extension. Please contact with your hosting provider to resolve these dependencies, as it will likely prevent Creative Popup from functioning properly.') ?>
                <strong><?php cp_e('This issue could result a blank page in popup builder.') ?></strong>
            </p>
            <div class="clear"></div>
        </div>
        <?php
    }
}
