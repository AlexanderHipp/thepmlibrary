<?php
    /*
        Template Name: Blog: Standard
    */
?>
<?php get_header(); ?>
<?php superfood_elated_get_title(); ?>
<?php do_action('superfood_elated_before_slider_action'); ?>
<?php get_template_part('slider'); ?>
<?php do_action('superfood_elated_after_slider_action'); ?>
	<div class="eltdf-container">
	    <?php do_action('superfood_elated_after_container_open'); ?>
	    <div class="eltdf-container-inner" >
	        <?php superfood_elated_get_blog('standard'); ?>
	    </div>
	    <?php do_action('superfood_elated_before_container_close'); ?>
	</div>
	<?php do_action('superfood_elated_blog_list_additional_tags'); ?>
<?php get_footer(); ?>