<?php

require_once (_PS_MODULE_DIR_ . 'bestkit_custompayment/includer.php');

class BestkitCustomPaymentGroupRestriction extends ObjectModel
{
    public $payment_module;
	
    public static $definition = array(
        'table' => 'bestkit_custompayment_group',
        'primary' => 'id_bestkit_custompayment_group',
        'multilang' => false,
        'fields' => array(
            'id_bestkit_custompayment' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => TRUE), //, 'shop' => TRUE
            'id_group' => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => TRUE), //, 'shop' => TRUE
        )
	);
/*
    public function __construct($id = NULL, $id_lang = NULL)
    {
        Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
        parent::__construct($id, $id_lang, NULL);
    }
*/
	public static function getGroupRestriction($id_bestkit_custompayment) {
		$restrictions = Db::getInstance()->executeS('
			select pp.*
			from `'._DB_PREFIX_.'bestkit_custompayment_group` pp
			where id_bestkit_custompayment = '.(int)$id_bestkit_custompayment.'
			group by pp.id_bestkit_custompayment_group
		');
		
		return $restrictions;
	}

	public static function clearDataForStore($id_bestkit_custompayment) {
		$restrictions = self::getGroupRestriction($id_bestkit_custompayment);
		
		foreach ($restrictions as $restriction) {
			$obj = new BestkitCustomPaymentGroupRestriction($restriction['id_bestkit_custompayment_group']);
			$obj->delete();
		}
		unset($restriction);
	}
}