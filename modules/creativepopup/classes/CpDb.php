<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

defined('OBJECT') or define('OBJECT', 'OBJECT');
defined('OBJECT_K') or define('OBJECT_K', 'OBJECT_K');
defined('ARRAY_A') or define('ARRAY_A', 'ARRAY_A');
defined('ARRAY_N') or define('ARRAY_N', 'ARRAY_N');

class CpDb
{
    private static $instance = null;
    public $prefix = _DB_PREFIX_;
    public $charset = 'UTF8';

    public static function getInstance()
    {
        return empty(self::$instance) ? self::$instance = new CpDb() : self::$instance;
    }

    public function prepare($str, $arg1)
    {
        if (stripos($str, $this->prefix.'creativepopup') === false) {
            return 'SELECT 0';
        }
        return sprintf($str, $arg1);
    }

    public function query($q)
    {
        return Db::getInstance()->execute($q);
    }

    public function getVar($q)
    {
        return Db::getInstance()->getValue($q);
    }

    protected function realEscape($string)
    {
        return Db::getInstance()->_escape($string);
    }

    public function escape($data)
    {
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                if (is_array($v)) {
                    $data[$k] = $this->escape($v);
                } else {
                    $data[$k] = $this->realEscape($v);
                }
            }
        } else {
            $data = $this->realEscape($data);
        }

        return $data;
    }

    public function getResults($query = null, $output = OBJECT)
    {
        $res = Db::getInstance()->executeS($query);
        if ($output == ARRAY_A) {
            return $res;
        }
        foreach ($res as &$item) {
            $item = (object) $item;
        }
        return $res;
    }

    public function getRow($query = null, $output = OBJECT, $y = 0)
    {
        list($q) = explode('LIMIT', $query);
        $res = Db::getInstance()->getRow($q);
        if ($output == ARRAY_A) {
            return $res;
        }
        return $res ? (object) $res : $res;
    }

    public function getCol($query = null, $x = 0)
    {
        list($q) = explode('LIMIT', $query);
        return array_values(Db::getInstance()->getRow($q));
    }

    public function insert($table, $data, $format)
    {
        if (is_string($format)) {
            $format = array_fill(0, count($data), $format);
        }
        $db = Db::getInstance();
        $i = 0;
        foreach ($data as $key => &$value) {
            $value = $format[$i++] == '%s' ? $db->_escape($value) : (int)$value;
        }
        $table = preg_replace('/^'.$this->prefix.'/', '', $table); // remove prefix if exists
        $res = $db->insert($table, $data);
        $this->insert_id = $db->insert_id();
        return $res ? 1 : false;
    }

    public function update($table, $data, $where, $format, $format_where = '%d')
    {
        if (is_string($format)) {
            $format = array_fill(0, count($data), $format);
        }
        if (is_string($format_where)) {
            $format_where = array_fill(0, count($where), $format_where);
        }
        $db = Db::getInstance();
        $i = 0;
        foreach ($data as $key => &$value) {
            $value = $format[$i++] == '%s' ? $db->_escape($value) : (int)$value;
        }
        $w = array();
        $i = 0;
        foreach ($where as $key => &$value) {
            $w[] = $key .' = '. ($format_where[$i++] == '%s' ? $db->_escape($value) : (int)$value);
        }
        $table = preg_replace('/^'.$this->prefix.'/', '', $table); // remove prefix if exists
        $res = $db->update($table, $data, implode(' AND ', $w));
        return $res ? 1 : false;
    }

    public function delete($table, $where, $where_format)
    {
        if (is_string($where_format)) {
            $where_format = array_fill(0, count($where), $where_format);
        }
        $db = Db::getInstance();
        $w = array();
        $i = 0;
        foreach ($where as $key => &$value) {
            $w[] = $key .' = '. ($where_format[$i++] == '%s' ? $db->_escape($value) : (int)$value);
        }
        $table = preg_replace('/^'.$this->prefix.'/', '', $table); // remove prefix if exists
        $res = $db->delete($table, implode(' AND ', $w));
        return $res ? 1 : false;
    }
}
