<?php
class FormElement8 extends StEasyContent
{
    public function initFormElement()
    {
        $id_st_easy_content_element = Tools::getValue('id_st_easy_content_element');
        if (!$id_st_easy_content_element && !$this->id_st_easy_content_column) {
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
        }
        $easycontent_element = new StEasyContentElementClass($id_st_easy_content_element);

        $variants = array();
        $variants_default = ['400'=>'400', '700'=>'700', 'italic'=>'italic', '700italic'=>'700italic'];
        $google_font_link = '';
        if($easycontent_element->id){
            $settings = StEasyContentSettingClass::getSetting($easycontent_element->id, 2, true);
            if(isset($settings['st_header_font_select']) && $settings['st_header_font_select'])
            {
                $temp = $this->googleFonts[str_replace(' ', '_', $settings['st_header_font_select'])]['variants'];
                foreach ($temp as $v) {
                    $variants_default[$v] = $v;
                }
                //this can be improved by moving it to the head of BO
                $google_font_link .= '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.str_replace(' ', '+', $settings['st_header_font_select']).':'.$settings['st_header_font_weight'].'" />';
            }
        }
        foreach($variants_default AS $value) {
            $variants[] = array('id'=>$value,'name'=>$value);
        }
        array_unshift($variants, array('id'=>'','name'=>'--'));
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
                    'name' => 'st_el_textboxes',
                    'default_value' => '1_1',
                    'image_path' => $this->_path,
                    'values' => array(
                        1 => array(1),
                        2 => array(1),
                        3 => array(1),
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
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Sub header:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_sub_header',
                    'lang' => true,
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->getTranslator()->trans('Text:', array(), 'Admin.Theme.Transformer'),
                    'lang' => true,
                    'name' => 'st_el_text',
                    'cols' => 40,
                    'rows' => 10,
                    'autoload_rte' => true,
                    'validation' => 'isAnything',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Style text:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_text_style',
                    'values' => array(
                        array(
                            'id' => 'st_el_text_style_none',
                            'value' => '',
                            'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
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
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Additional info:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_info',
                    'lang' => true,
                    'validation' => 'isGenericName',
                    'desc' => $this->getTranslator()->trans('This can be used to display auther name in testimonal boxes.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Stars:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_stars',
                    'options' => array(
                        'query' => array(
                            array('id' => 1, 'name'=> 1),
                            array('id' => 2, 'name'=> 2),
                            array('id' => 3, 'name'=> 3),
                            array('id' => 4, 'name'=> 4),
                            array('id' => 5, 'name'=> 5),
                            ),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => 0,
                        ),
                    ),
                    'desc' => $this->getTranslator()->trans('This is used to display stars in testimonal boxes.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Button url:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_url',
                    'lang' => true,
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('button text:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_button',
                    'lang' => true,
                    'validation' => 'isGenericName',
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
        
        $this->fields_form[5]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Image settings:', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs',                
            ),
            'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Image border color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_image_border_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Image border size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_image_border_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Image border radius:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_image_border_radius',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => array(
                            $this->getTranslator()->trans('Set a large value for this field to have a round image.', array(), 'Modules.Stsasycontent.Admin'),
                            $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                            ),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Image width:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_image_width',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => array(
                            $this->getTranslator()->trans('Leave it empty to use the default 60px.', array(), 'Modules.Stsasycontent.Admin'),
                            ),
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

        $this->fields_form[6]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Text settings:', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'                
            ),
            'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Header color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_header_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Header font size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_header_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => 0,
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Sub header color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_sub_header_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Sub header font size:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_sub_header_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => 0,
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Google fonts:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_header_font_select',
                    'onchange' => 'handle_font_change(this);',
                    'class' => 'st_google_font_select',
                    'options' => array(
                        'query' => $this->fontOptions(),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer'),
                        ),
                    ),
                    'default_value' => '',
                    'validation' => 'isGenericName',
                ),
                'font_text'=>array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Font weight:', array(), 'Admin.Theme.Transformer'),
                    'onchange' => 'handle_font_style(this);',
                    'class' => 'st_google_font_weight',
                    'name' => 'st_header_font_weight',
                    'options' => array(
                        'query' => $variants,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'default_value' => '',
                    'validation' => 'isAnything',
                    'desc' => '<p id="google_font_example" class="fontshow">Example Title</p>'.$google_font_link,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Star color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_star_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Highlight star color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_star_light_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
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
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Text font size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_text_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => 0,
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Additional info color:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_info_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Additional font size:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_info_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => 0,
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Apply the same font as header to text:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_text_font',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')
                        )
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_link_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_link_hover_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                /*array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_link_bg',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Button hover background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_link_hover_bg',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),*/
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
        $this->fields_form[7]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Block settings:', array(), 'Admin.Theme.Transformer'),
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
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_item_bg',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_item_border_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Border size:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_item_border_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => 0,
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Modules.Stsasycontent.Admin'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Border radius:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_item_border_radius',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => array(
                            $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
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
        
        $this->fields_form[0]['form']['input'][] = 
        $this->fields_form[5]['form']['input'][] = 
        $this->fields_form[6]['form']['input'][] = 
        $this->fields_form[7]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        $languages = Language::getLanguages(true);
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        foreach ($languages as $lang)
        {
            $this->fields_form[0]['form']['input']['st_image_'.$lang['id_lang']] = array(
                    'type' => 'file',
                    'label' => $this->getTranslator()->trans('Image', array(), 'Admin.Theme.Transformer').' - '.$lang['name'].($default_lang == $lang['id_lang'] ? '('.$this->gettranslator()->trans('default language', array(), 'Admin.Theme.Transformer').')' : '').':',
                    'name' => 'st_image_'.$lang['id_lang'],
                    // 'required'  => ($default_lang == $lang['id_lang']),
                    'desc' => $this->getTranslator()->trans('This module would not change image names for seo purpose, so ensure the image you are going to upload has an unique name.', array(), 'Modules.Stsasycontent.Admin').'<br/>',
                );
        }
        // Fetch settings to object.
        if ($easycontent_element->id) {
            $this->LoadSettingsToObject($easycontent_element, 2);    
        }
        
        $this->loadImageFieldsDesc($this->fields_form[0]['form']['input'], $easycontent_element);

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
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('How to display element items:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_grid',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'grid_slider',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Slider', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'grid_grid',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->getTranslator()->trans('The number of columns:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_per',
                    'values' => array(
                            'maximum' => 12,
                            'medias' => array('fw'=>'','xxl'=>4,'xl'=>3,'lg'=>3,'md'=>2,'sm'=>2,'xs'=>1),
                        ),
                    'desc' => $this->getTranslator()->trans('7, 9 and 11 can not be used in grid view, they will be automatically decreased to 6, 8 and 10. Set a value for the "Full width" drop down list to make this module fullwidth in the fullwidth* hooks, but the value of "Full width" drop down menu would not take effect in grid view.', array(), 'Admin.Theme.Transformer'),
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Spacing between items:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_spacing_between',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Top padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_element_top_padding',
                    'default_value' => '',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Bottom padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_element_bottom_padding',
                    'default_value' => '',
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
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Slider settings:', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs',                
            ),
            'input' => array(
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Autoplay:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_slideshow',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'st_slideshow_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_slideshow_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Once, has no effect in loop mode', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_slideshow_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Auto height:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_auto_height',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'auto_height_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'auto_height_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_s_speed',
                    'default_value' => 7000,
                    'desc' => $this->getTranslator()->trans('The period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Modules.Stsasycontent.Admin'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Transition period:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_a_speed',
                    'default_value' => 400,
                    'desc' => $this->getTranslator()->trans('The period, in milliseconds, of the transition effect.', array(), 'Admin.Theme.Transformer'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Stop autoplay after interaction:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_pause',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'st_pause_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_pause_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    'desc' => $this->getTranslator()->trans('Autoplay will not be disabled after user interactions (swipes). Turn this option off, this slider will be restarted every time after interaction', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Loop:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_rewind_nav',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'st_rewind_nav_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_rewind_nav_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Scroll:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_move',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'st_move_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Scroll per page', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_move_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Scroll per item', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_move_free',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Free mode', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Display "next" and "prev" buttons:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_direction_nav',
                    'default_value' => 5,
                    'values' => array(
                        array(
                            'id' => 'direction_nav_none',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
                        /*array(
                            'id' => 'direction_nav_top-right',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Top right-hand side', array(), 'Admin.Theme.Transformer')),*/
                        array(
                            'id' => 'direction_nav_full_height',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Full height', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_full_height_hover',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('Full height, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_square',
                            'value' => 4,
                            'label' =>$this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_square_hover',
                            'value' => 5,
                            'label' =>$this->getTranslator()->trans('Square, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_circle',
                            'value' => 6,
                            'label' =>$this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_circle_hover',
                            'value' => 7,
                            'label' =>$this->getTranslator()->trans('Circle, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_arrow',
                            'value' => 8,
                            'label' =>$this->getTranslator()->trans('Arrow', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'direction_nav_arrow_hover',
                            'value' => 9,
                            'label' =>$this->getTranslator()->trans('Arrow, show out when mouseover', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Show navigation:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_control_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'st_control_nav_1',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Bullets', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_control_nav_4',
                            'value' => 4,
                            'label' => $this->getTranslator()->trans('Round', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_control_nav_2',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Number', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_control_nav_3',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('Progress', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_control_nav_0',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),

                    ),
                    'validation' => 'isUnsignedInt',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Prev/next color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_direction_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Prev/next hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_direction_color_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Prev/next disabled color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_direction_color_disabled',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Prev/next background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_direction_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Prev/next hover background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_direction_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Prev/next disabled background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_direction_disabled_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Navigation color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_pag_nav_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),  
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Navigation active color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_pag_nav_bg_hover',
                    'class' => 'color',
                    'size' => 20,
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