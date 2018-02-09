<?php
namespace SuperfoodElatedNamespace\Modules\Shortcodes\PricingTable;

use SuperfoodElatedNamespace\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_pricing_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Pricing Table', 'superfood'),
			'base' => $this->base,
			'icon' => 'icon-wpb-pricing-table extended-custom-icon',
			'category' => esc_html__('by ELATED', 'superfood'),
			'allowed_container_element' => 'vc_row',
			'as_child' => array('only' => 'eltdf_pricing_tables'),
			'params' => array(
				array(
					'type'       => 'colorpicker',
					'param_name' => 'content_background_color',
					'heading'    => esc_html__('Content Background Color', 'superfood')
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'title',
					'heading'     => esc_html__('Title', 'superfood'),
					'value'       => esc_html__('Basic Plan', 'superfood'),
					'save_always' => true
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'title_color',
					'heading'    => esc_html__('Title Color', 'superfood'),
					'dependency' => array('element' => 'title', 'not_empty' => true)
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'title_border_color',
					'heading'    => esc_html__('Title Bottom Border Color', 'superfood'),
					'dependency' => array('element' => 'title', 'not_empty' => true)
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'price',
					'heading'    => esc_html__('Price', 'superfood')
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'price_color',
					'heading'    => esc_html__('Price Color', 'superfood'),
					'dependency' => array('element' => 'price', 'not_empty' => true)
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'currency',
					'heading'     => esc_html__('Currency', 'superfood'),
					'description' => esc_html__('Default mark is $', 'superfood')
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'currency_color',
					'heading'    => esc_html__('Currency Color', 'superfood'),
					'dependency' => array('element' => 'currency', 'not_empty' => true)
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'price_period',
					'heading'     => esc_html__('Price Period', 'superfood'),
					'description' => esc_html__('Default label is monthly', 'superfood')
				),
				array(
					'type'       => 'colorpicker',
					'param_name' => 'price_period_color',
					'heading'    => esc_html__('Price Period Color', 'superfood'),
					'dependency' => array('element' => 'price_period', 'not_empty' => true)
				),
				array(
					'type'        => 'textfield',
					'param_name'  => 'button_text',
					'heading'     => esc_html__('Button Text', 'superfood'),
					'value'       => esc_html__('BUY NOW', 'superfood'),
					'save_always' => true
				),
				array(
					'type'       => 'textfield',
					'param_name' => 'link',
					'heading'    => esc_html__('Button Link', 'superfood'),
					'dependency' => array('element' => 'button_text',  'not_empty' => true)
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'button_type',
					'heading'    => esc_html__('Button Type', 'superfood'),
					'value'      => array(
						esc_html__('Solid', 'superfood') => 'solid',
						esc_html__('Outline', 'superfood') => 'outline'
					),
					'dependency'  => array('element' => 'button_text',  'not_empty' => true)
				),
				array(
					'type'       => 'dropdown',
					'param_name' => 'button_skin',
					'heading'    => esc_html__('Button Skin', 'superfood'),
					'value'      => array(
						esc_html__('Default', 'superfood') => '',
						esc_html__('Dark', 'superfood') => 'dark'
					),
					'dependency'  => array('element' => 'button_type',  'value' => array('solid'))
				),
				array(
					'type'       => 'textarea_html',
					'param_name' => 'content',
					'heading'    => esc_html__('Content', 'superfood'),
					'value'      => '<li>content content content</li><li>content content content</li><li>content content content</li>'
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'content_background_color' => '',
			'title'         		=> '',
			'title_color'           => '',
			'title_border_color'    => '',
			'price'         		=> '100',
			'price_color'           => '',
			'currency'      		=> '$',
			'currency_color'        => '',
			'price_period'  		=> 'monthly',
			'price_period_color'    => '',
			'button_text'   		=> '',
			'link'          		=> '',
			'button_type'           => 'solid',
			'button_skin'           => ''
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '';
		
		$params['content']= preg_replace('#^<\/p>|<p>$#', '', $content); // delete p tag before and after content
		$params['holder_styles'] = $this->getHolderStyles($params);
		$params['title_styles'] = $this->getTitleStyles($params);
		$params['price_styles'] = $this->getPriceStyles($params);
		$params['currency_styles'] = $this->getCurrencyStyles($params);
		$params['price_period_styles'] = $this->getPricePeriodStyles($params);
		$params['button_type'] = !empty($params['button_type']) ? $params['button_type'] : $args['button_type'];
		$params['button_classes'] = $this->getButtonClasses($params);

		$html .= superfood_elated_get_shortcode_module_template_part('templates/pricing-table-template', 'pricing-table', '', $params);
		
		return $html;
	}

	private function getHolderStyles($params) {
		$itemStyle = array();
		
		if (!empty($params['content_background_color'])) {
			$itemStyle[] = 'background-color: '.$params['content_background_color'];
		}
		
		return implode(';', $itemStyle);
	}
	
	private function getTitleStyles($params) {
		$itemStyle = array();

		if (!empty($params['title_color'])) {
            $itemStyle[] = 'color: '.$params['title_color'];
        }
        
        if(!empty($params['title_border_color'])) {
	        $itemStyle[] = 'border-color: '.$params['title_border_color'];
        }

		return implode(';', $itemStyle);
	}
	
	private function getPriceStyles($params) {
		$itemStyle = array();
		
		if (!empty($params['price_color'])) {
			$itemStyle[] = 'color: '.$params['price_color'];
		}
		
		return implode(';', $itemStyle);
	}
	
	private function getCurrencyStyles($params) {
		$itemStyle = array();
		
		if (!empty($params['currency_color'])) {
			$itemStyle[] = 'color: '.$params['currency_color'];
		}
		
		return implode(';', $itemStyle);
	}
	
	private function getPricePeriodStyles($params) {
		$itemStyle = array();
		
		if (!empty($params['price_period_color'])) {
			$itemStyle[] = 'color: '.$params['price_period_color'];
		}
		
		return implode(';', $itemStyle);
	}
	
	private function getButtonClasses($params) {
		$classes = array();
		
		if (!empty($params['button_skin'])) {
			$classes[] = 'eltdf-'.$params['button_skin'].'-skin';
		}
		
		return implode(' ', $classes);
	}
}