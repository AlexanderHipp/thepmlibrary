<?php

if ( ! function_exists('superfood_elated_sidearea_options_map') ) {

	function superfood_elated_sidearea_options_map() {

		superfood_elated_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area', 'superfood'),
				'icon' => 'fa fa-indent'
			)
		);

		$side_area_panel = superfood_elated_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'superfood'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		$side_area_icon_style_group = superfood_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style', 'superfood'),
				'description' => esc_html__('Define styles for Side Area icon', 'superfood')
			)
		);

		$side_area_icon_style_row1 = superfood_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row1'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'label' => esc_html__('Color', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'label' => esc_html__('Hover Color', 'superfood')
			)
		);

		$side_area_icon_style_row2 = superfood_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row2',
				'next'		=> true
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_color',
				'label' => esc_html__('Light Menu Icon Color', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_hover_color',
				'label' => esc_html__('Light Menu Icon Hover Color', 'superfood')
			)
		);

		$side_area_icon_style_row3 = superfood_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row3',
				'next'		=> true
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_color',
				'label' => esc_html__('Dark Menu Icon Color', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_hover_color',
				'label' => esc_html__('Dark Menu Icon Hover Color', 'superfood')
			)
		);

		$side_area_icon_style_row4 = superfood_elated_add_admin_row(
			array(
				'parent'	=> $side_area_icon_style_group,
				'name'		=> 'side_area_icon_style_row4'
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row4,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_color',
				'label' => esc_html__('Close Icon Color', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row4,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_hover_color',
				'label' => esc_html__('Close Icon Hover Color', 'superfood')
			)
		);

		$icon_spacing_group = superfood_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__('Side Area Icon Spacing', 'superfood'),
				'description' => esc_html__('Define padding and margin for side area icon', 'superfood')
			)
		);

		$icon_spacing_row = superfood_elated_add_admin_row(
			array(
				'parent'	=> $icon_spacing_group,
				'name'		=> 'icon_spancing_row',
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_left',
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
				'name' => 'side_area_icon_padding_right',
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
				'name' => 'side_area_icon_margin_left',
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
				'name' => 'side_area_icon_margin_right',
				'label' => esc_html__('Margin Right', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_title',
				'default_value' => '',
				'label' => esc_html__('Side Area Title', 'superfood'),
				'description' => esc_html__('Enter a title to appear in Side Area', 'superfood'),
				'args' => array(
					'col_width' => 3,
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width', 'superfood'),
				'description' => esc_html__('Enter a width for Side Area', 'superfood'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'label' => esc_html__('Background Color', 'superfood'),
				'description' => esc_html__('Choose a background color for Side Area', 'superfood')
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Alignment', 'superfood'),
				'description' => esc_html__('Choose text alignment for side area', 'superfood'),
				'options' => array(
					'' => esc_html__('Default', 'superfood'),
					'left' => esc_html__('Left', 'superfood'),
					'center' => esc_html__('Center', 'superfood'),
					'right' => esc_html__('Right', 'superfood')
				)
			)
		);

		$padding_group = superfood_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'padding_group',
				'title' => esc_html__('Padding', 'superfood'),
				'description' => esc_html__('Define padding for Side Area', 'superfood')
			)
		);

		$padding_row = superfood_elated_add_admin_row(
			array(
				'parent' => $padding_group,
				'name' => 'padding_row',
				'next' => true
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_top',
				'label' => esc_html__('Top Padding', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_right',
				'label' => esc_html__('Right Padding', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_bottom',
				'label' => esc_html__('Bottom Padding', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		superfood_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_left',
				'label' => esc_html__('Left Padding', 'superfood'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);
	}

	add_action('superfood_elated_options_map', 'superfood_elated_sidearea_options_map', 7);
}