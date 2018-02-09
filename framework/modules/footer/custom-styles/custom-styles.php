<?php

if(!function_exists('superfood_elated_footer_top_general_styles')) {
    /**
     * Generates general custom styles for footer top area
     */
    function superfood_elated_footer_top_general_styles() {
        $item_styles = array();

        if(superfood_elated_options()->getOptionValue('footer_top_background_color')) {
            $item_styles['background-color'] = superfood_elated_options()->getOptionValue('footer_top_background_color');
        }

        echo superfood_elated_dynamic_css('footer .eltdf-footer-top-holder', $item_styles);
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_footer_top_general_styles');
}

if(!function_exists('superfood_elated_footer_bottom_general_styles')) {
    /**
     * Generates general custom styles for footer bottom area
     */
    function superfood_elated_footer_bottom_general_styles() {
        $item_styles = array();
        if(superfood_elated_options()->getOptionValue('footer_bottom_height') !== '') {
            $item_styles['height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('footer_bottom_height')).'px';
        }

        if(superfood_elated_options()->getOptionValue('footer_bottom_background_color')) {
            $item_styles['background-color'] = superfood_elated_options()->getOptionValue('footer_bottom_background_color');
        }

        if(superfood_elated_options()->getOptionValue('footer_bottom_border_top_color')) {
            $item_styles['border-top'] = '1px solid '.superfood_elated_options()->getOptionValue('footer_bottom_border_top_color');
        }

        echo superfood_elated_dynamic_css('footer .eltdf-footer-bottom-holder', $item_styles);
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_footer_bottom_general_styles');
}