<?php

$testimonial_meta_box = superfood_elated_add_meta_box(
    array(
        'scope' => array('testimonials'),
        'title' => esc_html__('Testimonial', 'superfood'),
        'name' => 'testimonial_meta'
    )
);

    superfood_elated_add_meta_box_field(
        array(
            'name'        	=> 'eltdf_testimonial_title',
            'type'        	=> 'text',
            'label'       	=> esc_html__('Title', 'superfood'),
            'description' 	=> esc_html__('Enter testimonial title', 'superfood'),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    superfood_elated_add_meta_box_field(
        array(
            'name'        	=> 'eltdf_testimonial_text',
            'type'        	=> 'text',
            'label'       	=> esc_html__('Text', 'superfood'),
            'description' 	=> esc_html__('Enter testimonial text', 'superfood'),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    superfood_elated_add_meta_box_field(
        array(
            'name'        	=> 'eltdf_testimonial_author',
            'type'        	=> 'text',
            'label'       	=> esc_html__('Author', 'superfood'),
            'description' 	=> esc_html__('Enter author name', 'superfood'),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    superfood_elated_add_meta_box_field(
        array(
            'name'        	=> 'eltdf_testimonial_author_position',
            'type'        	=> 'text',
            'label'       	=> esc_html__('Job Position', 'superfood'),
            'description' 	=> esc_html__('Enter job position', 'superfood'),
            'parent'      	=> $testimonial_meta_box,
        )
    );