<?php
/*
Template Name: Coming Soon Page
*/
$sidebar = superfood_elated_sidebar_layout();
$page_id = superfood_elated_get_page_id();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
	    <?php
	    /**
	     * superfood_elated_header_meta hook
	     *
	     * @see superfood_elated_header_meta() - hooked with 10
	     * @see eltd_user_scalable_meta() - hooked with 10
	     */
	    do_action('superfood_elated_header_meta');

	    wp_head(); ?>
    </head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<?php 
			if (superfood_elated_options()->getOptionValue('smooth_page_transitions') == "yes") {
				$ajax_class = 'eltdf-mimic-ajax';
			?>
			<div class="eltdf-smooth-transition-loader <?php echo esc_attr($ajax_class); ?>">
			    <div class="eltdf-st-loader">
			        <div class="eltdf-st-loader1">
			            <?php superfood_elated_loading_spinners(); ?>
			        </div>
			    </div>
			</div>
		<?php } ?>

		<div class="eltdf-wrapper">
			<div class="eltdf-wrapper-inner">
				<div class="eltdf-content">
		            <div class="eltdf-content-inner">
						<div class="eltdf-full-width">
							<div class="eltdf-full-width-inner">
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<?php the_content(); ?>
								<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>