<?php

if ( ! function_exists('superfood_elated_page_options_map') ) {

    function superfood_elated_page_options_map() {

        superfood_elated_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__('Page', 'superfood'),
                'icon'  => 'fa fa-file-text-o'
            )
        );

        /***************** Page Layout - begin **********************/

            $panel_sidebar = superfood_elated_add_admin_panel(
                array(
                    'page'  => '_page_page',
                    'name'  => 'panel_sidebar',
                    'title' => esc_html__('Page Style', 'superfood')
                )
            );

            superfood_elated_add_admin_field(array(
                'name'        => 'page_sidebar_layout',
                'type'        => 'select',
                'label'       => esc_html__('Sidebar Layout', 'superfood'),
                'description' => esc_html__('Choose a sidebar layout for pages', 'superfood'),
                'default_value' => 'default',
                'parent'      => $panel_sidebar,
                'options'     => array(
                    'default'			=> esc_html__('No Sidebar', 'superfood'),
                    'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'superfood'),
                    'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'superfood'),
                    'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'superfood'),
                    'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'superfood')
                )
            ));
	
	        $superfood_elated_custom_sidebars = superfood_elated_get_custom_sidebars();
            if(count($superfood_elated_custom_sidebars) > 0) {
                superfood_elated_add_admin_field(array(
                    'name' => 'page_custom_sidebar',
                    'type' => 'selectblank',
                    'label' => esc_html__('Sidebar to Display', 'superfood'),
                    'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'superfood'),
                    'parent' => $panel_sidebar,
                    'options' => $superfood_elated_custom_sidebars
                ));
            }

            superfood_elated_add_admin_field(array(
                'name'        => 'page_show_comments',
                'type'        => 'yesno',
                'label'       => esc_html__('Show Comments', 'superfood'),
                'description' => esc_html__('Enabling this option will show comments on your page', 'superfood'),
                'default_value' => 'yes',
                'parent'      => $panel_sidebar
            ));

        /***************** Page Layout - end **********************/

        /***************** Content Layout - begin **********************/

            $panel_content = superfood_elated_add_admin_panel(
                array(
                    'page'  => '_page_page',
                    'name'  => 'panel_content',
                    'title' => esc_html__('Content Style', 'superfood')
                )
            );

            superfood_elated_add_admin_field(array(
                'type'          => 'text',
                'name'          => 'content_top_padding',
                'default_value' => '40',
                'label'         => esc_html__('Content Top Padding for Template in Full Width', 'superfood'),
                'description'   => esc_html__('Enter top padding for content area for templates in full width. If you set this value then it\'s important to set also Content top padding for mobile header value', 'superfood'),
                'args'          => array(
                    'suffix'    => 'px',
                    'col_width' => 3
                ),
                'parent'        => $panel_content
            ));

            superfood_elated_add_admin_field(array(
                'type'          => 'text',
                'name'          => 'content_top_padding_in_grid',
                'default_value' => '40',
	            'label'         => esc_html__('Content Top Padding for Templates in Grid', 'superfood'),
	            'description'   => esc_html__('Enter top padding for content area for Templates in grid. If you set this value then it\'s important to set also Content top padding for mobile header value', 'superfood'),
                'args'          => array(
                    'suffix'    => 'px',
                    'col_width' => 3
                ),
                'parent'        => $panel_content
            ));

            superfood_elated_add_admin_field(array(
                'type'          => 'text',
                'name'          => 'content_top_padding_mobile',
                'default_value' => '40',
	            'label'         => esc_html__('Content Top Padding for Mobile Header', 'superfood'),
	            'description'   => esc_html__('Enter top padding for content area for Mobile Header', 'superfood'),
                'args'          => array(
                    'suffix'    => 'px',
                    'col_width' => 3
                ),
                'parent'        => $panel_content
            ));

        /***************** Content Layout - end **********************/

    }

    add_action( 'superfood_elated_options_map', 'superfood_elated_page_options_map', 5);
}