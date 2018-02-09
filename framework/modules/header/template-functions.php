<?php

use SuperfoodElatedNamespace\Modules\Header\Lib\HeaderFactory;

if (!function_exists('superfood_elated_get_header')) {
    /**
     * Loads header HTML based on header type option. Sets all necessary parameters for header
     * and defines superfood_elated_header_type_parameters filter
     */
    function superfood_elated_get_header() {

        //will be read from options
        $header_type = superfood_elated_get_meta_field_intersect('header_type');

        $header_in_grid = superfood_elated_get_meta_field_intersect('enable_grid_layout_header');

        $set_menu_area_position = superfood_elated_get_meta_field_intersect('set_menu_area_position');

        $full_screen_header_in_grid = superfood_elated_get_meta_field_intersect('enable_grid_layout_header_full_screen');

        $header_divided_in_grid = superfood_elated_get_meta_field_intersect('enable_grid_layout_header_divided');

        $header_behavior = superfood_elated_options()->getOptionValue('header_behaviour');

        $page_id = superfood_elated_get_page_id();
        if (superfood_elated_is_woocommerce_installed() && superfood_elated_is_woocommerce_shop()) {
            //get shop page id from options table
            $shop_id = get_option('woocommerce_shop_page_id');

            if (!empty($shop_id)) {
                $page_id = $shop_id;
            } else {
                $page_id = '-1';
            }
        }

        extract(superfood_elated_get_page_options());

        if (HeaderFactory::getInstance()->validHeaderObject()) {
            $parameters = array(
                'page_id' => $page_id,
                'hide_logo' => superfood_elated_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
                'header_in_grid' => $header_in_grid == 'yes' ? true : false,
                'standard_menu_area_class' => $set_menu_area_position == 'right' ? 'eltdf-menu-right' : 'eltdf-menu-center',
                'set_menu_area_position' => $set_menu_area_position,
                'full_screen_header_in_grid' => $full_screen_header_in_grid == 'yes' ? true : false,
                'header_divided_in_grid' => $header_divided_in_grid == 'yes' ? true : false,
                'show_sticky' => in_array($header_behavior, array(
                    'sticky-header-on-scroll-up',
                    'sticky-header-on-scroll-down-up'
                )) ? true : false,
                'show_fixed_wrapper' => in_array($header_behavior, array('fixed-on-scroll')) ? true : false,
                'menu_area_background_color' => $menu_area_background_color,
                'menu_area_border_bottom_color' => $menu_area_border_bottom_color,
                'vertical_header_background_color' => $vertical_header_background_color,
                'vertical_header_opacity' => $vertical_header_opacity,
                'vertical_background_image' => $vertical_background_image,
                'vertical_text_align_class' => $vertical_text_align_class,
            );

            $parameters = apply_filters('superfood_elated_header_type_parameters', $parameters, $header_type);

            HeaderFactory::getInstance()->getHeaderObject()->loadTemplate($parameters);
        }
    }
}

if (!function_exists('superfood_elated_get_header_top')) {
    /**
     * Loads header top HTML and sets parameters for it
     */
    function superfood_elated_get_header_top() {

        $params = array(
            'show_header_top' => superfood_elated_get_meta_field_intersect('top_bar') === 'yes' ? true : false,
            'top_bar_in_grid' => superfood_elated_get_meta_field_intersect('top_bar_in_grid') === 'yes' ? true : false
        );

        $params = apply_filters('superfood_elated_header_top_params', $params);

        superfood_elated_get_module_template_part('templates/parts/header-top', 'header', '', $params);
    }
}

