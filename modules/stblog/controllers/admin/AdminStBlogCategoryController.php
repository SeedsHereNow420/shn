<?php
require_once dirname(__FILE__).'../../../classes/StBlogCategory.php';
class AdminStBlogCategoryController extends ModuleAdminController
{
    /** @var integer Parent ID */
    protected $id_parent;
    
    /** @var Boolean MultiShop and Current in Shop */
    private $is_multishop_shop = false;
    
    protected $position_identifier = 'id_st_blog_category';
    
	public function __construct()
	{
	    $this->bootstrap  = true;
		$this->is_Blog    = true;
		$this->table      = 'st_blog_category';
		$this->className  = 'StBlogCategory';
		$this->lang       = true;
		$this->addRowAction('edit');
		$this->addRowAction('view');
		$this->addRowAction('delete');
        $this->show_form_cancel_button = false;
        
        if (Shop::isFeatureActive())
            Shop::addTableAssociation($this->table, array('type' => 'shop'));
		parent::__construct();
        
		$this->bulk_actions = array(
            'delete' => array(
                'text' => $this->trans('Delete selected', array(), 'Modules.Stblog.Admin'),
                'icon' => 'icon-trash', 
                'confirm' => $this->trans('Delete selected items(all the subcategory will be deleted)?', array(), 'Modules.Stblog.Admin')
            )
        );

		$this->fields_list = array(
		'id_st_blog_category' => array(
            'title' => $this->trans('ID', array(), 'Modules.Stblog.Admin'), 
            'class' => 'fixed-width-xs'
        ),
		'name' => array(
            'title' => $this->trans('Name', array(), 'Modules.Stblog.Admin'), 
            'callback' => 'hideStBlogCategoryPosition', 
            'callback_object' => 'StBlogCategory',
            'class' => 'fixed-width-xxl',
        ),
		'description' => array(
            'title' => $this->trans('Description', array(), 'Modules.Stblog.Admin'), 
            'orderby' => false,
            'class' => 'fixed-width-xxl',
        ),
		'active' => array(
			'title' => $this->trans('Displayed', array(), 'Modules.Stblog.Admin'), 
            'active' => 'status',
            'type' => 'bool', 
            'orderby' => false,
            'class' => 'fixed-width-lg',
		),
        'position' => array(
            'title' => $this->trans('Position', array(), 'Modules.Stblog.Admin'),
			'filter_key' => 'position',
			'align' => 'left',
			'position' => 'position',
            'class' => 'fixed-width-md',
        ));
        
        $this->id_parent = (int)Tools::getValue('id_st_blog_category', 0);
        $this->is_multishop_shop = (Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP);
        
        if (!$this->id_parent)
        {
            $ret = StBlogCategory::getShopCategoryRoot();
            $this->id_parent = isset($ret['id_st_blog_category']) ? (int)$ret['id_st_blog_category'] : 1;
        }
        $this->_filter = 'AND `id_parent` = '. $this->id_parent;
		$this->_select = 'a.position ';
        $this->_defaultOrderBy = 'position';
        
        if (!Shop::isFeatureActive() && count(Shop::getShops()) > 1)
        {
            $this->_join = 'LEFT JOIN '._DB_PREFIX_.'st_blog_category_shop cs ON (a.id_st_blog_category = cs.id_st_blog_category)';
            $this->_where = 'AND cs.id_shop = '.$this->context->shop->id;
        }
	}
   	public function initPageHeaderToolbar()
	{
		parent::initPageHeaderToolbar();

		if ($this->display != 'edit' && $this->display != 'add')
			$this->page_header_toolbar_btn['new'] = array(
				'href' => self::$currentIndex.'&add'.$this->table.'&token='.$this->token,
				'desc' => $this->trans('Add new category', array(), 'Modules.Stblog.Admin'),
				'icon' => 'process-icon-new'
			);
        if (empty($this->display) && $id_st_blog_caegory = Tools::getValue('id_st_blog_category'))
        {
            $cate = new StBlogCategory($id_st_blog_caegory);
            $this->page_header_toolbar_btn['cacel'] = array(
				'href' => self::$currentIndex.''.($cate->id_parent?'&id_st_blog_category='.$cate->id_parent:'').'&token='.$this->token,
				'desc' => $this->trans('Back to list', array(), 'Modules.Stblog.Admin'),
				'icon' => 'process-icon-back'
			);
        }
        
        if ($this->display == 'edit' || $this->display == 'add')
        {
            $id_parent = Tools::getValue('id_parent');
            if ($id_st_blog_caegory = Tools::getValue('id_st_blog_category'))
            {
                $category = new StBlogCategory($id_st_blog_caegory);
                $id_parent = $category->id_parent;
            }
            $this->page_header_toolbar_btn['cancel'] = array(
				'href' => self::$currentIndex.($id_parent?'&view'.$this->table.'&id_st_blog_category='.$id_parent:'').'&token='.$this->token,
				'desc' => $this->trans('Cancel', array(), 'Modules.Stblog.Admin')
		     );
        }
            
	}
    
