<?php

if (!defined('_PS_VERSION_')) {
	exit;
}
class OrderStatusChange extends Module {
	public function __construct() {
		$this->name = 'orderstatuschange';
		$this->tab = 'front_office_features';
		$this->version = '7.0.1';
		$this->author = 'presta_world';
		$this->module_key = '6bb80d25b1f8ca019707332a247a8fdc';
		$this->bootstrap = true;
		parent::__construct();
		$this->displayName = $this->l('Order Status Change');
		$this->description = $this->l('Change Order status without open the order');
	}

	public function hookActionChangeOrderStatus($params) {
		$id_order = $params['params']['id_order'];
		$id_lang = $this->context->language->id;
		$order = new Order((int) $id_order);
		$idCurrentState = $order->getCurrentState();
		$amount_paid=$order->total_paid;
		$obj_order_state = new OrderState((int) $idCurrentState, $id_lang);
		$statuses = OrderState::getOrderStates((int) $id_lang);
		Media::addJsDefL('adminorder', $this->context->link->getAdminLink('AdminChangeOrderStatus'));
		$this->context->smarty->assign(array(
			'statuses' => $statuses,
			'obj_order_state' => $obj_order_state,
			'modules_dir' => _MODULE_DIR_,
			'idCurrentState' => $idCurrentState,
			'id_order' => $id_order,
			'pay_module' => $order->module,
			'amount_paid' => $amount_paid,
		)
		);
		unset($order);

		return $this->display(__FILE__, 'changestatus.tpl');
	}

	public function callInstallTab() {
		$this->installTab('AdminChangeOrderStatus', 'OrderStatus');
		return true;
	}

	public function installTab($class_name, $tab_name, $tab_parent_name = false) {
		$tab = new Tab();
		$tab->active = 1;
		$tab->class_name = $class_name;
		$tab->name = array();
		foreach (Language::getLanguages(true) as $lang) {
			$tab->name[$lang['id_lang']] = $tab_name;
		}

		if ($tab_parent_name) {
			$tab->id_parent = (int) Tab::getIdFromClassName($tab_parent_name);
		} else {
			$tab->id_parent = -1;
		}

		$tab->module = $this->name;
		return $tab->add();
	}

	public function install() {
		if (!parent::install()
			|| !$this->callInstallTab()
			|| !$this->registerHook('actionChangeOrderStatus')
		) {
			return false;
		}

		return true;
	}

	public function reset() {
		if (!$this->uninstall(false)) {
			return false;
		}
		if (!$this->install(false)) {
			return false;
		}

		return true;
	}

	public function uninstallTab() {
		$moduleTabs = Tab::getCollectionFromModule($this->name);
		if (!empty($moduleTabs)) {
			foreach ($moduleTabs as $moduleTab) {
				$moduleTab->delete();
			}
		}
		return true;
	}

	public function uninstall() {
		if (!parent::uninstall()
			|| !$this->uninstallTab()
		) {
			return false;
		}

		return true;
	}
}
