<div class="eltdf-plc-holder <?php echo esc_attr($holder_classes) ?>" <?php echo superfood_elated_get_inline_attrs($holder_data); ?>>
	<div class="eltdf-plc-outer">
		<?php if($query_result->have_posts()): while ($query_result->have_posts()) : $query_result->the_post(); ?>
			<div class="eltdf-plc-item">
				<?php if($type === 'simple') { ?>
					<div class="eltdf-grid">
				<?php } ?>
				<div class="eltdf-plc-image-outer">
					<div class="eltdf-plc-image">
						<?php echo superfood_elated_woocommerce_image_html_part('plc', $image_size); ?>
					</div>
					<?php if($type === 'standard') { ?>
						<div class="eltdf-plc-text" <?php echo superfood_elated_get_inline_style($shader_styles); ?>>
							<div class="eltdf-plc-text-outer">
								<div class="eltdf-plc-text-inner">
									<?php if($display_title === 'yes') {
										echo superfood_elated_woocommerce_title_html_part('plc', $title_tag, '', $title_styles);
									} ?>
									<?php if($display_category === 'yes') {
										echo superfood_elated_woocommerce_category_html_part('plc');
									} ?>
									<?php if($display_excerpt === 'yes' && $excerpt_length !== '0') {
										echo superfood_elated_woocommerce_excerpt_html_part('plc', $excerpt_length);
									} ?>
									<?php if ($display_rating === 'yes') {
										echo superfood_elated_woocommerce_rating_html_part('plc');
									} ?>
									<?php if($display_price === 'yes') {
										echo superfood_elated_woocommerce_price_html_part('plc');
									} ?>
									<?php if($display_button === 'yes') {
										echo superfood_elated_woocommerce_add_to_cart_html_part('plc', $button_skin);
									} ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<a class="eltdf-plc-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
				</div>
				<?php if($type === 'simple') { ?>
					<div class="eltdf-plc-text-wrapper">
						<div class="eltdf-plc-text">
							<div class="eltdf-plc-text-outer">
								<div class="eltdf-plc-text-inner">
									<?php if($display_title === 'yes') {
										echo superfood_elated_woocommerce_title_html_part('plc', $title_tag, 'yes', $title_styles);
									} ?>
									<?php if($display_category === 'yes') {
										echo superfood_elated_woocommerce_category_html_part('plc');
									} ?>
									<?php if($display_excerpt === 'yes' && $excerpt_length !== '0') {
										echo superfood_elated_woocommerce_excerpt_html_part('plc', $excerpt_length);
									} ?>
									<?php if ($display_rating === 'yes') {
										echo superfood_elated_woocommerce_rating_html_part('plc');
									} ?>
									<?php if($display_price === 'yes') {
										echo superfood_elated_woocommerce_price_html_part('plc');
									} ?>
									<?php if($display_button === 'yes') {
										echo superfood_elated_woocommerce_add_to_cart_html_part('plc', $button_skin);
									} ?>
								</div>
							</div>	
						</div>
					</div>
				<?php } ?>
				<?php if($type === 'simple') { ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile;	else:
			superfood_elated_woocommerce_no_products_found_html_part('plc');
		endif;
			wp_reset_postdata();
		?>
	</div>
</div>