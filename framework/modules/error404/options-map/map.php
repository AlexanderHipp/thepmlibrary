<?php

if ( ! function_exists('superfood_elated_error_404_options_map') ) {

	function superfood_elated_error_404_options_map() {

		superfood_elated_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'superfood'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_header = superfood_elated_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_header',
			'title'	=> esc_html__('Header', 'superfood')
		));

		superfood_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'color',
				'name' => '404_menu_area_background_color_header',
				'label' => esc_html__('Background Color', 'superfood'),
				'description' => esc_html__('Choose a background color for header area', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'text',
				'name' => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label' => esc_html__('Background Transparency', 'superfood'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'color',
				'name' => '404_menu_area_border_color_header',
				'default_value' => '',
				'label' => esc_html__('Border Color', 'superfood'),
				'description' => esc_html__('Choose a border bottom color for header area', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $panel_404_header,
				'type' => 'select',
				'name' => '404_header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'superfood'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'superfood'),
				'options' => array(
					'' => esc_html__('Default', 'superfood'),
					'light-header' => esc_html__('Light', 'superfood'),
					'dark-header' => esc_html__('Dark', 'superfood')
				)
			)
		);

		$panel_404_options = superfood_elated_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Options', 'superfood')
		));

		superfood_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'color',
				'name' => '404_page_background_color',
				'label' => esc_html__('Background Color', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_image',
				'label' => esc_html__('Background Image', 'superfood'),
				'description' => esc_html__('Choose a background image for 404 page', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_pattern_image',
				'label' => esc_html__('Pattern Background Image', 'superfood'),
				'description' => esc_html__('Choose a pattern image for 404 page', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_title_image',
				'label' => esc_html__('Title Image', 'superfood'),
				'description' => esc_html__('Choose a background image for displaying above 404 page Title', 'superfood')
			)
		);

        superfood_elated_add_admin_field(
            array(
                'parent' => $panel_404_options,
                'type' => 'select',
                'name' => '404_vertical_align',
                'default_value' => 'middle',
                'label' => esc_html__('Vertical Alignment', 'superfood'),
                'options' => array(
                    'middle' => esc_html__('Middle', 'superfood'),
                    'bottom' => esc_html__('Bottom', 'superfood'),
                )
            )
        );

        superfood_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'superfood'),
			'description' => esc_html__('Enter title for 404 page. Default label is "404".', 'superfood')
		));

		$first_level_group = superfood_elated_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'first_level_group',
				'title' => esc_html__('Title Style', 'superfood'),
				'description' => esc_html__('Define styles for 404 page title', 'superfood')
			)
		);

		$first_level_row1 = superfood_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'colorsimple',
				'name' => '404_title_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'fontsimple',
				'name' => '404_title_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'textsimple',
				'name' => '404_title_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type' => 'textsimple',
				'name' => '404_title_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_row2 = superfood_elated_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'superfood'),
				'options' => superfood_elated_get_font_style_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'superfood'),
				'options' => superfood_elated_get_font_weight_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'textsimple',
				'name' => '404_title_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_title_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'superfood'),
				'options' => superfood_elated_get_text_transform_array()
			)
		);

		superfood_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_subtitle',
			'default_value' => '',
			'label' => esc_html__('Subtitle', 'superfood'),
			'description' => esc_html__('Enter subtitle for 404 page. Default label is "PAGE NOT FOUND".', 'superfood')
		));

		$second_level_group = superfood_elated_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'second_level_group',
				'title' => esc_html__('Subtitle Style', 'superfood'),
				'description' => esc_html__('Define styles for 404 page subtitle', 'superfood')
			)
		);

		$second_level_row1 = superfood_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'colorsimple',
				'name' => '404_subtitle_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'fontsimple',
				'name' => '404_subtitle_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'textsimple',
				'name' => '404_subtitle_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type' => 'textsimple',
				'name' => '404_subtitle_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row2 = superfood_elated_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_subtitle_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'superfood'),
				'options' => superfood_elated_get_font_style_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_subtitle_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'superfood'),
				'options' => superfood_elated_get_font_weight_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'textsimple',
				'name' => '404_subtitle_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_subtitle_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'superfood'),
				'options' => superfood_elated_get_text_transform_array()
			)
		);

		superfood_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'superfood'),
			'description' => esc_html__('Enter text for 404 page.', 'superfood')
		));

		$third_level_group = superfood_elated_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => '$third_level_group',
				'title' => esc_html__('Text Style', 'superfood'),
				'description' => esc_html__('Define styles for 404 page text', 'superfood')
			)
		);

		$third_level_row1 = superfood_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => '$third_level_row1'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'colorsimple',
				'name' => '404_text_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'fontsimple',
				'name' => '404_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'textsimple',
				'name' => '404_text_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type' => 'textsimple',
				'name' => '404_text_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row2 = superfood_elated_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name' => '$third_level_row2',
				'next' => true
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'superfood'),
				'options' => superfood_elated_get_font_style_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'superfood'),
				'options' => superfood_elated_get_font_weight_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'textsimple',
				'name' => '404_text_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_row2,
				'type' => 'selectblanksimple',
				'name' => '404_text_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'superfood'),
				'options' => superfood_elated_get_text_transform_array()
			)
		);

		superfood_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'label' => esc_html__('Back to Home Button Label', 'superfood'),
			'description' => esc_html__('Enter label for "BACK TO HOME" button', 'superfood')
		));

		superfood_elated_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'select',
				'name' => '404_button_style',
				'default_value' => '',
				'label' => esc_html__('Button Skin', 'superfood'),
				'description' => esc_html__('Choose a style to make Back to Home button in that predefined style', 'superfood'),
				'options' => array(
					'' => esc_html__('Default', 'superfood'),
					'light-button' => esc_html__('Light', 'superfood'),
					'dark-button' => esc_html__('Dark', 'superfood')
				)
			)
		);
	}

	add_action( 'superfood_elated_options_map', 'superfood_elated_error_404_options_map', 14);
}