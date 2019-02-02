<?php
class FormColumn extends StEasyContent
{
    public function initFormColumn()
    {
        if (!($id_parent = Tools::getValue('id_parent')) && !$this->id_st_easy_content_column) {
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
        }
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans(($this->id_st_easy_content_column?'Edit':'Create').' a column:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs'                
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Name:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'name',
                    'class' => 'fixed-width-xxl',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'width',
                    'default_value' => 12,
                    'options' => array(
                        'query' => self::$_width,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'desc' => $this->getTranslator()->trans('If the sum of all column widths is larger than 1 in a row, then extra columns would not be displayed on the front office. For example, you have 4/12, 3/12, 4/12 and 5/12, then the last 5/12 would not be displayed.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'margin_top',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'margin_bottom',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 'px'
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Hide on mobile:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'hide_on_mobile',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'hide_on_mobile_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Hide on mobile (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Hide on PC (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Status:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'active',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                    
                ),
                array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Background image:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_image',
                    'desc' => '',
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
            /*'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),*/
        );
        
        $easycontent_column = new StEasyContentColumnClass($this->id_st_easy_content_column);
        
        if (!$easycontent_column->id && $id_parent) {
            $parent_column = new StEasyContentColumnClass($id_parent);
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_parent');
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_easy_content');
            $easycontent_column->id_parent = $id_parent;
            $easycontent_column->id_st_easy_content = $parent_column->id_st_easy_content;
            
            // Get grandpa to back.
            $grandpa = new StEasyContentColumnClass($id_parent);
        } else {
            // Get grandpa to back.
            $grandpa = new StEasyContentColumnClass($easycontent_column->id_parent);
        }
        
        if ($grandpa->id_parent) {
            $query_string = '&id_st_easy_content_column='.$grandpa->id_parent.'&viewsteasycontentcolumn';
        } else {
            $query_string = '&id_st_easy_content='.$grandpa->id_st_easy_content.'&viewsteasycontent';
        }
        
        $this->fields_form[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',
		);
        
        $this->loadImageFieldsDesc($this->fields_form[0]['form']['input'], $easycontent_column);
        
        return $this->loadFormHelper('st_easy_content_column', 'column', $easycontent_column);
    }
}