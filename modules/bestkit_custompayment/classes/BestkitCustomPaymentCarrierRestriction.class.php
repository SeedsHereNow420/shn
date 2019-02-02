<?php

require_once (_PS_MODULE_DIR_ . 'bestkit_custompayment/includer.php');

class BestkitCustomPaymentCarrierRestriction extends ObjectModel
{
    public $payment_module;
	
    public static $definition = array(
        'table' => 'bestkit_custompayment_carrier',
        'primary' => 'id_bestkit_custompayment_carrier',
        'multilang' => false,
        'fields' => array(
            'id_bestkit_custompayment' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => TRUE), //, 'shop' => TRUE
            'id_reference' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => TRUE), //, 'shop' => TRUE
        )
	);
/*
    public function __construct($id = NULL, $id_lang = NULL)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, NULL);
    }
*/
	public static function getCarrierRestriction($id_bestkit_custompayment) {
		$restrictions = Db::getInstance()->executeS('
			select pp.*
			from `'._DB_PREFIX_.'bestkit_custompayment_carrier` pp
			where id_bestkit_custompayment = '.(int)$id_bestkit_custompayment.'
			group by pp.id_bestkit_custompayment_carrier
		');
		
		return $restrictions;
	}

	public static function clearDataForStore($id_bestkit_custompayment) {
		$restrictions = self::getCarrierRestriction($id_bestkit_custompayment);
		
		foreach ($restrictions as $restriction) {
			$obj = new BestkitCustomPaymentCarrierRestriction($restriction['id_bestkit_custompayment_carrier']);
			$obj->delete();
		}
		unset($restriction);
	}
}