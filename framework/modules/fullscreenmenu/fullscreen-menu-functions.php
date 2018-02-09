<?php

if(!function_exists('superfood_elated_register_full_screen_menu_nav')) {
    function superfood_elated_register_full_screen_menu_nav() {
	    register_nav_menus(
		    array(
			    'popup-navigation' => esc_html__('Fullscreen Navigation', 'superfood')
		    )
	    );
    }

	add_action('after_setup_theme', 'superfood_elated_register_full_screen_menu_nav');
}

if ( !function_exists('superfood_elated_register_full_screen_menu_sidebars') ) {

	function superfood_elated_register_full_screen_menu_sidebars() {

		register_sidebar(array(
			'name' => esc_html__('Fullscreen Menu Top', 'superfood'),
			'id' => 'fullscreen_menu_above',
			'description' => esc_html__('This widget area is rendered above fullscreen menu', 'superfood'),
			'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-above-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="eltdf-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

		register_sidebar(array(
			'name' => esc_html__('Fullscreen Menu Bottom', 'superfood'),
			'id' => 'fullscreen_menu_below',
			'description' => esc_html__('This widget area is rendered below fullscreen menu', 'superfood'),
			'before_widget' => '<div class="%2$s eltdf-fullscreen-menu-below-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="eltdf-fullscreen-widget-title">',
			'after_title' => '</h4>'
		));

	}

	add_action('widgets_init', 'superfood_elated_register_full_screen_menu_sidebars');

}

if(!function_exists('superfood_elated_fullscreen_menu_body_class')) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function superfood_elated_fullscreen_menu_body_class($classes) {

		if ( is_active_widget( false, false, 'eltdf_full_screen_menu_opener' ) ) {

			$classes[] = 'eltdf-' . superfood_elated_options()->getOptionValue('fullscreen_menu_animation_style');

		}

		return $classes;
	}

	add_filter('body_class', 'superfood_elated_fullscreen_menu_body_class');
}

if ( !function_exists('superfood_elated_get_full_screen_menu') ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function superfood_elated_get_full_screen_menu() {

		if ( is_active_widget( false, false, 'eltdf_full_screen_menu_opener' ) ) {

			$parameters = array(
				'fullscreen_menu_in_grid' => superfood_elated_options()->getOptionValue('fullscreen_in_grid') === 'yes' ? true : false
			);

			superfood_elated_get_module_template_part('templates/fullscreen-menu', 'fullscreenmenu', '', $parameters);
		}
	}
}

if ( !function_exists('superfood_elated_get_full_screen_menu_navigation') ) {
	/**
	 * Loads fullscreen menu navigation HTML template
	 */
	function superfood_elated_get_full_screen_menu_navigation() {

		superfood_elated_get_module_template_part('templates/parts/navigation', 'fullscreenmenu');
	}
}