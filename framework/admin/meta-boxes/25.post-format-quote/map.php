<?php

$quote_post_format_meta_box = superfood_elated_add_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Quote Post Format', 'superfood'),
		'name' 	=> 'post_format_quote_meta'
	)
);

superfood_elated_add_meta_box_field(
	array(
		'name'        => 'eltdf_post_quote_text_meta',
		'type'        => 'text',
		'label'       => esc_html__('Quote Text', 'superfood'),
		'description' => esc_html__('Enter Quote text', 'superfood'),
		'parent'      => $quote_post_format_meta_box,

	)
);

superfood_elated_add_meta_box_field(
	array(
		'name'        => 'eltdf_post_quote_author_meta',
		'type'        => 'text',
		'label'       => esc_html__('Quote Author', 'superfood'),
		'description' => esc_html__('Enter Quote author', 'superfood'),
		'parent'      => $quote_post_format_meta_box,
	)
);