<?php

if(!function_exists('superfood_elated_register_top_header_areas')) {
    /**
     * Registers widget areas for top header bar when it is enabled
     */
    function superfood_elated_register_top_header_areas() {

        register_sidebar(array(
            'name'          => esc_html__('Top Bar Left Column', 'superfood'),
            'id'            => 'eltdf-top-bar-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-top-bar-widget">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the left side in top bar header', 'superfood')
        ));

        register_sidebar(array(
            'name'          => esc_html__('Top Bar Right Column', 'superfood'),
            'id'            => 'eltdf-top-bar-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-top-bar-widget">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the right side in top bar header', 'superfood')
        ));
    }

    add_action('widgets_init', 'superfood_elated_register_top_header_areas');
}

if(!function_exists('superfood_elated_header_widget_areas')) {
    /**
     * Registers widget areas for header types
     */
    function superfood_elated_header_standard_widget_areas() {
        register_sidebar(array(
            'name'          => esc_html__('Header Widget Area', 'superfood'),
            'id'            => 'eltdf-header-widget-area',
            'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-header-widget-area">',
            'after_widget'  => '</div>',
            'description'   => esc_html__('Widgets added here will appear on the right hand side from the main menu', 'superfood')
        ));
    }

    add_action('widgets_init', 'superfood_elated_header_standard_widget_areas');
}

if(!function_exists('superfood_elated_register_mobile_header_areas')) {
    /**
     * Registers widget areas for mobile header
     */
    function superfood_elated_register_mobile_header_areas() {
        if(superfood_elated_is_responsive_on()) {
            register_sidebar(array(
                'name'          => esc_html__('Mobile Header Widget Area', 'superfood'),
                'id'            => 'eltdf-right-from-mobile-logo',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-right-from-mobile-logo">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the mobile logo on mobile header', 'superfood')
            ));
        }
    }

    add_action('widgets_init', 'superfood_elated_register_mobile_header_areas');
}

if(!function_exists('superfood_elated_register_sticky_header_areas')) {
    /**
     * Registers widget area for sticky header
     */
    function superfood_elated_register_sticky_header_areas() {
        if(in_array(superfood_elated_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {
            register_sidebar(array(
                'name'          => esc_html__('Sticky Header Widget Area', 'superfood'),
                'id'            => 'eltdf-sticky-right',
                'before_widget' => '<div id="%1$s" class="widget %2$s eltdf-sticky-right">',
                'after_widget'  => '</div>',
                'description'   => esc_html__('Widgets added here will appear on the right hand side from the sticky menu', 'superfood')
            ));
        }
    }

    add_action('widgets_init', 'superfood_elated_register_sticky_header_areas');
}