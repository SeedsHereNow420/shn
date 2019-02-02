<?php
/*
* 2007-2017 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2017 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

class StHoverImage extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    public static $cache_hover = array();
    private $_effect = array();
	function __construct()
	{
		$this->name           = 'sthoverimage';
		$this->tab            = 'front_office_features';
		$this->version        = '1.0';
		$this->author         = 'SUNNYTOO.COM';
		$this->need_instance  = 0;
        $this->bootstrap      = true;

		parent::__construct();

		$this->displayName = $this->getTranslator()->trans('Hover image', array(), 'Modules.Sthoverimage.Admin');
		$this->description = $this->getTranslator()->trans('Products thumb image change on mouse hover', array(), 'Modules.Sthoverimage.Admin');
	}

	function install()
	{
        $result = true;
	    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'image` `hover`');
        if(!is_array($field) || !count($field))
            if (!Db::getInstance()->execute('ALTER TABLE `'._DB_PREFIX_.'image` ADD `hover` BOOLEAN NOT NULL DEFAULT 0;'))
        		$result &= false;
                
        $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'image_shop` `hover`');
        if(!is_array($field) || !count($field))
            if (!Db::getInstance()->execute('ALTER TABLE `'._DB_PREFIX_.'image_shop` ADD `hover` BOOLEAN NOT NULL DEFAULT 0;'))
        		$result &= false;
        
        if ($result)
        {
            $result = parent::install() &&
                $this->registerHook('displayAdminProductsExtra') &&
                $this->registerHook('actionStAssemble') &&
                $this->registerHook('displayHeader') &&
                Configuration::updateValue('ST_HOVER_IMAGE_WAY', 0);    
        }

		return $result;
	}
    
    public function uninstall()
	{
        $result = true;
	    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'image` `hover`');
        if(is_array($field) && count($field))
            if (!Db::getInstance()->execute('ALTER TABLE `'._DB_PREFIX_.'image` DROP `hover`;'))
        		$result &= false;
                
        $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'image_shop` `hover`');
        if(is_array($field) && count($field))
            if (!Db::getInstance()->execute('ALTER TABLE `'._DB_PREFIX_.'image_shop` DROP `hover`;'))
        		$result &= false;
		return $result && parent::uninstall();
	}
    
    public static function updateHoverImage($id_image, $delete = true)
	{
	    $img = new Image((int)$id_image);
        if (!$img->id) {
            return false;
        }
        $delelted = false;
        $rs1 = Db::getInstance()->getValue('SELECT COUNT(0) FROM `'._DB_PREFIX_.'image` WHERE `hover` = 1 AND `id_image` = '.(int)$img->id);
        $rs2 = Db::getInstance()->getValue('SELECT COUNT(0) FROM `'._DB_PREFIX_.'image_shop` 
            WHERE `hover` = 1 AND `id_image` = '.(int)$img->id.' AND id_shop IN ('.implode(',', array_map('intval', Shop::getContextListShopID())).')');
        if ($rs1 || $rs2) {
            $delelted = true;
        }
        if ($delete) {
            self::deleteHover((int)$img->id_product);
            if ($delelted) {
                return true;
            }    
        }
        if ($img->id) {
            $hover = 1;
            return (Db::getInstance()->execute('
    			UPDATE `'._DB_PREFIX_.'image`
    			SET `hover` = '.$hover.'
    			WHERE `id_image` = '.(int)$img->id
    		) &&
    		Db::getInstance()->execute('
    			UPDATE `'._DB_PREFIX_.'image_shop`
    			SET `hover` = '.$hover.'
    			WHERE id_shop IN ('.implode(',', array_map('intval', Shop::getContextListShopID())).') 
                AND id_image = '.(int)$img->id.'
                AND id_product = '.(int)$img->id_product
    		));
        }
        return true;
	}
        
    public function getContent()
	{
	    $act = Tools::getValue('action');
        if (Tools::getValue('ajax'))
        {
           if ($act == 'building_hover_all')
            {
                echo self::buildingHover(Tools::getValue('cursor'));
                die;            
            }
            
            if ($act == 'clear_hover_all')
            { 
                echo self::ClearHover();
                die;            
            }
            
            if($act == 'update_hover')
            {
                $result['r'] = false;
                if($result['r'] = self::updateHoverImage((int)Tools::getValue('id_image')))
                {
                    $result['m'] = '';
                }
                echo json_encode($result);
                die;
            } 
        }
        $this->_effect = array(
            array('id' => 0, 'name' => $this->getTranslator()->trans('Fade', array(), 'Modules.Sthoverimage.Admin')),
            array('id' => 1, 'name' => $this->getTranslator()->trans('From Top', array(), 'Modules.Sthoverimage.Admin')),
            array('id' => 2, 'name' => $this->getTranslator()->trans('From Bottom', array(), 'Modules.Sthoverimage.Admin')),
            array('id' => 3, 'name' => $this->getTranslator()->trans('From Left', array(), 'Modules.Sthoverimage.Admin')),
            array('id' => 4, 'name' => $this->getTranslator()->trans('From Right', array(), 'Modules.Sthoverimage.Admin')),
        );
        $this->initFieldsForm();
		if (isset($_POST['savesthoverimage']))
		{
            foreach($this->fields_form as $form)
                foreach($form['form']['input'] as $field)
                    if(isset($field['validation']))
                    {
                        $errors = array();     
                        $value = Tools::getValue($field['name']);
                        if (isset($field['required']) && $field['required'] && $value==false && (string)$value != '0')
        						$errors[] = sprintf(Tools::displayError('Field "%s" is required.'), $field['label']);
                        elseif($value)
                        {
                            $field_validation = $field['validation'];
        					if (!Validate::$field_validation($value))
        						$errors[] = sprintf(Tools::displayError('Field "%s" is invalid.'), $field['label']);
                        }
        				// Set default value
        				if ($value === false && isset($field['default_value']))
        					$value = $field['default_value'];
                        
                        if($field['name']=='limit' && $value>20)
                             $value=20;
                        
                        if(count($errors))
                        {
                            $this->validation_errors = array_merge($this->validation_errors, $errors);
                        }
                        elseif($value==false)
                        {
                            switch($field['validation'])
                            {
                                case 'isUnsignedId':
                                case 'isUnsignedInt':
                                case 'isInt':
                                case 'isBool':
                                    $value = 0;
                                break;
                                default:
                                    $value = '';
                                break;
                            }
                            Configuration::updateValue('ST_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_'.strtoupper($field['name']), $value);
                    }
            $this->initFieldsForm();
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else
            {
                Tools::clearSmartyCache();
    			Media::clearCache();
                $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Admin.Theme.Transformer'));
            }                
        }
        
	    $this->context->controller->addJS($this->_path. 'views/js/admin.js');
        $module_url = Tools::getProtocol(Tools::usingSecureMode()).$_SERVER['HTTP_HOST'].$this->getPathUri();
        $this->context->smarty->assign(array(
            'build_hover_url' => $module_url.'sthoverimage_ajax.php'.'?token='.substr(Tools::encrypt('sthoverimage/index'), 0, 10),
            'clear_hover_url' => $module_url.'sthoverimage_ajax.php'.'?token='.substr(Tools::encrypt('sthoverimage/index'), 0, 10),
            'ps_base_uri' => AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
        ));

		$this->_html .= $this->display(__FILE__, 'views/templates/admin/view.tpl');
        $this->_html .= $this->initForm()->generateForm($this->fields_form);
        return $this->_html;
	}
    
    protected function initFieldsForm()
    {
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->getTranslator()->trans('Setting', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'
			),
            'input' => array(
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Hover effect:', array(), 'Modules.Sthoverimage.Admin'),
					'name' => 'hover_image_way',
                    'validation' => 'isUnsignedId',
                    'required' => true,
                    'options' => array(
        				'query' => $this->_effect,
        				'id' => 'id',
        				'name' => 'name',
        			)
				),
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans(' Save ', array(), 'Admin.Actions')
			)
		);
    }
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'hover_image_way' => Configuration::get('ST_HOVER_IMAGE_WAY'),
        );
        return $fields_values;
    }
    protected function initForm()
	{
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savesthoverimage';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    
    public function hookDisplayAdminProductsExtra($params)
    {
        if (!$id_product = $params['id_product']) {
            return;
        }
        $id_lang = $this->context->language->id;
        $data = array();
        foreach(Image::getImages($id_lang, $id_product) AS $value) {
            $image = new Image($value['id_image']);
            if ($image->cover) {
                continue;
            }
            $data[] = array(
                'id' => $image->id,
                'id_product' => $image->id_product,
                'position' => $image->position,
                'cover' => $image->cover ? true : false,
                'hover' => $value['hover'] ? true : false,
                'legend' => $image->legend,
                'format' => $image->image_format,
                'base_image_url' => _THEME_PROD_DIR_.$image->getImgPath(),
            );
        }
        $this->smarty->assign(array(
            'images' => $data,
            'current_url' => 'index.php?controller=AdminModules&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
        ));
        return $this->display(__FILE__, 'views/templates/admin/sthoverimage.tpl'); 
    }
    public function hookActionStAssemble($product)
    {
        $hover = $this->getHoverImageByProduct($product);

        if(!is_array($hover) || !count($hover))
            return false;
        
        return $hover;
    }
    public function hookDisplayHeader($params)
    {
		if($hover_image_way = Configuration::get('ST_HOVER_IMAGE_WAY'))
			$this->context->controller->addCSS(($this->_path).'views/css/style-'.$hover_image_way.'.css');
		else
			$this->context->controller->addCSS(($this->_path).'views/css/style.css');
    }

    public static function clearHover()
    {
        Db::getInstance()->update('image', array('hover'=>false));
        Db::getInstance()->update('image_shop', array('hover'=>false));
        echo '{"result":"ok"}';
    }
    
    public static function buildingHover($cursor = null)
	{
		$nb_products = (int)Db::getInstance()->getValue('
			SELECT count(DISTINCT p.`id_product`)
			FROM '._DB_PREFIX_.'product p
			INNER JOIN `'._DB_PREFIX_.'product_shop` ps
				ON (ps.`id_product` = p.`id_product` AND ps.`active` = 1 AND ps.`visibility` IN ("both", "catalog"))');
		
		$max_executiontime = @ini_get('max_execution_time');
		if ($max_executiontime > 5 || $max_executiontime <= 0)
			$max_executiontime = 5;
		
		$start_time = microtime(true);
		
		if (function_exists('memory_get_peak_usage'))
			do
			{
				$cursor = (int)self::processBuilding((int)$cursor);
				$time_elapsed = microtime(true) - $start_time;
			}
			while ($cursor < $nb_products && Tools::getMemoryLimit() > memory_get_peak_usage() && $time_elapsed < $max_executiontime);
		else
			do
			{
				$cursor = (int)self::processBuilding((int)$cursor);
				$time_elapsed = microtime(true) - $start_time;
			}
			while ($cursor < $nb_products && $time_elapsed < $max_executiontime);

		if ($nb_products > 0 && $cursor < $nb_products)
			return '{"cursor": '.$cursor.', "count": '.($nb_products - $cursor).'}';
		else
        {
            Tools::clearSmartyCache();
            Media::clearCache();
            return '{"result": "ok"}';
        }
	}
    
    private static function processBuilding($cursor)
	{
		static $length = 100; // Nb of products to index
		
		if (is_null($cursor))
			$cursor = 0;
		
		$query = '
			SELECT p.`id_product`
			FROM `'._DB_PREFIX_.'product` p
			INNER JOIN `'._DB_PREFIX_.'product_shop` ps
				ON (ps.`id_product` = p.`id_product` AND ps.`active` = 1 AND ps.`visibility` IN ("both", "catalog"))
			GROUP BY p.`id_product`
			ORDER BY p.`id_product` LIMIT '.(int)$cursor.','.(int)$length;
		foreach (Db::getInstance()->executeS($query) as $product)
			self::processHover((int)$product['id_product']);

		return (int)($cursor + $length);
	}
    
    private static function processHover($id_product = 0)
    {
        if (!$id_product)
            return false;
        $count_images = Db::getInstance()->getValue('
					SELECT COUNT(0) from `'._DB_PREFIX_.'image` i
                    INNER JOIN `'._DB_PREFIX_.'image_shop` s
                    ON i.id_image = s.id_image
                    WHERE i.id_product = '.(int)$id_product.'
                    AND s.id_shop = '.(int)Shop::getContextShopID().'
                    AND s.hover > 0
				');
        if ($count_images)
            return false;
        $query = '
            SELECT s.* from `'._DB_PREFIX_.'image` i
            INNER JOIN `'._DB_PREFIX_.'image_shop` s
            ON i.id_image = s.id_image
            WHERE i.id_product = '.(int)$id_product.'
            AND s.id_shop = '.(int)Shop::getContextShopID().'
            ORDER BY s.cover DESC, position ASC
            ';
        $id_shop = Context::getContext()->shop->id;
        foreach(Db::getInstance()->executeS($query) AS $image)
        {
            if ($image['cover'])
                continue;
            return self::updateHoverImage($image['id_image'], false);
        }
        return false;
    }
    
    public function getHoverImageByProduct($product)
    {
        if (isset(self::$cache_hover[$product['id_product']]) && self::$cache_hover[$product['id_product']])
            return self::$cache_hover[$product['id_product']];

        self::$cache_hover[$product['id_product']] = false;
        
        foreach(Image::getImages($this->context->language->id, (int)$product['id_product']) AS $image)
        {
            if ($image['cover'] > 0)
                continue;
            if ($image['hover'] > 0)
            {
                $image['hover'] = $image['hover'];
                //
                $image_types = ImageType::getImagesTypes('products');
                $urls  = [];

                foreach ($image_types as $image_type) {
                    $urls[$image_type['name']] = [
                        'url'      => $this->context->link->getImageLink(
                            $product['link_rewrite'],
                            $image['id_image'],
                            $image_type['name']
                        ),
                        'width'     => (int)$image_type['width'],
                        'height'    => (int)$image_type['height'],
                    ];
                }
                $image['bySize'] = $urls;
                //if it is needed to get width and height
                self::$cache_hover[$product['id_product']] = $image;
                break;
            }
        }
        return self::$cache_hover[$product['id_product']];
    }
    
    public static function deleteHover($id_product)
	{
		return (Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'image`
			SET `hover` = 0
			WHERE `id_product` = '.(int)$id_product
		) &&
		Db::getInstance()->execute('
			UPDATE `'._DB_PREFIX_.'image` i, `'._DB_PREFIX_.'image_shop` image_shop
			SET image_shop.`hover` = 0
			WHERE image_shop.id_shop IN ('.implode(',', array_map('intval', Shop::getContextListShopID())).') AND image_shop.id_image = i.id_image AND i.`id_product` = '.(int)$id_product
		));
	}
}