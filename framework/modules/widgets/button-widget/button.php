<?php
class SuperfoodElatedClassButtonWidget extends SuperfoodElatedClassWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'eltdf_button_widget',
			esc_html__('Elated Button Widget', 'superfood'),
			array( 'description' => esc_html__( 'Add buttons to widget areas', 'superfood'))
		);

		$this->setParams();
	}

	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'type' => 'dropdown',
				'name' => 'type',
				'title' => esc_html__('Type', 'superfood'),
				'options' => array(
					'solid' => esc_html__('Solid', 'superfood'),
					'outline' => esc_html__('Outline', 'superfood'),
					'simple' => esc_html__('Simple', 'superfood')
				)
			),
			array(
				'type' => 'dropdown',
				'name' => 'size',
				'title' => esc_html__('Size', 'superfood'),
				'options' => array(
					'small' => esc_html__('Small', 'superfood'),
					'medium' => esc_html__('Medium', 'superfood'),
					'large' => esc_html__('Large', 'superfood'),
					'huge' => esc_html__('Huge', 'superfood')
				),
				'description' => esc_html__('This option is only available for solid and outline button type', 'superfood')
			),
			array(
				'type' => 'textfield',
				'name' => 'text',
				'title' => esc_html__('Text', 'superfood'),
				'default' => esc_html__('Button Text', 'superfood')
			),
			array(
				'type' => 'textfield',
				'name'  => 'link',
				'title' => esc_html__('Link', 'superfood')
			),
			array(
				'type' => 'dropdown',
				'name' => 'target',
				'title' => esc_html__('Link Target', 'superfood'),
				'options' => array(
					'_self' => esc_html__('Same Window', 'superfood'),
					'_blank' => esc_html__('New Window', 'superfood')
				)
			),
			array(
				'type' => 'textfield',
				'name' => 'color',
				'title' => esc_html__('Color', 'superfood')
			),
			array(
				'type' => 'textfield',
				'name' => 'hover_color',
				'title' => esc_html__('Hover Color', 'superfood')
			),
			array(
				'type' => 'textfield',
				'name' => 'background_color',
				'title' => esc_html__('Background Color', 'superfood'),
				'description' => esc_html__('This option is only available for solid button type', 'superfood')
			),
			array(
				'type' => 'textfield',
				'name' => 'hover_background_color',
				'title' => esc_html__('Hover Background Color', 'superfood'),
				'description' => esc_html__('This option is only available for solid button type', 'superfood')
			),
			array(
				'type' => 'textfield',
				'name' => 'border_color',
				'title' => esc_html__('Border Color', 'superfood'),
				'description' => esc_html__('This option is only available for solid and outline button type', 'superfood')
			),
			array(
				'type' => 'textfield',
				'name' => 'hover_border_color',
				'title' => esc_html__('Hover Border Color', 'superfood'),
				'description' => esc_html__('This option is only available for solid and outline button type', 'superfood')
			),
			array(
				'type' => 'textfield',
				'name' => 'margin',
				'title' => esc_html__('Margin', 'superfood'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'superfood')
			)
		);
	}

	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget($args, $instance) {
		//prepare variables
		$params = '';

		if (!is_array($instance)) { $instance = array(); }

		// Filter out all empty params
		$instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });

		// Default values
		if (!isset($instance['text'])) { $instance['text'] = 'Button Text'; }

		// Generate shortcode params
		foreach($instance as $key => $value) {
			$params .= " $key='$value' ";
		}

		echo '<div class="widget eltdf-button-widget">';

			//finally call the shortcode
			echo do_shortcode("[eltdf_button $params]"); // XSS OK

		echo '</div>';
	}
}