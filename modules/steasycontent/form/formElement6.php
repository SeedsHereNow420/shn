<?php
class FormElement6 extends StEasyContent
{
    public function initFormElement()
    {
        $id_st_easy_content_element = Tools::getValue('id_st_easy_content_element');
        if (!$id_st_easy_content_element && !$this->id_st_easy_content_column) {
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
        }
        $easycontent_element = new StEasyContentElementClass($id_st_easy_content_element);

        $image_types_arr = array();
        $imagesTypes = ImageType::getImagesTypes('products');
        foreach ($imagesTypes as $k=>$imageType) {
            if(Tools::substr($imageType['name'],-3)=='_2x')
                continue;
            $image_types_arr[] = array('id' => $imageType['name'], 'name' => $imageType['name'].'('.$imageType['width'].'x'.$imageType['height'].')');
        }
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans(($id_st_easy_content_element?'Edit':'Create').' an Element:', array(), 'Modules.Stsasycontent.Admin'),
                'icon' => 'icon-cogs'                
            ),
            'input' => array(
                'ac_products' => array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Products:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'ac_products',
                    'autocomplete' => false,
                    'class' => 'fixed-width-xxl',
                    'desc' => '',
                ),
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
                        array(
                            'id' => 'grid_xiao',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Simple layout', array(), 'Admin.Theme.Transformer')),
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
                    'label' => $this->getTranslator()->trans('Spacing between products:', array(), 'Modules.Stsasycontent.Admin'),
                    'name' => 'st_spacing_between',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'default_value' => '',
                    'validation' => 'isNullOrUnsignedId',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Transformer'),
                ),
                'st_image_type'=>array(
                    'type' => 'select',
                    'label' => $this->getTranslator()->trans('Image type for products in Grid view and Slider:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_image_type',
                    'default_value' => 'home_default',
                    'options' => array(
                        'query' => $image_types_arr,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => '',
                            'label' => $this->getTranslator()->trans('--', array(), 'Admin.Theme.Transformer'),
                        ),
                    ),
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

        
        $this->fields_form[2]['form'] = array(
            'legend' => array(
                'title' => $this->getTranslator()->trans('Block settings:', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs'                
            ),
            'input' => array(
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
                'title' => $this->getTranslator()->trans('Slider settings:', array(), 'Admin.Theme.Transformer'),
                'icon' => 'icon-cogs',                
            ),
            'input' => array(
                array(
                    'type' => 'radio',
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
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_s_speed',
                    'default_value' => 7000,
                    'desc' => $this->getTranslator()->trans('The period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Admin.Theme.Transformer'),
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
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Lazy load:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_lazy',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'lazy_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'lazy_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isBool',
                    'desc' => $this->getTranslator()->trans('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.', array(), 'Admin.Theme.Transformer'),
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
                    'label' => $this->getTranslator()->trans('Display product short description:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_display_sd',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'st_display_sd_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_display_sd_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes, 220 characters', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'st_display_sd_full',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Yes, full short description', array(), 'Admin.Theme.Transformer')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
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
                    'label' => $this->getTranslator()->trans('Price color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_price_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Product name hover color:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_link_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Grid background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_grid_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Grid hover background:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_grid_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
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
                        array(
                            'id' => 'direction_nav_top-right',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Top right-hand side', array(), 'Admin.Theme.Transformer')),
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
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Hide "next" and "prev" buttons on small screen devices:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_hide_direction_nav_on_mob',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'hide_direction_nav_on_mob_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_direction_nav_on_mob_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'desc' => $this->gettranslator()->trans('Screen width < 992px.', array(), 'Admin.Theme.Transformer'),
                    'validation' => 'isBool',
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
                    'type' => 'switch',
                    'label' => $this->getTranslator()->trans('Hide navigation on small screen devices:', array(), 'Admin.Theme.Transformer'),
                    'name' => 'st_hide_control_nav_on_mob',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'hide_control_nav_on_mob_on',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                        array(
                            'id' => 'hide_control_nav_on_mob_off',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                    ),
                    'desc' => $this->gettranslator()->trans('Screen width < 992px.', array(), 'Admin.Theme.Transformer'),
                    'validation' => 'isBool',
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
                 
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Block title:', array(), 'Admin.Theme.Panda'),
                    'name' => 'st_title',
                    'lang' => true,
                    'validation' => 'isGenericName',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->getTranslator()->trans('Block title alignment:', array(), 'Admin.Theme.Panda'),
                    'name' => 'st_title_align',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'st_title_align_left',
                            'value' => 0,
                            'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Panda')),
                        array(
                            'id' => 'st_title_align_center',
                            'value' => 1,
                            'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Panda')),
                        array(
                            'id' => 'st_title_align_right',
                            'value' => 2,
                            'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Panda')),
                        /*array(
                            'id' => 'st_title_align_none',
                            'value' => 3,
                            'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Panda')),*/
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Title size:', array(), 'Admin.Theme.Panda'),
                    'name' => 'st_title_font_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Panda'),
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Panda'),
                    'name' => 'st_title_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Heading hover color:', array(), 'Admin.Theme.Panda'),
                    'name' => 'st_title_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'text',
                    'label' => $this->getTranslator()->trans('Title bottom border height:', array(), 'Admin.Theme.Panda'),
                    'name' => 'st_title_bottom_border',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Admin.Theme.Panda'),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Title border color:', array(), 'Admin.Theme.Panda'),
                    'name' => 'st_title_bottom_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'color',
                    'label' => $this->getTranslator()->trans('Title border highlight color:', array(), 'Admin.Theme.Panda'),
                    'name' => 'st_title_bottom_border_color_h',
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
        $this->fields_form[2]['form']['input'][] = 
        $this->fields_form[5]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.$query_string.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> '.$this->getTranslator()->trans('Back to list', array(), 'Admin.Theme.Transformer').'</a>',                  
		);
        
        // Fetch settings to object.
        $products_html = '';
        if ($easycontent_element->id) {
            $this->LoadSettingsToObject($easycontent_element, 2);
            if (isset($easycontent_element->st_id_product) && $easycontent_element->st_id_product) {
                foreach(explode(',', $easycontent_element->st_id_product) AS $id_product)
                {
                    if (!(int)$id_product) {
                        continue;
                    }
                    $product = new Product((int)$id_product, false, Context::getContext()->language->id);
                    if (!$product->id) {
                        continue;
                    }
                    $products_html .= '<li>'.$product->name.'['.$product->reference.']
                    <a href="javascript:;" class="del_product"><img src="../img/admin/delete.gif" /></a>
                    <input type="hidden" name="st_id_product[]" value="'.$id_product.'" /></li>';
                }    
            }
        }
        $this->fields_form[0]['form']['input']['ac_products']['desc'] = $this->getTranslator()->trans('Current products', array(), 'Admin.Theme.Transformer')
            .': <ul id="curr_products">'.$products_html.'</ul>';
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