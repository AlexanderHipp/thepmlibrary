<?php
class SuperfoodElatedClassStickySidebar extends SuperfoodElatedClassWidget {
	protected $params;
	
	public function __construct() {
		parent::__construct(
			'eltdf_sticky_sidebar',
			esc_html__('Elated Sticky Sidebar', 'superfood'),
			array( 'description' => esc_html__( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'superfood'), ) // Args
		);
		
		$this->setParams();
	}
	
	protected function setParams() {}
	
	public function widget( $args, $instance ) {
		echo '<div class="widget eltdf-widget-sticky-sidebar"></div>';
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "SuperfoodElatedClassStickySidebar" );' ) );
