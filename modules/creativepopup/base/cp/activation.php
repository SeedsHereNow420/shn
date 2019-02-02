<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Update routine hook
cp_add_action('admin_init', 'cp_update_routine');

// Update handler
if (cp_get_option('cp-plugin-version', '1.0.0') !== CP_PLUGIN_VERSION) {
    cp_update_option('cp-plugin-version', CP_PLUGIN_VERSION);
    cp_update_scripts();
}

function cp_update_routine()
{

    // Bail out early if everything is up-to-date
    // and there is nothing to be done.
    if (! version_compare(cp_get_option('cp-db-version', '0.0.0'), CP_DB_VERSION, '<')) {
        return;
    }

    // Update database
    cp_create_db_table();
    cp_update_option('cp-db-version', CP_DB_VERSION);

    // Install date
    if (! cp_get_option('cp-date-installed', 0)) {
        cp_update_option('cp-date-installed', time());
    }
}

function cp_update_scripts()
{
    // Make sure database is up-to-date,
    // perform any changes that might be
    // required by an update.
    cp_update_routine();

    // Make sure to empty all caches due
    // to any potential data handling changes
    // introduced in an update.
    if (function_exists('cp_delete_caches')) {
        cp_delete_caches();
    }
}


function cp_create_db_table()
{

    $cpdb = CpDb::getInstance();
    $charset_collate = '';

    // Get DB collate
    if (! empty($cpdb->charset)) {
        $charset_collate = "DEFAULT CHARACTER SET $cpdb->charset";
    }

    if (! empty($cpdb->collate)) {
        $charset_collate .= " COLLATE $cpdb->collate";
    }

    // Building the query
    cp_dbDelta("CREATE TABLE IF NOT EXISTS {$cpdb->prefix}creativepopup (
        id int(11) NOT NULL AUTO_INCREMENT,
        author int(11) NOT NULL DEFAULT 0,
        name varchar(100) DEFAULT '',
        data mediumtext NOT NULL,
        date_c int(11) NOT NULL,
        date_m int(11) NOT NULL,
        schedule_start int(11) NOT NULL DEFAULT 0,
        schedule_end int(11) NOT NULL DEFAULT 0,
        flag_hidden tinyint(1) NOT NULL DEFAULT 0,
        flag_deleted tinyint(1) NOT NULL DEFAULT 0,
        flag_popup tinyint(1) NOT NULL DEFAULT 0,
        PRIMARY KEY  (id)
    ) $charset_collate;");


    // Table for Slider Revisions
    cp_dbDelta("CREATE TABLE {$cpdb->prefix}creativepopup_revisions (
        id int(11) NOT NULL AUTO_INCREMENT,
        popup_id int(11) NOT NULL,
        author int(11) NOT NULL DEFAULT 0,
        data mediumtext NOT NULL,
        date_c int(11) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;");
}
