<?php
class FormElement9 extends StEasyContent
{
    public function initFormElement()
    {
        $id_st_easy_content_element = Tools::getValue('id_st_easy_content_element');
        if (!$id_st_easy_content_element && !$this->id_st_easy_content_column) {
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
        }
        $easycontent_element = new StEasyContentElementClass($id_st_easy_content_element);

        $cms_arr = array();
		$this->getCMSOptions($cms_arr, 0, 1, $this->context->language->id);
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('General settings', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('Display on:', array(), 'Admin.Theme.Transformer'),
					'name' => 'st_location',
					'options' => array(
						'query' => self::$cookie_location,
        				'id' => 'id',
        				'name' => 'name'
					)
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('Accept button:', array(), 'Modules.Stsasycontent.Admin'),
					'name' => 'st_accept_button',
					'lang' => true,
					'size' => 64,
				),
                array(
					'type' => 'text',
					'label' => $this->getTranslator()->trans('More info button:', array(), 'Modules.Stsasycontent.Admin'),
					'name' => 'st_more_info',
					'lang' => true,
					'size' => 64,
				),
                array(
					'type' => 'select',
					'label' => $this->getTranslator()->trans('More info link:', array(), 'Modules.Stsasycontent.Admin'),
					'name' => 'st_more_info_link',
					'options' => array(
						'query' => $cms_arr,
        				'id' => 'id',
        				'name' => 'name'
					)
				),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_top_padding',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_bottom_padding',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),   
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Hide on mobile:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_hide_on_mobile',
                    'default_value' => 0,
                    'validation' => 'isUnsignedInt',
                    'values' => array(
                        array(
                            'id' => 'hide_on_mobile_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Hide on mobile (screen width < 768px)', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_on_mobile_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Hide on PC (screen width > 768px)', array(), 'Admin.Theme.Transformer')),
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
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to show this box:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_show_box',
                    'default_value' => 0,
                    'is_bool' => true,
                    'validation' => 'isUnsignedInt',
                    'values' => array(
                        array(
                            'id' => 'show_box_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('At all time with a do not show option', array(), 'Modules.Stsasycontent.Admin')),
                        array(
                            'id' => 'show_box_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('At all time', array(), 'Modules.Stsasycontent.Admin')),
                        array(
                            'id' => 'show_box_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('First time only', array(), 'Modules.Stsasycontent.Admin')),
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Delay:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_delay',
                    'default_value' => 2,
                    'class' => 'fixed-width-sm',  
                    'suffix' => 's',
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->getTranslator()->trans('Content:', array(), 'Admin.Theme.Transformer'),
                    'lang' => true,
                    'name' => 'st_content',
                    'cols' => 40,
                    'rows' => 10,
                    'autoload_rte' => true,
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
                'title' => $this->getTranslator()->trans('Color settings', array(), 'Admin.Theme.Transformer'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_text_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ), 
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_text_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Block broder color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),  

                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Overlay color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_bg_hover_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Overlay opacity:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_bg_opacity_nohover',
                    'validation' => 'isFloat',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Overlay opacity when mouseover:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_bg_opacity',
                    'validation' => 'isFloat',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_button_color',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button background color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_button_bg',
                    'size' => 33,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Button font size:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_button_font_size',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),  
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Text font size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_text_font_size',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),  
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('H-shadow:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_h_shadow',
                    'validation' => 'isInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('The position of the horizontal shadow. Negative values are allowed.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('V-shadow:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_v_shadow',
                    'validation' => 'isInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('The position of the vertical shadow. Negative values are allowed.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Shadow color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_shadow_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Shadow opacity:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_shadow_opacity',
                    'validation' => 'isFloat',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Modules.Stsasycontent.Admin'),
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
        
        $this->fields_form[0]['form']['input'][] = 
        $this->fields_form[1]['form']['input'][] = array(
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
        $query_string = '&id_st_easy_content_column='.$this->id_st_easy_content_column.'&viewsteasycontentcolumn&element='.$element;
        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules'));
    }
}