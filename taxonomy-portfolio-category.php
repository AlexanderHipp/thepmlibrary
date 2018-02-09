<?php get_header(); ?>
<?php superfood_elated_get_title(); ?>
<div class="eltdf-container eltdf-default-page-template">
	<?php do_action('superfood_elated_after_container_open'); ?>
	<div class="eltdf-container-inner clearfix">
		<?php
			$cat_id = get_queried_object_id();
			$cat = get_category($cat_id);
			$cat_slug = $cat->slug;

			superfood_elated_get_portfolio_category_list($cat_slug);
		?>
	</div>
	<?php do_action('superfood_elated_before_container_close'); ?>
</div>
<?php get_footer(); ?>
