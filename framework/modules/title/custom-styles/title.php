<?php

if (!function_exists('superfood_elated_title_area_typography_style')) {

    function superfood_elated_title_area_typography_style(){

        // title standard type text size

        $title_styles = array();

        if(superfood_elated_options()->getOptionValue('page_title_normal_color') !== '') {
            $title_styles['color'] = superfood_elated_options()->getOptionValue('page_title_normal_color');
        }
        if(superfood_elated_options()->getOptionValue('page_title_normal_google_fonts') !== '-1') {
            $title_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('page_title_normal_google_fonts'));
        }
        if(superfood_elated_options()->getOptionValue('page_title_normal_fontsize') !== '') {
            $title_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_title_normal_fontsize')).'px';
        }
        if(superfood_elated_options()->getOptionValue('page_title_normal_lineheight') !== '') {
            $title_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_title_normal_lineheight')).'px';
        }
        if(superfood_elated_options()->getOptionValue('page_title_normal_texttransform') !== '') {
            $title_styles['text-transform'] = superfood_elated_options()->getOptionValue('page_title_normal_texttransform');
        }
        if(superfood_elated_options()->getOptionValue('page_title_normal_fontstyle') !== '') {
            $title_styles['font-style'] = superfood_elated_options()->getOptionValue('page_title_normal_fontstyle');
        }
        if(superfood_elated_options()->getOptionValue('page_title_normal_fontweight') !== '') {
            $title_styles['font-weight'] = superfood_elated_options()->getOptionValue('page_title_normal_fontweight');
        }
        if(superfood_elated_options()->getOptionValue('page_title_normal_letter_spacing') !== '') {
            $title_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_title_normal_letter_spacing')).'px';
        }

        $title_selector = array(
            '.eltdf-title.eltdf-standard-type .eltdf-title-text'
        );

        echo superfood_elated_dynamic_css($title_selector, $title_styles);


        $subtitle_styles = array();

        if(superfood_elated_options()->getOptionValue('page_subtitle_color') !== '') {
            $subtitle_styles['color'] = superfood_elated_options()->getOptionValue('page_subtitle_color');
        }
        if(superfood_elated_options()->getOptionValue('page_subtitle_google_fonts') !== '-1') {
            $subtitle_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('page_subtitle_google_fonts'));
        }
        if(superfood_elated_options()->getOptionValue('page_subtitle_fontsize') !== '') {
            $subtitle_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_subtitle_fontsize')).'px';
        }
        if(superfood_elated_options()->getOptionValue('page_subtitle_lineheight') !== '') {
            $subtitle_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_subtitle_lineheight')).'px';
        }
        if(superfood_elated_options()->getOptionValue('page_subtitle_texttransform') !== '') {
            $subtitle_styles['text-transform'] = superfood_elated_options()->getOptionValue('page_subtitle_texttransform');
        }
        if(superfood_elated_options()->getOptionValue('page_subtitle_fontstyle') !== '') {
            $subtitle_styles['font-style'] = superfood_elated_options()->getOptionValue('page_subtitle_fontstyle');
        }
        if(superfood_elated_options()->getOptionValue('page_subtitle_fontweight') !== '') {
            $subtitle_styles['font-weight'] = superfood_elated_options()->getOptionValue('page_subtitle_fontweight');
        }
        if(superfood_elated_options()->getOptionValue('page_subtitle_letter_spacing') !== '') {
            $subtitle_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_subtitle_letter_spacing')).'px';
        }

        $subtitle_selector = array(
            '.eltdf-title.eltdf-standard-type .eltdf-subtitle'
        );

        echo superfood_elated_dynamic_css($subtitle_selector, $subtitle_styles);
	
	    // title simple with breadcrumbs text size
	
	    $title_styles = array();
	
	    if(superfood_elated_options()->getOptionValue('page_title_color') !== '') {
		    $title_styles['color'] = superfood_elated_options()->getOptionValue('page_title_color');
	    }
	    if(superfood_elated_options()->getOptionValue('page_title_google_fonts') !== '-1') {
		    $title_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('page_title_google_fonts'));
	    }
	    if(superfood_elated_options()->getOptionValue('page_title_fontsize') !== '') {
		    $title_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_title_fontsize')).'px';
	    }
	    if(superfood_elated_options()->getOptionValue('page_title_lineheight') !== '') {
		    $title_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_title_lineheight')).'px';
	    }
	    if(superfood_elated_options()->getOptionValue('page_title_texttransform') !== '') {
		    $title_styles['text-transform'] = superfood_elated_options()->getOptionValue('page_title_texttransform');
	    }
	    if(superfood_elated_options()->getOptionValue('page_title_fontstyle') !== '') {
		    $title_styles['font-style'] = superfood_elated_options()->getOptionValue('page_title_fontstyle');
	    }
	    if(superfood_elated_options()->getOptionValue('page_title_fontweight') !== '') {
		    $title_styles['font-weight'] = superfood_elated_options()->getOptionValue('page_title_fontweight');
	    }
	    if(superfood_elated_options()->getOptionValue('page_title_letter_spacing') !== '') {
		    $title_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_title_letter_spacing')).'px';
	    }
	
	    $title_selector = array(
		    '.eltdf-title.eltdf-breadcrumbs-type .eltdf-title-text'
	    );
	
	    echo superfood_elated_dynamic_css($title_selector, $title_styles);
	    

        $breadcrumbs_styles = array();

        if(superfood_elated_options()->getOptionValue('page_breadcrumbs_color') !== '') {
	        $breadcrumbs_styles['color'] = superfood_elated_options()->getOptionValue('page_breadcrumbs_color');
        }
        if(superfood_elated_options()->getOptionValue('page_breadcrumbs_google_fonts') !== '-1') {
	        $breadcrumbs_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('page_breadcrumbs_google_fonts'));
        }
        if(superfood_elated_options()->getOptionValue('page_breadcrumbs_fontsize') !== '') {
	        $breadcrumbs_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_breadcrumbs_fontsize')).'px';
        }
        if(superfood_elated_options()->getOptionValue('page_breadcrumbs_lineheight') !== '') {
	        $breadcrumbs_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_breadcrumbs_lineheight')).'px';
        }
        if(superfood_elated_options()->getOptionValue('page_breadcrumbs_texttransform') !== '') {
	        $breadcrumbs_styles['text-transform'] = superfood_elated_options()->getOptionValue('page_breadcrumbs_texttransform');
        }
        if(superfood_elated_options()->getOptionValue('page_breadcrumbs_fontstyle') !== '') {
	        $breadcrumbs_styles['font-style'] = superfood_elated_options()->getOptionValue('page_breadcrumbs_fontstyle');
        }
        if(superfood_elated_options()->getOptionValue('page_breadcrumbs_fontweight') !== '') {
	        $breadcrumbs_styles['font-weight'] = superfood_elated_options()->getOptionValue('page_breadcrumbs_fontweight');
        }
        if(superfood_elated_options()->getOptionValue('page_breadcrumbs_letter_spacing') !== '') {
	        $breadcrumbs_styles['letter-spacing'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('page_breadcrumbs_letter_spacing')).'px';
        }

        $breadcrumbs_selector = array(
            '.eltdf-title.eltdf-breadcrumbs-type .eltdf-breadcrumbs a, .eltdf-title.eltdf-breadcrumbs-type .eltdf-breadcrumbs span'
        );

        echo superfood_elated_dynamic_css($breadcrumbs_selector, $breadcrumbs_styles);

        $breadcrumbs_selector_styles = array();
        if(superfood_elated_options()->getOptionValue('page_breadcrumbs_hovercolor') !== '') {
            $breadcrumbs_selector_styles['color'] = superfood_elated_options()->getOptionValue('page_breadcrumbs_hovercolor');
        }

        $breadcrumbs_hover_selector = array(
            '.eltdf-title.eltdf-breadcrumbs-type .eltdf-breadcrumbs a:hover'
        );

        echo superfood_elated_dynamic_css($breadcrumbs_hover_selector, $breadcrumbs_selector_styles);

    }

    add_action('superfood_elated_style_dynamic', 'superfood_elated_title_area_typography_style');
}