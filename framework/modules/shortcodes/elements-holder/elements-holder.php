<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\ElementsHolder;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolder implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_elements_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Elements Holder', 'superfood'),
			'base' => $this->base,
			'icon' => 'icon-wpb-elements-holder extended-custom-icon',
			'category' => esc_html__('by ELATED', 'superfood'),
			'as_parent' => array('only' => 'eltdf_elements_holder_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type'       => 'colorpicker',
					'param_name' => 'background_color',
					'heading'    => esc_html__('Background Color', 'superfood')
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'number_of_columns',
					'heading'    => esc_html__('Columns', 'superfood'),
					'value'      => array(
						esc_html__('1 Column', 'superfood')  => 'one-column',
						esc_html__('2 Columns', 'superfood') => 'two-columns',
						esc_html__('3 Columns', 'superfood') => 'three-columns',
						esc_html__('4 Columns', 'superfood') => 'four-columns',
						esc_html__('5 Columns', 'superfood') => 'five-columns',
						esc_html__('6 Columns', 'superfood') => 'six-columns'
					)
				),
				array(
					'type'       => 'checkbox',
					'param_name' => 'items_float_left',
					'heading'    => esc_html__('Items Float Left', 'superfood'),
					'value'      => array('Make Items Float Left?' => 'yes')
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'switch_to_one_column',
					'heading'    => esc_html__('Switch to One Column', 'superfood'),
					'value'      => array(
						esc_html__('Default', 'superfood')   	=> '',
						esc_html__('Below 1280px', 'superfood') 	=> '1280',
						esc_html__('Below 1024px', 'superfood')  => '1024',
						esc_html__('Below 768px', 'superfood')   => '768',
						esc_html__('Below 600px', 'superfood')   => '600',
						esc_html__('Below 480px', 'superfood')   => '480',
						esc_html__('Never', 'superfood')    		=> 'never'
					),
					'description' => esc_html__('Choose on which stage item will be in one column', 'superfood'),
					'save_always' => true
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'alignment_one_column',
					'heading'    => esc_html__('Choose Alignment In Responsive Mode', 'superfood'),
					'value'      => array(
						esc_html__('Default', 'superfood') => '',
						esc_html__('Left', 'superfood') 	  => 'left',
						esc_html__('Center', 'superfood')  => 'center',
						esc_html__('Right', 'superfood')   => 'right'
					),
					'description' => esc_html__('Alignment When Items are in One Column', 'superfood')
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'number_of_columns' 	=> '',
			'switch_to_one_column'	=> '',
			'alignment_one_column' 	=> '',
			'items_float_left' 		=> '',
			'background_color' 		=> ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '';

		$elements_holder_classes = array();
		$elements_holder_classes[] = 'eltdf-elements-holder';
		$elements_holder_style = '';

		if($number_of_columns != ''){
			$elements_holder_classes[] .= 'eltdf-'.$number_of_columns ;
		}

		if($switch_to_one_column != ''){
			$elements_holder_classes[] = 'eltdf-responsive-mode-' . $switch_to_one_column ;
		} else {
			$elements_holder_classes[] = 'eltdf-responsive-mode-768' ;
		}

		if($alignment_one_column != ''){
			$elements_holder_classes[] = 'eltdf-one-column-alignment-' . $alignment_one_column ;
		}

		if($items_float_left !== ''){
			$elements_holder_classes[] = 'eltdf-ehi-float';
		}

		if($background_color != ''){
			$elements_holder_style .= 'background-color:'. $background_color . ';';
		}

		$elements_holder_class = implode(' ', $elements_holder_classes);

		$html .= '<div ' . superfood_elated_get_class_attribute($elements_holder_class) . ' ' . superfood_elated_get_inline_attr($elements_holder_style, 'style'). '>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;
	}
}