if (!function_exists('superfood_elated_get_logo')) {
    /**
     * Loads logo HTML
     *
     * @param $slug
     */
    function superfood_elated_get_logo($slug = '') {

        $slug = $slug !== '' ? $slug : superfood_elated_options()->getOptionValue('header_type');

        if ($slug == 'sticky') {
            $logo_image = superfood_elated_options()->getOptionValue('logo_image_sticky');
        } else if ($slug == 'vertical') {
            $logo_image = superfood_elated_options()->getOptionValue('logo_image_vertical_header');
        } else {
            $logo_image = superfood_elated_options()->getOptionValue('logo_image');
        }

        $logo_image_dark = superfood_elated_options()->getOptionValue('logo_image_dark');
        $logo_image_light = superfood_elated_options()->getOptionValue('logo_image_light');


        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = superfood_elated_get_image_dimensions($logo_image);

        $logo_height = '';
        $logo_styles = '';
        if (is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: ' . intval($logo_height / 2) . 'px;'; //divided with 2 because of retina screens
        }

        $params = array(
            'logo_image' => $logo_image,
            'logo_image_dark' => $logo_image_dark,
            'logo_image_light' => $logo_image_light,
            'logo_styles' => $logo_styles
        );

        superfood_elated_get_module_template_part('templates/parts/logo', 'header', $slug, $params);
    }
}

if (!function_exists('superfood_elated_get_main_menu')) {
    /**
     * Loads main menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function superfood_elated_get_main_menu($additional_class = 'eltdf-default-nav') {
        superfood_elated_get_module_template_part('templates/parts/navigation', 'header', '', array('additional_class' => $additional_class));
    }
}

if (!function_exists('superfood_elated_get_divided_left_main_menu')) {
    /**
     * Loads main menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function superfood_elated_get_divided_left_main_menu($additional_class = 'eltdf-default-nav') {
        superfood_elated_get_module_template_part('templates/parts/divided-left-navigation', 'header', '', array('additional_class' => $additional_class));
    }
}

if (!function_exists('superfood_elated_get_divided_right_main_menu')) {
    /**
     * Loads main menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function superfood_elated_get_divided_right_main_menu($additional_class = 'eltdf-default-nav') {
        superfood_elated_get_module_template_part('templates/parts/divided-right-navigation', 'header', '', array('additional_class' => $additional_class));
    }
}

if (!function_exists('superfood_elated_get_vertical_main_menu')) {
    /**
     * Loads vertical menu HTML
     */
    function superfood_elated_get_vertical_main_menu() {
        superfood_elated_get_module_template_part('templates/parts/vertical-navigation', 'header', '');
    }
}

if (!function_exists('superfood_elated_get_sticky_menu')) {
    /**
     * Loads sticky menu HTML
     *
     * @param string $additional_class addition class to pass to template
     */
    function superfood_elated_get_sticky_menu($additional_class = 'eltdf-default-nav') {
        superfood_elated_get_module_template_part('templates/parts/sticky-navigation', 'header', '', array('additional_class' => $additional_class));
    }
}

if (!function_exists('superfood_elated_get_sticky_header')) {
    /**
     * Loads sticky header behavior HTML
     */
    function superfood_elated_get_sticky_header($slug = '') {

        $parameters = array(
            'hide_logo' => superfood_elated_options()->getOptionValue('hide_logo') == 'yes' ? true : false,
            'sticky_header_in_grid' => superfood_elated_options()->getOptionValue('sticky_header_in_grid') == 'yes' ? true : false
        );

        superfood_elated_get_module_template_part('templates/behaviors/sticky-header', 'header', $slug, $parameters);
    }
}

if (!function_exists('superfood_elated_get_mobile_header')) {
    /**
     * Loads mobile header HTML only if responsiveness is enabled
     */
    function superfood_elated_get_mobile_header() {
        if (superfood_elated_is_responsive_on()) {

            $mobile_menu_title = superfood_elated_options()->getOptionValue('mobile_menu_title');

            $has_navigation = false;
            if (has_nav_menu('main-navigation') || has_nav_menu('mobile-navigation')) {
                $has_navigation = true;
            }

            $parameters = array(
                'show_logo' => superfood_elated_options()->getOptionValue('hide_logo') == 'yes' ? false : true,
                'show_navigation_opener' => $has_navigation,
                'mobile_menu_title' => $mobile_menu_title
            );

            superfood_elated_get_module_template_part('templates/types/mobile-header', 'header', '', $parameters);
        }
    }
}

