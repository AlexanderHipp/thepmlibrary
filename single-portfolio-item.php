<?php

get_header();
superfood_elated_get_title();
do_action('superfood_elated_before_slider_action');
get_template_part('slider');
do_action('superfood_elated_after_slider_action');
superfood_elated_single_portfolio();
get_footer();

?>