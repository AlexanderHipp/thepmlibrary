<?php

if (!function_exists('superfood_elated_register_widgets')) {

	function superfood_elated_register_widgets() {

		$widgets = array(
			'SuperfoodElatedClassAuthorInfoWidget',
			'SuperfoodElatedClassBlogListWidget',
			'SuperfoodElatedClassButtonWidget',
			'SuperfoodElatedClassFullScreenMenuOpener',
			'SuperfoodElatedClassIconWidget',
			'SuperfoodElatedClassImageWidget',
			'SuperfoodElatedClassSearchOpener',
			'SuperfoodElatedClassSeparatorWidget',
			'SuperfoodElatedClassSideAreaOpener',
			'SuperfoodElatedClassStickySidebar',
			'SuperfoodElatedClassSocialIconWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'superfood_elated_register_widgets');