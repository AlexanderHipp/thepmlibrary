<?php

if ( ! function_exists('superfood_elated_fullscreen_menu_options_map')) {

	function superfood_elated_fullscreen_menu_options_map() {

		superfood_elated_add_admin_page(
			array(
				'slug' => '_fullscreen_menu_page',
				'title' => esc_html__('Fullscreen Menu', 'superfood'),
				'icon' => 'fa fa-th-large'
			)
		);

		$fullscreen_panel = superfood_elated_add_admin_panel(
			array(
				'title' => esc_html__('Fullscreen Menu', 'superfood'),
				'name' => 'fullscreen_menu',
				'page' => '_fullscreen_menu_page'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'select',
				'name' => 'fullscreen_menu_animation_style',
				'default_value' => 'fade-push-text-right',
				'label' => esc_html__('Fullscreen Menu Overlay Animation', 'superfood'),
				'description' => esc_html__('Choose animation type for fullscreen menu overlay', 'superfood'),
				'options' => array(
					'fade-push-text-right' => esc_html__('Fade Push Text Right', 'superfood'),
					'fade-push-text-top' => esc_html__('Fade Push Text Top', 'superfood'),
					'fade-text-scaledown' => esc_html__('Fade Text Scaledown', 'superfood')
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'yesno',
				'name' => 'fullscreen_in_grid',
				'default_value' => 'no',
				'label' => esc_html__('Fullscreen Menu in Grid', 'superfood'),
				'description' => esc_html__('Enabling this option will put fullscreen menu content in grid', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'selectblank',
				'name' => 'fullscreen_alignment',
				'default_value' => '',
				'label' => esc_html__('Fullscreen Menu Alignment', 'superfood'),
				'description' => esc_html__('Choose alignment for fullscreen menu content', 'superfood'),
				'options' => array(
					'' => esc_html__('Default', 'superfood'),
					'left' => esc_html__('Left', 'superfood'),
					'center' => esc_html__('Center', 'superfood'),
					'right' => esc_html__('Right', 'superfood')
				)
			)
		);

		$background_group = superfood_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'background_group',
				'title' => esc_html__('Background', 'superfood'),
				'description' => esc_html__('Select a background color and transparency for fullscreen menu (0 = fully transparent, 1 = opaque)', 'superfood')
			)
		);

		$background_group_row = superfood_elated_add_admin_row(
			array(
				'parent' => $background_group,
				'name' => 'background_group_row'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_background_color',
				'label' => esc_html__('Background Color', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_background_transparency',
				'label' => esc_html__('Background Transparency', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'image',
				'name' => 'fullscreen_menu_background_image',
				'label' => esc_html__('Background Image', 'superfood'),
				'description' => esc_html__('Choose a background image for fullscreen menu background', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'image',
				'name' => 'fullscreen_menu_pattern_image',
				'label' => esc_html__('Pattern Background Image', 'superfood'),
				'description' => esc_html__('Choose a pattern image for fullscreen menu background', 'superfood')
			)
		);

		//1st level style group
		$first_level_style_group = superfood_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'first_level_style_group',
				'title' => esc_html__('1st Level Style', 'superfood'),
				'description' => esc_html__('Define styles for 1st level in Fullscreen Menu', 'superfood')
			)
		);

		$first_level_style_row1 = superfood_elated_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row1'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_active_color',
				'default_value' => '',
				'label' => esc_html__('Active Text Color', 'superfood'),
			)
		);

		$first_level_style_row3 = superfood_elated_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row3'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_style_row4 = superfood_elated_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row4'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'superfood'),
				'options' => superfood_elated_get_font_style_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'superfood'),
				'options' => superfood_elated_get_font_weight_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Lettert Spacing', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'superfood'),
				'options' => superfood_elated_get_text_transform_array()
			)
		);

		//2nd level style group
		$second_level_style_group = superfood_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'second_level_style_group',
				'title' => esc_html__('2nd Level Style', 'superfood'),
				'description' => esc_html__('Define styles for 2nd level in Fullscreen Menu', 'superfood')
			)
		);

		$second_level_style_row1 = superfood_elated_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row1'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Text Color', 'superfood'),
			)
		);

		$second_level_style_row2 = superfood_elated_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts_2nd',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight_2nd',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_style_row3 = superfood_elated_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'superfood'),
				'options' => superfood_elated_get_font_style_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'superfood'),
				'options' => superfood_elated_get_font_weight_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing_2nd',
				'default_value' => '',
				'label' => esc_html__('Lettert Spacing', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform_2nd',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'superfood'),
				'options' => superfood_elated_get_text_transform_array()
			)
		);

		$third_level_style_group = superfood_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'third_level_style_group',
				'title' => esc_html__('3rd Level Style', 'superfood'),
				'description' => esc_html__('Define styles for 3rd level in Fullscreen Menu', 'superfood')
			)
		);

		$third_level_style_row1 = superfood_elated_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'third_level_style_row1'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Hover/Active Text Color', 'superfood'),
			)
		);

		$third_level_style_row2 = superfood_elated_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts_3rd',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight_3rd',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_style_row3 = superfood_elated_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'superfood'),
				'options' => superfood_elated_get_font_style_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'superfood'),
				'options' => superfood_elated_get_font_weight_array()
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing_3rd',
				'default_value' => '',
				'label' => esc_html__('Lettert Spacing', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform_3rd',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'superfood'),
				'options' => superfood_elated_get_text_transform_array()
			)
		);

		$icon_colors_group = superfood_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'fullscreen_menu_icon_colors_group',
				'title' => esc_html__('Full Screen Menu Icon Style', 'superfood'),
				'description' => esc_html__('Define styles for Fullscreen Menu Icon', 'superfood')
			)
		);

		$icon_colors_row1 = superfood_elated_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row1'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_color',
				'label' => esc_html__('Color', 'superfood'),
			)
		);
		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_hover_color',
				'label' => esc_html__('Hover Color', 'superfood'),
			)
		);
		
		$icon_colors_row2 = superfood_elated_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row2',
				'next' => true
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_light_icon_color',
				'label' => esc_html__('Light Menu Icon Color', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_light_icon_hover_color',
				'label' => esc_html__('Light Menu Icon Hover Color', 'superfood'),
			)
		);

		$icon_colors_row3 = superfood_elated_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row3',
				'next' => true
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row3,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_dark_icon_color',
				'label' => esc_html__('Dark Menu Icon Color', 'superfood'),
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row3,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_dark_icon_hover_color',
				'label' => esc_html__('Dark Menu Icon Hover Color', 'superfood'),
			)
		);
		
		$icon_colors_row4 = superfood_elated_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row4'
			)
		);
		
		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row4,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_close_icon_color',
				'label' => esc_html__('Close Icon Color', 'superfood'),
			)
		);
		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row4,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_close_icon_hover_color',
				'label' => esc_html__('Close Icon Hover Color', 'superfood'),
			)
		);

		$icon_spacing_group = superfood_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__('Full Screen Menu Icon Spacing', 'superfood'),
				'description' => esc_html__('Define padding and margin for full screen menu icon', 'superfood')
			)
		);

		$icon_spacing_row = superfood_elated_add_admin_row(
			array(
				'parent' => $icon_spacing_group,
				'name' => 'icon_spacing_row'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_padding_left',
				'default_value' => '',
				'label' => esc_html__('Padding Left', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_padding_right',
				'default_value' => '',
				'label' => esc_html__('Padding Right', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_margin_left',
				'default_value' => '',
				'label' => esc_html__('Margin Left', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_margin_right',
				'default_value' => '',
				'label' => esc_html__('Margin Right', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);
	}

	add_action('superfood_elated_options_map', 'superfood_elated_fullscreen_menu_options_map', 8);
}