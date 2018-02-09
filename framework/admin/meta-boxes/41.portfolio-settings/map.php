<?php

if(!function_exists('superfood_elated_map_portfolio_settings')) {
    function superfood_elated_map_portfolio_settings() {
        $meta_box = superfood_elated_add_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'superfood'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        superfood_elated_add_meta_box_field(array(
            'name'        => 'eltdf_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'superfood'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'superfood'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                  => esc_html__('Default', 'superfood'),
                'small-images'      => esc_html__('Portfolio Small Images', 'superfood'),
                'small-slider'      => esc_html__('Portfolio Small Slider', 'superfood'),
                'big-images'        => esc_html__('Portfolio Big Images', 'superfood'),
                'big-slider'        => esc_html__('Portfolio Big Slider', 'superfood'),
                'custom'            => esc_html__('Portfolio Custom', 'superfood'),
                'full-width-custom' => esc_html__('Portfolio Full Width Custom', 'superfood'),
                'gallery'           => esc_html__('Portfolio Gallery', 'superfood')
            )
        ));

	    superfood_elated_add_meta_box_field(array(
		    'name'        => 'portfolio_info_top_padding',
		    'type'        => 'text',
		    'label'       => esc_html__('Portfolio Info Top Padding', 'superfood'),
		    'description' => esc_html__('Set top padding for portfolio info elements holder. This option works only for Portfolio Big Images, Big Slider and Gallery portfolio types', 'superfood'),
		    'parent'      => $meta_box,
		    'args'        => array(
			    'col_width' => 3,
			    'suffix' => 'px'
		    )
	    ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        superfood_elated_add_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'superfood'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'superfood'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        superfood_elated_add_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'superfood'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'superfood'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));
	
	    superfood_elated_add_meta_box_field(
		    array(
			    'name' => 'eltdf_portfolio_featured_image_meta',
			    'type' => 'image',
			    'label' => esc_html__('Featured Image', 'superfood'),
			    'description' => esc_html__('Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'superfood'),
			    'parent' => $meta_box
		    )
	    );

        superfood_elated_add_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'superfood'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'superfood'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                   => esc_html__('Default', 'superfood'),
                'small'              => esc_html__('Small', 'superfood'),
                'large_width'        => esc_html__('Large Width', 'superfood'),
                'large_height'       => esc_html__('Large Height', 'superfood'),
                'large_width_height' => esc_html__('Large Width/Height', 'superfood')
            )
        ));
    }

    add_action('superfood_elated_meta_boxes_map', 'superfood_elated_map_portfolio_settings');
}