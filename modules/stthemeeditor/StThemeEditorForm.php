<?php
$fields_form = array();
$fields_form[0]['form'] = array(
	'input' => array(
		array(
			'type' => 'html',
			'id' => '',
			'label' => $this->getTranslator()->trans('One-click demo importer:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '<button type="button" id="import_export" class="btn btn-default"><i class="icon process-icon-new-module"></i> '.$this->getTranslator()->trans('Import/export', array(), 'Modules.Stthemeeditor.Admin').'</button><input type="hidden" name="id_tab_index" value="0" />',
		),
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display switch back to desktop version link on mobile devices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'version_switching',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'version_switching_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'version_switching_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('This option allows visitors to manually switch between mobile and desktop versions on mobile devices.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Maximum Page Width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'responsive_max',
			'values' => array(
				array(
					'id' => 'responsive_max_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('992', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'responsive_max_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('1200', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'responsive_max_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('1440', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'responsive_max_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Full screen', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Maximum width of the page', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Box style:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'boxstyle',
			'values' => array(
				array(
					'id' => 'boxstyle_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Full width', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'boxstyle_off',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Boxed', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You can change the shadow around the main content when in boxed style under the "Color" tab.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		'left_column_size' => array(
			'type' => 'html',
			'id' => 'left_column_size',
			'label'=> $this->getTranslator()->trans('Left column width', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('This setting is used to change the width of left column, it would not enable the left column.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		'right_column_size' => array(
			'type' => 'html',
			'id' => 'right_column_size',
			'label'=> $this->getTranslator()->trans('Right column width', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('This setting is used to change the width of right column, it would not enable the right column.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Slide left/right column:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'slide_lr_column',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'slide_lr_column_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'slide_lr_column_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Click the "Left"/"right" button to slide the left/right column out on mobile devices.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
		'quarter' => array(
			'type' => 'html',
			'id' => 'quarter',
			'label'=> $this->getTranslator()->trans('Set the width of columns/quarters on homepage:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('The sum of them should be 12. For example if you only need two columns, then set the width of 3rd quarter and 4th quareter to 0:', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Page top spacing:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'top_spacing',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Page bottom spacing:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'bottom_spacing',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Block spacing:', array(), 'Admin.Theme.Transformer'),
			'name' => 'block_spacing',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('This is used to change spacings between blocks', array(), 'Modules.Stthemeeditor.Admin'),
		),
		/*'hometab_pro_per' => array(
			'type' => 'html',
			'id' => 'hometab_pro_per',
			'label'=> $this->getTranslator()->trans('The number of columns for Homepage tab', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),*/

		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Enable animation:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'animation',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'animation_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'animation_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Cart icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_icon',
			'values' => $this->get_fontello(),
		),
		/*
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Wishlist icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'wishlist_icon',
			'values' => $this->get_fontello(),
		), 
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Love icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'love_icon',
			'values' => $this->get_fontello(),
		), 
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Compare icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'compare_icon',
			'values' => $this->get_fontello(),
		), */
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Quick view icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'quick_view_icon',
			'values' => $this->get_fontello(),
		), 
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('View icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'view_icon',
			'values' => $this->get_fontello(),
		), 
		array(
			'type' => 'fontello',
			'label' => $this->getTranslator()->trans('Login icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sign_icon',
			'values' => $this->get_fontello(),
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Guest welcome message:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'welcome',
			'size' => 64,
			'lang' => true,
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Logged welcome message:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'welcome_logged',
			'size' => 64,
			'lang' => true,
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Add a link to welcome message:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'welcome_link',
			'size' => 64,
			'lang' => true,
		),
		array(
			'type' => 'textarea',
			'label' => $this->getTranslator()->trans('Copyright text:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'copyright_text',
			'lang' => true,
			'cols' => 60,
			'rows' => 2,
		),
		/*
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Search label:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'search_label',
			'lang' => true,
			'required' => true,
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Newsletter label:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'newsletter_label',
			'lang' => true,
			'required' => true,
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Iframe background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'lb_bg_color',
			'size' => 33,
			'desc' => $this->getTranslator()->trans('Set iframe background if transparency is not allowed.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		*/
		'payment_icon' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Payment icon:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_image_field',
			'desc' => '',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Navigation pipe:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'navigation_pipe',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Used for the navigation path: Store Name > Category Name > Product Name.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Custom fonts:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'custom_fonts',
			'class' => 'fixed-width-xxl',
			'desc' => $this->getTranslator()->trans('Each font name has to be separated by a comma (","). Please refer to the Documenation to lear how to add custom fonts.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fits popup images vertically:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'popup_vertical_fit',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'popup_vertical_fit_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'popup_vertical_fit_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Popup images will be resized down to be in full screen vertically, if they are larger than the height of screen.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fits product popup images vertically:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_popup_vertical_fit',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_popup_vertical_fit_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_popup_vertical_fit_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'desc' => $this->getTranslator()->trans('This setting is For product thumbnail images on the product page.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Enable responsive layout:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'responsive',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'responsive_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'responsive_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => array(
					 $this->getTranslator()->trans('Enable responsive design for mobile devices.', array(), 'Modules.Stthemeeditor.Admin'),
					 $this->getTranslator()->trans('If this option is off, the Maximum Page Width of your site is 1440px, which means you can not have a full screen site if this option is off.', array(), 'Modules.Stthemeeditor.Admin'),
				),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('keep product variables in ajax search response:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'remove_products_variable',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'remove_products_variable_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'remove_products_variable_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Refer to the documentation to know more about this option, generally just keep it off.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[23]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Product block settings', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'description' => $this->getTranslator()->trans('Settings here are for products in product sliders and products on product listings. You need to manually clear the Smarty cache after making changes here.', array(), 'Modules.Stthemeeditor.Admin'),
	'input' => array( 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Retina:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'retina',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'retina_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'retina_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Retina support for logo and product images.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
		/*
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Yotpo Star Rating:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'yotpo_sart',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'yotpo_sart_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'yotpo_sart_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display product images on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tm_slider_cate',
			'values' => array(
				array(
					'id' => 'pro_tm_slider_cate_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display the cover images only', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_tm_slider_cate_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display all images in a sldier', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_tm_slider_cate_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display all images in a slider with thumbnails below', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('Hover image feature and zoom feature would not work when images are in a slider', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display product images on other places:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tm_slider',
			'values' => array(
				array(
					'id' => 'pro_tm_slider_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display the cover images only', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_tm_slider_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display all images in a sldier', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_tm_slider_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display all images in a slider with thumbnails below', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('Hover image feature and zoom feature would not work when images are in a slider', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product info alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_block_align',
			'values' => array(
				array(
					'id' => 'pro_block_align_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_block_align_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
			),
			'icon_path' => $this->_path,
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Length of product names:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'length_of_product_name',
			'values' => array(
				array(
					'id' => 'length_of_product_name_normal',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Normal(one line)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'length_of_product_name_long',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Long(70 characters)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'length_of_product_name_full',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Full name', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'length_of_product_name_two',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Two lines, focus all product names having the same height', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Product name font:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_name_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="pro_name_list_example" class="fontshow">Sample heading</p>',
		),
		'pro_name'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Product name font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'pro_name',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Product name color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 's_title_block_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Product name transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_name_transform',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Product name size:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_name_size',
			'validation' => 'isUnsignedInt',
			'default_value' => 0,
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show fly-out buttons:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons',
			'values' => array(
				array(
					'id' => 'flyout_buttons_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Right below product image', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'flyout_buttons_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('At the bottom of product image when mouse hover', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'flyout_buttons_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('At the very bottom of product', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'icon_path' => $this->_path,
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Lenght of fly-out buttons:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_style',
			'values' => array(
				array(
					'id' => 'flyout_buttons_style_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Buttons have the same length', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'flyout_buttons_style_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Uneven length, stretch buttons', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			'default_value' => 0,
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Fly-out buttons on mobile devices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_on_mobile',
			'values' => array(
				array(
					'id' => 'flyout_buttons_on_mobile_show',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Show them all the time', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'flyout_buttons_on_mobile_hide',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Hide', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'flyout_buttons_on_mobile_cart',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display "Add to cart" button only if it is in fly-out', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display "Add to cart" buttons:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_add_to_cart',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'display_add_to_cart_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display as buttons, show out when mouse hover', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_add_to_cart_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Display as links, show out when mouse hover', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_add_to_cart_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display as buttons', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_add_to_cart_5',
					'value' => 5,
					'label' => $this->getTranslator()->trans('Display as links', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_add_to_cart_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display in fly-out buttons', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_add_to_cart_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Hide', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display "Add to cart" buttons in grid view on mobile device:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mobile_add_to_cart',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'mobile_add_to_cart_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'mobile_add_to_cart_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Quantity input', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_quantity_input',
			'default_value' => 2,
			'values' => array(
				array(
					'id' => 'pro_quantity_input_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display quantity inputs along with "Add to cart" buttons', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_quantity_input_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display quantity inputs on drop down cart and side bar cart.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_quantity_input_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('The sum of the above two options.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_quantity_input_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('If this setting is enable and the add to cart button is in the fly-out, then the add to cart button will be moved down to the product name. ', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display the "Quick view" button in the fly-out button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_quickview',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'flyout_quickview_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'flyout_quickview_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'html',
			'label'=> $this->getTranslator()->trans('How to display the "Add to wishlist" button', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => $this->getTranslator()->trans('Go to the Wishlist module', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		array(
			'type' => 'html',
			'label'=> $this->getTranslator()->trans('How to display the "Love" button', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => $this->getTranslator()->trans('Go to the Love product module', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		/*
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display the "Add to wishlist" button in the fly-out button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_wishlist',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'flyout_wishlist_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'flyout_wishlist_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),

		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display the "Love" button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_love',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'display_love_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display in the fly-out button', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_love_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display on the top left hand side corner', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_love_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display on the top right hand side corner', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		*/
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display the "View more" button in the fly-out button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'use_view_more_instead',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'use_view_more_instead_fly_out',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				/*array(
					'id' => 'use_view_more_instead_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display the "View more" button below the product name when mouse hover over', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'use_view_more_instead_always',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display the "View more" button below the product name', array(), 'Modules.Stthemeeditor.Admin')),*/
				array(
					'id' => 'use_view_more_instead_off',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display social share links in the fly-out button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_share',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'flyout_share_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'flyout_share_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display the "Add to compare" button in the fly-out button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_comparison',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'flyout_comparison_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'flyout_comparison_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display product short descriptions:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_short_desc_on_grid',
			'values' => array(
				array(
					'id' => 'show_short_desc_on_grid_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_short_desc_on_grid_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes, 200 characters', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_short_desc_on_grid_full',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Yes, full short description', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 

		/*array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show product attributes:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_pro_attr',
			'values' => array(
				array(
					'id' => 'display_pro_attr_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_pro_attr_all',
					'value' => 1,
					'label' => $this->getTranslator()->trans('All', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_pro_attr_in_stock',
					'value' => 2,
					'label' => $this->getTranslator()->trans('In stock only', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), */
		 array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Hide discount info(Like -5%, -8$):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'hide_discount',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'hide_discount_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'hide_discount_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show product colors out:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_color_list',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_color_list_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_color_list_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show manufacturer/brand name:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_list_display_brand_name',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_list_display_brand_name_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_list_display_brand_name_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show default category name:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_display_category_name',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_display_category_name_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_display_category_name_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Zoom product images on hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_img_hover_scale',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_img_hover_scale_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_img_hover_scale_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Border size:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_border_size',
			'validation' => 'isUnsignedInt',
			'default_value' => 0,
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_border_color_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Shadows around product images:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_shadow_effect',
			'values' => array(
				array(
					'id' => 'pro_shadow_effect_hover',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Show shadows when mouseover', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_shadow_effect_on',
					'value' => 2,
					'label' => $this->getTranslator()->trans('YES', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_shadow_effect_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),  
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('H-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_h_shadow',
			'validation' => 'isInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The position of the horizontal shadow. Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('V-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_v_shadow',
			'validation' => 'isInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The position of the vertical shadow. Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The blur distance of shadow:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_shadow_blur',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Shadow color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_shadow_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_shadow_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);


$fields_form[1]['form'] = array(
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Default product listing:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_view',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_view_grid',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Grid', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_view_list',
					'value' => 1,
					'label' => $this->getTranslator()->trans('List', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),  
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Default product view for mobile devices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_view_mobile',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'product_view_mobile_grid',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_view_mobile_list',
					'value' => 1,
					'label' => $this->getTranslator()->trans('List view', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display a swither so customers can decide using grid or list:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_view_swither',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'product_view_swither_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_view_swither_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Spacing between products in grid view:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_spacing_grid',
			'validation' => 'isNullOrUnsignedId',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value 15.', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Pagination:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'infinite_scroll',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'infinite_scroll_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Pagination', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'infinite_scroll_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Infinite scroll', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'infinite_scroll_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Load more button', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),  

		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Products per page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'products_per_page',
			'class' => 'fixed-width-lg',
			'desc' => array(
					$this->getTranslator()->trans('Number of products displayed per page.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('This is the same setting as the "Products per page" on the "Product settings" page.', array(), 'Modules.Stthemeeditor.Admin'),
				),
			'validation' => 'isUnsignedInt',
		),

		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Lazy load images:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cate_pro_lazy',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'cate_pro_lazy_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cate_pro_lazy_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('Dose not work for displaying images in sliders', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Sticky left or right column:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_column',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'sticky_column_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'sticky_column_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Sticky left column', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_column_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Sticky right column', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isGenericName',
		),  
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to display filters(Faceted search module):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'filter_position',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'filter_position_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left/right column', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'filter_position_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('List all filter out on main column.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'filter_position_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display filters as drop down lists on main column.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'filter_position_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Display filters as drop down lists on main column, sticky when page scrolls down.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isGenericName',
			'desc' => array(
				$this->getTranslator()->trans('If you choose the first option, then the filters display on the left or right column depending on the Faceted search module is transplanted to the displayLeftColumn or displayRightColumn hook.', array(), 'Modules.Stthemeeditor.Admin'),
				$this->getTranslator()->trans('Make sure the Faceted search module is enabled.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		), 

		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Sticky filters background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_filter_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Sticky filters background opacity:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_filter_bg_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show category title on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_category_title',
			'values' => array(
				array(
					'id' => 'display_category_title_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_category_title_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_category_title_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Center', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_category_title_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Right', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show category description on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_category_desc',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_category_desc_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_category_desc_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show full category description on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_cate_desc_full',
			'values' => array(
				array(
					'id' => 'display_cate_desc_full_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_cate_desc_full_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes, at the top of product listing', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_cate_desc_full_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Yes, at the bottom of product listing', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show category image on the category page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_category_image',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_category_image_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_category_image_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show subcategories:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_subcate',
			'values' => array(
				array(
					'id' => 'display_subcate_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_subcate_gird',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_subcate_gird_fullname',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Grid view(Display full category name)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_subcate_list',
					'value' => 2,
					'label' => $this->getTranslator()->trans('List view', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		'categories_per' => array(
			'type' => 'html',
			'id' => 'categories_per',
			'label'=> $this->getTranslator()->trans('Subcategories per row in grid view:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display "Show all" button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'category_show_all_btn',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'category_show_all_btn_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'category_show_all_btn_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),*/
		/*'cate_sortby_name' => array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Show sort by:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cate_sortby_name',
			'options' => array(
				'query' => $this->_category_sortby,
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => '',
					'label' => $this->getTranslator()->trans('Please select', array(), 'Modules.Stthemeeditor.Admin'),
				),
			),
			'desc' => '',
		),
		array(
			'type' => 'hidden',
			'name' => 'cate_sortby',
			'default_value' => '',
			'validation' => 'isAnything',
		),*/
		'category_per' => array(
			'type' => 'html',
			'id' => 'category_per',
			'label'=> $this->getTranslator()->trans('The number of products per row on listing page', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		'cate_pro_image_type'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Set a different image type for the categor page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cate_pro_image_type',
			'default_value' => 'home_default',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
			'desc' => $this->getTranslator()->trans('This option would be useful, if you want to show products on homepage and category pages in defferent sizes.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		/*'category_per_2' => array(
			'type' => 'html',
			'id' => 'category_per_2',
			'label'=> $this->getTranslator()->trans('The number of columns for two columns products listing page', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		'category_per_3' => array(
			'type' => 'html',
			'id' => 'category_per_3',
			'label'=> $this->getTranslator()->trans('The number of columns for three columns products listing page', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),*/
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Enable big next button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'big_next_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'big_next_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Big next button color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Big next button hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Big next button background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Big next button background hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'big_next_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[2]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Color general', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Body font color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('General links color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'link_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('General link hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Price color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'price_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ), 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Old price color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'old_price_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ), 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Discount color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'discount_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ), 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Discount background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'discount_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ), 
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Primary buttons text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'p_btn_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Primary buttons text hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'p_btn_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Primary buttons background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'p_btn_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Primary buttons background hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'p_btn_hover_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('General border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'base_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('General background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'form_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Product grid background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_grid_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Product grid hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_grid_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Starts color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'starts_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Right panel background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'side_panel_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Right panel heading color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'side_panel_heading',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Right panel heading background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'side_panel_heading_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[31]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Header cart icon', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(    
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Bag-like cart icon border color or  Cart icon color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_icon_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart icon background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_icon_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_number_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_number_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cart_number_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
/*$fields_form[41]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Moblie header cart icon', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(    
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Bag-like cart icon border color or  Cart icon color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mob_cart_icon_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart icon background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mob_cart_icon_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mob_cart_number_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mob_cart_number_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Cart number border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'mob_cart_number_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);*/

$fields_form[32]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Icons', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array( 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Icon text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Icon text hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Icon background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Icon hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_hover_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Icon disabled text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_disabled_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Circle number color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'circle_number_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),  
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Circle number background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'circle_number_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),  
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Right vertical panel border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'right_panel_border',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),    
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[33]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Buttons', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array( 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'btn_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button text hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'btn_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button background:', array(), 'Admin.Theme.Transformer'),
			'name' => 'btn_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
			'desc' => $this->getTranslator()->trans('Button fill animation would not take effect if this option is filled.', array(), 'Modules.Stthemeeditor.Admin'),
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'btn_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button background & border color when mouse hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'btn_hover_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('The "Add to cart" button text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'primary_btn_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('The "Add to cart" button text hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'primary_btn_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('The "Add to cart" button background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'primary_btn_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('The "Add to cart" button border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'primary_btn_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('The "Add to cart" button background & border color when mouse hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'primary_btn_hover_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Button fill animation:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'btn_fill_animation',
			'values' => array(
				array(
					'id' => 'btn_fill_animation_fade',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Fade', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'btn_fill_animation_tb',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top to bottom', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'btn_fill_animation_bt',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Bottom to top', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'btn_fill_animation_lr',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Left to right', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'btn_fill_animation_rl',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Right to left', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('This option would not take effect if the above "Button background" field is filled.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Button transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'btn_trans',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Flyout buttons color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Flyout buttons hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Flyout buttons background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Flyout buttons hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_buttons_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Flyout separators color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'flyout_separators_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
/*$fields_form[34]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Breadcrumb', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array( 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Breadcrumb font color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Breadcrumb link hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Breadcrumb width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_width',
			'values' => array(
				array(
					'id' => 'breadcrumb_width_fullwidth',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Full width', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'breadcrumb_width_normal',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Boxed', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Breadcrumb background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Breadcrumb border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_border',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Breadcrumb border height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'breadcrumb_border_height',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'default_value' => '',
			'validation' => 'isNullOrUnsignedId',
			'desc' => $this->getTranslator()->trans('Leave it empty to use the default value.', array(), 'Modules.Stthemeeditor.Admin'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);*/
$fields_form[20]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Product sliders', array(), 'Admin.Theme.Transformer'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_color_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons disabled color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_color_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),

		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top right side prev/next buttons disabled background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_tr_prev_next_bg_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),

		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_color_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons disabled color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_color_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Left right side prev/next buttons disabled background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ps_lr_prev_next_bg_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Navigation color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ps_pag_nav_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Navigation hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ps_pag_nav_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[36]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Pagination', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_color_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination disabled color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_color_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),

		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Pagination disabled background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pagination_bg_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[40]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Boxed style', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show a shadow effect:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'boxed_shadow_effect',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'boxed_shadow_effect_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'boxed_shadow_effect_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('H-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'boxed_h_shadow',
			'validation' => 'isInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The position of the horizontal shadow. Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('V-shadow:', array(), 'Admin.Theme.Transformer'),
			'name' => 'boxed_v_shadow',
			'validation' => 'isInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The position of the vertical shadow. Negative values are allowed.', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow blur distance:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'boxed_shadow_blur',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Shadow color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'boxed_shadow_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'boxed_shadow_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[3]['form'] = array(
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Latin extended support:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_latin_support',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'font_latin_support_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'font_latin_support_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You have to check whether your selected fonts support Latin extended here', array(), 'Modules.Stthemeeditor.Admin').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Cyrylic support:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_cyrillic_support',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'font_cyrillic_support_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'font_cyrillic_support_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You have to check whether your selected fonts support Cyrylic here', array(), 'Modules.Stthemeeditor.Admin').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
			'validation' => 'isBool',
		),  
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Vietnamese support:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_vietnamese',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'font_vietnamese_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'font_vietnamese_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You have to check whether your selected fonts support Vietnamese here', array(), 'Modules.Stthemeeditor.Admin').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
			'validation' => 'isBool',
		),  
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Greek support:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_greek_support',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'font_greek_support_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'font_greek_support_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You have to check whether your selected fonts support Greek here', array(), 'Modules.Stthemeeditor.Admin').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Arabic support:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_arabic_support',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'font_arabic_support_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'font_arabic_support_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('You have to check whether your selected fonts support Arabic here', array(), 'Modules.Stthemeeditor.Admin').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
			'validation' => 'isBool',
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Body font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_text_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_text_list_example" class="fontshow">Home Fashion</p>',
		),
		'font_text'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Body font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_text',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Body font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_body_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[27]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Headings', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'description' => $this->getTranslator()->trans('Some settings in this section would be overrided by other modules.', array(), 'Modules.Stthemeeditor.Admin'),
	'input' => array(
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Heading font:', array(), 'Admin.Theme.Transformer'),
			'name' => 'font_heading_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_heading_list_example" class="fontshow">Sample heading</p>',
		),
		'font_heading'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Heading font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_heading',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Heading font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_heading_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Footer heading font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_heading_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Heading transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_heading_trans',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Heading border height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_bottom_border',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		/*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'headings_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),*/
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'block_headings_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_bottom_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading border highlight color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_bottom_border_color_h',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Heading style:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_style',
			'values' => array(
				array(
					'id' => 'heading_style_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Under line', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'heading_style_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('One line. Can not have background image', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'heading_style_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Two lines', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'heading_style_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('One short line. Can not have background image', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'icon_path' => $this->_path,
			'desc' => $this->getTranslator()->trans('Pay attention to the "Heading border height" setting above.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Heading background pattern:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(7),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Modules.Stthemeeditor.Admin'),
				),
			),
			'desc' => $this->getPatterns(7,'heading_bg'),
			'validation' => 'isUnsignedInt',
		),
		'heading_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Heading background image:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_bg_image_field',
			'desc' => '',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

/*$fields_form[29]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Headings on the left/right column ', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Heading bottom border height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'heading_column_bottom_border',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);*/
$fields_form[28]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Others', array(), 'Admin.Theme.Transformer'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Price font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_price_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_price_list_example" class="fontshow">$12345.67890</p>',
		),
		'font_price'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Price font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_price',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Price font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_price_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Old price font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_old_price_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Add to cart button font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_cart_btn_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_cart_btn_list_example" class="fontshow">Add to cart</p>',
		),
		'font_cart_btn'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Add to cart button font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_cart_btn',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[4]['form'] = array(
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'fullwidth_header',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'fullwidth_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'fullwidth_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header left alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_left_alignment',
			'values' => array(
				array(
					'id' => 'header_left_alignment_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_left_alignment_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_left_alignment_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header center alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_center_alignment',
			'values' => array(
				array(
					'id' => 'header_center_alignment_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_center_alignment_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_center_alignment_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header right alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_right_alignment',
			'values' => array(
				array(
					'id' => 'header_right_alignment_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_right_alignment_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_right_alignment_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Header right bottom alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_right_bottom_alignment',
			'values' => array(
				array(
					'id' => 'header_right_bottom_alignment_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_right_bottom_alignment_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_right_bottom_alignment_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		'retina_logo_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Retina logo:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'retina_logo_image_field',
			'desc' => $this->getTranslator()->trans('If your logo is 200x100, upload a 400x200 version of that logo.', array(), 'Modules.Stthemeeditor.Admin'),
		),

		'logo_height' => array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Primary header height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_height',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('Header includes topbar, primary header and menu. Primary header is the section where the logo is located.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('If the value you set is smaller than the height of your logo, your logo would not be resized down automatically, you need to use the "Logo width" under the "logo" tab to reduce the size of your logo to make everything look fine.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('The height of your logo is ', array(), 'Modules.Stthemeeditor.Admin').Configuration::get('SHOP_LOGO_HEIGHT'),
				),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Header bottom spacing on the homepage:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bottom_spacing',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('The default value is.', array(), 'Modules.Stthemeeditor.Admin').' 12px',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Header text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Link hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Header text transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_text_trans',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Dropdown text hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'dropdown_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Dropdown background hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'dropdown_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'header_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bg_repeat',
			'values' => array(
				array(
					'id' => 'header_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bg_position',
			'values' => array(
				array(
					'id' => 'header_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bottom_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'header_bottom_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[30]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Top-bar', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width top-bar:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'fullwidth_topbar',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'fullwidth_topbar_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'fullwidth_topbar_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Topbar text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'topbar_text_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Topbar link hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'topbar_link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Topbar link hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_link_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Topbar height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'topbar_height',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top bar background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_topbar_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),

		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Bottom border height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'topbar_b_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Bottom border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'topbar_b_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Top bar separators style:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_topbar_sep_type',
			'values' => array(
				array(
					'id' => 'header_topbar_sep_type_vertical',
					'value' => 'vertical-s',
					'label' => $this->getTranslator()->trans('Vertical', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_topbar_sep_type_horizontal',
					'value' => 'horizontal-s',
					'label' => $this->getTranslator()->trans('Horizontal', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'header_topbar_sep_type_horizontal_fullheight',
					'value' => 'horizontal-s-fullheight',
					'label' => $this->getTranslator()->trans('Vertical full height', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'header_topbar_sep_space',
					'value' => 'space-s',
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isGenericName',
		), 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Top bar separators color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'header_topbar_sep',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[5]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Main menu', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Megamenu position:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'megamenu_position',
			'values' => array(
				array(
					'id' => 'megamenu_position_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_position_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_position_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_position_full',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Full width, all main menu items have even width', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'desc' => array(
				$this->getTranslator()->trans('This seting would not take effect if your menu is in header.', array(), 'Modules.Stthemeeditor.Admin'),
				$this->getTranslator()->trans('This seting also would not take effect if you put Cart block or Search box or any other content along with the menu.', array(), 'Modules.Stthemeeditor.Admin'),
			),
			'validation' => 'isUnsignedInt',
		), 
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Automatically highlight current category in menu:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_highlight',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'menu_highlight_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_highlight_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			), 
			'desc' => $this->getTranslator()->trans('Turning this setting on may slow your page load time.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		),*/
		
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Megamenu width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'megamenu_width',
			'values' => array(
				array(
					'id' => 'megamenu_width_normal',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Boxed', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'megamenu_width_fullwidth',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Full width', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Hide the "title" text of menu items when mouse over:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_title',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'menu_title_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_title_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How do submenus appear:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'submemus_animation',
			'values' => array(
				array(
					'id' => 'submemus_animation_fadein',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Slide in', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'submemus_animation_slidedown',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Slide down', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Menu height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'st_menu_height',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => 'The value of this field should be greater than 22',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu bottom border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_bottom_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu bottom border color when mouse hovers over:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_bottom_border_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The height of menu bottom border:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_bottom_border',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main menu color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main menu hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main menu background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main menu hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main menu font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_menu_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_menu_list_example" class="fontshow">Home Fashion</p>',
		),
		'font_menu'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main menu font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_menu',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Main menu font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_menu_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main menu text transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_menu_trans',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('2nd level color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'second_menu_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('2nd level hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'second_menu_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('2nd level font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'second_font_menu_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="second_font_menu_list_example" class="fontshow">Home Fashion</p>',
		),
		'second_font_menu'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('2nd level font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'second_font_menu',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('2nd level font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'second_font_menu_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('3rd level color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'third_menu_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('3rd level hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'third_menu_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('3rd level font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'third_font_menu_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="third_font_menu_list_example" class="fontshow">Home Fashion</p>',
		),
		'third_font_menu'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('3rd level font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'third_font_menu',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('3rd level font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'third_font_menu_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[51]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Mobile menu', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items1_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items1_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('2nd level color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items2_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('2nd level background color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items2_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('3rd level color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items3_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('3rd level background color on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_mob_items3_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[52]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Multi level menu', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Sub menus background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_multi_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Sub menus hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_multi_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[53]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Dropdown vertical menu', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Automatically open the menu on homepage:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_open',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'menu_ver_open_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_ver_open_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How to show sub menus:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_sub_style',
			'values' => array(
				array(
					'id' => 'menu_ver_sub_style_1',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Normal', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_ver_sub_style_2',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Sub menus align to the top and have the same height as the vertical menu.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Width of the vertical menu title:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_title_width',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Vertical menu title alignment:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_title_align',
			'values' => array(
				array(
					'id' => 'menu_ver_title_align_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_ver_title_align_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_ver_title_align_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu title color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_title',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu title hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_hover_title',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu title background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu title hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Vertical menu items font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ver_font_menu_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="ver_font_menu_list_example" class="fontshow">Home Fashion</p>',
		),
		'ver_font_menu'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Vertical menu items font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'ver_font_menu',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Vertical menu items font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'ver_font_menu_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu items color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_item_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu items background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_item_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu items hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_item_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Vertical menu items hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_ver_item_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);


$fields_form[21]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Left/right column menu', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_menu_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu hover color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_menu_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_menu_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
		   'type' => 'color',
		   'label' => $this->getTranslator()->trans('Menu background:', array(), 'Modules.Stthemeeditor.Admin'),
		   'name' => 'c_menu_bg_color',
		   'class' => 'color',
		   'size' => 20,
		   'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_menu_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),

		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Menu items font:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_font_menu_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="c_font_menu_list_example" class="fontshow">Home Fashion</p>',
		),
		'c_font_menu'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Menu items font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'c_font_menu',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Menu items font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_font_menu_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
        array(
            'type' => 'select',
            'label' => $this->l('Menu text transform:'),
            'name' => 'c_menu_font_trans',
            'options' => array(
                'query' => self::$textTransform,
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isUnsignedInt',
        ),
        array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'column_block_headings_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'heading_column_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Menu left border color when mouse hovers over:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'c_menu_border_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[6]['form'] = array(
	'input' => array(
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'body_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'body_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'body_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'body_bg_repeat',
			'values' => array(
				array(
					'id' => 'body_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'body_bg_position',
			'values' => array(
				array(
					'id' => 'body_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fixed background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'body_bg_fixed',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'body_bg_fixed_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_fixed_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Scale the background image:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'body_bg_cover',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'body_bg_cover_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'body_bg_cover_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Scale the background image to be as large as possible so that the window is completely covered by the background image. Some parts of the background image may not be in view within the window.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Body background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'body_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Content background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'body_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
			'desc' => $this->getTranslator()->trans('Actually only for boxed layout.', array(), 'Modules.Stthemeeditor.Admin'),
		 ),
		/*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Column container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'main_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[7]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Stacked footer', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		'stacked_footer_column' => array(
			'type' => 'html',
			'id' => 'stacked_footer_column',
			'label'=> $this->getTranslator()->trans('Set the width of stacked footers:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_fullwidth',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'f_top_fullwidth_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_fullwidth_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'f_top_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_bg_repeat',
			'values' => array(
				array(
					'id' => 'f_top_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_bg_position',
			'values' => array(
				array(
					'id' => 'f_top_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fixed background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'f_top_bg_fixed',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'f_top_bg_fixed_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_bg_fixed_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_primary_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_primary_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_primary_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Heading alignment:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_h_align',
			'values' => array(
				array(
					'id' => 'f_top_h_align_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_h_align_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_top_h_align_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_top_h_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_top_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_top_con_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_top_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_top_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[8]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Footer', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_fullwidth',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'footer_fullwidth_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_fullwidth_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'footer_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_bg_repeat',
			'values' => array(
				array(
					'id' => 'footer_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_bg_position',
			'values' => array(
				array(
					'id' => 'footer_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fixed background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_bg_fixed',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'footer_bg_fixed_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_bg_fixed_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Heading alignment:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_h_align',
			'values' => array(
				array(
					'id' => 'footer_h_align_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_h_align_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'footer_h_align_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_h_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),        
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[9]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Footer after', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_fullwidth',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'f_secondary_fullwidth_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_fullwidth_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'f_secondary_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_bg_repeat',
			'values' => array(
				array(
					'id' => 'f_secondary_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_bg_position',
			'values' => array(
				array(
					'id' => 'f_secondary_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fixed background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'f_secondary_bg_fixed',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'f_secondary_bg_fixed_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_bg_fixed_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_tertiary_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_tertiary_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_link_tertiary_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Heading alignment:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_h_align',
			'values' => array(
				array(
					'id' => 'f_secondary_h_align_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_h_align_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_secondary_h_align_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_secondary_h_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_secondary_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_secondary_con_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_tertiary_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_tertiary_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ), 
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[10]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Copyright', array(), 'Modules.Stthemeeditor.Admin'),
		'icon' => 'icon-cogs'
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Full width:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_info_fullwidth',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'f_info_fullwidth_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_fullwidth_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Center layout:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'f_info_center',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'f_info_center_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_center_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		 array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_info_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'f_info_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_info_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_info_bg_repeat',
			'values' => array(
				array(
					'id' => 'f_info_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'f_info_bg_position',
			'values' => array(
				array(
					'id' => 'f_info_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Fixed background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'f_info_bg_fixed',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'f_info_bg_fixed_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'f_info_bg_fixed_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'second_footer_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'second_footer_link_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Links hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'second_footer_link_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_info_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'footer_info_con_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Border height:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_info_border',
			'options' => array(
				'query' => self::$border_style_map,
				'id' => 'id',
				'name' => 'name',
				'default_value' => 0,
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Border color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'footer_info_border_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[11]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Cross selling', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		'cs_pro_per' => array(
			'type' => 'html',
			'id' => 'cs_pro_per',
			'label'=> $this->getTranslator()->trans('The number of columns', array(), 'Admin.Theme.Transformer'),
			'name' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Autoplay:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_slideshow',
			'is_bool' => true,
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'cs_slide_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_slide_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Once, has no effect in loop mode', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_slide_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_s_speed',
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Transition period:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_a_speed',
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, of the transition effect.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Spacing between products:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_spacing_between',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
		'cs_image_type'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Image type:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cs_image_type',
			'default_value' => 'home_default',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Stop autoplay after interaction:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_pause_on_hover',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'cs_pause_on_hover_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_pause_on_hover_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('Autoplay will not be disabled after user interactions (swipes). Turn this option off, this slider will be restarted every time after interaction', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Title text align:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_title',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'cs_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display "next" and "prev" buttons:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_direction_nav',
			'default_value' => 3,
			'values' => array(
				array(
					'id' => 'cs_none',
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_top_right',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top right-hand side', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_full_height',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Full height', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_full_height_hover',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Full height, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_square',
					'value' => 4,
					'label' =>$this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_square_hover',
					'value' => 5,
					'label' =>$this->getTranslator()->trans('Square, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_circle',
					'value' => 6,
					'label' =>$this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_circle_hover',
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
            'label' => $this->getTranslator()->trans('Hide "next" and "prev" buttons on mobile:', array(), 'Admin.Theme.Transformer'),
            'name' => 'cs_hide_direction_nav_on_mob',
            'default_value' => 1,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'cs_hide_direction_nav_on_mob_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'cs_hide_direction_nav_on_mob_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isBool',
        ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show pagination:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_control_nav',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'cs_control_nav_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Bullets', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_control_nav_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Number', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_control_nav_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Progress', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_control_nav_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
        array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Hide navigation on mobile:', array(), 'Admin.Theme.Transformer'),
            'name' => 'cs_hide_control_nav_on_mob',
            'default_value' => 1,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'cs_hide_control_nav_on_mob_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'cs_hide_control_nav_on_mob_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isBool',
        ),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Loop:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_loop',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'cs_loop_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_loop_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Lazy load:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_lazy',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'cs_lazy_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_lazy_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Move:', array(), 'Admin.Theme.Transformer'),
			'name' => 'cs_move',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'cs_move_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Scroll per page', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_move_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Scroll per item', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cs_move_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Free mode', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);


$fields_form[12]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Products category', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
	   'pc_pro_per' => array(
			'type' => 'html',
			'id' => 'pc_pro_per',
			'label'=> $this->getTranslator()->trans('The number of columns', array(), 'Admin.Theme.Transformer'),
			'name' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Autoplay:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_slideshow',
			'is_bool' => true,
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'pc_slide_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_slide_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Once, has no effect in loop mode', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_slide_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_s_speed',
			'default_value' => 7000,
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Transition period:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_a_speed',
			'default_value' => 400,
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, of the transition effect.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Spacing between products:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_spacing_between',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
		'pc_image_type'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Image type:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pc_image_type',
			'default_value' => 'home_default',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Stop autoplay after interaction:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_pause_on_hover',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pc_pause_on_hover_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_pause_on_hover_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('Autoplay will not be disabled after user interactions (swipes). Turn this option off, this slider will be restarted every time after interaction', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Title text align:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_title',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'pc_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display "next" and "prev" buttons:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_direction_nav',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'pc_none',
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_top_right',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top right-hand side', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_full_height',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Full height', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_full_height_hover',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Full height, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_square',
					'value' => 4,
					'label' =>$this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_square_hover',
					'value' => 5,
					'label' =>$this->getTranslator()->trans('Square, show out when mouseover', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_circle',
					'value' => 6,
					'label' =>$this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_circle_hover',
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
            'label' => $this->getTranslator()->trans('Hide "next" and "prev" buttons on mobile:', array(), 'Admin.Theme.Transformer'),
            'name' => 'pc_hide_direction_nav_on_mob',
            'default_value' => 1,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'pc_hide_direction_nav_on_mob_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'pc_hide_direction_nav_on_mob_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isBool',
        ),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show pagination:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_control_nav',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'pc_control_nav_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Bullets', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_control_nav_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Number', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_control_nav_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Progress', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_control_nav_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
        array(
            'type' => 'switch',
            'label' => $this->getTranslator()->trans('Hide navigation on mobile:', array(), 'Admin.Theme.Transformer'),
            'name' => 'pc_hide_control_nav_on_mob',
            'default_value' => 1,
            'is_bool' => true,
            'values' => array(
                array(
                    'id' => 'pc_hide_control_nav_on_mob_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'pc_hide_control_nav_on_mob_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isBool',
        ),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Loop:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_loop',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pc_loop_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_loop_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Lazy load:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_lazy',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pc_lazy_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_lazy_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Move:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pc_move',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'pc_move_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Scroll per page', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_move_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Scroll per item', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pc_move_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Free mode', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

/*$fields_form[13]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Accessories', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
		'ac_pro_per' => array(
			'type' => 'html',
			'id' => 'ac_pro_per',
			'label'=> $this->getTranslator()->trans('The number of columns', array(), 'Admin.Theme.Transformer'),
			'name' => '',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Autoplay:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_slideshow',
			'is_bool' => true,
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'ac_slide_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_slide_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Time:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_s_speed',
			'default_value' => 7000,
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, between the end of a transition effect and the start of the next one.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Transition period:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_a_speed',
			'default_value' => 400,
			'desc' => $this->getTranslator()->trans('The period, in milliseconds, of the transition effect.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isUnsignedInt',
			'class' => 'fixed-width-sm'
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Pause On Hover:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_pause_on_hover',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'ac_pause_on_hover_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_pause_on_hover_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Title text align:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_title',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'ac_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display "next" and "prev" buttons:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_direction_nav',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'ac_none',
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_top-right',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Top right-hand side', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_square',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_circle',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show pagination:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_control_nav',
			'default_value' => 1,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'ac_control_nav_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_control_nav_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Rewind to first after the last slide:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_loop',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'ac_loop_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_loop_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Lazy load:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_lazy',
			'default_value' => 0,
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'ac_lazy_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_lazy_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.', array(), 'Admin.Theme.Transformer'),
			'validation' => 'isBool',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Move:', array(), 'Admin.Theme.Transformer'),
			'name' => 'ac_move',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'ac_move_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('1 item', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'ac_move_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('All visible items', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);*/

$fields_form[14]['form'] = array(
	'input' => array(
		array(
			'type' => 'textarea',
			'label' => $this->getTranslator()->trans('Custom CSS Code:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'custom_css',
			'cols' => 80,
			'rows' => 20,
			'desc' => $this->getTranslator()->trans('Override css with your custom code', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'textarea',
			'label' => $this->getTranslator()->trans('Custom JAVASCRIPT Code:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'custom_js',
			'cols' => 80,
			'rows' => 20,
			'desc' => $this->getTranslator()->trans('Remove all script tags', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'textarea',
			'label' => $this->getTranslator()->trans('Tracking code:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'tracking_code',
			'cols' => 80,
			'rows' => 20,
			'validation' => 'isAnything',
			'desc' => $this->getTranslator()->trans('Code added here is injected before the closing body tag on every page in your site. Turn off the "Use HTMLPurifier Library" setting on the Preferences > General page if you want to put html codes into this field.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'textarea',
			'label' => $this->getTranslator()->trans('Head code:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'head_code',
			'cols' => 80,
			'rows' => 20,
			'desc' => $this->getTranslator()->trans('Code added here is injected into the head tag on every page in your site. Turn off the "Use HTMLPurifier Library" setting on the Preferences > General page if you want to put html tags into this field.', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isAnything',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);


$fields_form[16]['form'] = array(
	'input' => array(
		'pro_image_column' => array(
			'type' => 'html',
			'id' => 'pro_image_column',
			'label'=> $this->getTranslator()->trans('Image column width', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('The default image type of the main product image is "medium_default" 420px in wide. When the image column width is larger that 4, "large_default" image type will be applied, it is 700px in wide. You may need to change the size of those image types to make images look sharpe.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		'pro_primary_column' => array(
			'type' => 'html',
			'id' => 'pro_primary_column',
			'label'=> $this->getTranslator()->trans('Primary column width', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('Sum of the three columns has to be equal 12, for example: 4 + 5 + 3, or 6 + 6 + 0.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		'pro_secondary_column' => array(
			'type' => 'html',
			'id' => 'pro_secondary_column',
			'label'=> $this->getTranslator()->trans('Secondary column width', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
			'desc' => $this->getTranslator()->trans('You can set them to 0 to hide the secondary column.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		/*array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Page layout on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_page_layout',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_page_layout_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left layout, default', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_page_layout_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center layout', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),*/
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Buy box:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_buy',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_buy_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('On product center column', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_buy_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('On product right column', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'icon_path' => $this->_path,
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Buy button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_buy_button',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_buy_button_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Inline', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_buy_button_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Full width', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),

		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main product name:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_product_name_list',
			'onchange' => 'handle_font_change(this);',
			'options' => array(
				'optiongroup' => array (
					'query' => $this->fontOptions(),
					'label' => 'name'
				),
				'options' => array (
					'query' => 'query',
					'id' => 'id',
					'name' => 'name'
				),
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('Use default', array(), 'Admin.Theme.Transformer')
				),
			),
			'desc' => '<p id="font_product_name_list_example" class="fontshow">Sample heading</p>',
		),
		'font_product_name'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main product name font weight:', array(), 'Modules.Stthemeeditor.Admin'),
			'onchange' => 'handle_font_style(this);',
			'class' => 'fontOptions',
			'name' => 'font_product_name',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isAnything',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Main product name font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_product_name_size',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		), 
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Main product name transform:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_product_name_trans',
			'options' => array(
				'query' => self::$textTransform,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Main product name color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'font_product_name_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		/*array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('How many images per row in the main product image gallery:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_gallery_top_per_view',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'pro_gallery_top_per_view_0',
					'value' => 1,
					'label' => $this->getTranslator()->trans('One.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_gallery_top_per_view_1',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Two', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),*/
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product gallerys:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_gallerys',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_gallerys_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Display images of the current combination only.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_gallerys_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display images of the current combination with a show all images button', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_gallerys_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Show all images, highlight images of the current combination. ', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product thumbnails on desktop devices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_thumbnails',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_thumbnails_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Horizontal slider', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_6',
					'value' => 6,
					'label' => $this->getTranslator()->trans('Horizontal slider, do not show out if a product only has one image ', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Left side vertical slider', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right side vertical slider', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_thumbnails_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Bullets', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_5',
					'value' => 5,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'icon_path' => $this->_path,
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product thumbnails on mobile devices:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_thumbnails_mobile',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_thumbnails_mobile_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('The same as they are on desktop devices.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_mobile_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Horizontal slider', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_thumbnails_mobile_5',
					'value' => 5,
					'label' => $this->getTranslator()->trans('Horizontal slider, do not show out if a product only has one image ', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_thumbnails_mobile_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Grid view', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_thumbnails_mobile_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Bullets', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'product_thumbnails_mobile_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('The width of thumbnail images for grid view and horizontal thumbnails sldier:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'grid_thumbnails_width',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'default_value' => 0,
			'desc' => array(
				$this->getTranslator()->trans('Set it to 0 to use the default 70px width.', array(), 'Modules.Stthemeeditor.Admin')
				),
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Vertical thumbnails slider width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'gallery_thumbnails_width_v',                    
			'default_value' => 3,
			'options' => array(
				'query' => self::$grid_width,
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Vertical thumbnails slider height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'gallery_thumbnails_height_v',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'default_value' => 0,
			'desc' => array(
				$this->getTranslator()->trans('Set it to 0 to use the default 360px width.', array(), 'Modules.Stthemeeditor.Admin')
				),
		),
		'thumb_image_type'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Thumbnail image type:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'thumb_image_type',
			'default_value' => 'cart_default',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
		),
		'pro_thumnbs_per' => array(
			'type' => 'html',
			'id' => 'pro_thumnbs_per',
			'label'=> $this->getTranslator()->trans('How many images per view on the product main gallery', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Spacing between images on the product main gallery:', array(), 'Admin.Theme.Transformer'),
			'name' => 'gallery_spacing',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		'gallery_image_type'=>array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Gallery image type:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'gallery_image_type',
			'default_value' => 'medium_default',
			'options' => array(
				'query' => array(),
				'id' => 'id',
				'name' => 'name',
			),
			'validation' => 'isGenericName',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Show brand logo on product page:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'show_brand_logo',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'show_brand_logo_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'show_brand_logo_name',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display brand name.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_logo_logo',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Display brand logo.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_logo_name_1',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Display brand name under the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_logo_logo_1',
					'value' => 5,
					'label' => $this->getTranslator()->trans('Display brand logo under the product name.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'show_brand_logo_on_secondary_column',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Display brand logo on the product secondary column.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'desc' => $this->getTranslator()->trans('Brand logo on product secondary column', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product tabs postion:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_tabs',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_tabs_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('At the bottom of product information.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_tabs_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('On the product center column.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Product tabs style:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'product_tabs_style',
			'is_bool' => true,
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'product_tabs_style_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Tab title left aligned.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_tabs_style_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Accordions with the first item open.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_tabs_style_4',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Accordions, all closed.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_tabs_style_2',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Tab title center aligned.', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'product_tabs_style_3',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Vertical tab.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'icon_path' => $this->_path,
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Remove product detials tab:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'remove_product_details_tab',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'remove_product_details_tab_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'remove_product_details_tab_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display product condition:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_pro_condition',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_pro_condition_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_pro_condition_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('New, used, refurbished', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display product reference code:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_pro_reference',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_pro_reference_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_pro_reference_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display product tags:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_pro_tags',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'display_pro_tags_disable',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_pro_tags_as_a_tab',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Tags tab', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'display_pro_tags_at_bottom_of_description',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Display tags with product information.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Zoom:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'enable_zoom',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'enable_zoom_disable',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'enable_zoom_enable',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'disable_zoom_on_mobile',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Disable zoom for touch devices.', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Enable Thickbox:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'enable_thickbox',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'enable_thickbox_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'enable_thickbox_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), 
		/*array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display tax label:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'display_tax_label',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'display_tax_label_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'display_tax_label_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'desc' => $this->getTranslator()->trans('In order to display the tax incl label, you need to activate taxes (Localization -> taxes -> Enable tax), make sure your country displays the label (Localization -> countries -> select your country -> display tax label) and to make sure the group of the customer is set to display price with taxes (BackOffice -> customers -> groups).', array(), 'Modules.Stthemeeditor.Admin'),
			'validation' => 'isBool',
		), */
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Google rich snippets for product:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'google_rich_snippets',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'google_rich_snippets_disable',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'google_rich_snippets_enable',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				/*array(
					'id' => 'google_rich_snippets_except_for_review_aggregate',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Enable except for Review-aggregate', array(), 'Modules.Stthemeeditor.Admin')),*/
			),
			'validation' => 'isUnsignedInt',
		),/*
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Show a print button:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_show_print_btn',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_show_print_btn_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_show_print_btn_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		), */

		
		/*'packitems_pro_per' => array(
			'type' => 'html',
			'id' => 'packitems_pro_per',
			'label'=> $this->getTranslator()->trans('The number of columns for Pack items', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => '',
		),*/
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[61]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Settings for one column product page', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Make the first section to be full screen:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_page_first_full_screen',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'pro_page_first_full_screen_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Enable', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'pro_page_first_full_screen_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Disabled', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
			'desc' => $this->getTranslator()->trans('Frist section is where the buy button, product thumbnails and product name located.', array(), 'Modules.Stthemeeditor.Admin'),
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('First section background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_page_first_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Second section background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_page_second_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
			'desc' => $this->getTranslator()->trans('Second section is generally where the product tabs located.', array(), 'Modules.Stthemeeditor.Admin'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[35]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Product info tabs or accordions', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Active tab text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_active_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_border_clolor',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab highlight border color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_hover_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab active background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_active_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Tab content background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_tab_content_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[38]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Product images slider', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('"Next" and "prev" buttons for product thumbs:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'thumbs_direction_nav',
			'default_value' => 3,
			'values' => array(
				array(
					'id' => 'thumbs_direction_nav_square',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Square', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'thumbs_direction_nav_circle',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Circle', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'thumbs_direction_nav_arrow',
					'value' => 2,
					'label' =>$this->getTranslator()->trans('Arrow', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('The main image slider\'s transition style:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'pro_main_image_trans',
			'default_value' => 0,
			'values' => array(
				array(
					'id' => 'pro_main_image_trans_slide',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Slide', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'pro_main_image_trans_fade',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Fade', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_color_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons disabled color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_color_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons background:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons hover background:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Prev/next buttons disabled background:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_prev_next_bg_disabled',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Navigation color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_pag_nav_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Navigation hover color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'pro_lr_pag_nav_bg_hover',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[37]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Sticky header/menu', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Sticky:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_option',
			'values' => array(
				array(
					'id' => 'sticky_option_no',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'sticky_option_menu',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Sticky menu', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_option_menu_animation',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Sticky menu(with animation)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_option_header',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Sticky header block', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_option_header_animation',
					'value' => 4,
					'label' => $this->getTranslator()->trans('Sticky header block(with animation)', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'desc' => array(
				$this->getTranslator()->trans('Header block include "Topbar", "Header" and "Menu".', array(), 'Modules.Stthemeeditor.Admin'),
				$this->getTranslator()->trans('Sticky menu option does not work for menu in header.', array(), 'Modules.Stthemeeditor.Admin'),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display topbar on sticky header block:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_topbar',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'sticky_topbar_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'sticky_topbar_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display header on sticky header block:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_primary_header',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'sticky_primary_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'sticky_primary_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Primary header height in sticky header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_header_height',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('Header includes topbar, primary header and menu. Primary header is the section where the logo is located.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Sticky header/menu background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Sticky header/menu background opacity:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Transparent header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_header',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'transparent_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'transparent_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Transparent header background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_header_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Transparent header background opacity:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_header_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow blur distance:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_shadow_blur',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Shadow color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_shadow_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Shadow opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'sticky_shadow_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);
$fields_form[39]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Mobile header', array(), 'Modules.Stthemeeditor.Admin'),
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Mobile header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_mobile_header',
			'values' => array(
				array(
					'id' => 'sticky_mobile_header_no_center',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Logo center', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_mobile_header_no_left',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Logo left', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_mobile_header_yes_center',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Sticky, logo center', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'sticky_mobile_header_yes_left',
					'value' => 3,
					'label' => $this->getTranslator()->trans('Sticky, logo left', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
			'desc' => $this->getTranslator()->trans('If you choose the "Logo left" or "Sticky, logo left", you have to transplant the "Megamenu" to the displayMobileBar hook to make the menu icon show up on mobile devices.', array(), 'Modules.Stthemeeditor.Admin'),
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Use mobile header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'use_mobile_header',
			'values' => array(
				array(
					'id' => 'use_mobile_header_small_devices',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Small devices(Screen width < 992px)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'use_mobile_header_mobile',
					'value' => 1,
					'label' => $this->getTranslator()->trans('All mobile devices(Android phone and tablet, iPhone, iPad)', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'use_mobile_header_all',
					'value' => 2,
					'label' => $this->getTranslator()->trans('All devices, mobile and desktop devices', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Display a text "menu" along with the menu icon on mobile version:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'menu_icon_with_text',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'menu_icon_with_text_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'menu_icon_with_text_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Mobile header height:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_mobile_header_height',
			'validation' => 'isUnsignedInt',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
		),
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text and icons color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_mobile_header_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Text and icons background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'sticky_mobile_header_text_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Admin.Theme.Transformer'),
			'name' => 'sticky_mobile_header_background',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Background color opacity:', array(), 'Admin.Theme.Transformer'),
			'name' => 'sticky_mobile_header_background_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
		array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Transparent mobile header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_mobile_header',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'transparent_mobile_header_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'transparent_mobile_header_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
		 /*array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Transparent header text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_mobile_header_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),*/
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Transparent header background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_mobile_header_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Transparent header background opacity:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'transparent_mobile_header_opacity',
			'validation' => 'isFloat',
			'class' => 'fixed-width-lg',
			'desc' => $this->getTranslator()->trans('From 0.0 (fully transparent) to 1.0 (fully opaque).', array(), 'Admin.Theme.Transformer'),
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[60]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Logo', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Display logo on center or left of the header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_position',
			'values' => array(
				array(
					'id' => 'logo_position_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'logo_position_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Logo width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_width',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('The width of your logo is ', array(), 'Modules.Stthemeeditor.Admin').Configuration::get('SHOP_LOGO_WIDTH'),
					$this->getTranslator()->trans('You can use this setting to resizing your logo, your logo would keep the same radius.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('If your logo is larger than 220px in wide, it will be resized down to 220px', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('This setting would not scale your logo up, it means if the vaule you filled in is large than the width of your logo, then your logo will displayed at its original size.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Logo width on sticky header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_width_sticky_header',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('You can use this setting to resizing your logo, your logo would keep the same radius.', array(), 'Modules.Stthemeeditor.Admin'),
					// $this->getTranslator()->trans('Your logo is 160px in wide in sticky header by default', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('This setting would not scale your logo up, it means if the vaule you filled in is large than the width of your logo, then your logo will displayed at its original size.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Logo width on mobile header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_width_mobile_header',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('You can use this setting to resizing your logo, your logo would keep the same radius.', array(), 'Modules.Stthemeeditor.Admin'),
					// $this->getTranslator()->trans('Your logo is 160px in wide in mobile header by default', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('This setting would not scale your logo up, it means if the vaule you filled in is large than the width of your logo, then your logo will displayed at its original size.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		),
		/*array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Logo width on sticky mobile header:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'logo_width_sticky_mobile_header',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
			'desc' => array(
					$this->getTranslator()->trans('You can use this setting to resizing your logo, your logo would keep the same radius.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('Your logo is 160px in wide in sticky mobile header by default', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('This setting would not scale your logo up, it means if the vaule you filled in is large than the width of your logo, then your logo will displayed at its original size.', array(), 'Modules.Stthemeeditor.Admin'),
					$this->getTranslator()->trans('Set it to 0 to use the defualt value.', array(), 'Modules.Stthemeeditor.Admin'),
				),
		),*/
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);


$fields_form[62]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Login page', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Page layout:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_layout',
			'default_value' => 1,
			'values' => array(
				array(
					'id' => 'auth_layout_0',
					'value' => 0,
					'label' => $this->getTranslator()->trans('One column, login form only', array(), 'Modules.Stthemeeditor.Admin')),
				array(
					'id' => 'auth_layout_1',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Two columns', array(), 'Modules.Stthemeeditor.Admin')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Login block width:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_login_width',
			'default_value' => 6,
			'options' => array(
				'query' => self::$width_map,
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => '',
				),
			),
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Top spacing:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_padding_top',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Bottom spacing:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_padding_bottom',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Heading:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_heading_align',
			'values' => array(
				array(
					'id' => 'auth_heading_align_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_heading_align_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_heading_align_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_heading_align_none',
					'value' => 3,
					'label' => $this->getTranslator()->trans('NO', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_heading_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Heading background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_heading_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Login from background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_con_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		),
		array(
			'type' => 'select',
			'label' => $this->getTranslator()->trans('Select a pattern number:', array(), 'Admin.Theme.Transformer'),
			'name' => 'auth_bg_pattern',
			'options' => array(
				'query' => $this->getPatternsArray(),
				'id' => 'id',
				'name' => 'name',
				'default' => array(
					'value' => 0,
					'label' => $this->getTranslator()->trans('None', array(), 'Admin.Theme.Transformer'),
				),
			),
			'desc' => $this->getPatterns(),
			'validation' => 'isUnsignedInt',
		),
		'auth_bg_image_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Upload your own pattern as background image:', array(), 'Admin.Theme.Transformer'),
			'name' => 'auth_bg_image_field',
			'desc' => '',
		),
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Repeat:', array(), 'Admin.Theme.Transformer'),
			'name' => 'auth_bg_repeat',
			'values' => array(
				array(
					'id' => 'auth_bg_repeat_xy',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Repeat xy', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_bg_repeat_x',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Repeat x', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_bg_repeat_y',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Repeat y', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_bg_repeat_no',
					'value' => 3,
					'label' => $this->getTranslator()->trans('No repeat', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		), 
		array(
			'type' => 'radio',
			'label' => $this->getTranslator()->trans('Background Position:', array(), 'Admin.Theme.Transformer'),
			'name' => 'auth_bg_position',
			'values' => array(
				array(
					'id' => 'auth_bg_repeat_left',
					'value' => 0,
					'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_bg_repeat_center',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'auth_bg_repeat_right',
					'value' => 2,
					'label' => $this->getTranslator()->trans('Right', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isUnsignedInt',
		),

		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button text color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_btn_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button text hover:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_btn_hover_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_btn_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Button hover background:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'auth_btn_hover_bg_color',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[63]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('Checkout page', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'checkout_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
		 array(
			'type' => 'color',
			'label' => $this->getTranslator()->trans('Container background color:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'checkout_con_bg',
			'class' => 'color',
			'size' => 20,
			'validation' => 'isColor',
		 ),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[64]['form'] = array(
	'legend' => array(
		'title' => $this->getTranslator()->trans('CMS page', array(), 'Admin.Theme.Transformer'),
	),
	'input' => array(
		array(
			'type' => 'text',
			'label' => $this->getTranslator()->trans('Font size:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cms_font_size',
			'prefix' => 'px',
			'class' => 'fixed-width-lg',
			'validation' => 'isUnsignedInt',
		),
		 array(
			'type' => 'switch',
			'label' => $this->getTranslator()->trans('Hide cms page title:', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'cms_title',
			'is_bool' => true,
			'values' => array(
				array(
					'id' => 'cms_title_on',
					'value' => 1,
					'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
				array(
					'id' => 'cms_title_off',
					'value' => 0,
					'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
			),
			'validation' => 'isBool',
		),  
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

$fields_form[18]['form'] = array(
	'input' => array(
		'icon_iphone_57_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Iphone/iPad Favicons 57 (PNG):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_iphone_57_field',
			'desc' => '',
		),
		'icon_iphone_72_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Iphone/iPad Favicons 72 (PNG):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_iphone_72_field',
			'desc' => '',
		),
		'icon_iphone_114_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Iphone/iPad Favicons 114 (PNG):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_iphone_114_field',
			'desc' => '',
		),
		'icon_iphone_144_field' => array(
			'type' => 'file',
			'label' => $this->getTranslator()->trans('Iphone/iPad Favicons 144 (PNG):', array(), 'Modules.Stthemeeditor.Admin'),
			'name' => 'icon_iphone_144_field',
			'desc' => '',
		),
	),
	'submit' => array(
		'title' => $this->getTranslator()->trans('Save', array(), 'Admin.Actions'),
	),
);

return $fields_form;