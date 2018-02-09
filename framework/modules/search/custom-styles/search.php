<?php

if (!function_exists('superfood_elated_search_opener_icon_size')) {

	function superfood_elated_search_opener_icon_size() {

		if (superfood_elated_options()->getOptionValue('header_search_icon_size')) {
			echo superfood_elated_dynamic_css('.eltdf-search-opener', array(
				'font-size' => superfood_elated_filter_px(superfood_elated_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('superfood_elated_style_dynamic', 'superfood_elated_search_opener_icon_size');

}

if (!function_exists('superfood_elated_search_opener_icon_colors')) {

	function superfood_elated_search_opener_icon_colors() {

		if (superfood_elated_options()->getOptionValue('header_search_icon_color') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-search-opener', array(
				'color' => superfood_elated_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (superfood_elated_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-search-opener:hover', array(
				'color' => superfood_elated_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (superfood_elated_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-search-opener, .eltdf-light-header .eltdf-top-bar .eltdf-search-opener', array(
				'color' => superfood_elated_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (superfood_elated_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-search-opener:hover, .eltdf-light-header .eltdf-top-bar .eltdf-search-opener:hover', array(
				'color' => superfood_elated_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (superfood_elated_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-search-opener, .eltdf-dark-header .eltdf-top-bar .eltdf-search-opener', array(
				'color' => superfood_elated_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (superfood_elated_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-search-opener:hover, .eltdf-dark-header .eltdf-top-bar .eltdf-search-opener:hover', array(
				'color' => superfood_elated_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}
	}

	add_action('superfood_elated_style_dynamic', 'superfood_elated_search_opener_icon_colors');

}

if (!function_exists('superfood_elated_search_opener_icon_background_colors')) {

	function superfood_elated_search_opener_icon_background_colors()	{

		if (superfood_elated_options()->getOptionValue('search_icon_background_color') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-search-opener', array(
				'background-color' => superfood_elated_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (superfood_elated_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-search-opener:hover', array(
				'background-color' => superfood_elated_options()->getOptionValue('search_icon_background_hover_color')
			));
		}
	}

	add_action('superfood_elated_style_dynamic', 'superfood_elated_search_opener_icon_background_colors');
}

if (!function_exists('superfood_elated_search_opener_text_styles')) {

	function superfood_elated_search_opener_text_styles() {
		$text_styles = array();

		if (superfood_elated_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = superfood_elated_options()->getOptionValue('search_icon_text_color');
		}
		if (superfood_elated_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (superfood_elated_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (superfood_elated_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = superfood_elated_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (superfood_elated_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = superfood_elated_get_formatted_font_family(superfood_elated_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (superfood_elated_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = superfood_elated_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (superfood_elated_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = superfood_elated_options()->getOptionValue('search_icon_text_fontweight');
		}

		if (!empty($text_styles)) {
			echo superfood_elated_dynamic_css('.eltdf-search-icon-text', $text_styles);
		}
		if (superfood_elated_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-search-opener:hover .eltdf-search-icon-text', array(
				'color' => superfood_elated_options()->getOptionValue('search_icon_text_color_hover')
			));
		}
	}

	add_action('superfood_elated_style_dynamic', 'superfood_elated_search_opener_text_styles');
}

if (!function_exists('superfood_elated_search_opener_spacing')) {

	function superfood_elated_search_opener_spacing() {
		$spacing_styles = array();

		if (superfood_elated_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (superfood_elated_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (superfood_elated_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (superfood_elated_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo superfood_elated_dynamic_css('.eltdf-search-opener', $spacing_styles);
		}
	}

	add_action('superfood_elated_style_dynamic', 'superfood_elated_search_opener_spacing');
}