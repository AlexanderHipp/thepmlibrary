<?php
class SuperfoodElatedClassSeparatorWidget extends SuperfoodElatedClassWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_separator_widget',
	        esc_html__('Elated Separator Widget', 'superfood'),
	        array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'superfood'))
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
                    'normal' => esc_html__('Normal', 'superfood'),
                    'full-width' => esc_html__('Full Width', 'superfood')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'position',
                'title' => esc_html__('Position', 'superfood'),
                'options' => array(
                    'center' => esc_html__('Center', 'superfood'),
                    'left' => esc_html__('Left', 'superfood'),
                    'right' => esc_html__('Right', 'superfood')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'border_style',
                'title' => esc_html__('Style', 'superfood'),
                'options' => array(
                    'solid' => esc_html__('Solid', 'superfood'),
                    'dashed' => esc_html__('Dashed', 'superfood'),
                    'dotted' => esc_html__('Dotted', 'superfood')
                )
            ),
            array(
                'type' => 'textfield',
                'name' => 'color',
                'title' => esc_html__('Color', 'superfood')
            ),
            array(
                'type' => 'textfield',
                'name' => 'width',
                'title' => esc_html__('Width', 'superfood')
            ),
            array(
                'type' => 'textfield',
                'name' => 'thickness',
                'title' => esc_html__('Thickness (px)', 'superfood')
            ),
            array(
                'type' => 'textfield',
                'name' => 'top_margin',
                'title' => esc_html__('Top Margin', 'superfood')
            ),
            array(
                'type' => 'textfield',
                'name' => 'bottom_margin',
                'title' => esc_html__('Bottom Margin', 'superfood')
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
        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget eltdf-separator-widget">';
	    
        echo do_shortcode("[eltdf_separator $params]"); // XSS OK

        echo '</div>';
    }
}