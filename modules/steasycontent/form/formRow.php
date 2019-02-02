<?php
class FormRow extends StEasyContent
{
    public function initFormRow()
    {
        if (!$this->id_st_easy_content && !$this->id_st_easy_content_column) {
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
        }
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans(($this->id_st_easy_content_column?'Edit':'Create').' a row:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs'                
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Row name:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'name',
                    'class' => 'fixed-width-xxl',
                    'desc' => $this->getTranslator()->trans('Only as a reminder.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                'row_generater' => array(
                    'type' => 'row_generater',
                    'label' => '',
                    'name' => 'column',
                    'col' => 12,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'margin_top',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'margin_bottom',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'bg_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
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
        $query_string = '';
        if (!Tools::getIsset('row_edit')) {
            // Add top column
            if ($this->id_st_easy_content) {
                $easycontent_column->id_st_easy_content = $this->id_st_easy_content;
                $easycontent_column->id_parent = 0;
                $easycontent_column->id = 0;
                $query_string = '&id_st_easy_content='.$this->id_st_easy_content.'&viewsteasycontent';
            }
            // Add sub colum
            elseif($easycontent_column->id)
            {
                $id_st_easy_content = $easycontent_column->id_st_easy_content;
                $easycontent_column =  new StEasyContentColumnClass();
                $easycontent_column->id_parent = $this->id_st_easy_content_column;
                $easycontent_column->id_st_easy_content = $id_st_easy_content;
                $query_string = '&id_st_easy_content_column='.$this->id_st_easy_content_column.'&viewsteasycontentcolumn';
            }
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_parent');
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_easy_content');
        } else {
            // Remove row generater
            unset($this->fields_form[0]['form']['input']['row_generater']);
            if ($easycontent_column->id_parent) {
                $query_string = '&id_st_easy_content_column='.$easycontent_column->id_parent.'&viewsteasycontentcolumn';
            } else {
                $query_string = '&id_st_easy_content='.$easycontent_column->id_st_easy_content.'&viewsteasycontent';
            }
        }
        
        if ($this->id_st_easy_content_column && Tools::getIsset('row_edit')) {
            $this->fields_form[0]['form']['input'][] = array(
    			'type' => 'html',
                'id' => 'a_cancel',
    			'label' => '',
    			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
    		);    
        }
        
        $this->loadImageFieldsDesc($this->fields_form[0]['form']['input'], $easycontent_column);
        
        return $this->loadFormHelper('st_easy_content_column', 'row', $easycontent_column);
    }
}