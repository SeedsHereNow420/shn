<?php
/**
 * 2007-2016 PrestaShop
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

class TemplateProductsMEP extends ObjectModelCPM
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $is_active;

    public $products = array();

    public static $definition = array(
        'table' => 'mep_template_products',
        'primary' => 'id_mep_template_products',
        'fields' => array(
            'name' => array(
                'type' => self::TYPE_STRING,
                'validate' => ValidateTypeCPM::IS_STRING
            )
        )
    );

    public function __construct($id = null, $id_lang = null, $id_shop = null)
    {
        parent::__construct($id, $id_lang, $id_shop);
        if ($this->id) {
            $this->products = TemplateProductsProductMEP::getAllByTemplateProducts($this->id);
        }
    }

    public function toArray()
    {
        $array = parent::toArray();
        $array['products'] = $this->products;
        return $array;
    }

    public function add($auto_date = true, $null_values = false)
    {
        $result = parent::add($auto_date, $null_values);
        if ($result) {
            $this->afterSave();
        }
        return $result;
    }

    public function update($null_values = false)
    {
        $result = parent::update($null_values);
        if ($result) {
            $this->afterSave();
        }
        return $result;
    }

    public function afterSave()
    {
        TemplateProductsProductMEP::deleteByTemplateProducts($this->id);
        $insert = array();
        foreach ($this->products as $product) {
            $insert[] = array(
                self::$definition['primary'] => $this->id,
                'id_product' => $product['id_product']
            );
        }
        Db::getInstance()->insert(
            'mep_template_products_product',
            $insert
        );
    }
}
