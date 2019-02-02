<?php
/**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

class ObjectModelCPM extends ObjectModel
{
    /**
     * @var int
     */
    public $position;

    /**
     * @var bool
     */
    public static $has_image = false;

    /**
     * @var bool
     */
    public static $lang_image = false;

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        if (isset(static::$definition['multishop']) && !Shop::isTableAssociated(static::$definition['table'])) {
            Shop::addTableAssociation(static::$definition['table'], static::$definition['multishop']);
        }

        parent::__construct($id, $id_lang, $id_shop);
    }

    public function getImage()
    {
        if (static::$lang_image) {
            if (!is_null($this->id_lang)) {
                if ($this->checkImage($this->id_lang)) {
                    return $this->getPathImage($this->id_lang);
                }
            } else {
                $images = array();
                foreach (ToolsModuleCPM::getLanguages(!defined('_PS_ADMIN_DIR_')) as $l) {
                    $images[$l['id_lang']] = false;
                    if ($this->checkImage($l['id_lang'])) {
                        $images[$l['id_lang']] = $this->getPathImage($l['id_lang']);
                    }
                }
                return $images;
            }
        } else {
            if ($this->checkImage()) {
                return $this->getPathImage();
            }
        }
        return false;
    }

    public function uploadImage($tmp_name, $id_lang = null)
    {
        if (!$this->id) {
            return false;
        }

        if ($tmp_name) {
            if ($this->checkImage($id_lang)) {
                $this->deleteImg($id_lang);
            }

            if (ToolsModuleCPM::checkImage($tmp_name)) {
                $width = null;
                $height = null;
                if (property_exists($this, 'image_size')) {
                    $width = $this->{'image_size'}[0];
                    $height = $this->{'image_size'}[1];
                }
                ImageManager::resize($tmp_name, $this->getFullPathImage($id_lang), $width, $height);
            }
            return true;
        }
        return false;
    }

    public function getFullPathImage($id_lang = null)
    {
        return _PS_MODULE_DIR_.ToolsModuleCPM::getModNameForPath(__FILE__).'/views/img/'
            .Tools::strtolower($this->getClassName()).'/'
            .(int)$this->id.(!is_null($id_lang) ? '_'.$id_lang : '').'.jpg';
    }

    public function getPathImage($id_lang = null)
    {
        return _MODULE_DIR_.ToolsModuleCPM::getModNameForPath(__FILE__).'/views/img/'
            .Tools::strtolower($this->getClassName()).'/'
            .(int)$this->id.(!is_null($id_lang) ? '_'.$id_lang : '').'.jpg';
    }

    public function checkImage($id_lang = null)
    {
        return file_exists($this->getFullPathImage($id_lang));
    }

    public function deleteImg($id_lang = null)
    {
        if ($this->checkImage($id_lang)) {
            unlink($this->getFullPathImage($id_lang));
            if (file_exists(_PS_TMP_IMG_DIR_.$this->getThumbnailName($id_lang))) {
                unlink(_PS_TMP_IMG_DIR_.$this->getThumbnailName($id_lang));
            }
        }
    }

    public function getClassName()
    {
        return 'object_model';
    }

    public function toArray()
    {
        $array = array(
            'id' => $this->id
        );
        if (static::$has_image) {
            $array['image'] = $this->getImage();
        }
        foreach (static::$definition['fields'] as $field_name => $field) {
            unset($field);
            if (Tools::substr($field_name, 0, 4) == 'ids_') {
                $field_name = Tools::substr($field_name, 4);
            }
            $method = 'toArray'.Tools::toCamelCase($field_name, true);
            if (method_exists($this, $method)) {
                $array[$field_name] = $this->{$method}();
            } else {
                $array[$field_name] = $this->{$field_name};
            }
        }
        return $array;
    }

    public function getThumbnailName($id_lang = null)
    {
        return 'tmp_'.$this->getClassName().'_'.$this->id.(!is_null($id_lang) ? '_'.$id_lang : '').'.jpg';
    }

    /**
     * @return DbQuery
     */
    public static function getAllQuery()
    {
        $query = new DbQuery();
        $query->select('a.`'.static::$definition['primary'].'`');
        $query->from(static::$definition['table'], 'a');
        return $query;
    }

    public static function getAll($as_array = false, $id_lang = null, DbQuery $query = null)
    {
        $result = Db::getInstance()->executeS((!is_null($query) ? $query->build() : static::getAllQuery()->build()));
        $result = is_array($result) && count($result) ? $result : array();
        $items = array();
        foreach ($result as $item) {
            $object = new static($item[static::$definition['primary']], $id_lang);
            $items[] = ($as_array ? $object->toArray() : $object);
        }
        return $items;
    }

    public static function getObjectThumbnail($id_object, $size, $id_lang = null)
    {
        $object = new static();
        $object->id = $id_object;
        return ImageManager::thumbnail(
            $object->getFullPathImage($id_lang),
            $object->getThumbnailName($id_lang),
            $size
        );
    }

    public static function getObjectImageLink($id_object, $id_lang = null)
    {
        /**
         * @var $object ObjectModel
         */
        $object = new static();
        $object->id = $id_object;
        $object->id_lang = $id_lang;
        return $object->getImage();
    }

    /**
     * Move a feature
     * @param bool $way Up (1)  or Down (0)
     * @param int $position
     * @return bool Update result
     */
    public function updatePosition($way, $position, $id_object = null)
    {
        if (!$res = Db::getInstance()->executeS(
            'SELECT `position`, `'.pSQL(static::$definition['primary']).'`
            FROM `'._DB_PREFIX_.pSQL(static::$definition['table']).'`
            WHERE `'.pSQL(static::$definition['primary']).'` = '.(int)($id_object ? $id_object : $this->id).'
            ORDER BY `position` ASC'
        )) {
            return false;
        }

        foreach ($res as $item) {
            if ((int)$item[static::$definition['primary']] == (int)$this->id) {
                $moved_item = $item;
            }
        }

        if (!isset($moved_item) || !isset($position)) {
            return false;
        }

        // < and > statements rather than BETWEEN operator
        // since BETWEEN is treated differently according to databases
        return (Db::getInstance()->execute(
            'UPDATE `'._DB_PREFIX_.pSQL(static::$definition['table']).'`
            SET `position`= `position` '.($way ? '- 1' : '+ 1').'
            WHERE `position`
            '.(
                    $way
                    ? '> '.(int)$moved_item['position'].' AND `position` <= '.(int)$position
                    : '< '.(int)$moved_item['position'].' AND `position` >= '.(int)$position
                )
        )
            && Db::getInstance()->execute(
                'UPDATE `'._DB_PREFIX_.pSQL(static::$definition['table']).'`
                SET `position` = '.(int)$position.'
                WHERE `'.pSQL(static::$definition['primary']).'`='.(int)$moved_item[static::$definition['primary']]
            ));
    }

    /**
     * Reorder object position
     * Call it after deleting a feature.
     *
     * @return bool $return
     */
    public static function cleanPositions()
    {
        Db::getInstance()->execute('SET @i = -1', false);
        $sql = 'UPDATE `'._DB_PREFIX_.pSQL(static::$definition['table']).'`
         SET `position` = @i:=@i+1 ORDER BY `position` ASC';
        return (bool)Db::getInstance()->execute($sql);
    }

    /**
     * getHigherPosition
     *
     * Get the higher object position
     *
     * @return int $position
     */
    public static function getHigherPosition()
    {
        $sql = 'SELECT MAX(`position`)
                FROM `'._DB_PREFIX_.pSQL(static::$definition['table']).'`';
        $position = DB::getInstance()->getValue($sql);
        return (is_numeric($position)) ? $position : - 1;
    }

    public function add($auto_date = true, $null_values = false)
    {
        if (array_key_exists('position', static::$definition['fields'])) {
            if ($this->position <= 0) {
                $this->position = self::getHigherPosition() + 1;
            }
        }
        return parent::add($auto_date, $null_values);
    }

    public function delete()
    {
        if (static::$lang_image) {
            foreach (ToolsModuleCPM::getLanguages(false) as $l) {
                $this->deleteImg($l['id_lang']);
            }
        } else {
            $this->deleteImg();
        }

        if (array_key_exists('position', static::$definition['fields'])) {
            $this->cleanPositions();
        }
        return parent::delete();
    }
}
