<?php

$gallery_post_format_meta_box = superfood_elated_add_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Gallery Post Format', 'superfood'),
		'name' 	=> 'post_format_gallery_meta'
	)
);

superfood_elated_add_multiple_images_field(
	array(
		'name'        => 'eltdf_post_gallery_images_meta',
		'label'       => esc_html__('Gallery Images', 'superfood'),
		'description' => esc_html__('Choose your gallery images', 'superfood'),
		'parent'      => $gallery_post_format_meta_box,
	)
);
