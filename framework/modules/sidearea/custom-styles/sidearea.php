<?php

if (!function_exists('superfood_elated_side_area_slide_from_right_type_style')) {

	function superfood_elated_side_area_slide_from_right_type_style()	{

		if (superfood_elated_options()->getOptionValue('side_area_width') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-side-menu-slide-from-right .eltdf-side-menu', array(
				'right' => '-'.superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_width')) . 'px',
				'width' => superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_width')) . 'px'
			));
		}
	}

	add_action('superfood_elated_style_dynamic', 'superfood_elated_side_area_slide_from_right_type_style');
}

if (!function_exists('superfood_elated_side_area_icon_color_styles')) {

	function superfood_elated_side_area_icon_color_styles() {

		if (superfood_elated_options()->getOptionValue('side_area_icon_color') !== '') {

			echo superfood_elated_dynamic_css('a.eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => superfood_elated_options()->getOptionValue('side_area_icon_color')
			));
		}

		if (superfood_elated_options()->getOptionValue('side_area_icon_hover_color') !== '') {

			echo superfood_elated_dynamic_css('a.eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => superfood_elated_options()->getOptionValue('side_area_icon_hover_color') . '!important'
			));
		}

		if (superfood_elated_options()->getOptionValue('side_area_light_icon_color') !== '') {

			echo superfood_elated_dynamic_css('.eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-light-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-light-header .eltdf-top-bar .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => superfood_elated_options()->getOptionValue('side_area_light_icon_color') . ' !important'
			));
		}

		if (superfood_elated_options()->getOptionValue('side_area_light_icon_hover_color') !== '') {

			echo superfood_elated_dynamic_css('.eltdf-light-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-light-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-light-header .eltdf-top-bar .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => superfood_elated_options()->getOptionValue('side_area_light_icon_hover_color') . ' !important'
			));
		}

		if (superfood_elated_options()->getOptionValue('side_area_dark_icon_color') !== '') {

			echo superfood_elated_dynamic_css('.eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-dark-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-dark-header .eltdf-top-bar .eltdf-side-menu-button-opener .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => superfood_elated_options()->getOptionValue('side_area_dark_icon_color') . ' !important'
			));
		}

		if (superfood_elated_options()->getOptionValue('side_area_dark_icon_hover_color') !== '') {

			echo superfood_elated_dynamic_css('.eltdf-dark-header .eltdf-page-header > div:not(.eltdf-sticky-header):not(.fixed) .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-dark-header.eltdf-header-style-on-scroll .eltdf-page-header .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line,
			.eltdf-dark-header .eltdf-top-bar .eltdf-side-menu-button-opener:hover .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => superfood_elated_options()->getOptionValue('side_area_dark_icon_hover_color') . ' !important'
			));
		}

		if (superfood_elated_options()->getOptionValue('side_area_close_icon_color') !== '') {

			echo superfood_elated_dynamic_css('.eltdf-side-menu a.eltdf-close-side-menu .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => superfood_elated_options()->getOptionValue('side_area_close_icon_color')
			));
		}

		if (superfood_elated_options()->getOptionValue('side_area_close_icon_hover_color') !== '') {

			echo superfood_elated_dynamic_css('.eltdf-side-menu a.eltdf-close-side-menu:hover .eltdf-side-menu-lines .eltdf-side-menu-line', array(
				'background-color' => superfood_elated_options()->getOptionValue('side_area_close_icon_hover_color')
			));
		}
	}

	add_action('superfood_elated_style_dynamic', 'superfood_elated_side_area_icon_color_styles');
}

if (!function_exists('superfood_elated_side_area_icon_spacing_styles')) {

	function superfood_elated_side_area_icon_spacing_styles()	{
		$icon_spacing = array();

		if (superfood_elated_options()->getOptionValue('side_area_icon_padding_left') !== '') {
			$icon_spacing['padding-left'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_icon_padding_left')) . 'px';
		}

		if (superfood_elated_options()->getOptionValue('side_area_icon_padding_right') !== '') {
			$icon_spacing['padding-right'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_icon_padding_right')) . 'px';
		}

		if (superfood_elated_options()->getOptionValue('side_area_icon_margin_left') !== '') {
			$icon_spacing['margin-left'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_icon_margin_left')) . 'px';
		}

		if (superfood_elated_options()->getOptionValue('side_area_icon_margin_right') !== '') {
			$icon_spacing['margin-right'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_icon_margin_right')) . 'px';
		}

		if (!empty($icon_spacing)) {

			echo superfood_elated_dynamic_css('a.eltdf-side-menu-button-opener', $icon_spacing);
		}
	}

	add_action('superfood_elated_style_dynamic', 'superfood_elated_side_area_icon_spacing_styles');
}

if (!function_exists('superfood_elated_side_area_alignment')) {

	function superfood_elated_side_area_alignment() {

		if (superfood_elated_options()->getOptionValue('side_area_aligment')) {

			echo superfood_elated_dynamic_css('.eltdf-side-menu-slide-from-right .eltdf-side-menu', array(
				'text-align' => superfood_elated_options()->getOptionValue('side_area_aligment')
			));

			if(superfood_elated_options()->getOptionValue('side_area_aligment') == 'center') {
				echo superfood_elated_dynamic_css('.eltdf-side-menu .widget img', array(
					'margin' => '0 auto'
				));
			}
		}
	}

	add_action('superfood_elated_style_dynamic', 'superfood_elated_side_area_alignment');
}

if (!function_exists('superfood_elated_side_area_styles')) {

	function superfood_elated_side_area_styles() {

		$side_area_styles = array();

		if (superfood_elated_options()->getOptionValue('side_area_background_color') !== '') {
			$side_area_styles['background-color'] = superfood_elated_options()->getOptionValue('side_area_background_color');
		}

		if (superfood_elated_options()->getOptionValue('side_area_padding_top') !== '') {
			$side_area_styles['padding-top'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_padding_top')) . 'px';
		}

		if (superfood_elated_options()->getOptionValue('side_area_padding_right') !== '') {
			$side_area_styles['padding-right'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_padding_right')) . 'px';
		}

		if(superfood_elated_options()->getOptionValue('side_area_padding_right') !== '') {
			echo superfood_elated_dynamic_css('.eltdf-side-menu .eltdf-close-side-menu-holder', array(
				'right' => superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_padding_right')) . 'px'
			));
		}

		if (superfood_elated_options()->getOptionValue('side_area_padding_bottom') !== '') {
			$side_area_styles['padding-bottom'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_padding_bottom')) . 'px';
		}

		if (superfood_elated_options()->getOptionValue('side_area_padding_left') !== '') {
			$side_area_styles['padding-left'] = superfood_elated_filter_px(superfood_elated_options()->getOptionValue('side_area_padding_left')) . 'px';
		}

		if (!empty($side_area_styles)) {
			echo superfood_elated_dynamic_css('.eltdf-side-menu', $side_area_styles);
		}
	}

	add_action('superfood_elated_style_dynamic', 'superfood_elated_side_area_styles');
}