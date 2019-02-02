<?php
/**
* 2010-2017 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2017 Webkul IN
*  @license   https://store.webkul.com/license.html
*/

class NewsTicker extends ObjectModel
{
    public $id_news_ticker;
    public $position;
    public $color;
    public $active;
    public $date_add;
    public $date_upd;

    public $message;
    public $anchor_link;

    public static $definition = array(
        'table' => 'wk_news_ticker',
        'primary' => 'id_news_ticker',
        'multilang' => true,
        'fields' => array(
            'position' => array('type' => self::TYPE_INT, 'validate' => 'isInt', 'required' => true),
            'color' => array('type' => self::TYPE_STRING, 'size' => 30),
            'active' => array('type' => self::TYPE_INT),
            'date_add' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            'date_upd' => array('type' => self::TYPE_DATE, 'validate' => 'isDateFormat'),
            //lang_fields
            'message' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 200, 'required' => true),
            'anchor_link' => array('type' => self::TYPE_STRING, 'lang' => true, 'size' => 150),
        )
    );

    /**
     * insert the lang field data at adding a new language.
     */
    public static function insertLangIdinAllTables($newIdLang, $langTables)
    {
        $lang_id = Configuration::get('PS_LANG_DEFAULT');
        if ($langTables) {
            foreach ($langTables as $tables) {
                $tableIdArr = Db::getInstance()->executeS('SELECT `id_news_ticker` FROM `'._DB_PREFIX_.$tables.'` ');

                if ($tableIdArr) {
                    foreach ($tableIdArr as $table_id) {
                        $tableLangArr = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.$tables.'_lang` WHERE `id_news_ticker` = '.(int) $table_id['id_news_ticker'].' AND `id_lang` = '.(int) $lang_id);

                        if ($tableLangArr) {
                            $table_all_val = '';
                            foreach ($tableLangArr as $table_key => $table_val) {
                                if ($table_key == 'id_news_ticker') {
                                    $table_all_val = "'".(int)$table_val."'";
                                } elseif ($table_key == 'id_lang') {
                                    $table_all_val = $table_all_val.', '."'".(int)$newIdLang."'";
                                } else {
                                    $content = str_replace("'", "\'", pSQL($table_val));
                                    $table_all_val = $table_all_val.', '."'".pSQL($content)."'";
                                }
                            }
                        }
                        // we already used pSQL() and int for type casting when we creating this string $table_all_val.
                        Db::getInstance()->execute(
                            'INSERT INTO `'._DB_PREFIX_.$tables.'_lang` VALUES ('.$table_all_val.')'
                        );
                    }
                }
            }
        }
    }

    /**
     * getTickerDetailById select the ticker details by passing
     * ticker id
     * @param  int $idTicker
     * @return array
     */
    public function getTickerDetailById($idTicker)
    {
        if ($idTicker) {
            return Db::getInstance()->getRow(
                'SELECT *
                FROM `'._DB_PREFIX_.'wk_news_ticker`
                WHERE `id_news_ticker` = '.(int) $idTicker
            );
        }

        return false;
    }

    /**
     * getTickerLangDetailById select the ticker multilang detail by passing
     * ticker id
     * @param  int $idTicker
     * @return multidimentional associative array
     */
    public function getTickerLangDetailById($idTicker)
    {
        if ($idTicker) {
            return Db::getInstance()->executeS(
                'SELECT *
                FROM `'._DB_PREFIX_.'wk_news_ticker_lang`
                WHERE `id_news_ticker` = '.(int) $idTicker
            );
        }

        return false;
    }

    /**
     * getTickerDetailBylangId get the ticker details by lang id
     * @param  int $idLang
     * @return array
     */
    public function getTickerDetailBylangId($idLang)
    {
        if ($idLang) {
            return Db::getInstance()->executeS(
                'SELECT ntl.*, nt.`color`
                FROM `'._DB_PREFIX_.'wk_news_ticker` nt
                JOIN `'._DB_PREFIX_.'wk_news_ticker_lang` ntl
                ON (nt.`id_news_ticker` = ntl.`id_news_ticker`)
                WHERE `id_lang` = '.(int) $idLang.
                ' AND nt.`active` = 1
                ORDER BY nt.`position` ASC'
            );
        }

        return false;
    }

    /**
     * Move a news ticker
     * @param bool $way Up (1)  or Down (0)
     * @param int $position
     * @return bool Update result
     */
    public function updatePosition($way, $position, $id_news_ticker = null)
    {
        if (!$res = Db::getInstance()->executeS(
            'SELECT `position`, `id_news_ticker`
            FROM `'._DB_PREFIX_.'wk_news_ticker`
            WHERE `id_news_ticker` = '.(int)($id_news_ticker ? $id_news_ticker : $this->id).'
            ORDER BY `position` ASC'
        )) {
            return false;
        }

        foreach ($res as $newsTicker) {
            if ((int)$newsTicker['id_news_ticker'] == (int)$this->id) {
                $moved_newsTicker = $newsTicker;
            }
        }

        if (!isset($moved_newsTicker) || !isset($position)) {
            return false;
        }

        // < and > statements rather than BETWEEN operator
        // since BETWEEN is treated differently according to databases
        return (Db::getInstance()->execute('
            UPDATE `'._DB_PREFIX_.'wk_news_ticker`
            SET `position`= `position` '.($way ? '- 1' : '+ 1').'
            WHERE `position`
            '.($way
                ? '> '.(int)$moved_newsTicker['position'].' AND `position` <= '.(int)$position
                : '< '.(int)$moved_newsTicker['position'].' AND `position` >= '.(int)$position))
            && Db::getInstance()->execute(
                'UPDATE `'._DB_PREFIX_.'wk_news_ticker`
                SET `position` = '.(int)$position.'
                WHERE `id_news_ticker`='.(int)$moved_newsTicker['id_news_ticker']
            )
        );
    }

    /**
     * getHigherPosition
     *
     * Get the higher ticker position
     *
     * @return int $position
     */
    public function getHigherPosition()
    {
        $sql = 'SELECT MAX(`position`)
                FROM `'._DB_PREFIX_.'wk_news_ticker`';
        $position = DB::getInstance()->getValue($sql);
        $result = (is_numeric($position)) ? $position : - 1;

        return $result +1;
    }

    /**
     * delete the ticker detail
     * @return [type] [description]
     */
    public function delete()
    {
        $return = parent::delete();
        $this->cleanPositions();

        return $return;
    }

    /**
     * Reorder ticker position
     * Call it after deleting a feature.
     *
     * @return bool $return
     */
    public static function cleanPositions()
    {
        Db::getInstance()->execute('SET @i = -1', false);
        $sql = 'UPDATE `'._DB_PREFIX_.'wk_news_ticker`
        SET `position` = @i:=@i+1 ORDER BY `position` ASC';

        return (bool)Db::getInstance()->execute($sql);
    }
}