if (!function_exists('superfood_elated_get_mobile_logo')) {
    /**
     * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
     *
     * @param string $slug
     */
    function superfood_elated_get_mobile_logo($slug = '') {

        $slug = $slug !== '' ? $slug : superfood_elated_options()->getOptionValue('header_type');

        //check if mobile logo has been set and use that, else use normal logo
        if (superfood_elated_options()->getOptionValue('logo_image_mobile') !== '') {
            $logo_image = superfood_elated_options()->getOptionValue('logo_image_mobile');
        } else {
            $logo_image = superfood_elated_options()->getOptionValue('logo_image');
        }

        //get logo image dimensions and set style attribute for image link.
        $logo_dimensions = superfood_elated_get_image_dimensions($logo_image);

        $logo_height = '';
        $logo_styles = '';
        if (is_array($logo_dimensions) && array_key_exists('height', $logo_dimensions)) {
            $logo_height = $logo_dimensions['height'];
            $logo_styles = 'height: ' . intval($logo_height / 2) . 'px'; //divided with 2 because of retina screens
        }

        //set parameters for logo
        $parameters = array(
            'logo_image' => $logo_image,
            'logo_dimensions' => $logo_dimensions,
            'logo_height' => $logo_height,
            'logo_styles' => $logo_styles
        );

        superfood_elated_get_module_template_part('templates/parts/mobile-logo', 'header', $slug, $parameters);
    }
}

if (!function_exists('superfood_elated_get_mobile_nav')) {
    /**
     * Loads mobile navigation HTML
     */
    function superfood_elated_get_mobile_nav() {

        superfood_elated_get_module_template_part('templates/parts/mobile-navigation', 'header', '');
    }
}

