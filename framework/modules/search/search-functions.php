<?php

if( !function_exists('superfood_elated_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function superfood_elated_search_body_class($classes) {

		if ( is_active_widget( false, false, 'eltdf_search_opener' ) ) {

			$classes[] = 'eltdf-fullscreen-search';

			$classes[] = 'eltdf-search-fade';
		}
		
		return $classes;
	}

	add_filter('body_class', 'superfood_elated_search_body_class');
}

if ( ! function_exists('superfood_elated_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function superfood_elated_get_search() {
		
		if ( superfood_elated_active_widget( false, false, 'eltdf_search_opener' ) ) {
			
			superfood_elated_load_search_template();
		}
	}
}

if ( ! function_exists('superfood_elated_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function superfood_elated_load_search_template() {
		
		superfood_elated_get_module_template_part('templates/fullscreen-search', 'search');
	}
}