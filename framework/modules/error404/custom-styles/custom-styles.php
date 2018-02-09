<?php

if(!function_exists('superfood_elated_404_header_general_styles')) {
    /**
     * Generates general custom styles for 404 header area
     */
    function superfood_elated_404_header_general_styles() {
        $header_styles = array();

        if(superfood_elated_options()->getOptionValue('404_menu_area_background_color_header') !== '') {

            $header_styles['background-color'] = superfood_elated_options()->getOptionValue('404_menu_area_background_color_header');
            $header_styles['background-transparency'] = 1;

            if(superfood_elated_options()->getOptionValue('404_menu_area_background_transparency_header') !== '') {
                $header_styles['background-transparency'] = superfood_elated_options()->getOptionValue('404_menu_area_background_transparency_header');
            }

            echo superfood_elated_dynamic_css('.eltdf-404-page .eltdf-page-header', array('background-color' => superfood_elated_rgba_color($header_styles['background-color'], $header_styles['background-transparency']) . ' !important'));
        }

        if(superfood_elated_options()->getOptionValue('404_menu_area_background_color_header') === '' && superfood_elated_options()->getOptionValue('404_menu_area_background_transparency_header') !== '') {
        
            $header_styles['background-color'] = '#fff';
            $header_styles['background-transparency'] = superfood_elated_options()->getOptionValue('404_menu_area_background_transparency_header');

            echo superfood_elated_dynamic_css('.eltdf-404-page .eltdf-page-header', array('background-color' => superfood_elated_rgba_color($header_styles['background-color'], $header_styles['background-transparency']) . ' !important'));
        }

        $menu_styles = array();

        if(superfood_elated_options()->getOptionValue('404_menu_area_border_color_header') !== '') {
            $menu_styles['border-color'] = superfood_elated_options()->getOptionValue('404_menu_area_border_color_header');
        }

        echo superfood_elated_dynamic_css('.eltdf-404-page .eltdf-page-header .eltdf-menu-area', $menu_styles);
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_404_header_general_styles');
}

if(!function_exists('superfood_elated_404_footer_top_general_styles')) {
    /**
     * Generates general custom styles for footer top area
     */
    function superfood_elated_404_footer_top_general_styles() {
        $item_styles = array();

        if(superfood_elated_options()->getOptionValue('404_page_background_color') !== '') {
            $item_styles['background-color'] = superfood_elated_options()->getOptionValue('404_page_background_color');
        }

        if (superfood_elated_options()->getOptionValue('404_page_background_image') !== '') {
            $item_styles['background-image'] = 'url('.superfood_elated_options()->getOptionValue('404_page_background_image').')';
            $item_styles['background-position'] = 'center 0';
            $item_styles['background-size'] = 'cover';
            $item_styles['background-repeat'] = 'no-repeat';
        }

        if (superfood_elated_options()->getOptionValue('404_page_background_pattern_image') !== '') {
            $item_styles['background-image'] = 'url('.superfood_elated_options()->getOptionValue('404_page_background_pattern_image').')';
            $item_styles['background-position'] = '0 0';
            $item_styles['background-repeat'] = 'repeat';
        }

        echo superfood_elated_dynamic_css('.eltdf-404-page .eltdf-content', $item_styles);
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_404_footer_top_general_styles');
}

if(!function_exists('superfood_elated_404_content_styles')) {
    /**
     * Generates general custom styles for content area
     */
    function superfood_elated_404_content_styles() {
        $item_styles = array();

        if(superfood_elated_options()->getOptionValue('404_vertical_align') == 'bottom') {
            $item_styles['vertical-align'] = superfood_elated_options()->getOptionValue('404_vertical_align');
        }

        echo superfood_elated_dynamic_css('.eltdf-404-page .eltdf-page-not-found', $item_styles);
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_404_content_styles');
}

if(!function_exists('superfood_elated_404_title_styles')) {
    /**
     * Generates styles for 404 page title
     */
    function superfood_elated_404_title_styles() {
        $item_styles = array();

        if(superfood_elated_options()->getOptionValue('404_title_color') !== '') {
            $item_styles['color'] = superfood_elated_options()->getOptionValue('404_title_color');
        }

        if(superfood_elated_is_font_option_valid(superfood_elated_options()->getOptionValue('404_title_google_fonts'))) {
            $item_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('404_title_google_fonts'));
        }

        if(superfood_elated_options()->getOptionValue('404_title_fontsize') !== '') {
            $item_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('404_title_fontsize')).'px';
        }

        if(superfood_elated_options()->getOptionValue('404_title_lineheight') !== '') {
            $item_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('404_title_lineheight')).'px';
        }

        if(superfood_elated_options()->getOptionValue('404_title_fontstyle') !== '') {
            $item_styles['font-style'] = superfood_elated_options()->getOptionValue('404_title_fontstyle');
        }

        if(superfood_elated_options()->getOptionValue('404_title_fontweight') !== '') {
            $item_styles['font-weight'] = superfood_elated_options()->getOptionValue('404_title_fontweight');
        }

        if(superfood_elated_options()->getOptionValue('404_title_letterspacing') !== '') {
            $item_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('404_title_letterspacing')).'px';
        }

        if(superfood_elated_options()->getOptionValue('404_title_texttransform') !== '') {
            $item_styles['text-transform'] = superfood_elated_options()->getOptionValue('404_title_texttransform');
        }

        $item_selector = array(
            '.eltdf-404-page .eltdf-page-not-found h1'
        );

        echo superfood_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_404_title_styles');
}

