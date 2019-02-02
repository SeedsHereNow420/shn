<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class CpInstances
{
    /**
     * @var array $results Array containing the result of the last DB query
     * @access public
     */
    public static $results = array();


    /**
     * @var int $count Count of found popups in the last DB query
     * @access public
     */
    public static $count = null;


    /**
     * Private constructor to prevent instantiate static class
     *
     * @since 5.0.0
     * @access private
     * @return void
     */
    private function __construct()
    {
    }


    /**
     * Returns the count of found popups in the last DB query
     *
     * @since 5.0.0
     * @access public
     * @return int Count of found popups in the last DB query
     */
    public static function count()
    {
        return self::$count;
    }


    /**
     * Find popups with the provided filters
     *
     * @since 5.0.0
     * @access public
     * @param mixed $args Find any popup with the provided filters
     * @return mixed Array on success, false otherwise
     */
    public static function find($args = array())
    {
        // Find by popup ID
        if (is_numeric($args) && (int)$args == $args) {
            return self::_getById((int) $args);

        // Find by list of popup IDs
        } elseif (is_array($args) && isset($args[0]) && is_numeric($args[0])) {
            return self::_getByIds($args);

        // Find by query
        } else {
            // Defaults
            $defaults = array(
                'columns' => '*',
                'where' => '',
                'exclude' => array('removed'),
                'orderby' => 'date_c',
                'order' => 'DESC',
                'limit' => 10,
                'page' => 1,
                'data' => true
            );

            // Merge user data with defaults
            foreach ($defaults as $key => $val) {
                if (!isset($args[$key])) {
                    $args[$key] = $val;
                }
            }

            // Escape user data
            foreach ($args as $key => $val) {
                if ($key !== 'where') {
                    $args[$key] = cp_esc_sql($val);
                }
            }

            $columns = array('id', 'author', 'name', 'data', 'date_c', 'date_m', 'flag_hidden', 'flag_deleted', 'schedule_start', 'schedule_end');

            $args['orderby'] = in_array($args['orderby'], $columns) ? $args['orderby'] : 'date_c';
            $args['order'] = ($args['order'] === 'DESC') ? 'DESC' : 'ASC';
            $args['limit'] = (int) $args['limit'];
            $args['page'] = (int) $args['page'];
            $args['data'] = (bool) $args['data'];

            // Exclude
            if (!empty($args['exclude'])) {
                $exclude = array();
                if (in_array('hidden', $args['exclude'])) {
                    $exclude[] = "flag_hidden = '0'";
                }

                if (in_array('removed', $args['exclude'])) {
                    $exclude[] = "flag_deleted = '0'";
                }

                $args['exclude'] = implode(' AND ', $exclude);
            }

            // Where
            $where = '';
            if (!empty($args['where']) && !empty($args['exclude'])) {
                $where = "WHERE ({$args['exclude']}) AND ({$args['where']}) ";
            } elseif (!empty($args['where'])) {
                $where = "WHERE {$args['where']} ";
            } elseif (!empty($args['exclude'])) {
                $where = "WHERE {$args['exclude']} ";
            }

            // Some adjustments
            $args['limit'] = ($args['limit'] * $args['page'] - $args['limit']).', '.$args['limit'];

            // Build the query
            $cpdb = CpDb::getInstance();
            $table = $cpdb->prefix.CP_DB_TABLE;
            $popups = $cpdb->getResults("SELECT SQL_CALC_FOUND_ROWS {$args['columns']} FROM $table $where ORDER BY {$args['orderby']} {$args['order']} LIMIT {$args['limit']}", ARRAY_A);

            // Set counter
            $found = $cpdb->getCol("SELECT FOUND_ROWS()");
            self::$count = (int) $found[0];

            // Return original value on error
            if (!is_array($popups)) {
                return $popups;
            }

            // Parse popup data
            if ($args['data']) {
                foreach ($popups as $key => $val) {
                    $popups[$key]['data'] = Tools::jsonDecode($val['data'], true);
                }
            }

            // Return popups
            return $popups;
        }
    }


    /**
     * Add popup with the provided name and optional popup data
     *
     * @since 5.0.0
     * @access public
     * @param string $title The title of the popup to create
     * @param array $data The settings of the popup to create
     * @return int The popup database ID inserted
     */
    public static function add($title = 'Unnamed', $data = array())
    {
        $cpdb = CpDb::getInstance();

        // Popup data
        $data = !empty($data) ? $data : array(
            'properties' => array(
                'createdWith' => CP_PLUGIN_VERSION,
                'popupVersion' => CP_PLUGIN_VERSION,
                'title' => $title,
                'new' => true,
            ),
            'layers' => array(array()),
        );
        // reset popup props
        unset($data['properties']['status']);
        unset($data['properties']['shop']);
        unset($data['properties']['lang']);
        unset($data['properties']['cats']);
        unset($data['properties']['pages']);
        unset($data['properties']['position']);

        // Fix issue with longer varchars
        // than the column length
        if (Tools::strlen($title) > 99) {
            $title = Tools::substr($title, 0, (99-Tools::strlen($title)));
        }

        // Insert popup, CpDb will escape data automatically
        $cpdb->insert($cpdb->prefix.CP_DB_TABLE, array(
            'author' => cp_get_current_user_id(),
            'name' => $title,
            'data' => Tools::jsonEncode($data),
            'date_c' => time(),
            'date_m' => time(),
            'flag_hidden' => 1,
            'flag_popup' => 1
        ), array(
            '%d', '%s', '%s', '%d', '%d', '%d', '%d'
        ));

        // Return insert database ID
        return $cpdb->insert_id;
    }


    /**
     * Updates popups
     *
     * @since 5.2.0
     * @access public
     * @param int $id The database ID of the popup to be updated
     * @param string $title The new title of the popup
     * @param array $data The new settings of the popup
     * @return bool Returns true on success, false otherwise
     */
    public static function update($id = 0, $title = 'Unnamed', $data = array())
    {
        $cpdb = CpDb::getInstance();

        // Popup data
        $data = !empty($data) ? $data : array(
            'properties' => array('title' => $title),
            'layers' => array(array()),
        );

        // Fix issue with longer varchars
        // than the column length
        if (Tools::strlen($title) > 99) {
            $title = Tools::substr($title, 0, (99-Tools::strlen($title)));
        }

        // Status
        $status = 0;
        if (empty($data['properties']['status']) || $data['properties']['status'] === 'false') {
            $status = 1;
        }

        // Schedule
        $schedule = array('schedule_start' => 0, 'schedule_end' => 0);
        foreach ($schedule as $key => $val) {
            if (! empty($data['properties'][$key])) {
                if (is_numeric($data['properties'][$key])) {
                    $schedule[$key] = (int) $data['properties'][$key];
                } else {
                    $tz = date_default_timezone_get();
                    date_default_timezone_set(cp_get_option('timezone_string'));
                    $schedule[$key] = (int) strtotime(str_replace('/', '-', $data['properties'][$key]));
                    date_default_timezone_set($tz);
                }
            }
        }

        // Insert popup, CpDb will escape data automatically
        $cpdb->update(
            $cpdb->prefix.CP_DB_TABLE,
            array(
                'name' => $title,
                'data' => Tools::jsonEncode($data),
                'schedule_start' => $schedule['schedule_start'],
                'schedule_end' => $schedule['schedule_end'],
                'date_m' => time(),
                'flag_hidden' => $status,
                'flag_popup' => 1
            ),
            array('id' => $id),
            array('%s', '%s', '%d', '%d', '%d', '%d', '%d')
        );

        // Delete transient to invalidate outdated data
        cp_delete_transient('cp-popup-data-'.$id);

        // Return insert database ID
        return true;
    }


    /**
     * Marking a popup as removed without deleting it
     * with its database ID.
     *
     * @since 5.0.0
     * @access public
     * @param int $id The database ID if the popup to remove
     * @return bool Returns true on success, false otherwise
     */
    public static function remove($id = null)
    {
        // Check ID
        if (!is_int($id)) {
            return false;
        }

        // Remove
        $cpdb = CpDb::getInstance();
        $cpdb->update(
            $cpdb->prefix.CP_DB_TABLE,
            array('flag_deleted' => 1, 'flag_hidden' => 1),
            array('id' => $id),
            '%d',
            '%d'
        );
        CpPopups::removeIndex($id);

        // Delete transient cache
        cp_delete_transient('cp-popup-data-'.$id);

        return true;
    }


    /**
     * Delete a popup by its database ID
     *
     * @since 5.0.0
     * @access public
     * @param int $id The database ID if the popup to delete
     * @return bool Returns true on success, false otherwise
     */
    public static function delete($id = null)
    {
        // Check ID
        if (!is_int($id)) {
            return false;
        }

        // Delete
        $cpdb = CpDb::getInstance();
        $cpdb->delete($cpdb->prefix.CP_DB_TABLE, array('id' => $id), '%d');
        CpPopups::removeIndex($id);

        // Delete transient cache
        cp_delete_transient('cp-popup-data-'.$id);

        return true;
    }


    /**
     * Restore a popup marked as removed previously by its database ID.
     *
     * @since 5.0.0
     * @access public
     * @param int $id The database ID if the popup to restore
     * @return bool Returns true on success, false otherwise
     */
    public static function restore($id = null)
    {
        // Check ID
        if (!is_int($id)) {
            return false;
        }

        // Remove
        $cpdb = CpDb::getInstance();
        $cpdb->update(
            $cpdb->prefix.CP_DB_TABLE,
            array('flag_deleted' => 0, 'flag_hidden' => 1),
            array('id' => $id),
            '%d',
            '%d'
        );

        return true;
    }


    private static function _getById($id = null)
    {
        // Check ID
        if (!is_int($id)) {
            return false;
        }

        // Get popups
        $cpdb = CpDb::getInstance();
        $table = $cpdb->prefix.CP_DB_TABLE;
        $result = $cpdb->getRow("SELECT * FROM $table WHERE id = '$id' ORDER BY id DESC LIMIT 1", ARRAY_A);

        // Check return value
        if (!is_array($result)) {
            return false;
        }

        // Return result
        $result['data'] = Tools::jsonDecode($result['data'], true);
        if (!empty($result['data']['properties'])) {
            $result['data']['properties']['status'] = !$result['flag_hidden'];
        }
        return $result;
    }


    private static function _getByIds($ids = null)
    {
        // Check ID
        if (!is_array($ids)) {
            return false;
        }

        // DB stuff
        $cpdb = CpDb::getInstance();
        $table = $cpdb->prefix.CP_DB_TABLE;
        $limit = count($ids);

        // Collect IDs
        if (is_array($ids) && !empty($ids)) {
            $tmp = array();
            foreach ($ids as $id) {
                $tmp[] = 'id = \''.(int)$id.'\'';
            }
            $ids = implode(' OR ', $tmp);
            unset($tmp);
        }

        // Make the call
        $result = $cpdb->getResults("SELECT * FROM $table WHERE $ids ORDER BY id DESC LIMIT $limit", ARRAY_A);

        // Decode popup data
        if (is_array($result) && !empty($result)) {
            foreach ($result as $key => $popup) {
                $result[$key]['data'] = Tools::jsonDecode($popup['data'], true);
                if (!empty($result[$key]['data']['properties'])) {
                    $result[$key]['data']['properties']['status'] = !$popup['flag_hidden'];
                }
            }

            return $result;

        // Failed query
        } else {
            return false;
        }
    }


    /**
     * Is popup deleted
     * @param  int  $id
     * @return bool
     */
    public static function isDeleted($id)
    {
        $id = (int) $id;
        $table = _DB_PREFIX_.CP_DB_TABLE;
        return Db::getInstance()->getValue("SELECT flag_deleted FROM $table WHERE id=$id");
    }

    /**
     * Publish / Unpublish popup(s)
     * @param  int|array $id
     * @param  bool $published
     * @return bool
     */
    public static function changeStatus($id, $published)
    {
        if (is_array($id)) {
            $ids = implode(', ', $id);
            $res = Db::getInstance()->update(CP_DB_TABLE, array('flag_hidden' => $published ? 0 : 1), "id IN ($ids)", count($id));
        } else {
            $id = (int) $id;
            $res = Db::getInstance()->update(CP_DB_TABLE, array('flag_hidden' => $published ? 0 : 1), "id = $id", 1);
        }
        if ($res) {
            $published ? CpPopups::addIndex($id) : CpPopups::removeIndex($id);
        }
        return $res;
    }
}
