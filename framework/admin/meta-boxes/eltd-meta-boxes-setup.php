<?php

add_action('after_setup_theme', 'superfood_elated_meta_boxes_map_init', 1);
function superfood_elated_meta_boxes_map_init() {
    /**
    * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
    * and loads map.php file in each.
    *
    * @see http://php.net/manual/en/function.glob.php
    */

    do_action('superfood_elated_before_meta_boxes_map');

	global $superfood_elated_global_options;
	global $superfood_elated_global_Framework;

    foreach(glob(ELATED_FRAMEWORK_ROOT_DIR.'/admin/meta-boxes/*/map.php') as $meta_box_load) {
        include_once $meta_box_load;
    }

	do_action('superfood_elated_meta_boxes_map');

	do_action('superfood_elated_after_meta_boxes_map');
}