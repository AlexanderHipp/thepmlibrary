<?php
	/*
		Template Name: Blog: Masonry Full Width
	*/
?>
<?php get_header(); ?>
<?php superfood_elated_get_title(); ?>
<?php do_action('superfood_elated_before_slider_action'); ?>
<?php get_template_part('slider'); ?>
<?php do_action('superfood_elated_after_slider_action'); ?>
	<div class="eltdf-full-width">
		<div class="eltdf-full-width-inner clearfix">
			<?php superfood_elated_get_blog('masonry-full-width'); ?>
		</div>
	</div>
	<?php do_action('superfood_elated_blog_list_additional_tags'); ?>
<?php get_footer(); ?>