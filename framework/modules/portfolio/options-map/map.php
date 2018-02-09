<?php

if ( ! function_exists('superfood_elated_portfolio_options_map') ) {
	function superfood_elated_portfolio_options_map() {

		superfood_elated_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio', 'superfood'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel_archive = superfood_elated_add_admin_panel(array(
			'title' => esc_html__('Portfolio Archive', 'superfood'),
			'name'  => 'panel_portfolio_archive',
			'page'  => '_portfolio'
		));

		superfood_elated_add_admin_field(array(
			'name'        => 'portfolio_archive_number_of_items',
			'type'        => 'text',
			'label'       => esc_html__('Number of Items', 'superfood'),
			'description' => esc_html__('Set number of items for your portfolio list on archive pages. Default value is 12', 'superfood'),
			'parent'      => $panel_archive,
			'args'        => array(
				'col_width' => 3
			)
		));

		superfood_elated_add_admin_field(array(
			'name'        => 'portfolio_archive_number_of_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns', 'superfood'),
			'default_value' => '4',
			'description' => esc_html__('Set number of columns for your portfolio list on archive pages. Default value is 4 columns', 'superfood'),
			'parent'      => $panel_archive,
			'options'     => array(
				'2' => esc_html__('2 Columns', 'superfood'),
				'3' => esc_html__('3 Columns', 'superfood'),
				'4' => esc_html__('4 Columns', 'superfood'),
				'5' => esc_html__('5 Columns', 'superfood')
			)
		));

		superfood_elated_add_admin_field(array(
			'name'        => 'portfolio_archive_space_between_items',
			'type'        => 'select',
			'label'       => esc_html__('Space Between Items', 'superfood'),
			'default_value' => 'normal',
			'description' => esc_html__('Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'superfood'),
			'parent'      => $panel_archive,
			'options'     => array(
				'no_space' => esc_html__('No Space', 'superfood'),
				'small' => esc_html__('Small', 'superfood'),
				'normal' => esc_html__('Normal', 'superfood'),
				'large' => esc_html__('Large', 'superfood')
			)
		));

		superfood_elated_add_admin_field(array(
			'name'        => 'portfolio_archive_image_size',
			'type'        => 'select',
			'label'       => esc_html__('Image Proportions', 'superfood'),
			'default_value' => 'landscape',
			'description' => esc_html__('Set image proportions for your portfolio list on archive pages. Default value is landscape', 'superfood'),
			'parent'      => $panel_archive,
			'options'     => array(
				'full' => esc_html__('Original', 'superfood'),
				'landscape' => esc_html__('Landscape', 'superfood'),
				'portrait' => esc_html__('Portrait', 'superfood'),
				'square' => esc_html__('Square', 'superfood')
			)
		));

		$panel = superfood_elated_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single', 'superfood'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		superfood_elated_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type', 'superfood'),
			'default_value'	=> 'small-images',
			'description' => esc_html__('Choose a default type for Single Project pages', 'superfood'),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__('Portfolio Small Images', 'superfood'),
				'small-slider' => esc_html__('Portfolio Small Slider', 'superfood'),
				'big-images' => esc_html__('Portfolio Big Images', 'superfood'),
				'big-slider' => esc_html__('Portfolio Big Slider', 'superfood'),
				'custom' => esc_html__('Portfolio Custom', 'superfood'),
				'full-width-custom' => esc_html__('Portfolio Full Width Custom', 'superfood'),
				'gallery' => esc_html__('Portfolio Gallery', 'superfood')
			)
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images', 'superfood'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images', 'superfood'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos', 'superfood'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'superfood'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories', 'superfood'),
			'description'   => esc_html__('Enabling this option will disable category meta description on single projects', 'superfood'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date', 'superfood'),
			'description'   => esc_html__('Enabling this option will disable date meta on single projects', 'superfood'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'superfood'),
			'description'   => esc_html__('Enabling this option will show comments on your page', 'superfood'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text', 'superfood'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages', 'superfood'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination', 'superfood'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality', 'superfood'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#eltdf_navigate_same_category_container'
			)
		));

		$container_navigate_category = superfood_elated_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		superfood_elated_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label'           => esc_html__('Enable Pagination Through Same Category', 'superfood'),
			'description'     => esc_html__('Enabling this option will make portfolio pagination sort through current category', 'superfood'),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		superfood_elated_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns', 'superfood'),
			'default_value' => 'three-columns',
			'description' => esc_html__('Enter the number of columns for portfolio gallery type', 'superfood'),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__('2 Columns', 'superfood'),
				'three-columns' => esc_html__('3 Columns', 'superfood'),
				'four-columns' => esc_html__('4 Columns', 'superfood')
			)
		));

		superfood_elated_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug', 'superfood'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'superfood'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));
	}

	add_action( 'superfood_elated_options_map', 'superfood_elated_portfolio_options_map', 12);
}