<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\VerticalSplitSliderContentItem;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class VerticalSplitSliderContentItem implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_vertical_split_slider_content_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Slide Content Item', 'superfood'),
			'base' => $this->base,
			'icon' => 'icon-wpb-vertical-split-slider-content-item extended-custom-icon',
			'category' => esc_html__('by ELATED', 'superfood'),
			'as_parent' => array('except' => 'vc_row'),
			'as_child' => array('only' => 'eltdf_vertical_split_slider_left_panel, eltdf_vertical_split_slider_right_panel'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type'       => 'colorpicker',
					'param_name' =>	'background_color',
					'heading'    => esc_html__('Background Color', 'superfood')
				),
				array(
					'type'       => 'attach_image',
					'param_name' => 'background_image',
					'heading'    => esc_html__('Background Image', 'superfood')
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'item_padding',
					'heading'     => esc_html__('Padding', 'superfood'),
					'description' => esc_html__('Insert padding in format: Top Right Bottom Left (e.g. 0px 0px 1px 0px)', 'superfood')
				),
				array(
					'type'       => 'dropdown',
					'param_name' =>	'alignment',
					'heading'    => esc_html__('Content Alignment', 'superfood'),
					'value'      => array(
						esc_html__('Default','superfood') => '',
						esc_html__('Left','superfood') => 'left',
						esc_html__('Right','superfood') => 'right',
						esc_html__('Center'	,'superfood') => 'center'
					)
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'header_style',
					'heading'    => esc_html__('Header/Bullets Style', 'superfood'),
					'value'      => array(
						esc_html__('Default', 'superfood') => '',
						esc_html__('Light', 'superfood')   => 'light',
						esc_html__('Dark', 'superfood')    => 'dark'
					),
					'save_always' => true
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'background_color'	=> '',
			'background_image'	=> '',
			'item_padding'		=> '',
			'alignment'			=> 'left',
			'header_style'      => ''
		);

		$params = shortcode_atts($args, $atts);
		extract($params);

		$params['content_data'] = $this->getContentData($params);
		$params['content_style'] = $this->getContentStyles($params);
		$params['content'] = $content;

		$html = superfood_elated_get_shortcode_module_template_part('templates/vertical-split-slider-content-item-template', 'vertical-split-slider', '', $params);

		return $html;
	}
	
	private function getContentData($params) {
		$data = array();
		
		if(!empty($params['header_style'])) {
			$data['data-header-style'] = $params['header_style'];
		}
		
		return $data;
	}
	
	/**
	 * Return content Style
	 *
	 * @param $params
	 * @return array
	 */
	private function getContentStyles($params) {
		$styles = array();

		if (!empty($params['background_color'])) {
			$styles[] = 'background-color: '.$params['background_color'];
		}

		if (!empty($params['background_image'])) {
			$url = wp_get_attachment_url($params['background_image']);
			$styles[] = 'background-image: url('. $url . ')';
		}

		if (!empty($params['item_padding'])) {
			$styles[] = 'padding: '.$params['item_padding'];
		}

		if (!empty($params['alignment'])) {
			$styles[] = 'text-align: '.$params['alignment'];
		}
		
		return implode(';', $styles);
	}
}
