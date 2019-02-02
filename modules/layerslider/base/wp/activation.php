<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

// Activation events
ls_add_action('admin_init', 'layerslider_activation_redirect');

// Activation and de-activation hooks
ls_add_action('admin_init', 'layerslider_activation_routine');
ls_register_activation_hook(LS_ROOT_FILE, 'layerslider_activation');
ls_register_deactivation_hook(LS_ROOT_FILE, 'layerslider_deactivation_scripts');
ls_register_uninstall_hook(LS_ROOT_FILE, 'layerslider_uninstall_scripts');


// Update handler
if (ls_get_option('ls-plugin-version', '1.0.0') !== LS_PLUGIN_VERSION) {
    ls_update_option('ls-plugin-version', LS_PLUGIN_VERSION);
    layerslider_update_scripts();
}

// Redirect to LayerSlider's main admin page after plugin activation.
// Should not trigger on multisite bulk activation or after upgrading
// the plugin to a newer versions.
function layerslider_activation_redirect()
{
    if (ls_get_option('layerslider_do_activation_redirect', false)) {
        ls_delete_option('layerslider_do_activation_redirect');
        if (isset(${'_GET'}['activate']) && !isset(${'_GET'}['activate-multi'])) {
            ls_redirect(ls_admin_url('admin.php?page=ls-about'));
        }
    }
}

function layerslider_activation()
{

    // Plugin activation routines should take care of this, but
    // call DB scripts anyway to avoid user intervention issues
    // like partially removing the plugin by only deleting the
    // database table.
    layerslider_create_db_table();

    // Call "activated" hook
    if (ls_has_action('layerslider_activated')) {
        ls_do_action('layerslider_activated');
    }

    // Redirect to LS's admin page after activation
    ls_update_option('layerslider_do_activation_redirect', 1);
}

function layerslider_activation_routine()
{

    // Bail out early if everything is up-to-date
    // and there is nothing to be done.
    if (! version_compare(ls_get_option('ls-db-version', '1.0.0'), LS_DB_VERSION, '<')) {
        return;
    }

    // Update database
    layerslider_create_db_table();
    ls_update_option('ls-db-version', LS_DB_VERSION);

    // Fresh installation
    if (! ls_get_option('ls-installed')) {
        ls_update_option('ls-installed', 1);

        // Call "installed" hook
        if (ls_has_action('layerslider_installed')) {
            ls_do_action('layerslider_installed');
        }
    }

    // Install date
    if (! ls_get_option('ls-date-installed', 0)) {
        ls_update_option('ls-date-installed', time());
    }
}

function layerslider_update_scripts()
{
    // Make sure database is up-to-date,
    // perform any changes that might be
    // required by an update.
    layerslider_activation_routine();

    // Make sure to empty all caches due
    // to any potential data handling changes
    // introduced in an update.
    if (function_exists('layerslider_delete_caches')) {
        layerslider_delete_caches();
    }

    // Trigger 'layerslider_updated' action
    // hook, so 3rd parties can run their own
    // updates scripts (if any).
    if (ls_has_action('layerslider_updated')) {
        ls_do_action('layerslider_updated');
    }
}


function layerslider_create_db_table()
{

    $wpdb = $GLOBALS['ls_db'];
    $charset_collate = '';
    $table_name = $wpdb->prefix . "layerslider";

    // Get DB collate
    if (! empty($wpdb->charset)) {
        $charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
    }

    if (! empty($wpdb->collate)) {
        $charset_collate .= " COLLATE $wpdb->collate";
    }

    // Building the query
    ls_dbDelta("CREATE TABLE IF NOT EXISTS $table_name (
        id int(11) NOT NULL AUTO_INCREMENT,
        author int(11) NOT NULL DEFAULT 0,
        name varchar(100) DEFAULT '',
        slug varchar(100) DEFAULT '',
        data mediumtext NOT NULL,
        date_c int(11) NOT NULL,
        date_m int(11) NOT NULL,
        schedule_start int(11) NOT NULL DEFAULT 0,
        schedule_end int(11) NOT NULL DEFAULT 0,
        flag_hidden tinyint(1) NOT NULL DEFAULT 0,
        flag_deleted tinyint(1) NOT NULL DEFAULT 0,
        PRIMARY KEY  (id)
    ) $charset_collate;");


    // Table for Slider Revisions
    ls_dbDelta("CREATE TABLE {$wpdb->prefix}layerslider_revisions (
        id int(11) NOT NULL AUTO_INCREMENT,
        slider_id int(11) NOT NULL,
        author int(11) NOT NULL DEFAULT 0,
        data mediumtext NOT NULL,
        date_c int(11) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;");
}


function layerslider_deactivation_scripts()
{

    // Remove capability option, so a user can restore
    // his access to the plugin if set the wrong capability
    // ls_delete_option('layerslider_custom_capability');

    // Remove the help pointer entry to remind a user for the
    // help menu when start to use the plugin again
    // delete_user_meta(ls_get_current_user_id(), 'layerslider_help_wp_pointer');

    // Call user hooks
    if (ls_has_action('layerslider_deactivated')) {
        ls_do_action('layerslider_deactivated');
    }
}

function layerslider_uninstall_scripts()
{

    // Call user hooks
    ls_update_option('ls-installed', 0);
    if (ls_has_action('layerslider_uninstalled')) {
        ls_do_action('layerslider_uninstalled');
    }
}
