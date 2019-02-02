<?php
/**
* 2013 - 2017 HiPresta
*
* MODULE Out Of Stock Notification
*
* @version   1.2.2
* @author    HiPresta <suren.mikaelyan@gmail.com>
* @link      http://www.hipresta.com
* @copyright HiPresta 2015
* @license   Addons PrestaShop license limitation
*
* NOTICE OF LICENSE
*
* Don't use this module on several shops. The license provided by PrestaShop Addons 
* for all its modules is valid only once for a single shop.
*/

class HIoutofstocknotificationSubscribeModuleFrontController extends ModuleFrontController
{
    public $authRedirection = 'my-account';

    public function __construct()
    {
        $this->secure_key = Tools::getValue('secure_key');
        if (Tools::getValue('action') == 'get_product_combination_quantity' ||  Tools::getValue('action') == 'oosn_email') {
            $this->auth = false;
        } else {
            $this->auth = true;
        }
        parent::__construct();
    }

    public function setMedia()
    {
        parent::setMedia();
            $this->addCSS(_MODULE_DIR_.'/hioutofstocknotification/views/css/subscribe.css', 'all');
            $this->addJS(_MODULE_DIR_.'/hioutofstocknotification/views/js/subscribe.js');
    }

    private function getStockProductId()
    {
        $stock_subscribe = array();
        $i = 0;
        $result = Db::getInstance()->ExecuteS('
            SELECT * FROM '._DB_PREFIX_.'hioutofstock
            WHERE status = 1
            AND id_customer='.Context::getContext()->customer->id);
        $link = new Link();
        $img = new Image();
        $id_language = (int)Configuration::get('PS_LANG_DEFAULT');
        if (!empty($result)) {
            foreach ($result as $res) {
                $i++;
                $product = new Product($res['id_product'], false, $id_language);
                $pr_link = $link->getProductLink($res['id_product'], null, null, null, $id_language, null, $res['id_combination']);
                if ($res['id_combination'] != 0) {
                    $attr_combination_name = $product->getAttributeCombinationsById(
                        $res['id_combination'],
                        $id_language
                    );
                } else {
                    $attr_combination_name = array();
                }
                $stock_subscribe[$i]['stock_pr_name'] = $product->name;
                $stock_subscribe[$i]['stock_pr_reference'] = $product->reference;
                $stock_subscribe[$i]['stock_id'] = $res['id'];
                $stock_subscribe[$i]['email'] = $res['email'];
                $stock_subscribe[$i]['stock_subscr_date'] = $res['date'];
                $stock_subscribe[$i]['stock_id_product'] = $res['id_product'];
                $stock_subscribe[$i]['stock_pr_link'] = $pr_link;
                $avalibale_image = Image::getImages($id_language, $res['id_product']);
                if (!empty($attr_combination_name)) {
                    $stock_subscribe[$i]['stock_pr_comb_name'] = $attr_combination_name;
                    foreach ($attr_combination_name as $attr) {
                        if ($this->module->psv >= 1.6) {
                            $product_img_id = $product->getCombinationImageById(
                                $attr['id_product_attribute'],
                                $id_language
                            );
                            if ($product_img_id) {
                                $stock_subscribe[$i]['stock_pr_img'] = Tools::getProtocol().$link->getImageLink(
                                    $product->link_rewrite,
                                    $product_img_id['id_image'],
                                    $this->module->getImageType('cart')
                                );
                            } else {
                                if (isset($avalibale_image) && !empty($avalibale_image)) {
                                    $product_img_id = $product->getCover($res['id_product']);
                                    $stock_subscribe[$i]['stock_pr_img'] = Tools::getProtocol().$link->getImageLink(
                                        $product->link_rewrite,
                                        $product_img_id['id_image'],
                                        $this->module->getImageType('cart')
                                    );
                                } else {
                                    $stock_subscribe[$i]['stock_pr_img'] = Tools::getProtocol().$link->getImageLink(
                                        $product->link_rewrite,
                                        $product->defineProductImage(
                                            $product->getImages(
                                                $id_language
                                            ),
                                            $id_language
                                        ),
                                        $this->module->getImageType('cart')
                                    );
                                }
                            }
                        } else {
                            $img_id = $img->getImages($id_language, $res['id_product'], $attr['id_product_attribute']);
                            $stock_subscribe[$i]['stock_pr_img'] = Tools::getProtocol().$link->getImageLink(
                                $product->link_rewrite,
                                $img_id[0]['id_image'],
                                $this->module->getImageType('medium')
                            );
                        }
                    }
                } else {
                    $stock_subscribe[$i]['stock_pr_comb_name'] = '';
                    if (isset($avalibale_image) && !empty($avalibale_image)) {
                        $product_img_id = $product->getCover($res['id_product']);
                        $stock_subscribe[$i]['stock_pr_img'] = Tools::getProtocol().$link->getImageLink(
                            $product->link_rewrite,
                            $product_img_id['id_image'],
                            ($this->module->psv >= 1.6
                                ? $this->module->getImageType('cart')
                                : $this->module->getImageType('medium')
                            )
                        );
                    } else {
                        $stock_subscribe[$i]['stock_pr_img'] = Tools::getProtocol().$link->getImageLink(
                            $product->link_rewrite,
                            $product->defineProductImage(
                                $product->getImages(
                                    $id_language
                                ),
                                $id_language
                            ),
                            ($this->module->psv >= 1.6
                                ? $this->module->getImageType('cart')
                                : $this->module->getImageType('medium')
                            )
                        );
                    }
                }
            }
        }
        return $stock_subscribe;
    }

    public function initContent()
    {
        parent::initContent();
        if ($this->context->customer->isLogged()) {
            $this->context->smarty->assign(array(
                'subscribe_db_resaul' => $this->getStockProductId(),
                'psv' => $this->module->psv,
                'secure_key' => Tools::encrypt($this->module->name),
            ));
            if ($this->module->psv >= 1.7) {
                $this->setTemplate('module:hioutofstocknotification/views/templates/front/oosn_subscribe1.7.tpl');
            } else {
                $this->setTemplate('oosn_subscribe.tpl');
            }
            
        }
    }


    public function init()
    {
        parent::init();
        include_once(dirname(__FILE__).'/../../classes/outofstock.php');
        if (Tools::getValue('ajax')) {
            if ($this->secure_key == $this->module->secure_key) {
                if (Tools::getValue('action') == 'delete_subscribe') {
                    $id = (int)Tools::getValue('id');
                    $outofstock = new OutOfStock($id);
                    $outofstock->delete();
                } elseif (Tools::getValue('action') == 'get_product_combination_quantity') {
                    $id_product = Tools::getValue('id_product');
                    $combination_id = Tools::getValue('combination_id');
                    if (!$combination_id) {
                        $combination_id = 0;
                    }
                    $quantity = StockAvailable::getQuantityAvailableByProduct($id_product, $combination_id);
                    die(Tools::jsonEncode(array('quantity' => $quantity)));
                } elseif (Tools::getValue('action') == 'oosn_email') {
                    $id_product = Tools::getValue('id_product');

                    $product = new Product($id_product);
                    if (!Validate::isLoadedObject($product)) {
                         $error = $this->module->l('There is an error: please refresh the page and try again', 'subscribe');
                        die(Tools::jsonEncode(array('hasError' => true, 'error' => $error)));
                    }

                    $combination_id = Tools::getValue('combination_id');
                    if (!$combination_id) {
                        $combination_id = 0;
                    }
                    $email = Tools::getValue('email');
                    $get_customer = $this->module->getSubscribeCustomer($email);
                    $error = array();
                    $context = Context::getContext();
                    $result = Db::getInstance()->ExecuteS('SELECT * FROM '._DB_PREFIX_.'hioutofstock WHERE 
                        email= \''.pSQL($email).'\' AND id_product='.(int)$id_product.' AND id_combination='.(int)$combination_id);

                    if (isset($email) && Validate::isEmail($email)) {
                        $outofstock = new OutOfStock();
                        if (!empty($result)) {
                            die(Tools::jsonEncode(array('hasError' => true,'error' => $this->module->l('This email address already subscribed.', 'subscribe'))));
                        }
                        $outofstock->id_shop = Shop::getContextShopID();
                        $outofstock->id_product = $id_product;
                        $outofstock->id_customer = $context->customer->id?$context->customer->id:$get_customer[0]['id_customer'];
                        $outofstock->id_combination = $combination_id;
                        $outofstock->email = $email;
                        $outofstock->date = date('Y-m-d H:i:s');
                        $outofstock->status = 1;
                        $outofstock->add();
                        if ($this->module->oosn_subscribe_email_sent) {
                            $emails = explode("\n", trim($this->module->multi_email));
                            $emails = array_filter(array_map('trim', $emails));
                            if (!empty($emails)) {
                                $html = $this->module->renderStatsEmail(false, $email, $id_product, $combination_id);
                                $product_name = Product::getProductName($id_product);
                                $this->module->sendAdministratorNotificationMailFromSubscribers($emails, $html, $product_name);
                            }
                        }
                        
                        die(Tools::jsonEncode(array('hasError' => false)));
                    } else {
                        $error = $this->module->l('Email address is not valid', 'subscribe');
                        die(Tools::jsonEncode(array('hasError' => true, 'error' => $error)));
                    }
                }
            } else {
                die();
            }
        }
    }
}
