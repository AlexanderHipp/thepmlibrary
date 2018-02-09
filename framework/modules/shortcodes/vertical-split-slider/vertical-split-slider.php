<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\VerticalSplitSlider;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class VerticalSplitSlider implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_vertical_split_slider';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Vertical Split Slider', 'superfood'),
			'base' => $this->base,
			'icon' => 'icon-wpb-vertical-split-slider extended-custom-icon',
			'category' => esc_html__('by ELATED', 'superfood'),
			'as_parent'	=> array('only' => 'eltdf_vertical_split_slider_left_panel, eltdf_vertical_split_slider_right_panel'),
			'show_settings_on_create' => false,
			'js_view' => 'VcColumnView'
		));
	}

	public function render($atts, $content = null) {
		$args = array();
		
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '';

		$html .= '<div class="eltdf-vertical-split-slider">';
		$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}
}
