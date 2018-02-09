<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if (function_exists('vc_set_as_theme')) {
    vc_set_as_theme(true);
}

/**
 * Change path for overridden templates
 */
if (function_exists('vc_set_shortcodes_templates_dir')) {
    $dir = ELATED_ROOT_DIR . '/vc-templates';
    vc_set_shortcodes_templates_dir($dir);
}

if (!function_exists('superfood_elated_configure_visual_composer_frontend_editor')) {
    /**
     * Configuration for Visual Composer FrontEnd Editor
     * Hooks on vc_after_init action
     */
    function superfood_elated_configure_visual_composer_frontend_editor() {
        /**
         * Remove frontend editor
         */
        if (function_exists('vc_disable_frontend')) {
            vc_disable_frontend();
        }
    }

    add_action('vc_after_init', 'superfood_elated_configure_visual_composer_frontend_editor');
}

if (!function_exists('superfood_elated_configure_visual_composer')) {
    /**
     * Configuration for Visual Composer
     * Hooks on vc_after_init action
     */
    function superfood_elated_configure_visual_composer() {

        /**
         * Remove unused parameters
         */
        if (function_exists('vc_remove_param')) {
            vc_remove_param('vc_row', 'full_width');
            vc_remove_param('vc_row', 'full_height');
            vc_remove_param('vc_row', 'content_placement');
            vc_remove_param('vc_row', 'video_bg');
            vc_remove_param('vc_row', 'video_bg_url');
            vc_remove_param('vc_row', 'video_bg_parallax');
            vc_remove_param('vc_row', 'parallax');
            vc_remove_param('vc_row', 'parallax_image');
            vc_remove_param('vc_row', 'gap');
            vc_remove_param('vc_row', 'columns_placement');
            vc_remove_param('vc_row', 'equal_height');
            vc_remove_param('vc_row', 'parallax_speed_bg');
            vc_remove_param('vc_row', 'parallax_speed_video');
            vc_remove_param('vc_row_inner', 'content_placement');
            vc_remove_param('vc_row_inner', 'equal_height');
            vc_remove_param('vc_row_inner', 'gap');
            vc_remove_param('vc_row_inner', 'disable_element');
            vc_remove_param('vc_row', 'disable_element');
        }
    }

    add_action('vc_after_init', 'superfood_elated_configure_visual_composer');
}

if (class_exists('WPBakeryShortCodesContainer')) {
    class WPBakeryShortCode_Eltdf_Accordion extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Accordion_Tab extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Animation_Holder extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Clients_Boxes extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Clients_Carousel extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Elements_Holder extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Elements_Holder_Item extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Item_Showcase extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Parallax extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Pricing_Tables extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Tabs extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Tab extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Vertical_Split_Slider extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Vertical_Split_Slider_Left_Panel extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Vertical_Split_Slider_Right_Panel extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltdf_Vertical_Split_Slider_Content_Item extends WPBakeryShortCodesContainer
    {
    }

    class WPBakeryShortCode_Eltd_Restaurant_Menu extends WPBakeryShortCodesContainer
    {
    }
}

/*** Row ***/
if (!function_exists('superfood_elated_vc_row_map')) {
    /**
     * Map VC Row shortcode
     * Hooks on vc_after_init action
     */
    function superfood_elated_vc_row_map() {

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'param_name' => 'row_type',
            'heading' => esc_html__('Elated Row Type', 'superfood'),
            'value' => array(
                esc_html__('Row', 'superfood') => 'row',
                esc_html__('Parallax', 'superfood') => 'parallax'
            )
        ));

        vc_add_param('vc_row', array(
            'type' => 'textfield',
            'param_name' => 'parallax_section_height',
            'heading' => esc_html__('Elated Parallax Section Height', 'superfood'),
            'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'attach_image',
            'param_name' => 'parallax_background_image',
            'heading' => esc_html__('Elated Parallax Background Image', 'superfood'),
            'description' => esc_html__('Please note that for parallax row type, background image from Design Options will not work so you should to fill this field', 'superfood'),
            'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'textfield',
            'param_name' => 'parallax_speed',
            'heading' => esc_html__('Elated Parallax Speed', 'superfood'),
            'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
        ));

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'param_name' => 'row_content_width',
            'heading' => esc_html__('Elated Row Content Width', 'superfood'),
            'value' => array(
                esc_html__('Full Width', 'superfood') => 'full-width',
                esc_html__('In Grid', 'superfood') => 'grid'
            )
        ));

        vc_add_param('vc_row', array(
            'type' => 'textfield',
            'param_name' => 'anchor',
            'heading' => esc_html__('Elated Anchor ID', 'superfood'),
            'description' => esc_html__('For example "home"', 'superfood')
        ));

        vc_add_param('vc_row', array(
            'type' => 'dropdown',
            'param_name' => 'content_text_aligment',
            'heading' => esc_html__('Elated Content Aligment', 'superfood'),
            'value' => array(
                esc_html__('Default', 'superfood') => '',
                esc_html__('Left', 'superfood') => 'left',
                esc_html__('Center', 'superfood') => 'center',
                esc_html__('Right', 'superfood') => 'right'
            )
        ));

        /*** Row Inner ***/

        vc_add_param('vc_row_inner', array(
            'type' => 'dropdown',
            'param_name' => 'row_content_width',
            'heading' => esc_html__('Elated Row Content Width', 'superfood'),
            'value' => array(
                esc_html__('Full Width', 'superfood') => 'full-width',
                esc_html__('In Grid', 'superfood') => 'grid'
            )
        ));

        vc_add_param('vc_row_inner', array(
            'type' => 'dropdown',
            'param_name' => 'content_text_aligment',
            'heading' => esc_html__('Elated Content Aligment', 'superfood'),
            'value' => array(
                esc_html__('Default', 'superfood') => '',
                esc_html__('Left', 'superfood') => 'left',
                esc_html__('Center', 'superfood') => 'center',
                esc_html__('Right', 'superfood') => 'right'
            )
        ));
    }

    add_action('vc_after_init', 'superfood_elated_vc_row_map');
}