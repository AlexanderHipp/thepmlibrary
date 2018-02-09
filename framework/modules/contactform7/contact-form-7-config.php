<?php
if ( ! function_exists('superfood_elated_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function superfood_elated_contact_form_map()
	{

		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'superfood'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'superfood') => 'default',
				esc_html__('Custom Style 1', 'superfood') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2', 'superfood') => 'cf7_custom_style_2',
				esc_html__('Custom Style 3', 'superfood') => 'cf7_custom_style_3'
			),
			'description' => esc_html__('You can style each form element individually in Elated Options > Contact Form 7', 'superfood')
		));

	}
	add_action('vc_after_init', 'superfood_elated_contact_form_map');
}
?>