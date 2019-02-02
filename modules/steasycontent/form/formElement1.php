<?php
class FormElement1 extends StEasyContent
{
    /*private $_predefined_style = array();

    function __construct()
    {
        parent::__construct();
        $this->_predefined_style = array(
            1 => array(
                'st_icon_with_text_style' => 1,
                'st_icon_color' => '#fff',
                'st_icon_bg' => '#48C9B0',
            ),
            2 => array(
                'st_icon_with_text_style' => 2,
                'st_header_font_select' => 'Open Sans',
                'st_header_font_weight' => '700',
            ),
            3 => array(
                'st_icon_with_text_style' => 3,
                'st_icon_size' => '12',
            ),
            4 => array(
                'st_icon_with_text_style' => 4,
                'st_icon_border_radius' => '1000',
            ),
        );
    }*/
    
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
                    'des' => array(
                            $this->getTranslator()->trans('When the sum of element widths is larger than 1, extra elements will be display in a new row . For example, you have 5/12, 6/12, 3/12, because of the sum first 3 elemets widths is 14/12, unable to place them in the same row, so 5/12 and 6/12 will be in one row, 3/12 will be in another row.', array(), 'Modules.Stsasycontent.Admin'),
                        ),
                ),
                'predefinedtempaltes' => array(
                    'type' => 'predefinedtempaltes',
                    'label' => '',
                    'col' => 12,
                    'name' => 'st_el_icon_with_text',
                    'default_value' => '1_1',
                    'image_path' => $this->_path,
                    'values' => array(
                        1 => array(1),
                        2 => array(1,2,3,4),
                        3 => array(1,2),
                        4 => array(1),
                        ),
                    'validation' => 'isUnsignedInt',
                    'desc' => array(
                        $this->getTranslator()->trans('You can still make changes to have what you want after choosing a predefined style.', array(), 'Modules.Stsasycontent.Admin'),
                        ),
                ),
                //To do add a reset button here in future not now, but do not reset width and predefined template settings.
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
                    'validation' => 'isAnything',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Link url:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_url',
                    'lang' => true,
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('button text:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_el_button',
                    'lang' => true,
                    'validation' => 'isGenericName',
                ),
                /*array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Apply link to:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_el_be_a_link',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Whole block', array(), 'Modules.Stsasycontent.Admin')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Link itself', array(), 'Modules.Stsasycontent.Admin')
                        )
                    ),
                    'validation' => 'isUnsignedInt',
                ),*/
                
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
        
        $this->fields_form[5]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Icon settings:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs',                
            ),
            'input' => array(
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
                    'label' => $this->getTranslator()->trans('Icon border color:', array(), 'Modules.Stsasycontent.Admin'),
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
                    'label' => $this->getTranslator()->trans('Icon size:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_icon_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => 0,
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
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
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon top spacing:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_icon_top_margin',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Icon bottom spacing:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_icon_bottom_margin',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
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

        $this->fields_form[6]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Text settings:', array(), 'Modules.Stsasycontent.Admin'),
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
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Header hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_header_hover_color',
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
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Header bottom spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_header_bottom_margin',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Header fonts:', array(), 'Admin.Theme.Transformer'),
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
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Sub header bottom spacing:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_sub_header_bottom_margin',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Apply the same font as header to sub header:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_sub_header_font',
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
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Text bottom spacing:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_text_bottom_margin',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
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
                    'label' => $this->getTranslator()->trans('Link color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_link_color',
                    'size' => 33,
                    'default_value' => '',
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_link_hover_color',
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
        $this->fields_form[7]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Block settings:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs'                
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Text alignment:', array(), 'Modules.Stsasycontent.Admin'),
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
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Left and right padding:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_item_lr_padding',
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
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
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
                'title' => $this->getTranslator()->trans('General settings:', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs',                
            ),
            'input' => array(
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