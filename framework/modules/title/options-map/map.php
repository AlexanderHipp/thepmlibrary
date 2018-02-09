<?php

if ( ! function_exists('superfood_elated_title_options_map') ) {

	function superfood_elated_title_options_map() {

		superfood_elated_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__('Title', 'superfood'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = superfood_elated_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Show Title Area', 'superfood'),
				'description' => esc_html__('This option will enable/disable Title Area', 'superfood'),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltdf_show_title_area_container"
				)
			)
		);

		$show_title_area_container = superfood_elated_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'name' => 'title_area_type',
				'type' => 'select',
				'default_value' => 'breadcrumbs',
				'label' => esc_html__('Title Area Type', 'superfood'),
				'description' => esc_html__('Choose title type', 'superfood'),
				'parent' => $show_title_area_container,
				'options' => array(
					'standard' => esc_html__('Standard', 'superfood'),
					'breadcrumbs' => esc_html__('Simple With Breadcrumbs', 'superfood')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"standard" => "",
						"breadcrumbs" => "#eltdf_title_area_type_container"
					),
					"show" => array(
						"standard" => "#eltdf_title_area_type_container",
						"breadcrumbs" => ""
					)
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'left',
				'label' => esc_html__('Horizontal Alignment', 'superfood'),
				'description' => esc_html__('Specify title horizontal alignment', 'superfood'),
				'parent' => $show_title_area_container,
				'options' => array(
					'left' => esc_html__('Left', 'superfood'),
					'center' => esc_html__('Center', 'superfood')
				)
			)
		);

		$title_area_type_container = superfood_elated_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_values' => array('breadcrumbs'),
			)
		);

			superfood_elated_add_admin_field(
				array(
					'name' => 'title_area_vertial_alignment',
					'type' => 'select',
					'default_value' => 'header_bottom',
					'label' => esc_html__('Vertical Alignment', 'superfood'),
					'description' => esc_html__('Specify title vertical alignment', 'superfood'),
					'parent' => $title_area_type_container,
					'options' => array(
						'header_bottom' => esc_html__('From Bottom of Header', 'superfood'),
						'window_top' => esc_html__('From Window Top', 'superfood')
					)
				)
			);

		superfood_elated_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'superfood'),
				'description' => esc_html__('Choose a background color for Title Area', 'superfood'),
				'parent' => $show_title_area_container
			)
		);

		superfood_elated_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' => esc_html__('Background Image', 'superfood'),
				'description' => esc_html__('Choose an Image for Title Area', 'superfood'),
				'parent' => $show_title_area_container
			)
		);

		superfood_elated_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Background Responsive Image', 'superfood'),
				'description' => esc_html__('Enabling this option will make Title background image responsive', 'superfood'),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#eltdf_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = superfood_elated_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Background Image in Parallax', 'superfood'),
				'description' => esc_html__('Enabling this option will make Title background image parallax', 'superfood'),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__('No', 'superfood'),
					'yes' => esc_html__('Yes', 'superfood'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'superfood')
				)
			)
		);

		superfood_elated_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__('Height', 'superfood'),
			'description' => esc_html__('Set a height for Title Area', 'superfood'),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));


		$panel_typography = superfood_elated_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__('Typography', 'superfood')
			)
		);

        superfood_elated_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__('Title', 'superfood'),
            'parent' => $panel_typography
        ));

        $group_page_title_styles = superfood_elated_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title'			=> esc_html__('Simple Type', 'superfood'),
			'description'	=> esc_html__('Define styles for page title simple with breadcrumbs type', 'superfood'),
			'parent'		=> $panel_typography
		));

			$row_page_title_styles_1 = superfood_elated_add_admin_row(array(
				'name'		=> 'row_page_title_styles_1',
				'parent'	=> $group_page_title_styles
			));
		
				superfood_elated_add_admin_field(array(
					'type'			=> 'colorsimple',
					'name'			=> 'page_title_color',
					'default_value'	=> '',
					'label'			=> esc_html__('Text Color', 'superfood'),
					'parent'		=> $row_page_title_styles_1
				));
		
				superfood_elated_add_admin_field(array(
					'type'			=> 'textsimple',
					'name'			=> 'page_title_fontsize',
					'default_value'	=> '',
					'label'			=> esc_html__('Font Size', 'superfood'),
					'args'			=> array(
						'suffix'	=> 'px'
					),
					'parent'		=> $row_page_title_styles_1
				));
		
				superfood_elated_add_admin_field(array(
					'type'			=> 'textsimple',
					'name'			=> 'page_title_lineheight',
					'default_value'	=> '',
					'label'			=> esc_html__('Line Height', 'superfood'),
					'args'			=> array(
						'suffix'	=> 'px'
					),
					'parent'		=> $row_page_title_styles_1
				));
		
				superfood_elated_add_admin_field(array(
					'type'			=> 'selectblanksimple',
					'name'			=> 'page_title_texttransform',
					'default_value'	=> '',
					'label'			=> esc_html__('Text Transform', 'superfood'),
					'options'		=> superfood_elated_get_text_transform_array(),
					'parent'		=> $row_page_title_styles_1
				));
		
			$row_page_title_styles_2 = superfood_elated_add_admin_row(array(
				'name'		=> 'row_page_title_styles_2',
				'parent'	=> $group_page_title_styles,
				'next'		=> true
			));
		
				superfood_elated_add_admin_field(array(
					'type'			=> 'fontsimple',
					'name'			=> 'page_title_google_fonts',
					'default_value'	=> '-1',
					'label'			=> esc_html__('Font Family', 'superfood'),
					'parent'		=> $row_page_title_styles_2
				));
		
				superfood_elated_add_admin_field(array(
					'type'			=> 'selectblanksimple',
					'name'			=> 'page_title_fontstyle',
					'default_value'	=> '',
					'label'			=> esc_html__('Font Style', 'superfood'),
					'options'		=> superfood_elated_get_font_style_array(),
					'parent'		=> $row_page_title_styles_2
				));
		
				superfood_elated_add_admin_field(array(
					'type'			=> 'selectblanksimple',
					'name'			=> 'page_title_fontweight',
					'default_value'	=> '',
					'label'			=> esc_html__('Font Weight', 'superfood'),
					'options'		=> superfood_elated_get_font_weight_array(),
					'parent'		=> $row_page_title_styles_2
				));
		
				superfood_elated_add_admin_field(array(
					'type'			=> 'textsimple',
					'name'			=> 'page_title_letter_spacing',
					'default_value'	=> '',
					'label'			=> esc_html__('Letter Spacing', 'superfood'),
					'args'			=> array(
						'suffix'	=> 'px'
					),
					'parent'		=> $row_page_title_styles_2
				));

        $group_page_title_normal_styles = superfood_elated_add_admin_group(array(
            'name'			=> 'group_page_title_normal_styles',
            'title'			=> esc_html__('Standard Type', 'superfood'),
            'description'	=> esc_html__('Define styles for page title standard type', 'superfood'),
            'parent'		=> $panel_typography
        ));

	        $row_page_title_normal_styles_1 = superfood_elated_add_admin_row(array(
	            'name'		=> 'row_page_title_normal_styles_1',
	            'parent'	=> $group_page_title_normal_styles
	        ));

		        superfood_elated_add_admin_field(array(
		            'type'			=> 'colorsimple',
		            'name'			=> 'page_title_normal_color',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Text Color', 'superfood'),
		            'parent'		=> $row_page_title_normal_styles_1
		        ));
		
		        superfood_elated_add_admin_field(array(
		            'type'			=> 'textsimple',
		            'name'			=> 'page_title_normal_fontsize',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Font Size', 'superfood'),
		            'args'			=> array(
		                'suffix'	=> 'px'
		            ),
		            'parent'		=> $row_page_title_normal_styles_1
		        ));
		
		        superfood_elated_add_admin_field(array(
		            'type'			=> 'textsimple',
		            'name'			=> 'page_title_normal_lineheight',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Line Height', 'superfood'),
		            'args'			=> array(
		                'suffix'	=> 'px'
		            ),
		            'parent'		=> $row_page_title_normal_styles_1
		        ));
		
		        superfood_elated_add_admin_field(array(
		            'type'			=> 'selectblanksimple',
		            'name'			=> 'page_title_normal_texttransform',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Text Transform', 'superfood'),
		            'options'		=> superfood_elated_get_text_transform_array(),
		            'parent'		=> $row_page_title_normal_styles_1
		        ));

	        $row_page_title_normal_styles_2 = superfood_elated_add_admin_row(array(
	            'name'		=> 'row_page_title_normal_styles_2',
	            'parent'	=> $group_page_title_normal_styles,
	            'next'		=> true
	        ));

		        superfood_elated_add_admin_field(array(
		            'type'			=> 'fontsimple',
		            'name'			=> 'page_title_normal_google_fonts',
		            'default_value'	=> '-1',
		            'label'			=> esc_html__('Font Family', 'superfood'),
		            'parent'		=> $row_page_title_normal_styles_2
		        ));
		
		        superfood_elated_add_admin_field(array(
		            'type'			=> 'selectblanksimple',
		            'name'			=> 'page_title_normal_fontstyle',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Font Style', 'superfood'),
		            'options'		=> superfood_elated_get_font_style_array(),
		            'parent'		=> $row_page_title_normal_styles_2
		        ));
		
		        superfood_elated_add_admin_field(array(
		            'type'			=> 'selectblanksimple',
		            'name'			=> 'page_title_normal_fontweight',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Font Weight', 'superfood'),
		            'options'		=> superfood_elated_get_font_weight_array(),
		            'parent'		=> $row_page_title_normal_styles_2
		        ));
		
		        superfood_elated_add_admin_field(array(
		            'type'			=> 'textsimple',
		            'name'			=> 'page_title_normal_letter_spacing',
		            'default_value'	=> '',
		            'label'			=> esc_html__('Letter Spacing', 'superfood'),
		            'args'			=> array(
		                'suffix'	=> 'px'
		            ),
		            'parent'		=> $row_page_title_normal_styles_2
		        ));
		

        superfood_elated_add_admin_section_title(array(
            'name' => 'type_section_subtitle',
            'title' => esc_html__('Subtitle', 'superfood'),
            'parent' => $panel_typography
        ));

			$group_page_subtitle_styles = superfood_elated_add_admin_group(array(
				'name'			=> 'group_page_subtitle_styles',
				'title'			=> esc_html__('Subtitle', 'superfood'),
				'description'	=> esc_html__('Define styles for page subtitle', 'superfood'),
				'parent'		=> $panel_typography
			));

				$row_page_subtitle_styles_1 = superfood_elated_add_admin_row(array(
					'name'		=> 'row_page_subtitle_styles_1',
					'parent'	=> $group_page_subtitle_styles
				));

					superfood_elated_add_admin_field(array(
						'type'			=> 'colorsimple',
						'name'			=> 'page_subtitle_color',
						'default_value'	=> '',
						'label'			=> esc_html__('Text Color', 'superfood'),
						'parent'		=> $row_page_subtitle_styles_1
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_subtitle_fontsize',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Size', 'superfood'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_subtitle_styles_1
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_subtitle_lineheight',
						'default_value'	=> '',
						'label'			=> esc_html__('Line Height', 'superfood'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_subtitle_styles_1
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_subtitle_texttransform',
						'default_value'	=> '',
						'label'			=> esc_html__('Text Transform', 'superfood'),
						'options'		=> superfood_elated_get_text_transform_array(),
						'parent'		=> $row_page_subtitle_styles_1
					));

				$row_page_subtitle_styles_2 = superfood_elated_add_admin_row(array(
					'name'		=> 'row_page_subtitle_styles_2',
					'parent'	=> $group_page_subtitle_styles,
					'next'		=> true
				));

					superfood_elated_add_admin_field(array(
						'type'			=> 'fontsimple',
						'name'			=> 'page_subtitle_google_fonts',
						'default_value'	=> '-1',
						'label'			=> esc_html__('Font Family', 'superfood'),
						'parent'		=> $row_page_subtitle_styles_2
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_subtitle_fontstyle',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Style', 'superfood'),
						'options'		=> superfood_elated_get_font_style_array(),
						'parent'		=> $row_page_subtitle_styles_2
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_subtitle_fontweight',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Weight', 'superfood'),
						'options'		=> superfood_elated_get_font_weight_array(),
						'parent'		=> $row_page_subtitle_styles_2
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_subtitle_letter_spacing',
						'default_value'	=> '',
						'label'			=> esc_html__('Letter Spacing', 'superfood'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_subtitle_styles_2
					));

        superfood_elated_add_admin_section_title(array(
            'name' => 'type_section_breadcrumbs',
            'title' => esc_html__('Breadcrumbs', 'superfood'),
            'parent' => $panel_typography
        ));

			$group_page_breadcrumbs_styles = superfood_elated_add_admin_group(array(
				'name'			=> 'group_page_breadcrumbs_styles',
				'title'			=> esc_html__('Breadcrumbs', 'superfood'),
				'description'	=> esc_html__('Define styles for page breadcrumbs', 'superfood'),
				'parent'		=> $panel_typography
			));

				$row_page_breadcrumbs_styles_1 = superfood_elated_add_admin_row(array(
					'name'		=> 'row_page_breadcrumbs_styles_1',
					'parent'	=> $group_page_breadcrumbs_styles
				));

					superfood_elated_add_admin_field(array(
						'type'			=> 'colorsimple',
						'name'			=> 'page_breadcrumbs_color',
						'default_value'	=> '',
						'label'			=> esc_html__('Text Color', 'superfood'),
						'parent'		=> $row_page_breadcrumbs_styles_1
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_breadcrumbs_fontsize',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Size', 'superfood'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_breadcrumbs_styles_1
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_breadcrumbs_lineheight',
						'default_value'	=> '',
						'label'			=> esc_html__('Line Height', 'superfood'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_breadcrumbs_styles_1
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_breadcrumbs_texttransform',
						'default_value'	=> '',
						'label'			=> esc_html__('Text Transform', 'superfood'),
						'options'		=> superfood_elated_get_text_transform_array(),
						'parent'		=> $row_page_breadcrumbs_styles_1
					));

				$row_page_breadcrumbs_styles_2 = superfood_elated_add_admin_row(array(
					'name'		=> 'row_page_breadcrumbs_styles_2',
					'parent'	=> $group_page_breadcrumbs_styles,
					'next'		=> true
				));

					superfood_elated_add_admin_field(array(
						'type'			=> 'fontsimple',
						'name'			=> 'page_breadcrumbs_google_fonts',
						'default_value'	=> '-1',
						'label'			=> esc_html__('Font Family', 'superfood'),
						'parent'		=> $row_page_breadcrumbs_styles_2
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_breadcrumbs_fontstyle',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Style', 'superfood'),
						'options'		=> superfood_elated_get_font_style_array(),
						'parent'		=> $row_page_breadcrumbs_styles_2
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'selectblanksimple',
						'name'			=> 'page_breadcrumbs_fontweight',
						'default_value'	=> '',
						'label'			=> esc_html__('Font Weight', 'superfood'),
						'options'		=> superfood_elated_get_font_weight_array(),
						'parent'		=> $row_page_breadcrumbs_styles_2
					));
			
					superfood_elated_add_admin_field(array(
						'type'			=> 'textsimple',
						'name'			=> 'page_breadcrumbs_letter_spacing',
						'default_value'	=> '',
						'label'			=> esc_html__('Letter Spacing', 'superfood'),
						'args'			=> array(
							'suffix'	=> 'px'
						),
						'parent'		=> $row_page_breadcrumbs_styles_2
					));

				$row_page_breadcrumbs_styles_3 = superfood_elated_add_admin_row(array(
					'name'		=> 'row_page_breadcrumbs_styles_3',
					'parent'	=> $group_page_breadcrumbs_styles,
					'next'		=> true
				));

					superfood_elated_add_admin_field(array(
						'type'			=> 'colorsimple',
						'name'			=> 'page_breadcrumbs_hovercolor',
						'default_value'	=> '',
						'label'			=> esc_html__('Hover/Active Text Color', 'superfood'),
						'parent'		=> $row_page_breadcrumbs_styles_3
					));
    }

	add_action( 'superfood_elated_options_map', 'superfood_elated_title_options_map', 4);
}