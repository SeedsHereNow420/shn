<?php
class FormElement2 extends StEasyContent
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
                'icon' => 'icon-cogs',                
            ),
            'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_width',
                    'required' => true,
                    'default_value' => 12,
                    'options' => array(
                        'query' => self::$_width,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isGenericName',
                ),
                'predefinedtempaltes' => array(
                    'type' => 'predefinedtempaltes',
                    'label' => '',
                    'col' => 12,
                    'name' => 'st_el_text_block',
                    'default_value' => '1_1',
                    'image_path' => $this->_path,
                    'values' => array(
                        1 => array(1,2),
                        2 => array(1,2,3,4),
                        3 => array(1,2),
                        ),
                    'validation' => 'isUnsignedInt',
                    'desc' => array(
                        $this->getTranslator()->trans('You can still make changes to have what you want after choosing a predefined style.', array(), 'Modules.Stsasycontent.Admin'),
                        ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Header:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_header',
                    'lang' => true,
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->getTranslator()->trans('Content:', array(), 'Admin.Theme.Transformer'),
                    'lang' => true,
                    'name' => 'st_el_text',
                    'cols' => 40,
                    'rows' => 10,
                    'autoload_rte' => true,
                    'required' => false,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Content font size:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_text_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Style content:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_text_style',
                    'values' => array(
                        array(
                            'id' => 'st_el_text_style_none',
                            'value' => '',
                            'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_el_text_style_dropcap',
                            'value' => 'dropcap',
                            'label' => $this->getTranslator()->trans('Drop cap, make sure the first html tag is p', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_el_text_style_blockquote_1',
                            'value' => 'blockquote',
                            'label' => $this->getTranslator()->trans('Blockquote 1', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_el_text_style_blockquote_2',
                            'value' => 'blockquote_1',
                            'label' => $this->getTranslator()->trans('Blockquote 2, make sure the first html tag is p.', array(), 'Admin.Theme.Transformer')),
                    ),
                    'default_value' => '',
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Drop cap color / blockquote border color / quotes color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_text_style_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Image column width for template 2:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_image_block_width',
                    'default_value' => 4,
                    'options' => array(
                        'query' => self::$_width,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isGenericName',
                    'desc' => $this->getTranslator()->trans('Set it 0 to show text only, set it to 12 to show image only.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Image:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_image',
                    'desc' => '',
                ),
                array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Lightbox image:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_image_big',
                    'desc' => $this->getTranslator()->trans('This image will show in a lightbox when customers click one the image above.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Image hover effect:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_image_hover',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'st_image_hover_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('None', array(), 'Modules.Stbanner.Admin')
                        ),
                        array(
                            'id' => 'st_image_hover_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Fade', array(), 'Modules.Stbanner.Admin')
                        ),
                        array(
                            'id' => 'st_image_hover_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Scale up', array(), 'Modules.Stbanner.Admin')
                        ),
                    ),
                    'validation' => 'isUnsignedInt',
                ),  
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Image border color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_image_border_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Image border size:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_image_border_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Image border radius:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_image_border_radius',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value. Set a large value for this field to have round images.', array(), 'Modules.Stsasycontent.Admin'),
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
                            'label' => $this->getTranslator()->trans('Enabled', array(), 'Admin.Theme.Transformer'),
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer'),
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
                    'class'=> 'pull-right',
                ),
            ),
            'submit' => array(
				'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true,
			),
        );
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Header settings:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs',             
            ),
            'input' => array(
                 array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Header size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_title_font_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
                ), 
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Header color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_title_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Header bottom border height:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_title_bottom_border',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Header border color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_title_bottom_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Header border highlight color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_title_bottom_border_color_h',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Header:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_title_position',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'title_position_left',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Align left', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'title_position_center',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Align center', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'title_position_right',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Align right', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'title_position_none',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ),
            ),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right',
                ),
            ),
            'submit' => array(
                'title' => $this->getTranslator()->trans('Save and stay', array(), 'Admin.Actions'),
                'stay' => true,
            ),
        );
        $this->fields_form[2]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Color settings:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs',             
            ),
            'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_content_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_content_link',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_content_hover_link',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_content_bg',
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
                'stay' => true,
            ),
        );
        $this->fields_form[3]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Block settings:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs'                
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Text alignment:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_text_align',
                    'values' => array(
                        array(
                            'id' => 'text_align_default',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')),
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
                    'default_value' => 0,
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Text alignment on small screen devices (screen width < 992px):', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_mobile_text_align',
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
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Content Width:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_content_width',
                    'options' => array(
                        'query' => self::$text_width,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => '0',
                            'label' => $this->getTranslator()->trans('100%', array(), 'Modules.Stsasycontent.Admin')
                        )
                    ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_item_top_padding',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                    'validation' => 'isNullOrUnsignedId',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_item_bottom_padding',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                    'validation' => 'isNullOrUnsignedId',
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
        $this->fields_form[1]['form']['input'][] =
        $this->fields_form[2]['form']['input'][] =
        $this->fields_form[3]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        
        // Fetch settings to object.
        if ($easycontent_element->id) {
            $this->LoadSettingsToObject($easycontent_element, 2);    
            $this->loadImageFieldsDesc($this->fields_form[0]['form']['input'], $easycontent_element);
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
                'title' => $this->getTranslator()->trans('General settings:', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs',                
            ),
            'input' => array(
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
                    'label' => $this->getTranslator()->trans('Block Background:', array(), 'Modules.Stsasycontent.Admin'),
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