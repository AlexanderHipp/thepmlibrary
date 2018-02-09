<?php get_header(); ?>
<?php superfood_elated_get_title(); ?>
<div class="eltdf-container eltdf-default-page-template">
	<?php do_action('superfood_elated_after_container_open'); ?>
	<div class="eltdf-container-inner clearfix">
		<?php
			$tag_id = get_queried_object_id();
			$tag = get_tag($tag_id);
			$tag_slug = $tag->slug;

			superfood_elated_get_portfolio_tag_list($tag_slug);
		?>
	</div>
	<?php do_action('superfood_elated_before_container_close'); ?>
</div>
<?php get_footer(); ?>
