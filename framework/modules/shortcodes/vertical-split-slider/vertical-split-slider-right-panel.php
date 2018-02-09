<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\VerticalSplitSliderRightPanel;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class VerticalSplitSliderRightPanel implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'eltdf_vertical_split_slider_right_panel';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(
			array(
				'name' => esc_html__('Elated Right Sliding Panel', 'superfood'),
				'base' => $this->base,
				'as_parent'	=> array('only' => 'eltdf_vertical_split_slider_content_item'),
				'as_child'	=> array('only' => 'eltdf_vertical_split_slider'),
				'content_element' => true,
				'category' => esc_html__('by ELATED', 'superfood'),
				'icon' => 'icon-wpb-vertical-split-slider-right-panel extended-custom-icon',
				'show_settings_on_create' => false,
				'js_view' => 'VcColumnView'
			)
		);
	}

	public function render($atts, $content = null) {
		$args = array();

		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '<div class="eltdf-vss-ms-right">';
		$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}
}
