<?php

if(!function_exists('superfood_elated_header_class')) {
    /**
     * Function that adds class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added header class
     */
    function superfood_elated_header_class($classes) {
        $header_type = superfood_elated_get_meta_field_intersect('header_type', superfood_elated_get_page_id());

        $classes[] = 'eltdf-'.$header_type;

        return $classes;
    }

    add_filter('body_class', 'superfood_elated_header_class');
}

if(!function_exists('superfood_elated_header_behaviour_class')) {
    /**
     * Function that adds behaviour class to header based on theme options
     * @param array array of classes from main filter
     * @return array array of classes with added behaviour class
     */
    function superfood_elated_header_behaviour_class($classes) {

        $classes[] = 'eltdf-'.superfood_elated_options()->getOptionValue('header_behaviour');

        return $classes;
    }

    add_filter('body_class', 'superfood_elated_header_behaviour_class');
}

if(!function_exists('superfood_elated_mobile_header_class')) {
    function superfood_elated_mobile_header_class($classes) {
        $classes[] = 'eltdf-default-mobile-header';

        $classes[] = 'eltdf-sticky-up-mobile-header';

        return $classes;
    }

    add_filter('body_class', 'superfood_elated_mobile_header_class');
}

if(!function_exists('superfood_elated_menu_dropdown_appearance')) {
    /**
     * Function that adds menu dropdown appearance class to body tag
     * @param array array of classes from main filter
     * @return array array of classes with added menu dropdown appearance class
     */
    function superfood_elated_menu_dropdown_appearance($classes) {

        if(superfood_elated_options()->getOptionValue('menu_dropdown_appearance') !== 'default'){
            $classes[] = 'eltdf-'.superfood_elated_options()->getOptionValue('menu_dropdown_appearance');
        }

        return $classes;
    }

    add_filter('body_class', 'superfood_elated_menu_dropdown_appearance');
}

if (!function_exists('superfood_elated_header_skin_class')) {

    function superfood_elated_header_skin_class( $classes ) {

        $id = superfood_elated_get_page_id();

		if(($meta_temp = get_post_meta($id, 'eltdf_header_style_meta', true)) !== ''){
			$classes[] = 'eltdf-' . $meta_temp;
		}
        else if ( is_404() && superfood_elated_options()->getOptionValue('404_header_style') !== '' ) {
            $classes[] = 'eltdf-' . superfood_elated_options()->getOptionValue('404_header_style');
        }
        else if ( superfood_elated_options()->getOptionValue('header_style') !== '' ) {
            $classes[] = 'eltdf-' . superfood_elated_options()->getOptionValue('header_style');
        }

        return $classes;
    }

    add_filter('body_class', 'superfood_elated_header_skin_class');
}

if(!function_exists('superfood_elated_header_global_js_var')) {
    function superfood_elated_header_global_js_var($global_variables) {

        $global_variables['eltdfTopBarHeight'] = superfood_elated_get_top_bar_height();
        $global_variables['eltdfStickyHeaderHeight'] = superfood_elated_get_sticky_header_height();
        $global_variables['eltdfStickyHeaderTransparencyHeight'] = superfood_elated_get_sticky_header_height_of_complete_transparency();
        $global_variables['eltdfStickyScrollAmount'] = superfood_elated_get_sticky_scroll_amount();

        return $global_variables;
    }

    add_filter('superfood_elated_js_global_variables', 'superfood_elated_header_global_js_var');
}

if(!function_exists('superfood_elated_header_per_page_js_var')) {
    function superfood_elated_header_per_page_js_var($perPageVars) {

        $perPageVars['eltdfStickyScrollAmount'] = superfood_elated_get_sticky_scroll_amount_per_page();

        return $perPageVars;
    }

    add_filter('superfood_elated_per_page_js_vars', 'superfood_elated_header_per_page_js_var');
}