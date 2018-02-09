<?php

$superfood_elated_sidebar_meta_box = superfood_elated_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Sidebar', 'superfood'),
        'name' => 'sidebar_meta'
    )
);

    superfood_elated_add_meta_box_field(
        array(
            'name'        => 'eltdf_sidebar_meta',
            'type'        => 'select',
            'label'       => esc_html__('Layout', 'superfood'),
            'description' => esc_html__('Choose the sidebar layout', 'superfood'),
            'parent'      => $superfood_elated_sidebar_meta_box,
            'options'     => array(
				''			        => esc_html__('Default', 'superfood'),
				'no-sidebar'		=> esc_html__('No Sidebar', 'superfood'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'superfood'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'superfood'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'superfood'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'superfood')
			)
        )
    );

	$superfood_elated_custom_sidebars = superfood_elated_get_custom_sidebars();
	if(count($superfood_elated_custom_sidebars) > 0) {
	    superfood_elated_add_meta_box_field(array(
	        'name' => 'eltdf_custom_sidebar_meta',
	        'type' => 'selectblank',
	        'label' => esc_html__('Choose Widget Area in Sidebar', 'superfood'),
	        'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'superfood'),
	        'parent' => $superfood_elated_sidebar_meta_box,
	        'options' => $superfood_elated_custom_sidebars
	    ));
	}