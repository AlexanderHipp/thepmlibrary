<?php
class SuperfoodElatedClassSideAreaOpener extends SuperfoodElatedClassWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_side_area_opener',
	        esc_html__('Elated Side Area Opener', 'superfood'),
	        array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'superfood'))
        );

        $this->setParams();
    }

    protected function setParams() {
		$this->params = array(
            array(
                'type'        => 'textfield',
                'name'        => 'widget_elements_color',
                'title'       => esc_html__('Widget Color', 'superfood'),
                'description' => esc_html__('Define color for side area opener', 'superfood')
            ),
			array(
				'type'        => 'textfield',
				'name'        => 'widget_elements_margin',
				'title'       => esc_html__('Widget Margin', 'superfood'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'superfood')
			),
			array(
				'type' => 'textfield',
				'name' => 'widget_title',
				'title' => esc_html__('Side Area Opener Title', 'superfood')
			)
		);
    }

    public function widget($args, $instance) {
	    $holder_styles = array();
	    if (!empty($instance['widget_elements_color'])) {
		    $holder_styles[] = 'color: ' . $instance['widget_elements_color'];
	    }
	    if (!empty($instance['widget_elements_margin'])) {
		    $holder_styles[] = 'margin: ' . $instance['widget_elements_margin'];
	    }
		?>
        <a class="eltdf-side-menu-button-opener" href="javascript:void(0)" <?php superfood_elated_inline_style($holder_styles); ?>>
            <?php if (!empty($instance['widget_title'])) { ?>
                <h5 class="eltdf-side-menu-title"><?php echo esc_html($instance['widget_title']); ?></h5>
            <?php } ?>
            <span aria-hidden="true" class="fa fa-bars eltdf-side-menu-icon"></span>
        </a>
    <?php }
}