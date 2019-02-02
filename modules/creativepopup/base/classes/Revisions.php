<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class CpRevisions
{
    public static $active   = false;
    public static $enabled  = true;
    public static $limit    = 100;
    public static $interval = 10;


    /**
     * Private constructor to prevent instantiate static class
     *
     * @since 6.3.0
     * @access private
     * @return void
     */
    private function __construct()
    {
    }


    public static function init()
    {
        if (cp_get_option('cp-revisions-enabled', true)) {
                self::$active = true;
        }

        $option = cp_get_option('cp-revisions-enabled', true);
        self::$enabled = ! empty($option);
        self::$limit = cp_get_option('cp-revisions-limit', 100);
        self::$interval = cp_get_option('cp-revisions-interval', 10);
    }


    /**
     * Counts the number of revisions saved for the specified popup
     *
     * @since 6.3.0
     * @access public
     * @param int $popupId The popup database ID
     * @return int The number of revisions available for the popup
     */
    public static function count($popupId)
    {
        $cpdb = CpDb::getInstance();
        $popupId = (int)$popupId;

        if (empty($popupId) || !is_numeric($popupId)) {
            return false;
        }

        $result = $cpdb->getCol($cpdb->prepare("SELECT COUNT(*) FROM {$cpdb->prefix}creativepopup_revisions WHERE popup_id = %d LIMIT 1", $popupId));

        return (int) $result[0];
    }


    /**
     * Finds and returns revisions for a specified popup
     *
     * @since 6.3.0
     * @access public
     * @param int $popupId The popup database ID
     * @return array Array of found popup revisions, or false on error
     */
    public static function snapshots($popupId)
    {
        $cpdb = CpDb::getInstance();
        $popupId = (int)$popupId;

        if (empty($popupId) || !is_numeric($popupId)) {
            return false;
        }

        return $cpdb->getResults($cpdb->prepare("SELECT * FROM {$cpdb->prefix}creativepopup_revisions WHERE popup_id = %d ORDER BY id ASC LIMIT 500", $popupId));
    }


    /**
     * Retrieve a specific revision by its database ID
     *
     * @since 6.3.0
     * @access public
     * @param int $revisionId The revision database ID
     * @return object The chosen revision data, or false on error
     */
    public static function get($revisionId)
    {
        $cpdb = CpDb::getInstance();
        $revisionId = (int)$revisionId;

        if (empty($revisionId) || !is_numeric($revisionId)) {
            return false;
        }

        return $cpdb->getRow($cpdb->prepare("SELECT * FROM {$cpdb->prefix}creativepopup_revisions WHERE id = %d ORDER BY id ASC LIMIT 1", $revisionId));
    }


    /**
     * Retrieve the last revision for a particular popup
     *
     * @since 6.3.0
     * @access public
     * @param int $popupId The popup database ID
     * @return object The last revision, or false on error
     */
    public static function last($popupId)
    {
        $cpdb = CpDb::getInstance();
        $popupId = (int)$popupId;

        if (empty($popupId) || !is_numeric($popupId)) {
            return false;
        }

        return $cpdb->getRow($cpdb->prepare("SELECT * FROM {$cpdb->prefix}creativepopup_revisions WHERE popup_id = %d ORDER BY id DESC LIMIT 1", $popupId));
    }


    /**
     * Adds a new revision for a specified popup
     *
     * @since 6.3.0
     * @access public
     * @param int $popupId The popup database ID
     * @param string $popupData The serialized data of the popup
     * @return array Array of found popup revisions, or false on error
     */
    public static function add($popupId, $popupData)
    {
        $cpdb = CpDb::getInstance();
        $popupId = (int)$popupId;

        if (empty($popupId) || !is_numeric($popupId) || empty($popupData)) {
            return false;
        }

        $cpdb->insert(
            $cpdb->prefix.'creativepopup_revisions',
            array(
                'popup_id' => $popupId,
                'author' => cp_get_current_user_id(),
                'data' => $popupData,
                'date_c' => time()
            ),
            array(
                '%d',
                '%d',
                '%s',
                '%d'
            )
        );

        return $cpdb->insert_id;
    }


    /**
     * Removes a revision
     *
     * @since 6.3.0
     * @access public
     * @param int $revisionId The revision database ID
     * @return mixed Returns the number of rows affected, or false on error
     */
    public static function remove($revisionId)
    {
        $cpdb = CpDb::getInstance();
        $revisionId = (int)$revisionId;

        if (empty($revisionId) || !is_numeric($revisionId)) {
            return false;
        }

        return $cpdb->delete(
            $cpdb->prefix.'creativepopup_revisions',
            array('id' => $revisionId),
            array('%d')
        );
    }


    /**
     * Removes the last revision of the specified popup
     *
     * @since 6.3.0
     * @access public
     * @param int $popupId The revision database ID
     * @return mixed Returns the number of rows affected, or false on error
     */
    public static function shift($popupId)
    {
        $cpdb = CpDb::getInstance();
        $popupId = (int)$popupId;

        if (empty($popupId) || !is_numeric($popupId)) {
            return false;
        }

        return $cpdb->query($cpdb->prepare("DELETE FROM {$cpdb->prefix}creativepopup_revisions WHERE popup_id = %d ORDER BY id ASC LIMIT 1", $popupId));
    }


    /**
     * Removes all revisions for a chosen popup
     *
     * @since 6.3.0
     * @access public
     * @param int $popupId The popup database ID
     * @return mixed Returns the number of rows affected, or false on error
     */
    public static function clear($popupId)
    {
        $cpdb = CpDb::getInstance();
        $popupId = (int)$popupId;

        if (empty($popupId) || !is_numeric($popupId)) {
            return false;
        }

        return $cpdb->delete(
            $cpdb->prefix.'creativepopup_revisions',
            array('popup_id' => $popupId),
            array('%d')
        );
    }


    /**
     * Truncates the entire database table.
     *
     * @since 6.3.0
     * @access public
     * @return mixed Returns the number of rows affected, or false on error
     */
    public static function truncate()
    {
        $cpdb = CpDb::getInstance();

        return $cpdb->query("TRUNCATE {$cpdb->prefix}creativepopup_revisions;");
    }


    /**
     * Reverts the specified popup to a chosen revision
     *
     * @since 6.3.0
     * @access public
     * @param int $popupId The popup database ID
     * @param int $revisionId The revision database ID
     * @return bool True on success, false on error
     */
    public static function revert($popupId, $revisionId)
    {
        $cpdb = CpDb::getInstance();
        $popupId = (int)$popupId;
        $revisionId = (int)$revisionId;

        if (empty($popupId) || !is_numeric($popupId) || empty($revisionId) || !is_numeric($revisionId)) {
            return false;
        }

        $popup = CpInstances::find($popupId);
        $revision = self::get($revisionId);
        $data = $revision->data;

        if ($revision &&  $data) {
            self::add($popupId, $data);
            CpInstances::update($popupId, $popup['name'], json_decode($data, true));
        }

        return true;
    }
}
