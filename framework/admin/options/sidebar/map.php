<?php

if ( ! function_exists('superfood_elated_sidebar_options_map') ) {

    function superfood_elated_sidebar_options_map() {

        superfood_elated_add_admin_page(
            array(
                'slug'  => '_sidebar_page',
                'title' => esc_html__('Sidebar', 'superfood'),
                'icon'  => 'fa fa-file-o'
            )
        );

        /***************** Sidebar Layout - begin **********************/

            $panel_widgets = superfood_elated_add_admin_panel(
                array(
                    'page'  => '_sidebar_page',
                    'name'  => 'panel_widgets',
                    'title' => esc_html__('Sidebar Style', 'superfood')
                )
            );

            /**
             * Navigation style
             */
            superfood_elated_add_admin_field(array(
                'type'          => 'color',
                'name'          => 'sidebar_background_color',
                'label'         => esc_html__('Sidebar Background Color', 'superfood'),
                'description'   => esc_html__('Choose background color for sidebar', 'superfood'),
                'parent'        => $panel_widgets
            ));

            $group_sidebar_padding = superfood_elated_add_admin_group(array(
                'name'      => 'group_sidebar_padding',
                'title'     => esc_html__('Padding', 'superfood'),
                'parent'    => $panel_widgets
            ));

            $row_sidebar_padding = superfood_elated_add_admin_row(array(
                'name'      => 'row_sidebar_padding',
                'parent'    => $group_sidebar_padding
            ));

            superfood_elated_add_admin_field(array(
                'type'          => 'textsimple',
                'name'          => 'sidebar_padding_top',
                'default_value' => '',
                'label'         => esc_html__('Top Padding', 'superfood'),
                'args'          => array(
                    'suffix'    => 'px'
                ),
                'parent'        => $row_sidebar_padding
            ));

            superfood_elated_add_admin_field(array(
                'type'          => 'textsimple',
                'name'          => 'sidebar_padding_right',
                'default_value' => '',
                'label'         => esc_html__('Right Padding', 'superfood'),
                'args'          => array(
                    'suffix'    => 'px'
                ),
                'parent'        => $row_sidebar_padding
            ));

            superfood_elated_add_admin_field(array(
                'type'          => 'textsimple',
                'name'          => 'sidebar_padding_bottom',
                'default_value' => '',
                'label'         => esc_html__('Bottom Padding', 'superfood'),
                'args'          => array(
                    'suffix'    => 'px'
                ),
                'parent'        => $row_sidebar_padding
            ));

            superfood_elated_add_admin_field(array(
                'type'          => 'textsimple',
                'name'          => 'sidebar_padding_left',
                'default_value' => '',
                'label'         => esc_html__('Left Padding', 'superfood'),
                'args'          => array(
                    'suffix'    => 'px'
                ),
                'parent'        => $row_sidebar_padding
            ));

        /***************** Sidebar Layout - end **********************/

    }

    add_action( 'superfood_elated_options_map', 'superfood_elated_sidebar_options_map', 5);
}