if(!function_exists('superfood_elated_404_subtitle_styles')) {
    /**
     * Generates styles for 404 page subtitle
     */
    function superfood_elated_404_subtitle_styles() {
        $item_styles = array();

        if(superfood_elated_options()->getOptionValue('404_subtitle_color') !== '') {
            $item_styles['color'] = superfood_elated_options()->getOptionValue('404_subtitle_color');
        }

        if(superfood_elated_is_font_option_valid(superfood_elated_options()->getOptionValue('404_subtitle_google_fonts'))) {
            $item_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('404_subtitle_google_fonts'));
        }

        if(superfood_elated_options()->getOptionValue('404_subtitle_fontsize') !== '') {
            $item_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('404_subtitle_fontsize')).'px';
        }

        if(superfood_elated_options()->getOptionValue('404_subtitle_lineheight') !== '') {
            $item_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('404_subtitle_lineheight')).'px';
        }

        if(superfood_elated_options()->getOptionValue('404_subtitle_fontstyle') !== '') {
            $item_styles['font-style'] = superfood_elated_options()->getOptionValue('404_subtitle_fontstyle');
        }

        if(superfood_elated_options()->getOptionValue('404_subtitle_fontweight') !== '') {
            $item_styles['font-weight'] = superfood_elated_options()->getOptionValue('404_subtitle_fontweight');
        }

        if(superfood_elated_options()->getOptionValue('404_subtitle_letterspacing') !== '') {
            $item_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('404_subtitle_letterspacing')).'px';
        }

        if(superfood_elated_options()->getOptionValue('404_subtitle_texttransform') !== '') {
            $item_styles['text-transform'] = superfood_elated_options()->getOptionValue('404_subtitle_texttransform');
        }

        $item_selector = array(
            '.eltdf-404-page .eltdf-page-not-found h3'
        );

        echo superfood_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_404_subtitle_styles');
}

if(!function_exists('superfood_elated_404_text_styles')) {
    /**
     * Generates styles for 404 page text
     */
    function superfood_elated_404_text_styles() {
        $item_styles = array();

        if(superfood_elated_options()->getOptionValue('404_text_color') !== '') {
            $item_styles['color'] = superfood_elated_options()->getOptionValue('404_text_color');
        }

        if(superfood_elated_is_font_option_valid(superfood_elated_options()->getOptionValue('404_text_google_fonts'))) {
            $item_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('404_text_google_fonts'));
        }

        if(superfood_elated_options()->getOptionValue('404_text_fontsize') !== '') {
            $item_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('404_text_fontsize')).'px';
        }

        if(superfood_elated_options()->getOptionValue('404_text_lineheight') !== '') {
            $item_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('404_text_lineheight')).'px';
        }

        if(superfood_elated_options()->getOptionValue('404_text_fontstyle') !== '') {
            $item_styles['font-style'] = superfood_elated_options()->getOptionValue('404_text_fontstyle');
        }

        if(superfood_elated_options()->getOptionValue('404_text_fontweight') !== '') {
            $item_styles['font-weight'] = superfood_elated_options()->getOptionValue('404_text_fontweight');
        }

        if(superfood_elated_options()->getOptionValue('404_text_letterspacing') !== '') {
            $item_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('404_text_letterspacing')).'px';
        }

        if(superfood_elated_options()->getOptionValue('404_text_texttransform') !== '') {
            $item_styles['text-transform'] = superfood_elated_options()->getOptionValue('404_text_texttransform');
        }

        $item_selector = array(
            '.eltdf-404-page .eltdf-page-not-found .eltdf-page-not-found-text'
        );

        echo superfood_elated_dynamic_css($item_selector, $item_styles);
    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_404_text_styles');
}