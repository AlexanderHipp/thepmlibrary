<?php
class SuperfoodElatedClassFullScreenMenuOpener extends SuperfoodElatedClassWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_full_screen_menu_opener',
	        esc_html__('Elated Full Screen Menu Opener', 'superfood'),
	        array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the full screen menu', 'superfood'))
        );

		$this->setParams();
    }

	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'widget_elements_color',
				'title'       => esc_html__('Widget Color', 'superfood'),
				'description' => esc_html__('Define color for full screen menu opener', 'superfood')
			),
			array(
				'type'        => 'textfield',
				'name'        => 'widget_elements_margin',
				'title'       => esc_html__('Widget Margin', 'superfood'),
				'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'superfood')
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
        <a href="javascript:void(0)" class="eltdf-fullscreen-menu-opener" <?php superfood_elated_inline_style($holder_styles); ?>>
        <span class="fa fa-bars eltdf-fullscreen-menu-icon" aria-hidden="true"></span>
        <span class="eltdf-close-fullscreen-menu">
            <span class="eltdf-fullscreen-menu-line eltdf-line-1"></span>
            <span class="eltdf-fullscreen-menu-line eltdf-line-2"></span>
            <span class="eltdf-fullscreen-menu-line eltdf-line-3"></span>
        </span>

        </a>
    <?php }
}