<?php

$general_meta_box = superfood_elated_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('General', 'superfood'),
        'name' => 'general_meta'
    )
);


superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_first_color_meta',
        'type' => 'color',
        'default_value' => '',
        'label' => esc_html__('Page Main Color', 'superfood'),
        'description' => esc_html__('Choose page main color', 'superfood'),
        'parent' => $general_meta_box
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_page_background_color_meta',
        'type' => 'color',
        'label' => esc_html__('Page Background Color', 'superfood'),
        'description' => esc_html__('Choose background color for page content', 'superfood'),
        'parent' => $general_meta_box
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_page_slider_meta',
        'type' => 'text',
        'default_value' => '',
        'label' => esc_html__('Slider Shortcode', 'superfood'),
        'description' => esc_html__('Paste your slider shortcode here', 'superfood'),
        'parent' => $general_meta_box
    )
);

$eltdf_content_padding_group = superfood_elated_add_admin_group(array(
    'name' => 'content_padding_group',
    'title' => esc_html__('Content Style', 'superfood'),
    'description' => esc_html__('Define styles for Content area', 'superfood'),
    'parent' => $general_meta_box
));

$eltdf_content_padding_row = superfood_elated_add_admin_row(array(
    'name' => 'eltdf_content_padding_row',
    'next' => true,
    'parent' => $eltdf_content_padding_group
));

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_page_content_top_padding',
        'type' => 'textsimple',
        'default_value' => '',
        'label' => esc_html__('Content Top Padding', 'superfood'),
        'parent' => $eltdf_content_padding_row,
        'args' => array(
            'suffix' => 'px'
        )
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_page_content_top_padding_mobile',
        'type' => 'selectsimple',
        'label' => esc_html__('Set this top padding for mobile header', 'superfood'),
        'parent' => $eltdf_content_padding_row,
        'options' => superfood_elated_get_yes_no_select_array(false)
    )
);

superfood_elated_add_meta_box_field(
    array(
        'name' => 'eltdf_page_comments_meta',
        'type' => 'select',
        'label' => esc_html__('Show Comments', 'superfood'),
        'description' => esc_html__('Enabling this option will show comments on your page', 'superfood'),
        'parent' => $general_meta_box,
        'options' => superfood_elated_get_yes_no_select_array()
    )
);