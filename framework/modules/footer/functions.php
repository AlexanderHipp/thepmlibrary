<?php

if (!function_exists('superfood_elated_get_footer_classes')) {
	/**
	 * Return all footer classes
	 *
	 * @param $page_id
	 * @return string|void
	 */
	function superfood_elated_get_footer_classes($page_id) {

		$footer_classes                     = '';
		$footer_classes_array               = array();

		if(get_post_meta($page_id, 'eltdf_disable_footer_meta', true) == 'yes'){
			$footer_classes_array[] = 'eltdf-disable-footer';
		}

		//is uncovering footer option set in theme options?
        $uncovering_footer = superfood_elated_get_meta_field_intersect('uncovering_footer_behavior', $page_id);

        if($uncovering_footer === 'yes') {
            $footer_classes_array[] = 'eltdf-footer-uncover';
        }

		//is some class added to footer classes array?
		if(is_array($footer_classes_array) && count($footer_classes_array)) {
			//concat all classes and prefix it with class attribute
			$footer_classes = esc_attr(implode(' ', $footer_classes_array));
		}

		return $footer_classes;
	}
}

if (!function_exists('superfood_elated_footer_top_classes')) {
	/**
	 * Return classes for footer top
	 *
	 * @return string
	 */
	function superfood_elated_footer_top_classes() {

		$footer_top_classes = array();

		if(superfood_elated_options()->getOptionValue('footer_in_grid') != 'yes') {
			$footer_top_classes[] = 'eltdf-footer-top-full';
		}

		//footer aligment
		if(superfood_elated_options()->getOptionValue('footer_top_columns_alignment') != '') {
			$footer_top_classes[] = 'eltdf-footer-top-alignment-'.superfood_elated_options()->getOptionValue('footer_top_columns_alignment');
		}

		return implode(' ', $footer_top_classes);
	}
}

if (!function_exists('superfood_elated_footer_bottom_classes')) {
	/**
	 * Return classes for footer bottom
	 *
	 * @return string
	 */
	function superfood_elated_footer_bottom_classes() {

		$footer_bottom_classes = array();

		if(superfood_elated_options()->getOptionValue('footer_in_grid') != 'yes') {
			$footer_bottom_classes[] = 'eltdf-footer-bottom-full';
		}

		//footer aligment
		if(superfood_elated_options()->getOptionValue('footer_bottom_columns_alignment') != '') {
			$footer_bottom_classes[] = 'eltdf-footer-bottom-alignment-'.superfood_elated_options()->getOptionValue('footer_bottom_columns_alignment');
		}

		return implode(' ', $footer_bottom_classes);
	}
}