<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\AnimationHolder;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
* class Animation Holder
*/
class AnimationHolder implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'eltdf_animation_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return	$this->base;
	}

	public function vcMap() {
		vc_map( array(
			'name' =>  esc_html__('Elated Animation Holder', 'superfood'),
			'base' => $this->base,
			"as_parent" => array('except' => 'vc_row'),
			'content_element' => true,
			'category' => esc_html__('by ELATED', 'superfood'),
			'icon' => 'icon-wpb-animation-holder extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type'       => 'dropdown',
					'param_name' => 'animation',
					'heading'    => esc_html__('Animation Type', 'superfood'),
					'value'      => array(
						esc_html__('Element Fade In Down', 'superfood') => 'eltdf-fade-in-down',
						esc_html__('Element From Fade', 'superfood') => 'eltdf-element-from-fade',
						esc_html__('Element From Left', 'superfood') => 'eltdf-element-from-left',
						esc_html__('Element From Right', 'superfood') => 'eltdf-element-from-right',
						esc_html__('Element From Top', 'superfood') => 'eltdf-element-from-top',
						esc_html__('Element From Bottom', 'superfood') => 'eltdf-element-from-bottom',
						esc_html__('Element Flip In', 'superfood') => 'eltdf-flip-in',
						esc_html__('Element X Rotate', 'superfood') => 'eltdf-x-rotate',
						esc_html__('Element Z Rotate', 'superfood') => 'eltdf-z-rotate',
						esc_html__('Element Y Translate', 'superfood') => 'eltdf-y-translate',
						esc_html__('Element Fade In X Rotate', 'superfood') => 'eltdf-fade-in-left-x-rotate',
					),
					'save_always' => true
				),
                array(
                    'type'       => 'textfield',
                    'param_name' => 'animation_delay',
                    'heading'    => esc_html__('Animation Delay (ms)', 'superfood')
                )
			)
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
			'animation'       => 'eltdf-fade-in-down',
			'animation_delay' => ''
        );

        extract(shortcode_atts($args, $atts));

        $html = '<div class="eltdf-animation-holder '. esc_attr($animation) .'" data-animation="'.esc_attr($animation).'" data-animation-delay="'.esc_attr($animation_delay).'"><div class="eltdf-animation-inner">'.do_shortcode($content).'</div></div>';

        return $html;
	}
}