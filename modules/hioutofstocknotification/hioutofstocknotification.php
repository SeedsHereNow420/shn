<?php
/**
* 2013 - 2017 HiPresta
*
* MODULE Out Of Stock Notification
*
* @version   1.2.3
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

if (!defined('_PS_VERSION_')) {
    exit;
}

include_once(dirname(__FILE__).'/classes/HiPrestaModule.php');
include_once(dirname(__FILE__).'/classes/outofstock.php');
include_once(dirname(__FILE__).'/classes/sentemail.php');
include_once(dirname(__FILE__).'/classes/statistic.php');
include_once(dirname(__FILE__).'/classes/oosnpdf.php');

class HIOutOfstockNotification extends HiPrestaOOSNModule
{
    public $errors = array();
    public $success = array();
    protected $module_hooks = array(
        'displayProductButtons',
        'displayRightColumnProduct',
    );
    public $clean_db;
    public $cron_pass;
    public $mu_cron_pass;
    public $psv;
    public $oosn_on;
    public $oosn_hooks;
    public $oosn_position;
    public $oosn_order_type;
    public $oosn_email_sent;
    public $oosn_subscribe_email_sent;
    public $oosn_email_subject;
    public $multi_email;
    public $last_day_count;
    public $oosn_remove_email;
    public $oosn_auto_fill_on;
    public $oosn_logged_on;
    public $oosn_statistic_on;
    public $oosn_product_quantity;
    public $export_id;
    public $export_id_shop;
    public $export_id_product;
    public $export_customer_id;
    public $export_comb_id;
    public $export_email;
    public $export_date;
    public $export_status;
    public $filter_export_status;

    public function __construct()
    {
        $this->name = 'hioutofstocknotification';
        $this->tab  = 'front_office_features';
        $this->version = '1.2.3';
        $this->author = 'HiPresta';
        $this->need_instance = 0;
        $this->secure_key = Tools::encrypt($this->name);
        if ((float)Tools::substr(_PS_VERSION_, 0, 3) >= 1.6) {
            $this->bootstrap = true;
        }
        $this->module_key = 'f2b8ff3b3a32d2e2cb7622fcddbaaa86';
        parent::__construct();
        $this->globalVars();
        $this->displayName = $this->l('Out of stock notification');
        $this->description = $this->l('Allow your customers to subscribe when product back to store');
        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
        $languages = Language::getLanguages(false);
        $subjects = array();
        foreach ($languages as $lang) {
            $subjects[$lang['id_lang']] = '{product_name} is once again in-stock!';
        }
        if ($this->psv >= 1.7) {
            $hook = 'displayProductButtons';
        } else {
            $hook = 'displayRightColumnProduct';
        }
        if (!parent::install()
            || !$this->registerHook('header')
            || !$this->registerHook('actionUpdateQuantity')
            || !$this->registerHook('displayCustomerAccount')
            || !$this->registerHook('actionProductListOverride')
            || !$this->registerHook('actionProductSave')
            || !$this->registerHook('outofstock')
            || !$this->installCallDb()
            || !$this->createTabs('AdminOosn', 'AdminOosn', 'CONTROLLER_TABS_OOSN', 0)
            || !$this->installSentEmailDb()
            || !$this->installEmailStaticticDb()
            || !Configuration::updateValue('HI_OOSN_CLEAN_DB', false)
            || !Configuration::updateValue('HI_CR_GEN_PASS', Tools::passwdGen())
            || !Configuration::updateValue('HI_MU_CR_GEN_PASS', Tools::passwdGen())
            || !Configuration::updateValue('HI_OOSN_ON', true)
            || !Configuration::updateValue('HI_OOSN_HOOKS', $hook)
            || !Configuration::updateValue('HI_OOSN_POSITION', 'page')
            || !Configuration::updateValue('HI_OOSN_ORDER_TYPE', false)
            || !Configuration::updateValue('HI_OOSN_EMAIL_SENT', false)
            || !Configuration::updateValue('HI_OOSN_SUBSCRIBE_EMAIL_SENT', false)
            || !Configuration::updateValue('HI_OOSN_EMAIL_SUBJECT', $subjects)
            || !Configuration::updateValue('HI_OOSN_MULTI_EMAIL', '')
            || !Configuration::updateValue('HI_OOSN_LAST_DAY_COUNT', 7)
            || !Configuration::updateValue('HI_OOSN_REMOVE_EMAIL', false)
            || !Configuration::updateValue('HI_OOSN_AUTO_FILL_ON', false)
            || !Configuration::updateValue('HI_OOSN_LOGGED_ON', false)
            || !Configuration::updateValue('HI_OOSN_STATISTIC_ON', true)
            || !Configuration::updateValue('HI_OOSN_PRODUCT_QUANTITY', 1)
            || !Configuration::updateValue('HI_OOSN_EXPORT_ID', true)
            || !Configuration::updateValue('HI_OOSN_EXPORT_ID_SHOP', true)
            || !Configuration::updateValue('HI_OOSN_EXPORT_ID_PRODUCT', true)
            || !Configuration::updateValue('HI_OOSN_EXPORT_CUSTID', true)
            || !Configuration::updateValue('HI_OOSN_EXPORT_COMBID', true)
            || !Configuration::updateValue('HI_OOSN_EXPORT_EMAIL', true)
            || !Configuration::updateValue('HI_OOSN_EXPORT_STATUS', true)
            || !Configuration::updateValue('HI_OOSN_EXPORT_DATE', true)
            ) {
            return false;
        }
        return true;
    }
    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }
        $this->deleteTabs('CONTROLLER_TABS_OOSN');
        if (Configuration::get('HI_OOSN_CLEAN_DB')) {
            $this->proceedDb();
        }
        return true;
    }

    private function installCallDb()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'hioutofstock` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `id_shop` INT (100) NOT NULL,
            `id_product` INT (100) NOT NULL,
            `id_customer` INT (100) NOT NULL,
            `id_combination` INT (100) NOT NULL,
            `email` VARCHAR( 100 ) NOT NULL,
            `date` DATE NOT NULL,
            `status` VARCHAR( 100 ) NOT NULL,
                PRIMARY KEY ( `id` )
            ) ENGINE = MYISAM DEFAULT CHARSET=utf8;';
        return Db::getInstance()->Execute(trim($sql));
    }

    private function installSentEmailDb()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'hioutofstocksentemail` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `id_shop` INT (100) NOT NULL,
            `id_product` INT (100) NOT NULL,
            `id_customer` INT (100) NOT NULL,
            `id_combination` INT (100) NOT NULL,
            `email` VARCHAR( 100 ) NOT NULL,
            `date` DATE NOT NULL,
            `status` VARCHAR( 100 ) NOT NULL,
                PRIMARY KEY ( `id` )
            ) ENGINE = MYISAM DEFAULT CHARSET=utf8;';
        return Db::getInstance()->Execute(trim($sql));
    }
    private function installEmailStaticticDb()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'hioutofstockemailstatistic` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `opened` INT (100) NOT NULL,
            `buy_now` INT (100) NOT NULL,
            `view` INT (100) NOT NULL,
            `email` VARCHAR( 100 ) NOT NULL,
                PRIMARY KEY ( `id` )
            ) ENGINE = MYISAM DEFAULT CHARSET=utf8;';
        return Db::getInstance()->Execute(trim($sql));
    }

    private function proceedDb()
    {
        $db_drop = array(
            'hioutofstock', 'hioutofstocksentemail', 'hioutofstockemailstatistic',
        );
        foreach ($db_drop as $value) {
            DB::getInstance()->Execute('DROP TABLE IF EXISTS '._DB_PREFIX_.pSQL($value));
        }
        Configuration::deleteByName('HI_OOSN_CLEAN_DB');
        Configuration::deleteByName('HI_CR_GEN_PASS');
        Configuration::deleteByName('HI_MU_CR_GEN_PASS');
        Configuration::deleteByName('HI_OOSN_ON');
        Configuration::deleteByName('HI_OOSN_HOOKS');
        Configuration::deleteByName('HI_OOSN_POSITION');
        Configuration::deleteByName('HI_OOSN_ORDER_TYPE');
        Configuration::deleteByName('HI_OOSN_EMAIL_SENT');
        Configuration::deleteByName('HI_OOSN_SUBSCRIBE_EMAIL_SENT');
        Configuration::deleteByName('HI_OOSN_EMAIL_SUBJECT');
        Configuration::deleteByName('HI_OOSN_MULTI_EMAIL');
        Configuration::deleteByName('HI_OOSN_LAST_DAY_COUNT');
        Configuration::deleteByName('HI_OOSN_REMOVE_EMAIL');
        Configuration::deleteByName('HI_OOSN_AUTO_FILL_ON');
        Configuration::deleteByName('HI_OOSN_LOGGED_ON');
        Configuration::deleteByName('HI_OOSN_STATISTIC_ON');
        Configuration::deleteByName('HI_OOSN_PRODUCT_QUANTITY');
        Configuration::deleteByName('HI_OOSN_EXPORT_ID');
        Configuration::deleteByName('HI_OOSN_EXPORT_ID_SHOP');
        Configuration::deleteByName('HI_OOSN_EXPORT_ID_PRODUCT');
        Configuration::deleteByName('HI_OOSN_EXPORT_CUSTID');
        Configuration::deleteByName('HI_OOSN_EXPORT_COMBID');
        Configuration::deleteByName('HI_OOSN_EXPORT_EMAIL');
        Configuration::deleteByName('HI_OOSN_EXPORT_STATUS');
        Configuration::deleteByName('HI_OOSN_EXPORT_DATE');
    }

    private function globalVars()
    {
        $this->clean_db = (bool)Configuration::get('HI_OOSN_CLEAN_DB');
        $this->cron_pass = Configuration::get('HI_CR_GEN_PASS');
        $this->mu_cron_pass = Configuration::get('HI_MU_CR_GEN_PASS');
        $this->psv = (float)Tools::substr(_PS_VERSION_, 0, 3);
        $this->oosn_on = (bool)Configuration::get('HI_OOSN_ON');
        $this->oosn_hooks = Configuration::get('HI_OOSN_HOOKS');
        $this->oosn_position = Configuration::get('HI_OOSN_POSITION');
        $this->oosn_order_type = (bool)Configuration::get('HI_OOSN_ORDER_TYPE');
        $this->oosn_email_sent = (bool)Configuration::get('HI_OOSN_EMAIL_SENT');
        $this->oosn_subscribe_email_sent = (bool)Configuration::get('HI_OOSN_SUBSCRIBE_EMAIL_SENT');
        foreach (Language::getLanguages(false) as $language) {
            $this->oosn_email_subject[$language['id_lang']] = Configuration::get('HI_OOSN_EMAIL_SUBJECT', $language['id_lang']);
        }
        $this->multi_email = Configuration::get('HI_OOSN_MULTI_EMAIL');
        $this->last_day_count = trim(Configuration::get('HI_OOSN_LAST_DAY_COUNT'));
        $this->oosn_remove_email = (bool)Configuration::get('HI_OOSN_REMOVE_EMAIL');
        $this->oosn_auto_fill_on = (bool)Configuration::get('HI_OOSN_AUTO_FILL_ON');
        $this->oosn_logged_on = (bool)Configuration::get('HI_OOSN_LOGGED_ON');
        $this->oosn_statistic_on = (bool)Configuration::get('HI_OOSN_STATISTIC_ON');
        $this->oosn_product_quantity = Configuration::get('HI_OOSN_PRODUCT_QUANTITY');
        $this->export_id = Configuration::get('HI_OOSN_EXPORT_ID');
        $this->export_id_shop = Configuration::get('HI_OOSN_EXPORT_ID_SHOP');
        $this->export_id_product = Configuration::get('HI_OOSN_EXPORT_ID_PRODUCT');
        $this->export_customer_id = Configuration::get('HI_OOSN_EXPORT_CUSTID');
        $this->export_comb_id = Configuration::get('HI_OOSN_EXPORT_COMBID');
        $this->export_email = Configuration::get('HI_OOSN_EXPORT_EMAIL');
        $this->export_date = Configuration::get('HI_OOSN_EXPORT_DATE');
        $this->export_status = Configuration::get('HI_OOSN_EXPORT_STATUS');
        $this->filter_export_status = Configuration::get('HI_OOSN_FILTER_EXPORT_STATUS');
    }

    public function renderMenuTabs()
    {
        $tabs_1 = array(
            'confgeneralset' => $this->l('General settings'),
            'adminconfgeneralset' => $this->l('Admin settings'),
            'confprpendding' => $this->l('Subscribers (By Product)'),
            'confsubscribe' => $this->l('Subscribers (By Email)'),
            'confexport' => $this->l('Export'),
        );
        $tabs_2 = !$this->oosn_remove_email ? array('confprdelivery' => $this->l('Delivered')) : array();
        $tabs_3 = $this->oosn_statistic_on ? array('statistic' => $this->l('Stats')) : array();
        $tabs_4 = array(
            'version' => $this->l('Version'),
            // 'documentation' => $this->l('Documentation'),
            'contact_us' => $this->l('Contact Us'),
            'news' => $this->l('News'),
            'more_module' => $this->l('More Modules'),
        );
        $tabs = array_merge($tabs_1, $tabs_2, $tabs_3, $tabs_4);
        $this->context->smarty->assign(
            array(
                'psv' => $this->psv,
                'tabs' => $tabs,
                'module_version' => $this->version,
                'module_url' => $this->getModuleUrl(),
                'oosn_key' => Tools::getValue('histock'),
            )
        );
        return $this->display(__FILE__, 'views/templates/admin/menu_tabs.tpl');
    }

    public function renderShopGroupError()
    {
        return $this->display(__FILE__, 'views/templates/admin/shop_group_error.tpl');
    }

    public function renderDisplayForm($content)
    {
        $this->context->smarty->assign(
            array(
                'psv' => $this->psv,
                'errors' => $this->errors,
                'success' => $this->success,
                'content' => $content
            )
        );
        return $this->display(__FILE__, 'views/templates/admin/display_form.tpl');
    }

    public function renderModuleAdminVariables()
    {
        $this->context->smarty->assign(
            array(
                'psv' => $this->psv,
                'id_lang' => $this->context->language->id,
                'secure_key' => $this->secure_key,
                'module_dir' => Tools::getHttpHost(true)._MODULE_DIR_.$this->name,
                'module_controller_dir' => $this->context->link->getAdminLink('AdminOosn'),
            )
        );
        return $this->display(__FILE__, 'views/templates/admin/variables.tpl');
    }

    public function renderContactUsForm()
    {
        return $this->display(__FILE__, 'views/templates/admin/contact_us.tpl');
    }

    public function renderNewsForm()
    {
        $cookie = new Cookie('psAdmin');
        $employee = new Employee($cookie->id_employee);
        $this->context->smarty->assign(
            array(
                'employee_fname' => $cookie->id_employee ? $employee->firstname : '',
                'employee_lname' => $cookie->id_employee ? $employee->lastname : '',
                'employee_email' => $cookie->id_employee ? $employee->email : '',
            )
        );
        return $this->display(__FILE__, 'views/templates/admin/news.tpl');
    }

    public function getSubscribeProduct($result, $id_language, $get_sub_count = false)
    {
        $subscribe_product = array();
        $i = 0;
        $link = new Link();
        $img = new Image();
        foreach ($result as $res) {
            $i++;
            $product = new Product($res['id_product'], false, $id_language);
            if (!Validate::isLoadedObject($product)) {
                Db::getInstance(_PS_USE_SQL_SLAVE_)->execute('
                    DELETE FROM '._DB_PREFIX_.'hioutofstock
                    WHERE id_product = '.(int)$res['id_product']);
                Db::getInstance(_PS_USE_SQL_SLAVE_)->execute('
                    DELETE FROM '._DB_PREFIX_.'hioutofstocksentemail
                    WHERE id_product = '.(int)$res['id_product']);
                continue;
            }
            $pr_link = $link->getProductLink($res['id_product'], null, null, null, $id_language, null, $res['id_combination']);
            if ($res['id_combination'] != 0) {
                $combination_name = $product->getAttributeCombinationsById($res['id_combination'], $id_language);
            } else {
                $combination_name = array();
            }
            $subscribe_product[$i]['id'] = $res['id'];
            $subscribe_product[$i]['id_product'] = $res['id_product'];
            $subscribe_product[$i]['name'] = $product->name;
            $subscribe_product[$i]['reference'] = $product->reference;
            $subscribe_product[$i]['product_link'] = $pr_link;
            $subscribe_product[$i]['pr_comb_name'] = $combination_name;
            $subscribe_product[$i]['id_customer'] = $res['id_customer'];
            $subscribe_product[$i]['email'] = $res['email'];
            $subscribe_product[$i]['date'] = $res['date'];
            if ($get_sub_count) {
                $subscribe_product[$i]['product_count'] = $res['count(id_product)'];
            }
            $avalibale_image = Image::getImages($id_language, $res['id_product']);
            if (!empty($combination_name)) {
                foreach ($combination_name as $attr) {
                    if ($this->psv >= 1.6) {
                        $product_img_id = $product->getCombinationImageById(
                            $attr['id_product_attribute'],
                            $id_language
                        );
                        if ($product_img_id) {
                            $subscribe_product[$i]['product_img'] = $link->getImageLink(
                                $product->link_rewrite,
                                $product_img_id['id_image'],
                                ($get_sub_count
                                    ? $this->getImageType('home')
                                    : $this->getImageType('cart')
                                )
                            );
                        } else {
                            if (isset($avalibale_image) && !empty($avalibale_image)) {
                                $product_img_id = $product->getCover($res['id_product']);
                                $subscribe_product[$i]['product_img'] = $link->getImageLink(
                                    $product->link_rewrite,
                                    $product_img_id['id_image'],
                                    ($get_sub_count
                                        ? $this->getImageType('home')
                                        : $this->getImageType('cart')
                                    )
                                );
                            } else {
                                $subscribe_product[$i]['product_img'] = $link->getImageLink(
                                    $product->link_rewrite,
                                    $product->defineProductImage(
                                        $product->getImages(
                                            $id_language
                                        ),
                                        $id_language
                                    ),
                                    ($get_sub_count
                                        ? $this->getImageType('home')
                                        : $this->getImageType('cart')
                                    )
                                );
                            }
                        }
                    } else {
                        $img_id = $img->getImages($id_language, $res['id_product'], $attr['id_product_attribute']);
                        if ($img_id) {
                            $subscribe_product[$i]['product_img'] = $link->getImageLink(
                                $product->link_rewrite,
                                $img_id[0]['id_image'],
                                $this->getImageType('home')
                            );
                        } else {
                            if (isset($avalibale_image) && !empty($avalibale_image)) {
                                $product_img_id = $product->getCover($res['id_product']);
                                $subscribe_product[$i]['product_img'] = $link->getImageLink(
                                    $product->link_rewrite,
                                    $product_img_id['id_image'],
                                    $this->getImageType('home')
                                );
                            } else {
                                $subscribe_product[$i]['product_img'] = $link->getImageLink(
                                    $product->link_rewrite,
                                    $product->defineProductImage(
                                        $product->getImages(
                                            $id_language
                                        ),
                                        $id_language
                                    ),
                                    $this->getImageType('home')
                                );
                            }
                            
                        }
                    }
                }
            } else {

                if (isset($avalibale_image) && !empty($avalibale_image)) {
                    $product_img_id = $product->getCover($res['id_product']);
                    $subscribe_product[$i]['product_img'] = $link->getImageLink(
                        $product->link_rewrite,
                        $product_img_id['id_image'],
                        ($this->psv >= 1.6 && !$get_sub_count
                            ? $this->getImageType('cart')
                            : $this->getImageType('home')
                        )
                    );
                } else {
                    $subscribe_product[$i]['product_img'] = $link->getImageLink(
                        $product->link_rewrite,
                        $product->defineProductImage(
                            $product->getImages(
                                $id_language
                            ),
                            $id_language
                        ),
                        ($this->psv >= 1.6 && !$get_sub_count
                            ? $this->getImageType('cart')
                            : $this->getImageType('home')
                        )
                    );
                }
            }
        }
        return $subscribe_product;
    }

    public function refreshExportVars()
    {
        Configuration::updateValue('HI_OOSN_EXPORT_ID', (bool)Tools::getValue('id_CsvPdf'));
        Configuration::updateValue('HI_OOSN_EXPORT_ID_SHOP', (bool)Tools::getValue('id_shop_CsvPdf'));
        Configuration::updateValue('HI_OOSN_EXPORT_ID_PRODUCT', (bool)Tools::getValue('id_product_CsvPdf'));
        Configuration::updateValue('HI_OOSN_EXPORT_CUSTID', (bool)Tools::getValue('customer_id_CsvPdf'));
        Configuration::updateValue('HI_OOSN_EXPORT_COMBID', (bool)Tools::getValue('id_combination_CsvPdf'));
        Configuration::updateValue('HI_OOSN_EXPORT_EMAIL', (bool)Tools::getValue('email_CsvPdf'));
        Configuration::updateValue('HI_OOSN_EXPORT_STATUS', (bool)Tools::getValue('status_CsvPdf'));
        Configuration::updateValue('HI_OOSN_EXPORT_DATE', (bool)Tools::getValue('date_CsvPdf'));
        Configuration::updateValue('HI_OOSN_FILTER_EXPORT_STATUS', Tools::getValue('filter_export_status'));
        return true;
    }

    public function renderStatistic()
    {
        $email_sent_count = EmailStatistic::getStatisticSentEmailCount();
        $email_buy_now_sub_count = EmailStatistic::getStatisticClickCount('buy_now');
        $email_view_sub_count = EmailStatistic::getStatisticClickCount('view');
        $email_opened_count = EmailStatistic::getStatisticClickCount('opened');
        $this->context->smarty->assign(
            array(
                'action' => $this->getModuleUrl().'&histock=statistic',
                'psv' => $this->psv,
                'email_sent_count' => $email_sent_count['COUNT(*)'],
                'email_buy_now_sub_count' => $email_buy_now_sub_count['COUNT(buy_now)'],
                'email_view_sub_count' => $email_view_sub_count['COUNT(view)'],
                'email_opened_count' => $email_opened_count['COUNT(opened)'],
                'secure_key' => $this->secure_key,
            )
        );
        return $this->display(__FILE__, 'views/templates/admin/statistic.tpl');
    }

    

    public function getSubscribeCustomer($email)
    {
        if (Customer::getCustomersByEmail($email)) {
            $customer = Customer::getCustomersByEmail($email);
        } else {
            $customer[0]['id_customer'] = 0;
            $customer[0]['firstname'] = $this->l('customer');
            $customer[0]['lastname'] = '';
            $customer[0]['email'] = $email;
        }
        return $customer;
    }

    public function getCustomer()
    {
        return $this->context->customer->isLogged()? $this->context->customer->email:'';
    }

    public function renderSettingsForm()
    {
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('General Settings'),
                    'icon' => 'icon-cogs'
                ),
                'description' => $this->l('Cron URL: ').Tools::getHTTPHost(true).$this->_path.'cron/cron.php?cron_secret_key='.$this->cron_pass,
                'input' => array(
                    array(
                        'type' => $this->psv >= 1.6 ? 'switch':'radio',
                        'label' => $this->l('Enable Out Of Stock Form'),
                        'name' => 'show_stock_info',
                        'class' => 't',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'show_stock_info_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'show_stock_info_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Position to display'),
                        'name' => 'hooks',
                        'desc' => $this->l('Add {hook h="outofstock"} to your product.tpl file
                            where to want to display twitter timeline form'),
                        'options' => array(
                            'query' => array(
                                array(
                                    'id' => 'displayRightColumnProduct',
                                    'name' => $this->l('Right Column Product')
                                ),
                                array(
                                    'id' => 'custom',
                                    'name' => $this->l('Custom')
                                )
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        )
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Where to display'),
                        'name' => 'position',
                        'options' => array(
                            'query' => array(
                                array(
                                    'id' => 'page',
                                    'name' => $this->l('In page')
                                ),
                                array(
                                    'id' => 'popup',
                                    'name' => $this->l('Popup')
                                )
                            ),
                            'id' => 'id',
                            'name' => 'name'
                        )
                    ),
                    array(
                        'type' => $this->psv >= 1.6 ? 'switch':'radio',
                        'label' => $this->l('Autofill email address when customer is logged in'),
                        'name' => 'show_auto_fill_info',
                        'class' => 't',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'show_auto_fill_info_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'show_auto_fill_info_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => $this->psv >= 1.6 ? 'switch':'radio',
                        'label' => $this->l('Display Out Of Stock form only when customer is logged in'),
                        'name' => 'show_logged_info',
                        'class' => 't',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'show_logged_info_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'show_logged_info_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Product Quantity'),
                        'name' => 'oosn_product_quantity',
                        'desc' => $this->l('Product quantity minimal value to send notification')
                    ),
                    array(
                        'type' => $this->psv >= 1.6 ? 'switch':'radio',
                        'label' => $this->l('Hide form when product is out of stock and orders allowed'),
                        'name' => 'order_type',
                        'class' => 't',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'order_type_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'order_type_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => $this->psv >= 1.6 ? 'switch':'radio',
                        'label' => $this->l('Send email notification when product is out of stock but product changed to allow orders'),
                        'name' => 'email_sent',
                        'class' => 't',
                        'is_bool' => true,
                        'desc' => $this->l('You will need to click on Save or Save and stay button in product page each time the value changed'),
                        'values' => array(
                            array(
                                'id' => 'email_sent_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'email_sent_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Email subject'),
                        'name' => 'oosn_email_subject',
                        'lang' => true,
                    ),
                    array(
                        'type' => $this->psv >= 1.6 ? 'switch':'radio',
                        'label' => $this->l('Remove Sent Emails'),
                        'name' => 'remove_email',
                        'class' => 't',
                        'is_bool' => true,
                        'desc' => $this->l('Remove records from database when customer recived email'),
                        'values' => array(
                            array(
                                'id' => 'remove_email_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'remove_email_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => $this->psv >= 1.6 ? 'switch':'radio',
                        'label' => $this->l('Enable stats'),
                        'name' => 'show_statistic_info',
                        'class' => 't',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'show_statistic_info_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'show_statistic_info_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => $this->psv >= 1.6 ? 'switch':'radio',
                        'label' => $this->l('Clean Database when module uninstalled'),
                        'name' => 'clean_db',
                        'class' => 't',
                        'is_bool' => true,
                        'desc' => $this->l('Not recommended, use this only when you’re not going to use the module'),
                        'values' => array(
                            array(
                                'id' => 'clean_db_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'clean_db_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'hidden',
                        'name' => 'psv',
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'name' => 'submit_oosn',
                    'class' => $this->psv >= 1.6 ? 'btn btn-default pull-right':'button',
                )
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $languages = Language::getLanguages(false);
        foreach ($languages as $key => $language) {
            $languages[$key]['is_default'] = (int)($language['id_lang'] == Configuration::get('PS_LANG_DEFAULT'));
        }
        $helper->languages = $languages;
        $helper->default_form_language = (int)Configuration::get('PS_LANG_DEFAULT');
        $this->fields_form = array();
        $helper->submit_action = 'submitBlockSettings';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = $this->context->link->getAdminLink(
            'AdminModules',
            false
        ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&histock=confgeneralset';
        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFieldsValues()
        );
        if ($this->psv >= 1.7) {
            $fields_form['form']['input'][1]['options']['query'][] = array(
                'id' => 'displayProductButtons',
                'name' => 'Product Buttons'
            );
        }

        return $helper->generateForm(array($fields_form));
    }

    public function getConfigFieldsValues()
    {
        return array(
            'clean_db' => $this->clean_db,
            'psv' => $this->psv,
            'show_stock_info' => $this->oosn_on,
            'hooks' => $this->oosn_hooks,
            'position' => $this->oosn_position,
            'order_type' => $this->oosn_order_type,
            'email_sent' => $this->oosn_email_sent,
            'oosn_email_subject' => $this->oosn_email_subject,
            'remove_email' => $this->oosn_remove_email,
            'show_auto_fill_info' => $this->oosn_auto_fill_on,
            'show_logged_info' => $this->oosn_logged_on,
            'show_statistic_info' => $this->oosn_statistic_on,
            'oosn_product_quantity' => $this->oosn_product_quantity,
        );
    }

    public function renderAdminSettingsForm()
    {
    $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Admin Settings'),
                    'icon' => 'icon-cogs'
                ),
                'description' => $this->l('1. Administrator Email notifications cron URL: ').Tools::getHTTPHost(true).$this->_path.'cron/stats_cron.php?cron_secret_key='.$this->mu_cron_pass.'<br/>'.$this->l('2. Use this to get stats notification for last X days'),
                'input' => array(
                    array(
                        'type' => $this->psv >= 1.6 ? 'switch':'radio',
                        'label' => $this->l('Get E-mail notification when new customer subscribes'),
                        'name' => 'subscribe_email_sent',
                        'class' => 't',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'subscribe_email_sent_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'subscribe_email_sent_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('E-mail addresses for administrator notifications'),
                        'name' => 'oosn_multi_email',
                        'rows' => 5,
                        'desc' => $this->l('One e-mail address per line'),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Days'),
                        'name' => 'oosn_last_day_count',
                        'desc' => $this->l('Get stats notification for last X days'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'name' => 'submit_admin_oosn',
                    'class' => $this->psv >= 1.6 ? 'btn btn-default pull-right':'button',
                )
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $languages = Language::getLanguages(false);
        foreach ($languages as $key => $language) {
            $languages[$key]['is_default'] = (int)($language['id_lang'] == Configuration::get('PS_LANG_DEFAULT'));
        }
        $helper->languages = $languages;
        $helper->default_form_language = (int)Configuration::get('PS_LANG_DEFAULT');
        $this->fields_form = array();
        $helper->submit_action = 'submitBlockSettings';
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = $this->context->link->getAdminLink(
            'AdminModules',
            false
        ).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name.'&histock=adminconfgeneralset';
        $helper->tpl_vars = array(
            'fields_value' => $this->getAdminConfigFieldsValues()
        );

        return $helper->generateForm(array($fields_form));
    }

    public function getAdminConfigFieldsValues()
    {
        return array(
            'subscribe_email_sent' => $this->oosn_subscribe_email_sent,
            'oosn_multi_email' => $this->multi_email,
            'oosn_last_day_count' => $this->last_day_count,
        );
    }

    public function renderSubscribeByProduct()
    {
        if (Tools::getValue('histock') == 'confprpendding') {
            $get_subscribe_product = $this->getSubscribeProduct(
                OutOfStock::getStockSubscribeProductByStatus('1', 'id DESC'),
                (int)Configuration::get('PS_LANG_DEFAULT')
            );
            $prefix = 'pendding';
            $nb_posts = count(OutOfStock::getStockSubscribeProductByStatus('1', 'id DESC'));
            $requestPage = $this->getModuleUrl().'&histock=confprpendding';
        } elseif (Tools::getValue('histock') == 'confprdelivery') {
            $get_subscribe_product = $this->getSubscribeProduct(
                SentEmail::getStockSendEmailByStatus('2', 'id ASC'),
                (int)Configuration::get('PS_LANG_DEFAULT')
            );
            $prefix = 'delivery';
            $nb_posts = count(SentEmail::getStockSendEmailByStatus('2', 'id ASC'));
            $requestPage = $this->getModuleUrl().'&histock=confprdelivery';
        }
        if (Tools::getValue('p') == '') {
            $page = 1;
        } else {
            $page = Tools::getValue('p');
        }
        $count = 30;
        $pages_nb = ceil($nb_posts / (int)$count);
        $range = 2;
        $start = (int)($page - $range);
        if ($start < 1) {
            $start = 1;
        }
        $stop = (int)($page + $range);
        if ($stop > $pages_nb) {
            $stop = (int)$pages_nb;
        }
        if ($count < $nb_posts) {
            if ($page == 1) {
                $start_get_val = 0;
            } else {
                $start_get_val = abs(($page-1)*$count);
            }
            $get_product = array_slice($get_subscribe_product, $start_get_val, $count, true);
        } else {
            $get_product = $get_subscribe_product;
        }
        $this->context->smarty->assign(
            array(
                'pages_nb' => $pages_nb,
                'prev_p' => $page != 1 ? $page - 1 : 1,
                'next_p' => (int)$page + 1  > $pages_nb ? $pages_nb : $page + 1,
                'requestPage' => $requestPage,
                'p' => $page,
                'n' => $count,
                'range' => $range,
                'start' => $start,
                'stop' => $stop,
                'action' => Tools::safeOutput($_SERVER['REQUEST_URI']),
                'psv' => $this->psv,
                'secure_key' => $this->secure_key,
                'protocol' => Tools::getProtocol(),
                'oosn_basedir' => _MODULE_DIR_.$this->name,
                'subscribe_get_url' => Tools::getValue('histock'),
                'get_subscribe_product' => $get_product,
                'prefix' => $prefix,
            )
        );
        return $this->display(__FILE__, 'views/templates/admin/subscribe/subscribe_by_product.tpl');
    }

    public function renderSubscribeByEmail()
    {
        $result = OutOfStock::getStockSubscribeProductByStatus('1');
        $id_language = Configuration::get('PS_LANG_DEFAULT');
        $subsribe_pr_id = array();
        $subsribe_pr_comb_id = array();
        $products = array();
        $img = new Image();
        $i = 0;
        foreach ($result as $res) {
            array_push($subsribe_pr_id, $res['id_product']);
            array_push($subsribe_pr_comb_id, $res['id_combination']);
        }
        $unique_pr_id = array_unique($subsribe_pr_id);
        $unique_pr_comb_id = array_unique($subsribe_pr_comb_id);
        foreach ($unique_pr_comb_id as $comb_id) {
            foreach ($unique_pr_id as $id) {
                $combination_result = OutOfStock::getStockByCombinationId($id, $comb_id);
                if (!empty($combination_result)) {
                    $i++;
                    $products[$i] = new Product($id, false, $id_language);
                    $link = new Link();
                    $products[$i]->id_product = $id;
                    $products[$i]->pr_link = $link->getProductLink($id, null, null, null, $id_language, null, $comb_id);
                    foreach ($combination_result as $id_combination) {
                        if ($id_combination['id_combination'] != 0) {
                            $products[$i]->combination_name = $products[$i]->getAttributeCombinationsById(
                                $id_combination['id_combination'],
                                $id_language
                            );
                        } else {
                            $products[$i]->combination_name = array();
                        }
                    }

                    $avalibale_image = Image::getImages($id_language, $id);
                    if (!empty($products[$i]->combination_name)) {
                        foreach ($products[$i]->combination_name as $attr) {
                            if ($this->psv >= 1.6) {
                                $product_img_id = $products[$i]->getCombinationImageById(
                                    $attr['id_product_attribute'],
                                    $id_language
                                );
                                if ($product_img_id) {
                                    $products[$i]->product_img = $link->getImageLink(
                                        $products[$i]->link_rewrite,
                                        $product_img_id['id_image'],
                                        $this->getImageType('cart')
                                    );
                                } else {
                                    if (isset($avalibale_image) && !empty($avalibale_image)) {
                                        $product_img_id = $products[$i]->getCover($id);
                                        $products[$i]->product_img = $link->getImageLink(
                                            $products[$i]->link_rewrite,
                                            $product_img_id['id_image'],
                                            $this->getImageType('cart')
                                        );
                                    } else {
                                        $products[$i]->product_img = $link->getImageLink(
                                            $products[$i]->link_rewrite,
                                            $products[$i]->defineProductImage(
                                                $products[$i]->getImages(
                                                    $id_language
                                                ),
                                                $id_language
                                            ),
                                            $this->getImageType('cart')
                                        );
                                    }
                                }
                            } else {
                                $img_id = $img->getImages($id_language, $id, $attr['id_product_attribute']);
                                if ($img_id) {
                                    $products[$i]->product_img = $link->getImageLink(
                                        $products[$i]->link_rewrite,
                                        $img_id[0]['id_image'],
                                        $this->getImageType('home')
                                    );
                                } else {
                                    if (isset($avalibale_image) && !empty($avalibale_image)) {
                                        $product_img_id = $products[$i]->getCover($res['id_product']);
                                        $products[$i]->product_img = $link->getImageLink(
                                            $products[$i]->link_rewrite,
                                            $product_img_id['id_image'],
                                            $this->getImageType('home')
                                        );
                                    } else {
                                        $products[$i]->product_img = $link->getImageLink(
                                            $products[$i]->link_rewrite,
                                            $products[$i]->defineProductImage(
                                                $products[$i]->getImages(
                                                    $id_language
                                                ),
                                                $id_language
                                            ),
                                            $this->getImageType('home')
                                        );
                                    }
                                }
                            }
                        }
                    } else {
                        if (isset($avalibale_image) && !empty($avalibale_image)) {
                            $product_img_id = $products[$i]->getCover($id);
                            $products[$i]->product_img = $link->getImageLink(
                                $products[$i]->link_rewrite,
                                $product_img_id['id_image'],
                                ($this->psv >= 1.6
                                    ? $this->getImageType('cart')
                                    : $this->getImageType('home')
                                )
                            );
                        } else {
                            $products[$i]->product_img = $link->getImageLink(
                                $products[$i]->link_rewrite,
                                $products[$i]->defineProductImage(
                                    $products[$i]->getImages(
                                        $id_language
                                    ),
                                    $id_language
                                ),
                                ($this->psv >= 1.6
                                    ? $this->getImageType('cart')
                                    : $this->getImageType('home')
                                )
                            );
                        }
                    }
                    $products[$i]->email_result = OutOfStock::getStockEmail($id, $comb_id, '1');
                }
            }
        }
        if (Tools::getValue('p') == '') {
            $page = 1;
        } else {
            $page = Tools::getValue('p');
        }
        $count = 30;
        $nb_posts = count(Db::getInstance()->ExecuteS('SELECT DISTINCT id_product, id_combination FROM '._DB_PREFIX_.'hioutofstock WHERE status = 1'));
        $pages_nb = ceil($nb_posts / (int)$count);
        $range = 2;
        $start = (int)($page - $range);
        if ($start < 1) {
            $start = 1;
        }
        $stop = (int)($page + $range);
        if ($stop > $pages_nb) {
            $stop = (int)$pages_nb;
        }
        $requestPage = $this->getModuleUrl().'&histock=confsubscribe';
        if ($count < $nb_posts) {
            if ($page == 1) {
                $start_get_val = 0;
            } else {
                $start_get_val = abs(($page-1)*$count);
            }
            $get_product = array_slice($products, $start_get_val, $count, true);
        } else {
            $get_product = $products;
        }
        $this->context->smarty->assign(
            array(
                'pages_nb' => $pages_nb,
                'prev_p' => $page != 1 ? $page - 1 : 1,
                'next_p' => (int)$page + 1  > $pages_nb ? $pages_nb : $page + 1,
                'requestPage' => $requestPage,
                'p' => $page,
                'n' => $count,
                'range' => $range,
                'start' => $start,
                'stop' => $stop,
                'action' => Tools::safeOutput($_SERVER['REQUEST_URI']),
                'psv' => $this->psv,
                'secure_key' => $this->secure_key,
                'protocol' => Tools::getProtocol(),
                'unique_pr_id' => $unique_pr_id,
                'unique_pr_comb_id' => $unique_pr_comb_id,
                'products' => $get_product,
                'oosn_basedir' => _MODULE_DIR_.$this->name,
            )
        );
        return $this->display(__FILE__, 'views/templates/admin/subscribe/subscribe_by_email.tpl');
    }
    public function renderSubscribeExport()
    {
        $this->context->smarty->assign(
            array(
                'action' => Tools::safeOutput($_SERVER['REQUEST_URI']),
                'psv' => $this->psv,
                'oosn_remove_email' => $this->oosn_remove_email,
                'export_id' => $this->export_id,
                'export_id_shop'=>$this->export_id_shop,
                'export_id_product' => $this->export_id_product,
                'export_customer_id' => $this->export_customer_id,
                'export_comb_id' => $this->export_comb_id,
                'export_email' => $this->export_email,
                'export_date' => $this->export_date,
                'export_status' => $this->export_status,
                'filter_export_status' => $this->filter_export_status,
            )
        );
        return $this->display(__FILE__, 'views/templates/admin/subscribe/subscribe_export.tpl');
    }

    /*$type_day_count if true send contetn must be for interval*/
    public function renderStatsEmail($type_day_count = true, $subscriber_email = '', $id_product = '', $id_combination = '')
    {
        if ($type_day_count) {
            $get_subscribe_product = $this->getSubscribeProduct(
                OutOfStock::getStockSubscribeProductByInterval($this->last_day_count, 1, 'id_product, id_combination'),
                (int)Configuration::get('PS_LANG_DEFAULT'),
                true);
        } else {
            $get_subscribe_product = $this->getSubscribeProduct(
                OutOfStock::getStockSubscribeProductByEmail($subscriber_email, $id_product, $id_combination, '1', 'id_product, id_combination'),
                (int)Configuration::get('PS_LANG_DEFAULT'),
                false);
        }
        $this->context->smarty->assign(
            array(
                'psv' => $this->psv,
                'type_day_count' => $type_day_count,
                'subscriber_email' => $subscriber_email,
                'protocol' => Tools::getProtocol(Tools::usingSecureMode()),
                'get_subscribe_product' => $get_subscribe_product,
            )
        );
        return $this->display(__FILE__, 'views/templates/hook/stats_email.tpl');
    }

    public function getCurrencySign()
    {
        $currency = new Currency((int)Configuration::get('PS_CURRENCY_DEFAULT'));
        return $currency->sign;
    }

    public function getAverageGrade($id_product)
    {
        if (Module::isInstalled('productcomments') && Module::isEnabled('productcomments')) {
            $validate = Configuration::get('PRODUCT_COMMENTS_MODERATE');
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow('
                SELECT (SUM(pc.`grade`) / COUNT(pc.`grade`))
                AS grade
                FROM `'._DB_PREFIX_.'product_comment` pc
                WHERE pc.`id_product` = '.(int)$id_product.'
                AND pc.`deleted` = 0'.($validate == '1' ? ' AND pc.`validate` = 1' : ''));
        } else {
            return false;
            
        }
        
    }

    public static function getCommentNumber($id_product)
    {
        if (Module::isInstalled('productcomments') && Module::isEnabled('productcomments')) {
            if (!Validate::isUnsignedId($id_product)) {
                return false;
            }
            $validate = (int)Configuration::get('PRODUCT_COMMENTS_MODERATE');
                $result = (int)Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
                SELECT COUNT(`id_product_comment`) AS "nbr"
                FROM `'._DB_PREFIX_.'product_comment` pc
                WHERE `id_product` = '.(int)($id_product).($validate == '1' ? ' AND `validate` = 1' : ''));
            return $result;
        } else {
            return false;
        }
    }

    public function postProcess()
    {
        $languages = Language::getLanguages(false);
        if (Tools::isSubmit('submit_oosn')) {
            $emails = explode("\n", trim(Tools::getValue('oosn_multi_email')));
            $emails = array_filter(array_map('trim', $emails));

            foreach ($emails as $email) {
                if (!Validate::isEmail($email)) {
                    $this->errors[] = $this->l('Invalid E-mail');
                    return false;
                }
            }
            if (empty($this->errors)) {
                Configuration::updateValue('HI_OOSN_CLEAN_DB', (bool)Tools::getValue('clean_db'));
                Configuration::updateValue('HI_OOSN_ON', (bool)Tools::getValue('show_stock_info'));
                Configuration::updateValue('HI_OOSN_HOOKS', Tools::getValue('hooks'));
                Configuration::updateValue('HI_OOSN_POSITION', Tools::getValue('position'));
                Configuration::updateValue('HI_OOSN_ORDER_TYPE', (bool)Tools::getValue('order_type'));
                Configuration::updateValue('HI_OOSN_EMAIL_SENT', (bool)Tools::getValue('email_sent'));
                foreach ($languages as $lang) {
                    Configuration::updateValue(
                        'HI_OOSN_EMAIL_SUBJECT',
                        array($lang['id_lang'] => Tools::getValue('oosn_email_subject_'.$lang['id_lang']))
                    );
                }
                
                Configuration::updateValue('HI_OOSN_REMOVE_EMAIL', (bool)Tools::getValue('remove_email'));
                Configuration::updateValue('HI_OOSN_AUTO_FILL_ON', (bool)Tools::getValue('show_auto_fill_info'));
                Configuration::updateValue('HI_OOSN_LOGGED_ON', (bool)Tools::getValue('show_logged_info'));
                Configuration::updateValue('HI_OOSN_STATISTIC_ON', (bool)Tools::getValue('show_statistic_info'));
                Configuration::updateValue('HI_OOSN_PRODUCT_QUANTITY', (int)Tools::getValue('oosn_product_quantity'));
            }
            
        }
        if (Tools::isSubmit('submit_admin_oosn')) {
            Configuration::updateValue('HI_OOSN_SUBSCRIBE_EMAIL_SENT', (bool)Tools::getValue('subscribe_email_sent'));
            Configuration::updateValue('HI_OOSN_MULTI_EMAIL', Tools::getValue('oosn_multi_email'));
            Configuration::updateValue('HI_OOSN_LAST_DAY_COUNT', Tools::getValue('oosn_last_day_count'));
        }

        if (Tools::isSubmit('submit_csv')) {
            $this->refreshExportVars();
            $this->globalVars();
            $csv_exp = array();
            $sentemail = array();
            $outofstock = array();

            if ($this->filter_export_status == '') {
                $requests = Db::getInstance()->ExecuteS('SELECT *
                FROM '._DB_PREFIX_.'hioutofstock
                UNION ALL SELECT *
                FROM '._DB_PREFIX_.'hioutofstocksentemail');
            } elseif ($this->filter_export_status == 1) {
                $requests = OutOfStock::getStockSubscribeProducts();
            } elseif ($this->filter_export_status == 2) {
                $requests = SentEmail::getStockSendEmail();
            }
            foreach ($requests as $res) {
                if ($this->filter_export_status == 1) {
                    $csv_exp[] = new OutOfStock($res['id']);
                } elseif ($this->filter_export_status == 2) {
                    $csv_exp[] = new SentEmail($res['id']);
                } elseif ($this->filter_export_status == '') {
                    $sentemail[] = new SentEmail($res['id']);
                    $outofstock[] = new OutOfStock($res['id']);
                    $csv_exp = array_merge($sentemail, $outofstock);
                }
            }
            foreach ($csv_exp as $key => $result) {
                if ($result->id == ''
                    && $result->id_shop == ''
                    && $result->id_product == ''
                    && $result->id_customer == ''
                    && $result->id_combination == ''
                    && $result->email == ''
                    && $result->status == ''
                    && $result->date == '') {
                    unset($csv_exp[$key]);
                }
                if (!$this->export_id) {
                    unset($result->id);
                }
                if (!$this->export_id_shop) {
                    unset($result->id_shop);
                }
                if (!$this->export_id_product) {
                    unset($result->id_product);
                }
                if (!$this->export_customer_id) {
                    unset($result->id_customer);
                }
                if (!$this->export_comb_id) {
                    unset($result->id_combination);
                }
                if (!$this->export_email) {
                    unset($result->email);
                }
                if (!$this->export_status) {
                    unset($result->status);
                }
                if (!$this->export_date) {
                    unset($result->date);
                }
                unset($result->id_shop_list);
                unset($result->force_id);
            }
            $csv = new CSV($csv_exp, 'oosn_subscribers');
            $csv->export();
            exit;
        }
        if (Tools::isSubmit('submit_pdf')) {
            $this->refreshExportVars();
            $this->globalVars();
            $object = new OutOfStock();
            $pdf = new PDF($object, 'OOSN', Context::getContext()->smarty);
            $pdf->render();
            exit;
        }
        if (Tools::isSubmit('reset_export')) {
            Configuration::updateValue('HI_OOSN_FILTER_EXPORT_STATUS', '');
        }
        if (Tools::isSubmit('reset_statistic')) {
            DB::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'hioutofstockemailstatistic');
        }
    }

    public function displayForm()
    {
        $html = '';
        $content = '';
        if (!$this->isSelectedShopGroup()) {
            $html .= $this->renderMenuTabs();
            switch (Tools::getValue('histock')) {
                case 'confgeneralset':
                    $content .= $this->renderSettingsForm();
                    break;
                case 'adminconfgeneralset':
                    $content .= $this->renderAdminSettingsForm();
                    break;
                case 'confprpendding':
                    $content .= $this->renderSubscribeByProduct();
                    break;
                case 'confsubscribe':
                    $content .= $this->renderSubscribeByEmail();
                    break;
                case 'confprdelivery':
                    $content .= $this->renderSubscribeByProduct();
                    break;
                case 'confexport':
                    $content .= $this->renderSubscribeExport();
                    break;
                case 'statistic':
                    $content .= $this->renderStatistic();
                    break;
                // case 'documentation':
                //     $content .= $this->renderDocumentationForm();
                //     break;
                case 'contact_us':
                    $content .= $this->renderContactUsForm();
                    break;
                case 'news':
                    $content .= $this->renderNewsForm();
                    break;
                case 'more_module':
                    $content .= $this->renderModuleAdvertisingForm();
                    break;
                default:
                    $content .= $this->renderSettingsForm();
                    break;
            }
            $html .= $this->renderDisplayForm($content);
        } else {
            $html .= $this->renderShopGroupError();
        }

        $this->context->controller->addCSS($this->_path.'views/css/admin.css', 'all');
        $this->context->controller->addJs($this->_path.'views/js/admin.js');
        $html .= $this->renderModuleAdminVariables();
        return $html;
    }

    public function getContent()
    {
        if (Tools::isSubmit('submit_oosn')
            || Tools::isSubmit('submit_admin_oosn')
            || Tools::isSubmit('submit_csv')
            || Tools::isSubmit('submit_pdf')
            || Tools::isSubmit('reset_export')
            || Tools::isSubmit('reset_statistic')) {
                $this->postProcess();
        }
        $this->createEmailLangFiles();
        $this->globalVars();
        $this->autoRegisterHook($this->id, array($this->oosn_hooks));
        return $this->displayForm();
    }

    public function renderModuleAdvertisingForm()
    {
        $this->context->smarty->assign(
            array(
                'psv' => $this->psv,
            )
        );
        return $this->display(__FILE__, 'views/templates/admin/moduleadvertising.tpl');
    }

    public function getStockMailContent($result)
    {
        if (!empty($result)) {
            $link = new Link();
            $img = new Image();
            $id_language = (int)Configuration::get('PS_LANG_DEFAULT');
            foreach ($result as $res) {
                $get_customer = $this->getSubscribeCustomer($res['email']);
                $avalibale_image = Image::getImages($id_language, $res['id_product']);
                $product = new Product($res['id_product'], false, $id_language);
                $pr_link = $link->getProductLink($res['id_product'], null, null, null, $id_language, null, $res['id_combination']);
                if ($res['id_combination'] != 0) {
                    $combination_name = $product->getAttributeCombinationsById($res['id_combination'], $id_language);
                } else {
                    $combination_name = array();
                }
                if (!empty($combination_name)) {
                    $group_name = '';
                    $attr_url_name = '';
                    foreach ($combination_name as $attr) {
                        if ($this->psv >= 1.6) {
                            $product_img_id = $product->getCombinationImageById(
                                $attr['id_product_attribute'],
                                $id_language
                            );
                            if ($product_img_id) {
                                $img_link = Tools::getProtocol().$link->getImageLink(
                                    $product->link_rewrite,
                                    $product_img_id['id_image'],
                                    $this->getImageType('home')
                                );
                            } else {
                                if (isset($avalibale_image) && !empty($avalibale_image)) {
                                    $product_img_id = $product->getCover($res['id_product']);
                                    $img_link = Tools::getProtocol().$link->getImageLink(
                                        $product->link_rewrite,
                                        $product_img_id['id_image'],
                                        $this->getImageType('home')
                                    );
                                } else {
                                    $img_link = Tools::getProtocol().$link->getImageLink(
                                        $product->link_rewrite,
                                        $product->defineProductImage(
                                            $product->getImages(
                                                $id_language
                                            ),
                                            $id_language
                                        ),
                                        $this->getImageType('home')
                                    );
                                }
                            }
                        } else {
                            $img_id = $img->getImages($id_language, $res['id_product'], $attr['id_product_attribute']);
                            if ($img_id) {
                                $img_link = Tools::getProtocol().$link->getImageLink(
                                    $product->link_rewrite,
                                    $img_id[0]['id_image'],
                                    $this->getImageType('home')
                                );
                            } else {
                                if (isset($avalibale_image) && !empty($avalibale_image)) {
                                    $product_img_id = $product->getCover($res['id_product']);
                                    $img_link = Tools::getProtocol().$link->getImageLink(
                                        $product->link_rewrite,
                                        $product_img_id['id_image'],
                                        $this->getImageType('home')
                                    );
                                } else {
                                    $img_link = Tools::getProtocol().$link->getImageLink(
                                        $product->link_rewrite,
                                        $product->defineProductImage(
                                            $product->getImages(
                                                $id_language
                                            ),
                                            $id_language
                                        ),
                                        $this->getImageType('home')
                                    );
                                }
                            }
                        }
                        $group_name .= '
                            <span style="color:#333333; font-size:12px; font-weight: 700;text-transform: uppercase;">
                                '.$attr['group_name'].':</span>
                            <span style="color:#999999; font-size:16px;margin-right: 10px;text-transform: capitalize;">
                                '.$attr['attribute_name'].'
                            </span>';
                        $id_product_attribute = $attr['id_product_attribute'];
                        $attr_url_name .='/'.$attr['id_attribute'].'-'.Tools::strtolower($attr['group_name']).'-'.Tools::strtolower($attr['attribute_name']);
                    }
                } else {
                    $group_name = '';
                    if (isset($avalibale_image) && !empty($avalibale_image)) {
                        $product_img_id = $product->getCover($res['id_product']);
                        $img_link = Tools::getProtocol().$link->getImageLink(
                            $product->link_rewrite,
                            $product_img_id['id_image'],
                            $this->getImageType('home')
                        );
                    } else {
                        $img_link = Tools::getProtocol().$link->getImageLink(
                            $product->link_rewrite,
                            $product->defineProductImage(
                                $product->getImages(
                                    $id_language
                                ),
                                $id_language
                            ),
                            $this->getImageType('home')
                        );
                    }
                }
                if ($res['status'] == 1) {
                    $grade_html = '';
                    $grade_info = '';
                    
                    if ($this->psv >= 1.6) {
                        $host_domain = Tools::getAdminUrl();
                    } else {
                        $host_domain = Tools::getHttpHost(true).__PS_BASE_URI__;
                    }
                    if ($this->getCommentNumber($res['id_product'])) {
                        $comment_count = $this->getCommentNumber($res['id_product']);
                    }
                    if ($this->getAverageGrade($res['id_product'])) {
                        $grade = $this->getAverageGrade($res['id_product']);
                        $average = round($grade['grade']);
                        $procent = round($grade['grade'], 2);
                        if ($grade['grade'] != '') {
                            for ($i=0; $i<=4; $i++) {
                                if ($average <= $i) {
                                    $grade_html .='
                                        <td style="width:15px;height:14px;padding-right:2px;"> 
                                            <img src="'.$host_domain.'modules/'.$this->name.'/views/img/star_off.png">
                                        </td>';
                                } else {
                                    $grade_html .='
                                    <td style="width:15px;height:14px;padding-right:2px;">
                                        <img src="'.$host_domain.'modules/'.$this->name.'/views/img/star_on.png">
                                    </td>';
                                }
                            }
                            $grade_info .= '
                                <td style="padding-left:14px;">
                                    <a href="'.$pr_link.'#idTab5"
                                        style="text-decoration:none;color:#5b84ae;font-size:15px;">
                                        ('.$procent.' - '.$comment_count.$this->l(' Rewievs').')
                                    </a>
                                </td>';
                        }
                    }
                    $currency_sign = $this->getCurrencySign();
                    $reference = '';
                    
                    if ($product->reference != '') {
                        $reference .= '
                            <small style="color:#333333; font-size:12px; font-weight: 600; margin-right:5px;">
                                '.$this->l('SKU:').'
                            </small>
                            <small style="color:#adadad; font-size:16px;text-transform: capitalize;">
                                '.$product->reference.'
                            </small>';
                    }
                    if ($this->oosn_statistic_on) {
                        $statisticemail = new EmailStatistic();
                        $statisticemail->opened = 0;
                        $statisticemail->buy_now = 0;
                        $statisticemail->view = 0;
                        $statisticemail->email = $res['email'];
                        $statisticemail->add();
                        $statistic_id = $statisticemail->id;
                        $statistic_email = $statisticemail->email;
                    } else {
                        $statistic_id = '';
                        $statistic_email = '';
                    }
                    $statistic_link = strripos($link->getModuleLink($this->name, 'oosnstats'), '?');
                    if ($statistic_link === false) {
                        $mail_stats_link = $link->getModuleLink($this->name, 'oosnstats').'?';
                    } else {
                        $mail_stats_link = $link->getModuleLink($this->name, 'oosnstats').'&';
                    }
                    $template_vars = array(
                        '{id}' => $statistic_id,
                        '{statistic_email}' => $statistic_email,
                        '{firstname}' => $get_customer[0]['firstname'],
                        '{lastname}' => $get_customer[0]['lastname'],
                        '{name}' => $product->name,
                        '{description}' => $product->description_short,
                        '{price}' =>  $product->getPriceStatic($res['id_product'], true, null, 2),
                        '{reference}' => $reference,
                        '{group_name}' => $group_name,
                        '{moduledir}' => $host_domain.'modules/'.$this->name,
                        '{grade_html}' => $grade_html,
                        '{grade_info}' => $grade_info,
                        '{sign}' => $currency_sign,
                        '{statistic_link}' => $mail_stats_link,
                        '{id_product}' => $res['id_product'],
                        '{id_product_attribute}' => $id_product_attribute,
                        '{img_link}' => $img_link,
                        '{pr_link}' => $pr_link,
                        '{attr_url_name}' => $attr_url_name,
                        '{email}' => $get_customer[0]['email'],
                        );
                    if ($this->sendStockMail($template_vars, $get_customer[0]['email'], $this->oosn_email_subject[$this->context->language->id])) {
                        $outofstock = new OutOfStock($res['id']);
                            $sentemail = new SentEmail();
                            $sentemail->id_shop = $outofstock->id_shop;
                            $sentemail->id_product = $outofstock->id_product;
                            $sentemail->id_customer = $outofstock->id_customer;
                            $sentemail->id_combination = $outofstock->id_combination;
                            $sentemail->email = $outofstock->email;
                            $sentemail->date = $outofstock->date;
                            $sentemail->status = 2;
                            $sentemail->add();
                        $outofstock->delete();
                    } else {
                        if ($this->oosn_statistic_on) {
                            $statisticemail = new EmailStatistic($statistic_id);
                            $statisticemail->delete();
                        }
                    }
                    if ($this->oosn_remove_email) {
                        $oosn_delet_send = new SentEmail($sentemail->id);
                        $oosn_delet_send->delete();
                    }
                }
            }
        }
    }

    public function returnHookVal($hook)
    {
        if ($this->oosn_on && $this->oosn_hooks == $hook) {
            $id = Tools::getValue('id_product');
            /*$id_combination work only in 1.7*/
            $id_combination = Tools::getValue('id_product_attribute') ? Tools::getValue('id_product_attribute') : '';
            $display_oosn = false;
            $order_out_of_stock = true;
            if ($this->oosn_logged_on && $this->context->customer->isLogged()) {
                $display_oosn = true;
            } elseif ($this->oosn_logged_on && !$this->context->customer->isLogged()) {
                $display_oosn = false;
            } elseif (!$this->oosn_logged_on) {
                $display_oosn = true;
            }
            if ($this->oosn_order_type) {
                if (StockAvailable::outOfStock($id) == 0) {
                    $order_out_of_stock = true;
                } elseif (StockAvailable::outOfStock($id) == 2 && Configuration::get('PS_ORDER_OUT_OF_STOCK') == 0) {
                    $order_out_of_stock = true;
                } else {
                    $order_out_of_stock = false;
                }
            }
            if ($this->psv >= 1.7){
                if (Product::getQuantity($id, $id_combination) <= 0) {
                    $show_subscribe_form = true;
                } else {
                    $show_subscribe_form = false;
                }
            } else {
                $show_subscribe_form = false;
            }
            if ($this->oosn_on) {
                $this->context->smarty->assign(
                    array(
                        'oosn_path' => $this->_path,
                        'psv' => $this->psv,
                        'id_combination' => $id_combination,
                        'show_subscribe_form' => $show_subscribe_form,
                        'logged' => $this->context->customer->isLogged() ? true : false,
                        'oosn_customer' => $this->getCustomer(),
                        'display_oosn' => $display_oosn,
                        'order_out_of_stock' => $order_out_of_stock,
                        'oosn_auto_fill_on' => $this->oosn_auto_fill_on,
                    )
                );
                return $this->display(__FILE__, 'outofstock.tpl');
            }
        }
    }

    public function hookHeader()
    {
        if(Dispatcher::getInstance()->getController() != 'product') {
            return;
        }

        $this->context->controller->addCSS($this->_path.'views/css/front.css', 'all');
        if ($this->psv >= 1.7) {
            $this->context->controller->addJqueryPlugin('fancybox');
        }
        $this->context->controller->addJS($this->_path.'views/js/front.js');
        $id_product = (int)Tools::getValue('id_product');
        if(!$id_product) {
            return;
        }

        /*$id_combination work only in 1.7*/
        $id_combination = Tools::getValue('id_product_attribute') ? Tools::getValue('id_product_attribute') : '';
        if(Configuration::get('PS_STOCK_MANAGEMENT')) {
            if (Product::getQuantity($id_product, $id_combination) <= 0) {
                $quantity = 0;
            } else {
                $quantity = Product::getQuantity($id_product, $id_combination);
            }
            $oosn_stock_managment = 1;
        } else {
            $product = new Product($id_product);
            if(isset($product->available_for_order) && $product->available_for_order) {
                $quantity = 1;
            } else {
                $quantity = 0;
            }
            $oosn_stock_managment = 0;
        }
        $this->context->smarty->assign(
            array(
                'oosn_position' => $this->oosn_position,
                'psv' => $this->psv,
                'oosn_secure_key' => $this->secure_key,
                'quantity' => $quantity,
                'id_product' => $id_product,
                'id_combination' => $id_combination,
                'oosn_front_controller_url' => $this->context->link->getModuleLink('hioutofstocknotification', 'subscribe'),
                'oosn_stock_managment' => $oosn_stock_managment
            )
        );
        return $this->display(__FILE__, 'header.tpl');
    }

    public function hookDisplayRightColumnProduct($params)
    {
        return $this->returnHookVal('displayRightColumnProduct');
    }

    public function hookDisplayProductButtons($params)
    {
        return $this->returnHookVal('displayProductButtons');
    }

    public function hookactionUpdateQuantity($par)
    {
        if ($par['quantity'] >= $this->oosn_product_quantity) {
            $result = OutOfStock::getStockByCombinationId($par['id_product'], $par['id_product_attribute']);
            $this->getStockMailContent($result);
        }
    }

    public function hookactionProductSave($par)
    {
        if ($this->oosn_email_sent
            && (StockAvailable::outOfStock($par['id_product']) == 1
            || (StockAvailable::outOfStock($par['id_product']) == 2
                && Configuration::get('PS_ORDER_OUT_OF_STOCK') == 1))) {
            $result = OutOfStock::getStockByProductId($par['id_product']);
            $this->getStockMailContent($result);
        }
    }

    public function hookDisplayCustomerAccount()
    {
        if ($this->oosn_on) {
            $this->context->smarty->assign(array(
                'psv' => $this->psv,
            ));
            return $this->display(__FILE__, 'subscribe.tpl');
        }
    }
    public function hookoutofstock($params)
    {
        return $this->returnHookVal('custom');
    }

    public function sendStockMail($templates_vars, $email, $subject = '')
    {
        return Mail::Send(
            $this->context->language->id,
            'outofstoknotification',
            str_replace("{product_name}", $templates_vars['{name}'], $subject),
            $templates_vars,
            $email,
            null,
            null,
            null,
            null,
            null,
            _PS_MODULE_DIR_.$this->name.'/mails/'
        );
    }

    public function sendAdministratorNotificationMail($email, $products)
    {
        return Mail::Send(
            $this->context->language->id,
            'oosn_products',
            Mail::l('Out of stock subscriptions for last '.$this->last_day_count.' days'),
            array('{products}' => $products),
            $email,
            null,
            null,
            null,
            null,
            null,
            _PS_MODULE_DIR_.$this->name.'/mails/'
        );
    }

    public function sendAdministratorNotificationMailFromSubscribers($email, $html, $product_name = '')
    {
        return Mail::Send(
            $this->context->language->id,
            'oosn_one_product',
            Mail::l('You have new subscriber for '.$product_name.''),
            array('{products}' => $html),
            $email,
            null,
            null,
            null,
            null,
            null,
            _PS_MODULE_DIR_.$this->name.'/mails/'
        );
    }
}
