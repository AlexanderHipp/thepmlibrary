<?php

$audio_post_format_meta_box = superfood_elated_add_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Audio Post Format', 'superfood'),
		'name' 	=> 'post_format_audio_meta'
	)
);

superfood_elated_add_meta_box_field(
	array(
		'name'        => 'eltdf_post_audio_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Link', 'superfood'),
		'description' => esc_html__('Enter audion link', 'superfood'),
		'parent'      => $audio_post_format_meta_box,
	)
);