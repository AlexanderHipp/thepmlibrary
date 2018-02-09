<?php

$footer_meta_box = superfood_elated_add_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__('Footer', 'superfood'),
        'name' => 'footer_meta'
    )
);

    superfood_elated_add_meta_box_field(
        array(
            'name' => 'eltdf_disable_footer_meta',
            'type' => 'yesno',
            'default_value' => 'no',
            'label' => esc_html__('Disable Footer for this Page', 'superfood'),
            'description' => esc_html__('Enabling this option will hide footer on this page', 'superfood'),
            'parent' => $footer_meta_box
        )
    );

    superfood_elated_add_meta_box_field(
        array(
            'name' => 'eltdf_show_footer_top_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => esc_html__('Enable Top Footer Area', 'superfood'),
            'description' => esc_html__('Disabling this option will hide top footer area on this page', 'superfood'),
            'parent' => $footer_meta_box,
            'options' => superfood_elated_get_yes_no_select_array()
        )
    );

    superfood_elated_add_meta_box_field(
        array(
            'name' => 'eltdf_show_footer_bottom_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => esc_html__('Enable Bottom Footer Area', 'superfood'),
            'description' => esc_html__('Disabling this option will hide bottom footer area on this page', 'superfood'),
            'parent' => $footer_meta_box,
            'options' => superfood_elated_get_yes_no_select_array()
        )
    );

    superfood_elated_add_meta_box_field(
        array(
            'name'            => 'eltdf_uncovering_footer_behavior_meta',
            'type'            => 'select',
            'default_value'   => '',
            'label'           => esc_html__('Enable Uncovering Footer for this Page', 'superfood'),
            'description'     => esc_html__('Enabling this option will make uncovering Footer on this page', 'superfood'),
            'parent'          => $footer_meta_box,
            'options'       => array(
                ''          => '',
                'yes'       => esc_html__('Yes', 'superfood'),
                'no'        => esc_html__('No', 'superfood')
            )
        )
    );