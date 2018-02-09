<?php

$video_post_format_meta_box = superfood_elated_add_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__('Video Post Format', 'superfood'),
		'name' 	=> 'post_format_video_meta'
	)
);

superfood_elated_add_meta_box_field(
	array(
		'name'        => 'eltdf_video_type_meta',
		'type'        => 'select',
		'label'       => esc_html__('Video Type', 'superfood'),
		'description' => esc_html__('Choose video type', 'superfood'),
		'parent'      => $video_post_format_meta_box,
		'default_value' => 'social_networks',
		'options'     => array(
			'social_networks' => esc_html__('Youtube or Vimeo', 'superfood'),
			'self' => esc_html__('Self Hosted', 'superfood')
		),
		'args' => array(
			'dependence' => true,
			'hide' => array(
				'social_networks' => '#eltdf_eltdf_video_self_hosted_container',
				'self' => '#eltdf_eltdf_video_embedded_container'
			),
			'show' => array(
				'social_networks' => '#eltdf_eltdf_video_embedded_container',
				'self' => '#eltdf_eltdf_video_self_hosted_container')
		)
	)
);

$eltdf_video_embedded_container = superfood_elated_add_admin_container(
	array(
		'parent' => $video_post_format_meta_box,
		'name' => 'eltdf_video_embedded_container',
		'hidden_property' => 'eltdf_video_type_meta',
		'hidden_value' => 'self'
	)
);

$eltdf_video_self_hosted_container = superfood_elated_add_admin_container(
	array(
		'parent' => $video_post_format_meta_box,
		'name' => 'eltdf_video_self_hosted_container',
		'hidden_property' => 'eltdf_video_type_meta',
		'hidden_value' => 'social_networks'
	)
);

superfood_elated_add_meta_box_field(
	array(
		'name'        => 'eltdf_post_video_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Video URL', 'superfood'),
		'description' => esc_html__('Enter Video URL', 'superfood'),
		'parent'      => $eltdf_video_embedded_container,
	)
);

superfood_elated_add_meta_box_field(
	array(
		'name'        => 'eltdf_post_video_image_meta',
		'type'        => 'image',
		'label'       => esc_html__('Video Image', 'superfood'),
		'description' => esc_html__('Upload video image', 'superfood'),
		'parent'      => $eltdf_video_self_hosted_container,
	)
);

superfood_elated_add_meta_box_field(
	array(
		'name'        => 'eltdf_post_video_mp4_link_meta',
		'type'        => 'text',
		'label'       => esc_html__('Video MP4', 'superfood'),
		'description' => esc_html__('Enter video URL for MP4 format', 'superfood'),
		'parent'      => $eltdf_video_self_hosted_container,
	)
);