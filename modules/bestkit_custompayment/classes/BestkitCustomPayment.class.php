<?php

require_once _PS_MODULE_DIR_ . 'bestkit_custompayment/includer.php';

class BestkitCustomPayment extends ObjectModel
{
    public $ext;
    public $id_order_state;
    public $commision_percent;
    public $commision_amount; 
    public $commision_currency;
    public $max_commision_amount;
    public $name;
    public $description;
    public $description_short;
    public $confirmation_text;

    public static $definition = array(
        'table' => 'bestkit_custompayment',
        'primary' => 'id_bestkit_custompayment',
		'multilang' => true,
        'fields' => array(
			'ext' => 						array('type' => self::TYPE_STRING, 'validate' => 'isModuleName'),
			'id_order_state' => 			array('type' => self::TYPE_INT, 'validate' => 'isUnsignedId', 'required' => true),
			'commision_percent' => 			array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
			'commision_amount' => 			array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
			'commision_currency' => 		array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'max_commision_amount' => 		array('type' => self::TYPE_FLOAT, 'validate' => 'isFloat'),
			
			/* Lang fields */
			'name' => 					array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 128),
			'description' => 			array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
			'description_short' => 		array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
			'confirmation_text' => 		array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
        ),
    );

	public function __construct($id = NULL, $id_lang = NULL)
	{
		//Shop::addTableAssociation(self::$definition['table'], array('type' => 'shop'));
		parent::__construct($id, $id_lang, NULL);
	}
	
	public static function getAvailablePayments($id_lang = 0)
	{
		if (!$id_lang) 
			$id_lang = Context::getContext()->language->id;
	
		$available_payments = Db::getInstance()->executeS('
			SELECT * FROM `'._DB_PREFIX_.'bestkit_custompayment` bc
			JOIN `'._DB_PREFIX_.'bestkit_custompayment_lang` bcl ON (bc.`id_bestkit_custompayment` = bcl.`id_bestkit_custompayment` AND bcl.`id_lang` = '.(int)$id_lang.')'
		);
		
		$id_carrier = Context::getContext()->cart->id_carrier;
		$carrierObj = new Carrier($id_carrier);
		$result = array();
		foreach ($available_payments as $available_payment) {
			$carriers = BestkitCustomPaymentCarrierRestriction::getCarrierRestriction($available_payment['id_bestkit_custompayment']);
			if (empty($carriers)) {
				$result[] = $available_payment;
			} else {
				foreach ($carriers as $carrier) {
					if ($carrier['id_reference'] == $carrierObj->id_reference) {
						$result[] = $available_payment;
						break;
					}
				}
				unset($carrier);
			}
		}
		
		//since 1.6.5
		$id_groups = Context::getContext()->customer->getGroups();
		$result = array();
		foreach ($available_payments as $available_payment) {
			$groups = BestkitCustomPaymentGroupRestriction::getGroupRestriction($available_payment['id_bestkit_custompayment']);

			if (empty($groups)) {
				$result[] = $available_payment;
			} else {
				foreach ($groups as $group) {
					if (in_array($group['id_group'], $id_groups)) {
						$result[] = $available_payment;
						break;
					}
				}
				unset($carrier);
			}
		}

		return $result;
	}
	
	public function getFee($cart) {
		if (is_int($cart))
			$cart = new Cart($cart);
			
		$total = $cart->getOrderTotal(true, Cart::BOTH);
		$fee1 = 0;
		$fee2 = 0;
		
		if ($this->commision_percent != 0)
			$fee1 = ($total * $this->commision_percent) - $total;
		if ($this->commision_amount != 0) {
			$commision_currency = $this->commision_currency == 0 ? Context::getContext()->currency : new Currency($this->commision_currency); //, Context::getContext()->language->id
			$fee2 = Tools::convertPriceFull($this->commision_amount, $commision_currency, Context::getContext()->currency);
		}
		
		if ($this->max_commision_amount > 0) {
			$this->max_commision_amount = Tools::convertPriceFull($this->max_commision_amount, null, Context::getContext()->currency);
			
			if (Context::getContext()->cart->getOrderTotal() >= $this->max_commision_amount)
				return 0;
		}
		
/*print_r($total . chr(10)); 
print_r($total * $this->commision_percent . chr(10)); 
print_r($this->commision_percent . ' => ' . $this->commision_amount . chr(10)); 
print_r($fee1 . ' => ' . $fee2 . chr(10)); 
die;*/
		return $fee1 + $fee2;
	}

	public static function isUsed($id_cart)
	{
		return Db::getInstance()->getRow('
			select *
			from `'._DB_PREFIX_.'bestkit_custompayment_order`
			where id_cart = '.(int)$id_cart.'
		');
	}
	
}
