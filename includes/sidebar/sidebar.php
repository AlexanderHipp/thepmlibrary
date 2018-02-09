<?php

if(!function_exists('superfood_elated_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function superfood_elated_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'superfood'),
            'id' => 'sidebar',
            'description' => esc_html__('Default Sidebar', 'superfood'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));
    }

    add_action('widgets_init', 'superfood_elated_register_sidebars');
}

if(!function_exists('superfood_elated_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates SuperfoodElatedClassSidebar object
     */
    function superfood_elated_add_support_custom_sidebar() {
        add_theme_support('SuperfoodElatedClassSidebar');
        if (get_theme_support('SuperfoodElatedClassSidebar')) new SuperfoodElatedClassSidebar();
    }

    add_action('after_setup_theme', 'superfood_elated_add_support_custom_sidebar');
}