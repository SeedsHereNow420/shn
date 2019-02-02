<?php
class FormElement11 extends StEasyContent
{
    public function initFormElement()
    {
        $id_st_easy_content_element = Tools::getValue('id_st_easy_content_element');
        if (!$id_st_easy_content_element && !$this->id_st_easy_content_column) {
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
        }
        $easycontent_element = new StEasyContentElementClass($id_st_easy_content_element);
        
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans(($id_st_easy_content_element?'Edit':'Create').' an Element:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs'                
            ),
            'input' => array(
                'predefinedtempaltes' => array(
                    'type' => 'predefinedtempaltes',
                    'label' => '',
                    'col' => 12,
                    'name' => 'st_el_divider',
                    'default_value' => '1_1',
                    'image_path' => $this->_path,
                    'values' => array(
                        1 => array(1,2),
                        ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->getTranslator()->trans('Text:', array(), 'Admin.Theme.Transformer'),
                    'lang' => true,
                    'name' => 'st_text',
                    'cols' => 40,
                    'rows' => 10,
                    'validation' => 'isAnything',
                    'desc' => array(
                            $this->getTranslator()->trans('HTML code supported.', array(), 'Modules.Stsasycontent.Admin'),
                            $this->getTranslator()->trans('Use code like this to add icons', array(), 'Modules.Stsasycontent.Admin').'&lt;i class="fto-glyph"&gt;&lt;/i&gt;',
                        ),
                ),
                array(
                    'type' => 'fontello_list',
                    'label' => $this->getTranslator()->trans('Click here to see all available icons:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'icon_class',
                    'values' => $this->get_fontello(),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Text size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_text_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Border size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_border_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Border:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_border_style',
                    'values' => array(
                        array(
                            'id' => 'text_align_left',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Solid', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_center',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Dotted', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_right',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Dashed', array(), 'Admin.Theme.Transformer')),
                    ),
                    'default_value' => 0,
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Margin top:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_margin_top',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Margin bottom:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_margin_bottom',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_text_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_border_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Text alignment:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_text_align',
                    'values' => array(
                        array(
                            'id' => 'st_text_align_center',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_text_align_left',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_text_align_right',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
                    ),
                    'default_value' => 0,
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_width',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('If the value is 0 or empty, this divider will be full width.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Hide on mobile:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_hide_on_mobile',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'st_el_hide_on_mobile_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_el_hide_on_mobile_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Hide on mobile (screen width < 992px)', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_el_hide_on_mobile_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Hide on PC (screen width > 992px)', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
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
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Position:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm',
                    'validation' => 'isUnsignedInt',                
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
            'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true
			),
        );
        
        
        if (!$easycontent_element->id) {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_easy_content_column');
            $easycontent_element->id_st_easy_content_column = $this->id_st_easy_content_column;
            if ($element = Tools::getValue('element')) {
                $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'element');
                $easycontent_element->element = $element;
            }
            
            $query_string = '&id_st_easy_content_column='.$this->id_st_easy_content_column.'&viewsteasycontentcolumn';
        } else {
            $query_string = '&id_st_easy_content_column='.$easycontent_element->id_st_easy_content_column.'&viewsteasycontentcolumn';
        }
        
        $this->fields_form[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        
        // Fetch settings to object.
        if ($easycontent_element->id) {
            $this->LoadSettingsToObject($easycontent_element, 2);    
        }
        
        return $this->loadFormHelper('st_easy_content_element', 'element', $easycontent_element);
    }
}