<?php

require_once _PS_MODULE_DIR_ . 'bestkit_custompayment/includer.php';

class AdminBestkitCustomPaymentController extends ModuleAdminController
{
    public function __construct()
    {
        $this->context = Context::getContext();
        $this->table = 'bestkit_custompayment';
        $this->className = 'BestkitCustomPayment';
        $this->lang = TRUE;
        $this->bootstrap = TRUE;
        $this->_defaultOrderBy = 'id_bestkit_custompayment';
        $this->_orderBy = 'id_bestkit_custompayment';
        $this->_orderWay = 'ASC';
		
		$this->addRowAction('edit');

        parent::__construct();

		$this->bulk_actions = array(
			'delete' => array(
				'text' => $this->l('Delete selected'),
				'icon' => 'icon-trash',
				'confirm' => $this->l('Delete selected items?')
			)
		);

        $this->fields_list = array(
            'id_bestkit_custompayment' => array('title' => $this->l('ID'), 'width' => 25, 'align' => 'center'),
            'name' => array('title' => $this->l('Name')),
            'commision_percent' => array('title' => $this->l('Percent'), 'type' => 'int', 'align' => 'center'),
            'commision_amount' => array('title' => $this->l('Value'), 'type' => 'int', 'align' => 'center'),
        );

        $this->allowed_ext = array('gif', 'png', 'jpg');
    }
	
/*
    public function initToolbar()
    {
        parent::initToolbar();
        unset($this->toolbar_btn['new']);
    }
*/

    protected function returnOnOffValues($name)
    {
        return array(
            array(
                'id' => $name . '_on',
                'value' => 1,
                'label' => $this->l('Yes')
            ),
            array(
                'id' => $name . '_off',
                'value' => 0,
                'label' => $this->l('No')
            )
        );
    }

    public function getImageValue()
    {
        $image = $this->module->images_dir . $this->object->id . '.' . $this->object->ext;
        if (file_exists($image) && !empty($this->object->ext)) {
            unset($this->fields_value['filename']);
            $this->fields_value['filename']['image'] = "<img src=\"" . $this->module->images_url . $this->object->id . '.' . $this->object->ext . "\" alt=\"\" class=\"imgm\" />";
            $this->fields_value['filename']['size'] = filesize($image) / 1000;
            $this->fields_value['filename']['delete_url'] = $this->context->link->getAdminLink('AdminBestkitCustomPayment') . '&id_bestkit_custompayment=' . $this->object->id . '&action=deleteimage';
            $this->fields_value['filename']['type'] = 'image';
        }

        return $this->fields_value;
    }
	
	public function getFieldsValue($obj)
	{
		$return = parent::getFieldsValue($obj);
		
		//custom [begin]
		$carriers = BestkitCustomPaymentCarrierRestriction::getCarrierRestriction($obj->id);
		$config_value = array();
		if (count($carriers)) {
			foreach ($carriers as $pg) {
				$config_value[] = $pg['id_reference'];
			}
			unset($pg);
		}
		$return['id_carrier[]'] = $config_value;
		//custom [end]
		
		//custom [begin]
		$groups = BestkitCustomPaymentGroupRestriction::getGroupRestriction($obj->id);
		$config_value = array();
		if (count($groups)) {
			foreach ($groups as $pg) {
				$config_value[] = $pg['id_group'];
			}
			unset($pg);
		}
		$return['id_group[]'] = $config_value;
		//custom [end]
		
//print_r($return); die;

		return $return;
	}

