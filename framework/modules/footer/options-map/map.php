<?php

if ( ! function_exists('superfood_elated_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function superfood_elated_footer_options_map() {

		superfood_elated_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer', 'superfood'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = superfood_elated_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'superfood'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

        superfood_elated_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer_behavior',
                'default_value' => 'no',
                'label'         => esc_html__('Uncovering Footer', 'superfood'),
                'description'   => esc_html__('Enabling this option will make Footer gradually appear on scroll', 'superfood'),
                'parent'        => $footer_panel,
            )
        );

		superfood_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'no',
				'label' => esc_html__('Footer in Grid', 'superfood'),
				'description' => esc_html__('Enabling this option will place Footer content in grid', 'superfood'),
				'parent' => $footer_panel,
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top', 'superfood'),
				'description' => esc_html__('Enabling this option will show Footer Top area', 'superfood'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = superfood_elated_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns', 'superfood'),
				'description' => esc_html__('Choose number of columns for Footer Top area', 'superfood'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '3(25%+25%+50%)',
					'6' => '3(50%+25%+25%)'
				),
				'parent' => $show_footer_top_container,
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => '',
				'label' => esc_html__('Footer Top Columns Alignment', 'superfood'),
				'description' => esc_html__('Text Alignment in Footer Columns', 'superfood'),
				'options' => array(
					'' => esc_html__('Default', 'superfood'),
					'left' => esc_html__('Left', 'superfood'),
					'center' => esc_html__('Center', 'superfood'),
					'right' => esc_html__('Right', 'superfood')
				),
				'parent' => $show_footer_top_container,
			)
		);

		superfood_elated_add_admin_field(array(
			'name' => 'footer_top_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'superfood'),
			'description' => esc_html__('Set background color for top footer area', 'superfood'),
			'parent' => $show_footer_top_container
		));

		superfood_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom', 'superfood'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area', 'superfood'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltdf_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = superfood_elated_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Bottom Columns', 'superfood'),
				'description' => esc_html__('Choose number of columns for Footer Bottom area', 'superfood'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent' => $show_footer_bottom_container,
			)
		);

		superfood_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns_alignment',
				'default_value' => '',
				'label' => esc_html__('Footer Bottom Columns Alignment', 'superfood'),
				'description' => esc_html__('Text Alignment in Footer Columns', 'superfood'),
				'options' => array(
					'' => esc_html__('Default', 'superfood'),
					'left' => esc_html__('Left', 'superfood'),
					'center' => esc_html__('Center', 'superfood'),
					'right' => esc_html__('Right', 'superfood')
				),
				'parent' => $show_footer_bottom_container,
			)
		);

		superfood_elated_add_admin_field(array(
			'name' => 'footer_bottom_height',
			'type' => 'text',
			'label' => esc_html__('Height', 'superfood'),
			'description' => esc_html__('Enter footer bottom bar height (Default is 60)', 'superfood'),
			'parent' => $show_footer_bottom_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		superfood_elated_add_admin_field(array(
			'name' => 'footer_bottom_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'superfood'),
			'description' => esc_html__('Set background color for bottom footer area', 'superfood'),
			'parent' => $show_footer_bottom_container
		));

		superfood_elated_add_admin_field(array(
			'name' => 'footer_bottom_border_top_color',
			'type' => 'color',
			'label' => esc_html__('Border Top Color', 'superfood'),
			'description' => esc_html__('Set border top color for bottom footer area', 'superfood'),
			'parent' => $show_footer_bottom_container
		));
	}

	add_action( 'superfood_elated_options_map', 'superfood_elated_footer_options_map', 9);
}