if (!function_exists('superfood_elated_get_page_options')) {
    /**
     * Gets options from page
     */
    function superfood_elated_get_page_options() {
        $id = superfood_elated_get_page_id();
        if (superfood_elated_is_woocommerce_installed() && superfood_elated_is_woocommerce_shop()) {
            //get shop page id from options table
            $shop_id = get_option('woocommerce_shop_page_id');

            if (!empty($shop_id)) {
                $id = $shop_id;
            } else {
                $id = '-1';
            }
        }

        $page_options = array();
        $menu_area_background_color_rgba = '';
        $menu_area_background_color = '';
        $menu_area_background_transparency = '1';
        $menu_area_border_bottom_color = '';
        $vertical_header_background_color = '';
        $vertical_header_opacity = '';
        $vertical_background_image = '';
        $vertical_text_align_class = '';

        $header_type = superfood_elated_get_meta_field_intersect('header_type', $id);

        switch ($header_type) {
            case 'header-standard':

                $background_color = get_post_meta($id, 'eltdf_menu_area_background_color_header_standard_meta', true);
                $background_transparency = get_post_meta($id, 'eltdf_menu_area_background_transparency_header_standard_meta', true);
                $border_bottom_color = get_post_meta($id, 'eltdf_menu_area_border_bottom_color_header_standard_meta', true);

                if ($background_transparency !== '') {
                    $menu_area_background_transparency = $background_transparency;
                }

                if ($background_color !== '') {
                    $menu_area_background_color = $background_color;
                } elseif ($background_transparency !== '') {
                    $menu_area_background_color = '#fff';
                }

                if ($border_bottom_color !== '') {
                    $menu_area_border_bottom_color = 'border-color:' . $border_bottom_color;
                }

                $background_color_rgba = superfood_elated_rgba_color($menu_area_background_color, $menu_area_background_transparency);

                if ($background_color_rgba !== null) {
                    $menu_area_background_color_rgba = 'background-color:' . $background_color_rgba . ';';
                }

                break;


            case 'header-full-screen':

                $background_color = get_post_meta($id, 'eltdf_menu_area_background_color_header_full_screen_meta', true);
                $background_transparency = get_post_meta($id, 'eltdf_menu_area_background_transparency_header_full_screen_meta', true);
                $border_bottom_color = get_post_meta($id, 'eltdf_menu_area_border_bottom_color_header_full_screen_meta', true);

                if ($background_transparency !== '') {
                    $menu_area_background_transparency = $background_transparency;
                }

                if ($background_color !== '') {
                    $menu_area_background_color = $background_color;
                } elseif ($background_transparency !== '') {
                    $menu_area_background_color = '#fff';
                }

                if ($border_bottom_color !== '') {
                    $menu_area_border_bottom_color = 'border-color:' . $border_bottom_color;
                }

                $background_color_rgba = superfood_elated_rgba_color($menu_area_background_color, $menu_area_background_transparency);

                if ($background_color_rgba !== null) {
                    $menu_area_background_color_rgba = 'background-color:' . $background_color_rgba;
                }

                break;


            case 'header-vertical':

                $background_color = get_post_meta($id, 'eltdf_vertical_header_background_color_meta', true);
                $background_transparency = get_post_meta($id, 'eltdf_vertical_header_transparency_meta', true);
                $text_align = superfood_elated_get_meta_field_intersect('vertical_header_text_align');

                if ($background_transparency !== '') {
                    $vertical_header_opacity = 'opacity:' . $background_transparency;
                }

                if ($background_color !== '') {
                    $vertical_header_background_color = 'background-color:' . $background_color;
                } elseif ($background_transparency !== '') {
                    $vertical_header_background_color = 'background-color:#000';
                }

                if (get_post_meta($id, 'eltdf_disable_vertical_header_background_image_meta', true) === 'yes') {
                    $vertical_background_image = 'background-image: none';
                } elseif (($meta_temp = get_post_meta($id, 'eltdf_vertical_header_background_image_meta', true)) !== '') {
                    $vertical_background_image = 'background-image: url(' . $meta_temp . ')';
                }

                if ($text_align !== '') {
                    $vertical_text_align_class = 'eltdf-vertical-align-' . $text_align;
                }

                break;


            case 'header-divided':

                $background_color = get_post_meta($id, 'eltdf_menu_area_background_color_header_divided_meta', true);
                $background_transparency = get_post_meta($id, 'eltdf_menu_area_background_transparency_header_divided_meta', true);
                $border_bottom_color = get_post_meta($id, 'eltdf_menu_area_border_bottom_color_header_divided_meta', true);

                if ($background_transparency !== '') {
                    $menu_area_background_transparency = $background_transparency;
                }

                if ($background_color !== '') {
                    $menu_area_background_color = $background_color;
                } elseif ($background_transparency !== '') {
                    $menu_area_background_color = '#fff';
                }

                if ($border_bottom_color !== '') {
                    $menu_area_border_bottom_color = 'border-color:' . $border_bottom_color;
                }

                $background_color_rgba = superfood_elated_rgba_color($menu_area_background_color, $menu_area_background_transparency);

                if ($background_color_rgba !== null) {
                    $menu_area_background_color_rgba = 'background-color:' . $background_color_rgba . ';';
                }

                break;


        }

        $page_options['menu_area_background_color'] = $menu_area_background_color_rgba;
        $page_options['menu_area_border_bottom_color'] = $menu_area_border_bottom_color;
        $page_options['vertical_header_background_color'] = $vertical_header_background_color;
        $page_options['vertical_header_opacity'] = $vertical_header_opacity;
        $page_options['vertical_background_image'] = $vertical_background_image;
        $page_options['vertical_text_align_class'] = $vertical_text_align_class;

        return $page_options;
    }
}