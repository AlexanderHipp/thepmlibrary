<?php

$header_meta_box = superfood_elated_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Header', 'superfood'),
        'name' => 'header_meta'
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_header_type_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Choose Header Type', 'superfood'),
        'description' => esc_html__('Select header type layout', 'superfood'),
        'parent' => $header_meta_box,
        'options' => array(
            '' => 'Default',
            'header-standard' => esc_html__('Standard Header Layout', 'superfood'),
            'header-full-screen' => esc_html__('Full Screen Header Layout', 'superfood'),
            'header-vertical' => esc_html__('Vertical Header Layout', 'superfood'),
            'header-divided' => esc_html('Divided Header Layout', 'superfood')
        ),
        'args' => array(
            "dependence" => true,
            "hide" => array(
                "" => '#eltdf_eltdf_header_standard_type_meta_container, #eltdf_eltdf_header_full_screen_type_meta_container, #eltdf_eltdf_header_vertical_type_meta_container, #eltdf_eltdf_header_divided_type_meta_container',
                "header-standard" => '#eltdf_eltdf_header_full_screen_type_meta_container, #eltdf_eltdf_header_vertical_type_meta_container, #eltdf_eltdf_header_divided_type_meta_container',
                "header-full-screen" => '#eltdf_eltdf_header_standard_type_meta_container, #eltdf_eltdf_header_vertical_type_meta_container, #eltdf_eltdf_header_divided_type_meta_container',
                "header-vertical" => '#eltdf_eltdf_header_standard_type_meta_container, #eltdf_eltdf_header_full_screen_type_meta_container, #eltdf_eltdf_header_divided_type_meta_container',
                "header-divided" => '#eltdf_eltdf_header_standard_type_meta_container, #eltdf_eltdf_header_full_screen_type_meta_container, #eltdf_eltdf_header_vertical_type_meta_container',
            ),
            "show" => array(
                "" => '',
                "header-standard" => '#eltdf_eltdf_header_standard_type_meta_container',
                "header-full-screen" => '#eltdf_eltdf_header_full_screen_type_meta_container',
                "header-vertical" => '#eltdf_eltdf_header_vertical_type_meta_container',
                "header-divided" => '#eltdf_eltdf_header_divided_type_meta_container'
            )
        )
    )
);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// STANDARD

$header_standard_type_meta_container = superfood_elated_add_admin_container(
    array(
        'parent' => $header_meta_box,
        'name' => 'eltdf_header_standard_type_meta_container',
        'hidden_property' => 'eltdf_header_type_meta',
        'hidden_values' => array(
            'header-full-screen',
            'header-vertical',
            'header-divided',
        ),
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_enable_grid_layout_header_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Enable Grid Layout', 'superfood'),
        'description' => esc_html__('Enabling this option you will set standard header area to be in grid', 'superfood'),
        'parent' => $header_standard_type_meta_container,
        'options' => superfood_elated_get_yes_no_select_array()
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_set_menu_area_position_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Choose Menu Area Position', 'superfood'),
        'description' => esc_html__('Select menu area position in your header', 'superfood'),
        'parent' => $header_standard_type_meta_container,
        'options' => array(
            '' => esc_html__('Default', 'superfood'),
            'center' => esc_html__('Center', 'superfood'),
            'right' => esc_html__('Right', 'superfood')
        )
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_menu_area_background_color_header_standard_meta',
        'type' => 'color',
        'label' => esc_html__('Background Color', 'superfood'),
        'description' => esc_html__('Choose a background color for header area', 'superfood'),
        'parent' => $header_standard_type_meta_container
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_menu_area_background_transparency_header_standard_meta',
        'type' => 'text',
        'label' => esc_html__('Background Transparency', 'superfood'),
        'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
        'parent' => $header_standard_type_meta_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_menu_area_border_bottom_color_header_standard_meta',
        'type' => 'color',
        'label' => esc_html__('Border Color', 'superfood'),
        'description' => esc_html__('Choose a border bottom color for header area', 'superfood'),
        'parent' => $header_standard_type_meta_container
    )
);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// FULLSCREEN

$header_full_screen_type_meta_container = superfood_elated_add_admin_container(
    array(
        'parent' => $header_meta_box,
        'name' => 'eltdf_header_full_screen_type_meta_container',
        'hidden_property' => 'eltdf_header_type_meta',
        'hidden_values' => array(
            'header-standard',
            'header-vertical',
            'header-divided',
        ),
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_enable_grid_layout_header_full_screen_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Enable Grid Layout', 'superfood'),
        'description' => esc_html__('Enabling this option you will set full screen header area to be in grid', 'superfood'),
        'parent' => $header_full_screen_type_meta_container,
        'options' => superfood_elated_get_yes_no_select_array()
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_menu_area_background_color_header_full_screen_meta',
        'type' => 'color',
        'label' => esc_html__('Background Color', 'superfood'),
        'description' => esc_html__('Choose a background color for header area', 'superfood'),
        'parent' => $header_full_screen_type_meta_container
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_menu_area_background_transparency_header_full_screen_meta',
        'type' => 'text',
        'label' => esc_html__('Background Transparency', 'superfood'),
        'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
        'parent' => $header_full_screen_type_meta_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_menu_area_border_bottom_color_header_full_screen_meta',
        'type' => 'color',
        'label' => esc_html__('Border Color', 'superfood'),
        'description' => esc_html__('Choose a border bottom color for header area', 'superfood'),
        'parent' => $header_full_screen_type_meta_container
    )
);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// VERTICAL

$header_vertical_type_meta_container = superfood_elated_add_admin_container(
    array(
        'parent' => $header_meta_box,
        'name' => 'eltdf_header_vertical_type_meta_container',
        'hidden_property' => 'eltdf_header_type_meta',
        'hidden_values' => array(
            'header-standard',
            'header-full-screen',
            'header-divided',
        ),
    )
);