    public function renderForm()
    {
        $this->display = 'edit';
        $this->initToolbar();

		$commision_currency = array();
		$commision_currency[] = array(
			'name' => $this->l('Checkout currency'),
			'id' => 0,
		);
		foreach (Currency::getCurrencies() as $currency) {
			$commision_currency[$currency['id_currency']] = array(
				'name' => $currency['name'] . ' (' . $currency['iso_code'] . ')',
				'id' => $currency['id_currency'],
			);
		}
		unset($currency);
		
		$order_states = array();
		$order_states[] = array(
			'name' => $this->l('Please choose order status'),
			'id' => -1,
		);
		foreach (OrderState::getOrderStates($this->context->language->id) as $order_state) {
			if (!$order_state['deleted'])
				$order_states[$order_state['id_order_state']] = array(
					'name' => $order_state['name'],
					'id' => $order_state['id_order_state'],
				);
		}
		unset($order_state);
		
		//since 1.6.2
		$_carriers = array();
		$_carriers[] = array(
			'id_carrier[]' => '--',
			'name' => '--',
		);
		foreach (Carrier::getCarriers($this->context->language->id) as $_carrier) {
			$_carriers[] = array(
                'id_carrier[]' => $_carrier['id_reference'],
                'name' => $_carrier['name'],
            );
		}
		unset($_carrier);
		
		//since 1.6.5
		$_groups = array();
		$_groups[] = array(
			'id_group[]' => '--',
			'name' => '--',
		);
		foreach (Group::getGroups($this->context->language->id) as $_group) {
			$_groups[] = array(
                'id_group[]' => $_group['id_group'],
                'name' => $_group['name'],
            );
		}
		unset($_group);
		
        $this->fields_form = array(
            'tinymce' => TRUE,
            'legend' => array('title' => $this->l('BestKit Custom Payment'), 'image' => '../img/admin/tab-categories.gif'),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Name:'),
                    'name' => 'name',
                    'id' => 'name',
                    'lang' => TRUE,
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Order status'),
                    'required' => TRUE,
                    'name' => 'id_order_state',
                    'id' => 'id_order_state',
                    'options' => array(
                        'query' => $order_states,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'file',
                    'label' => $this->l('File:'),
                    'name' => 'file',
                    'display_image' => TRUE,
                    'files' => $this->getImageValue(),
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description short'),
                    'name' => 'description_short',
                    //'autoload_rte' => TRUE,
                    'lang' => TRUE,
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description'),
                    'name' => 'description',
                    'autoload_rte' => TRUE,
                    'lang' => TRUE,
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Confirmation text'),
                    'desc' => $this->l('this text will be visible at the order-confirmation page'),
                    'name' => 'confirmation_text',
                    'autoload_rte' => TRUE,
                    'lang' => TRUE,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Fee percent:'),
                    'desc' => $this->l('For example 0.95 will give a 5% discount on the order total; 1.05 will add a 5% additional fee.'),
                    'name' => 'commision_percent',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Fee amount:'),
                    'desc' => $this->l('For example entering 5 will add the amount to the order total. The amount will be automatically converted to the currency selected.  Entering -5 (minus five) will mean a discount.'),
                    'name' => 'commision_amount',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Add fee only if cart amount lower than:'),
                    'desc' => $this->l('In base amount. Leave empty for ignore'),
                    'name' => 'max_commision_amount',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Currency of fee:'),
                    //'required' => TRUE,
                    'name' => 'commision_currency',
                    'id' => 'commision_currency',
                    'options' => array(
                        'query' => $commision_currency,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'select',
                    'multiple' => true,
                    'label' => $this->l('Allowed carriers:'),
                    'desc' => $this->l('By default all allowed.'),
                    'name' => 'id_carrier[]',
                    'options' => array(
                        'query' => $_carriers,
                        'id' => 'id_carrier[]',
                        'name' => 'name',
                    ),
                ),
                array(
                    'type' => 'select',
                    'multiple' => true,
                    'label' => $this->l('Allowed groups:'),
                    'desc' => $this->l('By default all allowed.'),
                    'name' => 'id_group[]',
                    'options' => array(
                        'query' => $_groups,
                        'id' => 'id_group[]',
                        'name' => 'name',
                    ),
                ),
            ),
            'submit' => array('title' => $this->l('   Save   ')),
            'buttons' => array(
				'save-and-stay' => array(
					'title' => $this->l('Save and Stay'),
					'name' => 'submitAdd'.$this->table.'AndStay',
					'type' => 'submit',
					'class' => 'btn btn-default pull-right',
					'icon' => 'process-icon-save',
				),
			),
		);

        //$this->fields_value['pages[]'] = $this->object->useDataAsArray('pages');
/*
        if (Shop::isFeatureActive()) {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->l('Shop association:'),
                'name' => 'checkBoxShopAsso',
            );
        }
*/
		/*
        $js = '<script type="text/javascript" src="./themes/default/js/tree.js"></script>' .
            '<script type="text/javascript" src="../modules/bestkit_checkoutfields/views/js/admin/checkoutfields.js"></script>';

        return parent::renderForm() . $js;
		*/
		
		return parent::renderForm();
    }

