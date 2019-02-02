<?php
class FormElement10 extends StEasyContent
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
                array(
                    'type' => 'fontello',
                    'label' => $this->getTranslator()->trans('Icon:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_icon',
                    'values' => $this->get_fontello(),
                    'validation' => 'isGenericName',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Header:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_header',
                    'lang' => true,
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Link url:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_url',
                    'lang' => true,
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_hover_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_bg',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Hover background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_hover_bg',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Icon border color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_border_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
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
    
    public function initFormElementSetting()
    {
        $element = Tools::getValue('element');
        $easycontent_column = new StEasyContentColumnClass($this->id_st_easy_content_column);
        if (!$element || !$easycontent_column->id) {
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
        }
        /*$predefinedstyle = Tools::getValue('predefinedstyle');
        if($predefinedstyle && array_key_exists($predefinedstyle, $this->_predefined_style))
        {
            $this->ApplyPredefinedSettings($easycontent_column, $this->_predefined_style[$predefinedstyle], 1);
        }*/
        
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Icon settings:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs',                
            ),
            'input' => array(
                'predefinedtempaltes' => array(
                    'type' => 'predefinedtempaltes',
                    'label' => '',
                    'col' => 12,
                    'name' => 'st_el_social',
                    'default_value' => '1_1',
                    'image_path' => $this->_path,
                    'values' => array(
                        1 => array(1,2,3),
                        2 => array(1,2,3),
                        ),
                    'validation' => 'isUnsignedInt',
                    'desc' => array(
                        $this->getTranslator()->trans('You can still make changes to have what you want after choosing a predefined style.', array(), 'Modules.Stsasycontent.Admin'),
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Spacing between items:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_icon_spacing',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon size:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_icon_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => 0,
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Alignment:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_align',
                    'values' => array(
                        array(
                            'id' => 'text_align_left',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_center',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'text_align_right',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
                    ),
                    'default_value' => 1,
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Text alignment on small screen devices (screen width < 992px):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_mobile_align',
                    'values' => array(
                        array(
                            'id' => 'mobile_text_align_default',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('The same as on large screen devices', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'mobile_text_align_left',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'mobile_text_align_center',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'mobile_text_align_right',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
                    ),
                    'default_value' => 0,
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_hover_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_bg',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Hover background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_hover_bg',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Icon border color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_icon_border_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon border size:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_icon_border_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon border radius:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_icon_border_radius',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => array(
                            $this->getTranslator()->trans('Set a large value for this field to have a round icon.', array(), 'Modules.Stsasycontent.Admin'),
                            $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                            ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon block size:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_icon_block',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => 0,
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
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

        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Text settings:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs'                
            ),
            'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('text color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_header_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_header_hover_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Text font size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_header_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => 0,
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
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
        $this->fields_form[2]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('General settings:', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs',                
            ),
            'input' => array(
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Open in a new window:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_new_window',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'new_window_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'new_window_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_element_top_padding',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_element_bottom_padding',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_element_bg',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
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

        $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'element');           
        $query_string = '&id_st_easy_content_column='.$this->id_st_easy_content_column.'&viewsteasycontentcolumn&element='.$element;
        
        $this->fields_form[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        if (!$easycontent_column->element) {
            $easycontent_column->element = $element;
        }
        
        // Fetch settings to object.
        $this->LoadSettingsToObject($easycontent_column, 1);
        
        return $this->loadFormHelper('st_easy_content_column', 'elementsetting', $easycontent_column);
    }
}