superfood_elated_add_meta_box_field(array(
    'name' => 'eltdf_vertical_header_background_color_meta',
    'type' => 'color',
    'label' => esc_html__('Background Color', 'superfood'),
    'description' => esc_html__('Choose a background color for header area', 'superfood'),
    'parent' => $header_vertical_type_meta_container
));

superfood_elated_add_meta_box_field(array(
    'name' => 'eltdf_vertical_header_transparency_meta',
    'type' => 'text',
    'label' => esc_html__('Transparency', 'superfood'),
    'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
    'parent' => $header_vertical_type_meta_container,
    'args' => array(
        'col_width' => 1
    )
));

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_vertical_header_background_image_meta',
        'type' => 'image',
        'default_value' => '',
        'label' => esc_html__('Background Image', 'superfood'),
        'description' => esc_html__('Set background image for vertical menu', 'superfood'),
        'parent' => $header_vertical_type_meta_container
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_disable_vertical_header_background_image_meta',
        'type' => 'yesno',
        'default_value' => 'no',
        'label' => esc_html__('Disable Background Image', 'superfood'),
        'description' => esc_html__('Enabling this option will hide background image in header area', 'superfood'),
        'parent' => $header_vertical_type_meta_container
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_vertical_header_text_align_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Choose Text Alignment', 'superfood'),
        'description' => esc_html__('Choose text alignment for header area elements (logo, menu and widgets)', 'superfood'),
        'parent' => $header_vertical_type_meta_container,
        'options' => array(
            '' => esc_html__('Default', 'superfood'),
            'left' => esc_html__('Left', 'superfood'),
            'center' => esc_html__('Center', 'superfood')
        )
    )
);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// DIVIDED

$header_divided_type_meta_container = superfood_elated_add_admin_container(
    array(
        'parent' => $header_meta_box,
        'name' => 'eltdf_header_divided_type_meta_container',
        'hidden_property' => 'eltdf_header_type_meta',
        'hidden_values' => array(
            'header-standard',
            'header-full-screen',
            'header-vertical',
        ),
    )
);

superfood_elated_add_meta_box_field(array(
    'name' => 'eltdf_enable_grid_layout_header_divided_meta',
    'type' => 'select',
    'label' => esc_html__('Enable Grid Layout', 'superfood'),
    'description' => esc_html__('Enabling this option you will set divided header area to be in grid', 'superfood'),
    'parent' => $header_divided_type_meta_container,
    'default_value' => '',
    'options' => array(
        '' => esc_html__('Default', 'superfood'),
        'no' => esc_html__('No', 'superfood'),
        'yes' => esc_html__('Yes', 'superfood')
    ),
));

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_menu_area_background_color_header_divided_meta',
        'type' => 'color',
        'label' => esc_html__('Background Color', 'superfood'),
        'description' => esc_html__('Choose a background color for header area', 'superfood'),
        'parent' => $header_divided_type_meta_container
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_menu_area_background_transparency_header_divided_meta',
        'type' => 'text',
        'label' => esc_html__('Transparency', 'superfood'),
        'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'superfood'),
        'parent' => $header_divided_type_meta_container,
        'args' => array(
            'col_width' => 2
        )
    )
);

superfood_elated_add_meta_box_field(array(
    'name' => 'eltdf_menu_area_border_bottom_color_header_divided_meta',
    'type' => 'color',
    'label' => esc_html__('Border Color', 'superfood'),
    'description' => esc_html__('Choose color of header bottom border', 'superfood'),
    'parent' => $header_divided_type_meta_container,
));

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_disable_header_widget_area_meta',
        'type' => 'yesno',
        'default_value' => 'no',
        'label' => esc_html__('Disable Header Widget Area', 'superfood'),
        'description' => esc_html__('Enabling this option will hide widget area from the right hand side of main menu', 'superfood'),
        'parent' => $header_meta_box
    )
);

$superfood_elated_custom_sidebars = superfood_elated_get_custom_sidebars();
if (count($superfood_elated_custom_sidebars) > 0) {
    superfood_elated_add_meta_box_field(array(
        'name' => 'eltdf_custom_header_sidebar_meta',
        'type' => 'selectblank',
        'label' => esc_html__('Choose Custom Widget Area in Header', 'superfood'),
        'description' => esc_html__('Choose custom widget area to display in header area from the right hand side of main menu"', 'superfood'),
        'parent' => $header_meta_box,
        'options' => $superfood_elated_custom_sidebars
    ));
}

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_top_bar_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Header Top Bar', 'superfood'),
        'description' => esc_html__('Enabling this option will show header top bar area', 'superfood'),
        'parent' => $header_meta_box,
        'options' => superfood_elated_get_yes_no_select_array()
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_header_style_meta',
        'type' => 'select',
        'default_value' => '',
        'label' => esc_html__('Header Skin', 'superfood'),
        'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'superfood'),
        'parent' => $header_meta_box,
        'options' => array(
            '' => esc_html__('Default', 'superfood'),
            'light-header' => esc_html__('Light', 'superfood'),
            'dark-header' => esc_html__('Dark', 'superfood')
        )
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_scroll_amount_for_sticky_meta',
        'type' => 'text',
        'label' => esc_html__('Scroll amount for sticky header appearance', 'superfood'),
        'description' => esc_html__('Define scroll amount for sticky header appearance', 'superfood'),
        'parent' => $header_meta_box,
        'args' => array(
            'col_width' => 2,
            'suffix' => 'px'
        ),
        'hidden_property' => 'header_behaviour',
        'hidden_values' => array("sticky-header-on-scroll-up", "fixed-on-scroll")
    )
);