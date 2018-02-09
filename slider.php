<?php
$superfood_elated_slider_shortcode = get_post_meta(superfood_elated_get_page_id(), 'eltdf_page_slider_meta', true);
if (!empty($superfood_elated_slider_shortcode)) { ?>
	<div class="eltdf-slider">
		<div class="eltdf-slider-inner">
			<?php echo do_shortcode(wp_kses_post($superfood_elated_slider_shortcode)); // XSS OK ?>
		</div>
	</div>
<?php } ?>