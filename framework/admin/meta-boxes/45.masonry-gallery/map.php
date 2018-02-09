<?php

$masonry_gallery_meta_box = superfood_elated_add_meta_box(
	array(
		'scope' => array('masonry-gallery'),
		'title' => esc_html__('Masonry Gallery General', 'superfood'),
		'name' => 'masonry_gallery_meta'
	)
);


	superfood_elated_add_meta_box_field(
		array(
			'name' => 'eltdf_masonry_gallery_item_title_tag',
			'type' => 'select',
			'default_value' => 'h4',
			'label' => esc_html__('Title Tag', 'superfood'),
			'parent' => $masonry_gallery_meta_box,
			'options' => superfood_elated_get_title_tag()
		)
	);
	
	superfood_elated_add_meta_box_field(
		array(
			'name' => 'eltdf_masonry_gallery_item_text',
			'type' => 'text',
			'label' => esc_html__('Text', 'superfood'),
			'parent' => $masonry_gallery_meta_box
		)
	);

	superfood_elated_add_meta_box_field(
		array(
			'name' => 'eltdf_masonry_gallery_item_image',
			'type' => 'image',
			'label' => esc_html__('Custom Item Icon', 'superfood'),
			'parent' => $masonry_gallery_meta_box
		)
	);

	superfood_elated_add_meta_box_field(
		array(
			'name' => 'eltdf_masonry_gallery_item_link',
			'type' => 'text',
			'label' => esc_html__('Link', 'superfood'),
			'parent' => $masonry_gallery_meta_box
		)
	);
	
	superfood_elated_add_meta_box_field(
		array(
			'name' => 'eltdf_masonry_gallery_item_link_target',
			'type' => 'select',
			'default_value' => '_self',
			'label' => esc_html__('Link Target', 'superfood'),
			'parent' => $masonry_gallery_meta_box,
			'options' => array(
				'_self' => esc_html__('Same Browser', 'superfood'),
				'_blank' => esc_html__('New Browser', 'superfood')
			)
		)
	);

	superfood_elated_add_admin_section_title(array(
		'name'   => 'eltdf_section_style_title',
		'parent' => $masonry_gallery_meta_box,
		'title'  => esc_html__('Masonry Gallery Item Style', 'superfood')
	));

		superfood_elated_add_meta_box_field(
			array(
				'name' => 'eltdf_masonry_gallery_item_size',
				'type' => 'select',
				'default_value' => 'square-small',
				'label' => esc_html__('Size', 'superfood'),
				'parent' => $masonry_gallery_meta_box,
				'options' => array(
					'square-small'			=> esc_html__('Square Small', 'superfood'),
					'square-big'			=> esc_html__('Square Big', 'superfood'),
					'rectangle-portrait'	=> esc_html__('Rectangle Portrait', 'superfood'),
					'rectangle-landscape'	=> esc_html__('Rectangle Landscape', 'superfood')
				)
			)
		);
		
		superfood_elated_add_meta_box_field(
			array(
				'name' => 'eltdf_masonry_gallery_item_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' => esc_html__('Type', 'superfood'),
				'parent' => $masonry_gallery_meta_box,
				'options' => array(
					'standard'		=> esc_html__('Standard', 'superfood'),
					'with-button'	=> esc_html__('With Button', 'superfood'),
					'simple'		=> esc_html__('Simple', 'superfood')
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'with-button' => '#eltdf_masonry_gallery_item_simple_type_container',
						'simple' => '#eltdf_masonry_gallery_item_button_type_container',
						'standard' => '#eltdf_masonry_gallery_item_button_type_container, #eltdf_masonry_gallery_item_simple_type_container'
					),
					'show' => array(
						'with-button' => '#eltdf_masonry_gallery_item_button_type_container',
						'simple' => '#eltdf_masonry_gallery_item_simple_type_container',
						'standard' => ''
					)
				)
			)
		);

			$masonry_gallery_item_button_type_container = superfood_elated_add_admin_container_no_style(array(
				'name'				=> 'masonry_gallery_item_button_type_container',
				'parent'			=> $masonry_gallery_meta_box,
				'hidden_property'	=> 'eltdf_masonry_gallery_item_type',
				'hidden_values'		=> array('standard', 'simple')
			));

				superfood_elated_add_meta_box_field(
					array(
						'name' => 'eltdf_masonry_gallery_button_label',
						'type' => 'text',
						'label' => esc_html__('Button Label', 'superfood'),
						'parent' => $masonry_gallery_item_button_type_container
					)
				);

			$masonry_gallery_item_simple_type_container = superfood_elated_add_admin_container_no_style(array(
				'name'				=> 'masonry_gallery_item_simple_type_container',
				'parent'			=> $masonry_gallery_meta_box,
				'hidden_property'	=> 'eltdf_masonry_gallery_item_type',
				'hidden_values'		=> array('standard', 'with-button')
			));
			
				superfood_elated_add_meta_box_field(
					array(
						'name' => 'eltdf_masonry_gallery_simple_content_background_skin',
						'type' => 'select',
						'default_value' => '',
						'label' => esc_html__('Content Background Skin', 'superfood'),
						'parent' => $masonry_gallery_item_simple_type_container,
						'options' => array(
							'default' => esc_html__('Default', 'superfood'),
							'light'	=> esc_html__('Light', 'superfood'),
							'dark'	=> esc_html__('Dark', 'superfood')
						)
					)
				);