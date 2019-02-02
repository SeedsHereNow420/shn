<?php
$image_types_arr = array();
$imagesTypes = StBlogImageClass::getDefImageTypes();
foreach ($imagesTypes[1] as $k => $imageType) {
    if (!isset($imageType[0]) || !$imageType[0] || !isset($imageType[1]) || !$imageType[1]) {
        continue;
    }
    $image_types_arr[$k] = array('id' => $k, 'name' => $k.'('.$imageType[0].' x '.$imageType[1].')');
}

return array(
	'setting' => array(
        'rount_name' => array(
			'label' => $this->getTranslator()->trans('Route name', array(), 'Modules.Stblog.Admin'),
            'name' => 'rount_name',
			'lang' => true,
			'size' => 60,                        
			'type' => 'text',
            'desc' => $this->getTranslator()->trans('Default is "blog",for example: www.domain.com/blog', array(), 'Modules.Stblog.Admin'),                        
		),
         'show_all' => array(
            'label' => $this->getTranslator()->trans('Show all articles on blog homepage using the same category page settings', array(), 'Modules.Stblog.Admin'),
            'name' => 'show_all',
            'validation' => 'isBool',
            'default_value' => 0,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'show_all_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'show_all_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        'meta_title' => array(
            'label' => $this->getTranslator()->trans('Meta title', array(), 'Modules.Stblog.Admin'),
            'name' => 'meta_title',
            'lang' => true,
            'type' => 'text',
            'size' => 60,
        ),
        'meta_keywords' => array(
            'label' => $this->getTranslator()->trans('Meta keywords', array(), 'Modules.Stblog.Admin'),
            'name' => 'meta_keywords',
            'lang' => true,
            'size' => 60,
            'type' => 'text',
        ),
        'meta_description' => array(
            'label' => $this->getTranslator()->trans('Meta desciption', array(), 'Modules.Stblog.Admin'),
            'name' => 'meta_description',
            'lang' => true,
            'type' => 'textarea',
            'cols' => 60,
            'rows' => 6,
        ),
        'header_bottom_spacing'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Header bottom spacing on the blog homepage:', array(), 'Modules.Stblog.Admin'),
            'name' => 'header_bottom_spacing',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'desc' => $this->getTranslator()->trans('Set a spacing between header and content on the blog homepage.', array(), 'Admin.Theme.Transformer'),
        ), 
        'font_heading_size'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Heading font size:', array(), 'Modules.Stblog.Admin'),
            'name' => 'font_heading_size',
            'validation' => 'isUnsignedInt',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
        ), 
        'font_heading_trans'=>array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Heading transform:', array(), 'Modules.Stblog.Admin'),
            'name' => 'font_heading_trans',
            'options' => array(
                'query' => self::$textTransform,
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isUnsignedInt',
        ),
        'heading_bottom_border'=>array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Heading border height:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_bottom_border',
            'validation' => 'isNullOrUnsignedId',
            'prefix' => 'px',
            'default_value' => '',
            'class' => 'fixed-width-lg',
        ),
        'block_headings_color'=>array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Heading color:', array(), 'Modules.Stblog.Admin'),
            'name' => 'block_headings_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
         'heading_bottom_border_color'=>array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Heading border color:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_bottom_border_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
        'heading_bottom_border_color_h'=> array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Heading border highlight color:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_bottom_border_color_h',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
        'heading_style'=>array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Heading style:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_style',
            'values' => array(
                array(
                    'id' => 'heading_style_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Default, under line', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'heading_style_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('One line. Can not have background image', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'heading_style_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Two lines', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'heading_style_3',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('One short line. Can not have background image', array(), 'Modules.Stblog.Admin')),
            ),
            'icon_path' => $this->_path,
            'validation' => 'isUnsignedInt',
        ), 
        'heading_bg_pattern'=>array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Heading background pattern:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_bg_pattern',
            'options' => array(
                'query' => $this->getPatternsArray(6),
                'id' => 'id',
                'name' => 'name',
                'default' => array(
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('None', array(), 'Modules.Stblog.Admin'),
                ),
            ),
            'desc' => $this->getPatterns(6,'heading_bg'),
            'validation' => 'isUnsignedInt',
        ),
        'heading_bg_image' => array(
            'type' => 'file',
            'label' => $this->getTranslator()->trans('Heading background image:', array(), 'Modules.Stblog.Admin'),
            'name' => 'heading_bg_image',
            'desc' => '',
        ),
	),
    'related' => array(),
    'slideshow' => array(),
    'image' => array(
        'img_gallery_lg_w' => array(
			'label' => $this->getTranslator()->trans('Large width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_lg_w',
			'validation' => 'isUnsignedInt',
            'default_value' => 870,
            'hint' => $this->getTranslator()->trans('Images dimension of large width', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
        'img_gallery_lg_h' => array(
			'label' => $this->getTranslator()->trans('Large height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_lg_h',
			'validation' => 'isUnsignedInt',
            'default_value' => 450,
            'hint' => $this->getTranslator()->trans('Images dimension of large height', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
        'img_gallery_bg_w' => array(
            'label' => $this->getTranslator()->trans('Big width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_bg_w',
            'validation' => 'isUnsignedInt',
            'default_value' => 400,
            'hint' => $this->getTranslator()->trans('This is not used by default. If you have two different sizes of posts on the homepage, you can aplly this to one and Medium to another. Check the documenation for more info.', array(), 'Modules.Stblog.Admin'),
            'type' => 'text',
            'suffix' => 'px'
        ),
        'img_gallery_bg_h' => array(
            'label' => $this->getTranslator()->trans('Big height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_bg_h',
            'validation' => 'isUnsignedInt',
            'default_value' => 300,
            'hint' => $this->getTranslator()->trans('This is not used by default. If you have two different sizes of posts on the homepage, you can aplly this to one and Medium to another. Check the documenation for more info.', array(), 'Modules.Stblog.Admin'),
            'type' => 'text',
            'suffix' => 'px'
        ),
        'img_gallery_md_w' => array(
            'label' => $this->getTranslator()->trans('Medium width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_md_w',
            'validation' => 'isUnsignedInt',
            'default_value' => 580,
            'hint' => $this->getTranslator()->trans('Images dimension of medium width', array(), 'Modules.Stblog.Admin'),
            'type' => 'text',
            'suffix' => 'px'
        ),
        'img_gallery_md_h' => array(
            'label' => $this->getTranslator()->trans('Medium height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_md_h',
            'validation' => 'isUnsignedInt',
            'default_value' => 400,
            'hint' => $this->getTranslator()->trans('Images dimension of medium height', array(), 'Modules.Stblog.Admin'),
            'type' => 'text',
            'suffix' => 'px'
        ),
        'img_gallery_sm_w' => array(
			'label' => $this->getTranslator()->trans('Small width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_sm_w',
			'validation' => 'isUnsignedInt',
            'default_value' => 180,
            'hint' => $this->getTranslator()->trans('Images dimension of small width', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
        'img_gallery_sm_h' => array(
			'label' => $this->getTranslator()->trans('Small height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_sm_h',
			'validation' => 'isUnsignedInt',
            'default_value' => 124,
            'hint' => $this->getTranslator()->trans('Images dimension of small height', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
        'img_gallery_xs_w' => array(
			'label' => $this->getTranslator()->trans('Thumb width', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_xs_w',
			'validation' => 'isUnsignedInt',
            'default_value' => 70,
            'hint' => $this->getTranslator()->trans('Images dimension of thumb width', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px'
		),
        'img_gallery_xs_h' => array(
			'label' => $this->getTranslator()->trans('Thumb height', array(), 'Modules.Stblog.Admin'),
            'name' => 'img_gallery_xs_h',
			'validation' => 'isUnsignedInt',
            'default_value' => 70,
            'hint' => $this->getTranslator()->trans('Images dimension of thumb height', array(), 'Modules.Stblog.Admin'),
			'type' => 'text',
            'suffix' => 'px',
            'desc' => '<br><br><div class="alert alert-info">
				'.$this->getTranslator()->trans('Regenerates thumbnails for all existing blog images', array(), 'Modules.Stblog.Admin').'<br>
				'.$this->getTranslator()->trans('Please be patient. This can take several minutes.', array(), 'Modules.Stblog.Admin').'<br>
				'.$this->getTranslator()->trans('Be careful! Manually uploaded thumbnails will be erased and replaced by automatically generated thumbnails.', array(), 'Modules.Stblog.Admin').'
			</div>
            <script type="text/javascript">var c_msg = "'.$this->getTranslator()->trans('Are you sure ?', array(), 'Modules.Stblog.Admin').'";</script>
            <div id="progress-warning" class="alert alert-warning" style="display: none">
        		'.$this->getTranslator()->trans('In progress, Please do not leave this page...', array(), 'Modules.Stblog.Admin').'
        	</div>
            <div id="ajax-message-ok" class="conf ajax-message alert alert-success" style="display: none">
            	<span class="message">'.$this->getTranslator()->trans('Regenerate thumbails successfully.', array(), 'Modules.Stblog.Admin').'</span>
            </div>
            <div id="ajax-message-ko" class="error ajax-message alert alert-danger" style="display: none">
            	<span class="message"></span>
            </div>
            <button type="button" name="submitRegenerateimage_type" class="btn btn-default pull-left" id="btn_regenerate_thumbs">
				<i class="process-icon-cogs"></i> Regenerate thumbnails
			</button>'
		),
	),
    'blog_block' => array(
        'length_of_name' => array(
            'label' => $this->getTranslator()->trans('Length of article names', array(), 'Modules.Stblog.Admin'),
            'name' => 'length_of_name',
            'type' => 'radio',
            'default_value' => 0,
            'validation' => 'isUnsignedInt',
            'values' => array(
                array(
                    'id' => 'length_of_name_normal',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Normal(one line)', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'length_of_name_long',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Long(70 characters)', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'length_of_name_full',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Full name', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'length_of_name_two',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Two lines, focus all blog names having the same height', array(), 'Modules.Stblog.Admin')),
            ),
        ),
        'name_font_select' => array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Google fonts:', array(), 'Admin.Theme.Transformer'),
            'name' => 'name_font_select',
            'onchange' => 'handle_font_change(this);',
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
        'name_font_weight'=>array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Font weight:', array(), 'Admin.Theme.Transformer'),
            'onchange' => 'handle_font_style(this);',
            'name' => 'name_font_weight',
            'default_value' => 700,
            'options' => array(
                'query' => $this->variants,
                'id' => 'id',
                'name' => 'name',
            ),
            'default_value' => '',
            'validation' => 'isAnything',
            'desc' => '<p id="google_font_example" class="fontshow">Example Title</p>'.$this->google_font_link,
        ),
        'name_transform' => array(
            'type' => 'select',
            'label' => $this->getTranslator()->trans('Name transform:', array(), 'Modules.Stblog.Admin'),
            'name' => 'name_transform',
            'default_value' => 0,
            'options' => array(
                'query' => self::$textTransform,
                'id' => 'id',
                'name' => 'name',
            ),
            'validation' => 'isUnsignedInt',
        ),
        'name_size' => array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Name font size:', array(), 'Admin.Theme.Transformer'),
            'name' => 'name_size',
            'default_value' => 16,
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
            'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
        ),
        'name_color'=>array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Name color:', array(), 'Modules.Stblog.Admin'),
            'name' => 'name_color',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
        ),
        'display_viewcount' => array(
            'label' => $this->getTranslator()->trans('Display viewcount on each post', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_viewcount',
            'validation' => 'isBool',
            'default_value' => 0,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'display_viewcount_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_viewcount_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        'display_comment_count' => array(
            'label' => $this->getTranslator()->trans('Display the total number of comments', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_comment_count',
            'validation' => 'isBool',
            'default_value' => 1,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'display_comment_count_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_comment_count_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        'display_author' => array(
            'label' => $this->getTranslator()->trans('Display author name', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_author',
            'validation' => 'isBool',
            'default_value' => 1,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'display_author_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_author_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        'display_date' => array(
            'label' => $this->getTranslator()->trans('Display the date', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_date',
            'validation' => 'isUnsignedInt',
            'default_value' => 2,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_date_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_date_timeago',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Time Since Posted, like 2 days ago, 1 month ago', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_date_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        'display_read_more' => array(
            'label' => $this->getTranslator()->trans('Display a read more button', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_read_more',
            'validation' => 'isUnsignedInt',
            'default_value' => 0,
            'type' => 'radio',
            'values' => array(
                array(
                    'id' => 'display_read_more_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes, display as buttons', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_read_more_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Yes, display as links', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_read_more_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
            'desc' => $this->getTranslator()->trans('Read more buttons display along with short content, which means if a block does not showing short content, read more buttons would also do not show out in this block.', array(), 'Admin.Theme.Transformer'),
        ),
        'blog_block_align' => array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Blog info alignment:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_block_align',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'blog_block_align_0',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('Center', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'blog_block_align_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Left', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isUnsignedInt',
        ), 

        'blog_grid_bg' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Blog grid background:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_grid_bg',
            'class' => 'color',
            'size' => 20,
            'validation' => 'isColor',
         ),
        'blog_grid_hover_bg' => array(
            'type' => 'color',
            'label' => $this->getTranslator()->trans('Blog grid hover background:', array(), 'Modules.Stblog.Admin'),
            'name' => 'blog_grid_hover_bg',
            'class' => 'color',
            'size' => 20,
            'default_value' => '#ffffff',
            'validation' => 'isColor',
         ),
    ),
    'category' => array(
        'cate_layouts' => array(
            'label' => $this->getTranslator()->trans('Category layout', array(), 'Modules.Stblog.Admin'),
            'name' => 'cate_layouts',
            'type' => 'radio',
            'default_value' => 1,
            'validation' => 'isUnsignedInt',
             'values' => array(
                array(
                    'id' => 'cate_layouts_1',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('List', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'cate_layouts_2',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Medium image', array(), 'Modules.Stblog.Admin')),
                array(
                    'id' => 'cate_layouts_3',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Grid', array(), 'Modules.Stblog.Admin')),
            ),
        ),
        'blog_image_type'=>array(
                'type' => 'select',
                'label' => $this->getTranslator()->trans('Image type:', array(), 'Admin.Theme.Transformer'),
                'name' => 'blog_image_type',
                'default_value' => '',
                'options' => array(
                    'query' => $image_types_arr,
                    'id' => 'id',
                    'name' => 'name',
                    'default' => array(
                        'value' => '',
                        'label' => '-',
                    ),
                ),
                'validation' => 'isGenericName',
            ),
        'per_page' => array(
            'label' => $this->getTranslator()->trans('Blogs per page', array(), 'Modules.Stblog.Admin'),
            'name' => 'per_page',
            'default_value' => 10,
            'validation' => 'isUnsignedInt',
            'type' => 'text',
            'class' => 'fixed-width-sm',
            'desc' => $this->getTranslator()->trans('Number of blogs displayed per page. Default is 10.', array(), 'Modules.Stblog.Admin'),
        ),
        'cate_sort_by' => array(
            'label' => $this->getTranslator()->trans('Default sort by', array(), 'Modules.Stblog.Admin'),
            'name' => 'cate_sort_by',
            'validation' => 'isUnsignedInt',
            'type' => 'select',
            'options' => array(
                'query' => $this->sort_by,
                'id' => 'id',
                'name' => 'name',
            ),
        ),
        'dropdownlistgroup' => array(
            'type' => 'dropdownlistgroup',
            'label' => $this->getTranslator()->trans('Articles per row in grid view:', array(), 'Admin.Theme.Transformer'),
            'name' => 'pro_per_grid',
            'values' => array(
                    'maximum' => 12,
                    'medias' => array('fw','xxl','xl','lg','md','sm','xs'),
                ),
            'desc' => $this->getTranslator()->trans('7, 9 and 11 can not be used in grid view, they will be automatically decreased to 6, 8 and 10. Set a value for the "Full width" drop down list to make this module fullwidth in the fullwidth* hooks, but the value of "Full width" drop down menu would not take effect in grid view.', array(), 'Admin.Theme.Transformer'),
        ), 
        'display_sd' => array(
            'type' => 'radio',
            'label' => $this->getTranslator()->trans('Display blog short content:', array(), 'Admin.Theme.Transformer'),
            'name' => 'display_sd',
            'default_value' => 1,
            'values' => array(
                array(
                    'id' => 'display_sd_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_sd_short',
                    'value' => 3,
                    'label' => $this->getTranslator()->trans('Short content, 120 characters', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_sd_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Short content, 220 characters', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_sd_full',
                    'value' => 2,
                    'label' => $this->getTranslator()->trans('Full short content', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_sd_4',
                    'value' => 4,
                    'label' => $this->getTranslator()->trans('Content, 120 characters', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_sd_5',
                    'value' => 5,
                    'label' => $this->getTranslator()->trans('Content, 220 characters', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_sd_6',
                    'value' => 6,
                    'label' => $this->getTranslator()->trans('Content, about 5 lines', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_sd_7',
                    'value' => 7,
                    'label' => $this->getTranslator()->trans('Content, about 10 lines', array(), 'Admin.Theme.Transformer')),
            ),
            'validation' => 'isUnsignedInt',
        ),
    ),
    'article' => array(
        'post_heading_size' => array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Blog heading size:', array(), 'Admin.Theme.Transformer'),
            'name' => 'post_heading_size',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
            'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
        ),
        'post_font_size' => array(
            'type' => 'text',
            'label' => $this->getTranslator()->trans('Font size:', array(), 'Admin.Theme.Transformer'),
            'name' => 'post_font_size',
            'prefix' => 'px',
            'class' => 'fixed-width-lg',
            'validation' => 'isUnsignedInt',
            'desc' => $this->getTranslator()->trans('Set it to 0 to use the default value.', array(), 'Admin.Theme.Transformer'),
        ),
        'display_short_content' => array(
            'label' => $this->getTranslator()->trans('Display short content at the top of content', array(), 'Modules.Stblog.Admin'),
            'name' => 'display_short_content',
            'validation' => 'isBool',
            'default_value' => 0,
            'type' => 'switch',
            'values' => array(
                array(
                    'id' => 'display_short_content_on',
                    'value' => 1,
                    'label' => $this->getTranslator()->trans('Yes', array(), 'Admin.Theme.Transformer')),
                array(
                    'id' => 'display_short_content_off',
                    'value' => 0,
                    'label' => $this->getTranslator()->trans('No', array(), 'Admin.Theme.Transformer')),
            ),
        ),
        
    ),
);