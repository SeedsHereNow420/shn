<?php

class Cart extends CartCore
{
	public function getOrderTotal($with_taxes = true, $type = Cart::BOTH, $products = null, $id_carrier = null, $use_cache = true)
	{
		$total = parent::getOrderTotal($with_taxes, $type, $products, $id_carrier, $use_cache);

		if ($type == Cart::BOTH) {
			require_once _PS_MODULE_DIR_ . 'bestkit_custompayment/includer.php';
			$bestkit_custompayment = Module::getInstanceByName('bestkit_custompayment');
			if ($bestkit_custompayment->id && $bestkit_custompayment->active) {
				$custompayment_row = BestkitCustomPayment::isUsed($this->id);
				if (isset($custompayment_row['id_bestkit_custompayment']) && $custompayment_row['id_bestkit_custompayment']) {
					return $custompayment_row['total'] + $custompayment_row['fee'];
				}
			}
		}

		return $total;
	}
}