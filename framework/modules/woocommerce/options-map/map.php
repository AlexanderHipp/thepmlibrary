<?php

if ( ! function_exists('superfood_elated_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function superfood_elated_woocommerce_options_map() {

		superfood_elated_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'superfood'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = superfood_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List', 'superfood')
			)
		);

		superfood_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns', 'superfood'),
			'default_value'	=> 'eltdf-woocommerce-columns-4',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product', 'superfood'),
			'options'		=> array(
				'eltdf-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'superfood'),
				'eltdf-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)', 'superfood')
			),
			'parent'      	=> $panel_product_list,
		));
		
		superfood_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_columns_space',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Space Between Products', 'superfood'),
			'default_value'	=> 'eltdf-woo-normal-space',
			'description' 	=> esc_html__('Select space between products for product listing and related products on single product', 'superfood'),
			'options'		=> array(
				'eltdf-woo-normal-space' => esc_html__('Normal', 'superfood'),
				'eltdf-woo-small-space'  => esc_html__('Small', 'superfood'),
				'eltdf-woo-no-space'     => esc_html__('No Space', 'superfood')
			),
			'parent'      	=> $panel_product_list,
		));
		
		superfood_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_product_list_info_position',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product Info Position', 'superfood'),
			'default_value'	=> 'info_below_image',
			'description' 	=> esc_html__('Select product info position for product listing and related products on single product', 'superfood'),
			'options'		=> array(
				'info_below_image'    => esc_html__('Info Below Image', 'superfood'),
				'info_on_image_hover' => esc_html__('Info On Image Hover', 'superfood')
			),
			'parent'      	=> $panel_product_list,
		));

		superfood_elated_add_admin_field(array(
			'name'        	=> 'eltdf_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'superfood'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'superfood'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		superfood_elated_add_admin_field(array(
			'name'        	=> 'eltdf_products_list_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Products Title Tag', 'superfood'),
			'default_value'	=> 'h4',
			'description' 	=> '',
			'options'       => superfood_elated_get_title_tag(),
			'parent'      	=> $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = superfood_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__('Single Product', 'superfood')
			)
		);
		
		superfood_elated_add_admin_field(array(
			'name'        	=> 'single_product_layout',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Single Product Layout', 'superfood'),
			'default_value'	=> 'standard',
			'description' 	=> esc_html__('Choose layout for single product pages', 'superfood'),
			'options'		=> array(
				'standard'     => esc_html__('Standard', 'superfood'),
				'sticky-info'  => esc_html__('Sticky Info', 'superfood')
			),
			'parent'      	=> $panel_single_product,
			'args' => array(
				'dependence' => true,
				'show' => array(
					'standard' => '#eltdf_panel_single_product_standard',
					'sticky-info' => '#eltdf_panel_single_product_sticky_info'
				),
				'hide' => array(
					'standard' => '#eltdf_panel_single_product_sticky_info',
					'sticky-info' => '#eltdf_panel_single_product_standard'
				)
			)
		));
		
			/********************** Standard - Single Product Layout **********************/
			
			$panel_single_product_standard = superfood_elated_add_admin_container(array(
				'name' => 'panel_single_product_standard',
				'parent' => $panel_single_product,
				'hidden_property' => 'single_product_layout',
				'hidden_values' => array(
					'sticky-info'
				)
			));
			
				superfood_elated_add_admin_field(array(
					'name'          => 'woo_enable_single_thumb_featured_switch',
					'type'          => 'yesno',
					'label'         => esc_html__('Switch Featured Image on Thumbnail Click', 'superfood'),
					'description'   => esc_html__('Enabling this option will switch featured image with thumbnail image on thumbnail click', 'superfood'),
					'default_value' => 'yes',
					'parent'        => $panel_single_product_standard
				));
				
				superfood_elated_add_admin_field(array(
					'name'          => 'woo_set_thumb_images_position',
					'type'          => 'select',
					'label'         => esc_html__('Set Thumbnail Images Position', 'superfood'),
					'default_value' => 'below-image',
					'options'		=> array(
						'below-image'  => esc_html__('Below Featured Image', 'superfood'),
						'on-left-side' => esc_html__('On The Left Side Of Featured Image', 'superfood')
					),
					'parent'        => $panel_single_product_standard
				));
			
			
			/********************** Standard - Single Product Layout **********************/
			
			/********************** Sticky Info - Single Product Layout **********************/
			
			$panel_single_product_sticky_info = superfood_elated_add_admin_container(array(
				'name' => 'panel_single_product_sticky_info',
				'parent' => $panel_single_product,
				'hidden_property' => 'single_product_layout',
				'hidden_values' => array(
					'standard'
				)
			));
			
				superfood_elated_add_admin_field(array(
					'name'          => 'woo_enable_single_sticky_content',
					'type'          => 'yesno',
					'label'         => esc_html__('Sticky Side Text', 'superfood'),
					'description'   => esc_html__('Enabling this option will make side text sticky on Single Product pages', 'superfood'),
					'default_value' => 'yes',
					'parent'        => $panel_single_product_sticky_info
				));
			
			/********************** Sticky Info - Single Product Layout **********************/

		superfood_elated_add_admin_field(array(
			'name'        	=> 'eltdf_single_product_title_tag',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Single Product Title Tag', 'superfood'),
			'default_value'	=> 'h2',
			'description' 	=> '',
			'options'       => superfood_elated_get_title_tag(),
			'parent'      	=> $panel_single_product,
		));

		/**
		 * DropDown Cart Widget Settings
		 */
		$panel_dropdown_cart = superfood_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_dropdown_cart',
				'title' => esc_html__('Dropdown Cart Widget', 'superfood')
			)
		);

			superfood_elated_add_admin_field(array(
				'name'        	=> 'eltdf_woo_dropdown_cart_description',
				'type'        	=> 'text',
				'label'       	=> esc_html__('Cart Description', 'superfood'),
				'default_value'	=> '',
				'description' 	=> esc_html__('Enter dropdown cart description', 'superfood'),
				'parent'      	=> $panel_dropdown_cart
			));
	}

	add_action( 'superfood_elated_options_map', 'superfood_elated_woocommerce_options_map', 16);
}