    public function renderKpis()
    {
        $botton1 = '<a class="btn btn-primary" href="index.php?controller=AdminStBlog&token='.Tools::getAdminTokenLite('AdminStBlog').'">'.$this->trans('Blog articles', array(), 'Modules.Stblog.Admin').'</a>&nbsp;';
        $html ='
       	    <div class="panel">'.$this->trans('Quick access: ', array(), 'Modules.Stblog.Admin').$botton1.'</div>	
        ';
        return $html;
    }

	public function renderList()
	{        
        $id = Tools::getValue('id_st_blog_category', 0);
        
        $exists= Db::getInstance()->getValue('
        SELECT COUNT(0) FROM '._DB_PREFIX_.'st_blog_category c
        '. Shop::addSqlAssociation('st_blog_category','c').'
        WHERE c.id_st_blog_category = '.$id.'
        ');
        
        if (!$exists)
            $id = StBlogCategory::getTopCategory()->id;
        
        $categories_tree = StBlogCategory::getParentsCategories($id);
		$categories_tree = array_reverse($categories_tree);
		$this->tpl_list_vars['categories_tree'] = $categories_tree;
        
        return parent::renderList();
	}
    
    public function renderView()
	{
		$this->initToolbar();
		return $this->renderList();
	}
    
    public function initToolbar()
    {
        parent::initToolbar();
        if (Tools::isSubmit('id_st_blog_category'))
		{
			if (Validate::isLoadedObject($object = $this->loadObject(true)))
            {
                $back = self::$currentIndex.($object->id_parent?'&id_st_blog_category='.$object->id_parent:'').'&token='.$this->token;
    			$this->toolbar_btn['back'] = array(
    				'href' => $back,
    				'desc' => $this->trans('Back to list', array(), 'Modules.Stblog.Admin')
    			);    
            }
		}
        if (empty($this->dispaly))
        {
            $this->toolbar_btn['new'] = array(
    				'href' => self::$currentIndex.'&add'.$this->table.'&id_parent='.(int)Tools::getValue('id_st_blog_category',0).'&token='.$this->token,
    				'desc' => $this->trans('Add New', array(), 'Modules.Stblog.Admin')
    	    );
    	    $this->toolbar_btn['edit'] = array(
                'href' => self::$currentIndex.'&id_st_blog_category='.Tools::getValue('id_st_blog_category', 1).'&update'.$this->table.'&token='.$this->token,
                'desc' => $this->trans('Edit category', array(), 'Modules.Stblog.Admin')
            );
        }
    }

	/**
	 * Modifying initial getList method to display position feature (drag and drop)
	 */
	public function getList($id_lang, $order_by = null, $order_way = null, $start = 0, $limit = null, $id_lang_shop = false)
	{
		parent::getList($id_lang, $order_by, $order_way, $start, $limit, $id_lang_shop);
	}

	public function postProcess()
	{
		$this->tabAccess = Profile::getProfileAccess($this->context->employee->id_profile, $this->id);
		if (Tools::isSubmit('submitAdd'.$this->table) || Tools::isSubmit('submitAdd'.$this->table.'AndStay'))
		{
			$this->action = 'save';
            
            if (($id_parent = Tools::getValue('id_parent')) === false)
            {
                $root_category = StBlogCategory::getTopCategory();
                $_POST['id_parent'] = (int)$root_category->id;
            } else
                $_POST['id_parent'] = (int)$id_parent;
            
			if ($id_st_blog_category = (int)Tools::getValue('id_st_blog_category'))
			{
				if($id_st_blog_category==1)
					$_POST['id_parent'] = 0;
				$this->id_object = $id_st_blog_category;
				if (!StBlogCategory::checkBeforeMove($id_st_blog_category, (int)Tools::getValue('id_parent')))
				{
					$this->errors[] = Tools::displayError('The blog parent category cannot be moved here.');
                    $this->redirect_after  = self::$currentIndex.'&update'.$this->table.'&id_st_blog_category='.(int)$id_st_blog_category.'&token='.Tools::getValue('token');
					return false;
				}
			}
            $cnf = Tools::getValue('id_st_blog_category') ? 4 : 3;
            $object = parent::postProcess();
            if ($object !== false)
                if (Tools::isSubmit('submitAdd'.$this->table.'AndStay'))
                    $this->redirect_after  = self::$currentIndex.'&conf='.$cnf.'&update'.$this->table.'&id_st_blog_category='.(int)$object->id.'&token='.Tools::getValue('token');
               else
                    Tools::redirectAdmin(self::$currentIndex.'&conf='.$cnf.'&id_st_blog_category='.($object->id_parent?(int)$object->id_parent:(int)$object->id).'&token='.Tools::getValue('token'));
            return $object;
		}
		/* Change object statuts (active, inactive) */
		elseif (Tools::isSubmit('statusst_blog_category') && Tools::getValue($this->identifier))
		{
			if ($this->tabAccess['edit'] === '1')
			{
				if (Validate::isLoadedObject($object = $this->loadObject()))
				{
					if ($object->toggleStatus())
					{
						$identifier = ((int)$object->id_parent ? '&id_st_blog_category='.(int)$object->id_parent : '');
						Tools::redirectAdmin(self::$currentIndex.'&conf=5'.$identifier.'&token='.Tools::getValue('token'));
					}
					else
						$this->errors[] = Tools::displayError('An error occurred while updating the status.');
				}
				else
					$this->errors[] = Tools::displayError('An error occurred while updating the status for an object.')
						.' <b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
			}
			else
				$this->errors[] = Tools::displayError('You do not have permission to edit this.');
		}
		/* Delete object */
		elseif (Tools::isSubmit('delete'.$this->table))
		{
			if ($this->tabAccess['delete'] === '1')
			{
				if (Validate::isLoadedObject($object = $this->loadObject()))
				{
					// check if request at least one object with noZeroObject
					if (isset($object->noZeroObject) && count($taxes = call_user_func(array($this->className, $object->noZeroObject))) <= 1)
						$this->errors[] = Tools::displayError('You need at least one object.')
							.' <b>'.$this->table.'</b><br />'.Tools::displayError('You cannot delete all of the items.');
					else
					{
                        $identifier = ((int)$object->id_parent ? '&'.$this->identifier.'='.(int)$object->id_parent : '');
						if ($this->deleted)
						{
							$object->deleted = 1;
							if ($object->update())
								Tools::redirectAdmin(self::$currentIndex.'&conf=1&token='.Tools::getValue('token').$identifier);
						}
						elseif ($object->delete())
							Tools::redirectAdmin(self::$currentIndex.'&conf=1&token='.Tools::getValue('token').$identifier);
						$this->errors[] = Tools::displayError('An error occurred during deletion.');
					}
				}
				else
					$this->errors[] = Tools::displayError('An error occurred while deleting the object.')
						.' <b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
			}
			else
				$this->errors[] = Tools::displayError('You do not have permission to delete this.');
		}
		elseif (Tools::isSubmit('position'))
		{
			$object = new StBlogCategory((int)Tools::getValue($this->identifier, Tools::getValue('id_st_blog_category_to_move', 1)));
			if ($this->tabAccess['edit'] !== '1')
				$this->errors[] = Tools::displayError('You do not have permission to edit this.');
			elseif (!Validate::isLoadedObject($object))
				$this->errors[] = Tools::displayError('An error occurred while updating the status for an object.')
					.' <b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
			elseif (!$object->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position')))
				$this->errors[] = Tools::displayError('Failed to update the position.');
			else
			{
				$identifier = ((int)$object->id_parent ? '&'.$this->identifier.'='.(int)$object->id_parent : '');
				$token = Tools::getAdminTokenLite('AdminStBlogCategory');
				Tools::redirectAdmin(
					self::$currentIndex.'&'.$this->table.'Orderby=position&'.$this->table.'Orderway=asc&conf=5'.$identifier.'&token='.$token
				);
			}
		}
		/* Delete multiple objects */
		elseif (Tools::getValue('submitDel'.$this->table) || Tools::getValue('submitBulkdelete'.$this->table))
		{
			if ($this->tabAccess['delete'] === '1')
			{
				if (Tools::isSubmit($this->table.'Box'))
				{
					$blog_category = new StBlogCategory();
					$result = true;
					$result = $blog_category->deleteSelection(Tools::getValue($this->table.'Box'));
					if ($result)
					{
						$blog_category->cleanPositions((int)Tools::getValue('id_st_blog_category'));
						$token = Tools::getAdminTokenLite('AdminStBlogCategory');
						Tools::redirectAdmin(self::$currentIndex.'&conf=2&token='.$token.'&id_st_blog_category='.(int)Tools::getValue('id_st_blog_category'));
					}
					$this->errors[] = Tools::displayError('An error occurred while deleting this selection.');

				}
				else
					$this->errors[] = Tools::displayError('You must select at least one element to delete.');
			}
			else
				$this->errors[] = Tools::displayError('You do not have permission to delete this.');
		}
		parent::postProcess();
	}

	public function renderForm()
	{
		$this->display = 'edit';
		$this->initToolbar();
		if (!$this->loadObject(true))
			return;
        
        $root_category = StBlogCategory::getTopCategory();
        $selected_cat = array($this->object->id_parent > 0 
            ? (int)$this->object->id_parent : 
                (Tools::getValue('id_parent')>0 ? Tools::getValue('id_parent')
                    : $root_category->id));
        $disabled_categories = array();
        if ($this->object->id)
        {
            $disabled_categories[] = $this->object->id;
            $this->object->recursiveGetSubCategoryId($disabled_categories, $this->object->id);
        }
        $tree = new HelperTreeCategories('categories-tree');
		$tree->setSelectedCategories($selected_cat)
            ->setInputName('id_parent')
            ->setDisabledCategories($disabled_categories)
            ->setData(StBlogCategory::getNestedCategories($root_category->id));

		$this->fields_form = array(
			'legend' => array(
				'title' => $this->trans('Blog Category', array(), 'Modules.Stblog.Admin'),
				'icon' => 'icon-tags',
			),
			'input' => array(
				array(
					'type' => 'text',
					'label' => $this->trans('Name:', array(), 'Modules.Stblog.Admin'),
					'name' => 'name',
					'required' => true,
					'lang' => true,
					'class' => 'copy2friendlyUrl',
					'hint' => $this->trans('Invalid characters:', array(), 'Modules.Stblog.Admin').' <>;=#{}',
				),
				array(
					'type' => 'switch',
					'label' => $this->trans('Displayed:', array(), 'Modules.Stblog.Admin'),
					'name' => 'active',
					'required' => false,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->trans('Enabled', array(), 'Modules.Stblog.Admin'),
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->trans('Disabled', array(), 'Modules.Stblog.Admin'),
						)
					),
				),
				// custom template
				array(
					'type' => 'blog_cateogroes',
                    'name' => 'id_parent',
					'label' => $this->trans('Parent category:', array(), 'Modules.Stblog.Admin'),
					'html' => $tree->render()
				),
				array(
					'type' => 'textarea',
					'label' => $this->trans('Description:', array(), 'Modules.Stblog.Admin'),
					'name' => 'description',
					'lang' => true,
					'rows' => 5,
					'cols' => 40,
					'hint' => $this->trans('Invalid characters:', array(), 'Modules.Stblog.Admin').' <>;=#{}',
				),
				array(
					'type' => 'text',
					'label' => $this->trans('Meta title:', array(), 'Modules.Stblog.Admin'),
					'name' => 'meta_title',
					'lang' => true,
					'hint' => $this->trans('Invalid characters:', array(), 'Modules.Stblog.Admin').' <>;=#{}',
				),
				array(
					'type' => 'text',
					'label' => $this->trans('Meta description:', array(), 'Modules.Stblog.Admin'),
					'name' => 'meta_description',
					'lang' => true,
					'hint' => $this->trans('Invalid characters:', array(), 'Modules.Stblog.Admin').' <>;=#{}',
				),
				array(
					'type' => 'text',
					'label' => $this->trans('Meta keywords:', array(), 'Modules.Stblog.Admin'),
					'name' => 'meta_keywords',
					'lang' => true,
					'hint' => $this->trans('Invalid characters:', array(), 'Modules.Stblog.Admin').' <>;=#{}',
				),
				array(
					'type' => 'text',
					'label' => $this->trans('Friendly URL:', array(), 'Modules.Stblog.Admin'),
					'name' => 'link_rewrite',
					'required' => true,
					'lang' => true,
					'hint' => $this->trans('Only letters and the minus (-) character are allowed.', array(), 'Modules.Stblog.Admin'),
				),
			),
            'buttons' => array(
                array(
    				'title' => $this->trans('Save all', array(), 'Admin.Theme.Transformer'),
                    'class' => 'btn btn-default pull-right',
                    'icon'  => 'process-icon-save',
    				'type' => 'submit'
                )
			),
			'submit' => array(
				'title' => $this->trans('Save and stay', array(), 'Admin.Actions'),
				'stay' => true
			),
		);
        if (Shop::isFeatureActive())
			$this->fields_form['input'][] = array(
				'type' => 'shop',
				'label' => $this->trans('Shop association:', array(), 'Modules.Stblog.Admin'),
				'name' => 'checkBoxShopAsso',
			);
        $this->fields_form['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.self::$currentIndex.'&id_st_blog_category='.($this->object->id_parent ? $this->object->id_parent : Tools::getValue('id_parent', 0)).'&token='.Tools::getValue('token').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
		$this->tpl_form_vars['PS_ALLOW_ACCENTED_CHARS_URL'] = (int)Configuration::get('PS_ALLOW_ACCENTED_CHARS_URL');
        $this->tpl_form_vars['ps_force_friendly_blog'] = true;

		return parent::renderForm();
	}
          
    public function ajaxProcessGetCategoryChildren()
    {
    	$children_categories = StBLogCategory::getChildrenWithNbSelectedSubCat(Tools::getValue('id_category_parent'), Tools::getValue('selectedCat'), Context::getContext()->language->id);
    	die(Tools::jsonEncode($children_categories));
    }
    
   	public function ajaxProcessUpdatePositions()
	{
		if ($this->tabAccess['edit'] === '1')
		{
			$id_category = (int)Tools::getValue('id');
			$way = (int)Tools::getValue('way');
			$positions = Tools::getValue('st_blog_category');
			if (is_array($positions))
				foreach ($positions as $key => $value)
				{
					$pos = explode('_', $value);
					if ((isset($pos[1]) && isset($pos[2])) && ($pos[2] == $id_category))
					{
						$position = $key;
						break;
					}
				}
			$category = new StBlogCategory($id_category);
			if (Validate::isLoadedObject($category))
			{
				if (isset($position) && $category->updatePosition($way, $position))
					die('ok position '.(int)$position.' for blog category '.(int)$pos[2]."\r\n");
				else
					die('{"hasError" : true, "errors" : "Can not update blog category position"}');
			}
			else
				die('{"hasError" : true, "errors" : "This blog category can not be loaded"}');
		}
	}
}