    public function processAdd()
    {
        $this->_validate();
        parent::processAdd();
    }

    public function processUpdate()
    {
        $this->_validate();
        parent::processUpdate();
    }
	
    protected function _validate()
    {
        if (isset($_FILES['file']) && !empty($_FILES['file']['tmp_name'])) {
            $current_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if (!in_array($current_extension, $this->allowed_ext)) {
                $this->errors[] = Tools::displayError('The file is not image');
                //return FALSE;
            }
        }

        return TRUE;
    }
	
    public function processsave()
    {
        $return = parent::processsave();
		
		//since 1.6.2 [begin]
		if (Tools::isSubmit('id_carrier')) {
			$id_carriers = Tools::getValue('id_carrier');
			BestkitCustomPaymentCarrierRestriction::clearDataForStore($this->object->id);
			
			foreach ($id_carriers as $id_carrier) {
				if ($id_carrier == '--')
					continue;
					
				$obj = new BestkitCustomPaymentCarrierRestriction();
				$obj->id_reference = $id_carrier;
				$obj->id_bestkit_custompayment = $this->object->id;
				
				$obj->save();
			}
			unset($id_carrier);
		}
		//since 1.6.2 [end]
		
		//since 1.6.2 [begin]
		if (Tools::isSubmit('id_group')) {
			$id_groups = Tools::getValue('id_group');
			BestkitCustomPaymentGroupRestriction::clearDataForStore($this->object->id);
			
			foreach ($id_groups as $id_group) {
				if ($id_group == '--')
					continue;
					
				$obj = new BestkitCustomPaymentGroupRestriction();
				$obj->id_group = $id_group;
				$obj->id_bestkit_custompayment = $this->object->id;
				
				$obj->save();
			}
			unset($id_group);
		}
		//since 1.6.2 [end]

        if (empty($this->errors)) {
            if (isset($_FILES['file']) && !empty($_FILES['file']['tmp_name'])) {
                /* Check icon validity */
                if ($error = ImageManager::validateUpload($_FILES['file'])) {
                    $this->errors[] = $error;
                    /* Copy new icon */
                }

                if (empty($this->errors)) {
                    //delete current icon image file
                    if (file_exists(_PS_TMP_IMG_DIR_ . 'bestkit_custompayment/' . $this->object->id . '.' . $this->object->ext)) {
                        unlink(_PS_TMP_IMG_DIR_ . 'bestkit_custompayment/' . $this->object->id . '.' . $this->object->ext);
                    }

                    $current_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $this->object->ext = $current_extension;
                    $this->object->update();

                    if (file_exists(_PS_TMP_IMG_DIR_ . 'bestkit_custompayment_mini_' . $this->object->id . '.jpg')) {
                        unlink(_PS_TMP_IMG_DIR_ . 'bestkit_custompayment_mini_' . $this->object->id . '.jpg');
                    }

                    if (!copy($_FILES['file']['tmp_name'], $this->module->images_dir . $this->object->id . '.' . $current_extension)) {
                        $this->errors[] = sprintf($this->l('An error occurred while uploading icon: %1$s to %2$s'),
                            $_FILES['file']['tmp_name'], $this->module->images_dir . $this->object->id . '.' . $current_extension);
                    }
                }
            }
        }

        return $return;
    }

    public function processDeleteImage()
    {
        $return = parent::processDeleteImage();
        
        $filename = $this->module->images_dir . $this->object->id . '.' . $this->object->ext;
        if (file_exists($filename)) {
            if (unlink($filename)) {
                $this->object->ext = '';
                return $this->object->update();
            }
        }

        return $return;
    }
}