<?php
class SampleData
{
   private $tables = array(
        'st_easy_content' => array(
            'st_easy_content_column' => array(
                'st_easy_content_element' => array(
                    'st_easy_content_setting' => array('where' => 'id_st_easy_content_setting={$identify} AND setting_type=2'),
                    'where' => 'id_st_easy_content_column={$identify}',
                ),
                'st_easy_content_setting' => array('where' => 'id_st_easy_content_setting={$identify} AND setting_type=1'),
                'where' => 'id_st_easy_content={$identify} AND id_parent=0',
            ),
            'st_easy_content_font' => array('where' => 'id_st_easy_content={$identify}'),
            'st_easy_content_lang' => array('where' => 'id_st_easy_content={$identify} AND id_lang={$id_lang}'),
            'st_easy_content_shop' => array('where' => 'id_st_easy_content={$identify} AND id_shop={$id_shop}'),
            'where' => 'id_st_easy_content IN(3,5,7,8,9,10,11,12,13,105,106,129,131) AND id_st_easy_content IN (select id_st_easy_content from {_DB_PREFIX_}st_easy_content_shop where id_shop={$id_shop})'
        ),
    );
    
    function fetch_data($table, $values=array(), $identify=0, $id_shop=0)
    {
        $result = array();
        $id = 'id_'.$table;
        $id_lang = Context::getContext()->language->id;
        $where =  str_replace(array('{$id_lang}', '{$id_shop}', '{$identify}', '{_DB_PREFIX_}'), array($id_lang, $id_shop, $identify, _DB_PREFIX_), $values['where']);
        $sql = 'SELECT * FROM '._DB_PREFIX_.$table.' WHERE '.$where;
        $result = Db::getInstance()->executeS($sql);
        unset($values['where']);
        $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.$table.'` `id_parent`');
        if(is_array($field) && count($field)) {
            foreach($result AS $value) {
                if ($subs = $this->get_subs($table, $value[$id])) {
                    $result = array_merge($result, $subs);
                }
            }  
        }
        if ($result) {
            foreach($values AS $table => $value) {
                foreach($result AS &$row) {
                    $row[$table] = $this->fetch_data($table, $value, $row[$id], $id_shop);
                }
            }
        }
        return $result;
    }
    
    function get_subs($table='', $id=0)
    {
        $ret = array();
        if (!$table || !$id) {
            return $ret;
        }
        $sql = 'SELECT * FROM '._DB_PREFIX_.$table.' WHERE id_parent='.(int)$id;
        if($ret = Db::getInstance()->executeS($sql)) {
            foreach($ret AS $value) {
                $ret = array_merge($ret, $this->get_subs($table, $value['id_'.$table]));
            }
        }
        return $ret;
    }
    
    function insert_data($table, $data, $ref_field='', $ref_id=0, $id_shop)
    {
        if (!$data) {
            return false;
        }
        $db = Db::getInstance();
        $id = 'id_'.$table;
        $remove_pri = false;
        $id_parent = false;
        $id_map = array();
        $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.$table.'` `'.$id.'`');
        if (is_array($field) && count($field) && strpos($field[0]['Extra'], 'auto_increment') !== false) {
            $remove_pri = true;
        }
        $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.$table.'` `id_parent`');
        if (is_array($field) && count($field)) {
            $id_parent = true;
        }
        foreach($data AS $value) {
            $old_id = 0;
            if ($remove_pri) {
                $old_id = $value[$id];
                // Remove primary ID.
                unset($value[$id]);
            }
            if ($ref_field && $ref_id) {
                if (key_exists($id, $value)) {
                    $value[$id] = (int)$ref_id;
                } else {
                    $value[$ref_field] = (int)$ref_id;
                }
            }
            
            $row = array();
            $children = array();
            foreach($value AS $k => $v) {
                if (is_array($v)) {
                    $children[$k] = $v;
                } elseif ($k == 'id_shop') {
                    $row[$k] = $id_shop;
                } else {
                    $row[$k] = pSQL($v, true);
                }
            }
            
            if ($id_parent && key_exists($row['id_parent'], $id_map)) {
                $row['id_parent'] = $id_map[$row['id_parent']];
            }
            if (key_exists('id_lang', $row)) {
                foreach(Language::getLanguages(false) AS $lang) {
                    $row['id_lang'] = $lang['id_lang'];
                    $db->insert($table, $row, false, true, Db::INSERT_IGNORE);
                }
                return true;
            }   
            if($db->insert($table, $row, false, true, Db::INSERT_IGNORE)) {
               $row_id = $db->Insert_ID();
               if ($id_parent && !key_exists($old_id, $id_map)) {
                $id_map[$old_id] = $row_id;
               }
               // Insert data to reference table.
               foreach($children AS $tbl => $_data) {
                    if (!is_array($_data) || !count($_data)) {
                        continue;
                    }
                    $this->insert_data($tbl, $_data, $id, $row_id, $id_shop);
               }
            }
        }
    }
    
    public function export($id_shop = 0, $file='')
    {
        if (!$id_shop || !$file) {
            return false;
        }
        $rs = $this->fetch_data('st_easy_content', $this->tables['st_easy_content'], 0, $id_shop);
        /*$rs[0]['bg_img'] = '/modules/steasycontent/views/img/'.$rs[0]['bg_img'];
        $rs[0]['st_easy_content_column'][1]['st_easy_content_element'][0]['st_easy_content_setting'][29]['setting_v']='/modules/steasycontent/views/img/testimonalshomepage1.jpg';
        $rs[0]['st_easy_content_column'][1]['st_easy_content_element'][0]['st_easy_content_setting'][32]['setting_v']='/modules/steasycontent/views/img/testimonalshomepage1.jpg';
        $rs[0]['st_easy_content_column'][1]['st_easy_content_element'][0]['st_easy_content_setting'][33]['setting_v']='/modules/steasycontent/views/img/testimonalshomepage1.jpg';
        $rs[0]['st_easy_content_column'][1]['st_easy_content_element'][2]['st_easy_content_setting'][29]['setting_v']='/modules/steasycontent/views/img/testimonalshomepage2.jpg';
        $rs[0]['st_easy_content_column'][1]['st_easy_content_element'][2]['st_easy_content_setting'][32]['setting_v']='/modules/steasycontent/views/img/testimonalshomepage2.jpg';
        $rs[0]['st_easy_content_column'][1]['st_easy_content_element'][2]['st_easy_content_setting'][33]['setting_v']='/modules/steasycontent/views/img/testimonalshomepage2.jpg';*/
        $rs[6]['st_easy_content_column'][1]['st_easy_content_element'][0]['st_easy_content_setting'][16]['setting_v']='/modules/steasycontent/views/img/transoferthemebanner4.jpg';
        return @file_put_contents($file, serialize($rs));
    }
    
    public function import($id_shop = 0, $data=array())
    {
        if (!$id_shop || !is_array($data) || !count($data)) {
            return false;
        }
        $this->insert_data('st_easy_content', $data, '', 0, $id_shop);
        return true;
    }
}