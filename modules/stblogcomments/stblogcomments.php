<?php
/*
* 2007-2014 PrestaShop
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
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
if (!defined('_PS_VERSION_'))
	exit;
    
require (dirname(__FILE__).'/classes/StBlogCommentClass.php');

class StBlogComments extends Module
{
    private $_html = '';
    protected $secure_key;
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    
	public function __construct()
	{
		$this->name          = 'stblogcomments';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap	 = true;
		
		$this->secure_key = Tools::encrypt($this->name);
		parent::__construct();
		
        $this->displayName = $this->getTranslator()->trans('Blog Module - Comments', array(), 'Modules.Stblog.Admin');
        $this->description = $this->getTranslator()->trans('Allows users to post comments.', array(), 'Modules.Stblog.Admin');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->controllers = array('mycomments');
	}

	public function install()
	{
		if (!$this->installDB()
            || !parent::install() 
			|| !$this->registerHook('displayStBlogLeftColumn')
			|| !$this->registerHook('displayStBlogRightColumn')
			|| !$this->registerHook('displayHeader')
			|| !$this->registerHook('displayStBlogArticleSecondary')
            || !$this->registerHook('displayCustomerAccount')
			|| !Configuration::updateValue('ST_BLOG_C_MODERATE', 1)
			|| !Configuration::updateValue('ST_BLOG_C_MINIMAL_TIME', 30)
			|| !Configuration::updateValue('ST_BLOG_C_ALLOW_GUESTS', 0)
			|| !Configuration::updateValue('ST_BLOG_C_COLUMN_NBR', 4)
        )
			return false;
		return true;
	}
    public function installDb()
	{
		$return = true;
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_comment` (
            `id_st_blog_comment` int(10) unsigned NOT NULL auto_increment,
            `id_parent` int(10) unsigned NOT NULL DEFAULT 0,
            `id_st_blog` int(10) UNSIGNED NOT NULL,
            `id_shop` int(10) UNSIGNED NOT NULL,
            `id_customer` int(10) unsigned NOT NULL DEFAULT 0,
            `id_guest` int(10) unsigned DEFAULT NULL,
            `customer_name` varchar(64) NULL,
            `customer_email` varchar(64) NULL,         
            `content` text NOT NULL,                               
            `customer_website` varchar(128) DEFAULT NULL,  
            `active` tinyint(1) NOT NULL DEFAULT 0,
            `deleted` tinyint(1) NOT NULL,
            `date_add` datetime NOT NULL,
            PRIMARY KEY (`id_st_blog_comment`),
            KEY `id_st_blog` (`id_st_blog`),
            KEY `id_customer` (`id_customer`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		return $return;
	}

	public function uninstall()
	{
		if (!parent::uninstall()
			|| !$this->uninstallDB()
        )
			return false;
		return true;
	}

	private function uninstallDb()
	{
        return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_blog_comment`');
	}
    public function getContent()
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog')) {
	       $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Please, install Blog module first.', array(), 'Modules.Stblog.Admin'));   
	    }
        $id_st_blog_comment = Tools::getValue('id_st_blog_comment');
        if (isset($_POST['save'.$this->name]))
        {
            if ($id_st_blog_comment) {
                $comment = new StBlogCommentClass((int)$id_st_blog_comment);
            } else {
                $comment = new StBlogCommentClass();
            }
            $error = array();
            $comment->copyFromPost();
            if (!count($error) && $comment->validateFields(false))
            {
                if (!$comment->id_shop) {
                    $comment->id_shop = (int)$this->context->shop->id;
                }
                if($comment->save())
                {
                    $this->_clearCache('*');
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_blog_comment='.$comment->id_parent : '').'&conf='.($id_st_blog_comment?4:3).'&token='.Tools::getAdminTokenLite('AdminModules'));
                }                    
                else
                    $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred during ', array(), 'Admin.Theme.Transformer').' '.($id_st_blog_comment ? $this->gettranslator()->trans('updating', array(), 'Admin.Theme.Transformer') : $this->gettranslator()->trans('creation', array(), 'Admin.Theme.Transformer')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->getTranslator()->trans('invalid value for field(s).', array(), 'Admin.Theme.Transformer'));
        }
		if (isset($_POST['save'.$this->name.'setting']))
		{
		    $this->initFieldsForm();
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
                            Configuration::updateValue('ST_BLOG_C_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_BLOG_C_'.strtoupper($field['name']), $value);
                    }
                  
             // Upload avatar
             if (isset($_FILES['default_avatar']) && $_FILES['default_avatar']['tmp_name'])
             {
                 $comment = new StBlogCommentClass();
                 if (true !== $comment->uploadAvatar('default_avatar'))
                    $this->validation_errors[] = $this->getTranslator()->trans('Upload avatar failed.', array(), 'Modules.Stblog.Admin');
                    
                 // Redirect
                 if(!count($this->validation_errors))
                 {
                     $current_index = 'index.php'.(($controller = Tools::getValue('controller')) ? '?controller='.$controller : '').'&configure='.$this->name.'&module_name='.$this->name.'&conf=4&tab_module='.$this->tab.'&token='.Tools::getValue('token');
                     Tools::redirectAdmin($current_index);   
                 }
             }
            $this->_clearCache('*');
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
                $this->_html .= $this->displayConfirmation($this->getTranslator()->trans('Settings updated', array(), 'Modules.Stblog.Admin'));
        }
        if ((Tools::isSubmit('status'.$this->name)))
        {
            $comment = new StBlogCommentClass((int)$id_st_blog_comment);
            if($comment->id && $comment->toggleStatus())
            {
                $this->_clearCache('*');
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_blog_comment='.$comment->id_parent : '').'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if ((Tools::isSubmit('delete'.$this->name)))
        {
            $comment = new StBlogCommentClass((int)$id_st_blog_comment);
            if($comment->id && $comment->delete())
            {
                $this->_clearCache('*');
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_blog_comment='.$comment->id_parent : '').'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->getTranslator()->trans('An error occurred while updating the status.', array(), 'Admin.Theme.Transformer'));
        }
        if (Tools::isSubmit('deleteavatar'))
        {
            if ($avatar = StBlogCommentClass::getAvatarDefault('large'))
                @unlink(_PS_ROOT_DIR_.$avatar);
            if ($avatar = StBlogCommentClass::getAvatarDefault('small'))
                @unlink(_PS_ROOT_DIR_.$avatar);
            if ($avatar = StBlogCommentClass::getAvatarDefault(''))
                @unlink(_PS_ROOT_DIR_.$avatar);
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=7&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        if (Tools::isSubmit('add'.$this->name) || (Tools::isSubmit('update'.$this->name) && $id_st_blog_comment))
        {
            $helper = $this->initForm();
            return $this->_html.$helper->generateForm($this->fields_form);
        }
        else
        {
			$this->_html .= $this->renderList();
            $helper = $this->initSettingForm();
            $this->initFieldsForm();
            if ($avatar = StBlogCommentClass::getAvatarDefault('large'))
            {
                $this->fields_form[0]['form']['input']['avatar']['image'] = '<img src="'.$avatar.'" />';
                $this->fields_form[0]['form']['input']['avatar']['delete_url'] = AdminController::$currentIndex.'&configure='.$this->name.'&deleteavatar&token='.Tools::getAdminTokenLite('AdminModules');
            }
    		$this->_html .= $helper->generateForm($this->fields_form);
            return  $this->_html;
        }
	}
    protected function renderList()
    {
        $this->fields_list = array(
            'id_st_blog_comment' => array(
                'title' => $this->trans('ID', array(), 'Modules.Stblog.Admin'), 
                'align' => 'center', 
                'class' => 'fixed-width-xs',
                ),
            'id_st_blog' => array(
                'title' => $this->trans('Blog', array(), 'Modules.Stblog.Admin'), 
                'class' => 'fixed-width-lg',
                'type' => 'text',
                'callback' => 'displayBlogName',
                'callback_object' => $this,
                'orderby' => false,
                'search' => false,
                ),
            'customer_name' => array(
                'title' => $this->trans('Customer Name', array(), 'Modules.Stblog.Admin'), 
                'class' => 'fixed-width-sm',
                ),
            'customer_email' => array(
                'title' => $this->trans('Customer Email', array(), 'Modules.Stblog.Admin'), 
                'class' => 'fixed-width-sm',
                ),
            'content' => array(
                'title' => $this->trans('Content', array(), 'Modules.Stblog.Admin'), 
                'orderby' => false,
                'class' => 'fixed-width-xxl',
                ),
            'deleted' => array(
                'title' => $this->trans('Reply', array(), 'Modules.Stblog.Admin'), 
                'class' => 'fixed-width-xs',
                'type' => 'text',
                'callback' => 'displayReply',
                'callback_object' => $this,
                'orderby' => false,
                'search' => false,
                ),
            'active' => array(
                'title' => $this->trans('Accept', array(), 'Modules.Stblog.Admin'), 
                'class' => 'fixed-width-sm',
                'active' => 'status', 
                'align' => 'center',
                'type' => 'bool', 
                'orderby' => false
                ),
            'date_add' => array(
                'title' => $this->trans('Date Add', array(), 'Modules.Stblog.Admin'), 
                'class' => 'fixed-width-md',
                'orderby' => false
                )
        );
        $id_st_blog_comment = Tools::getValue('id_st_blog_comment', 0);
        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = false;
        $helper->module = $this;
        $helper->identifier = 'id_st_blog_comment';
        $helper->actions = array('view', 'edit', 'delete');
        $helper->show_toolbar = true;
        $helper->imageType = 'jpg';

        $helper->title = $this->displayName;
        $helper->table = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
        if ($id_st_blog_comment) {
            $helper->toolbar_btn['new'] =  array(
    			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&id_parent='.$id_st_blog_comment.'&token='.Tools::getAdminTokenLite('AdminModules'),
    			'desc' => $this->getTranslator()->trans('Add a reply', array(), 'Modules.Stbanner.Admin'),
    		);
            $parent = new StBlogCommentClass($id_st_blog_comment);
            $helper->toolbar_btn['back'] =  array(
                'href' => AdminController::$currentIndex.'&configure='.$this->name.($parent->id_parent ? '&id_st_blog_comment='.$parent->id_parent.'&view'.$this->name : '').'&token='.Tools::getAdminTokenLite('AdminModules'),
                'desc' => $this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer')
            );    
        }
        $comments = StBlogCommentClass::getAll($id_st_blog_comment);
        $helper->listTotal = count($comments);

        /* Paginate the result */
        $page = ($page = Tools::getValue('submitFilter'.$helper->table)) ? $page : 1;
        $pagination = ($pagination = Tools::getValue($helper->table.'_pagination')) ? $pagination : 30;
        $comments = $this->pagination($comments, $page, $pagination);

        return $helper->generateList($comments, $this->fields_list);
    }
    public function pagination($comments, $page = 1, $pagination = 50)
    {
        if (count($comments) > $pagination) {
            $comments = array_slice($comments, $pagination * ($page - 1), $pagination);
        }
        return $comments;
    }
    protected function initFieldsForm()
    {
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->displayName,
                'icon' => 'icon-cogs'
			),
            'input' => array(
                array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('All comments must be validated by an employee:', array(), 'Modules.Stblog.Admin'),
					'name' => 'moderate',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'moderate_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stblog.Admin')),
						array(
							'id' => 'moderate_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stblog.Admin')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'switch',
					'label' => $this->getTranslator()->trans('Allow guest comments:', array(), 'Modules.Stblog.Admin'),
					'name' => 'allow_guests',
					'is_bool' => true,
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'allow_guests_on',
							'value' => 1,
							'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stblog.Admin')),
						array(
							'id' => 'allow_guests_off',
							'value' => 0,
							'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stblog.Admin')),
					),
                    'validation' => 'isBool',
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Seconds:', array(), 'Modules.Stblog.Admin'),
					'name' => 'minimal_time',
					'desc' => $this->getTranslator()->trans('Minimum time between 2 comments from the same user.', array(), 'Modules.Stblog.Admin'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Define the number of latest comments to be displayed:', array(), 'Modules.Stblog.Admin'),
					'name' => 'column_nbr',
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),

                'avatar' => array(
					'type' => 'file',
					'label' => $this->getTranslator()->trans('Default avatar:', array(), 'Modules.Stblog.Admin'),
					'name' => 'default_avatar',
					'desc' => $this->getTranslator()->trans('The image will be default avatar when no upload.', array(), 'Modules.Stblog.Admin'),
				),
			),
			'submit' => array(
				'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
			)
		);
        
    }
    protected function initSettingForm()
	{
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'save'.$this->name.'setting';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    public function initForm()
	{
	    $id_st_blog_comment = Tools::getValue('id_st_blog_comment');
        $id_parent = Tools::getValue('id_parent');
	    $comment = new StBlogCommentClass($id_st_blog_comment);
        if (!$comment->id_parent) {
            $comment->id_parent = (int)$id_parent;
            $parent = new StBlogCommentClass($id_parent);
            $comment->id_st_blog = $parent->id_st_blog;
        }
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->trans('Blog comments', array(), 'Modules.Stblog.Admin'),
				'icon' => 'icon-tags',
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->trans('Customer Name:', array(), 'Modules.Stblog.Admin'),
					'name' => 'customer_name',
					'required' => true,
					'class' => 'copy2friendlyUrl',
					'hint' => $this->trans('Invalid characters:', array(), 'Modules.Stblog.Admin').' <>;=#{}'
				),
				array(
					'type' => 'text',
					'label' => $this->trans('Customer Email:', array(), 'Modules.Stblog.Admin'),
					'name' => 'customer_email',
					'hint' => $this->trans('Invalid characters:', array(), 'Modules.Stblog.Admin').' <>;=#{}'
				),
                array(
					'type' => 'textarea',
                    'id'   => 'cm_content',
					'label' => $this->trans('Content:', array(), 'Modules.Stblog.Admin'),
					'name' => 'content',
                    'required' => true,
					'rows' => 8,
					'cols' => 60,
					'hint' => $this->trans('Invalid characters:', array(), 'Modules.Stblog.Admin').' <>;=#{}'
    			 ),
                 array(
    					'type' => 'switch',
    					'label' => $this->trans('Accept:', array(), 'Modules.Stblog.Admin'),
    					'name' => 'active',
    					'required' => false,
    					'is_bool' => true,
    					'values' => array(
    						array(
    							'id' => 'active_on',
    							'value' => 1,
    							'label' => $this->trans('Yes', array(), 'Modules.Stblog.Admin')
    						),
    						array(
    							'id' => 'active_off',
    							'value' => 0,
    							'label' => $this->trans('No', array(), 'Modules.Stblog.Admin')
    						)
    					),
    			),
                array(
    				'type' => 'html',
                    'id' => 'a_cancel',
    				'label' => '',
    				'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.($comment->id_parent ? '&view'.$this->name.'&id_st_blog_comment='.$comment->id_parent : '').'&token='.Tools::getValue('token').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
    			),
    		),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
	    );
        if ($id_parent) {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_parent');
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_blog');
        }
		$helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->id = $id_st_blog_comment;
        $helper->table =  'st_blog_comment';
        $helper->identifier = 'id_st_blog_comment';
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        
        $helper->submit_action = 'save'.$this->name;
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
            'fields_value' => $this->getFieldsValueSt($comment),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id
        );
        return $helper;
	}
    public function displayViewLink($token, $id, $name)
    {
        return '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&view'.$this->name.'&id_st_blog_comment='.(int)$id.'&token='.$token.'" class="btn btn-default"><i class="icon-search-plus"></i>'.$this->getTRanslator()->trans(' Reply ', array(), 'Modules.Stblog.Admin').'</a>';
    }
    public function displayReply($value, $tr)
    {
        $count = array();
        StBlogCommentClass::countChild($count, $tr['id_st_blog_comment']);
        if ($count['all'] > 0)
            $reply = '<span title="'.$this->trans(
                'Reply total:%s1%, Accepted:%s2%', 
                array('%s1%'=>$count['all'], '%s2%'=>$count['accept']), 
                'Modules.Stblog.Admin').'">'.
                $count['accept'].'/'.$count['all'].'</span>';
        else
            $reply = '0';
        return $reply;
    }
    public function displayBlogName($value, $tr)
    {
        $count = array();
        $blog = new StBlogClass((int)$value, Context::getContext()->language->id);
        if ($blog->id) {
            return $blog->name;
        }
        return '--';
    }
	public function hookDisplayStBlogLeftColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
            
        $nbr = (int)Configuration::get('ST_BLOG_C_COLUMN_NBR');
        $latest_comments = StBlogCommentClass::getLatestComments($nbr,$this->context->language->id,$this->context->shop->id);
            
        $this->smarty->assign(array(   
            'latest_comments' => $latest_comments, 
		));
            
		return $this->display(__FILE__, 'stblogcomments-column.tpl');
	}
	public function hookDisplayStBlogRightColumn($params)
	{
        return $this->hookDisplayStBlogLeftColumn($params); 
    }
    
	public function hookDisplayLeftColumn($params)
	{
        return $this->hookDisplayStBlogLeftColumn($params); 
	}
	public function hookDisplayRightColumn($params)
	{
        return $this->hookDisplayStBlogLeftColumn($params); 
	}
    public function hookDisplayStBlogArticleFooter($params)
    {
        return $this->hookDisplayStBlogArticleSecondary($params); 
    }
    public function hookDisplayStBlogArticleSecondary($params)
    {
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
            
        $id_st_blog = (int)Tools::getValue('id_st_blog');
        if (!StBlogCommentClass::blogAcceptComment($id_st_blog))
            return false;
		$id_guest = (!$id_customer = (int)$this->context->cookie->id_customer) ? (int)$this->context->cookie->id_guest : false;
		$customerComment = StBlogCommentClass::getBlogLatestCommentByCustomer((int)(Tools::getValue('id_st_blog')), (int)$this->context->cookie->id_customer, (int)$id_guest);
		$moderate = (int)Configuration::get('ST_BLOG_C_MODERATE');
        
		$this->smarty->assign(array(
			'logged' => (int)$this->context->customer->isLogged(true),
			'comments' => StBlogCommentClass::getByBlogRec($id_st_blog, 0, $this->context->shop->id),
			'blogcomments_path' => $this->_path,
			'allow_guests' => (int)Configuration::get('ST_BLOG_C_ALLOW_GUESTS'),
			'too_early' => ($customerComment && (strtotime($customerComment['date_add']) + Configuration::get('ST_BLOG_C_MINIMAL_TIME')) > time()),
			'delay' => Configuration::get('ST_BLOG_C_MINIMAL_TIME'),
			'id_st_blog_comment_form' => $id_st_blog,
			'secure_key' => $this->secure_key,
			'nbComments' => (int)StBlogCommentClass::countComments($id_st_blog,$this->context->shop->id,$moderate),
            'moderate' => $moderate,            
		));

		return $this->display(__FILE__, 'stblogcomments.tpl');
    }
    public function hookDisplayHeader($params)
    {
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
        Media::addJsDef(array(
            'stblogcomments_moderate' => (int)Configuration::get('ST_BLOG_C_MODERATE'),
        ));    
		$this->context->controller->addJS(($this->_path).'views/js/stblogcomments.js');
    }
    
    public function getCommentNumber($id_st_blog,$link_rewrite=null)
    {
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
        if(!$id_st_blog || !Validate::isUnsignedInt($id_st_blog))
            return false;
        if (!StBlogCommentClass::blogAcceptComment($id_st_blog))
            return false;
        
		$moderate = (int)Configuration::get('ST_BLOG_C_MODERATE');
        $comment_number = (int)StBlogCommentClass::countComments($id_st_blog,$this->context->shop->id,$moderate);
	    $this->smarty->assign(array(
            'comment_number'=>$comment_number,
            'id_st_blog' => $id_st_blog,
        ));
        if($link_rewrite)
            $this->smarty->assign('link_rewrite',$link_rewrite);
            
        return $this->display(__FILE__, 'comment_number.tpl');
    }
	public function hookDisplayCustomerAccount($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
		return $this->display(__FILE__, 'my-account.tpl');
	}
    private function getConfigFieldsValues()
    {
        $fields_value = array(
            'moderate' =>  Configuration::get('ST_BLOG_C_MODERATE'),
            'minimal_time' =>  Configuration::get('ST_BLOG_C_MINIMAL_TIME'),
            'send_email' => Configuration::get('ST_BLOG_C_SEND_EMAIL'),
            'admin_email' => Configuration::get('ST_BLOG_C_ADMIN_EMAIL'),
            'allow_guests' =>  Configuration::get('ST_BLOG_C_ALLOW_GUESTS'),
            'column_nbr' =>  Configuration::get('ST_BLOG_C_COLUMN_NBR'),
        );
        return $fields_value;
    }
    /**
	 * Return the list of fields value
	 *
	 * @param object $obj Object
	 * @return array
	 */
	public function getFieldsValueSt($obj,$fields_form="fields_form")
	{
		foreach ($this->$fields_form as $fieldset)
			if (isset($fieldset['form']['input']))
				foreach ($fieldset['form']['input'] as $input)
					if (!isset($this->fields_value[$input['name']]))
						if (isset($input['type']) && $input['type'] == 'shop')
						{
							if ($obj->id)
							{
								$result = Shop::getShopById((int)$obj->id, $this->identifier, $this->table);
								foreach ($result as $row)
									$this->fields_value['shop'][$row['id_'.$input['type']]][] = $row['id_shop'];
							}
						}
						elseif (isset($input['lang']) && $input['lang'])
							foreach (Language::getLanguages(false) as $language)
							{
								$fieldValue = $this->getFieldValueSt($obj, $input['name'], $language['id_lang']);
								if (empty($fieldValue))
								{
									if (isset($input['default_value']) && is_array($input['default_value']) && isset($input['default_value'][$language['id_lang']]))
										$fieldValue = $input['default_value'][$language['id_lang']];
									elseif (isset($input['default_value']))
										$fieldValue = $input['default_value'];
								}
								$this->fields_value[$input['name']][$language['id_lang']] = $fieldValue;
							}
						else
						{
							$fieldValue = $this->getFieldValueSt($obj, $input['name']);
							if ($fieldValue===false && isset($input['default_value']))
								$fieldValue = $input['default_value'];
							$this->fields_value[$input['name']] = $fieldValue;
						}

		return $this->fields_value;
	}
    
	/**
	 * Return field value if possible (both classical and multilingual fields)
	 *
	 * Case 1 : Return value if present in $_POST / $_GET
	 * Case 2 : Return object value
	 *
	 * @param object $obj Object
	 * @param string $key Field name
	 * @param integer $id_lang Language id (optional)
	 * @return string
	 */
	public function getFieldValueSt($obj, $key, $id_lang = null)
	{
		if ($id_lang)
			$default_value = ($obj->id && isset($obj->{$key}[$id_lang])) ? $obj->{$key}[$id_lang] : false;
		else
			$default_value = isset($obj->{$key}) ? $obj->{$key} : false;

		return Tools::getValue($key.($id_lang ? '_'.$id_lang : ''), $default_value);
	}
}
