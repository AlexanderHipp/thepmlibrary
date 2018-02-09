<?php

if ( ! function_exists('superfood_elated_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function superfood_elated_reset_options_map() {

		superfood_elated_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'superfood'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = superfood_elated_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'superfood')
			)
		);

		superfood_elated_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Reset to Defaults', 'superfood'),
			'description'	=> esc_html__('This option will reset all Select Options values to defaults', 'superfood'),
			'parent'		=> $panel_reset
		));
	}

	add_action( 'superfood_elated_options_map', 'superfood_elated_reset_options_map', 100 );
}