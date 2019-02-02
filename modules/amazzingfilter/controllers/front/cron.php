<?php
/**
* 2007-2017 Amazzing
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
*
*  @author    Amazzing <mail@amazzing.ru>
*  @copyright 2007-2017 Amazzing
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

class AmazzingFilterCronModuleFrontController extends ModuleFrontControllerCore
{
    public function initContent()
    {
        $token = Tools::getValue('token');
        if ($token == $this->module->getCronToken()) {
            $id_shop = (int)Tools::getValue('id_shop');
            $action = pSQL(Tools::getValue('action'));
            $total_indexed = (int)Tools::getValue('total_indexed');
            $time = pSQL(Tools::getValue('time', microtime(true)));
            if (Tools::getValue('complete')) {
                echo 'Total products indexed: '.$total_indexed;
                echo '<br>';
                echo 'Processing time: '.Tools::ps_round((microtime(true) - $time), 2).' seconds';
            } elseif ($action == 'index-all') {
                $this->indexProducts($id_shop, $total_indexed, $time, true);
            } elseif ($action == 'index-missing') {
                $this->indexProducts($id_shop, $total_indexed, $time);
            } elseif ($action == 'show-summary') {
                $all_shop_ids = Shop::getShops(false, null, true);
                $indexation_data = $this->module->getIndexationData(true, $all_shop_ids);
                echo '<pre>';
                print_r($indexation_data);
                echo '</pre>';
            }
        }
        exit();
    }

    private function indexProducts($id_shop, $total_indexed, $time, $all = false)
    {
        if ($all) {
            $this->module->eraseIndexationData($id_shop);
        }
        $indexation_data = $this->module->getIndexationData(false, array($id_shop));
        $products_per_request = (int)Tools::getValue('products_per_request', 300);
        $params = array(
            'id_shop' => $id_shop,
            'total_indexed' => (int)$total_indexed,
            'time' => $time,
            'products_per_request' => $products_per_request,
        );
        foreach ($indexation_data as $id_shop => $data) {
            if (!empty($data['missing'])) {
                $product_ids = array_slice($data['missing'], 0, $products_per_request);
                foreach ($product_ids as $id_product) {
                    $this->module->indexProduct($id_product, true, array($id_shop));
                    $params['total_indexed']++;
                }
                $params['action'] = 'index-missing';
                break;
            }
        }
        if (!isset($params['action'])) {
            $params['complete'] = 1;
        }
        $url = $this->module->getCronURL($id_shop, $params);
        Tools::redirect($url);
    }
}
